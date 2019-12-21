<?php

/**
 * Class Mod_setting
 * @property Mod_file_upload $Mod_file_upload
 * @property Mod_common      $Mod_common
 * @property Mod_email       $Mod_email
 */
class Mod_home extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model( 'Mod_file_upload' );
	}
	
	
	public function get_bcps_course_list( $id )
	{
		$this->db->where( 'institute_id', $id );
		$query = $this->db->order_by( "course_name", 'DESC' );
		$query = $this->db->get( 'sif_course' );
		
		if ( $query->num_rows() > 0 ) {
			return $result = $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function get_institute_list_with_subject( $id = NULL )
	{
		$this->db->select( 'id,institute_name name' );
		$id ? $this->db->where( 'id', $id ) : "";
		$this->db->where( 'status', 1 );
		$this->db->order_by( "sl", 'ASC' );
		$query = $this->db->get( 'sif_institute' );
		$list  = [];
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			
			foreach ( $results as $result ) {
				$result->course = $this->get_course_list( $result->id );
				$list[]         = $result;
			}
		}
		
		return $list;
	}
	
	public function get_course_list( $id = NULL )
	{
		$this->db->select( 'id,institute_id,course_name as name,course_code' );
		$id ? $this->db->where( 'institute_id', $id ) : "";
		$this->db->where( 'status', 1 );
		$this->db->order_by( "course_name", 'DESC' );
		$query = $this->db->get( 'sif_course' );
		$list  = [];
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			
			foreach ( $results as $result ) {
				$result->faculties = $this->get_faculty_list( $result->id );
				$list[]            = $result;
			}
		}
		
		return $list;
	}
	
	public function get_institute_course_list( $limit = 4 )
	{
		$this->db->select( 'id, sl, institute_name name' );
		$this->db->where( 'status', 1 );
		$this->db->order_by( "sl" );
		$query = $this->db->get( 'sif_institute', $limit );
		$list  = [];
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			
			foreach ( $results as $result ) {
				$result->courses = $this->get_course_list( $result->id );
				$list[]          = $result;
			}
		}
		
		return $list;
	}
	
	public function get_institute_course_details( $id )
	{
		$this->db->select( 'id, sl, institute_name name' );
		$this->db->where( 'id', $id );
		$this->db->where( 'status', 1 );
		$this->db->order_by( "sl" );
		$query = $this->db->get( 'sif_institute' );
		
		if ( $query->num_rows() > 0 ) {
			$result          = $query->row();
			$result->courses = $this->get_course_list( $result->id );
			return $result;
		}
		return FALSE;
	}
	
	public function get_faculty_list( $id = NULL )
	{
		$this->db->select( 'id,faculty_name as name,faculty_code' );
		$id ? $this->db->where( 'course_id', $id ) : "";
		$this->db->where( 'status', 1 );
		$this->db->order_by( "faculty_name", 'DESC' );
		$query = $this->db->get( 'sif_faculty' );
		$list  = [];
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			
			foreach ( $results as $result ) {
				$result->subjects = $this->get_subject_list( $result->id );
				$list[]           = $result;
			}
		}
		
		return $list;
	}
	
	public function get_subject_list( $id = NULL )
	{
		$this->db->select( 'id,subject as name' );
		$id ? $this->db->where( 'faculty_id', $id ) : "";
		$this->db->where( 'status', 1 );
		$this->db->order_by( "subject", 'DESC' );
		$query = $this->db->get( 'sif_subject' );
		$list  = [];
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			return $results;
		}
		
		return FALSE;
	}
	
	public function get_bsmmu_course_list( $id )
	{
		$this->db->where( 'institute_id', $id );
		$query = $this->db->order_by( "course_name", 'DESC' );
		$query = $this->db->get( 'sif_course' );
		
		if ( $query->num_rows() > 0 ) {
			return $result = $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function get_abrod_course_list( $id )
	{
		$this->db->where( 'institute_id', $id );
		$query = $this->db->order_by( "course_name", 'DESC' );
		$query = $this->db->get( 'sif_course' );
		
		if ( $query->num_rows() > 0 ) {
			return $result = $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function get_medicine_wise_result()
	{
		$this->db->select( 'id,institute_id,course_id' );
		$this->db->where( 'faculty_name', 'Medicine' );
		$this->db->group_by( 'id,institute_id,course_id' );
		$query = $this->db->get( 'sif_faculty' );
		if ( $query->num_rows() > 0 ) {
			return $results = $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function get_surgery_wise_result()
	{
		$this->db->select( 'id,institute_id,course_id' );
		$this->db->where( 'faculty_name', 'Surgery' );
		$this->db->group_by( 'id,institute_id,course_id' );
		$query = $this->db->get( 'sif_faculty' );
		if ( $query->num_rows() > 0 ) {
			return $results = $query->result();
		} else {
			return FALSE;
		}
	}
	
	
	public function get_basic_science_wise_result()
	{
		$this->db->select( 'id,institute_id,course_id' );
		$this->db->where( 'faculty_name', 'Basic Science' );
		$this->db->group_by( 'id,institute_id,course_id' );
		$query = $this->db->get( 'sif_faculty' );
		if ( $query->num_rows() > 0 ) {
			return $results = $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function get_dentist_wise_result()
	{
		$this->db->select( 'id,institute_id,course_id' );
		$this->db->where( 'faculty_name', 'Dentist' );
		$this->db->group_by( 'id,institute_id,course_id' );
		$query = $this->db->get( 'sif_faculty' );
		if ( $query->num_rows() > 0 ) {
			return $results = $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function get_free_exam()
	{
		$this->db->select( '*' );
		$this->db->where( 'free_exam', 1 );
		$this->db->where( 'status', 1 );
		$query = $this->db->get( 'oe_exam' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function exam_type_for_subject_wise( $subject_id )
	{
		$ids = $this->Mod_common->get_user_exams_ids();
		$this->db->select( "id, exam_category_name type, cost_bdt bdt, cost_usd usd, (SELECT COUNT(id) FROM oe_exam OE WHERE status = 1 AND free_exam = 0 AND subject_id = $subject_id and ET.id = OE.exam_id) exam_count" );
//        $ids = [1, 2];
		$sql_ids = "";
		if ( $ids ) {
			$ids     = implode( ',', $ids );
			$sql_ids = " and OE.id not in ($ids)";
		}
		$this->db->select( "(SELECT COUNT(id) FROM oe_exam OE WHERE status = 1 AND free_exam = 0 AND subject_id = $subject_id and ET.id = OE.exam_id $sql_ids) available_exam_count" );
		
		$this->db->where( 'ET.status', 1 );
		$this->db->order_by( 'ET.sl', 'ASC' );
		$query = $this->db->get( 'sif_exam_category ET' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function subject_exam_details( $subject_id )
	{
		$this->db->select( 'id, exam_detail' );
		$this->db->where( 'status', 1 );
		$this->db->where( 'subject_id', $subject_id );
		$query = $this->db->get( 'oe_exam' );
		
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function subject_news_details( $subject_id = NULL )
	{
		$this->db->select( 'id, news_title, created_at' );
		$this->db->where( 'status', 1 );
		$subject_id ? $this->db->where( 'subject_id', $subject_id ) : NULL;
		$query = $this->db->get( 'oe_news' );
		
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function get_packages( $formatted = TRUE )
	{
		$this->db->select( 'P.*, COUNT(PE.exam_id) exam_count' );
		$this->db->where( 'status', 1 );
		$this->db->where( 'end_date >=', date( "Y-m-d h:i:s" ) );
		$this->db->join( 'oe_package_exams PE', 'P.id = PE.package_id', 'LEFT' );
		$this->db->group_by( 'PE.package_id' );
		$this->db->order_by( 'P.type' );
		$query = $this->db->get( 'oe_package P' );
		
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			if ( $formatted ) {
				$dat = [];
				foreach ( $results as $result ) {
					$dat[$result->type][] = $result;
				}
				
				return $dat;
			} else {
				return $results;
			}
			
		}
		return FALSE;
	}
	
	public function get_subject_wise_packages( $subject_id = NULL )
	{
		$this->db->select( 'P.*' );
		$this->db->select( 'E.subject_id' );
		$this->db->select( 'COUNT(PE.exam_id) exam_count' );
		$this->db->where( 'P.status', 1 );
		$subject_id ? $this->db->where( 'E.subject_id', $subject_id ) : NULL;
		$this->db->where( 'end_date >=', date( "Y-m-d h:i:s" ) );
		$this->db->join( 'oe_package_exams PE', 'P.id = PE.package_id', 'LEFT' );
		$this->db->join( 'oe_exam E', 'E.id = PE.exam_id', 'LEFT' );
		$this->db->group_by( 'PE.package_id' );
		$this->db->order_by( 'P.type' );
		$query = $this->db->get( 'oe_package P' );
		
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			return $results;
		}
		return FALSE;
	}
	
	/*
	public function get_faculty_wise_packages( $faculty_id = NULL )
	{
		$this->db->select( 'P.*' );
		$this->db->select( 'E.subject_id' );
		$this->db->select( 'COUNT(PE.exam_id) exam_count' );
		$this->db->where( 'P.status', 1 );
		$subject_id ? $this->db->where( 'E.subject_id', $subject_id ) : NULL;
		$this->db->where( 'end_date >=', date( "Y-m-d h:i:s" ) );
		$this->db->join( 'oe_package_exams PE', 'P.id = PE.package_id', 'LEFT' );
		$this->db->join( 'oe_exam E', 'E.id = PE.exam_id', 'LEFT' );
		$this->db->group_by( 'PE.package_id' );
		$this->db->order_by( 'P.type' );
		$query = $this->db->get( 'oe_package P' );
		
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			return $results;
		}
		return FALSE;
	}
	*/
	
	
	public function get_exam_instruction()
	{
		$this->db->select( 'instruction' );
		$this->db->where( 'status', 1 );
		$query = $this->db->get( 'oe_exam_instruction' );
		
		if ( $query->num_rows() > 0 ) {
			return base64_decode( $query->last_row()->instruction, TRUE );
		} else {
			return FALSE;
		}
	}
	
	
	public function get_news_details( $auto_id )
	{
		$this->db->select( '*' );
		$this->db->where( 'id', $auto_id );
		$query = $this->db->get( 'oe_news' );
		if ( $query->num_rows() > 0 ) {
			return $query->row();
		} else {
			return FALSE;
		}
	}
	
	public function save_registration()
	{
		$response = ['status' => FALSE, 'msg' => NULL];
		if ( $this->input->post() ) {
			$data = [
				'reg_no'   => $this->Mod_common->generate_doc_reg_no(),
				'name'     => $this->input->post( 'name', TRUE ),
				'username' => $this->input->post( 'email', TRUE ),
				'email'    => $this->input->post( 'email', TRUE ),
				'bmdc_no'  => $this->input->post( 'bmdc_no', TRUE ),
				'password' => makeMyPassword( $this->input->post( 'password', TRUE ) ),
				//'pass_view' => $password,
				'pass_view'    => $this->input->post( 'password', TRUE ),
				'phone'    => $this->input->post( 'phone', TRUE ),
				'status'   => 1
			];
			
			$flag = $this->db->insert( 'oe_doc_master', $data );
			
			if ( $flag ) {
				$response['status'] = TRUE;
				$response['msg']    = "Registration Complete.";
			} else {
				$response['msg'] = "Sorry! Your Registration is not processed. Please Try again.";
			}
		}
		return $response;
	}
	
	public function get_user_address( $id )
	{
		if ( $id ) {
			$query = $this->db->where( 'doc_id', $id )->get( 'oe_doc_address' );
			
			if ( $query->num_rows() > 0 ) {
				return $query->result();
			}
		}
		return FALSE;
	}
	
	public function check_login()
	{
		$response = ['status' => FALSE, 'msg' => NULL];
		if ( $this->input->post() ) {
			$username = $this->input->post( 'username', TRUE );
			$password = $this->input->post( 'password', TRUE );
			$where    = ['status' => 1, 'username' => $username];
			$query    = $this->db->where( $where )->get( 'oe_doc_master' );
			if ( $query->num_rows() == 1 ) {
				$row = $query->row();
				if ( verifyMyPassword( $password, $row->password ) ) {
					
					$reset_data = [
						'forgot_token'    => NULL,
						'forgot_validity' => NULL,
					];
					
					$this->db->where( 'id', $row->id )->update( 'oe_doc_master', $reset_data );
					
					$response['status'] = TRUE;
					$data               = ['logged_in' => TRUE, 'user' => $row];
					$this->session->set_userdata( $data );
					$response['user'] = $row;
					$response['msg']  = "Login Successful! You'll be redirected soon.";
				} else {
					$response['msg'] = "Username and password not match";
				}
			} else {
				$response['msg'] = "User not registered.";
			}
		}
		return $response;
	}
	
	/**
	 * Send Password reset link
	 */
	public function send_password_reset_link()
	{
		$response = ['status' => FALSE, 'msg' => NULL];
		if ( $this->input->post() ) {
			$email = $this->input->post( 'email', TRUE );
			$where = ['email' => $email];
			$query = $this->db->where( $where )->get( 'oe_doc_master' );
			if ( $query->num_rows() == 1 ) {
				$row = $query->row();
				
				$hash       = $this->Mod_common->generate_reset_hash( $email );
				$reset_data = [
					'forgot_token'    => $hash,
					'forgot_validity' => date( 'Y-m-d H:i:s', strtotime( "+1 week" ) ),
				];
//                die(json_encode($reset_data));
				$flag = $this->db->where( 'id', $row->id )->update( 'oe_doc_master', $reset_data );
				
				$msg    = "Your Password reset link is: <a href='" . site_url( 'reset-password/' . $hash ) . "'>Reset Link</a> It will be valid till - " . user_formated_datetime( $reset_data['forgot_validity'] );
				$status = $this->Mod_email->send_email( $email, 'Password Reset Link', $msg );
				
				if ( $flag && $status ) {
					$response['status'] = TRUE;
					$response['msg']    = "Password Reset link sent to your email. It will be valid till - " . user_formated_datetime( $reset_data['forgot_validity'] );
				} else {
					$response['msg'] = "Sorry! Something Went Wrong! Please Try Again.";
				}
				
			} else {
				$response['msg'] = "User not registered.";
			}
		}
		return $response;
	}
	
	/**
	 * Reset Password
	 * @param $hash
	 * @return array
	 */
	public function reset_password( $hash )
	{
		$response = ['status' => FALSE, 'msg' => NULL];
		if ( $this->input->post() ) {
			$row = $this->Mod_common->getValidatedUser( $hash );
			$password = $this->input->post('password', true);
			$reset_data = [
				'forgot_token'    => NULL,
				'forgot_validity' => NULL,
				'password' => makeMyPassword($password),
				'pass_view' => $password,
				'updated_at' => db_date_format(),
			];
			
			$flag = $this->db->where( 'id', $row->id )->update( 'oe_doc_master', $reset_data );
			
			if ( $flag ) {
				$response['status'] = TRUE;
				$response['msg']    = "Your Password has been Reset. Now You can login.";
				$msg                = ['msg_type' => 'success', 'msg' => $response['msg']];
				$this->session->set_flashdata( $msg );
			} else {
				$response['msg'] = "Sorry! Something Went Wrong! Please Try Again.";
			}
		}
		return $response;
	}
	
	public function get_page( $slug )
	{
		$slug ? $this->db->where( 'slug', $slug ) : '';
		$this->db->where( 'status', 1 );
		$query = $this->db->get( 'pages' );
		if ( $query->num_rows() > 0 ) {
			$results = $query->first_row();
			
			return $results;
		}
		return FALSE;
	}
	
	public function get_sliders( $limit = 10 )
	{
		$this->db->select( ['title', 'desc', 'image', 'link'] );
		$this->db->where( 'status', 1 );
		$this->db->order_by( 'sl' );
		$query = $this->db->get( 'oe_slider', $limit );
		
		if ( $query->num_rows() ) {
			return $query->result();
		}
		
		return FALSE;
	}
	
	public function get_advertisements( $limit = 10 )
	{
		$this->db->select( '*' );
		$this->db->where( 'status', 1 );
		$this->db->order_by( 'sl' );
		$query = $this->db->get( 'oe_advertisement', $limit );
		
		if ( $query->num_rows() ) {
			return $query->result();
		}
		
		return FALSE;
	}
	
	public function save_feedback()
	{
		$response = ['status' => FALSE, 'msg' => NULL];
		if ( $this->input->post() ) {
			$data = [
				'name'    => $this->input->post( 'name', TRUE ),
				'email'   => $this->input->post( 'email', TRUE ),
				'message' => base64_encode( $this->input->post( 'message', TRUE ) ),
				'status'  => 1
			];
			
			$flag = $this->db->insert( 'oe_feedbacks', $data );
			
			if ( $flag ) {
				$response['status'] = TRUE;
				$response['msg']    = "Feedback Given. We will get back to you ASAP.";
				
				// send mail to admin
				$mail_data = [
					'subject' => "{$this->data['company']->name} :: Feedback Given by Mr. {$data['name']} ({$data['email']})",
					'message' => $data['message'],
					'email'   => $data['email'],
					'company' => $this->data['company'],
				];
				$msg       = $this->load->view( 'templates/feedback', $mail_data, TRUE );
				$this->Mod_email->send_email( $this->data['company']->email, $mail_data['subject'], $msg );
				
				// send mail to user
				$mail_data2 = [
					'subject' => "{$this->data['company']->name} :: Your Feedback Send Successfully!",
					'message' => base64_encode( "Thanks for sending your feedback. We will get back to you as soon as possible." ),
					'email'   => $data['email'],
					'company' => $this->data['company'],
				];
				$msg_2      = $this->load->view( 'templates/feedback', $mail_data2, TRUE );
				$this->Mod_email->send_email( $data['email'], $mail_data2['subject'], $msg_2 );
				
			} else {
				$response['msg'] = "Sorry! Please Try again.";
			}
		}
		return $response;
	}
	
}
