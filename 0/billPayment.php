

<?php require("header.php"); ?>

<?php require("menu.php"); ?>


 <?php
    require("locker.php");

    if ($AEDC=="OFF"){
      $AEDC='';
    }

    else {
      $AEDC='<option value="abuja-electric">ABUJA ELECTRIC</option>';
    }

     if ($IBEDC=="OFF"){
      $IBEDC='';
    }

    else {
      $IBEDC='<option value="ibadan-electric">IBADAN ELECTRIC</option>';
    }


     if ($EKEDC=="OFF"){
      $EKEDC='';
    }

    else {
      $EKEDC='<option value="eko-electric">EKO ELECTRIC</option>';
    }


     if ($IKEDC=="OFF"){
      $IKEDC='';
    }

    else {
      $IKEDC='<option value="ikeja-electric">IKEJA ELECTRIC</option>';
    }

      if ($PHED=="OFF"){
      $PHED='';
    }

    else {
      $PHED=' <option value="portharcourt-electric">PORTHARCOURT ELECTRIC</option>';
    }

     if ($JED=="OFF"){
      $JED='';
    }

    else {
      $JED=' <option value="jos-electric">JOS ELECTRIC</option>';
    }

    if ($KAEDCO=="OFF"){
      $KAEDCO='';
    }

    else {
      $KAEDCO=' <option value="kaduna-electric">KADUNA ELECTRIC</option>';
    }

    if ($KEDCO=="OFF"){
      $KEDCO='';
    }

    else {
      $KEDCO='<option value="kano-electric">KANO ELECTRIC</option>';
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
                  <h3 class="mb-0">Bills Payment </h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">

        <div class="alert alert-success" id="showAfterPayment" style="background-color: white;border: none;display: none;">
          <br>
          <br>
            <center>
           <a href="<?php echo $baseurl; ?>/billPayment"> <button class="btn btn-danger">Buy Electric</button></a> 

           <a href="<?php echo $baseurl; ?>/history"><button class="btn btn-danger">Check Token</button></a>
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

               <div class="alert alert-danger">₦<?php echo $elect_charge; ?> charges apply.</div>

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-disco">Disco Type</label>
                    <select name="discotype" class="select form-control" required id="discotype">
                     <option selected>---------</option>
                        <?php echo $AEDC; ?>
                        <?php echo $EKEDC; ?>
                         <?php echo $IBEDC; ?>
                         <?php echo $IKEDC; ?>
                         <?php echo $JED; ?>
                        <?php echo $KAEDCO; ?>
                         <?php echo $KEDCO; ?>
                         <?php echo $PHED; ?>

                          </select>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-meter">Meter Type</label>
                         <select name="metertype" class="select form-control" required id="metertype">

                         <option selected>---------</option>
                        <option value="prepaid">PrePaid Meter</option>
                       <option value="postpaid">PostPaid Meter</option>

                      </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-amount">Amount (&#8358;1000)</label>
                       <input type="number" name="amount" maxlength="15" minlength="2" class="textinput textInput form-control" required id="amount">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-meterno">Meter No.</label>
                        <input type="text" name="meternum" maxlength="15" minlength="5" class="textinput textInput form-control" required id="meternum">
                      </div>
                    </div>
                  </div>

                   <div class="row" id="meterinfo" style="display: none;">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-info">Meter Information</label>
                         <input type="text" name="metername" readonly="readonly" required="required" maxlength="70" class="textinput textInput form-control" id="metername">
                      </div>
                    </div>
                  </div>

                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <button class="btn btn-dark btn-block" id="verify">VERIFY METER</button>
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
      var discotype=$("#discotype").val();
      var metertype=$("#metertype").val();
      var meternum=$("#meternum").val();
      var amount=$("#amount").val();

     if (metertype=="" || meternum=="" || discotype=="" || amount==""){

       Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });

        return false;
    }

   else if (amount < 1000){

        Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'Minimum you can buy N1000', showConfirmButton:!1,timer:2500 });
        return false;
   }
   
   
    else {
     $.LoadingOverlay("show");

      $("#verify").attr("disabled, true");
      $("#verify").html("Wait while verifying...");
      
      $.ajax({
           url:"verifymeter.php",
            method:"POST",
            data:{

                metertype:metertype, meternum:meternum, discotype:discotype
            },
            success:function(data){
                
             $.LoadingOverlay("hide");
                
               if (data==100){

              $("#verify").attr("disabled, false");
             $("#verify").html("VERIFY METER");
                
         Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Invalid Meter Number', showConfirmButton:!1,timer:2500 });

               }

               else {

              $("#metertype").prop('disabled',true);
              $("#meternum").prop('disabled',true);
              $("#discotype").prop('disabled',true);
              $("#amount").prop('disabled',true);
              $("#meterinfo").show();
              $("#metername").val(data);
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
         
        var discotype=$("#discotype").val();
         var metertype=$("#metertype").val();
         var meternum=$("#meternum").val();
         var amount=$("#amount").val();
         var metername=$("#metername").val();

          swal({
          title: "Are you sure?",
          text: "You are about to buy ₦" +amount+" "+discotype+"("+metertype+") on "+meternum,
          icon: "info",
          buttons: true,
          dangerMode: true,
        }).then((willProccess) => {

      if (willProccess){
     $.LoadingOverlay("show");
      $.ajax({
          
         url:"payutility.php",
         method:"POST",
         data:{
              discotype:discotype, metertype:metertype, meternum:meternum, amount:amount, metername:metername
         },
         success:function(respo){

       $.LoadingOverlay("hide");

       if (respo==200){

        $("#electPanel").hide();
   
        Swal.fire
        ({ position:'top-end',type:'success',title:'Done', text: 'Electricity Purchase Successful', showConfirmButton:!1,timer:1500 });
         $("#PanelBoard").hide();
         $("#showAfterPayment").show();
       }

       else {
        Swal.fire
         ({ position:'top-end',type:'',title:'Oops', text: ''+respo, showConfirmButton:!1,timer:7500 });
       }

   }

   })
          }

 else {
              
$.toast({
    heading: 'Electricity',
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
