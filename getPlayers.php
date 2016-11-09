<?php
include_once 'teamClass.php';
if (isset($_GET['team'])) {
    $players = Team::getPlayers($_GET['team']);
    $result = "";
    foreach ($players as $player) {
        $result.= '<option value="'.$player->id.'"'.'>'.$player->name.'</option>'.' ';
    }
    echo $result;


}