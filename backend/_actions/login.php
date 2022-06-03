<?php
session_start();

include("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UserTable;
use Helpers\HTTP;

echo $email=$_POST['email'];
echo $user_password=$_POST['password'];

$table=new UserTable(new MySQL());

$user=$table->findByEmailAndPassword($email,$user_password);
if($user){
 $_SESSION['user']=$user;
 echo "yes";
 HTTP::redirect("/backend/public/index.php");
}else{
	echo $user;
}