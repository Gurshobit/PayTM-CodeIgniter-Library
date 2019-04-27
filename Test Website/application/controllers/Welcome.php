<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");
        $checkSum = "";
        $paramList = array();

        $INDUSTRY_TYPE_ID = 'Retail';
        $CHANNEL_ID = 'WEB';

        // Create an array having all required parameters for creating checksum.
        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = 'unique_order_id_1733621726';
        $paramList["CUST_ID"] = 'cust123';
        $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
        $paramList["CHANNEL_ID"] = $CHANNEL_ID;
        $paramList["TXN_AMOUNT"] = 50;
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

        $paramList["CALLBACK_URL"] = base_url('welcome/order_response');
        $paramList["MSISDN"] = '7777777777'; //Mobile number of customer
        $paramList["EMAIL"] = 'username@emailprovider.com'; //Email ID of customer
        $paramList["VERIFIED_BY"] = "EMAIL";
        $paramList["IS_USER_VERIFIED"] = "YES";

        $checkSum = $this->paytm->getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
        $transaction_url = PAYTM_TXN_URL;
        $data = array('paramList' => $paramList,'transaction_url' => $transaction_url,'checkSum' => $checkSum);
	$this->load->view('order_process',$data);	
	}

	public function order_response(){
		header("Pragma: no-cache");
        		header("Cache-Control: no-cache");
       		header("Expires: 0");
       		$this->load->view('order_response');		
	}
}
