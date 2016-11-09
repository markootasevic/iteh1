<?php

include_once ('header.php');
include ('teamClass.php');
if (!isset($_SESSION)) {
session_start();
}
?>

<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Arena</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $teamArray = Team::getAllTeams();
            foreach ($teamArray as $team) {
                ?>
        <tr class='clickable-row' data-href= <?php echo "editTeam.php?id=".$team->id; ?>>
<!--            stavi da je link vodi na stranicu tog tima-->
            <td><?php echo $team->name?></td>
            <td><?php echo $team->arena?></td>
            <td class="minimal_cell">
                <a href="<?php echo 'editTeam.php?id='.$team->id ?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                &nbsp;
                <a href="<?php echo 'deleteTeam.php?id =' .$team->id?>">
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

