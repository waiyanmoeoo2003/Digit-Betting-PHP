<?php
include("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;



$table=new BettingRecordTable(new MySQL());
$id=$_GET['record_id'];

$table->delete($id);
//HTTP::redirect("/admin.php");