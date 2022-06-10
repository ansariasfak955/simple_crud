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
         <a href="<?= base_url('Staff/staff_timecards') ?>" class="active">Timecards</a>
         <a href="<?= base_url('Staff/staff_payroll') ?>" class="">Payroll</a>
      
       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title mb-5">Create Timecard</h4>
           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">

            <a href="<?= base_url('Staff/staff_timecards') ?>" class="btn btn-primary mt-10 waves-effect shadow posit-style"><i class="fa-regular fa-angles-left" style="margin-right: 8px;"></i>Back To All Timecards</a>
           </div>
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content">
    
     <form action ="<?= base_url('Staff/add_timecard') ?>" method="post" >
                                     
         <div class="row">
           <div class="col-lg-12">
             <div class="card">                                           
               <div class="card-body">

                   <div class="row mb-5s">
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
                    <div class="col-lg-5 col-md-4 col-sm-6">
                      <label>Select Staff Member</label>
                        <select class="selectpicker form-control" name ='staff_id' id="number-multiple" data-container="body" data-live-search="true" title="Staff Member" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                     <?php if(isset($staff_list) && count($staff_list) >0  ){foreach($staff_list as $val){  ?>
                         
                                  <option value= "<?= $val->user_id ?>"><?= $val->name ?> </option>
					<?php } } ?>                           
                          
                        </select>
                        </div>
                 
                  
						 </div>
                    <div class="row  student-cards align-items-center mb-5 mt-4" id="student_Add">
                     <div class="col-lg-1">
                       <button type="button" class="btn btn-light">1</button>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-6" id="my-up">
						    <label>Select class </label>
						<select  name = 'class_id[]' no = '1' class="form-control m_class srarch_sec input-pad">
					    <option value = '' >select class</option>
					  <?php if(isset($class_list) && count($class_list) >0  ){foreach($class_list as $val){ 
					           if($val->class_id == $this->input->get('class_id')){ ?>
					                <option selected value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					           <?php }else{ ?>
					                      <option value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					<?php }} } ?>  
					  	
					 </select>
						</div>
                       
                       	<div class="col-lg-2 col-md-4 col-sm-6" id="my-up">
						     <label>Select section </label>
						<select class=" form-control input-pad " id = 'class_div_1' name = 'section_id[]' >
					  
					   </select>
						</div>
                     
                     
                     
                     <div class="col-lg-2 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="datetime-local" class="form-control"  name="timein[]">
                         <label for="timein" class="time-title">Time in</label>
                       </div>

                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="datetime-local" class="form-control" name="timeout[]">
                         <label for="timeout" class="time-title">Time out</label>
                       </div>
                     </div>
                    <div class="col-lg-1 col-md-4 col-sm-6">
                       <button type="button" class="btn-secondary btn remove pointer"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                           <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                           <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                         </svg></button>
                     </div>
                   </div>
                   <div class="row">
                    <div class="col-lg-12">
                 <button type="Submit" class="btn btn btn-primary mt-10 waves-effect">Create</button> 
                 <button type="button" class="btn btn btn-link mt-10 waves-effect" id="addBtn"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add Another row</button>
                 </div>
               </div>
               </div>

             </div>
           </div>
         </div>
       </form>
     </section>
     <!-- /.content -->
   </div>
 </div>
 <?php include ('include/footer.php'); ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
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
        
        
   $(document).ready(function() {
     var rowIdx = 1;
     $('#addBtn').on('click', function() {
         
         
       $('#student_Add').append(`<div id="R${++rowIdx}">
       <div class="row student-cards align-items-center" id="remove">
       <div class="col-lg-1">
         <button type="button" class="btn btn-light">${rowIdx}</button></div>
            
            <div class="col-lg-2 col-md-4 col-sm-6">
						    <label>Select class </label>
						<select  name = 'class_id[]' no = '${rowIdx}' class="form-control m_class srarch_sec "     >
					    <option value = '' >select class</option>
					  <?php if(isset($class_list) && count($class_list) >0  ){foreach($class_list as $val){ 
					           if($val->class_id == $this->input->get('class_id')){ ?>
					                <option selected value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					           <?php }else{ ?>
					                      <option value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					<?php }} } ?>  
					  	
					 </select>
						</div>
                     <div class="col-lg-2 col-md-4 col-sm-6">
						     <label>Select section </label>
						  <select class=" form-control " id = 'class_div_${rowIdx}' name = 'section_id[]' ></select>
				    	</div>
				    	
                     <div class="col-lg-2 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="datetime-local" class="form-control" name="timein[]">
                         <label for="timein" class="time-title">Time in</label>
                       </div>

                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="datetime-local" class="form-control"  name="timeout[]">
                         <label for="timeout" class="time-title">Time out</label>
                       </div>
                     </div>
                   <div class="col-lg-1 col-md-4 col-sm-6">
                    <button type="button" class="btn-secondary remove btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
          </svg></button>
                    </div>
                  </div>`);
     });
     $('#student_Add').on('click', '.remove', function() {
       var child = $(this).closest('#remove').nextAll();
       child.each(function() {
         var id = $(this).attr('id');
         var idx = $(this).children('.row-index').children('p');
         var dig = parseInt(id.substring(1));
         idx.html(`Row ${dig - 1}`);
         $(this).attr('id', `R${dig - 1}`);
       });
       $(this).closest('#remove').remove();
       rowIdx--;
     });
   });
 </script>
 <script>
   $('.myschool').addClass('active');
   $('.staff').addClass('active');
 </script>