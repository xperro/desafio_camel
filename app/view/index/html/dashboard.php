<?php

include_once '../../../controller/dashboard.php';
session_start();

sessionExpire();
// -- USER LOGGED IN ? --
if(!isset($_SESSION['loggedin']))
{

    header("location: ../../login/html/welcome.php");

}

?>
<html>
    <head>
        <meta http-equiv="refresh" content="180;url=../../login/html/welcome.php"/>

        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <h1>Home</h1>
        <div class="Card1">
            <div class="photo"></div>

            <div class="description">
                <div class="line">
                    <h1 class="product_name"><?php echo $_SESSION['name']." ".$_SESSION['lastname']; ?></h1>
                    <h1 class="product_price"># <?php echo $_SESSION['id']; ?></h1>
                </div>
                <?php
                    if($_SESSION['admin_role'] == 1){
                        echo '<h2>Admin User</h2>';
                    }else{
                        echo '<h2>Normal User</h2>';
                    }
                ?>
                <p class="summary">
                <h2>User Email</h2><h3><?php echo $_SESSION['email']; ?></h3><br>
                <h2>Last connection</h2><h3><?php echo $_SESSION['user_last_login']; ?></h3><br>
                </p>
                <a href="../../../controller/logout.php">Logout</a>
            </div>
        </div>
    </body>
</html>
