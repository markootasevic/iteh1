<?php
if(!isset($_SESSION))
{
	session_start();
}
$_SESSION['logedin'] = 0;
header("Location: index.php");
?>