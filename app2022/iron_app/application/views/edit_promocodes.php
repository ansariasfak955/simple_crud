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
                        <h4 class="page-title">Promocodes</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Promocodes</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Promocodes"><button class="btn btn-info" style="float:right;">View Promocodes</button></a>
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
                                <h4 class="card-title">About Promocodes</h4>
								
                            </div>
							    
                            <hr>
                            <form method="POST"  action="<?php echo base_url('Promocodes/update_promocode_data');?>" enctype="multipart/form-data">
							
                           

							
                            <div class="card-body">
                                <div class="row">
                                    
                                     <div class="col-sm-12 col-md-6">
                                         
                                      
                                        <div class="form-group">
                                            <label for="prodname" class="control-label col-form-label">Promocodes</label>
                                            <input type="text" name="promo_code" value="<?=$prod->promo_code?>" autocomplete="off" class="form-control" id="prodname" placeholder="Promocode Name" required>
                                        </div>
                                    </div>                                            
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-form-label">Message</label>
                                            <input type="text" name="message" value="<?= $prod->message?>"class="form-control" id="slug" placeholder="Message" required>
                                        </div>
                                        <input type="hidden" name="id" value="<?= $prod->id ?>" >
                                        
                                    </div> 
                    <!--                 <div class="col-sm-12 col-md-6">-->
                    <!--                    <div class="form-group">-->
                    <!--                        <label for="prodname" class="control-label col-form-label"> Product Category</label>-->
                    <!--                        <select name="prod_cat" id="prod_cat"class="form-control">-->
                    <!--        <option value="">Select product</option>-->
                    <!--            <?php foreach($cat as $cat) {?>-->
                    <!--<option value="<?=$cat->cat_id?>"<?=($cat->cat_id== $prod->cat_id)?'selected':''?>><?=$cat->cat_name?></option>-->
                    <!--                            <?php } ?>-->
                    <!--                        </select>-->
                    <!--                    </div>-->
                    <!--                </div> -->
                                    <div class="form-group col-md-6">
                                    <label for="">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" value="<?= $prod->start_date?>" id="start_date">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                    <label for="">End Date</label>
                                    <input type="date" class="form-control" name="end_date" value="<?= $prod->end_date?>" id="end_date">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                    <label for="">No. Of Users</label>
                                    <input type="number" class="form-control" name="no_of_users" value="<?= $prod->no_of_users?>">
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-6">
                                    <label for="">Minimum Order Amount</label>
                                    <input type="number" class="form-control" name="minimum_order_amount" value="<?= $prod->minimum_order_amount?>" step="any">
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-6">
                                    <label for="">Discount</label>
                                    <input type="number" class="form-control" name="discount" value="<?= $prod->discount?>" id="discount" step="any">
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-6">
                                    <label for="">Discount Type</label>
                                    <select name="discount_type" class="form-control"> 
                                    <option value="<?= $prod->discount_type?>">Select</option>
                                    <option <?= ($prod->discount_type == 'percentage')? 'selected' : '' ?> value="percentage" >Percentage</option>
                                    <option <?= ($prod->discount_type == 'amount')? 'selected' : '' ?>  value="amount" >Amount</option>
                                    </select>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                    <label for="">Max Discount Amount</label>
                                    <input type="text" class="form-control" name="max_discount_amount" value="<?= $prod->max_discount_amount?>" id="max_discount_amount">
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-6">
                                    <label for="">Repeat Usage</label>
                                    <select name="repeat_usage" id="repeat_usage" class="form-control">
                                    <option value="">Select</option>
                                    <option <?= ($prod->repeat_usage == '1')? 'selected' : '' ?> value="1">Allowed</option>
                                    <option <?= ($prod->repeat_usage == '0')? 'selected' : '' ?>  value="0">Not Allowed</option>
                                    </select>
                                    </div>
                                                                                              
                                    <div class="form-group col-md-6">
                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-control">
                                    <option value="">Select</option>
                                    <option <?= ($prod->status == '1')? 'selected' : '' ?>  value="1">Active</option>
                                    <option <?= ($prod->status == '0')? 'selected' : '' ?>  value="0">Deactive</option>
                                    </select>
                                    </div>   
                                                          
                               <div class="form-group col-md-6">
                                   
                                 <label for="">Select multiple packages </label>
                                    <select name="pack_ids[]" id="status" multiple  class="form-control">
                                    <option value="">Select</option>
                                      <?php if(isset($view) && count($view) >0){
                                            $apply_packages_arr =  json_decode($prod->apply_packages);
                                          
                                         foreach ($view as $val) { 
                                            if (in_array($val->prod_id , $apply_packages_arr)){ ?>
                                                 <option value="<?= $val->prod_id ?>" selected ><?= $val->prod_name ?></option>
                                          <?php   }else{ ?>
                                         
                                            <option value="<?= $val->prod_id ?>"><?= $val->prod_name ?></option>
                                    
                                           <?php }} } ?>
                                  
                                  
                                    </select>
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
  
   <?php include('footer.php');?>
   
</body>


</html>