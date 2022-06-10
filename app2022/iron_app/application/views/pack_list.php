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
                        <h4 class="page-title">Manage Package</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Package</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                  <!-- <div class="col-7 align-self-center">
          <a href="<?php echo base_url();?>Rating/add_ret"><button class="btn btn-info" style="float:right;">Add Reviews</button></a>
                    </div>-->
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<?php 
   $succ = $this->session->flashdata('success_msg'); ?>
  <?php $fail = $this->session->flashdata('error_msg'); ?>
  <?php if($succ || $fail){?>
<div class="alert alert-success" id="alt">
  <strong></strong><?php echo $succ; ?> <?php echo $fail; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
</div><?php }?>  
                                <h4 class="card-title">File export</h4>
                                <h6 class="card-subtitle">Exporting data from a table.</h6>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                            <th>Sr.no.</th>
                                            <!--<th>Gym Name</th>
                                                <th>Email</th>
                                                <th>Gym Location</th>
                                                <th>Date</th>-->
                                                <th>Users Name</th>
											
                                                <th>Date</th>
                                               
											
                                                <th>View</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $i=1; foreach($view as $row){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                               <td>
                                               
                                               <?php
                                                   $user = $row->user_id;
                                                   $sql = $this->db->query("select * from dlc_user where user_id = '$user'");
                                                   foreach($sql->result_array() as $rr)
                                                     {
                                                       
                                                        echo $rr['user_fname'];

                                                     }


                                                    ?>
                                               
                                               
                                               </td>
                                               
                                               
                                                <td><?php echo $row->date;?></td>
                                               <td><a href="<?php echo base_url();?>Rating/packdg/<?php echo $row->pack_id; ?>"><button class="btn btn-success">Pack Details</button></a></td>
                                               
                                               
												
												
											
           
                                          <!-- <td>
<a href="<?php echo base_url();?>Coupon/update_rows/<?php echo $row->rating_id; ?>"><i class="ti-pencil"></i>&nbsp;&nbsp; </a>
 <a href="#" data-toggle="modal" data-target="#deletems<?php echo $row->rating_id; ?>"><i class="ti-trash"></i></a>
       
       
       </td>-->
                                            </tr><?php $i++;?>
                                            
                                            <div id="deletems<?php echo $row->rating_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Delete Rating</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Are you sure you want to delete this Rating?.</h4>
                                                <p></p>
                                               
                                            </div>
                                            <div class="modal-footer">
             <a href="<?php echo base_url()?>Rating/delete/<?php echo $row->rating_id; ?>">
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
                                            <!--<th>Gym Name</th>
                                                <th>Email</th>
                                                <th>Gym Location</th>
                                                <th>Date</th>-->
                                                <th>Users Name</th>
											
                                                <th>Date</th>
                                                
												
                                                <th>View</th>
                                                
                                            </tr>	
                                        </tfoot>
                                    </table>
                                    
                             <?php if (isset($employeeInfo) && is_array($employeeInfo)) echo $page_links; ?>         
<!-- <div id="pagination">-->
<!--<ul class="tsc_pagination">-->

<!-- Show pagination links -->
<!--<li> <p></p></li>-->

<!--</ul>-->
<!--</div>-->


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

function stat(strs,id)
{ xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
   { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
         { 
             document.getElementById("respss").innerHTML = xmlhttp.responseText;
   }
   };
      xmlhttp.open("GET","<?php echo base_url(); ?>Rating/status?status="+strs+ "&id="+id,true);
      //alert("<?php echo base_url(); ?>Rating/status?status="+strs+ "&id="+id);
    xmlhttp.send();
   document.getElementById("hid").style.display = "none" ; 
}
</script>


    
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
   <!-- <script src="<?php echo base_url();?>material/assets/extra-libs/sparkline/sparkline.js"></script>-->
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
//$(document).ready(function(){
  //  $("#alt").delay(5000).slideUp(300);
//});
 $('#alt').fadeOut(5000);
</script> 
</body>



</html>