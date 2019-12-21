<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/**
 * Created by PhpStorm.
 * User: nahian
 * Date: 3/29/18
 * Time: 11:34 AM
 */
class Payment
{
    public $payment_env, $gateway, $store_id, $store_password, $config;

    public function __construct()
    {
        $ci =& get_instance();

        // Check the Payment Config file
        $this->_check_config_file();

        $ci->load->config( 'payment' );

        $this->gateway = $ci->config->item( 'gateway' );

        // Check the Payment Gateway
        $this->_check_gateway();

        $this->payment_env    = $ci->config->item( 'payment_environment' );
        $this->config         = $ci->config->item( $this->gateway )[$this->payment_env];
        $this->store_id       = $this->config['store_id'];
        $this->store_password = $this->config['store_password'];
    }

    public function _check_config_file()
    {
        if ( file_exists( "application/config/payment.php" ) ) {
            return TRUE;
        } else {
            show_error( 'Payment Config Not found!', 403 );
            exit;
        }
    }

    public function _check_gateway()
    {
        if ( isset( $this->gateway ) and $this->gateway and $this->gateway != '' ) {
            return TRUE;
        } else {
            show_error( 'Payment Gateway Not found!', 403 );
            exit;
        }
    }

    public function make_payment( $post_data = [] )
    {

        $post_data['store_id']     = $this->config['store_id'];
        $post_data['store_passwd'] = $this->config['store_password'];
        $current                   = $this->config;
        # REQUEST SEND TO SSLCOMMERZ
        $direct_api_url = $current['trans_url'];
        $handle         = curl_init();
        curl_setopt( $handle, CURLOPT_URL, $direct_api_url );
        curl_setopt( $handle, CURLOPT_TIMEOUT, 30 );
        curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 30 );
        curl_setopt( $handle, CURLOPT_POST, 1 );
        curl_setopt( $handle, CURLOPT_POSTFIELDS, $post_data );
        curl_setopt( $handle, CURLOPT_RETURNTRANSFER, TRUE );
//        curl_setopt( $handle, CURLOPT_SSL_VERIFYPEER, FALSE ); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC

        $content = curl_exec( $handle );

        $code = curl_getinfo( $handle, CURLINFO_HTTP_CODE );

        if ( $code == 200 && !(curl_errno( $handle )) ) {
            curl_close( $handle );
            $sslcommerzResponse = $content;
            return json_decode( $sslcommerzResponse, TRUE );
        } else {
            curl_close( $handle );
            show_error( "FAILED TO CONNECT WITH SSLCOMMERZ API", 401 );
            exit;
        }

        # PARSE THE JSON RESPONSE
//        $sslcz = json_decode( $sslcommerzResponse, TRUE );
//
//        if ( isset( $sslcz['GatewayPageURL'] ) && $sslcz['GatewayPageURL'] != "" ) {
//            # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
//            # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
//            echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
//            # header("Location: ". $sslcz['GatewayPageURL']);
//            exit;
//        } else {
//            echo "JSON Data parsing error!";
//        }
    }

    /**************************************************
     * Example Code in PHP - SSLCOMMERZ IPN Validation Function
     * Developed on 22/11/2015
     * SSLCOMMERZ Document Version 3.00
     ***************************************************/

    public function _ipn_hash_verify()
    {
        $store_passwd = $this->store_password;

        if ( isset( $_POST ) && isset( $_POST['verify_sign'] ) && isset( $_POST['verify_key'] ) ) {
            # NEW ARRAY DECLARED TO TAKE VALUE OF ALL POST

            $pre_define_key = explode( ',', $_POST['verify_key'] );

            $new_data = array();
            if ( !empty( $pre_define_key ) ) {
                foreach ( $pre_define_key as $value ) {
                    if ( isset( $_POST[$value] ) ) {
                        $new_data[$value] = ($_POST[$value]);
                    }
                }
            }
            # ADD MD5 OF STORE PASSWORD
            $new_data['store_passwd'] = md5( $store_passwd );

            # SORT THE KEY AS BEFORE
            ksort( $new_data );

            $hash_string = "";
            foreach ( $new_data as $key => $value ) {
                $hash_string .= $key . '=' . ($value) . '&';
            }
            $hash_string = rtrim( $hash_string, '&' );

            if ( md5( $hash_string ) == $_POST['verify_sign'] ) {

                return TRUE;

            } else {
                return FALSE;
            }
        } else return FALSE;
    }

    public function _validate_order()
    {
        if ( isset( $_POST ) && isset( $_POST['val_id'] ) && $_POST['val_id'] ) {
            $val_id        = urlencode( $_POST['val_id'] );
            $store_id      = urlencode( $this->store_id );
            $store_passwd  = urlencode( $this->store_password );
            $url           = $this->config['validation_rest_url'];
            $requested_url = ("{$url}?val_id=" . $val_id . "&store_id=" . $store_id . "&store_passwd=" . $store_passwd . "&v=1&format=json");

            $handle = curl_init();
            curl_setopt( $handle, CURLOPT_URL, $requested_url );
            curl_setopt( $handle, CURLOPT_RETURNTRANSFER, TRUE );
            curl_setopt( $handle, CURLOPT_SSL_VERIFYHOST, FALSE ); # IF YOU RUN FROM LOCAL PC
            curl_setopt( $handle, CURLOPT_SSL_VERIFYPEER, FALSE ); # IF YOU RUN FROM LOCAL PC

            $result = curl_exec( $handle );

            $code = curl_getinfo( $handle, CURLINFO_HTTP_CODE );

            if ( $code == 200 && !(curl_errno( $handle )) ) {

                # TO CONVERT AS ARRAY
                # $result = json_decode($result, true);
                # $status = $result['status'];

                # TO CONVERT AS OBJECT
                $result = json_decode( $result );

                return $result;

            } else {
                show_error( "Failed to connect with SSLCOMMERZ", 403 );
            }
        } else {
//            show_error( "Failed to Validate the Payment!", 403 , 'Payment Validation Failed');
        }

    }
}