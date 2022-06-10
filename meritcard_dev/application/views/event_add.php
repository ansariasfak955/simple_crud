<?php include ('include/header.php'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
 <link rel="stylesheet" type="text/css" href="assets_pages/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="assets_pages/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
 <style>
   .close{
                margin-left: 80%;
                color: white;
                padding: 4px;
                background-color: red;
                opacity: 1;
     }
 </style>
<div class="content-wrapper">
  <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <div class="d-flex align-items-center">
        <div class="w-100s">
          <h4 class="page-title">Add Event</h4>

          <div class="d-inline-block align-items-center">
          </div>
          <div class="haff-widgets">
   
            <a href="<?= base_url('Event/index') ?>" class="btn btn-primary mt-10 waves-effect shadow"><i class="fa-regular fa-angles-left" style="margin-right: 8px;"></i>Back</a>
          </div>
        </div>
        
      </div>

    </div>
    <div class="col-sm-12" >
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
    <!-- Main content -->
    <section class="content">
      <form action="<?php echo base_url('Event/add_event') ?>" method="POST">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="box">
            <div class="box-body">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <div class="row">
                       <div class="col-lg-6 mb-3">
                    
                      <div class="formsetting mb-3">                     
                     <select multiple class="selectpicker form-control" name="room" id="number-multiple" data-container="body" data-live-search="true" title="Select Room" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false">
                       <option disabled="">Select Room</option>
                       <option>All</option>
                       <option>Demo Room</option>
                     </select>
                      </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                      
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="title" id="newstitle" placeholder="name@example.com" name="newstitle" required>
                        <label for="newstitle">Evant title</label>
                      </div>
                    </div> 

                 

                      <div class="col-lg-6 mb-3">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="form-floating mb-2 w45">
                            <input type="time" class="form-control" name="ftime" id="timeform" placeholder="name@example.com" name="timeform" required>
                            <label for="timeform">From Time</label>
                          </div>
                          <span class="mr--1 ml--1">-</span>
                          <div class="form-floating mb-2 w45">
                            <input type="time" class="form-control" name="to_time" id="timeto" placeholder="name@example.com" name="timeto" required>
                            <label for="timeto">To Time</label>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6 mb-3">
                    
                      <div class="form-floating mb-2 mycheckboxdiv">
                        <i class="fad fa-calendar-alt"></i>
                        <input type="text" class="form-control" name="date" id="todatepicker" placeholder="name@example.com" name="newstitle" required>
                        <label for="newstitle">Select Date</label>
                      </div>
                    </div>

                       <div class="col-lg-6">
                      
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="fees" id="newstitle" placeholder="name@example.com" name="newstitle" required>
                        <label for="newstitle">Evant Fees</label>
                      </div>
                    </div> 
                     <div class="col-lg-6">
                      
                       <div class="formsetting mb-3">                     
                     <select class="selectpicker form-control" name="etype" id="number-multiple" data-container="body" data-live-search="true" title="Evant Type" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false">
                       <option disabled="">Evant Type</option>
                       <option value="Optional">Optional</option>
                       <option value="mandatory">mandatory </option>
                     </select>
                      </div>
                    </div> 


                     <div class="col-lg-12">

                     <label class="style-label">Description</label>
                     <textarea id="summernote" name="description"></textarea>

                    </div>
                  </div>
                      <div class="col-lg-12 mt-3 mb-3">
                      	<button type="reset" class="btn mt-10">Cancel</button> 
                         <button type="Submit" class="btn btn btn-primary mt-10 waves-effect">Save</button>
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

<script src="<?= base_url() ?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script src="<?= base_url() ?>assets_pages/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <script type="text/javascript">
       //Date picker
   $('#todatepicker').datepicker({
     autoclose: true
   });

 </script>

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
  $('.events').addClass('active');
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
