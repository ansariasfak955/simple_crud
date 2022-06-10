<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
       
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                    
                 
       
       
	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
</head>
<style>
                                                                                
      textarea{
                width: 100%;
                height: 200px;
                font-size: 20px !important;
              }

</style>
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
       <!--<?php include('add_header.php');?>-->
        <?php include('header.php');?>
         <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/extra-libs/css-chart/css-chart.css">-->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Reviews</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Reviews </a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Reviews</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Home/view_reviews"><button class="btn btn-info" style="float:right;">View Reviews</button></a>
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
                         <?php 
   $succ = $this->session->flashdata('success_msg'); ?>
  <?php $fail = $this->session->flashdata('error_msg'); ?>
   
  <?php if($succ || $fail){?>
<div class="alert alert-success" id ="alt">
  <span ><?php echo $succ; ?> <?php echo $fail; ?> </span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
</div><?php } ?>
        <hr> <!--<?= base_url('Latest_updates/addAllpost') ?> -->
     
      <form method="POST" action="<?= base_url('Home/store_reviews') ?>" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                
                 <div class="col-sm-12">
                        <div class="form-group">
                            <label for="inputfname" class="control-label col-form-label">Customer Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name Here" required>
                        </div>
                    </div>
                  <div class="col-12 ">
                     <label class="control-label col-form-label">Description </label>
                         <textarea name = 'description' row="35" ></textarea>
                     <!--    <textarea id="demo-editor-bootstrap" name = 'description'> -->
                         
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
 

    <!-- Bootstrap tether Core JavaScript -->

    <!-- apps -->
    <script src="<?php echo base_url();?>material/dist/js/app.min.js"></script>
    <script src="<?php echo base_url();?>material/dist/js/app.init.dark.js"></script>
    <script src="<?php echo base_url();?>material/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
   <script src="<?php echo base_url();?>material/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <!-- <script src="<?php echo base_url();?>material/assets/extra-libs/sparkline/sparkline.js"></script> -->
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>material/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>material/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>material/dist/js/custom.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
  

  
</body>


</html>