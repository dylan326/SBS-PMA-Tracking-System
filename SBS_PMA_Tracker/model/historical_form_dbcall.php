<?php
//file inserts to the historical table for archiving data
include('DatabaseClass.php');
//create object
$DatabaseClass = new DatabaseClass();

//prevent XXS Attack
$nameWashed = $DatabaseClass->wash($_POST['name']);
$date_completedWashed = $DatabaseClass->wash($_POST['date_completed']);
$contact_clientWashed = $DatabaseClass->wash($_POST['contact_client']);
$inspector1Washed = $DatabaseClass->wash($_POST['inspector1']);
$inspector2Washed = $DatabaseClass->wash($_POST['inspector2']);
$how_longWashed = $DatabaseClass->wash($_POST['how_long']);

//call method to insert data to historical
$processForm = $DatabaseClass->historical_form_process($nameWashed, $date_completedWashed, $contact_clientWashed, $inspector1Washed, $inspector2Washed, $how_longWashed);

if($processForm == true)
{
    header("refresh: 3; url=../ready_pma.php");
    echo "PMA logged in history.  Redirecting...";
}
else
{
    echo "System error, contact administrator!";
}


?>
