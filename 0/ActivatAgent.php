<?php
require("session.php");

if (!isset($_POST['usertype'])){

	echo "Please reload try and try again";
	exit();
}

else{

$usertype=strtolower($_POST['usertype']);

if ($ceov=="earner"){$recent_account=1;}
if ($ceov=="topuser"){$recent_account=2;}
if ($ceov=="affliate"){$recent_account=3;}
if ($ceov=="ambassador"){$recent_account=4;}

if ($usertype=="topuser"){$new_account=2; $level_amount=3000; $ad_bonus=2000; $r_bonus=1000;}
if ($usertype=="affliate"){$new_account=3; $level_amount=1000; $ad_bonus=500; $r_bonus=500;}
if ($usertype=="ambassador"){$new_account=4; $level_amount=5000; $ad_bonus=3000; $r_bonus=2000;}


if ($ceov=="topuser" && $usertype=="topuser"){

echo "Your are currently on the same account you wanted to upgrade to";
exit();
}

else if ($ceov=="ambassador" && $usertype=="topuser" || $ceov=="ambassador" && $usertype=="affliate"){

echo "Your are running an upgraded account of ".strtoupper($ceov);
exit();
}

else if ($mallu < $level_amount){

echo "Upgrading fail due to insufficient fund.";
exit();
}

else {

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$tr=strtoupper(uniqid());
$trx=rand(100, 900).$tr;

$trx2=$tr.rand(100, 900);

 $refinfo=mysqli_fetch_array(mysqli_query($db, "SELECT us_bonus, us_wallets, email, emailR FROM users WHERE refcode='".$refby."'"));
  
  $ref_ini_bonus=$refinfo[0];
  $ref_ini_mallu=$refinfo[1];
  $ref_username=$refinfo[2];
  $ref_email=$refinfo[3];

$newbal=$mallu-$level_amount;

 $activate=mysqli_query($db, "UPDATE users SET ceov='".$usertype."', activate='1', us_wallets='".$newbal."' WHERE emailR='".$email."'");

 if ($activate){

    $setbonus=mysqli_query($db, "UPDATE users SET us_bonus=us_bonus+$r_bonus WHERE refcode='".$refby."'");

    $setbonus2=mysqli_query($db, "UPDATE users SET us_bonus=us_bonus+$ad_bonus WHERE refcode='admin'");


    $descr1='Activation of '.$usertype.' successful';

    mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."','".$username."', '".$level_amount."', '".$descr1."', 'Successful', '".$time."', 'WEB', '".$trx."','".$mallu."','".$newbal."')");
    
    
    
   $descr2='Referral Bonus of #'.$r_bonus.' Landed From '.$username;
   
   $new_ref_bonus=$ref_ini_bonus+$refbonus;
    
    mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$ref_email."','".$ref_username."', '".$r_bonus."', '".$descr2."', 'Successful', '".$time."', 'WEB', '".$trx2."','".$ref_ini_bonus."','".$new_ref_bonus."')");

    echo "200";
    exit();

}


}


}



?>