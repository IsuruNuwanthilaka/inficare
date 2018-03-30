<?php 
session_start();
require_once('inc/connection.php');
require_once('inc/functions.php');

if (!isset($_SESSION['id'])) {
	header('Location:index.php');
	}

?>

<?php 
	$item_id=$_GET['item_id'];	
	$query = "SELECT * FROM itemdb WHERE item_id =";
	$query .= $item_id;
	$query .= " LIMIT 1";
	$result_set = pg_query($connection, $query);
	if ($result_set) {
		$item = pg_fetch_assoc($result_set);
		$item_list .= "<tr>";
		$item_list .= "<td>{$item['item_id']}</td>";
		$item_list .= "<td>{$item['item_name']}</td>";
		$item_list .= "<td>{$item['item_description']}</td>";
		if ($item['is_request']==0) {
				$item_status = 'Request';
			} else {
				$item_status = 'Donation';
			}
		$item_list .= "<td>{$item_status}</td>";
		$item_list .= "<td>{$item['item_email']}</td>";
		$item_list .= "</tr>";
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Item Deatails</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header>
		<div class="appname"> Donation Management System</div>
		<div class="loggedin"> Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a></div>
	</header>
	<main>
		<h1>Item Deatails <span><a href="home.php">< Back</a></span></h1>
		<table class="masterlist">
			<tr>
				<th>Item No</th>
				<th>Item Name</th>
				<th>Description</th>
				<th>Request/Donation</th>
				<th>Reference email</th>
			</tr>

			<?php echo $item_list; ?>

		</table>
		<div>
			<form action="apply-item.php" method="POST">
			<button type= 'submit' name="apply"> Apply </button>
		</form>
		</div>
		
	</main>

</body>
</html>
<?php pg_close($connection);?>
