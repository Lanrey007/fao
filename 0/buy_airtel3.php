<?php


$plan2=preg_replace("/(.*?)=(.*)/", "$2", $plans);
$data_vol=preg_replace("/(.*?)=(.*)/", "$1", $plans);

 $data_vo=preg_replace('/\D+/', '', $data_vol);
$amounttopay=preg_replace('/\D+/', '', $plan2);


$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$tr=rand(100, 900);
$trx=rand(1000000, 90000000).$tr;
//echo $data_vo='100';
//$mobile='09022783037';

if ($amounttopay > $mallu){

  echo "Data Subscription Fail Due To Insufficient Fund"; ///Insufficient Fund
    exit();
}


else {

   $newbal = $mallu-$amounttopay;

    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");


    if ($data_vo=="750"){
      $plan_id="airtel_750";
  }
  
  if ($data_vo=="15"){
      $plan_id="airtel_15";
  }
  
  if ($data_vo=="20"){
      $plan_id="airtel_2";
  }
  
  if ($data_vo=="30"){
      $plan_id="airtel_3";
  }
  
  if ($data_vo=="45"){
      $plan_id="airtel_45";
  }
  
  if ($data_vo=="6"){
      $plan_id="airtel_6";
  }
  
  if ($data_vo=="10"){
      $plan_id="airtel_10";
  }
  
  if ($data_vo=="11"){
      $plan_id="airtel_11";
  }
  
  if ($data_vo=="20"){
      $plan_id="airtel_20";
  }
  
  if ($data_vo=="40"){
      $plan_id="airtel_40";
  }
  
  if ($data_vo=="75"){
      $plan_id="airtel_75";
  }
  


$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://abumpay.ng/api/data',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => \json_encode(array(
      'plan_id'=>$plan_id, 
      'mobile_no'=>$mobile,
      'reference' => $trx
      )),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic '.$string.'',
    'Content-Type: application/json'
  ),
));

 $response = curl_exec($curl);
curl_close($curl);

$xx=json_decode($response);
$status=$xx->status;  

    
if ($status=='success'){
    
    $descr=$network.' '.$data_vol.' Data Purchase To '.$mobile;

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amounttopay."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");
            
    echo ("200");
    exit();

  }

else{

    $descr='Unsuccessful Data '.$network.' '.$data_vol.' to '.$mobile;

    $newbal2 = $mallu;
    mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."','".$username."', '".$amounttopay."', '".$descr."', 'Unsuccessful', '".$time."', 'WEB', '".$trx."','".$mallu."','".$newbal2."')");

  mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");
  
  echo ($descr);
  exit();
  
    }

}






?>