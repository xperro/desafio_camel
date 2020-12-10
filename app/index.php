<?php

session_start();

// -- USER LOGGED IN ? --
if(isset($_SESSION['loggedin']))
{
    header("location: view/index/html/dashboard.php");

}else{

    header("location: view/login/html/welcome.php");

}