<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_schedule
 *
 * @author jnahian
 * @property common_lib      $common_lib
 * @property mod_file_upload $mod_file_upload
 */
class Mod_examquestions extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'Mod_file_upload' );
    }
    
    
    public function save_question_list( $user_email )
    {
        $data = array(
            'question_name'    => $this->input->post( 'question_name', TRUE ),
            'correct_ans'      => $this->input->post( 'correct_ans', TRUE ),
            'question_in_year' => $this->input->post( 'question_in_year', TRUE ),
            'heading'          => $this->input->post( 'heading' ),
            'type'             => $this->input->post( 'type' ),
            'discussion'       => $this->input->post( 'discussion' ),
            'reference'        => $this->input->post( 'reference' ),
            'created_by'       => $user_email,
            'status'           => $this->input->post( 'status', TRUE )
        );
        //echo '<pre>';print_r($data);exit();
        $result    = $this->db->insert( 'oe_qsn_bnk_master', $data );
        $insert_id = $this->db->insert_id();
        $ans       = $this->input->post( 'ans', TRUE );
        
        $array_ans_index = array('a', 'b', 'c', 'd', 'e');
        if ( $insert_id ) {
            //foreach ($ans as $key => $value) {
            foreach ( $array_ans_index as $key => $value ) {
                if ( $value ) {
                    $ans_field = $this->input->post( 'ans_' . $value, TRUE );
                    //echo $ans_field;exit();
                    $data   = array(
                        'master_ref_id' => $insert_id,
                        'ans'           => $ans_field,
                        'index_seqn'    => strtoupper( $value )
                    );
                    $result = $this->db->insert( 'oe_qsn_bnk_ans', $data );
                }
            }
    
            $chapter_array = $this->input->post( 'chapter', TRUE );
    
            if ( !empty( $chapter_array ) ) {
                foreach ( $chapter_array as $key_ => $value_ ) {
                    $chapter_id   = $value_;
                    $chapter_data = array();
                    $chapter_data = array(
                        'chapter_id'      => $chapter_id,
                        'master_ref_id  ' => $insert_id
                    );
    
                    $this->db->insert( 'oe_qns_chapter_relatn', $chapter_data );
    
                    $topics_arry = $this->input->post( 'topics_' . $chapter_id, TRUE );
                    if ( !empty( $topics_arry ) ) {
                        foreach ( $topics_arry as $key_topics => $value_topics ) {
                            $topics_id = $value_topics;
    
                            //echo "<pre>";
                            // print_r($topics_arry);
                            //exit();
    
    
                            $topics_data = array();
                            $topics_data = array(
                                'topic_id'        => $topics_id,
                                'chapter_ref_id'  => $chapter_id,
                                'master_ref_id  ' => $insert_id
                            );
    
                            $this->db->insert( 'oe_qns_topic_relatn', $topics_data );
                        }
                    }
                }
            }//chapter
    
        }
        if ( $result ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function update_question_list( $id, $user_email )
    {
        $data = array(
            'question_name'    => $this->input->post( 'question_name' ),
            'correct_ans'      => $this->input->post( 'correct_ans', TRUE ),
            'question_in_year' => $this->input->post( 'question_in_year', TRUE ),
            'heading'          => $this->input->post( 'heading' ),
            'type'             => $this->input->post( 'type' ),
            'discussion'       => $this->input->post( 'discussion' ),
            'reference'        => $this->input->post( 'reference' ),
            'created_by'       => $user_email,
            'status'           => $this->input->post( 'status', TRUE )
        );
        $this->db->where( 'id', $id );
        $result    = $this->db->update( 'oe_qsn_bnk_master', $data );
        $insert_id = $id;
    
        //$ans = $this->input->post('ans',TRUE);
    
        $array_ans_index = array('A', 'B', 'C', 'D', 'E');
        //print_r($array_ans_index);exit();
        if ( $insert_id ) {
    
            foreach ( $array_ans_index as $key => $value ) {
                if ( $value ) {
                    $ans_field = $this->input->post( 'ans_' . strtolower( $value ) );
                    //echo $ans_field;exit();
                    $data = array(
                        'master_ref_id' => $insert_id,
                        'ans'           => $ans_field,
                        'index_seqn'    => $value
                    );
                    $this->db->where( 'master_ref_id', $id );
                    $this->db->where( 'index_seqn', $value );
                    $result = $this->db->update( 'oe_qsn_bnk_ans', $data );
                }
            }
    
            $chapter_array = $this->input->post( 'chapter', TRUE );
    
            if ( !empty( $chapter_array ) ) {
                // Delete Chapter
                $this->db->where( 'master_ref_id', $insert_id );
                $this->db->delete( 'oe_qns_chapter_relatn' );
                // Delete Topics
                $this->db->where( 'master_ref_id', $insert_id );
                $this->db->delete( 'oe_qns_topic_relatn' );
                
                foreach ( $chapter_array as $key_ => $value_ ) {
                    $chapter_id   = $value_;
                    $chapter_data = array(
                        'chapter_id'      => $chapter_id,
                        'master_ref_id  ' => $insert_id
                    );
    
                    $this->db->insert( 'oe_qns_chapter_relatn', $chapter_data );
    
                    $topics_arry = $this->input->post( 'topics_' . $chapter_id, TRUE );
                    if ( !empty( $topics_arry ) ) {
                        foreach ( $topics_arry as $key_topics => $value_topics ) {
                            $topics_id   = $value_topics;
                            $topics_data = array(
                                'topic_id'        => $topics_id,
                                'chapter_ref_id'  => $chapter_id,
                                'master_ref_id  ' => $insert_id
                            );
            
                            $this->db->insert( 'oe_qns_topic_relatn', $topics_data );
                        }
                    }
                }
            }//chapter
            
            
            // add new chapter and topics
            $chapter_array = $this->input->post( 'chapter_new', TRUE );
            if ( !empty( $chapter_array ) ) {
                foreach ( $chapter_array as $key_ => $value_ ) {
                    $chapter_id   = $value_;
                    $chapter_data = array();
                    $chapter_data = array(
                        'chapter_id'      => $chapter_id,
                        'master_ref_id  ' => $insert_id
                    );
    
    
                    $result = $this->db->insert( 'oe_qns_chapter_relatn', $chapter_data );
    
                    $topics_arry = $this->input->post( 'topics_new' . $chapter_id, TRUE );
                    if ( !empty( $topics_arry ) ) {
                        foreach ( $topics_arry as $key_topics => $value_topics ) {
                            $topics_id = $value_topics;
    
                            //echo "<pre>";
                            // print_r($topics_arry);
                            //exit();
    
    
                            $topics_data = array();
                            $topics_data = array(
                                'topic_id'        => $topics_id,
                                'chapter_ref_id'  => $chapter_id,
                                'master_ref_id  ' => $insert_id
                            );
    
                            $this->db->insert( 'oe_qns_topic_relatn', $topics_data );
                        }
                    }
                }
            }//chapter
            // end new chapter and topics
    
    
        }//insert id
    
        if ( $result ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    function get_records_list( $limit = 20, $row = 0 )
    {
        $sql_where = "";
    
        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
            $to_date_time   = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
            $chapter_id     = $this->security->xss_clean( $this->input->post( 'chapter_id' ) );
            $topic_id       = $this->security->xss_clean( $this->input->post( 'topic_id' ) );
            
            $sql_where .= "QM.id != ''";
        
            if ( !empty( $chapter_id ) ) {
                $sql_where .= " and TR.chapter_ref_id = '$chapter_id'";
            }
            if ( !empty( $topic_id ) ) {
                $sql_where .= " and TR.topic_id = '$topic_id'";
            }
            $question = $this->security->xss_clean( $this->input->post( 'question' ) );
            if ( !empty( $question ) ) {
                $sql_where .= " and QM.question_name like '%$question%'";
            }
            if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
                $final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
                $final_date_to   = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
                $sql_where       .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
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
        $this->db->select( 'QM.id, QM.type, QM.question_name, QM.correct_ans, QM.question_in_year, QM.discussion, QM.heading, QM.reference, QM.created_at, QM.created_by, QM.status' );
        $this->db->where( 'QM.type', '1' );
        $this->db->order_by( "QM.id", 'DESC' );
        $this->db->join( 'oe_qns_topic_relatn TR', 'TR.master_ref_id = QM.id' );
        $query = $this->db->get( 'oe_qsn_bnk_master QM', $limit, $row );
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            return $results;
        }
        //echo $read_db->last_query();
        return FALSE;
    }
    
    function count_records()
    {
        $sql_where = "";
    
        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
            $to_date_time   = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
            $chapter_id     = $this->security->xss_clean( $this->input->post( 'chapter_id' ) );
            $topic_id       = $this->security->xss_clean( $this->input->post( 'topic_id' ) );
            
            $sql_where .= "QM.id != ''";
        
            if ( !empty( $chapter_id ) ) {
                $sql_where .= " and TR.chapter_ref_id = '$chapter_id'";
            }
            if ( !empty( $topic_id ) ) {
                $sql_where .= " and TR.topic_id = '$topic_id'";
            }
            $question = $this->security->xss_clean( $this->input->post( 'question' ) );
            if ( !empty( $question ) ) {
                $sql_where .= " and QM.question_name like '%$question%'";
            }
            if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
                $final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
                $final_date_to   = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
                $sql_where       .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
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
        $this->db->where( 'QM.type', '1' );
        $this->db->order_by( "QM.id", 'DESC' );
        $this->db->join( 'oe_qns_topic_relatn TR', 'TR.master_ref_id = QM.id' );
        $query = $this->db->get( 'oe_qsn_bnk_master QM' );
        return $query->num_rows();
    }
    
    function get_topic_questions_list( $topic_id, $type = 1, $limit = 20, $row = 0 )
    {
        $this->db->where( 'T.topic_id', $topic_id );
        $this->db->where( 'Q.status', 1 );
        $this->db->where( 'Q.type', $type );
        $this->db->order_by( "Q.question_name" );
        $this->db->join( 'oe_qsn_bnk_master Q', 'T.master_ref_id = Q.id', 'LEFT' );
        $query = $this->db->get( 'oe_qns_topic_relatn T', $limit, $row );
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            return $results;
        }
        //echo $read_db->last_query();
        return FALSE;
    }
    
    function count_topic_questions_list( $topic_id, $type = 1 )
    {
        $this->db->select( 'Q.id' );
        $this->db->where( 'T.topic_id', $topic_id );
        $this->db->where( 'Q.status', 1 );
        $this->db->where( 'Q.type', $type );
        $this->db->join( 'oe_qns_topic_relatn T', 'T.master_ref_id = Q.id' );
        $query = $this->db->get( 'oe_qsn_bnk_master Q' );
        return $query->num_rows();
    }
    
    
    function get_exam_details( $autoid )
    {
        $this->db->select( '*' );
        $this->db->where( 'id', $autoid );
        // $this->get_option_list($autoid);
        $query = $this->db->get( 'oe_qsn_bnk_master' );
        if ( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    
    function get_option_list2( $autoid )
    {
        $this->db->select( '*' );
        $array_ans_index = array('A', 'B', 'C', 'D', 'E');
        // print_r($array_ans_index);exit;
        foreach ( $array_ans_index as $key => $value ) {
            $this->db->where( 'master_ref_id', $autoid );
            $this->db->where( 'index_seqn', $value );
            $query = $this->db->get( 'oe_qsn_bnk_ans' );
            if ( $query->num_rows() > 0 ) {
                return $row = $query->row()->ans;
            } else {
                return FALSE;
            }
    
        }
    }
    
    function get_option_list( $autoid )
    {
        $array_ans_index = array('A', 'B', 'C', 'D', 'E');
    
        $this->db->where( 'master_ref_id', $autoid );
        $this->db->where_in( 'index_seqn', $array_ans_index );
    
        $query = $this->db->get( 'oe_qsn_bnk_ans' );
    
        if ( $query->num_rows() > 0 ) {
            return $query->result();
            //echo "<pre>";
            // print_r($query->result());
            // exit();
        }
    }
    
    /*mcq exam question*/
    
    function save_mcq_exam_question_list( $user_email )
    {
        $data      = array(
            'question_name'    => $this->input->post( 'question_name' ),
            'type'             => $this->input->post( 'type', TRUE ),
            'question_in_year' => $this->input->post( 'question_in_year', TRUE ),
            'heading'          => $this->input->post( 'heading' ),
            'discussion'       => $this->input->post( 'discussion', TRUE ),
            'reference'        => $this->input->post( 'reference', TRUE ),
            'created_by'       => $user_email,
            'status'           => $this->input->post( 'status', TRUE )
        );
        $result    = $this->db->insert( 'oe_qsn_bnk_master', $data );
        $insert_id = $this->db->insert_id();
    
    
        $array_ans_index = array('a', 'b', 'c', 'd', 'e');
    
        // print_r($correct_ans);exit();
        if ( $insert_id ) {
            foreach ( $array_ans_index as $key => $value ) {
                if ( $value ) {
                    $ans_field   = $this->input->post( 'ans_' . strtolower( $value ) );
                    $correct_ans = $this->input->post( 'correct_ans', TRUE );
    
                    $data    = array(
                        'master_ref_id' => $insert_id,
                        'ans'           => $ans_field,
                        'index_seqn'    => strtoupper( $value ),
                        'correct_ans'   => $correct_ans[$key]
                    );
                    $result1 = $this->db->insert( 'oe_qsn_bnk_ans', $data );
                }
            }
    
    
            $chapter_array = $this->input->post( 'chapter', TRUE );
            if ( !empty( $chapter_array ) ) {
                foreach ( $chapter_array as $key_ => $value_ ) {
                    $chapter_id   = $value_;
                    $chapter_data = array();
                    $chapter_data = array(
                        'chapter_id'      => $chapter_id,
                        'master_ref_id  ' => $insert_id
                    );
    
                    $this->db->insert( 'oe_qns_chapter_relatn', $chapter_data );
    
                    $topics_arry = $this->input->post( 'topics_' . $chapter_id, TRUE );
                    if ( !empty( $topics_arry ) ) {
                        foreach ( $topics_arry as $key_topics => $value_topics ) {
                            $topics_id   = $value_topics;
                            $topics_data = array();
                            $topics_data = array(
                                'topic_id'        => $topics_id,
                                'chapter_ref_id'  => $chapter_id,
                                'master_ref_id  ' => $insert_id
                            );
    
                            $result = $this->db->insert( 'oe_qns_topic_relatn', $topics_data );
                            //echo $result;exit();
                        }
                    }
                }
            }//chapter
    
        }
        if ( $result ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function get_mcq_examquestion_list( $limit = 20, $row = 0 )
    {
        $sql_where = "";
    
        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
            $to_date_time   = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
            $chapter_id     = $this->security->xss_clean( $this->input->post( 'chapter_id' ) );
            $topic_id       = $this->security->xss_clean( $this->input->post( 'topic_id' ) );
            
            $sql_where .= "QM.id != ''";
        
            if ( !empty( $chapter_id ) ) {
                $sql_where .= " and TR.chapter_ref_id = '$chapter_id'";
            }
            if ( !empty( $topic_id ) ) {
                $sql_where .= " and TR.topic_id = '$topic_id'";
            }
        
            $question = $this->security->xss_clean( $this->input->post( 'question' ) );
            if ( !empty( $question ) ) {
                $sql_where .= " and QM.question_name like '%$question%'";
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
        $this->db->select( 'QM.id, QM.type, QM.question_name, QM.correct_ans, QM.question_in_year, QM.discussion, QM.heading, QM.reference, QM.created_at, QM.created_by, QM.status' );
        $this->db->where( 'QM.type', '2' );
        $this->db->order_by( "QM.id", 'DESC' );
        $this->db->join( 'oe_qns_topic_relatn TR', 'TR.master_ref_id = QM.id' );
        $query = $this->db->get( 'oe_qsn_bnk_master QM', $limit, $row );
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            return $results;
        }
        return FALSE;
    }
    
    function count_mcq_examquestion_list()
    {
        $sql_where = "";
    
        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
            $to_date_time   = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
            $chapter_id     = $this->security->xss_clean( $this->input->post( 'chapter_id' ) );
            $topic_id       = $this->security->xss_clean( $this->input->post( 'topic_id' ) );
            
            $sql_where .= "QM.id != ''";
        
            if ( !empty( $chapter_id ) ) {
                $sql_where .= " and TR.chapter_ref_id = '$chapter_id'";
            }
            if ( !empty( $topic_id ) ) {
                $sql_where .= " and TR.topic_id = '$topic_id'";
            }
        
            $question = $this->security->xss_clean( $this->input->post( 'question' ) );
            if ( !empty( $question ) ) {
                $sql_where .= " and QM.question_name like '%$question%'";
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
    
        $this->db->where( 'QM.type', '2' );
        $this->db->order_by( "QM.id", 'DESC' );
        $this->db->join( 'oe_qns_topic_relatn TR', 'TR.master_ref_id = QM.id' );
        $query = $this->db->get( 'oe_qsn_bnk_master QM' );
        return $query->num_rows();
    }
    
    function get_mcq_exam_details( $autoid )
    {
        $this->db->select( '*' );
        $this->db->where( 'id', $autoid );
        // $this->get_option_list($autoid);
        $query = $this->db->get( 'oe_qsn_bnk_master' );
        if ( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    
    function get_mcq_option_list( $autoid )
    {
        $array_ans_index = array('A', 'B', 'C', 'D', 'E');
    
        $this->db->where( 'master_ref_id', $autoid );
        $this->db->where_in( 'index_seqn', $array_ans_index );
    
        $query = $this->db->get( 'oe_qsn_bnk_ans' );
    
        if ( $query->num_rows() > 0 ) {
            return $query->result();
            // echo "<pre>";
            // print_r($query->result());
            // exit();
        }
    }
    
    function update_mcq_exam_question_list( $id, $user_email )
    {
        $data = array(
            'question_name'    => $this->input->post( 'question_name' ),
            'type'             => $this->input->post( 'type', TRUE ),
            'question_in_year' => $this->input->post( 'question_in_year', TRUE ),
            'heading'          => $this->input->post( 'heading' ),
            'discussion'       => $this->input->post( 'discussion', TRUE ),
            'reference'        => $this->input->post( 'reference', TRUE ),
            'created_by'       => $user_email,
            'status'           => $this->input->post( 'status', TRUE )
        );
        //echo "<pre>";
        // print_r($data);
        //exit();

        $this->db->where( 'id', $id );
        $result    = $this->db->update( 'oe_qsn_bnk_master', $data );
        $insert_id = $id;
        $this->db->where( 'master_ref_id', $id );
        $this->db->delete( 'oe_qsn_bnk_ans' );
    
        $array_ans_index = array('a', 'b', 'c', 'd', 'e');
    
        // print_r($correct_ans);exit();
        if ( $insert_id ) {

//            $this->db->where( 'master_ref_id', $insert_id );
//            $this->db->delete( 'oe_qsn_bnk_ans' );
            
            foreach ( $array_ans_index as $key => $value ) {
                if ( $value ) {
                    $ans_field = $this->input->post( 'ans_' . strtolower( $value ) );
    
                    $correct_ans = $this->input->post( 'correct_ans', TRUE );
    
                    $data = array(
                        'master_ref_id' => $insert_id,
                        'ans'           => $ans_field,
                        'index_seqn'    => strtoupper( $value ),
                        'correct_ans'   => $correct_ans[$key]
                    );
                    $this->db->insert( 'oe_qsn_bnk_ans', $data );
                }
            }
    
            //edit chapter and topics
            $chapter_array = $this->input->post( 'chapter', TRUE );
            if ( !empty( $chapter_array ) ) {
                //Delete Chapter data
                $this->db->where( 'master_ref_id', $id );
                $this->db->delete( 'oe_qns_chapter_relatn' );
                // Delete Old Topics
                $this->db->where( 'master_ref_id', $insert_id );
                $this->db->delete( 'oe_qns_topic_relatn' );
                
                foreach ( $chapter_array as $key_ => $value_ ) {
                    $chapter_id   = $value_;
                    $chapter_data = array();
                    $chapter_data = array(
                        'chapter_id'      => $chapter_id,
                        'master_ref_id  ' => $insert_id
                    );
    
                    $this->db->insert( 'oe_qns_chapter_relatn', $chapter_data );
    
                    $topics_arry = $this->input->post( 'topics_' . $chapter_id, TRUE );
                    if ( !empty( $topics_arry ) ) {
        
                        foreach ( $topics_arry as $key_topics => $value_topics ) {
                            $topics_id   = $value_topics;
                            $topics_data = array(
                                'topic_id'        => $topics_id,
                                'chapter_ref_id'  => $chapter_id,
                                'master_ref_id  ' => $insert_id
                            );
            
                            $result = $this->db->insert( 'oe_qns_topic_relatn', $topics_data );
                            //echo $result;exit();
                        }
                    }
                }
            }//chapter
        }
    
        if ( $result ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function get_questions( $type = 1 )
    {
        $sql_where = $this->session->userdata( 'sql_where_session' );
        
        if ( $sql_where != "" ) {
            $this->db->where( $sql_where );
        }
        $this->db->select( 'QM.id, QM.type, QM.question_name, QM.correct_ans, QM.question_in_year, QM.discussion, QM.heading, QM.reference, QM.created_at, QM.created_by, QM.status' );
        $this->db->where( 'QM.type', $type );
        $this->db->order_by( "QM.id", 'DESC' );
        $this->db->join( 'oe_qns_topic_relatn TR', 'TR.master_ref_id = QM.id' );
        $query = $this->db->get( 'oe_qsn_bnk_master QM' );
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            foreach ( $results as $result ) {
                $query = $this->db->where( ['master_ref_id' => $result->id] )
                                  ->order_by( 'index_seqn' )
                                  ->get( 'oe_qsn_bnk_ans', 5 );
                
                $result->ans = $query->result_array();
            }
            return array_chunk( $results, 2 );
        }
        return FALSE;
    }
    
    /*End mcq exam question*/
}
