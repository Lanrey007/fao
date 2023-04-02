<?php

$getTv=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM gotvprice WHERE id='1'"));

$gotv_max=$getTv['gotv_max'];
$gotv_jinja=$getTv['gotv_jinja'];
$gotv_jolli=$getTv['gotv_jolli'];
$gotv_smallie=$getTv['gotv_smallie'];

?>