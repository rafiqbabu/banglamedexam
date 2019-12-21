<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of my_controller
 * Custom Controller that check user logedin/authentication status
 * @author Vegan Solutions
 * Date : 21-June-20112
 * @property ion_auth    $ion_auth
 * @property Mod_setting $Mod_setting
 * @property Mod_common  $Mod_common
 */
class My_Controller extends CI_Controller
{
	public $authEmail, $teacher_id, $data, $panel_name;

	public function __construct()
	{
		parent::__construct();
		$this->load->library( ['ion_auth', 'user_agent'] );

		if ( !$this->ion_auth->logged_in() ) {
			redirect( '/login' );
		}

		$this->data['authUser'] = $this->ion_auth->user()->row();
		$this->data['company'] = $this->Mod_common->get_company_data();
		if ( $this->data['authUser'] ) {
			$groups = $this->ion_auth->get_users_groups()->result();
			$this->data['authUser']->groups = $groups;
			$this->data['authUser']->role = $groups[0]->description;
			$this->authEmail = $this->data['authUser']->email;
			$this->teacher_id = $this->data['authUser']->teacher_id;
			$this->data['user_auto_id'] = $this->Mod_common->get_user_auto_id( $this->teacher_id );
			$this->panel_name = isset( $groups[0] ) ? "{$groups[0]->description} Panel" : 'Admin Panel';

			define( 'AUTH_EMAIL', $this->authEmail );
		}
		// $this->load->model('Mod_setting');
		// $this->data['company'] = $this->Mod_setting->get_general_info();
		// if (!$this->ion_auth->logged_in()) {
		//     redirect('login');
		// }
	}

}
