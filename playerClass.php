<?php


class Player
{
    public $id;
    public $dob;
    public $country;
    public $position;
    public $name;
    public $height;
    public $teamId;
    public function __construct($name, $position, $height, $dob, $country, $teamId)
    {
        $this->name = $name;
        $this->position = $position;
        $this->height = $height;
        $this->dob = $dob;
        $this->country = $country;
        $this->teamId = $teamId;
    }

    public function insertInDb() {
        include_once 'conn.php';
        global $mysqli;
//        echo $this->dob;
//        die();
//        $date = strtotime($this->dob);
//        $dbDate = date('Y-m-d H:i:s',$date);
        $sql = sprintf('INSERT INTO player (name,position,height,dob, country, teamId) VALUES ("%s","%s","%s","%s","%s",%s)',$this->name,$this->position,$this->height,$this->dob,$this->country,$this->teamId);

        if( $mysqli->query($sql) === TRUE) {
//            $mysqli->close();
            return 1;
        } else {
            echo $mysqli->error;
            die();
//            $mysqli->close();
//            return 0;
        }
    }

    public static function deletePlayersFromTeam($teamId)
    {
        include_once ('conn.php');
        global $mysqli;
        $query = sprintf('DELETE FROM player WHERE teamId = %s', $teamId, $teamId);
        if(!$result = $mysqli->query($query)) {
            echo "Error deleting team".$result->error;
            exit();
        }

    }

    public static function getOnePlayerName($id)
    {
        include_once ('conn.php');
        global $mysqli;
        $query = sprintf('SELECT * FROM player WHERE id=%s', $id);
        if(!$result = $mysqli->query($query)) {
            echo "Error getting 1 team".$result->error;
            exit();
        } if($result == null) {
        echo $mysqli->error;
    }
        $player = $result->fetch_object();
//        $res = new Player($team->name, $team->arena);
//        $res->id = $team->id;
        return $player->name;
    }

    public static function getPlayerTeamName($id)
    {
        include_once ('conn.php');
        global $mysqli;
        $query = sprintf('SELECT t.name FROM team t JOIN player p on p.teamId = t.id WHERE p.id=%s', $id);
        if(!$result = $mysqli->query($query)) {
            echo "Error getting 1 team name";
            exit();
        } if($result == null) {
        echo $mysqli->error;
    }
    $name = $result->fetch_object();
        return $name->name;
    }

}