<?php

/**
 * Class Slider
 * @property Mod_setting     $Mod_setting
 * @property Mod_common      $Mod_common
 * @property Mod_file_upload $Mod_file_upload
 * @property common_lib      $common_lib
 * @property Mod_slider      $Mod_slider
 */
class Slider extends My_Controller
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

        $this->data['module_name'] = "Sliders";
        $this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
        $this->load->model( 'Mod_slider' );
        $this->load->model( 'Mod_common' );
        $this->load->model( 'Mod_setting' );
        $this->load->library( 'pagination' );
        $this->data['status_list'] = $this->common_lib->get_status_array();
    }

    function create()
    {
        array_push( $this->data['breadcrumb'], "Create Slider" );
        $this->data['action'] = 'add';
        $this->load->view( 'slider/view_create', $this->data );
    }

    function save_slider()
    {
        $this->form_validation->set_rules( 'title', 'Slider Title', 'trim|required|max_length[255]' );
        $this->form_validation->set_rules( 'sl', 'Slider SL', 'trim|required|max_length[2]|is_unique[oe_slider.sl]' );

        if ( $this->form_validation->run() == FALSE ) {
            $this->create();
        } else {
            $res_flag = $this->Mod_slider->save_slider_data();

            if ( $res_flag === TRUE ) {
                $this->session->set_flashdata( 'flashOK', 'Slider Created Successfully!' );
            } else {
                $this->session->set_flashdata( 'flashError', $res_flag );
            }
            redirect( 'slider' );
        }
    }

    function index()
    {
        array_push( $this->data['breadcrumb'], "Sliders List" );
        $row = 0;
        $temp_record_postion = $this->uri->segment( 3 );

        if ( !empty ( $temp_record_postion ) ) {
            $row = $temp_record_postion;
        } else {
            $this->session->unset_userdata( 'sql_where_session' );
        }
        $config = config_item( 'pagination' );
        $config['base_url'] = site_url( 'slider' );
        $config['total_rows'] = $this->Mod_slider->count_records();
        $config['per_page'] = $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $this->pagination->initialize( $config );
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
        $this->data['links'] = $this->pagination->create_links();

        $this->data['sliders'] = $this->Mod_slider->get_records( $this->record_per_page, $row );
        $this->load->view( 'slider/view_list', $this->data );
    }

    function view( $id )
    {
        array_push( $this->data['breadcrumb'], "Slider Details" );
        $this->data['slider'] = $this->Mod_common->get_row_data_by_id( 'oe_slider', $id );
        $this->data['exams'] = $this->Mod_slider->get_exams_by_slider( $id );
        $this->load->view( 'slider/view_details', $this->data );
    }

    function edit( $id )
    {
        array_push( $this->data['breadcrumb'], "Edit Slider" );
        $this->data['action'] = 'edit';
        $this->data['id'] = $id;
        $this->data['slider'] = $this->Mod_common->get_row_data_by_id( 'oe_slider', $id );
        $this->load->view( 'slider/view_create', $this->data );
    }

    function update_slider( $id )
    {
        $this->form_validation->set_rules( 'title', 'Slider Title', 'trim|required|max_length[255]' );
        $this->form_validation->set_rules( 'sl', 'Slider SL', 'trim|required|max_length[2]' );

        if ( $this->form_validation->run() == FALSE ) {
            $this->edit( $id );
        } else {
            $res_flag = $this->Mod_slider->update_slider_data($id);

            if ( $res_flag === TRUE ) {
                $this->session->set_flashdata( 'flashOK', 'Slider Updated Successfully!' );
            } else {
                $this->session->set_flashdata( 'flashError', $res_flag );
            }
            redirect( 'slider' );
        }
    }

}
