<?php

include_once ('header.php');
include ('teamClass.php');
if (!isset($_SESSION)) {
session_start();
}
?>

<div class="container">
    
    <div style="display: inline">
    <span><h3>SORT TABLE</h3></span>
       <h3><a href="allTeams.php?sort=asc">ascending</a></h3>
      <h3><a href="allTeams.php?sort=desc">descending</a></h3>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Arena</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_GET['sort'])) {
            $teamArray = Team::getAllTeams($_GET['sort']);
        }else {
            $teamArray = Team::getAllTeams();
        }
            foreach ($teamArray as $team) {
                ?>
        <tr class='clickable-row' data-href= <?php echo "editTeam.php?id=".$team->id; ?>>

            <td><?php echo $team->name?></td>
            <td><?php echo $team->arena?></td>
            <td class="minimal_cell">
                <a href="<?php echo 'editTeam.php?id='.$team->id ?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                &nbsp;
                <a href="<?php echo 'deleteTeam.php?id=' .$team->id?>">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>
</div>

</body>
</html>

