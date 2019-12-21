<?php

/**
 * Created by PhpStorm.
 * User: Bigm
 * Date: 16/11/16
 * Time: 4:27 PM
 */
class Landing extends CI_Controller 
{
    protected $data;
    public function __construct()
    {
        parent::__construct();
        $this->data['module_name'] = 'Landing Page';
        $this->data['company'] = $this->Mod_common->get_company_data();
    }

    public function index()
    {
//        redirect('login');
        $this->load->view('landing/view_landing', $this->data);
    }
}