
<?php
require("header.php");
?>

   
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            
    
<style>
   label.error{
        color:red !important;
    }

    #ReceipientBox{
        display:none;
    }
</style>

<?php

require ("pricedir/mobileprice.php");

if (isset($_POST['submit'])){

  $mb500mb=mysqli_real_escape_string($db, $_POST['mb500mb']);
  $mb1gb=mysqli_real_escape_string($db, $_POST['mb1gb']);
  $mb2gb=mysqli_real_escape_string($db, $_POST['mb2gb']);
  $mb3gb=mysqli_real_escape_string($db, $_POST['mb3gb']);
  $mb4gb=mysqli_real_escape_string($db, $_POST['mb4gb']);
  $mb11gb=mysqli_real_escape_string($db, $_POST['mb11gb']);
  $mb15gb=mysqli_real_escape_string($db, $_POST['mb15gb']);
  $mb40gb=mysqli_real_escape_string($db, $_POST['mb40gb']);
  $mb75gb=mysqli_real_escape_string($db, $_POST['mb75gb']);
  

  $update=mysqli_query($db, "UPDATE mobileprice SET 9mb500mb='".$mb500mb."', 9mb1gb='".$mb1gb."', 9mb2gb='".$mb2gb."', 9mb3gb='".$mb3gb."', 9mb4gb='".$mb4gb."', 9mb11gb='".$mb11gb."', 9mb15gb='".$mb15gb."', 9mb40gb='".$mb40gb."', 9mb75gb='".$mb75gb."' WHERE id='1'");

   if ($update){

                 echo '<script>Swal.fire({type:"success", title:"Price Updated", text:"price updated right now",position:"top",showConfirmButton:true});</script>';
            }

            else{

                 echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"ERror Updating Record",position:"top",showConfirmButton:true});</script>';
            }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">9MOBILE DATA API PRICE</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">9MOBILE 500MB <span style="color:red">*</span></label>
                                <input name="mb500mb" class="form-control" type="number" value="<?php echo $mb500mb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                <label for="exampleInputEmail1">9MOBILE 1.5GB<span style="color:red">*</span></label>
                                 <input name="mb1gb" class="form-control" type="number" value="<?php echo $mb1gb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">9MOBILE 2GB<span style="color:red">*</span></label>
                                <input name="mb2gb" class="form-control" type="number" value="<?php echo $mb2gb; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">9MOBILE 3GB<span style="color:red">*</span></label>
                                <input name="mb3gb" class="form-control" type="number" value="<?php echo $mb3gb; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">9MOBILE 4.5GB<span style="color:red">*</span></label>
                               <input name="mb4gb" class="form-control" type="number" value="<?php echo $mb4gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">9MOBILE 11GB<span style="color:red">*</span></label>
                                <input name="mb11gb" class="form-control" type="number" value="<?php echo $mb11gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">9MOBILE 15GB<span style="color:red">*</span></label>
                                <input name="mb15gb" class="form-control" type="number" value="<?php echo $mb15gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">9MOBILE 40GB<span style="color:red">*</span></label>
                                <input name="mb40gb" class="form-control" type="number" value="<?php echo $mb40gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">9MOBILE 75GB<span style="color:red">*</span></label>
                                <input name="mb75gb" class="form-control" type="number" value="<?php echo $mb75gb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-success btn-block">SAVE</button>
                            </form>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>



     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 

    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->


<?php require("footer.php"); ?>