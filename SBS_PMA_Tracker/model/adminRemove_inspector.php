<?php

include('dbopen.php');
include('DatabaseClass.php');
$DatabaseClass = new DatabaseClass();

$first = $DatabaseClass->wash($_POST['first']);
$last = $DatabaseClass->wash($_POST['last']);




$sql = "update person set isActive = 0 where first_name like ? and last_name like ?";

$param1 = "%{$first}%";
$param2 = "%{$last}%";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss",  $param1, $param2);
$stmt->execute();

if($stmt == true)
{
    header("refresh:3; url=../adminchoose.php");
    echo "Inspector Removed. Re-directing.... ";
}


?>