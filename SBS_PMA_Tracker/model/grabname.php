<?php
session_start();
include('../controller/checker.php');
include('dbopen.php');

$pma_id = $_GET['pma_id'];

$sql = "SELECT name FROM pma where pma_id=$pma_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $pma_name = $row["name"];
    }
} else {
    echo "0 results Error,  contact administrator";
}


?>