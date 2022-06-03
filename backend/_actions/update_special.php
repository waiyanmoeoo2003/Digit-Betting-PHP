<?php
include ("../../vendor/autoload.php");
session_start();
use Libs\Database\MySQL;
use Libs\Database\SpecialTable;
use Helpers\HTTP;
$table=new SpecialTable(new MySQL());

if(isset($_POST['update_special'])){
  $special_id=$_POST['special_id'];
  $data=[
  "counter"=>$_POST['counter'] ?? 'Unknown',
  "digit"=>$_POST['digit'] ?? 'Unknown',
  "special_date"=>$_POST['special_date'] ?? 'Unknown',
    "special_prize"=> $_POST['special_prize'] ?? '',
  ];
  $table->update($special_id,$data);
$_SESSION['update_id']=$special_id;
  HTTP::redirect("/backend/public/special_table.php");

}