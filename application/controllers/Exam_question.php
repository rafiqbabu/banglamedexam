<?php

/**
 * Class Admission
 * @property Mod_setting       $Mod_setting
 * @property Mod_admission     $Mod_admission
 * @property Mod_common        $Mod_common
 * @property Mod_file_upload   $Mod_file_upload
 * @property common_lib        $common_lib
 * @property Mod_examquestions $Mod_examquestions
 * @property Mod_examtopics    $Mod_examtopics
 */
class Exam_question extends My_Controller
{
    
    private $record_per_page  = 15;
    private $record_num_links = 5;

//    private $data = '';
    
    public function __construct()
    {
        parent::__construct();
    
        $this->data['module_name'] = "Exam Question";
        $this->load->model( 'Mod_common' );
        $this->load->model( 'Mod_examtopics' );
        $this->load->model( 'Mod_examquestions' );
        $this->load->library( 'pagination' );
        $this->load->helper( 'date' );
        $this->load->helper( 'utility' );
//        $this->data['session_list'] = $this->Mod_common->get_session_list();
        
        $this->data['breadcrumb']       = array($this->panel_name, $this->data['module_name']);
        $this->data['status_array']     = $this->common_lib->get_status_array();
        $this->data['answer_array']     = $this->common_lib->get_answer_array();
        $this->data['mcq_answer_array'] = $this->common_lib->get_mcq_answer_array();
        
    }
    
    function add_examquestion()
    {
        array_push( $this->data['breadcrumb'], 'Add SBA Question' );
        $this->data['form_action']   = "add";
        $this->data['chapter_lists'] = $this->Mod_examtopics->get_chapter_lists();
        //echo '<pre>';
        //print_r($this->data['chapter_lists']);exit();     
        $this->load->view( 'sba_exam_questions/view_add_exam_question', $this->data );
    }
    
