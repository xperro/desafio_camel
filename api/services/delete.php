<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/db-connection.php';
include_once '../class/user.php';

$database = new Database();
$db = $database->do_Connection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

$user->id = $data->id;
$user->email_authorization = $data->email_authorization;
$user->pass_authorization = $data->pass_authorization;
$response = $user->deleteUser();


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
        $e = array("message" => "Error, not deleted.");
        array_push($userArr["body"], $e);
        echo json_encode($userArr);
        break;
    case 1:
        $e = array("message" => "Deleted.");
        array_push($userArr["body"], $e);
        http_response_code(200);
        echo json_encode($userArr);
        break;
}