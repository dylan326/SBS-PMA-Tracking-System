<?php
//file confertts the database call to JSON
session_start();
include('../controller/checker.php');
include('dbopen.php');
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);
$result = $conn->query("SELECT * FROM ".$obj->table." order by date_time desc");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);



?>