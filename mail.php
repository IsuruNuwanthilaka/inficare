<?php
function sendMail(){
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

  	require_once("inc/PHPMailer.php");
 	require_once("inc/SMTP.php");

    $mail = new PHPMailer;

    $mail->isSMTP();

    $mail->SMTPDebug = false;
    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = false;
    $mail->SMTPSecure = 'tls';
    $mail->Host = gethostbyname('tls://smtp.gmail.com');
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->Username = "info.isumacare@gmail.com";
    $mail->Password = "950500085v";
    $mail->setFrom("info.isumacare@gmail.com");
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->addAddress("isurunuwanthilaka@gmail.com");

     if(!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
}

sendMail();
?>