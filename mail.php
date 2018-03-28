<?php

require_once("inc/functions.php");

$address = 'isurunuwanthilaka@gmail.com';
$subject = 'Welcome';
$body = 'Hi user!';
sendMail($subject,$body,$address);
?>