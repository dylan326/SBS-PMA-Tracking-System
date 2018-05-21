<?php
session_start();
include('../controller/checker.php');
//file to delete a PMA from the system.  Called from the controller folder in a confirm function
//no user input therefor no need for prepared statements
$pma_id = $_GET['pma_id'];
include('dbopen.php');

$sqljoin = "delete from pma_person where pma_id=$pma_id";

if($conn->query($sqljoin) === True)
{

    $sql = "DELETE FROM pma WHERE pma_id=$pma_id";

    if ($conn->query($sql) === TRUE) 
    {
        header('Location: ../all_pma.php');
    }
    else
    {
        echo "Error deleting record: contact Dylan";
    }
}
else
{
    echo "Error contact Administrator";
}

$conn->close();
?>
