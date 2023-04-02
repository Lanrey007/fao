<?php

$getair=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM airtelprice WHERE id='1'"));

$air750mb=$getair['air750mb'];
$air1gb=$getair['air1gb'];
$air2gb=$getair['air2gb'];
$air3gb=$getair['air3gb'];
$air4gb=$getair['air4gb'];
$air6gb=$getair['air6gb'];
$air8gb=$getair['air8gb'];
$air11gb=$getair['air11gb'];
$air15gb=$getair['air15gb'];
$air40gb=$getair['air40gb'];
$air75gb=$getair['air75gb'];



?>