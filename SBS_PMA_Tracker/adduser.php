<?php
session_start();
include('controller/checker.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add User</title>
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
<br /><br />
<br /><br /><br />
<center>
  <fieldset style="width:30%">
    <form action="model/add_newuserdbcall.php" method="post">Add user<br><br />
        Pick Username:<br> 
        <input type="text" name="username"><br>
        Pick Password:<br>
        <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Add user">
    </form>
  </fieldset>
</center>
</body>
</html>