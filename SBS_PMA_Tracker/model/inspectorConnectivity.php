<?php
//file logs in a certified user
session_start();

 include('DatabaseClass.php');
    
    $DatabaseClass = new DatabaseClass();
    
   
    
    $usernameWashed = $DatabaseClass->wash($_POST['username']);
    
    $passwordWashed = $DatabaseClass->wash($_POST['password']);
    
   
    
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