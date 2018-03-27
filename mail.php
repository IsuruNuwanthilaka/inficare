<?php

  require("/inc/PHPMailer.php");
  require("/inc/SMTP.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();

    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
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