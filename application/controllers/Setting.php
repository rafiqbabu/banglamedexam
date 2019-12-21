<?php

/**
 * Description of featured
 *
 * @author jnahian
 * @property Mod_setting   $Mod_setting
 * @property Mod_admission $Mod_admission
 * @property Mod_common    $Mod_common
 * @property common_lib    $common_lib
 */
class Setting extends My_Controller
{

    private $record_per_page  = 20;
    private $record_num_links = 5;

    public function __construct()
    {
        parent::__construct();

        $this->data['module_name'] = "Setting";

        $this->load->model( 'Mod_setting' );
        $this->load->library( 'Image_lib' );
        $this->load->model( 'Mod_common' );
        $this->load->library( 'pagination' );
        $this->load->library( 'common_lib' ); /*  load pagination library */
        $this->load->library( 'form_validation' ); /* load validation library */
        $this->data['status_array'] = $this->common_lib->get_status_array();
        $this->data['course_list'] = $this->Mod_setting->get_course_list_array();
        $this->data['faculty_list'] = $this->Mod_setting->get_faculty_list_array();
//        $this->data['sub_list'] = $this->Mod_setting->get_subject_list_array();
        $this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
        $this->data['institute_list'] = $this->Mod_setting->get_institue_list_array();
    }

    function index()
    {
        redirect( 'setting/add_class' );
    }

    public function general_info()
    {
        array_push( $this->data['breadcrumb'], 'General Information' );

        $this->data['record'] = $this->Mod_setting->get_general_info();
        $this->load->view( 'setting/view_general_info', $this->data );
    }

    public function save_general_info()
    {
        $this->form_validation->set_rules( 'name', 'Company Name', 'trim|required' );
        $this->form_validation->set_rules( 'tagline', 'Company Tagline', 'trim|required' );
        $this->form_validation->set_rules( 'address', 'Company Address', 'trim|required' );
        $this->form_validation->set_rules( 'email', 'Company Email', 'trim|required|valid_email' );
        $this->form_validation->set_rules( 'fb_id', 'Facebook URL', 'trim' );
        $this->form_validation->set_rules( 'twitter', 'Twitter URL', 'trim' );
        $this->form_validation->set_rules( 'phone', 'Company Phone', 'trim|required' );
        $this->form_validation->set_rules( 'website', 'Company Website', 'trim|required' );
        if ( $this->form_validation->run() ) {
            $this->Mod_setting->save_general_info();
        } else {
            $this->session->set_flashdata( 'flashError', validation_errors() );
        }
        redirect( 'setting/general_info' );
    }

    function add_faculty()
    {
        $this->data['form_action'] = "add";

        $get_list = $this->Mod_setting->get_faculty_list();

        $this->data['record'] = $get_list;
        $this->load->view( 'setting/view_faculty', $this->data );
    }

