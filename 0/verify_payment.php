<?php

require ("../config.php");

if (!isset($_GET['status']) && !isset($_GET['ref']) && !isset($_GET['trxID'])){
    
    exit();
}

$status=$_GET['status'];
$trxID=$_GET['transaction_id'];
$ref=$_GET['tx_ref'];

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/".$trxID."/verify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer ".$paystack_sk.""
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;


    $result = json_decode($response, true);
    
    $status2=$result['status'];
    $amountpaid=$result['data']['amount'];
    $tx_ref=$result['data']['tx_ref'];
    $paidemail=$result['data']['customer']['email'];
    
    
     $aa1=$amountpaid*2;
     $aa2=$aa1/100;
     $aa3=ceil($amountpaid-$aa2);
     
     
     if ($status2=="success" && $tx_ref==$ref && $amountpaid !=0){

     $cbal = mysqli_fetch_array(mysqli_query($db, "SELECT us_wallets,email FROM users WHERE emailR='".$paidemail."'"));
     $oldbal = $cbal[0];
     $username=$cbal[1];

     $newbal=$oldbal+$aa3;
     mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$paidemail."'");

     $descr='ATM Wallet Funding';
    mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$paidemail."', '".$username."', '".$aa3."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$tx_ref."', '".$oldbal."','".$newbal."')");

      header("location:home");

      exit();
   
     }


    else {
        
         exit();
    }











?>