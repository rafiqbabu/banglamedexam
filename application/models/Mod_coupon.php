<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_teacher
 *
 * @author jnahian
 */
class Mod_coupon extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('mod_file_upload');
		$this->load->model( 'Mod_common' );
	}
	
	function save_coupon_data( $authemail = NULL )
	{
		$data = array(
			'code'          => $this->input->post( 'code', TRUE ),
			'discount'      => $this->input->post( 'discount', TRUE ),
			'validity'      => db_date_format( $this->input->post( 'validity', TRUE ) . " 23:59:59" ),
			'times_allowed' => $this->input->post( 'times_allowed' ),
			'times_used'    => 0,
			'created_by'    => $authemail,
			'status'        => $this->input->post( 'status' ),
			'username'      => $this->input->post( 'username', TRUE ) //new
		);
		
		$this->db->insert( 'oe_coupon', $data );
		
		if ( $this->db->affected_rows() ) {
			return TRUE;
		}
		return FALSE;
	}
	
	function update_coupon_data( $id, $authemail = NULL )
	{
		$data = array(
//            'code'          => $this->input->post( 'code', TRUE ),
'discount'      => $this->input->post( 'discount', TRUE ),
'validity'      => db_date_format( $this->input->post( 'validity', TRUE ) ),
'times_allowed' => $this->input->post( 'times_allowed' ),
'created_by'    => $authemail,
'status'        => $this->input->post( 'status' )
		);
		
		$this->db->update( 'oe_coupon', $data, ['id' => $id] );
		
		if ( $this->db->affected_rows() ) {
			return TRUE;
		}
		return FALSE;
	}
	
	function get_records( $limit = 20, $row = 0 )
	{
		
		$sql_where      = "";
		$topic_name     = "";
		$from_date_time = "";
		$to_date_time   = "";
		
		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$status = $this->security->xss_clean( $this->input->post( 'status' ) );
			
			
			$from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
			$to_date_time   = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
			$sql_where      .= "id != ''";
			
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
		
		$query = $this->db->order_by( "id", 'DESC' );
		$query = $this->db->get( 'oe_coupon', $limit, $row );
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			return $results;
		} else {
			return FALSE;
		}
	}
	
	
	function count_records()
	{
		
		$sql_where      = "";
		$topic_name     = "";
		$from_date_time = "";
		$to_date_time   = "";
		
		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			$status = $this->security->xss_clean( $this->input->post( 'status' ) );
			
			
			$from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
			$to_date_time   = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
			$sql_where      .= "id != ''";
			
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
		
		$query = $this->db->select( 'id' );
		$query = $this->db->get( 'oe_coupon' );
		if ( $query ) {
			return $query->num_rows();
		} else {
			return FALSE;
		}
	}
	
	public function get_exams_by_package( $id )
	{
		$this->db->select( 'PE.*, E.exam_name, EC.exam_category_name ec_name' );
		$this->db->where( 'package_id', $id );
		$this->db->join( 'oe_exam E', 'E.id = PE.exam_id' );
		$this->db->join( 'sif_exam_category EC', 'EC.id = PE.exam_type_id' );
		$query = $this->db->get( 'oe_coupon_exams PE' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return FALSE;
	}
	
	public function get_exams_ids_by_package( $id )
	{
		$this->db->select( "CONCAT(exam_type_id,'.',exam_id) id" );
		$this->db->where( 'package_id', $id );
		$query = $this->db->get( 'oe_coupon_exams' );
		if ( $query->num_rows() > 0 ) {
			$results = $query->result_array();
			
			return array_column( $results, 'id' );
		}
		return FALSE;
	}
	
	function get_package_details( $auto_id )
	{
		$this->get_edit_chapter_topic_id( $auto_id );
		$this->db->select( '*' );
		$this->db->where( 'id', $auto_id );
		$query = $this->db->get( 'oe_coupon' );
		if ( $query->num_rows() > 0 ) {
			return $query->row();
		} else {
			return FALSE;
		}
	}
	
	function get_valid_coupon_details( $code )
	{
		//Get Username OR Email Address of loged user from SESSION 
		$username = $this->session->userdata( 'user' )->username; //new
		$this->db->select( '*' );
		$this->db->where( 'code', $code );
		//Check Username OR Email Address of User for Valid User (Loged User)
		$this->db->where( 'username', $username ); //new
		$this->db->where( 'status', 1 );
		$this->db->where( 'validity >=', date( 'Y-m-d' ) );
		$query = $this->db->get( 'oe_coupon' );
		if ( $query->num_rows() > 0 ) {
			return $query->row();
		} else {
			return FALSE;
		}
	}
	
	function update_coupon_use_count( $coupon )
	{
		$this->db->where( 'id', $coupon->id );
		$this->db->set( 'times_used', 'times_used+1', FALSE );
		$this->db->update( 'oe_coupon' );
		if ( $this->db->affected_rows() > 0 ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_edit_chapter_topic_id( $auto_id )
	{
		$this->db->select( '*' );
		$this->db->where( 'package_ref_id', $auto_id );
		$query = $this->db->get( 'oe_coupon_question' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	function update_package_list_value( $auto_id )
	{
		
		$data = array(
			'package_name'   => $this->input->post( 'package_name', TRUE ),
			'institute_id'   => $this->input->post( 'institute_id', TRUE ),
			'course_id'      => $this->input->post( 'course_id', TRUE ),
			'faculty_id'     => $this->input->post( 'faculty_id', TRUE ),
			'subject_id'     => $this->input->post( 'subject_id', TRUE ),
			'package_id'     => $this->input->post( 'package_id', TRUE ),
			'mcq_total'      => $this->input->post( 'mcq_total', TRUE ),
			'mcq_value'      => $this->input->post( 'mcq_value', TRUE ),
			'sba_total'      => $this->input->post( 'sba_total', TRUE ),
			'sba_value'      => $this->input->post( 'sba_value', TRUE ),
			'negative_mark'  => $this->input->post( 'negative_mark', TRUE ),
			'total_mark'     => $this->input->post( 'total_mark', TRUE ),
			'time'           => $this->input->post( 'time', TRUE ),
			'package_cost'   => $this->input->post( 'package_cost', TRUE ),
			'package_detail' => $this->input->post( 'package_detail', TRUE )
		);
		
		$this->db->where( 'id', $auto_id );
		$query = $this->db->update( 'oe_coupon', $data );
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_all_question_list_in_package( $package_id )
	{
		
		$this->db->select( '*' );
		$this->db->where( 'id', $package_id );
		//$query = $this->db->order_by("id", 'DESC');
		$query = $this->db->get( 'oe_coupon' );
		if ( $query->num_rows() > 0 ) {
			$results = $query->row();
			return $results;
		} else {
			return FALSE;
		}
	}
	
	function get_question_list( $type, $topic_id )
	{
		$this->db->select( 'QM.question_name name, QM.id id' );
		$this->db->where( 'QM.type', $type );
		$this->db->where( 'QT.topic_id', $topic_id );
		$this->db->join( 'oe_qns_topic_relatn QT', 'QT.master_ref_id = QM.id' );
		$query = $this->db->get( 'oe_qsn_bnk_master QM' );
		if ( $query->num_rows() > 0 ) {
			$results = $query->result_array();
			return array_column( $results, 'name', 'id' );
		} else {
			return FALSE;
		}
	}
	
	public function change_package_question( $exe_q_id, $package_id )
	{
		$qus = $this->input->post( 'question', TRUE );
		if ( !$this->package_has_question( $package_id, $qus, $exe_q_id ) ) {
			
			$data = [
				'question_id' => $qus,
			];
			
			$this->db->update( 'oe_coupon_question', $data, ['id' => $exe_q_id] );
			
			if ( $this->db->affected_rows() > 0 ) {
				return TRUE;
			} else {
				$this->session->set_flashdata( 'flashError', 'Nothing Changed.' );
			}
		} else {
			$this->session->set_flashdata( 'flashError', 'This Question is already added in this package.' );
		}
		return FALSE;
	}
	
	public function package_has_question( $package_id, $qus, $exe_q_id )
	{
		$this->db->where( 'id !=', $exe_q_id );
		$this->db->where( 'package_ref_id', $package_id );
		$this->db->where( 'question_id', $qus );
		$query = $this->db->get( 'oe_coupon_question' );
		if ( $query->num_rows() == 0 ) {
			return FALSE;
		}
		
		return TRUE;
	}
}

