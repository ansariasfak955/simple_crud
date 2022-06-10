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
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>material/assets/images/favicon.png">
    <title>HM admin | Home</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>material/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>material/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>material/dist/css/style.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/libs/select2/dist/css/select2.min.css">
      
     
   
</head>
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
	  <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">View Subcategory</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Subcategory</li>
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Subcategory</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display" >
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Subcategory Name</th>
                                                <th>Category Name</th>
                                                <!-- <th>Image</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; foreach($views as $row){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row->sbcat_name;?></td>
                                                <td><?php $cid= $row->cat_id;
												 $sqlas = $this->db->query("SELECT * FROM dlc_category where cat_id='$cid'"); foreach($sqlas->result_array() as $rocas){ echo $rocas['cat_name']; }
													 ?></td>
                                                <!-- <td><img src="<?php echo base_url();?>upload/subcategory/<?php echo $row->sbcat_image;?>" style="height:60px; width:80px;"></td> -->
       <td>
       <a href="#" data-toggle="modal" data-target="#edit<?php echo $row->sbcat_id; ?>"><i class="ti-pencil"></i>&nbsp;&nbsp; </a>
       <a href="#" data-toggle="modal" data-target="#deletems<?php echo $row->sbcat_id; ?>"><i class="ti-trash"></i></a>
       </td>
                                            </tr><?php $i++ ; ?>
											
											<div id="deletems<?php echo $row->sbcat_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Delete Subcategory</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Sure you want to delete this subcategory</h4>
                                                <p></p>
                                               
                                            </div>
                                            <div class="modal-footer">
             <a href="<?php echo base_url()?>Subcategory/deletesub/<?php echo $row->sbcat_id; ?>">
           <button type="button" class="btn btn-default" id="modbutt">Yes</button></a>
           
           
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                
                                <!--edit-->
                                
                                <div id="edit<?php echo $row->sbcat_id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit - <?php echo $row->    sbcat_name;?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?php echo base_url();?>Subcategory/update_rowsub" enctype="multipart/form-data">
                                                  <div class="form-group">
                                                   <select name="category_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                   <?php  $cid= $row->cat_id;
												    $sqla = $this->db->query("SELECT * FROM dlc_category where cat_id='$cid'"); foreach($sqla->result_array() as $rocs){?>
                                    <option value="<?php echo $rocs['cat_id'];?>"><?php echo $rocs['cat_name'];?></option><?php }?>
 <?php   $sqls = $this->db->query("SELECT * FROM dlc_category where cat_id!='$cid'");
  foreach($sqls->result_array() as $rocss){ ?>
                   <option value="<?php echo $rocss['cat_id'];?>"><?php echo $rocss['cat_name'];?></option><?php }?>

                                  </select>
                                                  </div>
                                  
                                  
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Subcategory:</label>
                                                        <input type="text" name="name" value="<?php echo $row->sbcat_name;?>" class="form-control" id="recipient-name">
                                                    </div>
                                                    
                                                    
                                                    
                                                    <!-- <img src="<?php echo base_url();?>upload/subcategory/<?php echo $row->sbcat_image;?>" style="height:60px; width:80px;">
                       <input type="hidden" name="oldimage" value="<?php echo $row->sbcat_image;?>"> -->
                        <input type="hidden" name="id" value="<?php echo $row->sbcat_id;?>">
                                                    <div class="input-group mb-3">
                                                    
                                       <!--  <div class="input-group-prepend">
                                            <span class="input-group-text">Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div> -->
                                    </div>
                                    
                                               
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
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Subategory</h4>
                                <form method="POST" action="<?php echo base_url();?>Subcategory/addsub" enctype="multipart/form-data" class="m-t-20">
                                <div class="form-group">
                      <select name="category_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                    <option>Select</option>
 <?php   $sql = $this->db->query("SELECT * FROM dlc_category"); foreach($sql->result_array() as $roc){ ?>
                   <option value="<?php echo $roc['cat_id'];?>"><?php echo $roc['cat_name'];?></option><?php }?>

                                  </select>
                                  </div>
                                
                                
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="nametext" aria-describedby="name" placeholder="Name" required>
                                        <small id="name" class="form-text text-muted">Enter subcategory name</small>
                                    </div>
                                    
                                    <!-- <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div> -->
                                   
                                     <input type="submit" name="submit" value="Submit" class="btn btn-info"></button>
                                     <button type="reset" class="btn btn-dark">Reset</button>
                                </form>
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