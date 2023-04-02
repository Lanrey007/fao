<?php

$getmtn=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM mtnprice WHERE id='1'"));
$mtn500mb=$getmtn['mtn500mb'];
$mtn1gb=$getmtn['mtn1gb'];
$mtn2gb=$getmtn['mtn2gb'];
$mtn3gb=$getmtn['mtn3gb'];
$mtn5gb=$getmtn['mtn5gb'];



?>