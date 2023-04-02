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

			<div style="margin:25px;">
			

			<div class="alert alert-default">

				<h1>Integrating Educational API</h1>
				<hr>
				<p>
	
	This section contains the recommended flow for integrating Educational services on the <?php echo $sitetitle; ?> RESTful API.
				</p>
	
	<br>
	<h3 style="color: red;">EDUCATIONAL PIN BASE URL</h3>	
	<p><b>Make HTTP POST request to this endpoint</b></p>
	<div class="alert alert-danger"><?php echo $pinurl; ?></div>
	<br>

	<h3 style="color: red;">Required Parameters</h3>
	<p><b>token :</b> This is the generated <b>TOKEN</b> on <?php echo $sitetitle; ?> dashboard.</p>
	<p><b>service_id :</b> This is the services you are paying for e.g waec, neco, nabteb.</p>
	<p><b>request_id :</b> This is a unique reference generate for each transaction.</p>


<h3 style="color: red;">API Response</h3>
	<p>On a successful transaction, you get a json response e.g:</p>
	<p style="font-weight: bold;">{code:200, status:success, desc:Waec PIN purchase successfully (pin:78348094003403)}</p>
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