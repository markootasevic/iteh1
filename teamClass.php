<?php

/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 05-Nov-16
 * Time: 23:47
 */
class Team
{
    public $name;
    public $arena;
    public $id;

    public function __construct($name,$arena)
    {
        $this->name = $name;
        $this->arena = $arena;

    }


    public function insertInDb()
    {
        require_once('conn.php');
//        global $mysqli;

        $query = sprintf('INSERT INTO team (name, arena) VALUES ("%s","%s")', $this->name,$this->arena);
//        $query = "INSERT INTO team (name, arena) VALUES ('" . $mysqli->real_escape_string($this->name) . "', '" . $mysqli->real_escape_string($this->arena) . "')";

        if ($mysqli->query($query)) {
//            $mysqli->close();
            return 1;

        } else {
//            $mysqli->close();
            return 0;
        }

    }

    public static function getAllTeams($sort = "") {
        include_once 'conn.php';
//        global $mysqli;
        if($sort != "") {
            $sql = sprintf("SELECT * FROM team ORDER BY name %s", $sort);
        }
        else {
            $sql = "SELECT * FROM team";
        }
        if(!$result = $mysqli->query($sql)) {
            echo "ERROR".$mysqli->errno;
            exit();
        }
        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $team = new Team($row->name, $row->arena);
            $team->id = $row->id;
            array_push($arrayResult, $team);
        }
//        $mysqli->close();
        return $arrayResult;
    }

    public static function getOneTeam ($id) {
        include_once ('conn.php');
	    global $mysqli;
        $query = sprintf('SELECT * FROM team WHERE id=%s', $id);
        if(!$result = $mysqli->query($query)) {
            echo "Error getting 1 team".$result->error;
            exit();
        } if($result == null) {
            echo $mysqli->error;
        }
        $team = $result->fetch_object();
        $res = new Team($team->name, $team->arena);
        $res->id = $team->id;
        return $res;


    }

    public static function getTeamIdByName($name) {
        include_once ('conn.php');
        global $mysqli;
        $query = sprintf('SELECT id FROM team WHERE name="%s"', $name);
        if(!$result = $mysqli->query($query)) {
            echo "Error getting 1 team";
            exit();
        } if($result == null) {
            echo $mysqli->error;
        }
        $team = $result->fetch_object();
        return $team->id;
    }

    public static function deleteTeam($id)
    {
        include_once ('conn.php');
        include_once ('playerClass.php');
        include_once ('gameClass.php');
//        global $mysqli;
        $query = sprintf('DELETE FROM team WHERE id=%s', $id);
        if(!$result = $mysqli->query($query)) {
            echo "Error deleting team".$result->error;
            exit();
        } else {
            Game::deleteGamesWithTeam($id);
            Player::deletePlayersFromTeam($id);
        }

    }

    public static function getPlayers($teamId)
    {
        include_once 'conn.php';
        include_once 'playerClass.php';
        global $mysqli;
        $sql = sprintf('SELECT * FROM player WHERE teamId =%s',$teamId);
        if(!$result = $mysqli->query($sql)) {
            echo "ERROR".$mysqli->errno;
            exit();
        }
        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $player = new Player($row->name, $row->position, $row->height, $row->dob, $row->country, $row->teamId);
            $player->id = $row->id;
            array_push($arrayResult, $player);
        }
//        $mysqli->close();
        return $arrayResult;
    }

}