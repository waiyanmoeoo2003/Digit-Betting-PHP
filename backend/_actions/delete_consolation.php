<?php
include("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\ConsolationTable;
use Helpers\HTTP;



$table=new ConsolationTable(new MySQL());
$id=$_GET['consolation_id'];
echo $id;
$table->delete($id);
//HTTP::redirect("/admin.php");