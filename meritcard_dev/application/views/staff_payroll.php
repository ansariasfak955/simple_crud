 <?php include ('include/header.php'); ?>
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="tabls-title">
         <a href="<?= base_url('Staff') ?>" class="">Staff</a>                                
         <a href="<?= base_url('Staff/staff_timecards') ?>" class="">Timecards</a>
         <a href="<?= base_url('Staff/staff_payroll') ?>" class="active">Payroll</a>

       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title mb-5"> Payroll</h4>
           <p class="fnt-15">Total hours worked for staff members in a date range.</p>
          
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content">
      <form>
         <div class="row staff_timecard">
           <div class="col-lg-12">
             <div class="card">
               <div class="card-body">
                 <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-6">
                      <label>Select Staff Member</label>
                        <select class="selectpicker form-control" name ='staff_id' id="number-multiple" data-container="body" data-live-search="true" title="Staff Member" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                     <?php if(isset($staff_list) && count($staff_list) >0  ){foreach($staff_list as $val){ 
                          if($val->user_id == $this->input->get('staff_id')){ ?>
					                <option selected value = "<?= $val->user_id ?>"><?= $val->name ?></option>
					           <?php }else{ ?>
                                  <option value= "<?= $val->user_id ?>"><?= $val->name ?> </option>
					<?php } } } ?>                           
                          
                        </select>
                   </div>
                 <div class="col-lg-3 col-md-4 col-sm-6">
                       <label>From Date</label>
               <div class="form-group">
             <div class="input-group input--style">
              <div class="input-group-addon">                      
              <i class="fad fa-calendar-alt"></i>
              </div>                                            
              <input type="date" class="form-control pull-right" placeholder="From Date" name = 'fDate' value = "<?= $this->input->get('fDate') ?>">
             </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6">
                   <label>To Date</label>
               <div class="form-group">
             <div class="input-group input--style">
              <div class="input-group-addon">
              <i class="fad fa-calendar-alt"></i>
              </div>
              <input type="date" class="form-control pull-right"  placeholder="To Date" name = 'tDate' value = "<?= $this->input->get('tDate') ?>" >
             </div>
                </div>
              </div>
                   <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="suggest mt-4">
                    <button type="submit" class="btn btn-primary mt-5 waves-effect shadow mr-3">Apply</button>
                  <!--  <button type="button" class="btn btn-success mt-5 waves-effect shadow" data-bs-toggle="modal" data-bs-target="#add_paroll">Export</button>-->
                     <button type="button" class="btn btn-success mt-5 waves-effect shadow  download_ex">Export</button>
                    
                    </div>
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
              <a href="#" class="svg-icons" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
          </svg> </a>
               <div class="table-responsive">
                 <table class="table-paroll table table-hover mb-0 parent_list"  id="complex_header">
                   <thead>
                         <tr>
                             <th>START DATE </th>
                             <th>END DATE </th>
                             <th>TOTAL HOURS</th>
	                     </tr>
	               
                   </thead>
                   <tbody>
                     <?php if(isset($staff_timeList) && count($staff_timeList) >0  ){foreach($staff_timeList as $val){ ?>
                             
                           <tr>
                              <td><?= date('d-m-Y h:i:s',strtotime($val->in_time)) ?></td>
                              <td><?= date('d-m-Y h:i:s',strtotime($val->out_time)) ?></td>
                              <td><?= $val->time ?></td>
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
 <div class="modal center-modal fade add_parent" id="add_paroll" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Please provide an email address</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form action="#" method="post">
           <div class="form-floating mb-3">
             <input type="text" class="form-control" id="emailaddres" placeholder="name@example.com" name="emailaddres">
             <label for="emailaddres">Email Address</label>
           </div>
           <div class="mt-4s">
             <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Send</button>
           </div>
         </form>
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
  <script src="<?= base_url() ?>assets_pages/vendor_components/select2/dist/js/select2.full.js"></script>

  <script src="<?= base_url() ?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url() ?>assets_pages/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

      <script src="<?= base_url() ?>assets_pages/js/table2excel.js"></script>
 
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
   <script>
   $('.myschool').addClass('active');
   $('.staff').addClass('active');
   
   
    $('body').on('click','.download_ex',function(){
         var m_text =    $('.dataTables_empty').html();
        
        if(m_text == 'No data available in table'){
             $('.dataTables_empty').css('color','red'); 
          // setTimeout(function(){ $('.dataTables_empty').css('color',''); }, 4000); }  
             return false;
         }
         
        $("#complex_header").table2excel({
					exclude: ".noExl",
    				name: "download-5"
				}); 
        
    });
   
   
   
   
   
   
   
 </script>