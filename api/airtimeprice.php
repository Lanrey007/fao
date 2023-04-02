<?php

require("../config.php");

$getairtime=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM airtimeprice WHERE id='1'"));

$mtndiscount=$getairtime['mtndiscount'];
$glodiscount=$getairtime['glodiscount'];
$airteldiscount=$getairtime['airteldiscount'];
$mobilediscount=$getairtime['mobilediscount'];

?>