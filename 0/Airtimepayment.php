<?php
require("session.php");

if (!empty($_POST['network']) && !empty($_POST['mobile']) && !empty($_POST['amount']) && !empty($_POST['airtimetype']) && strlen($_POST['mobile'])==11 && $_POST['amount']>99){

$airtimetype=$_POST['airtimetype'];
$amount=$_POST['amount'];
$network=$_POST['network'];
$mobile=$_POST['mobile'];
$amount=preg_replace('/\D+/', '', $amount);

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$trx=strtoupper(rand(100,900).uniqid()."AP");


if ($network=="MTN" && $airtimetype=="VTU"){$proccess_file='buy_vtu3.php';$discount=$m_discount;}
if ($network=="GLO" && $airtimetype=="VTU"){$proccess_file='buy_vtu3.php';$discount=$g_discount;}
if ($network=="AIRTEL" && $airtimetype=="VTU"){$proccess_file='buy_vtu3.php';$discount=$a_discount;}
if ($network=="ETISALAT" && $airtimetype=="VTU" || $network=="9MOBILE" && $airtimetype=="VTU"){$proccess_file='buy_vtu3.php';$discount=$mo_discount;}

if ($network=="MTN" && $airtimetype=="SHARE"){$proccess_file='buy_share.php';$discount=$m_discount2;}
if ($network=="GLO" && $airtimetype=="SHARE"){$proccess_file='buy_share.php';$discount=$g_discount2;}
if ($network=="AIRTEL" && $airtimetype=="SHARE"){$proccess_file='buy_share.php';$discount=$a_discount2;}
if ($network=="ETISALAT" && $airtimetype=="SHARE" || $network=="9MOBILE" && $airtimetype=="SHARE"){$proccess_file='buy_share.php';$discount=$mo_discount2;}

$purchase_discount=$amount*$discount/100;
$amount_to_pay=$amount-$purchase_discount;

if ($amount_to_pay<$mallu){

  $descr=$network."  ".$amount." Airtime Purchase on ".$mobile;
  $newbal=$mallu-$amount_to_pay;
  $debit_wallet=mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

  $save_pre_order=mysqli_query($db, "INSERT INTO `system_recharge` (`id`, `service`, `buying`, `recharge_phone`, `buyer_id`, `buyer_email`, `amount`, `pre_balance`, `post_balance`, `time`, `status`, `trx`,`discount`) VALUES (NULL, '".$network."', '".$descr."', '".$mobile."', '".$dbsid."', '".$email."', '".$amount_to_pay."', '".$mallu."', '".$newbal."', '".$time."','Pending', '".$trx."', '".$purchase_discount."')");

  if ($save_pre_order){

     //mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Pending', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");

  require("billing_airtime.php");

  }

  else{

 $reason="Buypassing Airtime Storage Table";
 require("suspend_account.php");
 exit();
  }

}

else{

echo "Insufficient Balance. Try Again";
exit();

}

}

else{

echo "Please fill all form correctly and try again";
exit();

}

?>