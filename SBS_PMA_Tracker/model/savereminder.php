<?php
//inserts a reminder and redirects to reminders page
include('DatabaseClass.php');

$DatabaseClass = new DatabaseClass();

$reminderWashed = $DatabaseClass->wash($_POST['reminder']);

$setReminder = $DatabaseClass->save_reminder($reminderWashed);

if($setReminder == true)
{
    header("Location: ../reminders.php");
} 
else 
{
    echo "Error setting reminder,  contact administrator";
}
/*//inserts a reminder and redirects to reminders page
session_start();
include('../controller/checker.php');
include('dbopen.php');

$reminder = $_POST['reminder'];
$reminder = htmlspecialchars($reminder, ENT_QUOTES, 'UTF-8');

$stmt = $conn->prepare("INSERT INTO reminders (reminder)VALUES (?)");
$stmt->bind_param("s",$reminder);
$stmt->execute();

if ($stmt) 
{
    header("Location: ../reminders.php");
} 
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();*/
?>
