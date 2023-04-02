<?php
require("cable_config.php");

if ($network=="MTN" ){$discount=$m_discount;}
if ($network=="GLO"){$discount=$g_discount;}
if ($network=="AIRTEL" ){$discount=$a_discount;}
if ($network=="ETISALAT"  || $network=="9MOBILE"){$discount=$mo_discount;}

$fin_payment=$amount*$discount/100;
$amount_to_pay=$amount-$fin_payment;



$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$tr=rand(100, 900);
$ye =  $dateTime->format('YmdHi');
$ref = "$ye$network$tr";

if ($amount_to_pay>$mallu){

  echo "Insufficient fund To Complete Transaction";//Insufficient fund
  $newbal2 = $mallu;
   mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");
 
   $descr=$network." Airtime ".$amount." Purchase Unsuccessful";
   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Unsuccessful', '".$time."', 'WEB', '".$ref."', '".$mallu."','".$newbal2."')");
 
  
  exit();
}

else{


$curl = curl_init();
curl_setopt_array($curl,
array( CURLOPT_URL => "$balance_url",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0, 
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, 
CURLOPT_HTTPHEADER => array(
"Authorization: Basic ".$vt."", 
"Content-Type: application/json" 
), ));
$response=curl_exec($curl);
curl_close($curl);
print $response;
$xx=json_decode($response, true);

$adbal=$xx['contents']['balance'];


if ($amount_to_pay > $adbal){

   echo "Airtime Timeout, Please Contact Admin"; // Admin Bal Low
   
   $newbal2 = $mallu;
   mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");
 
   $descr=$network." Airtime ".$amount." Purchase Unsuccessful";
   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Unsuccessful', '".$time."', 'WEB', '".$ref."', '".$mallu."','".$newbal2."')");
 
    exit();
}

else {

    if($network == 'MTN'){
        $serviceID = 'mtn';
    }

   if($network == 'GLO'){
        $serviceID = 'glo';
    }

 if($network == 'ETISALAT'){
        $serviceID = 'etisalat';
      }

 if($network == 'AIRTEL'){ 
      $serviceID='airtel';
    }

//print $ref;

   $newbal = $mallu-$amount_to_pay;
   mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");


$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "$pay_url",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => \json_encode(array('request_id'=>$ref, 'phone'=>$mobile,'amount'=>$amount,'serviceID'=>$serviceID)),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic ".$vt."", 
    "Content-Type: application/json"
  ),
));
$response = curl_exec($curl);
curl_close($curl);
//echo $response;
$xx=json_decode($response, true);

$status=$xx['code'];


  if ($status==000){

  $descr=$network." Airtime ".$amount." Purchase On ".$mobile;

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$ref."', '".$mallu."','".$newbal."')");

   echo ("200");
   exit();

  }

else{

    $newbal2 = $mallu;
  mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");

  $descr=$network." Airtime ".$amount." Purchase Unsuccessful";

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Unsuccessful', '".$time."', 'WEB', '".$ref."', '".$mallu."','".$newbal2."')");

  echo ($descr);
  exit();
  
  
    }

}

}




?>