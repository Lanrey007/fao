<?php

if ($plan_code==301){

  $volume="920MB";
  $msgt=("*127*57*".$mobile."#");
  $amount=$glo920mb;
}


   if ($plan_code==302){

   $volume="1.84GB";
   $msgt=("*127*53*".$mobile."#");
   $amount=$glo1gb;
}

   if ($plan_code==303){
   
   $volume="4.5GB";
   $msgt=("*127*16*".$mobile."#");
   $amount=$glo4gb;
}

   if ($plan_code==304){
  
  $volume="7.2GB";
  $msgt=("*127*55*".$mobile."#");
  $amount=$glo7gb;

}

   if ($plan_code==305){

   $volume="8.75GB";
   $msgt=("*127*58*".$mobile."#");
   $amount=$glo8gb;

}

 if ($plan_code==306){
   
   $volume="12.5GB";
   $msgt=("*127*54*".$mobile."#");
   $amount=$glo12gb;

}

 if ($plan_code==307){
  
  $volume="15.5GB";
  $msgt=("*127*59*".$mobile."#");
  $amount=$glo15gb;

}

 if ($plan_code==308){
   
   $volume="25GB";
   $msgt=("*127*2*".$mobile."#");
   $amount=$glo25gb;

}

if ($plan_code==309){
   
   $volume="32GB";
   $msgt=("*127*1*".$mobile."#");
   $amount=$glo32gb;

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

$url='https://abumpay.com/api/glo?apiToken='.$gladapi.'&network=GLO&mobile='.$mobile.'&network_code='.$plan_code.'&ref='.$request_id.'';
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