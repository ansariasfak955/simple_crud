<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
         
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
                      <!--  <a href="#"<button class="btn btn-info" style="float:right;">Slides Add</button></a>-->
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
                                <h4 class="card-title">Choose slide Type</h4>
								
                            </div>
							
                            <hr>
                            <form id = "add_form" method="POST"  action="<?php echo base_url();?>Videos/add_slide">
						
                                 <!--================-->      
                                     <div class="col-md-12">
                                               
                                        <label> Type</label>        
                                   <div  style = "    margin-left: 10%; width:60%" class="btn-group btn-group-toggle" data-toggle="buttons">
                                          <label class="btn btn-secondary active">
                                            <input type="radio" name="options"value ="image" id="option1" autocomplete="off" checked> Image
                                          </label>
                                          <label class="btn btn-secondary">
                                            <input type="radio" name="options" value ="video" id="option2" autocomplete="off"> Video
                                          </label>
                                          
                                        </div>             
                                                
                                    </div>
                                    
								<!--==============================-->	 
								
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
           
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
           <!-- ===================== msg model  start  ====================-->
        <div class="modal fade" id="msg_Modal" role="dialog" style ="margin-top: 10%;" >
          <div class="modal-dialog">
    
      <!-- Modal content-->
           <div class="modal-content">
                     <div class="modal-header" style ="text-align: center;">
                        <h5 class="modal-title text-white msg"></h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
            </div>
          </div>
        </div>
 <!-- ===================== msg model  end  ====================-->
    
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
          $('body').on('submit','#add_form',function(e){
                e.preventDefault(); 
             
               
                      $.ajax({
                                    url: "<?= base_url('Videos/add_slide')?>",
                                    type: 'POST',
                                    data:$(this).serialize(),
                                  
                                    success: function (data) {
                                         var res =  $.parseJSON(data);
                                          if(res.status)
                                            {
                                                  $('.msg').parent().css('background-color', 'green');
                                                         $('.msg').html(res.msg);
                                                    $('#msg_Modal').modal('show');
                                            }else{
                                                     $('.msg').parent().css('background-color', 'red');   
                                                     $('.msg').html(res.msg);
                                                    $('#msg_Modal').modal('show');
                                                 }
                                            
                                         setTimeout(function(){$('#msg_Modal').modal('hide');   return false;},5000);
                                    },
                                   
                                });
                       return false;
        });

</script> 
   <?php include('footer.php');?>
   
</body>


</html>