<?php

require('../config.php');

  if (!isset($_SESSION['useriduserid']) && !isset($_SESSION['sid'])){

    header('location:index.php');
    exit();

  }

else{
    
    
    $username=$_SESSION['userid'];
    $sid=$_SESSION['sid'];
    
    $sel93=mysqli_query($db, "SELECT * FROM admin WHERE username='".$_SESSION['userid']."' AND sid='".$_SESSION['sid']."' OR  email='".$_SESSION['userid']."' AND sid='".$_SESSION['sid']."' OR  phone='".$_SESSION['userid']."' AND sid='".$_SESSION['sid']."'");
    
    if (mysqli_num_rows($sel93)<1){
        
            header('location:index.php');
    exit();
        
    }
    
    else{
        
        
    }
}
 

?>