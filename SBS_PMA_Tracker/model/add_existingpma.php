<?php

//Admin database call that inserts an existing PMA
include('DatabaseClass.php');
$DatabaseClass = new DatabaseClass();

//protection aganist XXS attacks
$nameWashed = $DatabaseClass->wash($_POST['name']);

$daysWashed = $DatabaseClass->wash($_POST['days']);

$date_completedWashed = $DatabaseClass->wash($_POST['date_completed']);

 $existingPMA_added = $DatabaseClass->add_existing($nameWashed, $daysWashed, $date_completedWashed);
 
 if ($existingPMA_added == true)
 {
     
    header("refresh:3; url=../adminchoose.php");
    echo "Existing PMA added, re-directing.... ";

 }
 else
 {
     header("refresh:3; url=../adminchoose.php");
    echo "ERROR IN ADDIING PMA. Contact Administrator. re-directing.... ";
     
 }
//Admin database call that inserts an existing PMA
/*session_start();
include('../controller/checker.php');
include('dbopen.php');

$name = $_POST['name'];
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

$days = $_POST['days'];
$days = htmlspecialchars($days, ENT_QUOTES, 'UTF-8');

$date_completed = $_POST['date_completed'];
$date_completed = htmlspecialchars($date_completed, ENT_QUOTES, 'UTF-8');

// prepare and bind
$stmt = $conn->prepare("insert into pma (name, days, in_prog, start_date, date_completed) values (?,?,0,null,?)");
$stmt->bind_param("sss", $name, $days, $date_completed);

$stmt->execute();

if($stmt)
{
    header("refresh:3; url=../adminchoose.php");
    echo "Existing PMA added, re-directing.... ";
}


$stmt->close();
$conn->close();*/


?>