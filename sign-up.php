<?php session_start();?>
<?php require_once('inc/connection.php');
?>
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
		<div class="loggedin"> Welcome user!<a href="index.php">Sign in</a></div>
	</header>
	<main>
		<div class="adduser">
			<form action="sign-up.php" method="post" class="userform">
			
				<p >
					<label for="">First Name</label>
					<input type="text" name="first_name_var" id="" <?php if (isset($_POST['first_name_var'])) {
						echo "value = {$_POST['first_name_var']}";
					}?> required>
				</p>
				<p >
					<label for="">Last Name</label>
					<input type="text" name="last_name_var" id="" <?php if (isset($_POST['last_name_var'])) {
						echo "value = {$_POST['last_name_var']}";
					}?> required>
				</p>
				<p >
					<label for="">Email Address</label>
					<input type="text" name="email_var" id="" <?php if (isset($_POST['email_var'])) {
						echo "value = {$_POST['email_var']}";
					}?> required>
				</p>
				<p >
					<label for="">Password</label>
					<input type="password" name="password_var" id="" <?php if (isset($_POST['password_var'])) {
						echo "value = {$_POST['password_var']}";
					}?> required>
				</p>
				<p >
					<label for="">Confirm Password</label>
					<input type="password" name="confirm_password_var" id="" <?php if (isset($_POST['confirm_password_var'])) {
						echo "value = {$_POST['confirm_password_var']}";
					}?> required>
				</p>
				<p>
					<label for="">&nbsp;</nav></label>
					<button type="submit" name="requestpin"> Request Pin Number</button>
				</p>
				
				<?php if (isset($_POST['requestpin'])) {
					echo "<p class = 'pinmsg'> Check your email box for the PIN </p>";
				} ?>
			



				
			</form>
		</div>
	</main>

</body>
</html>
<?php pg_close($connection);?>

