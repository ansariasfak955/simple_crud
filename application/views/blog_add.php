<?php include ('include/header.php'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
<div class="content-wrapper">
  <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <div class="d-flex align-items-center">
        <div class="w-100s">
          <h4 class="page-title"><?= (isset($b_logs[0]->title))? 'Update Blog' : 'Create Blog' ?></h4>

          <div class="d-inline-block align-items-center">
          </div>
          <div class="haff-widgets">
   
            <a href="<?= base_url('Blog') ?>" class="btn btn-primary mt-10 waves-effect shadow"><i class="fa-regular fa-angles-left" style="margin-right: 8px;"></i>Back</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <form action = "<?= base_url('Blog/add_blogs') ?> " method = "post"  enctype= 'multipart/form-data' >
       <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="box">
            <div class="box-body">
              <div class="row justify-content-center">
                  
                <div class="col-lg-8">
                  <div class="row">
                       <div col = '12' >
           <?php if ($this->session->flashdata('success_msg')) { ?>

                        <div class="alert alert-success">
                         
                            <strong><?php echo $this->session->flashdata('success_msg'); ?></strong>
                             <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        </div>
                
                <?php } ?>
                
                <?php if ($this->session->flashdata('error_msg')) { ?>
                
                        <div class="alert alert-danger">
                           
                            <strong><?php echo $this->session->flashdata('error_msg'); ?></strong>
                             <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        </div>
                
                <?php } ?>
        </div>
                    <div class="col-lg-12">
                        
                      <h4>Title</h4>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="newstitle" placeholder="name@example.com" 
                        name="newstitle" value = "<?= (isset($b_logs[0]->title))? $b_logs[0]->title : '' ?> ">
                        <label for="newstitle">Blog title</label>
                      </div>
                      
                    </div>
                    <input type = 'hidden' name = 'id' value = "<?= (isset($b_logs[0]->blog_id))? $b_logs[0]->blog_id : '' ?> " >
                     <div class="col-lg-12">

                     <label class="style-label">Description</label>
                    
                    
                    <div class="">
                    <textarea  name = 'dis' id="summernote"><?= (isset($b_logs[0]->description))? $b_logs[0]->description : '' ?></textarea>  
                      
                        <label class="style-label">Featured Image</label>
                      </div>

                        <div class="mb-4 previewimg">
                          <label for="imgupload" class="drag_button">
                            <div class="drag_buttons">

                              <img class="previewimgs" src="<?= base_url() ?>assets_pages/images/fileup.png" class="imgpreview" alt="your image">
                            </div>
                          </label>
                          <input type="file" onchange="readURL(this);" id="imgupload" name= 'image' style="display: none;">

                        </div>

                          <div>
                    	<div class="form-floating mb-3">
                        <input type="text" class="form-control" id="newstitle" placeholder="name@example.com" 
                        value = "<?= (isset($b_logs[0]->tags))? $b_logs[0]->tags : '' ?> " name ="tags">
                        <label for="newstitle">Tags</label>
                      </div>
                    </div>	

                      </div>
                    </div>
                  </div>
                      <div class="col-lg-12 mt-3 mb-3">
                      	<button type="reset" class="btn mt-10">Cancel</button> 
                         <button type="Submit" class="btn btn btn-primary mt-10 waves-effect"> 
                            <?= (isset($b_logs[0]->title))? 'Update' : 'Save' ?></button>
                     </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
</div>



<!-- /.modal -->
<?php include ('include/footer.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
<script type="text/javascript">
	$('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
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
  $('.blogss').addClass('active');
</script>

<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('.previewimgs')
          .attr('src', e.target.result)
          .width(150)
          .height(200);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
