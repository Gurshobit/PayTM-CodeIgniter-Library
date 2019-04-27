<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * PayTm Payment Gateway Settings
 * Parameters That can Be Changed are
 * paytm_key, paytm_mid, paytm_env, paytm_website
 * @paytm_key string (Alpha Numeric)
 * @paytm_mid string (Alpha Numeric)
 * @paytm_env Either "TEST" or "PROD"
 * @paytm_website Either "WEBSTAGING" or "Website Name"
 * @paytm_industry_id "Retail" For testing. For Production Check Paytm Dashboard
 * Website Name is Provided by paytm
 * */
$config['paytm_key'] = '';
$config['paytm_mid'] = '';
$config['paytm_env'] = 'TEST';
$config['paytm_website'] = 'WEBSTAGING';
$config['paytm_industry_id'] = 'Retail';
