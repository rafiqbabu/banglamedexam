<?php

/**
 * Class Admission
 * @property Mod_setting     $Mod_setting
 * @property Mod_exam        $Mod_exam
 * @property Mod_common      $Mod_common
 * @property Mod_file_upload $Mod_file_upload
 * @property common_lib      $common_lib
 */
class Exam_create extends My_Controller
{
	
	private $record_per_page  = 20;
	private $record_num_links = 10;

//    private $data = '';
	
	public function __construct()
	{
		parent::__construct();
		
		$this->data['module_name'] = "Create Exam";
		$this->data['breadcrumb']  = array($this->panel_name, $this->data['module_name']);
		$this->load->model( 'Mod_exam' );
		$this->load->model( 'Mod_common' );
		$this->load->model( 'Mod_setting' );
		$this->load->model( 'Mod_examtopics' );
		
		$this->load->library( 'pagination' );
		$this->data['free_exam']      = $this->Mod_common->free_exam();
		$this->data['institute_list'] = $this->Mod_setting->get_institue_list_array();
		$this->data['chapter_list']   = $this->Mod_setting->get_chapter_list_array();
		$this->data['course_list']    = $this->Mod_setting->get_course_list_array();
		$this->data['faculty_list']   = $this->Mod_setting->get_faculty_list_array();
		$this->data['sub_list']       = $this->Mod_setting->get_subject_list_array();
		$this->data['exam_category']  = $this->Mod_exam->get_exam_category_array();
		$this->data['status_list']    = $this->common_lib->get_status_array();
	}
	
	function create_exam()
	{
		$this->data['chapter_lists'] = $this->Mod_examtopics->get_chapter_lists();
		$this->load->view( 'exam/view_create_exam', $this->data );
	}
	
	function add_exam()
	{
		$this->form_validation->set_rules( 'institute_id', 'Institute', 'trim|required' );
		$this->form_validation->set_rules( 'course_id', 'Course', 'trim|required' );
		$this->form_validation->set_rules( 'faculty_id', 'Faculty', 'trim|required' );
		$this->form_validation->set_rules( 'subject_id', 'Subject', 'trim' );
		$this->form_validation->set_rules( 'exam_id', 'Exam type', 'trim|required' );
		$this->form_validation->set_rules( 'mcq_total', 'MCQ', 'trim' );
		$this->form_validation->set_rules( 'mcq_value', 'MCQ Value', 'trim' );
		$this->form_validation->set_rules( 'sba_total', 'SBA', 'trim' );
		$this->form_validation->set_rules( 'sba_value', 'SBA', 'trim' );
		$this->form_validation->set_rules( 'negative_mark', 'Negative', 'trim' );
		$this->form_validation->set_rules( 'total_mark', 'Total Mark', 'trim|required' );
		$this->form_validation->set_rules( 'time', 'Time', 'trim|required' );
		$this->form_validation->set_rules( 'ans_visible', 'Answer Sheet Visible', 'trim' );
//        $this->form_validation->set_rules('exam_cost', 'Exam Costs', 'trim|required');
		
		if ( $this->form_validation->run() == FALSE ) {
			$this->load->view( 'exam/view_create_exam', $this->data );
		} else {
			$res_flag = $this->Mod_exam->save_exam_info( $this->authEmail );
			if ( !empty( $res_flag ) ) {
				$this->session->set_flashdata( 'flashOK', 'Data added successfully' );
			} else {
				$this->session->set_flashdata( 'flashError', 'Failed to add data' );
			}
			redirect( 'exam_create/create_exam' );
		}
	}
	
	function exam_list()
	{
		$row                 = 0;
		$temp_record_postion = $this->uri->segment( 3 );
		
		if ( !empty ( $temp_record_postion ) ) {
			$row = $temp_record_postion;
		} else {
			$this->session->unset_userdata( 'sql_where_session' );
		}
		$config               = config_item( 'pagination' );
		$config['base_url']   = base_url( 'exam_create/exam_list' );
		$config['total_rows'] = $this->Mod_exam->count_records();
		$config['per_page']   = $this->record_per_page;
		$config['num_links']  = $this->record_num_links;
		$this->pagination->initialize( $config );
		$this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
		$this->data['links']      = $this->pagination->create_links();
		
		$this->data['exam_lists'] = $this->Mod_exam->get_all_exam_list( $this->record_per_page, $row );
		$this->load->view( 'exam/view_exam_list', $this->data );
	}
	
