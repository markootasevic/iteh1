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

    public static function getAllTeams() {
        include_once 'conn.php';
//        global $mysqli;
        $sql = "SELECT * FROM team";
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
        $query = sprintf('SELECT name, arena FROM team WHERE id=%s', $id);
        if(!$result = $mysqli->query($query)) {
            echo "Error getting 1 team".$result->error;
            exit();
        }
        $team = $result->fetch_object();
        return new Team($team->name, $team->arena);


    }


}