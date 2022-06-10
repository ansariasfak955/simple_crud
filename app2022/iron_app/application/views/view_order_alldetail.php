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
           <link href="<?php echo base_url();?>material/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

           <!--<link href="<?php echo base_url();?>material/dist/css/page.css" rel="stylesheet">-->
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>material/dist/css/style.min.css" rel="stylesheet">
        
        
         <link href="<?php echo base_url();?>material/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Orders</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Orders</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Orders/select_all_order"<button class="btn btn-info" style="float:right;">View Orders</button></a>
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
                            <div class="card-body">                           
                              
                                <h6 class="card-subtitle"></h6>
                                <h4 class="card-title">Order Details</h4>
                            </div>
                         
                         
                            <?php foreach($ordetail as $row){
                                      
                                    $uid = $row->user_id;

                                   } ?>

        <?php   $queryt = $this->db->query("SELECT * FROM dlc_user where user_id = '$uid'");
foreach ($queryt->result() as $row)
{ 
$uf = $row->user_fname;
$ul = $row->user_lname;
$uemail = $row->user_email;
$umobile = $row->user_contact;



    }?>    

                           
                           
                           
                           
                            <div class="card-body">
                                
                         <?php
                         if(isset($user_order_list) && count($user_order_list) > 0){
                         foreach($user_order_list as $row){
                        
                        
                         
                       //  echo"<pre>";print_r($user_order_list);die();
                        
                        
                        
                         ?>
                                <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label"> Name</label>
                                                <input type="text" name="name" class="form-control" id="inputfname" value="<?php echo $row['user_fname'];?>" readonly>
                                            </div>
                                        </div>
                                  
                                    
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Email</label>
                                            <input type="text" name="email" autocomplete="off" class="form-control" id="email1" value="<?php echo $row['user_email']; ?>" readonly >
                                        </div>
                                    </div>
                                    
                                
                               
                                    <div class="col-12  col-md-6">
                                        <div class="form-group">
                                            <label for="cono" class="control-label col-form-label">Contact No</label>
                                            <input type="text" name="contactno" class="form-control" id="cono" value="<?php echo $row['user_contact'];; ?>">
                                        </div>
                                    </div>
                                 
                                    
                                </div>
                            <?php } } ?></div>
                            <hr>
                           
                        </div>
                    </div>


                </div>


                 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">File export</h4>
                                <h6 class="card-subtitle">Exporting data from a table.</h6>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Sr.no.</th>
                                                <th>Package Name</th>                                           
                                                <th>Order Quantity</th>
                                                <th>Price</th>
                                               
                                             
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                               // echo "<pre>"; print_r($ordetail);
                                        
                                        $i=1; foreach($order_detail_list as $roww){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td>
                                                 <?php 
                                              echo  $pkid = $roww->prod_name;
                                                
                                                
                    
                                                 ?>
                                                </td>
                                                <td>
                                                    <?php echo   $q = $roww->quantity; ?>
                                                </td>                                             
                                                
                                                <td>
                                                    <?php
                                                       $p = $roww->offer_price;
                                                       if($q)
                                                        {    
                                                       echo  $t = ($q*$p);
                                                        }else{
                                                             echo  $p;
                                                        }
                                                       $tt +=$t;

                                                     ?>
                                                   
                                                </td>
                            

                                               
                                            </tr><?php $i++;?>
                                            
                                          
                                
                                
                      <?php }?>
                                            
                                          
                                           
                                        </tbody>
                                        <tfoot>
                                           <tr>
                                           
                                              <th>Sr.no.</th>
                                                <th>Package Name</th>                                             
                                                <th>Order Quantity</th>
                                                <th>Price</th>
                                            </tr> 
                                        </tfoot>
                                    </table>
                                    
                                    
<!-- <div id="pagination">-->
<!--<ul class="tsc_pagination">-->


<!--<li> <p></p></li>-->

<!--</ul>-->
<!--</div>-->


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
    
   
 
   <?php
   
    ?>
     <script src="<?php echo base_url();?>material/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>material/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>material/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?php echo base_url();?>material/dist/js/app.min.js"></script>
    <script src="<?php echo base_url();?>material/dist/js/app.init.dark.js"></script>
    <script src="<?php echo base_url();?>material/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>material/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url();?>material/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>material/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>material/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>material/dist/js/custom.min.js"></script>
    
    
     <script src="<?php echo base_url();?>material/assets/extra-libs/DataTables/datatables.min.js"></script>
      <script src="<?php echo base_url();?>material/cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>material/cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>material/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="<?php echo base_url();?>material/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>material/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>material/cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>material/cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
   <script src="<?php echo base_url();?>material/dist/js/pages/datatable/datatable-advanced.init.js"></script>
   
</body>


</html>