<?php include ('include/header.php'); ?>
<div class="content-wrapper">
  <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <div class="d-flex align-items-center">
        <div class="w-100s">
          <h4 class="page-title">Create Newsletter</h4>

          <div class="d-inline-block align-items-center">
          </div>
          <div class="haff-widgets">
   
            <a href="<?= base_url('Messages/newsletters') ?>" class="btn btn-primary mt-10 waves-effect shadow"><i class="fa-regular fa-angles-left" style="margin-right: 8px;"></i>Back</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <form action="<?php echo base_url('Messages/addNewsletter') ?>" method="POST" enctype="multipart/form-data">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="box">
            <div class="box-body">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="formsetting mb-3">
                        <label for="pnumber" class="labels">Recipients</label>
                        <select multiple="" name="recipients[]" class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select recipients">
                          <option value="Demo Room 1">Demo Room 1</option>
                          <option value="Demo Room 2">Demo Room 2</option>
                          <option value="Demo Room 3">Demo Room 3</option>
                        </select>

                      </div>
                    </div>
                    <div class="col-lg-12">
                      <h4>Title</h4>
                      <div class="form-floating mb-3">
                        <input type="text" name="title" class="form-control" id="newstitle" placeholder="name@example.com" name="newstitle">
                        <label for="newstitle">Newsletter title</label>
                      </div>
                    </div>
                     <div class="col-lg-12">
                    <div id="newslatter">
                    
                    <div class="copy_section">
                    <h4>SECTION</h4>
                        <label class="style-label">Photo (optional)</label>

                        <div class="mb-4 previewimg">
                          <label for="imgupload" class="drag_button">
                            <div class="drag_buttons">

                              <img class="previewimgs" src="assets/images/fileup.png" class="imgpreview" alt="your image">
                            </div>
                          </label>
                          <input type="file" name="image" onchange="readURL(this);" id="imgupload" style="display: none;">

                        </div>

                        <div class="form-floating mb-30">
                          <input type="text" class="form-control" id="newstitle" placeholder="name@example.com" name="heading">
                          <label for="newstitle">Heading (optional)</label>
                        </div>

                        <div class="forms-floating mb-3">
                          <label for="newstitle">Text (optional)</label>
                          <textarea class="" id="" placeholder="" name="text" rows="4"></textarea>
                        </div>
                    

                      </div>
                    </div>
                  </div>
                      <div class="col-lg-12 mt-3 mb-3">
                     <a href="#" class="waves-effect addsection" id="addBtn"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add Section Block</a>
                      <div>
                         <button type="Submit" class="btn btn btn-primary mt-10 waves-effect">Preview & Send</button>
                         <button type="Submit" class="btn btn btn-primary mt-10 waves-effect">Save draft</button>
                   <button type="reset" class="btn mt-10">Cancel</button> 
                 
                      </div>
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
<script>
  $('.messag').addClass('active');
</script>

<script>
   $(document).ready(function() {
     var rowIdx = 1;
     $('#addBtn').on('click', function() {
       $('#newslatter').append(`<div id="R${++rowIdx}">
       <div class="copy_section" id="remove">
                    <div class="">
                    <h4 class="">SECTION <span>${rowIdx}</span></h4>
                     
                     </div>
                        <label class="style-label">Photo (optional)</label>

                        <div class="mb-4 previewimg">
                          <label for="imgupload" class="drag_button">
                            <div class="drag_buttons">

                              <img class="previewimgs" src="assets/images/fileup.png" class="imgpreview" alt="your image">
                            </div>
                          </label>
                          <input type="file" onchange="readURL(this);" id="imgupload" style="display: none;">

                        </div>

                        <div class="form-floating mb-30">
                          <input type="text" class="form-control" id="newstitle" placeholder="name@example.com" name="newstitle">
                          <label for="newstitle">Heading (optional)</label>
                        </div>

                        <div class="forms-floating mb-3">
                          <label for="newstitle">Text (optional)</label>
                          <textarea class="" id="" placeholder="" name="" rows="4"></textarea>
                        </div>

                        <button type="button" class="btn remove btndanger"><i class="fad fa-times"></i>&nbsp; Remove section block</button>
                        
                    

                      </div>`);
     });
     $('#newslatter').on('click', '.remove', function() {
       var child = $(this).closest('#remove').nextAll();
       child.each(function() {
         var id = $(this).attr('id');
         var idx = $(this).children('.row-index').children('p');
         var dig = parseInt(id.substring(1));
         idx.html(`Row ${dig - 1}`);
         $(this).attr('id', `R${dig - 1}`);
       });
       $(this).closest('#remove').remove();
       rowIdx--;
     });
   });
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
