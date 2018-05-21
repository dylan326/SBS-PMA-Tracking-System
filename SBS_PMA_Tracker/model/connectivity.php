<?php
//file logs in a certified user
   session_start();

    include('DatabaseClass.php');
    //create object
    $DatabaseClass = new DatabaseClass();
    
   
    //prevent XXS attacks
    $usernameWashed = $DatabaseClass->wash($_POST['username']);
    
    $passwordWashed = $DatabaseClass->wash($_POST['password']);
    
      //prevent inspectors from logging in to wrong section. 
     //if inspector tries to login here they're directed to inspector login.  Need to make this dynamic
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
