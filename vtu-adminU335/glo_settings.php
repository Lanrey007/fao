
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

require ("pricedir/gloprice.php");

if (isset($_POST['submit'])){

 $glo920mb=mysqli_real_escape_string($db, $_POST['glo920mb']);
  $glo1gb=mysqli_real_escape_string($db, $_POST['glo1gb']);
  $glo4gb=mysqli_real_escape_string($db, $_POST['glo4gb']);
  $glo7gb=mysqli_real_escape_string($db, $_POST['glo7gb']);
  $glo8gb=mysqli_real_escape_string($db, $_POST['glo8gb']);
  $glo12gb=mysqli_real_escape_string($db, $_POST['glo12gb']);
  $glo15gb=mysqli_real_escape_string($db, $_POST['glo15gb']);
  $glo25gb=mysqli_real_escape_string($db, $_POST['glo25gb']);
  $glo32gb=mysqli_real_escape_string($db, $_POST['glo32gb']);
  

  $update=mysqli_query($db, "UPDATE gloprice SET glo920mb='".$glo920mb."', glo1gb='".$glo1gb."', glo4gb='".$glo4gb."', glo7gb='".$glo7gb."', glo8gb='".$glo8gb."', glo12gb='".$glo12gb."', glo15gb='".$glo15gb."', glo25gb='".$glo25gb."', glo32gb='".$glo32gb."' WHERE id='1'");
  
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
                    <h6 class="font-weight-bold">GLO DATA API PRICE</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">GLO 920MB/1.5GB <span style="color:red">*</span></label>
                                 <input name="glo920mb" class="form-control" type="number" value="<?php echo $glo920mb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                <label for="exampleInputEmail1">GLO 1.84GB/2.5GB<span style="color:red">*</span></label>
                                <input name="glo1gb" class="form-control" type="number" value="<?php echo $glo1gb; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 4.1GB/4.5GB<span style="color:red">*</span></label>
                               <input name="glo4gb" class="form-control" type="number" value="<?php echo $glo4gb; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 5.8GB/7.2GB<span style="color:red">*</span></label>
                                <input name="glo7gb" class="form-control" type="number" value="<?php echo $glo7gb; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 8.75GB/7.7GB<span style="color:red">*</span></label>
                               <input name="glo8gb" class="form-control" type="number" value="<?php echo $glo8gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 10GB/12.5GB<span style="color:red">*</span></label>
                                <input name="glo12gb" class="form-control" type="number" value="<?php echo $glo12gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 13.25GB/18.25GB<span style="color:red">*</span></label>
                               <input name="glo15gb" class="form-control" type="number" value="<?php echo $glo15gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 18.25GB/25GB<span style="color:red">*</span></label>
                                <input name="glo25gb" class="form-control" type="number" value="<?php echo $glo25gb; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GLO 29.5GB/32GB<span style="color:red">*</span></label>
                                <input name="glo32gb" class="form-control" type="number" value="<?php echo $glo32gb; ?>" required = "required" autocomplete="off">
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