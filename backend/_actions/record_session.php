<?php 
include("../../vendor/autoload.php");
use Helpers\HTTP;
session_start();
if(isset($_POST['get_info'])){
	$_SESSION['counter_name']=$_POST['counter_name'];
	$_SESSION['digit']=$_POST['digit'];
	$_SESSION['record_date']=$_POST['record_date'];
	//echo $_SESSION['digit'];
	//echo $_SESSION['counter_name']." | ".$_SESSION['digit']." | ". $_SESSION['record_date'];
	HTTP::redirect("/backend/public/bet_record.php");
}
if(isset($_GET['back'])){
	unset($_SESSION['counter_name']);
	unset($_SESSION['digit']);
	unset($_SESSION['record_date']);
	HTTP::redirect("/backend/public/bet_record.php");
	
}