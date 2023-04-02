<?php

if(!isset($_POST['process'])){
   echo 'Error';
}else{
   $stringk=base64_encode('MK_PRODN8D:ABPF61TZNFP4D8S0NRMR8DQLN8MD4N');

    $redirectURL = "https://olucash.com/0/home.php";
   
    $xamount = $_POST['amount'];
    $fullname = $_POST['account_holder'];
    $email = $_POST['buyerEmail'];
    $xx='034240650888';
    $xy=rand(100,300);
    $ux=uniqid();
    $killer=strtoupper($xy.$ux);
    
    
     $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.monnify.com/api/v1/merchant/transactions/init-transaction',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "amount": "'.$xamount.'",
    "customerName": "'.$fullname.'",
    "customerEmail": "'.$email.'",
    "paymentReference": "'.$killer.'",
    "paymentDescription": "Wallet Funding",
    "currencyCode": "NGN",
    "contractCode": "'.$xx.'" ,
    "redirectUrl": "'.$redirectURL.'",
    "paymentMethods": [
        "CARD",
        "ACCOUNT_TRANSFER"
    ]
    }',
    CURLOPT_HTTPHEADER => array(
        "Authorization: Basic ".$stringk."", ///// STRINGK is the return base64 hash of the Sk & apiKey

        'Content-Type: application/json'
    ),
    ));

    $responseMonify = curl_exec($curl);

    curl_close($curl);
    $tranx = json_decode($responseMonify, true);

    $monnifyurl = $tranx['responseBody']['checkoutUrl'];
    if(!$tranx['responseBody']['transactionReference']){
    $url='#';
    }else{
     echo  $monnifyurl;
    }
}


?>