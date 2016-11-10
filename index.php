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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">        </script>
<script src="typeahead.min.js"></script>
<div id="wrapper">

	<!-- Sidebar -->
	<div id="sidebar-wrapper" style="z-index: 0;">
		<ul class="sidebar-nav">
            <li>
                <form action="redirect.php" method="get">
                <input onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }" type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Choose a team">
                </form>
                <script>
                    $(document).ready(function(){
                        $('input.typeahead').typeahead({
                            name: 'typeahead',
                            remote:'search.php?key=%QUERY',
                            limit : 10
                        });
                    });
                </script>
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
                    <?php
                        global $index;
                        $index = 1;
                    ?>
					<?php foreach ($allGames as $game)  {
						$teamHome = Team::getOneTeam($game->homeId);
						$teamGuest = Team::getOneTeam($game->guestId);
						?>
						<div    > <?php if(intval($game->ptsHome) > intval($game->ptsGuest)) {
								echo'<h2 style="text-align:left;float:left;"> <span class="label label-default">L</span>'.' '.$teamGuest->name.' '.$game->ptsGuest.' - '. '</h2>';
								echo'<h2 style="text-align:left;float:left;">'.$game->ptsHome.' '.$teamHome->name.' <span class="label label-default">W</span> </h2>';
							} else {
								echo'<h2 style="text-align:left;float:left;"> <span class="label label-default">W</span>'.' '.$teamGuest->name.' '.$game->ptsGuest.' - '. '</h2>';
								echo'<h2 style="text-align:right;float:left;">'.$game->ptsHome.' '.$teamHome->name.' <span class="label label-default">L</span> </h2>';
							}
							?>
                            <a href="<?php echo 'oneGame.php?id='.$game->id; ?>"><h2 style="text-align:left;float:left;"> See stats</h2></a>
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


