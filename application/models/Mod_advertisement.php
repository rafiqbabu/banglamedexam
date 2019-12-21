<?php

/**
 * Description of Mod_advertisement
 *
 * @author jnahian
 *
 * @property mod_file_upload $mod_file_upload
 */
class Mod_advertisement extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'mod_file_upload' );
        $this->load->model( 'Mod_common' );
    }

    function save_advertisement_data()
    {

        if ( $_FILES['image']['error'] == 0 and $_FILES['image']['size'] > 0 ) {

            $image = $this->mod_file_upload->upload_file( 'advertisements', 'image', ['width' => 2000, 'height' => 2000, 'size' => 1024] );

            if ( $image['status'] ) {

                $data = array(
                    'title'      => $this->input->post( 'title', TRUE ),
                    'link'       => $this->input->post( 'link', TRUE ),
                    'sl'         => $this->input->post( 'sl', TRUE ),
                    'desc'       => $this->input->post( 'desc', TRUE ),
                    'image'      => $image['path'],
                    'created_at' => db_date_format(),
                    'created_by' => AUTH_EMAIL,
                    'status'     => $this->input->post( 'status' )
                );

                $this->db->insert( 'oe_advertisement', $data );

                if ( $this->db->affected_rows() ) {
                    return TRUE;
                }

            } else {
                return $image['msg'];
            }
        } else {
            return "Image Not Selected";
        }
    }

    function update_advertisement_data( $id )
    {

        // New image date entry
        $data = array(
            'title'      => $this->input->post( 'title', TRUE ),
            'link'       => $this->input->post( 'link', TRUE ),
            'sl'         => $this->input->post( 'sl', TRUE ),
            'desc'       => $this->input->post( 'desc', TRUE ),
            'updated_at' => db_date_format(),
            'updated_by' => AUTH_EMAIL,
            'status'     => $this->input->post( 'status' )
        );

        if ( $_FILES['image']['error'] == 0 and $_FILES['image']['size'] > 0 ) {

            $image = $this->mod_file_upload->upload_file( 'advertisements', 'image', ['width' => 2000, 'height' => 2000, 'size' => 1024] );

            if ( $image['status'] ) {

                // Remove the old image
                $advertisement = $this->Mod_common->get_row_data_by_id( 'oe_advertisement', $id );
                unlink( $advertisement->image );

                $data['image'] = $image['path'];

            } else {
                return $image['msg'];
            }
        }

        $this->db->update( 'oe_advertisement', $data, ['id' => $id] );

        if ( $this->db->affected_rows() ) {
            return TRUE;
        }
    }

    function get_records( $limit = 20, $row = 0 )
    {

        $sql_where = "";
        $topic_name = "";
        $from_date_time = "";
        $to_date_time = "";

        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $status = $this->security->xss_clean( $this->input->post( 'status' ) );


            $from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
            $to_date_time = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
            $sql_where .= "id != ''";

            if ( !empty( $status ) || $status === '0' ) {
                $sql_where .= " and status = '$status'";
            }

            if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
                $final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
                $final_date_to = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
                $sql_where .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
            }

            $this->session->unset_userdata( 'sql_where_session' );
            $this->session->set_userdata( 'sql_where_session', $sql_where );

        } else {
            $sql_where = $this->session->userdata( 'sql_where_session' );
        }

        if ( $sql_where != "" ) {
            $this->db->where( $sql_where );
        }

        $query = $this->db->order_by( "id", 'DESC' );
        $query = $this->db->get( 'oe_advertisement', $limit, $row );
        if ( $query->num_rows() > 0 ) {
            $results = $query->result();
            return $results;
        } else {
            return FALSE;
        }
    }


    function count_records()
    {

        $sql_where = "";
        $topic_name = "";
        $from_date_time = "";
        $to_date_time = "";

        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $status = $this->security->xss_clean( $this->input->post( 'status' ) );


            $from_date_time = $this->security->xss_clean( $this->input->post( 'from_date_time' ) );
            $to_date_time = $this->security->xss_clean( $this->input->post( 'to_date_time' ) );
            $sql_where .= "id != ''";

            if ( !empty( $status ) || $status === '0' ) {
                $sql_where .= " and status = '$status'";
            }

            if ( !empty( $from_date_time ) and !empty( $to_date_time ) ) {
                $final_date_from = date( 'Y-m-d', strtotime( $from_date_time ) ) . " 00:00:00";
                $final_date_to = date( 'Y-m-d', strtotime( $to_date_time ) ) . " 23:59:59";
                $sql_where .= " and created_at BETWEEN '$final_date_from' AND '$final_date_to'";
            }

            $this->session->unset_userdata( 'sql_where_session' );
            $this->session->set_userdata( 'sql_where_session', $sql_where );

        } else {
            $sql_where = $this->session->userdata( 'sql_where_session' );
        }

        if ( $sql_where != "" ) {
            $this->db->where( $sql_where );
        }

        $query = $this->db->select( 'id' );
        $query = $this->db->get( 'oe_advertisement' );
        if ( $query ) {
            return $query->num_rows();
        } else {
            return FALSE;
        }
    }
}

