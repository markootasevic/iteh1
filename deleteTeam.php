<?php
include_once 'teamClass.php';
include_once 'gameClass.php';
if(!isset($_SESSION))
{
    session_start();
}

    if(isset($_GET['id'])) {
        Team::deleteTeam($_GET['id']);
//        Game::deleteGamesWithTeam($_GET['id']);
        header("Location: allTeams.php");
    }