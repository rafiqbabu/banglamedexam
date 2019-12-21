<?php

/**
 * Class Applicant
 *
 * @property Mod_applicant $Mod_applicant
 * @property pagination    $pagination
 * @property common_lib    $common_lib
 */
class Applicant extends My_Controller
{
	
	private $record_per_page  = 20;
	private $record_num_links = 5;

//    private $data = '';
	
	public function __construct()
	{
		parent::__construct();
		
		$this->data['module_name'] = "Applicants";
		$this->load->library( 'pagination' );
		$this->load->library( 'common_lib' );
		$this->load->library( 'user_agent' );
		$this->load->model( 'Mod_applicant' );
		
		$this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
	}
	
	function index()
	{
//        array_push($this->data['breadcrumb'], "Purchased Exam");
		$temp_record_postion = $this->input->get( 'per_page' );
		$row                 = $temp_record_postion ? $temp_record_postion : 0;
		
		$config                       = config_item( 'pagination' );
		$config['base_url']           = current_url();
		$config['total_rows']         = $this->Mod_applicant->count_applicant();
		$config['per_page']           = $this->record_per_page;
		$config['page_query_string']  = TRUE;
		$config['reuse_query_string'] = TRUE;
		$this->pagination->initialize( $config );
		$this->data['record_pos'] = $row;
		$this->data['total_rows'] = $config['total_rows'];
		$this->data['links']      = $this->pagination->create_links();
		$this->data['applicants'] = $this->Mod_applicant->get_all_applicant( $this->record_per_page, $row );
		$this->load->view( 'applicant/view_list', $this->data );
	}
	
	//new
	public function user_list()
	{
		$this->data['all_user'] = $this->Mod_applicant->get_all_user();
		$this->load->view( 'applicant/view_user_list', $this->data );
	}
	
	public function complain()
	{
		$this->data['all_complain'] = $this->Mod_applicant->get_all_complain();
		$this->load->view( 'applicant/view_complain', $this->data );
		//echo "ee";
	}
	
	function create()
	{
		if ( !$this->input->post() ) {
			$this->data['form_action'] = 'add';
			$this->load->view( 'applicant/view_send_mail_doc', $this->data );
		} else {
			$this->form_validation->set_rules( 'title', 'Title', 'trim|required' );
			if ( $this->form_validation->run() ) {
				$this->Mod_applicant->save_general_applicant();
			}
			redirect( 'applicant/create' );
		}
	}
	
	function edit( $id )
	{
		$applicant = $this->Mod_applicant->get_applicant( $id );
		if ( !$this->input->post() ) {
			$this->data['applicant']   = $applicant;
			$this->data['form_action'] = 'edit';
			$this->load->view( 'applicant/view_send_mail_doc', $this->data );
		} else {
			$this->form_validation->set_rules( 'title', 'Title', 'trim|required' );
			if ( $this->form_validation->run() ) {
				$this->Mod_applicant->update_general_applicant( $id );
			}
			redirect( "applicant/edit/$id" );
		}
	}
	
	public function show( $id )
	{
		if ( $id ) {
			$applicant                       = $this->Mod_applicant->get_applicant( $id );
			$this->data['blood_groups']      = $this->common_lib->get_blood_group_array();
			$this->data['gender']            = $this->common_lib->get_sex_array();
			$this->data['medical_colleges']  = $this->Mod_common->get_medical_college_list();
			$this->data['present_address']   = $this->Mod_common->get_user_address( $id, 1 );
			$this->data['permanent_address'] = $this->Mod_common->get_user_address( $id, 2 );
			$this->data['divisions']         = $this->Mod_common->get_division_list();
			$this->data['districts']         = $this->Mod_common->get_district_list_div();
			$this->data['thanas']            = $this->Mod_common->get_thana_list();
			$this->data['ssc_list']          = $this->common_lib->get_ssc_exam_array();
			$this->data['hsc_list']          = $this->common_lib->get_hsc_exam_array();
			$this->data['mbbs_list']         = $this->common_lib->get_mbbs_exam_array();
			$this->data['fcps_list']         = $this->common_lib->get_fcps_exam_array();
			$this->data['year_list']         = $this->common_lib->get_year_array();
			$this->data['group_list']        = $this->common_lib->get_group_array();
			$this->data['board_list']        = $this->common_lib->edu_board();
			$this->data['educations']        = $this->Mod_common->get_user_educations( $id );
			$this->data['references']        = $this->Mod_common->get_user_references( $id );
			$this->data['user']              = $applicant;
			$this->load->view( 'applicant/view_details', $this->data );
		} else {
			show_404();
		}
	}
	
	public function complain_reply( $id )
	{
		if ( $id ) {
			$complain_id              	= $this->Mod_applicant->get_complain_id( $id );
			$this->data['complain_id']  = $complain_id;
			$this->load->view( 'applicant/view_reply', $this->data );
		} else {
			show_404();
		}
	}
	
