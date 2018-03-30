<?php 
session_start();
require_once('inc/connection.php');
require_once('inc/functions.php');

if (!isset($_SESSION['id'])) {
	header('Location:index.php');
	}
else{
	$item_id = $_GET['item_id'];
	$subject = 'Hey';
	$body = "hi your request processing for item id : ".$item_id;
	$address = $_SESSION['email'];
	sendMail($subject,$body,$address);
	header('Location:home.php');
}
?>
