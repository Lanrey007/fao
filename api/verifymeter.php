<?php
error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$service_number=trim($data['service_number']);   // The Meter Number or meter number
$service_id=strtolower($data['service_id']);    // The service e.g eko-electric, ibadan-electric
$service_type=strtolower($data['service_type']);

if (!empty($service_number) && !empty($service_id) && !empty($service_type)){

$postdata=array(
	'service_number' => $service_number,
	'service_id' => $service_id,
	'service_type' => $service_type,
);

$url = 'https://abumpay.com/api/verifymeter';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$request = curl_exec($ch);
curl_close($ch);
$data=json_decode($request, true);

$status=$data['status'];

if ($status=="success"){

$full_name=$data['desc'];

  $sec=array(
		'code'=>'200',
		'status'=>'success', ////// 
		'desc' =>$full_name,
	);

	echo json_encode($sec);
	exit();
}

else{


$sec=array(
		'code'=>'700', ////// 
		'status'=>'fail', ////// 
		'desc' =>'Invalid Meter Number',
	);

	echo json_encode($sec);
	exit();


}

}

else{

	$sec=array(
		'code'=>'500', ////// 
		'status'=>'fail', ////// 
		'desc' =>'Imcomplete Parameters',
	);

	echo json_encode($sec);
	exit();
}
?>