	public function update_pass( $id )
	{
		if ( $id ) {
			$applicant                       = $this->Mod_applicant->get_applicant( $id );
			$this->data['user']              = $applicant;
			$this->load->view( 'applicant/view_pass', $this->data );
		} else {
			show_404();
		}
	}
	
	//new
	public function update_userr( $id )
	{
		if ( $id ) {
			$userr                   = $this->Mod_applicant->get_userr( $id );
			$this->data['userr']      = $userr;
			$this->load->view( 'applicant/view_userr', $this->data );
		} else {
			show_404();
		}
	}
	
	//new
	public function user_role( $id )
	{
		if ( $id ) {
			$user_role                = $this->Mod_applicant->get_user_role( $id );
			$this->data['user_role']  = $user_role;
			$this->load->view( 'applicant/view_user_role', $this->data );
		} else {
			show_404();
		}
	}
	
	//new
	public function give_coupon( $id )
	{
		if ( $id ) {
			$applicant                       = $this->Mod_applicant->get_applicant( $id );
			$this->data['user']              = $applicant;
			$this->load->view( 'applicant/view_coupon', $this->data );
		} else {
			show_404();
		}
	}
	
	
	public function purchased_exam( $id )
	{
		$this->data['page_title'] = "Purchased Exams";
		if ( $id ) {
			$this->load->model( 'model_user/Mod_User', 'Mod_User' );
			$row                          = $this->input->get( 'per_page' ) ? $this->input->get( 'per_page' ) : 0;
			$config                       = config_item( 'pagination' );
			$config['base_url']           = current_url();
			$config['total_rows']         = $this->Mod_User->count_user_exams_with_purchase( $id );
			$config['per_page']           = 10;
			$config['page_query_string']  = TRUE;
			$config['reuse_query_string'] = TRUE;
			$this->pagination->initialize( $config );
			$this->data['record_pos'] = $row;
			$this->data['num_links']  = 2;
			$this->data['total_rows'] = $config['total_rows'];
			$this->data['links']      = $this->pagination->create_links();
			
			$this->data['id']        = $id;
			$this->data['purchases'] = $this->Mod_User->get_user_exams_with_purchase( $id, $config['per_page'], $row );
			
			$this->load->view( 'applicant/view_purchased_exams', $this->data );
		}
	}
	
	public function purchased_packages( $id = NULL )
	{
		$this->data['page_title'] = "Purchased Packages";
		if ( $id ) {
			
			$this->load->model( 'model_user/Mod_User', 'Mod_User' );
			
			$row                          = $this->input->get( 'per_page' ) ? $this->input->get( 'per_page' ) : 0;
			$config                       = config_item( 'pagination' );
			$config['base_url']           = current_url();
			$config['total_rows']         = $this->Mod_User->count_user_packages_with_purchase( $id );
			$config['per_page']           = 10;
			$config['page_query_string']  = TRUE;
			$config['reuse_query_string'] = TRUE;
			$this->pagination->initialize( $config );
			$this->data['record_pos'] = $row;
			$this->data['num_links']  = 2;
			$this->data['total_rows'] = $config['total_rows'];
			$this->data['links']      = $this->pagination->create_links();
			
			$this->data['id']        = $id;
			$this->data['purchases'] = $this->Mod_User->get_user_packages_with_purchase( $id, $config['per_page'], $row );
			$this->load->view( 'applicant/view_purchased_packages', $this->data );
		}
	}
	
	public function exam_result( $exam_id )
	{
		if ( $exam_id ) {
			$this->load->model( 'model_user/Mod_User', 'Mod_User' );
			$exam = $this->Mod_applicant->get_user_exam_result( $exam_id );
			if ( $exam ) {
				$this->data['exam']       = $exam;
				$this->data['page_title'] = "Exam Result";
				$this->load->view( 'applicant/view_result', $this->data );
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}
	
	public function exam_answer( $exam_id )
	{
		if ( $exam_id ) {
			$exam = $this->Mod_applicant->get_user_exam_result( $exam_id );
			if ( $exam ) {
				$this->data['exam']       = $exam;
				$this->data['page_title'] = "Exam Answer - " . $this->data['exam']->exam_data->exam_name;
				$this->data['data']       = $this->Mod_applicant->get_user_exam_questions_with_answers( $exam->exam_id );
				$this->load->view( 'applicant/view_answer', $this->data );
			} else {
				redirect( '/' );
			}
		} else {
			redirect( '/' );
		}
	}
	
	public function change_status( $doc_exam_id, $status )
	{
		if ( $doc_exam_id && $status ) {
			$this->db->update( 'oe_doc_exams', ['status' => $status], ['id' => $doc_exam_id] );
			
			if ( $this->db->affected_rows() ) {
				$this->session->set_flashdata( 'flashOK', 'Exam Status Changed!' );
			} else {
				$this->session->set_flashdata( 'flashError', 'Exam Status Cannot be Changed.' );
			}
			
			redirect( $this->agent->referrer() );
		} else {
			show_404();
		}
	}
}
