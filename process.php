<?php
include('connection.php');

include_once("connection.php");
if(isset($_POST['send'])) {
$mobile=$_POST['mobile'];
$type=$_POST['type'];
$mobile2="+91";


$data = array();

if ($mobile) {
//echo $mobile2.$mobile1;
//generate otp
$otp = rand(100000, 999999);
//$delete_otp = mysqli_query($conn,"DELETE FROM sms_codes WHERE `created_at` < (NOW() - INTERVAL 1 MINUTE)");
//$delete_otp = mysqli_query($db,"DELETE FROM sms_codes where mobile='$mobile' OR CONCAT('+91',mobile)='$mobile'");
$sms_code=mysqli_query($db,"insert into secret_code (mobile,code,seat_type) values ('$mobile','$otp','$type')");
// if($sms_code){
// sendSms($mobile, $otp);
// $temp["status"] = "Ok";
// $temp["message"] = "suceess";
// $temp['otp'] = $otp;
// array_push($data, $temp);
// echo json_encode($data);
// }

// }else{
// $temp["status"] = "Failed";
// $temp["message"] = "User Doesn't Exists";
// array_push($data, $temp);
// echo json_encode($data);
// }

$message = urlencode("Hello! Welcome To Shreyas. Your Login OPT is : ".$otp);
var_dump($message);
$route = "route=4";
/* Prepare you post parameters */
$postData = array(
    'authkey' => MSG91_AUTH_KEY,
    'mobiles' => $mobile,
    'message' => $message,
    'sender' => MSG91_SENDER_ID,
    'route' => $route
);

/* API URL*/
$url="https://control.msg91.com/api/sendhttp.php";

/* init the resource */
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    /*,CURLOPT_FOLLOWLOCATION => true */
));


/* Ignore SSL certificate verification */
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


/* get response */
$output = curl_exec($ch);

/* Print error if any */
if(curl_errno($ch))
{

    echo 'error:' . curl_error($ch);
}

curl_close($ch);

} 
  if($sms_code)
                                                           {
                                            echo "<script>alert('seat allocated Successfully........!');
                                            window.location='seat.php';
                                            </script>";
                                            } 
       
}
?>