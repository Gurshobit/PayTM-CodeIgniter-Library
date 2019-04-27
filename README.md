# About Library
PayTM Payment Gateway Library for CodeIgniter. 

This Library is Created from Official PayTM PHP Kit.But This Library is not official Library.  

Author: Gurshobit Singh Brar

## INSTALLATION
Please Follow the steps below to Use this Library in Your Project:

**Step 1:** Download This Libray ZIP Which Contains Test Codeigniter Site, Config File and Library File

**Step 2:** Copy Files to their Respective Folders

        copy paytm_config to application/config folder
        
        copy paytm.php to application/libraries folder

**Step 3:** Add Your Paytm Gateway API Crdentials in paytm_config.php file
        
        //Credentials for Testing
        
        $config['paytm_key'] = 'YOUR_TEST_KEY';
        $config['paytm_mid'] = 'YOUR_TEST_MERCHANT_ID';
        $config['paytm_env'] = 'TEST';
        $config['paytm_website'] = 'WEBSTAGING'
       
        //Credentials for Production
      
        $config['paytm_key'] = = 'YOUR_PRODUCTION_KEY';
        $config['paytm_mid'] = 'YOUR_PRODUCTION_MERCHANT_ID';
        $config['paytm_env'] = 'PROD';
        $config['paytm_website'] = 'YOUR_WEBSITE_NAME';
        
## USAGE
Loading Library Manual (In Particular Controller Example: Orders) or Automatric (Globally)

**Automatic:**
          Autoload libaray file and config file in autoload.php file
          
          $autoload['libraries'] = array('paytm');
          $autoload['config'] = array('paytm_config');

**Manual:**
          Load Library in Your Desired Controller
          
          $this->load->library('paytm');

**_Get Check Sum in Order Process Function in Your Orders Controller_**

          $paramList["MID"] = PAYTM_MERCHANT_MID;
          $paramList["ORDER_ID"] = 'unique_order_id_1733621726'; //unique id for order
          $paramList["CUST_ID"] = 'your_user_id_126216783812'; //unique_id for user
          $paramList["INDUSTRY_TYPE_ID"] = 'Retail'; // for Testing
          $paramList["CHANNEL_ID"] = 'WEB';
          $paramList["TXN_AMOUNT"] = 50;
          $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
          $paramList["CALLBACK_URL"] = base_url('orders/order_response'); 
          //your response url.Please Note base_url() requies url helper 
          $paramList["MSISDN"] = '7777777777'; //Mobile number of customer
          $paramList["EMAIL"] = 'username@emailprovider.com'; //Email ID of customer
          $paramList["VERIFIED_BY"] = "EMAIL"; //How Your User is Verified "EMAIL" or "MSISDN"
          $paramList["IS_USER_VERIFIED"] = "YES"; //IF Your Customer is Verified by you than "Yes" otherwise "No"
          $checkSum = $this->paytm->getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
          
**_Verify Check Sum in Your order Response Function in Order Controller_**

          $paramList = $_POST;
          $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : "";
          $isValidChecksum = $this->paytm->verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); 
          //$isValidCheksum Either TRUE OR FALSE
                    
**Inportant Note:**

        PAYTM_MERCHANT_KEY, PAYTM_MERCHANT_MID, and PAYTM_MERCHANT_WEBSITE
        
_Above are constants and donot try change them. Those are set using paytm_config in library constructor._

## TESTING

Use test site controller and view code to test your installation
