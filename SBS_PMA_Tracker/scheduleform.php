<?php
session_start();
include('controller/checker.php');
?>
<html>
  <head>
    <title>Add Schedule</title>
      <link rel="stylesheet" type="text/css" href="./view/css/style.css">
      <meta charset="utf-8">
      <script src="./controller/historicalJSONcall.js"></script>
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
<?php
include('model/DatabaseClass.php');
include('model/dbopen.php');
//create object
$DatabaseClass = new DatabaseClass();
//button to see the schedule
echo "<a href='scheduleRead.php' id='see_schedule'>See Schedule</a><hr>";
//stays 24 hrs helps manager see who he's already scheduled this day
echo "<strong><u>Recent entries</u></strong><br>";

$sql = "select * from schedule where entry_time > NOW() - INTERVAL 1 DAY";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        $name = $DatabaseClass->getName($row['person_id']);
        echo "<b>Job Number: </b>".$row["job_number"]. " <b>Job Name: </b>" . $row["job_name"]." <b>Job Date: </b>".$row["date_char"]." <b>Inspector: </b>". $name. "<br>";
    }
}
else 
  {
    echo "No Entries yet<br>";
  }

?>
<hr>

        <form id="scheduleForm" action="model/scheduleInsert.php" method="post">
           
            Job Number: 
            <input type="text" name="job_number">
            Job Name: 
            <input type="text" name="job_name">
            Date: 
            <input type="text" name="date">
            Inspector:
            <select name="inspector">
          <?php
          include ('model/dbopen.php');
           //puts all active inspectors into the inspector select form
          $sql = "select * from person where person_type_id = 4 and isActive = 1";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
             // output data of each row
           while($row = $result->fetch_assoc()) {
              echo "<option value='".$row['person_id']."'>".$row['first_name']." ".$row['last_name']."</option>";
               
               }
            }
          ?>
    
    </select>
    
    <input type="submit">

    </body>
</html>
