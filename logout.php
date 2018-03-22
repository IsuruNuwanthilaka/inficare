<?php 
session_start();
require_once('inc/connection.php');
$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(),'',time()-86400,'/');
}

session_destroy();

header('Location: index.php?logout=yes');
?>
<?php pg_close($connection);?>