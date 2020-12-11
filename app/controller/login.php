<?php


// Database connection
include('getUser.php');


    $msg = '';
    if(isset( $_POST['email']) && isset( $_POST['user_pass'])){
    $email = $_POST['email'];
    $user_pass = $_POST['user_pass'];
    if (!empty($email) && !empty($user_pass)) {

        $response = loginUser($email,$user_pass);
        $response = $response["body"][0];
        if($response["email"]){
            session_start();
            $_SESSION['id'] = $response["id"];
            $_SESSION['email'] = $response["email"];
            $_SESSION['name'] = $response["name"];
            $_SESSION['lastname'] = $response["lastname"];
            $_SESSION['admin_role'] = $response["admin_role"];
            $_SESSION['user_last_login'] = $response["user_last_login"];
            $_SESSION['loggedin'] = true;

            header("location: /../view/index/html/dashboard.php");

        }else{
            $msg = "<p class='msg'>
                               Bad credentials or user doesnt exists.
                    </p>";
        }

    } else {
        if (empty($email)) {
            $msg = "<p class='msg'>
                                You need to provide email.
                    </p>";
        }

        if (empty($user_pass)) {
            $msg = "<p class='msg'>
                            You need to provide password.
                        </p>";
        }
    }
    }



