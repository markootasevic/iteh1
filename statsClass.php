<?php

class Stats
{
    public $onePointPct;
    public $twoPointPct;
    public $threePointPct;
    public $minPlayed;
    public $offReb;
    public $defReb;
    public $id;
    public $playerId;
    public $gameId;
    public function __construct($one, $two, $three, $min, $off,$def,$pId,$gId)
    {
        $this->onePointPct = $one;
        $this->twoPointPct = $two;
        $this->threePointPct = $three;
        $this->minPlayed = $min;
        $this->offReb = $off;
        $this->defReb = $def;
        $this->playerId = $pId;
        $this->gameId = $gId;
    }

    public function insertInDb()
    {
        require_once('conn.php');
//        global $mysqli;

        $query = sprintf('INSERT INTO stats (playerId, gameId, onePtPct, twoPtPct, threePtPct, minPlayed, offReb, defReb) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)',
            $this->playerId,$this->gameId,$this->onePointPct,$this->twoPointPct,$this->threePointPct,$this->minPlayed,$this->offReb,$this->defReb);
        if ($mysqli->query($query)) {
//            $mysqli->close();
            return 1;

        } else {
//            $mysqli->close();
            return 0;
        }
    }

    public static function getStatsForTeam($tId,$gId)
    {
        include_once 'conn.php';
        global $mysqli;
        $sql = sprintf('SELECT * FROM stats s JOIN player p ON s.playerId = p.id WHERE p.teamId=%s AND s.gameId=%s', $tId,$gId);
        if(!$result = $mysqli->query($sql)) {
            echo "ERROR".$mysqli->errno;
            exit();
        }
        $arrayResult = array();
        while($row = $result->fetch_object()) {
            $stat = new Stats($row->onePtPct,$row->twoPtPct,$row->threePtPct,$row->minPlayed,$row->offReb,$row->defReb,$row->playerId,$row->gameId);
            $stat->id = $row->id;
            array_push($arrayResult, $stat);
        }
//        $mysqli->close();
        return $arrayResult;
    }
}