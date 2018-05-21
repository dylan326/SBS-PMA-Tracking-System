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



?>
