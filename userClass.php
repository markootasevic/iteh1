<?php

/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 05-Nov-16
 * Time: 23:05
 */
class User
{
    public $name;
    public $pass;
    public $id;
    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->pass = $password;
    }

    public static function getAllUsers() {
        include_once ('conn.php');
        global $mysqli;
        $sql = "SELECT * FROM user";
        if(!$result = $mysqli->query($sql)) {
            echo "ERROR".$mysqli->errno;
            exit();
        }
        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $user = new User($row->name, $row->pass);
            $user->id = $row->id;
            array_push($arrayResult, $user);
        }
        return $arrayResult;
    }

    public function insertInDb()
    {
        include_once('conn.php');
    global $mysqli;
        $query = "INSERT INTO user (name, pass) VALUES ('" . $mysqli->real_escape_string($this->name) . "', '" . $mysqli->real_escape_string($this->pass) . "')";
        $usernames = self::getAllUsers();
        foreach ($usernames as $user) {
            if ($user->name == $this->name) {
//                $mysqli->close();
                return 2;
            }
        }
        if ($mysqli->query($query)) {
//            $mysqli->close();
            return 1;
    }
            else {
//            $mysqli->close();
            return 0;
        }
    }




    public static function logIn($name, $pass)
    {
        include_once ('conn.php');
        global $mysqli;
        $query = sprintf('SELECT pass FROM user WHERE  name = "%s"', $name);
        if ( ! $result = $mysqli->query( $query ) ) {
            return "There was an db error, try again". $mysqli->error;

//			header( "refresh:5 ;url=signin.php" );
        }
        // if ( $result->num_rows == 1 ) {
        if ( $result->fetch_object()->pass ==$pass ) {
//            $mysqli->close();
            return 1;
        } else {
//            $mysqli->close();
            return 0;
        }
    }
}

