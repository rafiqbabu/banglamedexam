<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_schedule
 *
 * @author jnahian
 * @property common_lib $common_lib
 * @property mod_file_upload $mod_file_upload
 */
class Mod_payment extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function save_data()
    {
        $data = array(
            'doc_id' => $this->input->post('doc_id'),
            'doc_reg_no' => $this->input->post('doc_reg_no'),
            'date' => $this->input->post('date'),
            'amount' => $this->input->post('amount'),
            'auth_by' => $this->input->post('auth_by'),
            'mr_no' => $this->input->post('mr_no'),
            'vat_tax' => $this->input->post('vat_tax'),
            'comment' => $this->input->post('comment'),
            'status' => 1,
            'created_by' => AUTH_EMAIL,
        );
        $this->db->trans_start();
        $result = $this->db->insert('sif_doc_payment', $data);
        $this->save_acct_payment();
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
            return $result;
        }
        return FALSE;
    }

    public function save_acct_payment()
    {
        $cus_id = $this->input->post('doc_id');
        $mr_date = $this->input->post('date', TRUE);
        $mr_no = $this->input->post('mr_no', TRUE);
        $mr_type = 'C';
        $comment = $this->input->post('comment', TRUE);
        $vat_tax = $this->input->post('vat_tax');
        $amount = $this->input->post('amount', TRUE);

        $company = $this->Mod_setting->get_general_info();
        $acchead = $this->Mod_common->get_acct_head($company->ah_stu_fee);
        $data = array(
            'MRDT' => $mr_date,
            'MRNO' => $mr_no,
            'MRTYPE' => $mr_type,
            'CUST_ID' => $cus_id,
            'PARTICULARS' => $comment ? $comment : 'Doctors Tuition Fee',
            'AC' => 'Doctors Tuition Fee',
            'ACC_HEAD_CTRLCODE' => $acchead->CTRLCODE,
            'ACC_HEAD_SUBCODE' => $acchead->SUBCODE,
            'AUTHOFF' => $this->input->post('auth_by', TRUE),
            'TOT_AMT' => $amount,
            'CANCEL_FLAG' => 'F',
            'VAT_TAX' => $vat_tax ? $vat_tax : 'N',
        );
        $this->db->trans_start();
        $this->db->insert('acct_mr', $data);
        if ($this->db->affected_rows()) {
            $amr_id = $this->db->insert_id();

            $data_child = array(
                'REF_AMR_ID' => $amr_id,
                'MRNO' => $mr_no,
                'MRDT' => $mr_date,
                'TRTYPE' => $mr_type,
                'ACC_HEAD_CTRLCODE' => $acchead->CTRLCODE,
                'ACC_HEAD_SUBCODE' => $acchead->SUBCODE,
                'AMOUNT' => $amount,
            );

            $this->db->insert('acct_mrchild', $data_child);
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
        return FALSE;
    }

    function save_discount()
    {
        $id = $this->input->post('doc_id');
        $amount = $this->input->post('amount');
        $fee_amt = get_name_by_auto_id('sif_admission', $id, 'fee_amount');
        $data = array(
            'discount_amont' => $amount,
            'dis_auth_by' => $this->input->post('auth_by'),
            'final_amount' => ($fee_amt - $amount),
            'updated_at' => now(),
            'updated_by' => AUTH_EMAIL,
        );

        $this->db->where('id', $id);
        $result = $this->db->update('sif_admission', $data);

        if ($result) {
            return $result;
        }
        return FALSE;
    }


    function count_records()
    {
        $this->db->where('status', '1');
        return $this->db->count_all_results('sif_admission');
    }


    function get_records_list($limit = 50, $row = 0)
    {
        $this->db->select('id,reg_no,doc_name,phone,bmdc_no,fee_amount,discount_amont,dis_auth_by,final_amount');

        if ($this->input->post()) {
            $year = $this->input->post('year', TRUE);
            $session = $this->input->post('session', TRUE);
            $course = $this->input->post('course', TRUE);
            $faculty = $this->input->post('faculty', TRUE);
            $batch = $this->input->post('batch', TRUE);
            $bmdc_no = $this->input->post('bmdc_no', TRUE);
            $reg_no = $this->input->post('reg_no', TRUE);
            $reg_type = $this->input->post('reg_type', TRUE);

            $year ? $this->db->where('year', $year) : '';
            $session ? $this->db->where('session', $session) : '';
            $course ? $this->db->where('course_code', $course) : '';
            $faculty ? $this->db->where('faculty_code', $faculty) : '';
            $batch ? $this->db->where('batch_code', $batch) : '';
            $bmdc_no ? $this->db->where('bmdc_no', $bmdc_no) : '';
            $reg_no ? $this->db->where('reg_no', $reg_no) : '';
            $reg_type ? $this->db->where('reg_type', $reg_type) : '';
        }


        $this->db->where('status', '1');
        $this->db->order_by("reg_no", 'ASC');
        $query = $this->db->get('sif_admission', $limit, $row);

        if ($query->num_rows() > 0) {
            $results = $query->result();

            foreach ($results as $result) {
                $total_payment = $this->get_doc_total_payments($result->id);
                $result->paid = $total_payment->amount;
                $result->last_pay_date = $total_payment->date;
                $result->due = $result->final_amount - $total_payment->amount;
            }
            return $results;
        }
        return FALSE;
    }


    function get_teacher_payment_list($limit = 50, $row = 0)
    {
        $this->db->select('id,teacher_id,tec_name,mobile');

        if ($this->input->post()) {
            $teacher_id = $this->input->post('teacher_id', TRUE);
            
            $teacher_id = $this->Mod_common->get_teacher_id($teacher_id);

            $teacher_id ? $this->db->where('teacher_id', $teacher_id) : '';
        }

        $this->db->where('status', '1');
        $this->db->order_by("id", 'ASC');
        $query = $this->db->get('sif_teacher', $limit, $row);

        if ($query->num_rows() > 0) {
            $results = $query->result();

            foreach ($results as $result) {
                $total_payment = $this->get_teacher_payments($result->teacher_id);
                $result->payments = $total_payment;
//                $result->last_pay_date = $total_payment->date;
//                $result->due = $result->final_amount - $total_payment->amount;
            }
            return $results;
        }
        return FALSE;
    }

    public function get_doc_total_payments($id)
    {
        $this->db->select_max('date');
        $this->db->select_sum('amount');
        $this->db->where('doc_id', $id);
        $this->db->where('status', '1');
        $query = $this->db->get('sif_doc_payment');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

    public function get_teacher_payments($id)
    {
        if($this->input->post()){
            $date_from = $this->input->post('date_from');
            $date_to = $this->input->post('date_to');

            $date_from ? $this->db->where('date >=', $date_from) : '';
            $date_to ? $this->db->where('date <=', $date_to) : '';
        }
        $this->db->where('teacher_id', $id);
        $this->db->where('status', '1');
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get('sif_teacher_payment');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_search_data()
    {
        $data = array();
//        $year = $this->input->post('year', true);
//        $session = $this->input->post('session', true);
//        $course_code = $this->input->post('course_code', true);
//        $faculty_code = $this->input->post('faculty_code', true);
//        $batch_code = $this->input->post('batch_code', true);
//        $year ? $this->db->where("year", $year) : '';
//        $session ? $this->db->where("session", $session) : '';
//        $course_code ? $this->db->where("course_code", $course_code) : '';
//        $faculty_code ? $this->db->where("faculty_code", $faculty_code) : '';
//        $batch_code ? $this->db->where("batch_code", $batch_code) : '';
        $reg_no = $this->input->post('reg_no', TRUE);
        $bmdc_no = $this->input->post('bmdc_no', TRUE);

        $reg_no ? $this->db->where("reg_no", $reg_no) : '';
        $bmdc_no ? $this->db->where("bmdc_no", $bmdc_no) : '';

        $query = $this->db->get('sif_admission');

        if ($query->num_rows() > 0) {
            $data['results'] = $query->row();
            return $data;
        }
        return FALSE;
    }

    public function get_payment_details($doc_id)
    {
        $this->db->where('doc_id', $doc_id);
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get('sif_doc_payment');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return FALSE;
    }

    public function get_teacher_payment_details($teacher_id)
    {
        $this->db->where('teacher_id', $teacher_id);
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get('sif_teacher_payment');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return FALSE;
    }

    public function get_teacher_search_data()
    {
        $data = array();
        $teacher_id = $this->input->post('teacher_id', true);
        $teacher_id ? $this->db->where("teacher_id", $teacher_id) : '';

        $query = $this->db->get('sif_teacher');

        if ($query->num_rows() > 0) {
            $data['results'] = $query->row();
            return $data;
        }
        return FALSE;
    }

    public function save_teacher_payment()
    {
        $teacher_id = $this->input->post('teacher_id', true);
        $pay_for = $this->input->post('pay_for', true);
        $date = $this->input->post('date', true);
        $amount = $this->input->post('amount', true);
        $auth_by = $this->input->post('auth_by', true);
        $note = $this->input->post('note', true);

        $data = array(
            'teacher_id' => $teacher_id,
            'pay_for' => $pay_for,
            'date' => $date,
            'amount' => $amount,
            'auth_by' => $auth_by,
            'note' => $note,
            'created_by' => AUTH_EMAIL,
        );
        $this->db->insert('sif_teacher_payment', $data);
        $ins_id = $this->db->insert_id();
        if ($ins_id) {
            return $ins_id;
        }
        return false;
    }
}

