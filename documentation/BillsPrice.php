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

				<h1>Our Electricity API Discount & Service id</h1>
				<hr>
				<p>
	
	This section contains the pricing plan for API users on the <?php echo $sitetitle; ?></p>
	

	<!--- FOR MTN PRICING PLAN-->

	<?php include("electprice.php"); ?>

	<br>
	<h3 style="font-weight: bold;">ELECTRICITY DISCOUNT</h3>
	<div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered" style="background-color: black;color: white">
      <thead>
      <tr>                                     
       <th><b> DISCOUNT </b></th>
        <th><b> DISCO </b></th>
        <th><b> SERVICE ID </b></th>
        </tr>
        </thead>
        <tr>
        <td><?php echo $aedc; ?>%</td>
        <td>AEDC</td>
        <td>abuja-elctric</td>
        </tr>

         <tr>
        <td><?php echo $ekedc; ?>%</td>
        <td>EKEDC</td>
        <td>ekedc-electric</td>
        </tr>

         <tr>
        <td><?php echo number_format($ikedc); ?>%</td>
        <td>IKEDC</td>
        <td>ikeja-electric</td>
        </tr>

         <tr>
        <td><?php echo number_format($ibedc); ?>%</td>
        <td>IBEDC</td>
        <td>ibedc-electric</td>
        </tr>


         <tr>
        <td><?php echo number_format($jed); ?>%</td>
        <td>JED</td>
        <td>jos-electric</td>
        </tr>

         <tr>
        <td><?php echo number_format($kaedco); ?>%</td>
        <td>KAEDCO</td>
        <td>kaduna-electric</td>
        </tr>


         <tr>
        <td><?php echo number_format($kedco); ?>%</td>
        <td>KEDCO</td>
        <td>kano-electric</td>
        </tr>


         <tr>
        <td><?php echo number_format($phed); ?>%</td>
        <td>PHED</td>
        <td>portharcourt-electric</td>
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