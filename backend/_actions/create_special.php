<?php 
include("../../vendor/autoload.php");
session_start();
use Libs\Database\MySQL;
use Libs\Database\SpecialTable;
use Helpers\HTTP;

if(isset($_POST['create_special'])){
	$data=[
  "counter"=>$_POST['counter'] ?? 'Unknown',
  "digit"=>$_POST['digit'] ?? 'Unknown',
  "special_date"=>$_POST['special_date'] ?? 'Unknown',
    "special_prize"=> $_POST['special_prize'] ?? '',
	];
	$table=new SpecialTable(new MySQL());
	if($table){
		$table->insert($data);
			unset($_SESSION['counter_name']);
	unset($_SESSION['digit']);
	unset($_SESSION['record_date']);
		HTTP::redirect("/backend/public/special.php");
	}else{
		echo "sad";
	}
}