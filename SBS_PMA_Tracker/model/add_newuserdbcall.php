<?php

include('DatabaseClass.php');

    $DatabaseClass = new DatabaseClass();
    
    $usernameWashed = $DatabaseClass->wash($_POST['username']);

    //$emailWashed = $DatabaseClass->wash($_POST['email']);

    $passwordWashed = $DatabaseClass->wash($_POST['password']);
    
    $userAdded = $DatabaseClass->insertuser($usernameWashed, $passwordWashed);
   
    if($userAdded == true)
    {
        header("refresh:3; url=../adminchoose.php");
        echo "New account created, re-directing.  Please hold...";
            
    }
    else 
    {
        header("refresh:3; url=../adduser.php");
        echo "Error:  Username is taken, please pick another username.  Re-directing to add user page, please hold...";
            
    }
/*session_start();
include('../controller/checker.php');
//file adds a new user to the database    
include('dbopen.php');
$username=$_POST ["username"];
$username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

$password =$_POST ["password"];
$password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

//hash passwords in the database for security    
$hashed = password_hash($password, PASSWORD_DEFAULT);

//verify fields are not empty
if (empty($password) or empty($username))
{
    header("refresh:3 url=../adduser.php");
    echo "Must enter all fields.  Re-directing to adduser page, please hold...";
}
else 
{
    $sql = "INSERT INTO login (username, password) VALUES (?, ?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashed);
    $stmt->execute();

    if ($stmt) 
        {
            header("refresh:3; url=../adminchoose.php");
            echo "New account created, re-directing.  Please hold...";
            
        }
        else 
        {
            header("refresh:11 url=../adduser.php");
            echo "Error:  Username is taken, please pick another username.  Re-directing to add user page, please hold...";
            
        }
        
    }
$stmt->close();
$conn->close();*/
?>