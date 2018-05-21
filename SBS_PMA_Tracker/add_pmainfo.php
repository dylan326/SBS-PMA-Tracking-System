<?php
session_start();
include('controller/checker.php');
include('model/grabname.php');
?>
<html>
  <head>
     <title>Add Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./view/images/sbs.png" type="image/x-icon">
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
<h2>Add info for <?php echo $pma_name; ?> PMA</h2>
  <form action="model/startpma.php" method="post">
    <input type="hidden" name="pma_id" value="<?php echo $_GET['pma_id']; ?>">
    First name of Building Contact person: 
    <input type="text" name="building_contact_person_first"><br>
    Last name of Building Contact person: 
    <input type="text" name="building_contact_person_last"><br>
    <input type="hidden" name="person_type" value=3>
    Phone number of Building contact(Office): 
    <input type="text" name="office_phone"><br>
    <input type="hidden" name="office_desc" value=3>
    Phone number of Building contact(Cell): 
    <input type="text" name="cell_phone"><br>
    <input type="hidden" name="cell_desc" value=4>
    Email of Building Contact: 
    <input type="text" name="email"><br>
    <input type="hidden" name="business_email" value=5>
    Choose the first inspector on this project: 
    <select name="inspector1"><br>
      <option value=69>Ramon Leon</option>
      <option value=70>Danny Angello</option>
      <option value=71>Jasmine Green</option>
      <option value=72>Alberto Romero</option>
    </select><br>
    Coose the second inspector on this project:
    <select name="inspector2"><br>
      <option value=69>Ramon Leon</option>
      <option value=70>Danny Angello</option>
      <option value=71>Jasmine Green</option>
      <option value=72>Alberto Romero</option>
    </select><br>
    <input type="submit" value="Add PMA">
</body>
</html>