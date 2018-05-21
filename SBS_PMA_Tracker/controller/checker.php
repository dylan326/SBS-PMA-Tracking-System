<?php
//file check if user is in session and if not page will re-direct to index for protection
if($_SESSION['username'] == "")
{
    
    header('Location: ../index.html');
}

?>