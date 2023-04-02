<?php
require("session.php");

if (!isset($_POST['amount_w'])){

   echo "Please reload page and try again";
   exit();

}
else{

$amount_w=$_POST['amount_w'];

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$tr=rand(100, 900);
$trx=rand(100000, 900000).$tr.'wb';

if ($amount_w > $refbonus){

    echo "Withdraw Fail Due To Insufficient Fund"; ///Insufficient Fund
    exit();
}

else{

$newBonus = $refbonus-$amount_w;
$newMallu=$mallu+$amount_w;
$update_bonus=mysqli_query($db,"UPDATE users SET us_bonus='".$newBonus."' WHERE emailR='".$email."'");

if ($update_bonus){

   mysqli_query($db,"UPDATE users SET us_wallets='".$newMallu."' WHERE emailR='".$email."'");

  $descr='Withdraw bonus of '.$amount_w.' was successful';

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_w."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newMallu."')");
            
    echo ("200");
    exit();
}

else{

  $newbal2 = $refbonus;
  mysqli_query($db,"UPDATE users SET us_bonus='".$newbal2."' WHERE emailR='".$email."'");

  $descr='Withdraw of '.$amount_w.' fail due to network problem';
            
    echo ($descr);
    exit();
}




}

}

?>