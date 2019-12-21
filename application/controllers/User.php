<?php
/**
 * Created by PhpStorm.
 * User: nahian
 * Date: 11/15/17
 * Time: 5:26 PM
 *
 * @property Mod_home    $Mod_home
 * @property Mod_common  $Mod_common
 * @property common_lib  $common_lib
 * @property Mod_setting $Mod_setting
 * @property Mod_User    $Mod_User
 * @property payment     $payment
 */

class User extends CI_Controller
{
	public $data;
	
	public function __construct()
	{
		parent::__construct();
		
		// Redirect if not logged in
		if ( !user_logged_in() ) redirect( "user-login" );
		
		check_user_permission();
		
		// Unset Redirect Url after visiting page
		unset_redirect_url();
		
		$this->load->model( 'model_user/Mod_home', 'Mod_home' );
		$this->load->model( 'model_user/Mod_User', 'Mod_User' );
		$this->load->model( 'Mod_setting', 'Mod_setting' );
		$this->load->library( 'pagination' );
		$this->load->helper( 'date' );
		$this->load->helper( 'utility' );
		
		$this->data['company']             = $this->Mod_common->get_company_data();
		$this->data['msg']                 = $this->load->view( 'web/elements/view_msg', $this->data, TRUE );
		$this->data['user']                = $this->Mod_common->get_row_data_by_id( 'oe_doc_master', $this->session->user->id );
		$this->data['unread_notice_count'] = $this->Mod_common->get_unread_notice_count( $this->session->user->id );
		$this->data['page_title']          = "User Profile";
	}
	
	//new created
	public function user_exam_history_list()
	{
		$this->data['page_title'] = "Exam History (Package List)";
		$this->load->view( 'web/user/view_exam_history_list', $this->data);
	}
	
	//new created
	public function user_exam_src_institute()
	{
		$this->data['page_title'] = "Select Your Institute & Course";
		$this->load->view( 'web/user/view_exam_src_institute', $this->data);
	}

	//new created
	public function user_exam_src_faculty()
	{
		$this->data['page_title'] 	= "Select Your Faculty & Subject";
		$this->data['i'] 			= $_GET['i'];
		$this->load->view( 'web/user/view_exam_src_faculty', $this->data);
	}

	//new created
	public function user_exam_src_candidate()
	{
		$this->data['page_title'] 	= "Select Your Candidate Type";
		$this->data['i'] 			= $_GET['i'];
		$this->data['c'] 			= $_GET['c'];
		$this->data['f'] 			= $_GET['f'];
		$this->data['s'] 			= $_GET['s'];
		$this->load->view( 'web/user/view_exam_src_candidate', $this->data);
	}
	
	//new created
	public function user_exam_src_institute_sif()
	{
		$this->data['page_title'] = "Select Your Institute & Course (SIF)";
		$this->load->view( 'web/user/view_exam_src_institute_sif', $this->data);
	}

	//new created
	public function user_exam_src_faculty_sif()
	{
		$this->data['page_title'] 	= "Select Your Faculty & Subject (SIF)";
		$this->data['i'] 			= $_GET['i'];
		$this->load->view( 'web/user/view_exam_src_faculty_sif', $this->data);
	}

	//new created
	public function user_exam_src_candidate_sif()
	{
		$this->data['page_title'] 	    = "Select Your Candidate Type (SIF)";
		$this->data['i'] 			    = $_GET['i'];
		$this->data['c'] 			    = $_GET['c'];
		$this->data['f'] 			    = $_GET['f'];
		$this->data['s_sif'] 			= $_GET['s'];
		$this->load->view( 'web/user/view_exam_src_candidate_sif', $this->data);
	}
	
	//new created
	public function my_inbox()
	{
		$this->data['page_title'] = "My Inbox";
		
		if (isset($_GET['complain_id'])){
			$this->data['complain_id'] = $_GET['complain_id'];
			
		}
		
		$this->load->view( 'web/user/view_my_inbox', $this->data);
	}
	
	
	public function current_package()
	{
		$this->data['page_title'] = "Current Packages";
		$this->load->view( 'web/user/view_current_package', $this->data);
	}
	
	public function upcoming_package()
	{
		$this->data['page_title'] = "Upcoming Package";
		$this->load->view( 'web/user/view_upcoming_package', $this->data);
	}
	
	
	public function user_profile( $id = NULL )
	{
		$this->data['page_title'] = "View Profile";
		if ( $id ) {
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
			$this->load->view( 'web/user/view_profile', $this->data );
		}
	}
	
