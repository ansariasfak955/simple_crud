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
                        <h4 class="page-title">package</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add package</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Product"><button class="btn btn-info" style="float:right;">View packages</button></a>
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
                                <h4 class="card-title">About package</h4>
								
                            </div>
							
                            <hr>
                            <form method="POST"  action="<?php echo base_url();?>Product/add_product_data" enctype="multipart/form-data">
							
                           

                             <div class="card-body">
                                <div class="row">
                                     <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                           

                                        </div>
                                    </div>
                                     </div>
                                    </div>
							
                            <div class="card-body">
                                <div class="row">
                                    
                                     <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="prodname" class="control-label col-form-label"> packege Title</label>
                                            <input type="text" name="prod_name" autocomplete="off" class="form-control" id="prodname" placeholder="Package Name" required>
                                        </div>
                                    </div> 
                                  
                                     <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="prodname" class="control-label col-form-label"> Package Category</label>
                                            <select name="prod_cat" id="prod_cat"class="form-control">
                                                <option value="">Select Category </option>
                                                <?php foreach($view as $cat) {?>
                                                    <option value="<?=$cat->cat_id?>"><?=$cat->cat_name?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-sm-12 col-md-6" id="dvPassport">
                                        <div class="form-group">
                                            <label for="price" class="control-label col-form-label">Price</label>
                                            <input type="text" name="price" autocomplete="off" class="form-control" id="price" placeholder="Price" >
                                        </div>
                                    </div> 
                                     <div class="col-sm-12 col-md-6" id="AddPassport">
                                        <div class="form-group">
                                            <label for="offer_price" class="control-label col-form-label"> Offer Price</label>
                                            <input type="text" name="offer_price" autocomplete="off" class="form-control" id="offer_price" placeholder=" Offer Price" >
                                        </div>
                                    </div>
                                    								
                                    <div class="col-12  col-md-6"> <label class="control-label col-form-label">Image</label>
                                     <div class="input-group mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Package Image</span>
                                        </div>               
                                        
                                        <div class="custom-file">
                                            <input type="file" name="prod_image[]" class="custom-file-input" id="inputGroupFile01"
                                            accept="image/*"  multiple required>
                                            <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                                        </div>
                                    </div>
                                    </div>
                                     
                                     <!--, Number of Cleaners, Select Type,Cost per minute -->
                                       <div class="col-12  col-md-6">
                                              <label > Enter youtube video url </label>
                                             <input type="text" name="url" class="form-control"  >
                                     
                                           </div>    
                                        <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="description" class="control-label col-form-label">Number of Cleaners</label>
                                          <input type = 'number' min = '1' name = 'cleaner_count' required >
                                        </div>
                                    </div>
                                        
                                   <!-- <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="description" class="control-label col-form-label">Number's of Location</label>
                                          <input type = 'text'   name = 'locations[]' required > 
                                          <button type = 'button' class = 'btn btn-info' id ='addMore_2'>addMore</button>
                                          <div id = 'new_divs'></div>
                                        </div>
                                    </div> -->                                              
                                        
                                   <div class="form-group col-md-6">
                                    <label for="">Select multiple Location </label>
                                    <select name="locations[]" id="status" multiple  class="form-control">
                                    <option value="">Select</option>
                                      <?php if(isset($locations_list) && count($locations_list) >0){
                                         foreach ($locations_list as $val) {?>
                                            <option value="<?= $val->location_id ?>"><?= $val->location_name ?></option>
                                    
                                           <?php }} ?>
                                  
                                  
                                    </select>
                                    </div>    
                                    
                                        
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="description" class="control-label col-form-label">Description</label>
                                            <textarea type="text" name="description" class="form-control"  id="description"   placeholder="Description"></textarea>
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
$(document).ready(function() {
    $("#return_days").hide();
});
$(function () {
        $("#return_status").click(function () {
            if ($(this).is(":checked")) {
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