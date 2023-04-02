<?php

require("session.php");

  // SECRET KEY IN PROFILE

$stringk=base64_encode('MK_PROD_NDTVA8D:ABPF61T63ZNFP4D8S0NRMR8DQLN8MD4N');

//
$url = 'https://api.monnify.com/api/v1/auth/login';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
   $ch, CURLOPT_HTTPHEADER, [
        "Authorization: Basic ".$stringk."", ///// STRINGK is the return base64 hash of the Sk & apiKey
    ]

);
$json = curl_exec($ch);
curl_close($ch);


   $result = json_decode($json, true);

   $accessToken=$result['responseBody']['accessToken'];
   
   
  $fullname=$first_name." ".$last_name;
   $c_code=rand(1000000000, 9000000000);
   $aref=uniqid();
  $bref=rand(1000, 9000);
   $ref=$aref.$bref;
   $remail=$email;
   $xx=3290790822;
   

$postdata = array(
    'accountName' => "$fullname", ///////// Account Name to display
    'accountReference' => "$ref", /// Unique ID to update customer wallet
    'currencyCode' => "NGN",        //////// Currency to pay
    'customerEmail' => "$remail",           ////// Customer email address
    'contractCode' => "$xx",    //////// Nunique number to start trade
    'customerName' => "$fullname",    /////// Customer Name to setup account
    'getAllAvailableBanks' => false,
    'preferredBanks' => ['50515', '232', '035'],
);

$rurl = 'https://api.monnify.com/api/v2/bank-transfer/reserved-accounts';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $rurl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
   $ch, CURLOPT_HTTPHEADER, [
       "Content-Type: application/json",

        "Authorization: Bearer ".$accessToken."",

        
    ]

);
  $json = curl_exec($ch);
curl_close($ch);


   $result = json_decode($json, true); 
   
   $bankinfos=$result['responseBody']["accounts"];

   $sterlingb=$bankinfos[0]['accountNumber'];
   $wemab=$bankinfos[1]['accountNumber'];
   $monieb=$bankinfos[2]['accountNumber'];

   $acctName=$result['responseBody']['accountName']; ////// Return Account Name

   $accountNumber=$result['responseBody']['accountNumber'];   /////// Return account Number

   $bankName=$result['responseBody']['bankName'];      ////////// Return bank name;

   $accountReference=$result['responseBody']['accountReference']; /// Unique ID to update wallet bank_name='".$bankName."',
   

    mysqli_query($db, "UPDATE users SET  wema='".$wemab."',sterling='".$sterlingb."',monie='".$monieb."', account_name='".$acctName."', ref='".$accountReference."', gen_bank='ACTIVE' WHERE emailR='".$remail."'");






?>