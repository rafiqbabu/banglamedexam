<?php
/**
 * Created by PhpStorm.
 * User: nahian
 * Date: 11/23/17
 * Time: 1:20 PM
 * @property Mod_file_upload $Mod_file_upload
 * @property Mod_common      $Mod_common
 * @property Mod_email       $Mod_email
 * @property Mod_package     $Mod_package
 * @property payment         $payment
 */

class Mod_examinee extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model( 'Mod_file_upload' );
	}
	
//new 
	/*
	public function all_exam_info()
	{
		$id = $this->session->userdata( 'user' )->id;
		$query = $this->db->where( 'doc_id', $id )
							->where( 'status', 1 )
						  	->get( 'oe_doc_exams' );

	}
    */


	public function update_user_profile( $id )
	{
		$response = ['status' => FALSE, 'msg' => NULL];
		
		if ( $this->input->post() ) {
			$data = [
				'name'            => $this->input->post( 'name', TRUE ),
				'bmdc_no'         => $this->input->post( 'bmdc_no', TRUE ),
				'phone'           => $this->input->post( 'phone', TRUE ),
				'dob'             => date( 'Y-m-d', strtotime( $this->input->post( 'dob', TRUE ) ) ),
				'blood_group'     => $this->input->post( 'blood_group' ),
				'gender'          => $this->input->post( 'gender' ),
				'father_name'     => $this->input->post( 'father_name', TRUE ),
				'mother_name'     => $this->input->post( 'mother_name', TRUE ),
				'nid'             => $this->input->post( 'nid', TRUE ),
				'passport_no'     => $this->input->post( 'passport_no', TRUE ),
				'medical_college' => $this->input->post( 'medical_college' ),
				'job_desc'        => $this->input->post( 'job_desc', TRUE ),
			];
			
			// Profie Photo Upload
			if ( $_FILES['photo']['error'] == 0 && $_FILES['photo']['size'] > 0 ) {
				$photo = $this->Mod_file_upload->upload_file( 'users', 'photo', ['size' => '500', 'width' => '1000', 'height' => '1000'] );
				
				if ( $photo['status'] ) {
					$data['photo'] = $photo['path'];
				} else {
					$response['msg'] = $photo['msg'];
				}
			}
			
			$this->db->trans_start();
			
			// Update master table
			$this->db->where( 'id', $id )->update( 'oe_doc_master', $data );
			
			// Delete Previous saved address
			$this->db->where( 'doc_id', $id )->delete( 'oe_doc_address' );
			
			// Insert Address
			$present   = $this->input->post( 'present', TRUE );
			$permanent = $this->input->post( 'permanent', TRUE );
			$arr       = [
				'doc_id' => $id,
				'status' => 1
			];
			$address   = [
				$arr + $present + ['type' => 1],
				$arr + $permanent + ['type' => 2]
			];
			$this->db->insert_batch( 'oe_doc_address', $address );
			
			// Delete Old Education
			$this->db->where( 'doc_id', $id )->delete( 'oe_doc_educations' );
			//Insert Education
			$exam      = $this->input->post( 'exam', TRUE );
			$exam_data = [];
			
			foreach ( $exam as $item ) {
				$item['doc_id'] = $id;
				$item['status'] = 1;
//                $exam_data[] = $item;
				$this->db->insert( 'oe_doc_educations', $item );
			}
			
			// Delete Old Reference
			$this->db->where( 'doc_id', $id )->delete( 'oe_doc_referance' );
			
			// Insert New reference
			$refs = $this->input->post( 'ref', TRUE );
			foreach ( $refs as $ref ) {
				$ref['doc_id'] = $id;
				$ref['status'] = 1;
				$this->db->insert( 'oe_doc_referance', $ref );
			}
			
			if ( $this->db->trans_status() === TRUE ) {
				$this->db->trans_commit();
				$response['status'] = TRUE;
				$response['msg']    = "Profile Information Updated.";
//                $flash = ['msg_type' => 'success', 'msg' => $response['msg']];
//                $this->session->set_flashdata($flash);
			} else {
				$this->db->trans_rollback();
				$response['msg'] = "Sorry! Profile Information Cannot Update. Please Try again.";
			}
		}
		return $response;
	}
	
	public function change_password( $id )
	{
		$response = ['status' => FALSE, 'msg' => NULL];
		if ( $pass = $this->input->post( 'password', TRUE ) ) {
			$data = [
				'password' => makeMyPassword( $pass ),
				'pass_view' => $pass,
			];
			
			$flag = $this->db->where( 'id', $id )->update( 'oe_doc_master', $data );
			
			if ( $flag ) {
				$response['status'] = TRUE;
				$response['msg']    = "Password Changed";
			} else {
				$response['msg'] = "Sorry! Your Password cannot be changed right now. Please Try again.";
			}
		}
		return $response;
	}
	



	public function save_exam_data( $id )
	{
		$response = ['status' => FALSE, 'msg' => NULL];
		if ( $this->input->post() ) {
			
			$exams        = $this->input->post( 'exam', TRUE );
			$institute_id = $this->input->post( 'institute_id', TRUE );
			$course_id    = $this->input->post( 'course_id', TRUE );
			$faculty_id   = $this->input->post( 'faculty_id', TRUE );
			$subject_id   = $this->input->post( 'subject_id', TRUE );
			$coupon_code  = $this->input->post( 'coupon_code', TRUE );
			
			// starting the transaction
			$this->db->trans_start();
			try {
				$types = $this->Mod_common->get_exam_types( array_column( $exams, 'id' ) );
				
				$valid  = TRUE;
				$coupon = NULL;
				if ( $coupon_code ) {
					$valid = FALSE;
					$this->load->model( 'Mod_coupon' );
					$coupon = $this->Mod_coupon->get_valid_coupon_details( $coupon_code );
					
					if ( $coupon ) {
						if ( $coupon->times_allowed > $coupon->times_used ) {
							$valid = TRUE;
							// Update Coupon Code Use Count
							$this->Mod_coupon->update_coupon_use_count( $coupon );
						} else {
							$response['msg'] = "Coupon is not valid";
						}
						
					} else {
						$response['msg'] = "Coupon is not valid";
					}
					
				}
				
				if ( $valid ) {
					
					$exam_array = [];
					$pi_no      = $this->Mod_common->generate_purchase_invoice_no();
					
					$purchase_array = [
						'pi_no'          => $pi_no,
						'doc_id'         => $id,
						'subject_id'     => $subject_id,
						'exam_count'     => 0,
						'cost_bdt'       => 0,
						'cost_usd'       => 0,
						'discount'       => $coupon ? $coupon->discount : 0,
						'final_cost_bdt' => 0,
						'final_cost_usd' => 0,
						'payment_status' => 0,
						'status'         => 1
					];
					
					$eids = [];
					$sl   = 0;
					foreach ( $exams as $k => $exam ) {
						$available_exams = $this->Mod_common->get_available_exams( $institute_id, $course_id, $faculty_id, $subject_id, $exam['id'] );
						if ( $available_exams && $exam['count'] <= count( $available_exams ) ) {
							$purchase_array['exam_count'] += $exam['count'];
							$purchase_array['cost_bdt']   += ( $exam['count'] * $types[$sl]->cost_bdt );
							$purchase_array['cost_usd']   += ( $exam['count'] * $types[$sl]->cost_usd );
							for ( $i = 1; $i <= $exam['count']; $i++ ) {
								array_push( $eids, $available_exams[$i - 1]->id );
								$exam_array[] = [
									'doc_id'       => $id,
									'institute_id' => $institute_id,
									'course_id'    => $course_id,
									'faculty_id'   => $faculty_id,
									'subject_id'   => $subject_id,
									'exam_type_id' => $exam['id'],
									'exam_id'      => $available_exams[$i - 1]->id,
									'duration'     => intval( $available_exams[$i - 1]->time ),
									'cost_bdt'     => $types[$sl]->cost_bdt,
									'cost_usd'     => $types[$sl]->cost_usd,
									'discount'     => 0,
									'cost_final'   => $types[$sl]->cost_bdt,
									'status'       => 9
								];
							}
						}
						$sl++;
					}
					$purchase_array['exam_ids'] = json_encode( $eids );
					
					
					// Final cost Calculation
					$dis_bdt                          = $purchase_array['discount'] ? ( $purchase_array['cost_bdt'] * $purchase_array['discount'] ) / 100 : 0;
					$dis_usd                          = $purchase_array['discount'] ? ( $purchase_array['cost_usd'] * $purchase_array['discount'] ) / 100 : 0;
					$purchase_array['final_cost_bdt'] = $purchase_array['cost_bdt'] - $dis_bdt;
					$purchase_array['final_cost_usd'] = $purchase_array['cost_usd'] - $dis_usd;
					
					$this->db->insert( 'oe_doc_purchases', $purchase_array );
					$ins_id         = $this->db->insert_id();
					$response['id'] = $ins_id;
					$data           = [];
					foreach ( $exam_array as $item ) {
						$item['purchase_id'] = $ins_id;
//                        $data[]              = $item;
						$this->db->insert( 'oe_doc_exams', $item );
					}
					
					if ( $this->db->trans_status() == TRUE ) {
						$this->db->trans_complete();
						$this->db->trans_commit();
						$response['status'] = TRUE;
						$response['reset']  = TRUE;
//                        $response['msg']    = "Exam Purchase Complete.";
//                        $msg                = ['msg_type' => 'info', 'msg' => $response['msg']];
//                        $this->session->set_flashdata( $msg );
					} else {
						$this->db->trans_rollback();
						$response['msg'] = "Sorry! Something Went Wrong! Please Try Again.";
					}
				}
			} catch ( Exception $exception ) {
				$this->db->trans_rollback();
				$response['msg'] = "Sorry! Something Went Wrong! Please Try Again.";
			}
		}
		return $response;
	}
	



	public function save_package_data( $id )
	{
		$response = ['status' => FALSE, 'msg' => NULL];
		if ( $this->input->post() ) {
			
			$package_ids  = $this->input->post( 'package', TRUE );
			$institute_id = $this->input->post( 'institute_id', TRUE );
			$course_id    = $this->input->post( 'course_id', TRUE );
			$faculty_id   = $this->input->post( 'faculty_id', TRUE );
			$subject_id   = $this->input->post( 'subject_id', TRUE );
			$coupon_code  = $this->input->post( 'coupon_code', TRUE );
			$p_type  	  = get_package_type( $package_ids ); //new
			$candidate    = $this->input->post( 'candidate2', TRUE ); //new
			
			$this->load->model( 'Mod_package' );
			
			$this->db->trans_start();
			try {
				$packages = $this->Mod_package->get_packages_by_ids_subject( $package_ids, $subject_id );
				$valid    = TRUE;
				$coupon   = NULL;
				if ( $coupon_code ) {
					$valid = FALSE;
					$this->load->model( 'Mod_coupon' );
					$coupon = $this->Mod_coupon->get_valid_coupon_details( $coupon_code );
					
					if ( $coupon ) {
						if ( $coupon->times_allowed > $coupon->times_used ) {
							$valid = TRUE;
							// Update Coupon Code Use Count
							$this->Mod_coupon->update_coupon_use_count( $coupon );
						} else {
							$response['msg'] = "Coupon is not valid";
						}
						
					} else {
						$response['msg'] = "Coupon is not valid";
					}
					
				}
				
				if ( $valid ) {
					$exam_array = [];
					
					$pi_no = $this->Mod_common->generate_purchase_invoice_no();
					/** @noinspection PhpLanguageLevelInspection */
					$purchase_array = [
						'pi_no'          => $pi_no,
						'doc_id'         => $id,
						'subject_id'     => $subject_id,
						'currency'       => "BDT",
						'exam_count'     => 0,
						'cost_bdt'       => 0,
						'cost_usd'       => 0,
						'discount'       => $coupon ? $coupon->discount : 0,
						'final_cost_bdt' => 0,
						'final_cost_usd' => 0,
						'payment_status' => 0,
						'status'         => 1,
						'p_type'		 => $p_type //new
					];
					$eids           = [];
					$sl             = 0;
					foreach ( $packages as $k => $package ) {
//                    $available_exams = $this->Mod_common->get_available_exams( $institute_id, $course_id, $faculty_id, $subject_id);
//                    die(json_encode($package));
//                    if ( $available_exams && $exam['count'] <= count( $available_exams ) ) {
						$exam_count                   = count( $package->exam_ids );
						$purchase_array['exam_count'] += $exam_count;
						$purchase_array['cost_bdt']   += $package->amount_bdt;
						$purchase_array['cost_usd']   += $package->amount_usd;
						
						foreach ( $package->exam_ids as $exam_id ) {
							$exam_type    = explode( '.', $exam_id );
							$exam         = $this->Mod_common->get_row_data_by_id( 'oe_exam', $exam_type[1] );
							$exam_array[] = [
								'doc_id'       => $id,
								'package_id'   => $package->id,
								'institute_id' => $institute_id,
								'course_id'    => $course_id,
								'faculty_id'   => $faculty_id,
								'subject_id'   => $subject_id,
								'exam_type_id' => $exam->exam_id,
								'exam_id'      => $exam->id,
								'duration'     => intval( $exam->time ),
								'cost_bdt'     => $package->amount_bdt / $exam_count,
								'cost_usd'     => $package->amount_usd / $exam_count,
								'discount'     => 0,
								'cost_final'   => $package->amount_bdt / $exam_count,
								'status'       => 9,
								'pack_year'    => $package->year,
								'session'      => $package->session,
								'sm_ad'        => $package->sm_ad,
								'is_sif'       => 0,
								'candidate'    => $candidate
							];
							
							array_push( $eids, $exam->id );
						}
					}
					$purchase_array['exam_ids']    = json_encode( $eids );
					$purchase_array['package_ids'] = json_encode( array_values( $package_ids ) );
					
					// Final cost Calculation
					$dis_bdt                          = $purchase_array['discount'] ? ( $purchase_array['cost_bdt'] * $purchase_array['discount'] ) / 100 : 0;
					$dis_usd                          = $purchase_array['discount'] ? ( $purchase_array['cost_usd'] * $purchase_array['discount'] ) / 100 : 0;
					$purchase_array['final_cost_bdt'] = $purchase_array['cost_bdt'] - $dis_bdt;
					$purchase_array['final_cost_usd'] = $purchase_array['cost_usd'] - $dis_usd;
					
					$this->db->insert( 'oe_doc_purchases', $purchase_array );
					$ins_id         = $this->db->insert_id();
					$response['id'] = $ins_id;
					$data           = [];
					foreach ( $exam_array as $item ) {
						$item['purchase_id'] = $ins_id;
						$data[]              = $item;
					}
					$this->db->insert_batch( 'oe_doc_exams', $data );
					
					if ( $this->db->trans_status() == TRUE ) {
						$this->db->trans_complete();
						$this->db->trans_commit();
						$response['status'] = TRUE;
						$response['reset']  = TRUE;
						$response['msg']    = "To Complete Package Purchase Please fill up the form and make the Payment.";
						$msg                = ['msg_type' => 'success', 'msg' => $response['msg']];
						$this->session->set_flashdata( $msg );
					} else {
						$this->db->trans_rollback();
						$response['msg'] = "Sorry! Something Went Wrong! Please Try Again.";
					}
				}
			} catch ( Exception $exception ) {
				$this->db->trans_rollback();
				$response['msg'] = "Sorry! Something Went Wrong! Please Try Again.";
			}
		}
		return $response;
	}
	
	public function get_user_exams_with_purchase( $id = NULL, $limit = 20, $row = 0 )
	{
		if ( !$id ) {
			$id = $this->session->userdata( 'user' )->id;
		}
		
		$query = $this->db->where( 'doc_id', $id )
						  ->order_by( 'created_at', 'DESC' )
						  ->where( 'package_ids', NULL )
						  ->get( 'oe_doc_purchases', $limit, $row );
		
		if ( $query->num_rows() > 0 ) {
			$purchases = $query->result();
			
			foreach ( $purchases as $purchase ) {
				$purchase->exams = $this->get_user_exams( $id, $purchase->id, $purchase->subject_id );
			}
			
			return $purchases;
		}
		
		return FALSE;
	}
	
	public function count_user_exams_with_purchase( $id = NULL )
	{
		if ( !$id ) {
			$id = $this->session->userdata( 'user' )->id;
		}
		
		$query = $this->db->where( 'doc_id', $id )
						  ->order_by( 'created_at', 'DESC' )
						  ->where( 'package_ids', NULL )
						  ->get( 'oe_doc_purchases' );
		
		return $query->num_rows();
	}
	
	public function get_user_packages_with_purchase( $id = NULL, $limit = 20, $row = 0 )
	{
		if ( !$id ) {
			$id = $this->session->userdata( 'user' )->id;
		}
		
		$query = $this->db->where( 'doc_id', $id )
						  ->order_by( 'created_at', 'DESC' )
						  ->where( 'package_ids !=', NULL )
						  ->get( 'oe_doc_purchases', $limit, $row );
		
		if ( $query->num_rows() > 0 ) {
			$purchases = $query->result();
			
			foreach ( $purchases as $purchase ) {
				$purchase->exams = $this->get_user_package_exams( $purchase->package_ids, $purchase->subject_id, $purchase->id );
			}
			
			return $purchases;
		}
		
		return FALSE;
	}
	
	public function count_user_packages_with_purchase( $id = NULL )
	{
		if ( !$id ) {
			$id = $this->session->userdata( 'user' )->id;
		}
		
		$query = $this->db->where( 'doc_id', $id )
						  ->order_by( 'created_at', 'DESC' )
						  ->where( 'package_ids !=', NULL )
						  ->get( 'oe_doc_purchases' );
		
		return $query->num_rows();
	}
	
	public function get_user_package_exams( $package_ids = NULL, $subject_id = NULL, $purchase_id = NULL )
	{
		if ( $package_ids && $subject_id && $purchase_id ) {
			if ( !is_array( $package_ids ) ) {
				$package_ids = json_decode( $package_ids, TRUE );
			}
			$this->db->select( ['E.*', 'P.name package_name', 'P.id package_id', 'PE.id pe_id'] );
//			$this->db->select( ['DE.ans_open_timeout', 'DE.status de_status', 'DE.id de_id'] );
			$this->db->where_in( 'PE.package_id', $package_ids );
			$this->db->where_in( 'E.subject_id', $subject_id );
//			$this->db->where( 'DE.purchase_id', $purchase_id );
			$this->db->join( 'oe_exam E', 'E.id = PE.exam_id', 'LEFT', FALSE );
			$this->db->join( 'oe_package P', 'P.id = PE.package_id', 'LEFT', FALSE );
			$this->db->order_by( 'PE.id', 'ASC' );
//			$this->db->join( 'oe_doc_exams DE', 'PE.exam_id = DE.exam_id and PE.package_id=DE.package_id', 'LEFT', FALSE );
			$query = $this->db->get( 'oe_package_exams PE' );
//			print_r($this->db->last_query()); exit;
			if ( $query->num_rows() ) {
				$results = $query->result();
				
				foreach ( $results as $result ) {
					$query = $this->db->select( ['DE.ans_open_timeout', 'DE.status de_status', 'DE.id de_id'] )
									  ->where( 'DE.purchase_id', $purchase_id )
									  ->where( 'DE.exam_id', $result->id )
									  ->get( 'oe_doc_exams DE' );
					
					$row = $query->num_rows() ? $query->row() : NULL;
					
					$result->ans_open_timeout = $row ? $row->ans_open_timeout : NULL;
					$result->de_status        = $row ? $row->de_status : 9;
					$result->de_id            = $row ? $row->de_id : NULL;
					
				}
				
				return $results;
			}
		}
		
		return FALSE;
	}
	
