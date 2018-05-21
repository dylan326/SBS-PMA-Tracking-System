<?php
//file inserts to the historical table for archiving data
include('DatabaseClass.php');

$DatabaseClass = new DatabaseClass();

$nameWashed = $DatabaseClass->wash($_POST['name']);
$date_completedWashed = $DatabaseClass->wash($_POST['date_completed']);
$contact_clientWashed = $DatabaseClass->wash($_POST['contact_client']);
$inspector1Washed = $DatabaseClass->wash($_POST['inspector1']);
$inspector2Washed = $DatabaseClass->wash($_POST['inspector2']);
$how_longWashed = $DatabaseClass->wash($_POST['how_long']);

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
/*//file inserts to the historical table for archiving data
session_start();
include('../controller/checker.php');
include('dbopen.php');

$name = $_POST['name'];
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

$date_completed = $_POST['date_completed'];
$date_completed = htmlspecialchars($date_completed, ENT_QUOTES, 'UTF-8');

$contact_client = $_POST['contact_client'];
$contact_client = htmlspecialchars($contact_client, ENT_QUOTES, 'UTF-8');

$inspector1 = $_POST['inspector1'];
$inspector1 = htmlspecialchars($inspector1, ENT_QUOTES, 'UTF-8');

$inspector2 = $_POST['inspector2'];
$inspector2 = htmlspecialchars($inspector2, ENT_QUOTES, 'UTF-8');

$how_long = $_POST['how_long'];
$how_long = htmlspecialchars($how_long, ENT_QUOTES, 'UTF-8');


$sqlhistorical = "insert into historical (pma_name, date_completed, building_contact, inspector1, inspector2, time_to_complete)
                  values (?,?,?,?,?,?)";
                  
$stmthistorical = $conn->prepare($sqlhistorical);
$stmthistorical->bind_param("ssssss", $name, $date_completed, $contact_client,$inspector1,$inspector2,$how_long);
$stmthistorical->execute();

if($stmthistorical)
{
    header("refresh: 3; url=../ready_pma.php");
    echo "PMA logged in history.  Redirecting...";
}
else
{
    echo "System error, contact administrator!";
}

$stmthistorical->close();
$conn->close();*/


?>