<?php
//file to convert db call to JSON.  Large query that joins multiple tables
session_start();
include('../controller/checker.php');
include('dbopen.php');
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);
$result = $conn->query(" select pma.name, pma.pma_id, person.first_name, person.last_name, person_type.person_type_desc,
phone.phone, phone_type.phone_type_desc, email.email, email_type.email_type_desc from pma
inner join pma_person on pma_person.pma_id = pma.pma_id 
inner join person on pma_person.person_id = person.person_id
inner join person_type on person_type.person_type_id = person. person_type_id 
inner join phone on phone.person_id = person.person_id 
inner join phone_type on phone_type.phone_type_id = phone.phone_type_id
inner join email on email.person_id = person.person_id 
inner join email_type on email_type.email_type_id = email.email_type_id ");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);


?>

