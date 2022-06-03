<?php 
include ("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;
$table=new BettingRecordTable(new MySQL());

$table->activeStatus($_GET['record_id']);
//HTTP::redirect("/backend/public/index.php");

