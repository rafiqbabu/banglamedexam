<?php
/**
 * Created by PhpStorm.
 * User: nahian
 * Date: 11/14/17
 * Time: 2:08 PM
 */

if ( !function_exists( 'makeMyPassword' ) ) {
	function makeMyPassword( $pass )
	{
		return password_hash( $pass, PASSWORD_BCRYPT );
	}
}

if ( !function_exists( 'verifyMyPassword' ) ) {
	function verifyMyPassword( $pass, $hash )
	{
		return password_verify( $pass, $hash );
	}
}
if ( !function_exists( 'inc_string' ) ) {
	function inc_string( $str )
	{
		return preg_replace_callback( "|(\d+)|", "inc", $str );
	}
}

if ( !function_exists( 'inc' ) ) {
	function inc( $matches )
	{
		return ++$matches[1];
	}
}

if ( !function_exists( 'user_logged_in' ) ) {
	function user_logged_in()
	{
		$ci     =& get_instance();
		$status = $ci->session->userdata( 'logged_in' );
		return $status;
	}
}

if ( !function_exists( 'is_valid_user' ) ) {
	function is_valid_user( $id )
	{
		$ci =& get_instance();
		if ( user_logged_in() ) {
			$user = $ci->session->userdata( 'user' );
			if ( $id === $user->id ) {
				return TRUE;
			}
		} else {
			redirect( 'user-login' );
		}
		return FALSE;
	}
}

if ( !function_exists( 'db_date_format' ) ) {
	function db_date_format( $date = NULL )
	{
		return $date ? date( 'Y-m-d H:i:s', strtotime( $date ) ) : date( 'Y-m-d H:i:s' );
	}
}

if ( !function_exists( 'database_date' ) ) {
	function database_date( $date = NULL )
	{
		return $date ? date( 'Y-m-d', strtotime( $date ) ) : date( 'Y-m-d' );
	}
}

if ( !function_exists( 'user_formated_date' ) ) {
	function user_formated_date( $date )
	{
		return $date ? date( 'd M, Y', strtotime( $date ) ) : FALSE;
	}
}

if ( !function_exists( 'add_to_datetime' ) ) {
	function add_to_datetime( $increment )
	{
		return date( 'Y-m-d H:i:s', strtotime( "$increment" ) );
	}
}

if ( !function_exists( 'user_formated_datetime' ) ) {
	function user_formated_datetime( $date )
	{
		return $date ? date( 'd M, Y h:i A', strtotime( $date ) ) : FALSE;
	}
}

if ( !function_exists( 'user_formated_time' ) ) {
	function user_formated_time( $date )
	{
		return $date ? date( 'h:i A', strtotime( $date ) ) : FALSE;
	}
}

if ( !function_exists( 'time_difference' ) ) {
	function time_difference( $start, $end )
	{
		$from     = new DateTime( $start );
		$to       = new DateTime( $end );
		$interval = $from->diff( $to );
		return $interval->format( "%I:%S" );
	}
}

if ( !function_exists( 'check_user_permission' ) ) {
	function check_user_permission( $id = NULL )
	{
		$ci =& get_instance();
		
		if ( !$id ) $id = $ci->uri->segment( 2 );
		
		if ( is_valid_user( $id ) ) {
			return TRUE;
		} else {
			$ci->session->set_flashdata( 'warning', "<strong>Permission Denied!</strong> You don't have permission to see the page" );
			redirect( '/' );
			die();
		}
	}
}
/**
 * Get and Set Redirect URL
 */
if ( !function_exists( 'redirect_url' ) ) {
	function redirect_url( $url = NULL )
	{
		$ci =& get_instance();
		
		if ( $url ) {
			return $ci->session->set_userdata( 'redirect_url', $url );
		} else {
			return $ci->session->userdata( 'redirect_url' );
		}
	}
}
if ( !function_exists( 'unset_redirect_url' ) ) {
	function unset_redirect_url()
	{
		$ci =& get_instance();
		return $ci->session->unset_userdata( 'redirect_url' );
	}
}
/**
 * Get and Set Redirect URL
 */
