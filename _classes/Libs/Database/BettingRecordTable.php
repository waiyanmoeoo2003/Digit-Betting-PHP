<?php 

namespace Libs\Database;

use PDOException;

class BettingRecordTable
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
			INSERT INTO `betting_record`(`counter_name`, `record_date`, `digit`, `first_prize`, `second_prize`, `third_prize`, `fourth_prize`, `fifth_prize`, `sixth_prize`) VALUES (
				:counter_name,:record_date,:digit,:first_prize,:second_prize,:third_prize,:fourth_prize,:fifth_prize,:sixth_prize
				)
			";
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
				SELECT * FROM `betting_record` 
				");
			return $statement->fetchAll();
		}catch(PDOException $e){
			return "no data";
		}
	}
	public function getDates()
	{
		try{
			$statement=$this->db->query("SELECT DISTINCT record_date FROM betting_record ORDER BY record_date");
			return $statement->fetchAll();
		}catch(PDOException $e){
			return $e->getMessage();
			}
	}
	public function getDigits()
	{
		try{
			$statement=$this->db->query("SELECT DISTINCT digit FROM betting_record ORDER BY digit ");
			return $statement->fetchAll();
		}catch(PDOException $e){
			return $e->getMessage();
			}
	}
	public function getCounters()
	{
		try{
			$statement=$this->db->query("SELECT DISTINCT counter_name FROM betting_record");
			return $statement->fetchAll();
		}catch(PDOException $e){
			return $e->getMessage();
			}
	}
	public function getWithId($id)
	{
		$query= "
			SELECT * FROM `betting_record` WHERE id='$id'
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
			SELECT * FROM `betting_record` WHERE record_date='$date' ORDER BY digit ASC
			";
		try{
			$statement=$this->db->query($query);
			return $statement->fetchAll();
		}catch(PDOException $e){
			return "no data";
		}		
	}
	public function getWithDigitAndDate($date,$digit)
	{
		
		try{
			$query= "
			SELECT * FROM `betting_record` WHERE record_date='$date'
			 AND digit=$digit";
			$statement=$this->db->query($query);
			//$data=$statement->fetchAll();
			//var_dump($data);
			return $statement->fetchAll();
		}catch(PDOException $e){
			return "no data";
		}	
	}
	public function activeStatus($id)
	{
		try{
			$statement=$this->db->query("SELECT * FROM betting_record WHERE id=$id");
			$data=$statement->fetchall();
			$status=(int)$data[0]->status;
			if($status==1) {
				try{
				$update=$this->db->prepare("UPDATE `betting_record` SET `status`=:data WHERE id=:id");
				$update->execute([':data'=>0,':id'=>$id]);
				return $update->rowCount();
			}catch(PDOException $e){
				return $e->getMessage();
			}
				
			}
			if($status==0){
				try{
				$update=$this->db->prepare("UPDATE `betting_record` SET `status`=:data WHERE id=:id");
				$update->execute([':data'=>1,':id'=>$id]);
				return $update->rowCount();
				}catch(PDOException $e){
				return $e->getMessage();
				}
			}

			//return $statement->fetchAll();
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	public function delete($id)
	{
		$statement=$this->db->prepare("
            DELETE FROM betting_record WHERE id=:id
        ");
        $statement->execute([':id'=>$id]);
        return $statement->rowCount();
	}
	public function update($id,$data)
	{
		try{


		$statement=$this->db->prepare("
			UPDATE `betting_record` SET `counter_name`=:counter_name,`record_date`=:record_date,`digit`=:digit,`first_prize`=:first_prize,`second_prize`=:second_prize,`third_prize`=:third_prize,`fourth_prize`=:fourth_prize,`fifth_prize`=:fifth_prize,`sixth_prize`=:sixth_prize WHERE id=:id
		");
		$statement->execute([':id'=>$id,
			':counter_name'=>$data['counter_name'],
			':record_date'=>$data['record_date'],
			':digit'=>$data['digit'],
			':first_prize'=>$data['first_prize'],
			':second_prize'=>$data['second_prize'],
			':third_prize'=>$data['third_prize'],
			':fourth_prize'=>$data['fourth_prize'],
			':fifth_prize'=>$data['fifth_prize'],
			':sixth_prize'=>$data['sixth_prize']
		]);
		return $statement->rowCount();
	}catch(PDOException $e){
		return $e->getMessage();
	}
	}
	public function getWithDigit($digit){
		$date=date('Y-m-d');
		$query= "
			SELECT * FROM `betting_record` WHERE digit=$digit AND record_date='$date'
			";
		try{
			$statement=$this->db->query($query);
			return $statement->fetchAll();
		}catch(PDOException $e){
			return "no data";
		}	
	}

}