<?php
    include_once 'teamClass.php';
    if(isset($_GET['typeahead'])) {
            $id = Team::getTeamIdByName($_GET['typeahead']);
        $loc = "Location: editTeam.php?id=".$id;
        header($loc);
    }