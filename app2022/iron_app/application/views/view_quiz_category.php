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
      <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Quiz Category</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Quiz Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10">
                                <div class="lastmonth"></div>
                            </div>
                            <div class=""><small>LAST MONTH</small>
                                <h4 class="text-info m-b-0 font-medium">$58,256</h4></div>
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
                                <h4 class="card-title">Quiz Category</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>Id</th>
                                                <th>Category Name</th>
                                                <th>Image</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; foreach($views as $row){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row->quizcat_name;?></td>
                                                <td><img src="<?php echo base_url();?>upload/quizcategory/<?php echo $row->quizcat_image;?>" style="height:60px; width:80px;"></td>
       <!-- <td>
       <a href="#" data-toggle="modal" data-target="#edit<?php echo $row->quizcat_id; ?>"><i class="ti-pencil"></i>&nbsp;&nbsp; </a>
       <a href="#" data-toggle="modal" data-target="#deletems<?php echo $row->quizcat_id; ?>"><i class="ti-trash"></i></a>
       </td> -->
                                            </tr><?php $i++ ; ?>
                                            
                                            <!-- <div id="deletems<?php echo $row->quizcat_id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Delete Category</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Sure you want to delete this category</h4>
                                                <p></p>
                                               
                                            </div>
                                            <div class="modal-footer">
             <a href="<?php echo base_url()?>Quiz/delete/<?php echo $row->quizcat_id; ?>">
           <button type="button" class="btn btn-default" id="modbutt">Yes</button></a>
           
           
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                       
                                    </div>
                                   
                                </div> -->
                                
                                <!--edit-->
                                
                               <!--  <div id="edit<?php echo $row->quizcat_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit - <?php echo $row-> quizcat_name;?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?php echo base_url();?>Quiz/update_row" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Category:</label>
                                                        <input type="text" name="name" value="<?php echo $row->quizcat_name;?>" class="form-control" id="recipient-name">
                                                    </div>
                                                    
                                                    
                                                    
                                                    <img src="<?php echo base_url();?>upload/quizcategory/<?php echo $row->quizcat_image;?>" style="height:60px; width:80px;">
                       <input type="hidden" name="oldimage" value="<?php echo $row->quizcat_image;?>">
                        <input type="hidden" name="id" value="<?php echo $row->quizcat_id;?>">
                                                    <div class="input-group mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <input type="submit" name="submit" class="btn btn-success" value="Update changes"> </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!--edit-->
                                            
                                            <?php }?>
                                        </tbody>
                                    </table>

         <div id="pagination">
<ul class="tsc_pagination">


<li> <p><?php echo $links; ?></p></li>

</ul>
</div>

                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Category</h4>
                                <form method="POST" action="<?php echo base_url();?>Quiz/add" enctype="multipart/form-data" class="m-t-20">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="nametext" aria-describedby="name" placeholder="Name">
                                        <small id="name" class="form-text text-muted">Enter category name</small>
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                   
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
    <?php include('footer.php');?>
</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/xtreme-admin/html/dark/table-layout-coloured.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Oct 2018 10:52:43 GMT -->
</html>