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
                        <h4 class="page-title">Rating</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Rating</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Rating/viewreview"<button class="btn btn-info" style="float:right;">View Rating</button></a>
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
                    <div class="col-sm-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
<?php

 $mess1 = $this->session->flashdata('success_msg');  $mess2 = $this->session->flashdata('error_msg');   ?>
                                
                                <?php if($mess1 || $mess2){?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="badge badge-info"><i class="fas fa-info"></i></span>
                                    <strong> <?php echo $mess1 ; ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php }?>
                                
                                <h6 class="card-subtitle"></h6>
                                 <div class="row">
                                <div class="col-md-4">
                                <h4 class="card-title">About Rating
                                </h4></div>
                               
                                 </div>
                                 
                                 
                            </div>
                            <hr>
                            <form method="POST" action="<?php echo base_url();?>Rating/update_row">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputfname" class="control-label col-form-label">Package </label>

                                           <select class="form-control" name="ppk">
                                             <option>Select</option>

                                             <?php
                                           $pkid = $records[0]->pack_id;

                                    $ssql = $this->db->query("select * from dlc_course_package where pack_id = '$pkid'");  
                                      foreach($ssql->result_array() as $rds)
                                           { 

                                           ?>
                                            <option value="<?php echo $rds['pack_id']; ?>" selected=""><?php echo $rds['pack_name']; ?></option>
                                         <?php } ?>

                                             <?php 

                                    $ssqls = $this->db->query("select * from dlc_course_package where pack_id != '$pkid'");  
                                      foreach($ssqls->result_array() as $rdsw)
                                           { 
                                              ?>
                                        <option value="<?php echo $rdsw['pack_id']; ?>"><?php echo $rdsw['pack_name']; ?></option>
                                             <?php } ?>
                                           </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label">User </label>
                                      
                                          
                                           <select class="form-control" name="usre">
                                               <option>Selected</option>

                                                <?php
                                          $usrid =  $records[0]->user_id;
                                    $ssqln = $this->db->query("select * from  dlc_user where user_id = '$usrid'");  
                                      foreach($ssqln->result_array() as $rdsn)
                                           { 

                                           ?>
                                            <option value="<?php echo $rdsn['user_id']; ?>" selected=""><?php echo $rdsn['user_fname']; ?></option>
                                         <?php } ?> 

                                         <?php
                                         
                                    $ssqlnm = $this->db->query("select * from  dlc_user where user_id != '$usrid'");  
                                      foreach($ssqlnm->result_array() as $rdsnm)
                                           { 

                                           ?>

                                         <option value="<?php echo $rdsnm['user_id']; ?>"><?php echo $rdsnm['user_fname']; ?></option> 
                                         <?php } ?>
                                           </select>
                                        </div>
                                    </div>
                                    
                                        <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="rating" class="control-label col-form-label">Rating</label>
                                            <input type="text" name="rts" autocomplete="off" class="form-control" id="rating" value="<?php echo $records[0]->rateStar;?>" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="cono" class="control-label col-form-label">Comment</label>
                                            <textarea class="form-control" name="cmtss" rows="6"> <?php echo $records[0]->comment;?></textarea>
                                            <input type="hidden" name="rtng_id" value="<?php echo $records[0]->rating_id;  ?>">
                                        </div>
                                    </div>
                                  
                                     
                                </div>
                            </div>
                            <hr>
                            
                         
                            
                            <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                        <button type="reset" class="btn btn-dark waves-effect waves-light">Cancel</button>
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
    
   
 
   <?php include('footer.php');?>
   
</body>

</html>