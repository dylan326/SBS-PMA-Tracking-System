<?php
session_start();
include('controller/checker.php');
?>
<html>
    <head><title>Historical Form</title>
        <link rel="stylesheet" type="text/css" href="./view/css/style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="./view/images/sbs.png" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="./controller/remindersJSONcall.js"></script>
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
<h2>Log <?php echo $_GET['pma_name']; ?> PMA in the historical database</h2>
    <form action="model/historical_form_dbcall.php" method="post">
        PMA Name/Address: <br>
        <input type="text" name ="name"><br>
        Date Completed: <br>
        <input type="text" name="date_completed" placeholder="Should be today"><br>
        Building Contact person for this PMA: <br>
        <input type="text" name="contact_client"><br>
        First inspector that worked the job: <br>
        <input type="text" name = "inspector1"><br>
        Second inspector who worked this PMA: <br>
        <input type="text" name="inspector2"><br>
        How long did it take to complete this PMA? <br>
        <input type="text" name="how_long"><br>
        <input type="submit" value="Log PMA">
    </form>
</body>
</html>