    function save_faculty()
    {

        $this->form_validation->set_rules( 'faculty_name', 'Faculty', 'trim|required' );
        $this->form_validation->set_rules( 'course_id', 'Course id', 'trim|required' );
        $this->form_validation->set_rules( 'faculty_code', 'Faculty id', 'trim|required' );
        $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );


        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'setting/view_faculty', $this->data );
        } else {
            $res_flag = $this->Mod_setting->save_faculty_info( $this->authEmail );

            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'setting/add_faculty' );
        }
    }

    function edit_faculty()
    {
        $this->data['form_action'] = "edit";
        $auto_id = $this->uri->segment( 3 );
        $get_details = $this->Mod_setting->get_faculty_details( $auto_id );
        $this->data['res'] = $get_details;

        $this->data['record'] = $this->data['course_list']; //$get_list;

        $get_list = $this->Mod_setting->get_faculty_list();
        $this->data['record'] = $get_list;

        $this->load->view( 'setting/view_faculty', $this->data );
    }

    function update_faculty()
    {
        $auto_id = $this->input->post( 'hidden_auto_id', TRUE );
        if ( !empty( $auto_id ) ) {
            $this->form_validation->set_rules( 'faculty_name', 'Faculty', 'trim|required' );
            $this->form_validation->set_rules( 'course_id', 'Course id', 'trim|required' );
            $this->form_validation->set_rules( 'faculty_code', 'Course', 'trim|required' );
            $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );


            if ( $this->form_validation->run() == FALSE ) {
                $this->data['form_action'] = "add";
                $this->load->view( 'setting/view_faculty', $this->data );
            } else {
                $res_flag = $this->Mod_setting->update_faculty_info( $auto_id, $this->authEmail );

                if ( !empty( $res_flag ) ) {
                    $this->session->set_flashdata( 'flashOK', 'Data updated successfully' );
                } else {
                    $this->session->set_flashdata( 'flashError', 'Failed to add data' );
                }
                redirect( 'setting/add_faculty' );
            }
        } else {
            redirect( 'setting/edit_faculty/' . $auto_id );
        }
    }

    function add_course()
    {
        $this->data['form_action'] = "add";
        $get_list = $this->Mod_setting->get_course_list();
        $this->data['institute_list'] = $this->Mod_setting->get_institue_list_array();

        $this->data['record'] = $get_list;
        $this->load->view( 'setting/view_course', $this->data );
    }

    function save_course()
    {
        $this->form_validation->set_rules( 'institute_id', 'Institute Name', 'trim|required' );
        $this->form_validation->set_rules( 'course_name', 'Course Name', 'trim|required' );
        $this->form_validation->set_rules( 'course_code', 'Course Code', 'trim|required' );
        $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );
        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'setting/view_course', $this->data );
        } else {
            $res_flag = $this->Mod_setting->save_course_info( $this->authEmail );
            if ( $res_flag ) {
                $this->session->set_flashdata( 'flashOK', 'Data added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'setting/add_course' );
        }
    }

    function edit_course()
    {
        $this->data['form_action'] = "edit";
        $auto_id = $this->uri->segment( 3 );
        $get_details = $this->Mod_setting->get_course_details( $auto_id );
        $this->data['res'] = $get_details;

        // echo "<pre>";
        // print_r($this->data['res']);
        // exit();


        $this->data['institute_list'] = $this->Mod_setting->get_institue_list_array();
        $get_list = $this->Mod_setting->get_course_list();

        $this->data['record'] = $get_list;

        $this->load->view( 'setting/view_course', $this->data );
    }

    function update_course()
    {
        $auto_id = $this->input->post( 'hidden_auto_id', TRUE );
        if ( !empty( $auto_id ) ) {
            $this->form_validation->set_rules( 'course_name', 'Course Name', 'trim|required' );
            $this->form_validation->set_rules( 'course_code', 'Course Code', 'trim|required' );
            $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );
            if ( $this->form_validation->run() == FALSE ) {
                $this->data['form_action'] = "add";
                $this->load->view( 'setting/view_course', $this->data );
            } else {
                $res_flag = $this->Mod_setting->update_course_info( $auto_id, $this->authEmail );

                if ( !empty( $res_flag ) ) {
                    $this->session->set_flashdata( 'flashOK', 'Data update successfully' );
                } else {
                    $this->session->set_flashdata( 'flashError', 'Failed update data' );
                }
                redirect( 'setting/add_course' );
            }
        } else {
            redirect( 'setting/edit_course/' . $auto_id );
        }
    }

    function add_institute()
    {

        $this->data['form_action'] = "add";
        $get_list = $this->Mod_setting->get_institute_list();
        $this->data['record'] = $get_list;

        $this->load->view( 'setting/view_institute', $this->data );
    }

    function save_institute()
    {
        $this->form_validation->set_rules( 'institute_name', 'Institute', 'trim|required' );
        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'setting/view_institute', $this->data );
        } else {
            $res_flag = $this->Mod_setting->save_institute_list( $this->authEmail );
            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'setting/add_institute' );
        }
    }

    function edit_institute_list()
    {
        $this->data['form_action'] = "edit";
        $auto_id = $this->uri->segment( 3 );
        $get_details = $this->Mod_setting->get_institute_details( $auto_id );
        $this->data['res'] = $get_details;
//        echo '<pre>';
//        print_r($this->data['res']);
//        exit;

        $get_list = $this->Mod_setting->get_institute_list();

        $this->data['record'] = $get_list;

        $this->load->view( 'setting/view_institute', $this->data );
    }

    function update_institute()
    {
        $auto_id = $this->input->post( 'hidden_auto_id', TRUE );
        if ( !empty( $auto_id ) ) {
            $this->form_validation->set_rules( 'institute_name', 'Institute', 'trim|required' );
            if ( $this->form_validation->run() == FALSE ) {
                $this->data['form_action'] = "add";
                $this->load->view( 'setting/view_institute', $this->data );
            } else {
                $res_flag = $this->Mod_setting->update_institute_info( $auto_id, $this->authEmail );

                if ( !empty( $res_flag ) ) {
                    $this->session->set_flashdata( 'flashOK', 'Data update successfully' );
                } else {
                    $this->session->set_flashdata( 'flashError', 'Failed update data' );
                }
                redirect( 'setting/add_institute' );
            }
        } else {
            redirect( 'setting/edit_institute_list/' . $auto_id );
        }
    }

    function subject_list()
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
        $config['base_url'] = site_url( 'setting/subject_list' );
        $config['total_rows'] = $this->Mod_setting->count_subject_records();
        $config['per_page'] = $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $this->pagination->initialize( $config );
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
        $this->data['links'] = $this->pagination->create_links();

        $this->data['record'] = $this->Mod_setting->get_subject_list( NULL, $this->record_per_page, $row );
        $this->data['institute_list'] = $this->Mod_setting->get_institue_list_array();
        $this->load->view( 'setting/view_subject', $this->data );
    }

    function add_subject()
    {
        $this->data['form_action'] = "add";
        $this->data['institute_list'] = $this->Mod_setting->get_institue_list_array();
        $this->load->view( 'setting/view_subject_add', $this->data );
    }

    function save_subject()
    {
        $this->form_validation->set_rules( 'institute_id', 'Institute Name', 'trim|required' );
        $this->form_validation->set_rules( 'course_id', 'Course', 'trim|required' );
        $this->form_validation->set_rules( 'faculty_id', 'Faculty', 'trim|required' );
        $this->form_validation->set_rules( 'subject', 'Faculty', 'trim|required' );

        $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );


        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'setting/view_subject', $this->data );
        } else {
            $res_flag = $this->Mod_setting->save_subject_info( $this->authEmail );

            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'setting/subject_list' );
        }
    }

    function edit_subject()
    {
        $this->data['form_action'] = "edit";
        $auto_id = $this->uri->segment( 3 );
        $get_details = $this->Mod_setting->get_subject_details( $auto_id );
        $this->data['res'] = $get_details;

        $this->data['institute_list'] = $this->Mod_setting->get_institue_list_array();
        $this->data['record'] = $this->Mod_setting->get_subject_list();
        $this->load->view( 'setting/view_subject_add', $this->data );
    }

    function update_subject()
    {
        $auto_id = $this->input->post( 'hidden_auto_id', TRUE );
        if ( !empty( $auto_id ) ) {
            //$this->form_validation->set_rules('institute_id', 'Institute', 'trim');
            $this->form_validation->set_rules( 'course_id', 'Course', 'trim|required' );
            $this->form_validation->set_rules( 'faculty_id', 'Faculty', 'trim|required' );
            // $this->form_validation->set_rules('subject_faculty_id', 'Faculty', 'trim|required');

            $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );

            if ( $this->form_validation->run() == FALSE ) {
                $this->data['form_action'] = "add";

                $this->load->view( 'setting/view_subject', $this->data );
            } else {

                $res_flag = $this->Mod_setting->update_subject_info( $auto_id, $this->authEmail );
                ///echo $res_flag;exit();
                if ( !empty( $res_flag ) ) {
                    $this->session->set_flashdata( 'flashOK', 'Update Data added successfully' );
                } else {
                    $this->session->set_flashdata( 'flashError', 'Failed to add data' );
                }
                redirect( 'setting/subject_list' );
            }
        }
        // else 
        // {
        //     redirect('setting/edit_subject/' . $auto_id);
        // }
    }


    function add_class_topic()
    {
        $this->data['form_action'] = "add";
        $this->data['record'] = $this->Mod_setting->get_class_topic_list();
        $this->load->view( 'setting/view_class_topic', $this->data );
    }

    function save_class_totic()
    {
        $this->form_validation->set_rules( 'course_code', 'Course', 'trim|required' );
        $this->form_validation->set_rules( 'faculty_code', 'Faculty', 'trim|required' );
        //$this->form_validation->set_rules('subject_id', 'Faculty', 'trim|required');
        $this->form_validation->set_rules( 'class_topic_name', 'Topic Name', 'trim|required' );
        $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );


        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'setting/view_class_topic', $this->data );
        } else {
            $res_flag = $this->Mod_setting->save_class_topic_info( $this->authEmail );

            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'setting/add_class_topic' );
        }
    }

    function edit_class_topic()
    {
        $this->data['form_action'] = "edit";
        $auto_id = $this->uri->segment( 3 );
        $get_details = $this->Mod_setting->get_class_topic_details( $auto_id );
        $this->data['res'] = $get_details;
        $this->data['record'] = $this->Mod_setting->get_class_topic_list();
        $this->load->view( 'setting/view_class_topic', $this->data );
    }

    function update_class_totic()
    {
        $auto_id = $this->input->post( 'hidden_auto_id', TRUE );
        if ( !empty( $auto_id ) ) {
            $this->form_validation->set_rules( 'course_code', 'Course', 'trim|required' );
            $this->form_validation->set_rules( 'faculty_code', 'Faculty', 'trim|required' );
            //$this->form_validation->set_rules('subject_id', 'Faculty', 'trim|required');
            $this->form_validation->set_rules( 'class_topic_name', 'Subject', 'trim|required' );
            $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );

            if ( $this->form_validation->run() == FALSE ) {
                $this->data['form_action'] = "add";
                $this->load->view( 'setting/view_class_topic', $this->data );
            } else {
                $res_flag = $this->Mod_setting->update_class_topic_info( $auto_id, $this->authEmail );

                if ( !empty( $res_flag ) ) {
                    $this->session->set_flashdata( 'flashOK', 'Update Data successfully' );
                } else {
                    $this->session->set_flashdata( 'flashError', 'Failed to add data' );
                }
                redirect( 'setting/add_class_topic' );
            }
        } else {
            redirect( 'setting/edit_class_topic/' . $auto_id );
        }
    }

    public function topic_list()
    {
        array_push( $this->data['breadcrumb'], "Topics List" );
        $row = 0;
        $temp_record_postion = $this->uri->segment( 3 );

        if ( !empty ( $temp_record_postion ) ) {
            $row = $temp_record_postion;
        } else {
            $this->session->unset_userdata( 'sql_where_session' );
        }
        $config = config_item( 'pagination' );
        $config['base_url'] = site_url( 'setting/topic_list' );
        $config['total_rows'] = $this->Mod_setting->count_topic_records();
        $config['per_page'] = $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $this->pagination->initialize( $config );
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
        $this->data['links'] = $this->pagination->create_links();
        $this->data['record'] = $this->Mod_setting->get_topics_list( FALSE, $this->record_per_page, $row );
        $this->data['chapter_list'] = $this->Mod_setting->get_chapter_list_array();
        $this->load->view( 'setting/view_topics', $this->data );
    }

    public function add_topics()
    {
        $this->data['form_action'] = "add";
        $this->data['chapter_list'] = $this->Mod_setting->get_chapter_list_array();
        $this->load->view( 'setting/view_topics_add', $this->data );
    }

    public function save_topics()
    {
        $this->form_validation->set_rules( 'name', 'name', 'trim|required' );

        $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );


        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'setting/view_topics', $this->data );
        } else {
            $res_flag = $this->Mod_setting->save_topics_info();

            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'setting/topic_list' );
        }
    }

    public function edit_topics()
    {
        $this->data['form_action'] = "edit";
        $auto_id = $this->uri->segment( '3' );
        $get_details = $this->Mod_setting->get_topics_value( $auto_id );
        $this->data['res'] = $get_details;
        $this->data['chapter_list'] = $this->Mod_setting->get_chapter_list_array();
        $this->data['record'] = $this->Mod_setting->get_topics_list();
        $this->load->view( 'setting/view_topics_add', $this->data );
    }

    public function update_topic()
    {
        $auto_id = $this->input->post( 'auto_id' );
        $this->form_validation->set_rules( 'name', 'name', 'trim|required' );

        $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );


        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'setting/view_topics', $this->data );
        } else {
            $res_flag = $this->Mod_setting->update_topics_info( $auto_id );

            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data Updated successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to Updated data' );
            }
            redirect( 'setting/topic_list' );
        }
    }


    public function add_chapter()
    {
        $this->data['form_action'] = "add";
        $this->data['record'] = $this->Mod_setting->get_chapter_list();
        //$this->data['chapter_list'] = $this->Mod_setting->get_chapter_list_array();
        $this->load->view( 'setting/view_chapter', $this->data );
    }


    public function save_chapter()
    {

        $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );


        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'setting/view_chapter', $this->data );
        } else {
            $res_flag = $this->Mod_setting->save_chapter_info();

            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'setting/add_chapter' );
        }
    }


    public function edit_chapter()
    {
        $this->data['form_action'] = "edit";
        $auto_id = $this->uri->segment( '3' );
        $get_details = $this->Mod_setting->get_chapter_value( $auto_id );
        $this->data['res'] = $get_details;
        $this->data['record'] = $this->Mod_setting->get_chapter_list();
        $this->load->view( 'setting/view_chapter', $this->data );
    }


    public function update_chapter()
    {

        $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );

        $auto_id = $this->input->post( 'auto_id' );
        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'setting/view_chapter', $this->data );
        } else {
            $res_flag = $this->Mod_setting->update_chapter_info( $auto_id, $user_email );

            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data Updated successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to Updated data' );
            }
            redirect( 'setting/add_chapter' );
        }
    }


    function add_med_collage()
    {
        $this->data['form_action'] = "add";
        $get_list = $this->Mod_setting->get_collages_list();
        $this->data['record'] = $get_list;

        $this->load->view( 'setting/view_medical_collage', $this->data );
    }

    function save_med_collage()
    {
        $this->form_validation->set_rules( 'collage_name', 'Collage Name', 'trim|required' );
        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'setting/view_medical_collage', $this->data );
        } else {
            $res_flag = $this->Mod_setting->save_collage_list( $this->authEmail );
            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'setting/add_med_collage' );
        }
    }

    function edit_med_collage_list()
    {
        $this->data['form_action'] = "edit";
        $auto_id = $this->uri->segment( 3 );
        $get_details = $this->Mod_setting->get_med_collage_details( $auto_id );
        $this->data['res'] = $get_details;
//        echo '<pre>';
//        print_r($this->data['res']);
//        exit;
        $get_list = $this->Mod_setting->get_collages_list();
        $this->data['record'] = $get_list;


        $this->load->view( 'setting/view_medical_collage', $this->data );
    }

    function update_med_collage()
    {
        $auto_id = $this->input->post( 'hidden_auto_id', TRUE );
        if ( !empty( $auto_id ) ) {
            $this->form_validation->set_rules( 'collage_name', 'Collage Name', 'trim|required' );
            if ( $this->form_validation->run() == FALSE ) {
                $this->data['form_action'] = "add";
                $this->load->view( 'setting/view_medical_collage', $this->data );
            } else {
                $res_flag = $this->Mod_setting->update_med_collage_info( $auto_id, $this->authEmail );

                if ( !empty( $res_flag ) ) {
                    $this->session->set_flashdata( 'flashOK', 'Data update successfully' );
                } else {
                    $this->session->set_flashdata( 'flashError', 'Failed update data' );
                }
                redirect( 'setting/add_med_collage' );
            }
        } else {
            redirect( 'setting/edit_med_collage_list/' . $auto_id );
        }
    }


    function ajax_get_faculty_by_course()
    {
        $course_id = $this->input->post( 'course_id' );
        $result = $this->Mod_setting->get_faculty_by_course_id( $course_id );
        $options = "<option value=''>Choose</option>";
        if ( $result ) {
            foreach ( $result as $res ) {
                $options .= "<option value='" . $res->id . "'>{$res->faculty_name}</option>";
            }
        }
        echo $options;
    }

    function ajax_get_course_by_faculty_id()
    {
        $faculty_code = $this->input->post( 'faculty_code' );
        $course_code = $this->input->post( 'course_code' );
        $result_batch = $this->Mod_setting->get_batch_by_faculty_id( $faculty_code, $course_code );
        $result_sub = $this->Mod_setting->get_subject_by_faculty_id( $faculty_code, $course_code );
//        echo '<pre>';
//        print_r($course_id);
//        exit;

        $options = array();
        $options['batch'] = "<option value=''>Choose</option>";
        if ( $result_batch ) {

            foreach ( $result_batch as $res ) {
                $options['batch'] .= "<option value='" . $res->batch_code . "'>{$res->subject}</option>";
            }
        }
        $options['subject'] = "<option value=''>Choose</option>";
        if ( $result_sub ) {

            foreach ( $result_sub as $res ) {
                $options['subject'] .= "<option value='" . $res->id . "'>{$res->subject}</option>";
            }
        }

        echo json_encode( $options );
    }


    function ajax_get_course_by_faculty_id_suject_topic()
    {
        $faculty_code = $this->input->post( 'faculty_code' );
        $course_code = $this->input->post( 'course_code' );
        //echo $course_code;
        $result_topic = $this->Mod_setting->get_topic_by_faculty_id( $faculty_code, $course_code );
        $result_sub = $this->Mod_setting->get_subject_by_faculty_id( $faculty_code, $course_code );

        $options = array();
        $options['topic'] = "<option value=''>Choose</option>";
        if ( $result_topic ) {

            foreach ( $result_topic as $res ) {
                $options['topic'] .= "<option value='" . $res->id . "'>{$res->class_topic_name}</option>";
            }
        }
        $options['subject'] = "<option value=''>Choose</option>";
        if ( $result_sub ) {

            foreach ( $result_sub as $res ) {
                $options['subject'] .= "<option value='" . $res->id . "'>{$res->subject}</option>";
            }
        }

        echo json_encode( $options );
    }

    function ajax_get_batch_topic()
    {
        $faculty_code = $this->input->post( 'faculty_code' );
        $course_code = $this->input->post( 'course_code' );
        //echo $course_code;
        $result_topic = $this->Mod_setting->get_topic_by_faculty_id( $faculty_code, $course_code );
        $result_batch = $this->Mod_setting->get_batch_by_faculty_id( $faculty_code, $course_code );
        $result_sub = $this->Mod_setting->get_subject_by_faculty_id( $faculty_code, $course_code );

        $options = array();
        $options['topic'] = "<option value=''>Choose</option>";
        if ( $result_topic ) {

            foreach ( $result_topic as $res ) {
                $options['topic'] .= "<option value='" . $res->id . "'>{$res->class_topic_name}</option>";
            }
        }
        $options['batch'] = "<option value=''>Choose</option>";
        if ( $result_batch ) {

            foreach ( $result_batch as $res ) {
                $options['batch'] .= "<option value='" . $res->batch_code . "'>{$res->subject}</option>";
            }
        }
        $options['subject'] = "<option value=''>Choose</option>";
        if ( $result_sub ) {

            foreach ( $result_sub as $res ) {
                $options['subject'] .= "<option value='" . $res->id . "'>{$res->subject}</option>";
            }
        }

        echo json_encode( $options );
    }

    function ajax_get_course_by_service_pack_fee()
    {
        $ser_pack_id = $this->input->post( 'ser_pack_id', TRUE );
        $course_code = $this->input->post( 'course_code', TRUE );
        $admi_type = $this->input->post( 'admi_type', TRUE );
        $amount = $this->Mod_admission->get_ser_pack_amount( $ser_pack_id, $course_code, $admi_type );
        echo $amount;
    }

    function ajax_get_course_by_institute()
    {
        $institute_id = $this->input->post( 'institute_id', TRUE );
        $result = $this->Mod_setting->get_course_by_institute( $institute_id );
        $options = "<option value=''>Choose</option>";
        if ( $result ) {
            foreach ( $result as $res ) {
                $options .= "<option value='" . $res->id . "'>{$res->course_name}</option>";
            }
        }
        echo $options;
    }


    function ajax_get_subjects_by_faculty()
    {
        $faculty_id = $this->input->post( 'faculty_id' );
        $result = $this->Mod_setting->get_subjects_by_faculty_code( $faculty_id );
        $options = "<option value=''>Choose</option>";
        if ( $result ) {
            foreach ( $result as $res ) {
                $options .= "<option value='" . $res->id . "'>{$res->subject}</option>";
            }
        }
        echo $options;
    }


    function exam_category()
    {
        $this->data['form_action'] = "add";
        $get_list = $this->Mod_setting->get_exam_category_list();
        $this->data['record'] = $get_list;

        $this->load->view( 'setting/view_exam_category', $this->data );
    }

    function save_exam_category_list()
    {
        $this->form_validation->set_rules( 'exam_category_name', 'Exam Category Name', 'trim|required' );
        $this->form_validation->set_rules( 'cost_bdt', 'Cost BDT', 'trim|required|numeric' );
        $this->form_validation->set_rules( 'cost_usd', 'Cost USD', 'trim|required|numeric' );
        $this->form_validation->set_rules( 'sl', 'SL', 'trim|required|numeric' );
        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $get_list = $this->Mod_setting->get_exam_category_list();
            $this->data['record'] = $get_list;
            $this->load->view( 'setting/view_exam_category', $this->data );
        } else {
            $res_flag = $this->Mod_setting->save_exam_category_list( $this->authEmail );
            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'setting/exam_category' );
        }
    }


    function edit_exam_list()
    {
        $this->data['form_action'] = "edit";
        $auto_id = $this->uri->segment( 3 );
        $get_details = $this->Mod_setting->get_exam_category_details( $auto_id );
        $this->data['res'] = $get_details;
        // echo "<pre>";
        // print_r($this->data['res']);
        // exit();

        $get_list = $this->Mod_setting->get_exam_category_list();

        $this->data['record'] = $get_list;

        $this->load->view( 'setting/view_exam_category', $this->data );
    }


    function update_exam_category_list()
    {
        $auto_id = $this->input->post( 'hidden_auto_id', TRUE );
        if ( !empty( $auto_id ) ) {
            $this->form_validation->set_rules( 'exam_category_name', 'Exam Category Name', 'trim|required' );
            $this->form_validation->set_rules( 'cost_bdt', 'Cost BDT', 'trim|required|numeric' );
            $this->form_validation->set_rules( 'cost_usd', 'Cost USD', 'trim|required|numeric' );
            $this->form_validation->set_rules( 'sl', 'SL', 'trim|required|numeric' );
            if ( $this->form_validation->run() == FALSE ) {
                $this->data['form_action'] = "Edit";
                $this->load->view( 'setting/view_exam_category', $this->data );
            } else {
                $res_flag = $this->Mod_setting->update_exam_category_info( $auto_id, $this->authEmail );

                if ( !empty( $res_flag ) ) {
                    $this->session->set_flashdata( 'flashOK', 'Data update successfully' );
                } else {
                    $this->session->set_flashdata( 'flashError', 'Failed update data' );
                }
                redirect( 'setting/exam_category' );
            }
        } else {
            redirect( 'setting/edit_exam_list/' . $auto_id );
        }
    }

    function exam_news()
    {
        array_push( $this->data['breadcrumb'], "News/Events List" );
        $row = 0;
        $temp_record_postion = $this->uri->segment( 3 );

        if ( !empty ( $temp_record_postion ) ) {
            $row = $temp_record_postion;
        } else {
            $this->session->unset_userdata( 'sql_where_session' );
        }
        $config = config_item( 'pagination' );
        $config['base_url'] = site_url( 'setting/exam_news' );
        $config['total_rows'] = $this->Mod_setting->count_exam_news_records();
        $config['per_page'] = $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $this->pagination->initialize( $config );
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
        $this->data['links'] = $this->pagination->create_links();

        $get_list = $this->Mod_setting->get_news_events_list( $this->record_per_page, $row );
        $this->data['record'] = $get_list;
        $this->load->view( 'setting/view_news_event', $this->data );
    }

    function add_exam_news()
    {
        array_push( $this->data['breadcrumb'], "ADD NEWS/EVENTS" );
        $this->data['form_action'] = "add";
        $this->load->view( 'setting/view_news_event_add', $this->data );
    }

    function save_news_events()
    {
        $this->form_validation->set_rules( 'news_title', 'News Title', 'trim|required' );
        $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );


        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'setting/view_news_event_add', $this->data );
        } else {
            $res_flag = $this->Mod_setting->save_news_info( $this->authEmail );

            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'News/Event added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'setting/exam_news' );
        }
    }

    function edit_exam_news( $id )
    {
        array_push( $this->data['breadcrumb'], "Edit NEWS/EVENTS" );
        $this->data['form_action'] = "edit";
        $this->data['id'] = $id;
        $this->data['record'] = $this->Mod_common->get_row_data_by_id( 'oe_news', $id );
        $this->load->view( 'setting/view_news_event_add', $this->data );
    }

    function update_news_events($id)
    {
        $this->form_validation->set_rules( 'news_title', 'News Title', 'trim|required' );
        $this->form_validation->set_rules( 'status', 'Status', 'trim|required' );


        if ( $this->form_validation->run() == FALSE ) {
            $this->edit_exam_news($id);
        } else {
            $res_flag = $this->Mod_setting->update_news_info( $id, $this->authEmail );

            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'News/Event Updated successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'setting/exam_news' );
        }
    }

    function exam_instruction()
    {
        $get_list = $this->Mod_setting->get_exam_instruction_list();
        $this->data['record'] = $get_list;
        $this->load->view( 'setting/view_exam_instruction', $this->data );
    }

    function exam_instruction_create()
    {
        if ( !$this->input->post() ) {
            $this->data['form_action'] = "add";
            $get_list = $this->Mod_setting->get_exam_instruction_list();
            $this->data['record'] = $get_list;
            $this->load->view( 'setting/view_exam_instruction_add', $this->data );
        } else {
            $this->form_validation->set_rules( 'instruction', 'Instruction', 'required' );
            if ( $this->form_validation->run() ) {
                $status = $this->Mod_setting->save_exam_instruction();
                if ( $status ) {
                    $this->session->set_flashdata( 'flashOK', 'Exam Instruction Saved Successfully!' );
                    redirect( 'setting/exam_instruction' );
                } else {
                    $this->session->set_flashdata( 'flashError', 'Sorry! Exam Instruction Cannot be Saved.' );
                }
            } else {
                $this->session->set_flashdata( 'flashError', validation_errors( '', '' ) );
            }
            redirect( 'setting/exam_instruction_create' );
        }
    }

    function exam_instruction_edit( $id )
    {
        if ( !$this->input->post() ) {
            $this->data['form_action'] = "edit";
            $this->data['record'] = $this->Mod_common->get_row_data_by_id( 'oe_exam_instruction', $id );
            $this->load->view( 'setting/view_exam_instruction_add', $this->data );
        } else {
            $this->form_validation->set_rules( 'instruction', 'Instruction', 'required' );
            if ( $this->form_validation->run() ) {
                $status = $this->Mod_setting->update_exam_instruction( $id );
                if ( $status ) {
                    $this->session->set_flashdata( 'flashOK', 'Exam Instruction Updated Successfully!' );
                    redirect( 'setting/exam_instruction' );
                } else {
                    $this->session->set_flashdata( 'flashError', 'Sorry! Exam Instruction Cannot be Updated.' );
                }
            } else {
                $this->session->set_flashdata( 'flashError', validation_errors( '', '' ) );
            }
            redirect( "setting/exam_instruction_edit/$id" );
        }
    }


    function get_subject_list()
    {
        $faculty_id = $this->input->post( 'faculty_id' );
        $result = $this->Mod_setting->get_subjects_by_faculty_code( $faculty_id );
        $options = "<option value=''>Choose</option>";
        if ( $result ) {
            foreach ( $result as $res ) {
                $options .= "<option value='" . $res->id . "'>{$res->subject}</option>";
            }
        }
        echo $options;
    }


}
