<?php

    include('DatabaseClass.php');
    //create object
    $DatabaseClass = new DatabaseClass();
    //prevent XXS Attack
    $usernameWashed = $DatabaseClass->wash($_POST['username']);

    $passwordWashed = $DatabaseClass->wash($_POST['password']);
    //call insert user method and if true re-directs to main admin area
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

?>
