<?php
include ("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;
use Helpers\Auth;
Auth::check();
$table=new BettingRecordTable(new MySQL());
$all=$table->getAll();

?>
<?php include ('_layouts/_header.php') ?>
<?php include ('_layouts/_nav.php') ?>
<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Prizes</h4>
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
          <div class="row d-flex justify-content-center">
            <div class="col-md-6 ">
              <div class="card">
                <form action="../_actions/create_consolation.php" method="post" class="form-horizontal">
                  <div class="card-body">
                    <h4 class="card-title"><h1 id="head_1"></h1></h4>
                    
                    <div class="form-group row">
                      <label
                        for="Counter Name"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Counter Name</label
                      >
                      <div class="col-sm-9">
                        <select name="counter" id="" class="form-control" required>
                          <option value="">Counter</option>
                          <?php $counters=$table->getCounters();
                          foreach($counters as $data):?>

                          <option value="<?=$data->counter_name?>"><?=$data->counter_name?></option>
                          <?php endforeach?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="Digit"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Digit</label
                      >
                      <div class="col-sm-9">
                         <div class="col-sm-9">
                        <select name="digit" id="" class="form-control digit" required>
                          <option value="">Digit</option>
                          <?php 
                           $digits=$table->getDigits();

                          foreach($digits as $data):?>

                          <option value="<?=$data->digit?>"><?=$data->digit?></option>
                          <?php endforeach?>
                        </select>
                      </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="Date"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Date</label
                      >
                      <div class="col-sm-9">
                         <div class="col-sm-9">
                        <select name="consolation_date" id="" class="form-control" required>
                          <option value="">Date</option>
                          <?php
                           $dates=$table->getDates();

                           foreach($dates as $data):?>

                          <option value="<?=$data->record_date?>"><?=$data->record_date?></option>
                          <?php endforeach?>
                        </select>
                      </div>
                      </div>
                    </div>
                   <div class="form-group row">
                        <label
                          for="consolation_prize"
                          class="col-sm-3 text-end control-label col-form-label"
                          >Consolation Prize</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            id="consolation_prize"
                            name="consolation_prize" 
                            placeholder="consolation Prize Here" required
                          />
                        </div>
                      </div>
                  <div class="border-top">
                    <div class="card-body d-flex justify-content-end">
                      
                      <input type="submit" name="create_consolation" value="Create"class="btn btn-primary">

                    </div>

                  </div>
                </form>
              </div>
              
             
            </div>
          <?php //endif ?>
          </div>
          <!-- editor -->
          
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
    
    <script>
     $(document).ready(function(){
      var digit=$('.digit').val();
      if(digit==4){
          $('#consolation_prize').attr('maxlength','4');
          $('#consolation_prize').attr('minlength','4');
         // $('#consolation_prize').val('hello');
        }else if(digit==6){
           $('#consolation_prize').attr('maxlength','6');
          $('#consolation_prize').attr('minlength','6');

        }else if(digit==5){
           $('#consolation_prize').attr('maxlength','5');
          $('#consolation_prize').attr('minlength','5');

        }
      $(".digit").change(function(){
        var digit=$(".digit").val();
        //alert(digit);

        if(digit==4){
          $('#consolation_prize').attr('maxlength','4');
          $('#consolation_prize').attr('minlength','4');
         // $('#consolation_prize').val('hello');
        }else if(digit==6){
           $('#consolation_prize').attr('maxlength','6');
          $('#consolation_prize').attr('minlength','6');

        }else if(digit==5){
           $('#consolation_prize').attr('maxlength','5');
          $('#consolation_prize').attr('minlength','5');

        }
      })
    })
    </script>
  </body>
</html>
