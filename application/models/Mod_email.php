<?php

/**
 * Created by PhpStorm.
 * User: Bigm
 * Date: 16/11/16
 * Time: 1:28 PM
 * @author jnahian
 * @property Mod_common $Mod_common
 */
class Mod_email extends CI_Model
{
    private $config;

    public function __construct()
    {
        parent::__construct();
        $this->load->library( 'email' );
        $this->load->model( 'Mod_common' );
//        $this->config = new stdClass();

//        $this->config->host = '';
//        $this->config->user = '';
//        $this->config->pass = '';
//        $this->config->port = 25;
//
//        $this->config->from = 'info@bigm-bd.com';
//        $this->config->from_name = 'GENESIS';
    }

    public function send_email( $to, $subject, $msg )
    {
        $config['mailtype'] = 'html';
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['validate'] = TRUE;
        $config['priority'] = 1;

        $company = $this->Mod_common->get_company_data();
        if ( ENVIRONMENT == 'production' && $company ) {
            $config['smtp_host'] = $company->smtp_host;
            $config['smtp_user'] = $company->smtp_user;
            $config['smtp_pass'] = $company->smtp_pass;
            $config['smtp_port'] = $company->smtp_port;
        }
        $this->email->initialize( $config );

        $this->email->from( $company->smtp_email, $company->name );
        $this->email->to( $to );
//        $this->email->cc('another@another-example.com');
//        $this->email->bcc('them@their-example.com');
        $this->email->subject( $subject );
        $this->email->message( $msg );

        if ( $this->email->send() ) {
            return TRUE;
        }
        return $this->email->print_debugger();
    }
}
