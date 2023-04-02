<?php

require("session.php");
require("cable_config.php");


if (!isset($_POST['meternum']) && !isset($_POST['metertype']) && !isset($_POST['discotype'])){

	header("location:home");
	exit();
}

$meternum=trim($_POST['meternum']);
$metertype=strtolower($_POST['metertype']);
$discotype=strtolower($_POST['discotype']);



$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "$v_url",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
 CURLOPT_POSTFIELDS => \json_encode(array(
 'billersCode'=>$meternum,
 'type'=>$metertype,
 'serviceID'=>$discotype)),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic ".$vt."", 
    "Content-Type: application/json"
  ),
));
$response = curl_exec($curl);
curl_close($curl);
//print $response;
$data=json_decode($response, true);

$full_name=$data['content']['Customer_Name'];
$status=$data['code'];


if ($status=="000"){

	echo ($full_name);
	exit();
}

else {

	echo ("100");
	exit();
}



?>

