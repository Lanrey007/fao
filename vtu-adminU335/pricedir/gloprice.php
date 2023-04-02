<?php

$getglo=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM gloprice WHERE id='1'"));

$glo920mb=$getglo['glo920mb'];
$glo1gb=$getglo['glo1gb'];
$glo4gb=$getglo['glo4gb'];
$glo7gb=$getglo['glo7gb'];
$glo8gb=$getglo['glo8gb'];
$glo12gb=$getglo['glo12gb'];
$glo15gb=$getglo['glo15gb'];
$glo25gb=$getglo['glo25gb'];
$glo32gb=$getglo['glo32gb'];



?>