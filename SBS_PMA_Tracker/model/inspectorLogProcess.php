<?php
include('dbopen.php');
include('DatabaseClass.php');
//create object
$DatabaseClass = new DatabaseClass();
//set post varible.  Hidden value passed so no need to wash
$inspector_id = $_POST['inspector'];
//prevent XXS Attack
$building = $DatabaseClass->wash($_POST['building']);
$description = $DatabaseClass->wash($_POST['description']);
$floors  = $DatabaseClass->wash($_POST['floors']);
$issues  = $DatabaseClass->wash($_POST['issues']);
$days  = $DatabaseClass->wash($_POST['days']);

//prepared statement to insert into daily logs.  Had to covert timezone to Eastern standard time. 
$sql = "insert into daily_logs (person_id, building, description, floors, issues, days_left, date_time) values (?,?,?,?,?,?,CONVERT_TZ(NOW(),'+00:00', '-04:00'))";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssss", $inspector_id, $building, $description, $floors, $issues, $days);
$stmt->execute();

if(!$stmt)
{
   echo "Error: contact administrator";
}
else {
    header("refresh:5; url=../inspectorLogin.php");
    echo "<h2>Thank you for logging your work. Re-directing.... <h2>";
}
$stmt->close();
$conn->close();

?>
