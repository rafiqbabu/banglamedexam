<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of common_lib
 *
 * @author jnahian
 * Date : 02-March-2014
 */
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );

class Common_lib
{
	private $school_shortcode;

	function __construct()
	{
		$this->obj = &get_instance();

		$this->school_shortcode = 'SMS';
	}

	function generate_image_upload_loc( $image_id )
	{
		$loc = '';
		$img_id = $image_id;
		$formated_num = sprintf( '%09d', $img_id );
		$loc_temp = str_split( $formated_num, 3 );
		$loc = implode( '/', $loc_temp );
		return $loc;
	}

	function admin_user_pass_info()
	{
		$admin_info_array = array(
			'admin@bigm-bd.com' => '123456',
		);
		return $admin_info_array;
	}

	function get_user_age( $birth_date )
	{
		return floor( ( time() - strtotime( $birth_date ) ) / 31556926 );
	}

	function generate_user_permalink( $str )
	{
		setlocale( LC_ALL, 'en_US.UTF8' );
		$clean = iconv( 'UTF-8', 'ASCII//TRANSLIT', $str );
		$clean = preg_replace( "/[^a-zA-Z0-9\/_| -]/", '', $clean );
		$clean = strtolower( trim( $clean, '-' ) );
		$clean = preg_replace( "/[\/_| -]+/", '-', $clean );

		return $clean;
	}


	function get_year_arrays()
	{
		$year_array = array(
			'' => 'Choose',
			'2015' => '2015',
			'2016' => '2016',
			'2017' => '2017',
			'2018' => '2018',
			'2019' => '2019',
			'2020' => '2020',
		);
		return $year_array;
	}

//new2
	function get_session_arrays()
	{
		$session_array = array(
			'' => 'Choose',
			'January' => 'January',
			'July' => 'July',
			'September' => 'September'
			
		);
		return $session_array;
	}

	function get_ptype_arrays()
	{
		$ptype_array = array(
			'' => 'Choose',
			'Smart' => 'Smart',
			'Advance' => 'Advance',
			'Subject Final' => 'Subject Final',
			'Mock Test' => 'Mock Test',
			'Subject Package' => 'Subject Package',
			'Feedback Package' => 'Feedback Package',
			'Combine' => 'Combine',
			'Medicine' => 'Medicine',
			'Finishing Touch' => 'Finishing Touch',
			'SBA Combined' => 'SBA Combined',
			'SBA Medicine & Allied' => 'SBA Medicine & Allied',
			'Dentistry' => 'Dentistry',
			
		);
		return $ptype_array;
	}

	

	function get_month_array()
	{
		$month_array = array(
			'' => 'Choose',
			'01' => 'January',
			'02' => 'February',
			'03' => 'March',
			'04' => 'April',
			'05' => 'May',
			'06' => 'June',
			'07' => 'July',
			'08' => 'August',
			'09' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December',
		);
		return $month_array;
	}

	function district_list()
	{

		$this->obj->db->select( 'DISTRICT_ID, DISTRICT_NAME' );
		$query = $this->obj->db->get( 'districts' );

		if ( $query->num_rows() > 0 ) {
			$res = $query->result();
			$data_arry[''] = 'Choose';
			foreach ( $res as $item ) {
				$data_arry[$item->DISTRICT_ID] = $item->DISTRICT_NAME;
			}
		}

		return $data_arry;
	}

	function get_service_charge_percentage()
	{
		$service_charge_percentage = 15;
		return $service_charge_percentage;
	}

	function get_sex_array()
	{
		$array = array(
			'' => 'Choose',
			'1' => 'Male',
			'2' => 'Female',
		);
		return $array;
	}

	function get_acctype()
	{
		$array = array(
			'' => 'Choose',
			'I' => 'Income',
			'E' => 'Expanse',
		);
		return $array;
	}

