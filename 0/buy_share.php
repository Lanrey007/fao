<?php

$fin_payment=$amount*$discount/100;
$amount_to_pay=$amount-$fin_payment;

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
//echo $amount_to_pay;
//echo $amount;
$tr=rand(100, 900);
$trx=rand(1000000, 90000000).$tr."sp";

if ($amount_to_pay>$mallu){

	echo "Insufficient fund to purchase this service";//Insufficient fund
	exit();
}

else{

  if($network == 'MTN'){

        $serviceID = 'MTN';
        $my_order_num=str_replace(" ", "", $mtn_n);
    }

   if($network == 'GLO'){
        $serviceID = 'GLO';
        $my_order_num=str_replace(" ", "", $glo_n);
    }

 if($network == 'ETISALAT'){
        $serviceID = '9MOBILE';
        $my_order_num=str_replace(" ", "", $mobile_n);
    }
 if($network == 'AIRTEL'){
        $serviceID = 'AIRTEL';
        $my_order_num=str_replace(" ", "", $airtel_n); 
    }


  $newbal = $mallu-$amount_to_pay;
  mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");


$msgt=urlencode($serviceID." Share Airtime ".$amount." TO ".$mobile);

$url = 'https://www.bulksmsnigeria.com/api/v1/sms/create?api_token='.$sms_token.'&from='.$sms_sender.'&to='.$my_order_num.'&body='.$msgt.'';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
//echo $response;
curl_close($ch);
$xres=json_decode($response, true);
$status=$xres['data']['status'];
    
 if ($status=="success") {

  $descr=$network." Share & Sell ".$amount." Purchase On ".$mobile;

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");

   echo ("200");
  // echo (done);
   exit();
}

else {
    
  $newbal2 = $mallu;
  mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");


   $descr="Unsuccessful ".$network." Share Airtime ".$amount."  On ".$mobile;

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Unsuccessful', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal2."')");

  echo ($descr);
  exit();
  
}


}

    
?>