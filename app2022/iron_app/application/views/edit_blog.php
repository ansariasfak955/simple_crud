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
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Add Blog</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Blog"<button class="btn btn-info" style="float:right;">View Blog</button></a>
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
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php }?>
                                <h6 class="card-subtitle"></h6>
                                <h4 class="card-title"> Add Blog</h4>
								<img src="<?php echo base_url()?>/uploads/blog/<?php echo $records[0]->image;?>" alt="" width="50px" height="50px" style="float: right;margin-top: -39px;">
                            </div>
							
                            <hr>
                            <form method="POST" action="<?php echo base_url();?>Blog/update_row" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    
                                     <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Title</label>
                                                <input type="text" name="tit" class="form-control" id="inputfname" placeholder="Title Name Here" value="<?php echo $records[0]->title;?>" required>
                                            </div>
                                            </div>
                                                                                                                                            
                                     <div class="col-12  col-md-6"> <label class="control-label col-form-label">Images</label>
                                    <div class="input-group mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">images</span>
                                        </div>
                                        
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" >
											<input type="hidden" name="oldimage" class="custom-file-input" id="inputGroupFile01" required="" value="<?php echo $records[0]->image;?>">
                                            <input type="hidden" name="mid" class="custom-file-input" id="inputGroupFile01" required="" value="<?php echo $records[0]->bl_id;?>">
											<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    </div>
									 <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Date</label>
                                                <input type="date" name="datee" class="form-control" id="inputfname" value="<?php echo $records[0]->date;?>" placeholder="Title Name Here" required>
                                            </div>
                                            </div>
									 <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Description</label>
                                                <textarea type="text" name="des" class="form-control" required="" rows="5" id="cono" placeholder="Description Here"><?php echo $records[0]->description;?></textarea>
                                            </div>
                                    </div>
									
									
                                </div>
                            </div>
							
                            <hr>                     

                            <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                        <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
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
 
   <?php include('footer.php');?>
   
</body>


</html>