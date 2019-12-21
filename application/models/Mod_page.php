<?php
/**
 * Created by PhpStorm.
 * User: nahia
 * Date: 9/23/2017
 * Time: 9:28 PM
 */

class Mod_page extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function save_data()
	{
		if ( $this->input->post() ) {
			$data = [
				'name'       => $this->input->post( 'name', TRUE ),
				'slug'       => strtolower( $this->input->post( 'slug', TRUE ) ),
				'details'    => base64_encode( $this->input->post( 'details' ) ),
				'created_at' => db_date_format(),
				'status'     => $this->input->post( 'status', TRUE ),
			];

			$flag = $this->db->insert( 'pages', $data );

			if ( $flag ) {
				return TRUE;
			}

		}
		return FALSE;
	}

	function update_data( $id )
	{
		if ( $this->input->post() ) {
			$data = [
				'name'    => $this->input->post( 'name', TRUE ),
				'slug'    => strtolower( $this->input->post( 'slug', TRUE ) ),
				'details' => base64_encode( $this->input->post( 'details' ) ),
				'status'  => $this->input->post( 'status', TRUE ),
			];

			$flag = $this->db->update( 'pages', $data, ['id' => $id] );

			if ( $flag ) {
				return TRUE;
			}

		}
		return FALSE;
	}

	function get_records_list()
	{
//		$this->db->where( 'status', 1 );
		$this->db->order_by( 'name' );
		$query = $this->db->get( 'pages' );

		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}

		return FALSE;
	}

	function get_details( $id )
	{
//		$this->db->where( 'status', 1 );
		$this->db->where( 'id', $id );
		$this->db->order_by( 'name' );
		$query = $this->db->get( 'pages' );

		if ( $query->num_rows() > 0 ) {
			return $query->row();
		}

		return FALSE;
	}


	public function count_reading_materials()
	{
		if ( $this->input->get() ) {
			$title = $this->input->get( 'title', TRUE );
			$type = $this->input->get( 'type', TRUE );
			$module = $this->input->get( 'module', TRUE );
			$unit = $this->input->get( 'unit', TRUE );
			$from_date_time = $this->input->get( 'from_date_time', TRUE );
			$to_date_time = $this->input->get( 'to_date_time', TRUE );

			if ( $title ) $this->db->like( 'title', $title, 'both', FALSE );
			if ( $type ) $this->db->where( 'type', $type );
			if ( $module ) $this->db->where( 'module_id', $module );
			if ( $unit ) $this->db->where( 'unit_id', $unit );
			if ( $from_date_time ) $this->db->where( 'created_at >=', $from_date_time );
			if ( $to_date_time ) $this->db->where( 'created_at <=', $to_date_time );
		}
		$query = $this->db->get( 'reading_materials' );
		return $query->num_rows();
	}

	public function get_reading_materials_list( $limit, $row )
	{
		if ( $this->input->get() ) {
			$title = $this->input->get( 'title', TRUE );
			$type = $this->input->get( 'type', TRUE );
			$module = $this->input->get( 'module', TRUE );
			$unit = $this->input->get( 'unit', TRUE );
			$from_date_time = $this->input->get( 'from_date_time', TRUE );
			$to_date_time = $this->input->get( 'to_date_time', TRUE );

			if ( $title ) $this->db->like( 'title', $title, 'both', FALSE );
			if ( $type ) $this->db->where( 'type', $type );
			if ( $module ) $this->db->where( 'module_id', $module );
			if ( $unit ) $this->db->where( 'unit_id', $unit );
			if ( $from_date_time ) $this->db->where( 'created_at >=', $from_date_time );
			if ( $to_date_time ) $this->db->where( 'created_at <=', $to_date_time );
		}
		$this->db->order_by( 'module_id, unit_id', 'desc' );
		$query = $this->db->get( 'reading_materials', $limit, $row );

		if ( $query->num_rows() > 0 ) {
			return $query->result();
		}

		return FALSE;
	}

	public function get_reading_material( $id )
	{
		$query = $this->db->get_where( 'reading_materials', ['id' => $id] );

		if ( $query->num_rows() > 0 ) {
			return $query->row();
		}

		return FALSE;
	}

	public function save_reading_materials( $auth_email )
	{
		$response = ['success' => FALSE, 'msg' => ""];
		$type = $this->input->post( 'type', TRUE );
		$module_id = $this->input->post( 'module', TRUE );
		$unit_id = $this->input->post( 'unit', TRUE );
		$status = $this->input->post( 'status', TRUE );
		$titles = $this->input->post( 'title', TRUE );
		$links = $this->input->post( 'link', TRUE );
		$sls = $this->input->post( 'sl', TRUE );

		// Folder for uploaded files
		$folder = $module_id ? "reading_materials/$type/$module_id" : "reading_materials/$type";

		// files uploads
		$files = $this->Mod_file_upload->multi_upload( $folder, 'file', '*', ['size' => '20480'] );

		$this->db->trans_start();
		foreach ( $titles as $i => $title ) {
			$data = [];
			if ( $title ) {
				$data = [
					'created_at' => database_formatted_date(),
					'created_by' => $auth_email,
					'module_id' => $module_id,
					'unit_id' => $unit_id,
					'status' => $status,
					'title' => $titles[$i],
					'link' => $links[$i],
					'type' => $type,
					'sl' => $sls[$i],
				];

				if ( $files[$i]['status'] ) {
					$ext = explode( '.', $files[$i]['path'] );
					$extension = $ext[count( $ext ) - 1];
					$data['file'] = $files[$i]['path'];
					$data['ext'] = $extension;
				}
				$this->db->insert( 'reading_materials', $data );
			}
		}

		if ( $this->db->trans_status() ) {
			$this->db->trans_complete();
			$this->db->trans_commit();
			$response['success'] = TRUE;
		} else {
			$this->db->trans_rollback();
		}

		return $response;
	}

	public function update_reading_materials( $id, $auth_email )
	{
		$response = ['success' => FALSE, 'msg' => ""];
		$type = $this->input->post( 'type', TRUE );
		$module_id = $this->input->post( 'module', TRUE );
		$unit_id = $this->input->post( 'unit', TRUE );
		$status = $this->input->post( 'status', TRUE );
		$titles = $this->input->post( 'title', TRUE );
		$links = $this->input->post( 'link', TRUE );
		$sls = $this->input->post( 'sl', TRUE );

		// Folder for uploaded files
		$folder = $module_id ? "reading_materials/$type/$module_id" : "reading_materials/$type";

		// files uploads
		$files = $this->Mod_file_upload->upload_file( $folder, 'file', ['size' => '20480'], NULL, '*' );

		$this->db->trans_start();

		if ( $titles ) {
			$data = [
				'created_at' => database_formatted_date(),
				'created_by' => $auth_email,
				'module_id' => $module_id,
				'unit_id' => $unit_id,
				'status' => $status,
				'title' => $titles,
				'link' => $links,
				'type' => $type,
				'sl' => $sls,
			];

			if ( $files['status'] ) {
				// old data
				$rm = $this->get_reading_material( $id );
				// remove old file
				unlink( $rm->file );

				// new file database entry
				$ext = explode( '.', $files['path'] );
				$extension = $ext[count( $ext ) - 1];
				$data['file'] = $files['path'];
				$data['ext'] = $extension;
			}
			$this->db->update( 'reading_materials', $data, ['id' => $id] );
		}

		if ( $this->db->trans_status() ) {
			$this->db->trans_complete();
			$this->db->trans_commit();
			$response['success'] = TRUE;
		} else {
			$this->db->trans_rollback();
		}

		return $response;
	}

	public function delete_reading_materials( $id )
	{
		$this->db->delete( 'reading_materials', ['id' => $id] );

		if ( $this->db->affected_rows() > 0 ) {

			$rm = $this->get_reading_material( $id );

			unlink( $rm->file );

			return TRUE;
		}
		return FALSE;
	}
}
