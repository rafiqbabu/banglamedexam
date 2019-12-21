<?php

/**
 * Class Notice
 *
 * @property Mod_notice $Mod_notice
 */
class Notice extends My_Controller
{

    private $record_per_page  = 15;
    private $record_num_links = 5;

//    private $data = '';

    public function __construct()
    {
        parent::__construct();

        $this->data['module_name'] = "Notice";
        $this->load->library( 'pagination' );
        $this->load->library( 'common_lib' );
        $this->load->model( 'Mod_notice' );
        $this->load->model( 'Mod_setting' );
        $this->load->library( 'form_validation' ); /* load validation library */
        $this->data['status_array'] = $this->common_lib->get_status_array();
        $this->data['course_list'] = $this->Mod_setting->get_course_list_array();
        $this->data['faculty_list'] = $this->Mod_setting->get_faculty_list_array();
        $this->data['sub_list'] = $this->Mod_setting->get_subject_list_array();
        $this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
        $this->data['institute_list'] = $this->Mod_setting->get_institue_list_array();
        $this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
    }

    function index()
    {
        $row = 0;
        $temp_record_postion = $this->uri->segment( 3 );

        if ( !empty ( $temp_record_postion ) ) {
            $row = $temp_record_postion;
        } else {
            $this->session->unset_userdata( 'sql_where_session' );
        }
        $config = config_item( 'pagination' );
        $config['base_url'] = site_url( 'notice/index' );
        $config['total_rows'] = $this->Mod_notice->count_notice();
        $config['per_page'] = $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $this->pagination->initialize( $config );
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
        $this->data['links'] = $this->pagination->create_links();
        $this->data['notices'] = $this->Mod_notice->get_all_notice( $this->record_per_page, $row );
        $this->load->view( 'notice/view_notice', $this->data );
    }

    function create( $id = NULL )
    {
        $this->data['id'] = $id;
        if ( !$this->input->post() ) {
            $this->data['form_action'] = 'add';
            $this->load->view( 'notice/view_send_mail_doc', $this->data );
        } else {
            $this->form_validation->set_rules( 'title', 'Title', 'trim|required' );
            if ( $this->form_validation->run() ) {
                $this->Mod_notice->save_general_notice();
            }
            redirect( 'notice/create' );
        }
    }

    function edit( $id )
    {
        $notice = $this->Mod_notice->get_notice( $id );
        if ( !$this->input->post() ) {
            $this->data['notice'] = $notice;
            $this->data['form_action'] = 'edit';
            $this->load->view( 'notice/view_send_mail_doc', $this->data );
        } else {
            $this->form_validation->set_rules( 'title', 'Title', 'trim|required' );
            if ( $this->form_validation->run() ) {
                $this->Mod_notice->update_general_notice( $id );
            }
            redirect( "notice/edit/$id" );
        }
    }

    function mail_teacher()
    {
        $this->data['teacher'] = $this->Mod_notice->get_teacher_list_array();
        //var_dump($this->data['teacher']);exit;
        $this->load->view( 'notice/view_send_mail_teacher', $this->data );
    }


    function get_doctor_lists()
    {
        $year = $this->input->post( 'year', TRUE );
        $session_id = $this->input->post( 'session_id', TRUE );
        $course_code = $this->input->post( 'course_code', TRUE );
        $faculty_code = $this->input->post( 'faculty_code', TRUE );
        $batch_code = $this->input->post( 'batch_code', TRUE );
        $all_student = $this->Mod_notice->doctor_list_for_mail( $year, $session_id, $course_code, $faculty_code, $batch_code );

        $options = "<option value=''>Choose</option>";
        if ( $all_student ) {
            foreach ( $all_student as $all ) {
                $options .= "<option value='" . $all->id . "'>{$all->doc_name}</option>";
            }
        }
        echo $options;
    }

