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
        <div class="tabls-title text-indent">
         <a href="student_feed.php" class="">Feed</a>
         <a href="student_learning.php" class="">Learning</a>
         <a href="student_profile.php" class="">Profile</a>
         <a href="student_attachments.php" class="">Attachments</a>
          <a href="student_dailyreport.php" class="">Daily Report</a>
         <a href="studnet_forms_requests.php" class="active">Forms & Requests</a>

       </div>
       <div class="d-flex align-items-center">
       </div>
     </div>
     <!-- Main content -->
     <section class="content">
      <div class="profile_show">
          <div class="avtar_img">
              <img src="assets/images/avatar.png">
      </div>
      <div class="avtar_title">
        <h5>Sumit</h5>
      </div>
        </div>

          <div class="row">
         <div class="col-12">


              <div class="row ">
         <div class="col-12">
           <div class="box">
             <div class="box-body">
               <div class="table-responsive">
             <div class="div_title">
              <h4>(Sumit) Forms & Requests</h4>
              <a href="#" class="btn btn-primary mt-10 waves-effect shadow"><i class="fad fa-share-alt" style="margin-right: 8px;"></i>Share</a>
              </div>
                 <table class="table table-hover mb-0 parent_list" id="complex_header">

                   <thead>
                     <tr>
                     <th>Form</th>
                     </tr>
                   </thead>
                 <!--     <tbody>    
                  <tr>
                     <td></td>              
                   <td></td>              
                   <td></td>              
                   <td></td>
                   <td></td>
                  </tr>              
                   </tbody> -->
                 </table>
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

 