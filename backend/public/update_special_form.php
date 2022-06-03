<?php
include ("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\SpecialTable;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;
use Helpers\Auth;
Auth::check();
$table=new SpecialTable(new MySQL());
$record_table=new BettingRecordTable(new MySQL());
$record_dates=$record_table->getDates();
$record_digits=$record_table->getDigits();
if(isset($_GET['special_id'])){
  $special_id= $_GET['special_id'];
  $special=$table->getWithId($special_id);
  $special=$special[0];

}
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
              <div class="card ">
                <form action="../_actions/update_special.php" method="post" class="form-horizontal">
                  <div class="card-body">
                    <h4 class="card-title"><h1 id="head_1"></h1></h4>
                    <input type="hidden" value="<?=$special->id?>" name="special_id">
                    <div class="form-group row">
                      <label
                        for="Counter Name"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Counter Name</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="Counter Name"
                          name="counter"
                          value="<?=$special->counter?>"
                          placeholder="Counter Name Here"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="Digit"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Date</label
                      >
                      <div class="col-sm-9">
                        <select name="special_date" class="form-control" id="">
                          <?php foreach($record_dates as $data):?>
                          <option value="<?=$data->record_date?>"<?php if($special->special_date==$data->record_date):?>selected<?php endif ?>><?=$data->record_date?></option>
                        <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="Date"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Digit</label
                      >
                      <div class="col-sm-9">
                        <select name="digit" class="form-control digit" id="digit">
                          <?php foreach($record_digits as $data):?>
                          <option value="<?=$data->digit?>"<?php if($special->digit==$data->digit):?>selected<?php endif ?>><?=$data->digit?></option>
                        <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label
                          for="first_prize"
                          class="col-sm-3 text-end control-label col-form-label"
                          >Special Prize</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            id="special_prize"
                            name="special_prize"value="<?=$special->special_prize?>"
                            placeholder=" Prize Here"
                          />
                        </div>
                    </div>
                      
                  <div class="border-top">
                    <div class="card-body d-flex justify-content-end">
                      
                      <input type="submit" name="update_special" value="Next"class="btn btn-primary">

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
      var digit=$(".digit").val();
      
      if(digit==4){
          $('#special_prize').attr('maxlength','4');
          $('#special_prize').attr('minlength','4');
         // $('#special_prize').val('hello');
        }else if(digit==6){
           $('#special_prize').attr('maxlength','6');
          $('#special_prize').attr('minlength','6');

        }else if(digit==5){
           $('#special_prize').attr('maxlength','5');
          $('#special_prize').attr('minlength','5');

        }
    $(".digit").change(function(){
        var digit=$(".digit").val();
        alert(digit);

        if(digit==4){
          $('#special_prize').attr('maxlength','4');
          $('#special_prize').attr('minlength','4');
         // $('#special_prize').val('hello');
        }else if(digit==6){
           $('#special_prize').attr('maxlength','6');
          $('#special_prize').attr('minlength','6');

        }else if(digit==5){
           $('#special_prize').attr('maxlength','5');
          $('#special_prize').attr('minlength','5');

        }
       
        })

          
    </script>
  </body>
</html>
