<?php
include_once "config.php";


$query = "SELECT * FROM  userLine u  
WHERE u.accessToken IS NOT NULL AND u.active = '1' "; 

$stmt = $conn->prepare($query);

$stmt->execute();


$line_api = 'https://notify-api.line.me/api/notify';

$count = $stmt->rowCount();

while($token = $stmt->fetch(PDO::FETCH_OBJ)){
  $access_token = $token->accessToken;

  $str = "ข้อความทดสอบอย่าเบื่อเรานะ เราเพื่อนคุณ";
  //$image_thumbnail_url = 'https://mis.rh12.moph.go.th/openapi/mrisk/images/mrisk-line-group.png';  // ขนาดสูงสุด 240×240px JPEG
  //$image_fullsize_url = 'https://mis.rh12.moph.go.th/openapi/mrisk/images/mrisk-line-group.png';  // ขนาดสูงสุด 1024×1024px JPEG
  //$sticker_package_id = '';  // Package ID ของสติกเกอร์
  //$sticker_id = '';    // ID ของสติกเกอร์

  $message_data = array(
  'message' => $str,
  //'imageThumbnail' => $image_thumbnail_url,
  //'imageFullsize' => $image_fullsize_url,
  //'stickerPackageId' => $sticker_package_id,
  //'stickerId' => $sticker_id
  );
 
 $result = send_notify_message($line_api, $access_token, $message_data);

 print_r($result);

}

echo "<br> ได้ส่งข้อความไปหาเพื่อนแบบส่วนตัวแล้วจำนวน ".$count." คน";

function setLineAlert($token, $msg){

  $sToken = $token;
  $sMessage = $msg;
  
  $api = "https://notify-api.line.me/api/notify";

	
	$chOne = curl_init();
	curl_setopt( $chOne, CURLOPT_URL,$api);
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	//Result error 
	if(curl_error($chOne)) 
	{ 
    $getBack =  'error:' . curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
    $getBack =  "status : ".$result_['status']; echo "message : ". $result_['message'];
	} 
  curl_close( $chOne ); 

  return $getBack;
  
}

function send_notify_message($line_api, $access_token, $message_data)
{
 $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$access_token );

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $line_api);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $result = curl_exec($ch);
 // Check Error
 if(curl_error($ch))
 {
  $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) ); 
 }
 else
 {
  $return_array = json_decode($result, true);
 }
 curl_close($ch);
 return $return_array;
}