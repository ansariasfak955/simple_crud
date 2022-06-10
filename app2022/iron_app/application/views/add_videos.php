!DOCTYPE html>
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
                        <h4 class="page-title">Videos</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Videos</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Videos"<button class="btn btn-info" style="float:right;">View Videos</button></a>
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
                    <div class="col-sm-12 col-lg-8">
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
                                <h4 class="card-title"> Videos</h4>
                            </div>
                            <hr>
                            <form method="POST" action="<?php echo base_url();?>Videos/add_video_data" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                     <input type="checkbox" id="chkfreevideo" name="chkfreevideo" style="margin-left: 20px;" value='1'>
                                     <h4 style="margin-left: 35px;margin-top: -21px;"> Free Video</h4>
                                     </div>
                                     <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Category</label>
                                               
                                         
									<select name="cat"  class="form-control" onChange="cat2(this.value);" required>
                                    <option value="">Select Category</option>
								    <?php 
                                       $sql = $this->db->query("select * from dlc_category");
                                              foreach($sql->result_array() as $rr)
                                              {
                                                ?>
                                                <option value="<?php echo $rr['cat_id'];?>">
                                                    <?php echo $rr['cat_name'];?>
                                                    
                                                </option>
                                                
                                            <?php
                                              }
                                              ?> 

                                  </select>
                                              
                                               
                                            </div>
                                    </div>
									 <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Sub Category</label>
                                               
                                              <div id="hiden">
											  <select name="alphnm"  class="form-control"  >
                                    <option value="">Select Sub Category</option>
								    

                                  </select>
                                            </div>
											 <div  id ="showss"></div>
											  </div>
                                    </div>
                                     <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Title</label>
                                                <input type="text" name="videowrd" class="form-control" id="inputfname" placeholder="Title" required>
                                            </div>
                                    </div>
                                                                                                                                            
                                     <div class="col-12  col-md-6"> <label class="control-label col-form-label">Videos</label>
                                    <div class="input-group mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Video</span>
                                        </div>
                                        
                                        <div class="custom-file">
                                            <input type="file" name="video" class="custom-file-input" id="inputGroupFile01" required>
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                        
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <hr>                     

                            <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                        <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                       
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
<?php   $sqla = $this->db->query("SELECT * FROM dlc_user"); 
$coo = $sqla->num_rows();?>
                                                <h1 class="font-light"><?php echo $coo ; ?></h1>
                                                <h6 class="text-muted">Total Users</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $coo ; ?>%" class="css-bar m-b-0 css-bar-primary css-bar-<?php echo $coo ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
<?php   $sqlaa = $this->db->query("SELECT * FROM dlc_user where user_status = '1'"); 
$cooa = $sqlaa->num_rows();?>
                                                <h1 class="font-light"><?php echo $cooa ; ?></h1>
                                                <h6 class="text-muted">Active Users</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $cooa ; ?>%" class="css-bar m-b-0 css-bar-danger css-bar-<?php echo $cooa ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
<?php   $sqlaas = $this->db->query("SELECT * FROM dlc_user where user_status = '0' or user_status = ''"); 
$cooas = $sqlaas->num_rows();?>
                                                <h1 class="font-light"><?php echo $cooas ; ?></h1>
                                                <h6 class="text-muted">Inactive Users</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $cooas ; ?>%" class="css-bar m-b-0 css-bar-warning css-bar-<?php echo $cooas ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
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
    
    <script>
  function maxLengthCheck(object)
   {
 if (object.value.length > object.maxLength)
 object.value = object.value.slice(0, object.maxLength)
   }
  </script>
 <script> 

    function cat2(str) {
   // alert(str);
   
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showss").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url(); ?>test/ajax_subcategory.php?$q="+str,true);
	//alert("<?php echo base_url(); ?>test/ajax_subcategory.php?$q="+str);
    xmlhttp.send();
    document.getElementById("hiden").style.display = "none";
    }

</script>
   <?php include('footer.php');?>
   
</body>


</html>