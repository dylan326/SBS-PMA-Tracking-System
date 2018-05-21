<?php
//file converts db call to JSON to be used by the ready_pmaJSONcall file in controller folder
session_start();
include('../controller/checker.php');
include('dbopen.php');
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);
$result = $conn->query("SELECT * FROM ".$obj->table." where in_prog = 0 and date_completed < DATE_SUB(now(), INTERVAL 6 MONTH) order by date_completed asc");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);



?>