	function get_pay_status()
	{
		$array = array(
			'' => 'Choose',
			1 => 'Paid',
			0 => 'Unpaid',
		);
		return $array;
	}

	function get_position_in_family_array()
	{
		$array = array(
			'' => 'select',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		);
		return $array;
	}

	function get_proficiency_in_english_array()
	{
		$array = array(
			'' => 'Choose',
			'1' => 'Excellent',
			'2' => 'Good',
			'3' => 'Average',
			'4' => 'Fair',
			'5' => 'Poor',
		);
		return $array;
	}

	function get_status_array()
	{
		$array = array(
			'1' => 'Active',
			'0' => 'Inactive',
		);
		return $array;
	}

	function get_answer_array()
	{
		$array = array(
			'' => 'Select One',
			'A' => 'A',
			'B' => 'B',
			'C' => 'C',
			'D' => 'D',
			'E' => 'E'
		);
		return $array;
	}


	function get_mcq_answer_array()
	{
		$array = array(
			'' => 'Select One',
			'T' => 'T',
			'F' => 'F',
		);
		return $array;
	}

	function get_religion_array()
	{
		$array = array(
			'' => 'Choose',
			'1' => 'Muslim',
			'2' => 'Christian',
			'3' => 'Buddhist',
			'4' => 'Hindus',
			'5' => 'Others',
		);
		return $array;
	}

	function get_app_status_array()
	{
		$array = array(
			'' => 'Choose',
			'P' => 'Pending',
			'A' => 'Complete',
			'C' => 'Cancel',

		);
		return $array;
	}
//    function get_student_id($length = 6) {
//        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
//    }
	function get_student_id( $class = NULL )
	{

		$result_array = "";
		$current_year = date( 'Y' );
		$id_year = date( 'y' );
		$current_month = date( 'm' );

		$this->obj->db->select_max( 'std_id_sl', 'max_std_id_sl' );
		$this->obj->db->where( 'year', $current_year );
		$this->obj->db->where( 'month', $current_month );
		$class ? $this->obj->db->where( 'candidate_for_class', $class ) : '';
		$query = $this->obj->db->get( 'student_info_master' );

		if ( $query->num_rows() > 0 ) {
			$res = $query->row();
			$last_sl = $res->max_std_id_sl;
			$result_array = array(
				'student_id' => $this->school_shortcode . $id_year . sprintf( "%04d", $last_sl + 1 ),
				'std_id_sl' => $last_sl + 1,
			);
		} else {
			$result_array = array(
				'student_id' => $this->school_shortcode . $id_year . "0001",
				'std_id_sl' => "1",
			);
		}

		return $result_array;
	}
//    function get_student_id($class = null) {
//
//        $result_array = "";
//        $current_year = date('Y');
//        $id_year = date('y');
//        $current_month = date('m');
//
//        $this->obj->db->select_max('std_id_sl','max_std_id_sl');
//        $this->obj->db->where('year',$current_year);
//        $this->obj->db->where('month',$current_month);
//        $class ? $this->obj->db->where('candidate_for_class',$class) : '';
//        $query = $this->obj->db->get('student_info_master');
//
//        if($query->num_rows() > 0){
//            $res = $query->row();
//            $last_sl = $res->max_std_id_sl;
//            $result_array = array(
//                'student_id' => $id_year.$current_month.sprintf("%02d",$class).sprintf("%05d",$last_sl+1),
//                'std_id_sl' => $last_sl+1,
//            );
//        }else{
//            $result_array = array(
//                'student_id' => $id_year.$current_month.sprintf("%02d",$class)."00001",
//                'std_id_sl' => "1",
//            );
//        }
//
//        return $result_array;
//    }

	function get_ssc_exam_array()
	{
		$array = array(
//            ''                 => 'Choose',
'S.S.C' => 'S.S.C',
'O Level' => 'O Level',
'S.S.C Equivalent' => 'S.S.C Equivalent',
		);
		return $array;
	}

