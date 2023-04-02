

<?php require("header.php"); ?>

<?php require("menu.php"); ?>


<?php
    include("locker.php");

    if ($MTN_SHARE=="OFF"){
      $mtn_opt='';
    }
    else {
      $mtn_opt='<option value="MTN">MTN - '.$m_discount2.'% discount</option>';
    }


    if ($GLO_SHARE=="OFF"){
      $glo_opt='';
    }
    else {
      $glo_opt='<option value="GLO">GLO - '.$g_discount2.'% discount</option>';
    }


    if ($AIRTEL_SHARE=="OFF"){
      $airtel_opt='';
    }
    else {
      $airtel_opt='<option value="AIRTEL">AIRTEL - '.$a_discount2.'% discount</option>';
    }


    if ($MOBILE_SHARE=="OFF"){
      $mobile_opt='';
    }
    else {
      $mobile_opt='<option value="ETISALAT">9MOBILE - '.$mo_discount2.'% discount</option>';
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
                  <h3 class="mb-0">Buy Share Airtime </h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">

        <div class="alert alert-success" id="showAfterPayment" style="background-color: white;border: none;display: none;">
          <br>
          <br>
            <center>
           <a href="<?php echo $baseurl; ?>/buyShare"> <button class="btn btn-danger">Share Airtime</button></a> 

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
                        <label class="form-control-label" for="input-city">Airtime Type</label>
                     <select name="airtimetype" class="select form-control" required id="airtimetype">
                    <option value="" selected>---------</option>

                    <option value="SHARE">AIRTIME SHARE n SELL</option>

                    </select>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Choose Network</label>
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
                        <label class="form-control-label" for="input-amount">Amount (&#8358;100)</label>
                        <input type="number" id="amount" name="amount" class="form-control" min="0" required="required" autocomplete="off">
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
    $("#btnsubmit").click(function() {
        var airtimetype= $("#airtimetype").val();
        var network = $("#network").val();
        var amount = $("#amount").val();
        var mobile = $("#mobile").val();


        if (airtimetype=="" || network=="" || mobile=="" || amount==""){

        
          Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });

          return false;
        }

        if (mobile.length < 11 || mobile.length > 11){

          Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Mobile no. should be at least 11digits', showConfirmButton:!1,timer:2500 });

          return false;
        }


        if (amount < 100){


            Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Minimum recharge is ₦100', showConfirmButton:!1,timer:2500 });

          return false;
        }

      swal({
            position: "top-end",
            title: "Dear <?php echo $username; ?>",
            text: "You're about to buy " + network + " ₦" + amount + " to " + mobile,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((shallWe) => {

            if (shallWe){

            $.LoadingOverlay("show");

            $.ajax({

              url:"Airtimepayment.php",
              method:"POST",
              data:{
                amount:amount, mobile:mobile, network:network, airtimetype:airtimetype
                 },
                success:function(Rexdata){
                $.LoadingOverlay("hide");

              if (Rexdata != 200){
                Swal.fire
                ({ position:'top-end',type:'',title:'Obops', text: ''+Rexdata, showConfirmButton:!1,timer:3500 });
                
                }

                else {
                Swal.fire
                ({ position:'top-end',type:'success',title:'Done', text: 'Airtime Purchase Successful', showConfirmButton:!1,timer:1500 });
                $("#PanelBoard").hide();
                $("#showAfterPayment").show();

                }


                }
            })
            }
              
          })
            

          

    });
</script>


<?php require("footer.php"); ?>
