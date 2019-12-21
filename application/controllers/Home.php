<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/**
 * Class Home
 * @property Mod_home   $Mod_home
 * @property Mod_common $Mod_common
 * @property common_lib $common_lib
 */
class Home extends CI_Controller
{
	public $data;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model( 'model_user/Mod_home', 'Mod_home' );
		$this->data['company'] = $this->Mod_common->get_company_data();
		$this->load->library( 'pagination' );
		$this->load->helper( 'date' );
		$this->load->helper( 'utility' );
		$this->data['msg']        = $this->load->view( 'web/elements/view_msg', $this->data, TRUE );
		$this->data['gender']     = $this->common_lib->get_sex_array();
		$this->data['user']       = $this->session->user;
		$this->data['page_title'] = "Home                                                                                                                                                                                                                                                                                                                                                                                                                           ";
	}
	
	
	public function index()
	{

		$this->data['sliders'] = $this->db->select( ['title', 'desc', 'image', 'link'] )->where( 'status', 1 )->order_by( 'sl' )->get( 'oe_slider', 10 )->result();
		
		$this->data['reg_members_count'] = $this->Mod_common->count_unique( 'oe_doc_master' );
		$this->data['topics_count']      = $this->Mod_common->count_unique( 'oe_topics' );
		$this->data['subjects_count']    = $this->Mod_common->count_unique( 'sif_subject', 'subject' );
		// Institutes course, faculty, subject data
		$this->data['institutes'] = $this->Mod_home->get_institute_course_list();
		
		// Advertisement Data
		$this->data['advertisements'] = $this->Mod_home->get_advertisements( 10 );

//        die( json_encode( $this->data['subjects_count'] ) );
		
		$this->data['ins_course']      = $this->Mod_home->get_medicine_wise_result();
		$this->data['surgery']         = $this->Mod_home->get_surgery_wise_result();
		$this->data['basic_science']   = $this->Mod_home->get_basic_science_wise_result();
		$this->data['dentist']         = $this->Mod_home->get_dentist_wise_result();
		$this->data['free_exam_lists'] = $this->Mod_home->get_free_exam();

//        die(json_encode($this->data['sliders']));
		
		$this->load->view( 'web/view_home', $this->data );
	}
	
	public function subject_exam()
	{
		// set redirect url for after login redirection
		redirect_url( uri_string() );
		
		$subject_id               = $this->uri->segment( '2' );
		$this->data['subject']    = $this->Mod_common->get_row_data_by_id( 'sif_subject', $subject_id );
		$this->data['page_title'] = "Exam Types";
		
		$this->data['exam_type'] = $this->Mod_home->exam_type_for_subject_wise( $subject_id );
		$this->data['newses']    = $this->Mod_home->subject_news_details();
		$this->data['packages']  = $this->Mod_home->get_packages();
//        die( json_encode( $this->data['packages'] ) );
		$this->data['instruction'] = $this->Mod_home->get_exam_instruction();
		$this->data['news_events'] = $this->load->view( 'web/elements/view_news_events', $this->data, TRUE );
		$this->load->view( 'web/exam_type/view_exam_type', $this->data );
	}
	
	
	public function news_details()
	{
		$this->data['page_title']  = "News Details";
		$auto_id                   = $this->uri->segment( '2' );
		$this->data['newses']      = $this->Mod_home->subject_news_details();
		$this->data['news_events'] = $this->load->view( 'web/elements/view_news_events', $this->data, TRUE );
		$this->data['new_details'] = $this->Mod_home->get_news_details( $auto_id );
		$this->load->view( 'web/news/view_news_details', $this->data );
	}
	
	public function contact_us()
	{
		$this->data['page_title'] = "Contact Us";
		$this->load->view( 'web/view_contacts', $this->data );
	}
	
	public function feedback_form()
	{
		$this->data['page_title'] = "Feedback Form";
		if ( !$this->input->post() && !$this->input->is_ajax_request() ) {
			//$uid = $this->session->userdata( 'user' )->id;
			if(!empty($this->session->userdata( 'user' )->id)){
			    $this->data['user_id'] = $this->session->userdata( 'user' )->id;    
			}
			
			
			$this->load->view( 'web/view_feeback_form', $this->data );
		} else {
			
			if(isset($_POST['submit'])){
			    
			    $this->data['user_id'] = $this->session->userdata( 'user' )->id;
			    
			    $this->data['uid'] = $_POST['uid'];
			    $this->data['bmdc_no'] = $_POST['bmdc_no'];
			    
			    $this->data['name'] = $_POST['name'];
			    $this->data['email'] = $_POST['email'];
			    $this->data['message'] = base64_encode($_POST['message']);
			    $this->data['status'] = 1;
			    $this->data['created_at'] = date("Y-m-d H:i:s");
			    
			    /*
			    if (($_FILES['filee']['type'] == 'image/jpeg') || ($_FILES['pic']['type'] == 'image/gif') || ($_FILES['pic']['type'] == 'image/png')) {
                    $url = base_url();
                    $f_name = $_FILES['filee']['name'];
                    $f_name = stripslashes($f_name);
                    $f_name = strtolower($f_name);
                    if(strlen($f_name) > 8) {
                        $f_name = substr($f_name, -8);  
                    }
                    $f_name = date("Y_m_d") . "_" . time() . "_" . rand(1000, 9999) ."_". $f_name;
                    move_uploaded_file($_FILES["filee"]["tmp_name"],"./upload/pic/".$f_name);
                    $filee = "upload/pic/".$f_name;
                    $this->data['filee'] = $filee; 
			    }
			    else {
			        $this->data['filee'] = "";
			    }
			    */
			    
			    $this->load->view( 'web/view_feeback_form', $this->data );
			}
			
			/*
			$response = ['success' => FALSE, 'msg' => NULL];
			$this->form_validation->set_rules( 'name', 'Full Name', 'required|trim' );
			$this->form_validation->set_rules( 'email', 'Email', 'required|trim|valid_email' );
			$this->form_validation->set_rules( 'message', 'Opinion', 'required|trim' );
			
			if ( $this->form_validation->run() ) {
				$flag                = $this->Mod_home->save_feedback();
				$response['success'] = $flag['status'];
				$response['msg']     = $flag['msg'];
				if ( $flag['status'] ) {
					$response['reset'] = TRUE;
				}
			} else {
				http_response_code( '422' );
				$response['errors'] = $this->form_validation->error_array();
			}
			
			echo json_encode( $response );
			*/
		}
	}
	
	/**
	 * User Registration
	 */
	public function registration()
	{
		$this->data['page_title'] = "User Registration";
		// Redirect if logged in
		if ( user_logged_in() ) redirect( "user/{$this->data['user']->id}" );
		
		if ( !$this->input->post() && !$this->input->is_ajax_request() ) {
			$this->load->view( 'web/user/view_registration', $this->data );
		} else {
			$response = ['success' => FALSE, 'msg' => NULL];
			$this->form_validation->set_rules( 'name', 'Full Name', 'required|trim' );
			$this->form_validation->set_rules( 'email', 'Email', 'required|trim|valid_email|is_unique[oe_doc_master.email]', ['is_unique' => 'Already Exists! Please Login or use another Email.'] );
			$this->form_validation->set_rules( 'password', 'Password', 'required|trim|min_length[6]' );
			$this->form_validation->set_rules( 'confirm_password', 'Confirm Password', 'required|trim|min_length[6]|matches[password]' );
			$this->form_validation->set_rules( 'bmdc_no', 'BMDC No', 'trim|alpha_dash' );
			$this->form_validation->set_rules( 'phone', 'Phone', 'required|trim|numeric|exact_length[11]' );
			$this->form_validation->set_rules( 'agreement', 'Agreement', 'required|trim' );
			
			if ( $this->form_validation->run() ) {
				$flag                = $this->Mod_home->save_registration();
				$response['success'] = $flag['status'];
				$response['msg']     = $flag['msg'];
				if ( $flag['status'] ) {
					$response['reset'] = TRUE;
				}
			} else {
				http_response_code( '422' );
				$response['errors'] = $this->form_validation->error_array();
			}
			
			echo json_encode( $response );
		}
	}
	
	/**
	 * User Login
	 */
	
	public function user_login()
	{
		$this->data['page_title'] = "User Login";
		if ( !$this->input->post() && !$this->input->is_ajax_request() ) {
			$this->load->view( 'web/user/view_login', $this->data );
		} else {
			$response = ['success' => FALSE, 'msg' => NULL];
			$this->form_validation->set_rules( 'username', 'Username', 'required|trim|valid_email' );
			$this->form_validation->set_rules( 'password', 'Password', 'required|trim|min_length[6]' );
			
			if ( $this->form_validation->run() ) {
				$data                = $this->Mod_home->check_login();
				$response['success'] = $data['status'];
				$response['msg']     = $data['msg'];
				
				if ( $data['status'] ) {
					$response['reset']    = TRUE;
					//$response['redirect'] = redirect_url() ? redirect_url() : site_url( "user/{$data['user']->id}/purchased-packages" );
					$response['redirect'] = redirect_url() ? redirect_url() : site_url( "user/{$data['user']->id}/current-package" );
				}
				
			} else {
				http_response_code( '422' );
				$response['errors'] = $this->form_validation->error_array();
			}
			
			echo json_encode( $response );
		}
	}
		
    
	public function user_login_sif()
	{
		$this->data['page_title'] = "User Login SIF";
		if ( !$this->input->post() && !$this->input->is_ajax_request() ) {
		
			$this->data['name'] = $_GET['name'];
			$this->data['email'] = $_GET['email']."@medigeneit.com";
			$this->data['password'] = $_GET['password'];
			$this->data['pass'] = password_hash( $_GET['password'], PASSWORD_BCRYPT );
			$this->data['bmdc'] = $_GET['bmdc'];
			$this->data['phone'] = $_GET['phone'];
			$this->data['reg_no'] = $_GET['email'];
			$this->data['exam_comm_code'] = $_GET['exam_comm_code'];
			$this->data['topic_code'] = $_GET['topic_code'];

			$this->load->view( 'web/user/view_login_sif', $this->data );
		} else {
			$response = ['success' => FALSE, 'msg' => NULL];
			$this->form_validation->set_rules( 'username', 'Username', 'required|trim|valid_email' );
			$this->form_validation->set_rules( 'password', 'Password', 'required|trim|min_length[6]' );
			
			if ( $this->form_validation->run() ) {
				$data                = $this->Mod_home->check_login();
				$response['success'] = $data['status'];
				$response['msg']     = $data['msg'];
				
				if ( $data['status'] ) {
					$response['reset']    = TRUE;
					//$response['redirect'] = redirect_url() ? redirect_url() : site_url( "user/{$data['user']->id}/exam-selection-sif" );
					$response['redirect'] = redirect_url() ? redirect_url() : site_url( "user/{$data['user']->id}/exam-src-institute-sif#i" );
				}
				
			} else {
				http_response_code( '422' );
				$response['errors'] = $this->form_validation->error_array();
			}
			
			echo json_encode( $response );
		}
	}
	
	/**
	 * Forgot Password
	 */
	public function forgot_password()
	{
		$this->data['page_title'] = "Forgot Password";
		if ( !$this->input->post() && !$this->input->is_ajax_request() ) {
			$this->load->view( 'web/user/view_forgot_password', $this->data );
		} else {
			$response = ['success' => FALSE, 'msg' => NULL];
			$this->form_validation->set_rules( 'email', 'Email', 'required|trim|valid_email' );
			
			if ( $this->form_validation->run() ) {
				$data                = $this->Mod_home->send_password_reset_link();
				$response['success'] = $data['status'];
				$response['msg']     = $data['msg'];
				
				if ( $data['status'] ) {
					$response['reset'] = TRUE;
				}
				
			} else {
				http_response_code( '422' );
				$response['errors'] = $this->form_validation->error_array();
			}
			
			echo json_encode( $response );
		}
	}
	
	/**
	 * Password Reset
	 * @param $hash
	 */
	public function reset_password( $hash )
	{
		$this->data['page_title'] = "Reset Password";
		if ( !$this->input->post() && !$this->input->is_ajax_request() ) {
			$this->data['user'] = $this->Mod_common->getValidatedUser( $hash );
			$this->load->view( 'web/user/view_reset_password', $this->data );
		} else {
			$response = ['success' => FALSE, 'msg' => NULL];
			$this->form_validation->set_rules( 'password', 'Password', 'required|trim|min_length[6]' );
			$this->form_validation->set_rules( 'confirm_password', 'Confirm Password', 'required|trim|min_length[6]|matches[password]' );
			
			if ( $this->form_validation->run() ) {
				$data                = $this->Mod_home->reset_password( $hash );
				$response['success'] = $data['status'];
				$response['msg']     = $data['msg'];
				
				if ( $data['status'] ) {
					$response['redirect'] = site_url( 'user-login' );
				}
				
			} else {
				http_response_code( '422' );
				$response['errors'] = $this->form_validation->error_array();
			}
			
			echo json_encode( $response );
		}
	}
	
	/**
	 * User Logout
	 */
	public function user_logout()
	{
		$this->session->unset_userdata( 'logged_in' );
		$this->session->unset_userdata( 'user' );
		$msg = ['msd_type' => 'success', 'msg' => 'Thanks for your time. Come Back Soon.'];
		$this->session->set_flashdata( $msg );
		redirect( 'user-login' );
	}
	
	public function ipn_listener()
	{
		die( json_encode( $this->input->post() ) );
	}
	
	
	
	
	
	
	public function page( $slug = NULL )
	{
		if ( $slug ) {
			$page = $this->data['modules'] = $this->Mod_home->get_page( $slug );
			
			if ( $page ) {
				$this->data['page_title'] = $page->name;
				$this->data['page']       = $page;
				$this->load->view( 'web/view_page', $this->data );
			} else {
				show_404();
			}
			
		} else {
			redirect( '/' );
		}
	}
	
	public function institute_courses( $id = NULL )
	{
		$institute = $this->Mod_home->get_institute_course_details( $id );
//        die(json_encode($institute));
		if ( $institute ) {
			
			$this->data['page_title']  = $institute->name;
			$this->data['institute']   = $institute;
			$this->data['newses']      = $this->Mod_home->subject_news_details();
			$this->data['news_events'] = $this->load->view( 'web/elements/view_news_events', $this->data, TRUE );
			$this->load->view( 'web/view_institute_details', $this->data );
		} else {
			show_404();
		}
	}
    
    public function make_password_hash( $pass )
    {
        echo makeMyPassword($pass);
	}
	
}
