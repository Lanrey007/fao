<?php

if ($plan_code==500){

   $volume="500MB";
   $msgt="#SM#131***SMEB ".$mobile." ".$plan_code." "."".$simpin."";
   $amount=$mtn500mb;
}

   if ($plan_code==1000){

   $volume="1GB";
   $msgt="#SM#131***SMEC ".$mobile." ".$plan_code." "."".$simpin."";
   $amount=$mtn1gb;

}

   if ($plan_code==2000){

   $volume="2GB";
   $msgt="#SM#131***SMED ".$mobile." ".$plan_code." "."".$simpin."";
   $amount=$mtn2gb;

}

   if ($plan_code==3000){

   $volume="3GB";
   $msgt="#SM#131***SMEF ".$mobile." ".$plan_code." "."".$simpin."";
   $amount=$mtn3gb;

}

   if ($plan_code==5000){

   $volume="5GB";
   $msgt="#SM#131***SMEE ".$mobile." ".$plan_code." "."".$simpin."";
   $amount=$mtn5gb;

}

   if ($plan_code==10000){

   $volume="10GB";
   $msgt="#SM#131***SMEG ".$mobile." ".$plan_code." "."".$simpin."";
   $amount=$mtn5gb;

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

$url='https://abumpay.com/api/mtn?apiToken='.$gladapi.'&network=MTN&mobile='.$mobile.'&network_code='.$plan_code.'&ref='.$request_id.'';
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