public function get_user_exam_histories( $id = NULL )
	{
		
		if ( !$id ) {
			$id = $this->session->userdata( 'user' )->id;
		}
		
		$query = $this->db->where( 'status', 1 )
						  ->where( 'doc_id', $id )
//						  ->where( 'is_free', 0 )
						  ->order_by( 'attend_date', 'desc' )
						  ->order_by( 'exam_type_id' )
						  ->get( 'oe_doc_exams');
		
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		
		return FALSE;
	}

	



	public function get_user_purchased_exams( $purchase_id, $user_id = NULL )
	{
		if ( !$user_id ) {
			$user_id = $this->session->userdata( 'user' )->id;
		}
		
		$query = $this->db->where( 'doc_id', $user_id )
						  ->where( 'id', $purchase_id )
						  ->where( 'payment_status', 1 )
						  ->order_by( 'created_at', 'DESC' )
						  ->get( 'oe_doc_purchases' );
		
		if ( $query->num_rows() > 0 ) {
			$purchase = $query->row();
			
			$purchase->exams = $this->get_user_exams( $user_id, $purchase->id );
			
			return $purchase;
		}
		
		return FALSE;
	}
	
	public function get_user_notices( $id = NULL )
	{
		if ( !$id ) {
			$id = $this->session->userdata( 'user' )->id;
		}
		
		$query = $this->db->select( 'N.id id, N.doc_id, N.type, , N.title, N.details, N.attachment, N.created_at' )
//                          ->where( 'DN.doc_id', $id )
						  ->where_in( 'N.status', 1 )
						  ->order_by( 'N.type' )
						  ->order_by( 'N.created_at', 'DESC' )
//                          ->join( 'oe_notice N', 'N.id = DN.notice_id' )
						  ->get( 'oe_notice N' );
		
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		
		return FALSE;
	}

