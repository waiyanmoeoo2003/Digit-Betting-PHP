<?php 

namespace Libs\Database;

use PDOException;

class SpecialTable
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
			INSERT INTO `special`(`counter`, `special_date`,`digit`, `special_prize`) VALUES (:counter,:special_date,:digit,:special_prize)";
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
				SELECT * FROM `special` 
				");
			return $statement->fetchAll();
		}catch(PDOException $e){
			return "no data";
		}
	}
	public function getWithId($id)
	{
		$query= "
			SELECT * FROM `special` WHERE id='$id'
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
			SELECT * FROM `special` WHERE special_date='$date'
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
			UPDATE `special` SET `counter`=:counter,`special_date`=:special_date,`digit`=:digit,`special_prize`=:special_prize WHERE id=:id
		");
		$statement->execute([':id'=>$id,
			':counter'=>$data['counter'],
			':special_date'=>$data['special_date'],
			':digit'=>$data['digit'],
			':special_prize'=>$data['special_prize'],
		]);
		return $statement->rowCount();
	}catch(PDOException $e){
		return $e->getMessage();
	}
	}
	public function delete($id)
	{
		$statement=$this->db->prepare("
            DELETE FROM special WHERE id=:id
        ");
        $statement->execute([':id'=>$id]);
        return $statement->rowCount();
	}
}