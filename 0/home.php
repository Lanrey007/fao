<?php require("header.php"); ?>

<?php require("menu.php"); ?>

<?php require("navbar.php"); ?>



	<?php 

   $getAllTransaction=mysqli_query($db, "SELECT COUNT(*) FROM mytransaction WHERE username='".$username."' OR email='".$email."'");
   $aa=mysqli_fetch_array($getAllTransaction);
   $returnTransaction=$aa[0];

   ?>



<div class="header bg-primary pb-6" id="greeting()">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Welcome <?php echo $first_name; ?> </h6>


            </div>
           
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Wallet</h5>
                      <span class="h4 font-weight-bold mb-0">NGN <?php echo number_format($mallu,2); ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-credit-card"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                 
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Bonus</h5>
                      <span class="h4 font-weight-bold mb-0">NGN <?php echo number_format($refbonus,2); ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                   
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Transactions</h5>
                      <span class="h4 font-weight-bold mb-0"><?php echo $returnTransaction; ?> <small>Sale(s)</small></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-yellow text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Account Type</h5>
                      <span class="h4 font-weight-bold mb-0"><?php echo strtoupper($ceov); ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-laptop"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">

                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1"><?php echo date("d-M-y".'  '.'h:i:m'); ?></h6>
                  <h5 class="h3 text-white mb-0">Welcome to <?php echo $sitetitle; ?></h5>
                </div>
              </div>
            </div>
            <div class="card-body">

          <h5 class="text-white mb-2" style="font-size: 14px;">Refer people to <span style="text-transform: uppercase;"><?php echo $sitetitle; ?></span> and earn ₦500 immediately the person upgrade his/her account to Topuser.
          </h5>
          <p class="mb-0 text-white" style="font-size: 13px;"> <b>Referal Link:</b>
            <span class="data-toggle=" id="mytext">https://<span style="text-transform: lowercase;"><?php echo $sitetitle; ?>.com.ng/0/create_account?referral=</span><?php echo $refcode; ?></span>
            <span class="badge badge-dark" onclick="CopyToAccount('mytext');"  style="cursor: pointer;color: white;font-size: 19px;"><i class="fa fa-copy"></i></span> <span id="linked"></span>

          </p>

          <br>


          <div class="alert alert-danger">

          <h3 style="color: white;font-weight: bold;">UPGRADE ACCOUNT</h3>

          <div class="form-group">
            <input type="text" name="emailAct" id="emailAct" readonly="readonly" class="form-control" value="<?php echo $email; ?>" required="required">
          </div>

           <div class="form-group">
           <select class="form-control" name="usertype" id="usertype" required="required">

             <option value="AFFLIATE">AFFLIATE N1,000</option>
             <option value="TOPUSER">TOPUSER N3,000</option>
             <option value="AMBASSADOR">AMBASSADOR N5,000</option>
           </select>
          </div>
            

          <div class="form-group">
            <button class="btn btn-primary btn-block" id="process">PROCEED</button>
          </div>


          </div>


              </div>
            </div>
          </div>
      
      
       
<script>

        function CopyToAccount(containerid) {
      if (document.selection) {
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select().createTextRange();
        document.execCommand("copy");

      } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().removeAllRanges(); // clear current selection
        window.getSelection().addRange(range); // to select text
        document.execCommand("copy");
        window.getSelection().removeAllRanges();
      $.toast({
    heading: 'Copied',
    text: 'Referal Link Copied.',
    showHideTransition: 'slide',
    position: 'bottom-right',
    icon: 'success'
})
      }
    }

 </script>



<script>
  
   $("#process").click(function(){
         
         var emailAct=$("#emailAct").val();
         var usertype=$("#usertype").val();

          swal({
          title: "Are you sure?",
          text: "You are about to upgrade to " + usertype,
          icon: "info",
          buttons: true,
          dangerMode: true,
        }).then((willProccess) => {

          if (willProccess){
           $.LoadingOverlay("show");
           $.ajax({
          
         url:"ActivatAgent.php",
         method:"POST",
         data:{
              emailAct:emailAct, usertype:usertype
         },
         success:function(respo){
        $.LoadingOverlay("hide");

          if (respo==200){

        Swal.fire
        ({ position:'top-end',type:'success',title:'Done', text: 'Account Upgraded Successful', showConfirmButton:!1,timer:1500 });
       $.toast({
    heading: 'Congratulation',
    text: 'Congrat on your level up',
    showHideTransition: 'slide',
    position: 'bottom-right',
    icon: 'success',
    timer: 6000
});

             $.toast({
    heading: 'Hey Congrats',
    text: 'We are happy to have you',
    showHideTransition: 'slide',
    position: 'top-end',
    icon: 'success',
    timer: 6000
});

        $.toast({
    heading: 'Welcome',
    text: 'You are away to open some perks',
    showHideTransition: 'slide',
    position: 'top-right',
    icon: 'success',
    timer: 6000
});
          }

       else {

       Swal.fire
      ({ position:'top-end',type:'',title:'Oops', text: ''+respo, showConfirmButton:!1,timer:4500 });
                
       }

   }

   })
          }

           else {
    $.toast({
    heading: 'Upgrading',
    text: 'Payment Cancel',
    showHideTransition: 'slide',
    position: 'bottom-right',
    icon: 'error'
});
              }

        })

     
     

   })
</script>

<script>
    $(document).ready(function greeting(){
        
       var mode="<?php echo $mode; ?>";
       
       if (mode=="ON"){
           
            Swal.fire
      ({ position:'top-end',type:'',title:'Notification', text: '<?php echo $popup_msg; ?>', showConfirmButton:!1,timer:9500 });
        
    }
    
    })
</script>


<?php require("footer.php"); ?>
