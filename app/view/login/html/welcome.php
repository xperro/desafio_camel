<?php

include_once '../../../controller/login.php';

?>

<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div>
        <p>Login</p>
        <form method="post">
            <input type="email" name="email" placeholder="Email"/>
            <input type="password" name="user_pass" placeholder="Password" />
            <input type="submit" value="Log In" />
        </form>
    </div>
</body>
</html>