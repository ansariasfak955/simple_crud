<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <title>Iron gate | Home</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>material/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>material/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>material/dist/css/style.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/libs/select2/dist/css/select2.min.css">
      
     
   
</head>
<!-- Mirrored from wrappixel.com/demos/admin-templates/xtreme-admin/html/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Oct 2018 10:51:17 GMT -->


<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!--<div class="preloader">-->
    <!--    <div class="lds-ripple">-->
    <!--        <div class="lds-pos"></div>-->
    <!--        <div class="lds-pos"></div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
    <?php include("header.php");?>
      
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
       
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                           
                            
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" style="height: 80vh;" >
                
                <div class="row">
                   <div class="col-md-12">
                                <div class="card border-bottom border-success">
                                    <div class="card-body">
                                         <a href="<?php echo base_url()?>User">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h6 class="text-success" style="font-size: 1.6rem;"> Users</h6>
                                            </div>
                                            <div class="ml-auto">
                                                <span class="text-success display-6"><i class="fas fa-user-circle"></i>
                                                    <?php foreach($viewuser as $rwus){
                                                        echo $ussr = $rwus->num_user;
                                                    } ?>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                       <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-row">
                                            <div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
                                            <div class="m-l-10 align-self-center">
                                                <h4 class="m-b-0">Total Received Amount</h4>
                                                <span class="text-muted">Include All Type Amount Received</span>
                                            </div>
                                            <div class="ml-auto align-self-center">
                                                <h2 class="font-medium m-b-0">
                                                <i class="fas fa-rupee-sign"></i> <?php 
                                                $mvs = $this->db->query("SELECT SUM(total) AS sum FROM  `dlc_orders`");
                                                    foreach($mvs->result_array() as $rwdd)
                                                    {
                                                     echo   $smdd= $rwdd['sum']; 
                                                    }
                                            
        ?>
        </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                  </div>             
            
            </div>
          
            <footer class="footer text-center">
       All Rights Reserved by Dlc admin. Designed and Developed by <a href="http://thinkdebug.com" target="_blank">Thinkdebug.com</a>.
</footer>
         
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
  <?php include("footer.php"); ?>
</body>

</html>