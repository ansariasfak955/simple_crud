 <?php include ('include/header.php'); ?>
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
 <style>
     .close{
                margin-left: 80%;
                color: white;
                padding: 4px;
                background-color: red;
                opacity: 1;
     }
 </style>
 
 
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="tabls-title">
         <a href="<?= base_url('Staff') ?>" class="">Staff</a>                                
         <a href="<?= base_url('Staff/staff_timecards') ?>" class="active">Timecards</a>
         <a href="<?= base_url('Staff/staff_payroll') ?>" class="">Payroll</a>
       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title mb-5">Timecards</h4>
           <p class="fnt-15">Rooms, check-in and check-out times, and total hours for staff members in a given date range.</p>

                                    
           <div class="haff-widgets">

             <a href="<?= base_url('Staff/staff_add_timecard') ?>" class="btn btn-primary mt-10 waves-effect shadow posit-style" >New Timecard</a>


           </div>
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content">
      <form >
         <div class="row staff_timecard">
             
           <div class="col-lg-12">
             <div class="card">
               <div class="card-body">
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
                   <div class="col-lg-4 col-md-4 col-sm-6">
                     <label>Select Staff Member</label>
                        <select class="selectpicker form-control" name ='staff_id' id="number-multiple" data-container="body" data-live-search="true" title="Staff Member" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                     <?php if(isset($staff_list) && count($staff_list) >0  ){foreach($staff_list as $val){ 
                         if($val->user_id == $this->input->get('staff_id')){ ?>
					                <option selected value= "<?= $val->user_id ?>"><?= $val->name ?> </option>
					           <?php }else{ ?>
                                  <option value= "<?= $val->user_id ?>"><?= $val->name ?> </option>
					<?php } } } ?>                           
                          
                        </select>
                   </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <label>Select class </label> <!-- m_class -->
						<select  name = 'class_id' no = '1' class="form-control  srarch_sec input-pad mt-2">
					    <option value = '' >select class</option>
					  <?php if(isset($class_list) && count($class_list) >0  ){foreach($class_list as $val){ 
					           if($val->class_id == $this->input->get('class_id')){ ?>
					                <option selected value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					           <?php }else{ ?>
					                      <option value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					<?php }} } ?>  
					  	
					 </select>
                   </div>
                   <br>
                      <div class="col-lg-4 col-md-4 col-sm-6">
                     
                   <label>Select section </label>
						<select class=" form-control input-pad mt-2" id = 'class_div_1' name = 'section_id' >
					  
					   </select>
                     </div>
                     <br>
                
                <div class="col-lg-4 col-md-4 col-sm-6 mt-2">
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
              <div class="col-lg-4 col-md-4 col-sm-6 mt-2">
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
                   <div class="col-lg-4 col-md-4 col-sm-6">
                       <div class="suggest mt-4 pt-5">
                    <a href = "<?= base_url('Staff/staff_timecards') ?>" class="btn mt-5 btn-info">Reset</a>
                    <button type="submit" class="btn btn-primary mt-5 waves-effect shadow">Submit</button>
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
               <div class="table-responsive">
                 <table class="table table-hover mb-0 parent_list" id="complex_header">
                   <thead>
                     <tr>
                       <th>Date</th>
                      
                       <th>Total Day's</th>
                      
                       <th>Time In </th>
                       <th>Time Out<th>
                       <th>Total hour's<th>
	                     </tr>
                   </thead>                                           
                   <tbody>
                      
                        <?php if(isset($staff_timeList) && count($staff_timeList) >0  ){foreach($staff_timeList as $val){ ?>
                            <tr>
                              <td><?= date('d-m-Y',strtotime($val->date)) ?></td>
                               <td><?= $val->days ?></td>
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
 <?php include ('include/footer.php'); ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
 <script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>
  <script src="<?= base_url() ?>assets_pages/vendor_components/select2/dist/js/select2.full.js"></script>

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
  </script>
   <script>
    $('body').on('click','.srarch_sec', function (){
             var no = $(this).attr('no');    
             var class_id = $(this).val();    
             
               $.ajax({
        type: "POST",                               
        url: "<?= base_url('Room/class_section_list') ?>" ,
        data: {class_id:class_id},                                                
        success: function(result) {
          var res = $.parseJSON(result);                       
          var htmls = '';  var s_id = "<?= isset($student_tbl[0]->section_tbl)? $student_tbl[0]->section_id : '' ?>";                     
         
      
          if(res.status){
             htmls =  `<option value = '' >select section</option>`;
                    
            for(var i =0;i<res.body.length; i++){
                
                htmls += (s_id == res.body[i].section_id)? `<option selected value = "${res.body[i].section_id}">${res.body[i].name}</option>` : `<option value = "${res.body[i].section_id}">${res.body[i].name}</option>`;
            } 
                                              
            $("#class_div_"+no).html(htmls);
             
          }
        }
    });
        });
   
   
   $('.myschool').addClass('active');
   $('.staff').addClass('active');
 </script>