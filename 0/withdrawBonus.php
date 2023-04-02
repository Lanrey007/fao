

<?php require("header.php"); ?>

<?php require("menu.php"); ?>

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
                  <h3 class="mb-0">Withdraw Bonus </h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">

        <div class="alert alert-success" id="showAfterPayment" style="background-color: white;border: none;display: none;">
          <br>
          <br>
            <center>
           <a href="<?php echo $baseurl; ?>/withdrawBonus"> <button class="btn btn-danger">Continue</button></a> 

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

               <div class="alert alert-danger">NGN <?php echo number_format($refbonus,2); ?></div>

                   
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email Address</label>
                        <input type="text" name="email_add"  disabled="disabled" value="<?php echo $email; ?>" class="textinput textInput form-control" required id="email_add">
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-amount">Amount (&#8358;100)</label>
                         <input type="number" name="amount_w" required="required" min="0" class="textinput textInput form-control" id="amount_w">
                      </div>
                    </div>
                  </div>

                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <button class="btn btn-success btn-block" id="withbtn">WITHDRAW</button>
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
  
   $("#withbtn").click(function(){
         
         var email_add=$("#email_add").val();
         var amount_w=$("#amount_w").val();


        if (email_add=="" || amount_w==""){

         Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });
          return false;
        }
        
        else if (amount_w < 100){

         Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'Minimum Withdraw N100', showConfirmButton:!1,timer:2500 });
          return false;
        }

        else{
          swal({
          title: "Are you sure?",
          text: "You are about to withdraw ₦" + amount_w + " to your wallet ?",
          icon: "info",
          buttons: true,
          dangerMode: true,
        }).then((willProccess) => {

          if (willProccess){

           $.LoadingOverlay("show");
           $.ajax({
          
         url:"processWithdraw.php",
         method:"POST",
         data:{
              amount_w:amount_w, email_add:email_add
         },
         success:function(respo){
         $.LoadingOverlay("hide");

          if (respo==200){

        Swal.fire
        ({ position:'top-end',type:'success',title:'Done', text: 'Bonus Withdraw Successful', showConfirmButton:!1,timer:1500 });
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
    heading: 'Withdraw',
    text: 'Payment Cancel',
    showHideTransition: 'slide',
    position: 'bottom-right',
    icon: 'error'
});
              }

        })
       
   }  

   })
</script>

<?php require("footer.php"); ?>
