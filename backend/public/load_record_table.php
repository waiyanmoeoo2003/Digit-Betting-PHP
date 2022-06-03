<?php 
include ("../../vendor/autoload.php");
session_start();
use Libs\Database\MySQL;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;
use Helpers\Auth;
Auth::check();
$table=new BettingRecordTable(new MySQL());
if(isset($_POST['record_date'])){
$date= strval($_POST['record_date']);
}
if(isset($_SESSION['record_id'])){
  unset($_SESSION['record_id']);
}
?>
<div class="table-responsive">
                    <table
                      id="dtable"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>ID</th>
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
                          <?php if($record->fourth_prize==''):?>
                          <td class="bg-dark"></td>
                          <?php else:?>
                          <td><?=$record->fourth_prize?></td>
                          <?php endif?>
                          <?php if($record->fifth_prize==''):?>
                          <td class="bg-dark"></td>
                          <?php else:?>
                          <td><?=$record->fifth_prize?></td>
                          <?php endif?>
                          <?php if($record->sixth_prize==''):?>
                          <td class="bg-dark"></td>
                          <?php else:?>
                          <td><?=$record->sixth_prize?></td>
                          <?php endif?>
                          <td class="status"><?php if ($record->status==1) :?>
                            <span class="badge bg-success">Active</span>
                            <?php elseif($record->status==0) : ?>
                            <span class="badge bg-dark">Inactive</span>

                            <?php endif ?>
                          </td>
                          <td>
                            <div class="btn-group">
                            <!-- <a id="status_check" class="h4 text-warning"><i class="fas fa-check"></i></a> -->
                            <button type="button" class="btn btn-outline-warning" onclick="update_status(<?=$record->id?>)" class="status_check"><i class="fas fa-check"></i></button>
                            <a href="update_form.php?record_id=<?=$record->id?>" class="btn btn-outline-primary"><i class=" fas fa-pencil-alt"></i></a>
                            <!-- <a href="" class="h4 text-danger"><i class="fas fa-trash "></i></a> -->
                            <button type="button"  class="btn btn-outline-danger" onclick="delete_record(<?=$record->id?>)" class="status_check"><i class="fas fa-trash"></i></button>
                          </div>

                                                      </td>

                        </tr>
                      <?php endforeach ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>ID</th>
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


    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#dtable").DataTable();
    </script>

