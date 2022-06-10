<?php include ('include/header.php'); ?>
<style>
    .close{
             color: white !important;
            opacity: 0.9 !important;
            margin-left: 80% !important;
    }
    #show_div,#show_input{
        display:none;
    }
</style>
<div class="content-wrapper">
  <div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <form action="<?= base_url('Admissions/add_form_data') ?>" method="post" enctype="multipart/form-data" >
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
                <h4 class="page-title page-modals"><i class="fad fa-cloud-upload"></i>Upload A New Form</h4>
                <h5 class="pstyle"><a href="<?= base_url('Admissions/admissions_from_requests') ?>" class="btn btn-primary mt-10 waves-effect shadow mb-4"><i class="fa-regular fa-angles-left" style="margin-right: 8px;"></i>Back</a> </h5>
                
                <div class="row">
                  <div class="col-lg-12 col-md-4 col-sm-6">
                   <div class="col-lg-6 mb-4 mt-4">
                    <div class="formsetting mb-3">
                      <label class="">Form Type</label>
                     <select  class="selectpicker form-control" id="minage" data-container="body" data-live-search="true" title="Select.." data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" name="ftype">
                      
                         <?php if(isset($f_type_list) && $f_type_list > 0){
                                   
                        foreach($f_type_list as $val){ ?>
                                
                                   
                        <option <?= (isset($fDtl) && count($fDtl) > 0 && $fDtl[0]->form_type == $val->form_type)? 'selected' : '' ?> ><?= $val->form_type ?> </option>
                      <?php }} ?>
                      
                        <option>Other</option>
                      </select>
                    </div>                       
                  </div>                                 
                   
                    <div class="col-lg-6 col-md-4 col-sm-6 " id = 'show_div'   >
                             <label >Add new Type</label>
                             <input type ='text' name = 'ftype_new' class = 'form-control ' id = 'show_input'  >
                         </div>
                    </div>
                                           
                     
                     <label for="proof1" class="drag_button W-100">  
                      <div class="drag_buttons">
                        <div class="text-center"><i class="fad fa-cloud-upload"></i><h5> Choose a new file</h5></div>
                       </div></label>
                       <input type="file" id="proof1" name="pdf" accept="application/pdf"  style="display: none"/>
                        <h5 class="form-file-text mt-3">
                        <div></div>
                      </h5>
                       
                     
                    
                   </div>
                   <h5 class="form-file-text">
                <div></div>
              </h5>
              <?= (isset($fDtl) && count($fDtl) > 0)? "<p>uploaded pdf old name is  <b>".$fDtl[0]->pdf_path." </b></p>" : '' ?>
                   
             <input type ='hidden' name ='form_id' value ="<?= (isset($fDtl) && count($fDtl) > 0)? $fDtl[0]->form_id : '' ?>" >
                   <div>
                      <button type="reset" class="btn btn-lights mt-5 mr--3 btnc">
                        Cancel</button>
                      <button type="submit" class="btn btn-primary mt-5 waves-effect shadow">
                        Submit</button>
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
  $('.addmission').addClass('active');
</script>
<script type="text/javascript">
  function HandleBrowseClick()
{
    var fileinput = document.getElementById("browse");
    fileinput.click();
}

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
    
    $('body').on('change','#minage',function(){
      
            let m_type = $(this).val();
            if(m_type == "Other"){
                $('#show_div').show(); $('#show_input').show();
            }else{
                  $('#show_div').hide(); $('#show_input').hide(); }
    });
    
 </script>