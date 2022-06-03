<?php
include ("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\ConsolationTable;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;
$table=new ConsolationTable(new MySQL());
$record_table=new BettingRecordTable(new MySQL());
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
                  <h5 class="card-title">consolation Datatable</h5>
                  <form action="">
                    <div class="row">
                      <div class="col-md-2">
                        <select class="target form-control" id="mySelect" name="select_data">
                          <option value="Date" selected="selected">Date</option>
                          
                          <?php foreach($record_table->getDates() as $data) :?>
                      
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

                        <?php $all=$table->getAll();
                        if(isset($_SESSION['update_id'])){
                          $consolation_id=$_SESSION['update_id'];
                          $all=$table->getWithId($consolation_id);
                          unset($_SESSION['update_id']);
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
          $("#load-table-date").load("load_consolation_table.php",{
            consolation_date : $('#mySelect').val()
          });
        })
      })
      $(document).ready(function(){
        $("#get_all").click(function(){
          consolation_date : $('#mySelect').val('Date');
          console.log('hello world');
          $("#load-table-date").load("load_consolation_table.php",{

            consolation_date : 'Date'
          });
        })
      })
     
        function delete_consolation($id){
          $.ajax({
            url:'../_actions/delete_consolation.php',
            type:'GET',
            data:{
              'consolation_id': $id
            },
            success:function(response){
              $("#load-table-date").load("load_consolation_table.php",{
                consolation_date : $('#mySelect').val()
          });
            },
          })
        
        }
    </script>
  </body>
</html>
