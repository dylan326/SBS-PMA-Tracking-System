<?php
//inserts a reminder and redirects to reminders page
include('DatabaseClass.php');
//create object
$DatabaseClass = new DatabaseClass();
//prevent XXS Attack
$reminderWashed = $DatabaseClass->wash($_POST['reminder']);
//call method to save reminder
$setReminder = $DatabaseClass->save_reminder($reminderWashed);
//on re-direct the new reminder will show
if($setReminder == true)
{
    header("Location: ../reminders.php");
} 
else 
{
    echo "Error setting reminder,  contact administrator";
}

?>
