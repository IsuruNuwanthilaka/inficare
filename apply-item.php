<?php 
session_start();
require_once('inc/connection.php');
require_once('inc/functions.php');
?>

<?php 
	$item_id=$_GET['item_id'];	
	$query = "SELECT * FROM itemdb WHERE item_id =";
	$query .= $item_id;
	$query .= " LIMIT 1"
	$result_set = pg_query($connection, $query);
	if ($result_set) {
		$item = pg_fetch_assoc($result_set);
		echo $item['item_name'];
	}




?>