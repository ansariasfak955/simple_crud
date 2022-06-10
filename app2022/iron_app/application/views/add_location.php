<!DOCTYPE html>
<html dir="ltr" lang="en">
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
       <link href="<?php echo base_url();?>material/dist/css/style.min.css" rel="stylesheet">
     	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
   
     
     
      <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
    <style>
        .note-editable{
               background-color: white !important;
        }
    </style>   
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Location</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                   
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10">
                                <div class="lastmonth"></div>
                            </div>
                            
                        </div>
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
                <div class="row">
                    
                      <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Location</h4>
                                <form method="POST" action="<?php echo base_url();?>LocationMaster/add" class="m-t-20">
                                   <div class = 'row'>
                                    <div class=" form-group col-6">
                                        <lable>Enter Location name</lable>
                                        <input type="text" name="name" class="form-control" id="nametext" aria-describedby="name" placeholder="Name" required>

                                    </div>
                                    <div class=" form-group col-6">
                                     <input type="submit" name="submit" value="Submit" class="btn btn-info mt-4"></button>
                                     <button type="reset" class="btn btn-dark  mt-4 ">Reset</button>
                                     </div>
                                     </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                    
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
                                     <strong> <?php echo $mess2 ; ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php }?>
                               
                                <h4 class="card-title">Location List </h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Location Name</th>
                                              
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; foreach($view as $row){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row->location_name;?></td>
                                   <td>               
                                    <a href="#" data-toggle="modal" data-target="#edit<?php echo $row->location_id; ?>"><i class="ti-pencil"></i>&nbsp;&nbsp; </a>
       <a href="#" data-toggle="modal" data-target="#deletems<?php echo $row->location_id; ?>"><i class="ti-trash"></i></a>
       </td>
                                            </tr><?php $i++ ; ?>
                                            
                                            <div id="deletems<?php echo $row->location_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Delete Location</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Sure you want to delete this location</h4>
                                                <p></p>
                                               
                                            </div>
                                            <div class="modal-footer">
             <a href="<?php echo base_url()?>LocationMaster/delete/<?php echo $row->location_id; ?>">
           <button type="button" class="btn btn-default" id="modbutt">Yes</button></a>
           
           
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                
                                <!--edit-->
                                
                                <div id="edit<?php echo $row->location_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit - <?php echo $row->location_name;?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?php echo base_url();?>LocationMaster/update_Location">
                                                   <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Enter location name</label>
                                                        <input type="text" name="name" value="<?php echo $row->location_name;?>" class="form-control" id="recipient-name">
                                                    </div>
                                                    <input type = 'hidden' value = "<?= $row->location_id ?>" name = 'location_id' >
                                               </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <input type="submit" name="submit" class="btn btn-success" value="Update changes"> </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--edit-->
                                            
                                            <?php }?>
                                        </tbody>
                                    </table>


                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
               
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
 
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <?php //include('footer.php');?>
    
     <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
<script type="text/javascript">
	$('textarea').summernote({                              
        placeholder: '',                   
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['white']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>
    
    
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
    <!--<script src="<?php echo base_url();?>material/assets/extra-libs/sparkline/sparkline.js"></script>-->
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


<!-- Mirrored from wrappixel.com/demos/admin-templates/xtreme-admin/html/dark/table-layout-coloured.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Oct 2018 10:52:43 GMT -->
</html>