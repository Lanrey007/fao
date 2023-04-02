
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

require ("pricedir/airtimeprice.php");

if (isset($_POST['submit'])){

  $mtn_discount=mysqli_real_escape_string($db, $_POST['mtn_discount']);
  $glo_discount=mysqli_real_escape_string($db, $_POST['glo_discount']);
  $airtel_discount=mysqli_real_escape_string($db, $_POST['airtel_discount']);
  $mobile_discount=mysqli_real_escape_string($db, $_POST['mobile_discount']);
  

  $update=mysqli_query($db, "UPDATE airtimeprice SET  mtndiscount='".$mtn_discount."', glodiscount='".$glo_discount."', airteldiscount='".$airtel_discount."', mobilediscount='".$mobile_discount."' WHERE id='1'");

   if ($update){

                 echo '<script>Swal.fire({type:"success", title:"Discount Updated", text:"discount updated right now",position:"top",showConfirmButton:true});</script>';
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
                    <h6 class="font-weight-bold">AIRTIME API DISCOUNT</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">MTN <span style="color:red">*</span></label>
                                    <input name="mtn_discount" class="form-control" type="text" value="<?php echo $mtn_discount; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">GLO <span style="color:red">*</span></label>
                                   <input name="glo_discount" class="form-control" type="text" value="<?php echo $glo_discount; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">AIRTEL <span style="color:red">*</span></label>
                                 <input name="airtel_discount" class="form-control" type="text" value="<?php echo $airtel_discount; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">9MOBILE <span style="color:red">*</span></label>
                                <input name="mobile_discount" class="form-control" type="text" value="<?php echo $mobile_discount; ?>" required = "required" autocomplete="off">
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