
<?php

require("session.php");
require("cable_config.php");


if (!isset($_POST['dtype']) && !isset($_POST['dnumber']) && !isset($_POST['dname'])){
    
   echo "Please reload page and try again";
   exit();
}

$dtype=$_POST['dtype'];
$dname=$_POST['dname'];
$dnumber=$_POST['dnumber'];
$country=$_POST['country'];


$plan=preg_replace("/(.*?)=(.*)/", "$2", $country);
$package=preg_replace("/(.*?)=(.*)/", "$1", $country);
$xamount=preg_replace('/\D+/', '', $plan);

$sell_package=strtolower(str_replace(" ", "-", $package));

$yamount=$xamount+$cable_charge;
$amounttopay=ceil($yamount);

$mydc=strtolower($dtype);

if ($mydc=="gotv"){
    require("gotvbiller.php");
}

 if ($mydc=="dstv"){
    require("dstvbiller.php");
}

if ($mydc=="startimes") {
    require("startimesbiller.php");
}


date_default_timezone_set('Africa/Lagos');
$time= date("d-m-Y h:i:sa");

$trxID=$mydc.rand(100,900).time();

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$ye =  $dateTime->format('YmdHi');
$ref = "$ye$trxID";
$sell_package2=urlencode($package);
//print $plan_code;
//print $sell_package;


if ($amounttopay>$mallu){
    
    echo "Cable Subscription Fail Due To Insufficient Fund"; //Insufficient Fund
    exit();
}

else {
 
$curl = curl_init(); 
curl_setopt_array($curl, array( 
    CURLOPT_URL => "$balance_url",
    CURLOPT_RETURNTRANSFER => true, 
    CURLOPT_ENCODING => "", 
    CURLOPT_MAXREDIRS => 10, 
    CURLOPT_TIMEOUT => 0, 
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_HTTPHEADER => array(
        "Authorization: Basic ".$vt."", 
        "Content-Type: application/json" ), )); 
        $response=curl_exec($curl);
        curl_close($curl);
print $response;
$xx=json_decode($response, true);

$adminbal=$xx['contents']['balance'];


if ($amounttopay>$adminbal){
    
    echo "Cable Subscription Timeout, Please Contact Admin"; // Admin Bal Low
    exit();
}

else {
    
  $newbal = $mallu-$amounttopay;
  mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");
  
//   $postdata2=array(
//   'token' => $gladapi,
//   'service_number' => $dnumber, billersCode
//   'service_id' => $mydc,
//   'request_id' => $trxID,
//   'plan_code' => $plan_code,variation_code
// );

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "$pay_url",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => \json_encode(array('request_id'=>$ref, 'billersCode'=>$dnumber,'variation_code'=>$plan_code,'serviceID'=>$mydc,'phone'=>$adminphone,'subscription_type'=>'change')),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic ".$vt."", 
    "Content-Type: application/json"
  ),
));
$response = curl_exec($curl);
curl_close($curl);
//print $response;
$data=json_decode($response, true);

$desc=$data['desc'];
$status=$data['code'];

if ($status=="000"){
    
    $descr=$package.' Subscription on '.$dnumber.'-'.$dname;
    
    mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."','".$username."', '".$amounttopay."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$ref."','".$mallu."','".$newbal."')");
    
    echo "200"; //Successful Order
    exit();
}

else {
    
    $descr='Unsuccessful '.$package.' Subscription on '.$dnumber.'-'.$dname;
    
    $newbal2=$mallu;
    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");
    
   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`,`username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."','".$username."', '".$amounttopay."', '".$descr."', 'Unsuccessful', '".$time."', 'WEB', '".$ref."','".$mallu."','".$newbal2."')");
  
    
    echo ($descr); //Unsuccessful Order
    exit();
}


}

}


?>