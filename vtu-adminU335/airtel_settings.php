
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

require ("pricedir/airtelprice.php");

if (isset($_POST['submit'])){

  $air750mb=mysqli_real_escape_string($db, $_POST['air750mb']);
  $air1gb=mysqli_real_escape_string($db, $_POST['air1gb']);
  $air2gb=mysqli_real_escape_string($db, $_POST['air2gb']);
  $air3gb=mysqli_real_escape_string($db, $_POST['air3gb']);
  $air4gb=mysqli_real_escape_string($db, $_POST['air4gb']);
  $air6gb=mysqli_real_escape_string($db, $_POST['air6gb']);
  $air8gb=mysqli_real_escape_string($db, $_POST['air8gb']);
  $air11gb=mysqli_real_escape_string($db, $_POST['air11gb']);
  $air15gb=mysqli_real_escape_string($db, $_POST['air15gb']);
  $air40gb=mysqli_real_escape_string($db, $_POST['air40gb']);
  $air75gb=mysqli_real_escape_string($db, $_POST['air75gb']);
  

  $update=mysqli_query($db, "UPDATE airtelprice SET air750mb='".$air750mb."', air1gb='".$air1gb."', air2gb='".$air2gb."', air3gb='".$air3gb."', air4gb='".$air4gb."', air6gb='".$air6gb."', air8gb='".$air8gb."', air11gb='".$air11gb."', air15gb='".$air15gb."', air40gb='".$air40gb."', air75gb='".$air75gb."' WHERE id='1'");

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
                    <h6 class="font-weight-bold">AIRTEL DATA API PRICE</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">AIRTEL 750MB <span style="color:red">*</span></label>
                                <input name="air750mb" class="form-control" type="number" value="<?php echo $air750mb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                <label for="exampleInputEmail1">AIRTEL 1.5GB<span style="color:red">*</span></label>
                                <input name="air1gb" class="form-control" type="number" value="<?php echo $air1gb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL 2GB<span style="color:red">*</span></label>
                               <input name="air2gb" class="form-control" type="number" value="<?php echo $air2gb; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL 3GB<span style="color:red">*</span></label>
                                <input name="air3gb" class="form-control" type="number" value="<?php echo $air3gb; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL 4.5GB<span style="color:red">*</span></label>
                                <input name="air4gb" class="form-control" type="number" value="<?php echo $air4gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL 6GB<span style="color:red">*</span></label>
                                <input name="air6gb" class="form-control" type="number" value="<?php echo $air6gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL 8GB<span style="color:red">*</span></label>
                                <input name="air8gb" class="form-control" type="number" value="<?php echo $air8gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL 11GB<span style="color:red">*</span></label>
                                <input name="air11gb" class="form-control" type="number" value="<?php echo $air11gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL 15GB<span style="color:red">*</span></label>
                                <input name="air15gb" class="form-control" type="number" value="<?php echo $air15gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL 40GB<span style="color:red">*</span></label>
                                <input name="air40gb" class="form-control" type="number" value="<?php echo $air40gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL 75GB<span style="color:red">*</span></label>
                                <input name="air75gb" class="form-control" type="number" value="<?php echo $air75gb; ?>" required = "required" autocomplete="off">
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