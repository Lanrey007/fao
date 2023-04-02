<?php
error_reporting(0);
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$Token=trim($data['token']); // getting user post token

if (!empty($Token) && strlen($Token) > 0){

	require("../config.php"); // Connecting to MySQL dB.
	$check_rec=mysqli_query($db, "SELECT * FROM users WHERE token='".$Token."'");
	$counter=mysqli_num_rows($check_rec);
	if ($counter < 1){


		$sec=array(
		'code'=>'300', ////// 
		'status'=>'fail', ////// 
		'desc' =>'Error Retrieving Users Account',
	);

	echo json_encode($sec);
	exit();

	}

else{

 while($getrec=mysqli_fetch_array($check_rec, MYSQLI_ASSOC)){

 	$first_name=$getrec['firstname'];
 	$last_name=$getrec['lastname'];
 	$balance=$getrec['us_wallets'];
 	$fullname=$first_name.' '.$last_name;

	 $sec=array(
		'code'=>'200',
		'status'=>'success', ////// 
		'balance'=> $balance, ////// 
		'desc' =>$fullname,
	);

	echo json_encode($sec);
	exit();


 }

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