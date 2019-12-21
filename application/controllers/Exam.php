<?php
/**
 * Created by PhpStorm.
 * User: nahian
 * Date: 11/27/17
 * Time: 2:26 PM
 *
 * @property Mod_home    $Mod_home
 * @property Mod_common  $Mod_common
 * @property common_lib  $common_lib
 * @property Mod_setting $Mod_setting
 * @property Mod_User    $Mod_User
 */

class Exam extends CI_Controller
{
	
	protected $data;
	
	public function __construct()
	{
		parent::__construct();
		
		// Redirect if not logged in
		if ( !user_logged_in() ) {
			$this->session->set_flashdata( 'msg_type', 'warning' );
			$this->session->set_flashdata( 'msg', 'You Must Login/Register to Participate any Exam. ' );
			redirect( "user-login" );
		}

//        prev_url(uri_string());
		
		// Unset Redirect Url after visiting page
		unset_redirect_url();
		
		$this->load->model( 'model_user/Mod_home', 'Mod_home' );
		$this->load->model( 'model_user/Mod_User', 'Mod_User' );
		$this->load->model( 'Mod_setting', 'Mod_setting' );
		$this->data['company'] = $this->Mod_common->get_company_data();
		$this->load->library( 'pagination' );
		$this->load->helper( 'date' );
		$this->load->helper( 'utility' );
		$this->data['msg']        = $this->load->view( 'web/elements/view_msg', $this->data, TRUE );
		$this->data['user']       = $this->Mod_common->get_row_data_by_id( 'oe_doc_master', $this->session->user->id );
		$this->data['page_title'] = "Exam";
	}
	
	public function free_exam( $exam_id )
	{
		if ( $exam_id ) {
			$exam = $this->Mod_User->get_user_free_exam_data( $exam_id );
			if ( $exam ) {
				redirect( "exam-prompt/$exam" );
			}
		}
		redirect( '/' );
		
	}
	
	public function sif_exam( $exam_id, $candidate )
	{
		if ( $exam_id ) {
			$exam = $this->Mod_User->get_sif_exam_data( $exam_id, $candidate );
			if ( $exam ) {
				redirect( "exam-prompt/$exam" );
			}
		}
		redirect( '/' );
		
	}
	
	public function package_exam( $exam_id = NULL, $package_id = NULLL, $purchase_id = NULL )
	{
		if ( $exam_id && $package_id && $purchase_id ) {
			$exam = $this->Mod_User->get_user_package_exam_data( $exam_id, $package_id, $purchase_id );
			if ( $exam ) {
				redirect( "exam-prompt/$exam" );
			}
		}
		redirect( '/' );
		
	}
	
	public function exam_prompt( $exam_id )
	{
		if ( $exam_id ) {
			$exam = $this->Mod_User->get_user_exam_data( $exam_id );
			$page = $this->Mod_home->get_page( 'exam-prompt' );
//            die(json_encode($exam));
			if ( $exam ) {
				$this->data['exam']        = $exam;
				$this->data['exam_prompt'] = $page;
				$this->data['page_title']  = "Confirm Exam Start";
				$this->load->view( 'web/exam/view_start_confirm', $this->data );
			} else {
				redirect( '/' );
			}
		} else {
			redirect( '/' );
		}
	}
	
	
	
