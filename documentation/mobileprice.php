<?php

$getmb=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM mobileprice WHERE id='1'"));

$mb500mb=$getmb['9mb500mb'];
$mb1gb=$getmb['9mb1gb'];
$mb2gb=$getmb['9mb2gb'];
$mb3gb=$getmb['9mb3gb'];
$mb4gb=$getmb['9mb4gb'];
$mb11gb=$getmb['9mb11gb'];
$mb15gb=$getmb['9mb15gb'];
$mb40gb=$getmb['9mb40gb'];
$mb75gb=$getmb['9mb75gb'];



?>