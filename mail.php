<?php 
use PHPMailer\PHPMailer\PHPMailer;

require "inc/PHPMailer.php"; 
require "inc/SMTP.php"; 

echo "start process";

	$mail = new PHPMailer;

	$mail->isSMTP();
	$mail->SMTPDebug  = 2;
	$mail->SMTPAuth   = true;
	$mail->SMTPSecure = 'tls';                 
	$mail->Host       = 'smtp.gmail.com';
	$mail->Port       = 587; 
	
	$mail->Username   = "infoatsoulmate@gmail.com";
	$mail->Password   = '950500085v';

	$mail->setFrom('infoatsoulmate@gmail.com','first');

	$mail->Subject = "I hope this works!";
	$mail->AltBody = 'This is a plain-text message body';

	$address = "isurunuwanthilaka@gmail.com";
	$mail->addAddress($address,'Isuru');

	if(!$mail->send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  echo "Message sent!";
	}




echo "end process";

 ?>