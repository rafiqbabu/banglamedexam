<?php

/**
 * Class Advertisement
 * @property Mod_setting     $Mod_setting
 * @property Mod_common      $Mod_common
 * @property Mod_file_upload $Mod_file_upload
 * @property common_lib      $common_lib
 * @property Mod_advertisement      $Mod_advertisement
 */
class Advertisement extends My_Controller
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

        $this->data['module_name'] = "Advertisements";
        $this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
        $this->load->model( 'Mod_advertisement' );
        $this->load->model( 'Mod_common' );
        $this->load->model( 'Mod_setting' );
        $this->load->library( 'pagination' );
        $this->data['status_list'] = $this->common_lib->get_status_array();
    }

    function create()
    {
        array_push( $this->data['breadcrumb'], "Create Advertisement" );
        $this->data['action'] = 'add';
        $this->load->view( 'advertisement/view_create', $this->data );
    }

    function save_Advertisement()
    {
        $this->form_validation->set_rules( 'title', 'Advertisement Title', 'trim|required|max_length[255]' );
        $this->form_validation->set_rules( 'sl', 'Advertisement SL', 'trim|required|max_length[2]|is_unique[oe_advertisement.sl]' );

        if ( $this->form_validation->run() == FALSE ) {
            $this->create();
        } else {
            $res_flag = $this->Mod_advertisement->save_advertisement_data();

            if ( $res_flag === TRUE ) {
                $this->session->set_flashdata( 'flashOK', 'Advertisement Created Successfully!' );
            } else {
                $this->session->set_flashdata( 'flashError', $res_flag );
            }
            redirect( 'Advertisement' );
        }
    }

    function index()
    {
        array_push( $this->data['breadcrumb'], "Advertisements List" );
        $row = 0;
        $temp_record_postion = $this->uri->segment( 3 );

        if ( !empty ( $temp_record_postion ) ) {
            $row = $temp_record_postion;
        } else {
            $this->session->unset_userdata( 'sql_where_session' );
        }
        $config = config_item( 'pagination' );
        $config['base_url'] = site_url( 'Advertisement' );
        $config['total_rows'] = $this->Mod_advertisement->count_records();
        $config['per_page'] = $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $this->pagination->initialize( $config );
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
        $this->data['links'] = $this->pagination->create_links();

        $this->data['advertisements'] = $this->Mod_advertisement->get_records( $this->record_per_page, $row );
        $this->load->view( 'advertisement/view_list', $this->data );
    }

    function view( $id )
    {
        array_push( $this->data['breadcrumb'], "Advertisement Details" );
        $this->data['advertisement'] = $this->Mod_common->get_row_data_by_id( 'oe_advertisement', $id );
        $this->data['exams'] = $this->Mod_advertisement->get_exams_by_Advertisement( $id );
        $this->load->view( 'advertisement/view_details', $this->data );
    }

    function edit( $id )
    {
        array_push( $this->data['breadcrumb'], "Edit Advertisement" );
        $this->data['action'] = 'edit';
        $this->data['id'] = $id;
        $this->data['advertisement'] = $this->Mod_common->get_row_data_by_id( 'oe_advertisement', $id );
        $this->load->view( 'advertisement/view_create', $this->data );
    }

    function update_Advertisement( $id )
    {
        $this->form_validation->set_rules( 'title', 'Advertisement Title', 'trim|required|max_length[255]' );
        $this->form_validation->set_rules( 'sl', 'Advertisement SL', 'trim|required|max_length[2]' );

        if ( $this->form_validation->run() == FALSE ) {
            $this->edit( $id );
        } else {
            $res_flag = $this->Mod_advertisement->update_advertisement_data( $id );

            if ( $res_flag === TRUE ) {
                $this->session->set_flashdata( 'flashOK', 'Advertisement Updated Successfully!' );
            } else {
                $this->session->set_flashdata( 'flashError', $res_flag );
            }
            redirect( 'advertisement' );
        }
    }

}
