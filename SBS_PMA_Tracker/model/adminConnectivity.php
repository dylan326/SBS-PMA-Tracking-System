<?php
//file for connectivity of admin login;

include('DatabaseClass.php');
    
    $DatabaseClass = new DatabaseClass();
    
   
    
    $username = "sbsadmin";
    
    $passwordWashed = $DatabaseClass->wash($_POST['password']);
    
   
    
   $isValid = $DatabaseClass->login($username, $passwordWashed);
    
    if ($isValid == true)
       {
            
             header("Location: ../adminchoose.php");
        }
    else 
        {
            header("refresh:3; url=../admin.html");
            echo "Wrong login ID.  Re-directing to admin login page....";
        }
/*//file for connectivity of admin login
session_start();
include('../controller/checker.php');
include('dbopen.php');
$ID = 'dylan326';

$password = $_POST ['password'];
$password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
    
    
$sql = "SELECT username, password FROM login where username = ?";
//calling the prepared statement
if($pre = $conn->prepare($sql)) 
{
    $pre->bind_param('s', $id);
    $id = $ID;
      
    $pre->execute();
    $result = $pre->get_result();
    $data = $result->fetch_assoc();
    //hashing passwords
    $hashedpass = $data['password'];
        
    if(password_verify($password, $hashedpass))
    {
        //starting session so checker.php can work
        $_SESSION['username'] = $data['username'];
            
        header("Location: ../adminchoose.php");
        echo "USER ADDED.  Re-directing....";
    }
    else 
    {
        header("refresh:5; url=../adminchoose.php");
        echo "Wrong login ID.  Re-directing.....";
    }
}
else 
{   
    header("refresh:5; url=../admin.html");
    echo "something went wrong contact administratro";
}
if(isset($_POST['submit']))

$pre->close();
$conn->close();*/
?>