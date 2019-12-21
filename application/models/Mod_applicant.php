<?php
/**
 * Created by PhpStorm.
 * User: nahian
 * Date: 12/18/17
 * Time: 4:37 PM
 */

class Mod_applicant extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_applicant( $limit = 0, $row = 0 )
	{
		$q = trim( $this->input->get( 'q', TRUE ) );

		if ( $q ) {
			$this->db->like( 'name', $q );
			$this->db->or_like( 'email', $q );
			$this->db->or_like( 'username', $q );
			$this->db->or_like( 'phone', $q );
			$this->db->or_like( 'reg_no', $q );
			$this->db->or_like( 'bmdc_no', $q );
		}
		$query = $this->db->order_by( 'created_at', 'DESC' )->get( 'oe_doc_master', $limit, $row );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return FALSE;
	}

	public function get_active_applicants_id()
	{
		$query = $this->db->select( 'id' )->where( 'status', 1 )->get( 'oe_doc_master' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return FALSE;
	}

	public function get_applicant( $id )
	{
		$query = $this->db->where( 'id', $id )->get( 'oe_doc_master' );
		if ( $query->num_rows() == 1 ) {
			return $query->row();
		}
		return FALSE;
	}
    
    //new
	public function get_userr( $id )
	{
		$query = $this->db->where( 'id', $id )->get( 'sif_users' );
		if ( $query->num_rows() == 1 ) {
			return $query->row();
		}
		return FALSE;
	}
	
	public function get_complain_id( $id )
	{
		$query = $this->db->where( 'id', $id )->get( 'oe_feedbacks' );
		if ( $query->num_rows() == 1 ) {
			return $query->row();
		}
		return FALSE;
	}
	
	//new
	public function get_user_role( $id )
	{
		$query = $this->db->where( 'user_id', $id )->get( 'user_role' );
		if ( $query->num_rows() == 1 ) {
			return $query->row();
		}
		return FALSE;
	}
	
	
	public function count_applicant()
	{
		$q = trim( $this->input->get( 'q', TRUE ) );

		if ( $q ) {
			$this->db->like( 'name', $q );
			$this->db->or_like( 'email', $q );
			$this->db->or_like( 'username', $q );
			$this->db->or_like( 'phone', $q );
			$this->db->or_like( 'reg_no', $q );
			$this->db->or_like( 'bmdc_no', $q );
		}
		$query = $this->db->select( 'id' )->get( 'oe_doc_master' );
		return $query->num_rows();
	}

	public function get_all_purchased_exams( $limit, $row )
	{
		$status = $this->input->get( 's' );
		$from = $this->input->get( 'f' );
		$to = $this->input->get( 't' );
		$ty = $this->input->get( 'ty' );
		( $from != '' ) ? $this->db->where( 'created_at >=', db_date_format( $from ) ) : NULL;
		( $to != '' ) ? $this->db->where( 'created_at <=', db_date_format( "$to +1 day" ) ) : NULL;
		( $status != '' ) ? $this->db->where( 'payment_status', $status ) : NULL;
		( $ty != '' ) ? $this->db->where( 'p_type', $ty ) : NULL;
		$query = $this->db->order_by( 'created_at', 'DESC' )->get( 'oe_doc_purchases', $limit, $row );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return FALSE;
	}

//new 
	public function get_for_pdf ()
	{
		$status = $this->input->get( 's' );
		$from = $this->input->get( 'f' );
		$to = $this->input->get( 't' );
		$ty = $this->input->get( 'ty' );
		( $from != '' ) ? $this->db->where( 'created_at >=', db_date_format( $from ) ) : NULL;
		( $to != '' ) ? $this->db->where( 'created_at <=', db_date_format( "$to +1 day" ) ) : NULL;
		( $status != '' ) ? $this->db->where( 'payment_status', $status ) : NULL;
		( $ty != '' ) ? $this->db->where( 'p_type', $ty ) : NULL;
		$query = $this->db->order_by( 'created_at', 'DESC' )->get( 'oe_doc_purchases' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return FALSE;
	}

	public function count_purchased_exams()
	{
		$status = $this->input->get( 's' );
		$from = $this->input->get( 'f' );
		$to = $this->input->get( 't' );
		$ty = $this->input->get( 'ty' );
		( $from != '' ) ? $this->db->where( 'created_at >=', db_date_format( $from ) ) : NULL;
		( $to != '' ) ? $this->db->where( 'created_at <=', db_date_format( "$to +1 day" ) ) : NULL;
		( $status != '' ) ? $this->db->where( 'payment_status', $status ) : NULL;
		( $ty != '' ) ? $this->db->where( 'p_type', $ty ) : NULL;
		$query = $this->db->select( 'id' )->get( 'oe_doc_purchases' );
		return $query->num_rows();
	}

	public function get_all_exam_history( $limit, $row )
	{
		$from = $this->input->get( 'f' );
		$to = $this->input->get( 't' );
		( $from != '' ) ? $this->db->where( 'created_at >=', db_date_format( $from ) ) : NULL;
		( $to != '' ) ? $this->db->where( 'created_at <=', db_date_format( "$to +1 day" ) ) : NULL;

		$status = $this->input->get( 's' );
		( $status != '' ) ? $this->db->where( 'status', $status ) : NULL;

		$exam_cate = $this->input->get( 'c' );
		( $exam_cate != '' ) ? $this->db->where( 'exam_type_id', $exam_cate ) : NULL;

		$applicant = $this->input->get( 'a' );
		( $applicant != '' ) ? $this->db->where( 'doc_id', $applicant ) : NULL;
		
		$exam_id = $this->input->get( 'e' );
		( $exam_id != '' ) ? $this->db->where( 'exam_id', $exam_id ) : NULL;

		$query = $this->db->order_by( 'created_at', 'DESC' )->get( 'oe_doc_exams', $limit, $row );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return FALSE;
	}

	public function count_exam_history()
	{
		$status = $this->input->get( 's' );
		$from = $this->input->get( 'f' );
		$to = $this->input->get( 't' );
		$exam_cate = $this->input->get( 'c' );
		( $from != '' ) ? $this->db->where( 'created_at >=', db_date_format( $from ) ) : NULL;
		( $to != '' ) ? $this->db->where( 'created_at <=', db_date_format( "$to +1 day" ) ) : NULL;
		( $status != '' ) ? $this->db->where( 'status', $status ) : NULL;
		( $exam_cate != '' ) ? $this->db->where( 'exam_type_id', $exam_cate ) : NULL;

		$applicant = $this->input->get( 'a' );
		( $applicant != '' ) ? $this->db->where( 'doc_id', $applicant ) : NULL;
		
		$exam_id = $this->input->get( 'e' );
		( $exam_id != '' ) ? $this->db->where( 'exam_id', $exam_id ) : NULL;

		$query = $this->db->select( 'id' )->get( 'oe_doc_exams' );
		return $query->num_rows();
	}

	public function get_question_count()
	{
//        $this->db->select( 'QM.type type, QT.chapter_ref_id chapter_id, C.chapter_name, QT.topic_id topic_id, T.name topic_name, count(QM.id) count' );
//        $this->db->group_by( 'topic_id, type' );
//        $this->db->join( 'oe_qns_topic_relatn QT', 'T.id=QT.topic_id');
//        $this->db->join( 'oe_qsn_bnk_master QM', 'QM.id=QT.master_ref_id' );
		$this->db->select( 'T.id, T.name topic_name, C.chapter_name, C.id chapter_id' );
		$this->db->order_by( 'chapter_name, id' );
		$this->db->join( 'oe_chapter C', 'C.id=T.chapter_ref_id' );
		$query = $this->db->get( 'oe_topics T' );
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			$data = [];
			foreach ( $results as $result ) {

				$sba_count = $this->db->select( 'master_ref_id' )
									  ->where( ['topic_id' => $result->id, 'chapter_ref_id' => $result->chapter_id, 'type' => 1] )
									  ->join( 'oe_qsn_bnk_master QM', 'QM.id = QT.master_ref_id' )
									  ->get( 'oe_qns_topic_relatn QT' )->num_rows();
				$mcq_count = $this->db->select( 'master_ref_id' )
									  ->where( ['topic_id' => $result->id, 'chapter_ref_id' => $result->chapter_id, 'type' => 2] )
									  ->join( 'oe_qsn_bnk_master QM', 'QM.id = QT.master_ref_id' )
									  ->get( 'oe_qns_topic_relatn QT' )->num_rows();
				$data[$result->chapter_name][$result->topic_name]['SBA'] = $sba_count;
				$data[$result->chapter_name][$result->topic_name]['MCQ'] = $mcq_count;
			}

			return $data;
		}

		return FALSE;
	}
	
	public function get_user_exam_result( $exam_id, $where = [] )
	{
		$this->db->where( 'status', 1 );
//		$this->db->where( 'doc_id', $id );
		$this->db->where( 'id', $exam_id );
		
		if ( count( $where ) ) $this->db->where( $where );
		
		$query = $this->db->get( 'oe_doc_exams' );
		
		if ( $query->num_rows() == 1 ) {
			$doc_exam            = $query->row();
			$doc_exam->exam_data = $this->Mod_common->get_row_data_by_id( 'oe_exam', $doc_exam->exam_id );
			return $doc_exam;
		}
		
		return FALSE;
		
	}
	
	public function get_user_exam_questions_with_answers( $exam_id )
	{
		
		$id = $this->session->userdata( 'user' )->id;
		
		$query = $this->db->select( 'question_id id' )
						  ->where( 'exam_ref_id', $exam_id )
//                          ->order_by( 'id', 'random' )
						  ->get( 'oe_exam_question' );
		
		if ( $query->num_rows() > 0 ) {
			$questions = $query->result();
			$data      = [];
			
			foreach ( $questions as $i => $question ) {
				$data[$i]['question'] = $this->Mod_common->get_row_data_by_id( 'oe_qsn_bnk_master', $question->id );
				$data[$i]['answers']  = $this->Mod_common->get_question_anserws( $question->id );
			}
			
			return $data;
		}
		
		return FALSE;
	}
	
	public function get_all_user()
	{
		$q = trim( $this->input->get( 'q', TRUE ) );

		if ( $q ) {
			$this->db->like( 'username', $q );
			$this->db->or_like( 'email', $q );
		}
		$query = $this->db->order_by( 'id', 'ASC' )->get( 'sif_users' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return FALSE;
	}
	
	public function get_all_complain()
	{
		$q = trim( $this->input->get( 'q', TRUE ) );

		if ( $q ) {
			$this->db->like( 'username', $q );
			$this->db->or_like( 'email', $q );
		}
		$query = $this->db->order_by( 'id', 'DESC' )->get( 'oe_feedbacks' );
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return FALSE;
	}
	
	
}