	function get_hsc_exam_array()
	{
		$array = array(
//            ''      => 'Choose',
'H.S.C' => 'H.S.C',
'A Level' => 'A Level',
'H.S.C Equivalent' => 'H.S.C Equivalent',
		);
		return $array;
	}

	function get_mbbs_exam_array()
	{
		$array = array(

			'MBBS' => 'MBBS',

		);
		return $array;
	}

	function get_fcps_exam_array()
	{
		$array = array(

			'FCPS-PI' => 'FCPS-PI',

		);
		return $array;
	}

	function get_mdentrance_exam_array()
	{
		$array = array(

			'MD/MS Entrance' => 'MD/MS Entrance',

		);
		return $array;
	}

	function get_year_array()
	{
		$current_year = date( 'Y' );
		$data_arry = ['' => 'Year'];
		for ( $i = $current_year; $i >= 1950; $i-- ) {
			$data_arry[$i] = $i;
		}
		return $data_arry;

	}

	function get_student_type_list_array()
	{
		$array = array(
			'' => 'Choose',
			'genesis' => 'Genesis',
			'outlier' => 'Outlier',
		);
		return $array;
	}

	function get_current_future_year()
	{
		$current_year = date( 'Y' );
		$current_year += 1;
		$data_arry = ['' => 'Year'];
		for ( $i = $current_year; $i >= 2016; $i-- ) {
			$data_arry[$i] = $i;
		}
		return $data_arry;

	}

	function get_ssc_hsc_result_array()
	{
		$array = array(
			'' => 'Choose',
			'G4' => 'CGPA(out of 4)',
			'G5' => 'CGPA(out of 5)',
			'D1' => '1st Division',
			'D2' => '2nd Division',
			'D3' => '3rd Division'
		);
		return $array;
	}

	function get_group_array()
	{
		$group = array(
			'' => 'Choose',
			'1' => 'Science',
			'2' => 'Humanities',
			'3' => 'Business Studies',
			'4' => 'Other',
		);
		return $group;
	}

	function get_collage_type_array()
	{
		$type = array(
			'' => 'Choose',
			'Public' => 'Govt',
			'Private' => 'Private',
		);
		return $type;
	}

	function get_blood_group_array()
	{
		$blood_group = array(
			'' => 'Choose',
			'A+' => 'A+',
			'A-' => 'A-',
			'B+' => 'B+',
			'B-' => 'B-',
			'AB+' => 'AB+',
			'AB-' => 'AB-',
			'O+' => 'O+',
			'O-' => 'O-',
		);
		return $blood_group;
	}

	function add_type()
	{
		$type = array(
			'Both' => 'Both',
			'Exam' => 'Exam',
			'Lecture' => 'Lecture',
		);
		return $type;
	}

	function edu_board()
	{
		$board = array(
			'' => 'Choose',
			'1' => 'Dhaka',
			'2' => 'Rajshahi',
			'3' => 'Khulna',
			'4' => 'Chittagong',
			'5' => 'Barisal',
			'6' => 'Sylhet',
			'7' => 'Comilla',
			'8' => 'Jessore',
			'9' => 'Dinajpur',
			'10' => 'Madrasha',
			'11' => 'Open University',
			'12' => 'Technical',

		);

		return $board;
	}


	function get_app_id()
	{

		$result_array = "";
		$current_year = date( 'Y' );
		$app_id_year = date( 'y' );
		$current_month = date( 'm' );

		$this->obj->db->select_max( 'app_sl', 'max_app_sl' );
		$this->obj->db->where( 'year', $current_year );
		$this->obj->db->where( 'month', $current_month );
		$query = $this->obj->db->get( 'application' );

		if ( $query->num_rows() > 0 ) {
			$res = $query->row();
			$last_app_sl = $res->max_app_sl;
			$result_array = array(
				'app_id' => $app_id_year . $current_month . sprintf( "%04d", $last_app_sl + 1 ),
				'app_sl' => $last_app_sl + 1,
			);
		} else {
			$result_array = array(
				'app_id' => $app_id_year . $current_month . "0001",
				'app_sl' => "1",
			);
		}

		return $result_array;
	}

