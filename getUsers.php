<?php
require_once("Users.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin,X-Requested-With, Content-Type,Accept");
header("Access-Control-Allow-Methods: PUT,GET,POST,DELETE");
header("Access-Control-Allow-Credentials: true");
$Request=json_decode(file_get_contents("php://input"));
if($_SERVER["REQUEST_METHOD"]=="GET"){
    $newUser=new User();
    $result=$newUser->getUsers();
    $response=[];
    if($result["status"]){
        $response["users"]=  $result["users"];
        $response["status"]= true;
    }else{
        $response["status"]= false;
    }
    echo json_encode($response); 
    http_response_code(200);
}else{
    http_response_code(404);
}

