<?php
require('../config.php');

if (!isset($_GET['email']) && !isset($_GET['hash'])){

    die("Invalid Website URL Detected");
    exit();
}

$email=$_GET['email'];
$hash=$_GET['hash'];

$checkInfo=mysqli_query($db, "SELECT email, sid FROM users WHERE emailR='".$email."' AND sid='".$hash."'");
$counter5=mysqli_num_rows($checkInfo);

if ($counter5<1){

    die("This reset password link might be expired or Invalid");
    exit();

}

else{


$hash01=uniqid();
$newhash=md5($hash01).rand(10000,600000);

$error=$success="";


if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $password=trim(mysqli_real_escape_string($db, $_POST['password']));
    $cpassword=trim(mysqli_real_escape_string($db, $_POST['cpassword']));
    $mdpass=md5($password);


    
    if (strlen($password)<5){

        $error='<div class="alert alert-danger">
              
                         <strong> Oops!</b></strong> Please use a strong password

                         </div>';
    }

    else if ($password != $cpassword){

            $error='<div class="alert alert-danger">
              
                         <strong> Oops!</b></strong> Password not match

                         </div>';
    }

    else{

        $setNewPass=mysqli_query($db, "UPDATE users SET password='".$mdpass."', sid='".$newhash."' WHERE emailR='".$email."'");

        if ($setNewPass){

            ?>

        <script type="text/javascript">
            alert("Password change successfully");
            window.location.href="login";
        </script>


                         <?php
        }

        else{

        $error='<div class="alert alert-danger">
              
                         <strong> Oops!</b> Unable to change password</strong>

                         </div>';
        }
    }
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $sitetitle; ?> - Reset Password</title>
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

						<div class="wrap-input100 validate-input" data-validate="Enter new password">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100">New Password</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Please confirm password">
						<input class="input100" type="password" name="cpassword" id="cpassword">
						<span class="focus-input100"></span>
						<span class="label-input100">Confirm Password</span>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" style="background-color: <?php echo $theme_color; ?>">
							Reset Password
						</button>
					</div>
					<br>
					<div>
						My account ? <a href="<?php echo $baseurl; ?>/login" style="color: <?php echo $theme_color; ?>; text-decoration: none;"><span style="color: <?php echo $theme_color; ?>">Sign In</span></a>
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