<?php
include ("../../vendor/autoload.php");
session_start();
use Libs\Database\MySQL;
use Libs\Database\ConsolationTable;
use Helpers\HTTP;
$table=new ConsolationTable(new MySQL());

if(isset($_POST['update_consolation'])){
  $consolation_id=$_POST['consolation_id'];
  $data=[
  "counter"=>$_POST['counter'] ?? 'Unknown',
  "digit"=>$_POST['digit'] ?? 'Unknown',
  "consolation_date"=>$_POST['consolation_date'] ?? 'Unknown',
    "consolation_prize"=> $_POST['consolation_prize'] ?? '',
  ];
  $table->update($consolation_id,$data);
	$_SESSION['update_id']=$consolation_id;
  HTTP::redirect("/backend/public/consolation_table.php");

}