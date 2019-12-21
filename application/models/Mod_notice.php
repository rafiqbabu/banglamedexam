<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_teacher
 *
 * @author jnahian
 * @property Mod_applicant $Mod_applicant
 */
class Mod_notice extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'Mod_applicant' );
    }

    function doctor_list_for_mail( $year, $session_id, $course_code, $faculty_code, $batch_code )
    {
        $this->db->select( 'id,doc_name' );

        $year = !empty( $year ) ? $this->db->where( 'year', $year ) : '';
        $session_id = !empty( $session_id ) ? $this->db->where( 'session', $session_id ) : '';
        $course_code = !empty( $course_code ) ? $this->db->where( 'course_code', $course_code ) : '';
        $faculty_code = !empty( $faculty_code ) ? $this->db->where( 'faculty_code', $faculty_code ) : '';
        $batch_code = !empty( $batch_code ) ? $this->db->where( 'batch_code', $batch_code ) : '';
        //echo $year .'-'. $session_id .'-'. $course_code;exit;
//        if($year && $batch_code){
        $query = $this->db->get( 'sif_admission' );

        if ( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return FALSE;
        }
        //}
    }

    function get_teacher_list()
    {
        $this->db->select( '*' );
        $query = $this->db->get( 'sif_teacher' );
        if ( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function get_teacher_list_array()
    {
        $teacher = $this->get_teacher_list();

        $list_arr = array();

        foreach ( $teacher as $tec ) {
            $list_arr[$tec->id] = $tec->tec_name;
        }
        return $list_arr;
    }

    function get_doctor_email( $doctors )
    {
        $data = array();
        $this->db->select( 'email' );
        $this->db->where_in( 'id', $doctors );
        $query = $this->db->get( 'sif_admission' );
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            foreach ( $results as $row ) {
                array_push( $data, $row->email );
            }
        }

        return $data;
    }

    function get_teacher_email( $teacher )
    {
        $data = array();
        $this->db->select( 'email' );
        $this->db->where_in( 'id', $teacher );
        $query = $this->db->get( 'sif_teacher' );
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            foreach ( $results as $res ) {
                array_push( $data, $res->email );
            }
        }
        return $data;
    }


    function get_doctor_phone_no( $doctor_list )
    {
        $data = array();
        foreach ( $doctor_list as $list ) {
            $this->db->select( 'phone' );
            $this->db->where( 'id', $list );
            $query = $this->db->get( 'sif_admission' );
            if ( $query->num_rows() > 0 ) {

                $phone_no = $query->result();
                foreach ( $phone_no as $phone ) {
                    array_push( $data, $phone->phone );
                }
            }

        }
        return $data;
    }

    function get_teacher_phone_no( $teacher_list )
    {
        $data = array();
        foreach ( $teacher_list as $list ) {
            $this->db->select( 'mobile' );
            $this->db->where( 'id', $list );
            $query = $this->db->get( 'sif_teacher' );
            if ( $query->num_rows() > 0 ) {

                $phone_no = $query->result();
                foreach ( $phone_no as $phone ) {
                    array_push( $data, $phone->mobile );
                }
            }

        }
        return $data;
    }


    public function send_sms( $phone_no, $message )
    {
        $mobile = $phone_no;

        $msg = urlencode( $message );
        $api = file_get_contents( "http://api.kushtia.com/sendsms/plain?user=BMRL&password=62Slrfcq&sender=DPDC&SMSText={$msg}&GSM={$mobile}" );
        if ( $api > 0 ) {
//            echo "$key. Message sent to {$mobile} \r\n";
            return TRUE;
        } else {
//            echo "$key. Failed Sending message to {$mobile} \r\n";
            return FALSE;
        }
    }

    public function save_general_notice()
    {
        $id = $this->input->post( 'id', TRUE );
        $title = $this->input->post( 'title', TRUE );
        $details = $this->input->post( 'details' );
        $status = $this->input->post( 'status' );
        $upload = array();

        $notice_data = array(
            'type'       => 'G',
            'title'      => $title,
            'details'    => base64_encode( $details ),
            'created_at' => date( 'Y-m-d H:i:s' ),
            'created_by' => AUTH_EMAIL,
            'status'     => $status
        );

        if ( $id ) {
            $notice_data['doc_id'] = $id;
            $notice_data['type'] = "I";
        }

        if ( $_FILES['attachment']['error'] == 0 ) {
            $upload = $this->Mod_file_upload->upload_file( 'details', 'attachment', ['size' => 2048, 'width' => 4000, 'height' => 4000], NULL, 'pdf|jpg|jpeg|png' );
            if ( $upload['status'] ) {
                $notice_data['attachment'] = $upload['path'];
            } else {
                $this->session->set_flashdata( 'flashError', $upload['msg'] );
            }
        }

        if ( $this->db->insert( 'oe_notice', $notice_data ) ) {
            $ins_id = $this->db->insert_id();
            if ( $id ) {
                $doc_not = [
                    'doc_id'    => $id,
                    'notice_id' => $ins_id,
                    'status'    => 0
                ];
                $this->db->insert( 'oe_doc_notice', $doc_not );
            } else {
                $docs = $this->Mod_applicant->get_all_applicant();

                if ( $docs ) {
                    foreach ( $docs as $doc ) {
                        $doc_not = [
                            'doc_id'    => $doc->id,
                            'notice_id' => $ins_id,
                            'status'    => 0
                        ];
                        $this->db->insert( 'oe_doc_notice', $doc_not );
                    }
                }
            }

            $this->session->set_flashdata( 'flashOK', 'Notice Created Successfully!' );
            return TRUE;
        } else {
            $this->session->set_flashdata( 'flashError', 'Error! Cannot Create Notice!' );
        }
        return FALSE;
    }

    public function update_general_notice( $nid )
    {
        $id = $this->input->post( 'id', TRUE );
        $title = $this->input->post( 'title', TRUE );
        $details = $this->input->post( 'details' );
        $status = $this->input->post( 'status' );
        $upload = array();

        $notice_data = array(
            'title'      => $title,
            'details'    => base64_encode( $details ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
            'updated_by' => AUTH_EMAIL,
            'status'     => $status
        );

        if ( $id ) {
            $notice_data['doc_id'] = $id;
            $notice_data['type'] = "I";
        }

        if ( $_FILES['attachment']['error'] == 0 ) {
            $upload = $this->Mod_file_upload->upload_file( 'details', 'attachment', ['size' => 2048, 'width' => 4000, 'height' => 4000], NULL, 'pdf|jpg|jpeg|png' );
            if ( $upload['status'] ) {
                $notice_data['attachment'] = $upload['path'];
            } else {
                $this->session->set_flashdata( 'flashError', $upload['msg'] );
            }
        }

        if ( $this->db->update( 'oe_notice', $notice_data, ['id' => $nid] ) ) {
            if ( $id ) {
                $where = [
                    'doc_id'    => $id,
                    'notice_id' => $nid
                ];
                $doc_not = [
                    'status' => 0
                ];
                $this->db->update( 'oe_doc_notice', $doc_not, $where );
            } else {
                $docs = $this->Mod_applicant->get_all_applicant();

                if ( $docs ) {
                    foreach ( $docs as $doc ) {
                        $where = [
                            'doc_id'    => $doc->id,
                            'notice_id' => $nid
                        ];
                        $doc_not = [
                            'status' => 0
                        ];
                        $this->db->update( 'oe_doc_notice', $doc_not, $where );
                    }
                }
            }

            $this->session->set_flashdata( 'flashOK', 'Notice Updated Successfully!' );
            return TRUE;
        } else {
            $this->session->set_flashdata( 'flashError', 'Error! Cannot Update Notice!' );
        }
        return FALSE;
    }

    public function get_all_notice( $limit = 20, $row = 0 )
    {
        $query = $this->db->order_by( 'created_at', 'DESC' )->get( 'oe_notice', $limit, $row );
        if ( $query->num_rows() > 0 ) {
            return $query->result();
        }
        return FALSE;
    }

    public function count_notice()
    {
        $query = $this->db->select( 'id' )->get( 'oe_notice' );
        return $query->num_rows();
    }

    public function get_notice( $id )
    {
        $this->db->where( 'id', $id );
        $query = $this->db->get( 'oe_notice' );
        if ( $query->num_rows() > 0 ) {
            return $query->row();
        }
        return FALSE;
    }


}
