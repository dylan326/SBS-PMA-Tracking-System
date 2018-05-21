<html>
    <head> 
        <title>Inspector Sign-In</title> 
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script type = "text/javascript"
                src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <link rel="shortcut icon" href="./view/images/faviconsbs.ico" type="image/x-icon">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="./view/logout.js"></script>
    </head>
<body>
<center>
    <h1>Inspector Login</h1><br>
    <img src ="./view/images/sbs.png" >
</center>
<br /><br />
<center> 
    <fieldset style="width:35%; border-radius: 5px;">
        <form method="POST" action="model/inspectorConnectivity.php"><br><br /> Username <br>
            <input type="text" name="username" size="30"><br>
            Password <br><input type="password" name="password" size="30"><br><br />
            <input id="button" type="submit" name="submit" value="Login">
        </form><br />
    </fieldset> 
</center>
</body>
</html>