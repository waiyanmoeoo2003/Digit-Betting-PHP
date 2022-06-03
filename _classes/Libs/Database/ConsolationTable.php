<?php 

namespace Libs\Database;

use PDOException;

class ConsolationTable
{
	private $db=null;

	public function __construct(MySQL $db)
	{
		$this->db=$db->connect();
	}
	public function insert($data)
	{
		try{
			$query="
			INSERT INTO `consolation`(`counter`, `consolation_date`,`digit`, `consolation_prize`) VALUES (:counter,:consolation_date,:digit,:consolation_prize)";
			$statement=$this->db->prepare($query);
			$statement->execute($data);
			return $this->db->lastInsertId();			
		}catch(PDOException $e){
			echo $e->getMessage();
			return $e->getMessage();
		}
	}
	public function getAll()
	{
		try{
			$statement=$this->db->query("
				SELECT * FROM `consolation` 
				");
			return $statement->fetchAll();
		}catch(PDOException $e){
			return "no data";
		}
	}
	public function getWithId($id)
	{
		$query= "
			SELECT * FROM `consolation` WHERE id='$id'
			";
		try{
			$statement=$this->db->query($query);
			$statement=$statement->fetchall();
			return $statement;
		}catch(PDOException $e){
			return "no data";
		}
	}
	public function getWithDate($date)
	{

		$query= "
			SELECT * FROM `consolation` WHERE consolation_date='$date'
			";
		try{
			$statement=$this->db->query($query);
			return $statement->fetchAll();
		}catch(PDOException $e){
			return "no data";
		}		
	}
	public function update($id,$data)
	{
		try{


		$statement=$this->db->prepare("
			UPDATE `consolation` SET `counter`=:counter,`consolation_date`=:consolation_date,`digit`=:digit,`consolation_prize`=:consolation_prize WHERE id=:id
		");
		$statement->execute([':id'=>$id,
			':counter'=>$data['counter'],
			':consolation_date'=>$data['consolation_date'],
			':digit'=>$data['digit'],
			':consolation_prize'=>$data['consolation_prize'],
		]);
		return $statement->rowCount();
	}catch(PDOException $e){
		return $e->getMessage();
	}
	}
	public function delete($id)
	{
		$statement=$this->db->prepare("
            DELETE FROM consolation WHERE id=:id
        ");
        $statement->execute([':id'=>$id]);
        return $statement->rowCount();
	}
}