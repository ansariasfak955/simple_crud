<?php include ('include/header.php'); ?>
<div class="content-wrapper">
  <div class="container-full">
    <!-- Content Header (Page header) -->
 
    <!-- Main content -->
    <section class="content">
      <form  action = "<?= base_url('Admissions/addMessage') ?>" method="post" enctype="multipart/form-data">
        <div class="row parentlist justify-content-center">
            
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

          <div class="col-lg-10">
            <div class="card">
              <div class="card-body">
                <h4 class="page-title page-modals d-flex align-items-center "><i class="icon-Chat2 fs-1"></i>New Message</h4>
                <h5 class="pstyle"><a href="<?= base_url('Admissions') ?>" class="btn btn-primary mt-10 waves-effect shadow mb-4"><i class="fa-regular fa-angles-left" style="margin-right: 8px;"></i>Back</a> </h5>
                <div class="row">
                  <div class="col-lg-12 col-md-4 col-sm-6">
                    <div class="formsetting mb-3 mt-3">
                      <label>student name </label>
                      <input type = 'text' value = "<?= isset($sNames)? $sNames :'' ?>" class="form-control" readonly >
                      <input type = 'hidden' name = 's_ids' value ="<?= isset($sIds)? $sIds :'' ?>"   >
                    </div>                                                     
                                                           
                    </div>
                   
                    <div class="mb-3">
                      <label class="font-s">File :</label>
                    <label for="proof1" class="btn btn-light">
                       <i class="fa fa-cloud-upload"></i> Add File
                       </label>
                        <input id="proof1" name='image' type="file" style="opacity:0;">
                         <h5 class="form-file-text mt-3">
                        <div></div>
                      </h5>


                    </div>
                    <div class="mb-3">
                      <textarea class="form-control" rows="5" name="msg" placeholder="Type Message..."></textarea>
                    </div>
                    <div>
                      <button type="reset" class="btn btn-light mt-5 mr--3">
                        Cancel</button>
                      <button type="submit" class="btn btn-primary mt-5 waves-effect shadow">
                        Send Message</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
<script src="<?= base_url() ?>assets_pages/vendor_components/select2/dist/js/select2.full.js"></script>

<!-- /.modal -->
<?php include ('include/footer.php'); ?>

<script>
  var prevVal;
  $("#contenOption").on("change", function() {
    var val = $(this).find('option:selected').val();
    $(".content_option").removeClass(`content-${prevVal}`).addClass(`content-${val}`);
    prevVal = val;
  });

</script>

<script type="text/javascript">
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $(e.target).parent('div').find('.form-file-text').html(fileName).addClass('blocks')
      // Inside find search element where the name should display (by Id Or Class)
    });

  </script>

   <script type="text/javascript">
    $("#proof1").change(function() {
      filename = this.files[0].name;
      console.log(filename);
    });
 </script>