//    public function get_user_notices( $id = NULL )
//    {
//        if ( !$id ) {
//            $id = $this->session->userdata( 'user' )->id;
//        }
//
//        $query = $this->db->select( 'N.id id, N.doc_id, N.type, , N.title, N.details, N.attachment, N.created_at, DN.status ' )
//                          ->where( 'DN.doc_id', $id )
//                          ->where( 'N.status', 1 )
//                          ->order_by( 'N.type' )
//                          ->order_by( 'N.created_at', 'DESC' )
//                          ->join( 'oe_notice N', 'N.id = DN.notice_id' )
//                          ->get( 'oe_doc_notice DN' );
//
//        if ( $query->num_rows() > 0 ) {
//            return $query->result();
//        }
//
//        return FALSE;
//    }
	
	public function get_user_notice( $id = NULL, $nid )
	{
		if ( !$id ) {
			$id = $this->session->userdata( 'user' )->id;
		}
		
		$query = $this->db->select( 'N.id id, N.doc_id, N.type, , N.title, N.details, N.attachment, N.created_at' )
//						  ->where( 'DN.doc_id', $id )
						  ->where( 'N.id', $nid )
						  ->where( 'N.status', 1 )
						  ->order_by( 'N.type' )
						  ->order_by( 'N.created_at', 'DESC' )
//						  ->join( 'oe_notice N', 'N.id = DN.notice_id' )
						  ->get( 'oe_notice N' );
		
		if ( $query->num_rows() > 0 ) {
			return $query->row();
		}
		
		return FALSE;
	}

