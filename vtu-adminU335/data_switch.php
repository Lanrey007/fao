
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

    $mtnswitch=$_POST['mtnswitch'];
    $gloswitch=$_POST['gloswitch'];
    $airtelswitch=$_POST['airtelswitch'];
    $mobileswitch=$_POST['mobileswitch'];
    $gifting_switch=$_POST['gifting_switch'];
    $airtelcgswitch=$_POST['airtelcgswitch'];

    $update=mysqli_query($db, "UPDATE general_setting SET mtnswitch='".$mtnswitch."', gloswitch='".$gloswitch."', airtelswitch='".$airtelswitch."', mobileswitch='".$mobileswitch."', gifting_switch='".$gifting_switch."', airtelcgswitch='".$airtelcgswitch."' WHERE id='1'");

    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Switching Updated", text:"data switching updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating switching",position:"top",showConfirmButton:true});</script>';
    }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">WEB Data Switching</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputBULKSMS1">MTN SME DATA<span style="color:red">*</span></label>
                                     <select id="mtnswitch" class="form-control" name="mtnswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="buy_mtn.php">MANUAL-(SMS)</option>
                                    <option value="buy_mtn3.php">ABUMPAY API</option>
                                    <option value="buy_mtn4.php">ABUMPAY WALLET API</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputBULKSMS1">MTN GIFT DATA<span style="color:red">*</span></label>
                                <select id="gifting_switch" class="form-control" name="gifting_switch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="buy_gift.php">MANUAL-(SMS)</option>
                                    <option value="buy_gift3.php">ABUMAY API</option>
                                    <option value="buy_gift4.php">ABUMAY WALLET API</option>
                                    </select>
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputBULKSMS1">GLO DATA<span style="color:red">*</span></label>
                                   <select id="gloswitch" class="form-control" name="gloswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="buy_glo.php">MANUAL-(SMS)</option>
                                    <option value="buy_glo3.php">ABUMPAY API</option>
                                    </select>
                                </div>
                                
                                 <div class="form-group ">
                            <label for="exampleInputBULKSMS1">AIRTEL DATA<span style="color:red">*</span></label>
                                   <select id="airtelswitch" class="form-control" name="airtelswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                   <option value="buy_airtel.php">MANUAL-(SMS)</option>
                                    <option value="buy_airtel3.php">ABUMAY API</option>
                                    </select>
                                </div>
                                
                                
                                 <div class="form-group ">
                            <label for="exampleInputBULKSMS1">AIRTEL-CG DATA<span style="color:red">*</span></label>
                                   <select id="airtelcgswitch" class="form-control" name="airtelcgswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="buy_cairtel.php">MANUAL-(SMS)</option>
                                    <option value="buy_cairtel3.php">ABUMPAY API</option>
                                    <option value="buy_cairtel4.php">ABUMPAY WALLET API</option>
                                    </select>
                                </div>

                                 <div class="form-group ">
                           <label for="exampleInputBULKSMS1">9MOBILE DATA<span style="color:red">*</span></label>
                                  <select id="mobileswitch" class="form-control" name="mobileswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="buy_mobile.php">MANUAL-(SMS)</option>
                                    <option value="buy_mobile3.php">ABUMPAY API</option>
                                    </select>
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