 <?php require("header.php"); ?>

		<?php require("menu.php"); ?>



		<div class="main-panel ">
				
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

<style>
      #process, #process2,#output{
        display: none;
    }


.swal-overlay {
  background-color: rgba(43, 165, 137, 0.45);
}


.swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #4962B3;
  font-size: 12px;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
</style>
			

			<br>
			<br>
			<br>

			<div style="margin:12px;">
			

			<div class="alert alert-default">

				<h1>Our Data API Price & Plan Code</h1>
				<hr>
				<p>
	
	This section contains the pricing plan for API users on the <?php echo $sitetitle; ?></p>
	

	<!--- FOR MTN PRICING PLAN-->

	<?php include("mtnprice.php"); ?>

	<br>
	<h3 style="font-weight: bold;">FOR MTN SME DATA (id: mtn)</h3>
	<div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered" style="background-color: orange">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> DATA VOL. </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo $mtn500mb; ?></td>
        <td>500MB</td>
        <td>500</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo $mtn1gb; ?></td>
        <td>1GB</td>
        <td>1000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mtn2gb); ?></td>
        <td>2GB</td>
        <td>2000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mtn3gb); ?></td>
        <td>3GB</td>
        <td>3000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mtn5gb); ?></td>
        <td>5GB</td>
        <td>5000</td>
        </tr>
    </table>
</div>


	<!--- FOR MTN PRICING PLAN-->

	<?php include("giftingprice.php"); ?>

	<br>
	<h3 style="font-weight: bold;">FOR MTN GIFTING DATA (id: gifting)</h3>
	<div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered" style="background-color: orange">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> DATA VOL. </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo $mtn500mb2; ?></td>
        <td>500MB</td>
        <td>500</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo $mtn1gb2; ?></td>
        <td>1GB</td>
        <td>1000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo ($mtn2gb2); ?></td>
        <td>2GB</td>
        <td>2000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo ($mtn3gb2); ?></td>
        <td>3GB</td>
        <td>3000</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo ($mtn5gb2); ?></td>
        <td>5GB</td>
        <td>5000</td>
        </tr>
    </table>
</div>




<!--- FOR GLO PRICING PLAN-->


<?php include("gloprice.php"); ?>

	<br>
	<h3 style="font-weight: bold;">FOR GLO DATA BUNDLE (id: glo)</h3>
	<div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered" style="background-color: green;color: white">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> DATA VOL. </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo $glo920mb; ?></td>
        <td>920MB</td>
        <td>301</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo $glo1gb; ?></td>
        <td>1.84GB</td>
        <td>302</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($glo4gb); ?></td>
        <td>4.5GB</td>
        <td>303</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($glo7gb); ?></td>
        <td>7.2GB</td>
        <td>304</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($glo8gb); ?></td>
        <td>8.75GB</td>
        <td>305</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($glo12gb); ?></td>
        <td>12.5GB</td>
        <td>306</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($glo15gb); ?></td>
        <td>15.5GB</td>
        <td>307</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($glo25gb); ?></td>
        <td>25GB</td>
        <td>308</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($glo32gb); ?></td>
        <td>32GB</td>
        <td>309</td>
        </tr>
    </table>
</div>





<!--- FOR AIRTEL PRICING PLAN-->


<?php include("airtelprice.php"); ?>

	<br>
	<h3 style="font-weight: bold;">FOR AIRTEL DATA BUNDLE (id: airtel)</h3>
	<div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered" style="background-color: red;color: white">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> DATA VOL. </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo $air750mb; ?></td>
        <td>750MB</td>
        <td>501</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo $air1gb; ?></td>
        <td>1.5GB</td>
        <td>502</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($air2gb); ?></td>
        <td>2GB</td>
        <td>503</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($air3gb); ?></td>
        <td>3GB</td>
        <td>504</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($air4gb); ?></td>
        <td>4.5GB</td>
        <td>505</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($air6gb); ?></td>
        <td>6GB</td>
        <td>506</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($air8gb); ?></td>
        <td>8GB</td>
        <td>507</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($air11gb); ?></td>
        <td>11GB</td>
        <td>508</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($air15gb); ?></td>
        <td>15GB</td>
        <td>509</td>
        </tr>

        <tr>
        <td>&#8358; <?php echo number_format($air40gb); ?></td>
        <td>40GB</td>
        <td>510</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($air75gb); ?></td>
        <td>75GB</td>
        <td>511</td>
        </tr>
    </table>
</div>







<!--- FOR 9MOBILE PRICING PLAN-->


<?php include("mobileprice.php"); ?>

	<br>
	<h3 style="font-weight: bold;">FOR ETISALAT DATA BUNDLE (id: etisalat)</h3>
	<div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered" style="background:linear-gradient(to right, #F27121, #E94057, #8A2387);color: white">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> DATA VOL. </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo $mb500mb; ?></td>
        <td>750MB</td>
        <td>401</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mb1gb); ?></td>
        <td>1.5GB</td>
        <td>402</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mb2gb); ?></td>
        <td>2GB</td>
        <td>403</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mb3gb); ?></td>
        <td>3GB</td>
        <td>404</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($mb4gb); ?></td>
        <td>4.5GB</td>
        <td>405</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($mb11gb); ?></td>
        <td>11GB</td>
        <td>406</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($mb15gb); ?></td>
        <td>15GB</td>
        <td>407</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($mb40gb); ?></td>
        <td>40GB</td>
        <td>408</td>
        </tr>

          <tr>
        <td>&#8358; <?php echo number_format($mb75gb); ?></td>
        <td>75GB</td>
        <td>409</td>
        </tr>
    </table>
</div>
<br>
<hr>

<h1>Technical Assistance</h1>

<p>We offer integration support through multiple channels.</p>
<p>You can reach us through email <span style="text-transform: lowercase;">support@<?php echo $sitetitle; ?>.com</span> or message us on whatsapp <?php echo $whatsapp; ?></p>

<br>

<br>
			</div>

			
		</div>
		</div>


<?php require("footer.php"); ?>