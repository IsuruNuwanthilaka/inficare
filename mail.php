<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once("inc/PHPMailer.php");
require_once("inc/SMTP.php");
require_once("inc/functions.php");

$address = 'isurunuwanthilaka@gmail.com';
$subject = 'Welcome'
$body = 'Hi user!';
sendMail($subject,$body,$address);
?>