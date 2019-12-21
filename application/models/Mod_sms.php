<?php
/**
 * Created by PhpStorm.
 * User: nahian
 * Date: 1/2/18
 * Time: 4:51 PM
 */

class Mod_sms extends CI_Model
{
    private $user_id, $password;

    public function __construct()
    {
        parent::__construct();

        $this->user_id = 'your_id';
        $this->password = 'your_password';
    }

    public function send_sms( $reciever = '01800000000', $msg = 'This is a Test SMS.' ) // phone no sample '01800000000'
    {
        $response = ['success' => FALSE, 'msg' => NULL];
        // Register your ip first. To do that, contact Digital Synapse personnel
        $url = 'http://www.dsit.pro:5678/httpapi/sendsms';

        if ( is_array( $reciever ) ) {
            $reciever = implode( ',', $reciever );
        }

        $fields = array(
            'userId'                        => urlencode( $this->user_id ),
            'password'                      => urlencode( $this->password ),
            'smsText'                       => urlencode( $msg ),
            'commaSeperatedReceiverNumbers' => $reciever
        );

        $fields_string = "";
        foreach ( $fields as $key => $value ) {
            $fields_string .= $key . '=' . $value . '&';
        }

        rtrim( $fields_string, '&' );
        try {
            $ch = curl_init();

            if ( FALSE === $ch )
                throw new Exception( 'failed to initialize' );

            curl_setopt( $ch, CURLOPT_URL, $url );

            // If you have proxy
            // $proxy = '<proxy-ip>:<proxy-port>';
            // curl_setopt($ch, CURLOPT_PROXY, $proxy);

            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
            curl_setopt( $ch, CURLOPT_POST, count( $fields ) );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $fields_string );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
            curl_setopt( $ch, CURLOPT_FAILONERROR, TRUE );
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );

            $result = curl_exec( $ch );
            if ( FALSE === $result )
                throw new Exception( curl_error( $ch ), curl_errno( $ch ) );

            $json_result = json_decode( $result );

            if ( $json_result->isError ) {
                $response['msg'] = sprintf( "<p style='color:red'>ERROR: <span style='font-weight:bold;'>%s</span></p>", $json_result->message );
            } else {
                $response['success'] = TRUE;
                $response['msg'] = sprintf( "<p style='color:green;'>SUCCESS!</p>" );
            }

            curl_close( $ch );
        } catch ( Exception $e ) {

            trigger_error( sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage() ),
                E_USER_ERROR );
            return FALSE;
        }

        return $response;
    }

    public function curl_test()
    {
        try {
            $ch = curl_init();

            if ( FALSE === $ch )
                throw new Exception( 'failed to initialize' );

            curl_setopt( $ch, CURLOPT_URL, 'http://jnahian.com/' );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
//            curl_setopt(/* ... */);

            $content = curl_exec( $ch );

            if ( FALSE === $content )
                throw new Exception( curl_error( $ch ), curl_errno( $ch ) );

            // ...process $content now

            return TRUE;
        } catch ( Exception $e ) {

            trigger_error( sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage() ),
                E_USER_ERROR );
            return FALSE;
        }
    }
}