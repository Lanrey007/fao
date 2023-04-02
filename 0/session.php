<?php  
require("../config.php");

session_start();
$time=$_SERVER['REQUEST_TIME'];
$timeout_duration=900;


$ch_ss=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$_SESSION['email']."' AND sid='".$_SESSION['sid']."'");
    if (mysqli_num_rows($ch_ss)<1){

        session_unset();
        session_destroy();
        header("location:login");

    }

    else{

        while ($data=mysqli_fetch_array($ch_ss, MYSQLI_ASSOC)) {
            
            $myid=$data['id'];
            $email=$data['emailR'];
            $username=$data['email'];
            $mobile=$data['mobile'];
            $mallu=$data['us_wallets'];
            $refby=$data['referredby'];
            $refbonus=$data['us_bonus'];
            $first_name=$data['firstname'];
            $last_name=$data['lastname'];
            $refcode=$data['refcode'];
            $ceov=$data['ceov'];
            $activate=$data['activate'];
            $lastlogin=$data['LastLogin'];
            $report=$data['report'];
            $block=$data['block'];
            $dbsid=$data['sid'];
            
            $token=$data['token'];
            $wema=$data['wema'];
            $sterling=$data['sterling'];
            $monie=$data['monie'];

            $bank_name=$data['bank_name'];
            $account_number=$data['account_number'];
            $account_name=$data['account_name'];
            $ref=$data['ref'];
            $gen_bank=$data['gen_bank'];
           
        }
    
}

if (strpos($mallu, "-") !== false){

    mysqli_query($db, "UPDATE users SET block='1' WHERE emailR='".$email."'");

   }

if ($block==1){

    header("location:logout");
}

if (isset($_SESSION['LAST_ACTIVITY']) && ($time-$_SESSION['LAST_ACTIVITY']) > $timeout_duration){

    session_unset();
    session_destroy();
    header("location:Login");
}
?>