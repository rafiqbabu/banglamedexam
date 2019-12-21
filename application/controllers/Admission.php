<?php

/**
 * Class Admission
 * @property Mod_setting $Mod_setting
 * @property Mod_admission $Mod_admission
 * @property Mod_common $Mod_common
 * @property Mod_file_upload $Mod_file_upload
 * @property common_lib $common_lib
 */
class Admission extends My_Controller {

    private $record_per_page = 15;
    private $record_num_links = 5;

//    private $data = '';

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->is_admin()) {
            redirect('dashboard');
        }

        $this->data['module_name'] = "Admssion";
        $this->load->model('Mod_setting');
        $this->load->model('Mod_file_upload');
        $this->load->model('Mod_admission');
        $this->load->model('Mod_common');
        $this->load->library('pagination');
        $this->load->helper('date');
//        $this->data['session_list'] = $this->Mod_common->get_session_list();
//        $this->data['division_list'] = $this->Mod_common->get_division_list();
//        $this->data['mai_district_list'] = $this->Mod_common->get_district_list_div();
//        $this->data['mai_upazilla_list'] = $this->Mod_common->get_upazila_list_dist();
//        $this->data['institute_list'] = $this->Mod_setting->get_institue_list_array();
//        $this->data['collage_list'] = $this->Mod_setting->get_collage_list_array();
//        $this->data['course_list'] = $this->Mod_setting->get_course_list_array();
//        $this->data['faculty_list'] = $this->Mod_setting->get_faculty_list_array();
//        $this->data['batch_list'] = $this->Mod_setting->get_batch_list_array();
//        $this->data['batch_list_for_profile'] = $this->Mod_setting->get_batch_list_array_for_profile();
//        $this->data['subject_list'] = $this->Mod_setting->get_subject_list_array();
//        $this->data['session_list'] = $this->Mod_setting->get_session_list_array();
//        $this->data['stu_type_list'] = $this->common_lib->get_student_type_list_array();
//        $this->data['ssc_exam_array'] = $this->common_lib->get_ssc_exam_array();
//        $this->data['hsc_exam_array'] = $this->common_lib->get_hsc_exam_array();
//        $this->data['mbbs_exam_array'] = $this->common_lib->get_mbbs_exam_array();
//        $this->data['fc_exam_array'] = $this->common_lib->get_fcps_exam_array();
//        $this->data['md_exam_array'] = $this->common_lib->get_mdentrance_exam_array();
//        $this->data['year_array'] = $this->common_lib->get_year_array();
//        $this->data['current_fut_year'] = $this->common_lib->get_current_future_year();
//        $this->data['hsc_result_array'] = $this->common_lib->get_ssc_hsc_result_array();
//        $this->data['group'] = $this->common_lib->get_group_array();
//        $this->data['blood_group'] = $this->common_lib->get_blood_group_array();
//        $this->data['collage_type'] = $this->common_lib->get_collage_type_array();
//        $this->data['answer_type'] = $this->Mod_setting->get_answer_type_array();
//        $this->data['edu_board'] = $this->common_lib->edu_board();
//        $this->data['admi_type'] = $this->common_lib->admission_type();
//        $this->data['pay_status'] = $this->common_lib->payment_status_array();
//        $this->data['service_package'] = $this->Mod_setting->get_service_package_list_array();

        $this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
    }

    function index() {
        array_push($this->data['breadcrumb'], 'Form GENESIS');
        $this->data['form_action'] = "add";
        $this->load->view('admission/view_add_admission', $this->data);
    }

    function save() {

        $this->form_validation->set_rules('institute', 'Institute Name', 'trim|required');
        $this->form_validation->set_rules('year', 'year', 'trim|required');
        $this->form_validation->set_rules('course_code', 'Course', 'trim|required');
        $this->form_validation->set_rules('faculty_code', 'Faculty', 'trim');
        $this->form_validation->set_rules('batch_code', 'Batch', 'trim|required');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('service_pack_id', 'service pack', 'trim|required');
        $this->form_validation->set_rules('admi_type', 'Admission type', 'trim|required');
        $this->form_validation->set_rules('session', 'session', 'trim|required');
        $this->form_validation->set_rules('bmdc_no', 'BMDC NO', 'trim|required');
        $this->form_validation->set_rules('medical_col', 'Medical collage', 'trim|required');
        $this->form_validation->set_rules('doc_name', 'Doctor Name', 'trim|required');
        $this->form_validation->set_rules('blood_gro', 'Blood Group', 'trim|required');
        $this->form_validation->set_rules('father_name', 'Father Name', 'trim|required');
        $this->form_validation->set_rules('mother_name', 'Mother Name', 'trim|required');

        $this->form_validation->set_rules('phone', 'phone No', 'trim|required|max_length[11]');
        //$this->form_validation->set_rules('mail_address', 'Address', 'trim|required');
        //$this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->data['form_action'] = "add";
            $this->load->view('admission/view_add_admission', $this->data);
        } else {

            if($this->input->post('readmission')){
                 $res_flag = $this->Mod_admission->readmission_genesis();
            }else{
                $res_flag = $this->Mod_admission->save_file_data();
            }
            if ($res_flag['success']) {
                $this->session->set_flashdata('flashOK', 'Data added successfully');
            } else {
                $this->session->set_flashdata('flashError', $res_flag['msg']);
            }
            redirect('admission');
        }
    }

    function ajax_get_faculty_by_course() {
        $course_id = $this->input->post('course_id');
        $result = $this->Mod_setting->get_faculty_by_course_id($course_id);
        $options = "<option value=''>Select</option>";
        if ($result) {
            foreach ($result as $res) {
                $options .= "<option value='" . $res->id . "'>{$res->faculty_name}</option>";
            }
        }

        echo $options;
    }

    function ajax_get_course_by_faculty_id() {
        $faculty_id = $this->input->post('faculty_id');
        $course_id = $this->input->post('course_id');
        $result = $this->Mod_setting->get_subject_by_faculty_id($faculty_id,$course_id);
//        echo '<pre>';
//        print_r($result);
//        exit;
        $options = "<option value=''>Select</option>";
        if ($result) {

            foreach ($result as $res) {
                $options .= "<option value='" . $res->id . "'>{$res->subject}</option>";
            }
        }

        echo $options;
    }

    function get_district_by_division() {
        $division_id = $this->input->post('division_id');
        
        $result = $this->Mod_admission->get_district_by_division_val($division_id);
        $options = "<option value=''>Select</option>";
        if ($result) {
            foreach ($result as $res) {
                $options .= "<option value='" . $res->DISTRICT_ID . "'>{$res->DISTRICT_NAME}</option>";
            }
        }
        echo $options;
    }

    function get_district_by_division2() {
        $division_id = $this->input->post('division_id2');

        $result = $this->Mod_admission->get_district_by_division_val2($division_id);
        $options = "<option value=''>Select</option>";
        if ($result) {
            foreach ($result as $res) {
                $options .= "<option value='" . $res->DISTRICT_ID . "'>{$res->DISTRICT_NAME}</option>";
            }
        }
        echo $options;
        //echo json_encode($division_id);
    }

    function get_thana_by_district() {
        $district_id = $this->input->post('district_id');

        $result = $this->Mod_admission->get_thana_by_district_val($district_id);
        $options = "<option value=''>Select</option>";
        if ($result) {
            foreach ($result as $res) {
                $options .= "<option value='" . $res->THANA_ID . "'>{$res->THANA_NAME}</option>";
            }
        }
        echo $options;
    }

    function get_thana_by_district2() {
        $district_id = $this->input->post('district_id2');

        $result = $this->Mod_admission->get_thana_by_district_val2($district_id);
        $options = "<option value=''>Select</option>";
        if ($result) {
            foreach ($result as $res) {
                $options .= "<option value='" . $res->THANA_ID . "'>{$res->THANA_NAME}</option>";
            }
        }
        echo $options;
        //echo json_encode($district_id);
    }



    function doc_list(){

        array_push($this->data['breadcrumb'], 'ADMISSION LIST');

        $row = 0;
        $temp_record_postion = $this->uri->segment(3);

        if (!empty ($temp_record_postion)) {
            $row = $temp_record_postion;
        } else {
            $this->session->unset_userdata('sql_where_session');
        }
        $config = $this->config->item('pagination');
        $config['base_url'] = base_url() . 'admission/doc_list';
        $config['total_rows'] = $this->Mod_admission->count_admmission_list();
        $config['per_page'] = $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
//        $config['full_tag_open'] = '<p>';
//        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);

        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
        $this->data['links'] = $this->pagination->create_links();

        $this->data['rec'] = $this->Mod_admission->get_admission_list($this->record_per_page, $row);
        //$this->data['rec'] = $this->Mod_admission->get_doctor_list();
        $this->load->view('admission/view_admission_list',$this->data);
    }

    function paging()
    {
        $row = 0;
        $temp_record_postion = $this->uri->segment(3);

        if (!empty ($temp_record_postion)) {
            $row = $temp_record_postion;
        }

        $config['base_url'] = base_url() . 'admission/paging';
        $config['total_rows'] = $this->Mod_admission->count_admmission_list();
        $config['per_page'] = $this->record_per_page;
        $config['num_links'] = $this->record_num_links;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);

        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $this->Mod_admission->count_admmission_list();
        $this->data['links'] = $this->pagination->create_links();

        $this->data['rec'] = $this->Mod_admission->get_admission_list($this->record_per_page, $row);
        $this->load->view('admission/view_admission_list', $this->data);
    }

    function profile(){
        array_push($this->data['breadcrumb'], 'Doctor Profile');
        $profile_id = $this->uri->segment(3);
        $this->data['record'] = $this->Mod_admission->get_doctor_profile_info($profile_id);

        $this->data['edu_record'] = $this->Mod_admission->get_doctor_education_info($profile_id);
        $this->data['reference'] = $this->Mod_admission->get_doctor_ref_info($profile_id);
        //echo print_r($this->data['reference']);exit;
        $this->load->view('admission/view_doctor_profile',$this->data);
    }

    function outlier(){
        array_push($this->data['breadcrumb'], 'Form OUTLIER');
        $this->data['form_action'] = "add";
        $this->load->view('admission/view_add_outlier_admission',$this->data);
    }

    function save_outlier(){
        $this->form_validation->set_rules('institute', 'Institute Name', 'trim|required');
        $this->form_validation->set_rules('year', 'year', 'trim|required');
        $this->form_validation->set_rules('course_code', 'Course', 'trim|required');
        $this->form_validation->set_rules('faculty_code', 'Faculty', 'trim');
        $this->form_validation->set_rules('batch_code', 'Batch', 'trim|required');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('service_pack_id', 'service pack', 'trim|required');
        $this->form_validation->set_rules('admi_type', 'Admission type', 'trim|required');

        $this->form_validation->set_rules('session', 'session', 'trim|required');
        $this->form_validation->set_rules('medical_col', 'Medical collage', 'trim|required');
        $this->form_validation->set_rules('bmdc_no', 'BMDC NO', 'trim|required');

        $this->form_validation->set_rules('doc_name', 'Doctor Name', 'trim|required');
        $this->form_validation->set_rules('blood_gro', 'Blood Group', 'trim|required');
        $this->form_validation->set_rules('father_name', 'Father Name', 'trim|required');
        $this->form_validation->set_rules('mother_name', 'Mother Name', 'trim|required');

        $this->form_validation->set_rules('phone', 'phone No', 'trim|required');
        //$this->form_validation->set_rules('mail_address', 'Address', 'trim|required');
        //$this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->data['form_action'] = "add";
            $this->load->view('admission/view_add_outlier_admission', $this->data);
        } else {

            if($this->input->post('readmission')){

                 $res_flag = $this->Mod_admission->readmission_outlier();
            }else{
                $res_flag = $this->Mod_admission->save_outlier_data();
            }
            if ($res_flag['success']) {
                $this->session->set_flashdata('flashOK', 'Data added successfully');
            } else {
                $this->session->set_flashdata('flashError', $res_flag['msg']);
            }
            redirect('admission/outlier');
        }
    }



    function print_profile(){
        $profile_id = $this->uri->segment(3);
        $this->data['record'] = $this->Mod_admission->get_doctor_profile_info($profile_id);
        $this->data['edu_record'] = $this->Mod_admission->get_doctor_education_info($profile_id);
        $this->data['reference'] = $this->Mod_admission->get_doctor_ref_info($profile_id);
        $doctor_reg_no = $this->data['record']->reg_no;
        $this->data['payment_info'] = $this->Mod_admission->get_payment_info_doctor($doctor_reg_no);
        //echo print_r($this->data['reference']);exit;
        $this->load->view('admission/view_doctor_profile_print',$this->data);
    }



     public function institute_roll_no(){
         array_push($this->data['breadcrumb'], 'Institute Roll No');

        if($this->input->post())
        {
            $this->data['rec'] = $this->Mod_admission->get_admission_list_for_settiong_serarch();
        }
        $this->load->view('admission/view_admission_list_search',$this->data);
    }

    public function save_institute_roll_number(){
        $this->form_validation->set_rules('ids', 'ID', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admission/view_admission_list_search', $this->data);
        } else {
            $res_flag = $this->Mod_admission->save_doc_ins_roll_no();
            if ($res_flag['success']) {
                $this->session->set_flashdata('flashOK', 'Data Updated successfully!');
            } else {
                $this->session->set_flashdata('flashError', $res_flag['msg']);
            }
            redirect('admission/institute_roll_no');
        }
    }

    public function edit(){
        $this->data['form_action'] = "edit";
        $admission_id = $this->uri->segment(3);
        $this->data['res'] = $this->Mod_admission->get_doctor_data($admission_id);
        $this->data['edu_record'] = $this->Mod_admission->get_doctor_education_info($admission_id);
        $this->data['reference'] = $this->Mod_admission->get_doctor_ref_info($admission_id);
        $this->data['batch_list'] = $this->Mod_setting->get_batch_list_array($this->data['res']->course_code);
        //echo $this->data['res']->reg_type;exit;
        if($this->data['res']->reg_type == 'outlier')
        {
            array_push($this->data['breadcrumb'], 'Edit Form OUTLIER');
            $this->load->view('admission/view_add_outlier_admission',  $this->data);
        }else{
            array_push($this->data['breadcrumb'], 'Edit Form GENESIS');
            $this->load->view('admission/view_add_admission',  $this->data);
        }
    }


    public function readmission(){
        $this->data['form_action'] = "readmission";
        $admission_id = $this->uri->segment(3);
        $this->data['res']=$this->Mod_admission->get_doctor_data($admission_id);
        $this->data['edu_record'] = $this->Mod_admission->get_doctor_education_info($admission_id);
        $this->data['reference'] = $this->Mod_admission->get_doctor_ref_info($admission_id);
        $this->data['batch_list'] = $this->Mod_setting->get_batch_list_array($this->data['res']->course_code);
        //echo $this->data['res']->reg_type;exit;
        if($this->data['res']->reg_type == 'outlier')
        {
            array_push($this->data['breadcrumb'], 'Readmission Form OUTLIER');
            $this->load->view('admission/view_add_outlier_admission',  $this->data);
        }else{
            array_push($this->data['breadcrumb'], 'Readmission Form GENESIS');
            $this->load->view('admission/view_add_admission',  $this->data);
        }
    }



    public function update_admission(){

        $auto_id = $this->input->post('auto_id',TRUE);
        $master_table_auto_id = $this->input->post('master_table_auto_id',TRUE);
        $this->form_validation->set_rules('institute', 'Institute Name', 'trim|required');
        $this->form_validation->set_rules('year', 'year', 'trim|required');
        $this->form_validation->set_rules('course_code', 'Course', 'trim|required');
        $this->form_validation->set_rules('faculty_code', 'Faculty', 'trim');
        $this->form_validation->set_rules('batch_code', 'Batch', 'trim|required');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('service_pack_id', 'service pack', 'trim|required');
        $this->form_validation->set_rules('admi_type', 'Admission type', 'trim|required');
        $this->form_validation->set_rules('session', 'session', 'trim|required');
        $this->form_validation->set_rules('medical_col', 'Medical collage', 'trim|required');
        $this->form_validation->set_rules('bmdc_no', 'BMDC NO', 'trim|required');

        $this->form_validation->set_rules('doc_name', 'Doctor Name', 'trim|required');
        $this->form_validation->set_rules('blood_gro', 'Blood Group', 'trim|required');
        $this->form_validation->set_rules('father_name', 'Father Name', 'trim|required');
        $this->form_validation->set_rules('mother_name', 'Mother Name', 'trim|required');

        $this->form_validation->set_rules('phone', 'phone No', 'trim|required|max_length[11]');
        //$this->form_validation->set_rules('mail_address', 'Address', 'trim|required');
        //$this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->data['form_action'] = "add";
            $this->load->view('admission/view_add_admission', $this->data);
        } else {

            $res_flag = $this->Mod_admission->update_admission_data($auto_id,$master_table_auto_id);

            if ($res_flag['success']) {
                $this->session->set_flashdata('flashOK', 'Data update successfully');
            } else {
                $this->session->set_flashdata('flashError', $res_flag['msg']);
            }
            redirect('admission/doc_list');
        }
    }


    public function update_outlier(){

        $auto_id = $this->input->post('auto_id',TRUE);
        $master_table_auto_id = $this->input->post('master_table_auto_id',TRUE);

        $this->form_validation->set_rules('institute', 'Institute Name', 'trim|required');
        $this->form_validation->set_rules('year', 'year', 'trim|required');
        $this->form_validation->set_rules('course_code', 'Course', 'trim|required');
        $this->form_validation->set_rules('faculty_code', 'Faculty', 'trim');
        $this->form_validation->set_rules('batch_code', 'Batch', 'trim|required');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('service_pack_id', 'service pack', 'trim|required');
        $this->form_validation->set_rules('admi_type', 'Admission type', 'trim|required');

        $this->form_validation->set_rules('session', 'session', 'trim|required');
        $this->form_validation->set_rules('medical_col', 'Medical collage', 'trim|required');
        $this->form_validation->set_rules('bmdc_no', 'BMDC NO', 'trim|required');

        $this->form_validation->set_rules('doc_name', 'Doctor Name', 'trim|required');
        $this->form_validation->set_rules('blood_gro', 'Blood Group', 'trim|required');
        $this->form_validation->set_rules('father_name', 'Father Name', 'trim|required');
        $this->form_validation->set_rules('mother_name', 'Mother Name', 'trim|required');

        $this->form_validation->set_rules('phone', 'phone No', 'trim|required');
        //$this->form_validation->set_rules('mail_address', 'Address', 'trim|required');
        //$this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->data['form_action'] = "add";
            $this->load->view('admission/view_add_outlier_admission', $this->data);
        } else {

            $res_flag = $this->Mod_admission->update_outlier_data($auto_id,$master_table_auto_id);

            if ($res_flag['success']) {
                $this->session->set_flashdata('flashOK', 'Update Data successfully');
            } else {
                $this->session->set_flashdata('flashError', $res_flag['msg']);
            }
            redirect('admission/doc_list');
        }
    }

    public function add_reg_no()
    {
        array_push($this->data['breadcrumb'], 'Add Registration No');

        $id = $this->uri->segment(3);
        $reg_no = $this->input->post('reg_no', true);
        $username = $this->input->post('username', true);

        $this->data['id'] = $id;
        $this->data['doctor'] = $this->Mod_admission->get_doctor_profile_info($id);
        if($this->input->post())
        {
            $this->form_validation->set_rules('reg_no', 'Registration No', 'numeric'); //|is_unique[sif_admission.reg_no]

            if($this->form_validation->run()){
                $res_duplicate_doc_reg_no = $this->Mod_admission->check_duplicate_doc_reg_no($reg_no);

                $reg_flag = "";
                $bmdc_flag = "";
                $pass_flag = "";

                if(empty($res_duplicate_doc_reg_no)){
                    $reg_flag  = $this->Mod_admission->save_reg_no($id);
                }
                
                $res_duplicate_bmdc_no = $this->Mod_admission->check_duplicate_doc_reg($username);

                if(empty($res_duplicate_bmdc_no)){
                    $bmdc_flag  = $this->Mod_admission->save_bmdc_no($id);
                }
                
                $pass_flag  = $this->Mod_admission->save_password($id);

                if(!empty($reg_flag) or !empty($bmdc_flag) or !empty($pass_flag)){
                    $this->session->set_flashdata('flashOK', 'Information has been updated!');
                }else{
                    $this->session->set_flashdata('flashError', 'Information Cannot be updated');
                }

                redirect('admission/doc_list');
            }
        }
        $this->load->view('admission/view_add_reg_no',$this->data);
    }


}
