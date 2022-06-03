<?php 
include("../../vendor/autoload.php");
session_start();
use Libs\Database\MySQL;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;

if(isset($_POST['create_record'])){
	// if($_SESSION['digit']==4){
	// 	$fourth_prize = '--';
	// 	$fifth_prize = '--';
	// 	$sixth_prize = '--';
	// }else if($_SESSION['digit']==6){
	// 	$fifth_prize = '--';
	// }
	//echo $_SESSION['counter_name']." | ".$_SESSION['digit']." | ". $_SESSION['record_date'];

	$data=[
  "counter_name"=>$_POST['counter_name'] ?? 'Unknown',
  "digit"=>$_POST['digit'] ?? 'Unknown',
  "record_date"=>$_POST['record_date'] ?? 'Unknown',
    "first_prize"=> $_POST['first_prize'] ?? '',
    "second_prize"=> $_POST['second_prize'] ?? '',
    "third_prize"=> $_POST['third_prize'] ?? '',
    "fourth_prize"=> $_POST['fourth_prize'] ?? '',
    "fifth_prize"=> $_POST['fifth_prize'] ?? '',
    "sixth_prize"=> $_POST['sixth_prize'] ?? '',
	];
	$table=new BettingRecordTable(new MySQL());
	if($table){
		$table->insert($data);
			unset($_SESSION['counter_name']);
	unset($_SESSION['digit']);
	unset($_SESSION['record_date']);
		HTTP::redirect("/backend/public/bet_record.php");
	}else{
		echo "sad";
	}
}