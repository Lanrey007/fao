
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

require ("pricedir/giftingprice.php");

if (isset($_POST['submit'])){

  $mtn500mb=mysqli_real_escape_string($db, $_POST['mtn500mb']);
  $mtn1gb=mysqli_real_escape_string($db, $_POST['mtn1gb']);
  $mtn2gb=mysqli_real_escape_string($db, $_POST['mtn2gb']);
  $mtn3gb=mysqli_real_escape_string($db, $_POST['mtn3gb']);
  $mtn5gb=mysqli_real_escape_string($db, $_POST['mtn5gb']);
  

  $update=mysqli_query($db, "UPDATE giftingprice SET mtn500mb='".$mtn500mb."', mtn1gb='".$mtn1gb."', mtn2gb='".$mtn2gb."', mtn2gb='".$mtn2gb."', mtn3gb='".$mtn3gb."', mtn5gb='".$mtn5gb."' WHERE id='1'");

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
                    <h6 class="font-weight-bold">MTN GIFTING API PRICE</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">MTN 500MB <span style="color:red">*</span></label>
                                     <input name="mtn500mb" class="form-control" type="number" value="<?php echo $mtn500mb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">MTN 1GB<span style="color:red">*</span></label>
                                  <input name="mtn1gb" class="form-control" type="number" value="<?php echo $mtn1gb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">MTN 2GB<span style="color:red">*</span></label>
                                 <input name="mtn2gb" class="form-control" type="number" value="<?php echo $mtn2gb; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">MTN 3GB<span style="color:red">*</span></label>
                                <input name="mtn3gb" class="form-control" type="number" value="<?php echo $mtn3gb; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">MTN 5GB<span style="color:red">*</span></label>
                                <input name="mtn5gb" class="form-control" type="number" value="<?php echo $mtn5gb; ?>" required = "required" autocomplete="off">
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