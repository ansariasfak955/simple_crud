<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
         
    </head>
<body>
    
    
 <style>
.showthis {
  display: none;
} 
    th,td{
        text-align:center !important;
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
                        <h4 class="page-title"> </h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                   
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="#"<button class="btn btn-info" style="float:right;">Slides Add</button></a>
                    </div>
                </div>
            </div>
          
            <div class="container-fluid">
                
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
                                <h4 class="card-title">Add Slide image</h4>
								
                            </div>
							
                            <hr>
                            <form method="POST"  action="<?php echo base_url();?>Videos/add_slide_image" enctype="multipart/form-data">
						
                              					
                                    <div class="col-12  col-md-6"> <label class="control-label col-form-label">Image</label>
                                     <div class="input-group mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Choose Image</span>
                                        </div>
                                        
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" required>
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
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
					


              
                </div>
                <!-- End row -->
                <!-- ============================================================== -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Slide Image List</h4>
                               
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th> Sr.No.</th>
                                                <th> Image</th>
                                                <th> Action </th>
                                            
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $i=1; foreach($data as $row){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td>
                                                 <!-- <?php echo base_url("assets/slide_file/").$row->image ; ?>-->
                                                  <img src = "<?=  base_url("assets/slide_file/").$row->image ?>" width = '100px';height = '60px'>
                                                  
                                                </td>

                                           
                                       
                                            
                                            <td><a data = "<?= $row->id ?>" class = 'edit_image'   ><i class="ti-pencil"></i>&nbsp;&nbsp; </a>
                                            <a    data = "<?= $row->id ?>" class = 'delete_image' ><i class="ti-trash"></i></a>
                                            </td>

                                               
                                            </tr><?php $i++;?>
              
                                          
                            <?php }?>
                                            
                                          
                                           
                                        </tbody>
                                      
                                        </table>
                                        
                                        
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        
              
              
              
                <!-- ============================================================== -->
              </div>
           
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
            
            <div id="deletems" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Delete Image</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <h4>Are you sure you want to delete this Image?</h4>
                            <input type= "hidden" id = "dtl_id"  >
                           
                        </div>
                        <div class="modal-footer">
             <a href="#">
           <button type="button" class="btn btn-default" id="modbutt">Yes</button></a>
           <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
                </div>
    
    <!--===========================Edit modal start================================-->
         <div id="edit_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Update Image</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                         <form id = "my_up_form" enctype="multipart/form-data">
						     
						         <div class="col-12  col-md-8"> <label class="control-label col-form-label">Image</label>
                                     <div class="input-group mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Choose Image</span>
                                        </div>
                                        
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" required>
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    </div>
                            <input type= "hidden" name = "id" id = "edit_id"  >
                            <br>
                            <input type ='submit'  class = "btn btn-info" value ="Update">
                            
                            
                            </form>  
                        </div>
                        <div class="modal-footer">
            
           <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
                </div>
    <!--===========================Edit modal end================================-->
    
    
    
    
  <script type="text/javascript">

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
    $('body').on('click','.delete_image',function(){
        
         var id = $(this).attr('data');
         
         $('#dtl_id').val(id);
       //  alert("jk == "+ id); 
         $("#deletems").modal('show');
    });
  $('body').on('click','#modbutt',function(){
        
         var id = $('#dtl_id').val();
         
      $.ajax({
          type : "post",
          url : "<?= base_url('Videos/dtl_image') ?>",
          data:{id:id},
           async:false,
            success: function (data) {
              var res = $.parseJSON(data);
              
              window.location.reload();
          }
     });    
         
  }); 
  
    /////////// Edit function 
              $('body').on('click','.edit_image',function(){
        
                     var id = $(this).attr('data');
                     
                     $('#edit_id').val(id);
                   //  alert("jk == "+ id); 
                     $("#edit_modal").modal('show');
                });
  
         $('#my_up_form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
             url : "<?= base_url('Videos/edit_image') ?>",
            method:'POST',
            data: new FormData(this),
            contentType: false,
            cache:false,
            processData:false,
            success: function (data) {
             var res = $.parseJSON(data);
    
                           
              window.location.reload();
            }
          });
    
        });

  
</script> 
   <?php include('footer.php');?>
   
</body>


</html>