<?php
include ("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\BettingRecordTable;
use Libs\Database\SpecialTable;
use Libs\Database\ConsolationTable;
use Helpers\HTTP;
$table=new BettingRecordTable(new MySQL());
$consolation_table=new ConsolationTable(new MySQL());
$special_table=new SpecialTable(new MySQL());
$digit_4=$table->getWithDigit(4);
$digit_5=$table->getWithDigit(5);
$digit_6=$table->getWithDigit(6);
$dayofweek = date('l', strtotime(date('Y-m-d')));
?>
<?php include("_layouts/header.php")?>
<?php include("_layouts/nav.php")?>
<div class="container m-5">
	<div class="row">
	<?php foreach($digit_4 as $data) :?>
		<div class="col-md-4 mb-3">
			<div class="card">
				<div class="card-header bg-warning text-dark">
					<h3 class="text-center"><b><?=$data->counter_name?> <?=$data->digit?>D</b></h3>
				</div>
				<div class="card-body">
					<p>Date : <?=$data->record_date?> (<?=$dayofweek?>)</p>

					<table class="table table-dark table-bordered">
						<tr>
							<td class="bg-dark text-light text-center"><h5><b>1st Prize</b></h5></td>
							<td class="bg-white text-dark text-center"><h3><b><?=$data->first_prize?></b></h3></td>
						</tr>
						<tr>
							<td class="bg-dark text-light text-center"><h5><b>2st Prize</b></h5></td>
							<td class="bg-white text-dark text-center"><h3><b><?=$data->second_prize?></b></h3></td>
						</tr>
						<tr>
							<td class="bg-dark text-light text-center"><h5><b>3st Prize</b></h5></td>
							<td class="bg-white text-dark text-center"><h3><b><?=$data->third_prize?></b></h3></td>
						</tr>
					</table>
					<div class="card">
						<div class="card-header bg-dark">
						<p class="text-light text-center m-1"><b style="letter-spacing:3px;">Special</b></p>
							
						</div>
						<div class="card-body">
							<div class="row">
								<?php 
								$specials=$special_table->getWithDate($data->record_date);
								foreach($specials as $special) :?>
								<div class="col-md-3">
									<p class="bg-light p-1 text-center" style="border:1px solid black"><b><?=$special->special_prize?></b></p>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
					<div class="card mt-1">
						<div class="card-header bg-dark">
						<p class="text-light text-center m-1"><b style="letter-spacing:3px;">Consolation</b></p>
							
						</div>
						<div class="card-body">
							<div class="row">
								<?php 
								$consolations=$consolation_table->getWithDate($data->record_date);
								foreach($consolations as $consolation) :?>
								<div class="col-md-3">
									<p class="bg-light p-1 text-center" style="border:1px solid black"><b><?=$consolation->consolation_prize?></b></p>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	<?php endforeach ?>
	
	</div>
	<div class="row">
		<?php foreach($digit_5 as $data): ?>
		<div class="col-md-4 mb-3">
			<div class="card">
				<div class="card-header bg-warning text-dark">
					<h3 class="text-center"><b><?=$data->counter_name?> <?=$data->digit?>D</b></h3>
				</div>
				<div class="card-body">
					<p>Date : <?=$data->record_date?> (Sat)</p>

					<table class="table table-dark table-bordered">
						<tr>
							<td class="bg-dark text-light text-center"><h5><b>1st Prize</b></h5></td>
							<td class="bg-white text-dark text-center"><h3><b><?=$data->first_prize?></b></h3></td>
						</tr>
						<tr>
							<td class="bg-dark text-light text-center"><h5><b>2st Prize</b></h5></td>
							<td class="bg-white text-dark text-center"><h3><b><?=$data->second_prize?></b></h3></td>
						</tr>
						<tr>
							<td class="bg-dark text-light text-center"><h5><b>3st Prize</b></h5></td>
							<td class="bg-white text-dark text-center"><h3><b><?=$data->third_prize?></b></h3></td>
						</tr>
					</table>
					<div class="card">
						<div class="card-header bg-dark">
						<p class="text-light text-center m-1"><b style="letter-spacing:3px;">Special</b></p>
							
						</div>
						<div class="card-body">
							<div class="row">
								<?php 
								$specials=$special_table->getWithDate($data->record_date);
								foreach($specials as $special) :?>
								<div class="col-md-3">
									<p class="bg-light p-1 text-center" style="border:1px solid black"><b><?=$special->special_prize?></b></p>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
					<div class="card mt-1">
						<div class="card-header bg-dark">
						<p class="text-light text-center m-1"><b style="letter-spacing:3px;">Consolation</b></p>
							
						</div>
						<div class="card-body">
							<div class="row">
								<?php 
								$consolations=$consolation_table->getWithDate($data->record_date);
								foreach($consolations as $consolation) :?>
								<div class="col-md-3">
									<p class="bg-light p-1 text-center" style="border:1px solid black"><b><?=$consolation->consolation_prize?></b></p>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	<?php endforeach ?>
	</div>
	<div class="row">
		<?php foreach($digit_6 as $data): ?>
		<div class="col-md-4 mb-3">
			<div class="card">
				<div class="card-header bg-warning text-dark">
					<h3 class="text-center"><b><?=$data->counter_name?> <?=$data->digit?>D</b></h3>
				</div>
				<div class="card-body">
					<p>Date : <?=$data->record_date?> (Sat)</p>

					<table class="table table-dark table-bordered">
						<tr>
							<td class="bg-dark text-light text-center"><h5><b>1st Prize</b></h5></td>
							<td class="bg-white text-dark text-center"><h3><b><?=$data->first_prize?></b></h3></td>
						</tr>
						<tr>
							<td class="bg-dark text-light text-center"><h5><b>2st Prize</b></h5></td>
							<td class="bg-white text-dark text-center"><h3><b><?=$data->second_prize?></b></h3></td>
						</tr>
						<tr>
							<td class="bg-dark text-light text-center"><h5><b>3st Prize</b></h5></td>
							<td class="bg-white text-dark text-center"><h3><b><?=$data->third_prize?></b></h3></td>
						</tr>
					</table>
					<div class="card">
						<div class="card-header bg-dark">
						<p class="text-light text-center m-1"><b style="letter-spacing:3px;">Special</b></p>
							
						</div>
						<div class="card-body">
							<div class="row">
								<?php 
								$specials=$special_table->getWithDate($data->record_date);
								foreach($specials as $special) :?>
								<div class="col-md-3">
									<p class="bg-light p-1 text-center" style="border:1px solid black"><b><?=$special->special_prize?></b></p>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
					<div class="card mt-1">
						<div class="card-header bg-dark">
						<p class="text-light text-center m-1"><b style="letter-spacing:3px;">Consolation</b></p>
							
						</div>
						<div class="card-body">
							<div class="row">
								<?php 
								$consolations=$consolation_table->getWithDate($data->record_date);
								foreach($consolations as $consolation) :?>
								<div class="col-md-3">
									<p class="bg-light p-1 text-center" style="border:1px solid black"><b><?=$consolation->consolation_prize?></b></p>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	<?php endforeach ?>
	</div>
</div>
<?php include("_layouts/footer.php")?>