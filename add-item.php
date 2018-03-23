<?php session_start();?>
<?php require_once('inc/connection.php'); ?>
<?php 
$errors=array();
if (isset($_POST['save'])){
	if (empty($_POST['first_name'])){
		$errors = 'First name submitted';
	}

}

 ?>

<?php 
	if (!isset($_SESSION['id'])) {
	header('Location:index.php');
	} 

	$user_list =" ";
	$query = "SELECT * FROM userdb WHERE is_deleted = 0 ORDER BY first_name";
	$users = pg_query($connection,$query);

?>	
	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add New User</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header>
		<div class="appname"> Donation Management System</div>
		<div class="loggedin"> Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a></div>
	</header>
	<main>
		<h1>Add New Item<span><a href="home.php">< Back to Item List</a></span></h1>
		<?php 
			if (!empty($errors)) {
			echo $errors[0];
		}
		 ?>
		<div class="additem">
			<form action="add-item.php" method="post" class="itemform">
			
				<p >
					<label for="">First Name</label>
					<input type="text" name="first_name_var" id="" required>
				</p>
				<p >
					<label for="">Last Name</label>
					<input type="text" name="last_name_var" id="" required>
				</p>
				<p >
					<label for="">Email Address</label>
					<input type="text" name="email_var" id="" required>
				</p>
				<p >
					<label for="">Password</label>
					<input type="password" name="password_var" id="" required>
				</p>
				<p>
					<label for="">&nbsp</label>
					<button type="submit" name="save"> Save</button>
				</p>

				<p><label for="">&nbsp</label><button type="submit" name="save">Save</button></p>

			</form>
		</div>
	</main>

</body>
</html>
<?php pg_close($connection);?>
