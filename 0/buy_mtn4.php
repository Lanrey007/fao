<?php

$plan2=preg_replace("/(.*?)=(.*)/", "$2", $plans);
$data_vol=preg_replace("/(.*?)=(.*)/", "$1", $plans);

$data_vo=preg_replace('/\D+/', '', $data_vol);
$amounttopay=preg_replace('/\D+/', '', $plan2);

$gladapi2="";

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$tr=rand(100, 900);
$trx=rand(1000000, 90000000).$tr;


if ($amounttopay > $mallu){

  echo "Data Subscription Fail Due To Insufficient Fund"; ///Insufficient Fund
    exit();
}


else{


$url='https://abumpay.com/api/balance?apiToken='.$gladapi2.'';


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$xx=json_decode($response, true);

$adbal=$xx['balance'];


if ($amounttopay > $adbal){

   echo "Data Timeout, Please Contact Admin"; // Admin Bal Low
    exit();
}

else {

   $newbal = $mallu-$amounttopay;

    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");


if ($data_vo=="500"){
    $plan_id=500;
}

if ($data_vo=="1"){
    $plan_id=1000;
}

if ($data_vo=="2"){
    $plan_id=2000;
}

if ($data_vo=="3"){
    $plan_id=3000;
}

if ($data_vo=="5"){
    $plan_id=5000;
}

if ($data_vo=="10"){
    $plan_id=10000;
}
if ($data_vo=="20"){
    $plan_id=20000;
}

$url='https://abumpay.com/api/mtn?apiToken='.$gladapi2.'&network=MTN&mobile='.$mobile.'&network_code='.$plan_id.'&ref='.$trx.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$xx=json_decode($response, true);

$status=$xx['code'];


  if ($status==200){

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

}




?>