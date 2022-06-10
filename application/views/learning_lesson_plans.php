 <link rel="stylesheet" type="text/css" href="assets_pages/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="assets_pages/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
 <?php include ('include/header.php'); ?>
 <style type="text/css">
   .table > tbody > tr > td, .table > tbody > tr > th {
    padding: 1rem !important;
}
 .table > tbody > tr > td a
{
    font-size: 14px;
    color: black;
} 
.table > tbody > tr > td:hover a
{
    font-size: 14px;
    color: black;
    text-decoration: underline;
}
 </style>
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="tabls-title mt-1">
         <a href="<?= base_url('Learning') ?>" class="">Review</a>
         <a href="<?= base_url('Learning/lesson_plans') ?>" class="active">Lesson Plans</a>
         <a href="<?= base_url('Learning/lessons') ?>" class="">Lessons</a>
       </div>
      <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title newtittle"> Lesson Plans</h4>

           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">

             <a href="<?= base_url('Learning/new_plan_lesson') ?>" class="btn btn-primary mt-10 waves-effect shadow">+ New Lesson Plan</a>
           </div>
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content studnet_lesstion">
      
       <div class="row">
         <div class="col-12">
           <form>
             <div class="row">
               <div class="col-lg-12">
                 <div class="card">
                   <div class="card-body">
                     <div class="row align-items-center">
                       
                     <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <input type="search" name="" class="form-control ht-40" placeholder="Search.."> 
                       </div> 


                         <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                          <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Select Room" data-hide-disabled="true" data-actions-box="false" data-virtual-scroll="false">
                            <option disabled="">Select Room</option> 
                           <option>All</option>
                           <option>Demo Room </option>
                           <option>Demo Room 1</option>
                           <option>Demo Room 2</option>
                         </select>
                       </div>

                     
                    <div class="col-lg-4 col-md-4 col-sm-6">
                       <div class="form-group">
                     <div class="input-group input--style">
                      <div class="input-group-addon">
                      <i class="fad fa-calendar-alt"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" placeholder="From Date" autocomplete="off">
                     </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6">
                       <div class="form-group">
                     <div class="input-group input--style">
                      <div class="input-group-addon">
                      <i class="fad fa-calendar-alt"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="todatepicker" placeholder="To Date" autocomplete="off">
                     </div>
                        </div>
                      </div>

                      <div class="col-lg-1 col-md-4 col-sm-6 mt--1">
                         <button type="submit" class="btn btn-primary mt-5 waves-effect shadow mr-3 mr--1">Apply</button>
                        
                      </div> 
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </form>
         </div>
       </div>

       <div class="row">
         <div class="col-12">
           <div class="box">
             <div class="box-body">
               <div class="table-responsive">
                 <table class="table table-hover mb-0 parent_list" id="complex_header">
                   <thead>
                     <tr>
                       <th>Lesson</th>
                       <th>Rooms </th>
                       <th>Dates</th>
                     </tr>
                   </thead>

                   <tbody>
                    <tr>
                      <td><a href="learning_new_plan_lesson.php">demo room test</a></td>
                      <td><a href="learning_new_plan_lesson.php">demo room 1, demo room 2,</a></td>
                      <td><a href="learning_new_plan_lesson.php">03/06/2022 - 03/12/2022</a></td>

                    </tr>
                   </tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
       </div>
      </section>
     <!-- /.content -->
   </div>
 </div>
 <!-- Modal -->
<!-- Modal -->
 <div class="modal  invite_modal fade add_parent" id="export_cart" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Please provide an email address</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fad fa-times-circle"></i></button>
       </div>
       <div class="modal-body">
        <form>
          <div class="form-floating mb-3">
             <input type="email" class="form-control" id="start" placeholder="name@example.com" name="email" value="">
            <label class="email" for="start">Email Address</label>
          </div>
        </form>
              <div class="mt-4s text-right">
             <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
             <button type="submit" class="btn btn-dark shadow">Send</button>
           </div>
       </div>
     </div>
   </div>
 </div>
 <!-- /.modal -->

 <!-- /.modal -->
 <?php include ('include/footer.php'); ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="assets_pages/js/bootstrap-select.js"></script>
 <script src="assets_pages/vendor_components/datatable/datatables.min.js"></script>
 <script src="assets_pages/src/js/pages/data-table.js"></script>
 <script src="assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script src="assets_pages/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

 <script type="text/javascript">
   //Date picker
   $('#datepicker').datepicker({
     autoclose: true
   });
   //Date picker
   $('#todatepicker').datepicker({
     autoclose: true
   });

    function toggle(source) {
      checkboxes = document.getElementsByName('checkboxx');
      for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
      }
    }
 </script>
   <script>
  $('.learnings').addClass('active');
</script>


