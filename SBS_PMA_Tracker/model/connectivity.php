<?php
//file logs in a certified user
session_start();

 include('DatabaseClass.php');
    
    $DatabaseClass = new DatabaseClass();
    
   
    
    $usernameWashed = $DatabaseClass->wash($_POST['username']);
    
    $passwordWashed = $DatabaseClass->wash($_POST['password']);
    
     if($_POST['username'] == 'ramon' or $_POST['username'] == 'jasmine' or $_POST['username'] == 'danny')
    {
     header("refresh:3; url=../inspectorLogin.php");
            echo "Wrong login form.  Re-directing to Inspector login page....";
    }
    else
    {
   
    
   $isValid = $DatabaseClass->login($usernameWashed, $passwordWashed);
   
   if($isValid == true )
   {
       header("Location: ../ready_pma.php");
      
   }
    

        else 
        {
            header("refresh:3; url=../index.html");
            echo "Wrong login ID.  Re-directing to login page....";
        }
    } 

?>