	function exam_details()
	{
		$this->data['page_title'] = "Exam Details";
		$this->data['exam_id'] = $_GET['eid'];
		$this->load->view( 'exam/view_exam_details', $this->data );
	}
	
	function edit_exam_list()
	{
		$auto_id                        = $this->uri->segment( 3 );
		$this->data['res']              = $this->Mod_exam->get_exam_details( $auto_id );
		$this->data['chapter_topic_id'] = $this->Mod_exam->get_edit_chapter_topic_id( $auto_id );
		// echo "<pre>";
		// print_r($this->data['chapter_topic_id']);
		// exit();
		
		$this->load->view( 'exam/view_edit_exam_list', $this->data );
	}
	
	function update_exam_list()
	{
		$auto_id     = $this->input->post( 'update_id' );
		$result_flag = $this->Mod_exam->update_exam_list_value( $auto_id );
		if ( !empty( $result_flag ) ) {
			$this->session->set_flashdata( 'flashOK', 'Data Updated successfully' );
		} else {
			$this->session->set_flashdata( 'flashError', 'Failed to add data' );
		}
		redirect( 'exam_create/exam_list' );
		
	}
	
	function get_ajax_question_list()
	{
		$topics_id  = $this->input->post( 'topics_id' );
		$chapter_id = $this->input->post( 'chapter_id' );
		$type       = $this->input->post( 'type' );
		
		$this->db->select( 'master_ref_id,topic_id,chapter_ref_id' );
		$this->db->where( 'chapter_ref_id', $chapter_id );
		$this->db->where( 'topic_id', $topics_id );
		$query = $this->db->get( 'oe_qns_topic_relatn' );
		if ( $query->num_rows() > 0 ) {
			$r   = $query->result_array();
			$arr = '';
			foreach ( $r as $key => $value ) {
				
				$arr[] = $value['master_ref_id'];
				
				$this->data['topics_id'] = $value['topic_id'];
				
				$this->data['chapters_id'] = $value['chapter_ref_id'];
				// echo "<pre>";
				// print_r($this->data['topics_id']);
				// exit();
			}
			
			if ( $type == 'mcq' ) {
				$quetion = $this->db->where( 'type', 2 );//2 MCSQ
			} else {
				$quetion = $this->db->where( 'type', 1 );//1 SBA
			}
			
			$quetion = $this->db->where_in( 'id', $arr );
			$quetion = $this->db->get( 'oe_qsn_bnk_master' );
			//echo $sql = $this->db->last_query();
			if ( $quetion->num_rows() > 0 ) {
				$res                             = $quetion->result_array();
				$this->data['quetion_list']      = $res;
				$this->data['quetion_list_type'] = $type;
				//$this->data['topics_id'] = $topic_array[];
			}
		}
		$html = $this->load->view( 'exam/view_ajax_question_list', $this->data, TRUE );
		echo $html;
	}
	
	function exam_question_list()
	{
		$exam_id = $this->uri->segment( 3 );
		
		//$this->data['exam_lists'] = $this->Mod_exam->get_all_exam_list();
		$this->data['question_list'] = $this->Mod_exam->get_exam_details( $exam_id );
		//$this->load->view('exam/view_exam_list',$this->data);
		$this->load->view( 'exam/view_exam_question_list', $this->data );
	}
	
