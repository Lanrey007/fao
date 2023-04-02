<?php require("header.php"); ?>

<?php

        $error=$history="";

        $xxx= mysqli_query($db,"SELECT * FROM mytransaction WHERE email='".$email."' OR username='".$username."' ORDER BY id DESC LIMIT 300");

        $count=mysqli_num_rows($xxx);

        if ($count<1){

          $history='<div class="alert alert-danger">
              
                         No Transaction Record Yet

                

                         </div>';
        }
        while ($data = mysqli_fetch_array($xxx, MYSQLI_ASSOC))
    { 

      $status=$data['status'];
      $amount=$data['amount'];
      $trx=$data['trx'];
      $active=$data['active'];
      $descr=$data['descr'];
      $date=$data['date'];
      $oldbal=$data['oldbal'];
      $newbal=$data['newbal'];

      $faxST=strtolower($status);

      if ($faxST=="successful"){

        $actmode="bg-success";
      }

      else {

        $actmode="bg-danger";

      }


      $history.=' <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Desc</th>
                    <th scope="col" class="sort" data-sort="budget">Amount</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Ref</th>
                    <th scope="col" class="sort" data-sort="completion">OldBal</th>
                    <th scope="col">NewBal</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="'.$baseurl.'/receipt.php?refrence='.$trx.'">
                          <i class="fas fa-print" style="font-size:20px;margin-right:10px;"></i>
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">'.$descr.'</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      &#8358;'.$amount.'
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="'.$actmode.'"></i>
                        <span class="status">'.$status.'</span>
                      </span>
                    </td>
                    <td>
                       <span class="badge badge-dot mr-4">
                        <span>'.$date.'</span>
                      </span>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span>'.$trx.'</span>
                      </span>
                    </td>
                    <td class="text-right">
                      <span class="badge badge-dot mr-4">
                        <span>&#8358;'.$oldbal.'</span>
                      </span>
                    </td>

                     <td class="text-right">
                      <span class="badge badge-dot mr-4">
                        <span>&#8358;'.$newbal.'</span>
                      </span>
                    </td>
                  </tr>

                 
                </tbody>
              </table>
            </div><div class="dropdown-divider" style="border-color:black;"></div>';



      }

      ?>

<?php require("menu.php"); ?>
  
  <?php require("navbar.php"); ?>

    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6" style="max-height: 200px;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Transactions</h6>
            
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Transactions</h3>
            </div>
            <!-- Light table -->
           
           <?php echo $history; ?>

          </div>
        </div>
      </div>
    

<?php require("footer.php"); ?>