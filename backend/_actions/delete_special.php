<?php
include("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\SpecialTable;
use Helpers\HTTP;



$table=new SpecialTable(new MySQL());
$id=$_GET['special_id'];
echo $id;
$table->delete($id);
//HTTP::redirect("/admin.php");