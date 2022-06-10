 <?php include ('include/header.php'); ?>
 <style type="text/css">
  .close{
             color: white !important;
            opacity: 0.9 !important;
            margin-left: 80% !important;
    }
 </style>
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="tabls-title mt-1">
         <a href="<?= base_url('Admissions') ?>" class="">Dashboard</a>
         <a href="<?= base_url('Admissions/admissions_from_requests') ?>" class="active">Forms & Requests</a>
         <a href="<?= base_url('Admissions/addmission_waitlists') ?>" class="">Waitlists</a>
         <a href="<?= base_url('Admissions/programs') ?>" class="">Programs</a>
                                              
       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title newtittle"> Forms & Requests</h4>

           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">

             <a href="<?= base_url('Admissions/addmission_upload_form') ?>" class="btn btn-primary mt-10 waves-effect shadow">+ Create new</a>
           </div>
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content">
      
       <div class="row">
         <div class="col-12">
           <form>
             <div class="row">
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
               <div class="col-lg-12">
                 <div class="card">
                   <div class="card-body">
                     <div class="row align-items-center">
                       
                     <div class="col-lg-6 mb-4 mt-4">
                    <div class="formsetting mb-3">
                      <label class="">Form Type</label>
                     <select  class="selectpicker form-control" id="minage" data-container="body" data-live-search="true" title="Select.." data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" name="fType">
                      <?php if(isset($form_list) && count($form_list) >0  ){foreach($form_list as $val){ ?>  
                       
                          <option <?= ($this->input->get('fType')  == $val->form_type)? 'selected' : '' ?> ><?= $val->form_type ?> </option>
                      <?php }} ?>
                    
                    </select>
                    </div>
                   </div>
                      <div class="col-lg-6 col-md-4 col-sm-6 ">
                         <button type="submit" class="btn btn-primary mt-5 waves-effect shadow mr-3">Search</button>
                      </div> 
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </form>
         </div>
       </div>

       <div class="row ">
         <div class="col-12">
           <div class="box">
             <div class="box-body">
               <div class="table-responsive">
                 <table class="table table-hover mb-0 parent_list" id="complex_header">
                   <thead>
                     <tr>
                       <th>Form Name</th>
                       <th class="text-center">Type</th>
                       <th class="text-center">Reviews Needed </th>
                       <th class="text-center">Status</th>
                       <th></th>
                     </tr>
                   </thead>

                   <tbody>
                     <?php if(isset($form_list) && count($form_list) >0  ){foreach($form_list as $val){ ?>
                     <tr>
                     <td>
                       <a href="admissions_from_submit.php" class="pdf_from">
                         <div><i class="fad fa-file-pdf"></i></div>
                         <div><h5><?= $val->form_type ?></h5></div>
                       </a>
                     </td>
                     <td class="text-center"><?= $val->form_type ?></td>
                     <td class="text-center">0</td>
                     <td class="text-center"></td>
                     <td><div class="btn-group">
                           <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon ti-settings"></i>Action</button>
                           <div class="dropdown-menu dropdown-menu-end" style="">
                             <a class="dropdown-item" href="<?= base_url('Admissions/addmission_upload_form/').$val->form_id ?>"><i class="fa fa-pencil"></i> View / Edit</a>
                             <a class="dropdown-item sa-warning" href="#"><i class="fa fa-trash-o"></i> Delete</a>
                           </div>
                         </div></td>
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
 <!-- Modal -->
 <!-- /.modal -->
 <?php include ('include/footer.php'); ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
 <script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>
 <script src="<?= base_url() ?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script src="<?= base_url() ?>assets_pages/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

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
       $('.addmission').addClass('active');
</script>
