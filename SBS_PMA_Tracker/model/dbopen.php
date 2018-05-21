<?php
//file to include wherever I need a database connection
//hide connection credentials in config file
session_start();
include('../controller/checker.php');
$config = parse_ini_file('/home/u864991580/config.ini');
$conn = mysqli_connect('mysql.hostinger.com',$config['username'],$config['password'],$config['dbname']);
if ($conn == false)
{
    die("Connection failed: contact Administrator");
}
    
?>