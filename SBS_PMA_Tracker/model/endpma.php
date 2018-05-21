<?php
//db call to change the status of PMA so it appears current,  then directed to historical form for logging
//no user input so no prepared statements
session_start();
include('../controller/checker.php');
$pma_id = $_GET['pma_id'];
include('dbopen.php');

$sqlgetname = "SELECT * FROM pma where pma_id = $pma_id";
$result = $conn->query($sqlgetname);
if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {//set person id to results
        $pma_name = $row['name'];
    }
} 
else
{
    echo "PMA does not exist.  ERROR contact administrator";
}

//sets in_prog boolean varible to zero and updates date to current date. Thust taking the 
//pma out of in_prog and back to current.
$sql = "UPDATE pma SET in_prog= 0, start_date=null, date_completed=curdate() WHERE pma_id=$pma_id";

if ($conn->query($sql) === TRUE) 
{
    header("refresh:3; url=../historical_form.php?pma_name=$pma_name");
    echo "Client PMA ended. Re-directing to historical form.... ";
} 
else
{
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>
