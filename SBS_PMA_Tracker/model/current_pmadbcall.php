<?php
//file to convert db call to JSON to get all clients that PMA is current(has been serviced in last 6 months)
session_start();
include('../controller/checker.php');
include('dbopen.php');
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);
$result = $conn->query("SELECT * FROM ".$obj->table." where in_prog = 0 and date_completed > DATE_SUB(now(), INTERVAL 6 MONTH) order by name asc");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);



?>
