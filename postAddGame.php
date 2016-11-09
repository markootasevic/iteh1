<?php
include_once 'gameClass.php';
include_once 'conn.php';
if(!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['homeTeam']) && isset($_POST['homePts']) && isset($_POST['guestTeam']) && isset($_POST['guestPts'])) {
    $newGame = new Game($_POST['homePts'],  $_POST['guestPts'], $_POST['homeTeam'], $_POST['guestTeam']);
    $success = $newGame->insetInDb();
	$mysqli->close();
    if($success != "error") {
        $loc = "Location: oneGame.php?id=".$success;
        header($loc);
        exit();
    } else {
        $_SESSION['teamFail'] = "There was an error,please try again";
        header( "refresh:5 ;url=addNewTeam.php" );
    }
}