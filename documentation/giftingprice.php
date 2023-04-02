<?php

$getmtn=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM giftingprice WHERE id='1'"));
$mtn500mb2=$getmtn['mtn500mb'];
$mtn1gb2=$getmtn['mtn1gb'];
$mtn2gb2=$getmtn['mtn2gb'];
$mtn3gb2=$getmtn['mtn3gb'];
$mtn5gb2=$getmtn['mtn5gb'];



?>