<?php session_start();?>
<?php require_once('inc/connection.php'); ?>
<?php 
$errors=array();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header>
		<div class="appname"> User Management System</div>
		<div class="sign-up"> Welcome user!<a href="index.php">Sign in</a></div>
	</header>
	<main>
		<div class="adduser">
			<form action="add-user.php" method="post" class="userform">
			
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
					<label for="">&nbsp;</nav></label>
					<button type="submit" name="save"> Sign up</button>
				</p>

				
			</form>
		</div>
	</main>

</body>
</html>
<?php pg_close($connection);?>
