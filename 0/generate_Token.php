<?php
require("session.php");

$mobile=$_POST['mobile'];
$email_token=$_POST['email_token'];
$CP_token="api_".md5($email_token.$mobile);

$APITOKEN=mysqli_query($db, "UPDATE users SET token='".$CP_token."' WHERE emailR='".$email_token."'");

if ($APITOKEN){

    echo ("200");
    exit();
}

else{

  $descr='Error generating API Token. Please try again later';
            
    echo ($descr);
    exit();
}


?>