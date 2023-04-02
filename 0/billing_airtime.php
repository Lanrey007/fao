<?php

$PDATA=mysqli_fetch_array(mysqli_query($db, "SELECT amount, service, pre_balance, post_balance, buyer_email, recharge_phone, trx , buyer_id, discount FROM system_recharge WHERE  buyer_email='".$email."' AND trx='".$trx."' ORDER BY id DESC LIMIT 1"));

$amount_to_buy=$PDATA[0];
$service=$PDATA[1];
$pre_balance=$PDATA[2];
$post_balance=$PDATA[3];
$buyer_email=$PDATA[4];
$recharge_phone=$PDATA[5];
$order_id=$PDATA[6];
$buyer_id=$PDATA[7];
$discount=$PDATA[8];

$redux_amount=$amount_to_buy+$discount;


if ($amount_to_buy < $pre_balance && $dbsid==$buyer_id){

require("$proccess_file");

}

else{
 $reason="Buypassing Airtime Storage Tablex";
 require("suspend_account.php");
echo "Purchase Fail Due To Insufficient Fund, Please Try again"; //Insufficient
exit();

}


?>