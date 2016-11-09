<?php
include_once ('conn.php');
include_once ('userClass.php');
if(!isset($_SESSION))
{
	session_start();
}
//echo "aaa";
	if(isset($_POST['user']) && isset($_POST['pass'])) {
		$name = $_POST['user'];
//		echo "ccc";
       $success = User::logIn($_POST['user'], $_POST['pass']);
//		$sql ="SELECT pass FROM user WHERE  name = '".$name."'";
		if ( $success != 1 && $success != 0 ) {
			echo $success;
			header( "refresh:5 ;url=signin.php" );
            exit();
		}
		// if ( $result->num_rows == 1 ) {
			if ( $success ==1 ) {
				$_SESSION['logedin'] = 1;
				header( "Location: index.php" );
                exit();
			} else {
				$_SESSION['logedin'] = 0;
				header( "Location: signin.php" );
			}
		// }
	}
