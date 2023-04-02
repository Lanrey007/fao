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

				<h1>Integrating the <?php echo $sitetitle; ?> API</h1>
				<hr>
				<p>
	
	You have to create an account with <?php echo $sitetitle; ?> <br/>
	 After successful creation of the account, on the menu; Click <b>Developer API</b> and a unique token will be generated for your profile in some seconds.
				</p>
	
	<br>
	<h1>OUR API BASE URL</h1>	
	<b>Our Data Subscription base url:</b>
	<div class="alert alert-success"><?php echo $dataurl; ?></div>
	<br>

	<b>Our Airtime VTU vending base url:</b>
	<div class="alert alert-success"><?php echo $airtimeurl; ?></div>
	<br>

	<b>Our TV Subscription base url:</b>
	<div class="alert alert-success"><?php echo $tvurl; ?></div>
	<br>

	<b>Our Electricity base url:</b>
	<div class="alert alert-success"><?php echo $billurl; ?></div>
	<br>

	<b>Our Educational base url:</b>
	<div class="alert alert-success"><?php echo $pinurl; ?></div>
	<br>


<br>
<hr>
<h1>Technical Assistance</h1>

<p>We offer integration support through multiple channels.</p>
<p>You can reach us through email <span style="text-transform: lowercase;">support@<?php echo $sitetitle; ?>.com</span> or message us on whatsapp <?php echo $whatsapp; ?></p>

<h2>Happy Coding !!!</h2>
<br>
<br>
			</div>

			
		</div>
		</div>


<?php require("footer.php"); ?>