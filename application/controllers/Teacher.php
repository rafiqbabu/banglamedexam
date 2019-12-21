<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of teacher
 *
 * @author iPLUS DATA
 * Date : 02-March-2014
 * @property Mod_common  $Mod_common
 * @property Mod_teacher $Mod_teacher
 * @property common_lib  $common_lib
 * @property Mod_email   $Mod_email
 */
class Teacher extends My_Controller
{

	private $record_per_page  = 20;
	private $record_num_links = 5;

//    private $data = '';

	public function __construct()
	{
		parent::__construct();

		$this->data['module_name'] = "Teacher";
		$this->load->library( 'pagination' );
		$this->load->library( 'common_lib' );
		$this->load->model( 'Mod_teacher' );
		$this->load->model( 'Mod_setting' );
		$this->load->model( 'Mod_common' );
//        $this->load->model('Mod_admission');
		$this->load->model( 'Mod_file_upload' );
		$this->load->helper( 'string' );
		$this->load->helper( 'utility' );
		$this->data['ssc_exam_array'] = $this->common_lib->get_ssc_exam_array();
		$this->data['year_array'] = $this->common_lib->get_year_array();
		$this->data['group'] = $this->common_lib->get_group_array();
		$this->data['edu_board'] = $this->common_lib->edu_board();
		$this->data['hsc_exam_array'] = $this->common_lib->get_hsc_exam_array();
		$this->data['mbbs_exam_array'] = $this->common_lib->get_mbbs_exam_array();
		$this->data['fc_exam_array'] = $this->common_lib->get_fcps_exam_array();
		$this->data['md_exam_array'] = $this->common_lib->get_mdentrance_exam_array();
		$this->data['evaluate_value'] = $this->common_lib->evaluation_value();
		$this->data['blood_group'] = $this->common_lib->get_blood_group_array();
		$this->data['type_list'] = $this->common_lib->add_type();
		$this->data['division_list'] = $this->Mod_common->get_division_list();
		$this->data['mai_district_list'] = $this->Mod_common->get_district_list_div();
		$this->data['mai_upazilla_list'] = $this->Mod_common->get_upazila_list_dist();
		$this->data['sex_array'] = $this->common_lib->get_sex_array(); /* get sex as array */
		$this->data['religion_array'] = $this->common_lib->get_religion_array(); /* get Religion as array */
		$this->data['course_list'] = $this->Mod_teacher->get_course_list_array();
		$this->data['faculty_list'] = $this->Mod_teacher->get_faculty_list_array();
		$this->data['subject_list'] = $this->Mod_setting->get_subject_list_array();
		$this->data['collage_list'] = $this->Mod_setting->get_collage_list_array();
//        $this->data['status_array'] = $this->common_lib->get_status_array();
//        $this->data['subject_list'] = $this->Mod_common->get_subject_list();
//        $this->data['room_list'] = $this->Mod_common->get_rooms_array();
		$this->data['topic_list'] = $this->Mod_common->get_topic_list();

		$this->data['teacher_id'] = $this->teacher_id;

		$this->data['teacher_auto_id'] = $this->Mod_teacher->get_auto_id( $this->teacher_id );
		//print_r($this->data['teacher_auto_id']);exit;
		$this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
	}

	function index()
	{
		$this->data['form_action'] = "add";     //add new line
		array_push( $this->data['breadcrumb'], 'Add Teacher' );
		$this->load->view( 'teacher/view_add_teacher', $this->data );
	}

	/**
	 *
	 */
	function save()
	{

		$this->form_validation->set_rules( 'tec_name', 'Teacher Name', 'required' );
		$this->form_validation->set_rules( 'fath_name', 'Father Name', 'required' );
		$this->form_validation->set_rules( 'mother_name', 'Mother Name', 'required' );
		$this->form_validation->set_rules( 'dob', 'Date Of Birth', 'required' );
		$this->form_validation->set_rules( 'joining_date', 'Joining Date', 'required' );
		// $this->form_validation->set_rules('gender', 'Gender', 'required');
		// $this->form_validation->set_rules('religion', 'Religion', 'required');
		$this->form_validation->set_rules( 'mobile', 'Mobile', 'required' );
		$this->form_validation->set_rules( 'bmdc_no', 'BMDC NO', 'required|is_unique[sif_teacher.bmdc_no]' );


		if ( $this->form_validation->run() == FALSE ) {
			$this->data['form_action'] = "add";     //add new line
			$this->load->view( 'teacher/view_add_teacher', $this->data );
		} else {
			$res_flag = $this->Mod_teacher->save_data();
			if ( $res_flag['status'] ) {
				$this->session->set_flashdata( 'flashOK', 'Teacher Information saved successfully' );
			} else {
				$this->session->set_flashdata( 'flashError', $res_flag['msg'] );
			}
			redirect( 'teacher' );
		}
	}

