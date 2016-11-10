<?php
	include_once 'gameClass.php';
	include_once 'header.php';
	include_once 'teamClass.php';
    include_once 'statsClass.php';
    include_once 'playerClass.php';
	if(!isset($_SESSION)) {
		session_start();
	}
	if(isset($_GET['id'])) {
		$game = Game::getOneGame($_GET['id']);
        global $teamHome;
        global $teamGuest;
        global $gameId;
        $gameId = $_GET['id'];
		$teamHome = Team::getOneTeam($game->homeId);
		$teamGuest = Team::getOneTeam($game->guestId);
		?>

        <?php if (isset($_SESSION['stats'])) { ?>
            <h2 class="form-signin-heading loginError"><?php echo $_SESSION['stats']?></h2>
        <?php } unset($_SESSION['stats']); ?>

		<div> <?php if(intval($game->ptsHome) > intval($game->ptsGuest)) {
				echo'<h2 style="text-align:left;float:left;"> <span class="label label-default">L</span>'.' '.$teamGuest->name.' '.$game->ptsGuest.' - '. '</h2>';
				echo'<h2 style="text-align:right;float:left;"> '.$game->ptsHome.' '.$teamHome->name.' <span class="label label-default">W</span> </h2>';

			} else {
				echo'<h2 style="text-align:left;float:left;"> <span class="label label-default">W</span>'.' '.$teamGuest->name.' '.$game->ptsGuest.' - '. '</h2>';
				echo'<h2 style="text-align:right;float:left;">'.$game->ptsHome.' '.$teamHome->name.' <span class="label label-default">L</span> </h2>';
			 }
			?>
		</div>

        <form class="form-signin" action="postAddStats.php" method="POST">
            <h2 class="form-signin-heading">Add stats for players</h2>
            <label for="team">Select a team</label>
             <select id="team" name="team" class="form-control" onchange="myFunction()">
                 <option value="<?php echo $teamGuest->id?>"><?php echo $teamGuest->name ?></option>
                 <option value="<?php echo $teamHome->id?>"><?php echo $teamHome->name?></option>
            </select>
            <select name="player" id="player" class="form-control">
                <?php
                $players = Team::getPlayers($teamGuest->id);
                foreach ($players as $player) {
                ?>
                    <option value="<?php echo $player->id ?>"><?php echo $player->name ?></option>
                <?php }?>
            </select>
            <input type="hidden" name="gameId" value="<?php echo $gameId;?>">
            <input type="number" name="onePointPct"  min="0" max="100" id="inputEmail" class="form-control" placeholder="1 point percentage" required autofocus>
            <input type="number" name="twoPointPct" min="0" max="100"  id="inputEmail" class="form-control" placeholder="2 point percentage" required autofocus>
            <input type="number" name="threePointPct" min="0" max="100"  id="inputEmail" class="form-control" placeholder="3 point percentage" required autofocus>
            <input type="number" name="minPlayed" min="0" max="48" id="inputEmail" class="form-control" placeholder="Min. played" required autofocus>
            <input type="number" name="offReb" id="inputEmail" class="form-control" placeholder="Offensive rebounds" required autofocus>
            <input type="number" name="defReb" id="inputEmail" class="form-control" placeholder="Defensive rebounds" required autofocus>




            <button class="btn btn-lg btn-primary btn-block" type="submit">Add stats for player</button>
        </form>

        <button id="game" class="btn btn-default" onclick="myFunctionOne()" value="<?php echo $gameId;?>">See stats</button>
        <div id="table"></div>
        <script>
            function myFunctionOne() {
                var x = document.getElementById("game").value;
                $.ajax({
                    type: 'GET',
                    url: 'getStats.php',
                    data: 'game=' + x,
                    success: function(response) {
//                        $("#info").html(response);
                        document.getElementById("table").innerHTML = response;
                    }
                });
            }
        </script>

<!--        <table class="table table-striped">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th>Team</th>-->
<!--                <th>Player</th>-->
<!--                <th>1 point pct</th>-->
<!--                <th>2 point pct</th>-->
<!--                <th>3 point pct</th>-->
<!--                <th>offensive rebounds</th>-->
<!--                <th>Defensive rebounds</th>-->
<!--                <th>Minutes player</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            --><?php
//            $home = Stats::getStatsForTeam($teamHome->id,$gameId);
//            $guest = Stats::getStatsForTeam($teamGuest->id,$gameId);
//            $result = array_merge($home,$guest);
//            foreach ($result as $stat) {
//                ?>
<!--                <tr>-->
<!---->
<!--                    <td>--><?php //echo Player::getPlayerTeamName($stat->playerId);?><!--</td>-->
<!--                    <td>--><?php //echo Player::getOnePlayerName($stat->playerId);?><!--</td>-->
<!--                    <td>--><?php //echo $stat->onePointPct ?><!--</td>-->
<!--                    <td>--><?php //echo $stat->twoPointPct ?><!--</td>-->
<!--                    <td>--><?php //echo $stat->threePointPct ?><!--</td>-->
<!--                    <td>--><?php //echo $stat->offReb ?><!--</td>-->
<!--                    <td>--><?php //echo $stat->defReb ?><!--</td>-->
<!--                    <td>--><?php //echo $stat->minPlayed ?><!--</td>-->
<!---->
<!--                </tr>-->
<!--            --><?php //} ?>
<!--            </tbody>-->
<!--        </table>-->
        <script>
            function myFunction() {
                var x = document.getElementById("team").value;
                $.ajax({
                    type: 'GET',
                    url: 'getPlayers.php',
                    data: 'team=' + x,
                    success: function(response) {
//                        $("#info").html(response);
                        document.getElementById("player").innerHTML = response;
                    }
                });
            }
        </script>




<?php
	}
	else {
		echo"error";
	}
