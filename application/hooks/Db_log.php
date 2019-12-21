<?php
/**
 * Created by PhpStorm.
 * User: jnahian
 * Date: 8/28/18
 * Time: 6:22 PM
 */

class Db_log
{
	protected $ci;
	
	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->database();
		$this->ci->load->library( ['ion_auth', 'user_agent'] );
	}
	
	public function logQueries()
	{
		$data = [];
//		$times = $this->ci->db->query_times;                   // Get execution time of all the queries executed by controller
		$ip    = $this->ci->input->ip_address();
		$admin = $this->ci->ion_auth->user()->row();
		$user  = $this->ci->session->userdata( 'user' );
		
		foreach ( $this->ci->db->queries as $key => $query ) {
			$first_word = strtok( $query, ' ' );
			
			if ( $first_word != 'SELECT' ) {
				$data[$key] = [
					'ip'         => $ip,
					'statement'  => $first_word,
					'datetime'   => date( 'Y-m-d H:i:s' ),
					'query'      => base64_encode( $query ),
					'platform'   => $this->ci->agent->platform(),
					'browser'    => $this->ci->agent->browser(),
					'admin'      => $admin ? $admin->id : NULL,
					'admin_name' => $admin ? "$admin->first_name $admin->last_name" : NULL,
					'user'       => $user ? $user->id : NULL,
					'user_name'  => $user ? $user->name : NULL,
				];
			}
		}
		
		if ( $data && in_array( $ip, ['::1', '0.0.0.0', '127.0.0.1'] ) === FALSE ) { //
			$this->ci->db->insert_batch( 'operation_logs', $data );
		}
	}
}
