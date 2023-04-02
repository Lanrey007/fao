<?php


//https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=9P7DfJRAQLGLh7tFLnx0xuxSfgBiW7d7b2hqSS3enHXPPRJCYcSGACUf9Wwl&from=BulkSMS.ng&to=08124066278&body=Welcome&dnd=2


/**
$plan2=preg_replace("/(.*?)=(.*)/", "$2", $plans);
$data_vol=preg_replace("/(.*?)=(.*)/", "$1", $plans);

$data_vo=preg_replace('/\D+/', '', $data_vol);
$amounttopay=preg_replace('/\D+/', '', $plan2);


$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$tr=rand(100, 900);
$trx=rand(1000000, 90000000).$tr;


if ($amounttopay > $mallu){

    echo "Data Subscription Fail Due To Insufficient Fund"; ///Insufficient Fund
    exit();
}


// else{



// $url='https://prosperdatabiz.com/user/api/balance/?apikey=5BFAZ&passcode=3cc3fcf3a14ca64aa24984b08c146e5d';


// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($ch);
// curl_close($ch);

// $xx=json_decode($response, true);

// $adbal=$xx['status_message'];
// //echo $adbal;

// if ($amounttopay > $adbal){

//      echo "Data Timeout, Please Contact Admin"; // Admin Bal Low
//     exit();
// }

else {

   $newbal = $mallu-$amounttopay;

    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

if ($data_vo=="500"){
    $plan_id=473;
}

if ($data_vo=="1"){
    $plan_id=474;
}

if ($data_vo=="2"){
    $plan_id=475;
}

if ($data_vo=="3"){
    $plan_id=476;
}

if ($data_vo=="5"){
    $plan_id=477;
}

$url='https://prosperdatabiz.com/user/api/data/?apikey=5BFAZ&passcode=3cc3fcf3a14ca64aa24984b08c146e5d&DataPlan='.$plan_id.'&phone='.$mobile.'&ref='.$trx.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$xx=json_decode($response, true);

$status=$xx['status'];
//$data = curl_exec($ch);
//curl_close($ch);
//$response = json_decode($data);
//echo $response;

  if ($status==202){

    $descr=$network.' '.$data_vol.' Data Purchase To '.$mobile;

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amounttopay."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");
       echo ("200");
     //echo $descr;
    exit();

  }

  else{

    $descr='Unsuccessful Data '.$network.' '.$data_vol.' to '.$mobile;

    $newbal2 = $mallu;
    mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."','".$username."', '".$amounttopay."', '".$descr."', 'Unsuccessful', '".$time."', 'WEB', '".$trx."','".$mallu."','".$newbal2."')");

  mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");
  
 echo ($descr);
 exit();


    }


}

countryLists["MTN"]=["500MB = N235","1GB = N235","2GB=N470","3GB = N705","5GB = N1175"]; 
                                                                                                                                                                                                                                                                        countryLists["MTN"]=["500MB=N178", "1GB=N242", "2GB=N486", "3GB=N729", "5GB=N1,215"];
countryLists["GLO"]=["920MB= N460","1.84GB= N890","4.1GB=N1800","5.8GB = N2250","7.7GB = N2700","10GB = N7200","12.5GB = N3600","18.5GB=N4500","29.5GB = N7200","50GB = 9000"];

countryLists["AIRTEL"]=["750MB=N500", "1.5GB=N980", "2GB=N1,175", "3GB=N1,470", "4.5GB=N1,960", "6GB=N2,450", "10GB=N2,940", "15GB=N3,920", "20GB=N4,900", "40GB=N9,800","75GB=N14,700"];

countryLists["9MOBILE"]=["500MB=N450","1GB=N850", "1.5GB=N850", "2GB=N1,010", "3GB=N1,250", "4.5GB=N1,650", "10GB=N3,250", "15GB=N4,100", "20GB=N4,100", "40GB=N8,100","75GB=N12,100"];

countryLists["GIFTING"]=["500MB = N235","1GB = N235","2GB=N470","3GB = N705","5GB = N1175"];                                                                                                                                                                                                                               

countryLists["AIRTEL_GIFTING"]=["100MB = N245","200MB =N490","500MB = N735","1GB = N1225","2GB = N2399","5GB = N3675"];     



$url='https://prosperdatabiz.com/user/api/data/?apikey=4EAWP&passcode=432b0d55c52c58d3784343edb5b0e2fe&DataPlan=472&phone=0987654398&ref='.$trx.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
print $response;
//$xx=json_decode($response, true);
**/

$curl = curl_init(); curl_setopt_array($curl, array( CURLOPT_URL => "https://vtpass.com/api/pay", CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => "", CURLOPT_MAXREDIRS => 10, CURLOPT_TIMEOUT => 0, CURLOPT_FOLLOWLOCATION => true, CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, CURLOPT_CUSTOMREQUEST => "POST", CURLOPT_POSTFIELDS =>"{\"request_id\":\"[ref]\",\"serviceID\":\"mtn\",\"amount\":\"[amount]\",\"phone\":\"[phon]\"}", CURLOPT_HTTPHEADER => array( "Authorization: Basic aGFtbWVkeWFrdWIwQGdtYWlsLmNvbTpIYW1tZWQ2N0A=
", "Content-Type: application/json" ), )); $response=curl_exec($curl); curl_close($curl); echo $response;


$curl = curl_init(); curl_setopt_array($curl, array( CURLOPT_URL => "https://vtpass.com/api/balance", CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => "", CURLOPT_MAXREDIRS => 10, CURLOPT_TIMEOUT => 0, CURLOPT_FOLLOWLOCATION => true, CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, CURLOPT_HTTPHEADER => array( "Authorization: Basic aGFtbWVkeWFrdWIwQGdtYWlsLmNvbTpIYW1tZWQ2N0A=
", "Content-Type: application/json" ), )); $response=curl_exec($curl); curl_close($curl); echo $response; 







?>