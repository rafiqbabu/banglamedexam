<?php

/**
 * Created by PhpStorm.
 * User: Bigm
 * Date: 17/10/16
 * Time: 6:34 PM
 */
class Mod_auth_student extends CI_Model
{
    private $table;
    public function __construct()
    {
        parent::__construct();

        $this->table = 'sif_doc_master';
    }

    public function login_process()
    {
        //
        $login_type = $this->security->xss_clean($this->input->post('login_type'));
        $id = $this->security->xss_clean($this->input->post('username'));
        $pass = $this->security->xss_clean($this->input->post('password'));

        $field_name = 'password';

        if($login_type == 'S'){
            $field_name = 'password';
        } elseif ($login_type == 'P'){
            $field_name = 'parent_password';
        }


        $this->db->select('user_name');
        $this->db->where(array('user_name' => $id, $field_name => $pass));

        $query = $this->db->get($this->table);

        if($query->num_rows() == 1)
        {
            $data_session = array(
                'logged_in' => true,
                'login_id' => $id,
                'login_type' => $login_type,
            );

            $this->session->set_userdata($data_session); /* put data into seesion */
            $this->session->set_flashdata('flassOK', 'Logged In Successfully');
            return true;
        }

        return false;
    }

    public function get_auth_student_info()
    {

        $student_id = $this->session->userdata('login_id');
        $student_info = $this->db->get_where($this->table, array('user_name' => $student_id))->row();
        //$student_info->image = $student_info->photo ? $student_info->photo : '';
        return $student_info;
    }
}
