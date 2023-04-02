
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
    
  

    $contact_body=$_POST['contact_body'];
    $contact_number=$_POST['contact_number'];
    $deposit_num=$_POST['deposit_num'];
    $whatsapp=$_POST['whatsapp'];

    $update=mysqli_query($db, "UPDATE general_setting SET contact_body='".$contact_body."', contact_number='".$contact_number."', deposit_num='".$deposit_num."', whatsapp='".$whatsapp."'");

     if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Settings Updated", text:"settings updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating settings",position:"top",showConfirmButton:true});</script>';
    }
}


?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Contact Info Settings</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Contact Body <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $contact_body; ?>" name="contact_body" id="contact_body" required autocomplete="off">
                                </div>
                    
                                

                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Contact Number <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $contact_number; ?>"  name="contact_number" id="contact_number" required autocomplete="off">
                                </div>

                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Deposit Number <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $deposit_num; ?>"  name="deposit_num" id="deposit_num" required autocomplete="off">
                                </div>


                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Whatsapp Number <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $whatsapp; ?>"  name="whatsapp" id="whatsapp" required autocomplete="off">
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