	function get_fee_type_code_array()
	{
		$res_array = array(
			'' => 'Choose',
			'af' => 'Admission Fee Group',
			'mtf' => 'Monthly Tution Fee Group',
			'ef' => 'Examination Fee Group',
			'of' => 'Others Fee Group',
		);
		return $res_array;
	}

	function get_session_month_array()
	{

		$data[2] = array('0' => '07', '0' => '08', '0' => '09', '0' => '10', '0' => '11', '0' => '12', '1' => '01', '1' => '02', '1' => '03', '1' => '04', '1' => '05', '1' => '06');
		return $data;
	}

	function get_teacher_id()
	{
		$id_year = "T" . date( 'y' );

		$this->obj->db->select_max( 'id' );
		$query = $this->obj->db->get( 'sif_teacher' );

		if ( $query->num_rows() > 0 ) {
			$res = $query->row();
			$teacher_id = $id_year . sprintf( "%04d", ( $res->id + 1 ) );
		} else {
			$teacher_id = $id_year . "0001";
		}

		return $teacher_id;
	}

	function get_executive_id()
	{
		$id_year = "E" . date( 'y' );

		$this->obj->db->select_max( 'id' );
		$query = $this->obj->db->get( 'sif_exe_stuff' );

		if ( $query->num_rows() > 0 ) {
			$res = $query->row();
			$executive_id = $id_year . sprintf( "%04d", ( $res->id + 1 ) );
		} else {
			$executive_id = $id_year . "0001";
		}

		return $executive_id;
	}

	function get_exam_id()
	{

		$result_array = "";
		$current_year = date( 'Y' );
		$id_year = date( 'y' );
		$current_month = date( 'm' );

		$this->obj->db->select_max( 'id', 'sl' );
//        $this->obj->db->where('year',$current_year);
//        $this->obj->db->where('month',$current_month);
		//$this->obj->db->where('candidate_for_class',$class);
		$query = $this->obj->db->get( 'examination_info' );

		if ( $query->num_rows() > 0 ) {
			$res = $query->row();
			$last_sl = $res->sl;
			$result_array = array(
				'exam_id' => 'EXM' . $id_year . $current_month . sprintf( "%05d", $last_sl + 1 ),
				'sl' => $last_sl + 1,
			);

			$exam_id = 'EXM' . $id_year . $current_month . sprintf( "%05d", $last_sl + 1 );
		} else {
			$result_array = array(
				'exam_id' => 'EXM' . $id_year . $current_month . "00001",
				'sl' => 1,
			);

			$exam_id = 'EXM' . $id_year . $current_month . "00001";
		}

		return $exam_id;
	}

	public function get_days_array( $day = NULL )
	{
		$days = array(
			'' => 'Choose',
			'6' => 'SAT',
			'7' => 'SUN',
			'1' => 'MON',
			'2' => 'TUE',
			'3' => 'WED',
			'4' => 'THU',
			'5' => 'FRI',
		);
		if ( $day ) $days = $days[$day];
		return $days;
	}

	public function get_schedule_type_array()
	{
		$type = array(
			'R' => 'Regular',
			'C' => 'Crush',
			'M' => 'Mock',
			'E' => 'Exam',
		);
		return $type;
	}


	function get_bsc_exam_array()
	{
		$array = array(
			'B.Sc/BA' => 'B.Sc/BA',
			'Pass Course' => 'Pass Course',
		);
		return $array;
	}

	function get_msc_exam_array()
	{
		$array = array(
			'M.A' => 'M.A',
			'M.S.S' => 'M.S.S',
			'M.Sc/M.S' => 'M.Sc/M.S',
			'M.Com' => 'M.Com',
			'M.B.A' => 'M.B.A',
		);
		return $array;
	}

