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
                        <h4 class="page-title">Employees</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Employees</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Subadmin/select_subadmin_data"><button class="btn btn-info" style="float:right;">View Employees</button></a>
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
    
                            </div>
                          
  <form method="POST" action="<?php echo base_url();?>Subadmin/update_row" enctype="multipart/form-data">
                            
                           
                            <div class="card-body">                                          
                             <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                <h4 class="card-title">Edit Employees
                                 </h4></div>
                                     
                                 </div>
                                
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputfname" class="control-label col-form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="inputfname" value="<?php echo $records[0]->admin_name;?>" required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label" >Email</label>
                                            <input type="email" name="email" class="form-control" id="inputlname2" value="<?php echo $records[0]->admin_email;?>" required="">
                                            <input type="hidden" name="uid" value="<?php echo $records[0]->id; ?>">
                                        </div>
                                    </div>
                                 <div class="col-sm-12 col-md-6">                      
                                       <div class="form-group">
                                            <label for="prodname" class="control-label col-form-label"> Employees Type</label>
                                            <select name="emp_type" id="prod_cat" class="form-control">
                                                <?php foreach($type_list as $val) {
                                                
                                                        if($val->emp_type_id == $records[0]->status ){ ?>
                                                           <option  selected  value="<?= $val->emp_type_id ?>"><?= $val->emp_type ?></option> 
                                                       <?php   }else{  ?>
                                                            <option value="<?= $val->emp_type_id ?>"><?= $val->emp_type ?></option>
                                                 <?php   } } ?>
                                        </select>
                                        </div>
                                    </div>   
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label">Contact No.</label>
                                            <input type="number" name="contactno" class="form-control" id="inputlname2" value="<?php echo $records[0]->contact;?>" required="" >
                                        </div>
                                    </div>
                                                                

                                    </div>

                                  <label for="inputlname2" class="control-label col-form-label">Roles</label>
                                    <div class="row">
                                      <?php 
                                       $iddd = $cont->sbad_id;
                                       foreach($cont as $rw)
                                       {
                                         $sdid = $rw->sbad_id; 
                                      
                                         $cty = $rw->category; 
                                         $usr = $rw->user;
                                         $ord = $rw->orderr;
                                         $rfl = $rw->referral;
                                         $qrz = $rw->quiz; 
                                         $abds = $rw->advertisement;
                                         $wrdd = $rw->words;
                                         $pgg = $rw->pages;
                                         $rpt = $rw->reports;
                                         $pkgg = $rw->packages;
                                         $sbss = $rw->subscription;                  
                                       }
                                      ?>
                                      
                                   
                                    
                                      <?php if($cty == 'Category'){ ?>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="catt" class="" id="inputlname2" value="<?php echo $rw->category;?>" checked="">
                                            <label for="inputlname2" class="control-label col-form-label">Category</label>
                                            
                                        </div>
                                    </div>
                                    <?php } else{ ?>
                                        <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                         <input type="checkbox" name="catt" class="" id="inputlname2" value="Category">
                                            <label for="inputlname2" class="control-label col-form-label">Category</label>
                                            
                                        </div>
                                    </div>

                                 <?php } ?>
                                    <?php if($usr == 'User'){ ?>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="ussr" class="" id="inputlname2" value="<?php echo $rw->user;?>" checked="">
                                            <label for="inputlname2" class="control-label col-form-label">User</label>
                                            
                                        </div>
                                    </div>
                                    <?php } else { ?>
                                        <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                        <input type="checkbox" name="ussr" class="" id="inputlname2" value="User">
                                            <label for="inputlname2" class="control-label col-form-label">User</label>
                                            
                                        </div>
                                    </div>

                                  <?php   } ?>
                                    <?php if($ord == 'Order'){ ?>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="ord" class="" id="inputlname2" value="<?php echo $rw->orderr;?>" checked="">
                                            <label for="inputlname2" class="control-label col-form-label">Order</label>
                                            
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                         <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="ord" class="" id="inputlname2" value="Order">
                                            <label for="inputlname2" class="control-label col-form-label">Order</label>
                                            
                                        </div>
                                    </div>

                                  <?php  } ?>
                                  
                                    
                                  
                                    <?php if($qrz == 'Quiz'){ ?>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="qzz" class="" id="inputlname2" value="<?php echo $rw->quiz;?>" checked="">
                                            <label for="inputlname2" class="control-label col-form-label">Quiz</label>
                                            
                                        </div>
                                    </div>
                                    <?php }else{ ?>

                                         <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="qzz" class="" id="inputlname2" value="Quiz" >
                                            <label for="inputlname2" class="control-label col-form-label">Quiz</label>
                                            
                                        </div>
                                    </div>

                                   <?php } ?>
                                    <?php if($abds == 'Advertisement'){ ?>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="abts" class="" id="inputlname2" value="<?php echo $rw->advertisement;?>" checked="">
                                            <label for="inputlname2" class="control-label col-form-label">Advertisement</label>
                                            
                                        </div>
                                    </div>
                                    <?php }else{ ?>

                                         <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="abts" class="" id="inputlname2" value="Advertisement" >
                                            <label for="inputlname2" class="control-label col-form-label">Advertisement</label>
                                            
                                        </div>
                                    </div>

                                   <?php } ?>

                                    <?php if($wrdd == 'Video'){ ?>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="wrd" class="" id="inputlname2" value="<?php echo $rw->words;?>" checked="">
                                            <label for="inputlname2" class="control-label col-form-label">Video</label>
                                            
                                        </div>
                                    </div>
                                    <?php }else{ ?>

                                         <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="wrd" class="" id="inputlname2" value="Video" >
                                            <label for="inputlname2" class="control-label col-form-label">Video</label>
                                            
                                        </div>
                                    </div>

                                   <?php } ?>
                                    <?php if($pgg == 'Page'){ ?>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="pg" class="" id="inputlname2" value="<?php echo $rw->pages;?>" checked="">
                                            <label for="inputlname2" class="control-label col-form-label">Page</label>
                                            
                                        </div>
                                    </div>
                                    <?php }else{ ?>

                                         <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="pg" class="" id="inputlname2" value="Page" >
                                            <label for="inputlname2" class="control-label col-form-label">Page</label>
                                            
                                        </div>
                                    </div>

                                   <?php } ?>
                                    
                                   
                                    <?php if($pkgg == 'Package'){ ?>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="pkg" class="" id="inputlname2" value="<?php echo $rw->packages;?>" checked="">
                                            <label for="inputlname2" class="control-label col-form-label">Package</label>
                                            
                                        </div>
                                    </div>
                                    <?php }else{ ?>

                                         <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="pkg" class="" id="inputlname2" value="Package" >
                                            <label for="inputlname2" class="control-label col-form-label">Package</label>
                                            
                                        </div>
                                    </div>

                                   <?php } ?>
                                     






                                                                               
                                    </div>
                                    
                                    
                                </div>
                                 <input type="hidden" name="uidd" value="<?php echo $rw->sbad_id; ?>">
                           
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