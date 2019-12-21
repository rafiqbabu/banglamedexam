<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_teacher
 *
 * @author iPLUS DATA
 * @property Mod_file_upload $Mod_file_upload
 */
class Mod_teacher extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model( 'mod_file_upload' );
	}

	function get_course_list()
	{

		$query = $this->db->order_by( "id", 'ASC' );
		$query = $this->db->get( 'sif_course' );

		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
		}

		return $result;
	}

	function get_course_list_array()
	{
		$list = $this->get_course_list();
		$array = array('' => 'Select');
		foreach ( $list as $ser ) {
			$array[$ser->course_code] = $ser->course_name;
		}
		return $array;
	}

	function get_faculty_list_array()
	{
		$facultys = $this->get_faculty_list();

		$array = array('' => 'Select');
		foreach ( $facultys as $i => $faculty ) {
			$array[$faculty->faculty_code] = $faculty->faculty_name;
		}
		return $array;
	}

	function get_faculty_list()
	{

		//$query = $this->db->order_by("id", 'ASC');
		$this->db->select( 'faculty_name,faculty_code,id' );
		$query = $this->db->get( 'sif_faculty' );

		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
		}

		return $result;
	}


	function get_subject_list_array()
	{
		$subjects = $this->get_subject_list();

		$array = array('' => 'Select');
		foreach ( $subjects as $i => $subject ) {
			$array[$subject->id] = $subject->subject;
		}
		return $array;
	}

	function get_subject_list()
	{
		$query = $this->db->order_by( "id", 'ASC' );
		$query = $this->db->get( 'sif_subject' );

		if ( $query->num_rows() > 0 ) {
			$result = $query->result();
			return $result;
		}

		return FALSE;
	}


	function save_data()
	{
		$return = array('status' => FALSE, 'msg' => '');
		$teacher_id = $this->common_lib->get_teacher_id();

		$data = array(
			//'teacher_id_sl' => $teacher_id['sl'],
			'teacher_id' => $teacher_id,
			'tec_name' => $this->input->post( 'tec_name' ),
			'fath_name' => $this->input->post( 'fath_name' ),
			'mother_name' => $this->input->post( 'mother_name' ),
			'dob' => $this->input->post( 'dob' ),
			'gender' => $this->input->post( 'gender' ),
			'religion' => $this->input->post( 'religion' ),
			'nationality' => $this->input->post( 'nationality' ),
			'na_id' => $this->input->post( 'na_id' ),
			'pass_no' => $this->input->post( 'pass_no' ),
			'mobile' => $this->input->post( 'mobile' ),
			'telephone' => $this->input->post( 'telephone' ),
			'email' => $this->input->post( 'email' ),
			'bmdc_no' => $this->input->post( 'bmdc_no' ),
			'joining_date' => $this->input->post( 'joining_date' ),
			'spouse_name' => $this->input->post( 'spouse_name', TRUE ),
			'pouse_mobile' => $this->input->post( 'pouse_mobile', TRUE ),
			'blood_gro' => $this->input->post( 'blood_gro', TRUE ),
			'per_divi' => $this->input->post( 'per_divi', TRUE ),
			'per_dist' => $this->input->post( 'per_dist', TRUE ),
			'per_thana' => $this->input->post( 'per_thana', TRUE ),
			'per_address' => $this->input->post( 'per_address', TRUE ),
			'mai_divi' => $this->input->post( 'mai_divi', TRUE ),
			'mai_dist' => $this->input->post( 'mai_dist', TRUE ),
			'mai_thana' => $this->input->post( 'mai_thana', TRUE ),
			'mai_address' => $this->input->post( 'mai_address', TRUE ),
			'status' => 1,
			'created_by' => AUTH_EMAIL,
		);
//        if ($this->ion_auth->username_check($data['bmdc_no'])) {
		// echo 'adsfasdf';exit;
		$flag = $photo_flag = FALSE;
		$return['msg'] = '';
		$photo_name = 'photo_image';
		if ( isset( $_FILES[$photo_name] ) && $_FILES[$photo_name]['size'] > 0 ) {
			// $condition_photo = array('width' => '300', 'height' => '300', 'size' => '100');
			$condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
			$photo_tempname = $_FILES[$photo_name]['tmp_name'];
			list( $p_width, $p_height ) = getimagesize( $photo_tempname );

			// if ($_FILES[$photo_name]['size'] <= 100000 && $p_width == $condition_photo['width'] && $p_height == $condition_photo['height']) {

			if ( $_FILES[$photo_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height'] ) {
				$photo = $this->Mod_file_upload->upload_file( 'photo', 'photo_image', $condition_photo, $teacher_id, 'jpg|png|gif|jpeg' );

				if ( $photo['status'] ) {
					$photo_flag = TRUE;
				} else {
					$return['msg'] .= $photo['msg'];
					return $return;
				}
			} else {
				$return['msg'] .= '<p>Image Size:100Kb Max, width & height(300 X 300 Pixel), only .jpg is allowed to upload</p>';
				return $return;
			}
		}

		if ( isset( $photo['path'] ) ) {
			$data['photo'] = $photo['path'];
		}


//            if ($photo_flag) {

		$result = $this->db->insert( 'sif_teacher', $data );

		$insert_id = $this->db->insert_id();
		$course_code = $this->input->post( 'course_code' );
		$faculty_code = $this->input->post( 'faculty_code' );
		$type = $this->input->post( 'type' );
		$subject_id = $this->input->post( 'subject_id' );
		$topic_id = $this->input->post( 'topic_id' );
		//echo '<pre>';
		//print_r($topic_id);exit;
		$exam_name = $this->input->post( 'exam_name', TRUE );
		$pass_year = $this->input->post( 'pass_year', TRUE );
		$exam_group = $this->input->post( 'exam_group', TRUE );
		$exam_board = $this->input->post( 'exam_board', TRUE );
		$exam_ins = $this->input->post( 'exam_ins', TRUE );
		$exam_result = $this->input->post( 'exam_result', TRUE );
		if ( $exam_name ) {
			foreach ( $exam_name as $i => $exam ) {

				if ( $exam && $exam_result[$i] ) {

					$exam_data = array(
						'teacher_auto_id' => $insert_id,
						'exam_name' => $exam,
						'pass_year' => $pass_year[$i],
						'exam_group' => isset( $exam_group[$i] ) ? $exam_group[$i] : '',
						'exam_board' => isset( $exam_board[$i] ) ? $exam_board[$i] : '',
						'exam_ins' => $exam_ins[$i],
						'exam_result' => $exam_result[$i]
					);
					$this->db->insert( 'sif_teacher_edu_qualification', $exam_data );
				}
			}
		}


		if ( $course_code && $type ) {
			foreach ( $course_code as $i => $code ) {
				if ( $code ) {
					$course_val = array(
						'teacher_id' => $insert_id,
						'course_code' => $code,
						'faculty_code' => $faculty_code[$i],
						'type' => $type[$i],
						'created_by' => AUTH_EMAIL,
					);
				}
				$this->db->insert( 'sif_teacher_course_faculty', $course_val );

			}
		}

		if ( $subject_id ) {
			foreach ( $subject_id as $i => $subject ) {
				foreach ( $subject as $code ) {
					if ( $code ) {
						$course_val = array(
							'teacher_id' => $insert_id,
							'subject_id' => $code,
							'created_by' => AUTH_EMAIL,
						);
					}
					$this->db->insert( 'sif_teacher_subjects', $course_val );
				}
			}
		}

		if ( $topic_id ) {

			foreach ( $topic_id as $i => $topic ) {
				foreach ( $topic as $top ) {

					if ( $top ) {
						$tipic_val = array(
							'teacher_id' => $insert_id,
							'topic_id' => $top,
							'created_by' => AUTH_EMAIL,
						);
						$this->db->insert( 'sif_teacher_topics', $tipic_val );
					}
				}
			}

		}

		if ( $result ) {
			$username = $data['bmdc_no'];
			$password = generate_random_password( 6 );
			$email = $data['email'];

			$group = array('4');

			$exp = explode( ' ', $data['tec_name'] );

			$first_name = $exp[0];
			$last_name = $exp[count( $exp ) - 1];

			//teachers login information
			$additional_data = array(
				'teacher_id' => $teacher_id,
				'password_view' => $password,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'phone' => $data['mobile'],
				'image' => isset( $photo['path'] ) ? $photo['path'] : '',
			);

			if ( $this->ion_auth->register( $username, $password, $email, $additional_data, $group ) ) {

				// Send Email to Teacher
//                $stu_msg = "Your User ID: $username and PASSWORD: $password";
//                $this->Mod_email->send_email($email, 'User ID Password', $stu_msg);
				$return['status'] = TRUE;
			} else {
				$return['msg'] .= $this->ion_auth->errors();
			}
		}
//            } else {
//                $return['msg'] .= $this->ion_auth->errors();
//            }
//        }

		return $return;
	}


	function count_records()
	{
		//$read_db = $this->load->database('read', TRUE); /* database conection for read operation */

		$sql_where = "";
		$tec_name = "";
		$from_date_time = "";
		$to_date_time = "";
		// $status = "";

		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$tec_name = $this->security->xss_clean( $this->input->post( 'tec_name' ) );

			$from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
			$to_date_time = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
			// $status = $this->security->xss_clean($this->input->post('status'));

			$sql_where .= "id != ''";

			if ( !empty( $tec_name ) ) {
				$sql_where .= " and tec_name = '$tec_name'";
				//echo $tec_name;exit;
			}
//            if (!empty($subject_id)) {
//                $sql_where .= " and subject_id = '$subject_id'";
//            }
			if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
				$final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
				$final_date_to = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
				$sql_where .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
			}
//            if (!empty($status)) {
//                $sql_where .= " and status = '$status'";
//            }
			$this->session->unset_userdata( 'sql_where_session' );
			$this->session->set_userdata( 'sql_where_session', $sql_where );

		} else {
			$sql_where = $this->session->userdata( 'sql_where_session' );
		}

		if ( $sql_where != "" ) {
			$this->db->where( $sql_where );
		}

		$query = $this->db->select( 'id' );
		$query = $this->db->get( 'sif_teacher' );
		if ( $query ) {
			return $query->num_rows();
		} else {
			return FALSE;
		}
	}


	function get_records_list( $limit = 20, $row = 0 )
	{
		//$read_db = $this->load->database('read', TRUE); /* database conection for read operation */

		// $result = "";
		$sql_where = "";
		$tec_name = "";
		$from_date_time = "";
		$to_date_time = "";
		//$status = "";

		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$tec_name = $this->security->xss_clean( $this->input->post( 'tec_name' ) );
			//$subject_id = $this->security->xss_clean($this->input->post('subject_id'));

			$from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
			$to_date_time = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
			//$status = $this->security->xss_clean($this->input->post('status'));

			$sql_where .= "id != ''";

			if ( !empty( $tec_name ) ) {
				$sql_where .= " and tec_name = '$tec_name'";
			}
//            if (!empty($subject_id)) {
//                $sql_where .= " and subject_id = '$subject_id'";
//            }
			if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
				$final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
				$final_date_to = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
				$sql_where .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
			}
