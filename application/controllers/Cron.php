<?php
/**
 * Created by PhpStorm.
 * User: jnahian
 * Date: 8/12/18
 * Time: 10:49 AM
 *
 * @property Mod_common $Mod_common
 */

class Cron extends CI_Controller
{
	public $uagent, $company;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model( 'Mod_common' );
		
		set_time_limit( 0 );
		
		$uagent = $this->input->server( 'HTTP_USER_AGENT' );
		$exp    = explode( '/', $uagent );
		
		$this->uagent = $exp[0];
		
		$this->company = $this->Mod_common->get_company_data();
		
	}
	
	public function calculate_all_exam_position()
	{
		if ( $this->uagent === 'curl' ) {
			$status = $this->Mod_common->position_calculation();
			if ( $status ) {
				echo "Success!";
			} else {
				echo "Failed!";
			}
		}
	}
	
	public function test()
	{
		$starttime = microtime( TRUE );
		
		if ( $this->uagent === 'curl' ) {
			$this->load->helper( 'file' );
			
			
			$data = "Testing from {$this->uagent}" . date( 'Y-m-d-H-i-s' );
			if ( !write_file( 'test.txt', $data ) ) {
				echo "Unable to write the file \r\n";
			} else {
				echo "File written! \r\n";
			}
			
			$endtime        = microtime( TRUE );
			$execution_time = $endtime - $starttime;
//            $execution_time = number_format( $execution_time, 3 );
			
			echo "Execution Time: $execution_time sec \r\n";
		}
		
	}
	
	public function regenerate_regno()
	{
		$starttime = microtime( TRUE );
		$this->load->helper( 'string' );
		$query = $this->db->select( 'id, reg_no reg_no' )
						  ->from( 'oe_doc_master' )
//						  ->like( 'reg_no', 'BMED18', 'LEFT' )
//						  ->where('LENGTH(reg_no) >', 11)
						  ->order_by( 'id', 'asc' )
//						  ->limit( 100 )
						  ->get();
		
		$results = $query->result();
		
		$pref = $this->company->short_code . date( 'y' );

//		$query2 = $this->db->select_max( 'reg_no' )
//						   ->from( 'oe_doc_master' )
//						   ->like( 'reg_no', 'BMED18', 'LEFT' )
//						   ->where('LENGTH(reg_no)', 11)
//						   ->order_by( 'reg_no', 'DESC' )
//						   ->limit( 1 )
//						   ->get();

//		$reg      = $query2->row()->reg_no;
		$reg = $pref . '00000';

//		echo "$reg \r\n"; exit;
		
		foreach ( $results as $i => $result ) {
			
			$sl  = substr( $reg, -4, 4 ) + 1;
			$reg = $pref . sprintf( '%05d', $sl );

//			echo "$reg \r\n";
			
			$status = $this->db->update( 'oe_doc_master', ['new_reg_no' => $reg], ['id' => $result->id] );
			
			if ( $status ) {
				echo "Reg no {$result->reg_no} updated to {$reg} \r\n";
			} else {
				echo "Failed to update Reg no {$result->reg_no} to {$reg} \r\n";
			}
		}
		$endtime        = microtime( TRUE );
		$execution_time = $endtime - $starttime;
//            $execution_time = number_format( $execution_time, 3 );
		
		echo "Execution Time: $execution_time sec \r\n";

//		die( json_encode( $new_regs ) );
	}
	
	
}
