<?php


// Database connection
include('getUser.php');


if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $user_pass = $_POST['user_pass'];



    if (!empty($email) && !empty($user_pass)) {

        $response = $this->loginUser($email,$user_pass);

        if($response != false){

        }else{
            return "<div class=''>
                               Bad credentials.
                    </div>";
        }

    } else {
        if (empty($email)) {
            return "<div class=''>
                                You need to provide email.
                    </div>";
        }

        if (empty($user_pass)) {
            return "<div class=''>
                            You need to provide password.
                        </div>";
        }
    }

}
