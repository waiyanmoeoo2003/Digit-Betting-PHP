<?php
include ("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\ConsolationTable;
use Helpers\HTTP;
use Helpers\Auth;
Auth::check();
$table=new ConsolationTable(new MySQL());

if(isset($_GET['consolation_id'])){
  $consolation_id= $_GET['consolation_id'];
  $consolation=$table->getWithId($consolation_id);
  $consolation=$consolation[0];

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
                <form action="../_actions/update_consolation.php" method="post" class="form-horizontal">
                  <div class="card-body">
                    <h4 class="card-title"><h1 id="head_1"></h1></h4>
                    <input type="hidden" value="<?=$consolation->id?>" name="consolation_id">
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
                          value="<?=$consolation->counter?>"
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
                          class="form-control digit"
                          id=""
                          name="digit" value="<?=$consolation->digit?>"
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
                          class="form-control"
                          name="consolation_date"
                          id="Date" value="<?=$consolation->consolation_date?>"
                          
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                        <label
                          for="first_prize"
                          class="col-sm-3 text-end control-label col-form-label"
                          >Consolation Prize</label
                        >
                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            id="consolation_prize"
                            name="consolation_prize"value="<?=$consolation->consolation_prize?>"
                            placeholder=" Prize Here"
                          />
                        </div>
                    </div>
                      
                  <div class="border-top">
                    <div class="card-body d-flex justify-content-end">
                      
                      <input type="submit" name="update_consolation" value="Next"class="btn btn-primary">

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
