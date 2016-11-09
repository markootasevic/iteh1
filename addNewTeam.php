<?php
include_once ('header.php');
if(!isset($_SESSION))
{
    session_start();
}
?>

<div class="container">

    <form class="form-signin" action="postAddTeam.php" method="POST">
        <h2 class="form-signin-heading">Add a new team</h2>
        <label for="inputEmail" class="sr-only">Name</label>
        <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Team name" required autofocus>

        <label for="inputEmail" class="sr-only">Arena</label>
        <input type="text" name="arena" id="inputEmail" class="form-control" placeholder="Team arena" required autofocus>



        <button class="btn btn-lg btn-primary btn-block" type="submit">Add team</button>
    </form>

</div> <!-- /container -->

</body>
</html>
