<?php
include_once 'gameClass.php';
include_once 'teamClass.php';
include_once 'statsClass.php';
include_once 'playerClass.php';
    if(isset($_GET['game'])) {

        $game = Game::getOneGame($_GET['game']);
        global $teamHome;
        global $teamGuest;
        global $gameId;
        $gameId = $_GET['game'];
        $teamHome = Team::getOneTeam($game->homeId);
        $teamGuest = Team::getOneTeam($game->guestId);


        $home = Stats::getStatsForTeam($teamHome->id,$gameId);
        $guest = Stats::getStatsForTeam($teamGuest->id,$gameId);
        $result = array_merge($home,$guest);


$forEcho = '<table class="table table-striped">';
   $forEcho.='<thead>';
        $forEcho.='<tr>';
        $forEcho.='<th>Team</th>
                <th>Player</th>
                <th>1 point pct</th>
                <th>2 point pct</th>
                <th>3 point pct</th>
                <th>offensive rebounds</th>
                <th>Defensive rebounds</th>
                <th>Minutes player</th>
            </tr>
            </thead>
            <tbody>';

            
            foreach ($result as $stat) {

                $forEcho.='<tr>';

                $forEcho.='<td>'.Player::getPlayerTeamName($stat->playerId).'</td>';
                   $forEcho.='<td>'.Player::getOnePlayerName($stat->playerId).'</td>';
                    $forEcho.='<td>'.$stat->onePointPct.'</td>';
                   $forEcho.='<td>'.$stat->twoPointPct.'</td>';
                    $forEcho.='<td>'.$stat->threePointPct.'</td>';
                    $forEcho.='<td>'.$stat->offReb.'</td>';
                    $forEcho.='<td>'.$stat->defReb.'</td>';
                    $forEcho.='<td>'.$stat->minPlayed.'</td>';

                $forEcho.='</tr>';
            }
        $forEcho.='</tbody> </table>';
        echo $forEcho;
    }