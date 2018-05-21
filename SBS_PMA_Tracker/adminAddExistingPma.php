<?php
session_start();
include('controller/checker.php');
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Existing PMA</title>
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
<center> <h2>Add Existing PMA</h2>
    <form action="model/add_existingpma.php" method="post">
        PMA Name/Address: <br />
        <input type="text" name="name"><br />
        Estimated Days to complete: <br>
        <input type="text" name="days"><br>
        Date last PMA was completed: <br />
        <input type="text" name ="date_completed" placeholder="Must be like: yyyy-dd-mm"><br>
        <input type="submit">
    </form>
</center>
</body>
</html>