







<?php 

/**
 * Class Executive
 * @property Mod_executive $Mod_executive
 */
class Executive extends My_Controller
{

    private $record_per_page = 20;
    private $record_num_links = 5;

//    private $data = '';

    public function __construct()
    {
        parent::__construct();

        $this->data['module_name'] = "Executive / Staff";
        $this->load->library('pagination');
        $this->load->library('common_lib');
        $this->load->model('Mod_teacher');
        $this->load->model('Mod_setting');
        $this->load->model('Mod_common');
        $this->load->model('Mod_admission');
        $this->load->model('Mod_executive');
        $this->load->model('Mod_file_upload');

        $this->data['division_list'] = $this->Mod_common->get_division_list();
        $this->data['mai_district_list'] = $this->Mod_common->get_district_list_div();
        $this->data['mai_upazilla_list'] = $this->Mod_common->get_upazila_list_dist();
        $this->data['sex_array'] = $this->common_lib->get_sex_array(); /* get sex as array */
        $this->data['emp_type'] = $this->common_lib->get_emp_type_array();       
        $this->data['religion_array'] = $this->common_lib->get_religion_array(); /* get Religion as array */
        $this->data['course_list'] = $this->Mod_teacher->get_course_list_array();
        $this->data['faculty_list'] = $this->Mod_teacher->get_faculty_list_array();
        $this->data['subject_list'] = $this->Mod_setting->get_subject_list_array();
        $this->data['ssc_exam_array'] = $this->common_lib->get_ssc_exam_array();
        $this->data['year_array'] = $this->common_lib->get_year_array();
        $this->data['group'] = $this->common_lib->get_group_array();
        $this->data['edu_board'] = $this->common_lib->edu_board();
        $this->data['hsc_exam_array'] = $this->common_lib->get_hsc_exam_array();
        $this->data['mbbs_exam_array'] = $this->common_lib->get_mbbs_exam_array();
        $this->data['bsc_exam'] = $this->common_lib->get_bsc_exam_array();
        $this->data['msc_exam'] = $this->common_lib->get_msc_exam_array();
        $this->data['blood_group'] = $this->common_lib->get_blood_group_array();
        $this->data['collage_list'] = $this->Mod_setting->get_collage_list_array();

        $this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
    }

    function index()
    {
        array_push($this->data['breadcrumb'], 'Add Executive / Staff');
        $this->data['form_action'] = 'add';
        //echo print_r($this->data['faculty_list']);exit;
        $this->load->view('executive/view_add_executive', $this->data);
    }

    /**
     *
     */
    function save()
    {

        $this->form_validation->set_rules('emp_type', 'Employee Type', 'trim|required');
        $this->form_validation->set_rules('name', 'Employee Name', 'trim|required');
        $this->form_validation->set_rules('fath_name', 'Father Name', 'trim|required');
        $this->form_validation->set_rules('mother_name', 'Mother Name', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('religion', 'Religion', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
       
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('teacher/view_add_teacher', $this->data);
        } else {
            $res_flag = $this->Mod_executive->save_data($this->authEmail);
            if (!empty($res_flag)) {
                $this->session->set_flashdata('flashOK', 'Information saved successfully');
            } else {
                $this->session->set_flashdata('flashError', 'Failed to save information');
            }
            redirect('executive');
        }
    }

    function records()
    {
        array_push($this->data['breadcrumb'], 'Executive / Staff List');
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);

        if (!empty ($temp_record_postion)) {
            $row = $temp_record_postion;
        } else {
            $this->session->unset_userdata('sql_where_session');
        }

        $config['base_url'] = base_url() . 'executive/records';
        $config['total_rows'] = $this->Mod_executive->count_records();
        $config['per_page'] = $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);

        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $this->Mod_executive->count_records();
        $this->data['links'] = $this->pagination->create_links();

        $this->data['rec'] = $this->Mod_executive->get_records_list($this->record_per_page, $row);
        //echo '<pre>';
        //print_r($this->data['rec']); exit;
        $this->load->view('executive/view_exe_stuff_list', $this->data);
    }

    function profile()
    {
        array_push($this->data['breadcrumb'], 'Executive / Staff Profile');
        $exe_stu_id = $this->uri->segment(3);
        $get_details = $this->Mod_executive->get_details($exe_stu_id);
        $this->data['edu_record'] = $this->Mod_executive->get_education_record($exe_stu_id);
        $this->data['res'] = $get_details;
        $this->load->view('executive/view_exe_stuff_profile', $this->data);
    }

    function print_profile()
    {
        $exe_stu_id = $this->uri->segment(3);
        $get_details = $this->Mod_executive->get_details($exe_stu_id);
        $this->data['record'] = $get_details;
        $this->data['edu_record'] = $this->Mod_executive->get_education_record($exe_stu_id);
        $this->load->view('executive/view_exe_stuff_profile_print', $this->data);
    }

    function edit()
    {
        array_push($this->data['breadcrumb'], 'Edit Executive / Staff Profile');
        $this->data['form_action'] = 'edit';
        $exe_stu_id = $this->uri->segment(3);
        $get_details = $this->Mod_executive->get_details($exe_stu_id);
        $this->data['edu_record'] = $this->Mod_executive->get_education_record($exe_stu_id);
        //echo '<pre>';
        //print_r($this->data['edu_record']);exit;
        $this->data['res'] = $get_details;
        $this->load->view('executive/view_add_executive', $this->data);
    }

    public function update_executive_stuff(){

        $auto_id = $this->input->post('auto_id',TRUE);

        $this->form_validation->set_rules('emp_type', 'Employee Type', 'trim|required');
        $this->form_validation->set_rules('name', 'Employee Name', 'trim|required');
        $this->form_validation->set_rules('fath_name', 'Father Name', 'trim|required');
        $this->form_validation->set_rules('mother_name', 'Mother Name', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('religion', 'Religion', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');

        

        if ($this->form_validation->run() == FALSE) {
            $this->data['form_action'] = 'add';
            $this->load->view('executive/view_add_executive', $this->data);
        } else {
            $res_flag = $this->Mod_executive->update_data($this->authEmail,$auto_id);
            if (!empty($res_flag)) {
                $this->session->set_flashdata('flashOK', 'Information update successfully');
            } else {
                $this->session->set_flashdata('flashError', 'Failed to update information');
            }
            redirect('executive/records');
        }
    }
}
