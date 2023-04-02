
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

require ("pricedir/gotvprice.php");

if (isset($_POST['submit'])){

$gotv_max=$_POST['gotv_max'];
$gotv_jinja=$_POST['gotv_jinja'];
$gotv_jolli=$_POST['gotv_jolli'];
$gotv_smallie=$_POST['gotv_smallie'];

  

  $update=mysqli_query($db, "UPDATE gotvprice SET gotv_max='".$gotv_max."', gotv_jinja='".$gotv_jinja."', gotv_jolli='".$gotv_jolli."', gotv_smallie='".$gotv_smallie."'  WHERE id='1'");

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
                    <h6 class="font-weight-bold">GOTV API PRICE</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">GOTV MAX <span style="color:red">*</span></label>
                                   <input name="gotv_max" class="form-control" type="number" value="<?php echo $gotv_max; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">GOTV JINJA <span style="color:red">*</span></label>
                                   <input name="gotv_jinja" class="form-control" type="number" value="<?php echo $gotv_jinja; ?>" required = "required" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">GOTV JOLLI <span style="color:red">*</span></label>
                                  <input name="gotv_jolli" class="form-control" type="number" value="<?php echo $gotv_jolli; ?>" required = "required" autocomplete="off">
                                </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">GOTV SMALLIE <span style="color:red">*</span></label>
                                 <input name="gotv_smallie" class="form-control" type="number" value="<?php echo $gotv_smallie; ?>" required = "required" autocomplete="off">
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