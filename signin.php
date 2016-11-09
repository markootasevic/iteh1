<?php
include_once ('header.php');
?>
    <?php if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == 0 ) { ?>
<h2 class="form-signin-heading loginError">Username or password is wrong,please try again</h2>
<?php } unset($_SESSION['logedin']); ?>
    <div class="container">

      <form class="form-signin" action="postSignin.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="user" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass"  id="inputPassword" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
