
<?php require("header.php"); ?>

<?php require("menu.php"); ?>


<?php
    require("locker.php");

    if ($WAEC=="OFF"){

      $WAEC_OPT='';
    }

    else {

      $WAEC_OPT='<option value="WAEC">WAEC - ₦'.$waec_price.'</option>';
    }
    
    
  if ($NECO=="OFF"){

      $NECO_OPT='';
    }

    else {

      $NECO_OPT='<option value="NECO">NECO - ₦'.$neco_price.'</option>';
    }



  if ($NABTEB=="OFF"){

      $NABTEB_OPT='';
    }

    else {

      $NABTEB_OPT='<option value="NABTEB">NABTEB - ₦'.$nabteb_price.'</option>';
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
                  <h3 class="mb-0">Scratch Cards </h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">

        <div class="alert alert-success" id="showAfterPayment" style="background-color: white;border: none;display: none;">
          <br>
          <br>
            <center>
           <a href="<?php echo $baseurl; ?>/buyExam"> <button class="btn btn-danger">Scratch Card</button></a> 

           <a href="<?php echo $baseurl; ?>/history"><button class="btn btn-danger">Check Pin</button></a>
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
                        <label class="form-control-label" for="input-exam">Exam Type</label>
                        <select name="pintype" class="select form-control" required id="pintype">
 
                       <option value=""> Please select... </option>
                                                                            
                        <?php echo $WAEC_OPT; ?>
                        <?php echo $NECO_OPT; ?>
                        <?php echo $NABTEB_OPT; ?>

                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-range">Quantity</label>
                         <select name="variation_code" class="select form-control" required id="variation_code">
 
                   <option value="">Please select...</option> 
                  <option value="1">1 piece of result checker</option>

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
                     <br>
                     <br>
           
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>


 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $("#btnsubmit").click(function(){
    var pintype=$("#pintype").val();
    var variation_code=$("#variation_code").val();
    var mobile=$("#mobile").val();

    if (pintype=="" || variation_code=="" || mobile==""){
        Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });
      return false;

    }

    if (mobile.length < 11 || mobile.length > 11){

          Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Mobile no. should be at least 11digits', showConfirmButton:!1,timer:2500 });

          return false;
   }

    else{

      $.LoadingOverlay("show");

      $.ajax({
        type:"POST",
        url:"pay_exam.php",
        data:{
        pintype:pintype,mobile:mobile,variation_code:variation_code
       },
     success:function(dataResult){
      $.LoadingOverlay("hide");
         
      if (dataResult==200){
      Swal.fire
        ({ position:'top-end',type:'success',title:'Done', text: 'Pin Purchase Successful', showConfirmButton:!1,timer:1500 });
          $("#PanelBoard").hide();
          $("#showAfterPayment").show();
         }

        else {

         Swal.fire
         ({ position:'top-end',type:'',title:'Oops', text: ''+dataResult, showConfirmButton:!1,timer:3500 });

        }

}

      })

    }


  })
</script>

<?php require("footer.php"); ?>
