<?php
session_start();
include('controller/checker.php');
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Choose</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="./view/images/sbs.png" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="ready_pma.php" style = "color: #00FFFF;"><span class="glyphicon glyphicon-log-in" style ="color: #00FFFF;"></span>Admin Logout</a></li>
            </ul>
        </div>
    </nav>
<center> 
    <form action="adminAddExistingPma.php">
        <input type="submit" value ="Add Existing PMA">
    </form>
<br><hr>
    <form action="adduser.php">
        <input type="submit" value ="Add New User">
    </form><br> <hr>
    <form action="admineditdays.php">
        <input type="submit" value ="Update days taken">
    </form><hr>
    <form action="adminAddInspectorForm.php">
        <input type="submit" value ="Add New Inspector">
    </form><hr>
    <form action="adminRemoveInspector.php">
        <input type="submit" value ="Remove Inspector">
    </form>
</center>
</body>
</html>