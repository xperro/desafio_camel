<?php

 function loginUser($email,$user_pass){


     $data = json_decode( file_get_contents('https://localhost:8000/services/login.php'), true );

}

?>