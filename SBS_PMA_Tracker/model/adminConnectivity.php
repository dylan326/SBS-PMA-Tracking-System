<?php
//file for connectivity of admin login;

    include('DatabaseClass.php');
    //create object
    $DatabaseClass = new DatabaseClass();
    //the only username that will work, omitted for protection of system
    $username = "*****";
    //prevent xxs attacks
    $passwordWashed = $DatabaseClass->wash($_POST['password']);
    //login to admin area
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

?>
