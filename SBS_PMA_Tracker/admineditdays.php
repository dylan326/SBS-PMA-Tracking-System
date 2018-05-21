<?php
session_start();
include('controller/checker.php');
?>

<html>
    <head>
        <title>Edit Days Taken</title>
        <link rel="stylesheet" type="text/css" href="./view/css/style.css">
        <meta charset="utf-8">
        <script src="./controller/admineditdaysJSONcall.js"></script>
        <link rel="shortcut icon" href="./view/images/sbs.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
           
              
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="adminchoose.php">Back to Admin</a></li>
                  <li><a href="admin.html" style = "color: #00FFFF;"><span class="glyphicon glyphicon-log-in" style ="color: #00FFFF;"></span> Admin Logout</a></li>
                  
              </ul>
        </div>
    </nav>
<center>
    <h3>Pick a PMA for editing the estimated days taken</h3>
</center>
<p id="putpma"></p>
</body>
</html>