<?php

include('dbopen.php');//easier to use this in places then call the connect method
include('DatabaseClass.php');
//create object
$DatabaseClass = new DatabaseClass();

//prevent XXS attack.  
$first = $DatabaseClass->wash($_POST['first']);
$last = $DatabaseClass->wash($_POST['last']);

//statement to make the employee inactive
$sql = "update person set isActive = 0 where first_name like ? and last_name like ?";

//add the paramaters for the prepared statement
$param1 = "%{$first}%";
$param2 = "%{$last}%";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss",  $param1, $param2);
$stmt->execute();

//when done re-direct to main admin page
if($stmt == true)
{
    header("refresh:3; url=../adminchoose.php");
    echo "Inspector Removed. Re-directing.... ";
}


?>
