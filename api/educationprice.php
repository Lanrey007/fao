<?php

$getta=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM waec_neco_price WHERE id='1'"));

$waec=$getta['waec_price'];
$neco=$getta['neco_price'];
$nabteb=$getta['nabteb_price'];

?>