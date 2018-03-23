<?php session_start();?>
<?php require_once('inc/connection.php'); ?>
<?php 
	if (!isset($_SESSION['id'])) {
	header('Location:index.php');
	} 

	$item_list =" ";
	$query = "SELECT * FROM itemdb WHERE is_donated = 0 ";
	$items = pg_query($connection,$query);

	if ($items) {
		while ($item = pg_fetch_assoc($items)) {
			$item_list .= "<tr>";
			$item_list .= "<td>{$item['item_id']}</td>";
			$item_list .= "<td>{$item['item_description']}</td>";
			$item_list .= "<td>{$item['is_request']}</td>";
			$item_list .= "<td><a href = \"apply-item.php?item_id={$item['item_id']}\">Apply</a></td>";
			$item_list .= "</tr>";
		}
	} else {
		echo "Database query failed.";
	}
	
?>	
	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header>
		<div class="appname"> Donation Management System</div>
		<div class="loggedin"> Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a></div>
	</header>
	<main>
		<h1>Items <span><a href="add-item.php">+ Add New Item</a></span></h1>
		<table class="masterlist">
			<tr>
				<th>Item No</th>
				<th>Description</th>
				<th>Request/Donation</th>
				<th>Apply</th>
			</tr>

			<?php echo $item_list; ?>

		</table>

	</main>

</body>
</html>
<?php pg_close($connection);?>
