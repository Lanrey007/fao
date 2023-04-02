<?php


$plan2=preg_replace("/(.*?)=(.*)/", "$2", $plans);
$data_vol=preg_replace("/(.*?)=(.*)/", "$1", $plans);

$data_vo=preg_replace('/\D+/', '', $data_vol);
$amounttopay=preg_replace('/\D+/', '', $plan2);


$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$tr=rand(100, 900);
$trx=rand(1000000, 90000000).$tr;

if ($amounttopay>$mallu || $amounttopay<=0 || $mallu<=0){

    echo "Data Subscription Fail Due To Insufficient Fund"; ///Insufficient Fund
    exit();
}




else {

   $newbal = $mallu-$amounttopay;

    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

if ($data_vo=="500"){
      
      $NETORKID=1;
     $plan_id="mtncg_500";
  }

   if ($data_vo=="1"){

      $NETORKID=1;
     $plan_id="mtncg_1";
  }

   if ($data_vo=="2"){

      $NETORKID=1;
     $plan_id="mtncg_2";
     
  }

   if ($data_vo=="3"){

      $NETORKID=1;
     $plan_id="mtncg_3";
     
  }

   if ($data_vo=="5"){
       
      $NETORKID=1;
     $plan_id="mtncg_5";
  }
  
if ($data_vo=="10"){
       
      $NETORKID=1;
     $plan_id="mtncg_10";
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