<?php
include ("../../vendor/autoload.php");
session_start();
use Libs\Database\MySQL;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;
$table=new BettingRecordTable(new MySQL());

if(isset($_POST['update_record'])){
  $record_id=$_POST['record_id'];
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
  $table->update($record_id,$data);
$_SESSION['update_id']=$record_id;
  HTTP::redirect("/backend/public/index.php");

}