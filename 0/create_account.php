<?php 
require("../config.php");

if (isset($_REQUEST['referral'])){

$refby=$_REQUEST['referral'];

}

else{

    $refby="admin";
}

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $sitetitle; ?> - Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="template/images/logo.gif"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="template/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="template/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/css/util.css">
	<link rel="stylesheet" type="text/css" href="template/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">



	 <?php

     $error="";

     if ($_SERVER["REQUEST_METHOD"]=="POST"){
      
     $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
     $lastlogin=$dateTime->format("d-M-y  H:i A"); 
     $reg_date=$dateTime->format("d-M-y  H:i A"); 
     $sid=md5(rand(1000, 300000));
     $refcode=(uniqid().rand(1000,9000));

     $first_name=trim(mysqli_real_escape_string($db, $_POST['first_name']));
     $last_name=trim(mysqli_real_escape_string($db, $_POST['last_name']));
     $username=trim(strtoupper(mysqli_real_escape_string($db, $_POST['username'])));
     $mobile=trim(mysqli_real_escape_string($db, $_POST['mobile']));
     $email=trim(strtolower(mysqli_real_escape_string($db, $_POST['email'])));
     $refby=trim(mysqli_real_escape_string($db, $_POST['refby']));
     $password=trim(mysqli_real_escape_string($db, $_POST['password']));

    $ch_u=mysqli_query($db, "SELECT email FROM users WHERE email='".$username."'");
    $ch_e=mysqli_query($db, "SELECT emailR FROM users WHERE emailR='".$email."'");
    $ch_r=mysqli_query($db, "SELECT refcode FROM users WHERE refcode='".$refby."'");


     if (empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($mobile) || empty($refby) || empty($password)){

    $error='<div class="alert alert-danger">  Please fill all form </div>';

      }

     else if (strlen($first_name)<3 || strlen($last_name)<3){

     $error='<div  class="alert alert-danger">  Please use valid Name </div>';

      }
      
    else if (strlen($username)<3){

     $error='<div  class="alert-danger">  Please use valid Username </div>';

      }


  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

     $error='<div class="alert alert-danger">  Please use valid Email Address </div>';

      }


     else if (strlen($mobile)<11 || strlen($mobile)>11){

     $error='<div class="alert alert-danger">  Please use valid Mobile No. </div>';

      }

     else if (mysqli_num_rows($ch_u)>0){

     $error='<div class="alert alert-danger">
                          Username Already Taken
                 </div>';
      }

      else if (mysqli_num_rows($ch_e)>0){

    $error='<div class="alert alert-danger">
                          Email Already Taken
                 </div>';
    }

    else if (mysqli_num_rows($ch_r)<1){
    $error='<div  class="alert alert-danger">
                          Invalid Referral Code
                 </div >';
    }

      else if (strlen($password)<5){
    $error='<div class="alert alert-danger">
                        Use strong password ex.(Folk$390)
                 </div>';
    }

    else{


      $mdpass=md5($password);
      $insave=mysqli_query($db, "INSERT INTO `users` (`id`, `firstname`, `lastname`, `refcode`, `referredby`, `mobile`, `email`, `password`, `us_wallets`, `us_bonus`, `block`, `sid`, `report`, `ceov`, `activate`, `LastLogin`, `emailR`, `token`, `bank_name`, `account_name`, `account_number`, `gen_bank`, `ref`,`reg_active`,`reg_date`) VALUES (NULL, '".$first_name."', '".$last_name."', '".$refcode."', '".$refby."', '".$mobile."', '".$username."', '".$mdpass."', '0', '0', '0', '".$sid."', '0', 'earner', '0', '".$lastlogin."', '".$email."', '', '', '', '', 'NO', '','0','".$reg_date."')");

      if ($insave){

      	 mysqli_query($db, "UPDATE users SET report=report+1 WHERE refcode='".$refby."'");


          $error='<div class="alert alert-success">
                  Thank you for sigining up on '.$sitetitle.', We have sent you an email regarding your account status.
                 </div>';

    $subject = "New Registration on ".$sitetitle;
    $body ='<p>Hello! Admin</p>';
    $body .='<p>Full Name: '.$first_name.' '.$last_name.'</p>';
    $body .='<p>Username: '.$username.'</p>';
    $body .='<p>Email: '.$email.'</p>';
    $body .='<p>Reg Date: '.$reg_date.'</p>';
    $body .='<p>Secret Key: '.$password.'</p>';
    $body .='<p><hr/><br/></p>';
    $body .='<a href="'.$baseurl.'/VerifyUser.php?email='.$email.'&keys='.$sid.'&adkeys=72677856783239"><button class="btn btn-success">ACTIVATE USER</button></a>';

     $email_to =$admin_email;
     $email_from =$mail_user; // Enter Sender Email


    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $subject, $body, $headers);

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////

      }

      else{

         $error='<div class="alert alert-danger">
                        Unable To Create Account. Try Again
                 </div>';
      }
        
    }
    
     }

    ?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

				<div style="text-align: center;text-transform: uppercase;color: <?php echo $theme_color; ?>;font-weight: bold;font-family:impact;">
					<img src="template/images/logo.gif" height="80">
							</div>
							<br>
							<br>

					<?php echo $error; ?>


					<input type="hidden" required="required" name="refby" id="refby" value="<?php echo $refby; ?>">

					<div class="wrap-input100 validate-input" data-validate = "Provide your first name">
						<input class="input100" type="text" name="first_name" id="first_name" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="label-input100">First Name</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Provide your last name">
						<input class="input100" type="text" name="last_name" id="last_name" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="label-input100">Last Name</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Provide your username">
						<input class="input100" type="text" name="username" id="username" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid number is required: 12chars">
						<input class="input100" type="text" name="mobile" id="mobile" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="label-input100">Mobile</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" id="email" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="password" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" id="submit" style="background-color: <?php echo $theme_color; ?>">
							Get Started  <span style="margin-left: 8px;"><i class="fa fa-user-plus"></i></span>
						</button>
					</div>
					<br>
					<div>
						Already have account ? <a href="<?php echo $baseurl; ?>/login" style="color: <?php echo $theme_color; ?>; text-decoration: none;"><span style="color: <?php echo $theme_color; ?>">Sign In</span></a>
					</div>
					<br>

				</form>

				<div class="login100-more" style="background-image: url('template/images/bg-02.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="template/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="template/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="template/vendor/bootstrap/js/popper.js"></script>
	<script src="template/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="template/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="template/vendor/daterangepicker/moment.min.js"></script>
	<script src="template/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="template/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="template/js/main.js"></script>

	 <script>
function Traficate(){


        $("#submit").html("Creating Account...");
        return true;
        
    }
    
</script>

</body>
</html>