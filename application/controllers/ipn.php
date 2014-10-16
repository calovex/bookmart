<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ipn extends CI_Controller {

    public function paypal()
    {
        // Read POST data
        // reading posted data directly from $_POST causes serialization
        // issues with array data in POST. Reading raw POST data from input stream instead.
        $raw_post_data  = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $my_post        = array();

        foreach ($raw_post_array as $keyval)
        {
            $keyval = explode ('=', $keyval);
            if (count($keyval) == 2)
            {
                $my_post[$keyval[0]] = urldecode($keyval[1]);
            }
        }

        // read the post from PayPal system and add 'cmd'
        $req = 'cmd=_notify-validate';

        if(function_exists('get_magic_quotes_gpc'))
        {
            $get_magic_quotes_exists = true;
        }

        foreach ($my_post as $key => $value)
        {
            if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1)
            {
                $value = urlencode(stripslashes($value));
            }
            else
            {
                $value = urlencode($value);
            }

            $req .= "&$key=$value";
        }

        // Post IPN data back to PayPal to validate the IPN data is genuine
        // Without this step anyone can fake IPN data

        $ch = curl_init(PAYPAL_CHECKOUT_URL);

        if ($ch == FALSE)
        {
            return FALSE;
        }

        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

        // Set TCP timeout to 30 seconds
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

        /* CONFIG: Please download 'cacert.pem' from
        "http://curl.haxx.se/docs/caextract.html"
        and set the directory path of the certificate as shown below.
        Ensure the file is readable by the webserver.
        This is mandatory for some environments.*/

        //$cert = __DIR__ . "./cacert.pem";
        //curl_setopt($ch, CURLOPT_CAINFO, $cert);

        $res = curl_exec($ch);

        curl_close($ch);


        // Inspect IPN validation result and act accordingly
        if (strcmp ($res, "VERIFIED") == 0)
        {
            // create transaction log
            // check whether the payment_status is Completed
            // check that txn_id has not been previously processed
            // check that receiver_email is your PayPal email
            // check that payment_amount/payment_currency are correct
            // process payment and mark item as paid.

            // assign posted variables to local variables
            $payment_status     = $_POST['payment_status'];
            $payment_amount     = $_POST['mc_gross'];
            $payment_currency   = $_POST['mc_currency'];
            $txn_id             = $_POST['txn_id'];
            $receiver_email     = $_POST['receiver_email'];
            $payer_email        = $_POST['payer_email'];
            $order_id           = (int)$_POST['custom'];

            // check whether the payment_status is Completed
            if($payment_status == 'Completed')
            {
                $this->load->model('model_ipn');
                
                $order_sent = $this->model_ipn->get_paypal_order($order_id);

                if($order_sent == false)
                {
                    exit();
                }

                $expected_amount      = $order_sent->order_amount;
                $expected_currency    = $order_sent->payment_currency;
                $existing_txn_id      = $this->model_ipn->existing_paypal_txn_id($txn_id);

                if($txn_id != $existing_txn_id)
                {
                    //log transaction request
                    $log                       = array();
                    $log['txn_id']             = $txn_id;
                    $log['payer_email']        = $payer_email;
                    $log['receiver_email']     = $receiver_email;
                    $log['order_id_received']  = $order_id;
                    $log['ipn_request']        = $req;            
                    $log['created_at']         = date('Y-m-d H:i:s', time());

                    $this->model_ipn->create_order_log($log);

                    if($receiver_email == PAYPAL_RECEIVER_EMAIL)
                    {
                        if($payment_amount == $expected_amount && $payment_currency == $expected_currency)
                        {
                            $data                  = array();                                
                            $data['paid_amount']   = $payment_amount;
                            $data['status']        = 'Confirmed';
                            $data['paid_at']       = date('Y-m-d H:i:s', time());

                            $this->model_ipn->update_order($data, $order_id);
                        }
                    }
                }
            }
        }
    }
}

/* End of file ipn.php */
/* Location: ./application/controllers/ipn.php */
