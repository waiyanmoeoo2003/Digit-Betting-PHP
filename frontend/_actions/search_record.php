<?php 
include("../../vendor/autoload.php");
session_start();
use Libs\Database\MySQL;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;
 if(isset($_POST['search'])){
 	$search_date=$_POST['search_date'];
 	$table=new BettingRecordTable(new MySQL());
 	$records=$table->getWithDate($search_date);
 	//var_dump($records);
 	HTTP::redirect('frontend/public/search.php',"records=$records");
 }