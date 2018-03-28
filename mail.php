<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

  	require_once("inc/PHPMailer.php");
 	require_once("inc/SMTP.php");

    $mail = new PHPMailer;

    $mail->isSMTP();

    $mail->SMTPDebug = 3;
    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = false;
    $mail->SMTPSecure = 'tls';
    $mail->Host = gethostbyname('tls://smtp.gmail.com');
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->Username = "infoatsoulmate@gmail.com";
    $mail->Password = "950500085v";
    $mail->setFrom("infoatsoulmate@gmail.com");
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->addAddress("isurunuwanthilaka@gmail.com");

     if(!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
?>