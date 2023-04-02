

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
                  <h3 class="mb-0">Developer API Token </h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">

      <?php
      
      if ($token=="" || strlen($token)<10){
         
    $TB=' <button class="btn btn-success btn-block" id="withbtn">GENERATE TOKEN</button>';
    $TT='Your Token WIll SHow Here';

     
      }
      
      else{
          
     $TB=' <button class="btn btn-danger btn-block" disabled="disabled">USE ABOVE TOKEN</button>';
     $TT=$token;
    
      }
      ?>
             
                <div class="pl-lg-4" id="PanelBoard">

               <div class="alert alert-danger"> <b> <?php echo $TT; ?> </b> </div>

                   
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email Address</label>
                        <input type="text" name="email_token"  disabled="disabled" value="<?php echo $email; ?>" class="textinput textInput form-control" required id="email_token">
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-amount">Mobile Number</label>
                         <input type="text" value="<?php echo $mobile; ?>"  name="mobile" required="required" class="textinput textInput form-control" id="mobile" readonly="readonly">
                      </div>
                    </div>
                  </div>

                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                   <?php echo $TB; ?>
                    
                    <br/>
                    <br/>
                    <h5>If you are intrested in integrating our API, kindly go through our API documentation and API pricing. <a href="<?php echo $mainpage; ?>/documentation" target="_blank"><button class="btn btn-danger">Read Now</button></a></h5>
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
         
         var email_token=$("#email_token").val();
         var mobile=$("#mobile").val();


           $.LoadingOverlay("show");
           $.ajax({
          
         url:"generate_Token.php",
         method:"POST",
         data:{
              mobile:mobile, email_token:email_token
         },
         success:function(respo){
         $.LoadingOverlay("hide");

          if (respo==200){

        Swal.fire
        ({ position:'top-end',type:'success',title:'Done', text: 'Token Created Successful', showConfirmButton:!1,timer:1500 });
      
        window.location.href="Developer";
        
          }

       else {

       Swal.fire
      ({ position:'top-end',type:'',title:'Oops', text: ''+respo, showConfirmButton:!1,timer:3500 });
                
       }

   }


        })


   })
</script>

<?php require("footer.php"); ?>
