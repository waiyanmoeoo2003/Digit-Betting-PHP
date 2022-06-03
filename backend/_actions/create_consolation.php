<?php 
include("../../vendor/autoload.php");
session_start();
use Libs\Database\MySQL;
use Libs\Database\ConsolationTable;
use Helpers\HTTP;

if(isset($_POST['create_consolation'])){
	$data=[
  "counter"=>$_POST['counter'] ?? 'Unknown',
  "digit"=>$_POST['digit'] ?? 'Unknown',
  "consolation_date"=>$_POST['consolation_date'] ?? 'Unknown',
    "consolation_prize"=> $_POST['consolation_prize'] ?? '',
	];
	$table=new ConsolationTable(new MySQL());
	if($table){
		$table->insert($data);
			unset($_SESSION['counter_name']);
		HTTP::redirect("/backend/public/consolation.php");
	}else{
		echo "sad";
	}
}