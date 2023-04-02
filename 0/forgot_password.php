<?php

require("../config.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $sitetitle; ?> - Lost Password</title>
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

    $error=$success="";

if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $email=trim(strtolower(mysqli_real_escape_string($db, $_POST['email'])));

    $seluser=mysqli_query($db, "SELECT email,sid,emailR FROM users WHERE emailR='".$email."'");
    if ($count1=mysqli_num_rows($seluser)<1){

        $error='<div class="alert alert-danger">
                       This email is not registered with us
                        </div>';
    }

        while($rows=mysqli_fetch_array($seluser, MYSQLI_ASSOC)){
            $sid=$rows['sid'];
            $username=$rows['email'];
            $email=$rows['emailR'];





$sender_name = $sitetitle; // Enter Sender Name

$subject = "Your Password Recovery Link Has Arrived";
$body ='<p>Hello! '.$username.'</p>';
$body .='<p>Your request for password reset was successful and the below link is the instruction to recovery your password'.'<br/><hr/><br/>'.$baseurl.'/reset_password.php?hash='.$sid.'&email='.$email.'<br/><br/>If you did not request for Password Recovery, kindly notify us or Login back to your account and change to new strong password.<br><br>Warm Regards.</p>';

 $email_to =$email;
 $email_from =$mail_user; // Enter Sender Email


$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
$sendEmail = mail($email_to, $subject, $body, $headers);


 
if ($sendEmail){
    //echo "Mailer Error: " . $mail->ErrorInfo;
    $error='<div class="alert alert-danger">
                       Unable to send password reset link.
                        </div>';
    }

    else{

    $success='<div class="alert alert-success">
                       An email has been sent to your email address
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
					<?php echo $success; ?>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" id="email" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
				

					<div class="flex-sb-m w-full p-t-3 p-b-32">
					

						<div>
							<a href="<?php echo $baseurl; ?>/login" class="txt1">
								Remember? Try Login
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" style="background-color: <?php echo $theme_color; ?>">
							Validate Email
						</button>
					</div>
					<br>
					<div>
						Don't have account ? <a href="<?php echo $baseurl; ?>/create_account" style="color: <?php echo $theme_color; ?>; text-decoration: none;"><span style="color: <?php echo $theme_color; ?>">Register</span></a>
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

</body>
</html>