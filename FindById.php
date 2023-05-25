<?php
require("Users.php");
$id=5;
$findUserById=new User();
$result=$findUserById->getUserById($id);
print_r($result);