	function records()
	{
		array_push( $this->data['breadcrumb'], 'Teachers List' );
		$row = 0;
		$temp_record_postion = $this->uri->segment( 3 );

		if ( !empty ( $temp_record_postion ) ) {
			$row = $temp_record_postion;
		} else {
			$this->session->unset_userdata( 'sql_where_session' );
		}

		$config['base_url'] = base_url() . 'teacher/records';
		$config['total_rows'] = $this->Mod_teacher->count_records();
		$config['per_page'] = $this->record_per_page;
		$config['num_links'] = $this->record_num_links;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize( $config );

		$this->data['record_pos'] = $row;
		$this->data['total_rows'] = $this->Mod_teacher->count_records();
		$this->data['links'] = $this->pagination->create_links();

		$this->data['rec'] = $this->Mod_teacher->get_records_list( $this->record_per_page, $row );
//        echo '<pre>';
//        print_r($this->data['rec']); exit;
		$this->load->view( 'teacher/view_teacher_list', $this->data );
	}

	function profile()
	{
		array_push( $this->data['breadcrumb'], 'Profile' );
		$teacher_id = $this->uri->segment( 3 );
		if ( $this->ion_auth->in_group( 4 ) && $teacher_id != $this->data['user_auto_id'] ) {
			show_error( 'Sorry, You are not allowed to see this page', 403, 'Unauthorised!' );
		}
		$get_details = $this->Mod_teacher->get_details( $teacher_id );
		if ( $get_details ) {
			$this->data['res'] = $get_details;

			// echo "<pre/>";
			// print_r($this->data['res']);
			// exit();

			$this->data['edu_record'] = $this->Mod_teacher->get_education_record( $teacher_id );
			$this->load->view( 'teacher/view_teacher_profile', $this->data );
		} else {
			show_404();
		}
	}


	function print_profile()
	{
		$teacher_id = $this->uri->segment( 3 );
		$get_details = $this->Mod_teacher->get_details( $teacher_id );
		$this->data['record'] = $get_details;
		$this->data['edu_record'] = $this->Mod_teacher->get_education_record( $teacher_id );
		$this->load->view( 'teacher/view_teacher_profile_print', $this->data );
	}

	public function schedule()
	{
		array_push( $this->data['breadcrumb'], 'Schedule' );
		$teacher_id = $this->uri->segment( 3 );
		$this->data['schedules'] = $this->Mod_teacher->get_schedules_data( $teacher_id );
		$this->load->view( 'schedule/view_teacher_class_schedule', $this->data );
	}

	public function evaluation_result()
	{
		array_push( $this->data['breadcrumb'], 'Evaluation' );
		$schedule_id = $this->uri->segment( 3 );
		$this->data['schedule_id'] = $schedule_id;
		$this->data['t_eva_list'] = $this->common_lib->teacher_evalution_list();
		$this->data['evaluation_results'] = $this->Mod_teacher->get_evaluation_result( $schedule_id );
		$this->load->view( 'schedule/view_evaluation_result', $this->data );
	}


	public function edit()
	{
		$this->data['form_action'] = 'edit';
		$teacher_id = $this->uri->segment( 3 );
		$this->data['res'] = $this->Mod_teacher->get_courese_plan_code_number( $teacher_id );
		$this->data['edu_record'] = $this->Mod_teacher->get_education_record( $teacher_id );
		$this->load->view( 'teacher/view_add_teacher', $this->data );
	}

	public function update_teacher_info()
	{
		$this->form_validation->set_rules( 'tec_name', 'Teacher Name', 'required' );
		$this->form_validation->set_rules( 'fath_name', 'Father Name', 'required' );
		$this->form_validation->set_rules( 'mother_name', 'Mother Name', 'required' );
		$this->form_validation->set_rules( 'dob', 'Date Of Birth', 'required' );
		// $this->form_validation->set_rules('gender', 'Gender', 'required');
		// $this->form_validation->set_rules('religion', 'Religion', 'required');
		$this->form_validation->set_rules( 'mobile', 'Mobile', 'required' );
		$this->form_validation->set_rules( 'bmdc_no', 'BMDC NO', 'required' );

		if ( $this->form_validation->run() == FALSE ) {
			$this->data['form_action'] = "add";     //add new line
			$this->load->view( 'teacher/view_add_teacher', $this->data );
		} else {
			$auto_id = $this->input->post( 'auto_id' );
			$res_flag = $this->Mod_teacher->update_data( $auto_id );
			if ( !empty( $res_flag ) ) {
				$this->session->set_flashdata( 'flashOK', 'Information Update successfully' );
			} else {
				$this->session->set_flashdata( 'flashError', 'Failed to Update information' );
			}
			redirect( 'teacher/records' );
		}
	}


}
