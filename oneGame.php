<?php
	include_once 'gameClass.php';
	include_once 'header.php';
	include_once 'teamClass.php';
	if(!isset($_SESSION)) {
		session_start();
	}
	if(isset($_GET['id'])) {
		$game = Game::getOneGame($_GET['id']);
		$teamHome = Team::getOneTeam($game->homeId);
		$teamGuest = Team::getOneTeam($game->guestId);
		?>

		<div> <?php if(intval($game->ptsHome) > intval($game->ptsGuest)) {
				echo'<h2 style="text-align:left;float:left;"> <span class="label label-default">L</span>'.' '.$teamGuest->name.' '.$game->ptsGuest.' - '. '</h2>';
				echo'<h2 style="text-align:right;float:left;">'.$game->ptsHome.' '.$teamHome->name.' <span class="label label-default">W</span> </h2>';
			} else {
				echo'<h2 style="text-align:left;float:left;"> <span class="label label-default">W</span>'.' '.$teamGuest->name.' '.$game->ptsGuest.' - '. '</h2>';
				echo'<h2 style="text-align:right;float:left;">'.$game->ptsHome.' '.$teamHome->name.' <span class="label label-default">L</span> </h2>';
			 }
			?>
		</div>

<?php
	}
	else {
		echo"error";
	}
