<?php

if ($plan_code==501){

   $volume="750MB";
   $msgt=("*141*6*2*2*3*1*".$mobile."*".$airtelpin."#");
   $amount=$air750mb;
}

   if ($plan_code==502){

   $volume="1.5GB";
   $msgt=("*141*6*2*1*7*1*".$mobile."*".$airtelpin."#");
   $amount=$air1gb;

}

   if ($plan_code==503){

   $volume="2GB";
   $msgt=("*141*6*2*1*6*1*".$mobile."*".$airtelpin."#");
   $amount=$air2gb;

}

   if ($plan_code==504){

   $volume="3GB";
   $msgt=("*141*6*2*1*5*1*".$mobile."*".$airtelpin."#");
   $amount=$air3gb;

}

   if ($plan_code==505){

   $volume="4.5GB";
   $msgt=("*141*6*2*1*4*1*".$mobile."*".$airtelpin."#");
   $amount=$air4gb;

}

   if ($plan_code==506){

   $volume="6GB";
   $msgt=("*141*6*2*1*3*1*".$mobile."*".$airtelpin."#");
   $amount=$air6gb;

}

   if ($plan_code==507){

   $volume="8GB";
   $msgt=("*141*6*2*1*2*1*".$mobile."*".$airtelpin."#");
   $amount=$air8gb;

}

   if ($plan_code==508){

   $volume="11GB";
   $msgt=("*141*6*2*1*1*1*".$mobile."*".$airtelpin."#");
   $amount=$air11gb;

}

   if ($plan_code==509){

   $volume="15GB";
   $msgt=("*141*6*2*4*4*1*".$mobile."*".$airtelpin."#");
   $amount=$air15gb;

}

   if ($plan_code==510){

   $volume="40GB";
   $msgt=("*141*6*2*4*3*1*".$mobile."*".$airtelpin."#");
   $amount=$air40gb;

}

   if ($plan_code==511){

   $volume="75GB";
   $msgt=("*141*6*2*4*2*1*".$mobile."*".$airtelpin."#");
   $amount=$air75gb;

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

$url='https://abumpay.com/api/airtel?apiToken='.$gladapi.'&network=AIRTEL&mobile='.$mobile.'&network_code='.$plan_code.'&ref='.$request_id.'';
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