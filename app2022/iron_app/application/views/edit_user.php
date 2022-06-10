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
       <?php $this->load->view('header'); ?>
         <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/extra-libs/css-chart/css-chart.css">
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">User</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>User"<button class="btn btn-info" style="float:right;">View User</button></a>
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

 $mess1 = $this->session->flashdata('success_msg');  $mess2 = $this->session->flashdata('error_msg'); ?>
                                
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
                                <h4 class="card-title">About User
                                </h4></div>
                                <div class="col-md-8">
                                 <img src="<?php echo base_url();?>uploads/user/<?php echo $records[0]->user_image;?>" style="height:80px; width:100px; float:right;"><br>
                                 </div>
                                 </div>
                                 
                                 
                            </div>
                            <hr>
                          
                            <form action="<?= base_url('User/update_row') ?>" method="post" enctype="multipart/form-data">
                           
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputfname" class="control-label col-form-label">First Name</label>
                                            <input type="text" name="fname" class="form-control" id="inputfname" value="<?php echo $records[0]->user_fname;?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label">Last Name</label>
                                            <input type="text" name="lname" class="form-control" id="inputlname2" value="<?php echo $records[0]->user_lname;?>">
                                        </div>
                                    </div>
                                    
                                        <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Email</label>
                                            <input type="email" name="email" autocomplete="off" class="form-control" id="email1" value="<?php echo $records[0]->user_email;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="cono" class="control-label col-form-label">Contact No</label>
                                            <input type="number" name="contactno" class="form-control" id="cono" oninput="maxLengthCheck(this)" maxlength = "10" min = "1" max = "" value="<?php echo $records[0]->user_contact;?>">
                                        </div>
                                    </div>
                                  
                                     <div class="col-12 col-md-6">
                                     <label for="cono" class="control-label col-form-label">Profile Image</label>
                                     <input type="hidden" name="oldimage" value="<?php echo $records[0]->user_image;?>">
                                     <input type="hidden" name="uid" value="<?php echo $records[0]->user_id;?>">
                                    <div class="input-group mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Profile Image</span>
                                        </div>
                                        
                                        <div class="custom-file">
                                            <input type="file" name="image"  accept="image/*"   class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            
                           <!--  <div class="card-body">
                                <h4 class="card-title">Bank Detail</h4>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Account No.</label>
                                            <input type="number" name="account_no" class="form-control" id="conodf"  oninput="maxLengthCheck(this)" maxlength = "11" min = "1" max = "" value="<?php echo $records[0]->account_no;?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="wen1" class="control-label col-form-label">Bank Name</label>
                                            <input type="text" autocomplete="off" name="bankname" class="form-control" id="wen1" value="<?php echo $records[0]->bankname;?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="cono" class="control-label col-form-label">Ifsc No.</label>
                                            <input type="text" name="ifsc" class="form-control" id="conos" value="<?php echo $records[0]->ifsc;?>" oninput="maxLengthCheck(this)" maxlength = "8" min = "1" max = "" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Mirc code</label>
   <input type="text" name="mirccode" class="form-control" id="conosq" value="<?php echo $records[0]->mirccode;?>" required> 
                                        </div>
                                    </div>
                                    
                                    
                                     
                                    
                                    
                                </div>
                            </div> -->
                            
                            
                            <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Update</button>
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
<?php   $sqlaas = $this->db->query("SELECT * FROM dlc_user where user_status = '0' or user_status = ''"); 
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
    
    <script>
  function maxLengthCheck(object)
   {
 if (object.value.length > object.maxLength)
 object.value = object.value.slice(0, object.maxLength)
   }
  </script>
 
   
    <?php $this->load->view('footer'); ?>
</body>


</html>