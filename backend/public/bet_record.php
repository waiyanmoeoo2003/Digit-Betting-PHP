<?php
include ("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\BettingRecordTable;
use Helpers\HTTP;
$table=new BettingRecordTable(new MySQL());

if(isset($_GET['record_id'])){
  $record_id= $_GET['record_id'];
  $record=$table->getWithId($record_id);
  $record=$record[0];
 //echo $record->id;
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
              <div class="card">
                <form action="../_actions/create_record.php" method="post" class="form-horizontal">
                  <div class="card-body">
                    <h4 class="card-title"><h1 id="head_1"></h1></h4>
                    
                    <div class="form-group row">
                      <label
                        for="Counter Name"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Counter Name</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control" required
                          id="Counter Name"
                          name="counter_name"
                          
                          placeholder="Counter Name Here"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="Digit"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Digit</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control digit" required
                          id="digit"
                          name="digit" 
                          placeholder="Digit Here"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="Date"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Date</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="date"
                          class="form-control" required
                          name="record_date"
                          id="Date" 
                          placeholder="Date Here"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                        <label
                          for="first_prize"
                          class="col-sm-3 text-end control-label col-form-label"
                          >First Prize</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control" required
                            id="first_prize"
                            name="first_prize"
                            placeholder="First Prize Here"
                          />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label
                          for="second_prize"
                          class="col-sm-3 text-end control-label col-form-label"
                          >Second Prize</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control" required
                            id="second_prize"
                            name="second_prize"
                            placeholder="First Prize Here"
                          />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label
                          for="third_prize"
                          class="col-sm-3 text-end control-label col-form-label"
                          >Third Prize</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control" required
                            id="third_prize"
                            name="third_prize" 
                            placeholder="Third Prize Here"
                          />
                        </div>
                      </div>
                      <div class="form-group row" id="fourth_prize_form">
                        <label
                          for="fourth_prize" id="fourth_prize_label"
                          class="col-sm-3 text-end control-label col-form-label"
                          >Fourth Prize</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control" required
                            id="fourth_prize"
                            name="fourth_prize" 
                            placeholder="Fourth Prize Here"
                          />
                        </div>
                      </div>
                      <div class="form-group row" id="fifth_prize_form">
                        <label
                          for="fifth_prize" id="fifth_prize_label"
                          class="col-sm-3 text-end control-label col-form-label"
                          >Fifth Prize</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control" required
                            id="fifth_prize"
                            name="fifth_prize"
                            placeholder="Fifth Prize Here"
                          />
                        </div>
                      </div>
                      <div class="form-group row" id="sixth_prize_form">
                        <label
                          for="sixth_prize" id="sixth_prize_label"
                          class="col-sm-3 text-end control-label col-form-label"
                          >Sixth Prize</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control" required
                            id="sixth_prize"
                            name="sixth_prize" 
                            placeholder="Sixth Prize Here"
                          />
                        </div>
                      </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body d-flex justify-content-end">
                      
                      <input type="submit" name="create_record" value="Next"class="btn btn-primary">

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
      if($('#digit').val()==4){
        fourth_prize_form();
      }else if($('#digit').val()==6){
        sixth_prize_form();
      }
      $("#digit").keyup(function(){
        var digit=$("#digit").val();
        alert(digit);
        if(digit==4){
          fourth_prize_form();
          $('#first_prize').attr('maxlength','4');
          $('#first_prize').attr('minlength','4');
          $('#second_prize').attr('maxlength','4');
          $('#second_prize').attr('minlength','4');
          $('#third_prize').attr('maxlength','4');
          $('#third_prize').attr('minlength','4');
          
        }else if(digit==6){
          sixth_prize_form();
          $('#first_prize').attr('maxlength','6');
          $('#first_prize').attr('minlength','6');
          $('#second_prize').attr('maxlength','6');
          $('#second_prize').attr('minlength','6');
          $('#third_prize').attr('maxlength','6');
          $('#third_prize').attr('minlength','6');
          $('#fourth_prize').attr('maxlength','6');
          $('#fourth_prize').attr('minlength','6');
          $('#fifth_prize').attr('maxlength','6');
          $('#fifth_prize').attr('minlength','6');
        }else if(digit==5){
          $('#first_prize').attr('maxlength','5');
          $('#first_prize').attr('minlength','5');
          $('#second_prize').attr('maxlength','5');
          $('#second_prize').attr('minlength','5');
          $('#third_prize').attr('maxlength','5');
          $('#third_prize').attr('minlength','5');
          $('#fourth_prize').attr('maxlength','5');
          $('#fourth_prize').attr('minlength','5');
          $('#fifth_prize').attr('maxlength','5');
          $('#fifth_prize').attr('minlength','5');
          $('#sixth_prize').attr('maxlength','5');
          $('#sixth_prize').attr('minlength','5');
        }
      });
      $("#digit").keydown(function(){
        var digit=$("#digit").val();
          $("#fourth_prize").attr('type','number');
          $("#fourth_prize_label").css('display','inline');
          $("#fifth_prize").attr('type','number');
          $("#fifth_prize_label").css('display','inline');
          $("#sixth_prize").attr('type','number');
          $("#sixth_prize_label").css('display','inline'); 
      })
     })
     



     function fourth_prize_form(){
          $("#fourth_prize").attr('type','hidden');
          $("#fourth_prize_label").css('display','none');
          $("#fifth_prize").attr('type','hidden');
          $("#fifth_prize_label").css('display','none');
          $("#sixth_prize").attr('type','hidden');
          $("#sixth_prize_label").css('display','none');
     }
     function sixth_prize_form(){
                     $("#sixth_prize").attr('type','hidden');
          $("#sixth_prize_label").css('display','none');
     }
    </script>
  </body>
</html>
