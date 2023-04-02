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

				<h1>All our API response codes.</h1>
				<hr>
	
	
	<br>
	<h3 style="color: green;">API SUCCESSFUL RESPONSE CODE</h3>	
	<p><b>For a successful api transaction</b></p>
	<div class="alert alert-success">Code: 200</div>

	<br>
	<h3 style="color: red;">USER ACCOUNT NOT FOUND</h3>	
	<p><b>For fail retreiving user account</b></p>
	<div class="alert alert-danger">Code: 300</div>


	<br>
	<h3 style="color: red;">IMCOMPLETE RESPONSE CODE</h3>	
	<p><b>For imcomplete api parameters</b></p>
	<div class="alert alert-danger">Code: 500</div>


	<br>
	<h3 style="color: red;">INVALID PLAN RESPONSE CODE</h3>	
	<p><b>For invalid plan code</b></p>
	<div class="alert alert-danger">Code: 700</div>


	<br>
	<h3 style="color: orange;">LOW WALLET RESPONSE CODE</h3>	
	<p><b>For low account or wallet </b></p>
	<div class="alert alert-warning">Code: 800</div>


	<br>
	<h3 style="color: red;">API FAILED RESPONSE CODE</h3>	
	<p><b>For failed api transaction</b></p>
	<div class="alert alert-danger">Code: 900</div>



	
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