if ( !function_exists( 'prev_url' ) ) {
	function prev_url()
	{
		$url = $_SERVER['HTTP_REFERER'];
		return $url;
	}
}
if ( !function_exists( 'unset_prev_url' ) ) {
	function unset_prev_url()
	{
		$ci =& get_instance();
		return $ci->session->unset_userdata( 'prev_url' );
	}
}
if ( !function_exists( 'get_exam_count_dropdown' ) ) {
	function get_exam_count_dropdown( $count )
	{
		$arr = [];
		
		for ( $i = 0; $i <= $count; $i++ ) {
			$arr[$i] = $i;
		}
		
		return $arr;
	}
}

if ( !function_exists( 'count_answers' ) ) {
	function count_answers( $arr )
	{
		if ( !is_array( $arr ) ) {
			$arr = json_decode( $arr, TRUE );
		}
		$count = 0;
		if ( $arr ) {
			foreach ( $arr as $item ) {
				foreach ( $item as $i ) {
					$count += count( $i );
				}
			}
		}
		return $count;
	}
}

if ( !function_exists( 'extract_qus_ans' ) ) {
	function extract_qus_ans( $arr, $id, $index )
	{
		if ( !is_array( $arr ) ) {
			$arr = json_decode( $arr, TRUE );
		}
		if ( $arr ) {
			foreach ( $arr as $item ) {
				if ( array_key_exists( $id, $item ) ) {
					if ( is_array( $item[$id] ) ) {
						if ( array_key_exists( $index, $item[$id] ) ) {
							$ans = $item[$id][$index];
							return $ans;
						}
					} else {
						$ans = $item[$id];
						return $ans;
					}
					
				}
			}
		}
		
		return FALSE;
	}
}

if ( !function_exists( 'add_to_datetime' ) ) {
	function add_to_datetime( $increment )
	{
		return date( 'Y-m-d H:i:s', strtotime( "$increment" ) );
	}
}

if ( !function_exists( 'exam_status' ) ) {
	function exam_status( $id = NULL )
	{
		$array = [
			'' => "Select Status",
			0  => "Inactive",
			1  => "Complete",
			8  => "Started",
			9  => "Open",
		];
		
		if ( $id || $id === 0 ) {
			if ( array_key_exists( $id, $array ) ) {
				return $array[$id];
			} else {
				return FALSE;
			}
		} else {
			return $array;
		}
	}
}


if ( !function_exists( 'show_exam_status' ) ) {
	function show_exam_status( $status = NULL )
	{
		$class = 'default';
		if ( $status == 1 ) {
			$class = "warning";
		} elseif ( $status == 0 ) {
			$class = "danger";
		} elseif ( $status == 8 ) {
			$class = "info";
		} elseif ( $status == 9 ) {
			$class = "success";
		}
//		echo $status;
		return "<label class='label label-{$class}'>" . exam_status( $status ) . "</label>";
	}
}

if ( !function_exists( 'package_status' ) ) {
	function package_status( $id = NULL )
	{
		$array = [
			'' => "Select Status",
			0  => "Inactive",
			1  => "Open",
		];
		
		if ( $id || $id === 0 ) {
			if ( array_key_exists( $id, $array ) ) {
				return $array[$id];
			} else {
				return FALSE;
			}
		} else {
			return $array;
		}
	}
}


if ( !function_exists( 'show_package_status' ) ) {
	function show_package_status( $status = NULL )
	{
		$class = 'default';
		if ( $status == 1 ) {
			$class = "success";
		} else {
			$class = "warning";
		}
//		echo $status;
		return "<label class='label label-{$class}'>" . package_status( $status ) . "</label>";
	}
}

if ( !function_exists( 'data_status' ) ) {
	function data_status( $id = NULL )
	{
		$array = [
			'' => "Select Status",
			1  => "Active",
			2  => "Inactive",
		];
		
		if ( $id || $id === 0 ) {
			if ( array_key_exists( $id, $array ) ) {
				return $array[$id];
			} else {
				return FALSE;
			}
		} else {
			return $array;
		}
	}
}


if ( !function_exists( 'show_data_status' ) ) {
	function show_data_status( $status = NULL )
	{
		$class = 'default';
		if ( $status == 1 ) {
			$class = "success";
		} else {
			$class = "default";
		}
//		echo $status;
		return "<label class='label label-{$class}'>" . data_status( $status ) . "</label>";
	}
}

