<?php
require ("../config.php");
//require("session.php");
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$clientSecret="ABPF61T63ZNFP4D8S0NRMR8DQLN8MD4N"; ///// SECRET KEY FOUND ON PROFILE

            // Retrieve the request's body and parse it as JSON
$mustech = file_get_contents("php://input");
            
               
$res = json_decode($mustech, true);
                
if (!empty($res)) {
                


$paymentReference=$res["eventData"]["paymentReference"];
$paidOn=$res["eventData"]["paidOn"];
$transactionReference=$res["eventData"]["transactionReference"];
$payment_status =  $res["eventData"]["paymentStatus"];
 $amountPaid=$res["eventData"]["amountPaid"];
 //$transactionHash=$res["eventData"]["transactionHash"];
 $email=$res["eventData"]["customer"]["email"];
$ref=$res["product"]["reference"];

 
 $kit="$clientSecret|$paymentReference|$amountPaid|$paidOn|$transactionReference";
 
 $longhash=hash('sha512', $kit);
 
 //if ($transactionHash==$longhash){
 if ( $res["eventType"] == 'SUCCESSFUL_TRANSACTION') {
     if ( $res["eventData"]["paymentStatus"] == "PAID") {
    
        $amount1=$amountPaid*0.015;
        $amount2=ceil($amountPaid-$amount1);
    
    $cx_trx=mysqli_query($db, "SELECT amount, trx FROM mytransaction WHERE amount='".$amount2."' AND trx='".$transactionReference."'");
    
    if (mysqli_num_rows($cx_trx)<1){
        
        
       $cbal = mysqli_fetch_array(mysqli_query($db, "SELECT us_wallets,email FROM users WHERE emailR='".$email."'"));
            
            $oldbal = $cbal[0];
            $username=$cbal[1];
     
            $newbal=$oldbal+$amount2;
            
            mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

            mysqli_query($db, "INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`, `oldbal`, `newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount2."', 'Auto Funding', 'Successful', '".$time."', 'WEB', '".$transactionReference."', '".$oldbal."', '".$newbal."') ");
             
        
    }

    else {
        die();
    }
 /*   
else{
    
    
    die();
}
           
*/
 }
 
 
 
 else{ die(); }
 
}
 else{
     
     
     die();
     
 }
} else{ die();}
?>