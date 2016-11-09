<?php include('header.php');
	include_once 'gameClass.php';
	include_once 'teamClass.php';
if(!isset($_SESSION))
{
	session_start();
}

	global $allGames;
	$allGames = Game::getAllGames();

?>

<link href="css/simple-sidebar.css" rel="stylesheet">

<div id="wrapper">

	<!-- Sidebar -->
	<div id="sidebar-wrapper" style="z-index: -1;">
		<ul class="sidebar-nav">
			<li class="sidebar-brand">
				<a href="#">
					Start Bootstrap
				</a>
			</li>
			<li>
				<a href="#">Dashboard</a>
			</li>
			<li>
				<a href="#">Shortcuts</a>
			</li>
			<li>
				<a href="#">Overview</a>
			</li>
			<li>
				<a href="#">Events</a>
			</li>
			<li>
				<a href="#">About</a>
			</li>
			<li>
				<a href="#">Services</a>
			</li>
			<li>
				<a href="#">Contact</a>
			</li>
		</ul>
	</div>
	<!-- /#sidebar-wrapper -->

	<!-- Page Content -->
	<div id="page-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
					<?php foreach ($allGames as $game)  {
						$teamHome = Team::getOneTeam($game->homeId);
						$teamGuest = Team::getOneTeam($game->guestId);
						?>
						<div> <?php if(intval($game->ptsHome) > intval($game->ptsGuest)) {
								echo'<h2 style="text-align:left;float:left;"> <span class="label label-default">L</span>'.' '.$teamGuest->name.' '.$game->ptsGuest.' - '. '</h2>';
								echo'<h2 style="text-align:left;float:left;">'.$game->ptsHome.' '.$teamHome->name.' <span class="label label-default">W</span> </h2>';
							} else {
								echo'<h2 style="text-align:left;float:left;"> <span class="label label-default">W</span>'.' '.$teamGuest->name.' '.$game->ptsGuest.' - '. '</h2>';
								echo'<h2 style="text-align:right;float:left;">'.$game->ptsHome.' '.$teamHome->name.' <span class="label label-default">L</span> </h2>';
							}
							?>
						</div>
						<br style="clear:both;">
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<!--<script src="js/jquery.js"></script>-->

<!-- Bootstrap Core JavaScript -->
<!--<script src="js/bootstrap.min.js"></script>-->

<!-- Menu Toggle Script -->
<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
</script>

</body>
</html>


