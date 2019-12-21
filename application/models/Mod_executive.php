<?php

class Mod_executive extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model( 'mod_file_upload' );
	}

	function save_data( $user_email )
	{

		$executive_id = $this->common_lib->get_executive_id();
		$mobile = $this->input->post( 'mobile', TRUE );
		$data = array(
			'exe_stuff_id' => $executive_id,
			'name' => $this->input->post( 'name', TRUE ),
			'emp_type' => $this->input->post( 'emp_type', TRUE ),
			'joining_date' => $this->input->post( 'joining_date', TRUE ),
			'fath_name' => $this->input->post( 'fath_name', TRUE ),
			'mother_name' => $this->input->post( 'mother_name', TRUE ),
			'dob' => $this->input->post( 'dob', TRUE ),
			'gender' => $this->input->post( 'gender', TRUE ),
			'religion' => $this->input->post( 'religion', TRUE ),
			'nationality' => $this->input->post( 'nationality', TRUE ),
			'na_id' => $this->input->post( 'na_id', TRUE ),
			'pass_no' => $this->input->post( 'pass_no', TRUE ),
			'mobile' => $mobile,
			'telephone' => $this->input->post( 'telephone', TRUE ),
			'email' => $this->input->post( 'email', TRUE ),
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
			'created_by' => $user_email,
			'status' => 1,
		);

		$flag = $photo_flag = FALSE;
		$return['msg'] = '';
		$photo_name = 'photo_image';
		if ( isset($_FILES[$photo_name]) && $_FILES[$photo_name]['size'] > 0 ) {
			$condition_photo = array('width' => '300', 'height' => '300', 'size' => '100');
			$photo_tempname = $_FILES[$photo_name]['tmp_name'];
			list( $p_width, $p_height ) = getimagesize( $photo_tempname );

			if ( $_FILES[$photo_name]['size'] <= 100000 && $p_width == $condition_photo['width'] && $p_height == $condition_photo['height'] ) {
				$photo = $this->Mod_file_upload->upload_file( 'exe_stuff_photo', 'photo_image', $condition_photo, $mobile );

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

//        if ($photo_flag) {
		$result = $this->db->insert( 'sif_exe_stuff', $data );
		$insert_id = $this->db->insert_id();

		$exam_name = $this->input->post( 'exam_name', TRUE );
		$pass_year = $this->input->post( 'pass_year', TRUE );
		$exam_group = $this->input->post( 'exam_group', TRUE );
		$exam_board = $this->input->post( 'exam_board', TRUE );
		$exam_ins = $this->input->post( 'exam_ins', TRUE );
		$exam_result = $this->input->post( 'exam_result', TRUE );
		if ( $exam_name ) {
			foreach ( $exam_name as $i => $exam ) {
				//print_r($exam_result[$i]);
				if ( $exam && $exam_result[$i] ) {

					$exam_data = array(
						'exe_auto_id' => $insert_id,
						'exam_name' => $exam,
						'pass_year' => $pass_year[$i],
						'exam_group' => isset( $exam_group[$i] ) ? $exam_group[$i] : '',
						'exam_board' => isset( $exam_board[$i] ) ? $exam_board[$i] : '',
						'exam_ins' => $exam_ins[$i],
						'exam_result' => $exam_result[$i]
					);
					$this->db->insert( 'sif_exe_stuff_edu_qualification', $exam_data );
				}
			}
		}
		if ( $result ) {
			$username = $executive_id;
			$password = generate_random_password( 6 );
			$email = $data['email'];

			$group = array('5');

			$exp = explode( ' ', $data['name'] );

			$first_name = $exp[0];
			$last_name = $exp[count( $exp ) - 1];

			//teachers login information
			$additional_data = array(
				'teacher_id' => $executive_id,
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
		return $return;
	}


	function count_records()
	{
		$sql_where = "";
		$name = "";
		$from_date_time = "";
		$to_date_time = "";

		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$name = $this->security->xss_clean( $this->input->post( 'name' ) );

			$from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
			$to_date_time = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
			// $status = $this->security->xss_clean($this->input->post('status'));

			$sql_where .= "id != ''";

			if ( !empty( $name ) ) {
				$sql_where .= " and name = '$name'";
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
		$query = $this->db->get( 'sif_exe_stuff' );
		if ( $query ) {
			return $query->num_rows();
		} else {
			return FALSE;
		}
	}

	function get_records_list( $limit = 20, $row = 0 )
	{
		$sql_where = "";

		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$name = $this->security->xss_clean( $this->input->post( 'name' ) );

			$from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
			$to_date_time = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );

			$sql_where .= "id != ''";

			if ( !empty( $name ) ) {
				$sql_where .= " and name = '$name'";
			}
			if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
				$final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
				$final_date_to = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
				$sql_where .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
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
		$query = $this->db->get( 'sif_exe_stuff', $limit, $row );

		if ( $query->num_rows() > 0 ) {
			$results = $query->result();


			return $results;
		}
		return FALSE;
	}

	function get_details( $exe_stu_id )
	{
		$this->db->select( '*' );
		$this->db->where( 'id', $exe_stu_id );
		$query = $this->db->get( 'sif_exe_stuff' );
		if ( $query->num_rows() > 0 ) {
			return $query->row();
		}
		return FALSE;
	}

	public
	function get_education_record( $exe_stu_id )
	{
		$this->db->select( '*' );
		$this->db->where( 'exe_auto_id', $exe_stu_id );
		$query = $this->db->get( 'sif_exe_stuff_edu_qualification' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	public
	function update_data( $user_email, $auto_id )
	{
		$mobile = $this->input->post( 'mobile', TRUE );
		$data = array(

			'name' => $this->input->post( 'name', TRUE ),
			'emp_type' => $this->input->post( 'emp_type', TRUE ),
			'joining_date' => $this->input->post( 'joining_date', TRUE ),
			'fath_name' => $this->input->post( 'fath_name', TRUE ),
			'mother_name' => $this->input->post( 'mother_name', TRUE ),
			'dob' => $this->input->post( 'dob', TRUE ),
			'gender' => $this->input->post( 'gender', TRUE ),
			'religion' => $this->input->post( 'religion', TRUE ),
			'nationality' => $this->input->post( 'nationality', TRUE ),
			'na_id' => $this->input->post( 'na_id', TRUE ),
			'pass_no' => $this->input->post( 'pass_no', TRUE ),
			'mobile' => $mobile,
			'telephone' => $this->input->post( 'telephone', TRUE ),
			'email' => $this->input->post( 'email', TRUE ),
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
			'updated_by' => $user_email,
			'status' => 1,
		);

		$flag = $photo_flag = FALSE;
		$return['msg'] = '';
		$photo_name = 'photo_image';
		if ( $_FILES[$photo_name]['size'] > 0 ) {
			$condition_photo = array('width' => '300', 'height' => '300', 'size' => '100');
			$photo_tempname = $_FILES[$photo_name]['tmp_name'];
			list( $p_width, $p_height ) = getimagesize( $photo_tempname );

			if ( $_FILES[$photo_name]['size'] <= 100000 && $p_width == $condition_photo['width'] && $p_height == $condition_photo['height'] ) {
				$photo = $this->Mod_file_upload->upload_file( 'exe_stuff_photo', 'photo_image', $condition_photo, $mobile );

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


		$this->db->where( 'id', $auto_id );
		$result = $this->db->update( 'sif_exe_stuff', $data );


		$exam_name = $this->input->post( 'exam_name', TRUE );
		$pass_year = $this->input->post( 'pass_year', TRUE );
		$exam_group = $this->input->post( 'exam_group', TRUE );
		$exam_board = $this->input->post( 'exam_board', TRUE );
		$exam_ins = $this->input->post( 'exam_ins', TRUE );
		$exam_result = $this->input->post( 'exam_result', TRUE );

		$this->db->where( 'exe_auto_id', $auto_id );
		$this->db->delete( 'sif_exe_stuff_edu_qualification' );

		if ( $exam_name ) {
			foreach ( $exam_name as $i => $exam ) {
				//print_r($exam_result[$i]);
				if ( $exam && $exam_result[$i] ) {

					$exam_data = array(
						'exe_auto_id' => $auto_id,
						'exam_name' => $exam,
						'pass_year' => $pass_year[$i],
						'exam_group' => isset( $exam_group[$i] ) ? $exam_group[$i] : '',
						'exam_board' => isset( $exam_board[$i] ) ? $exam_board[$i] : '',
						'exam_ins' => $exam_ins[$i],
						'exam_result' => $exam_result[$i]
					);
					$this->db->insert( 'sif_exe_stuff_edu_qualification', $exam_data );
				}
			}

		}

		if ( $result ) {
			return $result;
		} else {
			return FALSE;
		}

	}


}

?>
