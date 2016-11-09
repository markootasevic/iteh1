<?php
if(!isset($_SESSION))
{
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nba stats</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/signin.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/iteh1">Nba stats</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class=""><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Insert <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addNewGame.php">Game</a></li>
            <li><a href="addNewTeam.php">Team</a></li>
            <li><a href="addNewPlayer.php">Player</a></li>
          </ul>
        </li>
        <li><a href="allTeams.php">See all teams</a></li>
        <li><a href="#"></a></li>
      </ul> 
	    <ul class="nav navbar-nav navbar-right">
	      <?php if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == 1) { ?>
	      <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	      <?php } else {?>
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      <?php } ?>
      </ul>
    </div>
  </div>
</nav>

  


