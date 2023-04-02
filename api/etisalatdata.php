<?php

if ($plan_code==401){

   $volume="500MB";
   $amount=$mb500mb;
}

   if ($plan_code==402){

   $volume="1.5GB";
   $amount=$mb1gb;

}

   if ($plan_code==403){

   $volume="2GB";
   $amount=$mb2gb;

}

   if ($plan_code==404){

   $volume="3GB";
   $amount=$mb3gb;

}

   if ($plan_code==405){

   $volume="4.5GB";
   $amount=$mb4gb;

}

   if ($plan_code==406){

   $volume="11GB";
   $amount=$mb11gb;

}

   if ($plan_code==407){

   $volume="15GB";
   $amount=$mb15gb;

}

   if ($plan_code==408){

   $volume="40GB";
   $amount=$mb40gb;

}

   if ($plan_code==409){

   $volume="75GB";
   $amount=$mb75gb;

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

else {

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$newbal = $balance-$amount;
mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE token='".$apiToken."'");


$url='https://abumpay.com/api/9mobile?apiToken='.$gladapi.'&network=9MOBILE&mobile='.$mobile.'&network_code='.$plan_code.'&ref='.$request_id.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$xx=json_decode($response, true);
$status=$xx['code'];


  if ($status==200){

   $descr=strtoupper($network).' '.$volume.' purchase successfully on '.$mobile;

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

 $newbal2=$balance;
 mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE token='".$apiToken."'");

 $descr2='Unsuccessful '.strtoupper($network).' '.$volume.' on '.$mobile;

  mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount."', '".$descr2."', 'Unsuccessful', '".$time."', 'API', '".$request_id."', '".$balance."','".$newbal2."')");

$sec=array(
    'code'=>'900', ////Transaction failed
    'code'=>'fail',
    'desc'=> $descr2,
  );
  echo json_encode($sec);
  exit();

}
}



?>