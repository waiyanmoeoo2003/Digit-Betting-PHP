<?php 
include ("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\ConsolationTable;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;
use Helpers\Auth;
Auth::check();
$table=new ConsolationTable(new MySQL());
$record_table=new BettingRecordTable(new MySQL());
if(isset($_POST['consolation_date'])){
$date= strval($_POST['consolation_date']);
}
if(isset($_SESSION['consolation_id'])){
  unset($_SESSION['consolation_id']);
}
?>
<div id="load-table-date">
                    <div id="load-table-digit">
                  <div class="table-responsive">
                    <table
                      id="dtable_2"
                      class="table table-striped table-bordered text-center"
                    >
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Counter</th>
                          <th>Digit</th>
                          <th>Date</th>
                          <th>Consolation Prize</th>
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
                        foreach($all as $consolation) :?>
                        <tr>
                          <td><?=$consolation->id?></td>
                          <td><?=$consolation->counter?></td>
                          <td><?=$consolation->digit?>D</td>
                          <td><?=$consolation->consolation_date?></td>
                          <td><?=$consolation->consolation_prize?></td>
                          
                          <td>
                            <div class="btn-group">
                            <!-- <a id="status_check" class="h4 text-warning"><i class="fas fa-check"></i></a> -->
                            
                            <a href="update_consolation_form.php?consolation_id=<?=$consolation->id?>" class="btn btn-outline-primary"><i class=" fas fa-pencil-alt"></i></a>
                            <!-- <a href="" class="h4 text-danger"><i class="fas fa-trash "></i></a> -->
                            <button type="button"  class="btn btn-outline-danger" onclick="delete_consolation(<?=$consolation->id?>)" class="status_check"><i class="fas fa-trash"></i></button>
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
                          <th>Consolation Prize</th>
                          <th>Actions</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  </div>
                  </div>
                </div>
                <script src="assets/assets/extra-libs/DataTables/datatables.min.js"></script>


    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#dtable_2").DataTable();
    </script>
