<?php
include ("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;
use Helpers\Auth;
$table=new BettingRecordTable(new MySQL());

Auth::check();
?>
<?php include ('_layouts/_header.php') ?>
<?php include ('_layouts/_nav.php') ?>


      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Tables</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
              
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Basic Datatable</h5>
                  <form action="">
                    <div class="row">
                      <div class="col-md-2">
                        <select class="target form-control" id="mySelect" name="select_data">
                          <option value="Date" selected="selected">Date</option>
                          
                          <?php foreach($table->getDates() as $data) :?>
                      
                      <option value="<?=$data->record_date?>"><?=$data->record_date?></option>
                    <?php endforeach?>
                    </select>
                      </div>
                      <div class="col-md-2">
                     <button type="button" id="get_all"class="btn btn-outline-primary">Get All</button>
                   </div>
                    </div>
                    
                    
                  </form>
                  <div id="load-table-date">
                    <div id="load-table-digit">
                  <div class="table-responsive">
                    <table
                      id="zero_config"
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

                        <?php $all=$table->getAll();
                        if(isset($_SESSION['update_id'])){
                          $record_id=$_SESSION['update_id'];
                          $all=$table->getWithId($record_id);
                          unset($_SESSION['update_id']);
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
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">

          All Rights Reserved by Matrix-admin. Designed and Developed by
          <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="assets/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/assets/extra-libs/DataTables/datatables.min.js"></script>


    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();

    </script>
    
    <script>
      $(document).ready(function(){
        $(".target").change(function(){
          console.log('hello world');
          $("#load-table-date").load("load_record_table.php",{
            record_date : $('#mySelect').val()
          });
        })
      })
      $(document).ready(function(){
        $("#get_all").click(function(){
          record_date : $('#mySelect').val('Date');
          console.log('hello world');
          $("#load-table-date").load("load_record_table.php",{

            record_date : 'Date'
          });
        })
      })
      function update_status($id){
          $.ajax({
            url:'../_actions/active.php',
            type:'GET',
            data:{
              'record_id': $id
            },
            success:function(response){
              $("#load-table-date").load("load_record_table.php",{
                record_date : $('#mySelect').val()
          });
            },
          })
        
        }
        function delete_record($id){
          $.ajax({
            url:'../_actions/delete_record.php',
            type:'GET',
            data:{
              'record_id': $id
            },
            success:function(response){
              $("#load-table-date").load("load_record_table.php",{
                record_date : $('#mySelect').val()
          });
            },
          })
        
        }
    </script>
  </body>
</html>
