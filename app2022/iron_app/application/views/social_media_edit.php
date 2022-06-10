
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
                        <h4 class="page-title">social media</h4>                                   
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home </a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit social media </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url('Home/social_media');?>"<button class="btn btn-info" style="float:right;">View social media</button></a>
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
<?php

 $mess1 = $this->session->flashdata('success_msg');  $mess2 = $this->session->flashdata('error_msg'); 
   ?>
                                
                                <?php if($mess1 || $mess2) { ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="badge badge-info"><i class="fas fa-info"></i></span>
                                   <strong class="text-success"> <?php echo $mess1 ; ?></strong>
                                    <strong class="text-danger"> <?php echo $mess2 ; ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php } ?>
                                <h6 class="card-subtitle"></h6>
                              </div>
                            <hr>
                                
                            <form method="POST" action="<?php echo base_url('Home/update_social_media_data/'.$views[0]->id)?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Name</label>
                                                <input type="text" name="name" class="form-control" id="inputname" placeholder="Enter Name Here" value="<?=$views[0]->name?>"required>
                                            </div>
                                        </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label">Url</label>
                                            <input type="url" name="url"value="<?=$views[0]->url;?>" class="form-control" id="inputurl" placeholder="Enter Url Here" required>
                                        </div>
                                    </div>
                                  
                                    <div class="col-sm-12  col-md-6"><label class="control-label col-form-label">Image</label>
                                        <div class="input-group mb-3">
                                                        
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Image</span>
                                            </div>
                                            
                                            <div class="custom-file">
                                                <input type="file" name="image" accept="image/*"  class="custom-file-input" id="inputGroupFile01">

                                                 <input type="hidden" name="hidden_image" value="<?=$views[0]->image?>"class="custom-file-input" >
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>

                                            </div>
  
                                        </div>
                                    </div>
                                     <div class="col-sm-12 col-md-6 mb-3">
                                         <input type = 'hidden' name = 'id' value = "<?= $views[0]->id ?>" >
                                        <div class="form-group ">

                                           <img height="50px" weidth="50px" src="<?= base_url('common_uploads/social_media_icons/'.$views[0]->image)?>" alt="">
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            <hr>
                          
                            <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                        <button class="btn btn-dark waves-effect waves-light">Cancel</button>
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