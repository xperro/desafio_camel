<?php
//--Method expiration--

function sessionExpire(){

    $timelimit = 3;

    if(isset($_SESSION['last_action'])){


        $inactive = time() - $_SESSION['last_action'];

        $expiredAfter = $timelimit * 60;

        if($inactive >= $expiredAfter){
            session_destroy();

            header("Location: ../../../controller/logout.php");

        }

    }

    $_SESSION['last_action'] = time();
}