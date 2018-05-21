<?php
session_start();
include('controller/checker.php');
?>
<html>
    <head>
        <title>Ready PMA's</title>
        <link rel="stylesheet" type="text/css" href="./view/css/style.css">
        <meta charset="utf-8">
        <script src="./controller/ready_pmaJSONcall.js"></script>
        <link rel="shortcut icon" href="./view/images/sbs.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="current_pma.php">Current</a></li>
                <li><a href="ready_pma.php">Ready</a></li>
                <li><a href="inprog_pma.php">In Progress</a></li>
                <li><a href="add_pma.php">Add New PMA</a></li>
                <li><a href="reminders.php">Reminders</a></li>
                <li><a href="historical_read.php">Historical</a></li>
                <li><a href="scheduleform.php">Schedule</a></li>
                <li><a href="inspectorLogRead.php">Inspector Logs</a></li>
                <li><a href="all_pma.php" style="color: red;">Delete PMA</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="index.html" style = "color: #00FFFF;"><span class="glyphicon glyphicon-log-in" style ="color: #00FFFF;"></span> Logout</a></li>
                  <li><a href="admin.html">Admin</a></li>
              </ul>
        </div>
    </nav>
<center>
    <h3>PMA's redy to be scheduled (Dark red means over 1 year since last PMA!)</h3>
</center>
<p id="putpma"></p>
</body>
</html>