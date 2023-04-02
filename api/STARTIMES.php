<?php

if ($plan_code==701){

	$package="Startimes Nova Weekly";
	$variation_code="nova-weekly";
	$amount=$nova_week;
}

if ($plan_code==702){

	$package="Startimes Nova Monthly";
	$variation_code="nova";
	$amount=$nova_month;
}

if ($plan_code==703){

	$package="Startimes Basic Weekly";
	$variation_code="basic-weekly";
	$amount=$basic_week;

}

if ($plan_code==704){

	$package="Startimes Basic Monthly";
	$variation_code="basic";
	$amount=$basic_month;
}

if ($plan_code==705){

	$package="Startimes Smart Weekly";
	$variation_code="smart-weekly";
	$amount=$smart_week;
}

if ($plan_code==706){

	$package="Startimes Smart Monthly";
	$variation_code="smart";
	$amount=$smart_month;
}

if ($plan_code==707){

	$package="Startimes Classic Weekly";
	$variation_code="classic-weekly";
	$amount=$classic_week;
}

if ($plan_code==708){

	$package="Startimes Classic Monthly";
	$variation_code="classic";
	$amount=$classic_month;
}

if ($plan_code==709){

	$package="Startimes Super Weekly";
	$variation_code="super-weekly";
	$amount=$super_week;
}

if ($plan_code==710){

	$package="Startimes Super Monthly";
	$variation_code="super";
	$amount=$super_month;
}


if ($balance<$amount){

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

$newbal = $balance-$amount;
mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE token='".$apiToken."'");

 $postdata2=array(
  'token' => $gladapi,
  'service_number' => $service_number,
  'service_id' => $service_id,
  'request_id' => $request_id,
  'plan_code' => $plan_code,
);

$url = 'https://abumpay.com/api/tv';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata2));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$request = curl_exec($ch);
curl_close($ch);
$data=json_decode($request, true);

$desc=$data['desc'];
$status=$data['status'];

if ($status=="success"){

	$descr="₦".$amount." ".strtoupper($package)." Subscribe on ".$service_number;

  mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr."', 'Successful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal."')");

  $sec=array(
    'code'=>'200', //// Tranasction Success
    'status'=>'success',
    'desc' =>$descr,
  );
  echo json_encode($sec);
  exit();

}

else{

  $descr2='₦'.$amount.''.strtoupper($package).' Payment Unsuccessful';
  $newbal2=$balance;
 mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE token='".$apiToken."'");

  mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr2."', 'Unsuccessful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal2."')");

 $sec=array(
    'code'=>'900', //// Tranasction Success
    'status'=>'fail',
    'desc' =>$descr2,
  );
  echo json_encode($sec);
  exit();

}

}

?>