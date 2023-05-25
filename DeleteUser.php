<?php

require_once("Users.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin,X-Requested-With, Content-Type,Accept");
header("Access-Control-Allow-Methods: PUT,GET,POST,DELETE");
header("Access-Control-Allow-Credentials: true");
$Resquest=json_decode(file_get_contents("php://input"));
//  switch(strtolower($_SERVER["REQUEST_METHOD"])){
//     case "delete":
//     $ID=$_GET["id"];
//     $user=new User();
//     $response=$user->DeleteUser($ID);
//     echo json_encode($response);   
//     break;
//     default:
//     http_response_code(404);
// }

$ID=$_GET["id"];
$user=new User();
$response=$user->DeleteUser($ID);
// if(strtolower($_SERVER["REQUEST_METHOD"])=="delete"){
// }else{
//  http_response_code(404);
// }
echo json_encode($response);   
  