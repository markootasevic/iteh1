<?php
 include_once 'header.php';
include_once 'teamClass.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['addPlayer'])) {
    ?>
    <h2 class="form-signin-heading loginError"><?php echo  $_SESSION['addPlayer']?></h2>
<?php } unset($_SESSION['addPlayer']); ?>

<div class="container">

    <form class="form-signin" action="postAddPlayer.php" method="POST">
        <h2 class="form-signin-heading">Add a new player</h2>
        <?php
            $teams = Team::getAllTeams();
            echo '  <select name="team" class="form-control">';
            foreach ($teams as $team) {
                ?>

                    <option value="<?php echo $team->id ?>"> <?php echo $team->name ?> </option>

        <?php } ?>
                </select>
        <label for="inputEmail" class="sr-only">Name</label>
        <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Name" required autofocus>
        <input type="number" name="height" id="inputEmail" class="form-control" placeholder="Height" required autofocus>
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

</div> <!-- /container -->

</body>
</html>

