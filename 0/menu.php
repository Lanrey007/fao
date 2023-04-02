<!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="">
        <a class="navbar-brand" href="javascript:void(0)">
          <button class="btn btn-danger btn-block">
            Wallet <span id="bal"></span> <i class="fa fa-spinner fa-spin"></i>
          </button>
          

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
              <script>
                $(document).ready(function sendRequest(){
                $.ajax({
                 url:"loadbalance.php",
               success:function(cc){
             $("#bal").html("&#8358;"+cc);
            setTimeout(function(){
            sendRequest();
             }, 1000);
             }
            })
        })
        </script>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/home">
                <i class="fa fa-university text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/history">
                <i class="ni ni-books text-primary"></i>
                <span class="nav-link-text">Transactions</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/FundWallet">
                <i class="ni ni-credit-card text-primary"></i>
                <span class="nav-link-text">Fund Wallet</span>
              </a>
            </li>

              <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/Bundle">
                <i class="fas fa-signal text-primary"></i>
                <span class="nav-link-text">Buy Data Bundle</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/Vtu">
                <i class="fas fa-phone-square text-primary"></i>
                <span class="nav-link-text">Buy Airtime VTU</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/buyShare">
                <i class="fas fa-phone text-primary"></i>
                <span class="nav-link-text">Buy Airtime Share</span>
              </a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/AirtimeExchange">
                <i class="fa fa-american-sign-language-interpreting text-primary"></i>
                <span class="nav-link-text">Airtime Exchange</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/CableTv">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Cable Subscription</span>
              </a>
            </li>

              <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/buyExam">
                <i class="fas fa-barcode text-primary"></i>
                <span class="nav-link-text">Scratch Card/Pins</span>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/billPayment">
                <i class="fas fa-lightbulb text-primary"></i>
                <span class="nav-link-text">Bills Payment</span>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/withdrawBonus">
                <i class="fa fa-coins text-primary"></i>
                <span class="nav-link-text">Withdraw Bonus</span>
              </a>
            </li>
            
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/Developer">
                <i class="fa fa-code text-primary"></i>
                <span class="nav-link-text">Developer API</span>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/profile">
                <i class="ni ni-single-02 text-orange"></i>
                <span class="nav-link-text">My Profile</span>
              </a>
            </li>
         
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $baseurl; ?>/logout">
                <i class="fas fa-power-off text-info"></i>
                <span class="nav-link-text">Logout</span>
              </a>
            </li>
          </ul>
         
        </div>
      </div>
    </div>
  </nav>