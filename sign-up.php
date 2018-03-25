<?php session_start();?>
<?php require_once('inc/connection.php');
?>
<?php 
$email='';
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
		<div class="appname"> Donation Management System</div>
		<div class="loggedin"> Welcome User!<a href="index.php">Sign in</a></div>
	</header>
	<main>
		<div class="adduser" >
			<form action="sign-up.php" method="post" class="userform">
			
				<p >
					<label for="" class="notempty" >First Name</label>
					<input type="text" name="first_name" id="" <?php if (isset($_POST['first_name'])) {
						echo "value = {$_POST['first_name']}";
					}?> required>
				</p>
				<p >
					<label for="" class="notempty" >Last Name</label>
					<input type="text" name="last_name" id="" <?php if (isset($_POST['last_name'])) {
						echo "value = {$_POST['last_name']}";
					}?> required>
				</p>
				<p >
					<label for="" class="notempty" >Email Address</label>
					<input type="text" name="email" id="" <?php if (isset($_POST['email'])) {
						echo "value = {$_POST['email']}";
					}?> required>
				</p>
				<p >
					<label for="" class="notempty" >Password</label>
					<input type="password" name="password" id="" <?php if (isset($_POST['password'])) {
						echo "value = {$_POST['password']}";
					}?> required>
				</p>
				<p >
					<label for="" class="notempty" >Confirm Password</label>
					<input type="password" name="confirm_password" id="" <?php if (isset($_POST['confirm_password'])) {
						echo "value = {$_POST['confirm_password']}";
					}?> required>
				</p>
				<p>
					<label for="">&nbsp </label>
					<button type="submit" name="save">Save</button>
				</p>
				<p><label for=""></label><a href="home.php"> Next Home Page > </a></p>

				<?php
				
				if (isset($_POST['save']) && ($_POST['password']!=$_POST['confirm_password'])) {
					echo '<p class = "errormsg"> </label>Password not matched. Re-enter passwords </p>';
				}elseif(isset($_POST['save']) && ($_POST['password']==$_POST['confirm_password'])) {
					$first_name = pg_escape_string($connection,$_POST['first_name']);
					$last_name = pg_escape_string($connection,$_POST['last_name']);
					$password = pg_escape_string($connection,$_POST['password']);
					$password = sha1($password);
					$email = pg_escape_string($connection,$_POST['email']);
					
					$another_query = "SELECT * FROM userdb WHERE email = '{$email}' ";
					$another_result = pg_query($connection,$another_query);
					
					if($another_result){
						
						if (pg_num_rows($another_result)==0) {
							$query = 'INSERT INTO userdb(first_name,last_name,email,password,last_login,is_deleted) VALUES (\'';
							$query .= $first_name.'\',\'';
							$query .= $last_name.'\',\'';
							$query .= $email.'\',\'';
							$query .= $password.'\',\'';
							$query .='2018-03-22 17:05:12.758687'.'\',';
							$query .= '0)';

							$result = pg_query($connection,$query);
							if ($result) {
								echo '<p class = "successmsg"> </label>Account created successfully. </p>';
								
							} else {
								echo '<p class = "errormsg"> </label>Database Query Failed Found.</p>';	
							}
						} else {
							echo '<p class = "successmsg"> </label>Account already exists.</p>';
						}
						
					}else{
						echo '<p class = "errormsg"> </label>Database Query Failed Again.</p>';
					}

					$query = "SELECT * FROM userdb
	 					WHERE email = '{$email}'
	 					AND password = '{$password}' LIMIT 1 ";
	 				$result_set = pg_query($connection,$query);

					if ($result_set) {
						if (pg_num_rows($result_set)==1) {
							$user = pg_fetch_assoc($result_set);
							$_SESSION['id'] = $user['id'];
							$_SESSION['first_name'] = $user['first_name'];

							$query = "UPDATE userdb SET last_login = now() WHERE id = {$_SESSION['id']}";
	 						$result_set = pg_query($connection,$query);
							if (!$result_set) {
								die('Database update failed');
							}

	 						header('Location: home.php');

					}
				}else{
					echo '<p class = "pinmsg" > </label> Complete above fields first. </p>';
				}
				?>
				
								
			</form>
			
		</div>
	</main>

</body>
</html>


<?php pg_close($connection);?>