	function exam_question_pdf( $exam_id )
	{
		$this->data['exam']      = $this->Mod_exam->get_exam_details( $exam_id );
		$this->data['questions'] = $this->Mod_exam->get_exam_questions( $exam_id );
//        die(json_encode($this->data['questions']));
		$html  = $this->load->view( 'exam/view_exam_question_pdf', $this->data, TRUE );
		$title = "{$this->data['exam']->type} - {$this->data['exam']->exam_name}";
		$pdf   = new \Mpdf\Mpdf();
		$pdf->SetTitle( $title );
		$pdf->SetHeader( $this->data['company']->name );
		$pdf->SetFooter( 'Medigene IT||Page - {PAGENO}' );
		$pdf->WriteHtml( $html );
		
		$pdf->Output( "exam-{$exam_id}.pdf", 'I' );        // 'myfile.pdf', \Mpdf\Output\Destination::DOWNLOAD, D
	}
	
	function change_question( $exe_q_id = NULL, $qid = NULL )
	{
		if ( $exe_q_id && $qid ) {
			$exm_ques = $this->Mod_common->get_row_data_by_id( 'oe_exam_question', $exe_q_id );
			$ques     = $this->Mod_common->get_row_data_by_id( 'oe_qsn_bnk_master', $qid );
			if ( !$this->input->post() ) {
				$this->data['id']            = $qid;
				$this->data['question_list'] = $this->Mod_exam->get_question_list( $ques->type, $exm_ques->topic_id );
				$this->load->view( 'exam/view_change_question', $this->data );
			} else {
				$stat = $this->Mod_exam->change_exam_question( $exe_q_id, $exm_ques->exam_ref_id );
				if ( $stat ) {
					$this->session->set_flashdata( 'flashOK', 'Question Changed' );
					redirect( "exam_create/exam_question_list/$exm_ques->exam_ref_id" );
				} else {
					redirect( "exam_create/change_question/$exe_q_id/$qid" );
				}
			}
		} else {
			show_404();
		}
	}
	
	public function delete_question( $exe_q_id = NULL )
	{
		if ( $exe_q_id ) {
			
			$this->db->delete( 'oe_exam_question', ['id' => $exe_q_id] );
			
			if ( $this->db->affected_rows() == 1 ) {
				$this->session->set_flashdata( 'flashOK', 'Question Deleted' );
			}
			redirect_back();
			
		} else {
			show_404();
		}
	}
	
	public function copy_exam( $exam_id = NULL )
	{
		if ( $exam_id ) {
			$this->data['exam']      = $this->Mod_exam->get_exam_details( $exam_id );
			$this->data['questions'] = $this->Mod_exam->get_exam_questions( $exam_id );
			$this->load->view( 'exam/view_copy_exam', $this->data );
		} else {
			show_error( 'Exam ID not found!', 401 );
		}
		
	}
	
	public function save_exam_copy( $exam_id = NULL )
	{
		if ( $exam_id ) {
			$this->data['exam']      = $this->Mod_exam->get_exam_details( $exam_id );
			$this->data['questions'] = $this->Mod_exam->get_exam_questions_only( $exam_id );
			
			$this->form_validation->set_rules( 'faculty_id', 'Faculty', 'trim|required' );
			$this->form_validation->set_rules( 'subject_id', 'Subject', 'trim|required' );
			
			if ( $this->form_validation->run() == FALSE ) {
				$this->load->view( 'exam/view_copy_exam', $this->data );
			} else {
				$res_flag = $this->Mod_exam->copy_exam_info( $this->data['exam'], $this->data['questions'] );
				if ( !empty( $res_flag ) ) {
					$this->session->set_flashdata( 'flashOK', 'Exam Copied successfully' );
				} else {
					$this->session->set_flashdata( 'flashError', 'Failed to copy exam.' );
				}
				redirect( 'exam_create/exam_list' );
			}
		} else {
			show_error( 'Exam ID not found!', 401 );
		}
	}
	
	public function status_change( $exam_id = NULL, $status = 0 )
	{
		if ( $exam_id ) {
			
			$this->db->where( 'id', $exam_id )->update( 'oe_exam', ['status' => $status] );
			
			if ( $this->db->affected_rows() ) {
				$this->session->set_flashdata( 'flashOK', 'Exam Status changed Successfully' );
			} else {
				$this->session->set_flashdata( 'flashError', 'Failed to change Exam Status.' );
			}
			redirect( 'exam_create/exam_list' );
			
		} else {
			show_error( 'Exam ID not found!', 401 );
		}
	}
	
	
}