	public function edit( $id = NULL )
	{
		$this->data['page_title'] = "Edit Profile";
		if ( $id ) {
			$this->data['id']                = $id;
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
//            $this->data['districts'] = $this->Mod_common->get_district_list_div();
			$this->load->view( 'web/user/view_profile_edit', $this->data );
		}
	}
	
	public function update( $id = NULL )
	{
		if ( $id ) {
			$response = ['success' => FALSE, 'msg' => NULL];
			$this->form_validation->set_rules( 'name', 'Full Name', 'required|trim' );
			$this->form_validation->set_rules( 'bmdc_no', 'BMDC No', 'trim|alpha_dash' );
			$this->form_validation->set_rules( 'phone', 'Phone', 'required|trim|numeric|exact_length[11]' );
			$this->form_validation->set_rules( 'dob', 'Date of Birth', 'required|trim' );
			$this->form_validation->set_rules( 'blood_group', 'Blood Group', 'required|trim' );
			$this->form_validation->set_rules( 'gender', 'Gender', 'required|trim' );
			$this->form_validation->set_rules( 'nid', 'NID', 'required|trim' );
			$this->form_validation->set_rules( 'medical_college', 'Medical College', 'required|trim' );
			
			if ( $this->form_validation->run() ) {
				$flag                = $this->Mod_User->update_user_profile( $id );
				$response['success'] = $flag['status'];
				$response['msg']     = $flag['msg'];
				if ( $flag['status'] ) {
//                    $response['reset'] = TRUE;
					$response['redirect'] = site_url( "user/{$id}" );
				}
			} else {
				http_response_code( '422' );
				$response['errors'] = $this->form_validation->error_array();
			}
			
		} else {
			$response['msg'] = "User Not Found.";
		}
		echo json_encode( $response );
	}
	
	public function change_password( $id = NULL )
	{
		$this->data['page_title'] = "Change Password";
		if ( $id ) {
			$this->data['id'] = $id;
			$this->load->view( 'web/user/view_change_password', $this->data );
		}
	}
	
	public function update_password( $id = NULL )
	{
		$response = ['success' => FALSE, 'msg' => NULL];
		
		$pass = $this->input->post( 'old_password', TRUE );
		
		if ( verifyMyPassword( $pass, $this->data['user']->password ) ) {
			$this->form_validation->set_rules( 'old_password', 'Old Password', 'required|trim|min_length[6]' );
			$this->form_validation->set_rules( 'password', 'Old Password', 'required|trim|min_length[6]' );
			$this->form_validation->set_rules( 'confirm_password', 'Confirm Password', 'required|trim|min_length[6]|matches[password]' );
			
			if ( $this->form_validation->run() ) {
				$flag                = $this->Mod_User->change_password( $id );
				$response['success'] = $flag['status'];
				$response['msg']     = $flag['msg'];
				if ( $flag['status'] ) {
					$response['reset'] = TRUE;
				}
			} else {
				http_response_code( '422' );
				$response['errors'] = $this->form_validation->error_array();
			}
		} else {
			http_response_code( '422' );
			$response['errors'] = ['old_password' => 'Password Doesn\'t Match. Please Input Correct Password'];
		}
		
		
		echo json_encode( $response );
	}
	
	public function exam_selection( $id = NULL )
	{
//        $calc = $this->Mod_common->position_calculation();
//        die(json_encode($calc));
		$this->data['page_title'] = "Exam Selection";
		if ( $id ) {
			$this->data['id']         = $id;
			$subject_id               = $this->input->get( 's' );
			$this->data['subject']    = $this->Mod_common->get_row_data_by_id( 'sif_subject', $subject_id );
			$this->data['institutes'] = $this->Mod_setting->get_institue_list_array();
			$this->data['courses']    = $this->Mod_setting->get_course_list_array( $this->data['subject'] ? $this->data['subject']->institute_id : NULL );
			$this->data['faculties']  = $this->Mod_setting->get_faculty_list_array( $this->data['subject'] ? $this->data['subject']->course_id : NULL );
			$this->data['subjects']   = $this->Mod_setting->get_subject_list_array( $this->data['subject'] ? $this->data['subject']->faculty_id : NULL );
			$this->data['packages'] = $this->Mod_home->get_subject_wise_packages( $subject_id );
			
			//$this->data['packages_f'] = $this->Mod_home->get_faculty_wise_packages( $faculty_id );
			
			$this->data['exam_type']  = $subject_id ? $this->Mod_home->exam_type_for_subject_wise( $subject_id ) : NULL;
//			die( json_encode( $this->data['packages'] ) );
			$this->load->view( 'web/user/view_exam_selection', $this->data );
		}
	}
	
