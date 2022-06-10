 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
<style type="text/css">
  .table > tbody > tr > td, .table > tbody > tr > th {
    padding: 1rem !important;
}
.close{
        margin-left: 80%;
        color: white;
        padding: 4px;
        background-color: red;
        opacity: 1;
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

             <a href="<?= base_url('Messages/new_newsletters')?>" class="btn btn-primary mt-10 waves-effect shadow">+ New Newsletters</a>
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
                   <thead>
                     <tr>
                       <th class="text-center">Id</th>
                       <th class="text-center">Recipients</th>
                       <th class="text-center">Title</th>
                       <th class="text-center">Heading </th>
                       <!-- <th class="text-center">Text </th> -->
                       <th class="text-center"> </th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php  if(!empty($news_letters)) { foreach($news_letters as $row) {?>
                     <tr>
                       <td class="text-center">
                         <?php echo $row['newsletter_id'] ?>
                       </td>
                       <td class="text-center">
                         <?php echo $row['recipients']?>
                       </td>
                       <td class="text-center ">
                         <?php echo $row['title']?>
                       </td>
                       <td class="text-center w-40">
                         <?php echo $row['heading']?>
                       </td>
                       
                       <td>
                         <a href="<?php echo  base_url().'Messages/newsDetails/'.$row['newsletter_id']?>" class="btn btn-light mt-3 mb-3">Details</a>
                       </td>
                     </tr>
                    <?php } } else { ?>
                    <tr>
                    <td colspan="5">Records not found</td>
                    </tr>
                    <?php } ?>
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
