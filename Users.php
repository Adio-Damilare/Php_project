<?php
require_once("Config.php");
class User extends Config{
    public function __construct(){
        parent::__construct();
    }
    public function createUser($fullname,$email,$password,$contact,$gender){
        $query ="INSERT INTO `users_tb`(`fullname`,`email`,`password`,`contact`,`gender`) VALUES(?,?,?,?,?)";
        $stmt= $this->connectToDb->prepare($query);
        $binder=array("sssss",$fullname,$email,$password,$contact,$gender);
        $result=$this->create($query,$binder);
        return $result;
    }

    public function getUsers(){
        $query="SELECT * FROM `users_tb`";
        $binder=null;
        $result=$this->read($query,$binder);
        return $result;

    }
    public function getUserById($id){
        $query="SELECT * FROM `users_tb` WHERE user_id=?";
        $binder=["i",$id];
        $result=$this->read($query,$binder);
        return $result;
    }
    public function getUserByEmail($email){
        $query="SELECT * FROM `users_tb` WHERE email=?";
        $binder=["s",$email];
        $result=$this->read($query,$binder);
        return $result;
    }
    public function updateUser($value){
        $query = "UPDATE `users_tb` SET fullname=?,email=?,contact=?,gender=? WHERE user_id=?";
        $binder=Array("ssisi", ...$value);
        $result=$this->update($query,$binder);
        return $result;
    }

    public function DeleteUser($value){
        $query="DELETE FROM `users_tb` WHERE user_id = ?";
        $binder=["i",$value];
        $result=$this->delete($query,$binder);
        return $result;
    }
}