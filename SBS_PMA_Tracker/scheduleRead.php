<?php
session_start();
include('controller/checker.php');
?>
<html>
    <head>
        <title>Schedule</title>
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
<?php
include('model/DatabaseClass.php');
include('model/dbopen.php');

$DatabaseClass = new DatabaseClass();

echo "<center><h2><strong>Schedule From Last Two Weeks</u></strong></h2></center><br><br>";

$sql = "select * from schedule where entry_time > NOW() - INTERVAL 7 DAY order by schedule_id asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table style='width: 100%;'><tr>
    <th>Job Number</th>
    <th>Job Name</th> 
    <th>Job Date</th>
    <th>Inspector</th>
  </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name = $DatabaseClass->getName($row['person_id']);
      
       echo "<tr>
    <td style='padding: 5px;'>".$row["job_number"]."&nbsp&nbsp</td>
    <td>".$row["job_name"]."&nbsp&nbsp</td> 
    <td>".$row["date_char"]."&nbsp&nbsp</td>
    <td>".$name."&nbsp</td>
  </tr>";
    }
}
else 
  {
    echo "No Entries yet<br>";
}
echo "</table>";
?>

</body>
</html>