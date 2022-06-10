<!DOCTYPE html>
<html dir="ltr" lang="en">
       <head>
         <script src='https://cdn.tiny.cloud/1/sjy099wi2fw1ia6jum8t90tw7rsta5kh3sbp6u5nnt9y4426/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
              <script>
              tinymce.init({
                selector: '#text_val'
              });
              </script>
    </head>
    
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
                        <h4 class="page-title">Package</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Package</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Package"<button class="btn btn-info" style="float:right;">View Package</button></a>
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

 $mess1 = $this->session->flashdata('success_msg');  $mess2 = $this->session->flashdata('error_msg');   ?>
                                
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
                                 <div class="row">
                                <div class="col-md-4">
                                <h4 class="card-title">Edit Package
                                </h4></div>
                               <div class="col-md-8">
                             <img src="<?php echo base_url();?>upload/package/<?php echo $records[0]->pack_image;?>" style="height:80px; width:100px; float:right;"><br>
                                 </div> 
                                 </div>
                                 
                                 
                            </div>
                            <hr>
							<?php $stat  = $records[0]->free_status;  $show_web_2  = $records[0]->show_web;  ?>
						  <form method="POST" action="<?php echo base_url();?>Package/update_row" id= "my_form" enctype="multipart/form-data">
                            <div class="card-body">
                        
                        	<input type="checkbox" id="chkPassport" name = 'free_status'  value ='1' style="margin-left: 20px;"  <?php if($stat==1){ echo "checked"; }  ?> /><h4 style="margin-left: 35px;margin-top: -16px;"> Free Package</h4>
                        	<input type="checkbox" name = 'show_web'  value ='1' style="margin-left: 20px;"  <?php if($show_web_2==1){ echo "checked"; }  ?> /><h4 style="margin-left: 35px;margin-top: -16px;"> Show On Website </h4>
                          
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputfname" class="control-label col-form-label">Package Name</label>
                                            <input type="text" name="pkname" class="form-control" id="inputfname" value="<?php echo $records[0]->pack_name;?>">
                                        </div>
                                    </div>
                                     <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="cono" class="control-label col-form-label">Time Period</label>
                                            <input type="text" name="tmprd" class="form-control" id="cono"   value="<?php echo $records[0]->time_perioud;?>">
                                     <input type="hidden" name="uid" value="<?php echo $records[0]->pack_id;?>">
                                        </div>
                                    </div>
									
                                    <div class="col-sm-12 col-md-6" id="dvPassport">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label">Price</label>
                                            <input type="text" name="prc" class="form-control" id="inputlname2" value="<?php echo $records[0]->price;?>">
                                        </div>
                                    </div>
                                    
                                        <div class="col-sm-12 col-md-6" id="AddPassport">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Offer Price</label>
                                            <input type="text" name="ofprc" autocomplete="off" class="form-control" id="email1"   value="<?php echo $records[0]->offer_price;?>" >
                                        </div>
                                       </div>
									
                                    <div class="col-12 col-md-6">
                                    <label for="cono" class="control-label col-form-label">Profile Image</label>
                                   <input type="hidden" name="oldimage" value="<?php echo $records[0]->pack_image;?>">
                                     <input type="hidden" name="uid" value="<?php echo $records[0]->pack_id;?>">
									  <input type="hidden" name="cat" value="<?php echo $records[0]->cat_id;?>">
                                    <div class="input-group mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Profile Image</span>
                                        </div>
                                        
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    </div>                                                                   
                               <!--=====================-->
                                           <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                           
                                            <label for="email1" class="control-label col-form-label">Description</label>
                                            <textarea type="text"  name="description"  id="text_val"  class="form-control" rows="4" placeholder="Description"><?= $records[0]->description ?></textarea>
                                        </div>
                                      </div>
                         <!--=====================-->
                                </div>    
								 <?php 
								 $nm = $records[0]->cat_id;
								 if(is_numeric($nm)) {?>
								 
							
                                <div class="row">

                                       <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="cono" class="control-label col-form-label">Sub Category</label>
                                        <!-- <input type="text" name="alph" class="form-control" id="cono"  value="<?php echo $records[0]->alpha_id;?>"> -->
                                       </div>
                                   
                                   
                                      <div class="form-group">
                                        <div class="row">
                                          
                      <?php $ssql = $this->db->query("select * from dlc_subcategory where cat_id ='$nm'"); 
                                        foreach($ssql->result_array() as $rrwd)
                                        {  ?>
                                               <div class="col-md-4">  
                                             <?php
                                             $sbid = $rrwd['sbcat_id'];
                                        echo $sbnm = $rrwd['sbcat_name']; 

                                       $iddss = $records[0]->pack_id;
                                       
                                      
                                       
                    // $sqst = $this->db->query("select * from dlc_mamage_package where pack_id ='$iddss' and alpha_id = '$sbid'"); 
                    //                   foreach($sqst->result_array() as $rrc)
                    //                        {
                    //                         $alids = $rrc['alpha_id'];
                    //                        }
                                        ?>  
                                                               
                                 <input type="checkbox" name="alpha[]" class="form-control" id="inputfname" style="margin-top: -16px;" value="<?php echo $sbid;?>"
                                  <?php
///echo "select * from dlc_mamage_package where pack_id ='$iddss' and alpha_id = '$sbid'";
                                  if($nm == 2)
                                  {   
                                     $sqst = $this->db->query("select * from dlc_mamage_package where pack_id ='$iddss' and grammar_id = '$sbid'");
                                                  foreach($sqst->result_array() as $rrc)
                                           {
                                            $alid = $rrc['grammar_id'];
                                           }
                                
                                  }else{
                                    $sqst = $this->db->query("select * from dlc_mamage_package where pack_id ='$iddss' and alpha_id = '$sbid'"); 
                                                  foreach($sqst->result_array() as $rrc)
                                           {
                                            $alid = $rrc['alpha_id'];
                                           }
                                
                                  }  
                                    
                                    

                                        if($sbid==$alid){ echo "checked"; } ?>> 
                                         </div>    
                                      <?php }?>
                                           
                                           </div>                                   
                                        </div>
                                    </div>                                                        

                                </div>
								 <?php }?>
							
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
<?php   $sqlaas = $this->db->query("SELECT * FROM dlc_user where user_status = '0'"); 
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

        $(document).ready(function(){
            var free = "<?= $records[0]->free_status ?>";
                if(free == 1)
                {
                    $("#chkPassport").val(0);
                     $("#AddPassport").hide();
                    $("#dvPassport").hide();
                }
            });



$(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#AddPassport").hide();
                $("#dvPassport").hide();
                $("#chkPassport").val(1);
                
            } else {
                $("#AddPassport").show();
                $("#dvPassport").show();
                $("#chkPassport").val(0);
            }
        });
    });

$("body").on('submit','#my_form333',function(e){
    e.preventDefault()
   
   var price = $('#inputlname2').val();
   var offer_price = $('#email1').val();
   var free = $(this).find("input[name ='free_status' ]").val();
  
    alert("sk == "+ free);
   
   if(free != 1)
    {
            if(empty(price) )
            {
                alert( "price Field Requied");
                return false;
            }
         if(empty(offer_price) )
            {
                alert( "Offer Price Field Requied");
                return false
            }
    var  url = $(this).attr('action');
    
   }
   
   /// window.location.href = url;
       
       
       return false   
});
</script> 
 
   <?php include('footer.php');?>
   
</body>


</html>