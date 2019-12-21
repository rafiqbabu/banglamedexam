<?php
/**
 * Description of admin_logout
 *
 * @author  jnahian
 * Date : 02-March-2014
 */
class Logout extends CI_Controller{
   function __construct(){
        parent::__construct();
       $this->load->library(['ion_auth']);
    }
    function index(){
//         $this->session->sess_destroy();
//         redirect('login');

        $this->ion_auth->logout();
        redirect('login');
    }
}