<?php
error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$Token=trim($data['token']); // getting user post token
$network=($data['network']); // getting user post network
$mobile=trim($data['mobile']);  // getting user post mobile no.
$amount=($data['amount']);   // getting user post amount
$request_id=trim($data['request_id']);   // getting user post unique id


if (!empty($Token) && !empty($network) && !empty($mobile) && !empty($amount) && !empty($request_id)){

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

require("airtimeprice.php");

 if ($network=="MTN"){

	$serviceID = 'mtn';
    $airtimediscount=$mtndiscount;
  }

  if ($network=="GLO"){

  	$serviceID = 'glo';
    $airtimediscount=$glodiscount;
  }

   if ($network=="AIRTEL"){

    $serviceID = 'airtel';
    $airtimediscount=$airteldiscount;
  }

   if ($network=="ETISALAT" || $network=="9MOBILE"){

    $serviceID = 'etisalat';
    $airtimediscount=$mobilediscount;
  }

 $charge=$amount*$airtimediscount/100;
  $final_amount=$amount-$charge;

if ($balance<$final_amount){

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

$newbal = $balance-$final_amount;
mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE token='".$apiToken."'");

$url='https://abumpay.com/api/airtime?apiToken='.$gladapi.'&network='.$network.'&mobile='.$mobile.'&amount='.$amount.'&ref='.$request_id.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$xx=json_decode($response, true);
$status=$xx['code'];

if ($status==200){

  $descr=$network." Airtime ".$amount." Purchase On ".$mobile;

  mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$final_amount."', '".$descr."', 'Successful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal."')");

   $sec=array(
    'code'=>'200', ////Record Found
    'status'=>'success', ////// 
    'desc'=>$descr,
  );
  echo json_encode($sec);
  exit();
}

else {

$newbal2=$balance;
 mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE token='".$apiToken."'");

 $descr2=$network." Airtime ".$amount." Unsuccessful On ".$mobile;

  mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr2."', 'Unsuccessful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal2."')");

$sec=array(
    'code'=>'900', ////Record Not Found
    'status'=>'fail',
    'desc'=>$descr,
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