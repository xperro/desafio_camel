<?php


// Database connection
include('getUser.php');

global $wrongPwdErr, $accountNotExistErr, $emailPwdErr, $verificationRequiredErr, $email_empty_err, $pass_empty_err;

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $user_pass = $_POST['user_pass'];



    if (!empty($email) && !empty($user_pass)) {

        $response = $this->loginUser($email,$user_pass);
        

    } else {
        if (empty($email)) {
            $email_empty_err = "<div class=''>
                                You need to provide email.
                    </div>";
        }

        if (empty($user_pass)) {
            $pass_empty_err = "<div class=''>
                            You need to provide password.
                        </div>";
        }
    }

}

