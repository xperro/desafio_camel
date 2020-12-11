<?php
//--Logout--

    session_start();

    session_destroy();

    header("Location: /../view/login/html/welcome.php");

