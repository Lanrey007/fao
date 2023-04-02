<?php

require_once("session.php");
require("cable_config.php");


if (!isset($_POST['meternum']) && !isset($_POST['metertype']) && !isset($_POST['discotype']) && !isset($_POST['amount'])){

   echo "Please reload page and try again";
   exit();
}



$metertype=$_POST['metertype'];
$meternum=$_POST['meternum'];
$amount=$_POST['amount']+$elect_charge;
$discotype=$_POST['discotype'];
$metername=$_POST['metername'];

$trxID=$discotype;
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A"); 

$ye =  $dateTime->format('YmdHi');
$ref = "$ye$trxID";
//print $elect_charge;
if ($amount>$mallu){

 echo "Electricity Payment Fail Due To Insufficient Fund"; //Insufficient Fund
 exit();
}

else{


$curl = curl_init(); 
curl_setopt_array($curl, array( 
    CURLOPT_URL => "$balance_url",
    CURLOPT_RETURNTRANSFER => true, 
    CURLOPT_ENCODING => "", 
    CURLOPT_MAXREDIRS => 10, 
    CURLOPT_TIMEOUT => 0, 
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_HTTPHEADER => array(
        "Authorization: Basic ".$vt."",
        "Content-Type: application/json" ), )); 
        $response=curl_exec($curl);
        curl_close($curl);
print $response;
$xx=json_decode($response, true);

$adminbal=$xx['contents']['balance'];



if ($amount>$adminbal){
    
    echo "Bills Payment Timeout, Please Contact Admin"; // Admin Bal Low
    exit();
}

else{

   $final_amount=$amount-$elect_charge;

   $newbal = $mallu-$amount;
   mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

//   $postdata2=array(
//   'token' => $gladapi,
//   'service_number' => $meternum,
//   'service_id' => $discotype,
//   'service_type'=>$metertype,
//   'request_id' => $trxID,
//   'amount' => $final_amount,
// );

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
  CURLOPT_POSTFIELDS => \json_encode(array('request_id'=>$ref, 'billersCode'=>$meternum,'variation_code'=>$metertype,'serviceID'=>$discotype,'phone'=>$adminphone,'amount'=>$final_amount)),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic ".$vt."", 
    "Content-Type: application/json"
  ),
));
$response = curl_exec($curl);
curl_close($curl);
//print $response;
$data=json_decode($response, true);



$desc=$data['purchased_code'];
$status=$data['code'];

if ($status=="000"){

   $descr="Token: $desc";

	 mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."','".$username."', '".$amount."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$ref."','".$mallu."','".$newbal."')");
    
echo "200";
exit();

}

else{

	  $descr='₦'.$final_amount.''.strtoupper($discotype).' Payment Unsuccessful';

    $newbal2=$mallu;
    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");

    mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`,`username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."','".$username."', '".$amount."', '".$descr."', 'Unsuccessful', '".$time."', 'WEB', '".$ref."','".$mallu."','".$newbal2."')");
    
    echo ($descr);
    exit();
}


}


}


?>