//            if (!empty($status)) {
//                $sql_where .= " and status = '$status'";
//            }
			$this->session->unset_userdata( 'sql_where_session' );
			$this->session->set_userdata( 'sql_where_session', $sql_where );

		} else {
			$sql_where = $this->session->userdata( 'sql_where_session' );
		}

		if ( $sql_where != "" ) {
			$this->db->where( $sql_where );
		}
		$query = $this->db->order_by( "id", 'DESC' );
		$query = $this->db->get( 'sif_teacher', $limit, $row );

		if ( $query->num_rows() > 0 ) {
			$results = $query->result();

			foreach ( $results as $i => $result ) {
				$subs = $this->db->where( 'teacher_id', $result->id )->get( 'sif_teacher_subjects' )->result();
				$tops = $this->db->where( 'teacher_id', $result->id )->get( 'sif_teacher_topics' )->result();
				$crs_fac = $this->db->where( 'teacher_id', $result->id )->get( 'sif_teacher_course_faculty' )->result();
				//$type = $this->db->where('teacher_id', $result->id)->get('sif_teacher_course_faculty')->result();
				$courses = $faculties = $subjects = $topics = $type = array();

				foreach ( $crs_fac as $row ) {
					array_push( $courses, get_name_by_id( 'sif_course', $row->course_code, 'course_code', 'course_name' ) );
					//array_push($faculties, get_faculty_name_by_course_code_faculty_code('sif_faculty', $row->course_code, $row->faculty_code, 'faculty_name'));
					//if($row->type == 'B')
					array_push( $type, $row->type );
				}

				foreach ( $subs as $row ) {
					array_push( $subjects, get_name_by_id( 'sif_subject', $row->subject_id, 'id', 'subject' ) );
				}

				foreach ( $tops as $row ) {
					array_push( $topics, get_name_by_id( 'sif_class_topic', $row->topic_id, 'id', 'class_topic_name' ) );
				}

				$results[$i]->courses = $courses;
				$results[$i]->faculties = $faculties;
				$results[$i]->types = $type;
				$results[$i]->subjects = $subjects;
				$results[$i]->topics = $topics;
			}

			return $results;
		}
		//echo $read_db->last_query();
		return FALSE;
	}

	public function get_auto_id( $teacher_id )
	{
		$this->db->select( 'id' );
		$this->db->where( 'teacher_id', $teacher_id );
		$query = $this->db->get( 'sif_teacher' );
		if ( $query->num_rows() > 0 ) {
			return $query->row()->id;
		} else {
			return FALSE;
		}
	}

	function get_details( $teacher_id )
	{
		$this->db->select( '*' );
		$this->db->where( 'id', $teacher_id );
		$query = $this->db->get( 'sif_teacher' );
		if ( $query->num_rows() > 0 ) {
			$result = $query->row();

			$subs = $this->db->where( 'teacher_id', $result->id )->get( 'sif_teacher_subjects' )->result();
			$tops = $this->db->where( 'teacher_id', $result->id )->get( 'sif_teacher_topics' )->result();
			$crs_fac = $this->db->where( 'teacher_id', $result->id )->get( 'sif_teacher_course_faculty' )->result();
			$courses = $faculties = $subjects = $topics = $type = array();

			foreach ( $crs_fac as $row ) {
				array_push( $courses, get_name_by_id( 'sif_course', $row->course_code, 'course_code', 'course_name' ) );
				array_push( $faculties, get_faculty_name_by_course_code_faculty_code( 'sif_faculty', $row->course_code, $row->faculty_code, 'faculty_name' ) );
				array_push( $type, $row->type );

			}

			foreach ( $subs as $row ) {
				array_push( $subjects, get_name_by_id( 'sif_subject', $row->subject_id, 'id', 'subject' ) );
			}

			foreach ( $tops as $row ) {
				// array_push($topics, get_name_by_id('sif_class_topic', $row->topic_id, 'id', 'class_topic_name'));
				array_push( $topics, get_name_by_id( 'sif_topics', $row->topic_id, 'id', 'name' ) );
			}

			$result->courses = $courses;
			$result->faculties = $faculties;
			$result->types = $type;
			$result->subjects = $subjects;
			$result->topics = $topics;

			// echo "<pre/>";
			// print_r($result->topics);
			// exit();

			return $result;

		}
		return FALSE;
	}

	public function get_education_record( $teacher_id )
	{
		$this->db->select( '*' );
		$this->db->where( 'teacher_auto_id', $teacher_id );
		$query = $this->db->get( 'sif_teacher_edu_qualification' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	public function get_schedules_data( $teacher_id = NULL )
	{
		$this->db->select( '*' );
		if ( $teacher_id ) {
			$this->db->where( 'teacher_id', $teacher_id );
		}
		$this->db->order_by( 'date', 'desc' );
		$this->db->order_by( 'time_from', 'desc' );
		$query = $this->db->get( 'sif_schedule' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	public function get_evaluation_result( $schedule_id )
	{
		$this->db->select( '*' );
		$this->db->where( 'schedule_id', $schedule_id );
		$query = $this->db->get( 'sif_teacher_evaluation' );
		//$in = count($query->introduction);
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	public function get_courese_plan_code_number( $teacher_id )
	{
		$this->db->select( '*' );
		$this->db->where( 'id', $teacher_id );
		$query = $this->db->get( 'sif_teacher' );
		if ( $query->num_rows() > 0 ) {
			$result = $query->row();

			$crs_fac = $this->db->where( 'teacher_id', $result->id )->get( 'sif_teacher_course_faculty' )->result();
			$course_plan = array();

			foreach ( $crs_fac as $i => $row ) {
				$where = array('teacher_id' => $result->id, 'crs_fac_id' => $row->id);
				$subs = $this->db->where( $where )->get( 'sif_teacher_subjects' )->result();
				$tops = $this->db->where( $where )->get( 'sif_teacher_topics' )->result();

				$course_plan[$i]['course'] = $row->course_code;
				$course_plan[$i]['faculty'] = $row->faculty_code;
				$course_plan[$i]['type'] = $row->type;
				$course_plan[$i]['subjects'] = array();
				$course_plan[$i]['topics'] = array();

				foreach ( $subs as $sub ) {
					array_push( $course_plan[$i]['subjects'], $sub->subject_id );
				}

				foreach ( $tops as $top ) {
					array_push( $course_plan[$i]['topics'], $top->topic_id );
				}

			}
			$result->course_plan = $course_plan;

			// echo "<pre/>";
			// print_r($result);exit();

			return $result;
		}
		return FALSE;
	}

	public function update_data( $auto_id )
	{

		$teacher_id = $this->common_lib->get_teacher_id();
		$data = array(
			'teacher_id' => $teacher_id,
			'tec_name' => $this->input->post( 'tec_name' ),
			'fath_name' => $this->input->post( 'fath_name' ),
			'mother_name' => $this->input->post( 'mother_name' ),
			'dob' => $this->input->post( 'dob' ),
			'joining_date' => $this->input->post( 'joining_date' ),
			'gender' => $this->input->post( 'gender' ),
			'religion' => $this->input->post( 'religion' ),
			'nationality' => $this->input->post( 'nationality' ),
			'na_id' => $this->input->post( 'na_id' ),
			'pass_no' => $this->input->post( 'pass_no' ),
			'mobile' => $this->input->post( 'mobile' ),
			'telephone' => $this->input->post( 'telephone' ),
			'email' => $this->input->post( 'email' ),
			'bmdc_no' => $this->input->post( 'bmdc_no' ),
			'per_divi' => $this->input->post( 'per_divi', TRUE ),
			'per_dist' => $this->input->post( 'per_dist', TRUE ),
			'per_thana' => $this->input->post( 'per_thana', TRUE ),
			'per_address' => $this->input->post( 'per_address', TRUE ),
			'mai_divi' => $this->input->post( 'mai_divi', TRUE ),
			'mai_dist' => $this->input->post( 'mai_dist', TRUE ),
			'mai_thana' => $this->input->post( 'mai_thana', TRUE ),
			'mai_address' => $this->input->post( 'mai_address', TRUE ),
			'spouse_name' => $this->input->post( 'spouse_name', TRUE ),
			'pouse_mobile' => $this->input->post( 'pouse_mobile', TRUE ),
			'blood_gro' => $this->input->post( 'blood_gro', TRUE ),
			'status' => 1,
			'created_by' => AUTH_EMAIL,
		);

		$flag = $photo_flag = FALSE;
		$return['msg'] = '';
		$photo_name = 'photo_image';
		if ( $_FILES[$photo_name]['size'] > 0 ) {
			$condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
			// $condition_photo = array('width' => '300', 'height' => '300', 'size' => '100');
			$photo_tempname = $_FILES[$photo_name]['tmp_name'];
			list( $p_width, $p_height ) = getimagesize( $photo_tempname );

			// if ($_FILES[$photo_name]['size'] <= 100000 && $p_width == $condition_photo['width'] && $p_height == $condition_photo['height']) {


			if ( $_FILES[$photo_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height'] ) {

				$photo = $this->Mod_file_upload->upload_file( 'photo', 'photo_image', $condition_photo, $teacher_id );

				if ( $photo['status'] ) {
					$photo_flag = TRUE;
				} else {
					$return['msg'] .= $photo_flag['msg'];
				}
			} else {
				$return['msg'] .= '<p>Image Size:100Kb Max, width & height(300 X 300 Pixel), only .jpg is allowed to upload</p>';
			}
			if ( isset( $photo['path'] ) ) {
				$data['photo'] = $photo['path'];
			}
		}


		//if ($photo_flag) {
		$this->db->where( 'id', $auto_id );
		$result = $this->db->update( 'sif_teacher', $data );


		//echo '<pre>';
		//print_r($topic_id);exit;
		$exam_name = $this->input->post( 'exam_name', TRUE );
		$pass_year = $this->input->post( 'pass_year', TRUE );
		$exam_group = $this->input->post( 'exam_group', TRUE );
		$exam_board = $this->input->post( 'exam_board', TRUE );
		$exam_ins = $this->input->post( 'exam_ins', TRUE );
		$exam_result = $this->input->post( 'exam_result', TRUE );

		$this->db->where( 'teacher_auto_id', $auto_id );
		$this->db->delete( 'sif_teacher_edu_qualification' );

		if ( $exam_name ) {
			foreach ( $exam_name as $i => $exam ) {

				if ( $exam && $exam_result[$i] ) {

					$exam_data = array(
						'teacher_auto_id' => $auto_id,
						'exam_name' => $exam,
						'pass_year' => $pass_year[$i],
						'exam_group' => isset( $exam_group[$i] ) ? $exam_group[$i] : '',
						'exam_board' => isset( $exam_board[$i] ) ? $exam_board[$i] : '',
						'exam_ins' => $exam_ins[$i],
						'exam_result' => $exam_result[$i]
					);
					$this->db->insert( 'sif_teacher_edu_qualification', $exam_data );
				}
			}
		}


		$course_code = $this->input->post( 'course_code' );
		$faculty_code = $this->input->post( 'faculty_code' );
		$type = $this->input->post( 'type' );

		$this->db->where( 'teacher_id', $auto_id );
		$this->db->delete( 'sif_teacher_course_faculty' );

		if ( $course_code && $type ) {
			foreach ( $course_code as $i => $code ) {
				if ( $code ) {
					$course_val = array(
						'teacher_id' => $auto_id,
						'course_code' => $code,
						'faculty_code' => $faculty_code[$i],
						'type' => $type[$i],
						'created_by' => AUTH_EMAIL,
					);
				}
				$this->db->insert( 'sif_teacher_course_faculty', $course_val );
				$insert_id = $this->db->insert_id();
			}
		}

		$subject_id = $this->input->post( 'subject_id' );

		$this->db->where( 'teacher_id', $auto_id );
		$this->db->delete( 'sif_teacher_subjects' );

		if ( $subject_id ) {
			foreach ( $subject_id as $i => $subject ) {
				foreach ( $subject as $code ) {
					if ( $code ) {
						$course_val = array(
							'crs_fac_id' => $insert_id,
							'teacher_id' => $auto_id,
							'subject_id' => $code,
							'created_by' => AUTH_EMAIL,
						);
					}
					$this->db->insert( 'sif_teacher_subjects', $course_val );
				}
			}
		}

		$topic_id = $this->input->post( 'topic_id' );

		$this->db->where( 'teacher_id', $auto_id );
		$this->db->delete( 'sif_teacher_topics' );

		if ( $topic_id ) {
			foreach ( $topic_id as $i => $topic ) {
				foreach ( $topic as $top ) {
					if ( $top ) {
						$tipic_val = array(
							'crs_fac_id' => $insert_id,
							'teacher_id' => $auto_id,
							'topic_id' => $top,
							'created_by' => AUTH_EMAIL,
						);
						$this->db->insert( 'sif_teacher_topics', $tipic_val );
					}

				}
			}
		}
		//}

		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

}

