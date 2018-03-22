<?php session_start();?>
<?php require_once('inc/connection.php'); ?>
<?php 
	if (!isset($_SESSION['id'])) {
	header('Location:index.php');
	} 

	$user_list =" ";
	$query = "SELECT * FROM userdb WHERE is_deleted = 0 ORDER BY first_name";
	$users = pg_query($connection,$query);

	if ($users) {
		while ($user = pg_fetch_assoc($users)) {
			$user_list .= "<tr>";
			$user_list .= "<td>{$user['first_name']}</td>";
			$user_list .= "<td>{$user['last_name']}</td>";
			$user_list .= "<td>{$user['last_login']}</td>";
			$user_list .= "<td><a href = \"modify-user.php?user_id={$user['id']}\">Edit</a></td>";
			$user_list .= "<td><a href = \"delete-user.php?user_id={$user['id']}\">Delete</a></td>";
			$user_list .= "</tr>";
		}
	} else {
		echo "Database query failed.";
	}
	
?>	
	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Users</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header>
		<div class="appname"> User Management System</div>
		<div class="loggedin"> Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a></div>
	</header>
	<main>
		<h1>Users <span><a href="add-user.php">+ Add New</a></span></h1>
		<table class="masterlist">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Last Login</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

			<?php echo $user_list; ?>

		</table>

	</main>

</body>
</html>
<?php pg_close($connection);?>
