<?php 
session_start();
require_once('inc/connection.php');
require_once('inc/functions.php');

if (!isset($_SESSION['id'])) {
	header('Location:index.php');
	}
else{
	$item_id = $_GET['item_id'];
	$subject = 'Your Application Reviewing';
	$body = "Hello ".$_SESSION['first_name']." !. your request for item id : ".$item_id.' is submitted for admin approval. We will get back to you soon.';
	$address = $_SESSION['email'];
	sendMail($subject,$body,$address);

	$subject = 'New Item Application for IsumaCare';
	$body = "user : ".$_SESSION['email']." waiting for item id : ".$item_id.' approval';
	$address = "isurunuwanthilaka@gmail.com";
	sendMail($subject,$body,$address);
	header('Location:home.php');
}
?>
