<?php
session_start();
include('controller/checker.php');
?>
   
   <html>
  <head><title>Log Day</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./view/images/sbs.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <style>
        #inspectorLogout
        {
            border-style: solid;
            border-color: black;
            border-width: thin;
            background-color: blue;
            color: white;
            padding: 3px;
            
        }
       #inspectorForm
       {
            border-style: solid;
            border-color: black;
            border-width: thin;
            background-color: lightgrey;
            
            padding: 3px;
           
       }
    </style>
  </head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="inspectorLogin.php" style = "color: #00FFFF;"><span class="glyphicon glyphicon-log-in" style ="color: #00FFFF;"></span> Logout</a></li>
        
      </ul>
   </div>
  </nav>
  <center>
    <h3>Log your work</h3><br>
    <img src ="./view/images/sbs.png" style="height: 50px; width: 50px;" >
</center>
        <hr>
        
       <center><form id="inspectorForm" action="model/inspectorLogProcess.php" method="post" accept-charset="ISO-8859-1">
            Inspector:
            <select name="inspector">
                        <?php
          include ('model/dbopen.php');

          $sql = "select * from person where person_type_id = 4 and isActive = 1";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
             // output data of each row
           while($row = $result->fetch_assoc()) {
              echo "<option value='".$row['person_id']."'>".$row['first_name']." ".$row['last_name']."</option>";
               
               }
          }
              ?>
       <!--<option value=69>Ramon Leon</option>
      <option value=70>Danny Agnello</option>
      <option value=71>Jasmine Green</option>
      <option value=72>Alberto Romero</option>-->
   
    </select><br><br>
    Building: <br>
    <input type="text" name="building" required><br><br>
   <!-- Description of Work:
    <input type="text" name="description" required><br><br>-->
    Descriptiton of Work: <br>
    <textarea class="text" cols="30" rows ="10" name="description" required></textarea><br><br>
    Floors Serviced: <br>
    <input type="text" name="floors" required><br><br>
    Discrepancies/Issues: <br>
    <textarea class="text" cols="30" rows ="10" name="issues" required></textarea><br><br>
    Days Left: <br>
    <input type="text" name="days" required><br><br>
    <input type="submit" value="log Day">
    
        </form></center>
    </body>
</html>