	//new
	public function exam_selection_sif( $id = NULL )
	{
//        $calc = $this->Mod_common->position_calculation();
//        die(json_encode($calc));
		$this->data['page_title'] = "Exam Selection for SIF";
		if ( $id ) {
			$this->data['id']         = $id;
			$subject_id               = $this->input->get( 's_sif' );
			$this->data['subject']    = $this->Mod_common->get_row_data_by_id( 'sif_subject', $subject_id );
			$this->data['institutes'] = $this->Mod_setting->get_institue_list_array();
			$this->data['courses']    = $this->Mod_setting->get_course_list_array( $this->data['subject'] ? $this->data['subject']->institute_id : NULL );
			$this->data['faculties']  = $this->Mod_setting->get_faculty_list_array( $this->data['subject'] ? $this->data['subject']->course_id : NULL );
			$this->data['subjects']   = $this->Mod_setting->get_subject_list_array( $this->data['subject'] ? $this->data['subject']->faculty_id : NULL );
			$this->data['packages']   = $this->Mod_home->get_subject_wise_packages( $subject_id );
			$this->data['exam_type']  = $subject_id ? $this->Mod_home->exam_type_for_subject_wise( $subject_id ) : NULL;
//			die( json_encode( $this->data['packages'] ) );
			$this->load->view( 'web/user/view_exam_selection_sif', $this->data );
		}
	}
	
	public function save_exam( $id = NULL )
	{
		$response = ['success' => FALSE, 'msg' => NULL, 'target' => '.jnn-exam'];
		$this->form_validation->set_rules( 'institute_id', 'Institute ID', 'required|trim|integer' );
		$this->form_validation->set_rules( 'course_id', 'Course ID', 'required|trim|integer' );
		$this->form_validation->set_rules( 'faculty_id', 'Faculty ID', 'required|trim|integer' );
		$this->form_validation->set_rules( 'subject_id', 'Subject ID', 'required|trim|integer' );
		$this->form_validation->set_rules( 'exam[]', 'Exam', 'required|trim' );
		
		if ( $this->form_validation->run() ) {
			$flag                = $this->Mod_User->save_exam_data( $id );
			$response['success'] = $flag['status'];
			$response['msg']     = $flag['msg'];
			if ( $flag['status'] ) {
//                $response['reset'] = TRUE;
				$response['redirect'] = site_url( "user/$id/exam-payment/{$flag['id']}" );
			}
		} else {
//            http_response_code('422');
			$response['msg'] = validation_errors( '<span>', '</span>' );
		}
		
		echo json_encode( $response );
	}
	
	public function save_package( $id = NULL )
	{
		$response = ['success' => FALSE, 'msg' => NULL, 'target' => '.packages'];
		$this->form_validation->set_rules( 'institute_id', 'Institute ID', 'required|trim|integer' );
		$this->form_validation->set_rules( 'course_id', 'Course ID', 'required|trim|integer' );
		$this->form_validation->set_rules( 'faculty_id', 'Faculty ID', 'required|trim|integer' );
		$this->form_validation->set_rules( 'subject_id', 'Subject ID', 'required|trim|integer' );
		$this->form_validation->set_rules( 'package[]', 'Package ID', 'required|trim' );
		
		if ( $this->form_validation->run() ) {
			$flag                = $this->Mod_User->save_package_data( $id );
			$response['success'] = $flag['status'];
			$response['msg']     = $flag['msg'];
			if ( $flag['status'] ) {
//                $response['reset'] = TRUE;
				$response['redirect'] = site_url( "user/$id/exam-payment/{$flag['id']}" );
			}
		} else {
//            http_response_code('422');
			$response['msg'] = validation_errors( '<span>', '</span>' );
		}
		
		echo json_encode( $response );
	}
	
