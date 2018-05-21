<?php
//file to add a new PMA to the system
include('DatabaseClass.php');
//create object
$DatabaseClass = new DatabaseClass();
//prevent XXS Attack
$nameWashed = $DatabaseClass->wash($_POST['name']);

$daysWashed = $DatabaseClass->wash($_POST['days']);
//call add new pma method from database class
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

?>
