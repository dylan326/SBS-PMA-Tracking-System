<?php

include ('dbopen.php');

$job_number = $_POST['job_number'];
$job_number = htmlspecialchars($job_number, ENT_QUOTES, 'UTF-8');

$job_name = $_POST['job_name'];
$job_name = htmlspecialchars($job_name, ENT_QUOTES, 'UTF-8');

$date = $_POST['date'];
$date = htmlspecialchars($date, ENT_QUOTES, 'UTF-8');

$inspector = $_POST['inspector'];




$sql = "insert into schedule (person_id, job_number, job_name, date_char) values (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $inspector, $job_number, $job_name, $date);
$stmt->execute();

if($stmt == true)
{
   header("Location: ../scheduleform.php?inspector=".$inspector);
}
else
{
   echo "Error: contact Administrator";
}
$stmt->close();
$conn->close();

?>