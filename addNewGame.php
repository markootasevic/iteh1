<?php
include_once 'header.php';
include_once 'teamClass.php';
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php if (isset($_SESSION['game'])) { ?>
    <h2 class="form-signin-heading loginError"><?php echo $_SESSION['game']; ?></h2>
<?php } unset($_SESSION['game']); ?>
<div class="container">

    <form class="form-signin" action="postAddGame.php" method="POST">
        <h2 class="form-signin-heading">Add a new player</h2>
        <label for="homeTeam">Home team</label>
        <?php
        $teams = Team::getAllTeams();
        global $teams;
        echo '  <select name="homeTeam" class="form-control">';
        foreach ($teams as $team) {
            ?>

            <option value="<?php echo $team->id ?>"> <?php echo $team->name ?> </option>

        <?php } ?>
        </select>
        <input type="number" name="homePts" id="inputEmail" class="form-control" placeholder="Home team score" required autofocus>
        <label for="guestTeam">Guest team</label>
        <?php
//        $teams = Team::getAllTeams();
        echo '  <select name="guestTeam" class="form-control">';
        foreach ($teams as $team) {
            ?>

            <option value="<?php echo $team->id ?>"> <?php echo $team->name ?> </option>

        <?php } ?>
        <input type="number" name="guestPts" id="inputEmail" class="form-control" placeholder="Guest team score" required autofocus>





        <button class="btn btn-lg btn-primary btn-block" type="submit">Add game</button>
    </form>

</div> <!-- /container -->

</body>
</html>

