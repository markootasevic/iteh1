<?php
include_once 'statsClass.php';
if(!isset($_SESSION)) {
    session_start();
}

if(isset($_POST['team']) && isset($_POST['player']) && isset($_POST['gameId']) && isset($_POST['onePointPct']) && isset($_POST['twoPointPct']) && isset($_POST['threePointPct']) && isset($_POST['minPlayed']) && isset($_POST['offReb']) && isset($_POST['defReb'])) {
    $stats = new Stats($_POST['onePointPct'], $_POST['twoPointPct'], $_POST['threePointPct'], $_POST['minPlayed'],$_POST['offReb'],$_POST['defReb'],$_POST['player'], $_POST['gameId']);
    $success = $stats->insertInDb();
    if($success == 1) {
        $_SESSION['stats'] = "You have successfully added a stat";
        $loc = "Location: oneGame.php?id=".$_POST['gameId'];
        header($loc);
    } else {
        echo "ne super";
    }
} else {
    echo "sjebao slovo";
}