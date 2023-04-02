

<?php require("header.php"); ?>

<?php require("menu.php"); ?>


<?php
    include("locker.php");

    if ($MTN_LOCK=="OFF"){
      $mtn_opt='';
    }
    else {
      $mtn_opt='<option value="MTN">MTN - '.$m_discount3.'% charges</option>';
    }


    if ($GLO_LOCK=="OFF"){
      $glo_opt='';
    }
    else {
      $glo_opt='<option value="GLO">GLO - '.$g_discount3.'% charges</option>';
    }


    if ($AIRTEL_LOCK=="OFF"){
      $airtel_opt='';
    }
    else {
      $airtel_opt='<option value="AIRTEL">AIRTEL - '.$a_discount3.'% charges</option>';
    }


    if ($MOBILE_LOCK=="OFF"){
      $mobile_opt='';
    }
    else {
      $mobile_opt='<option value="ETISALAT">9MOBILE - '.$mo_discount3.'% charges</option>';
    }

  
    ?>



<?php require("navbar.php"); ?>


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
                  <h3 class="mb-0">Airtime To Cash</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">

        <div class="alert alert-success" id="showAfterPayment" style="background-color: white;border: none;display: none;">
          <br>
          <br>
            <center>
           <a href="<?php echo $baseurl; ?>/AirtimeExchange"> <button class="btn btn-danger">Continue</button></a> 

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
                          <?php echo $glo_opt; ?>
                          <?php echo $airtel_opt; ?>
                          <?php echo $mobile_opt; ?>

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
                        <label class="form-control-label" for="input-amount">Amount (&#8358;500)</label>
                        <input type="number" id="amount" name="amount" class="form-control" min="0" required="required" autocomplete="off">
                      </div>
                    </div>
                  </div>


                  <div class="row" id="div_id_amount" style="display: none;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-amount">You Will Get</label>
                        <input type="number" id="amount2" name="amount2" class="form-control" min="0" required="required" autocomplete="off" readonly="readonly">
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
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>




 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

                              <script>
                                  $("#amount").keyup(function(){
                                    var amount=$("#amount").val();
                                    var network=$("#network").val();

                                    if (amount=="" || amount==null){

                                      $("#div_id_amount").hide()
                                     
                                    }
                                    else if (network=="MTN"){

                                      var mc=amount*(<?php echo $m_discount3; ?>)/100;
                                      var fc=amount-mc;
                                     
                                      $("#div_id_amount").show()
                                      $("#amount2").val(fc);

                                    }

                                    else if (network=="GLO"){

                                      var mc=amount*(<?php echo $g_discount3; ?>)/100;
                                      var fc=amount-mc;
                                      
                                      $("#div_id_amount").show()
                                      $("#amount2").val(fc);

                                    }

                                    else if (network=="AIRTEL"){

                                      var mc=amount*(<?php echo $a_discount3; ?>)/100;
                                      var fc=amount-mc;
                                      
                                      $("#div_id_amount").show()
                                      $("#amount2").val(fc);

                                    }

                                    else if (network=="ETISALAT"){

                                      var mc=amount*(<?php echo $mo_discount3; ?>)/100;
                                      var fc=amount-mc;
                                      
                                      $("#div_id_amount").show()
                                      $("#amount2").val(fc);

                                    }
                                  })
                                </script>


<script>
    $("#btnsubmit").click(function() {
        var network = $("#network").val();
        var amount = $("#amount").val();
        var amount2=$("#amount2").val();
        var mobile = $("#mobile").val();


        if (network=="" || mobile=="" || amount=="" || amount2==""){
          Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });
          return false;
        }

        else if (mobile.length < 11 || mobile.length > 11){

              Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Mobile no. should be at least 11digits', showConfirmButton:!1,timer:2500 });

          return false;
        }


        else if (amount < 500){

          Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Minimum you convert is ₦500', showConfirmButton:!1,timer:2500 });

          return false;
        }

    else{

      swal({
            title: "Dear <?php echo $username; ?>",
            text: "You're about to Convert Airtime " + network + " ₦" + amount + " and get ₦" + amount2,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((shallWe) => {

            if (shallWe){
              
            window.location.href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>&text=Hello%20Admin!%20i%20want%20to%20covert%20"+network+"%20₦"+amount+"%20to%20cash.";
            }
              
          })
    }
            
   

    });
</script>



<?php require("footer.php"); ?>
