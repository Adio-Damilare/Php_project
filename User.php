<?php
require_once("Users.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: PUT,GET,POST,DELETE");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin,X-Requested-With, Content-Type,Accept");
$Resquest=json_decode(file_get_contents("php://input"));

$fullname =$Resquest->fullname;
// $fullname =$Resquest[0];
$email=$Resquest->email;
// $email=$Resquest[1];
$password =password_hash($Resquest->password,PASSWORD_DEFAULT);
// $password =password_hash($Resquest["password"],PASSWORD_DEFAULT);
$contact=$Resquest->contact;
$gender=$Resquest->gender;
$user=new User();
$check=$user->getUserByEmail($email);
$response=[];
if($check["status"]){
    $response["message"]="Email address Already Exists";
    $response["status"]=false;
}else{
    $result=$user->createUser($fullname,$email,$password,$contact,$gender);
    if($result=="successfully"){
        $response["message"]="Successfully created";
        $response["status"]=true;
    }else{
        $response["message"]="Falied to createUser";
        $response["status"]=false;
    }
}
echo json_encode($response)

?>