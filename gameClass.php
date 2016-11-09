<?php

class Game
{
    public $ptsHome;
    public $ptsGuest;
    public $homeId;
    public $guestId;
	public $id;

    public function __construct($pHome, $pGuest, $homeId, $guestId)
    {
        $this->ptsGuest = $pHome;
        $this->ptsHome = $pGuest;
        $this->homeId = $homeId;
        $this->guestId = $guestId;
    }

    public function insetInDb()
    {
        require_once('conn.php');
        global $mysqli;

        $query = sprintf('INSERT INTO game (ptsHome, ptsGuest, homeId, guestId) VALUES (%s,%s,%s,%s)', $this->ptsHome,$this->ptsGuest,$this->homeId,$this->guestId);

        if ($mysqli->query($query)) {
	        return $mysqli->insert_id;

        } else {
//            $mysqli->close();
            return "error";
        }
    }

	public static function getOneGame ($id) {
		include_once ('conn.php');
		$query = sprintf('SELECT * FROM game WHERE id=%s', $id);
		if(!$result = $mysqli->query($query)) {
			echo "Error getting 1 team".$result->error;
			exit();
		}
		$game = $result->fetch_object();
		return new Game($game->ptsHome, $game->ptsGuest, $game->homeId, $game->guestId);


	}

	public static function getAllGames() {
		include_once 'conn.php';
        global $mysqli;
		$sql = "SELECT * FROM game";
		if(!$result = $mysqli->query($sql)) {
			echo "ERROR".$mysqli->errno;
			exit();
		}
		$arrayResult = array();
		while($row = $result->fetch_object()) {
			$game = new Game($row->ptsHome, $row->ptsGuest, $row->homeId, $row->guestId);
			$game->id = $row->id;
			array_push($arrayResult, $game);
		}
//		$mysqli->close();
		return $arrayResult;
	}

    public static function deleteGamesWithTeam($teamId)
    {
        include_once ('conn.php');
        global $mysqli;
        $query = sprintf('DELETE FROM game WHERE homeId = %s OR guestId = %s', $teamId, $teamId);
        if(!$result = $mysqli->query($query)) {
            echo "Error deleting team".$result->error;
            exit();
        }

    }

}