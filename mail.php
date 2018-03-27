<?php 
require("/inc/PHPMailer.php"); 
require("/inc/SMTP.php"); 

	$mail = new PHPMailer\PHPMailer\PHPMailer();

	$mail->IsSMTP();
	$mail->SMTPDebug  = 1;
	$mail->SMTPAuth   = true;
	$mail->SMTPSecure = "tls";                 
	$mail->Host       = "smtp.gmail.com";
	$mail->Port       = 587; 
	$mail->IsHTML(true);
	$mail->Username   = "infoatsoulmate@gmail.com";
	$mail->Password   = "950500085v";

	$mail->SetFrom('infoatsoulmate@gmail.com');

	$mail->Subject = "I hope this works!";

	$mail->Body = "Hello"

	$address = "isurunuwanthilaka@gmail.com";
	$mail->AddAddress($address);

	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  echo "Message sent!";
	}




echo "end process";

 ?>