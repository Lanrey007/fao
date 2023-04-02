<?php

require("../config.php");

$update_user=mysqli_query($db, "UPDATE users SET activate='1' WHERE sid='".$_GET['keys']."' AND emailR='".$_GET['email']."'");
if ($update_user){

die("ACCOUNT ACTIVATED SUCCESSFULLY");
}

else{

	die("ERROR ACTIVATING USERS");
}


?>