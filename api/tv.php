<?php

error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$Token=trim($data['token']); // getting user post token
$service_id=strtolower($data['service_id']); // getting user post service e.g dstv, gotv
$service_number=trim($data['service_number']);  // getting user post IUC no.
$plan_code=($data['plan_code']);   // getting user post package code
$request_id=trim($data['request_id']);   // getting user post unique id

if (!empty($Token) && !empty($service_id) && !empty($plan_code) && !empty($service_number) && !empty($request_id)){

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

 	if ($service_id=='dstv'){

 		require("dstvprice.php");
 		require("DSTV.php");
 	}

 	if ($service_id=='gotv'){

 		require("gotvprice.php");
 		require("GOTV.php");
 	}

 	if ($service_id=='startimes'){

 		require("startimeprice.php");
 		require("STARTIMES.php");
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