<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/db-connection.php';
include_once '../class/user.php';

//--Database connection--
$database = new Database();
$db = $database->do_Connection();

$items = new User($db);

$action = $items->getUsers();
$itemCount = $action->rowCount();
//--Results--

if($itemCount > 0){

    $userArr = array();
    $userArr["body"] = array();

    while ($row = $action->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $e = array(
            "id" => $id,
            "email" => $email,
            "name" => $name,
            "lastname" => $lastname,
            "user_last_login" => $user_last_login,
        );

        array_push($userArr["body"], $e);
    }
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


