<?php

error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$Token=trim($data['token']); // getting user post token
$service_id=strtolower($data['service_id']); // getting user post service e.g waec, neco
$request_id=trim($data['request_id']);   // getting user post unique id

if (!empty($Token) && !empty($service_id) && !empty($request_id)){

	require("../config.php"); // Connecting to MySQL dB.
	$check_rec=mysqli_query($db, "SELECT * FROM users WHERE token='".$Token."'");
	$counter=mysqli_num_rows($check_rec);
	if ($counter < 1){


		$sec=array(
		'code'=>'300', ////// 
		'status'=>'fail', ////// 
		'desc' =>'Error Retrieving Users Account',
	);

	echo json_encode($sec);

	exit();

	}

	else{

 while($getrec=mysqli_fetch_array($check_rec, MYSQLI_ASSOC)){
 	$balance=$getrec['us_wallets'];
 	$username=$getrec['email'];
 	$email=$getrec['emailR'];
 	$apiToken=$getrec['token'];

 	require("educationprice.php");

 if ($service_id=='waec'){

 	$service_price=$waec;
 }

 if ($service_id=='neco'){

 	$service_price=$neco;
 }

 if ($service_id=='nabteb'){

 	$service_price=$nabteb;
 }



 	if ($balance < $service_price){

	$sec=array(
		'code'=>'800', ////// 
		'status'=>'error', ////// 
		'desc' =>'Wallet Balance Low For This Tranasaction',
	);

	echo json_encode($sec);

	exit();
	}

 	else{


 $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$newbal = $balance-$service_price;
mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE token='".$apiToken."'");

 $postdata2=array(
  'token' => $gladapi,
  'service_id' => $service_id,
  'request_id' => $request_id,
);

$url = 'https://abumpay.com/api/education';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata2));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$request = curl_exec($ch);
curl_close($ch);
$data=json_decode($request, true);

$status=$data['status'];
$pin=$data['pin'];

if ($status=="success"){

$descr=strtoupper($service_id)." PIN purchase successfully PIN (".$pin.")";

  mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$service_price."', '".$descr."', 'Successful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal."')");

  $sec=array(
    'code'=>'200', //// Tranasction Success
    'status'=>'success',
    'desc' =>$descr,
  );
  echo json_encode($sec);

  exit(); 
}

else{

$newbal2 = $balance;
mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE token='".$apiToken."'");

 $descr2=strtoupper($service_id)." PIN purchase not successful";

  mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$service_price."', '".$descr2."', 'Unsuccessful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal2."')");

 $sec=array(
    'code'=>'900', ////Transaction failed
    'code'=>'fail',
    'desc'=> $descr2,
  );
  echo json_encode($sec);

exit();


}




}


 	}

 	

 }

}


else{

	$sec=array(
		'code'=>'500', ////// 
		'status'=>'fail', ////// 
		'desc' =>'Imcomplete Parameters',
	);

	echo json_encode($sec);
}

?>