<!DOCTYPE html>
<html dir="ltr" lang="en">
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
                        <h4 class="page-title">Passage Question</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Question</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Quiz/select_quiz"<button class="btn btn-info" style="float:right;">Add Passage Question</button></a>
                    </div> -->
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
                    <div class="col-sm-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                               
                                <h6 class="card-subtitle"></h6>
                                <h4 class="card-title">Quiz</h4>
                            </div>
                            <hr>
                            <form method="POST" action="<?php echo base_url();?>Quiz/add_pass_question" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Passages</label>
                                             
                                       <select class="form-control" id="sel" name="selpass">

                                                    <option value="">Selected</option>
                                     <?php 
                                       $sql = $this->db->query("select * from dlc_quiz_passage");
                                              foreach($sql->result_array() as $rr)
                                              {
                                                $dsc = $rr['passage'];
                                                             
                                                ?>
                                                <option value="<?php echo $rr['passage_id'];?>">
                                                    <?php 
                                                    if(strlen($dsc)>10){ echo substr($dsc,0,20)."...";}
                                                else {echo $dsc;}
                                                    ?>
                                                </option>
                                                
                                            <?php
                                              }
                                              ?>     

                                        </select>
                                        </div>
                                        </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label"> Date</label>
                                            <input type="date" name="dtpass" class="form-control" id="inputlname2" required>
                                        </div>
                                    </div>                               
                                                           
                                </div>
                                <div class="row">
                                     
                                     <div class="col-sm-12 col-md-12" id="ifNo">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Passage Questions</label> <br>
                                         <div class="row">

                                         <div class="col-md-6">  
                                      
                                       <label for="email1" class="control-label col-form-label">A</label>
                                       <input type="text" class="form-control" name="multipass[]">
                                         </div>
                                         <div class="col-md-6">
                                      
                                        <label for="email1" class="control-label col-form-label">B</label>
                                       <input type="text" class="form-control" name="multipass[]">
                                        </div>
                                        </div>
                                       <br>
                                       <div class="row">
                                       <div class="col-md-6">
                                      
                                        <label for="email1" class="control-label col-form-label">C</label>
                                       <input type="text" class="form-control" name="multipass[]">
                                        </div><br>
                                        <div class="col-md-6">
                                      
                                        <label for="email1" class="control-label col-form-label">D</label>
                                       <input type="text" class="form-control" name="multipass[]">
                                        </div>
                                        </div><br>
                                          
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                                                

                            <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                        <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                           
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                       
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
<?php   $sqla = $this->db->query("SELECT * FROM dlc_user"); 
$coo = $sqla->num_rows();?>
                                                <h1 class="font-light"><?php echo $coo ; ?></h1>
                                                <h6 class="text-muted">Total Users</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $coo ; ?>%" class="css-bar m-b-0 css-bar-primary css-bar-<?php echo $coo ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
<?php   $sqlaa = $this->db->query("SELECT * FROM dlc_user where user_status = '1'"); 
$cooa = $sqlaa->num_rows();?>
                                                <h1 class="font-light"><?php echo $cooa ; ?></h1>
                                                <h6 class="text-muted">Active Users</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $cooa ; ?>%" class="css-bar m-b-0 css-bar-danger css-bar-<?php echo $cooa ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
<?php   $sqlaas = $this->db->query("SELECT * FROM dlc_user where user_status = '0'"); 
$cooas = $sqlaas->num_rows();?>
                                                <h1 class="font-light"><?php echo $cooas ; ?></h1>
                                                <h6 class="text-muted">Inactive Users</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $cooas ; ?>%" class="css-bar m-b-0 css-bar-warning css-bar-<?php echo $cooas ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            
                    </div>
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
/*
 window.onload = function() {
    document.getElementById('ifYes').style.display = 'none';
    document.getElementById('ifNo').style.display = 'none';
    document.getElementById('red').style.display = 'none';
    document.getElementById('pass').style.display = 'none';

}
function yesnoCheck(){
    if (document.getElementById('sel').value == '1') {
        document.getElementById('ifYes').style.display = 'block';
        document.getElementById('ifNo').style.display = 'none';
         document.getElementById('red').style.display = 'none';
         document.getElementById('pass').style.display = 'none';
        
    } 
    else if(document.getElementById('sel').value == '2') { 
        document.getElementById('ifNo').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
         document.getElementById('red').style.display = 'none';
         document.getElementById('pass').style.display = 'none';
       
   }
   else if(document.getElementById('sel').value == '3') {
        document.getElementById('red').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
         document.getElementById('ifNo').style.display = 'none';
         document.getElementById('pass').style.display = 'none';
       
        
   }
    else if(document.getElementById('sel').value == '4') { 
        document.getElementById('pass').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
         document.getElementById('ifNo').style.display = 'none';
          document.getElementById('red').style.display = 'none';
       
        
   }
   
  
}
*/
</script>

   
    
   <?php include('footer.php');?>
   
</body>


</html>