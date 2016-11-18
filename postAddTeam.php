<?php
include_once ('teamClass.php');
if(!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['name']) && isset($_POST['arena'])) {
    $newTeam = new Team(trim($_POST['name']), trim($_POST['arena']));
    $success = $newTeam->insertInDb();
    if($success == 1) {
        header("Location: allTeams.php");
        exit();
    } else {
        $_SESSION['teamFail'] = "There was an error,please try again";
        header( "refresh:5 ;url=addNewTeam.php" );
    }
}