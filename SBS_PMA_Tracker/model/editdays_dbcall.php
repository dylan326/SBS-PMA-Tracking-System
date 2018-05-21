<?php
include('DatabaseClass.php');

$DatabaseClass = new DatabaseClass();

$pma_id = $_POST['pma_id'];

$new_daysWashed = $DatabaseClass->wash($_POST['new_days']);

$isUpdate = $DatabaseClass->edit_days($pma_id, $new_daysWashed);

if ($isUpdate == true)
{
     header("Location: ../admineditdays.php");
}
else
{
    echo "Error: contact administrator";
}
/*include('dbopen.php');

$pma_id = $_POST['pma_id'];

$new_days = $_POST['new_days'];
$new_days = htmlspecialchars($new_days, ENT_QUOTES, 'UTF-8');


$sql = "update pma set days = ? where pma_id = $pma_id";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $new_days);
$stmt->execute();

if(!$stmt)
{
   echo "Error: contact administrator";
}
else
{
    header("Location: ../admineditdays.php");
}*/

?>