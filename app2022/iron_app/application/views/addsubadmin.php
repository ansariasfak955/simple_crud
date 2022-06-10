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
                        <h4 class="page-title">Employees</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Employees</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Subadmin/select_subadmin_data"<button class="btn btn-info" style="float:right;">View Employees</button></a>
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
                    <div class="col-12">
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
                                <h4 class="card-title">Add Employees</h4>
                            </div>
                            <hr>
                        <form method="POST" action="<?php echo base_url();?>Subadmin/add_subadmin" enctype="multipart/form-data">
                            
                           
                            <div class="card-body">
                               
                                
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputfname" class="control-label col-form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="inputfname"  required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label" >Email</label>
                                            <input type="email" name="email" class="form-control" id="inputlname2" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label">Contact No.</label>
                                            <input type="number" name="contactno" class="form-control" id="inputlname2" required="" oninput="maxLengthCheck(this)" maxlength = "10" min = "1" max = "">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12 col-md-6">                      
                                       <div class="form-group">
                                            <label for="prodname" class="control-label col-form-label"> Employees Type</label>
                                            <select name="emp_type" id="prod_cat" class="form-control" required >
                                                <option value="">Select Type </option>
                                                <?php foreach($type_list as $val) {?>
                                                    <option value="<?= $val->emp_type_id ?>"><?= $val->emp_type ?></option>
                                                <?php } ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    
                                        <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label">Password</label>
                                            <input type="password" name="password" autocomplete="off"  class="form-control" id="inputlname2" required>
                                        </div>
                                       </div>
                                      
                                         
                                      
                                    </div>
                                   
                                    <label for="inputlname2" class="control-label col-form-label">Roles</label>
                                    <div class="row">
                                         
                                       
                                         <div class="col-sm-12 col-md-3">
                                          <div class="form-group">
                                              <input type="checkbox" name="check_cat" value="Category">
                                            <label for="inputlname2" class="control-label col-form-label">Category</label>
                                          
                                        </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3">
                                          <div class="form-group">
                                              <input type="checkbox" name="check_user" value="User">
                                            <label for="inputlname2" class="control-label col-form-label">User</label>
                                          
                                        </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3">
                                          <div class="form-group">
                                              <input type="checkbox" name="check_order" value="Order">
                                            <label for="inputlname2" class="control-label col-form-label">Order</label>
                                          
                                        </div>
                                       </div>
                                      
                                        <div class="col-sm-12 col-md-3">
                                          <div class="form-group">
                                              <input type="checkbox" name="check_quiz" value="Quiz">
                                            <label for="inputlname2" class="control-label col-form-label">Quiz</label>
                                          
                                        </div>
                                       </div>
                                        <div class="col-sm-12 col-md-3">
                                          <div class="form-group">
                                              <input type="checkbox" name="check_advertise" value="Advertisement">
                                            <label for="inputlname2" class="control-label col-form-label">Advertisement</label>
                                          
                                        </div>
                                       </div>
                                        <div class="col-sm-12 col-md-3">
                                          <div class="form-group">
                                              <input type="checkbox" name="check_word" value="Video">
                                            <label for="inputlname2" class="control-label col-form-label">Video</label>
                                          
                                        </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3">
                                          <div class="form-group">
                                              <input type="checkbox" name="check_page" value="Page">
                                            <label for="inputlname2" class="control-label col-form-label">Page</label>
                                          
                                        </div>
                                       </div>
                                       
                                        <div class="col-sm-12 col-md-3">
                                          <div class="form-group">
                                              <input type="checkbox" name="check_package" value="Package">
                                            <label for="inputlname2" class="control-label col-form-label">Package</label>
                                          
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

     <script>
  function maxLengthCheck(object)
   {
 if (object.value.length > object.maxLength)
 object.value = object.value.slice(0, object.maxLength)
   }
  </script>
      
 
   <?php include('footer.php'); ?>
   
</body>


</html>