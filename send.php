<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

// require 'vendor/autoload.php';

include('smtp/PHPMailerAutoload.php');


if(isset($_POST)){
$msg1 = $_POST['message'];
$name = $_POST['name'];
$number = $_POST['email'];
$cname = $_POST['subject'];
$html = "Name: <b>".$name."</b><br>"."Email: ".$number."<br>"."subject: ".$cname."<br> message: ".$msg1;

echo smtp_mailer('harshilvasoya2812@gmail.com',$name,$html);



}
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	// $mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "harshil9915vasoya@gmail.com";
	$mail->Password = "fiummkhswgxudiso";
	$mail->SetFrom("harshil9915vasoya@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return '<h2 style="color:green";>Sent Successfully</h2>';
	}
}  
?>
