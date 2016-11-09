<?php
include_once ('userClass.php');
if(!isset($_SESSION))
{
	session_start();
}
	include_once('conn.php');

	// echo $_POST['name'].' je ime'.' \n';

	if(isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['passAgain'])) {

	    if($_POST['pass'] != $_POST['passAgain']) {
		    $_SESSION['signup'] = "Passwords don't match, try again";
		    header("Location: signup.php");
            exit();
        }
		$newUser = new User($_POST['name'], $_POST['pass']);
         $success = $newUser->insertInDb();
                if($success == 1) {
                    $_SESSION['logedin'] = 1;
				    header("Location: index.php");
				    exit();
			}   if($success == 0) {
                $_SESSION['signup'] = "Something went wrong when writing in db,try again" . $mysqli->error;
                header("Location: signup.php");
        }       if ($success == 2) {
            $_SESSION['signup'] = "This username is already taken, try another one";
            header("Location: signup.php");
        }


	}




