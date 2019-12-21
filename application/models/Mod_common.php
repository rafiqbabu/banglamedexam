<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mod_common
 *
 * @author jnahian
 */
class Mod_common extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    function get_exam_info_list()
    {
        
        $data_arry = '';
        $query     = $this->db->select( 'id,exam_name' );
        $query     = $this->db->where( 'status', 1 );
        $query     = $this->db->order_by( 'id', 'ASC' );
        $query     = $this->db->get( 'oe_exam' );
        $data_arry = ['' => 'Select'];
        if ( $query->num_rows() > 0 ) {
            $res = $query->result();
            foreach ( $res as $item ) {
                $data_arry[$item->id] = $item->exam_name;
            }
        }
        
        return $data_arry;
    }
    
    function get_session_details( $auto_id )
    {
        $query = $this->db->where( "id", $auto_id );
        $query = $this->db->get( 'session' );
        
        if ( $query->num_rows() > 0 ) {
            $record = $query->row();
            return $record;
        } else {
            return NULL;
        }
    }
    
    public function get_teachers_array()
    {
        $this->db->select( 'id,tec_name' );
        $this->db->where( 'status', 1 );
        $query = $this->db->get( 'sif_teacher' );
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            $return  = array('' => 'Choose');
            foreach ( $results as $result ) {
                $return[$result->id] = $result->tec_name;
            }
            
            return $return;
        }
        return FALSE;
    }
    
    public function get_executive_array( $type = 1 )
    {
        $this->db->select( 'id,name' );
        $this->db->where( 'status', 1 );
        $type ? $this->db->where( 'emp_type', $type ) : '';
        $query = $this->db->get( 'sif_exe_stuff' );
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            $return  = array('' => 'Choose');
            foreach ( $results as $result ) {
                $return[$result->id] = $result->name;
            }
            
            return $return;
        }
        return FALSE;
    }
    
    public function get_room_list()
    {
        $data = array('' => 'Choose');
        return $data;
    }
    
    function get_division_list()
    {
        $data_arry = '';
        $query     = $this->db->select( 'DIVISION_ID,DIVISION_NAME' );
        $query     = $this->db->order_by( 'DIVISION_NAME', 'ASC' );
        $query     = $this->db->get( 'divisions' );
        if ( $query->num_rows() > 0 ) {
            $res       = $query->result();
            $data_arry = ['' => 'Choose'];
            foreach ( $res as $item ) {
                $data_arry[$item->DIVISION_ID] = $item->DIVISION_NAME;
            }
        }
        
        return $data_arry;
    }
    
    function get_thana_list()
    {
        $data_arry = '';
        $query     = $this->db->select( 'THANA_ID,THANA_NAME' );
        $query     = $this->db->order_by( 'THANA_NAME', 'ASC' );
        $query     = $this->db->get( 'thanas' );
        if ( $query->num_rows() > 0 ) {
            $res       = $query->result();
            $data_arry = ['' => 'Choose'];
            foreach ( $res as $item ) {
                $data_arry[$item->THANA_ID] = $item->THANA_NAME;
            }
        }
        
        return $data_arry;
    }
    
    function get_district_list_div( $division_id = NULL )
    {
        $query = $this->db->select( 'DISTRICT_ID,DISTRICT_NAME' );
        $query = $this->db->order_by( 'DISTRICT_NAME', 'ASC' );
        if ( $division_id ) {
            $query = $this->db->where( 'DIVISION_ID', $division_id );
        }
        $query  = $this->db->get( 'districts' );
        $result = $query->result();
        //echo $this->db->last_query();
        //$url = base_url().'collegeregistration/';
        $options = array('' => 'Choose');
        foreach ( $result as $item ) {
            $options[$item->DISTRICT_ID] = $item->DISTRICT_NAME;
            //$options .= '<option value="'.$item->DISTRICT_ID.'">'.$item->DISTRICT_NAME.'</option>';
        }
        
        return $options;
    }
    
    function get_upazila_list_dist( $dis_id = NULL )
    {
        
        $query = $this->db->select( 'THANA_ID,THANA_NAME' );
        $query = $this->db->order_by( 'THANA_NAME', 'ASC' );
        if ( $dis_id ) {
            $query = $this->db->where( 'DISTRICT_ID', $dis_id );
        }
        $query  = $this->db->get( 'thanas' );
        $result = $query->result();
        //echo $this->db->last_query();
        
        $options = array('' => 'Choose');
        foreach ( $result as $item ) {
//            $options .= '<option value="' . $item->THANA_ID . '">' . $item->THANA_NAME . '</option>';
            $options[$item->THANA_ID] = $item->THANA_NAME;
        }
        return $options;
    }
    
    public function get_class_topic_list()
    {
        $query  = $this->db->select( 'id,class_topic_name' );
        $query  = $this->db->order_by( 'course_code,faculty_code,class_topic_name', 'ASC' );
        $query  = $this->db->get( 'sif_class_topic' );
        $result = $query->result();
        
        $options = array(' ' => 'Choose');
        foreach ( $result as $item ) {
            $options[$item->id] = $item->class_topic_name;
        }
        return $options;
    }
    
    public function get_rooms_array()
    {
        $query  = $this->db->select( 'id,floor,room_name' );
        $query  = $this->db->order_by( 'floor,room_name', 'ASC' );
        $query  = $this->db->get( 'sif_room_type' );
        $result = $query->result();
        
        $options = array('' => 'Choose');
        foreach ( $result as $item ) {
            $options[$item->id] = "$item->floor-$item->room_name";
        }
        return $options;
    }
    
    
    public function get_batch_wise_doc_list( $where_array = NULL )
    {
//        $this->db->select('id,reg_no');
        if ( !$where_array ) {
            $where_array = array(
                'year'         => $this->input->post( 'year', TRUE ),
                'session'      => $this->input->post( 'session', TRUE ),
                'course_code'  => $this->input->post( 'course_code', TRUE ),
                'faculty_code' => $this->input->post( 'faculty_code', TRUE ),
                'batch_code'   => $this->input->post( 'batch_code', TRUE ),
            );
        }
        if ( $where_array || $this->input->post() ) {
            $this->db->where( $where_array );
        }
        $query = $this->db->get( 'sif_admission' );
        
        if ( $query->num_rows() > 0 ) {
            return $query->result();
        }
        return FALSE;
    }
    
    public function get_row_data_by_id( $tablename, $id )
    {
        $this->db->where( 'id', $id );
        $query = $this->db->get( $tablename );
        if ( $query->num_rows() == 1 ) {
            return $query->row();
        }
        return FALSE;
    }
    
    public function get_teacher_id( $id )
    {
        $this->db->where( 'id', $id );
        $query = $this->db->get( 'sif_teacher' );
        if ( $query->num_rows() == 1 ) {
            return $query->row()->teacher_id;
        }
        return FALSE;
    }
    
    public function get_results_reg( $year, $session, $reg )
    {
        return date( 'y', strtotime( $year ) ) . $session . $reg;
    }
    
    public function get_group_array()
    {
        $data   = array('' => 'Choose');
        $groups = $this->ion_auth->groups()->result();
        foreach ( $groups as $group ) {
            $data[$group->id] = $group->description;
        }
        return $data;
    }
    
    public function get_medical_college_list()
    {
        $data  = array('' => 'Choose');
        $query = $this->db->select( 'id, name' )->where( 'status', 1 )->get( 'oe_medical_college' );
        if ( $query->num_rows() > 0 ) {
            foreach ( $query->result() as $row ) {
                $data[$row->id] = $row->name;
            }
        }
        return $data;
    }
    
    public function free_exam()
    {
        $free_exam = array(
            ''  => 'Choose',
            '1' => 'Free Exam'
        );
        return $free_exam;
    }
    
    public function get_company_data()
    {
        $query = $this->db->order_by( 'id', 'DESC' )->get( 'sif_general_info', 1 );
        
        if ( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return config_item( 'company', NULL );
        }
    }
    
    public function generate_doc_reg_no()
    {
        $this->load->helper( 'string' );
        $pref = $this->data['company']->short_code . date( 'y' );
        
        $reg = $pref . sprintf( '%05d', 1 );
        
        $query = $this->db->select( 'reg_no' )->like( 'reg_no', $pref, 'LEFT' )->order_by( 'reg_no', 'desc' )->get( 'oe_doc_master', 1 );
        if ( $query->num_rows() > 0 ) {
            $prev_reg = $query->last_row()->reg_no;
            $sl       = substr( $prev_reg, -5, 5 ) + 1;
            $reg      = $pref . sprintf( '%05d', $sl );
        }
        return $reg;
    }
    
    public function get_user_address( $id, $type = 1 )
    {
        $query = $this->db->where( ['status' => 1, 'type' => $type, 'doc_id' => $id] )->get( 'oe_doc_address' );
        if ( $query->num_rows() ) {
            return $query->row();
        }
        return FALSE;
    }
    
    public function get_user_educations( $id )
    {
        $query = $this->db->where( ['status' => 1, 'doc_id' => $id] )->get( 'oe_doc_educations' );
        if ( $query->num_rows() ) {
            return $query->result();
        }
        return FALSE;
    }
    
    public function get_user_references( $id )
    {
        $query = $this->db->where( ['status' => 1, 'doc_id' => $id] )->get( 'oe_doc_referance' );
        if ( $query->num_rows() ) {
            return $query->result();
        }
        return FALSE;
    }
    
    public function get_total_exams( $institute_id, $course_id, $faculty_id, $subject_id, $type_id )
    {
        $this->db->select( 'id' );
        $this->db->where( [
                              'institute_id' => $institute_id,
                              'course_id'    => $course_id,
                              'faculty_id'   => $faculty_id,
                              'subject_id'   => $subject_id,
                              'exam_id'      => $type_id,
                              'status'       => 1,
                              'free_exam !=' => 1
                          ] );
        
        $query = $this->db->get( 'oe_exam' );
        
        if ( $query->num_rows() > 0 ) {
            return $query->result();
        }
        return FALSE;
    }
    
    public function get_available_exams( $institute_id, $course_id, $faculty_id, $subject_id, $type_id = NULL )
    {
        $ids = $this->get_user_exams_ids();
        $this->db->select( 'id, time' );
        $this->db->where( [
                              'institute_id' => $institute_id,
                              'course_id'    => $course_id,
                              'faculty_id'   => $faculty_id,
                              'subject_id'   => $subject_id,
                              //                              'exam_id'      => $type_id,
                              'status'       => 1,
                              //            'free_exam !=' => 1
                          ] );
        
        if ( $type_id ) $this->db->where( 'exam_id', $type_id );
        
        if ( $ids ) {
            $this->db->where_not_in( 'id', $ids );
        }
        
        $query = $this->db->get( 'oe_exam' );
        if ( $query->num_rows() > 0 ) {
            return $query->result();
        }
        return FALSE;
    }
    
    public function get_available_exams_for_package( $institute_id, $course_id, $faculty_id, $subject_id, $type_id = NULL )
    {
//        $ids = $this->get_user_exams_ids();
//        $this->db->select( 'id, time' );
//        $this->db->where( [
//                              'institute_id' => $institute_id,
//                              'course_id'    => $course_id,
//                              'faculty_id'   => $faculty_id,
//                              'subject_id'   => $subject_id,
//                              //                              'exam_id'      => $type_id,
//                              'status'       => 1,
//                              //            'free_exam !=' => 1
//                          ] );
//
//        if ( $type_id ) $this->db->where( 'exam_id', $type_id );
//
//        if ( $ids ) {
//            $this->db->where_not_in( 'id', $ids );
//        }
//
//        $query = $this->db->get( 'oe_exam' );
//        if ( $query->num_rows() > 0 ) {
//            return $query->result();
//        }
//        return FALSE;
    }
    
    public function get_user_exams_ids()
    {
        $user = $this->get_logged_in_user_id();
        
        $query = $this->db->select( 'exam_id' )
                          ->where( 'doc_id', $user )
                          ->get( 'oe_doc_exams' );
        
        if ( $query->num_rows() > 0 ) {
//            return $query->result_array();
            return array_column( $query->result_array(), 'exam_id' );
        }
        
        return FALSE;
    }
    
    
    public function get_exam_types( $ids )
    {
        $query = $this->db->where_in( 'id', $ids )->get( 'sif_exam_category' );
        
        if ( $query->num_rows() > 0 ) {
            return $query->result();
        }
        return FALSE;
    }
    
    public function get_logged_in_user()
    {
        return $this->session->userdata( 'user' );
    }
    
    public function get_logged_in_user_id()
    {
        return $this->session->userdata( 'user' ) ? $this->session->userdata( 'user' )->id : NULL;
    }
    
    public function generate_reset_hash( $email )
    {
        $hash = bin2hex( urlencode( config_item( 'reset_salt' ) . "|" . $email . "|" . now() ) );
        return $hash;
    }
    
    public function reset_hash_decode( $hash )
    {
        return urldecode( hex2bin( $hash ) );
    }
    
    public function getValidatedUser( $hash )
    {
        $token = $this->reset_hash_decode( $hash );
        $exp   = explode( '|', $token );
        if ( $exp[0] === config_item( 'reset_salt' ) ) {
            $email = $exp[1];
            $where = ['email' => $email, 'forgot_token' => $hash];
            $query = $this->db->where( $where )->get( 'oe_doc_master' );
            if ( $query->num_rows() == 1 ) {
                $row = $query->row();
                return $row;
            } else {
                $this->session->set_flashdata( ['msg_type' => 'warning', 'msg' => 'Sorry! User Not Registered.'] );
            }
        } else {
            $this->session->set_flashdata( ['msg_type' => 'warning', 'msg' => 'Sorry! Invalid Token.'] );
        }
        redirect( 'user-login' );
    }
    
    public function get_question_anserws( $id, $where = [] )
    {
        if ( count( $where ) ) $this->db->where( $where );
        $this->db->where( 'master_ref_id', $id );
        $this->db->order_by( 'index_seqn' );
        $query = $this->db->get( 'oe_qsn_bnk_ans' );
        
        if ( $query->num_rows() > 0 ) {
            return $query->result();
        }
        
        return FALSE;
    }
    
    public function exam_time_validation( $doc_exam )
    {
        $duration = floatval( $doc_exam->duration ) + 30; // add more 30 sec to auto-submit form
        $now      = time();
        $time     = strtotime( $doc_exam->start_time );
        
        $diff = abs( $now - $time ) / 60;
        
        if ( $duration >= $diff ) {
            return TRUE;
        }
        
        return FALSE;
    }
    
    public function get_topic_questions_by_type( $type )
    {
        $ids  = $this->input->get( 'id' );
        $qtys = $this->input->get( 'qtys' );
        
        if ( count( $ids ) ) {
            $this->db->select( 'QM.id id, QM.question_name question, QM.type type, T.name topic_name, C.chapter_name chapter_name, QT.topic_id, QT.chapter_ref_id chapter_id' );
            $this->db->where( 'QM.type', $type );
            $this->db->where_in( 'QT.topic_id', $ids );
            $this->db->join( 'oe_qns_topic_relatn QT', 'QM.id=QT.master_ref_id', 'INNER' );
            $this->db->join( 'oe_topics T', 'T.id=QT.topic_id' );
            $this->db->join( 'oe_chapter C', 'C.id=QT.chapter_ref_id' );
            $this->db->order_by( "QM.question_name" );
            $query = $this->db->get( 'oe_qsn_bnk_master QM' );
            
            if ( $query->num_rows() > 0 ) {
                $results = $query->result();
                $data    = [];
                foreach ( $ids as $i => $id ) {
                    $question = [];
                    $name     = $topic = $chapter = NULL;
                    foreach ( $results as $result ) {
                        if ( $result->topic_id == $id ) {
                            $topic                 = $result->topic_id;
                            $chapter               = $result->chapter_id;
                            $name                  = $result->chapter_name . " - " . $result->topic_name;
                            $question[$result->id] = strip_tags($result->question);
                        }
                        
                    }
                    $data[$id]['name']      = $name;
                    $data[$id]['topic']     = $topic;
                    $data[$id]['chapter']   = $chapter;
                    $data[$id]['qty']       = $qtys[$i];
                    $data[$id]['questions'] = $question;
                }
                
                return $data;
            }
        }
        
        return FALSE;
        
    }
    
    public function get_unread_notice_count( $uid )
    {
        $this->db->select( 'N.id' );
        $this->db->where( 'DN.doc_id', $uid );
        $this->db->where( 'N.status', 1 );
        $this->db->where( 'DN.status', 0 );
        $this->db->join( 'oe_doc_notice DN', 'DN.notice_id=N.id' );
        $this->db->group_by( 'N.id' );
        $query = $this->db->get( 'oe_notice N' );
        return $query->num_rows();
    }
    
    public function get_exam_category_list()
    {
        $this->db->select( 'id, exam_category_name name' );
        $this->db->where( 'status', 1 );
        $this->db->order_by( 'sl' );
        $query = $this->db->get( 'sif_exam_category' );
        
        if ( $query->num_rows() > 0 ) {
            $results = $query->result_array();
            
            return ['' => 'Select Exam Category'] + array_column( $results, 'name', 'id' );
        }
        return FALSE;
    }
    
    public function get_applicants_list()
    {
        $this->db->select( 'id, name name' );
        $this->db->where( 'status', 1 );
//		$this->db->order_by( 'sl' );
        $query = $this->db->get( 'oe_doc_master' );
        
        if ( $query->num_rows() > 0 ) {
            $results = $query->result_array();
            
            return ['' => 'Select Applicant'] + array_column( $results, 'name', 'id' );
        }
        return FALSE;
    }
    
    public function position_calculation()
    {
        $starttime = microtime( TRUE );
        $status    = FALSE;
        $this->load->helper( 'file' );
        $file_content = "";
        //update exam type position
        $exam_type_results = $this->get_exam_type_results();
        
        $et_count = 0;
        
        if ( count( $exam_type_results ) ) {
            $sl = 1;
            foreach ( $exam_type_results as $exam_type_result ) {
                foreach ( $exam_type_result as $j => $sub ) {
                    if ( $exam_type_result[$j]->mark_percentage > 0 ) {
                        if ( $j != 0 ) {
                            if ( $exam_type_result[$j]->final_mark == $exam_type_result[$j - 1]->final_mark ) {
                                $pos2 = $pos2;
                            } else {
                                $pos2 = $pos2 + 1;
                            }
                        } else {
                            $pos2 = $j + 1;
                        }
                        $this->db->where( 'id', $sub->id );
                        $status = $this->db->update( 'oe_doc_exams', array('exam_type_pos' => $pos2) );
                        
                        $file_content .= "$sl) Updated Exam Type Position of id: {$sub->id} \r\n";
                        
                        $et_count++;
                        
                        $sl++;
                        
                        $mod = $et_count % 500;
                        
                        if ( $mod === 0 ) {
                            sleep( 30 );
                            $file_content .= "Sleeping... \r\n";
                        }
                        
                    }
                }
            }
        }
        
        //update result subject position
        $sub_results = $this->get_subjectwise_exam_result();
        
        $sub_count = 0;
        
        if ( count( $sub_results ) ) {
            $sl = 1;
            foreach ( $sub_results as $sub_result ) {
                foreach ( $sub_result as $j => $sub ) {
                    if ( $sub_result[$j]->mark_percentage > 0 ) {
                        if ( $j != 0 ) {
                            if ( $sub_result[$j]->final_mark == $sub_result[$j - 1]->final_mark ) {
                                $pos1 = $pos1;
                            } else {
                                $pos1 = $pos1 + 1;
                            }
                        } else {
                            $pos1 = $j + 1;
                        }
//						echo "{$sub_result[$j]->mark_percentage} | $pos1 \r\n";
                        $this->db->where( 'id', $sub->id );
                        $status = $this->db->update( 'oe_doc_exams', array('subject_pos' => $pos1) );
                        
                        $file_content .= "$sl) Updated Subject Position of id: {$sub->id} \r\n";
                        
                        $sub_count++;
                        
                        $sl++;
                        
                        $mod = $sub_count % 500;
                        
                        if ( $mod === 0 ) {
                            sleep( 30 );
                            $file_content .= "Sleeping... \r\n";
                        }
                    }
                }
            }
        }
        
        $file_name = "./application/logs/position-calculation-" . date( 'YmdHis' ) . ".log";
        
        $endtime        = microtime( TRUE );
        $execution_time = $endtime - $starttime;
        $execution_time = number_format( $execution_time, 3 );
        
        $file_content .= "Execution Time: $execution_time sec \r\n";
        
        write_file( $file_name, $file_content );
        
        return $status;
    }
    
    public function get_completed_exams()
    {
        $where = ['status' => 1, 'is_free' => 0];
        $this->db->select( 'id, doc_id, institute_id, course_id, faculty_id, subject_id, exam_type_id, exam_id exam_type, final_mark, exam_type_pos, subject_pos ' );
        $this->db->where( $where );
        $query = $this->db->get( 'oe_doc_exams' );
        
        if ( $query->num_rows() > 0 ) {
            return $query->result();
        }
        
        return FALSE;
    }
    
    public function get_exam_type_results()
    {
        $this->db->select( 'id,exam_type_id,correct_mark,wrong_mark,final_mark,mark_percentage' );
        $this->db->where( 'final_mark >', 0 );
        $this->db->order_by( 'exam_type_id,mark_percentage', 'DESC' );
        
        $query = $this->db->get( 'oe_doc_exams' );
//		echo $this->db->last_query();exit();
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            $data    = array();
            foreach ( $results as $result ) {
                $data[$result->exam_type_id][] = $result;
            }
            return $data;
        }
        return FALSE;
    }
    
    public function get_subjectwise_exam_result()
    {
        $this->db->select( 'id,course_id,faculty_id,subject_id,correct_mark,wrong_mark,final_mark,mark_percentage' );
        $this->db->where( 'final_mark >', 0 );
        $this->db->order_by( 'course_id,faculty_id,subject_id,mark_percentage', 'DESC' );
        
        $query = $this->db->get( 'oe_doc_exams' );
//		echo $this->db->last_query();exit();
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            $data    = array();
            foreach ( $results as $result ) {
                $data[$result->subject_id][] = $result;
            }
            return $data;
        }
        return FALSE;
    }
    
    public function get_countries_list()
    {
        $query = $this->db->get( 'countries' );
        
        $options = ['' => 'Select Country'];
        
        if ( $query->num_rows() ) {
            $results = $query->result_array();
            
            $options += array_column( $results, 'name', 'code' );
        }
        
        return $options;
    }
    
    public function generate_purchase_invoice_no()
    {
        $query = $this->db->select( 'pi_no' )
                          ->order_by( 'pi_no', 'DESC' )
                          ->limit( 1 )
                          ->get( 'oe_doc_purchases' );
        
        if ( $query->num_rows() ) {
            
            $row = $query->row();
            
            $old_sl = substr( $row->pi_no, -3 );
            
            $pi_no = sprintf( "{$this->data['company']->short_code}" . date( 'ymd' ) . "%03d", $old_sl + 1 );
            
        } else {
            $pi_no = "{$this->data['company']->short_code}" . date( 'ymd' ) . "001";
        }
        
        return $pi_no;
    }
    
    public function get_user_purchase( $user_id, $purchase_id )
    {
        $this->db->select( '*' );
        $this->db->where( 'doc_id', $user_id );
        $this->db->where( 'id', $purchase_id );
        $this->db->where( 'status', 1 );
        $query = $this->db->get( 'oe_doc_purchases' );
        
        if ( $query->num_rows() ) {
            return $query->row();
        }
        
        return FALSE;
    }
    
    /**
     * @author jnahian
     * Dynamic Breadcrumb generator
     * @return string
     */
    public function breadcrumb()
    {
        $uri = $this->uri->segment_array();
        
        $breadcrumb = '<ol class="breadcrumb text-capitalize">';
        
        foreach ( $uri as $i => $item ) {
            $breadcrumb .= '<li class="' . ( $this->uri->total_segments() == $i ? 'active' : '' ) . '"><a href="' . site_url( $item ) . '">' . $item . '</a></li>';
        }
        
        $breadcrumb .= '</ol>';
        
        return $breadcrumb;
    }
    
    public function count_unique( $table_name, $unique_field_name = NULL )
    {
        $unique_field_name ? $this->db->select( "DISTINCT($unique_field_name)" ) : NULL;
        $this->db->where( 'status', 1 );
        $query = $this->db->get( $table_name );
        return $query->num_rows();
    }
    
    public function get_email_list()
    {
        $query   = $this->db->select( 'name, email' )->order_by( 'name' )->get( 'oe_doc_master' );
        $options = [];
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            
            foreach ( $results as $result ) {
                $options[$result->email] = "{$result->name} ({$result->email})";
            }
        }
        return $options;
    }
    
    public function get_topic_list()
    {
        $query  = $this->db->select( 'id,name' );
        $query  = $this->db->order_by( 'name', 'ASC' );
        $query  = $this->db->get( 'oe_topics' );
        $result = $query->result();
        
        $options = array('' => 'Select');
        foreach ( $result as $item ) {
            $options[$item->id] = $item->name;
        }
        return $options;
    }
    
    public function get_user_auto_id( $teacher_id )
    {
        if ( $teacher_id ) {
            $auto_id = NULL;
            if ( $this->ion_auth->in_group( 4 ) ) {
                $auto_id = get_name_by_id( 'sif_teacher', $teacher_id, 'teacher_id', 'id' );
            } elseif ( $this->ion_auth->in_group( 5 ) ) {
                $auto_id = get_name_by_id( 'sif_exe_stuff', $teacher_id, 'exe_stuff_id', 'id' );
            }
            return $auto_id;
        }
        
        return FALSE;
    }
    
    public function get_exam_total_mark( $exam_id )
    {
        if ( $exam_id ) {
            $query = $this->db->select( 'total_mark' )
                              ->where( 'id', $exam_id )
                              ->get( 'oe_exam' );
            
            if ( $query->num_rows() == 1 ) {
                return $query->row()->total_mark;
            }
        }
        return $exam_id;
    }
}//end class
