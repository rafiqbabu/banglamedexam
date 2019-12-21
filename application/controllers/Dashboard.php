<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author jnahian
 * Date : 02-March-2014
 * @property Mod_admission $Mod_admission
 * @property Mod_notice    $Mod_notice
 * @property Mod_common    $Mod_common
 * @property common_lib    $common_lib
 */
class Dashboard extends My_Controller
{
	private $record_per_page  = 20;
	private $record_num_links = 5;

//    private $data = '';
	
	public function __construct()
	{
		parent::__construct();
		$this->data['module_name'] = "Dashboard";
		$this->load->model( 'Mod_notice' );
		
		//$this->data['teacher_auto_id'] = $this->Mod_teacher->get_auto_id($this->teacher_id);
		$this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
	}
	
	public function index()
	{
		$this->data['notices'] = $this->Mod_notice->get_all_notice();
		$this->load->view( 'dashboard/view_admin_dashboard', $this->data );
	}
	
	public function operation_logs()
	{
		$this->load->library( 'pagination' );
		
		$row                          = $this->input->get( 'per_page' ) ? $this->input->get( 'per_page' ) : 0;
		$config                       = $this->config->item( 'pagination' );
		$config['base_url']           = base_url( "dashboard/operation_logs" );
		$config['total_rows']         = $this->Mod_common->count_operation_logs();
		$config['per_page']           = $this->record_per_page;
		$config['num_links']          = $this->record_num_links;
		$config['reuse_query_string'] = TRUE;
		$config['page_query_string']  = TRUE;
		$this->pagination->initialize( $config );
		
		$this->data['record_pos'] = $row;
		$this->data['total_rows'] = $config['total_rows'];
		$this->data['links']      = $this->pagination->create_links();
		
		$this->data['logs'] = $this->Mod_common->get_operation_logs( $this->record_per_page, $row );
		
		$this->load->view( 'dashboard/view_operation_logs', $this->data );
	}
}
