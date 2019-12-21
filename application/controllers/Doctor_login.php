<?php

/**
 * Description of login
 *
 * @author  jnahian
 * Date : 02-March-2014
 * @property Mod_auth_student $Mod_auth_student
 */
class Doctor_Login extends CI_Controller
{
    protected $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['common_lib', 'ion_auth', 'form_validation']);
        $this->load->model('Mod_auth_student');
        $this->form_validation->set_error_delimiters('', '');
        $this->load->model('Mod_setting');
        $this->data['company'] = $this->Mod_setting->get_general_info();
    }

    function index()
    {
        $this->load->view('login/view_student_login', $this->data);
    }

    function process() {
        $this->form_validation->set_rules('username', 'Student ID', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run()) {

            $flag = $this->Mod_auth_student->login_process();

            if ($flag) {
                redirect('student_dashboard'); /* redirect to user user page */
            } else {
                $this->session->set_flashdata('flashError', 'Invalid Login information');
                redirect('doctor_login');
            }
        }else {
            $this->load->view('login/view_student_login');
        }
    }

}