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
                        <h4 class="page-title">Ratings</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Ratings</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Rating/viewreview"<button class="btn btn-info" style="float:right;">View Ratings</button></a>
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

 $mess1 = $this->session->flashdata('success_msg');  $mess2 = $this->session->flashdata('error_msg'); 
   ?>
                                
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
                                <h4 class="card-title">About Ratings</h4>
                            </div>
                            <hr>
                            <form method="POST" action="<?php echo base_url();?>Rating/add" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Package Name</label>
                                               <!--  <input type="text" name="fname" class="form-control" id="inputfname" placeholder="Package Name Here" required> -->
                                               <select class="form-control" name="pack">
                                                 <option>Select</option> 
                                                 <?php 
                            $ssqld = $this->db->query("select * from dlc_course_package");
                                      foreach($ssqld->result_array() as $rwd) 
                                      {

                                      ?>
                                      <option value="<?php echo $rwd['pack_id']; ?>"><?php echo $rwd['pack_name']; ?></option>
                                     <?php } ?>
                                               </select>
                                            </div>
                                        </div>
                                    
                                    
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Ratings</label>
                                            <input type="number" name="ratt" autocomplete="off" class="form-control"  placeholder="Ratings" required onKeyPress="if(this.value.length==1) return false;"/>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="wen1" class="control-label col-form-label">Comments</label>
                                            
                                            <textarea name="cmt" rows="6" class="form-control" autocomplete="off" required placeholder="Comments"></textarea>
                                        </div>
                                    </div>
                                  
                                     
                                </div>
                            </div>
                            <hr>
                          
                               

                            <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save</button>
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
    
    
     <script type="text/javascript">
          
          jQuery(document).ready(function () {
      jQuery("#fieldSelectorId").keypress(function (e) {
         var length = jQuery(this).val().length;
       if(length > 4) {
            return false;
       } else if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
       } else if((length == 0) && (e.which == 48)) {
            return false;
       }
      });
    });
         </script>
    
    <script>
  function maxLengthCheck(object)
   {
 if (object.value.length > object.maxLength)
 object.value = object.value.slice(0, object.maxLength)
   }
  </script>
 
   <?php include('footer.php');?>
   
</body>


</html>