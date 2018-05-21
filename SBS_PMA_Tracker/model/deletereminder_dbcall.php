<?php
//file to delete a reminder
//no prepared statements because no user input
session_start();
include('../controller/checker.php');
$reminder_id = $_GET['reminder_id'];//grab id of reminder to delete and put in sql statement
include('dbopen.php');

$sql = "DELETE FROM reminders WHERE reminder_id=$reminder_id";

if ($conn->query($sql) === TRUE) 
{
    header('Location: ../reminders.php');
}
else {
    echo "Error deleting record: contact Dylan";
}

$conn->close();
?>
