<?php
//file to add a new PMA to the system
include('DatabaseClass.php');

$DatabaseClass = new DatabaseClass();

$nameWashed = $DatabaseClass->wash($_POST['name']);

$daysWashed = $DatabaseClass->wash($_POST['days']);

$newPMA_added = $DatabaseClass->add_new($nameWashed, $daysWashed);

if($newPMA_added == true)
{
    header("refresh:3; url=../ready_pma.php");
    echo "New client added to ready PMA. Re-directing.... ";
    
}
else 
{
    echo "Error adding new pma.  Contact Administrator";
}
/*
//file to add a new PMA to the system
session_start();
include('../controller/checker.php');
include('dbopen.php');

$pma_name = $_POST['name'];
$pma_name = htmlspecialchars($pma_name, ENT_QUOTES, 'UTF-8');
 
$days = $_POST['days'];
$days = htmlspecialchars($days, ENT_QUOTES, 'UTF-8');
 
$sqlpma = "insert into pma (name, days, in_prog, start_date, date_completed) values ( ?, ?, 0, null, 'New PMA')";
$stmtpma = $conn->prepare($sqlpma);
$stmtpma->bind_param("ss", $pma_name, $days);
$stmtpma->execute();

if(!$stmtpma)

{
    echo "Error in insert of pma". $conn->error;
}

else {
    header("refresh:3; url=../ready_pma.php");
    echo "New client added to ready PMA. Re-directing.... ";
}
$stmtpma->close();
$conn->close();*/
?>