    function mail_to_doctor()
    {

        show_error( 'Cannot Send mail from a Local Server', 400 );
        $doctors = $this->input->post( 'doctor' );

        $emails = $this->Mod_notice->get_doctor_email( $doctors );

        $subject = $this->input->post( 'email_sub', TRUE );
        $email_body = $this->input->post( 'mess_age', TRUE );

        $flag = $photo_flag = FALSE;
        $return['msg'] = '';
        $photo_name = 'photo_image';
        if ( $_FILES[$photo_name]['size'] > 0 ) {
            //$condition_photo = array('width' => '300', 'height' => '300', 'size' => '100');
            $photo_tempname = $_FILES[$photo_name]['tmp_name'];
            //list($p_width, $p_height) = getimagesize($photo_tempname);

            if ( $_FILES[$photo_name]['size'] <= 100000 ) {
                $photo = $this->Mod_file_upload->upload_file( '', 'photo_image' );

                if ( $photo['status'] ) {
                    $photo_flag = TRUE;
                } else {
                    $return['msg'] .= $photo_flag['msg'];
                }
            } else {
                $return['msg'] .= '<p>Image Size:100Kb Max, width & height(300 X 300 Pixel), only .jpg is allowed to upload</p>';
            }
        }

        if ( isset( $photo['path'] ) ) {
            $data_master['photo'] = $photo['path'];
        }


        $email_result = $this->Mod_email->send_email( $emails, $subject, $email_body );
        if ( $email_result ) {
            $this->session->set_flashdata( 'emailOK', 'Email Send successfully' );
        } else {
            $this->session->set_flashdata( 'emailError', 'Failed Email' );
        }

    }


    function mail_to_teacher()
    {
        show_error( 'Cannot Send mail from a Local Server', 400 );
        //$email = $this->get_doctor_lists();//$this->input->post('email', TRUE);
        $teacher = $this->input->post( 'teacher', TRUE );
        //print_r($teacher);exit;
        $emails = $this->Mod_notice->get_teacher_email( $teacher );
        //print_r($emails);exit;
        $subject = $this->input->post( 'email_sub', TRUE );
        $email_body = $this->input->post( 'mess_age', TRUE );

        $email_result = $this->Mod_email->send_email( $emails, $subject, $email_body );
        if ( $email_result ) {
            $this->session->set_flashdata( 'emailOK', 'Email Send successfully' );
        } else {
            $this->session->set_flashdata( 'emailError', 'Failed Email' );
        }

    }

    function sms_doctors()
    {

        $this->load->view( 'notice/view_sms_doctors', $this->data );
    }

    function sms_teacher()
    {
        $this->data['teacher'] = $this->Mod_notice->get_teacher_list_array();
        $this->load->view( 'notice/view_sms_teacher', $this->data );
    }

    function sms_to_doctors()
    {
        $doctor_list = $this->input->post( 'doctors', TRUE );
        $phone_no = $this->Mod_notice->get_doctor_phone_no( $doctor_list );
        $message = $this->input->post( 'message', TRUE );
        //print_r($phone_no);exit;
        //$result_sms = $this->Mod_notice->send_sms($phone_no,$message);
//        if ($result_sms) {
//            $this->session->set_flashdata('smsOK', 'SMS Send successfully');
//        } else {
//            $this->session->set_flashdata('smsError', 'Failed SMS');
//        }
    }

    function sms_to_teacher()
    {
        $teacher_list = $this->input->post( 'teacher', TRUE );
        $phone_no = $this->Mod_notice->get_teacher_phone_no( $teacher_list );
        $message = $this->input->post( 'mess_age', TRUE );
//        print_r($phone_no);
//        exit;
        //$result_sms = $this->Mod_notice->send_sms($phone_no,$message);
//        if ($result_sms) {
//            $this->session->set_flashdata('smsOK', 'SMS Send successfully');
//        } else {
//            $this->session->set_flashdata('smsError', 'Failed SMS');
//        }
    }

    public function notice_to_doctor()
    {
        if ( $this->input->post() ) {
            $this->form_validation->set_rules( 'year', 'Year', 'required' );
            $this->form_validation->set_rules( 'session', 'Session', 'required' );
            $this->form_validation->set_rules( 'course_code', 'Course Code', 'required' );
            $this->form_validation->set_rules( 'batch_code', 'Batch Code', 'required' );
            $this->form_validation->set_rules( 'subject', 'Subject', 'required' );
            $this->form_validation->set_rules( 'notice', 'Notice', 'required' );

            if ( $this->form_validation->run() ) {
                $this->Mod_notice->save_notice_to_doctor();
                redirect( 'notice/notice_to_doctor' );
            }
        }
        $this->data['batch_list'] = array();
        $this->data['notices'] = $this->Mod_notice->get_all_std_notice();
        $this->load->view( 'notice/view_send_notice_doc', $this->data );
    }

