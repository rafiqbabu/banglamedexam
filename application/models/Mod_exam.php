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
class Mod_exam extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('mod_file_upload');
		$this->load->model( 'Mod_common' );
	}
	
	function get_exam_category()
	{
		$this->db->select( '*' );
		$query = $this->db->get( 'sif_exam_category' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	function get_exam_category_array()
	{
		$exam_category = $this->get_exam_category();
		$array         = array('' => 'Choose');
		foreach ( $exam_category as $key => $value ) {
			$array[$value->id] = $value->exam_category_name;
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
	
	function save_exam_info()
	{
		$questions = $this->input->post( 'question', TRUE );
		
		$package_id = $this->input->post( 'package_id', TRUE );
		$sql="SELECT * FROM oe_exam WHERE package_id2 = '$package_id' ORDER BY id DESC LIMIT 1";
	    $query = $this->db->query($sql);
	    if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$exam_no = $row->exam_no+1;  
			}
		} else {
			$exam_no = 1;
		}
		
		$data = array(
			'exam_name'         => $this->input->post( 'exam_name', TRUE ),
			'institute_id'      => $this->input->post( 'institute_id', TRUE ),
			'course_id'         => $this->input->post( 'course_id', TRUE ),
			'faculty_id'        => $this->input->post( 'faculty_id', TRUE ),
			'subject_id'        => $this->input->post( 'subject_id', TRUE ),
			'free_exam'         => $this->input->post( 'free_exam', TRUE ),
			'exam_id'           => $this->input->post( 'exam_id', TRUE ),
			'mcq_total'         => $this->input->post( 'mcq_total', TRUE ),
			'mcq_value'         => $this->input->post( 'mcq_value', TRUE ),
			'sba_total'         => $this->input->post( 'sba_total', TRUE ),
			'sba_value'         => $this->input->post( 'sba_value', TRUE ),
			'negative_mark'     => $this->input->post( 'negative_mark', TRUE ),
			'total_mark'        => $this->input->post( 'total_mark', TRUE ),
			'time'              => $this->input->post( 'time', TRUE ),
			'ans_visible'       => $this->input->post( 'ans_visible', TRUE ),
			'exam_cost'         => $this->input->post( 'exam_cost', TRUE ),
			'exam_detail'       => $this->input->post( 'exam_detail', TRUE ),
			'status'            => $this->input->post( 'status', TRUE ),
			'is_sif'     	    => $this->input->post( 'is_sif', TRUE ),
			'exam_comm_code'    => $this->input->post( 'exam_comm_code', TRUE ),
			'package_id2' 	=> $this->input->post( 'package_id', TRUE ),
			'exam_no' 		=> $exam_no
		);
		
		$result = $this->db->insert( 'oe_exam', $data );
		
		$insert_id = $this->db->insert_id();
		
		if ( $insert_id > 0 ) {
			if ( !empty( $questions ) ) {
				$q_data = [];
				foreach ( $questions as $type => $topics ) {
					foreach ( $topics as $ct => $topic ) {
						$exp = explode( '-', $ct );
						foreach ( $topic as $item ) {
							$q_data[] = [
								'exam_ref_id'      => $insert_id,
								'question_type_id' => $type,
								'question_id'      => $item,
								'chapter_id'       => $exp[0],
								'topic_id'         => $exp[1]
							];
						}
					}
				}
				$this->db->insert_batch( 'oe_exam_question', $q_data );
			}
		}
		
		if ( $result ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_all_exam_list( $limit = 20, $row = 0 )
	{
		
		$sql_where = "";
		
		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			
			$exam_name    = $this->input->post( 'exam_name', TRUE );
			$exam_id      = $this->input->post( 'exam_id', TRUE );
			$institute_id = $this->input->post( 'institute_id', TRUE );
			$course_id    = $this->input->post( 'course_id', TRUE );
			$faculty_id   = $this->input->post( 'faculty_id', TRUE );
			$subject_id   = $this->input->post( 'subject_id', TRUE );
			
			$sql_where .= "id != ''";
			
			if ( !empty( $exam_name ) ) {
				$sql_where .= " and exam_name like '%$exam_name%'";
			}
			
			if ( !empty( $institute_id ) ) {
				$sql_where .= " and institute_id = '$institute_id'";
			}
			
			if ( !empty( $course_id ) ) {
				$sql_where .= " and course_id = '$course_id'";
			}
			
			if ( !empty( $faculty_id ) ) {
				$sql_where .= " and faculty_id = '$faculty_id'";
			}
			
			if ( !empty( $subject_id ) ) {
				$sql_where .= " and subject_id = '$subject_id'";
			}

//			if (!empty($from_date_time) and !empty($to_date_time)) {
//				$final_date_from = date('Y-m-d', strtotime($from_date_time)) . " 00:00:00";
//				$final_date_to = date('Y-m-d', strtotime($to_date_time)) . " 23:59:59";
//				$sql_where .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
//			}
			
			$this->session->unset_userdata( 'sql_where_session' );
			$this->session->set_userdata( 'sql_where_session', $sql_where );
			
		} else {
			$sql_where = $this->session->userdata( 'sql_where_session' );
		}
		
		if ( $sql_where != "" ) {
			$this->db->where( $sql_where );
		}
		
		$this->db->order_by( "id", 'DESC' );
//		$this->db->where( "status", 1 );
		$query = $this->db->get( 'oe_exam', $limit, $row );
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			return $results;
		} else {
			return FALSE;
		}
	}
	
	
	function count_records()
	{
		
		$sql_where = "";
		
		if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
			
			$exam_name    = $this->input->post( 'exam_name', TRUE );
			$exam_id      = $this->input->post( 'exam_id', TRUE );
			$institute_id = $this->input->post( 'institute_id', TRUE );
			$course_id    = $this->input->post( 'course_id', TRUE );
			$faculty_id   = $this->input->post( 'faculty_id', TRUE );
			$subject_id   = $this->input->post( 'subject_id', TRUE );
			
			$sql_where .= "id != ''";
			
			if ( !empty( $exam_name ) ) {
				$sql_where .= " and exam_name like '%$exam_name%'";
			}
			
			if ( !empty( $institute_id ) ) {
				$sql_where .= " and institute_id = '$institute_id'";
			}
			
			if ( !empty( $course_id ) ) {
				$sql_where .= " and course_id = '$course_id'";
			}
			
			if ( !empty( $faculty_id ) ) {
				$sql_where .= " and faculty_id = '$faculty_id'";
			}
			
			if ( !empty( $subject_id ) ) {
				$sql_where .= " and subject_id = '$subject_id'";
			}

//			if (!empty($from_date_time) and !empty($to_date_time)) {
//				$final_date_from = date('Y-m-d', strtotime($from_date_time)) . " 00:00:00";
//				$final_date_to = date('Y-m-d', strtotime($to_date_time)) . " 23:59:59";
//				$sql_where .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
//			}
			
			$this->session->unset_userdata( 'sql_where_session' );
			$this->session->set_userdata( 'sql_where_session', $sql_where );
			
		} else {
			$sql_where = $this->session->userdata( 'sql_where_session' );
		}
		
		if ( $sql_where != "" ) {
			$this->db->where( $sql_where );
		}
		
		$this->db->select( 'id' );
		$query = $this->db->get( 'oe_exam' );
		
		return $query->num_rows();
		
	}
	
	function get_exam_details( $auto_id )
	{
		$this->get_edit_chapter_topic_id( $auto_id );
		$this->db->select( ['e.*', 'ec.exam_category_name type'] );
		$this->db->where( 'e.id', $auto_id );
		$this->db->join( 'sif_exam_category ec', 'ec.id = e.exam_id', 'left' );
		$query = $this->db->get( 'oe_exam e' );
		if ( $query->num_rows() > 0 ) {
			return $query->row();
		} else {
			return FALSE;
		}
	}
	
	function get_edit_chapter_topic_id( $auto_id )
	{
		$this->db->select( '*' );
		$this->db->where( 'exam_ref_id', $auto_id );
		$query = $this->db->get( 'oe_exam_question' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	function update_exam_list_value( $auto_id )
	{
		
		$data = array(
			'exam_name'     => $this->input->post( 'exam_name', TRUE ),
			'institute_id'  => $this->input->post( 'institute_id', TRUE ),
			'course_id'     => $this->input->post( 'course_id', TRUE ),
			'faculty_id'    => $this->input->post( 'faculty_id', TRUE ),
			'subject_id'    => $this->input->post( 'subject_id', TRUE ),
			'exam_id'       => $this->input->post( 'exam_id', TRUE ),
			'mcq_total'     => $this->input->post( 'mcq_total', TRUE ),
			'mcq_value'     => $this->input->post( 'mcq_value', TRUE ),
			'sba_total'     => $this->input->post( 'sba_total', TRUE ),
			'sba_value'     => $this->input->post( 'sba_value', TRUE ),
			'negative_mark' => $this->input->post( 'negative_mark', TRUE ),
			'total_mark'    => $this->input->post( 'total_mark', TRUE ),
			'time'          => $this->input->post( 'time', TRUE ),
			'exam_cost'     => $this->input->post( 'exam_cost', TRUE ),
			'exam_detail'   => $this->input->post( 'exam_detail', TRUE )
		);
		
		$this->db->where( 'id', $auto_id );
		$query = $this->db->update( 'oe_exam', $data );
		if ( $query ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get_all_question_list_in_exam( $exam_id )
	{
		
		$this->db->select( '*' );
		$this->db->where( 'id', $exam_id );
		//$query = $this->db->order_by("id", 'DESC');
		$query = $this->db->get( 'oe_exam' );
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
			$results = $query->result();
			$data    = [];
			foreach ( $results as $result ) {
				$data[$result->id] = strip_tags( $result->name );
			}
			return $data;
		} else {
			return FALSE;
		}
	}
	
	public function change_exam_question( $exe_q_id, $exam_id )
	{
		$qus = $this->input->post( 'question', TRUE );
		if ( !$this->exam_has_question( $exam_id, $qus, $exe_q_id ) ) {
			
			$data = [
				'question_id' => $qus,
			];
			
			$this->db->update( 'oe_exam_question', $data, ['id' => $exe_q_id] );
			
			if ( $this->db->affected_rows() > 0 ) {
				return TRUE;
			} else {
				$this->session->set_flashdata( 'flashError', 'Nothing Changed.' );
			}
		} else {
			$this->session->set_flashdata( 'flashError', 'This Question is already added in this exam.' );
		}
		return FALSE;
	}
	
	public function exam_has_question( $exam_id, $qus, $exe_q_id )
	{
		$this->db->where( 'id !=', $exe_q_id );
		$this->db->where( 'exam_ref_id', $exam_id );
		$this->db->where( 'question_id', $qus );
		$query = $this->db->get( 'oe_exam_question' );
		if ( $query->num_rows() == 0 ) {
			return FALSE;
		}
		
		return TRUE;
	}
	
	public function get_exam_questions( $exam_id )
	{
		$this->db->select( ['eq.id', 'qm.type', 'eq.question_id', 'qm.question_name', 'qm.correct_ans', 'qm.discussion', 'qm.reference'] );
		$this->db->where( 'eq.exam_ref_id', $exam_id );
		$this->db->where( 'qm.status', 1 );
		$this->db->join( 'oe_qsn_bnk_master qm', 'qm.id = eq.question_id' );
		$query = $this->db->get( 'oe_exam_question eq' );
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			foreach ( $results as $result ) {
				$query = $this->db->where( ['master_ref_id' => $result->question_id] )
								  ->order_by( 'index_seqn' )
								  ->get( 'oe_qsn_bnk_ans', 5 );
				
				$result->ans = $query->result_array();
			}
			return array_chunk( $results, 2 );
		}
		
		return FALSE;
	}
	
	public function get_exam_questions_only( $exam_id )
	{
		$this->db->select( ['eq.*'] );
		$this->db->where( 'eq.exam_ref_id', $exam_id );
		$this->db->where( 'qm.status', 1 );
		$this->db->join( 'oe_qsn_bnk_master qm', 'qm.id = eq.question_id' );
		$query = $this->db->get( 'oe_exam_question eq' );
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			return $results;
		}
		
		return FALSE;
	}
	
	
	
	
	
	
	public function copy_exam_info( $exam, $questions )
	{
		if ( !empty( $questions ) ) {
			$exam_name  = $this->input->post( 'exam_name', TRUE );
			$faculty_id = $this->input->post( 'faculty_id', TRUE );
			$subject_id = $this->input->post( 'subject_id', TRUE );
			$is_sif = $this->input->post( 'is_sif', TRUE );
			$sif_exam_code = $this->input->post( 'sif_exam_code', TRUE );
			$data       = array(
				'exam_name'     => $exam_name,
				'institute_id'  => $exam->institute_id,
				'course_id'     => $exam->course_id,
				'faculty_id'    => $faculty_id,
				'subject_id'    => $subject_id,
				'free_exam'     => $exam->free_exam,
				'exam_id'       => $exam->exam_id,
				'mcq_total'     => $exam->mcq_total,
				'mcq_value'     => $exam->mcq_value,
				'sba_total'     => $exam->sba_total,
				'sba_value'     => $exam->sba_value,
				'negative_mark' => $exam->negative_mark,
				'total_mark'    => $exam->total_mark,
				'time'          => $exam->time,
				'ans_visible'   => $exam->ans_visible,
				'exam_cost'     => $exam->exam_cost,
				'exam_detail'   => $exam->exam_detail,
				'is_sif'		=> $is_sif,
				'exam_comm_code' => $sif_exam_code,
				'package_id2'   => $exam->package_id2,
				'exam_no'   	=> $exam->exam_no,
			);
			
			$this->db->trans_start();
			
			$this->db->insert( 'oe_exam', $data );
			
			$insert_id = $this->db->insert_id();
			
			if ( $insert_id > 0 ) {
				$q_data = [];
				foreach ( $questions as $type => $question ) {
					$q_data[] = [
						'exam_ref_id'      => $insert_id,
						'question_type_id' => $question->question_type_id,
						'question_id'      => $question->question_id,
						'chapter_id'       => $question->chapter_id,
						'topic_id'         => $question->topic_id
					];
				}
				$this->db->insert_batch( 'oe_exam_question', $q_data );
			}
			
			if ( $this->db->trans_status() == TRUE ) {
				$this->db->trans_commit();
				return TRUE;
			}
		}
		return FALSE;
	}
}