//	public function get_user_notice( $id = NULL, $nid )
//	{
//		if ( !$id ) {
//			$id = $this->session->userdata( 'user' )->id;
//		}
//
//		$query = $this->db->select( 'N.id id, N.doc_id, N.type, , N.title, N.details, N.attachment, N.created_at, DN.status ' )
//						  ->where( 'DN.doc_id', $id )
//						  ->where( 'N.id', $nid )
//						  ->where( 'N.status', 1 )
//						  ->order_by( 'N.type' )
//						  ->order_by( 'N.created_at', 'DESC' )
//						  ->join( 'oe_notice N', 'N.id = DN.notice_id' )
//						  ->get( 'oe_doc_notice DN' );
//
//		if ( $query->num_rows() > 0 ) {
//			return $query->row();
//		}
//
//		return FALSE;
//	}
	
	public function change_user_notice_status( $id, $nid )
	{
		return $this->db->update( 'oe_doc_notice', ['status' => 1], ['doc_id' => $id, 'notice_id' => $nid] );
	}
	
	public function get_examinee_id($bmdc_no){
	             
	             $this->db->where( 'bmdc_no', $bmdc_no );
	             $this->db->where('status',1);
	             $this->db->order_by('id','DESC');
				 $query = $this->db->get( 'oe_doc_master',1 );
		if ( $query->num_rows() > 0 ) {
		    
			$results = $query->result()[0];
			return $results;
		}
		
		return FALSE;
	    
	}
	
	public function get_user_exam_with_purchase( $id = NULL, $pid )
	{
		if ( !$id ) {
			$id = $this->session->userdata( 'user' )->id;
		}
		
		$query = $this->db->where( 'doc_id', $id )
						  ->where( 'id', $pid )
						  ->order_by( 'created_at', 'DESC' )
//                          ->order_by('payment_status', 'ASC')
						  ->get( 'oe_doc_purchases' );
		
		if ( $query->num_rows() == 1 ) {
			$purchase = $query->row();
			
			$purchase->exams = $this->get_user_exams( $id, $purchase->id );
			
			return $purchase;
		}
		
		return FALSE;
	}
	
	public function get_user_exams( $id = NULL, $purchase_id = NULL, $subject_id = NULL )
	{
		
		if ( !$id ) {
			$id = $this->session->userdata( 'user' )->id;
		}
		
		$this->db->where( 'status !=', 0 );
		$this->db->where( 'doc_id', $id );
		$this->db->where( 'purchase_id', $purchase_id );
		$this->db->where( 'subject_id', $subject_id );
		$this->db->order_by( 'package_id, exam_type_id' );
		$query = $this->db->get( 'oe_doc_exams' );
		
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		
		return FALSE;
	}
	
	public function get_package_exams( $ids )
	{
		
		if ( $ids ) {
			$exam_ids = json_decode( $ids );
			$this->db->select( ['E.*'] );
			$this->db->where( 'E.status', 1 );
			$this->db->where_in( 'E.id', $exam_ids );
			$this->db->order_by( 'E.created_by' );
			$query = $this->db->get( 'oe_exam E' );
			
			if ( $query->num_rows() > 0 ) {
				return $query->result();
			}
		}
		
		return FALSE;
	}
	
	public function get_user_exam_history( $id = NULL, $limit = 20, $row = 0 )
	{
		
		if ( !$id ) {
			$id = $this->session->userdata( 'user' )->id;
		}
		
		$query = $this->db->where( 'status', 1 )
						  ->where( 'doc_id', $id )
//						  ->where( 'is_free', 0 )
						  ->order_by( 'attend_date', 'desc' )
						  ->order_by( 'exam_type_id' )
						  ->get( 'oe_doc_exams', $limit, $row );
		
		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}
		
		return FALSE;
	}
	
	public function count_user_exam_history( $id = NULL )
	{
		
		if ( !$id ) {
			$id = $this->session->userdata( 'user' )->id;
		}
		
		$query = $this->db->where( 'status', 1 )
						  ->where( 'doc_id', $id )
//						  ->where( 'is_free', 0 )
						  ->order_by( 'attend_date', 'desc' )
						  ->order_by( 'exam_type_id' )
						  ->get( 'oe_doc_exams' );
		
		return $query->num_rows();
	}
	
	public function get_user_exam_data( $exam_id, $id = NULL )
	{
		
		if ( !$id ) {
			$id = $this->session->user->id;
		}
		
		$query = $this->db->where( 'status >=', 8 )
						  ->where( 'doc_id', $id )
						  ->where( 'id', $exam_id )
						  ->order_by( 'exam_type_id' )
						  ->get( 'oe_doc_exams' );
		
		if ( $query->num_rows() == 1 ) {
			$doc_exam            = $query->row();
			$doc_exam->exam_data = $this->Mod_common->get_row_data_by_id( 'oe_exam', $doc_exam->exam_id );
			return $doc_exam;
		}
		
		return FALSE;
		
	}

	public function get_user_free_exam_data( $exam_id )
	{
		
		$id = $this->session->user->id;
		
		$query = $this->db->where( 'status', 1 )
						  ->where( 'free_exam', 1 )
						  ->where( 'id', $exam_id )
						  ->get( 'oe_exam' );
		
		if ( $query->num_rows() > 0 ) {
			$exam = $query->row();
			
			$exam_array = [
				'doc_id'       => $id,
				'institute_id' => $exam->institute_id,
				'course_id'    => $exam->course_id,
				'faculty_id'   => $exam->faculty_id,
				'subject_id'   => $exam->subject_id,
				'exam_type_id' => $exam->exam_id,
				'exam_id'      => $exam->id,
				'duration'     => intval( $exam->time ),
				'cost_bdt'     => 0,
				'cost_usd'     => 0,
				'discount'     => 0,
				'cost_final'   => 0,
				'is_free'      => 1,
				'status'       => 9
			];
			
			$this->db->insert( 'oe_doc_exams', $exam_array );
			
			if ( $this->db->affected_rows() == 1 ) {
				return $this->db->insert_id();
			}
		}
		
		return FALSE;
		
	}
	
	public function get_sif_exam_data( $exam_id, $candidate )
	{
		
		$id = $this->session->user->id;
		
		$query = $this->db->where( 'status', 1 )
						  ->where( 'free_exam', 0 )
						  ->where( 'is_sif', 1 )
						  ->where( 'id', $exam_id )
						  ->get( 'oe_exam' );
		
		if ( $query->num_rows() > 0 ) {
			$exam = $query->row();
			$topic_code = $_SESSION['topic_code'];
			$exam_array = [
				'doc_id'       => $id,
				'institute_id' => $exam->institute_id,
				'course_id'    => $exam->course_id,
				'faculty_id'   => $exam->faculty_id,
				'subject_id'   => $exam->subject_id,
				'exam_type_id' => $exam->exam_id,
				'exam_id'      => $exam->id,
				'duration'     => intval( $exam->time ),
				'cost_bdt'     => 0,
				'cost_usd'     => 0,
				'discount'     => 0,
				'cost_final'   => 0,
				'is_free'      => 0,
				'pack_year'    => date("Y"),
				'status'       => 9,
				'is_sif'       => 1,
				'candidate'    => $candidate,
				'exam_comm_code' => $exam->exam_comm_code,
				'topic_code'	=> $topic_code
			];
			
			$this->db->insert( 'oe_doc_exams', $exam_array );
			
			if ( $this->db->affected_rows() == 1 ) {
				return $this->db->insert_id();
			}
		}
		
		return FALSE;
		
	}
	
	public function check_doc_exam_existence( $user_id, $package_id = NULL, $exam_id = NULL )
	{
		if ( $user_id && $package_id && $exam_id ) {
			
			$this->db->where( 'DE.doc_id', $user_id );
			$this->db->where( 'DE.package_id', $package_id );
			$this->db->where( 'DE.exam_id', $exam_id );
			$query = $this->db->get( 'oe_doc_exams DE' );
			
			if ( $query->num_rows() ) {
				return $query->row()->id;
			}
		}
		
		return FALSE;
	}
	
	public function get_user_package_exam_data( $exam_id = NULL, $package_id = NULL, $purchase_id = NULL )
	{
		$id = $this->session->user->id;
		
		$exam = $this->check_doc_exam_existence( $id, $package_id, $exam_id );
		
		if ( !$exam ) {
			$query = $this->db->where( 'status', 1 )
							  ->where( 'id', $exam_id )
							  ->get( 'oe_exam' );
			
			if ( $query->num_rows() > 0 ) {
				$exam = $query->row();
				
				$exam_array = [
					'doc_id'       => $id,
					'package_id'   => $package_id,
					'purchase_id'  => $purchase_id,
					'institute_id' => $exam->institute_id,
					'course_id'    => $exam->course_id,
					'faculty_id'   => $exam->faculty_id,
					'subject_id'   => $exam->subject_id,
					'exam_type_id' => $exam->exam_id,
					'exam_id'      => $exam->id,
					'duration'     => intval( $exam->time ),
					'cost_bdt'     => 0,
					'cost_usd'     => 0,
					'discount'     => 0,
					'cost_final'   => 0,
					'is_free'      => 1,
					'status'       => 9
				];
				
				$this->db->insert( 'oe_doc_exams', $exam_array );
				
				if ( $this->db->affected_rows() == 1 ) {
					return $this->db->insert_id();
				}
			}
			
			return FALSE;
		} else {
			return $exam;
		}
		
	}
	
	public function get_user_exam_result( $exam_id, $where = [] )
	{
		
		$id = $this->session->user->id;
		
		$this->db->where( 'status', 1 );
		$this->db->where( 'doc_id', $id );
		$this->db->where( 'id', $exam_id );
		
		if ( count( $where ) ) $this->db->where( $where );
		
		$query = $this->db->get( 'oe_doc_exams' );
		
		if ( $query->num_rows() == 1 ) {
			$doc_exam            = $query->row();
			$doc_exam->exam_data = $this->Mod_common->get_row_data_by_id( 'oe_exam', $doc_exam->exam_id );
			return $doc_exam;
		}
		
		return FALSE;
		
	}
	
	public function get_user_exam_question_with_answers( $exam_id )
	{
		
		$id = $this->session->userdata( 'user' )->id;
		
		$query = $this->db->where( 'exam_ref_id', $exam_id )
						  ->order_by( 'question_type_id', 'DESC' )
						  ->get( 'oe_exam_question' );
		if ( $query->num_rows() > 0 ) {
			$questions = $query->result_array();
			// Store Question Ids to Session
			$qids = array_column( $questions, 'question_id' );
			$this->session->set_userdata( 'questions', $qids );
			$this->session->set_userdata( 'skipped_questions', [] );
			$this->session->set_userdata( 'ques_count', $qids );
			
			$data['question'] = $this->Mod_common->get_row_data_by_id( 'oe_qsn_bnk_master', $qids[0] );
			$data['answers']  = $this->Mod_common->get_question_anserws( $qids[0] );
			return $data;
		}
		
		return FALSE;
	}
	
	public function get_user_exam_questions_with_answers( $exam_id )
	{
		
		$id = $this->session->userdata( 'user' )->id;
		
		$query = $this->db->select( 'question_id id' )
						  ->where( 'exam_ref_id', $exam_id )
//                          ->order_by( 'id', 'random' )
						  ->get( 'oe_exam_question' );
		
		if ( $query->num_rows() > 0 ) {
			$questions = $query->result();
			$data      = [];
			
			foreach ( $questions as $i => $question ) {
				$data[$i]['question'] = $this->Mod_common->get_row_data_by_id( 'oe_qsn_bnk_master', $question->id );
				$data[$i]['answers']  = $this->Mod_common->get_question_anserws( $question->id );
			}
			
			return $data;
		}
		
		return FALSE;
	}
	
	public function get_question_answers( $qid )
	{
		$query = $this->db->where( 'id', $qid )
						  ->get( 'oe_qsn_bnk_master' );
		
		if ( $query->num_rows() > 0 ) {
			$question         = $query->row();
			$data['question'] = $question;
			$data['answers']  = $this->Mod_common->get_question_anserws( $question->id );
			return $data;
		}
		
		return FALSE;
	}
	



	public function save_exam_answers( $exam_id, $action_name, $doc_exam = NULL )
	{
		$response = ['success' => FALSE, 'redirect' => NULL, 'msg' => NULL];
		if ( $action_name == 'next' ) {
			$qid      = $this->input->post( 'id', TRUE );
			$qtype    = $this->input->post( 'type', TRUE );
			$ans      = $this->input->post( 'ans', TRUE );
			$timer    = $this->input->post( 'timer', TRUE );
			$question = $this->Mod_common->get_row_data_by_id( 'oe_qsn_bnk_master', $qid );
			$exam     = $this->Mod_common->get_row_data_by_id( 'oe_exam', $doc_exam->exam_id );
			$is_valid = $this->Mod_common->exam_time_validation( $doc_exam );
			
			$response['timeout'] = $exam->ans_visible;
			
			if ( $is_valid ) {
				$q_res = $this->session->answers;
				
				if ( $qtype === '1' ) {
					if ( $ans ) {
						if ( $ans === $question->correct_ans ) {
							$correct      = $ans;
							$correct_mark = $exam->sba_value;
						} else {
							$wrong         = $ans;
							$negative_mark = $exam->negative_mark;
						}
					} else {
						$not_answered = TRUE;
					}
				} elseif ( $qtype === '2' ) {
					$correct_ans = $this->get_correct_ans( $question->id );
					if ( is_array( $ans ) ) {
						$mcq_mark      = $exam->mcq_value / 5;
						$correct       = array_intersect_assoc( $correct_ans, $ans );
						$not_answered  = array_diff_key( $correct_ans, $ans );
						$wrong         = array_diff_assoc( $correct_ans, $ans, $not_answered );
						$correct_mark  = count( $correct ) * $mcq_mark;
						$negative_mark = count( $wrong ) * ( $exam->negative_mark / 5 );
					} else {
						$not_answered = $correct_ans;
					}	
				}
				
				$q_res[$question->id] = [
					'ans'           => $ans ? $ans : NULL,
					'correct'       => isset( $correct ) ? $correct : NULL,
					'not_answered'  => isset( $not_answered ) ? $not_answered : NULL,
					'wrong'         => isset( $wrong ) ? $wrong : NULL,
					'correct_mark'  => isset( $correct_mark ) ? $correct_mark : 0,
					'negative_mark' => isset( $negative_mark ) ? $negative_mark : 0
				];
				$this->session->set_userdata( 'answers', $q_res );
				
				$response['success'] = TRUE;
			} else {
				$response['msg'] = "Sorry! Exam Time is Over.";
			}
		} elseif ( $action_name == 'skip' ) {
			$response['success'] = TRUE;
		} else {
			$response['msg'] = "Sorry! Nothing Posted..";
		}
		
		return $response;
	}
	
	public function get_correct_ans( $qid )
	{
		$query = $this->db->select( 'index_seqn,correct_ans' )
						  ->where( 'master_ref_id', $qid )
						  ->order_by( 'index_seqn' )
						  ->get( 'oe_qsn_bnk_ans' );
		
		if ( $query->num_rows() > 0 ) {
			$results = $query->result_array();
			
			return array_column( $results, 'correct_ans', 'index_seqn' );
		}
		
		return FALSE;
	}
	
	public function process_exam_result( $exam_id, $ans_visible, $em_id )
	{
		$answers      = $this->session->answers;
		$ans          = $wrong = $correct = $not_answered = [];
		$correct_mark = $negative_mark = 0;
		
		foreach ( $answers as $i => $answer ) {
			$answer['ans'] ? array_push( $ans, [$i => $answer['ans']] ) : NULL;
			$answer['correct'] ? array_push( $correct, [$i => $answer['correct']] ) : NULL;
			$answer['not_answered'] ? array_push( $not_answered, [$i => $answer['not_answered']] ) : NULL;
			$answer['wrong'] ? array_push( $wrong, [$i => $answer['wrong']] ) : NULL;
			$correct_mark  += $answer['correct_mark'];
			$negative_mark += $answer['negative_mark'];
		}
		$ans_visible = $ans_visible ? $ans_visible : "24";
		$timeout     = add_to_datetime( "+$ans_visible hours" );
		
		$total_mark = $this->Mod_common->get_exam_total_mark( $em_id );
		
		$final_mark = $correct_mark - $negative_mark;
		
		if ( $final_mark > 0 ) {
			$mark_percent = ( $final_mark / $total_mark ) * 100;
		} else {
			$mark_percent = 0;
		}
		
		$data = [
			'answers'          => $ans ? json_encode( $ans ) : NULL,
			'correct'          => $correct ? json_encode( $correct ) : NULL,
			'wrong'            => $wrong ? json_encode( $wrong ) : NULL,
			'not_answered'     => $not_answered ? json_encode( $not_answered ) : NULL,
			'correct_mark'     => $correct_mark,
			'wrong_mark'       => $negative_mark,
			'final_mark'       => $final_mark,
			'attend_date'      => date( 'Y-m-d' ),
			'end_time'         => date( "H:i:s" ),
			'mark_percentage'  => $mark_percent,
			'status'           => 1,
			'ans_open_timeout' => $timeout,
		];
		$this->db->where( 'id', $exam_id )->update( 'oe_doc_exams', $data );
		
		if ( $this->db->affected_rows() > 0 ) {

//            $this->Mod_common->position_calculation();
			
			return TRUE;
		}
		return FALSE;
	}
	
	public function change_user_exam_status( $exam_id, $data )
	{
		if ( !is_array( $data ) ) {
			$data = ['status' => 0, 'start_time' => date( 'H:i:s' )];
		}
		$this->db->where( 'id', $exam_id )->update( 'oe_doc_exams', $data );
		
		if ( $this->db->affected_rows() > 0 ) {
			return TRUE;
		}
		
		return FALSE;
	}
	



	public function payment_process( $user_id, $purchase_id )
	{
		$response = ['status' => FALSE, 'msg' => ''];
		
		$purchase = $this->Mod_common->get_user_purchase( $user_id, $purchase_id );
		
		if ( $purchase ) {
			
			$currency = $this->input->post( 'currency', TRUE );
			
			$cart_items = $this->get_user_cart_items( $user_id, $purchase_id, $currency );
			
			$cost = 0;
			
			if ( $currency === 'BDT' ) {
				$cost = $purchase->final_cost_bdt;
			} elseif ( $currency === 'USD' ) {
				$currency = $purchase->final_cost_usd;
			}
			
			$payment_data = [
				'total_amount' => $cost,
				'currency'     => $currency,
				'tran_id'      => $purchase->pi_no,
				'success_url'  => site_url( "user/{$user_id}/payment-status/1/$purchase_id" ),
				'fail_url'     => site_url( "user/{$user_id}/payment-status/8/$purchase_id" ),
				'cancel_url'   => site_url( "user/{$user_id}/payment-status/9/$purchase_id" ),
				'emi_option'   => 0,
				'cus_name'     => $this->data['user']->name,
				'cus_email'    => $this->input->post( 'email', TRUE ),
				'cus_add1'     => $this->input->post( 'address_1', TRUE ),
				'cus_add2'     => $this->input->post( 'address_2', TRUE ),
				'cus_city'     => $this->input->post( 'district', TRUE ),
				'cus_state'    => $this->input->post( 'division', TRUE ),
				'cus_postcode' => $this->input->post( 'postcode', TRUE ),
				'cus_country'  => $this->input->post( 'country', TRUE ),
				'cus_phone'    => $this->input->post( 'phone', TRUE ),
				'cart'         => $cart_items,
			];
			
			$this->load->library( 'payment' );
			$sslcz = $this->payment->make_payment( $payment_data );
			
			$payment_trans = [
				'doc_id'      => $user_id,
				'purchase_id' => $purchase_id,
				'session_key' => $sslcz['sessionkey']
			];
			
			$this->db->insert( 'oe_payment_trans', $payment_trans );
			$trans_id = $this->db->insert_id();
			$this->session->set_userdata( 'ptrans_id', $trans_id );
			
			if ( isset( $sslcz['GatewayPageURL'] ) && $sslcz['GatewayPageURL'] != "" ) {
				$response['status']      = TRUE;
				$response['redirect_to'] = $sslcz['GatewayPageURL'];
			} else {
				$response['msg'] = 'Someting Went Wrong! Please Try again later.';
			}
			
		} else {
			$response['msg'] = 'User Purchase Not Found!';
		}
		
		return $response;
	}
	
	public function payment_free_process( $user_id, $purchase_id )
	{
		$response = ['status' => FALSE, 'msg' => ''];
		
		$purchase = $this->Mod_common->get_user_purchase( $user_id, $purchase_id );
		
		if ( $purchase && $purchase->discount == 100 ) {
			
			$payment_data = [
				'amount_paid'    => 0,
				'payment_status' => 1,
			];
			
			$this->db->update( 'oe_doc_purchases', $payment_data, ['id' => $purchase_id, 'doc_id' => $user_id] );
			
			if ( $this->db->affected_rows() ) {
				// Send Email to user
				$email            = $this->data['user']->email;
				$data['purchase'] = $purchase;
				$data['company']  = $this->data['company'];
				$msg              = $this->load->view( 'templates/purchase-complete', $data, TRUE );
				$this->Mod_email->send_email( $email, 'Exam Purchase Complete', $msg );
				
				$response['status'] = TRUE;
			}
			
		} else {
			$response['msg'] = 'User Purchase Not Found!';
		}
		
		return $response;
	}
	
	public function get_user_cart_items( $user_id, $purchase_id, $currency )
	{
		$this->db->select( 'e.exam_name' );
		if ( $currency === 'BDT' ) {
			$this->db->select( 'de.cost_bdt cost' );
		} elseif ( $currency === 'USD' ) {
			$this->db->select( 'de.cost_usd cost' );
		} else {
			$this->db->select( 'de.cost_bdt cost' );
		}
		$this->db->where( 'doc_id', $user_id );
		$this->db->where( 'purchase_id', $purchase_id );
		$this->db->where( 'is_free', 0 );
		$this->db->join( 'oe_exam e', 'e.id = de.exam_id', 'left' );
		$query = $this->db->get( 'oe_doc_exams de' );
		
		if ( $query->num_rows() > 0 ) {
			$results = $query->result();
			$data    = [];
			foreach ( $results as $result ) {
				$data[] = [
					'product' => $result->exam_name,
					'amount'  => $result->cost,
				];
			}
			
			return json_encode( $data );
		}
		
		return FALSE;
	}
	
	public function save_payment_information( $user_id, $status, $purchase_id )
	{
		$post_data = $this->input->post();
		$response  = ['success' => FALSE, 'status' => $post_data['status'], 'msg' => NULL];
		
		$this->load->library( 'payment' );
		
		$this->db->trans_start();
		
		$trans_id = $this->session->userdata( 'ptrans_id' );
		if ( $this->payment->_ipn_hash_verify() ) {
			
			$validated_data = $this->payment->_validate_order();
			
			$trans_data = [
				'content' => json_encode( $validated_data ),
				'status'  => $validated_data->status,
			];
			
			$this->db->update( 'oe_payment_trans', $trans_data, ['id' => $trans_id, 'doc_id' => $user_id, 'purchase_id' => $purchase_id] );
			if ( $this->db->affected_rows() && $status == 1 ) {
				
				$payment_data = [
					'payment_method' => $validated_data->card_type,
					'currency'       => $validated_data->currency,
					'amount_paid'    => $validated_data->amount,
					'trans_id'       => $validated_data->tran_id,
					'tran_date'      => $validated_data->tran_date,
					'payment_status' => 1,
				];
				
				$this->db->update( 'oe_doc_purchases', $payment_data, ['id' => $purchase_id, 'doc_id' => $user_id] );
				
				if ( $this->db->affected_rows() ) {
					// Send Email to user
					$email            = $this->data['user']->email;
					$data['purchase'] = $this->get_user_purchased_exams( $purchase_id, $user_id );
					$data['company']  = $this->data['company'];
					$msg              = $this->load->view( 'templates/purchase-complete', $data, TRUE );
					$this->Mod_email->send_email( $email, 'Exam Purchase Complete', $msg );
					
					$response['success'] = TRUE;
				}
			}
		} else {
			$response['msg'] = 'Hash Verification Failed!';
		}
		
		if ( $this->db->trans_status() ) {
			$this->db->trans_commit();
			$this->db->trans_complete();
			$response['success'] = TRUE;
		} else {
			$this->db->trans_rollback();
		}
		
		return $response;
	}
	
	public function get_purchase_details( $purchase_id = NULL )
	{
		if ( $purchase_id ) {
			$query = $this->db->get_where( 'oe_doc_purchases', ['id' => $purchase_id] );
			
			if ( $query->num_rows() == 1 ) {
				return $query->row();
			}
		}
		
		return FALSE;
	}
}
