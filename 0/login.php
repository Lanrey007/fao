<?php
require("../config.php");


if (isset($_REQUEST['true'])){

$txt=$_REQUEST['true'];

}

else{

    $txt="Welcome Back !!!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $sitetitle; ?> - Sign In</title>
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

        $email=trim(strtolower(mysqli_real_escape_string($db, $_POST['email'])));
        $password=trim(mysqli_real_escape_string($db, $_POST['password']));

        $mdpass=md5($password);

        if (empty($email) || empty($password)){

        $error='<div class="alert alert-danger"> Please fill all field and proceed</div>';
        }

        else{
            $ch_e=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$email."'");
            if (mysqli_num_rows($ch_e)<1){

            $error='<div class="alert alert-danger">This email is not connected with '.$sitetitle.'</div>';
            } else{
            $ch_bk=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$email."' AND block='1'");
            if (mysqli_num_rows($ch_bk)>0){

               $error='<div class="alert alert-danger">This account has been suspended</div>';
            }else{
				$ch_ac=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$email."' AND reg_active='1'");
            if (mysqli_num_rows($ch_ac)<1){

               $error='<div class="alert alert-danger">This account has not been activated yet. Contact Admin!</div>';
            }else{

                $ch_up=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$email."' AND password='".$mdpass."'");

                if (mysqli_num_rows($ch_up)<1){

                $error='<div class="alert alert-danger">Invalid Username or Password</div>';
                    
                }
else{
                    

                    while($rows=mysqli_fetch_array($ch_up, MYSQLI_ASSOC)){

                        
                        $email=$rows['emailR'];
                        $password=$rows['password'];
                        $sid=$rows['sid'];
                        $username=$rows['email'];


                        $_SESSION['email']=$email;
                        $_SESSION['password']=$mdpass;
                        $_SESSION['sid']=$sid;

                        header("location:home");
                    
                    }
                
            }
		}
            }
        }
    }
    }
    ?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

			<div style="text-align: center;text-transform: uppercase;color: <?php echo $theme_color; ?>;font-weight: bold;font-family:impact;">
			
				    
							</div>
							<br>
							<br>
							<?php echo $error; ?>
					
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

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="<?php echo $baseurl; ?>/forgot_password" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" style="background-color: <?php echo $theme_color; ?>">
							Login
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