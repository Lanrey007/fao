
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

require ("pricedir/dstvprice.php");

if (isset($_POST['submit'])){

$dstv_yanga=$_POST['dstv_yanga'];
$dstv_confam=$_POST['dstv_confam'];
$dstv_padi_extra=$_POST['dstv_padi_extra'];
$dstv_yanga_extra=$_POST['dstv_yanga_extra'];
$dstv_asia=$_POST['dstv_asia'];
$dstv_confam_extra=$_POST['dstv_confam_extra'];
$dstv_compact=$_POST['dstv_compact'];
$dstv_compact_plus=$_POST['dstv_compact_plus'];
$dstv_premium=$_POST['dstv_premium'];
$dstv_premium_asia=$_POST['dstv_premium_asia'];
  

  $update=mysqli_query($db, "UPDATE dstvprice SET dstv_yanga='".$dstv_yanga."', dstv_confam='".$dstv_confam."', dstv_padi_extra='".$dstv_padi_extra."', dstv_yanga_extra='".$dstv_yanga_extra."', dstv_asia='".$dstv_asia."', dstv_confam_extra='".$dstv_confam_extra."', dstv_compact='".$dstv_compact."', dstv_compact_plus='".$dstv_compact_plus."', dstv_premium='".$dstv_premium."', dstv_premium_asia='".$dstv_premium_asia."'  WHERE id='1'");

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
                    <h6 class="font-weight-bold">DSTV API PRICE</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">DSTV YANGA <span style="color:red">*</span></label>
                               <input name="dstv_yanga" class="form-control" type="number" value="<?php echo $dstv_yanga; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                <label for="exampleInputEmail1">DSTV CONFAM <span style="color:red">*</span></label>
                                 <input name="dstv_confam" class="form-control" type="number" value="<?php echo $dstv_confam; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">DSTV PADI EXTRA <span style="color:red">*</span></label>
                               <input name="dstv_padi_extra" class="form-control" type="number" value="<?php echo $dstv_padi_extra; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">DSTV YANGA EXTRA <span style="color:red">*</span></label>
                                 <input name="dstv_yanga_extra" class="form-control" type="number" value="<?php echo $dstv_yanga_extra; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">DSTV ASIA <span style="color:red">*</span></label>
                                 <input name="dstv_asia" class="form-control" type="number" value="<?php echo $dstv_asia; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">DSTV CONFAM EXTRA <span style="color:red">*</span></label>
                                 <input name="dstv_confam_extra" class="form-control" type="number" value="<?php echo $dstv_confam_extra; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">DSTV COMPACT <span style="color:red">*</span></label>
                                <input name="dstv_compact" class="form-control" type="number" value="<?php echo $dstv_compact; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">DSTV COMPACT PLUS <span style="color:red">*</span></label>
                                  <input name="dstv_compact_plus" class="form-control" type="number" value="<?php echo $dstv_compact_plus; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">DSTV PREMIUM <span style="color:red">*</span></label>
                                 <input name="dstv_premium" class="form-control" type="number" value="<?php echo $dstv_premium; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">DSTV PREMIUM ASIA <span style="color:red">*</span></label>
                                  <input name="dstv_premium_asia" class="form-control" type="number" value="<?php echo $dstv_premium_asia; ?>" required = "required" autocomplete="off">
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