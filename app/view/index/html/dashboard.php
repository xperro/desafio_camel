<?php

// -- USER LOGGED IN ? --
if(isset($_SESSION['loggedin']))
{


}else{

    header("location: ../../login/html/welcome.php");


}