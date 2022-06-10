 
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.css">

 <?php include ('include/header.php'); ?>
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->               
     <div class="content-header">
       <div class="tabls-title">
         <a href="<?= base_url('Messages') ?>" class="">Messages</a>
         <a href="<?= base_url('Messages/announcements') ?>" class="active">Announcements</a>
         <a href="<?= base_url('Messages/newsletters') ?>" class="">Newsletters</a>

       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title">Announcements</h4>

           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">

             <a href="<?= base_url('Messages/announcement_message') ?>" class="btn btn-primary mt-10 waves-effect shadow">+ New Parent Announcement</a>
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
                   <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="form-group">
                       <div class="input-group input--style">
                         <div class="input-group-addon">
                           <i class="fa-regular fa-calendars"></i>
                         </div>
                         <input type="date" class="form-control pull-right"  name = 'fdate' placeholder="From Date" autocomplete="off">
                       </div>
                     </div>                     
                   </div>
                   <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="form-group">
                       <div class="input-group input--style">
                         <div class="input-group-addon">
                           <i class="fa-regular fa-calendars"></i>
                         </div>
                         <input type="date" class="form-control pull-right" name = 'tdate' placeholder="To Date" autocomplete="off">
                       </div>
                     </div>
                   </div>
                  <div class="col-lg-4 col-md-4 col-sm-6">
                     <select multiple class="selectpicker form-control" name = 'class_id[]' id="number-multiple" data-container="body" data-live-search="true" title="Select Class" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                        <?php if(isset($class_list) && count($class_list) >0  ){foreach($class_list as $val){ 
					           if($val->class_id == $this->input->get('class_id')){ ?>
                                     <option selected value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					           <?php }else{ ?>
					                      <option value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					<?php }} } ?>  
					  	
                    </select>
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
                       <th class="text-center">DATE</th>
                       <th class="text-center">PARENT ANNOUNCEMENT</th>
                       <th class="text-center">ANNOUNCEMENT TYPE</th>
                     </tr>
                   </thead>
                   <tbody>
                        <?php   if(isset($list) && count($list)>0 ){ 
                                        foreach($list as $val){ ?>
                     <tr>
                       <td class="text-center"  data-bs-toggle="modal" data-bs-target="#Chatstart">
                         <h5><?= $val->date_time ?></h5>
                        
                       </td>
                       <td class="text-center " data-bs-toggle="modal" data-bs-target="#Chatstart">
                         <h5><?= $val->message ?></h5>
                       </td>
                       <td class="text-center w-40" data-bs-toggle="modal" data-bs-target="#Chatstart">
                         <h5><?= $val->type ?></h5>
                       </td>
                     </tr>
                     	<?php }} ?>
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


 <!-- Modal Parent Edit -->
<div class="modal modal-left chatDiv fade add_parent" id="Chatstart" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-0">
        <form action="#" method="post">
          <div class="box no-radius">
            <div class="box-header">
              <div class="media align-items-center p-0">
                <a class="avatar avatar-lg status-success mx-0" href="#">
                  <h5 class="roomAlpha">D</h5>
                </a>
                <div class="d-lg-flex d-block justify-content-between align-items-center w-p100">
                  <div class="media-body mb-lg-0 mb-20">
                    <p class="fs-16">
                      <a class="hover-primary" href="#"><strong>Demo Room</strong></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div class="">
                <div class="chartDiv">
                <div class="clearfix"></div>
                  <div class="card d-inline-block mb-3 float-end me-2 bg-primary max-w-p80">
                    <div class="position-absolute pt-1 pe-2 r-0">
                      <span class="text-extra-small">09:41</span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="assets/images/avatar.png" class="avatar me-10">
                        </a>
                        <div class="d-flex flex-grow-1 min-width-zero">
                          <div class="m-2 ps-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                            <div class="min-width-zero">
                              <p class="mb-0 fs-16">Admin</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="chat-text-start ps-55">
                        <p class="mb-0 text-semi-muted">Loram ipsum simply dummy text</p>
                      </div>
                    </div>
                  </div>
                 </div>
             </div>
             </div>
    
      </div>
  </form>
          <!-- /.box-body -->
      </div>
    </div>
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