    public function edit_notice_to_doctor()
    {
        $id = $this->uri->segment( 3 );
        if ( $this->input->post() ) {
            $this->form_validation->set_rules( 'year', 'Year', 'required' );
            $this->form_validation->set_rules( 'session', 'Session', 'required' );
            $this->form_validation->set_rules( 'course_code', 'Course Code', 'required' );
            $this->form_validation->set_rules( 'batch_code', 'Batch Code', 'required' );
            $this->form_validation->set_rules( 'subject', 'Subject', 'required' );
            $this->form_validation->set_rules( 'notice', 'Notice', 'required' );

            if ( $this->form_validation->run() ) {
                $this->Mod_notice->update_notice_to_doctor( $id );
                redirect( 'notice/notice_to_doctor' );
            }
        }

        $this->data['edit_std_notice'] = $this->Mod_notice->get_std_notice( $id );
        $this->data['batch_list'] = $this->Mod_setting->get_batch_list_array( $this->data['edit_std_notice']->course_code );
        $this->data['notices'] = $this->Mod_notice->get_all_std_notice();
        $this->load->view( 'notice/view_send_notice_doc', $this->data );
    }

    public function notice_std_details()
    {
        $id = $this->uri->segment( 3 );
        $this->data['notice'] = $this->Mod_notice->get_std_notice( $id );
        $this->load->view( 'notice/view_std_notice_details', $this->data );
    }

    public function general_notice()
    {
        if ( $this->input->post() ) {
            $this->form_validation->set_rules( 'sent_to', 'Send To', 'trim|required' );

            if ( $this->form_validation->run() ) {
                $this->Mod_notice->save_general_notice();
                redirect( 'notice/general_notice' );
            }
        }
        $this->data['notice_to'] = $this->Mod_common->get_notice_to_array();
        $this->data['notices'] = $this->Mod_notice->get_all_notice();
        $this->load->view( 'notice/view_general_notice', $this->data );
    }

    public function edit_notice()
    {
        $id = $this->uri->segment( 3 );
        if ( $this->input->post() ) {
            $this->form_validation->set_rules( 'sent_to', 'Send To', 'trim|required' );

            if ( $this->form_validation->run() ) {
                $this->Mod_notice->update_general_notice( $id );
                redirect( 'notice/general_notice' );
            }
        }
        $this->data['notice_to'] = $this->Mod_common->get_notice_to_array();
        $this->data['edit_notice'] = $this->Mod_notice->get_notice( $id );
        $this->data['notices'] = $this->Mod_notice->get_all_notice();
        $this->load->view( 'notice/view_general_notice', $this->data );
    }






//    function edit()
//    {
//        $id = $this->uri->segment(3);
//        $this->data['res'] = $this->Mod_teacher->get_details($id);
//        $this->load->view('teacher/view_edit_teacher', $this->data);
//    }
//
//    function update($teacher_id)
//    {
//
//        $this->form_validation->set_rules('teacher_name', 'teacher Name', 'required');
//
//        if ($this->form_validation->run() == FALSE) {
//            $this->data['res'] = $this->Mod_teacher->get_details($teacher_id);
//            $this->load->view('teacher/view_edit_teacher', $this->data);
//        } else {
//            $res_flag = $this->Mod_teacher->update_data($teacher_id);
//            if (!empty($res_flag)) {
//                $this->session->set_flashdata('flashOK', 'Teacher updated successfully!');
//            } else {
//                $this->session->set_flashdata('flashError', 'Failed to update teacher');
//            }
//            redirect('teacher/edit/' . $teacher_id);
//        }
//    }
//
    function record()
    {
        $row = 0;
        $temp_record_postion = $this->uri->segment( 3 );

        if ( !empty ( $temp_record_postion ) ) {
            $row = $temp_record_postion;
        } else {
            $this->session->unset_userdata( 'sql_where_session' );
        }

        $config['base_url'] = base_url() . 'visitor/record';
        $config['total_rows'] = $this->Mod_visitor->count_records();
        $config['per_page'] = $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize( $config );

        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $this->Mod_visitor->count_records();
        $this->data['links'] = $this->pagination->create_links();

        $this->data['rec'] = $this->Mod_visitor->get_records_list( $this->record_per_page, $row );
        //echo '<pre>';
        //print_r($this->data['rec']); exit;
        $this->load->view( 'visitor/view_visitor_list', $this->data );
    }


    public function details($id)
    {
//        $id = $this->uri->segment( 3 );
        $this->data['notice'] = $this->Mod_notice->get_notice( $id );
        $this->load->view( 'notice/view_notice_details', $this->data );
    }


}
