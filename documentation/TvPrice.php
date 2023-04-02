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

				<h1>Our CableTV API Price & Plan Code</h1>
				<hr>
				<p>
	
	This section contains the pricing plan for API users on the <?php echo $sitetitle; ?></p>
	

	<!--- FOR GOTV PRICING PLAN-->

	<?php include("gotvprice.php"); ?>

	<br>
	<h3 style="font-weight: bold;">FOR GOTV PACKAGES (id: gotv)</h3>
	<div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered" style="background-color: green;color: white;">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> PACKAGE </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo number_format($gotv_max); ?></td>
        <td>Gotv Max</td>
        <td>601</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($gotv_jinja); ?></td>
        <td>Gotv Jinja</td>
        <td>602</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($gotv_jolli); ?></td>
        <td>Gotv Jolli</td>
        <td>603</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($gotv_smallie); ?></td>
        <td>Gotv Smallie</td>
        <td>604</td>
        </tr>
    </table>
</div>




<!--- FOR DSTV PRICING PLAN-->

  <?php include("dstvprice.php"); ?>

  <br>
  <h3 style="font-weight: bold;">FOR DSTV PACKAGES (id: dstv)</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered" style="background-color: steelblue;color: white;">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> PACKAGE </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo number_format($dstv_yanga); ?></td>
        <td>Dstv Yanga</td>
        <td>801</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($dstv_confam); ?></td>
        <td>Dstv Confam</td>
        <td>802</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($dstv_padi_extra); ?></td>
        <td>Dstv Padi Extra</td>
        <td>803</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($dstv_yanga_extra); ?></td>
        <td>Dstv Yanga Extra</td>
        <td>804</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($dstv_asia); ?></td>
        <td>Dstv Asia</td>
        <td>805</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($dstv_confam_extra); ?></td>
        <td>Dstv Confam Extra</td>
        <td>806</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($dstv_compact); ?></td>
        <td>Dstv Compact</td>
        <td>807</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($dstv_compact_plus); ?></td>
        <td>Dstv Compact Plus</td>
        <td>808</td>
        </tr>

                        <tr>
        <td>&#8358; <?php echo number_format($dstv_premium); ?></td>
        <td>Dstv Premium</td>
        <td>809</td>
        </tr>

                        <tr>
        <td>&#8358; <?php echo number_format($dstv_premium_asia); ?></td>
        <td>Dstv Premium Asia</td>
        <td>810</td>
        </tr>
    </table>
</div>




<!--- FOR STARTIMES PRICING PLAN-->

  <?php include("startimeprice.php"); ?>

  <br>
  <h3 style="font-weight: bold;">FOR STARTIMES PACKAGES (id: startimes)</h3>
  <div class="table-responsive">
     <table id="zero_config" class="table table-striped table-bordered" style="background-color: steelblue;color: white;">
      <thead>
      <tr>                                     
       <th><b> PRICE </b></th>
        <th><b> PACKAGE </b></th>
        <th><b> PLAN CODE </b></th>
        </tr>
        </thead>
        <tr>
        <td>&#8358; <?php echo number_format($nova_week); ?></td>
        <td>Nova Weekly</td>
        <td>701</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($nova_month); ?></td>
        <td>Nova Monthly</td>
        <td>702</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($basic_week); ?></td>
        <td>Basic Weekly</td>
        <td>703</td>
        </tr>

         <tr>
        <td>&#8358; <?php echo number_format($basic_month); ?></td>
        <td>Basic Monthly</td>
        <td>704</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($smart_week); ?></td>
        <td>Smart Weekly</td>
        <td>705</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($smart_month); ?></td>
        <td>Smart Monthly</td>
        <td>706</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($classic_week); ?></td>
        <td>Classic Weekly</td>
        <td>707</td>
        </tr>

                 <tr>
        <td>&#8358; <?php echo number_format($classic_month); ?></td>
        <td>Classic Monthly</td>
        <td>708</td>
        </tr>

                        <tr>
        <td>&#8358; <?php echo number_format($super_week); ?></td>
        <td>Super Weekly</td>
        <td>709</td>
        </tr>

                        <tr>
        <td>&#8358; <?php echo number_format($super_month); ?></td>
        <td>Super Monthly</td>
        <td>710</td>
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