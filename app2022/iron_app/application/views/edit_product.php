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
      
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
 
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
                        <h4 class="page-title">Edit package</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit package</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Product"><button class="btn btn-info" style="float:right;">View package</button></a>
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
                             </div>
							
                            <hr>
                        
                        
                        <form method="POST"  action="<?php echo base_url('Product/update_product_data/'.$prod->prod_id);?>" enctype="multipart/form-data">
						   <div class="card-body">
                                <div class="row">
                                  
                                     <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="prodname" class="control-label col-form-label"> Package Title</label>
                                            <input type="text" name="prod_name" value="<?=$prod->prod_name?>" autocomplete="off" class="form-control" id="prodname" placeholder="Package Name" required>
                                        </div>
                                    </div> 
                                  
                                     <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="prodname" class="control-label col-form-label"> Package Category</label>
                                            <select name="prod_cat" id="prod_cat"class="form-control">
                            <option value="">Select product</option>
                                <?php foreach($cat as $cat) {?>
                    <option value="<?=$cat->cat_id?>"<?=($cat->cat_id== $prod->cat_id)?'selected':''?>><?=$cat->cat_name?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-sm-12 col-md-6" id="dvPassport">
                                        <div class="form-group">
                                            <label for="price" class="control-label col-form-label">Price</label>
                                            <input type="text" name="price" value="<?=$prod->price?>" autocomplete="off" class="form-control" id="price" placeholder="Price" >
                                        </div>
                                    </div> 
                                     <div class="col-sm-12 col-md-6" id="AddPassport">
                                        <div class="form-group">
                                            <label for="offer_price" class="control-label col-form-label"> Offer Price</label>
                                            <input type="text" name="offer_price"value="<?=$prod->offer_price?>" autocomplete="off" class="form-control" id="offer_price" placeholder=" Offer Price" >
                                        </div>
                                    </div>
                                    								
                                    <div class="col-12  col-md-6"> <label class="control-label col-form-label">Image</label>
                                     <div class="input-group mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Package Image</span>
                                        </div>
                                        
                                        
                                        
                                        <div class="custom-file">
                                            <input type="file" name="prod_image[]" class="custom-file-input" id="inputGroupFile01"
                                              multiple  accept="image/*" >
                                            <input type="hidden" name="hidden_image" value="<?=$prod->prod_image?>" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                                        </div>
                                    </div>
                                    </div>
                                     <div class="col-12  col-md-6"> <label class="control-label col-form-label">Image</label>
                                       <?php $p_img = json_decode($prod->prod_image);  
                                       for($j = 0 ;$j<count($p_img); $j++){
                                       ?>
                                     <img height="50px" width="50px" src="<?=base_url('common_uploads/product_images/'.$p_img[$j])?>" alt="">
                                    <?php } ?>
                                    
                                    </div>
                                       
                                      
                                       
                                  
                                    <div class="col-sm-12  col-md-6">
                                              <label > Number of Cleaners</label>
                                            <input type = 'number' min = '1' class="form-control"  name = 'cleaner_count' required value = "<?= $prod->cleaner_count ?>" >
                                       
                                           </div>  
                                    
                                     <div class="col-sm-12  col-md-6">
                                              <label > Enter youtube video url </label>
                                             <input type="text" name="url" class="form-control" value="<?= $prod->youtube_url ?>" >
                                     
                                           </div> 
                                        
                                    <!--<div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <?php   $c_list = isset($prod->locations)? json_decode($prod->locations) : [];
                                              $i = 1;
                                               foreach($c_list as $val){ ?>
                                                    
                                               <div class='mt-2' ><label class = 'control-label col-form-label'  >Enter new location</label>
                                                    <input type = 'text'  name = 'locations[]' required value = "<?= $val ?>" > 
                                                <?php if($i == 1){?>
                                                     <button type = 'button' class = 'btn btn-info' id ='addMore_2'>addMore</button>
                                                <?php   }else{?>
                                                    <button type = 'button' class ='btn btn-danger remove' >delete</button>
                                               
                                               
                                               
                                                </div>    
                                                    
                                               <?php } $i++; } ?>
                                        
                                                                       
                                          
                                                                        
                                          <div id = 'new_divs'></div>
                                        </div>
                                    </div>    -->                                           
                                        
                                    <div class="form-group col-md-6">
                                   
                                 <label for="">Select multiple location </label>
                                    <select name="locations[]" id="status" multiple  class="form-control">
                                    <option value="">Select</option>
                                      <?php if(isset($locations_list) && count($locations_list) >0){
                                            $apply_packages_arr =  json_decode($prod->locations);
                                       
                                         foreach ($locations_list as $val) { 
                                            if (in_array($val->location_id , $apply_packages_arr)){ ?>
                                                 <option value="<?= $val->location_id ?>" selected ><?= $val->location_name ?></option>
                                          <?php   }else{ ?>
                                         
                                            <option value="<?= $val->location_id ?>"><?= $val->location_name ?></option>
                                    
                                           <?php }} } ?>
                                  
                                  
                                    </select>
                                     </div>          
                                       
                                       
                                       
                                       
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="description" class="control-label col-form-label">Description</label>
                                            <textarea type="text" name="description" class="form-control"  id="description"   placeholder="Description"><?= $prod->description ?></textarea>
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
         
         
    
    
  <script type="text/javascript">
 window.onload = function() {
    document.getElementById('ifYes').style.display = 'none';
    document.getElementById('ifNo').style.display = 'none';
    document.getElementById('red').style.display = 'none';
    document.getElementById('pass').style.display = 'none';
    document.getElementById('des').style.display = 'none';
    document.getElementById('ddt').style.display = 'none';
  

}
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
  
<script>
    $("body").on('click','#addMore_2',function(){
         
      $('#new_divs').append("<div class='mt-2' ><label class = 'control-label col-form-label'  >Enter new location</label><input type = 'text'  name = 'locations[]' required > <button type = 'button' class ='btn btn-danger remove' >delete</button></div>");
  });
    $("body").on('click','.remove',function(){
       
           $(this).parent().remove();
        });
                                             
</script>
   <?php include('footer.php');?>
   
</body>


</html>