	public function exam_payment( $id = NULL, $pid = NULL )
	{
		if ( $id && $pid ) {
			$this->data['page_title']    = "Payment";
			$this->data['id']            = $id;
			$this->data['pid']           = $pid;
			$this->data['currency_list'] = $this->common_lib->currency_list();
			$this->data['countries']     = $this->Mod_common->get_countries_list();
			$this->data['divisions']     = $this->Mod_common->get_division_list();
			$this->data['districts']     = $this->Mod_common->get_district_list_div();
			$this->data['thanas']        = $this->Mod_common->get_thana_list();
			$this->data['purchase']      = $this->Mod_User->get_user_exam_with_purchase( $id, $pid );
			$this->data['address']       = $this->Mod_common->get_user_address( $id, 1 ); // Present Address = 1
			$this->load->view( 'web/user/view_exam_payment', $this->data );
		}
	}
	
	public function purchased_exam( $id = NULL )
	{
		$this->data['page_title'] = "Purchased Exams";
		if ( $id ) {
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
			$this->load->view( 'web/user/view_purchased_exams', $this->data );
		}
	}
	
	public function purchased_packages( $id = NULL )
	{
		$this->data['page_title'] = "My Packages";
		if ( $id ) {
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
			$this->load->view( 'web/user/view_purchased_packages', $this->data );
		}
	}
	
	public function exam_history( $id = NULL )
	{
		$this->data['page_title'] = "Exam History";
		if ( $id ) {
			$this->data['id'] = $id;
//            $subject_id = $this->input->get('s');
//            $this->data['subject'] = $this->Mod_common->get_row_data_by_id('sif_subject', $subject_id);
//            $this->data['institutes'] = $this->Mod_setting->get_institue_list_array();
//            $this->data['courses'] = $this->Mod_setting->get_course_list_array($this->data['subject'] ? $this->data['subject']->institute_id : NULL);
//            $this->data['faculties'] = $this->Mod_setting->get_faculty_list_array($this->data['subject'] ? $this->data['subject']->course_id : NULL);
//            $this->data['subjects'] = $this->Mod_setting->get_subject_list_array($this->data['subject'] ? $this->data['subject']->faculty_id : NULL);
			
			// Pagination
			$temp_record_postion = $this->input->get( 'per_page' );
			$row                 = $temp_record_postion ? $temp_record_postion : 0;
			
			$config                       = config_item( 'pagination' );
			$config['base_url']           = current_url();
			$config['total_rows']         = $this->Mod_User->count_user_exam_history( $id );
			$config['per_page']           = 15;
			$config['page_query_string']  = TRUE;
			$config['reuse_query_string'] = TRUE;
			$this->pagination->initialize( $config );
			$this->data['record_pos'] = $row;
			$this->data['total_rows'] = $config['total_rows'];
			$this->data['links']      = $this->pagination->create_links();
			
			$this->data['exams'] = $this->Mod_User->get_user_exam_history( $id, $config['per_page'], $row );
//            die(json_encode($this->data['exams']));
			
			$this->load->view( 'web/user/view_exam_history', $this->data );
		}
	}
	
	public function notice( $id = NULL )
	{
		$this->data['page_title'] = "Notice";
		if ( $id ) {
			$this->data['id']      = $id;
			$this->data['notices'] = $this->Mod_User->get_user_notices( $id );
//            die(json_encode($this->data['notices']));
			$this->load->view( 'web/user/view_notice', $this->data );
		}
	}
	
	public function notice_details( $id = NULL, $nid )
	{
		$this->data['page_title'] = "Notice Details";
		if ( $id ) {
			$this->Mod_User->change_user_notice_status( $id, $nid );
			$this->data['id']     = $id;
			$this->data['notice'] = $this->Mod_User->get_user_notice( $id, $nid );
//            die(json_encode($this->data['notices']));
			$this->load->view( 'web/user/view_notice_details', $this->data );
		}
	}
	
	public function process_payment( $user_id, $payment_id )
	{
		$response = ['success' => FALSE, 'msg' => NULL, 'target' => '.edit-profile'];
		
		if ( $this->input->post() ) {
			$this->form_validation->set_rules( 'currency', 'Currency', 'required|alpha|exact_length[3]' );
			$this->form_validation->set_rules( 'email', 'Email', 'required|valid_email' );
			$this->form_validation->set_rules( 'phone', 'Phone', 'required' );
			//$this->form_validation->set_rules( 'address_1', 'Address (Line 1)', 'required' );
			$this->form_validation->set_rules( 'address_1', 'Address (Line 1)' );
			
			if ( $this->form_validation->run() ) {
				
				$flag                = $this->Mod_User->payment_process( $user_id, $payment_id );
				$response['success'] = $flag['status'];
				$response['msg']     = $flag['msg'];
				if ( $flag['status'] ) {
//                $response['reset'] = TRUE;
					$response['redirect'] = $flag['redirect_to'];
				}
				
			} else {
				http_response_code( '422' );
				$response['errors'] = $this->form_validation->error_array();
			}
		} else {
			$response['msg'] = 'Nothing Posted';
		}
		
		echo json_encode( $response );
	}
	
