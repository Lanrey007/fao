


 <?php require("header.php"); ?>

<?php require("menu.php"); ?>

<?php require("navbar.php"); ?>

<?php
    require("locker.php");

    if ($PAYSTACK=="OFF"){

      $pay= '<button class="btn btn-success btn-block" id="PayNow" disabled="disabled">MAKE PAYMENT</button>';
      
    }

    else {

     $pay='<button class="btn btn-success btn-block" onClick="makePay()" id="PayNow">MAKE PAYMENT</button>';
    }
    

    ?>

<style>
     #pMFeed{
         display:none;
     }
 </style>

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
                  <h3 class="mb-0">Fund Wallet</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
            
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
        
                      <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true" style="color: orange;"><button class="btn btn-warning">ATM </button></a>
                      </li>
                     

                     <li class="nav-item">
                        <a class="nav-link" id="bank_deposit-tab" data-toggle="tab" href="#bank_deposit" role="tab" aria-controls="bank_deposit" aria-selected="false" style="color: green;"><button class="btn btn-primary">Bank</button></a>
                      </li>


                       <li class="nav-item">
                        <a class="nav-link" id="auto_fund-tab" data-toggle="tab" href="#auto_fund" role="tab" aria-controls="auto_fund" aria-selected="false" style="color: green;"><button class="btn btn-danger">Transfer</button></a>
                      </li>

                    </ul>
                    
                    
                      <div class="tab-content border border-top-0 p-3" id="myTabContent">
                      <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <h3 class="card-title">Fund wallet with Monnify in seconds.(1.5% charges apply on any amount you fund.)</h3>
                     <form id="PayNow" method="post">
                      <div class="form-group">
                        <label class="form-control-label" for="input-name">Account Holder</label>
                        
                      <input type="text" name="account_holder" id="account_holder" class="form-control" value="<?php echo $first_name.' '.$last_name; ?>" readonly="readonly" required="required">
                      </div>



                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email Address</label>
                        
                      <input type="hidden" name="cs_token" id="cs_token" class="form-control" value="<?php echo $email; ?>" readonly="readonly" required="required">
                  

                        <input type="text" name="buyerEmail" id="buyerEmail" class="form-control" value="<?php echo $email; ?>" readonly="readonly" required="required">
                      </div>


                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Amount (&#8358;100)</label>
                        
                      <input type="number" name="amount" id="amount" min="0" class="form-control" required="required">
                      </div>

                      <div class="form-group">

                        
                        <div id="pMFeed"></div>
                        <?php
                        
                        echo $pay; ?>

                      </div>

            
                      </div>

                  </form>
                     
                      
                      
                      
                      
                      
                      















                      <div class="tab-pane fade" id="bank_deposit" role="tabpanel" aria-labelledby="bank_deposit-tab">
                          <h3 class="card-title">Deposit Money into the below account provided and your wallet will be credited after confirmation.</h3>
                           <form class="forms-sample">

                        <div class="form-group">
                        <label class="form-control-label" for="input-email">ACCOUNT NAME</label>
                        
                      <input type="text" name="" id="" class="form-control" value="  XXXXXX XXX  " readonly="readonly" required="required">
                    </div>

                    
                      <div class="form-group">
                       <label class="form-control-label">ACCOUNT NUMBER</label> <span style="float: right;color: red;cursor: pointer;font-size: 20px;"><i class="fa fa-copy" onclick="CopyToAccount('account_n');"></i></span>

                      <div class="alert alert-primary"  id="account_n">XXXXXXX</div>
                       
                      </div>

                      <div class="form-group">
                       <label class="form-control-label">BANK NAME</label>
                      <input type="text" name="" id="" class="form-control" value="XXX BANK" readonly="readonly" required="required">
                       
                      </div>
                      
                      
                      <hr/>
<!--                     
                      <div class="form-group">
                       <label class="form-control-label">ACCOUNT NUMBER</label> <span style="float: right;color: red;cursor: pointer;font-size: 20px;"><i class="fa fa-copy" onclick="CopyToAccount('account_xx');"></i></span>

                      <div class="alert alert-primary"  id="account_xx">0040311152</div>
                       
                      </div>

                      <div class="form-group">
                       <label class="form-control-label">BANK NAME</label>
                      <input type="text" name="" id="" class="form-control" value="UNION BANK" readonly="readonly" required="required">
                       
                      </div> -->

                            </form> 
                      </div>








                       <div class="tab-pane fade" id="auto_fund" role="tabpanel" aria-labelledby="auto_fund-tab">
                          <h3 class="card-title">Transfer into this account number below to automatically fund your wallet. (1.5% charges apply on any amount you fund.)</h3>
                          <p style="color: red;font-weight: bold;">Note: The account number belongs to only you.</p>
                           <form class="forms-sample">

                      <?php
                  if($wema=="" || $sterling =="" || $monie==""){
                     $redux_account="NOT AVAILABLE YET";
                     require("monnify_payment.php");  
                          }
                     
                      else{

                        $redux_account=$account_name.'-'.$sitetitle;
                      }
                      
                      
                       

                      ?>

                        <div class="form-group">
                        <label class="form-control-label" for="input-email">ACCOUNT NAME</label>
                        
                      <input type="text" name="" id="" class="form-control" value="<?php echo $redux_account; ?>" readonly="readonly" required="required">
                    </div>

                    
                      <div class="form-group">
                       <label class="form-control-label">WEMA BANK</label> <span style="float: right;color: red;cursor: pointer;font-size: 20px;"><i class="fa fa-copy" onclick="CopyToAccount('account_nx');"></i></span>

                      <div class="alert alert-primary"  id="account_nx"><?php echo $wema; ?></div>
                       
                      </div>
                      
                        <div class="form-group">
                       <label class="form-control-label">MONIEPOINT/ROLEZ BANK</label> <span style="float: right;color: red;cursor: pointer;font-size: 20px;"><i class="fa fa-copy" onclick="CopyToAccount('account_nx');"></i></span>

                      <div class="alert alert-primary"  id="account_nx"><?php echo $monie; ?></div>
                       
                      </div>
                      
                        <div class="form-group">
                       <label class="form-control-label">STERLING BANK</label> <span style="float: right;color: red;cursor: pointer;font-size: 20px;"><i class="fa fa-copy" onclick="CopyToAccount('account_nx');"></i></span>

                      <div class="alert alert-primary"  id="account_nx"><?php echo $sterling; ?></div>
                       
                      </div>




                     

                            </form> 
                      </div>


                     
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
               
              </form>
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
    text: 'Account copy success.',
    showHideTransition: 'slide',
    position: 'bottom-right',
    icon: 'success'
})
      }
    }

 </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function makePay() {
                var amount=$("#amount").val();

                if (amount==""){

                Swal.fire
                ({ position:'top-end',type:'',title:'Oops', text: 'Kindly fill all form', showConfirmButton:!1,timer:2500 });
                    return false;
                }
                
                else if (amount<100){

                Swal.fire
                ({ position:'top-end',type:'',title:'Oops', text: 'Minimum funding is N100', showConfirmButton:!1,timer:2500 });
                    return false;
                    
                }
            }
            
    $(function(){
        

        $('form#PayNow').submit(function(e){
            e.preventDefault();
            data = $(this).serializeArray();
            data.push({name:'process', value:'true'})

           

            $('div#pMFeed').load('paymonnify.php', data, function(response, status, xhr){
                if(response != ''){
                    //redirect below
                    a = $('div#pMFeed').text();
                    window.location.href = a;
                }else{
                    //if no return url is sent
                    $('div#pMFeed').html("<div class='text-danger'>Transaction failed! </div>")
                    alert('Transaction failed!');
                }
            })
        })
        
    })
</script>

<?php require("footer.php"); ?>