    function save_question()
    {
        $this->form_validation->set_rules( 'question_name', 'Question', 'trim|required' );
        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'sba_exam_questions/view_add_exam_question', $this->data );
        } else {
            $res_flag = $this->Mod_examquestions->save_question_list( $this->authEmail );
            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'exam_question/add_examquestion' );
        }
    }
    
    function examquestion_list()
    {
        array_push( $this->data['breadcrumb'], 'SBA Question List' );
        $row                 = 0;
        $temp_record_postion = $this->uri->segment( 3 );
    
        if ( !empty ( $temp_record_postion ) ) {
            $row = $temp_record_postion;
        } else {
            $this->session->unset_userdata( 'sql_where_session' );
        }
    
        $config               = config_item( 'pagination' );
        $config['base_url']   = base_url() . 'exam_question/examquestion_list';
        $config['total_rows'] = $this->Mod_examquestions->count_records();
        $config['per_page']   = $this->record_per_page;
        $config['num_links']  = $this->record_num_links;
        $this->pagination->initialize( $config );
        
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $this->Mod_examquestions->count_records();
        $this->data['links']      = $this->pagination->create_links();
        
        $this->data['chapter_list'] = $this->Mod_examtopics->get_chapter_dropdown();
        $this->data['rec']          = $this->Mod_examquestions->get_records_list( $this->record_per_page, $row );
        $this->load->view( 'sba_exam_questions/view_exam_question_list', $this->data );
    }
    
    function topic_questions( $type, $topic_id )
    {
        //array_push($this->data['breadcrumb'], 'Teachers List');
//        $topic_id = $this->uri->segment( 3 );
        $temp_record_postion   = $this->uri->segment( 5 );
        $row                   = $temp_record_postion ? $temp_record_postion : 0;
        $this->data['type']    = $type == 2 ? 'MCQ' : 'SBA';
        $config                = config_item( 'pagination' );
        $config['base_url']    = site_url( "exam_question/topic_questions/$type/$topic_id" );
        $config['total_rows']  = $this->Mod_examquestions->count_topic_questions_list( $topic_id, $type );
        $config['per_page']    = $this->record_per_page;
        $config['num_links']   = $this->record_num_links;
        $config['uri_segment'] = 5;
        $this->pagination->initialize( $config );
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
        $this->data['links']      = $this->pagination->create_links();
        $this->data['topic']      = $this->Mod_common->get_row_data_by_id( 'oe_topics', $topic_id );
        $this->data['rec']        = $this->Mod_examquestions->get_topic_questions_list( $topic_id, $type, $this->record_per_page, $row );
//        die( json_encode( $this->data['rec'] ) );
        $this->load->view( 'exam/view_examquestion_list', $this->data );
    }
    
    function edit()
    {
        array_push( $this->data['breadcrumb'], 'Edit SBA Question' );
        $this->data['form_action'] = "edit";
        $auto_id                   = $this->uri->segment( 3 );
    
        $get_details                 = $this->Mod_examquestions->get_exam_details( $auto_id );
        $this->data['chapter_lists'] = $this->Mod_examtopics->get_chapter_lists( $auto_id );
        $this->data['chapters']      = $this->Mod_examtopics->get_selected_chapter_lists( $auto_id );
        $this->data['topics']        = $this->Mod_examtopics->get_selected_topics_lists( $auto_id );
        $master_ref_id               = $get_details->id;
        $this->data['results']       = $this->Mod_examquestions->get_option_list( $master_ref_id );
        
        $this->data['res'] = $get_details;
    
        $this->load->view( 'sba_exam_questions/view_edit_exam_question', $this->data );
    }
    
    function show()
    {
        array_push( $this->data['breadcrumb'], 'SBA Question Details' );
        $auto_id = $this->uri->segment( 3 );
    
        $get_details                 = $this->Mod_examquestions->get_exam_details( $auto_id );
        $this->data['chapter_lists'] = $this->Mod_examtopics->get_chapter_lists( $auto_id );
        $this->data['chapters']      = $this->Mod_examtopics->get_selected_chapter_lists( $auto_id );
        $this->data['topics']        = $this->Mod_examtopics->get_selected_topics_lists( $auto_id );
        $master_ref_id               = $get_details->id;
        $this->data['results']       = $this->Mod_examquestions->get_option_list( $master_ref_id );
        $this->data['res']           = $get_details;
    
        $this->load->view( 'sba_exam_questions/view_exam_question_details', $this->data );
    }
    
    function show_mcq()
    {
        array_push( $this->data['breadcrumb'], 'MCQ Question Details' );
        $auto_id = $this->uri->segment( 3 );
    
        $get_details                 = $this->Mod_examquestions->get_exam_details( $auto_id );
        $this->data['chapter_lists'] = $this->Mod_examtopics->get_chapter_lists( $auto_id );
        $this->data['chapters']      = $this->Mod_examtopics->get_selected_chapter_lists( $auto_id );
        $this->data['topics']        = $this->Mod_examtopics->get_selected_topics_lists( $auto_id );
        $master_ref_id               = $get_details->id;
        $this->data['results']       = $this->Mod_examquestions->get_option_list( $master_ref_id );
        $this->data['res']           = $get_details;
    
        $this->load->view( 'mcq_exam_questions/view_exam_question_details', $this->data );
    }
    
    function update_sba_question()
    {
        $id = $this->input->post( 'update_id' );
    
        $this->form_validation->set_rules( 'question_name', 'Question', 'trim|required' );
        if ( $this->form_validation->run() == FALSE ) {
            $this->data['form_action'] = "add";
            $this->load->view( 'sba_exam_questions/view_add_exam_question', $this->data );
        } else {
            $res_flag = $this->Mod_examquestions->update_question_list( $id, $this->authEmail );
            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data updated successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'exam_question/examquestion_list' );
        }
    }
    
    /*mcq exam question*/
    
    function add_mcq_examquestion()
    {
        array_push( $this->data['breadcrumb'], 'Add MCQ Question' );
        $this->data['chapter_lists'] = $this->Mod_examtopics->get_chapter_lists();
        $this->load->view( 'mcq_exam_questions/view_add_mcq_exam_question', $this->data );
    }
    
    function save_mcq_examquestion()
    {
        $this->form_validation->set_rules( 'question_name', 'Question', 'trim|required' );
        if ( $this->form_validation->run() == FALSE ) {
        
            $this->load->view( 'mcq_exam_questions/view_add_mcq_exam_question', $this->data );
        } else {
            $res_flag = $this->Mod_examquestions->save_mcq_exam_question_list( $this->authEmail );
            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'exam_question/add_mcq_examquestion' );
        }
    }
    
    function mcq_examquestion_list()
    {
        array_push( $this->data['breadcrumb'], 'MCQ Question List' );
        $row                 = 0;
        $temp_record_postion = $this->uri->segment( 3 );
    
        if ( !empty ( $temp_record_postion ) ) {
            $row = $temp_record_postion;
        } else {
            $this->session->unset_userdata( 'sql_where_session' );
        }
    
        $config               = config_item( 'pagination' );
        $config['base_url']   = base_url() . 'exam_question/mcq_examquestion_list';
        $config['total_rows'] = $this->Mod_examquestions->count_mcq_examquestion_list();
        $config['per_page']   = $this->record_per_page;
        $config['num_links']  = $this->record_num_links;
        $this->pagination->initialize( $config );
        
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
        $this->data['links']      = $this->pagination->create_links();
        
        $this->data['chapter_list'] = $this->Mod_examtopics->get_chapter_dropdown();
        $this->data['rec']          = $this->Mod_examquestions->get_mcq_examquestion_list( $this->record_per_page, $row );
//        echo '<pre>';
//        print_r($this->data['rec']); exit;
        $this->load->view( 'mcq_exam_questions/view_mcq_examquestion_list', $this->data );
    }
    
    function question_pic()
    {
        $this->data['title'] = "Upload Picture.";
        $this->load->view( 'mcq_exam_questions/view_picture', $this->data );
    }
    
    function print_questions( $type )
    {
        $this->data['chapter_list'] = $this->Mod_examtopics->get_chapter_dropdown();
        $this->data['questions']    = $this->Mod_examquestions->get_questions( $type );
//        die(json_encode($this->data['questions']));
        $this->load->view( 'mcq_exam_questions/view_question', $this->data );
    }
    
    function edit_mcq_question()
    {
        array_push( $this->data['breadcrumb'], 'Edit MCQ Question' );
        $this->data['form_action'] = "edit";
        $auto_id                   = $this->uri->segment( 3 );
    
        $get_details                 = $this->Mod_examquestions->get_exam_details( $auto_id );
        $this->data['chapters']      = $this->Mod_examtopics->get_selected_chapter_lists( $auto_id );
        $this->data['chapter_lists'] = $this->Mod_examtopics->get_chapter_lists();
        $this->data['topics']        = $this->Mod_examtopics->get_selected_topics_lists( $auto_id );
        $master_ref_id               = $get_details->id;
        $this->data['results']       = $this->Mod_examquestions->get_mcq_option_list( $master_ref_id );
        
        
        $this->data['res'] = $get_details;
    
        $this->load->view( 'mcq_exam_questions/view_edit_mcq_exam_question', $this->data );
    }
    
    
    function update_mcq_examquestion()
    {
        $id = $this->input->post( 'update_id' );
        $this->form_validation->set_rules( 'question_name', 'Question', 'trim|required' );
        if ( $this->form_validation->run() == FALSE ) {
        
            $this->load->view( 'mcq_exam_questions/view_edit_mcq_exam_question', $this->data );
        } else {
            $res_flag = $this->Mod_examquestions->update_mcq_exam_question_list( $id, $this->authEmail );
            if ( !empty( $res_flag ) ) {
                $this->session->set_flashdata( 'flashOK', 'Data added successfully' );
            } else {
                $this->session->set_flashdata( 'flashError', 'Failed to add data' );
            }
            redirect( 'exam_question/mcq_examquestion_list' );
        }
    }
    
    /*End mcq exam question*/
    
}
