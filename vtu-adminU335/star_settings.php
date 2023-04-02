
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

require ("pricedir/startimeprice.php");

if (isset($_POST['submit'])){

$nova_week=$_POST['nova_week'];
$nova_month=$_POST['nova_month'];
$basic_week=$_POST['basic_week'];
$basic_month=$_POST['basic_month'];
$smart_week=$_POST['smart_week'];
$smart_month=$_POST['smart_month'];
$classic_week=$_POST['classic_week'];
$classic_month=$_POST['classic_month'];
$super_week=$_POST['super_week'];
$super_month=$_POST['super_month'];

  

  $update=mysqli_query($db, "UPDATE startimeprice SET nova_week='".$nova_week."', nova_month='".$nova_month."', basic_week='".$basic_week."', basic_month='".$basic_month."', smart_week='".$smart_week."', smart_month='".$smart_month."', classic_week='".$classic_week."', classic_month='".$classic_month."', super_week='".$super_week."', super_month='".$super_month."'  WHERE id='1'");

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
                    <h6 class="font-weight-bold">STARTIMES API PRICE</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">NOVA WEEKLY <span style="color:red">*</span></label>
                                <input name="nova_week" class="form-control" type="number" value="<?php echo $nova_week; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                <label for="exampleInputEmail1">NOVA MONTHLY <span style="color:red">*</span></label>
                              <input name="nova_month" class="form-control" type="number" value="<?php echo $nova_month; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">BASIC WEEKLY <span style="color:red">*</span></label>
                                 <input name="basic_week" class="form-control" type="number" value="<?php echo $basic_week; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">BASIC MONTHLY <span style="color:red">*</span></label>
                                  <input name="basic_month" class="form-control" type="number" value="<?php echo $basic_month; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">SMART WEEKLY <span style="color:red">*</span></label>
                                   <input name="smart_week" class="form-control" type="number" value="<?php echo $smart_week; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">SMART MONTHLY <span style="color:red">*</span></label>
                                   <input name="smart_month" class="form-control" type="number" value="<?php echo $smart_month; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">CLASSIC WEEKLY <span style="color:red">*</span></label>
                               <input name="classic_week" class="form-control" type="number" value="<?php echo $classic_week; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">CLASSIC MONTHLY <span style="color:red">*</span></label>
                                  <input name="classic_month" class="form-control" type="number" value="<?php echo $classic_month; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">SUPER WEEKLY <span style="color:red">*</span></label>
                                  <input name="super_week" class="form-control" type="number" value="<?php echo $super_week; ?>" required = "required" autocomplete="off">
                                </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">SUPER MONTHLY <span style="color:red">*</span></label>
                                  <input name="super_month" class="form-control" type="number" value="<?php echo $super_month; ?>" required = "required" autocomplete="off">
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