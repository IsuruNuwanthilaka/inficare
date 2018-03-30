<?php session_start();?>
<?php 
require_once('inc/connection.php');
require_once('inc/functions.php');
?>
<?php 
$errors=array();
?>

<?php 
	if (!isset($_SESSION['id'])) {
	header('Location:index.php');
	} 
?>	
	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add New Item</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header>
		<div class="appname"> Donation Management System</div>
		<div class="loggedin"> Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a></div>
	</header>
	<main>
		<h1>Add New Item<span><a href="home.php">< Back to Item List</a></span></h1>
		<div class="additem">
			<form action="add-item.php" method="post" class="itemform">
			
				<p >
					<label for="">Item Name</label>
					<input type="text" name="item_name" id="" placeholder="Item name" required>
				</p>
				<p >
					<label for="">Item Description</label>
					<input type="text" name="item_description" id="" placeholder="Small description about item" required>
				</p>
				<p>
					<label for=""> Item Status </label>
				</p>
				<select name =  'status' >
					 <option value='0' > Request </option>
					 <option value='1' > Donate </option>
				</select>
				<p>
					<label for="">&nbsp</label>
					<button type="submit" name="save"> Save</button>
				</p>

				<?php 
				$is_request = 0;
				if (isset($_POST['save'])) {
					$is_request =(int)$_POST['status'];
					$item_name = pg_escape_string($connection,$_POST['item_name']);
					$item_description = pg_escape_string($connection,$_POST['item_description']);
					$item_email = $_SESSION['email'];
					$query = 'INSERT INTO itemdb (item_description,item_name,item_email,is_request,is_donated) VALUES (\'';
					$query .= $item_description.'\',\'';
					$query .= $item_name.'\',\'';
					$query .= $item_email.'\',';
					$query .= $is_request.',';
					$query .= '2)';
					$result = pg_query($connection,$query);
					if ($result) {
						$subject = 'Pending Admin Approval';
						$body = 'Thank you for your response.<br><br>'.'<b>ITEM DETAILS</b><br>'.'<b>Item Name : </b>'.$item_name.'<br><b>Item Description : </b>'.$item_description.'<br><b>Reference email : </b>'.$item_email.'<br><br> Your item will be online very soon.<br>isumacare team.';
						sendMail($subject,$body,$_SESSION['email']);

						$subject = 'IsumaCare : New Item Added for Approval';
						$body = "user : ".$_SESSION['email']." added new item for approval.";
						$address = "isurunuwanthilaka@gmail.com";
						sendMail($subject,$body,$address);
						echo '<p class = "successmsg"> Pending Admin Approval</p>';
					}else{
						echo '<p class = "errormsg"> Database Query Failed</p>';
					}


				}
				?>

			</form>
		</div>
	</main>

</body>
</html>
<?php pg_close($connection);?>
 