 <?php include ('include/header.php'); ?>
 <style type="text/css">
   .table > tbody > tr > td, .table > tbody > tr > th {
    padding: 1rem !important;
}
 </style>
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header mt-3">
         <?php $this->load->view('include/Common_menus') ?>
       <div class="d-flex align-items-center">
       </div>
     </div>
     <!-- Main content -->
     <section class="content">                                                          
      <div class="profile_show">
          <div class="avtar_img">
              <img src="<?= base_url() ?>assets_pages/images/avatar.png">
      </div>                                             
      <div class="avtar_title">
        <h5>Sumit</h5>
      </div>
        </div>                                                                        

          <div class="row">
         <div class="col-12">

           <div class="box">
             <div class="box-body">
                <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Framework" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                   <option>Alabama - Preschool (2012)</option>
                   <option>Arizona - Preschool</option>
                   <option>Early Learning</option>
                </select>
            </div>  

            <div class="col-lg-3 col-md-4 col-sm-6">
                <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Domain" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                  <option>Approaches to Learning Standard</option>
                  <option>Fine Arts Standard</option>
                  <option>Language and Literacy Standard</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
            <button type="Submit" class="btn btn-primary waves-effect mt-5">Apply</button>
            <button type="button" class="btn btn-success waves-effect mt-5">Print Review</button>
            </div>
          </div>
          <div class="learning_box">
          <div class="row">
            <div class="col-lg-6 border-right">
            <h5 class="title">Milestone Progress <a href="#" class="ml-2" data-bs-toggle="tooltip" data-bs-original-title="Milestone progress shows the most recent progress indicator level  and the number of observations logged for child"><i class="fad fa-info-square"></i></a></h5>  

            <div class="progrescart">
              <div class="title_names">
                <h5>ART</h5>
                <h6>Arts</h6>
              </div>
              <div class="view_progress">
                <h5>-</h5>
                <h6>0</h6>
              </div>
            </div> 

            <div class="progrescart">
              <div class="title_names">
                <h5>COG</h5>
                <h6>Cognitive</h6>
              </div>
              <div class="view_progress">
                <h5>-</h5>
                <h6>0</h6>
              </div>
            </div>

        <div class="progrescart">
              <div class="title_names">
                <h5>COM</h5>
                <h6>Communication</h6>
              </div>
              <div class="view_progress">
                <h5>-</h5>
                <h6>0</h6>
              </div>
            </div>

       <div class="progrescart">
              <div class="title_names">
                <h5>FM</h5>
                <h6>Fine Motor</h6>
              </div>
              <div class="view_progress">
                <h5>-</h5>
                <h6>0</h6>
              </div>
            </div>

       <div class="progrescart">
              <div class="title_names">
                <h5>GM</h5>
                <h6>Gross Motor</h6>
              </div>
              <div class="view_progress">
                <h5>-</h5>
                <h6>0</h6>
              </div>
            </div>

     <div class="progrescart">
              <div class="title_names">
                <h5>LIT</h5>
                <h6>Literacy</h6>
              </div>
              <div class="view_progress">
                <h5>-</h5>
                <h6>0</h6>
              </div>
      </div>

     <div class="progrescart">
              <div class="title_names">
                <h5>SE</h5>
                <h6>Social & Emotional</h6>
              </div>
              <div class="view_progress">
                <h5>-</h5>
                <h6>0</h6>
              </div>
      </div> 

     <div class="progrescart">
              <div class="title_names">
                <h5>STEM</h5>
                <h6>STEM</h6>
              </div>
              <div class="view_progress">
                <h5>-</h5>
                <h6>0</h6>
              </div>
      </div>

            </div> 
            <div class="col-lg-6">
           
            <h5 class="title">Notes <a href="#"><i class="fal fa-comment-alt-edit"></i></a></h5>   

            </div>
          </div>
          

             </div>
           </div>
         </div>
       </div>
      </section>
     <!-- /.content -->

     
   </div>
 </div>

 <?php include ('include/footer.php'); ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
 <script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>
  <script src="<?= base_url() ?>assets_pages/vendor_components/select2/dist/js/select2.full.js"></script>

   <script>
   $('.myschool').addClass('active');
   $('.student').addClass('active');
 </script>

 