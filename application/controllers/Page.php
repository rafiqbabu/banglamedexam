<?php

/**
 * @property Mod_page $Mod_page
 */
class Page extends MY_Controller
{

    private $record_per_page  = 20;
    private $record_num_links = 5;

//    private $data = '';

    public function __construct()
    {
        parent::__construct();
        $this->data['module_name'] = "Pages";
        $this->load->library( 'pagination' );
        $this->load->library( 'common_lib' );
        $this->load->model( 'Mod_setting' );
        $this->load->model( 'Mod_common' );
        $this->load->model( 'Mod_page' );

//        $this->data['module_list'] = $this->Mod_setting->getModuleList();
//        $this->data['unit_list'] = $this->Mod_setting->getUnitList();

        $this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);

        $this->data['status_array'] = $this->common_lib->get_status_array();
    }

    public function index()
    {
        $this->data['form_action'] = 'add';
        array_push( $this->data['breadcrumb'], 'Add Page' );
        $this->load->view( 'page/view_add_page', $this->data );
    }

    public function edit()
    {
        $id = $this->uri->segment( 3 );
        $this->data['form_action'] = 'edit';
        $this->data['id'] = $id;
        array_push( $this->data['breadcrumb'], 'Edit Page' );
        $this->data['page'] = $this->Mod_page->get_details( $id );

        $this->load->view( 'page/view_add_page', $this->data );
    }

    public function copy()
    {
        $id = $this->uri->segment( 3 );
        $this->data['form_action'] = 'add';
        $this->data['id'] = $id;
        array_push( $this->data['breadcrumb'], 'Add Page' );
        $this->data['page'] = $this->Mod_page->get_details( $id );

        $this->load->view( 'page/view_add_page', $this->data );
    }


    /**
     * Save Page
     */
    function save()
    {
        $this->form_validation->set_rules( 'name', 'Page Name', 'required' );
        $this->form_validation->set_rules( 'slug', 'Slug', 'required|is_unique[pages.slug]' );
        $this->form_validation->set_rules( 'details', 'Details', 'required' );
        if ( $this->form_validation->run() == FALSE ) {
            $this->index();
        } else {
            $res_flag = $this->Mod_page->save_data();
            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Page Saved successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to Save Page.' );
            }
            redirect( 'page/record' );
        }
    }


    /**
     * Update Page
     */
    function update()
    {
        $id = $this->uri->segment( 3 );
        $this->form_validation->set_rules( 'name', 'Page Name', 'required' );
        $this->form_validation->set_rules( 'slug', 'Slug', 'required' );
        $this->form_validation->set_rules( 'details', 'Details', 'required' );

        if ( $this->form_validation->run() == FALSE ) {
            $this->edit();
        } else {
            $res_flag = $this->Mod_page->update_data( $id );
            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Page Updated successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to Update Page.' );
            }
            redirect( 'page/record' );
        }
    }

    function record()
    {
        $this->load->helper( 'text' );
        array_push( $this->data['breadcrumb'], 'Page List' );
        $this->data['rec'] = $this->Mod_page->get_records_list();
        $this->load->view( 'page/view_page_list', $this->data );
    }


    public function reading_materials()
    {
        array_push( $this->data['breadcrumb'], "Reading Material List" );
        $temp_record_postion = $this->input->get( 'per_page' );
        $row = $temp_record_postion ? $temp_record_postion : 0;

        $config = config_item( 'pagination' );
        $config['base_url'] = site_url( 'page/reading_materials' );
        $config['total_rows'] = $this->Mod_page->count_reading_materials();
        $config['per_page'] = $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $this->pagination->initialize( $config );
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
        $this->data['reading_material_types'] = $this->Mod_common->make_dropdown( 'reading_material_types', NULL, 'name', 'code' );

        $this->data['links'] = $this->pagination->create_links();

        $get_list = $this->Mod_page->get_reading_materials_list( $this->record_per_page, $row );
        $this->data['record'] = $get_list;
        $this->load->view( 'page/view_reading_materials', $this->data );
    }

    public function add_reading_material()
    {
        array_push( $this->data['breadcrumb'], "ADD Reading Material" );
        $this->data['module_list'] = $this->Mod_setting->getModuleList();
        $this->data['unit_list'] = $this->Mod_setting->getUnitList();
        $this->data['reading_material_types'] = $this->Mod_common->make_dropdown( 'reading_material_types', NULL, 'name', 'code' );
        $this->data['form_action'] = "add";
        $this->load->view( 'page/view_reading_material_add', $this->data );
    }

    public function save_reading_material()
    {
        $this->form_validation->set_rules( 'type', 'Type', 'trim|required' );
        if ( $this->form_validation->run() ) {
            $res_flag = $this->Mod_page->save_reading_materials( $this->authEmail );
            if ( $res_flag['success'] ) {
                $this->session->set_flashdata( 'flashOK', 'Reading Material Saved Successfully!' );
                if ( $res_flag['msg'] ) {
                    $this->session->set_flashdata( 'flashError', $res_flag['msg'] );
                }
            } else {
                $this->session->set_flashdata( 'flashError', $res_flag['msg'] );
            }
        } else {
            $this->session->set_flashdata( 'flashError', validation_errors() );
        }
        redirect( 'page/reading_materials' );
    }

    public function edit_reading_material( $id )
    {
        array_push( $this->data['breadcrumb'], "Edit Reading Material" );
        $this->data['module_list'] = $this->Mod_setting->getModuleList();
        $this->data['unit_list'] = $this->Mod_setting->getUnitList();
        $this->data['reading_material_types'] = $this->Mod_common->make_dropdown( 'reading_material_types', NULL, 'name', 'code' );
        $this->data['form_action'] = "edit";
        $this->data['row'] = $this->Mod_page->get_reading_material( $id );
        $this->load->view( 'page/view_reading_material_edit', $this->data );
    }

    public function update_reading_material( $id )
    {
        $this->form_validation->set_rules( 'type', 'Type', 'trim|required' );
        if ( $this->form_validation->run() ) {
            $res_flag = $this->Mod_page->update_reading_materials( $id, $this->authEmail );
            if ( $res_flag['success'] ) {
                $this->session->set_flashdata( 'flashOK', 'Reading Material Saved Successfully!' );
                if ( $res_flag['msg'] ) {
                    $this->session->set_flashdata( 'flashError', $res_flag['msg'] );
                }
            } else {
                $this->session->set_flashdata( 'flashError', $res_flag['msg'] );
            }
        } else {
            $this->session->set_flashdata( 'flashError', validation_errors() );
        }
        redirect( 'page/reading_materials' );
    }

    public function delete_reading_material( $id )
    {
        $res_flag = $this->Mod_page->delete_reading_materials( $id );
        if ( $res_flag ) {
            $this->session->set_flashdata( 'flashOK', 'Reading Material Deleted Successfully!' );
        } else {
            $this->session->set_flashdata( 'flashError', 'Sorry! Cannot Delete the Reading Material.' );
        }
        redirect( 'page/reading_materials' );
    }
}

?>
