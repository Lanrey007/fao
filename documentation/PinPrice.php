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

				<h1>Our Waec & Neco API Price & Service id</h1>
				<hr>
				<p>
	
	This section contains the pricing plan for API users on the <?php echo $sitetitle; ?></p>
	

	<!--- FOR MTN PRICING PLAN-->

	<?php include("waec_neco_price.php"); ?>

	<br>
	<h3 style="font-weight: bold;">WAEC & NECO DISCOUNT</h3>
	<div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered" style="background-color: black;color: white">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> PIN-TYPE </b></th>
        <th><b> SERVICE ID </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo number_format($waec_price); ?></td>
        <td>1 WAEC PIN</td>
        <td>waec</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($neco_price); ?></td>
        <td>1 NECO PIN</td>
        <td>neco</td>
        </tr>

        <tr>
        <td>&#8358; <?php echo number_format($nabteb_price); ?></td>
        <td>1 NABTEB PIN</td>
        <td>nabteb</td>
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