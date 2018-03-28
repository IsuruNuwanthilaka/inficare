<?php 
function sendMail($subject,$body,$address){
	//sending emails
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
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->addAddress($address);

     if(!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     }
}
 ?>
