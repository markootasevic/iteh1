<?php
include_once ('header.php');
include ('teamClass.php');
if (!isset($_SESSION)) {
    session_start();
}

if(isset($_GET['id'])) {
    $team = Team::getOneTeam($_GET['id']);
    ?>

    <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Change team</h2>
        <label for="inputEmail" class="sr-only">Name</label>
        <input type="text" name="name" id="inputEmail" class="form-control" value="<?php echo $team->name?>" required autofocus>
        <label for="inputEmail" class="sr-only">Name</label>
        <input type="text" name="arena" id="inputEmail" class="form-control" value="<?php echo $team->arena?>" required autofocus>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Change</button>
    </form>

<?php
}
if (isset($_POST['name']) && isset($_POST['arena'])) {
    include_once('conn.php');
    global $mysqli;
    $sql = sprintf('UPDATE team SET name="%s", arena="%s" WHERE id=%s', $_POST['name'], $_POST['arena'], $_POST['id']);
    if($mysqli->query($sql) === false){
        echo "Error";
        exit();
    }

    header("Location: allTeams.php");
}

?>
