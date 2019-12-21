<?php
/**
 * Created by PhpStorm.
 * User: nahian
 * Date: 12/18/17
 * Time: 6:55 PM
 */

/**
 * Class Applicant
 *
 * @property Mod_applicant $Mod_applicant
 * @property pagination    $pagination
 * @property common_lib    $common_lib
 */
class Report extends My_Controller
{
    private $record_per_page  = 20;
    private $record_num_links = 5;

    public function __construct()
    {
        parent::__construct();
        $this->data['module_name'] = "Reports";
        $this->load->library( 'pagination' );
        $this->load->library( 'common_lib' );
        $this->load->model( 'Mod_applicant' );

        $this->data['pay_status'] = $this->common_lib->get_pay_status();

        $this->data['breadcrumb'] = array($this->panel_name, $this->data['module_name']);
    }

    public function purchased_exams()
    {
        array_push($this->data['breadcrumb'], "Purchased Exam");
        $temp_record_postion = $this->input->get( 'per_page' );
        $row = $temp_record_postion ? $temp_record_postion : 0;

        $config = config_item( 'pagination' );
        $config['base_url'] = current_url();
        $config['total_rows'] = $this->Mod_applicant->count_purchased_exams();
        $config['per_page'] = $this->record_per_page;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $this->pagination->initialize( $config );
        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config['total_rows'];
        $this->data['links'] = $this->pagination->create_links();
        $this->data['records'] = $this->Mod_applicant->get_all_purchased_exams( $this->record_per_page, $row );
        $this->data['for_pdf'] = $this->Mod_applicant->get_for_pdf(); //new
        $this->data['ptype_list'] = $this->common_lib->get_ptype_arrays(); //new
        $this->load->view( 'report/view_purchased_exams', $this->data );
    }

// new
    function pdf_g()
    {
        $html = $_POST['status'];
        $title = "Searched Result";
        $pdf   = new \Mpdf\Mpdf();
        $pdf->SetTitle( $title );
        $pdf->SetHeader( $this->data['company']->name );
        $pdf->SetFooter( 'Medigene IT||Page - {PAGENO}' );
        $pdf->WriteHtml( $html );
        $pdf->Output( "myfile.pdf", 'I' );
    }
    
    public function exam_history()
    {
        array_push($this->data['breadcrumb'], "Exam History");
        $temp_record_postion = $this->input->get( 'per_page' );
        $row = $temp_record_postion ? $temp_record_postion : 0;

        $config = config_item( 'pagination' );
        $config['base_url'] = current_url();
        $config['total_rows'] = $this->Mod_applicant->count_exam_history();
        $config['per_page'] = $this->record_per_page;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $this->pagination->initialize( $config );

        $this->data['exam_categories'] = $this->Mod_common->get_exam_category_list();
        $this->data['applicants']      = $this->Mod_common->get_applicants_list();
		$this->data['exams']           = $this->Mod_common->get_exam_info_list();
//        $this->data['record_pos'] = $row;
        $this->data['total_rows'] = $config ['total_rows'];
        $this->data['links'] = $this->pagination->create_links();
        $this->data['records'] = $this->Mod_applicant->get_all_exam_history( $this->record_per_page, $row );
        $this->load->view( 'report/view_exam_history', $this->data );
    }

    public function question_count()
    {
        array_push($this->data['breadcrumb'], "Question Count");
        $this->data['records'] = $this->Mod_applicant->get_question_count();
        $this->load->view( 'report/view_question_count', $this->data );
    }
}
