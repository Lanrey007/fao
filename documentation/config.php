<?php
session_start();

$mainpage = "https://olampaysub.com";
$sitetitle="https://olampaysub.com";

////////// BASE URL
$docurl = "https://olampaysub.com/documentation"; 
$walleturl="https://olampaysub.com/api/details";
$dataurl="https://olampaysub.com/api/data";
$airtimeurl="https://olampaysub.com/api/airtime";
$verifymeter="https://olampaysub.com/api/verifymeter";
$verifyiuc="https://olampaysub.com/api/verifyiuc";
$tvurl="https://olampaysub.com/api/tv";
$billurl="https://olampaysub.com/api/education";
/////////////////

$dbname = "olamugii_olamdata";
$dbhost = "localhost";
$dbuser = "olamugii_olamdata";
$dbpass = "*Wuf5k@8VYg3ckTY";
$db = mysqli_connect('localhost','olamugii_olamdata','Wuf5k@8VYg3ckTY','olamugii_olamdata');
////------------------>>>>>>>>> DO NOT EDIT BELOW IF NOT NEEDED

$timezone_string = 'Africa/Lagos';
date_default_timezone_set($timezone_string);
$tm = time();
error_reporting(E_ALL);

$dbsetting = mysqli_connect('localhost','olamugii_olamdata','Wuf5k@8VYg3ckTY','olamugii_olamdata');

$querysetting = "SELECT * FROM general_setting";
                $resultsetting = mysqli_query($dbsetting, $querysetting);
                while($rowsetting = mysqli_fetch_assoc($resultsetting)) {
                    
      // Display your datas on the page
 $sitetitle = $rowsetting['sitetitle'];

 ///GUEST FRONT PRICE
 $mtn_guest=$rowsetting['mtn_guest'];
 $glo_guest=$rowsetting['glo_guest'];
 $airtel_guest=$rowsetting['airtel_guest'];
 $mobile_guest=$rowsetting['mobile_guest'];


/// FOR SITE CONTACTS
$contact_body= $rowsetting['contact_body'];
$contact_number= $rowsetting['contact_number'];	
$deposit_num=$rowsetting['deposit_num'];
$whatsapp= $rowsetting['whatsapp'];


$paystack_sk= $rowsetting['paystack_sk'];
$paystack_pk= $rowsetting['paystack_pk'];

// FOR SITE DATA PIN
$simpin=$rowsetting['simpin'];
$airtelpin=$rowsetting['airtelpin'];


$smsusername= $rowsetting['smsusername'];
$smspassword= $rowsetting['smspassword'];

$sms_sender=$rowsetting['sms_sender'];
$sms_token=$rowsetting['sms_token'];


/// FOR SITE AIRTIME DISCOUNT
$m_discount=$rowsetting['m_discount']; 
$g_discount=$rowsetting['g_discount'];
$a_discount=$rowsetting['a_discount'];
$mo_discount=$rowsetting['mo_discount'];


/// FOR SITE SHARE&SELL DISCOUNT
$m_discount2=$rowsetting['m_discount2'];
$g_discount2=$rowsetting['g_discount2'];
$a_discount2=$rowsetting['a_discount2'];
$mo_discount2=$rowsetting['mo_discount2'];



/// FOR SITE AIRTIME2CASH DISCOUNT
$m_discount3=$rowsetting['m_discount3'];
$g_discount3=$rowsetting['g_discount3'];
$a_discount3=$rowsetting['a_discount3'];
$mo_discount3=$rowsetting['mo_discount3'];



/// FOR SITE CHARGES
$cable_charge=$rowsetting['cable_charge'];
$elect_charge=$rowsetting['elect_charge'];


/// FOR SITE ORDER MOBILE		
$glo_n= $rowsetting['glo_n'];
$mtn_n= $rowsetting['mtn_n'];
$airtel_n= $rowsetting['airtel_n'];
$mobile_n= $rowsetting['mobile_n'];


$gladapi=$rowsetting['gladapi'];

/// FOR SITE SWITCHING
$mtnswitch=$rowsetting['mtnswitch'];
$gloswitch=$rowsetting['gloswitch'];
$airtelswitch=$rowsetting['airtelswitch'];
$mobileswitch=$rowsetting['mobileswitch'];
$airtimeswitch=$rowsetting['airtimeswitch'];


/// FOR SITE PRICING
$mtn_gifting=$rowsetting['mtn_gifting'];
$cable_prices= $rowsetting['cable_prices'];
$waec_price=$rowsetting['waec_price'];
$neco_price=$rowsetting['neco_price'];
$nabteb_price=$rowsetting['nabteb_price'];
$earner_price=$rowsetting['earner_price'];
$topuser_price=$rowsetting['topuser_price'];
$affliate_price=$rowsetting['affliate_price'];
$agent_price=$rowsetting['agent_price'];

$smile_bundle=$rowsetting['smile_bundle'];
			
			
/// FOR EMAIL ACCOUNT
$mail_host=$rowsetting['mail_host'];
$mail_user=$rowsetting['mail_user'];
$mail_pass=$rowsetting['mail_pass'];


/// SIM SERVER

$mtn_server=$rowsetting['mtn_server'];
$glo_server=$rowsetting['glo_server'];
$airtel_server=$rowsetting['airtel_server'];
$mobile_server=$rowsetting['mobile_server'];
$ussd_token=$rowsetting['ussd_token'];


//// AIRTIME PIN
$mtn_airtimepin=$rowsetting['mtn_airtimepin'];
$glo_airtimepin=$rowsetting['glo_airtimepin'];
$airtel_airtimepin=$rowsetting['airtel_airtimepin'];
$mobile_airtimepin=$rowsetting['mobile_airtimepin'];


$vtpass_login=$rowsetting['vtpass_login'];


$popup_msg=$rowsetting['popup_msg'];
$mode=$rowsetting['mode'];
$scroll_msg=$rowsetting['scroll_msg'];

$theme_color=$rowsetting['theme_color'];
	
}

?>