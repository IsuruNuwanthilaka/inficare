?php session_start();?>
<?php require_once('inc/connection.php'); ?>

<?php 

	$query = "INSERT INTO itemdb(item_description,is_request,is_donated) VALUES('10 books',0,0)";

	$result_set = pg_query($connection,$query);

	if (!$result_set) {
		die('Error');
	}
 ?>

<?php pg_close($connection); ?>