<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_admission
 *
 * @author iPLUS DATA
 * @property common_lib $common_lib
 */
class Mod_admission extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function save_file_data()
    {
        //echo "<pre>";
        $return = array('success' => FALSE);
        $year = $this->input->post('year', TRUE);
        $session = $this->input->post('session', TRUE);
        $course = $this->input->post('course_code', TRUE);
        $faculty = $this->input->post('faculty_code', TRUE);
        $batch = $this->input->post('batch_code', TRUE);
        $ser_pack_id = $this->input->post('service_pack_id', TRUE);
        $password = random_string('alnum', 8);

        //$reg_no = ''; //$this->get_doc_reg_no($year, $session, $course, $batch); //$faculty,
        
        ######### NEW ADD #############
        $reg_no = "";
        $reg_no = $this->input->post('reg_no', TRUE);
        if(!empty($reg_no)){
            $reg_no = substr($year, -2);
            $reg_no .= $this->input->post('reg_no', TRUE);  
        }
        
        ########### END ###############
       
        $bmdc_no = $this->input->post('bmdc_no', TRUE);
        $admi_type = $this->input->post('admi_type');
        $duplicate_flag = $this->check_duplicate_doc_reg($bmdc_no);
        $data_master = array('registrtion_no' => $reg_no, 'user_name' => $this->input->post('bmdc_no', TRUE), 'password' => $password, 'bmdc_no' => $this->input->post('bmdc_no', TRUE), 'doc_name' => $this->input->post('doc_name', TRUE), 'father_name' => $this->input->post('father_name', TRUE), 'mother_name' => $this->input->post('mother_name', TRUE), 'phone' => $this->input->post('phone', TRUE), 'email' => $this->input->post('email', TRUE),);

        $flag = $photo_flag = FALSE;
        $return['msg'] = '';
        $photo_name = 'photo_image';
        if ($_FILES[$photo_name]['size'] > 0) {
            $condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
            $photo_tempname = $_FILES[$photo_name]['tmp_name'];
            list($p_width, $p_height) = getimagesize($photo_tempname);

            if ($_FILES[$photo_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height']) {
                $photo = $this->Mod_file_upload->upload_file('photo', 'photo_image', $condition_photo, 'photo_' . $reg_no);

                if ($photo['status']) {
                    $photo_flag = TRUE;
                } else {
                    $return['msg'] .= $photo_flag['msg'];
                }
            } else {
                $return['msg'] .= '<p>Image Size:100Kb Max, width & height(300 X 300 Pixel), only .jpg is allowed to upload</p>';
            }
        }

        if (isset($photo['path'])) {
            $data_master['photo'] = $photo['path'];
        }

        $fee_amount = $this->get_ser_pack_amount($ser_pack_id, $course, $admi_type);
//        echo $fee_amount;exit;
        $final_amount = $fee_amount - $this->input->post('discount_amont');

        $college_id = $this->input->post('medical_col', TRUE);

        $data = array('reg_no' => $reg_no, 'reg_type' => 'genesis', 'user_name' => $this->input->post('bmdc_no', TRUE), 'password' => $password, 'institute' => $this->input->post('institute', TRUE), 'year' => $year, 'course_code' => $course, 'faculty_code' => $faculty, 'batch_code' => $batch, 'subject' => $this->input->post('subject', TRUE), 'service_pack_id' => $ser_pack_id, 'admi_type' => $admi_type, 'session' => $session, 'medical_col' => $college_id, 'collage_type' => $this->get_collage_type($college_id), 'dob' => $this->input->post('dob', TRUE) ? date('Y-m-d', strtotime($this->input->post('dob', TRUE))) : null, 'doc_name' => $this->input->post('doc_name', TRUE), 'blood_gro' => $this->input->post('blood_gro', TRUE), 'father_name' => $this->input->post('father_name', TRUE), 'mother_name' => $this->input->post('mother_name', TRUE), 'n_id' => $this->input->post('n_id', TRUE), 'passport' => $this->input->post('passport', TRUE), 'job_des' => $this->input->post('job_des', TRUE), 'f_id' => $this->input->post('f_id', TRUE), 'bmdc_no' => $this->input->post('bmdc_no', TRUE), 'spouse_name' => $this->input->post('spouse_name', TRUE), 'pouse_mobile' => $this->input->post('pouse_mobile', TRUE), 'answer_type' => $this->input->post('answer_type', TRUE), 'per_divi' => $this->input->post('per_divi', TRUE), 'per_dist' => $this->input->post('per_dist', TRUE), 'per_thana' => $this->input->post('per_thana', TRUE), 'per_address' => $this->input->post('per_address', TRUE), 'mai_divi' => $this->input->post('mai_divi', TRUE), 'mai_dist' => $this->input->post('mai_dist', TRUE), 'mai_thana' => $this->input->post('mai_thana', TRUE), 'mai_address' => $this->input->post('mai_address', TRUE), 'phone' => $this->input->post('phone', TRUE), 'email' => $this->input->post('email', TRUE), 'fee_amount' => $fee_amount, 'photo' => isset($photo['path']) ? $photo['path'] : '', 'final_amount' => $final_amount, 'discount_amont' => $this->input->post('discount_amont', TRUE), 'dis_auth_by' => $this->input->post('dis_auth_by', TRUE), 'status' => '1',);
        $sig_flag = FALSE;

        $sig_name = 'sig_name';
        if ($_FILES[$sig_name]['size'] > 0) {
            $condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
            $photo_tempname = $_FILES[$sig_name]['tmp_name'];
            list($p_width, $p_height) = getimagesize($photo_tempname);
            if ($_FILES[$sig_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height']) {
                $sig = $this->Mod_file_upload->upload_file('sign', 'sig_name', $condition_photo, 'sign_' . $reg_no);

                if ($sig['status']) {
                    $sig_flag = TRUE;
                } else {
                    $return['msg'] .= $sig['msg'];
                }
            } else {
                $return['msg'] .= '<p>Signature Size:50Kb Max, width & height(300 X 80 Pixel), only .jpg is allowed to upload</p>';
            }
        }

        if (isset($sig['path'])) {
            $data['sign'] = $sig['path'];
        }

        if ($photo_flag) {
            if ($duplicate_flag == FALSE) {
                $this->db->insert('sif_doc_master', $data_master);
                $master_table_id = $this->db->insert_id();
            } else {
                $master_table_id = $duplicate_flag;
            }
            $data['master_id'] = $master_table_id;
            $result = $this->db->insert('sif_admission', $data);
            $insert_id = $this->db->insert_id();
            $this->db->insert('sif_admission_transition', $data);

            $exam_name = $this->input->post('exam_name', TRUE);
            $pass_year = $this->input->post('pass_year', TRUE);
            $exam_group = $this->input->post('exam_group', TRUE);
            $exam_board = $this->input->post('exam_board', TRUE);
            $exam_ins = $this->input->post('exam_ins', TRUE);
            $exam_result = $this->input->post('exam_result', TRUE);
            if ($exam_name && $insert_id) {
                foreach ($exam_name as $i => $exam) {

                    if ($exam && $exam_result[$i]) {

                        $exam_data = array('admiss_id' => $insert_id, 'exam_name' => $exam, 'pass_year' => $pass_year[$i], 'exam_group' => isset($exam_group[$i]) ? $exam_group[$i] : '', 'exam_board' => isset($exam_board[$i]) ? $exam_board[$i] : '', 'exam_ins' => $exam_ins[$i], 'exam_result' => $exam_result[$i]);
                        $this->db->insert('sif_edu_qualification', $exam_data);
                    }
                }
            }

            $name = $this->input->post('name', TRUE);
            $designation = $this->input->post('designation', TRUE);
            $mobile = $this->input->post('mobile', TRUE);
            $relation = $this->input->post('relation', TRUE);
            if ($name && $insert_id) {
                foreach ($name as $i => $val) {
                    if ($val) {
                        $ref_data = array('admiss_id' => $insert_id, 'name' => $val, 'designation' => $designation[$i], 'mobile' => $mobile[$i], 'relation' => $relation[$i]);
                        $this->db->insert('sif_reference', $ref_data);
                    }
                }
            }


            if ($result) {
                $return['success'] = TRUE;
            }
        }
        return $return;
    }


    function readmission_genesis()
    {
        $return = array('success' => FALSE);
        $year = $this->input->post('year', TRUE);
        $session = $this->input->post('session', TRUE);
        $course = $this->input->post('course_code', TRUE);
        $faculty = $this->input->post('faculty_code', TRUE);
        $batch = $this->input->post('batch_code', TRUE);
        $ser_pack_id = $this->input->post('service_pack_id', TRUE);
        $password = random_string('alnum', 8);
        $reg_no = $this->get_doc_reg_no($year, $session, $course, $batch); //$faculty
        $bmdc_no = $this->input->post('bmdc_no', TRUE);
        $duplicate_flag = $this->check_duplicate_doc_reg($bmdc_no);
        $profile_id = $this->input->post('readmission');
        $profile_info = $this->get_doctor_profile_info($profile_id);
        //print_r($photo['path']);exit;
        $flag = $photo_flag = FALSE;
        $return['msg'] = '';
        $photo_name = 'photo_image';
        if ($_FILES[$photo_name]['size'] > 0) {
            $condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
            $photo_tempname = $_FILES[$photo_name]['tmp_name'];
            list($p_width, $p_height) = getimagesize($photo_tempname);

            if ($_FILES[$photo_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height']) {
                $photo = $this->Mod_file_upload->upload_file('photo', 'photo_image', $condition_photo, 'photo_' . $reg_no);

                if ($photo['status']) {
                    $photo_flag = TRUE;
                } else {
                    $return['msg'] .= $photo_flag['msg'];
                }
            } else {
                $return['msg'] .= '<p>Image Size:100Kb Max, width & height(300 X 300 Pixel), only .jpg is allowed to upload</p>';
            }
        }
        if (isset($photo['path'])) {
            $data_master['photo'] = $photo['path'];
        }


//        if ($photo_flag && $duplicate_flag == FALSE) {
//            $this->db->insert('sif_doc_master', $data_master);
//            $master_table_id = $this->db->insert_id();
//        } else {
        $master_table_id = $duplicate_flag;
        //   }
        $admi_type = $this->input->post('admi_type');

        $fee_amount = $this->get_ser_pack_amount($ser_pack_id, $course, $admi_type);
        //echo $fee_amount;exit;
        $final_amount = $fee_amount - $this->input->post('discount_amont');

        $college_id = $this->input->post('medical_col', TRUE);

        $data = array('master_id' => $master_table_id, 'reg_no' => $reg_no, 'reg_type' => 'genesis', 'user_name' => $this->input->post('bmdc_no', TRUE), 'password' => $password, 'institute' => $this->input->post('institute', TRUE), 'year' => $year, 'course_code' => $course, 'faculty_code' => $faculty, 'batch_code' => $batch, 'subject' => $this->input->post('subject', TRUE), 'service_pack_id' => $ser_pack_id, 'admi_type' => $admi_type, 'session' => $session, 'medical_col' => $college_id, 'collage_type' => $this->get_collage_type($college_id), 'dob' => $this->input->post('dob', TRUE) ? date('Y-m-d', strtotime($this->input->post('dob', TRUE))) : null, 'doc_name' => $this->input->post('doc_name', TRUE), 'blood_gro' => $this->input->post('blood_gro', TRUE), 'father_name' => $this->input->post('father_name', TRUE), 'mother_name' => $this->input->post('mother_name', TRUE), 'n_id' => $this->input->post('n_id', TRUE), 'passport' => $this->input->post('passport', TRUE), 'job_des' => $this->input->post('job_des', TRUE), 'f_id' => $this->input->post('f_id', TRUE), 'bmdc_no' => $this->input->post('bmdc_no', TRUE), 'spouse_name' => $this->input->post('spouse_name', TRUE), 'pouse_mobile' => $this->input->post('pouse_mobile', TRUE), 'answer_type' => $this->input->post('answer_type', TRUE), 'per_divi' => $this->input->post('per_divi', TRUE), 'per_dist' => $this->input->post('per_dist', TRUE), 'per_thana' => $this->input->post('per_thana', TRUE), 'per_address' => $this->input->post('per_address', TRUE), 'mai_divi' => $this->input->post('mai_divi', TRUE), 'mai_dist' => $this->input->post('mai_dist', TRUE), 'mai_thana' => $this->input->post('mai_thana', TRUE), 'mai_address' => $this->input->post('mai_address', TRUE), 'phone' => $this->input->post('phone', TRUE), 'email' => $this->input->post('email', TRUE), 'fee_amount' => $fee_amount, 'photo' => isset($photo['path']) ? $photo['path'] : $profile_info->photo, 'sign' => isset($photo['path']) ? $photo['path'] : $profile_info->sign, 'final_amount' => $final_amount, 'discount_amont' => $this->input->post('discount_amont', TRUE), 'dis_auth_by' => $this->input->post('dis_auth_by', TRUE), 'status' => '1',);


        $sig_flag = FALSE;

        $sig_name = 'sig_name';
        if ($_FILES[$sig_name]['size'] > 0) {
            $condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
            $photo_tempname = $_FILES[$sig_name]['tmp_name'];
            list($p_width, $p_height) = getimagesize($photo_tempname);

            if ($_FILES[$sig_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height']) {
                $sig = $this->Mod_file_upload->upload_file('sign', 'sig_name', $condition_photo, 'sign_' . $reg_no);

                if ($sig['status']) {
                    $sig_flag = TRUE;
                } else {
                    $return['msg'] .= $sig['msg'];
                }
            } else {
                $return['msg'] .= '<p>Signature Size:50Kb Max, width & height(300 X 80 Pixel), only .jpg is allowed to upload</p>';
            }
        }
        if (isset($sig['path'])) {
            $data['sign'] = $sig['path'];
        }


//        if ($photo_flag && $sig_flag) {
        $result = $this->db->insert('sif_admission', $data);
        $insert_id = $this->db->insert_id();
        $this->db->insert('sif_admission_transition', $data);

        $exam_name = $this->input->post('exam_name', TRUE);
        $pass_year = $this->input->post('pass_year', TRUE);
        $exam_group = $this->input->post('exam_group', TRUE);
        $exam_board = $this->input->post('exam_board', TRUE);
        $exam_ins = $this->input->post('exam_ins', TRUE);
        $exam_result = $this->input->post('exam_result', TRUE);
        if ($exam_name && $insert_id) {
            foreach ($exam_name as $i => $exam) {

                if ($exam && $exam_result[$i]) {

                    $exam_data = array('admiss_id' => $insert_id, 'exam_name' => $exam, 'pass_year' => $pass_year[$i], 'exam_group' => isset($exam_group[$i]) ? $exam_group[$i] : '', 'exam_board' => isset($exam_board[$i]) ? $exam_board[$i] : '', 'exam_ins' => $exam_ins[$i], 'exam_result' => $exam_result[$i]);
                    $this->db->insert('sif_edu_qualification', $exam_data);
                }
            }
        }

        $name = $this->input->post('name', TRUE);
        $designation = $this->input->post('designation', TRUE);
        $mobile = $this->input->post('mobile', TRUE);
        $relation = $this->input->post('relation', TRUE);
        if ($name && $insert_id) {
            foreach ($name as $i => $val) {
                if ($val) {
                    $ref_data = array('admiss_id' => $insert_id, 'name' => $val, 'designation' => $designation[$i], 'mobile' => $mobile[$i], 'relation' => $relation[$i]);
                    $this->db->insert('sif_reference', $ref_data);
                }
            }
        }


        if ($result) {
            $return['success'] = TRUE;
        }
        //}
        return $return;
    }


    function save_outlier_data()
    {
        $return = array('success' => FALSE);
        $year = $this->input->post('year', TRUE);
        $session = $this->input->post('session', TRUE);
        $course = $this->input->post('course_code', TRUE);
        $faculty = $this->input->post('faculty_code', TRUE);
        $batch = $this->input->post('batch_code', TRUE);
        $ser_pack_id = $this->input->post('service_pack_id', TRUE);
        $password = random_string('alnum', 8);

        //$reg_no = ''; //$this->get_doc_reg_no($year, $session, $course, $batch); //$faculty
        
        ######### NEW ADD #############

        $reg_no = "";
        $reg_no = $this->input->post('reg_no', TRUE);
        if(!empty($reg_no)){
            $reg_no = substr($year, -2);
            $reg_no .= $this->input->post('reg_no', TRUE);  
        }

        ########### END ###############


        $bmdc_no = $this->input->post('bmdc_no', TRUE);
        $duplicate_flag = $this->check_duplicate_doc_reg($bmdc_no);
        // echo $reg_no;
        //exit;
        $data_master = array('registrtion_no' => $reg_no, 'user_name' => $this->input->post('bmdc_no', TRUE), 'password' => $password, 'bmdc_no' => $this->input->post('bmdc_no', TRUE), 'doc_name' => $this->input->post('doc_name', TRUE), 'father_name' => $this->input->post('father_name', TRUE), 'mother_name' => $this->input->post('mother_name', TRUE), 'phone' => $this->input->post('phone', TRUE), 'email' => $this->input->post('email', TRUE),);

        $flag = $photo_flag = FALSE;
        $return['msg'] = '';
        $photo_name = 'photo_image';
        if ($_FILES[$photo_name]['size'] > 0) {
            $condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
            $photo_tempname = $_FILES[$photo_name]['tmp_name'];
            list($p_width, $p_height) = getimagesize($photo_tempname);

            if ($_FILES[$photo_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height']) {
                $photo = $this->Mod_file_upload->upload_file('photo', 'photo_image', $condition_photo, 'photo_' . $reg_no);

                if ($photo['status']) {
                    $photo_flag = TRUE;
                } else {
                    $return['msg'] .= $photo_flag['msg'];
                }
            } else {
                $return['msg'] .= '<p>Image Size:100Kb Max, width & height(300 X 300 Pixel), only .jpg is allowed to upload</p>';
            }
        }

        if (isset($photo['path'])) {
            $data_master['photo'] = $photo['path'];
        }

        $admi_type = $this->input->post('admi_type');

        $fee_amount = $this->get_ser_pack_amount($ser_pack_id, $course, $admi_type);
        //echo $fee_amount;exit;
        $final_amount = $fee_amount - $this->input->post('discount_amont');

        $collage_id = $this->input->post('medical_col', TRUE);
        $data = array('reg_no' => $reg_no, 'reg_type' => 'outlier', 'user_name' => $this->input->post('bmdc_no', TRUE), 'password' => $password, 'institute' => $this->input->post('institute', TRUE), 'year' => $year, 'course_code' => $course, 'faculty_code' => $faculty, 'batch_code' => $batch, 'subject' => $this->input->post('subject', TRUE), 'service_pack_id' => $ser_pack_id, 'admi_type' => $this->input->post('admi_type'), 'session' => $session, 'medical_col' => $collage_id, 'collage_type' => $this->get_collage_type($collage_id), 'dob' => $this->input->post('dob', TRUE) ? date('Y-m-d', strtotime($this->input->post('dob', TRUE))) : null, 'doc_name' => $this->input->post('doc_name', TRUE), 'blood_gro' => $this->input->post('blood_gro', TRUE), 'father_name' => $this->input->post('father_name', TRUE), 'mother_name' => $this->input->post('mother_name', TRUE), 'n_id' => $this->input->post('n_id', TRUE), 'passport' => $this->input->post('passport', TRUE), 'job_des' => $this->input->post('job_des', TRUE), 'f_id' => $this->input->post('f_id', TRUE), 'bmdc_no' => $this->input->post('bmdc_no', TRUE), 'spouse_name' => $this->input->post('spouse_name', TRUE), 'pouse_mobile' => $this->input->post('pouse_mobile', TRUE), 'answer_type' => $this->input->post('answer_type', TRUE), 'rcp_reg_no' => $this->input->post('rcp_reg_no', TRUE), 'per_divi' => $this->input->post('per_divi', TRUE), 'per_dist' => $this->input->post('per_dist', TRUE), 'per_thana' => $this->input->post('per_thana', TRUE), 'per_address' => $this->input->post('per_address', TRUE), 'mai_divi' => $this->input->post('mai_divi', TRUE), 'mai_dist' => $this->input->post('mai_dist', TRUE), 'mai_thana' => $this->input->post('mai_thana', TRUE), 'mai_address' => $this->input->post('mai_address', TRUE), 'phone' => $this->input->post('phone', TRUE), 'email' => $this->input->post('email', TRUE), 'fee_amount' => $fee_amount, 'photo' => isset($photo['path']) ? $photo['path'] : '', 'final_amount' => $final_amount, 'discount_amont' => $this->input->post('discount_amont', TRUE), 'dis_auth_by' => $this->input->post('dis_auth_by', TRUE), 'status' => '1',);
        $flag = $sig_flag = FALSE;
        $return['msg'] = '';

        $sig_name = 'sig_name';
        if ($_FILES[$sig_name]['size'] > 0) {
            $condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
            $photo_tempname = $_FILES[$sig_name]['tmp_name'];
            list($p_width, $p_height) = getimagesize($photo_tempname);

            if ($_FILES[$sig_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height']) {
                $sig = $this->Mod_file_upload->upload_file('sign', 'sig_name', $condition_photo, 'sign_' . $reg_no);

                if ($sig['status']) {
                    $sig_flag = TRUE;
                } else {
                    $return['msg'] .= $sig['msg'];
                }
            } else {
                $return['msg'] .= '<p>Signature Size:50Kb Max, width & height(300 X 80 Pixel), only .jpg is allowed to upload</p>';
            }
        }


        if (isset($sig['path'])) {
            $data['sign'] = $sig['path'];
        }

        if ($photo_flag) {

            if ($duplicate_flag == FALSE) {
                $this->db->insert('sif_doc_master', $data_master);
                $master_table_id = $this->db->insert_id();
            } else {
                $master_table_id = $duplicate_flag;
            }
            $data['master_id'] = $master_table_id;
            $result = $this->db->insert('sif_admission', $data);
            $insert_id = $this->db->insert_id();
            $this->db->insert('sif_admission_transition', $data);

            $exam_name = $this->input->post('exam_name', TRUE);
            $pass_year = $this->input->post('pass_year', TRUE);
            $exam_group = $this->input->post('exam_group', TRUE);
            $exam_board = $this->input->post('exam_board', TRUE);
            $exam_ins = $this->input->post('exam_ins', TRUE);
            $exam_result = $this->input->post('exam_result', TRUE);
            if ($exam_name && $insert_id) {
                foreach ($exam_name as $i => $exam) {

                    if ($exam && $exam_result[$i]) {

                        $exam_data = array('admiss_id' => $insert_id, 'exam_name' => $exam, 'pass_year' => $pass_year[$i], 'exam_group' => isset($exam_group[$i]) ? $exam_group[$i] : '', 'exam_board' => isset($exam_board[$i]) ? $exam_board[$i] : '', 'exam_ins' => $exam_ins[$i], 'exam_result' => $exam_result[$i]);
                        $this->db->insert('sif_edu_qualification', $exam_data);
                    }
                }
            }

            $name = $this->input->post('name', TRUE);
            $designation = $this->input->post('designation', TRUE);
            $mobile = $this->input->post('mobile', TRUE);
            $relation = $this->input->post('relation', TRUE);
            if (!empty($name) && $insert_id) {
                foreach ($name as $i => $val) {

                    if (!empty($val)) {
                        $ref_data = array('admiss_id' => $insert_id, 'name' => $val, 'designation' => $designation[$i], 'mobile' => $mobile[$i], 'relation' => $relation[$i]);
                        $this->db->insert('sif_reference', $ref_data);
                    }
                }
            }


            if ($result) {
                $return['success'] = TRUE;
            }
        }
        return $return;
    }

    function readmission_outlier()
    {
        $return = array('success' => FALSE);
        $year = $this->input->post('year', TRUE);
        $session = $this->input->post('session', TRUE);
        $course = $this->input->post('course_code', TRUE);
        $faculty = $this->input->post('faculty_code', TRUE);
        $batch = $this->input->post('batch_code', TRUE);
        $ser_pack_id = $this->input->post('service_pack_id', TRUE);
        $password = random_string('alnum', 8);
        $reg_no = $this->get_doc_reg_no($year, $session, $course, $batch); //$faculty
        $bmdc_no = $this->input->post('bmdc_no', TRUE);
        $duplicate_flag = $this->check_duplicate_doc_reg($bmdc_no);

        $profile_id = $this->input->post('readmission');

        $profile_info = $this->get_doctor_profile_info($profile_id);

        $flag = $photo_flag = FALSE;
        $return['msg'] = '';
        $photo_name = 'photo_image';
        if ($_FILES[$photo_name]['size'] > 0) {
            $condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
            $photo_tempname = $_FILES[$photo_name]['tmp_name'];
            list($p_width, $p_height) = getimagesize($photo_tempname);

            if ($_FILES[$photo_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height']) {
                $photo = $this->Mod_file_upload->upload_file('photo', 'photo_image', $condition_photo, 'photo_' . $reg_no);

                if ($photo['status']) {
                    $photo_flag = TRUE;
                } else {
                    $return['msg'] .= $photo_flag['msg'];
                }
            } else {
                $return['msg'] .= '<p>Image Size:100Kb Max, width & height(300 X 300 Pixel), only .jpg is allowed to upload</p>';
            }
        }

        $master_table_id = $duplicate_flag;
        $admi_type = $this->input->post('admi_type');

        $fee_amount = $this->get_ser_pack_amount($ser_pack_id, $course, $admi_type);
        //echo $fee_amount;exit;
        $final_amount = $fee_amount - $this->input->post('discount_amont');
        $collage_id = $this->input->post('medical_col', TRUE);
        $data = array('master_id' => $master_table_id, 'reg_no' => $reg_no, 'reg_type' => 'outlier', 'user_name' => $this->input->post('bmdc_no', TRUE), 'password' => $password, 'institute' => $this->input->post('institute', TRUE), 'year' => $year, 'course_code' => $course, 'faculty_code' => $faculty, 'batch_code' => $batch, 'subject' => $this->input->post('subject', TRUE), 'service_pack_id' => $ser_pack_id, 'admi_type' => $admi_type, 'session' => $session, 'medical_col' => $collage_id, 'collage_type' => $this->get_collage_type($collage_id), 'dob' => $this->input->post('dob', TRUE) ? date('Y-m-d', strtotime($this->input->post('dob', TRUE))) : null, 'doc_name' => $this->input->post('doc_name', TRUE), 'blood_gro' => $this->input->post('blood_gro', TRUE), 'father_name' => $this->input->post('father_name', TRUE), 'mother_name' => $this->input->post('mother_name', TRUE), 'n_id' => $this->input->post('n_id', TRUE), 'passport' => $this->input->post('passport', TRUE), 'job_des' => $this->input->post('job_des', TRUE), 'f_id' => $this->input->post('f_id', TRUE), 'bmdc_no' => $this->input->post('bmdc_no', TRUE), 'spouse_name' => $this->input->post('spouse_name', TRUE), 'pouse_mobile' => $this->input->post('pouse_mobile', TRUE), 'answer_type' => $this->input->post('answer_type', TRUE), 'rcp_reg_no' => $this->input->post('rcp_reg_no', TRUE), 'per_divi' => $this->input->post('per_divi', TRUE), 'per_dist' => $this->input->post('per_dist', TRUE), 'per_thana' => $this->input->post('per_thana', TRUE), 'per_address' => $this->input->post('per_address', TRUE), 'mai_divi' => $this->input->post('mai_divi', TRUE), 'mai_dist' => $this->input->post('mai_dist', TRUE), 'mai_thana' => $this->input->post('mai_thana', TRUE), 'mai_address' => $this->input->post('mai_address', TRUE), 'phone' => $this->input->post('phone', TRUE), 'email' => $this->input->post('email', TRUE), 'fee_amount' => $fee_amount, 'photo' => isset($photo['path']) ? $photo['path'] : $profile_info->photo, 'sign' => isset($photo['path']) ? $photo['path'] : $profile_info->sign, 'final_amount' => $final_amount, 'discount_amont' => $this->input->post('discount_amont', TRUE), 'dis_auth_by' => $this->input->post('dis_auth_by', TRUE), 'status' => '1',);
        $flag = $sig_flag = FALSE;
        $return['msg'] = '';

        $sig_name = 'sig_name';
        if ($_FILES[$sig_name]['size'] > 0) {
            $condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
            $photo_tempname = $_FILES[$sig_name]['tmp_name'];
            list($p_width, $p_height) = getimagesize($photo_tempname);

            if ($_FILES[$sig_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height']) {
                $sig = $this->Mod_file_upload->upload_file('sign', 'sig_name', $condition_photo, 'sign_' . $reg_no);

                if ($sig['status']) {
                    $sig_flag = TRUE;
                } else {
                    $return['msg'] .= $sig['msg'];
                }
            } else {
                $return['msg'] .= '<p>Signature Size:50Kb Max, width & height(300 X 80 Pixel), only .jpg is allowed to upload</p>';
            }
        }


//        if (isset($sig['path'])) {
//            $data['sign'] = $sig['path'];
//        }


        $result = $this->db->insert('sif_admission', $data);
        $insert_id = $this->db->insert_id();
        $this->db->insert('sif_admission_transition', $data);

        $exam_name = $this->input->post('exam_name', TRUE);
        $pass_year = $this->input->post('pass_year', TRUE);
        $exam_group = $this->input->post('exam_group', TRUE);
        $exam_board = $this->input->post('exam_board', TRUE);
        $exam_ins = $this->input->post('exam_ins', TRUE);
        $exam_result = $this->input->post('exam_result', TRUE);
        if ($exam_name) {
            foreach ($exam_name as $i => $exam) {

                if ($exam && $exam_result[$i]) {

                    $exam_data = array('admiss_id' => $insert_id, 'exam_name' => $exam, 'pass_year' => $pass_year[$i], 'exam_group' => isset($exam_group[$i]) ? $exam_group[$i] : '', 'exam_board' => isset($exam_board[$i]) ? $exam_board[$i] : '', 'exam_ins' => $exam_ins[$i], 'exam_result' => $exam_result[$i]);
                    $this->db->insert('sif_edu_qualification', $exam_data);
                }
            }
        }

        $name = $this->input->post('name', TRUE);
        $designation = $this->input->post('designation', TRUE);
        $mobile = $this->input->post('mobile', TRUE);
        $relation = $this->input->post('relation', TRUE);
        if (!empty($name)) {
            foreach ($name as $i => $val) {

                if (!empty($val)) {
                    $ref_data = array('admiss_id' => $insert_id, 'name' => $val, 'designation' => $designation[$i], 'mobile' => $mobile[$i], 'relation' => $relation[$i]);
                    $this->db->insert('sif_reference', $ref_data);
                }
            }
        }


        if ($result) {
            $return['success'] = TRUE;
        }

        return $return;
    }


    public function get_collage_type($collage_id)
    {
        $this->db->select('collage_type');
        $this->db->where('id', $collage_id);
        $query = $this->db->get('sif_medical_collage');
        if ($query->num_rows() > 0) {
            return $query->row()->collage_type;
        } else {
            return FALSE;
        }
    }

    function get_district_by_division_val($division_id)
    {
        $this->db->select('DISTRICT_ID,DISTRICT_NAME');
        $this->db->where('DIVISION_ID', $division_id);
        $query = $this->db->get('districts');

        if ($query->num_rows() > 0) {
            return $query->result();
        }

        return false;
    }

    function get_district_by_division_val2($division_id)
    {
        $this->db->select('DISTRICT_ID,DISTRICT_NAME');
        $this->db->where('DIVISION_ID', $division_id);
        $query = $this->db->get('districts');

        if ($query->num_rows() > 0) {
            return $query->result();
        }

        return false;
    }

    function get_thana_by_district_val($district_id)
    {
        $this->db->select('THANA_ID,THANA_NAME');
        $this->db->where('DISTRICT_ID', $district_id);
        $query = $this->db->get('thanas');

        if ($query->num_rows() > 0) {
            return $query->result();
        }

        return false;
    }

    function get_thana_by_district_val2($district_id)
    {
        $this->db->select('THANA_ID,THANA_NAME');
        $this->db->where('DISTRICT_ID', $district_id);
        $query = $this->db->get('thanas');

        if ($query->num_rows() > 0) {
            return $query->result();
        }

        return false;
    }

    function get_doctor_list()
    {
        $this->db->select('*');
        $query = $this->db->get('sif_admission');
        if ($query->num_rows() > 0) {
            return $query->result();
        }

        return false;
    }
	
	function get_doctor_profile_info_by_reg($reg_no = null)
    {
        if (!$reg_no) {
            $reg_no = $this->input->post('reg_no', true);
        }
        $this->db->select('*');
        $this->db->where('reg_no', $reg_no);
        $query = $this->db->get('sif_admission');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    function get_doctor_profile_info($profile_id)
    {
        $this->db->select('*');
        $this->db->where('id', $profile_id);
        $query = $this->db->get('sif_admission');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    function get_medical_college_type($profile_id)
    {
        $this->db->select('collage_type');
        $this->db->where('id', $profile_id);
        $query = $this->db->get('sif_admission');
        if ($query->num_rows() > 0) {
            return $query->row()->collage_type;
        } else {
            return FALSE;
        }
    }

    function get_doctor_education_info($profile_id)
    {
        $this->db->select('*');
        $this->db->where('admiss_id', $profile_id);
        $query = $this->db->get('sif_edu_qualification');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function get_doctor_ref_info($profile_id)
    {
        $this->db->select('*');
        $this->db->where('admiss_id', $profile_id);
        $query = $this->db->get('sif_reference');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_doc_reg_no($year, $session, $course, $batch) //$faculty
    {
        $reg_no = substr($year, -2);
//        $reg_no .= $faculty;
        $reg_no .= $session;
        $reg_no .= $course;
        $reg_no .= $batch;

        $reg = $this->get_last_batch_doc_req($year, $session, $course, $batch); //$faculty
        
        if ($reg) {
            $reg_no = intval($reg) + 1;
        } else {
            $reg_no .= '001';
        }

        return $reg_no;
    }

    public function get_last_batch_doc_req($year, $session, $course, $batch) //$faculty
    {
        $reg='';
        $this->db->select('reg_no');
        //$this->db->order_by('id','desc');
        //$this->db->limit('1');
        $this->db->where(array('year' => $year, 'session' => $session, 'course_code' => $course, //                'faculty_code' => $faculty,
            'batch_code' => $batch,));
        
        $this->db->where('reg_no !=',0);
        

        $query = $this->db->get('sif_admission');

        //echo '<br>=='. $this->db->last_query();
        if ($query->num_rows() > 0) {
            
            return $query->last_row()->reg_no;
        }
        return FALSE;
    }

    function count_admmission_list()
    {
        //$read_db = $this->load->database('read', TRUE); /* database conection for read operation */

        $sql_where = "";
        $year = "";
        $session = "";
        $course = "";
        $faculty = "";
        $batch = "";
        $bmdc_no = "";
        $reg_no = "";
        $reg_type = "";
        $from_date_time = "";
        $to_date_time = "";


        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $year = $this->input->post('year', TRUE);
            $session = $this->input->post('session', TRUE);

            $course = $this->input->post('course', TRUE);
            $faculty = $this->input->post('faculty', TRUE);
            $batch = $this->input->post('batch', TRUE);
            $bmdc_no = $this->input->post('bmdc_no', TRUE);
            $reg_no = $this->input->post('reg_no', TRUE);
            $reg_type = $this->input->post('reg_type', TRUE);
            $pay_status = $this->input->post('pay_status', TRUE);
            $doc_name = $this->input->post('doc_name', TRUE);

            $from_date_time = $this->input->post('from_date_time', TRUE);
            //echo '<pre>';
            //print_r($from_date_time);exit;
            //$var = $from_date_time;
            //$date = str_replace('/', '-',$from_date_time);
            //echo date('Y-m-d', strtotime($date));exit;
            $to_date_time = $this->input->post('to_date_time', TRUE);

            $sql_where .= "id != ''";

            if ($pay_status) {
                if ($pay_status == 1) {
                    $sql_where .= " and reg_no != '' and pay_status = 1";
                } elseif ($pay_status == 2) {
                    $sql_where .= " and pay_status = 0";
                }
            }

            if (!empty($year)) {
                $sql_where .= " and year = '$year'";
            }
            if (!empty($session)) {
                $sql_where .= " and session = '$session'";
            }
            if (!empty($course)) {
                $sql_where .= " and course_code = '$course'";
            }
            if (!empty($faculty)) {
                $sql_where .= " and faculty_code = '$faculty'";
            }
            if (!empty($batch)) {
                $sql_where .= " and batch_code = '$batch'";
            }
            if (!empty($bmdc_no)) {
                $sql_where .= " and bmdc_no = '$bmdc_no'";
            }
            if (!empty($reg_no)) {
                $sql_where .= " and reg_no = '$reg_no'";
            }

            if (!empty($reg_type)) {
                $sql_where .= " and reg_type = '$reg_type'";
            }

            if (!empty($doc_name)) {
                $sql_where .= " and doc_name like '%$doc_name%'";
            }

            if (!empty($from_date_time) and !empty($to_date_time)) {
                $final_date_from = $from_date_time . " 00:00:00";
                $final_date_to = $to_date_time . " 23:59:59";
                $sql_where .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
            }

            $this->session->unset_userdata('sql_where_session');
            $this->session->set_userdata('sql_where_session', $sql_where);
        } else {
            $sql_where = $this->session->userdata('sql_where_session');
        }

        if ($sql_where != "") {
            $this->db->where($sql_where);
        }
        //$genesis = 'genesis';
        //$query = $this->db->where('reg_type',$genesis);
        $query = $this->db->select('id');
        $query = $this->db->get('sif_admission');

        return $query->num_rows();
    }

    function get_admission_list($limit = 15, $row = 0)
    {
        //$read_db = $this->load->database('read', TRUE); /* database conection for read operation */

        $sql_where = "";
        $year = "";
        $session = "";
        $course = "";
        $faculty = "";
        $batch = "";
        $bmdc_no = "";
        $reg_no = "";
        $reg_type = "";
        $from_date_time = "";
        $to_date_time = "";


        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $year = $this->input->post('year', TRUE);
            $session = $this->input->post('session', TRUE);
            $course = $this->input->post('course', TRUE);
            $faculty = $this->input->post('faculty', TRUE);
            $batch = $this->input->post('batch', TRUE);
            $bmdc_no = $this->input->post('bmdc_no', TRUE);
            $reg_no = $this->input->post('reg_no', TRUE);
            $reg_type = $this->input->post('reg_type', TRUE);
            $pay_status = $this->input->post('pay_status', TRUE);
            $doc_name = $this->input->post('doc_name', TRUE);


            $from_date_time = $this->input->post('from_date_time', TRUE);
            $to_date_time = $this->input->post('to_date_time', TRUE);

            $sql_where .= "id != ''";

            if ($pay_status) {
                if ($pay_status == 1) {
                    $sql_where .= " and reg_no != '' and pay_status = 1";
                } elseif ($pay_status == 2) {
                    $sql_where .= " and pay_status = 0";
                }
            }

            if (!empty($year)) {
                //echo $year;exit;
                $sql_where .= " and year = '$year'";
            }
            if (!empty($session)) {
                $sql_where .= " and session = '$session'";
            }
            if (!empty($course)) {
                $sql_where .= " and course_code = '$course'";
            }
            if (!empty($faculty)) {
                $sql_where .= " and faculty_code = '$faculty'";
            }
            if (!empty($batch)) {
                $sql_where .= " and batch_code = '$batch'";
            }
            if (!empty($bmdc_no)) {
                $sql_where .= " and bmdc_no = '$bmdc_no'";
            }
            if (!empty($reg_no)) {
                $sql_where .= " and reg_no = '$reg_no'";
            }
            if (!empty($reg_type)) {
                $sql_where .= " and reg_type = '$reg_type'";
            }
            if (!empty($reg_type)) {
                $sql_where .= " and reg_type = '$reg_type'";
            }
            if (!empty($doc_name)) {
                $sql_where .= " and doc_name like '%$doc_name%'";
            }

            if (!empty($from_date_time) and !empty($to_date_time)) {
                $final_date_from = $from_date_time . "13:59:59";
                $final_date_to = $to_date_time . " 23:59:59";
                $sql_where .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
            }

            $this->session->unset_userdata('sql_where_session');
            $this->session->set_userdata('sql_where_session', $sql_where);
        } else {
            $sql_where = $this->session->userdata('sql_where_session');
        }
        if ($sql_where != "") {
            $this->db->where($sql_where);
        }
        // $genesis = 'genesis';
        //$query = $this->db->where('reg_type',$genesis);
        $query = $this->db->order_by("id", 'DESC');
        $query = $this->db->get('sif_admission', $limit, $row);

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }

        return FALSE;
    }

    function get_ser_pack_amount($ser_pack_id, $course_code, $admi_type = "N")
    {

        $this->db->select('id,fee_amount,old_fee_amount');
        $this->db->where('ser_pack_id', $ser_pack_id);
        $this->db->where('course_code', $course_code);
        $query = $this->db->get('sif_fee');

        if ($query->num_rows() > 0) {
            if ($admi_type == 'N') {
                return $query->row()->fee_amount;
            } elseif ($admi_type == 'O') {
                return $query->row()->old_fee_amount;
            } else {
                return 0;
            }
        }

        return false;
    }

    public function check_duplicate_doc_reg($bmdc_no)
    {
        $this->db->select('id');
        $this->db->where('bmdc_no', $bmdc_no);
        $query = $this->db->get('sif_doc_master');
        if ($query->num_rows() > 0) {
            return $query->row()->id;
        }
        return FALSE;
    }

    function get_admission_list_for_settiong_serarch()
    {
        //$read_db = $this->load->database('read', TRUE); /* database conection for read operation */

        $sql_where = "";
        $year = "";
        $session = "";
        $course = "";
        $faculty = "";
        $batch = "";
        $bmdc_no = "";
        $reg_no = "";
        $reg_type = "";
        $from_date_time = "";
        $to_date_time = "";


        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $year = $this->input->post('year', TRUE);
            $session = $this->input->post('session', TRUE);
            $course = $this->input->post('course', TRUE);
            $faculty = $this->input->post('faculty', TRUE);
            $batch = $this->input->post('batch', TRUE);
            $bmdc_no = $this->input->post('bmdc_no', TRUE);
            $reg_no = $this->input->post('reg_no', TRUE);
            $reg_type = $this->input->post('reg_type', TRUE);


            $from_date_time = $this->input->post('from_date_time', TRUE);
            $to_date_time = $this->input->post('to_date_time', TRUE);

            $sql_where .= "id != ''";

            if (!empty($year)) {
                //echo $year;exit;
                $sql_where .= " and year = '$year'";
            }
            if (!empty($session)) {
                $sql_where .= " and session = '$session'";
            }
            if (!empty($course)) {
                $sql_where .= " and course_code = '$course'";
            }
            if (!empty($faculty)) {
                $sql_where .= " and faculty_code = '$faculty'";
            }
            if (!empty($batch)) {
                $sql_where .= " and batch_code = '$batch'";
            }
            if (!empty($bmdc_no)) {
                $sql_where .= " and bmdc_no = '$bmdc_no'";
            }
            if (!empty($reg_no)) {
                $sql_where .= " and reg_no = '$reg_no'";
            }
            if (!empty($reg_type)) {
                $sql_where .= " and reg_type = '$reg_type'";
            }

            if (!empty($from_date_time) and !empty($to_date_time)) {
                $final_date_from = $from_date_time . "13:59:59";
                $final_date_to = $to_date_time . " 23:59:59";
                $sql_where .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
            }

            $this->session->unset_userdata('sql_where_session');
            $this->session->set_userdata('sql_where_session', $sql_where);
        } else {
            $sql_where = $this->session->userdata('sql_where_session');
        }
        if ($sql_where != "") {
            $this->db->where($sql_where);
        }
        // $genesis = 'genesis';
        //$query = $this->db->where('reg_type',$genesis);
        $query = $this->db->order_by("id", 'DESC');
        $query = $this->db->get('sif_admission');

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }

        return FALSE;
    }

    public function save_doc_ins_roll_no()
    {
        $flag = FALSE;
        $ids = $this->input->post('ids', TRUE);
        $marks = $this->input->post('ins_roll_no', TRUE);
        if ($ids && $marks) {
            foreach ($marks as $i => $mark) {
                if ($mark) {
                    $data['ins_roll_no'] = $mark;
                    $this->db->where('id', $ids[$i]);
                    $flag = $this->db->update('sif_admission', $data);
                }
            }
        }
        return $flag;
    }

    public function get_doctor_data($admission_id)
    {
        $this->db->select('*');
        $this->db->where('id', $admission_id);
        $query = $this->db->get('sif_admission');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function reg_changed($new, $old)
    {
        $new = substr($new, 0, 5);
        $old = substr($old, 0, 5);

        if($new == $old) {
            return false;
        }
        return true;
    }

    public function update_admission_data($auto_id, $master_table_auto_id)
    {
        $return = array('success' => FALSE);
        $year = $this->input->post('year', TRUE);
        $session = $this->input->post('session', TRUE);
        $course = $this->input->post('course_code', TRUE);
        $faculty = $this->input->post('faculty_code', TRUE);
        $batch = $this->input->post('batch_code', TRUE);
        $ser_pack_id = $this->input->post('service_pack_id', TRUE);

        //echo $year.">>".$session.">>".$course.">>".$batch;
        $reg_no = $this->get_doc_reg_no($year, $session, $course, $batch);
        
      

        //$faculty,
        //$bmdc_no = $this->input->post('bmdc_no', TRUE);
        //$duplicate_flag = $this->check_duplicate_doc_reg($bmdc_no);
        $data_master = array('user_name' => $this->input->post('bmdc_no', TRUE), 'bmdc_no' => $this->input->post('bmdc_no', TRUE), 'doc_name' => $this->input->post('doc_name', TRUE), 'father_name' => $this->input->post('father_name', TRUE), 'mother_name' => $this->input->post('mother_name', TRUE), 'phone' => $this->input->post('phone', TRUE), 'email' => $this->input->post('email', TRUE),);

        $old = $this->get_doctor_profile_info($auto_id);
        if ($this->reg_changed($reg_no, $old->reg_no)) {

            $data_master['registrtion_no'] = $reg_no;
        }

        $flag = $photo_flag = FALSE;
        $return['msg'] = '';
        $photo_name = 'photo_image';
        if ($_FILES[$photo_name]['size'] > 0) {
            $condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
            $photo_tempname = $_FILES[$photo_name]['tmp_name'];
            list($p_width, $p_height) = getimagesize($photo_tempname);

            if ($_FILES[$photo_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height']) {
                $photo = $this->Mod_file_upload->upload_file('photo', 'photo_image', $condition_photo, 'photo_' . $reg_no);
                if ($photo['status']) {
                    $photo_flag = TRUE;
                } else {
                    $return['msg'] .= $photo_flag['msg'];
                    return $return;
                }
            } else {
                $return['msg'] .= '<p>Image Size:100Kb Max, width & height(300 X 300 Pixel), only .jpg is allowed to upload</p>';
                return $return;
            }

            if (isset($photo['path'])) {
                $data_master['photo'] = $photo['path'];
            }
        }

        $this->db->where('id', $master_table_auto_id);
        $this->db->update('sif_doc_master', $data_master);

        $college_id = $this->input->post('medical_col', TRUE);
        $admi_type = $this->input->post('admi_type');
        $fee_amount = $this->get_ser_pack_amount($ser_pack_id, $course, $admi_type);
        //echo $fee_amount;exit;
        $final_amount = $fee_amount - $this->input->post('discount_amont');

        $data = array('master_id' => $master_table_auto_id, 'reg_type' => 'genesis', 'user_name' => $this->input->post('bmdc_no', TRUE), 'institute' => $this->input->post('institute', TRUE), 'year' => $year, 'course_code' => $course, 'faculty_code' => $faculty, 'batch_code' => $batch, 'subject' => $this->input->post('subject', TRUE), 'service_pack_id' => $ser_pack_id, 'admi_type' => $admi_type, 'session' => $session, 'medical_col' => $college_id, 'collage_type' => $this->get_collage_type($college_id), 'dob' => $this->input->post('dob', TRUE) ? date('Y-m-d', strtotime($this->input->post('dob', TRUE))) : null, 'doc_name' => $this->input->post('doc_name', TRUE), 'blood_gro' => $this->input->post('blood_gro', TRUE), 'father_name' => $this->input->post('father_name', TRUE), 'mother_name' => $this->input->post('mother_name', TRUE), 'n_id' => $this->input->post('n_id', TRUE), 'passport' => $this->input->post('passport', TRUE), 'job_des' => $this->input->post('job_des', TRUE), 'f_id' => $this->input->post('f_id', TRUE), 'bmdc_no' => $this->input->post('bmdc_no', TRUE), 'spouse_name' => $this->input->post('spouse_name', TRUE), 'pouse_mobile' => $this->input->post('pouse_mobile', TRUE), 'answer_type' => $this->input->post('answer_type', TRUE), 'per_divi' => $this->input->post('per_divi', TRUE), 'per_dist' => $this->input->post('per_dist', TRUE), 'per_thana' => $this->input->post('per_thana', TRUE), 'per_address' => $this->input->post('per_address', TRUE), 'mai_divi' => $this->input->post('mai_divi', TRUE), 'mai_dist' => $this->input->post('mai_dist', TRUE), 'mai_thana' => $this->input->post('mai_thana', TRUE), 'mai_address' => $this->input->post('mai_address', TRUE), 'phone' => $this->input->post('phone', TRUE), 'email' => $this->input->post('email', TRUE), 'status' => '1',);

        if ($this->reg_changed($reg_no, $old->reg_no)) {

            $data['reg_no'] = $reg_no;
        }

        if (isset($photo['path'])) {
            $data['photo'] = $photo['path'];
        }
        $sig_flag = FALSE;

        $sig_name = 'sig_name';
        if ($_FILES[$sig_name]['size'] > 0) {
            $condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
            $photo_tempname = $_FILES[$sig_name]['tmp_name'];
            list($p_width, $p_height) = getimagesize($photo_tempname);

            if ($_FILES[$sig_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height']) {
                $sig = $this->Mod_file_upload->upload_file('sign', 'sig_name', $condition_photo, 'sign_' . $reg_no);

                if ($sig['status']) {
                    $sig_flag = TRUE;
                } else {
                    $return['msg'] .= $sig['msg'];
                    return $return;
                }
            } else {
                $return['msg'] .= '<p>Signature Size:50Kb Max, width & height(300 X 80 Pixel), only .jpg is allowed to upload</p>';
                return $return;
            }


            if (isset($sig['path'])) {
                $data['sign'] = $sig['path'];
            }
        }

        $this->db->where('id', $auto_id);
        $this->db->where('master_id', $master_table_auto_id);
        $result = $this->db->update('sif_admission', $data);

        $this->db->insert('sif_admission_transition', $data);

        $exam_name = $this->input->post('exam_name', TRUE);
        $pass_year = $this->input->post('pass_year', TRUE);
        $exam_group = $this->input->post('exam_group', TRUE);
        $exam_board = $this->input->post('exam_board', TRUE);
        $exam_ins = $this->input->post('exam_ins', TRUE);
        $exam_result = $this->input->post('exam_result', TRUE);

        $this->db->where('admiss_id', $auto_id);
        $this->db->delete('sif_edu_qualification');


        if ($exam_name && $auto_id) {

            foreach ($exam_name as $i => $exam) {

                if ($exam && $exam_result[$i]) {

                    $exam_data = array('admiss_id' => $auto_id, 'exam_name' => $exam, 'pass_year' => $pass_year[$i], 'exam_group' => isset($exam_group[$i]) ? $exam_group[$i] : '', 'exam_board' => isset($exam_board[$i]) ? $exam_board[$i] : '', 'exam_ins' => $exam_ins[$i], 'exam_result' => $exam_result[$i]);

                    $this->db->insert('sif_edu_qualification', $exam_data);
                }
            }
        }

        $name = $this->input->post('name', TRUE);
        $designation = $this->input->post('designation', TRUE);
        $mobile = $this->input->post('mobile', TRUE);
        $relation = $this->input->post('relation', TRUE);

        $this->db->where('admiss_id', $auto_id);
        $this->db->delete('sif_reference');

        if ($name && $auto_id) {
            foreach ($name as $i => $val) {
                if ($val) {
                    $ref_data = array('admiss_id' => $auto_id, 'name' => $val, 'designation' => $designation[$i], 'mobile' => $mobile[$i], 'relation' => $relation[$i]);
                    $this->db->insert('sif_reference', $ref_data);
                }
            }
        }


        if ($result) {
            $return['success'] = TRUE;
        }

        return $return;
    }

    public function update_outlier_data($auto_id, $master_table_auto_id)
    {
        $return = array('success' => FALSE);
        $year = $this->input->post('year', TRUE);
        $session = $this->input->post('session', TRUE);
        $course = $this->input->post('course_code', TRUE);
        $faculty = $this->input->post('faculty_code', TRUE);
        $batch = $this->input->post('batch_code', TRUE);
        $ser_pack_id = $this->input->post('service_pack_id', TRUE);
        $password = random_string('alnum', 8);
        $reg_no = $this->get_doc_reg_no($year, $session, $course, $batch); //$faculty,
        $bmdc_no = $this->input->post('bmdc_no', TRUE);

        $admi_type = $this->input->post('admi_type');
        $fee_amount = $this->get_ser_pack_amount($ser_pack_id, $course, $admi_type);


        $data_master = array('user_name' => $this->input->post('bmdc_no', TRUE), 'password' => $password, 'bmdc_no' => $this->input->post('bmdc_no', TRUE), 'doc_name' => $this->input->post('doc_name', TRUE), 'father_name' => $this->input->post('father_name', TRUE), 'mother_name' => $this->input->post('mother_name', TRUE), 'phone' => $this->input->post('phone', TRUE), 'email' => $this->input->post('email', TRUE),);
        $old = $this->get_doctor_profile_info($auto_id);
        if ($this->reg_changed($reg_no, $old->reg_no)) {

            $data_master['registrtion_no'] = $reg_no;
        }
        $flag = $photo_flag = FALSE;
        $return['msg'] = '';
        $photo_name = 'photo_image';
        if ($_FILES[$photo_name]['size'] > 0) {
            $condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
            $photo_tempname = $_FILES[$photo_name]['tmp_name'];
            list($p_width, $p_height) = getimagesize($photo_tempname);

            if ($_FILES[$photo_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height']) {
                $photo = $this->Mod_file_upload->upload_file('photo', 'photo_image', $condition_photo, 'photo_' . $reg_no);

                if ($photo['status']) {
                    $photo_flag = TRUE;
                } else {
                    $return['msg'] .= $photo_flag['msg'];
                    return $return;
                }
            } else {
                $return['msg'] .= '<p>Image Size:100Kb Max, width & height(300 X 300 Pixel), only .jpg is allowed to upload</p>';
                return $return;
            }

            if (isset($photo['path'])) {
                $data_master['photo'] = $photo['path'];
            }
        }


        $this->db->where('id', $master_table_auto_id);
        $this->db->update('sif_doc_master', $data_master);


        $college_id = $this->input->post('medical_col', TRUE);

        $data = array('master_id' => $master_table_auto_id, 'reg_no' => $reg_no, 'reg_type' => 'outlier', 'user_name' => $this->input->post('bmdc_no', TRUE), 'password' => $password, 'institute' => $this->input->post('institute', TRUE), 'year' => $year, 'course_code' => $course, 'faculty_code' => $faculty, 'batch_code' => $batch, 'subject' => $this->input->post('subject', TRUE), 'service_pack_id' => $ser_pack_id, 'admi_type' => $admi_type, 'session' => $session, 'medical_col' => $college_id, 'collage_type' => $this->get_collage_type($college_id), 'doc_name' => $this->input->post('doc_name', TRUE), 'dob' => $this->input->post('dob', TRUE) ? date('Y-m-d', strtotime($this->input->post('dob', TRUE))) : null, 'blood_gro' => $this->input->post('blood_gro', TRUE), 'father_name' => $this->input->post('father_name', TRUE), 'mother_name' => $this->input->post('mother_name', TRUE), 'n_id' => $this->input->post('n_id', TRUE), 'passport' => $this->input->post('passport', TRUE), 'job_des' => $this->input->post('job_des', TRUE), 'f_id' => $this->input->post('f_id', TRUE), 'bmdc_no' => $this->input->post('bmdc_no', TRUE), 'spouse_name' => $this->input->post('spouse_name', TRUE), 'pouse_mobile' => $this->input->post('pouse_mobile', TRUE), 'answer_type' => $this->input->post('answer_type', TRUE), 'rcp_reg_no' => $this->input->post('rcp_reg_no', TRUE), 'per_divi' => $this->input->post('per_divi', TRUE), 'per_dist' => $this->input->post('per_dist', TRUE), 'per_thana' => $this->input->post('per_thana', TRUE), 'per_address' => $this->input->post('per_address', TRUE), 'mai_divi' => $this->input->post('mai_divi', TRUE), 'mai_dist' => $this->input->post('mai_dist', TRUE), 'mai_thana' => $this->input->post('mai_thana', TRUE), 'mai_address' => $this->input->post('mai_address', TRUE), 'phone' => $this->input->post('phone', TRUE), 'email' => $this->input->post('email', TRUE), 'status' => '1',);
        if ($this->reg_changed($reg_no, $old->reg_no)) {
            $data['reg_no'] = $reg_no;
        }

        if (isset($photo['path'])) {
            $data['photo'] = $photo['path'];
        }
        $sig_flag = FALSE;

        $return['msg'] = '';

        $sig_name = 'sig_name';
        if ($_FILES[$sig_name]['size'] > 0) {
            $condition_photo = array('width' => '4000', 'height' => '4000', 'size' => '4096');
            $photo_tempname = $_FILES[$sig_name]['tmp_name'];
            list($p_width, $p_height) = getimagesize($photo_tempname);

            if ($_FILES[$sig_name]['size'] <= 4800000 && $p_width <= $condition_photo['width'] && $p_height <= $condition_photo['height']) {
                $sig = $this->Mod_file_upload->upload_file('sign', 'sig_name', $condition_photo, 'sign_' . $reg_no);

                if ($sig['status']) {
                    $sig_flag = TRUE;
                } else {
                    $return['msg'] .= $sig['msg'];
                    return $return;
                }
            } else {
                $return['msg'] .= '<p>Signature Size:50Kb Max, width & height(300 X 80 Pixel), only .jpg is allowed to upload</p>';
                return $return;
            }

            if (isset($sig['path'])) {
                $data['sign'] = $sig['path'];
            }
        }

        $this->db->where('id', $auto_id);
        $this->db->where('master_id', $master_table_auto_id);
        $result = $this->db->update('sif_admission', $data);

        $this->db->insert('sif_admission_transition', $data);


        $exam_name = $this->input->post('exam_name', TRUE);
        $pass_year = $this->input->post('pass_year', TRUE);
        $exam_group = $this->input->post('exam_group', TRUE);
        $exam_board = $this->input->post('exam_board', TRUE);
        $exam_ins = $this->input->post('exam_ins', TRUE);
        $exam_result = $this->input->post('exam_result', TRUE);

        $this->db->where('admiss_id', $auto_id);
        $this->db->delete('sif_edu_qualification');

        if ($exam_name && $auto_id) {
            foreach ($exam_name as $i => $exam) {
                if ($exam && $exam_result[$i]) {
                    $exam_data = array('admiss_id' => $auto_id, 'exam_name' => $exam, 'pass_year' => $pass_year[$i], 'exam_group' => isset($exam_group[$i]) ? $exam_group[$i] : '', 'exam_board' => isset($exam_board[$i]) ? $exam_board[$i] : '', 'exam_ins' => $exam_ins[$i], 'exam_result' => $exam_result[$i]);
                    $this->db->insert('sif_edu_qualification', $exam_data);
                }
            }
        }

        $name = $this->input->post('name', TRUE);
        $designation = $this->input->post('designation', TRUE);
        $mobile = $this->input->post('mobile', TRUE);
        $relation = $this->input->post('relation', TRUE);

        $this->db->where('admiss_id', $auto_id);
        $this->db->delete('sif_reference');

        if (!empty($name) && $auto_id) {
            foreach ($name as $i => $val) {

                if (!empty($val)) {
                    $ref_data = array('admiss_id' => $auto_id, 'name' => $val, 'designation' => $designation[$i], 'mobile' => $mobile[$i], 'relation' => $relation[$i]);
                    $this->db->insert('sif_reference', $ref_data);
                }
            }
        }

        if ($result) {
            $return['success'] = TRUE;
        }

        return $return;
    }

    public function get_payment_info_doctor($doctor_reg_no)
    {
        $this->db->select_max('date');
        $this->db->select_max('auth_by');
        $this->db->select_sum('amount');
        $this->db->where('doc_reg_no', $doctor_reg_no);
        $query = $this->db->get('sif_doc_payment');
        // print_r($query->result()->amount);exit;
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function save_reg_no($id)
    {
        $reg_no = $this->input->post('reg_no', true);
        $doctor = $this->get_doctor_profile_info($id);
        $data = array();

        if (!empty($reg_no)) {
            $year = '20'.substr($reg_no, 0, 2);
            $session = substr($reg_no, 2, 1);
            $course_code = substr($reg_no, 3, 1);
            $batch_code = substr($reg_no, 4, 1);


            $data['reg_no'] = $reg_no;
            $data['session'] = $session;
            $data['course_code'] = $course_code;
            $data['batch_code'] = $batch_code;
        
            $this->db->trans_start();

            $this->db->where('id', $id)->update('sif_admission', $data);

            $data_master = array('registrtion_no' => $reg_no);
                
            $this->db->where('id', $doctor->master_id)->update('sif_doc_master', $data_master);

            $this->db->trans_complete();

            if ($this->db->trans_status() == true) {
                return true;
            } else {
                $this->db->trans_rollback();
            }
        }
        return false;
    }

    public function save_bmdc_no($id)
    {
        
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $doctor = $this->get_doctor_profile_info($id);
        $data = array();
        
        if ($username) {
            
            //$data['user_name'] = $username;
            $data = array('user_name' => $username,'bmdc_no' => $username);
        
            $this->db->trans_start();
            $this->db->where('id', $id)->update('sif_admission', $data);
            
            $data_master = array('user_name' => $username,'bmdc_no' => $username);

            $this->db->where('id', $doctor->master_id)->update('sif_doc_master', $data_master);
            
            $this->db->trans_complete();
            
            if ($this->db->trans_status() == true) {
                return true;
            } else {
                $this->db->trans_rollback();
            }
        }
        return false;
    }

    public function save_password($id)
    {
        
        $password = $this->input->post('password', true);
        $doctor = $this->get_doctor_profile_info($id);
        $data = array();

        if ($password) {
            $data['password'] = $password;
        
            $this->db->trans_start();
            $this->db->where('id', $id)->update('sif_admission', $data);

            $password = $password ? $password : random_string(8, 'alnum');
            $data_master = array('password' => $password);

            $this->db->where('id', $doctor->master_id)->update('sif_doc_master', $data_master);
            
            $this->db->trans_complete();
            
            if ($this->db->trans_status() == true) {
                return true;
            } else {
                $this->db->trans_rollback();
            }
        }
        return false;
    }

    public function check_reg()
    {
        $reg_no = $this->input->post('reg_no');
        $year = $this->input->post('year');
        $reg_no = substr($year, 2, 2) . $reg_no;
        $query = $this->db->get_where('sif_admission', ['reg_no' => $reg_no]);
        if ($query->num_rows() == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function check_duplicate_doc_reg_no($reg_no)
    {
        $this->db->select('id');
        $this->db->where('reg_no', $reg_no);
        $query = $this->db->get('sif_admission');
        if ($query->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }
}
