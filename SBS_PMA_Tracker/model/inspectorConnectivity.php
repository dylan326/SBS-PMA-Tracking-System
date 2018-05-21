<?php
   //file logs in a certified user
    session_start();

    include('DatabaseClass.php');
    //create object
    $DatabaseClass = new DatabaseClass();
    //prevent XXS Attack
    $usernameWashed = $DatabaseClass->wash($_POST['username']);
    $passwordWashed = $DatabaseClass->wash($_POST['password']);
    //call login method.  Anyone in system can login to inspector section but inspectors cannot log in to main system. 
    $isValid = $DatabaseClass->login($usernameWashed, $passwordWashed);
    
    if ($isValid == true )
       {
            
            header("Location: ../inspectorLogForm.php");
        }
        else 
        {
            header("refresh:3; url=../inspectorLogin.php");
            echo "Wrong login ID.  Re-directing to login page....";
        }
    

?>
