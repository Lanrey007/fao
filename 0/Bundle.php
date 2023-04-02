

<?php require("header.php"); ?>

<?php require("menu.php"); ?>


 <?php
    include("locker.php");

    if ($MTNDATA_LOCK=="OFF"){
      $mtn_opt='';
    }
    else {
      $mtn_opt='<option value="MTN">MTN SME</option>';
    }

     if ($gifting_lock=="OFF"){
      $gift_opt='';
    }
    else {
      $gift_opt='<option value="GIFTING">MTN GIFTING</option>';
    }


    if ($GLODATA_LOCK=="OFF"){
      $glo_opt='';
    }
    else {
      $glo_opt='<option value="GLO">GLO</option>';
    }


    if ($AIRTELDATA_LOCK=="OFF"){
      $airtel_opt='';
    }
    else {
      $airtel_opt='<option value="AIRTEL">AIRTEL</option>';
    }


    if ($MOBILEDATA_LOCK=="OFF"){
      $mobile_opt='';
    }
    else {
      $mobile_opt='<option value="9MOBILE">9MOBILE</option>';
    }

    if ($MOBILEDATA_LOCK2=="OFF"){
      $mobile_opt2='';
    }
    else {
      $mobile_opt2='<option value="AIRTEL_CG">AIRTEL CG</option>';
    }

    ?>


<?php require("navbar.php"); ?>


<?php

if ($ceov=="earner"){

  $toSellPrice=$earner_price;
}

if ($ceov=="topuser"){

  $toSellPrice=$topuser_price;
}

if ($ceov=="affliate"){

  $toSellPrice=$affliate_price;
}

if ($ceov=="ambassador"){

  $toSellPrice=$ambassador_price;
}

?>


<script type="text/javascript">

 var countryLists = new Array(4) 
  countryLists["empty"] = ["Select a Country"]; 
 <?php echo $toSellPrice; ?>


 countryLists
 

 function countryChange(selectObj) { 
 // get the index of the selected option 
 var idx = selectObj.selectedIndex; 
 // get the value of the selected option 
 var which = selectObj.options[idx].value; 
 // use the selected option value to retrieve the list of items from the countryLists array 
 cList = countryLists[which]; 
 // get the country select element via its known id 
 var cSelect = document.getElementById("country"); 
 // remove the current options from the country select 
 var len=cSelect.options.length; 
 while (cSelect.options.length > 0) { 
 cSelect.remove(0); 
 } 
 var newOption; 
 // create new options 
 for (var i=0; i<cList.length; i++) { 
 newOption = document.createElement("option"); 
 newOption.value = cList[i];  // assumes option string and value are the same 
 newOption.text=cList[i]; 
 // add the new option 
 try { 
 cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE 
 } 
 catch (e) { 
 cSelect.appendChild(newOption); 
 } 
 } 
 } 
//]]>
</script>


 <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 100px;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
     
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
       
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Buy Data Bundle </h3>
                </div>
              </div>
            </div>

            <div class="card-body">

         <div class="alert alert-success" id="showAfterPayment" style="background-color: white;border: none;display: none;">
              <br>
              <br>
            <center>
           <a href="<?php echo $baseurl; ?>/Bundle"> <button class="btn btn-danger">Buy More Data</button></a> 

           <a href="<?php echo $baseurl; ?>/history"><button class="btn btn-danger">Check History</button></a>
            <br>
            <br>
            <br>
            <a href="<?php echo $baseurl; ?>/home"><button class="btn btn-danger btn-block">Return To Dashboard</button></a>
            <br>
            <br>
            <br>
            <br>
            <br>
            </center>
            </div>
           
                <div class="pl-lg-4" id="PanelBoard">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-network">Choose Network</label>
                         <select name="network" class="select form-control" required id="network" onchange="countryChange(this);">

                        <option value="">---------</option>
                    
                       <?php echo $mtn_opt; ?>
                       <?php echo $gift_opt; ?>
                       <?php echo $glo_opt; ?>
                        <?php echo $airtel_opt; ?>
                        <?php echo $mobile_opt; ?>
                        <?php echo $mobile_opt2; ?>

                      </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-plan">Select Plan</label>
                        <select class="select form-control" name="plan" id="country" required>
                
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-mobile">Mobile No.</label>
                        <input type="number" id="mobile" name="mobile" class="form-control" min="0" required="required" autocomplete="off">
                      </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <button class="btn btn-success btn-block" id="btnsubmit">PURCHASE</button>
                      </div>
                    </div>
                    </div>

                    <ul class="list-group"> 
                       <li class="list-group-item list-group-item-warning" style="background-color: orange">MTN [SME]     *461*4#  </li>
                       <li class="list-group-item list-group-item-warning" style="background-color: orange">MTN [Gifting]     *131*4# or *460*260#  </li>
                              <li class="list-group-item list-group-item-dark"> 9mobile [Gifting]   *228# </li>
                        <li class="list-group-item list-group-item-danger"> Airtel   *140# </li>
                        <li class="list-group-item list-group-item-success"> Glo  *127*0#. </li>
                        </ul>
                  </div>
                </div>

        
            </div>
          </div>
        </div>
      </div>




  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  
<script>
    $("#btnsubmit").click(function() {
        var network = $("#network").val();
        var plan = $("#country").val();
        var mobile = $("#mobile").val();


        if (network=="" || mobile=="" || plan==""){

            Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });

          return false;
        }

        else if (mobile.length < 11 || mobile.length > 11){

            Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Mobile no. should be at least 11digits', showConfirmButton:!1,timer:2500 });

          return false;
        }

        else{


      swal({
            title: "Dear <?php echo $username; ?>",
            text: "You're about to buy " + network + " " + plan + " to " + mobile,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((shallWe) => {

            if (shallWe){

            $.LoadingOverlay("show");

            $.ajax({

              url:"DataPayment.php",
              method:"POST",
              data:{
                mobile:mobile, network:network, plan:plan
                 },
                success:function(Rexdata){
                $.LoadingOverlay("hide");

                if (Rexdata != 200){
                Swal.fire
                ({ position:'top-end',type:'',title:'Oops', text: ''+Rexdata, showConfirmButton:!1,timer:3500 });
                }

                else{
                Swal.fire
                ({ position:'top-end',type:'success',title:'Done', text: 'Data Purchase Successful', showConfirmButton:!1,timer:2500 });
                $("#PanelBoard").hide();
                $("#showAfterPayment").show();

                }

                }

              })

            }
              
          })
            
        }
          

    });
</script>



<?php require("footer.php"); ?>
