<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../config/db-connection.php';
include_once '../class/user.php';

//--CONNECTIONS--
$database = new Database();
$db = $database->do_Connection();

$data = json_decode(file_get_contents("php://input"));

//--PARSING DATA AND CREATE USER OBJECT--
$user = new User($db);
$user->email_authorization = $data->email_authorization;
$user->pass_authorization = $data->pass_authorization;
$user->email = $data->email;
$user->name = $data->name;
$user->lastname = $data->lastname;
$user->admin_role = $data->admin_role;
$user->user_pass =$data->user_pass;
$user->id = $data->id;
$response = $user->updateUser();

//--RESPONSE--
$userArr = array();
$userArr["body"] = array();

switch ($response) {
    case -1:
        $e = array("message" => "Dont have permission.");
        array_push($userArr["body"], $e);
        echo json_encode($userArr);
        break;
    case 0:
        $e = array("message" => "Error, not updated.");
        array_push($userArr["body"], $e);
        echo json_encode($userArr);
        break;
    case 1:
        $e = array("message" => "Updated.");
        array_push($userArr["body"], $e);
        http_response_code(200);
        echo json_encode($userArr);
        break;
}


