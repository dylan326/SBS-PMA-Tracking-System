<?php
include('DatabaseClass.php');
//create object
$DatabaseClass = new DatabaseClass();
//grap pma_id which was passed in hidden from
$pma_id = $_POST['pma_id'];
//prevent XXS Attacks
$new_daysWashed = $DatabaseClass->wash($_POST['new_days']);
//call edit days method
$isUpdate = $DatabaseClass->edit_days($pma_id, $new_daysWashed);

if ($isUpdate == true)
{
     header("Location: ../admineditdays.php");
}
else
{
    echo "Error: contact administrator";
}


?>
