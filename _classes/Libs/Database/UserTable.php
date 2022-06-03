<?php 

namespace Libs\Database;

use PDOException;

class UserTable
{
	private $db=null;

	public function __construct(MySQL $db)
	{
		$this->db=$db->connect();
	}
	public function findByEmailAndPassword($email,$user_password)
    {
    	try{

    		//echo gettype($password);
        $statement=$this->db->prepare("
            SELECT * FROM `user` WHERE email=:email AND user_password=:user_password
        ");
        $statement->execute([
            ':email'=>$email,
            ':user_password'=>$user_password
        ]);
        $row=$statement->fetch();
        var_dump($row);
        return $row ?? false;
    }catch(PDOException $e){
    	echo $e->getMessage();
    }
    }
}