<?php

$url='https://abumpay.com/api/balance?apiToken='.$gladapi.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$xx=json_decode($response, true);
$adminbal=$xx['balance'];

if ($adminbal < $amount_to_buy){

$refund=$pre_balance;
mysqli_query($db, "UPDATE users SET us_wallets='$pre_balance' WHERE emailR='$buyer_email'");

  mysqli_query($db,"UPDATE mytransaction SET status='Unsuccessful', newbal='".$refund."' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
  mysqli_query($db,"UPDATE system_recharge SET pre_balance='".$pre_balance."', post_balance='".$refund."', status='Unsuccessful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");

  echo "Airtime Purchase Fail, Please Contact Admin"; // Admin Bal Low
  exit();
}

else{

$url='https://abumpay.com/api/airtime?apiToken='.$gladapi.'&network='.$service.'&mobile='.$recharge_phone.'&amount='.$redux_amount.'&ref='.$order_id.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$xx=json_decode($response, true);

$status=$xx['code'];


  if ($status==200){
  
mysqli_query($db,"UPDATE mytransaction SET status='Successful' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
mysqli_query($db,"UPDATE system_recharge SET status='Successful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");
   
echo "200";
exit();

}

else {

$descr=$service." ".$amount_to_buy." Airtime Purchase  Unsuccessful";

$refund=$pre_balance;
mysqli_query($db,"UPDATE users SET us_wallets='$pre_balance' WHERE emailR='$buyer_email'");

mysqli_query($db,"UPDATE mytransaction SET status='Unsuccessful', newbal='".$refund."' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
mysqli_query($db,"UPDATE system_recharge SET pre_balance='".$pre_balance."', post_balance='".$refund."', status='Unsuccessful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");
    
echo $descr;
    exit();
}

}

?>