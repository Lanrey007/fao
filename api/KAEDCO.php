<?php
	
$discount=$amount*$kaedco/100;
$final_amount=$amount-$discount;

$postdata1=array(

  'token'=>$gladapi,
);

$url = 'https://abumpay.com/api/details';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata1));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$request = curl_exec($ch);
curl_close($ch);
$data=json_decode($request, true);

$adminbal=$data['balance'];

if ($adminbal<$final_amount){

		$sec=array(
		'code'=>'900', ////// 
		'status'=>'fail', ////// 
		'desc' =>'Error Please Kindly Contact Admin',
	);

	echo json_encode($sec);
  exit();
}

else{

	if ($balance < $final_amount){

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

$postdata2=array(
  'token' => $gladapi,
  'service_number' => $service_number,
  'service_id' => $service_id,
  'service_type'=>$service_type,
  'request_id' => $request_id,
  'amount' => $amount,
);

$url = 'https://abumpay.com/api/electricity';
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

   $descr=$desc;


 mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$final_amount."', '".$descr."', 'Successful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal."')");

  $sec=array(
    'code'=>'200', //// Tranasction Success
    'status'=>'success',
    'desc' =>$descr,
  );
  echo json_encode($sec);
  exit();
    
}

else{
 
 $descr2='₦'.$amount.''.strtoupper($service_type).' Payment Unsuccessful';

  $newbal2=$balance;
 mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE token='".$apiToken."'");

  mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr2."', 'Unsuccessful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal2."')");

 $sec=array(
    'code'=>'900', ////Transaction failed
    'status'=>'fail',
    'desc'=> $descr2,
  );
  echo json_encode($sec);
  exit();

}



	}
}

?>