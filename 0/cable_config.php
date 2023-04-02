<?php

require_once("session.php");

//$vt=base64_encode($vtpass_login);
$vt='YmFiZHVycmFobW9uKzFAZ21haWwuY29tOlN3YWd6NzZraWQ=';


$adminphone=$contact_number;

$v_url="https://sandbox.vtpass.com/api/merchant-verify";

$balance_url="https://sandbox.vtpass.com/api/balance";


$pay_url="https://sandbox.vtpass.com/api/pay";



$query_url="https://vtpass.com/api/requery";




?>