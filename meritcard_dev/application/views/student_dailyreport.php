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


              <div class="row ">
         <div class="col-12">
           <div class="box">
             <div class="box-body">
               <div class="table-responsive">
             <div class="">
              <h3>March 9, 2022</h3>
             <p>No activities for this day. Log activities in your app to send a daily report.</p>
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

   <script>
   $('.myschool').addClass('active');
   $('.student').addClass('active');
 </script>

 