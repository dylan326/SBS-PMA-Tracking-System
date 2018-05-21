<?php
//file called from in_progJSONcall and converts data to JSON
session_start();
include('../controller/checker.php');
include('dbopen.php');
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);
$result = $conn->query("SELECT * FROM ".$obj->table." where in_prog = 1 order by name asc");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);



?>
