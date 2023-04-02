
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

require ("pricedir/electprice.php");

if (isset($_POST['submit'])){

$aedc=$_POST['aedc'];
$ekedc=$_POST['ekedc'];
$ikedc=$_POST['ikedc'];
$ibedc=$_POST['ibedc'];
$kaedco=$_POST['kaedco'];
$kedco=$_POST['kedco'];
$jed=$_POST['jed'];
$phed=$_POST['phed'];

  

  $update=mysqli_query($db, "UPDATE electprice SET aedc='".$aedc."', ekedc='".$ekedc."', ibedc='".$ibedc."', ikedc='".$ikedc."', kaedco='".$kaedco."', kedco='".$kedco."', jed='".$jed."', phed='".$phed."'  WHERE id='1'");

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
                    <h6 class="font-weight-bold">ELECTRICITY API DISCOUNT</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">ABUJA <span style="color:red">*</span></label>
                                <input name="aedc" class="form-control" type="text" value="<?php echo $aedc; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                <label for="exampleInputEmail1">EKO <span style="color:red">*</span></label>
                                <input name="ekedc" class="form-control" type="text" value="<?php echo $ekedc; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">IBADAN <span style="color:red">*</span></label>
                               <input name="ibedc" class="form-control" type="text" value="<?php echo $ibedc; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">IKEJA <span style="color:red">*</span></label>
                                <input name="ikedc" class="form-control" type="text" value="<?php echo $ikedc; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">KADUNA <span style="color:red">*</span></label>
                                <input name="kaedco" class="form-control" type="text" value="<?php echo $kaedco; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">KANO <span style="color:red">*</span></label>
                                 <input name="kedco" class="form-control" type="text" value="<?php echo $kedco; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">JOS <span style="color:red">*</span></label>
                                <input name="jed" class="form-control" type="text" value="<?php echo $jed; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">PHORTACOURT <span style="color:red">*</span></label>
                                <input name="phed" class="form-control" type="text" value="<?php echo $phed; ?>" required = "required" autocomplete="off">
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