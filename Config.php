<?php
// require realpath("vendor/autoload.php");
// $dotenv=Dotenv\dotenv::createImmutable(__DIR__)->load();
class Config{
    public $host ="localhost";
    protected $username="root";
    protected $password="";
    protected $dbName="testing";
    public $connectToDb;
    public $response;

    public  function __construct(){
        $this->connectToDb=new mysqli($this->host,$this->username,$this->password,$this->dbName);
        if(  $this->connectToDb->connect_error){
            die("Error occurred".$this->connectToDb->connect_error );
        }
    }

    public function  create($query,$binder){
        $stmt=$this->connectToDb->prepare($query);
        $stmt->bind_param(...$binder);
        $check=$stmt->execute();
        if($check){
            $this->response="successfully";

        }else{
            $this->response="failed"; 
        }
        return $this->response;
    }

    public function  read($query,$binder){
        $stmt=$this->connectToDb->prepare($query);
        if($binder){
            $stmt->bind_param(...$binder);
        }
        $check=$stmt->execute();
        if($check){
            if($binder){
              $check=mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
                if($check){
                    $this->response["users"]=$check;
                }
                else{
                    $this->response["status"]=false;
                    $this->response["user"]="User Not Found";
                    return $this->response;
                }
            }else{
                $this->response["users"]=mysqli_fetch_all(mysqli_stmt_get_result($stmt));
            }
            $this->response["status"]=true;

        }else{
            $this->response["status"]=false;

        }

        return $this->response;

    }
    public function  update($query,$binder){
        $stmt=$this->connectToDb->prepare($query);
        $stmt->bind_param(...$binder); 
        $check=$stmt->execute();
        if($check){
            $this->response['status']=true;

        }else{
            $this->response['status']=false;
        }
        return $this->response;

    }
    
    public function  delete($query,$binder){
        $stmt=$this->connectToDb->prepare($query);
        $stmt->bind_param(...$binder);
        $check=$stmt->execute();
        if($check){
            $this->response["status"]=true;
        }else{
            $this->response["status"]=false;
        }
        return $this->response;

    }
    

}