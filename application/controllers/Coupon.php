<?php

/**
 * Class Coupon
 * @property Mod_setting     $Mod_setting
 * @property Mod_common      $Mod_common
 * @property Mod_file_upload $Mod_file_upload
 * @property common_lib      $common_lib
 * @property Mod_coupon      $Mod_coupon
 */
class Coupon extends My_Controller
{

    private $record_per_page  = 20;
    private $record_num_links = 10;

//    private $data = '';

    public function __construct()
    {
        parent::__construct();

        if ( !$this->ion_auth->is_admin() ) {
            redirect( 'dashboard' );
        }

        $this->data['module_name'] = "Coupons";
        $this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
        $this->load->model( 'Mod_coupon' );
        $this->load->model( 'Mod_common' );
        $this->load->model( 'Mod_setting' );
        $this->load->library( 'pagination' );
        $this->data['status_list'] = $this->common_lib->get_status_array();
    }

    function create()
    {
        array_push( $this->data['breadcrumb'], "Create Coupon" );
        $this->data['action'] = 'add';
        $this->load->view( 'coupon/view_create', $this->data );
    }

    function save_coupon()
    {
        $this->form_validation->set_rules( 'username', 'Username', 'trim|required' ); //new
        $this->form_validation->set_rules( 'code', 'Coupon Code', 'trim|required|alpha_numeric|is_unique[oe_coupon.code]' );
        $this->form_validation->set_rules( 'discount', 'Discount', 'trim|required|numeric' );
        $this->form_validation->set_rules( 'validity', 'Validity', 'trim|required' );
        $this->form_validation->set_rules( 'times_allowed', 'Times Allowed', 'trim|required|integer' );

        if ( $this->form_validation->run() == FALSE ) {
            $this->create();
        } else {
            $res_flag = $this->Mod_coupon->save_coupon_data( $this->authEmail );
            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Coupon Created Successfully!' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'coupon' );
        }
    }

    function index()
    {
        array_push( $this->data['breadcrumb'], "Coupons List" );
        $row = 0;
        $temp_record_postion = $this->uri->segment( 3 );

        if ( !empty ( $temp_record_postion ) ) {
            $row = $temp_record_postion;
        } else {
            $this->session->unset_userdata( 'sql_where_session' );
        }
        $config = config_item( 'pagination' );
        $config['base_url'] = site_url('coupon');
        $config['total_rows'] = $this->Mod_coupon->count_records();
        $config['per_page'] = $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $this->pagination->initialize( $config );
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
        $this->data['links'] = $this->pagination->create_links();

        $this->data['coupons'] = $this->Mod_coupon->get_records( $this->record_per_page, $row );
        $this->load->view( 'coupon/view_list', $this->data );
    }

    function view( $id )
    {
        array_push( $this->data['breadcrumb'], "Coupon Details" );
        $this->data['coupon'] = $this->Mod_common->get_row_data_by_id( 'oe_coupon', $id );
        $this->data['exams'] = $this->Mod_coupon->get_exams_by_coupon( $id );
        $this->load->view( 'coupon/view_details', $this->data );
    }

    function edit( $id )
    {
        array_push( $this->data['breadcrumb'], "Edit Coupon" );
        $this->data['action'] = 'edit';
        $this->data['id'] = $id;
        $this->data['coupon'] = $this->Mod_common->get_row_data_by_id( 'oe_coupon', $id );
        $this->load->view( 'coupon/view_create', $this->data );
    }

    function update_coupon( $id )
    {
//        $this->form_validation->set_rules( 'code', 'Coupon Code', 'trim|required|is_unique[oe_coupon.code]' );
        $this->form_validation->set_rules( 'discount', 'Discount', 'trim|required|numeric' );
        $this->form_validation->set_rules( 'validity', 'Validity', 'trim|required' );
        $this->form_validation->set_rules( 'times_allowed', 'Times Allowed', 'trim|required|integer' );

        if ( $this->form_validation->run() == FALSE ) {
            $this->edit( $id );
        } else {
            $res_flag = $this->Mod_coupon->update_coupon_data( $id, $this->authEmail );
            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Coupon Updated Successfully!' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'coupon' );
        }
    }

}