	public function process_free_payment( $user_id, $purchase_id )
	{
		if ( $user_id && $purchase_id ) {
			$flag = $this->Mod_User->payment_free_process( $user_id, $purchase_id );
			
			if ( $flag['status'] ) {
				if ( $flag['status'] ) {
					$this->session->set_flashdata( 'msg', 'Payment Successful. Now you can attend in Exam.' );
					$this->session->set_flashdata( 'msg_type', 'success' );
				} else {
					$this->session->set_flashdata( 'msg', $flag['msg'] );
					$this->session->set_flashdata( 'msg_type', 'danger' );
				}
				
				$purchase = $this->Mod_User->get_purchase_details( $purchase_id );
				
				if ( $purchase ) {
					$function = 'purchased-exam';
					
					if ( $purchase->package_ids ) {
						$function = 'purchased-packages';
					}
					redirect( "user/$user_id/$function" );
				} else {
					redirect( '/' );
				}
			}
		} else {
			show_404();
		}
	}
	
public function exam_histories( $id = NULL )
	{
	    $id = $this->uri->segment(3);
		$this->data['page_title'] = "Exam History";
		if ( $id ) {
			$this->data['id'] = $id;
//            $subject_id = $this->input->get('s');
//            $this->data['subject'] = $this->Mod_common->get_row_data_by_id('sif_subject', $subject_id);
//            $this->data['institutes'] = $this->Mod_setting->get_institue_list_array();
//            $this->data['courses'] = $this->Mod_setting->get_course_list_array($this->data['subject'] ? $this->data['subject']->institute_id : NULL);
//            $this->data['faculties'] = $this->Mod_setting->get_faculty_list_array($this->data['subject'] ? $this->data['subject']->course_id : NULL);
//            $this->data['subjects'] = $this->Mod_setting->get_subject_list_array($this->data['subject'] ? $this->data['subject']->faculty_id : NULL);
			
			// Pagination
			$temp_record_postion = $this->input->get( 'per_page' );
			$row                 = $temp_record_postion ? $temp_record_postion : 0;
			
			$config                       = config_item( 'pagination' );
			$config['base_url']           = current_url();
			$config['total_rows']         = $this->Mod_User->count_user_exam_history( $id );
			$config['per_page']           = 15;
			$config['page_query_string']  = TRUE;
			$config['reuse_query_string'] = TRUE;
			$this->pagination->initialize( $config );
			$this->data['record_pos'] = $row;
			$this->data['total_rows'] = $config['total_rows'];
			$this->data['links']      = $this->pagination->create_links();
			
			$this->data['exams'] = $this->Mod_User->get_user_exam_history( $id, $config['per_page'], $row );
//            die(json_encode($this->data['exams']));
			
			$this->load->view( 'web/user/view_exam_history', $this->data );
		}
	}

	
	public function payment_status( $user_id, $status, $purchase_id )
	{
		$res = $this->Mod_User->save_payment_information( $user_id, $status, $purchase_id );
		
		if ( $status == 1 ) {
			$this->session->set_flashdata( 'msg', 'Payment Successful. Now you can attend in Exam.' );
			$this->session->set_flashdata( 'msg_type', 'success' );
		} elseif ( $status == 8 ) {
			$this->session->set_flashdata( 'msg', 'Payment Failed. Please Try Again.' );
			$this->session->set_flashdata( 'msg_type', 'danger' );
		} elseif ( $status == 9 ) {
			$this->session->set_flashdata( 'msg', 'Payment Canceled. Please Try Again.' );
			$this->session->set_flashdata( 'msg_type', 'warning' );
		}
		
		$purchase = $this->Mod_User->get_purchase_details( $purchase_id );
		
		if ( $purchase ) {
			$function = 'purchased-exam';
			
			if ( $purchase->package_ids ) {
				$function = 'purchased-packages';
			}
			redirect( "user/$user_id/$function" );
		} else {
			redirect( '/' );
		}
		
	}
	
}
