<?php 
include ("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;
use Helpers\Auth;
Auth::check();
$table=new BettingRecordTable(new MySQL());
$date= strval($_POST['record_date']);
?>
<div class="table-responsive">
                    <table
                      id="zero_config_2"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>Counter</th>
                          <th>Digit</th>
                          <th>Date</th>
                          <th>First Prize</th>
                          <th>Second Prize</th>
                          <th>Third Prize</th>
                          <th>Fourth Prize</th>
                          <th>Fifth Prize</th>
                          <th>Sixth Prize</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?=$date?>
                        <?php 
                         if($date=="Date"){
                          $all=$table->getAll();
                         }else{
                        $all=$table->getWithDate($date);
                        }
                         foreach($all as $record) :?>
                        <tr>
                          <td><?=$record->id?></td>
                          <td><?=$record->counter_name?></td>
                          <td><?=$record->digit?>D</td>
                          <td><?=$record->record_date?></td>
                          <td><?=$record->first_prize?></td>
                          <td><?=$record->second_prize?></td>
                          <td><?=$record->third_prize?></td>
                          <td><?=$record->fourth_prize?></td>
                          <td><?=$record->fifth_prize?></td>
                          <td><?=$record->sixth_prize?></td>
                          <td class="status"><?php if ($record->status==1) :?>
                            <span class="badge bg-success">Active</span>
                            <?php elseif($record->status==0) : ?>
                            <span class="badge bg-dark">Inactive</span>

                            <?php endif ?>
                          </td>
                          <td>
                            <!-- <a id="status_check" class="h4 text-warning"><i class="fas fa-check"></i></a> -->
                            <button type="button" onclick="ggfunc(<?=$record->id?>)" class="status_check"><i class="fas fa-check"></i></button>
                            <a href="" class="h4 text-primary"><i class="fas fa-edit"></i></a>
                            <a href="" class="h4 text-danger"><i class="fas fa-trash "></i></a>
                                                      </td>

                        </tr>
                      <?php endforeach ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Counter</th>
                          <th>Digit</th>
                          <th>Date</th>
                          <th>First Prize</th>
                          <th>Second Prize</th>
                          <th>Third Prize</th>
                          <th>Fourth Prize</th>
                          <th>Fifth Prize</th>
                          <th>Sixth Prize</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>

    <script src="assets/assets/extra-libs/DataTables/datatables.min.js"></script>

    <script>$("#zero_config_2").DataTable();
</script>