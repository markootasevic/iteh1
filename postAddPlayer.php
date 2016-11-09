<?php
    include_once 'conn.php';
    include_once 'playerClass.php';

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_POST['team']) && isset($_POST['name']) && isset($_POST['height']) && isset($_POST['country']) && isset($_POST['dob']) && isset($_POST['position'])) {
    $player = new Player($_POST['name'], $_POST['position'], $_POST['height'], $_POST['dob'], $_POST['country'], $_POST['team']);
    $success = $player->insertInDb();
    if($success == 1) {
        $_SESSION['addPlayer'] = "You have successfully added a new player";
        header("Location: addNewPlayer.php ");
    } else {
        $_SESSION['addPlayer'] = "Something went wrong, please try again";
        header("Location: addNewPlayer.php ");
    }
} else {
    echo "sranje";
}