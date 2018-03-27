<?php 
require("inc/PHPMailer.php"); 
require("inc/SMTP.php"); 
use PHPMailer\PHPMailer\PHPMailer;

	$mail = new PHPMailer;

	$mail->isSMTP();
	$mail->SMTPDebug  = 1;
	$mail->SMTPAuth   = true;
	$mail->SMTPSecure = "tls";                 
	$mail->Host       = "smtp.gmail.com";
	$mail->Port       = 587; 
	$mail->isHTML(true);
	$mail->Username   = "infoatsoulmate@gmail.com";
	$mail->Password   = "950500085v";

	$mail->setFrom('infoatsoulmate@gmail.com');

	$mail->Subject = "I hope this works!";

	$mail->Body = "Hello"

	$address = "isurunuwanthilaka@gmail.com";
	$mail->addAddress($address);

	if(!$mail->send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  echo "Message sent!";
	}




echo "end process";

 ?>