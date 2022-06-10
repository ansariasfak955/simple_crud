<!DOCTYPE html>
<html dir="ltr" lang="en">
      <!--<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>-->
    <!--<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script> -->
<body>
 
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
       <?php include('header.php');?>
         <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/extra-libs/css-chart/css-chart.css">
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <?php foreach($pack_data as $rwbkh) { $hkp = $rwbkh->pack_id; } 
                                          $ssqj = $this->db->query("select * from dlc_course_package where pack_id ='$hkp' limit 1");
                                           foreach($ssqj->result_array() as $mlh){  $qw= $mlh['pack_name'];}
                                    
                                    ?>
                        <h4 class="page-title">View Question And Answer  <span style="color:#4fc3f7"><?php echo $qw; ?></span></h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Question And Answer</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Quiz/add_answer"<button class="btn btn-info" style="float:right;">Add Question</button></a>
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
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            
                            <!--<hr>-->
                            <form method="POST" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                     <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label"> Questions</label> <br><br>
                                              
                                            
                                            <?php foreach($pack_data as $rwb) { ?>
                                            <div style="border:1px solid white;">
                                            
                                            <!--<input type="text" name="pkgname" autocomplete="off" class="form-control" id="email1" value="<?php // echo $rwb->quiz_qs;?>" style="height:50px;" disabled> -->
                                            &nbsp;&nbsp; <label for="email1" class="control-label col-form-label"> <?php echo $rwb->quiz_qs;?> ?</label> 
                                            <div class="form-group">
                                            &nbsp;&nbsp; <label for="email1" class="control-label col-form-label"> Options</label> 
                                                     </br>
                                                <div class="row">  
                                            <?php
                                             $i =1; $pkl = $rwb->quiz_id;
                                            $dqll = $this->db->query("select * from dlc_quiz_answers where quiz_id ='$pkl'");
                                               foreach($dqll->result_array() as $ewd)
                                               { ?>
                                               
                                                <div class="col-md-3" style="padding-left:2%;">     
                                              <?php              $rgt = $ewd['quiz_status'];
                                              if($rgt =='1'){echo '&nbsp;<i class="fa fa-check" aria-hidden="true" style="color:#4fc3f7"></i>';}
                                              echo $i; echo "."; echo"&nbsp; &nbsp;";
                                                   echo $ewd['quiz_answer']; 
                                                   echo "<br>";
                                                   
                                                   $i++; ?>
                                                  </div>
                                                   
                                              <?php }
                                            
                                            ?>
                                            </div>
                                            </div>
                                            </div> <br>
                                            <?php } ?>
                                            
                                            
                                        </div>
                                    </div> 
                                       
                                </div>
                                 <!--<div class="row">
                                   
                                     <div class="col-sm-12 col-md-12">
									<div class="col-md-12">
                                          <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Sub Category</label> <br>

                                          </div>
                                            <div class="form-group">
                                                <div class="row">                                     
                                            <?php /*foreach($dtt as $rowd){*/ ?>

                                                                                            
                                                <div class="col-md-4">  
                                                <?php/* echo $rowd->sbcat_name;*/?> 
                                                                          
                                                <input type="checkbox" name="alphal[]"class="form-control" id="inputfname" style="margin-top: -15px;" value="<?php /*echo $rowd->sbcat_id;*/?>">
                                          
                                                </div>
                                                    
                                            <?php /*}*/ ?>
                                             </div>
                                        </div>
                                    </div> 
									 
									 </div>

                                </div>-->

                              
                            </div>
                            <hr>
                          
									
									
                                             

                           <!-- <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                        <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                    </div>
                                </div>
                            </div>-->
                            </form>
                        </div>
                    </div>
                  <!-- <div class="col-sm-12 col-lg-4">
                       
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <
                                            <div class="col p-r-0">
                                            
<?php /*  $sqla = $this->db->query("SELECT * FROM dlc_user"); 
$coo = $sqla->num_rows();*/?>
                                                <h1 class="font-light"><?php //echo $coo ; ?></h1>
                                                <h6 class="text-muted">Total Users</h6></div>
                                            
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php //echo $coo ; ?>%" class="css-bar m-b-0 css-bar-primary css-bar-<?php //echo $coo ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            
                                            <div class="col p-r-0">
<?php  /* $sqlaa = $this->db->query("SELECT * FROM dlc_user where user_status = '1'"); 
$cooa = $sqlaa->num_rows();*/?>
                                                <h1 class="font-light"><?php //echo $cooa ; ?></h1>
                                                <h6 class="text-muted">Active Users</h6></div>
                                            
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php //echo $cooa ; ?>%" class="css-bar m-b-0 css-bar-danger css-bar-<?php //echo $cooa ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                        
                                            <div class="col p-r-0">
<?php  /* $sqlaas = $this->db->query("SELECT * FROM dlc_user where user_status = '0'"); 
$cooas = $sqlaas->num_rows();*/?>
                                                <h1 class="font-light"><?php //echo $cooas ; ?></h1>
                                                <h6 class="text-muted">Inactive Users</h6></div>
                                            
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php //echo $cooas ; ?>%" class="css-bar m-b-0 css-bar-warning css-bar-<?php //echo $cooas ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            
                    </div>-->
                </div>
                <!-- End row -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
  <script type="text/javascript">
 /*window.onload = function() {
    document.getElementById('ifYes').style.display = 'none';
    document.getElementById('ifNo').style.display = 'none';
    document.getElementById('red').style.display = 'none';
    document.getElementById('pass').style.display = 'none';
    document.getElementById('des').style.display = 'none';
    document.getElementById('ddt').style.display = 'none';
  

}
function yesnoCheck(){
    if (document.getElementById('sel').value == '1') {
        document.getElementById('ifYes').style.display = 'block';
        document.getElementById('ifNo').style.display = 'none';
         document.getElementById('red').style.display = 'none';
         document.getElementById('pass').style.display = 'none';
          document.getElementById('des').style.display = 'block';
          document.getElementById('ddt').style.display = 'block';
          
        
    } 
    else if(document.getElementById('sel').value == '2') { 
        document.getElementById('ifNo').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
         document.getElementById('red').style.display = 'none';
         document.getElementById('pass').style.display = 'none';
          document.getElementById('des').style.display = 'block';
          document.getElementById('ddt').style.display = 'block';
          
       
   }
   else if(document.getElementById('sel').value == '3') {
        document.getElementById('red').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
         document.getElementById('ifNo').style.display = 'none';
         document.getElementById('pass').style.display = 'none';
          document.getElementById('des').style.display = 'block';
          document.getElementById('ddt').style.display = 'block';
                
        
   }
    else if(document.getElementById('sel').value == '4') { 
        document.getElementById('pass').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
         document.getElementById('ifNo').style.display = 'none';
          document.getElementById('red').style.display = 'none';
          document.getElementById('des').style.display = 'none';
          document.getElementById('ddt').style.display = 'none';

       
       
       
        
   }
   
   //   else if(document.getElementById('condos').checked) { 
   //      document.getElementById('coontra').style.display = 'block';
   //      document.getElementById('ifYes').style.display = 'none';
   //       document.getElementById('ifNo').style.display = 'none';
   //        document.getElementById('red').style.display = 'none';
       
        
   // }
}*/
$(document).ready(function() {
    $("#chkdwn2").click(function() {
       if ($(this).is(":checked")) { 
          $("#dropdown").prop("disabled", true);
       } else {
          $("#dropdown").prop("disabled", false);  
       }
    });
});
</script>  
    
 
   <?php include('footer.php');?>
   
</body>


</html>