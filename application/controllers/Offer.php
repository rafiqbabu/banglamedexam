<?php
/**
 * Created by PhpStorm.
 * User: jnahian
 * Date: 6/25/18
 * Time: 1:06 PM
 *
 * @property Mod_email $Mod_email
 * @property Mod_common $Mod_common
 */

class Offer extends My_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->data['module_name'] = "Offer Email";
		$this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
		$this->load->model('Mod_common');
		$this->load->model('Mod_email');
		$this->load->library('user_agent');
	}

	public function index()
	{
		array_push($this->data['breadcrumb'], "Send Offer Email");
		$this->data['email_list'] = $this->Mod_common->get_email_list();
		$this->load->view('offer/view_send_offer_email', $this->data);
	}

	public function send_offer_email()
	{
//		show_error( 'Cannot Send mail from a Local Server', 400 );
		$emails = $this->input->post('emails', TRUE);
		$subject = $this->input->post('title', TRUE);
		$details = $this->input->post('details', TRUE);

		$data = [
			'company' => $this->data['company'],
			'subject' => $subject,
			'details' => $details,
		];

		$email_body = $this->load->view('templates/offer-email', $data);

		$email_result = $this->Mod_email->send_email($emails, $subject, $email_body);
		if ($email_result) {
			$this->session->set_flashdata('flashOK', 'Email Send successfully');
		} else {
			$this->session->set_flashdata('flashError', 'Failed Email');
		}

		redirect_back();
	}
}
