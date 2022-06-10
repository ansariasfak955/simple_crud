 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
<style type="text/css">
  .table > tbody > tr > td, .table > tbody > tr > th {
    padding: 1rem !important;
}
</style>                 
 <?php include ('include/header.php'); ?>
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="tabls-title">
         <a href="<?= base_url('Messages') ?>" class="">Messages</a>
         <a href="<?= base_url('Messages/announcements') ?>" class="">Announcements</a>
         <a href="<?= base_url('Messages/newsletters') ?>" class="active">Newsletters</a>

       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title">Newsletters</h4>

           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">

             <a href="message_create_newslatter.php" class="btn btn-primary mt-10 waves-effect shadow">+ New Newsletters</a>
           </div>
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content">
       <form>
         <div class="row parentlist">
           <div class="col-lg-12">
             <div class="card">
               <div class="card-body">
                 <div class="row">
                  <h4 class="mb-4">Sent Newsletters</h4>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                     <select multiple class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Select Room" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                       <option>All</option>
                       <option>Demo Room</option>
                     </select>
                   </div>
                 <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="form-group">
                       <div class="input-group input--style">
                         <div class="input-group-addon">
                           <i class="fad fa-calendar-alt"></i>
                         </div>
                         <input type="text" class="form-control pull-right" id="datepicker" placeholder="Sent after" autocomplete="off">
                       </div>
                     </div>
                   </div>
                   <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="form-group">
                       <div class="input-group input--style">
                         <div class="input-group-addon">
                           <i class="fad fa-calendar-alt"></i>
                         </div>
                         <input type="text" class="form-control pull-right" id="todatepicker" placeholder="Sent before" autocomplete="off">
                       </div>
                     </div>
                   </div>
                  
                   <div class="col-lg-1 col-md-4 col-sm-6">
                     <button type="submit" class="btn btn-primary mt-5 waves-effect shadow">Apply</button>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </form>


       <div class="row">
         <div class="col-12">
           <div class="box">
             <div class="box-body">
               <div class="table-responsive">
                 <table class="table table-hover mb-0 parent_list chatcusur" id="complex_header">
                   <thead>
                     <tr>
                       <th class="text-center">Sent</th>
                       <th class="text-center">From</th>
                       <th class="text-center">Title </th>
                       <th class="text-center"> </th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <td class="text-center">
                         <h5>01/11/2022</h5>
                         
                       </td>
                       <td class="text-center ">
                         <h5>Punit joshi</h5>
                       </td>
                       <td class="text-center w-40">
                         <h5>Annual Function</h5>
                       </td>
                       <td>
                         <a href="newslatter_detail.php" class="btn btn-light mt-3 mb-3">Details</a>
                       </td>
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



<!-- /.modal -->
<?php include ('include/footer.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
<script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>
<script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>

<script src="<?= base_url() ?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url() ?>assets_pages/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <script>
  $('.messag').addClass('active');
</script>
  <script type="text/javascript">                        
       //Date picker
       $('#datepicker').datepicker({
         autoclose: true
       });
       //Date picker
       $('#todatepicker').datepicker({
         autoclose: true
       });

     </script>
