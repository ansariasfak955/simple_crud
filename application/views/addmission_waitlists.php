 <?php include ('include/header.php'); ?>
 <style type="text/css">
.table > tbody > tr > td, .table > tbody > tr > th {
    padding: 0rem 1rem !important;
}
 </style>
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="tabls-title mt-1">
         <a href="<?= base_url('Admissions') ?>" class="">Dashboard</a>
         <a href="<?= base_url('Admissions/admissions_from_requests') ?>" class="">Forms & Requests</a>
         <a href="<?= base_url('Admissions/addmission_waitlists') ?>" class="active">Waitlists</a>
         <a href="<?= base_url('Admissions/programs') ?>" class="">Programs</a>
            
       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title newtittle"> Waitlists</h4>

           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">

             <a href="<?= base_url('Admissions/addmission_add_student') ?>" class="btn btn-primary mt-10 waves-effect shadow">+ Add Student</a>
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
                       

                     <div class="col-lg-6 mb-3 mt-4">
                    
                   </div>
                   <div class="col-sm-6"></div>
                   <div class="col-sm-3 mb-3">
                     <div class="suggest ">
						     <input type="hidden" id = 'h_user_id' name="user_id">	
        						<div class="suggest mt-2">
        					    	<input text="search" id="myHouse" placeholder="Search Student" class="form-control input-pad" autocomplete="off"  />	    	    
        		                    <div id="result"></div>
        		                    </div>
        		          </div>
                   </div>
                   <div class="col-sm-3 mb-3">
                      <select class="selectpicker form-control" name = 'program_id' id="number-multiple" data-container="body" data-live-search="true" title="Program" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                            <?php if(isset($programs_list) && $programs_list > 0){
                                    $p_id = $this->input->get('program_id') ; 
                        foreach($programs_list as $val){
                                
                                    if($val->program_id == $p_id){ ?> 
                                        <option selected value = "<?= $val->program_id ?>"> <?= $val->name ?> </option>  
                                 <?php     }else{ ?>
                                         <option value = "<?= $val->program_id ?>"> <?= $val->name ?> </option> 
                                
                        
                            
                           <?php } }} ?>
                         </select>                                
                   </div>

                     <!-- <div class="col-sm-2 mb-3">
                 <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Sibling" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                    <option>Yes</option>
                    <option>No</option>
                                                            
                     </select>
                   </div> -->

                   <div class="col-sm-2 mb-3">
                    <select class="selectpicker form-control" id="number-multiple" name = 'min_age' data-container="body" data-live-search="true" title="Min Age" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                        <option<?= ($this->input->get('min_age')  == 3) ? 'selected' :'' ?> value = '3' >3year</option>
                        <option <?= ($this->input->get('min_age') == 4) ? 'selected' :'' ?>value = '4' >4year</option>
                        <option<?=  ($this->input->get('min_age') == 5) ? 'selected' :'' ?> value = '5' >5year</option>
                        <option <?= ($this->input->get('min_age') == 6) ? 'selected' :'' ?> value = '6' >6year</option>
                        <option <?= ($this->input->get('min_age') == 8) ? 'selected' :'' ?> value = '8' >8year</option>
                        <option <?= ($this->input->get('min_age') == 9) ? 'selected' :'' ?> value = '9' >9year</option>
                        <option <?= ($this->input->get('min_age') == 10) ? 'selected' :'' ?> value = '10' >10year</option>
                        <option <?= ($this->input->get('min_age') == 11) ? 'selected' :'' ?> value = '11' >11year</option>
                        <option <?= ($this->input->get('min_age') == 12) ? 'selected' :'' ?>  value = '12' >12year</option>
                                                        

                     </select>
                   </div>  

                 <div class="col-sm-2 mb-3">
                    <select class="selectpicker form-control"  name = 'max_age'   id="number-multiple" data-container="body" data-live-search="true" title="Max Age" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                       <option <?= ($this->input->get('max_age') == 4) ? 'selected' :'' ?>value = '4' >4year</option>
                        <option<?=  ($this->input->get('max_age') == 5) ? 'selected' :'' ?> value = '5' >5year</option>
                        <option <?= ($this->input->get('max_age') == 6) ? 'selected' :'' ?> value = '6' >6year</option>
                        <option <?= ($this->input->get('max_age') == 7) ? 'selected' :'' ?> value = '7' >7year</option>
                       
                        <option <?= ($this->input->get('max_age') == 8) ? 'selected' :'' ?> value = '8' >8year</option>
                        <option <?= ($this->input->get('max_age') == 9) ? 'selected' :'' ?> value = '9' >9year</option>
                        <option <?= ($this->input->get('max_age') == 10) ? 'selected' :'' ?> value = '10' >10year</option>
                        <option <?= ($this->input->get('max_age') == 11) ? 'selected' :'' ?> value = '11' >11year</option>
                        <option <?= ($this->input->get('max_age') == 12) ? 'selected' :'' ?>  value = '12' >12year</option>
                    
                     </select>
                   </div>
                  
                    <div class="col-lg-12 col-md-4 col-sm-6 text-end">
                         <button type="reset" class="btn btn-lights mt-5 waves-effect  mr--1">Reset</button>
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
                       <th>Student Name </th>
                       <th>Paperwork Date </th>
                       <th>Desired Start   </th>
                       <th>Age  </th>
                       <th>Sibling Attending </th>
                       <th></th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php if(isset($s_list) && $s_list > 0){
                        
                        foreach($s_list as $val){?>                      
                       <tr>
                       <td>
                      <div class="student_list">
                          <a href="#">
                            <div class="avtar_img">
                             <img src="<?= base_url() ?>assets_pages/images/avatar.png">
                            </div>
                            <div class="info_title">
                              <h5><?= $val->student_name ?></h5>
                              <h6 class="mt-1"><?= $val->class_name ?></h6>
                            </div>
                          </a>
                        </div>
                      </td>
                        <td></td>
                        <td><?= date('d-m-Y',strtotime($val->date) ) ?></td>
                        <td><?= ($val->max_age == 0)? $val->min_age.' Year/': $val->min_age.' Year/ '. $val->max_age.' Year' ?></td>
                        <td></td>
                        <td><div class="btn-group">
                           <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon ti-settings"></i>Action</button>
                           <div class="dropdown-menu dropdown-menu-end" style="">
                             <a class="dropdown-item" href="#" data = "<?= $val->temp_s_id ?>"><i class="fa fa-pencil"></i> Enroll</a>
                             <a class="dropdown-item warning_mess " data = "<?= $val->temp_s_id ?>"  href="#"><i class="fa fa-trash-o"></i> Delete</a>
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
 
 <div class="modal modal-left chatDiv fade add_parent show" id="Chatstart" tabindex="-1" aria-modal="true" role="dialog" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-0">
        <form action="#" method="post">
          <div class="box no-radius">
            <div class="box-header">
              <div class="media align-items-top p-0">
                <a class="avatar avatar-lg status-success mx-0" href="#">
                  <img src="https://ailive.in/meritcard_dev/assets_pages/images/avatar.png" class="rounded-circle" alt="...">
                </a>
                <div class="d-lg-flex d-block justify-content-between align-items-center w-p100">
                  <div class="media-body mb-lg-0 mb-20">
                    <p class="fs-16">
                      <a class="hover-primary" href="#"><strong>Ajay</strong></a>
                    </p>
                    <p class="fs-12">Last Seen 10:30pm ago</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div class="">
                <div class="chartDiv">
                <div class="clearfix"></div>
                  <div class="card d-inline-block mb-3 float-start me-2 no-shadow bg-lighter max-w-p80">
                    <div class="position-absolute pt-1 r-0">
                      <span class="text-extra-small text-muted">09:28</span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="https://ailive.in/meritcard_dev/assets_pages/images/avatar.png" class="avatar me-10">
                        </a>
                        <div class="d-flex flex-grow-1 min-width-zero">
                          <div class="m-2 ps-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                            <div class="min-width-zero">
                              <p class="mb-0 fs-16 text-dark">Ajay</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="chat-text-start ps-55">
                        <p class="mb-0 text-semi-muted">Hello</p>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="card d-inline-block mb-3 float-end me-2 bg-primary max-w-p80">
                    <div class="position-absolute pt-1 pe-2 r-0">
                      <span class="text-extra-small">09:41</span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="https://ailive.in/meritcard_dev/assets_pages/images/avatar.png" class="avatar me-10">
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
                        <p class="mb-0 text-semi-muted">How are you ?</p>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                   <div class="card d-inline-block mb-3 float-start me-2 no-shadow bg-lighter max-w-p80">
                    <div class="position-absolute pt-1 r-0">
                      <span class="text-extra-small text-muted">09:28</span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="https://ailive.in/meritcard_dev/assets_pages/images/avatar.png" class="avatar me-10">
                        </a>
                        <div class="d-flex flex-grow-1 min-width-zero">
                          <div class="m-2 ps-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                            <div class="min-width-zero">
                              <p class="mb-0 fs-16 text-dark">Ajay</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="chat-text-start ps-55">
                        <p class="mb-0 text-semi-muted">I'm Fine</p>
                      </div>
                    </div>
                  </div>
                  <div class="card d-inline-block mb-3 float-end me-2 bg-primary max-w-p80">
                    <div class="position-absolute pt-1 pe-2 r-0">
                      <span class="text-extra-small">09:41</span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="https://ailive.in/meritcard_dev/assets_pages/images/avatar.png" class="avatar me-10">
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
                        <p class="mb-0 text-semi-muted">How are you ?</p>
                      </div>
                    </div>
                  </div>
                   <div class="card d-inline-block mb-3 float-start me-2 no-shadow bg-lighter max-w-p80">
                    <div class="position-absolute pt-1 r-0">
                      <span class="text-extra-small text-muted">09:28</span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="https://ailive.in/meritcard_dev/assets_pages/images/avatar.png" class="avatar me-10">
                        </a>
                        <div class="d-flex flex-grow-1 min-width-zero">
                          <div class="m-2 ps-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                            <div class="min-width-zero">
                              <p class="mb-0 fs-16 text-dark">Ajay</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="chat-text-start ps-55">
                        <p class="mb-0 text-semi-muted">I'm Fine</p>
                      </div>
                    </div>
                  </div>
                </div>
             </div>
             </div>
             <div class="messagebox">
           <div class="d-md-flex d-block justify-content-between align-items-center bg-white  p-5            rounded10 b-1 overflow-hidden">
               <textarea cols="form-control" name="" placeholder="Type messages....."></textarea>
                <div class="d-flex justify-content-between align-items-center mt-md-0 mt-30">
                  <button type="Submit" class="waves-effect waves-circle btn btn-circle btn-primary">
                    <i class="fa fa-send"></i>
                  </button>
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
          $("body").on('keyup','#myHouse',function(){
          
          var name = $(this).val();
             $.ajax({
        type: "POST",                               
        url: "<?= base_url('Admissions/search_student') ?>" ,
        data: {name:name},
        success: function(result) {
          var res = $.parseJSON(result);
          var htmls = '';
          if(res.status){
             htmls =  `<ul >`;
            for(var i =0;i<res.body.length; i++){  // style= 'list-style:none' 
                htmls += `<li class ='listitem btn '  data = "${res.body[i].user_id}">${res.body[i].name}</li>`;
            } 
            htmls += `</ul>`;
            $("#result").html(htmls);
             
          }else{ $("#result").html('');  }
        }                                   
    });  
                                            
      }) ; 
                                     
     
    $('body').on('click', ".listitem", function(){                                   
            var values = $(this).html();
            var ids = $(this).attr('data');
               $('#myHouse').val(values);
               $('#h_user_id').val(ids);
               $('#result').html('');
            
            window.location.href = "<?= base_url('Admissions/addmission_waitlists/') ?>" +ids ; 
            return false;
        }); 
    
    $(document).ready(function(){
         let id = "<?= $this->uri->segment(3) ?>";
                console.log( 'jk new ids == '+ id);    
                if(id != ''){   $('#myHouse').val("<?= isset($s_name)? $s_name : ''  ?>");
                                  $('#h_user_id').val(id);   
                              }
         
        });
      $('.addmission').addClass('active');
      
    $('.warning_mess').click(function(){
        var id = $(this).attr('data'); 
     
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this imaginary file!",                    
            type: "warning",                        
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            closeOnConfirm: false 
        }, function(){ 
            
            
            swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
            window.location.href = "<?= base_url('Admissions/delete_student/') ?>"+id;
            
        });
    });
</script>
