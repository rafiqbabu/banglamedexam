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
class Mod_package extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('mod_file_upload');
		$this->load->model( 'Mod_common' );
	}
	
	function get_package_types()
	{
		$this->db->select( '*' );
		$query = $this->db->get( 'oe_package_type' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	function get_package_types_array()
	{
		$package_category = $this->get_package_types();
		$array            = array('' => 'Choose');
		foreach ( $package_category as $key => $value ) {
			$array[$value->id] = $value->name;
		}
		return $array;
	}
	
	function get_topics_list_by_chapter( $chapter_id )
	{
		$this->db->where( 'chapter_ref_id', $chapter_id );
		$query = $this->db->get( 'oe_topics' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	function save_package_data( $authemail = NULL )
	{
		$data = array(
			'name'       => $this->input->post( 'name', TRUE ),
			'type'       => $this->input->post( 'type', TRUE ),
			'desc'       => base64_encode( $this->input->post( 'desc' ) ),
			'amount_bdt' => $this->input->post( 'amount_bdt', TRUE ),
			'amount_usd' => $this->input->post( 'amount_usd', TRUE ),
			'start_date' => db_date_format( $this->input->post( 'start_date', TRUE ) ),
			'end_date'   => db_date_format( $this->input->post( 'end_date', TRUE ) ),
			'created_by' => $authemail,
			'status'     => $this->input->post( 'status' ),
			'year'     	 => $this->input->post( 'year' ),
			'session'    => $this->input->post( 'session' ),
			'sm_ad'      => $this->input->post( 'sm_ad' ),
			'routine_url'=> $this->input->post( 'routine_url' )
		);
		
		$this->db->trans_start();
		$this->db->insert( 'oe_package', $data );
		
		$insert_id = $this->db->insert_id();
		if ( $insert_id ) {
			$exams = $this->input->post( 'exams', TRUE );
			if ( !empty( $exams ) ) {
				$q_data = [];
				foreach ( $exams as $exam ) {
					$exp      = explode( '|', $exam );
					$q_data[] = [
						'package_id'   => $insert_id,
						'exam_type_id' => $exp[0] ? $exp[0] : NULL,
						'exam_id'      => $exp[1] ? $exp[1] : NULL
					];
				}
				$this->db->insert_batch( 'oe_package_exams', $q_data );
			}
		}
		
		if ( $this->db->trans_status() ) {
			$this->db->trans_commit();
			return TRUE;
		} else {
			$this->db->trans_rollback();
		}
		return FALSE;
	}
	
	function update_package_data( $id, $authemail = NULL )
	{
		$data = array(
			'name'       => $this->input->post( 'name', TRUE ),
			'type'       => $this->input->post( 'type', TRUE ),
			'desc'       => base64_encode( $this->input->post( 'desc' ) ),
			'amount_bdt' => $this->input->post( 'amount_bdt', TRUE ),
			'amount_usd' => $this->input->post( 'amount_usd', TRUE ),
			'start_date' => db_date_format( $this->input->post( 'start_date', TRUE ) ),
			'end_date'   => db_date_format( $this->input->post( 'end_date', TRUE ) ),
			'updated_at' => date( "Y-m-d h:i:s" ),
			'updated_by' => $authemail,
			'status'     => $this->input->post( 'status' ),
			'year'       => $this->input->post( 'year' ),
			'session'    => $this->input->post( 'session' ),
			'sm_ad'      => $this->input->post( 'sm_ad' ),
			'routine_url'=> $this->input->post( 'routine_url' )
		);
		
		$this->db->trans_start();
		$f = $this->db->update( 'oe_package', $data, ['id' => $id] );
		
		$exams = $this->input->post( 'exams', TRUE );
		if ( !empty( $exams ) ) {
			$this->db->where( ['package_id' => $id] )->delete( 'oe_package_exams' );
			$q_data = [];
			foreach ( $exams as $exam ) {
				$exp      = explode( '|', $exam );
				$q_data[] = [
					'package_id'   => $id,
					'exam_type_id' => $exp[0] ? $exp[0] : NULL,
					'exam_id'      => $exp[1] ? $exp[1] : NULL
				];
			}
			$this->db->insert_batch( 'oe_package_exams', $q_data );
		}
		
		if ( $this->db->trans_status() ) {
			$this->db->trans_commit();
			return TRUE;
		} else {
			$this->db->trans_rollback();
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
			$package_type   = $this->input->post( 'package_type', TRUE );
			$status         = $this->input->post( 'status', TRUE );
			$from_date_time = $this->input->post( 'from_date_time', TRUE );
			$to_date_time   = $this->input->post( 'to_date_time', TRUE );
			$sql_where      .= "id != ''";
			
			if ( !empty( $package_type ) ) {
				$sql_where .= " and type = '$package_type'";
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
		
		$query = $this->db->order_by( "created_at", 'DESC' );
		$query = $this->db->get( 'oe_package', $limit, $row );
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
			$package_type   = $this->input->post( 'package_type', TRUE );
			$status         = $this->input->post( 'status', TRUE );
			$from_date_time = $this->input->post( 'from_date_time', TRUE );
			$to_date_time   = $this->input->post( 'to_date_time', TRUE );
			$sql_where      .= "id != ''";
			
			if ( !empty( $package_type ) ) {
				$sql_where .= " and type = '$package_type'";
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
		
		$query = $this->db->select( 'id' );
		$query = $this->db->get( 'oe_package' );
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
		$this->db->order_by( 'E.exam_name' );
		$query = $this->db->get( 'oe_package_exams PE' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return FALSE;
	}
	
	public function get_exams_ids_by_package( $id )
	{
		$this->db->select( "CONCAT(exam_type_id,'|',exam_id) id" );
		$this->db->where( 'package_id', $id );
		$query = $this->db->get( 'oe_package_exams' );
		if ( $query->num_rows() > 0 ) {
			$results = $query->result_array();
			
			return array_column( $results, 'id' );
		}
		return FALSE;
	}
	
	public function get_exams_ids_by_package_subject( $id, $subject_id )
	{
		$this->db->select( "CONCAT(PE.exam_type_id,'.',PE.exam_id) id" );
		$this->db->where( 'PE.package_id', $id );
		$this->db->where( 'E.subject_id', $subject_id );
		$this->db->join( 'oe_exam E', 'E.id = PE.exam_id' );
		$query = $this->db->get( 'oe_package_exams PE' );
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
		$query = $this->db->get( 'oe_package' );
		if ( $query->num_rows() > 0 ) {
			return $query->row();
		} else {
			return FALSE;
		}
	}
	
	function get_edit_chapter_topic_id( $auto_id )
	{
		$this->db->select( '*' );
		$this->db->where( 'package_ref_id', $auto_id );
		$query = $this->db->get( 'oe_package_question' );
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
		$query = $this->db->update( 'oe_package', $data );
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
		$query = $this->db->get( 'oe_package' );
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
			
			$this->db->update( 'oe_package_question', $data, ['id' => $exe_q_id] );
			
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
		$query = $this->db->get( 'oe_package_question' );
		if ( $query->num_rows() == 0 ) {
			return FALSE;
		}
		
		return TRUE;
	}
	
	public function get_packages_by_ids( $ids )
	{
		$this->db->select( "P.*" );
		$this->db->where_in( 'P.id', $ids );
		$this->db->where( 'status', 1 );
		$query = $this->db->get( 'oe_package P' );
		
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			
			$data = [];
			
			foreach ( $results as $result ) {
				$result->exam_ids = $this->get_exams_ids_by_package( $result->id );
				$data[]           = $result;
			}
			
			return $data;
		}
		return FALSE;
	}
	
	public function get_packages_by_ids_subject( $ids, $subject_id )
	{
		$this->db->select( "P.*" );
		$this->db->where_in( 'P.id', $ids );
		$this->db->where( 'status', 1 );
		$query = $this->db->get( 'oe_package P' );
		
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			
			$data = [];
			
			foreach ( $results as $result ) {
				$result->exam_ids = $this->get_exams_ids_by_package_subject( $result->id, $subject_id );
				$data[]           = $result;
			}
			
			return $data;
		}
		return FALSE;
	}
}

