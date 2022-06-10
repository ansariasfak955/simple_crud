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
         
         
         
         
          <head>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
  
    <style >
        .note-editable{
                background-color: white !important;
        }
    </style>
  
    </head>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"><?= isset($faq_data[0]->id)? 'Update': 'Add' ?> FAQ</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                  
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url('CatFaq');?>"<button class="btn btn-info" style="float:right;">View Category FAQ</button></a>
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
<?php

 $mess1 = $this->session->flashdata('success_msg');  $mess2 = $this->session->flashdata('error_msg'); 
   ?>
                                
                                <?php if($mess1 || $mess2){?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="badge badge-info"><i class="fas fa-info"></i></span>
                                    <strong> <?php echo $mess1.''.$mess2 ; ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>                  
                                <?php }?>
                                <h6 class="card-subtitle"></h6>
                                
                            </div>
                            <hr>
                            <form method="POST" action="<?php echo base_url();?>CatFaq/add" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    
                                     <div class="col-6">
                                        <div class="form-group">
                                            <label for="prodname" class="control-label col-form-label">FAQ Category</label>
                                            <select name="cat_id" id="cat_id"class="form-control">
                                                <?php $m_cat_id =  isset($faq_data[0]->cat_id)? $faq_data[0]->cat_id : '' ; ?>
                                                <option value="">Select Category </option>
                                                <?php foreach($cat_list as $cat) {
                                                        if($cat->cat_id == $m_cat_id){ ?>
                                                    <option value="<?=$cat->cat_id?>"selected  ><?=$cat->cat_name?></option>
                                                <?php }else{  ?>
                                                          <option value="<?=$cat->cat_id?>"><?=$cat->cat_name?></option>
                                                
                                              <?php  } }?>
                                            </select>
                                        </div>
                                    </div> 
                             	
									 <div class="col-12 ">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Enter Question</label>
                                                <textarea type="text" name="qs" class="form-control" required="" rows="5" id="cono" placeholder="Description Here"><?= isset($faq_data[0]->question)? $faq_data[0]->question : '' ?></textarea>
                                            </div>
                                    </div>
									 <div class="col-12 ">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Enter Answer</label>
                                                <textarea type="text" name="ans" class="form-control" required="" rows="5" id="cono" placeholder="Description Here"><?= isset($faq_data[0]->answer)? $faq_data[0]->answer : '' ?></textarea>
                                            </div>
                                    </div>
									
									
                                </div>
                            </div>
							
                            <hr>                     
                                <input type = 'hidden' name = 'faq_id' value ="<?= isset($faq_data[0]->id)? $faq_data[0]->id : '' ?>" >
                            <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">
                                            <?= isset($faq_data[0]->id)? 'Update' : 'Save' ?></button>
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
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>
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