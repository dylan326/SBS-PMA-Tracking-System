<?php
//large file that systematically inserts the information needed to start a PMA
//some data is passed hidden so no need for htmlspecialchars
session_start();
include('../controller/checker.php');
include('dbopen.php');

$pma_id = $_POST['pma_id'];

$building_contact_person_first = $_POST['building_contact_person_first'];
$building_contact_person_first = htmlspecialchars($building_contact_person_first, ENT_QUOTES, 'UTF-8');

$building_contact_person_last = $_POST['building_contact_person_last'];
$building_contact_person_last = htmlspecialchars($building_contact_person_last, ENT_QUOTES, 'UTF-8');

$person_type = $_POST['person_type'];


$office_phone = $_POST['office_phone'];
$office_phone = htmlspecialchars($office_phone, ENT_QUOTES, 'UTF-8');

$office_desc = $_POST['office_desc'];

$cell_phone = $_POST['cell_phone'];
$cell_phone = htmlspecialchars($cell_phone, ENT_QUOTES, 'UTF-8');

$cell_desc = $_POST['cell_desc'];

$email = $_POST['email'];
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

$business_email = $_POST['business_email'];

$inspector1 = $_POST['inspector1'];
$inspector2 = $_POST['inspector2'];

//insert person
$sqlperson = "insert into person (person_type_id, first_name, last_name) values (?,?,?)";
$stmtperson = $conn->prepare($sqlperson);
$stmtperson->bind_param("iss", $person_type, $building_contact_person_first, $building_contact_person_last);
$stmtperson->execute();

if(!$stmtperson)
{
   echo "Error: " . $sqlperson . "<br>" . $conn->error;
}

$stmtperson->close();

//process to grab person ID for inserting phone and email   
$sqlgetpersonid = "SELECT * FROM person where first_name = '$building_contact_person_first' and last_name ='$building_contact_person_last'";
$result = $conn->query($sqlgetpersonid);
if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {//set person id to results
    $person_id = $row['person_id'];
    }
} else
{
    echo "person does not exist contact administrator";
}

//next few inserts are for email and phone which utilize person_id
$sqlemail = "insert into email (email_type_id, person_id, email) values (?,?,?)";
$stmtemail = $conn->prepare($sqlemail);
$stmtemail->bind_param("iis", $business_email, $person_id, $email);
$stmtemail->execute();

if(!$stmtemail)
{
    echo "Error: contact Administrator";
}
$stmtemail->close();
                
$sqlofficephone = "insert into phone (phone_type_id, person_id, phone) values (?,?,?)";
$stmtofficephone = $conn->prepare($sqlofficephone);
$stmtofficephone->bind_param("iis", $office_desc, $person_id, $office_phone);
$stmtofficephone->execute();


if(!$stmtofficephone)
{
    echo "Error: contact Administrator";
}
$stmtofficephone->close();
                
$sqlcellphone = "insert into phone (phone_type_id, person_id, phone) values (?,?,?)";
$stmtcellphone = $conn->prepare($sqlcellphone);
$stmtcellphone->bind_param("iis", $cell_desc, $person_id, $cell_phone);
$stmtcellphone->execute();

if(!$stmtcellphone)
{
   echo "Error: contact administrator";
}
$stmtcellphone->close();
                    
$sqlpma_personclient = "insert into pma_person(pma_id, person_id) values (?,?)";
$stmt_personclient = $conn->prepare($sqlpma_personclient);
$stmt_personclient->bind_param("ii", $pma_id, $person_id);
$stmt_personclient->execute();

if(!$stmt_personclient)
{
    echo "error inserting client into pma_person contact administrator";
}
$stmt_personclient->close();

$sqlpma_personinspector1 = "insert into pma_person(pma_id, person_id) values (?,?)";
$stmt_personinspector1 = $conn->prepare($sqlpma_personinspector1);
$stmt_personinspector1->bind_param("ii", $pma_id, $inspector1);
$stmt_personinspector1->execute();

if(!$stmt_personinspector1)
{
    echo "error inserting inspector1 into pma_person contact administrator";
}
$stmt_personinspector1->close();


$sqlpma_personinspector2 = "insert into pma_person(pma_id, person_id) values (?,?)";
$stmt_personinspector2 = $conn->prepare($sqlpma_personinspector2);
$stmt_personinspector2->bind_param("ii", $pma_id, $inspector2);
$stmt_personinspector2->execute();

if(!$stmt_personinspector2)
{
 
    echo "error inserting inspector2 into pma_person contact administrator";
}
$stmt_personinspector2->close();

//After all the inserts are complete update statment takes this pma out of the in progress section and re-directs
$sqlupdate = "UPDATE pma SET in_prog= 1, start_date=curdate() WHERE pma_id=$pma_id";

if ($conn->query($sqlupdate) === TRUE) 
{
    header("refresh:3; url=../inprog_pma.php");
    echo "Client added to in progress PMA. Re-directing.... ";
}
else
{
    echo "Error in update,  contact Administrator";
}

$conn->close();

?>