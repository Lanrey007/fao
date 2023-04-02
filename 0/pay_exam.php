<?php

include("session.php");

require("cable_config.php");

if (empty($_POST['pintype']) || !isset($_POST['variation_code'])){

   echo "Please reload page and try again";
   exit();
}

$pintype=trim(strtolower($_POST['pintype']));
$variation_code=$_POST['variation_code'];



$trx=rand(1000000,900000000)."ep";
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A"); 


$ye =  $dateTime->format('YmdHi');
$ref = "$ye$trx";


if ($pintype=='waec'){

  $amount=$waec_price;
  $vcode='waecdirect';
}

if ($pintype=='neco'){

  $amount=$neco_price;
  $vcode='cdirect';
}

if ($pintype=='nabteb'){

  $amount=$nabteb_price;
  $vcode='direct';
}

if ($amount>$mallu){

    echo "Purchase Fail Due To Insufficient balance.";
    exit();

   }


else {

  $newbal = $mallu-$amount;
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
  CURLOPT_POSTFIELDS => \json_encode(array('request_id'=>$ref,'variation_code'=>$vcode,'serviceID'=>'waec','phone'=>$adminphone)),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic ".$vt."", 
    "Content-Type: application/json"
  ),
));
$response = curl_exec($curl);
curl_close($curl);
//print $response;
$data=json_decode($response, true);



$pin=$data['purchased_code'];
$status=$data['code'];


if ($status=="000"){
  $descr=strtoupper($pintype)." Pin Purchase  Successful (".$pin.")";

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$ref."', '".$mallu."','".$newbal."')");

   echo ("200");
   exit();


}

else {

    $newbal2=$mallu;
    mysqli_query($db, "UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");

    $descr="Unsuccessful ".strtoupper($pintype)." Pin";

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$ref."', '".$mallu."','".$newbal2."')");

    echo ($descr);
    exit();

}



}
?>