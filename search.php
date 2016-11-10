<?php

include_once 'conn.php';
global $mysqli;
$key=$_GET['key'];
$array = array();
$query="SELECT name FROM team where name LIKE '%{$key}%'";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $array[] = $row['name'];
    }
    echo json_encode($array);
    }else {
        echo "sranje";
}
//while($row=mysql_fetch_assoc($query))
//{
//    $array[] = $row['title'];
//}
//echo json_encode($array);