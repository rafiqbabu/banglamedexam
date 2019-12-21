<?php

/**
 * Class Package
 * @property Mod_setting     $Mod_setting
 * @property Mod_package     $Mod_package
 * @property Mod_common      $Mod_common
 * @property Mod_file_upload $Mod_file_upload
 * @property common_lib      $common_lib
 */
class Package extends My_Controller
{

	private $record_per_page  = 15;
	private $record_num_links = 5;

//    private $data = '';

	public function __construct()
	{
		parent::__construct();
		if ( !$this->ion_auth->is_admin() && !$this->ion_auth->in_group( 5 ) ) {
			redirect( 'dashboard' );
		}

		$this->data['module_name'] = "Packages";
		$this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
		$this->load->model( 'Mod_package' );
		$this->load->model( 'Mod_common' );
		$this->load->model( 'Mod_setting' );
		$this->load->library( 'pagination' );
		$this->data['status_list'] = $this->common_lib->get_status_array();
		$this->data['year_list'] = $this->common_lib->get_year_arrays();
		$this->data['session_list'] = $this->common_lib->get_session_arrays();
		$this->data['ptype_list'] = $this->common_lib->get_ptype_arrays();
		$this->data['package_types'] = $this->Mod_package->get_package_types_array();
	}

	function create()
	{
		array_push( $this->data['breadcrumb'], "Create Package" );
		$this->data['action']    = 'add';
		$this->data['exam_list'] = $this->Mod_setting->get_exam_list_for_package();
		$this->load->view( 'package/view_create', $this->data );
	}

	function save_package()
	{
		$this->form_validation->set_rules( 'name', 'Package Name', 'trim|required' );
		$this->form_validation->set_rules( 'type', 'Package Type', 'trim|required' );
		$this->form_validation->set_rules( 'start_date', 'Start Date', 'trim|required' );
		$this->form_validation->set_rules( 'end_date', 'End Date', 'trim|required' );
		$this->form_validation->set_rules( 'exams[]', 'Exams', 'trim' );
		$this->form_validation->set_rules( 'desc', 'Details', 'trim' );
		$this->form_validation->set_rules( 'amount_bdt', 'Cost (BDT)', 'trim|required' );
		$this->form_validation->set_rules( 'amount_usd', 'Cost (USD)', 'trim|required' );

		if ( $this->form_validation->run() == FALSE ) {
			$this->create();
		} else {
			$res_flag = $this->Mod_package->save_package_data( $this->authEmail );
			if ( !empty( $res_flag ) ) {
				$this->session->set_flashdata( 'flashOK', 'Package Created Successfully!' );
			} else {
				$this->session->set_flashdata( 'flashError', 'Failed to add data' );
			}
			redirect( 'package/records' );
		}
	}

	function records()
	{
		array_push( $this->data['breadcrumb'], "Packages List" );
		$row = 0;
		$temp_record_postion = $this->uri->segment( 3 );

		if ( !empty ( $temp_record_postion ) ) {
			$row = $temp_record_postion;
		} else {
			$this->session->unset_userdata( 'sql_where_session' );
		}
		$config = config_item( 'pagination' );
		$config['base_url'] = site_url( 'package/records' );
		$config['total_rows'] = $this->Mod_package->count_records();
		$config['per_page'] = $this->record_per_page;
		$config['num_links'] = $this->record_num_links;
		$this->pagination->initialize( $config );
		$this->data['record_pos'] = $row;
		$this->data['total_rows'] = $config['total_rows'];
		$this->data['links'] = $this->pagination->create_links();

		$this->data['exam_lists'] = $this->Mod_package->get_records( $this->record_per_page, $row );
		$this->load->view( 'package/view_list', $this->data );
	}

	function vdo()
	{
		
		//$this->data['package'] = $this->Mod_common->get_row_data_by_id( 'oe_package', $id );
		$this->load->view( 'package/view_add_vdo', $this->data );
	}
	
	function view( $id )
	{
		array_push( $this->data['breadcrumb'], "Package Details" );
		$this->data['package'] = $this->Mod_common->get_row_data_by_id( 'oe_package', $id );
		$this->data['exams'] = $this->Mod_package->get_exams_by_package( $id );
		$this->load->view( 'package/view_details', $this->data );
	}

	function edit( $id )
	{
		array_push( $this->data['breadcrumb'], "Edit Package" );
		$this->data['action']    = 'edit';
		$this->data['id']        = $id;
		$this->data['exam_list'] = $this->Mod_setting->get_exam_list_for_package();
		$this->data['package']   = $this->Mod_common->get_row_data_by_id( 'oe_package', $id );
		$this->data['exams']     = $this->Mod_package->get_exams_ids_by_package( $id );
		$this->load->view( 'package/view_create', $this->data );
	}

	function update_package( $id )
	{
		$this->form_validation->set_rules( 'name', 'Package Name', 'trim|required' );
		$this->form_validation->set_rules( 'type', 'Package Type', 'trim|required' );
		$this->form_validation->set_rules( 'start_date', 'Start Date', 'trim|required' );
		$this->form_validation->set_rules( 'end_date', 'End Date', 'trim|required' );
		$this->form_validation->set_rules( 'exams[]', 'Exams', 'trim|required' );
		$this->form_validation->set_rules( 'desc', 'Details', 'trim' );
		$this->form_validation->set_rules( 'amount_bdt', 'Cost (BDT)', 'trim|required' );
		$this->form_validation->set_rules( 'amount_usd', 'Cost (USD)', 'trim|required' );

		if ( $this->form_validation->run() == FALSE ) {
			$this->edit( $id );
		} else {
			$res_flag = $this->Mod_package->update_package_data( $id, $this->authEmail );
			if ( !empty( $res_flag ) ) {
				$this->session->set_flashdata( 'flashOK', 'Package Updated Successfully!' );
			} else {
				$this->session->set_flashdata( 'flashError', 'Failed to add data' );
			}
			redirect( 'package/records' );
		}
	}

}
