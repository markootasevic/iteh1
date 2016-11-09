<?php
	include_once 'gameClass.php';
	include_once 'header.php';
	include_once 'teamClass.php';
	if(!isset($_SESSION)) {
		session_start();
	}
	if(isset($_GET['id'])) {
		$game = Game::getOneGame($_GET['id']);
        global $teamHome;
        global $teamGuest;
		$teamHome = Team::getOneTeam($game->homeId);
		$teamGuest = Team::getOneTeam($game->guestId);
		?>

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
            <label for="inputEmail" class="sr-only">Name</label>
            <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Name" required autofocus>
            <input type="text" name="height" id="inputEmail" class="form-control" placeholder="Height" required autofocus>
            <input type="text" name="country" id="inputEmail" class="form-control" placeholder="Country of birth" required autofocus>
            <input type="date" name="dob" id="inputEmail" class="form-control" placeholder="Date of birth" required autofocus>
            <select class="form-control" name="position">
                <option value="pg">PG</option>
                <option value="sg">SG</option>
                <option value="sf">SF</option>
                <option value="pf">PF</option>
                <option value="c">C</option>
            </select>



            <button class="btn btn-lg btn-primary btn-block" type="submit">Add player</button>
        </form>
        <div id="info">

        </div>
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
