<?php
//defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/**
 * Created by PhpStorm.
 * User: nahian
 * Date: 11/18/17
 * Time: 11:02 AM
 *
 * @property Mod_User   $Mod_User
 * @property Mod_common $Mod_common
 */
class AjaxController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		if ( !$this->input->is_ajax_request() ) {
			return FALSE;
		}
	}
	
	public function get_district_by_division()
	{
		$id      = $this->input->get( 'id' );
		$options = "<option value=''>Choose</option>";
		$query   = $this->db->select( 'DISTRICT_ID id,DISTRICT_NAME name' )->where( 'DIVISION_ID', $id )->get( 'districts' );
		
		if ( $query->num_rows() > 0 ) {
			foreach ( $query->result() as $item ) {
				$options .= "<option value={$item->id}>{$item->name}</option>";
			}
		}
		
		echo $options;
	}
	
	public function get_thana_by_district()
	{
		$id      = $this->input->get( 'id' );
		$options = "<option value=''>Choose</option>";
		$query   = $this->db->select( 'THANA_ID id,THANA_NAME name' )->where( 'DISTRICT_ID', $id )->get( 'thanas' );
		
		if ( $query->num_rows() > 0 ) {
			foreach ( $query->result() as $item ) {
				$options .= "<option value={$item->id}>{$item->name}</option>";
			}
		}
		
		echo $options;
	}
	
	public function get_course_by_inst()
	{
		$id      = $this->input->get( 'id' );
		$options = "<option value=''>Choose</option>";
		
		$query = $this->db->select( 'id id,course_name name' )->where( 'institute_id', $id )->where( 'status', 1 )->get( 'sif_course' );
		
		if ( $query->num_rows() > 0 ) {
			foreach ( $query->result() as $item ) {
				$options .= "<option value={$item->id}>{$item->name}</option>";
			}
		}
		echo $options;
	}
	
	public function get_faculty_by_course()
	{
		$id      = $this->input->get( 'id' );
		$options = "<option value=''>Choose</option>";
		
		$query = $this->db->select( 'id id,faculty_name name' )->where( 'course_id', $id )->where( 'status', 1 )->get( 'sif_faculty' );
		
		if ( $query->num_rows() > 0 ) {
			foreach ( $query->result() as $item ) {
				$options .= "<option value={$item->id}>{$item->name}</option>";
			}
		}
		echo $options;
	}
	
	public function get_subject_by_faculty()
	{
		$id      = $this->input->get( 'id' );
		$options = "<option value=''>Choose</option>";
		
		$query = $this->db->select( 'id id,subject name' )->where( 'faculty_id', $id )->where( 'status', 1 )->get( 'sif_subject' );
		
		if ( $query->num_rows() > 0 ) {
			foreach ( $query->result() as $item ) {
				$options .= "<option value={$item->id}>{$item->name}</option>";
			}
		}
		echo $options;
	}
	
	
	
	public function exam_answer_save( $exam_id )
	{
		
		$this->session->set_userdata( 'exam_running','Y');
		
		$response = ['success' => FALSE, 'msg' => NULL, 'content' => NULL, 'remaining' => FALSE];
		
		$doc_exam = $this->Mod_common->get_row_data_by_id( 'oe_doc_exams', $exam_id );
		
		if ( $this->input->post() && $doc_exam->status == 8 ) {
			$this->load->model( 'model_user/Mod_User', 'Mod_User' );
			
			// Action name skip/next
			$action_name = $this->input->post( 'action_name' );
			
			$status = $this->Mod_User->save_exam_answers( $exam_id, $action_name, $doc_exam );
			
			if ( $status['success'] ) {
				$response['success'] = TRUE;
				
				// get next question
				$all_ques = $this->session->questions;
				
				// Add Skip Question
				if ( $action_name == 'skip' ) {
					$skipped_questions = $this->session->skipped_questions;
					array_push( $skipped_questions, isset( $all_ques[0] ) ? $all_ques[0] : $skipped_questions[0] );
					$this->session->set_userdata( 'skipped_questions', array_values( $skipped_questions ) );
				}
				
				unset( $all_ques[0] );
				$this->session->set_userdata( 'questions', array_values( $all_ques ) );
				$questions = $this->session->questions;
				
				// Show Skipped Questions
				if ( !$questions ) {
					$skipped_questions = $this->session->skipped_questions;
					$questions         = $skipped_questions;
					unset( $skipped_questions[0] );
					$this->session->set_userdata( 'skipped_questions', array_values( $skipped_questions ) );
				}
				
				$timer = $this->input->post( 'timer', TRUE );
				
				$this->session->set_userdata( 'timer', $timer);
				
				$this->session->set_userdata( 'last_entry_time', time());
				
				
				if ( count( $questions ) && $timer != '00:00' ) {
					$qus_ans               = $this->Mod_User->get_question_answers( $questions[0] );
					$response['content']   = $this->load->view( 'web/elements/view_question_answer', $qus_ans, TRUE );
					$response['answers']   = $this->session->answers;
					$response['remaining'] = count( $questions + $this->session->skipped_questions );
				} else {
					
					if ( $timer == "00:00" || ( !$this->session->questions && !$this->session->skipped_questions ) ) {
						$status = $this->Mod_User->process_exam_result( $exam_id, $status['timeout'], $doc_exam->exam_id );
						
						if ( $status ) {
							
							$this->db->where( 'id', $exam_id )->update( 'oe_doc_exams', ['status' => 1] );
							
							$this->session->unset_userdata( 'exam_running');
							$this->session->unset_userdata( 'timer'); 
							$this->session->unset_userdata( 'last_entry_time');
							
							$response['success'] = $status;

							
							
						}
					}
					
					$this->session->unset_userdata( ['questions', 'skipped_questions', 'answers', 'ques_count'] );
//                    if ( is_free_exam( $exam_id ) ) {
//                        $response['redirect'] = site_url( "exam-result/$exam_id" );
//                    } else {
//                        $response['redirect'] = site_url( "exam-answer/$exam_id" );
//                    }
					$response['redirect'] = site_url( "exam-answer/$exam_id" );
				}
			}
			$response['msg'] = $status['msg'];
		} else {
			$response['msg'] = 'Please don\'n think too much.';
			redirect( site_url( 'exam-start/{$doc_exam->id}' ) );
		}
		
		echo json_encode( $response );
	}
	
	
	
	
	
	/*
	public function exam_answer_save( $exam_id )
	{
		$response = ['success' => FALSE, 'msg' => NULL, 'content' => NULL, 'remaining' => FALSE];
		
		$doc_exam = $this->Mod_common->get_row_data_by_id( 'oe_doc_exams', $exam_id );
		
		if ( $this->input->post() && $doc_exam->status == 8 ) {
			$this->load->model( 'model_user/Mod_User', 'Mod_User' );
			
			// Action name skip/next
			$action_name = $this->input->post( 'action_name' );
			
			$status = $this->Mod_User->save_exam_answers( $exam_id, $action_name, $doc_exam );
			
			if ( $status['success'] ) {
				$response['success'] = TRUE;
				
				// get next question
				$all_ques = $this->session->questions;
				
				// Add Skip Question
				if ( $action_name == 'skip' ) {
					$skipped_questions = $this->session->skipped_questions;
					array_push( $skipped_questions, isset( $all_ques[0] ) ? $all_ques[0] : $skipped_questions[0] );
					$this->session->set_userdata( 'skipped_questions', array_values( $skipped_questions ) );
				}
				
				unset( $all_ques[0] );
				$this->session->set_userdata( 'questions', array_values( $all_ques ) );
				$questions = $this->session->questions;
				
				// Show Skipped Questions
				if ( !$questions ) {
					$skipped_questions = $this->session->skipped_questions;
					$questions         = $skipped_questions;
					unset( $skipped_questions[0] );
					$this->session->set_userdata( 'skipped_questions', array_values( $skipped_questions ) );
				}
				
				$timer = $this->input->post( 'timer', TRUE );
				
				if ( count( $questions ) && $timer != '00:00' ) {
					$qus_ans               = $this->Mod_User->get_question_answers( $questions[0] );
					$response['content']   = $this->load->view( 'web/elements/view_question_answer', $qus_ans, TRUE );
					$response['answers']   = $this->session->answers;
					$response['remaining'] = count( $questions + $this->session->skipped_questions );
				} else {
					
					if ( $timer == "00:00" || ( !$this->session->questions && !$this->session->skipped_questions ) ) {
						$status = $this->Mod_User->process_exam_result( $exam_id, $status['timeout'], $doc_exam->exam_id );
						
						if ( $status ) {
							$this->db->where( 'id', $exam_id )->update( 'oe_doc_exams', ['status' => 1] );
							$response['success'] = $status;
						}
					}
					
					$this->session->unset_userdata( ['questions', 'skipped_questions', 'answers', 'ques_count'] );
//                    if ( is_free_exam( $exam_id ) ) {
//                        $response['redirect'] = site_url( "exam-result/$exam_id" );
//                    } else {
//                        $response['redirect'] = site_url( "exam-answer/$exam_id" );
//                    }
					$response['redirect'] = site_url( "exam-answer/$exam_id" );
				}
			}
			$response['msg'] = $status['msg'];
		} else {
			$response['msg'] = 'Please don\'n think too much.';
		}
		
		echo json_encode( $response );
	}
	*/
	
	
	
	
	public function get_topic_questions()
	{
		$this->load->model( 'Mod_common' );
		if ( $this->input->get() ) {
			$type      = $this->input->get( 'type' );
			$questions = $this->Mod_common->get_topic_questions_by_type( $type );
			$view      = $this->load->view( 'exam/view_select_question.php', ['questions' => $questions, 'type' => $type], TRUE );
			echo $view;
			exit;
		}
		http_response_code( 404 );
	}
	
	public function get_chapter_topics()
	{
		$id      = $this->input->get( 'chapter' );
		$options = "<option value=''>Select Topic</option>";
		
		$query = $this->db->select( 'id, name' )->where( 'chapter_ref_id', $id )->get( 'oe_topics' );
		
		if ( $query->num_rows() > 0 ) {
			foreach ( $query->result() as $item ) {
				$options .= "<option value={$item->id}>{$item->name}</option>";
			}
		}
		echo $options;
		exit;
	}
	
	public function get_coupon_discount()
	{
		$this->form_validation->set_rules( 'code', 'Coupon Code', 'trim|alpha_numeric' );
		
		if ( $this->form_validation->run() ) {
			$code = htmlentities( trim( $this->input->post( 'code', TRUE ) ), ENT_QUOTES );
			$this->load->model( 'Mod_coupon' );
			$coupon = $this->Mod_coupon->get_valid_coupon_details( $code );
			
			if ( $coupon ) {
				if ( $coupon->times_allowed > $coupon->times_used ) {
					echo json_encode( $coupon );
				} else {
					http_response_code( 401 );
					echo "<i class=text-danger>Not Available</i>";
				}
			} else {
				http_response_code( 400 );
				echo "<i class=text-danger>Invalid Code</i>";
			}
			
		} else {
			http_response_code( 422 );
			echo validation_errors( '<i class=text-danger>', '</i>' );
		}
		
	}
	
	
	public function get_purchase_details()
	{
		$currency    = $this->input->get( 'currency', TRUE );
		$purchase_id = $this->input->get( 'purchase_id', TRUE );
		
		$query = $this->db->get_where( 'oe_doc_purchases', ['id' => $purchase_id, 'status' => 1, 'payment_status' => 0] );
		
		$data = [
			'symbol' => '',
			'cost'   => NULL
		];
		
		if ( $query->num_rows() ) {
			$row = $query->row();
			
			if ( $currency === 'BDT' ) {
				$data['symbol'] = '৳';
				$data['cost']   = $row->final_cost_bdt;
			} elseif ( $currency === 'USD' ) {
				$data['symbol'] = '$';
				$data['cost']   = $row->final_cost_usd;
			}
		}
		
		echo json_encode( $data );
		
	}
}
