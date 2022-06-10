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
       
     <?php include('header.php');?> 
     
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
                        <h4 class="page-title">View Reviews</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Reviews</a></li>
                                   
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
          
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                 
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
               
      
            
            
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                            <div class="card-body">
                                
                                
                <div class = 'row' >
                   
                     <div class = 'col-3'>
                         <span>Total Page</span>  
                         <p><?= $total_page ?> </p>  
                     </div>
                     
                      <div class = 'col-3'>
                          <lable>Select Page</lable>
                         <select class="form-control"  onchange = "pageFun(this.value)">
                        <?php  $page_no = $this->uri->segment(3); 
                            for($i =1 ; $i<= $total_page;$i++){?>
                                <option <?= ($page_no == $i)? 'selected': '' ?> > <?= $i ?></option>;
                      <?php  } ?>
                         </select> 
                      </div>              
                     </div> 
                                <!--<h4 class="card-title">File export</h4>-->
                                <!--<h6 class="card-subtitle">Exporting data from a table.</h6>-->
                                <div class="table-responsive">
                                <h3 id="success_msg" class="text-success"></h3>
                                <h3 id="error_msg" class="text-danger"></h3>
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                            <th>Sr.no.</th>
											<!--<th>Courses</th>-->
                                            <!--<th>Page Name</th>-->
                                            <th>Customer Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $i=1; foreach($con as $row){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                              
                                                <td><?php echo $row->customer_name;?></td>
                                                <td><?php echo $row->description;?></td>
                                          
                             
        <td>
            <div class="d-flex">
            <a href="<?=base_url("home/edit_review/$row->id")?>"><button class="btn btn-success mr-4"> Edit  </button></a>
        <a href="<?=base_url("home/delete_review/$row->id")?>" onclick="return confirm('Are you sure ?');"  ><button class="btn btn-danger"> Delete  </button></a>
        </div>
        </td>
        

        
              

                                            </tr><?php $i++;?>
                                     
                                
                      <?php }?>
                                            
                                        </tbody>
                                        <!--<tfoot>-->
                                        <!--   <tr>-->
                                        <!--   <th>Sr.no.</th>-->
                                        <!--     <th>Page Name</th>-->
                                        <!--    <th>Customer Name</th>-->
                                        <!--    <th>Title</th>-->
                                            
                                        <!--    <th colspan="2">Action</th>-->
                                                
                                        <!--    </tr> -->
                                        <!--</tfoot>  -->
                               </table>
                             


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
<script>
    function pageFun(page)
    {  
        var url = "<?= base_url('Home/view_reviews/') ?>"+page;
         window.location.href = url;
         return false;
    }
    
   
    
</script>

</body>

    

</html>