<?php

include('dbopen.php');
include('DatabaseClass.php');
$DatabaseClass = new DatabaseClass();

$first_name = $DatabaseClass->wash($_POST['first_name']);
$last_name = $DatabaseClass->wash($_POST['last_name']);
//$person_type_id = $_POST['person_type_id'];



$sql = "insert into person (person_type_id, first_name, last_name, isActive) values (4,?,?, 1)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss",  $first_name, $last_name);
$stmt->execute();

if($stmt == true)
{
    header("refresh:3; url=../adminchoose.php");
    echo "Inspector Added. Re-directing.... ";
}


?>