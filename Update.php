<?php
require_once("Users.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin,X-Requested-With, Content-Type,Accept");
header("Access-Control-Allow-Methods: PUT,GET,POST,DELETE");
header("Access-Control-Allow-Credentials: true");
$Resquest=json_decode(file_get_contents("php://input"));
$fullname =trim($Resquest->fullname);
$email=$Resquest->email;
$contact=$Resquest->contact;
$gender=$Resquest->gender;
$Id=$Resquest->id;
$user=new User();
$result=$user->updateUser([$fullname,$email,$contact,$gender,$Id]);
echo json_encode($result);
// md5()
  ?>
