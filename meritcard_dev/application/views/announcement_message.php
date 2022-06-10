<?php include ('include/header.php'); ?>
<div class="content-wrapper">
  <div class="container-full">
    <!-- Content Header (Page header) -->                            
 
    <!-- Main content -->
    <section class="content">
      <form action="<?= base_url('Messages/announcement_msg_add') ?>" method="post" enctype="multipart/form-data" >
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
                <h4 class="page-title page-modals"><i class="fa-solid fa-bullhorn"></i>New Parent Announcement</h4>
                <h5 class="pstyle"><a href="<?= base_url('Messages/announcements') ?>" class="btn btn-primary mt-10 waves-effect shadow mb-4"><i class="fa-regular fa-angles-left" style="margin-right: 8px;"></i>Back</a> </h5>
                <div class="row">
                  <div class="col-lg-12 col-md-4 col-sm-6">
                    <div class="formsetting mb-3 mt-3">
                      <label>Recipients:</label>
                      <select multiple class="selectpicker form-control" name = 'class_id[]' id="number-multiple" data-container="body" data-live-search="true" title="Select Class" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                        <?php if(isset($class_list) && count($class_list) >0  ){foreach($class_list as $val){ 
					           if($val->class_id == $this->input->get('class_id')){ ?>
                                     <option selected value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					           <?php }else{ ?>
					                      <option value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					<?php }} } ?>  
					  	
                    </select>
                    </div>
                    <div class="formsetting mb-3">
                      <label>Type:</label>
                      <select class="selectpicker form-control" name = 'msg_type' id="contenOption" data-container="body" data-live-search="true" title="Select..." data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                        <option value="messag">Message</option>
                        <option value="reminder">Reminder</option>
                        <option value="alert">Alert</option>
                      </select>
                    </div>
                    <div class="content_option">
                      <div class="reminder">
                        <div class="row align-items-center">
                          <div class="col-lg-3">
                            <h5>Reminder Date:</h5>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-floating mb-3">
                              <input type="date" class="form-control" name="Rmdr_date">
                              <label for="snumber">Date</label>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-floating mb-3">
                              <input type="time" class="form-control" name="Rmdr_time">
                              <label for="snumber">Time</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="alertBox">
                        <div class="from-group">
                          <input type="checkbox" name = 'sms' id="basic_checkbox_133">
                          <label for="basic_checkbox_133">Send SMS Message</label>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="font-s">File :</label>
                      <label for="file-upload" class="custom-file-upload">
                        <a href="#" class="btn btn-light"><i class="fa fa-cloud-upload"></i> Add File </a>
                       </label>
                      <input id="file-upload" name='upload_cont_img' type="file">
                                                                
                     
                    </div>
                    <div class="mb-3">
                      <textarea class="form-control" rows="5" name="msg" placeholder="Type Message..."></textarea>
                    </div>
                    <div>
                      <button type="reset" class="btn btn-light mt-5 mr--3">
                        Cancel</button>
                      <button type="submit" class="btn btn-primary mt-5 waves-effect shadow">
                        Send Announcement</button>
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
  $('#file-upload').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#file-upload')[0].files[0].name;
    $(this).prev('label').text(file);
  });

</script>

<script>
  var prevVal;
  $("#contenOption").on("change", function() {
    var val = $(this).find('option:selected').val();
    $(".content_option").removeClass(`content-${prevVal}`).addClass(`content-${val}`);
    prevVal = val;
  });

</script>
