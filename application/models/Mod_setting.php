<?php

/**
 * Class Mod_setting
 * @property Mod_file_upload $Mod_file_upload
 */
class Mod_setting extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model( 'Mod_file_upload' );
		$this->orginal_file_path = realpath( APPPATH . '../uploads' );
	}
	
	
	function save_course_info( $user_email )
	{
		$data   = array(
			'institute_id' => $this->input->post( 'institute_id', TRUE ),
			'course_name'  => $this->input->post( 'course_name', TRUE ),
			'course_code'  => $this->input->post( 'course_code', TRUE ),
			'created_by'   => $user_email,
			'status'       => $this->input->post( 'status', TRUE ),
		);
		$result = $this->db->insert( 'sif_course', $data );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}
	
	function save_exam_instruction()
	{
		$data   = array(
			'instruction' => base64_encode( $this->input->post( 'instruction' ) ),
			'status'      => $this->input->post( 'status', TRUE ),
		);
		$result = $this->db->insert( 'oe_exam_instruction', $data );
		$id     = $this->db->insert_id();
		$this->db->update( 'oe_exam_instruction', ['status' => 0], ['id !=' => $id] );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function update_exam_instruction( $id )
	{
		$data = array(
			'instruction' => base64_encode( $this->input->post( 'instruction' ) ),
			'status'      => $this->input->post( 'status', TRUE ),
		);
		$this->db->update( 'oe_exam_instruction', ['status' => 0], ['id !=' => $id] );
		$result = $this->db->update( 'oe_exam_instruction', $data, ['id' => $id] );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_course_list( $inst = NULL )
	{
		$inst ? $this->db->where( 'institute_id', $inst ) : '';
		$query = $this->db->order_by( "institute_id", 'ASC' );
		$query = $this->db->order_by( "course_code", 'ASC' );
		$query = $this->db->get( 'sif_course' );
		
		if ( $query->num_rows() > 0 ) {
			return $result = $query->result();
		} else {
			return FALSE;
		}
		
	}
	
	function get_course_details( $auto_id )
	{
		$query = $this->db->where( "id", $auto_id );
		$query = $this->db->get( 'sif_course' );
		
		if ( $query->num_rows() > 0 ) {
			$record = $query->row();
			return $record;
		} else {
			return NULL;
		}
	}
	
	function update_course_info( $auto_id, $user_email )
	{
		$data = array(
			'institute_id' => $this->input->post( 'institute_id', TRUE ),
			'course_name'  => $this->input->post( 'course_name', TRUE ),
			'course_code'  => $this->input->post( 'course_code', TRUE ),
			'updated_by'   => $user_email,
			'status'       => $this->input->post( 'status', TRUE ),
		);
		$this->db->where( 'id', $auto_id );
		$result = $this->db->update( 'sif_course', $data );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_course_list_array( $inst = NULL )
	{
		$courses = $this->get_course_list( $inst );
		if ( !empty( $courses ) ) {
			$array = array('' => 'Choose');
			foreach ( $courses as $course ) {
				//if ($course->status == 1) {
				$array[$course->id] = $course->course_name;
				// }
			}
			return $array;
		} else {
			return FALSE;
		}
	}
	
	function get_institue_list_array()
	{
		$institute = $this->get_institute_list();
		
		$array = array('' => 'Choose');
		foreach ( $institute as $ins ) {
			if ( $ins->status == 1 ) {
				$array[$ins->id] = $ins->institute_name;
			}
		}
		return $array;
	}
	
	function get_faculty_list_array( $crs = NULL )
	{
		$facultys = $this->get_faculty_list( $crs );
		if ( $facultys ) {
			$array = array('' => 'Choose');
			foreach ( $facultys as $faculty ) {
				if ( $faculty->status == 1 ) {
					
					$array[$faculty->id] = $faculty->faculty_name;
				}
			}
			return $array;
		}
	}
	
	function save_faculty_info( $user_email )
	{
		$data   = array(
			'institute_id' => $this->input->post( 'institute_id', TRUE ),
			'faculty_name' => $this->input->post( 'faculty_name', TRUE ),
			'course_id'    => $this->input->post( 'course_id', TRUE ),
			'faculty_code' => $this->input->post( 'faculty_code', TRUE ),
			'created_by'   => $user_email,
			'status'       => $this->input->post( 'status' )
		);
		$result = $this->db->insert( 'sif_faculty', $data );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function update_faculty_info( $auto_id, $user_email )
	{
		$data = array(
			'institute_id' => $this->input->post( 'institute_id', TRUE ),
			'faculty_name' => $this->input->post( 'faculty_name', TRUE ),
			'course_id'    => $this->input->post( 'course_id', TRUE ),
			'faculty_code' => $this->input->post( 'faculty_code', TRUE ),
			'updated_by'   => $user_email,
			'updated_at'   => date( 'Y-m-d H:i:s', now() ),
			'status'       => $this->input->post( 'status' )
		);
		$this->db->where( 'id', $auto_id );
		$result = $this->db->update( 'sif_faculty', $data );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_faculty_list( $crs = NULL )
	{
		$crs ? $this->db->where( 'course_id', $crs ) : NULL;
		$query = $this->db->order_by( "institute_id, course_id, faculty_code", 'ASC' );
		$query = $this->db->get( 'sif_faculty' );
		
		if ( $query->num_rows() > 0 ) {
			return $result = $query->result();
		} else {
			return FALSE;
		}
		
		//return $result;
	}
	
	function get_faculty_details( $auto_id )
	{
		$query = $this->db->where( "id", $auto_id );
		$query = $this->db->get( 'sif_faculty' );
		
		if ( $query->num_rows() > 0 ) {
			$record = $query->row();
			return $record;
		} else {
			return NULL;
		}
	}
	
	function get_session_list()
	{
		$query = $this->db->order_by( "ses_id", 'ASC' );
		$query = $this->db->get( 'sif_session' );
		
		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			return $result;
		}
		
		return FALSE;
		
	}
	
	
	function get_session_list_array()
	{
		$session = $this->get_session_list();
		
		$array = array('' => 'Choose');
		foreach ( $session as $ses ) {
			$array[$ses->ses_id] = $ses->ses_name;
		}
		return $array;
	}
	
	
	function get_batch_list_array_for_profile()
	{
		$subject_list = $this->get_batch_list();
		$array        = array('' => 'Choose');
		if ( $subject_list ) {
			foreach ( $subject_list as $sub ) {
				$array[$sub->batch_code] = $sub->subject;
			}
		}
		return $array;
	}
	
	function get_subject_list_array( $faculty = NULL )
	{
		$array = array('' => 'Choose');
		$this->db->select( ['id', 'subject'] );
		$faculty ? $this->db->where( 'faculty_id', $faculty ) : NULL;
		$this->db->where( 'status', 1 );
		$this->db->order_by( "subject", 'ASC' );
		$query = $this->db->get( 'sif_subject' );
		
		if ( $query->num_rows() > 0 ) {
			$subject_list = $query->result();
			foreach ( $subject_list as $sub ) {
				$array[$sub->id] = $sub->subject;
			}
		}
		return $array;
	}
	
	function get_collage_list_array()
	{
		$collage_list = $this->get_collage_list();
		$array        = array('' => 'Choose');
		foreach ( $collage_list as $collage ) {
			$array[$collage->id] = $collage->collage_name;
		}
		return $array;
	}
	
	function get_collage_list()
	{
		$query = $this->db->order_by( "collage_name", 'ASC' );
		$query = $this->db->get( 'sif_medical_collage' );
		
		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			return $result;
		}
		
		return FALSE;
	}
	
	function get_package_des_list_array()
	{
		$list  = $this->service_pack_description_list();
		$array = array();
		foreach ( $list as $ser ) {
			if ( $ser->status == 1 ) {
				$array[$ser->id] = $ser->description;
			}
		}
		return $array;
	}
	
	function get_class_topic_list()
	{
		$query = $this->db->order_by( "id", 'ASC' );
		$query = $this->db->get( 'sif_class_topic' );
		
		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			return $result;
		}
		
		return FALSE;
	}
	
	
	function save_class_topic_info( $user_email )
	{
		$topics = array();
		$topic  = $this->input->post( 'class_topic_name' );
		if ( $topic ) {
			foreach ( $topic as $i => $top ) {
				$data = array(
					'course_code'      => $this->input->post( 'course_code', TRUE ),
					'faculty_code'     => $this->input->post( 'faculty_code', TRUE ),
					'subject_id'       => $this->input->post( 'subject_id', TRUE ),
					'class_topic_name' => $top,
					'created_by'       => $user_email,
					'status'           => $this->input->post( 'status' )
				);
				
				$result = $this->db->insert( 'sif_class_topic', $data );
			}
			
			if ( $result ) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
	
	
	public function save_chapter_info()
	{
		$data = array(
			'chapter_name' => $this->input->post( 'chapter_name', TRUE ),
			'created_by'   => AUTH_EMAIL,
			'status'       => $this->input->post( 'status', TRUE ),
		);
		
		$query = $this->db->insert( 'oe_chapter', $data );
		
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_chapter_list()
	{
		$this->db->select( '*' );
		$query = $this->db->get( 'oe_chapter' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
		
	}
	
	function get_chapter_list_array()
	{
		$values = $this->get_chapter_list();
		if ( $values ) {
			foreach ( $values as $chapter ) {
				$array [$chapter->id] = $chapter->chapter_name;
			}
		}
		return $array;
		
	}
	
	public function get_chapter_value( $auto_id )
	{
		$this->db->where( 'id', $auto_id );
		$query = $this->db->get( 'oe_chapter' );
		if ( $query->num_rows() > 0 ) {
			return $query->row();
		} else {
			return FALSE;
		}
	}
	
	
	public function update_chapter_info( $auto_id, $user_email )
	{
		$data = array(
			'chapter_name' => $this->input->post( 'chapter_name', TRUE ),
			'updated_by'   => $user_email,
			'status'       => $this->input->post( 'status', TRUE ),
		);
		$this->db->where( 'id', $auto_id );
		$query = $this->db->update( 'oe_chapter', $data );
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	
	function save_exam_info( $user_email )
	{
		$data   = array(
			'exam_name'  => $this->input->post( 'exam_name', TRUE ),
			'status'     => $this->input->post( 'status', TRUE ),
			'created_by' => $user_email,
		);
		$result = $this->db->insert( 'sif_exam_type', $data );
		
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	
	function get_exam_details( $auto_id )
	{
		$query = $this->db->where( "id", $auto_id );
		$query = $this->db->get( 'sif_exam_type' );
		if ( $query->num_rows() > 0 ) {
			$record = $query->row();
			return $record;
		} else {
			return NULL;
		}
	}
	
	
	function update_exam_info( $auto_id, $user_email )
	{
		$data = array(
			'exam_name'  => $this->input->post( 'exam_name', TRUE ),
			'status'     => $this->input->post( 'status', TRUE ),
			'updated_by' => $user_email,
		);
		$this->db->where( 'id', $auto_id );
		$result = $this->db->update( 'sif_exam_type', $data );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	
	function save_session_info( $user_email )
	{
		$data   = array(
			'ses_name'   => $this->input->post( 'ses_name', TRUE ),
			'ses_id'     => $this->input->post( 'ses_id', TRUE ),
			//'subject_id' => $this->input->post('subject_id', TRUE),
			'status'     => $this->input->post( 'status', TRUE ),
			'created_by' => $user_email,
		);
		$result = $this->db->insert( 'sif_session', $data );
		
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function save_fee_info( $user_email )
	{
		$data   = array(
			'course_code'    => $this->input->post( 'course_code', TRUE ),
			'ser_pack_id'    => $this->input->post( 'ser_pack_id', TRUE ),
			'fee_amount'     => $this->input->post( 'fee_amount', TRUE ),
			'old_fee_amount' => $this->input->post( 'old_fee_amount', TRUE ),
			'status'         => $this->input->post( 'status', TRUE ),
			'created_by'     => $user_email,
		);
		$result = $this->db->insert( 'sif_fee', $data );
		
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_fee_details( $auto_id )
	{
		$query = $this->db->where( "id", $auto_id );
		$query = $this->db->get( 'sif_fee' );
		if ( $query->num_rows() > 0 ) {
			$record = $query->row();
			return $record;
		} else {
			return NULL;
		}
	}
	
	function get_fee_list()
	{
		$query = $this->db->order_by( "id", 'ASC' );
		$query = $this->db->get( 'sif_fee' );
		
		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			return $result;
		}
		
		return FALSE;
	}
	
	function update_fee_info( $auto_id )
	{
		$data = array(
			'course_code'    => $this->input->post( 'course_code', TRUE ),
			'ser_pack_id'    => $this->input->post( 'ser_pack_id', TRUE ),
			'fee_amount'     => $this->input->post( 'fee_amount', TRUE ),
			'old_fee_amount' => $this->input->post( 'old_fee_amount', TRUE ),
			'status'         => $this->input->post( 'status', TRUE ),
			'updated_by'     => AUTH_EMAIL,
		);
		$this->db->where( 'id', $auto_id );
		$result = $this->db->update( 'sif_fee', $data );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	
	function get_class_topic_details( $auto_id )
	{
		$query = $this->db->where( "id", $auto_id );
		$query = $this->db->get( 'sif_class_topic' );
		if ( $query->num_rows() > 0 ) {
			$record = $query->row();
			return $record;
		} else {
			return NULL;
		}
	}
	
	function get_session_details( $auto_id )
	{
		$query = $this->db->where( "id", $auto_id );
		$query = $this->db->get( 'sif_session' );
		if ( $query->num_rows() > 0 ) {
			$record = $query->row();
			return $record;
		} else {
			return NULL;
		}
	}
	
	
	function update_class_topic_info( $auto_id, $user_email )
	{
		
		$topics = array();
		$topic  = $this->input->post( 'class_topic_name' );
		if ( $topic ) {
			foreach ( $topic as $i => $top ) {
				$data = array(
					'course_code'      => $this->input->post( 'course_code', TRUE ),
					'faculty_code'     => $this->input->post( 'faculty_code', TRUE ),
					'subject_id'       => $this->input->post( 'subject_id', TRUE ),
					'class_topic_name' => $top,
					'updated_by'       => AUTH_EMAIL,
					'status'           => $this->input->post( 'status' )
				);
				$this->db->where( 'id', $auto_id );
				$result = $this->db->update( 'sif_class_topic', $data );
			}
			
			if ( $result ) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
	
	function update_session_info( $auto_id, $user_email )
	{
		$data = array(
			'ses_name'   => $this->input->post( 'ses_name', TRUE ),
			'ses_id'     => $this->input->post( 'ses_id', TRUE ),
			//'subject_id' => $this->input->post('subject_id', TRUE),
			'status'     => $this->input->post( 'status', TRUE ),
			'updated_by' => $user_email,
		);
		$this->db->where( 'id', $auto_id );
		$result = $this->db->update( 'sif_session', $data );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function save_subject_info( $user_email )
	{
		$data   = array(
			'institute_id'       => $this->input->post( 'institute_id', TRUE ),
			'course_id'          => $this->input->post( 'course_id', TRUE ),
			'faculty_id'         => $this->input->post( 'faculty_id', TRUE ),
			'subject_faculty_id' => $this->input->post( 'faculty_id', TRUE ),
			'subject'            => $this->input->post( 'subject', TRUE ),
			'status'             => $this->input->post( 'status', TRUE ),
			'created_by'         => $user_email,
		);
		$result = $this->db->insert( 'sif_subject', $data );
		
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_subject_list( $faculty = NULL, $limit = NULL, $row = 0 )
	{
		$sql_where = "";
		
		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$institute_id   = $this->input->post( 'institute_id', TRUE );
			$faculty_id     = $this->input->post( 'faculty_id', TRUE );
			$course_id      = $this->input->post( 'course_id', TRUE );
			$status         = $this->input->post( 'status', TRUE );
			$from_date_time = $this->input->post( 'from_date_time', TRUE );
			$to_date_time   = $this->input->post( 'to_date_time', TRUE );
			$sql_where      .= "id != ''";
			
			if ( !empty( $institute_id ) ) {
				$sql_where .= " and institute_id = '$institute_id'";
			}
			if ( !empty( $faculty_id ) ) {
				$sql_where .= " and faculty_id = '$faculty_id'";
			}
			if ( !empty( $course_id ) ) {
				$sql_where .= " and course_id = '$course_id'";
			}
			if ( !empty( $status ) || $status === '0' ) {
				$sql_where .= " and status = '$status'";
			}
			
			if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
				$final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
				$final_date_to   = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
				$sql_where       .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
			}
			
			$this->session->unset_userdata( 'sql_where_session' );
			$this->session->set_userdata( 'sql_where_session', $sql_where );
			
		} else {
//            $this->session->unset_userdata( 'sql_where_session' );
			$sql_where = $this->session->userdata( 'sql_where_session' );
		}
		
		if ( $sql_where != "" ) {
			$this->db->where( $sql_where );
		}
		$faculty ? $this->db->where( 'faculty_id', $faculty ) : NULL;
		$this->db->order_by( "subject", 'ASC' );
		if ( $limit ) {
			$query = $this->db->get( 'sif_subject', $limit, $row );
		} else {
			$query = $this->db->get( 'sif_subject' );
		}
		
		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			return $result;
		}
		
		return FALSE;
	}
	
	function count_subject_records( $faculty = NULL )
	{
		$sql_where = "";
		
		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$institute_id   = $this->input->post( 'institute_id', TRUE );
			$faculty_id     = $this->input->post( 'faculty_id', TRUE );
			$course_id      = $this->input->post( 'course_id', TRUE );
			$status         = $this->input->post( 'status', TRUE );
			$from_date_time = $this->input->post( 'from_date_time', TRUE );
			$to_date_time   = $this->input->post( 'to_date_time', TRUE );
			$sql_where      .= "id != ''";
			
			if ( !empty( $institute_id ) ) {
				$sql_where .= " and institute_id = '$institute_id'";
			}
			if ( !empty( $faculty_id ) ) {
				$sql_where .= " and faculty_id = '$faculty_id'";
			}
			if ( !empty( $course_id ) ) {
				$sql_where .= " and course_id = '$course_id'";
			}
			if ( !empty( $status ) || $status === '0' ) {
				$sql_where .= " and status = '$status'";
			}
			
			if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
				$final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
				$final_date_to   = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
				$sql_where       .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
			}
			
			$this->session->unset_userdata( 'sql_where_session' );
			$this->session->set_userdata( 'sql_where_session', $sql_where );
			
		} else {
			$sql_where = $this->session->userdata( 'sql_where_session' );
		}
		
		if ( $sql_where != "" ) {
			$this->db->where( $sql_where );
		}
		$faculty ? $this->db->where( 'faculty_id', $faculty ) : NULL;
		$this->db->order_by( "subject", 'ASC' );
		$query = $this->db->get( 'sif_subject' );
		return $query->num_rows();
	}
	
	function get_subject_details( $auto_id )
	{
		$query = $this->db->where( "id", $auto_id );
		$query = $this->db->get( 'sif_subject' );
		if ( $query->num_rows() > 0 ) {
			$record = $query->row();
			return $record;
		} else {
			return NULL;
		}
	}
	
	function update_subject_info( $auto_id, $user_email )
	{
		$data = array(
			'institute_id'       => $this->input->post( 'institute_id', TRUE ),
			'course_id'          => $this->input->post( 'course_id', TRUE ),
			'faculty_id'         => $this->input->post( 'faculty_id', TRUE ),
			'subject_faculty_id' => $this->input->post( 'faculty_id', TRUE ),
			'subject'            => $this->input->post( 'subject', TRUE ),
			'status'             => $this->input->post( 'status', TRUE ),
			'updated_by'         => $user_email,
		);
		// echo "<pre>";
		// print_r($data);
		// exit();
		
		$this->db->where( 'id', $auto_id );
		$result = $this->db->update( 'sif_subject', $data );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_exam_type_list()
	{
		$query = $this->db->order_by( "id", 'ASC' );
		$query = $this->db->get( 'sif_exam_type' );
		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			return $result;
		}
		
		return FALSE;
	}
	
	function get_room_type_info()
	{
		$query = $this->db->order_by( "id", 'ASC' );
		$query = $this->db->get( 'sif_room_type' );
		
		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			return $result;
		}
		
		return FALSE;
	}
	
	function save_room_type_info( $user_email )
	{
		$data   = array(
			'floor'      => $this->input->post( 'floor', TRUE ),
			'room_name'  => $this->input->post( 'room_name', TRUE ),
			'capacity'   => $this->input->post( 'capacity', TRUE ),
			'created_by' => $user_email,
			'status'     => $this->input->post( 'status', TRUE )
		);
		$result = $this->db->insert( 'sif_room_type', $data );
		
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_room_type_details( $auto_id )
	{
		$query = $this->db->where( "id", $auto_id );
		$query = $this->db->get( 'sif_room_type' );
		if ( $query->num_rows() > 0 ) {
			$record = $query->row();
			return $record;
		} else {
			return NULL;
		}
	}
	
	function update_room_type_info( $auto_id, $user_name )
	{
		$data = array(
			'floor'      => $this->input->post( 'floor', TRUE ),
			'room_name'  => $this->input->post( 'room_name', TRUE ),
			'capacity'   => $this->input->post( 'capacity', TRUE ),
			'updated_by' => AUTH_EMAIL,
			'updated_at' => date( 'Y-m-d H:i:s', now() ),
			'status'     => $this->input->post( 'status', TRUE )
		);
		$this->db->where( 'id', $auto_id );
		$result = $this->db->update( 'sif_room_type', $data );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_holiday_info()
	{
		$query = $this->db->order_by( "id", 'ASC' );
		$query = $this->db->get( 'sif_holiday' );
		
		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			return $result;
		}
		
		return FALSE;
	}
	
	function save_holiday_info( $user_email )
	{
		$data_from = $this->input->post( 'date_from', TRUE );
		$data_to   = $this->input->post( 'date_to', TRUE );
		if ( $data_from && $data_to ) {
//            $date1 = date_create($data_from);
//            $date2 = date_create($data_to);
//            $duration = date_diff($date1, $date2);
//            $duration1 = $duration->format("%a");
			$diff = $this->date_calculate( $data_from, $data_to );
		} else {
			$diff = '1';
		}
		$data   = array(
			'holiday_topic' => $this->input->post( 'holiday_topic', TRUE ),
			'date_from'     => $this->input->post( 'date_from', TRUE ),
			'date_to'       => $this->input->post( 'date_to', TRUE ),
			'duration'      => $diff,
			'detail'        => $this->input->post( 'detail', TRUE ),
			'created_by'    => $user_email,
			'status'        => $this->input->post( 'status', TRUE )
		);
		$result = $this->db->insert( 'sif_holiday', $data );
		
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_holiday_details( $auto_id )
	{
		$query = $this->db->where( "id", $auto_id );
		$query = $this->db->get( 'sif_holiday' );
		if ( $query->num_rows() > 0 ) {
			$record = $query->row();
			return $record;
		} else {
			return NULL;
		}
	}
	
	function date_calculate( $data_from, $data_to )
	{
		$date_add = new DateTime( $data_to );
		$date_add->modify( "+1 day" );
		$data_to = $date_add->format( 'Y-m-d H:i:s' );
		$diff    = timespan( strtotime( $data_from ), strtotime( $data_to ) );
		return $diff;
	}
	
	function update_holiday_info( $auto_id, $user_email )
	{
		$data_from = date( $this->input->post( 'date_from', TRUE ) );
		$data_to   = $this->input->post( 'date_to', TRUE );
		if ( $data_from && $data_to ) {
			
			$diff = $this->date_calculate( $data_from, $data_to );
			//echo '<pre>';
			//print_r($diff);
			//exit;
			//$duration1 = $duration->format("%R%a");
			// exit;
		} else {
			$diff = '1';
		}
		$data = array(
			'holiday_topic' => $this->input->post( 'holiday_topic', TRUE ),
			'date_from'     => $this->input->post( 'date_from', TRUE ),
			'date_to'       => $this->input->post( 'date_to', TRUE ),
			'duration'      => $diff,
			'detail'        => $this->input->post( 'detail', TRUE ),
			'updated_by'    => $user_email,
			'updated_at'    => date( 'Y-m-d H:i:s', now() ),
			'status'        => $this->input->post( 'status', TRUE )
		);
		$this->db->where( 'id', $auto_id );
		$result = $this->db->update( 'sif_holiday', $data );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	
	function save_collage_list( $user_email )
	{
		$data  = array(
			'collage_name' => $this->input->post( 'collage_name', TRUE ),
			'collage_type' => $this->input->post( 'collage_type', TRUE ),
			'created_by'   => $user_email,
			'status'       => $this->input->post( 'status', TRUE ),
		);
		$query = $this->db->insert( 'sif_medical_collage', $data );
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_med_collage_details( $auto_id )
	{
		$this->db->where( 'id', $auto_id );
		$query = $this->db->get( 'sif_medical_collage' );
		if ( $query->num_rows() > 0 ) {
			return $result = $query->row();
		} else {
			return FALSE;
		}
	}
	
	function get_collages_list()
	{
		$query = $this->db->order_by( "id", 'DESC' );
		$query = $this->db->get( 'sif_medical_collage' );
		
		if ( $query->num_rows() > 0 ) {
			return $result = $query->result();
		}
		return FALSE;
	}
	
	function update_med_collage_info( $auto_id, $user_email )
	{
		$data = array(
			'collage_name' => $this->input->post( 'collage_name', TRUE ),
			'collage_type' => $this->input->post( 'collage_type', TRUE ),
			'updated_by'   => $user_email,
			'status'       => $this->input->post( 'status', TRUE ),
		);
		$this->db->where( 'id', $auto_id );
		$query = $this->db->update( 'sif_medical_collage', $data );
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function service_pack_description_list()
	{
		// $query = $this->db->where("status", '1');
		$query = $this->db->get( 'sif_package_des' );
		
		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			return $result;
		}
		
		return FALSE;
	}
	
	function get_service_package_list_array()
	{
		$pack_list = $this->service_pack_list();
		
		$array = array('' => 'Choose');
		foreach ( $pack_list as $pack ) {
			if ( $pack->status == 1 ) {
				$array[$pack->id] = $pack->ser_pack;
			}
		}
		return $array;
	}
	
	function service_pack_list()
	{
		$query = $this->db->where( "status", '1' );
		$this->db->order_by( 'ser_pack', 'ASC' );
		$query = $this->db->get( 'sif_service_pack' );
		
		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			return $result;
		}
		
		return FALSE;
	}
	
	function get_service_pack_des()
	{
		$this->db->select( '*' );
		$this->db->from( 'sif_service_pack' );
		$this->db->where( 'status', 1 );
		$query = $this->db->get();
		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			
			foreach ( $result as $i => $row ) {
				$this->db->select( 'pd_id' );
				$this->db->where( 'status', 1 );
				$this->db->where( 'sp_id', $row->id );
				$query    = $this->db->get( 'sif_sp_pd_rel' );
				$pd_array = array();
				foreach ( $query->result() as $row ) {
					$this->db->select( 'description' );
					$this->db->where( 'status', 1 );
					$this->db->where( 'id', $row->pd_id );
					$query  = $this->db->get( 'sif_package_des' );
					$pd_des = $query->row()->description;
					array_push( $pd_array, $pd_des );
				}
				$result[$i]->pak_des = implode( ', ', $pd_array );
			}
			
			return $result;
		}
		return FALSE;
	}
	
	function get_service_pack_details( $auto_id )
	{
		$query = $this->db->where( "id", $auto_id );
		$query = $this->db->get( 'sif_service_pack' );
		if ( $query->num_rows() > 0 ) {
			$result = $query->row();
			
			$this->db->select( 'pd_id' );
			$this->db->where( 'status', 1 );
			$this->db->where( 'sp_id', $result->id );
			$query    = $this->db->get( 'sif_sp_pd_rel' );
			$pd_array = array();
			foreach ( $query->result() as $row ) {
				array_push( $pd_array, $row->pd_id );
			}
			$result->pak_des = $pd_array; //explode(',', $pd_array);
			
			
			return $result;
		}
		return FALSE;
	}
	
	function save_service_pack_info( $user_email )
	{
		$data = array(
			'ser_pack'   => $this->input->post( 'ser_pack', TRUE ),
			'created_by' => $user_email,
			'status'     => $this->input->post( 'status', TRUE )
		);
		// $this->db->where('id', $auto_id);
		$result     = $this->db->insert( 'sif_service_pack', $data );
		$service_id = $this->db->insert_id();
		$pack_de    = $this->input->post( 'pd_id', TRUE );
		if ( $pack_de ) {
			foreach ( $pack_de as $key => $value ) {
				$data = array(
					'sp_id'      => $service_id,
					'pd_id'      => $value,
					'created_by' => $user_email,
					'status'     => $this->input->post( 'status', TRUE )
				);
				$this->db->insert( 'sif_sp_pd_rel', $data );
			}
		}
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function update_service_pack_detail( $auto_id, $user_email )
	{
		$this->db->where( 'id', $auto_id );
		$this->db->delete( 'sif_service_pack' );
		$data       = array(
			'ser_pack'   => $this->input->post( 'ser_pack', TRUE ),
			'updated_by' => $user_email,
			'status'     => $this->input->post( 'status', TRUE )
		);
		$result     = $this->db->insert( 'sif_service_pack', $data );
		$service_id = $this->db->insert_id();
		
		$this->db->where( 'sp_id', $auto_id );
		$this->db->delete( 'sif_sp_pd_rel' );
		$pack_de = $this->input->post( 'pd_id', TRUE );
		if ( $pack_de ) {
			foreach ( $pack_de as $key => $value ) {
				$data = array(
					'sp_id'      => $service_id,
					'pd_id'      => $value,
					'created_by' => $user_email,
					'status'     => $this->input->post( 'status', TRUE )
				);
				$this->db->insert( 'sif_sp_pd_rel', $data );
			}
		}
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}
	
	
	function save_service_pack_des_info( $user_email )
	{
		$data = array(
			'description' => $this->input->post( 'description', TRUE ),
			'created_by'  => $user_email,
			'status'      => $this->input->post( 'status', TRUE )
		);
		
		$result = $this->db->insert( 'sif_package_des', $data );
		
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_service_pack_descrip_details( $auto_id )
	{
		$query = $this->db->where( "id", $auto_id );
		$query = $this->db->get( 'sif_package_des' );
		if ( $query->num_rows() > 0 ) {
			$result = $query->row();
			return $result;
		}
		return FALSE;
	}
	
	function update_service_pack_description( $auto_id, $user_email )
	{
		$data = array(
			'description' => $this->input->post( 'description', TRUE ),
			'updated_by'  => $user_email,
			'updated_at'  => date( 'Y-m-d H:i:s', now() ),
			'status'      => $this->input->post( 'status', TRUE )
		);
		$this->db->where( 'id', $auto_id );
		$result = $this->db->update( 'sif_package_des', $data );
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_service_pack()
	{
		$query = $this->db->order_by( "id", 'ASC' );
		$query = $this->db->get( 'sif_sp_pd_rel' );
		
		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			return $result;
		}
		
		return FALSE;
	}
	
	function get_faculty_by_course_id( $course_id )
	{
		$this->db->select( '*' );
		$this->db->where( 'course_id', $course_id );
		$this->db->order_by( 'faculty_name', 'ASC' );
		$query = $this->db->get( 'sif_faculty' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return FALSE;
	}
	
	function get_subjects_by_faculty_code( $faculty_id )
	{
		$this->db->select( 'id,subject' );
		$this->db->where( 'faculty_id', $faculty_id );
		$this->db->order_by( 'subject', 'ASC' );
		$query = $this->db->get( 'sif_subject' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return FALSE;
	}
	
	function get_batch_by_faculty_id( $faculty_code, $course_code )
	{
		$this->db->select( 'id,subject,batch_code' );
		$this->db->where( 'faculty_code', $faculty_code );
		$this->db->where( 'course_code', $course_code );
		$this->db->order_by( 'subject', 'ASC' );
		$query = $this->db->get( 'sif_batch' );
		
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		
		return FALSE;
	}
	
	function get_topic_by_faculty_id( $faculty_code, $course_code )
	{
		$this->db->select( 'id,class_topic_name' );
		$this->db->where( 'faculty_code', $faculty_code );
		$this->db->where( 'course_code', $course_code );
		$this->db->order_by( 'class_topic_name', 'ASC' );
		$query = $this->db->get( 'sif_class_topic' );
		
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		
		return FALSE;
	}
	
	function get_subject_by_faculty_id( $faculty_code, $course_code )
	{
		$this->db->select( 'id,subject' );
		$this->db->where( 'faculty_id', $faculty_code );
		$this->db->where( 'course_id', $course_code );
		$this->db->order_by( 'subject', 'ASC' );
		$query = $this->db->get( 'sif_subject' );
		
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		
		return FALSE;
	}
	
	
	function get_service_pack_amount( $course_code, $ser_pack_id )
	{
		$this->db->select( 'id,fee_amount' );
		$this->db->where( 'course_code', $course_code );
		$this->db->where( 'ser_pack_id', $ser_pack_id );
		$this->db->order_by( 'fee_amount', 'ASC' );
		$query = $this->db->get( 'sif_fee' );
		
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		
		return FALSE;
	}
	
	function save_institute_list( $user_email )
	{
		$data  = array(
			'institute_name' => $this->input->post( 'institute_name', TRUE ),
			'created_by'     => $user_email,
			'status'         => $this->input->post( 'status', TRUE ),
		);
		$query = $this->db->insert( 'sif_institute', $data );
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_institute_list()
	{
		$query = $this->db->order_by( "sl", 'ASC' );
		$query = $this->db->get( 'sif_institute' );
		
		if ( $query->num_rows() > 0 ) {
			return $result = $query->result();
		}
		return FALSE;
	}
	
	function get_institute_details( $auto_id )
	{
		$this->db->where( 'id', $auto_id );
		$query = $this->db->get( 'sif_institute' );
		if ( $query->num_rows() > 0 ) {
			return $result = $query->row();
		} else {
			return FALSE;
		}
	}
	
	function update_institute_info( $auto_id, $user_email )
	{
		$data = array(
			'institute_name' => $this->input->post( 'institute_name', TRUE ),
			'updated_by'     => $user_email,
			'status'         => $this->input->post( 'status', TRUE ),
		);
		$this->db->where( 'id', $auto_id );
		$query = $this->db->update( 'sif_institute', $data );
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function get_evaluation_result( $limit = 20, $row = 0 )
	{
		$sql_where  = "";
		$teacher_id = "";
		$user_name  = "";
		
		$from_date_time = "";
		$to_date_time   = "";
		
		
		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$teacher_id = $this->security->xss_clean( $this->input->post( 'teacher_id' ) );
			$user_name  = $this->security->xss_clean( $this->input->post( 'user_name' ) );
			
			$from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
			$to_date_time   = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
			//$status = $this->security->xss_clean($this->input->post('status'));
			
			$sql_where .= "id != ''";
			
			if ( !empty( $teacher_id ) ) {
				$sql_where .= " and teacher_id = '$teacher_id'";
			}
			
			if ( !empty( $user_name ) ) {
				$sql_where .= " and user_name = '$user_name'";
			}
			
			
			if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
				$final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
				$final_date_to   = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
				$sql_where       .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
			}
			
			$this->session->unset_userdata( 'sql_where_session' );
			$this->session->set_userdata( 'sql_where_session', $sql_where );
			
		} else {
			$sql_where = $this->session->userdata( 'sql_where_session' );
		}
		
		if ( $sql_where != "" ) {
			$this->db->where( $sql_where );
		}
		$query = $this->db->order_by( "id", 'DESC' );
		$query = $this->db->get( 'sif_teacher_evaluation', $limit, $row );
		
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			return $results;
		}
		
		return FALSE;
	}
	
	function count_records()
	{
		
		$sql_where      = "";
		$teacher_id     = "";
		$user_name      = "";
		$from_date_time = "";
		$to_date_time   = "";
		
		
		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$teacher_id = $this->security->xss_clean( $this->input->post( 'teacher_id' ) );
			$user_name  = $this->security->xss_clean( $this->input->post( 'user_name' ) );
			
			$from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
			$to_date_time   = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
			
			
			$sql_where .= "id != ''";
			
			if ( !empty( $teacher_id ) ) {
				$sql_where .= " and teacher_id = '$teacher_id'";
				
			}
			
			if ( !empty( $user_name ) ) {
				$sql_where .= " and user_name = '$user_name'";
			}
			
			if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
				$final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
				$final_date_to   = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
				$sql_where       .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
			}
			
			$this->session->unset_userdata( 'sql_where_session' );
			$this->session->set_userdata( 'sql_where_session', $sql_where );
			
		} else {
			$sql_where = $this->session->userdata( 'sql_where_session' );
		}
		
		if ( $sql_where != "" ) {
			$this->db->where( $sql_where );
		}
		
		$query = $this->db->select( 'id' );
		$query = $this->db->get( 'sif_teacher_evaluation' );
		if ( $query ) {
			return $query->num_rows();
		} else {
			return FALSE;
		}
	}
	
	public function save_question( $user_email )
	{
		$data  = array(
			'question'   => $this->input->post( 'question', TRUE ),
			'created_by' => $user_email,
			'status'     => $this->input->post( 'status', TRUE ),
		);
		$query = $this->db->insert( 'sif_genesis_question', $data );
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function get_question_list()
	{
		$this->db->select( '*' );
		//$this->db->where('status',1);
		$this->db->order_by( 'question', 'ASC' );
		$query = $this->db->get( 'sif_genesis_question' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
		
	}
	
	function get_question_details( $auto_id )
	{
		$this->db->where( 'id', $auto_id );
		$query = $this->db->get( 'sif_genesis_question' );
		if ( $query->num_rows() > 0 ) {
			return $result = $query->row();
		} else {
			return FALSE;
		}
	}
	
	public function update_question_info( $auto_id, $user_email )
	{
		$data = array(
			'question'   => $this->input->post( 'question', TRUE ),
			'updated_by' => $user_email,
			'status'     => $this->input->post( 'status', TRUE ),
		);
		$this->db->where( 'id', $auto_id );
		$query = $this->db->update( 'sif_genesis_question', $data );
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function get_answer_type_array()
	{
		$questions = $this->get_question_list();
		
		$question = array('' => 'Choose');
		foreach ( $questions as $ques ) {
			$question[$ques->id] = $ques->question;
		}
		return $question;
	}


//    public function get_evaluation_user_array()
//    {
//        $this->db->select('id,user_name');
//        
//        $query = $this->db->get('sif_teacher_evaluation');
//        if ($query->num_rows() > 0) {
//            $results = $query->result();
//            $return = array('' => 'Choose');
//            foreach ($results as $result) {
//                $return[$result->id] = $result->user_name;
//            }
//
//            return $return;
//        }
//        return false;
//    }
	
	public function get_general_info()
	{
		$this->db->where( 'status', 1 );
		$query = $this->db->get( 'sif_general_info' );
		if ( $query->num_rows() > 0 ) {
			return $query->last_row();
		}
		return FALSE;
	}
	
	public function save_general_info()
	{
		$id        = $this->input->post( 'hidden_auto_id', TRUE );
		$data      = array(
			'name'           => $this->input->post( 'name', TRUE ),
			'address'        => $this->input->post( 'address', TRUE ),
			'email'          => $this->input->post( 'email', TRUE ),
			'fb_id'          => $this->input->post( 'fb_id', TRUE ),
			'twitter'        => $this->input->post( 'twitter', TRUE ),
			'phone'          => $this->input->post( 'phone', TRUE ),
			'tagline'        => $this->input->post( 'tagline', TRUE ),
			'website'        => $this->input->post( 'website', TRUE ),
			'smtp_email'     => $this->input->post( 'smtp_email', TRUE ),
			'smtp_host'      => $this->input->post( 'smtp_host', TRUE ),
			'smtp_user'      => $this->input->post( 'smtp_user', TRUE ),
			'smtp_pass'      => $this->input->post( 'smtp_pass', TRUE ),
			'smtp_port'      => $this->input->post( 'smtp_port', TRUE ),
			'ah_stu_fee'     => $this->input->post( 'ah_stu_fee', TRUE ),
			'ah_tec_payment' => $this->input->post( 'ah_tec_payment', TRUE ),
			'status'         => $this->input->post( 'status', TRUE ) ? $this->input->post( 'status', TRUE ) : 1,
		);
		$condition = array('size' => '300', 'width' => '1000');
		
		$logo = $this->Mod_file_upload->upload_file( 'logo', 'logo', $condition, '', 'jpg|jpeg|png|gif' );
		$flag = FALSE;
		if ( $logo['status'] ) {
			$data['logo'] = $logo['path'];
		} else {
			isset( $logo['msg'] ) ? $this->session->set_flashdata( 'flashError', $logo['msg'] ) : '';
		}
		if ( !$id ) {
			$flag = $this->db->insert( 'sif_general_info', $data );
			$this->session->set_flashdata( 'flashOK', 'General Info Saved Successfully.' );
		} else {
			$this->db->where( 'id', $id );
			$flag = $this->db->update( 'sif_general_info', $data );
			$this->session->set_flashdata( 'flashOK', 'General Info Saved Successfully.' );
		}
		
		return $flag;
	}
	
	public function save_topics_info()
	{
		$data = array(
			'name'           => $this->input->post( 'name', TRUE ),
			'chapter_ref_id' => $this->input->post( 'chapter_ref_id', TRUE ),
			'created_by'     => AUTH_EMAIL,
			'status'         => $this->input->post( 'status', TRUE ),
		);
		
		$query = $this->db->insert( 'oe_topics', $data );
		
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function get_topics_list( $status = NULL, $limit = 0, $row = 0 )
	{
		$this->db->select( '*' );
		
		$sql_where = "";
		
		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$chapter        = $this->input->post( 'chapter', TRUE );
			$from_date_time = $this->input->post( 'from_date_time', TRUE );
			$to_date_time   = $this->input->post( 'to_date_time', TRUE );
			$sql_where      .= "id != ''";
			
			if ( !empty( $chapter ) ) {
				$sql_where .= " and chapter_ref_id = '$chapter'";
			}
			if ( !empty( $status ) || $status === '0' ) {
				$sql_where .= " and status = '$status'";
			}
			
			if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
				$final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
				$final_date_to   = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
				$sql_where       .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
			}
			
			$this->session->unset_userdata( 'sql_where_session' );
			$this->session->set_userdata( 'sql_where_session', $sql_where );
			
		} else {
			$sql_where = $this->session->userdata( 'sql_where_session' );
		}
		
		if ( $sql_where != "" ) {
			$this->db->where( $sql_where );
		}
		
		if ( $status ) {
			$this->db->where( 'status', $status );
		}
		$this->db->order_by( 'id', 'DESC' );
		if ( $limit ) {
			$query = $this->db->get( 'oe_topics', $limit, $row );
		} else {
			$query = $this->db->get( 'oe_topics' );
		}
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function count_topic_records()
	{
		$this->db->select( 'id' );
		$sql_where = "";
		
		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$chapter        = $this->input->post( 'chapter', TRUE );
			$from_date_time = $this->input->post( 'from_date_time', TRUE );
			$to_date_time   = $this->input->post( 'to_date_time', TRUE );
			$sql_where      .= "id != ''";
			
			if ( !empty( $chapter ) ) {
				$sql_where .= " and chapter_ref_id = '$chapter'";
			}
//            if ( !empty( $status ) || $status === '0') {
//                $sql_where .= " and status = '$status'";
//            }
			
			if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
				$final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
				$final_date_to   = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
				$sql_where       .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
			}
			
			$this->session->unset_userdata( 'sql_where_session' );
			$this->session->set_userdata( 'sql_where_session', $sql_where );
			
		} else {
			$sql_where = $this->session->userdata( 'sql_where_session' );
		}
		
		if ( $sql_where != "" ) {
			$this->db->where( $sql_where );
		}
		$query = $this->db->get( 'oe_topics' );
		return $query->num_rows();
	}
	
	public function get_topics_value( $auto_id )
	{
		$this->db->where( 'id', $auto_id );
		$query = $this->db->get( 'oe_topics' );
		if ( $query->num_rows() > 0 ) {
			return $query->row();
		} else {
			return FALSE;
		}
	}
	
	public function update_topics_info( $auto_id )
	{
		$data = array(
			'name'           => $this->input->post( 'name', TRUE ),
			'chapter_ref_id' => $this->input->post( 'chapter_ref_id', TRUE ),
			'updated_by'     => AUTH_EMAIL,
			'status'         => $this->input->post( 'status', TRUE ),
		);
		$this->db->where( 'id', $auto_id );
		$query = $this->db->update( 'oe_topics', $data );
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	
	public function get_topic_list_array()
	{
		$topic_list = $this->get_topics_list( 1 );
		
		if ( $topic_list ) {
			foreach ( $topic_list as $topic ) {
				$array [$topic->name] = $topic->name;
			}
		}
		return $array;
	}
	
	function get_course_by_institute( $institute_id )
	{
		$this->db->select( '*' );
		$this->db->where( 'institute_id', $institute_id );
		$query = $this->db->get( 'sif_course' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	function save_exam_category_list( $user_email )
	{
		$data  = array(
			'exam_category_name' => $this->input->post( 'exam_category_name', TRUE ),
			'cost_bdt'           => $this->input->post( 'cost_bdt', TRUE ),
			'cost_usd'           => $this->input->post( 'cost_usd', TRUE ),
			'sl'                 => $this->input->post( 'sl', TRUE ),
			'created_by'         => $user_email,
			'status'             => $this->input->post( 'status', TRUE ),
		);
		$query = $this->db->insert( 'sif_exam_category', $data );
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_exam_category_list()
	{
		$this->db->select( '*' );
		$this->db->order_by( 'sl' );
		$query = $this->db->get( 'sif_exam_category' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	function get_exam_category_details( $auto_id )
	{
		$this->db->where( 'id', $auto_id );
		$query = $this->db->get( 'sif_exam_category' );
		if ( $query->num_rows() > 0 ) {
			return $query->row();
		} else {
			return FALSE;
		}
	}
	
	function update_exam_category_info( $auto_id, $user_email )
	{
		$data = array(
			'exam_category_name' => $this->input->post( 'exam_category_name', TRUE ),
			'cost_bdt'           => $this->input->post( 'cost_bdt', TRUE ),
			'cost_usd'           => $this->input->post( 'cost_usd', TRUE ),
			'sl'                 => $this->input->post( 'sl', TRUE ),
			'updated_by'         => $user_email,
			'status'             => $this->input->post( 'status', TRUE ),
		);
		$this->db->where( 'id', $auto_id );
		$query = $this->db->update( 'sif_exam_category', $data );
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function save_news_info( $authemail )
	{
		$data_array = array
		(
			'news_title'   => $this->input->post( 'news_title', TRUE ),
			'news_details' => $this->input->post( 'news_details', TRUE ),
			'status'       => $this->input->post( 'status', TRUE ),
			'created_by'   => $authemail,
		);
		
		if ( $_FILES['content_feature_file']['error'] == 0 ) {
			$upload = $this->Mod_file_upload->upload_file( 'content', 'content_feature_file', ['size' => 2048, 'width' => 4000, 'height' => 4000], NULL, 'pdf|jpg|jpeg|png' );
			if ( $upload['status'] ) {
				$data_array['file_loc']       = $upload['path'];
				$exp                          = explode( '.', $upload['path'] );
				$data_array['file_extension'] = $exp[count( $exp ) - 1];
			} else {
				$this->session->set_flashdata( 'flashError', $upload['msg'] );
			}
		}
		
		$res_flag = $this->db->insert( 'oe_news', $data_array );
		
		if ( !empty( $res_flag ) ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function update_news_info( $id, $authemail )
	{
		$data_array = array
		(
			'news_title'   => $this->input->post( 'news_title', TRUE ),
			'news_details' => $this->input->post( 'news_details', TRUE ),
			'status'       => $this->input->post( 'status', TRUE ),
			'updated_at'   => date( 'Y-m-d h:i:s' ),
			'updated_by'   => $authemail,
		);
		
		
		if ( $_FILES['content_feature_file']['error'] == 0 ) {
			$upload = $this->Mod_file_upload->upload_file( 'content/' . date( "Y" ), 'content_feature_file', ['size' => 2048, 'width' => 4000, 'height' => 4000], NULL, 'pdf|jpg|jpeg|png' );
			if ( $upload['status'] ) {
				$data_array['file_loc']       = $upload['path'];
				$exp                          = explode( '.', $upload['path'] );
				$data_array['file_extension'] = $exp[count( $exp ) - 1];
			} else {
				$this->session->set_flashdata( 'flashError', $upload['msg'] );
			}
		}
		
		$res_flag = $this->db->where( 'id', $id )->update( 'oe_news', $data_array );
		if ( $this->db->affected_rows() ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_news_events_list( $limit = 0, $row = 0 )
	{
		$this->db->select( '*' );
		
		$sql_where = "";
		
		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$from_date_time = $this->input->post( 'from_date_time', TRUE );
			$to_date_time   = $this->input->post( 'to_date_time', TRUE );
			$sql_where      .= "id != ''";
			
			if ( !empty( $package_type ) ) {
				$sql_where .= " and type = '$package_type'";
			}
			
			if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
				$final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
				$final_date_to   = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
				$sql_where       .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
			}
			
			$this->session->unset_userdata( 'sql_where_session' );
			$this->session->set_userdata( 'sql_where_session', $sql_where );
			
		} else {
			$sql_where = $this->session->userdata( 'sql_where_session' );
		}
		
		if ( $sql_where != "" ) {
			$this->db->where( $sql_where );
		}
		
		if ( $limit ) {
			$query = $this->db->get( 'oe_news', $limit, $row );
		} else {
			$query = $this->db->get( 'oe_news' );
		}
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	function count_exam_news_records()
	{
		$this->db->select( 'id' );
		
		$sql_where = "";
		
		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$from_date_time = $this->input->post( 'from_date_time', TRUE );
			$to_date_time   = $this->input->post( 'to_date_time', TRUE );
			$sql_where      .= "id != ''";
			
			if ( !empty( $package_type ) ) {
				$sql_where .= " and type = '$package_type'";
			}
			
			if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
				$final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
				$final_date_to   = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
				$sql_where       .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
			}
			
			$this->session->unset_userdata( 'sql_where_session' );
			$this->session->set_userdata( 'sql_where_session', $sql_where );
			
		} else {
			$sql_where = $this->session->userdata( 'sql_where_session' );
		}
		
		if ( $sql_where != "" ) {
			$this->db->where( $sql_where );
		}
		
		$query = $this->db->get( 'oe_news' );
		return $query->num_rows();
	}
	
	function get_exam_instruction_list()
	{
		$this->db->select( '*' );
		$query = $this->db->get( 'oe_exam_instruction' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	
	public function get_exam_list_by_type( $multiple = TRUE )
	{
		$this->db->select( 'E.id, E.exam_name, EC.exam_category_name ec_name, E.exam_id type' );
		$this->db->where( ['E.status' => 1, 'E.free_exam' => 0] );
		$this->db->order_by( 'E.exam_id' );
		$this->db->join( 'sif_exam_category EC', 'EC.id = E.exam_id' );
		$query = $this->db->get( 'oe_exam E' );
		
		$data = $multiple ? [] : ['' => 'Choose'];
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			
			foreach ( $results as $result ) {
				$data[$result->ec_name]["$result->type.$result->id"] = $result->exam_name;
			}
			
		}
		
		return $data;
	}
	
	
	public function get_exam_list_for_package( $multiple = TRUE )
	{
		$this->db->select( 'E.id, E.exam_name, EC.exam_category_name ec_name, E.exam_id type' );
		$this->db->where( ['E.status' => 1, 'E.free_exam' => 0] );
		$this->db->order_by( 'E.exam_id' );
		$this->db->join( 'sif_exam_category EC', 'EC.id = E.exam_id' );
		$query = $this->db->get( 'oe_exam E' );
		
		$data = $multiple ? [] : ['' => 'Choose'];
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			
			foreach ( $results as $result ) {
				$data[$result->ec_name]["$result->type|$result->id"] = $result->exam_name;
			}
			
		}
		
		return $data;
	}
	
	
}
