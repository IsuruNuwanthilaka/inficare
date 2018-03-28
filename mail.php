<?php
    require_once('inc/functions.php');
	$address = 'isurunuwanthilaka@gmail.com';
    $subject = 'Welcome to ISUMACARE donation management system!';
    $body = 'Hi! 
             We are very happy to see you in our system.';
    sendMail($subject,$body,$address);
?>