	public function get_paper_array()
	{
		$type = array(
			'' => 'Choose',
			'I' => 'Paper-I',
			'II' => 'Paper-II',
			'III' => 'Paper-III',
		);
		return $type;
	}

	public function get_hours_array()
	{
		$hours = array('' => 'Hour');
		for ( $i = 1; $i <= 12; $i++ ) {
			$i = sprintf( '%02d', $i );
			$hours[$i] = $i;
		}

		return $hours;
	}

	public function get_minutes_array()
	{
		$minutes = array('' => 'Minute');
		for ( $i = 0; $i < 60; $i++ ) {
			$i = sprintf( '%02d', $i );
			$minutes[$i] = $i;
		}

		return $minutes;
	}

	public function get_meridian_array( $m = NULL )
	{
		$meridian = array(
			'' => 'AM/PM',
			'AM' => 'AM',
			'PM' => 'PM',
		);
		if ( $m ) $meridian = $meridian[$m];
		return $meridian;
	}

	function returnDays( $fromdate, $todate )
	{
		$fromdate = new DateTime( $fromdate );
		$todate = new DateTime( $todate );
		$todate = $todate->add( new DateInterval( 'PT24H' ) );
		$daterange = new DatePeriod( $fromdate, new DateInterval( 'P1D' ), $todate );
		$data = array(
			'days' => array(),
			'dates' => array(),
		);
		foreach ( $daterange as $date ) {
			array_push( $data['days'], $date->format( "N" ) );
			array_push( $data['dates'], $date->format( "Y-m-d" ) );
		}
		return $data;
	}

	public function answer_sheet_type()
	{
		$type = array(
			'A' => '20 Question',
			'B' => 'BCPS (NEW)',
			'C' => 'BCPS (OLD)',
			'D' => 'BCPS (SBA)',
			'E' => 'BSMMU',
		);

		return $type;
	}

	public function get_ans_start( $ans_type )
	{
		$start = 0;
		switch ( $ans_type ) {
			case 'A' :
				$start = 8;
				break;
			case 'B' :
				$start = 9;
				break;
			case 'C' :
				$start = 9;
				break;
			case 'D' :
				$start = 9;
				break;
			case 'E' :
				$start = 11;
				break;
			case '6' :
				$start = 6;
				break;
		}
		return $start;
	}

	public function get_teacher_pay_type_array()
	{
		$type = array(
			'BW' => 'Batch wise payment',
			'QP' => 'Payment for question paper prepare',
			'HN' => 'Honorarium',
			'TA' => 'Teacher advance',
		);
		return $type;
	}


	public function evaluation_value()
	{
		$evaluete_type = array(
			'' => 'Choose',
			'1' => 'Excellent',
			'2' => 'Very Good',
			'3' => 'Good',
			'4' => 'Average'
		);
		return $evaluete_type;
	}

	public function get_exam_list_array_2()
	{
		$data = array(
			'W' => 'Written',
			'L' => 'Long Case',
			'S' => 'Short Case',
			'O' => 'OSPE',
			'V' => 'VIVA',
		);
		return $data;
	}

	public function get_emp_type_array()
	{
		$data = array(
			'1' => 'Executive',
			'2' => 'Office Stuff',
		);
		return $data;
	}

	public function admission_type()
	{
		$data = array(
			'' => 'Choose',
			'O' => 'Old',
			'N' => 'New'
		);

		return $data;
	}

	public function teacher_evalution_list()
	{
		$data = array(
			'1' => 'Introduction',
			'2' => 'Knowledge Depth Of The Subject',
			'3' => 'Expression Capability',
			'4' => 'Interaction',
		);
		return $data;
	}

	public function currency_list()
	{
		$data = array(
			'' => 'Choose',
			'BDT' => 'BDT',
			'USD' => 'USD'
		);

		return $data;
	}
}
