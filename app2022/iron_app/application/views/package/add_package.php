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
    
    
 <style>
.showthis {
  display: none;
} 
 </style>
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
       <?php $this->load->view('header.php');?>
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
                                    <li class="breadcrumb-item active" aria-current="page">Add Package</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url('Package/view_new_package');?>"><button class="btn btn-info" style="float:right;">View New Packages</button></a>
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
                                <h4 class="card-title">About New Package</h4>
								
                            </div>
								<!--
								    pack_new_id`, `name`, `price`, `offer_price`, `time_days`, `image`, `description`, `date`
								-->
                            <hr>
                            <form method="POST"  action="<?php echo base_url();?>Package/new_package_add" enctype="multipart/form-data">
						  <div class="card-body">
                                <div class="row">
                                     <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                          <label for="email1" class="control-label col-form-label"> Package Name</label>
                                           <input type="text" name="pkgname" autocomplete="off" class="form-control" placeholder="Package Name"
                                          value = "<?= (isset($pack_dtl) && (count($pack_dtl)>0 ))? $pack_dtl[0]->name :'' ?>"  required>
                                <input type = "hidden" name = "package_id" value = "<?= (isset($pack_dtl) && (count($pack_dtl)>0 ))? $pack_dtl[0]->pack_new_id :'' ?>" >
                                          
                                        </div>
                                    </div> 
                                       
                                     <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label">Time Period</label>
                                            <input type="text" name="tmp" class="form-control" id="inputlname2" placeholder="Time Period" 
                                              value = "<?= (isset($pack_dtl) && (count($pack_dtl)>0 ))? $pack_dtl[0]->time_days :'' ?>"  required>
                                        </div>
                                    </div>
                                <div class="col-sm-12 col-md-6" id="dvPassport">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Price</label>
                                            <input type="text" name="prc" autocomplete="off" class="form-control"  placeholder="Price" 
                                            value = "<?= (isset($pack_dtl) && (count($pack_dtl)>0 ))? $pack_dtl[0]->price :'' ?>" >
                                        </div>
                                    </div> 
                                     <div class="col-sm-12 col-md-6" id="AddPassport">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label"> Offer Price</label>
                                            <input type="text" name="offprc" autocomplete="off" class="form-control"  placeholder=" Offer Price"
                                              value = "<?= (isset($pack_dtl) && (count($pack_dtl)> 0 ))? $pack_dtl[0]->offer_price :'' ?>"  >
                                        </div>
                                    </div>
                                    								
                                    <div class="col-12  col-md-6"> <label class="control-label col-form-label">Image</label>
                                     <div class="input-group mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Profile Image</span>
                                        </div>
                                        
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" >
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    </div>
                                    <?php if(isset($pack_dtl) && (count($pack_dtl)> 0 )){ ?>
                                         <div class="col-12  col-md-6 text-center">  
                                   
							            <img src = "<?= base_url('assets/package/').$pack_dtl[0]->image ?>" width = '60' > 
									   </div> 
									
									<?php } ?>   
									
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Description</label>
                                            <textarea type="text" name="description" class="form-control"  id="text_val" placeholder="Description"
                                             > <?= (isset($pack_dtl) && (count($pack_dtl)>0 ))? $pack_dtl[0]->description :'' ?></textarea>
                                        </div>
                                </div> 
                                </div>
						 </div>
                            <hr style = 'background-color: silver;padding: 2px;'>
  <!-- **********************************************************-->
      <div class="col-sm-12 col-md-12">
            <a href = '#'  class="btn btn-info waves-effect waves-light video_row_toggal">Video </a>

          <div id = 'video_row' style = "display : <?= (isset($pack_videos) && (count($pack_videos)>0 ))? '' : 'none' ?>" >
             <?php if(isset($pack_videos) && (count($pack_videos)>0 )){
                  foreach($pack_videos as $value ){?>    
                    <div class = "row"  >
                       <div class="col-3" >
                        <label for="email1" class="control-label col-form-label">Select video </label>
                        </div>
                        <div class="col-6" >    
                          <select name = 'video_id[]' class ='form-control'   >
                          <option value = '' >select</option>
                            <?php  
                              if(isset($video_list) && (count($video_list)>0)){
                              foreach($video_list as $val)
                                    {
                                if($val->videos_id == $value->video_id ){
                                 echo  "<option value = '".$val->videos_id."' selected >".substr($val->video_name,0,35)."</option>";   
                                }else{
                              echo  "<option value = '".$val->videos_id."' >".substr($val->video_name,0,35)."</option>";
                                    }
                                            }
                                        }  ?>
                          </select>
                        </div>  
                         <div class="col-3" >
                            <i class="ti-trash dlt_row"></i>
                            <a href = '#' class = 'btn btn-gray add_video' >Add More</a>
                        </div> 
                  </div>
                                    
                             <?php }  }else{ ?>
            <div class = "row"  >
                                   
                <div class="col-3" >
                    <label for="email1" class="control-label col-form-label">Select video </label>
                </div>      
                <div class="col-6" >    
                  <select name = 'video_id[]' class= 'form-control'   >
                      <option value = '' >select</option>
                      <?php  
                      if(isset($video_list) && (count($video_list)>0)){
                      foreach($video_list as $val)
                      {
                        echo  "<option value = '".$val->videos_id."' >".substr($val->video_name,0,35)."</option>";
                                        }
                                    }  ?>
                  </select>
                </div>  
                             
                             
                                  <div class="col-3" >
                                        <a href = '#' class = 'btn btn-gray add_video' >Add More</a>
                                    </div> 
                                    
                                    
                                </div>
                                 
                        <?php      }    ?>
                                
          </div>   
                             </div>    
                            
                          <hr style = 'background-color: silver;padding: 2px;'>     
                            
                          <div class="col-sm-12 col-md-12">
                                  <a href = '#'  class="btn btn-info waves-effect waves-light pdf_row_toggal">PDF </a>
                            <div id = 'pdf_row' style = "display :  <?= (isset($pack_pdfs) && (count($pack_pdfs)>0 ))? '' : 'none' ?>" >
                              
                               <?php if(isset($pack_pdfs) && (count($pack_pdfs)>0 )){
                               foreach($pack_pdfs as $value ){?>     
                               
                                <div class = "row"  >
                                   
                                <div class="col-3" >
                                    <label for="email1" class="control-label col-form-label">Select PDF </label>
                                    </div>
                                    
                                 <div class="col-6" >    
                                    <select name = 'pdf_id[]' class= 'form-control'  >
                                     <?php 
                                        if(isset($pdf_list) && (count($pdf_list)>0)){
                                            foreach($pdf_list as $val)
                                            { if($val->pdf_id == $value->pdf_id ){
                                               echo  "<option value = '".$val->pdf_id."' selected >".$val->pdf_name."</option>";
                                                 }else{
                                                       echo  "<option value = '".$val->pdf_id."' >".$val->pdf_name."</option>";
                                                 }
                                            }
                                        }  ?>
                                    </select>
                                  </div>  
                                  <div class="col-3" >
                                      <i class="ti-trash dlt_row"></i>
                                    <a href = '#' class = 'btn btn-gray add_pdf' >Add More</a>
                                     </div>        
                                </div>
                             
                               <?php }  }else{ ?> 
                               
                                <div class = "row"  >
                                   
                                <div class="col-3" >
                                    <label for="email1" class="control-label col-form-label">Select PDF </label>
                                    </div>
                                    
                                 <div class="col-6" >    
                                    <select name = 'pdf_id[]' class= 'form-control'  >
                                        <option value = '' >select</option>
                                 
                                        
                                      <?php 
                                        if(isset($pdf_list) && (count($pdf_list)>0)){
                                            foreach($pdf_list as $val)
                                            {
                                               echo  "<option value = '".$val->pdf_id."' >".$val->pdf_name."</option>";
                                            }
                                        }  ?>
                                    </select>
                                  </div>  
                                  <div class="col-3" >
                                     
                                    <a href = '#' class = 'btn btn-gray add_pdf' >Add More</a>
                                     </div>        
                                </div>
                               
                                <?php      }    ?> 
                               
                                
                             </div>   
                             </div>        
                            
                            
                            
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
  <script type="text/javascript">
 window.onload = function() {
    document.getElementById('ifYes').style.display = 'none';
    document.getElementById('ifNo').style.display = 'none';
    document.getElementById('red').style.display = 'none';
    document.getElementById('pass').style.display = 'none';
    document.getElementById('des').style.display = 'none';
    document.getElementById('ddt').style.display = 'none';
  

}


$('body').on('click','.video_row_toggal',function(e){
     e.preventDefault();
    
      $("#video_row").toggle();    
     return false;
    
});

$('body').on('click','.dlt_row',function(e){
     e.preventDefault();
    $(this).parent().parent().remove();
     
     return false;
    
});

$('body').on('click','.add_video',function(e){
     e.preventDefault();
   
  var add_arr = <?= json_encode($video_list) ?>;
  var option_tag = '';
    if($.type( add_arr ) == 'array');
    {
         $.each(add_arr, function(key,val) {
            // console.log(val);
           option_tag +=  "<option value = '"+ val.videos_id+"' >"+val.video_name+"</option>";
        });
    }
 
   
  var new_HTML = `<div class = "row"  >
                                   
                                <div class="col-3" >
                                    <label for="email1" class="control-label col-form-label">Select video </label>
                                    </div>
                                    
                                 <div class="col-6" >    
                                    <select name = 'video_id[]' class 'form-control'  >
                                        <option value = '' >select</option>
                                     ${option_tag}
                                    </select>
                                  </div>  
                                  <div class="col-3" >
                                      <i class="ti-trash dlt_row"></i>
                                    <button class = 'add_video' >Add More</button>
                                     </div>        
                                </div>`;
    
    $("#video_row").append(new_HTML); 
    return false;
});

//////////////////////////////////////////////////////


$('body').on('click','.pdf_row_toggal',function(e){
     e.preventDefault();
    
      $("#pdf_row").toggle();    
     return false;
    
});


$('body').on('click','.add_pdf',function(e){
     e.preventDefault();
    var add_arr = <?= json_encode($pdf_list) ?>;
  var option_tag = '';
    if($.type( add_arr ) == 'array');
    {
         $.each(add_arr, function(key,val) {
         
           option_tag +=  "<option value = '"+ val.pdf_id+"' >"+val.pdf_name+"</option>";
        });
    }
  var new_HTML = ` <div class = "row"  >
                                   
                                <div class="col-3" >
                                    <label for="email1" class="control-label col-form-label">Select PDF </label>
                                    </div>
                                    
                                 <div class="col-6" >    
                                    <select name = 'pdf_id[]' class 'form-control'  >
                                        <option value = '' >select</option>
                                       ${option_tag}
                                    </select>
                                  </div>  
                                  <div class="col-3" >
                                      <i class="ti-trash dlt_row"></i>
                                    <button class = 'add_pdf' >Add More</button>
                                     </div>        
                                </div>`;
    
    $("#pdf_row").append(new_HTML); 
    return false;
});


///////////////////////////////////////////////////////////////////
function yesnoCheck(id){
     $.ajax({
            type: 'post',
            url: "<?= base_url('Package/getSubCat');?>",
            data:{id:id},
            success: function (data) {
              var res =  $.parseJSON(data);
                  if(res.status)
                    { 
                         var html = '';
                               for (var i = 0; i < res.body.length; i++) 
                                  {
                    
                     html += `<div class="col-md-4">  
                                    `+$.trim(res.body[i].sbcat_name)+`                    
                                    <input type="checkbox" name="alpha[]"class="form-control" style = " margin-left:20px; margin-top: -16px;" value="`+res.body[i].sbcat_id+`">
                                    </div>`;
                                    
                                  }   
                               
                              $("#view_sub_cat").html(html);   
                        $('#ifYes').css('display','block');
                    }
            }
            });
   
   //   else if(document.getElementById('condos').checked) { 
   //      document.getElementById('coontra').style.display = 'block';
   //      document.getElementById('ifYes').style.display = 'none';
   //       document.getElementById('ifNo').style.display = 'none';
   //        document.getElementById('red').style.display = 'none';
       
        
   // }
}
$(document).ready(function() {
    $("#chkdwn2").click(function() {
       if ($(this).is(":checked")) { 
          $("#dropdown").prop("disabled", true);
       } else {
          $("#dropdown").prop("disabled", false);  
       }
    });
});
</script> 
 
<script> 

$(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#AddPassport").hide();
                $("#dvPassport").hide();
            } else {
                $("#AddPassport").show();
                $("#dvPassport").show();
            }
        });
    });


</script> 
  
    <?php $this->load->view('footer.php');?>
</body>


</html>