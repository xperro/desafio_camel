<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/db-connection.php';
include_once '../class/user.php';

$database = new Database();
$db = $database->do_Connection();

$user = new User($db);
$user->email_authorization = $_POST["email_authorization"];
$user->pass_authorization = $_POST["pass_authorization"];
$user->email = $_POST["email"];
$user->name = $_POST["name"];
$user->lastname = $_POST["lastname"];
$user->admin_role = $_POST["admin_role"];
$user->user_pass = $_POST["user_pass"];
$user->user_ip = $_SERVER['REMOTE_ADDR'];
$user->user_last_login = date('Y-m-d H:i:s');
$response = $user->newUser();

switch ($response) {
    case -1:
        $userArr = array();
        $userArr["body"] = array();
        $e = array("message" => "Dont have permission.");
        array_push($userArr["body"], $e);
        echo json_encode($userArr);
        break;
    case 0:
        $userArr = array();
        $userArr["body"] = array();
        $e = array("message" => "Error, not created.");
        array_push($userArr["body"], $e);
        echo json_encode($userArr);
        break;
    case 1:
        $userArr = array();
        $userArr["body"] = array();
        $e = array("message" => "Created.");
        array_push($userArr["body"], $e);
        http_response_code(201);
        echo json_encode($userArr);
        break;
}
