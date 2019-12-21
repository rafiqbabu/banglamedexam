<?php

/**
 * Description of login
 *
 * @author  jnahian
 * Date : 02-March-2014
 */
class Login extends CI_Controller
{
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['common_lib', 'ion_auth', 'form_validation']);
        $this->form_validation->set_error_delimiters('', '');

        $type = $this->input->get('type');
        $this->data['type'] = $type ? $type : 'Admin';
        $this->load->model('Mod_setting');
        $this->data['company'] = $this->Mod_setting->get_general_info();
    }

    function index()
    {
        $this->load->view('login/view_login', $this->data);
    }

    public function process()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {

            $phone = $this->security->xss_clean($this->input->post('username'));
            $pass = $this->security->xss_clean($this->input->post('password'));

            $flag = $this->ion_auth->login($phone, $pass, TRUE);

            if ($flag) {
                $data_session = array(
                    'admin_logged_in' => true,
                    'admin_login_phone' => $phone,
                );

                $this->session->set_userdata($data_session); /* put data into seesion */
                $this->session->set_flashdata('flassOK', $this->ion_auth->messages());
                redirect('dashboard'); /* redirect to user user page */
            } else {
                $this->session->set_flashdata('flashError', $this->ion_auth->errors());
                redirect('login');
            }
        } else {
            $this->load->view('login/view_login', $this->data);
        }
    }

//    function process() {
//        $flag = '';
//        $acl_group_name = '';
//        $admin_info_arry = $this->common_lib->admin_user_pass_info();
//
//
//        $email = $this->input->post('username');
//        $pass = $this->input->post('password');
//
//        if (array_key_exists($email, $admin_info_arry)) { /* check email */
//            //if(in_array($pass, $admin_info_arry)){ /* check pass */
//            if ($pass == $admin_info_arry[$email]) { /* check pass */
//                $flag = true;
//            } else {
//                $flag = false;
//            }
//        } else {
//            $flag = false;
//        }
//
//        if ($flag) { /* set session */
//            $data_session = array(
//                'admin_logged_in' => true,
//                'admin_login_email' => $email,
//            );
//
//            $this->session->set_userdata($data_session); /* put data into seesion */
//            redirect('application_form'); /* redirect to user user page */
//        } else { /* send error */
//            //$this->session->set_flashdata('message_login', "<div id=\"message_login\">Sorry, Email and Password Don't Match.</div>");
//            redirect('login');
//        }
//    }

}