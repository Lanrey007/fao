<?php

error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$Token=trim($data['token']); // getting user post token
$service_id=strtolower($data['service_id']); // getting user post service e.g eko-electric,
$service_number=trim($data['service_number']);  // getting user post IUC no.
$service_type=($data['service_type']);   // getting user post metertype e.g prepaid or postpaid
$amount=trim($data['amount']);   // getting user post unique id
$request_id=trim($data['request_id']);   // getting user post unique id

if (!empty($Token) && !empty($service_id) && !empty($service_type) && !empty($service_number) && !empty($request_id) && !empty($amount)){

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

 	if ($service_id=='abuja-electric'){

 		require("electprice.php");
 		require("AEDC.php");
 	}

 	if ($service_id=='eko-electric'){

 		require("electprice.php");
 		require("EKEDC.php");
 	}

 	if ($service_id=='ibadan-electric'){

 		require("electprice.php");
 		require("IBEDC.php");
 	}

 	if ($service_id=='ikeja-electric'){

 		require("electprice.php");
 		require("IKEDC.php");
 	}

 	if ($service_id=='kano-electric'){

 		require("electprice.php");
 		require("KEDCO.php");
 	}

 	if ($service_id=='kaduna-electric'){

 		require("electprice.php");
 		require("KAEDCO.php");
 	}

 	if ($service_id=='jos-electric'){

 		require("electprice.php");
 		require("JED.php");
 	}

 	if ($service_id=='portharcourt-electric'){

 		require("electprice.php");
 		require("PHED.php");
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
	exit();
}

?>