<?php

require("session.php");
require("cable_config.php");


if (!isset($_POST['dtype']) && !isset($_POST['dnumber'])){

	header("location:home");
	exit();
}


$dtype=strtolower($_POST['dtype']);
$dnumber=$_POST['dnumber'];

// $postdata= array(

// 	'billersCode' => $dnumber,
// 	'serviceID' => $dtype
// );

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
  CURLOPT_POSTFIELDS => \json_encode(array('billersCode'=>$dnumber,'serviceID'=>$dtype)),
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

