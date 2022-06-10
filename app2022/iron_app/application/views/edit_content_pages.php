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
         	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
   
   
   
   
   
         <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    
    
    
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Edit Page</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Page</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        
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
                    <div class="col-sm-12 col-lg-10">
                        <div class="card">
                            <div class="card-body">
<?php
    
 $mess1 = $this->session->flashdata('success_msg');  $mess2 = $this->session->flashdata('error_msg'); 	?>
                                
                                <?php if($mess1 || $mess2){?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="badge badge-info"><i class="fas fa-info"></i></span>
                                    <strong> <?php echo $mess1 ; ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
								<?php }?>
                            </div>
                            <hr>
                            
    <style>
        .note-editable{
               background-color: white !important;
        }
    </style>                        
                            
                            <form method="POST" action="<?php echo base_url();?>Content_page/update" enctype="multipart/form-data">
                            
                           
                            <div class="card-body">
                                
                                <div class="row">
                                  <div class="col-12">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Page Title</label>
                                           <input type="text" name="title" class="form-control" value="<?php echo $records[0]->page_title;?>"> 
                                           <input type="hidden" name="id" value="<?php echo $records[0]->page_id;?>"> 
                                           
                                           
                                        </div>
                                    </div>
                                                                        
                                                                        
                                </div>
                                
                                <div class="row">
                                  <div class="col-12">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Page Detail</label>
                                           <textarea type="text" name="detail" class="form-control summernote" id="cono" placeholder="Description Here" rows="5" 
                                                style="width:850px; min-height:250px;"><?php echo $records[0]->page_detail ;?></textarea> 
                                        </div>
                                    </div>                                  
                                    
                                </div>
                                
                            </div>
                          
                            <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                         <input type="submit" name="submit" value="Update" class="btn btn-info">
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
	$('.summernote').summernote({
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
    <script>
  function maxLengthCheck(object)
   {
 if (object.value.length > object.maxLength)
 object.value = object.value.slice(0, object.maxLength)
   }
  </script>
  
  <script> 
/*
    function getleg(str) {
     
  //alert(str);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
    } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("showl").innerHTML = xmlhttp.responseText;
     }
    };
    xmlhttp.open("GET","<?php echo base_url();?>Contest/legg/?$q="+str,true);
	//alert("<?php echo base_url();?>Contest/legg/?$q="+str);
    xmlhttp.send();
    document.getElementById("hidl").style.display = "none";
    } */

    </script>
 
   <?php include('footer.php');?>
   
</body>


</html>