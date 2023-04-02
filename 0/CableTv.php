

<?php require("header.php"); ?>

<?php require("menu.php"); ?>


<?php
    include("locker.php");

    if ($DSTV=="OFF"){

      $dstv_opt='';

    }

    else {

      $dstv_opt='<option value="DSTV">DSTV</option>';
    }

      if ($GOTV=="OFF"){

      $gotv_opt='';

    }

    else {

      $gotv_opt='<option value="GOTV">GOTV</option>';
    }

  if ($STARTIMES=="OFF"){

      $startimes_opt='';

    }

    else {

      $startimes_opt='<option value="STARTIMES">STARTIMES</option>';
    }



    ?>



<?php require("navbar.php"); ?>


<script type="text/javascript">
 //<![CDATA[ 
 // array of possible countries in the same order as they appear in the country selection list MTN, 9MOBILE, GLO or AIRTEL
 var countryLists = new Array(4) 
 countryLists["empty"] = ["Select a Country"]; 
  
 <?php echo $cable_prices; ?>

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
                  <h3 class="mb-0">Cable Subscription </h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">

        <div class="alert alert-success" id="showAfterPayment" style="background-color: white;border: none;display: none;">
          <br>
          <br>
            <center>
           <a href="<?php echo $baseurl; ?>/CableTv"> <button class="btn btn-danger">More CableTV</button></a> 

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

               <div class="alert alert-danger">₦<?php echo $cable_charge; ?> charges apply.</div>

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-decoder">Choose Decoder</label>
                     <select name="dtype" class="select form-control" required id="dtype"   onchange="countryChange(this)">
                  <option value="" selected>---------</option>
                    <?php echo $dstv_opt; ?>
                    <?php echo $gotv_opt; ?>
                    <?php echo $startimes_opt; ?>
                  </select>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-package">Select Package</label>
                          <select name="country" class="select form-control" required="required" id="country">

                          <option value="" selected>---------</option>

                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-iuc">Smart Card/IUC No.</label>
                        <input type="text" name="dnumber" maxlength="15" minlength="5" class="textinput textInput form-control" required id="dnumber">
                      </div>
                    </div>
                  </div>

                   <div class="row" id="dinfo" style="display: none;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-info">Decoder Information</label>
                         <input type="text" name="dname" readonly="readonly" required="required" maxlength="70" class="textinput textInput form-control" id="dname">
                      </div>
                    </div>
                  </div>

                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <button class="btn btn-dark btn-block" id="verify">VERIFY IUC</button>
                        <button class="btn btn-success btn-block" id="paybtn" style="display: none;">PURCHASE</button>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>


 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
      
     $("#verify").click(function(){
         var dtype=$("#dtype").val();
        var dnumber=$("#dnumber").val();
         var country=$("#country").val();
    if (dtype=="" || dnumber=="" || country==""){
        
        Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });

        return false;
    }
    
    else {
      $.LoadingOverlay("show");
      $("#verify").attr("disabled, true");
      $("#verify").html("Wait while verifying...");
      
      $.ajax({
          
           url:"verifyiuc.php",
            method:"POST",
            
            data:{

                dtype:dtype, dnumber:dnumber
            },
            success:function(data){
                
             $.LoadingOverlay("hide");
                
               if (data==100){
            $("#verify").attr("disabled, false");
            $("#verify").html("VERIFY IUC");
                
              Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Invalid Iuc Number', showConfirmButton:!1,timer:2500 });

               }
               else {
                $("#dtype").prop('disabled',true);
              $("#dnumber").prop('disabled',true);
              $("#country").prop('disabled',true);
                $("#dinfo").show();
                $("#dname").val(data);
                $("#verify").hide();
                $("#paybtn").show();
                
               }
            }
      })
    }
     })
  

</script>


<script>
  
   $("#paybtn").click(function(){
         
         var country=$("#country").val();
         var dtype=$("#dtype").val();
         var dnumber=$("#dnumber").val();
         var dname=$("#dname").val();

          swal({
          title: "Are you sure?",
          text: "You are about to subscribe " + dtype + " for "+ dname + " - " + dnumber,
          icon: "info",
          buttons: true,
          dangerMode: true,
        }).then((willProccess) => {

          if (willProccess){

           $.LoadingOverlay("show");
           $.ajax({
          
         url:"paycable.php",
         method:"POST",
         data:{
              country:country, dtype:dtype, dnumber:dnumber, dname:dname
         },
         success:function(respo){
           $.LoadingOverlay("hide");

          if (respo==200){

        Swal.fire
        ({ position:'top-end',type:'success',title:'Done', text: 'CableTV Purchase Successful', showConfirmButton:!1,timer:1500 });
         $("#PanelBoard").hide();
         $("#showAfterPayment").show();
          }

       else {

       Swal.fire
      ({ position:'top-end',type:'',title:'Oops', text: ''+respo, showConfirmButton:!1,timer:3500 });
                
       }

   }

   })
          }

           else {
    $.toast({
    heading: 'Cable TV',
    text: 'Payment Cancel',
    showHideTransition: 'slide',
    position: 'bottom-right',
    icon: 'error'
});
              }

        })

     
     

   })
</script>

<?php require("footer.php"); ?>