if ( !function_exists( 'get_file_extension' ) ) {
	function get_file_extension( $filename )
	{
		$exp  = explode( '.', $filename );
		$ext  = $exp[count( $exp ) - 1];
		$type = "";
		if ( $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif' ) {
			$type = 'img';
		} else if ( $ext == 'pdf' ) {
			$type = 'pdf';
		}
		
		return $type;
	}
}
if ( !function_exists( 'time_difference' ) ) {
	function time_difference( $start, $end )
	{
		$from     = new DateTime( $start );
		$to       = new DateTime( $end );
		$interval = $from->diff( $to );
		return $interval->format( "%I:%S" );
	}
}

if ( !function_exists( 'objectToArray' ) ) {
	function objectToArray( $d )
	{
		if ( is_object( $d ) ) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars( $d );
		}
		
		if ( is_array( $d ) ) {
			/*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
			return array_map( __FUNCTION__, $d );
		} else {
			// Return array
			return $d;
		}
	}
}
if ( !function_exists( 'arrayToObject' ) ) {
	function arrayToObject( $d )
	{
		if ( is_array( $d ) ) {
			/*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
			return (object) array_map( __FUNCTION__, $d );
		} else {
			// Return object
			return $d;
		}
	}
}

if ( !function_exists( 'is_free_exam' ) ) {
	function is_free_exam( $exam_id )
	{
		$ci =& get_instance();
		
		$query = $ci->db->get_where( 'oe_doc_exams', ['id' => $exam_id, 'is_free' => 1] );
		
		return $query->num_rows() ? TRUE : FALSE;
	}
}

if ( !function_exists( 'get_institute_color_class' ) ) {
	function get_institute_color_class( $sl )
	{
		$class = "";
		switch ( $sl ) {
			case 1 :
				$class = 'bg-yellow';
				break;
			case 2 :
				$class = 'bg-orange';
				break;
			case 3 :
				$class = 'bg-pink';
				break;
			case 4 :
				$class = 'bg-green';
				break;
		}
		
		return $class;
	}
}

if ( !function_exists( 'get_highest_mark' ) ) {
	function get_highest_mark( $exam_id )
	{
		$ci =& get_instance();
		
		$query = $ci->db->select( 'MAX(final_mark) highest_mark' )->get_where( 'oe_doc_exams', ['exam_id' => $exam_id, 'status' => 1] );
		
		return $query->row()->highest_mark;
	}
}

if ( !function_exists( 'get_total_examine' ) ) {
	function get_total_examine( $exam_id )
	{
		$ci =& get_instance();
		
		$query = $ci->db->select( 'id' )->get_where( 'oe_doc_exams', ['exam_id' => $exam_id, 'status' => 1] );
		
		return $query->num_rows();
	}
}

if ( !function_exists( 'get_package_names' ) ) {
	function get_package_names( $package_ids = NULL, $deli = ',' )
	{
		if ( $package_ids ) {
			$ci =& get_instance();
			if ( !is_array( $package_ids ) ) $package_ids = json_decode( $package_ids, TRUE );
			$ci->db->select( ['name'] );
			$ci->db->where_in( 'id', $package_ids );
			$query = $ci->db->get( 'oe_package' );
			
			if ( $query->num_rows() ) {
				$results = $query->result_array();
				return implode( $deli, array_column( $results, 'name' ) );
			}
		}
		return FALSE;
	}
}


//new
if ( !function_exists( 'get_package_type' ) ) {
	function get_package_type( $package_ids = NULL, $deli = ',' )
	{
		if ( $package_ids ) {
			$ci =& get_instance();
			if ( !is_array( $package_ids ) ) $package_ids = json_decode( $package_ids, TRUE );	
			$ci->db->select( ['sm_ad'] );
			$ci->db->where_in( 'id', $package_ids );
			$query = $ci->db->get( 'oe_package' );
			
			if ( $query->num_rows() ) {
				$results = $query->result_array();
				return implode( $deli, array_column( $results, 'sm_ad' ) );
			}
		}
		return FALSE;
	}	
}

