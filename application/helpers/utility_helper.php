<?php

if ( !function_exists( 'global_image_url' ) ) {
    
    function global_image_url()
    {
        $CI = &get_instance();
        return $CI->config->slash_item( 'global_image_url' );
    }
    
}

function get_name_by_auto_id( $table_name = NULL, $auto_id = NULL, $field_name = 'name' )
{
    
    $ci = &get_instance();
    
    if ( !empty( $table_name ) and !empty( $auto_id ) and !empty( $field_name ) ) {
        
        $query     = $ci->db->select( 'id,' . $field_name );
        $query     = $ci->db->where( 'id', $auto_id );
        $query     = $ci->db->get( $table_name );
        $total_row = $query->num_rows();
        if ( $total_row > 0 ) {
            $ressult = $query->row();
            return $ressult->$field_name;
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}


function get_edit_topics_value( $table_name = NULL, $auto_id = NULL, $field_name = 'name' )
{
    
    $ci = &get_instance();
    
    if ( !empty( $table_name ) and !empty( $auto_id ) and !empty( $field_name ) ) {
        
        //$ci->db->group_by('topic_id');
        $query = $ci->db->select( 'id,' . $field_name );
        $query = $ci->db->where( 'id', $auto_id );
        
        $query     = $ci->db->get( $table_name );
        $total_row = $query->num_rows();
        if ( $total_row > 0 ) {
            $ressult = $query->row();
            return $ressult->$field_name;
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}


function get_faculty_name_by_course_code_faculty_code( $table_name = NULL, $course_code = NULL, $faculty_code = NULL, $field_name = 'faculty_name' )
{
    
    $ci = &get_instance();
    
    if ( !empty( $table_name ) and !empty( $course_code ) and !empty( $faculty_code ) and !empty( $field_name ) ) {
        
        $query     = $ci->db->select( $field_name );
        $query     = $ci->db->where( 'course_code', $course_code );
        $query     = $ci->db->where( 'faculty_code', $faculty_code );
        $query     = $ci->db->get( $table_name );
        $total_row = $query->num_rows();
        if ( $total_row > 0 ) {
            $ressult = $query->row();
            return $ressult->$field_name;
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}


function get_student_fullname( $student_id )
{
    
    $ci = &get_instance();
    
    
    $query     = $ci->db->select( 'id, first_name, middle_name, last_name' );
    $query     = $ci->db->where( 'student_id', $student_id );
    $query     = $ci->db->get( 'student_info_master' );
    $total_row = $query->num_rows();
    if ( $total_row > 0 ) {
        $row = $query->row();
        return $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name;
    }
    return FALSE;
}

function get_name_by_id( $table_name = NULL, $value = NULL, $id = 'id', $field_name = 'name' )
{
    
    $ci = &get_instance();
    
    if ( !empty( $table_name ) and !empty( $value ) and !empty( $id ) and !empty( $field_name ) ) {
        $ci->db->select( $field_name );
        // $ci->db->select('*');
        $ci->db->where( $id, $value );
        $query     = $ci->db->get( $table_name );
        $total_row = $query->num_rows();
        if ( $total_row > 0 ) {
            $ressult = $query->last_row();
            return $ressult->$field_name;
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}


function get_question_info( $exam_ref_id )
{
    
    $ci = &get_instance();
    
    $query = $ci->db->select( '*' );
    $query = $ci->db->where( 'exam_ref_id', $exam_ref_id );
    $query = $ci->db->get( 'oe_exam_question' );
    if ( $query->num_rows() > 0 ) {
        return $row = $query->result();
    } else {
        return FALSE;
    }
}


function get_expense_type_by_auto_id( $table_name = NULL, $auto_id = NULL, $field_name = NULL )
{
    
    $ci = &get_instance();
    
    if ( !empty( $table_name ) and !empty( $auto_id ) and !empty( $field_name ) ) {
        
        $query     = $ci->db->select( 'id,' . $field_name );
        $query     = $ci->db->where( 'id', $auto_id );
        $query     = $ci->db->get( $table_name );
        $total_row = $query->num_rows();
        if ( $total_row > 0 ) {
            $ressult = $query->row();
            return $ressult->$field_name;
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}

function get_account_name_by_auto_id( $table_name = NULL, $auto_id = NULL, $field_name = NULL )
{
    
    $ci = &get_instance();
    
    if ( !empty( $table_name ) and !empty( $auto_id ) and !empty( $field_name ) ) {
        
        $query     = $ci->db->select( 'id,' . $field_name );
        $query     = $ci->db->where( 'id', $auto_id );
        $query     = $ci->db->get( $table_name );
        $total_row = $query->num_rows();
        if ( $total_row > 0 ) {
            $ressult = $query->row();
            return $ressult->$field_name;
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}

function get_month_name( $month )
{
    switch ( $month ) {
        case "01":
            return "January";
            break;
        case "02":
            return "February";
            break;
        case "03":
            return "March";
            break;
        case "04":
            return "April";
            break;
        case "05":
            return "May";
            break;
        case "06":
            return "June";
            break;
        case "07":
            return "July";
            break;
        case "08":
            return "August";
            break;
        case "09":
            return "September";
            break;
        case "10":
            return "October";
            break;
        case "11":
            return "November";
            break;
        case "12":
            return "December";
            break;
    }
    
}

/* convert no. to in word */
function convert_number_to_words( $number )
{
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if ( !is_numeric( $number ) ) {
        return FALSE;
    }
    
    if ( ( $number >= 0 && (int) $number < 0 ) || (int) $number < 0 - PHP_INT_MAX ) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return FALSE;
    }
    
    if ( $number < 0 ) {
        return $negative . convert_number_to_words( abs( $number ) );
    }
    
    $string = $fraction = NULL;
    
    if ( strpos( $number, '.' ) !== FALSE ) {
        list( $number, $fraction ) = explode( '.', $number );
    }
    
    switch ( TRUE ) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ( (int) ( $number / 10 ) ) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ( $units ) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string    = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ( $remainder ) {
                $string .= $conjunction . convert_number_to_words( $remainder );
            }
            break;
        default:
            $baseUnit     = pow( 1000, floor( log( $number, 1000 ) ) );
            $numBaseUnits = (int) ( $number / $baseUnit );
            $remainder    = $number % $baseUnit;
            $string       = convert_number_to_words( $numBaseUnits ) . ' ' . $dictionary[$baseUnit];
            if ( $remainder ) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words( $remainder );
            }
            break;
    }
    
    if ( NULL !== $fraction && is_numeric( $fraction ) ) {
        $string .= $decimal;
        $words  = array();
        foreach ( str_split( (string) $fraction ) as $number ) {
            $words[] = $dictionary[$number];
        }
        $string .= implode( ' ', $words );
    }
    
    return $string;
}

function helper_get_all_details_by_auto_id( $table_name = NULL, $auto_id = NULL )
{
    
    $ci = &get_instance();
    
    if ( !empty( $table_name ) and !empty( $auto_id ) ) {
        
        //$query = $ci->db->select('id,'.$field_name);
        $query     = $ci->db->where( 'id', $auto_id );
        $query     = $ci->db->get( $table_name );
        $total_row = $query->num_rows();
        if ( $total_row > 0 ) {
            $ressult = $query->row();
            return $ressult;
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}

function helper_sub_list_by_class_group_id( $class_id = NULL, $group_id = NULL )
{
    
    $ci = &get_instance();
    
    
    $query     = $ci->db->select( 'id,subject_id,subject_name' );
    $query     = $ci->db->where( 'class_id', $class_id );
    $query     = $ci->db->where( 'group_id', $group_id );
    $query     = $ci->db->order_by( 'subject_name', 'ASC' );
    $query     = $ci->db->get( 'subject_mapping' );
    $total_row = $query->num_rows();
    if ( $total_row > 0 ) {
        $ressult = $query->result();
        return $ressult;
    } else {
        return FALSE;
    }
}

function get_gender_name( $id )
{
    switch ( $id ) {
        case "1":
            return "Male";
            break;
        case "2":
            return "Female";
            break;
    }
    
}

function get_religion_name( $id )
{
    switch ( $id ) {
        case "1":
            return "Muslim";
            break;
        case "2":
            return "Christian";
            break;
        case "3":
            return "Buddhist";
            break;
        case "4":
            return "Hindus";
            break;
        case "5":
            return "Others";
            break;
    }
}

function get_pro_in_eng_name( $id )
{
    switch ( $id ) {
        case "1":
            return "Excellent";
            break;
        case "2":
            return "Good";
            break;
        case "3":
            return "Average";
            break;
        case "4":
            return "Fair";
            break;
        case "5":
            return "Poor";
            break;
    }
}

function get_app_status_name( $status )
{
    $ci =& get_instance();
    
    $ci->load->library( 'common_lib' );
    
    $arr = $ci->common_lib->get_app_status_array();
    
    return $arr[$status];
}


if ( !function_exists( 'generate_random_password' ) ) {
    
    function generate_random_password( $length )
    {
        return random_string( 'alnum', $length );
    }
    
}

if ( !function_exists( 'get_teacher_name' ) ) {
    
    function get_teacher_name( $teacher_id )
    {
        $ci =& get_instance();
        $ci->db->select( 'tec_name' );
        $query = $ci->db->get_where( 'sif_teacher', array('id' => $teacher_id) );
        
        if ( $query->num_rows() == 1 ) return $query->row()->tec_name;
    }
    
}

if ( !function_exists( 'get_day_name' ) ) {
    
    function get_day_name( $day = NULL )
    {
        $days = array(
            ''  => 'Choose',
            '1' => 'SAT',
            '2' => 'SUN',
            '3' => 'MON',
            '4' => 'TUE',
            '5' => 'WED',
            '6' => 'THU',
            '7' => 'FRI',
        );
        if ( $day ) $days = $days[$day];
        return $days;
    }
    
}

if ( !function_exists( 'get_grade_by_marks' ) ) {
    
    function get_grade_by_marks( $mark )
    {
        $grade = array();
        
        if ( $mark >= 80 && $mark <= 100 ) {
            $grade = array(
                'name'  => 'A+',
                'point' => 5,
            );
        } elseif ( $mark >= 70 && $mark <= 79 ) {
            $grade = array(
                'name'  => 'A',
                'point' => 4,
            );
        } elseif ( $mark >= 60 && $mark <= 69 ) {
            $grade = array(
                'name'  => 'A-',
                'point' => 3.5,
            );
        } elseif ( $mark >= 50 && $mark <= 59 ) {
            $grade = array(
                'name'  => 'B',
                'point' => 3,
            );
        } elseif ( $mark >= 40 && $mark <= 49 ) {
            $grade = array(
                'name'  => 'C',
                'point' => 2,
            );
        } elseif ( $mark >= 33 && $mark <= 39 ) {
            $grade = array(
                'name'  => 'D',
                'point' => 1,
            );
        } elseif ( $mark >= 0 && $mark <= 32 ) {
            $grade = array(
                'name'  => 'F',
                'point' => 0,
            );
        } else {
            $grade = array(
                'name'  => 'Invalid',
                'point' => 'Invalid',
            );
        }
        
        return $grade;
    }
    
}

function get_greading_system()
{
    $grade = array(
        array(
            'name'     => 'A+',
            'interval' => '80-100',
            'point'    => 5,
        ),
        array(
            'name'     => 'A+',
            'interval' => '80-100',
            'point'    => 5,
        ),
        array(
            'name'     => 'A',
            'interval' => '70-79',
            'point'    => 4,
        ),
        array(
            'name'     => 'A-',
            'interval' => '60-69',
            'point'    => 3.5,
        ),
        array(
            'name'     => 'B',
            'interval' => '50-59',
            'point'    => 3,
        ),
        array(
            'name'     => 'C',
            'interval' => '40-49',
            'point'    => 2,
        ),
        array(
            'name'     => 'D',
            'interval' => '33-39',
            'point'    => 1,
        ),
        array(
            'name'     => 'F',
            'interval' => '0-32',
            'point'    => 0,
        ),
    );
    return $grade;
}

if ( !function_exists( 'get_batch_name' ) ) {
    function get_batch_name( $course, $faculty, $batch )
    {
        $ci =& get_instance();
        
        $ci->db->select( 'subject' );
        $ci->db->where(
            array(
                'course_code'  => $course,
                'faculty_code' => $faculty,
                'batch_code'   => $batch,
            )
        );
        $query = $ci->db->get( 'sif_batch' );
        
        if ( $query->num_rows() > 0 ) {
            return $query->row()->subject;
        }
        return FALSE;
    }
}

if ( !function_exists( 'get_topic_name' ) ) {
    function get_topic_name( $course, $faculty, $topics )
    {
        $ci     =& get_instance();
        $topics = explode( ',', $topics );
        $ci->db->select( 'class_topic_name' );
        $ci->db->where(
            array(
                'course_code'  => $course,
                'faculty_code' => $faculty
            )
        );
        $ci->db->where_in( 'id', $topics );
        $query = $ci->db->get( 'sif_class_topic' );
        
        if ( $query->num_rows() > 0 ) {
            $result       = $query->result();
            $topics_names = array();
            foreach ( $result as $row ) {
                array_push( $topics_names, $row->class_topic_name );
            }
            return implode( ',', $topics_names );
        }
        return FALSE;
    }
}


if ( !function_exists( 'get_mcq_ans_options' ) ) {
    function get_mcq_ans_options( $id )
    {
        $ci =& get_instance();
        
        $ci->db->select( 'ans' );
        $ci->db->where( 'master_ref_id', $id );
        // $ci->db->where_in('id', $topics);
        $query = $ci->db->get( 'oe_qsn_bnk_ans' );
        
        if ( $query->num_rows() > 0 ) {
            $result       = $query->result();
            $option_names = array();
            foreach ( $result as $row ) {
                array_push( $option_names, $row->ans );
            }
            return implode( ',', $option_names );
        }
        return FALSE;
    }
}

if ( !function_exists( 'get_mcq_ans' ) ) {
    function get_mcq_ans( $id )
    {
        $ci =& get_instance();
        
        $ci->db->select( 'index_seqn, correct_ans' );
        $ci->db->where( 'master_ref_id', $id );
        // $ci->db->where_in('id', $topics);
        $query = $ci->db->get( 'oe_qsn_bnk_ans' );
        
        if ( $query->num_rows() > 0 ) {
            $result       = $query->result();
            $option_names = array();
            foreach ( $result as $row ) {
                $option = "<p>{$row->index_seqn}) {$row->correct_ans}</p>";
                array_push( $option_names, $option );
            }
            return implode( '', $option_names );
        }
        return FALSE;
    }
}


// if (!function_exists('get_option_name')) {
//     function get_option_name($id)
//     {
//         $ci =& get_instance();

//         $ci->db->select('ans');
//         $ci->db->where('master_ref_id',$id);
//        // $ci->db->where_in('id', $topics);
//         $query = $ci->db->get('oe_qsn_bnk_ans');

//         if ($query->num_rows() > 0) {
//             $result = $query->result();
//            // echo '<pre>';
//            // print_r($result);exit();
//             $option_names = array();
//              foreach ($result as $key => $value) {
//                  array_push($option_names, $value->ans);

//               } 

//                foreach ($option_names as $key => $value) {
//                        // return $option_names[$key];
//                         //if()
//                         print_r($option_names[$key]);  
//                         //echo $key;
//                     }     

//        return false;
//     }
// }
// }


if ( !function_exists( 'get_subject_name' ) ) {
    function get_subject_name( $ids = NULL )
    {
        $ci  =& get_instance();
        $ids = explode( ',', $ids );
        $ci->db->select( 'subject' );
        $ci->db->where( 'status', 1 );
        $ids ? $ci->db->where_in( 'id', $ids ) : '';
        $query = $ci->db->get( 'sif_subject' );
        
        if ( $query->num_rows() > 0 ) {
            $result    = $query->result();
            $sub_names = array();
            foreach ( $result as $row ) {
                array_push( $sub_names, $row->subject );
            }
            return implode( ', ', $sub_names );
        }
        return FALSE;
    }
}

if ( !function_exists( 'get_changed_date' ) ) {
    function get_changed_date( $str )
    {
        return date( 'Y-m-d', strtotime( date( 'Y-m-d' ) . ' ' . $str ) );
    }
}

/* add this code in helper*/

if ( !function_exists( 'get_evaluation_count' ) ) {
    function get_evaluation_count( $schedule_id, $item_id, $tid )
    {
        $ci         =& get_instance();
        $field_name = eva_field_names( $tid );
        $ci->db->select( $field_name );
        $ci->db->where( $field_name, $item_id );
        $ci->db->where( 'schedule_id', $schedule_id );
        $count = $ci->db->count_all_results( 'sif_teacher_evaluation' );
        return $count;
    }
}

if ( !function_exists( 'get_evaluation_suggesion' ) ) {
    function get_evaluation_suggesion( $schedule_id )
    {
        $ci =& get_instance();
        $ci->db->select( 'suggestions' );
        $ci->db->where( 'schedule_id', $schedule_id );
        $query = $ci->db->get( 'sif_teacher_evaluation' );
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            $data    = array();
            foreach ( $results as $result ) {
                array_push( $data, $result->suggestions );
            }
            
            return implode( ', ', $data );
        } else {
            return FALSE;
        }
    }
}

if ( !function_exists( 'eva_field_names' ) ) {
    function eva_field_names( $id )
    {
        $data = array(
            '1' => 'introduction',
            '2' => 'knowledge',
            '3' => 'express',
            '4' => 'interaction',
        );
        $data = $id ? $data[$id] : $data;
        return $data;
    }
}

//******start for online exam*****//

if ( !function_exists( 'get_topic_by_chapter' ) ) {
    function get_topic_by_chapter( $chapter_id )
    {
        $ci =& get_instance();
        $ci->db->where( 'chapter_ref_id', $chapter_id );
        $ci->db->where( 'status', 1 );
        $ci->db->order_by( 'name', 'ASC' );
        $query = $ci->db->get( 'oe_topics' );
        if ( $query->num_rows() > 0 ) {
            return $results = $query->result();
        } else {
            return FALSE;
        }
        
    }
}


// if (!function_exists('get_topic_by_chapter_select')) {
//     function get_topic_by_chapter_select($chapter_id,$topic_id)
//     {
//         $ci =& get_instance();
//         $ci->db->where('chapter_ref_id', $chapter_id);
//         $ci->db->where('id', $topic_id);
//         $ci->db->order_by('name','ASC');
//         $query = $ci->db->get('oe_topics');
//         if ($query->num_rows() > 0) {
//             return $results = $query->result();
//         } else {
//             return FALSE;
//         }

//     }
// }


if ( !function_exists( 'get_ans_options' ) ) {
    function get_ans_options( $id )
    {
        $ci =& get_instance();
        
        $ci->db->select( 'ans, index_seqn' );
        $ci->db->where( 'master_ref_id', $id );
        // $ci->db->where_in('id', $topics);
        $query = $ci->db->get( 'oe_qsn_bnk_ans' );
        
        if ( $query->num_rows() > 0 ) {
            $result       = $query->result();
            $option_names = array();
            foreach ( $result as $row ) {
                $ans = strip_tags( $row->ans );
                if ( $ans ) {
                    $option = "<p>{$row->index_seqn}) {$ans}</p>";
                    array_push( $option_names, $option );
                }
            }
            return implode( '', $option_names );
        }
        return FALSE;
    }
}


if ( !function_exists( 'get_chapter_list' ) ) {
    function get_chapter_list( $id )
    {
        $ci =& get_instance();
        
        $ci->db->select( 'chapter_id' );
        $ci->db->group_by( 'chapter_id' );
        $ci->db->where( 'master_ref_id', $id );
        $query = $ci->db->get( 'oe_qns_chapter_relatn' );
        
        if ( $query->num_rows() > 0 ) {
            $chapter_ids = $query->result();
            
            $chapter_names = array();
            foreach ( $chapter_ids as $chap_id ) {
                foreach ( $chap_id as $key => $value ) {
                    $ci->db->select( 'chapter_name' );
                    $ci->db->where( 'id', $value );
                    $query = $ci->db->get( 'oe_chapter' );
                    if ( $query->num_rows() > 0 ) {
                        array_push( $chapter_names, $query->row()->chapter_name );
                    }
                }
            }
            return implode( ', ', $chapter_names );
        }
        return FALSE;
    }
}

if ( !function_exists( 'get_topics_list' ) ) {
    function get_topics_list( $id )
    {
        $ci =& get_instance();
        
        $ci->db->select( 'topic_id' );
        $ci->db->where( 'master_ref_id', $id );
        $query = $ci->db->get( 'oe_qns_topic_relatn' );
        
        if ( $query->num_rows() > 0 ) {
            $topic_ids = $query->result();
            
            $topic_names = array();
            foreach ( $topic_ids as $topic_id ) {
                foreach ( $topic_id as $key => $value ) {
                    $ci->db->select( 'name' );
                    $ci->db->where( 'id', $value );
                    $query = $ci->db->get( 'oe_topics' );
                    if ( $query->num_rows() > 0 ) {
                        array_push( $topic_names, $query->row()->name );
                    }
                }
            }
            return implode( ',', $topic_names );
        }
        return FALSE;
    }
}

function get_faculty_under_course( $course_id )
{
    $ci = &get_instance();
    //$query = $ci->db->distinct('faculty_code');
    $query = $ci->db->select( 'faculty_id' );
    $query = $ci->db->where( 'course_id', $course_id );
    $query = $ci->db->where( 'status', '1' );
    $ci->db->group_by( 'faculty_id' );
    $query = $ci->db->get( 'sif_subject' );
    
    if ( $query->num_rows() > 0 ) {
        echo "<ul class='faculty_styl'>";
        $record = $query->result();
        
        foreach ( $record as $key2 => $value2 ) {
            
            ?>
            <li class="second_item" style="border-bottom: 1px solid #ddd;">
            <a href=#">
                <?php
                //echo $value2->subject;
                echo get_faculty( $value2->faculty_id );
                ?>
            </a>
            <?php echo "<ul>" ?>
            
            <?php
            //echo $value2->subject;
            $subjects = get_subject( $value2->faculty_id );
            if ( $subjects ) {
                foreach ( $subjects as $key => $value ) {
                    ?>
                    <li style="border-bottom: 1px solid #ddd;">
                        <a href="<?php echo base_url() . 'exam_type/' . $value->id; ?>"><?php echo $value->subject; ?></a>
                    </li>
                    <?php
                }
            } else {
                echo '';
            }
            ?>
            
            <?php echo "</ul>" ?>
            </li>
            <?php
        }
        echo "</ul>";
    }
}

function get_faculty( $auto_id )
{
    
    $ci = &get_instance();
    
    if ( $auto_id ) {
        $query = $ci->db->where( 'id', $auto_id );
        $query = $ci->db->get( 'sif_faculty' );
        if ( $query->num_rows() > 0 ) {
            return $query->row()->faculty_name;
        }
    } else {
        return FALSE;
    }
}

function get_subject( $faculty_id )
{
    
    $ci = &get_instance();
    
    if ( $faculty_id ) {
        $query = $ci->db->where( 'subject_faculty_id', $faculty_id );
        $query = $ci->db->get( 'sif_subject' );
        if ( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}

function get_question_use_count( $id )
{
    
    $ci = &get_instance();
    
    if ( $id ) {
        $ci->db->select( 'id', $id );
        $ci->db->where( 'question_id', $id );
        $query = $ci->db->get( 'oe_exam_question' );
//            die(json_encode($query->num_rows()));
        return $query->num_rows();
    } else {
        return FALSE;
    }
}


function get_course_under_institute( $course_id, $institute_id, $faculty_id )
{
    $ci = &get_instance();
    //$query = $ci->db->distinct('faculty_code');
    $query = $ci->db->select( '*' );
    $query = $ci->db->where( 'id', $course_id );
    $query = $ci->db->where( 'institute_id', $institute_id );
    $query = $ci->db->where( 'status', '1' );
    //$ci->db->group_by('faculty_id');
    $query = $ci->db->get( 'sif_course' );
    
    if ( $query->num_rows() > 0 ) {
        echo "<ul class='faculty_styl'>";
        $record = $query->result();
        //echo "<pre>";
        //print_r($record);
        //exit();
        
        foreach ( $record as $key2 => $value2 ) {
            ?>
            <li class="second_item" style="border-bottom: 1px solid #ddd;">
            <a href=#">
                <?php
                echo $value2->course_name;
                //echo get_faculty($value2->faculty_id);
                
                ?>
            </a>
            <?php echo "<ul>" ?>
            
            <?php
            $query = $ci->db->select( '*' );
            $query = $ci->db->where( 'institute_id', $institute_id );
            $query = $ci->db->where( 'course_id', $course_id );
            $query = $ci->db->where( 'faculty_id', $faculty_id );
            
            $query = $ci->db->where( 'status', '1' );
            //$ci->db->group_by('faculty_id');
            $query = $ci->db->get( 'sif_subject' );
            if ( $query->num_rows() > 0 ) {
                $subjects = $query->result();
                foreach ( $subjects as $key => $value ) {
                    ?>
                    <li style="border-bottom: 1px solid #ddd;">
                        <a href="<?= site_url( "subject-exam/$value->id" ) ?>"><?php echo $value->subject; ?></a>
                    </li>
                    <?php
                }
            } else {
                echo '';
            }
            ?>
            
            <?php echo "</ul>" ?>
            </li>
            <?php
        }
        echo "</ul>";
    }
}


if ( !function_exists( 'get_faculty_list' ) ) {
    function get_faculty_list( $institute = NULL, $course = NULL )
    {
        $ci =& get_instance();
        
        $ci->db->select( 'faculty_name name, id' );
        $institute ? $ci->db->where( 'institute_id', $institute ) : NULL;
        $course ? $ci->db->where( 'course_id', $course ) : NULL;
        $ci->db->order_by( 'faculty_name' );
        $query = $ci->db->get( 'sif_faculty' );
        
        $options = ['' => 'Choose'];
        if ( $query->num_rows() > 0 ) {
            $result = $query->result_array();
            
            $options = $options + array_column( $result, 'name', 'id' );
        }
        return $options;
    }
}

if ( !function_exists( 'redirect_back' ) ) {
    function redirect_back()
    {
        $ci =& get_instance();
        $ci->load->library( 'user_agent' );
        redirect( $ci->agent->referrer() );
    }
}
if ( !function_exists( 'get_teacher_login_info' ) ) {
    function get_teacher_login_info( $tid, $field = 'username' )
    {
        $ci    =& get_instance();
        $query = $ci->db->select( $field )->where( 'teacher_id', $tid )->get( 'sif_users' );
        if ( $query->num_rows() == 1 ) {
            $result = $query->row();
            return $result->$field;
        }
        
        return FALSE;
    }
}
if ( !function_exists( 'closetags' ) ) {
    function closetags( $html )
    {
        preg_match_all( '#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result );
        $openedtags = $result[1];
        preg_match_all( '#</([a-z]+)>#iU', $html, $result );
        $closedtags = $result[1];
        $len_opened = count( $openedtags );
        if ( count( $closedtags ) == $len_opened ) {
            return $html;
        }
        $openedtags = array_reverse( $openedtags );
        for ( $i = 0; $i < $len_opened; $i++ ) {
            if ( !in_array( $openedtags[$i], $closedtags ) ) {
                $html .= '</' . $openedtags[$i] . '>';
            } else {
                unset( $closedtags[array_search( $openedtags[$i], $closedtags )] );
            }
        }
        return $html;
    }
}

