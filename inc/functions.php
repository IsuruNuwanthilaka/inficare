<?php 
	require_once('inc/PHPMailer.php');
	
	$mail             = new PHPMailer();

	$mail->IsSMTP();
	$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
	                                           // 1 = errors and messages
	                                           // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "tls";                 
	$mail->Host       = "smtp.gmail.com";      // SMTP server
	$mail->Port       = 587;                   // SMTP port
	$mail->Username   = "isumalabs@gmail.com";  // username
	$mail->Password   = "Isuma@U0M";            // password

	$mail->SetFrom('isumalabs@gmail.com', 'Test');

	$mail->Subject    = "I hope this works!";

	$mail->MsgHTML('Blah');

	$address = "isurunuwanthilaka@gmail.com";
	$mail->AddAddress($address, "Test");

	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  echo "Message sent!";
	}
 ?>