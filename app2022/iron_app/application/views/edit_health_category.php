<?php
 // echo "<pre>";
 // print_r($prod_seg);die;
?>
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
                        <h4 class="page-title">Health Category</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Health Category</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Health_category"><button class="btn btn-info" style="float:right;">View Health Category</button></a>
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
                                
                                <?php if($mess1 || $mess2){?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="badge badge-info"><i class="fas fa-info"></i></span>
                                    <strong> <?php 
                                    echo $mess1 ; 
                                    echo $mess2 ;
                                    ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php }?>
                                <h6 class="card-subtitle"></h6>
                                <h4 class="card-title">About Health Category</h4>
								
                            </div>
							
                            <hr>
                             <form method="POST" action="<?php echo base_url('Health_category/update_health_category_data');?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    
                                     <div class="col-sm-12 col-md-6">
                                        <input type="hidden" name="health_id" value="<?=$view->hel_cat_id ?>">
                                        <div class="form-group">
                                            <label for="cat_name" class="control-label col-form-label"> Health Category Name</label>
                                            <input type="text" name="cat_name" value="<?=$view->cat_name?>" autocomplete="off" class="form-control" id="cat_name" placeholder="Health Category Name" required>
                                        </div>
                                    </div>                  
                                <div class="col-12  col-md-6"> <label class="control-label col-form-label">Health Category Image</label>
                                     <div class="input-group mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Profile Image</span>
                                        </div>
                                        
                                        <div class="custom-file">
                                            <input type="file" name="cat_image" class="custom-file-input" id="hel_cat_image">
                                            <input type="hidden" name="hidden_image"value="<?=$view->cat_image?>" class="custom-file-input" id="cat_image" >
                                            
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="description" class="control-label col-form-label">Description</label>
                                            <textarea type="text" name="description" class="form-control"  id="description"   placeholder="Description"><?=$view->description;?></textarea>
                                        </div>
                                </div>   
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="description" class="control-label col-form-label"></label>
                                            <img height="50px" width="50px" src="<?=base_url("common_uploads/health_category_images/$view->cat_image");?>" alt="">
                                            
                                        </div>
                                    </div>
                            </div>
                        </div>
            <hr style = 'background-color: silver;padding: 2px;'>
    
    <div class="col-sm-12 col-md-12">
       <a href = '#'  class="btn btn-info waves-effect waves-light product_row_toggle">Products </a>
        <div id = 'product_row' style = "display : <?= (isset($prod) && (count($prod)>0 ))? '' : 'none' ?>"  >
   <?php if(isset($prod_seg)&&count($prod_seg)>0){
    foreach($prod_seg as $prod_seg){?>
            <div class = "row"  >
                <div class="col-3" >
                    <label for="email1" class="control-label col-form-label">Select product </label>
                </div>                   
                <div class="col-6" >    
                    <select name = 'prod_name[]' class ='form-control'   >
                        <option value = '' >select</option>
                        <?php foreach($prod as $val){ ?>
                        <option value="<?=$val->prod_id;?>"<?= ($val->prod_id==$prod_seg->prod_id)?'selected':''?>><?=$val->prod_name;?></option>        
                            
                      <?php  }  ?>
                    </select>
                </div>  
             
             
                  <div class="col-3" >
                        <i class="ti-trash dlt_row"></i>
                        <a href = '#' class = 'btn btn-gray add_product' >Add More</a>
                  </div>    
            </div>    
        <?php }
                }else{ ?>
            <div class = "row"  >
                <div class="col-3" >
                    <label for="email1" class="control-label col-form-label">Select product </label>
                </div>                   
                <div class="col-6" >    
                    <select name = 'prod_name[]' class ='form-control'   >
                        <option value = '' >select</option>
                        <?php foreach($prod as $val){ ?>
                        <option value="<?=$val->prod_id;?>"><?=$val->prod_name;?></option>        
                            
                      <?php  }  ?>
                    </select>
                </div>  
             
             
                  <div class="col-3" >
                        <a href = '#' class = 'btn btn-gray add_product' >Add More</a>
                  </div>    
            </div>  
            <?php }?>  
        </div>
        <div class="product_row">
            
        </div>
                      
     </div>  
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
  <script type="text/javascript">
 window.onload = function() {
    document.getElementById('ifYes').style.display = 'none';
    document.getElementById('ifNo').style.display = 'none';
    document.getElementById('red').style.display = 'none';
    document.getElementById('pass').style.display = 'none';
    document.getElementById('des').style.display = 'none';
    document.getElementById('ddt').style.display = 'none';
  

}

$('body').on('click','.product_row_toggle',function(e){
     e.preventDefault();
    
      $("#product_row").toggle();    
     return false;
    
});

$('body').on('click','.dlt_row',function(e){
     e.preventDefault();
    $(this).parent().parent().remove();
     
     return false;
    
});

$('body').on('click','.add_product',function(e){
     e.preventDefault();
   
  var add_arr = <?= json_encode($prod) ?>;
  var option_tag = '';
    if($.type( add_arr ) == 'array');
    {
         $.each(add_arr, function(key,val) {
            // console.log(val);
           option_tag +=  "<option value = '"+ val.prod_id+"' >"+val.prod_name+"</option>";
        });
    }
 
   
  var new_HTML = `<div class = "row"  >
                                   
                                <div class="col-3" >
                                    <label for="email1" class="control-label col-form-label">Select product </label>
                                    </div>
                                    
                                 <div class="col-6" >    
                                    <select name = 'prod_name[]' class = 'form-control'  >
                                        <option value = '' >select</option>
                                     ${option_tag}
                                    </select>
                                  </div>  
                                  <div class="col-3" >
                                      <i class="ti-trash dlt_row"></i>
                                    <button class = 'add_product' >Add More</button>
                                     </div>        
                                </div>`;
    
    $(".product_row").append(new_HTML); 
    return false;
});
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

</script> 
<script> 
$(document).ready(function() {
    $("#return_days").hide();

    var allrow = "<?= (isset($prod_seg) && count($prod_seg)>0)? 1:0 ?>";
        console.log("jk test== "+allrow);
    if(allrow)
    {
        $('.product_row_toggle').trigger("click");
    }
});
$(function () {
    if ($('#return_status').is(":checked")) {
                $("#return_days").show();
            } else {
                $("#return_days").hide();
            }
        $("#return_status").click(function () {
            if ($('#return_status').is(":checked")) {
                $("#return_days").show();
            } else {
                $("#return_days").hide();
            }
        });
    });


</script>
  
   <?php include('footer.php');?>
   
</body>


</html>