	public function exam_start( $exam_id )
	{   
		if ( $exam_id ) {
			$exam = $this->Mod_User->get_user_exam_data( $exam_id );
			
			if (($exam && $exam->status == 9) || ($exam && $exam->status == 8)) {
				$second_passed =  time() - $this->session->userdata( 'last_entry_time');     
				$min_passed = round($second_passed/60);
				
				if($this->session->userdata( 'exam_running') == 'Y' && round($this->session->userdata( 'timer'))-$min_passed <= 0){
					$status = $this->Mod_User->process_exam_result( $exam_id, $exam->exam_data->ans_visible, $exam->exam_data->id );
						if ($status) {
							$this->db->where( 'id', $exam_id )->update( 'oe_doc_exams', ['status' => 1] );
							$this->session->unset_userdata( 'exam_running');
							$this->session->unset_userdata( 'timer'); 
							$this->session->unset_userdata( 'last_entry_time');
							$response['success'] = $status;
						}	
						$this->data['question_answer']   = $this->load->view( 'web/elements/exam_over', '', TRUE );	
						$this->data['exam']   = $exam;
						$this->data['page_title'] = $this->data['exam']->exam_data->exam_name;
						$this->load->view( 'web/exam/view_exam_question3', $this->data );	
					}elseif($this->session->userdata( 'exam_running') == 'Y'){
					
					$this->data['exam']       = $exam;
					$this->data['page_title'] = $this->data['exam']->exam_data->exam_name;
					//$this->load->model( 'model_user/Mod_User', 'Mod_User' );
					$all_ques = $this->session->questions;
					//unset( $all_ques[0] );
					$this->session->set_userdata( 'questions', array_values( $all_ques ) );
					$questions = $this->session->questions;
				
					$qus_ans               = $this->Mod_User->get_question_answers( $questions[0] );
					$this->data['question_answer']   = $this->load->view( 'web/elements/view_question_answer', $qus_ans, TRUE );
					//$this->load->view( 'web/elements/view_question_answer', $qus_ans );
					$this->load->view( 'web/exam/view_exam_question', $this->data );
					
				}else{
		
			
				$status = $this->Mod_User->change_user_exam_status( $exam_id, ['status' => 8, 'start_time' => date( 'H:i:s' )] ); //
				if ( $exam && $status ) {
					$this->data['exam']       = $exam;
					$this->data['page_title'] = $this->data['exam']->exam_data->exam_name;
					$data                     = $this->Mod_User->get_user_exam_question_with_answers( $exam->exam_id );
					$this->session->set_userdata( 'ques_no', 1 );
					$this->data['question_answer'] = $this->load->view( 'web/elements/view_question_answer', $data, TRUE );
					$this->load->view( 'web/exam/view_exam_question', $this->data );
				} 
			}		
	
			} else {
				echo "No exam";
			}
		} else {
			echo "No exam id";
		}
	}
	
	
	
	
	/*
	public function exam_start( $exam_id )
	{
		// Unset Previous Exam Data
		$this->session->unset_userdata( ['questions', 'answers', 'ques_no', 'ques_count'] );
		
		if ( $exam_id ) {
			$exam = $this->Mod_User->get_user_exam_data( $exam_id );
			
			//if ($exam && $exam->status == 9 ) {
			if (($exam && $exam->status == 9) || ($exam && $exam->status == 8)) {
				
				// Update Exam Status to Started
				$status = $this->Mod_User->change_user_exam_status( $exam_id, ['status' => 8, 'start_time' => date( 'H:i:s' )] ); //
				if ( $exam && $status ) {
					$this->data['exam']       = $exam;
					$this->data['page_title'] = $this->data['exam']->exam_data->exam_name;
					$data                     = $this->Mod_User->get_user_exam_question_with_answers( $exam->exam_id );
					$this->session->set_userdata( 'ques_no', 1 );
					$this->data['question_answer'] = $this->load->view( 'web/elements/view_question_answer', $data, TRUE );
					$this->load->view( 'web/exam/view_exam_question', $this->data );
				} else {
					redirect( '/' );
				}
			} else {
				redirect( '/' );
			}
		} else {
			redirect( '/' );
		}
	}
	
	public function exam_result( $exam_id )
	{
		if ( $exam_id ) {
			$exam = $this->Mod_User->get_user_exam_result( $exam_id );
			if ( $exam ) {
				$this->data['exam']       = $exam;
				$this->data['page_title'] = "Exam Result";
				$this->load->view( 'web/exam/view_result', $this->data );
			} else {
				show_error( 'Exam not found!' );
			}
		} else {
			show_error( 'Exam Id not found!' );
		}
	}
	*/
	
	
	public function exam_result( $exam_id )
	{
		if ( $exam_id ) {
			$exam = $this->Mod_User->get_user_exam_result( $exam_id );
			if ( $exam ) {
				$this->data['exam']       = $exam;
				$this->data['page_title'] = "Exam Result";
				$this->load->view( 'web/exam/view_result', $this->data );
			} else {
				show_error( 'Exam not found!' );
			}
		} else {
			show_error( 'Exam Id not found!' );
		}
	}
	
	
	
	public function exam_answer( $exam_id )
	{
		if ( $exam_id ) {
			//$exam = $this->Mod_User->get_user_exam_result( $exam_id, ['ans_open_timeout >=' => date( 'Y-m-d H:i:s' )] );
			//new
			$exam = $this->Mod_User->get_user_exam_result($exam_id); 
			if ( $exam ) {
				$this->data['exam']       = $exam;
				$this->data['page_title'] = "Exam Answer - " . $this->data['exam']->exam_data->exam_name;
				$this->data['data']       = $this->Mod_User->get_user_exam_questions_with_answers( $exam->exam_id );
				$this->load->view( 'web/exam/view_answer_details', $this->data );
			} else {
				redirect( '/' );
			}
		} else {
			redirect( '/' );
		}
	}
}
