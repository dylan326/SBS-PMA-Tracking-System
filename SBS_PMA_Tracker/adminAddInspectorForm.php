<?php
session_start();
include('controller/checker.php');
?>
<html>
    <head><tilte>Add Inspector</tilte>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="./view/images/sbs.png" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="adminchoose.php">Back to Admin</a></li>
                <li><a href="ready_pma.php" style = "color: #00FFFF;"><span class="glyphicon glyphicon-log-in" style ="color: #00FFFF;"></span>Admin Logout</a></li>
            </ul>
        </div>
    </nav>
<center> <h2>Add New Inspector</h2>
    <form action="model/adminAdd_inspector.php" method="post">
        First Name: <br />
        <input type="text" name="first_name"><br />
        Last Name: <br>
        <input type="text" name="last_name"><br>
        
        <input type="submit">
    </form>
</center>
</body>
</html>