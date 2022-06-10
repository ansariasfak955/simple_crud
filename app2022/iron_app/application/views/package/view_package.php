<!DOCTYPE html>
<html dir="ltr" lang="en">
 <style>

</style>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
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
       
     <?php $this->load->view('header');?> 
     
           <link href="<?php echo base_url();?>material/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

           <!--<link href="<?php echo base_url();?>material/dist/css/page.css" rel="stylesheet">-->
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>material/dist/css/style.min.css" rel="stylesheet">
        
        
         <link href="<?php echo base_url();?>material/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Packages</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View new Packages</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
          <a href="<?php echo base_url();?>Package/new_package"><button class="btn btn-info" style="float:right;">Add New Package</button></a>
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


<?php 
   $succ = $this->session->flashdata('success_msg'); ?>
  <?php $fail = $this->session->flashdata('error_msg'); ?>
   <?php $updt = $this->session->flashdata('successm_msg'); ?>
  <?php if($succ || $fail || $updt){?>
<div class="alert alert-success" id ="alt">
  <span ><?php echo $succ; ?> <?php echo $fail; ?> <?php echo $updt; ?></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
</div><?php }?> 


               

                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">File export</h4>
                                <h6 class="card-subtitle">Exporting data from a table.</h6>
                                <div class="table-responsive text-center ">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                            <th>Sr.no.</th>
                                            <th>Image</th>
                                            <th>Package Name</th>
                                            <th>Price</th>
                                            <th>Offer Price</th>
                                            <th>Time Period</th>
                                            <th>Action</th>
                        
                           <!--`pack_new_id`, `name`, `price`, `offer_price`, `time_days`, `image`, `description`, `date`-->                     
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $i=1; foreach($data as $row){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><img src = "<?= is_null($row->image)? '' : base_url('assets/package/').$row->image ?>" width ='60'></td>
                                                <td><?php echo $row->name;?></td>
                                                <td><?php echo $row->price;?></td>
                                                <td><?php echo  $row->offer_price ;?></td>
                                               
                                                <td><?php echo $row->time_days;?></td>
                                       <td>
<a href="<?= base_url('Package/new_package/').$row->pack_new_id ?>"><i class="ti-pencil"></i>&nbsp;&nbsp; </a>
 <a href="#" style="display:none;" data-toggle="modal" data-target="#deletems<?php echo $row->pack_new_id; ?>"><i class="ti-trash"></i></a>
       
       
       </td>
                                            </tr><?php $i++;?>
                                            
                                            <div id="deletems<?php echo $row->pack_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Delete Package</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Sure you want to delete this Package.</h4>
                                                <p></p>
                                               
                                            </div>
                                            <div class="modal-footer">
             <a href="<?php echo base_url()?>Package/delete/<?php echo $row->pack_id; ?>">
           <button type="button" class="btn btn-default" id="modbutt">Yes</button></a>
           
           
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                
                                
                      <?php }?>
                                            
                                          
                                           
                                        </tbody>
                                        <tfoot>
                                           <tr>
                                            <th>Sr.no.</th>
                                            <th>Image</th>
                                            <th>Package Name</th>
                                            <th>Price</th>
                                            <th>Offer Price</th>
                                            <th>Time Period</th>
                                            
                                             <th>Action</th>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
                                    
                                    
<!-- <div id="pagination">-->
<!--<ul class="tsc_pagination">-->


<!--<li> <p></p></li>-->

<!--</ul>-->
<!--</div> -->


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
         
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
 
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    
    
   


    
    <?php //include('footer.php');?>
    
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