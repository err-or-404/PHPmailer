<?php 
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['email']) && isset($_POST['name'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$body = $_POST['body'];

	require_once 'PHPMailer/PHPMailer.php';
	require_once 'PHPMailer/SMTP.php';
	require_once 'PHPMailer/Exception.php';


	$mail  = new PHPMailer();

	$mail -> isSMTP();
	$mail ->Host = "smtp.gmail.com";
	$mail ->SMTPAuth = true;
	$mail ->Username = "emaili romlitac agzavni";
	$mail ->Password = "da im emailis proli";
	$mail ->Port = 587;//587-tls
	$mail ->SMTPSecure = "tls";//tls

	$mail->isHTML(true);
	$mail->setFrom($email, $name);
	$mail->addAddress("temukaachanturidze@gmail.com");//misamarti sadac agzavni
	$mail ->Subject = $subject;
	$mail ->Body = $body;

	if($mail->send()) {
		$response =  "Email is sent!";
	}else {
		$response = "Something went wrong".$mail->ErrorInfo;
	}

	exit(json_encode(array("response" => $response)));
}
	

?>