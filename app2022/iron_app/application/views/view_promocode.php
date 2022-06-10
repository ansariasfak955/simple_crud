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
                        <h4 class="page-title">Promocodes</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Promocodes</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
          <a href="<?php echo base_url();?>Promocodes/add_promocodes"><button class="btn btn-info" style="float:right;">Add Promocode</button></a> 
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
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                            <th>Sr.no.</th>
                                            <th>Promocode</th>
                                            <th>Message</th>
                                            <th>Start Date</th>
                                            <th>End date</th>
                                            <th>No Of Users</th>
                                            <th>Minimum Order Amount</th>
                                            <th>Discount</th>
                                            <th>Discount Type</th>
                                            <th>Max Discount Type</th>
                                            <th>Repeat Usage</th>
                                            <th>Number Of repeat Usage</th>
                                            <th>Minimum Order Amount</th>
                                            <th>Status</th>
                                           
                                            <!--<th>Is featured</th>-->
                                            <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $i=1; foreach($view as $row){?>
                                           
                                            
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row->promo_code;?></td>
                                                <td><?php echo $row->message;?></td>  
                                                <!--<td><img height="50px"width="50px" src="<?= base_url('common_uploads/product_images/'.$row->prod_image)?>" alt=""></td>-->
                                                <td><?php echo $row->start_date;?></td>
                                                <td><?php echo  $row->end_date ;?></td>
                                                <td><?php echo  $row->no_of_users ;?></td>
                                                <td><?php echo  $row->minimum_order_amount ;?></td>
                                                <td><?php echo  $row->discount ;?></td>
                                                <td><?php echo  $row->discount_type ;?></td>
                                                <td><?php echo  $row->max_discount_amount ;?></td>
                                                <td><?php echo  $row->repeat_usage ;?></td>
                                                <td><?php echo  $row->no_of_repeat_usage ;?></td>
                                                <td><?php echo  $row->status ;?></td>
                                                <!--<td><a class="btn btn-success" href="<?=base_url('Product/product_gallary/'.$row->prod_id)?>">View</a></td>-->
                                               
                                                
  <td><select id="statuss" name="status" size="1" onChange="stat(this.value,<?php echo $row->prod_id; ?>)">
              
                                    <option value="1" <?php if($row->status == '1') echo "selected"; ?>>Active</option>
                                    <option value="0" <?php if($row->status == '0') echo "selected"; ?>>Inactive</option>
                                   
                                    
                                          </select></td>
                                               
                                                
                                              
                                                            
                                           <td>
<a href="<?php echo base_url('Promocodes/edit/').$row->id;?>"><i class="ti-pencil"></i>&nbsp;&nbsp; </a>


 <a href="<?php echo base_url('Promocodes/delete_promocode/').$row->id;?>"onclick="return confirm('Are you sure ?')"><i class="ti-trash"></i></a>
       
       
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
    
     <script>

function stat(strs,prod_id)
{ 
  xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
   { 
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
    { 
            
   }
   };
      xmlhttp.open("GET","<?php echo base_url(); ?>Product/status?status="+strs+ "&prod_id="+prod_id,true);
    xmlhttp.send();
   
}
</script>
                            


    
    <?php include('footer.php');?>
    
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