<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/db-connection.php';
include_once '../class/user.php';

$database = new Database();
$db = $database->do_Connection();

$user = new User($db);
$data = json_decode(file_get_contents("php://input"));
$action = $user->loginUser($data->email,$data->user_pass);

if($action != false){

    $userArr = array();
    $userArr["body"] = array();

        extract($action);
        $e = array(
            "id" => $id,
            "email" => $email,
            "name" => $name,
            "lastname" => $lastname,
            "admin_role" => $admin_role,
            "user_last_login" => $user_last_login,
        );
        $now = date("Y-m-d H:i:s");
        array_push($userArr["body"], $e);
        $user->user_last_login = $now;
        $user->id = $id;
        $response_update = $user->updateDateLogin();
        http_response_code(200);
        echo json_encode($userArr);

}else{
    $userArr = array();
    $userArr["body"] = array();
    http_response_code(404);
    $e = array("message" => "No record found.");
    array_push($userArr["body"], $e);
    echo json_encode($userArr);

}

