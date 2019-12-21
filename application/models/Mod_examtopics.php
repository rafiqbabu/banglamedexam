<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_schedule
 *
 * @author jnahian
 * @property common_lib $common_lib
 * @property mod_file_upload $mod_file_upload
 */
class Mod_examtopics extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_file_upload');
    }


    public function save_topics_list($user_email)
    {
        $data = array(
            'topic_name' => $this->input->post('topic_name', TRUE),
            'created_by' => $user_email,
            'status' => $this->input->post('status', TRUE),
        );

        $result = $this->db->insert('exam_topics', $data);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_topics_lists()
    {
        $this->db->select('*');
        //$this->db->where('status','1');
        $query = $this->db->get('exam_topics');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }

    }

    function get_chapter_lists()
    {
        $this->db->where('status', '1');

        $query = $this->db->get('oe_chapter');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }

    }

    public function get_chapter_dropdown()
    {
        $this->db->where('status', '1');

        $query = $this->db->get('oe_chapter');
        if ($query->num_rows() > 0) {
            $results = $query->result_array();

            return ['' => 'Select Chapter'] + array_column($results, 'chapter_name', 'id');
        } else {
            return FALSE;
        }
    }

    function get_selected_chapter_lists($id)
    {
        $this->db->select('chapter_id,id');
        $this->db->group_by('chapter_id,id');
        $this->db->where('master_ref_id', $id);
        $query = $this->db->get('oe_qns_chapter_relatn CR');
//        $query = $this->db->get('oe_chapter C');
        //return $qu

        if ($query->num_rows() > 0) {

            return $query->result();

        }
        return FALSE;


    }
//
//    function get_selected_chapter_lists( $id )
//    {
//        $this->db->select( 'chapter_id,id' );
//        $this->db->group_by( 'chapter_id,id' );
//        $this->db->where( 'master_ref_id', $id );
//        $query = $this->db->get( 'oe_qns_chapter_relatn' );
//        //return $query->result();
//        $data = array();
//        foreach ( $query->result() as $key => $value ) {
//            //echo $value->chapter_id;
//
//            $this->db->select( 'chapter_name,id' );
//            $this->db->where( 'id', $value->chapter_id );
//            $query = $this->db->get( 'oe_chapter' );
//
//            if ( $query->num_rows() == 1 ) {
//
//                $data[] = $query->row();
//                // $data[] = $query->row_array();
//                //$data[$key]['oe_qns_chaper_rela_auto_id'] = $value->id;
//
//            } else {
//                return FALSE;
//            }
//
//        }
//        return $data;
//    }

    function get_selected_topics_lists($id)
    {
        $this->db->select('topic_id, chapter_ref_id');
        $this->db->where('master_ref_id', $id);
        $query = $this->db->get('oe_qns_topic_relatn');
        if ($query->num_rows() > 0) {
            return $query->result();
        }

        return false;
    }

    //function get_chapter_lists_edit($id){

    //}	

    function get_topic_list_array()
    {
        $topics = $this->get_topics_lists();

        $array = array('' => 'Choose');
        foreach ($topics as $ins) {
            if ($ins->status == 1) {
                $array[$ins->id] = $ins->topic_name;
            }
        }
        return $array;
    }

    function get_topics_details($auto_id)
    {
        $this->db->select('*');
        $this->db->where('id', $auto_id);
        $query = $this->db->get('exam_topics');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    function update_topic_info($auto_id, $user_email)
    {
        $data = array(
            'topic_name' => $this->input->post('topic_name', TRUE),
            'updated_by' => $user_email,
            'status' => $this->input->post('status', TRUE),
        );

        $this->db->where('id', $auto_id);
        $result = $this->db->update('exam_topics', $data);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }

    }


}
