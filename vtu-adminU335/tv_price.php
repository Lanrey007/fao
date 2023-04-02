
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
if (isset($_POST['submit'])){

    $tv_price=$_POST['tv_price'];

    $update=mysqli_query($db, "UPDATE general_setting SET cable_prices='".$tv_price."'");
    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Setting Updated", text:"web settings updated right now",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error  updating settings",position:"top",showConfirmButton:true});</script>';
    }

}


?>




    <div class="alert alert-default" style="background-color: white;">
      <h4>TV Price</h4>
      
      <h6>Be Very Carefull While Changing The Prices.</h6>
      <h6>Change The Prices Only. Do Not CHANGE/ADD Any TV Packages</h6>
     <hr/>
      <div>
                <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                   <div class="form-group">
                    <label for="exampleInputEmail1">Write Here <span style="color:red">*</span></label>
                       <textarea class="form-control" required="required" name="tv_price" id="tv_price">
                        <?php echo $tv_price; ?>
                      </textarea>
                    </div>
                                
                <button type="submit" name="submit" class="btn btn-success btn-block">SAVE</button>
                </form>
        
      </div>
      <br>
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