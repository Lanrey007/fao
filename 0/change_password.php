

<?php require("header.php"); ?>

<?php

if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $password=mysqli_real_escape_string($db, $_POST['password']);
    $cpassword=mysqli_real_escape_string($db, $_POST['cpassword']);
    $oldpassword=mysqli_real_escape_string($db, md5($_POST['oldpassword']));


    if (strlen($password)<5){

    echo " <script>Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'password should be at least 5chararcters', showConfirmButton:!1,timer:2500 });</script>";

    }

    else {

        if ($password != $cpassword){

    echo "  <script>Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'password entered not match', showConfirmButton:!1,timer:2500 });</script>";
        }
   

    else {

        if ($_SESSION['password'] != $oldpassword){

    echo "  <script>Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'invalid old password', showConfirmButton:!1,timer:2500 });</script>";
        }

        else {

            $mdpass=md5($password);
            $update=mysqli_query($db, "UPDATE users SET password='".$mdpass."' WHERE emailR='".$email."'");

            if ($update){

    echo "  <script>Swal.fire
          ({ position:'top-end',type:'success',title:'Done', text: 'password change successfully', showConfirmButton:!1,timer:2500 });</script>";

            }

            else {

    echo "  <script>Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'error updating password', showConfirmButton:!1,timer:2500 });</script>";

            }
        }
    }

}
 }

?>

<?php require("menu.php"); ?>

<?php require("navbar.php"); ?>




 <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 100px;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
     
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
       
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Change Password</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">

              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">   

                <div class="pl-lg-4">

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      <label class="form-control-label" for="input-country">Old Password</label>
                      <input type="text" id="oldpassword" name="oldpassword" class="form-control" required="required" autocomplete="off">
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      <label class="form-control-label" for="input-country">New Password</label>
                      <input type="text" id="password" name="password" class="form-control" required="required" autocomplete="off">
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      <label class="form-control-label" for="input-country">Confirm Password</label>
                      <input type="text" id="cpassword" name="cpassword" class="form-control" required="required" autocomplete="off">
                      </div>
                    </div>
                  </div>

                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">RESET</button>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>

               
              </form>
            </div>
          </div>
        </div>
      </div>



<?php require("footer.php"); ?>
