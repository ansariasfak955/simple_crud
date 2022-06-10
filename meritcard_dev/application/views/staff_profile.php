 <?php include ('include/header.php'); ?>
 <link rel="stylesheet" type="text/css" href="assets/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
 <div class="content-wrapper">
   <div class="container-full">
     <div class="content-header">
       <div class="tabls-title text-indent">
          <a href="<?= base_url('Staff') ?>" class="active">Staff</a>                                
         <a href="<?= base_url('Staff/staff_timecards') ?>" class="">Timecards</a>
         <a href="<?= base_url('Staff/staff_payroll') ?>" class="">Payroll</a>

       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">

           <div class="haff-widgets">

             <a href="<?= base_url('Staff') ?>" class="btn btn-primary mt-10 waves-effect shadow"><i class="fa-regular fa-angles-left" style="margin-right: 8px;"></i>Back To All Staff</a>
           </div>
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content">

       <div class="row">
         
           <div col = '8' >
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
       
         <div class="col-md-6">
           <div class="box box-slided-up bgsetiing">
             <div class="box-header with-border">
               <h4 class="box-title ">PERSONAL INFO</h4>
               <ul class="box-controls pull-right">
                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
               </ul>
             </div>

             <div class="box-body" style="display: block;">
               <form action="<?= base_url('Staff/staff_update_info_1/').$this->uri->segment(3) ?>" 
                 enctype= 'multipart/form-data' method="post">                              
                                                                              

                 <div class="d-inline-block align-items-center">
                   <div class="profile_show choose_img mb-3">
                     <label for="imgupload" class="inputhide avtar_img">
                       <input type="file" onchange="readURL(this);" name = 'image' id="imgupload" accept="image/*">
                       <img id="profileImg" src="<?= base_url('assets/images/').$user_tbl[0]->image  ?>" alt="your image">
                       <i class="fad fa-camera-alt"></i>
                     </label>
                     <div class="avtar_title">
                       <h5 class="mb0"><?= isset($user_tbl[0]->name)? $user_tbl[0]->name  : '' ?></h5>
                     </div>
                   </div>
                 </div>
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" name="name" value="<?= isset($user_tbl[0]->name)? $user_tbl[0]->name  : '' ?>">
                   <label for="fistname">Full Name</label>
                 </div>

                 <div class="form-floating mb-3">
                   <input type="email" class="form-control" name="email" placeholder="name@example.com" value="<?= isset($user_tbl[0]->email )? $user_tbl[0]->email : '' ?>">
                   <label for="emailaddres">Email address</label>
                 </div>

                 <div class="form-floating mb-3">
                   <input type="date" class="form-control" id="todatepicker-2"  name="dob" value="<?= isset($user_tbl[0]->DOB )? $user_tbl[0]->DOB : '' ?>">
                   <label for="todatepicker">Date of birth</label>
                 </div>

                 <div class="form-floating mb-3">
                   <input type="number" class="form-control" name="mobile" value="<?= isset($user_tbl[0]->mobile)? $user_tbl[0]->mobile  : '' ?>">
                   <label for="phone">Phone</label>
                 </div>

                 <div class="form-floating mb-3">
                   
                   <input type="text" class="form-control"  name="allergies" value="<?= isset($staff_tbl[0]->allergies)? $staff_tbl[0]->allergies  : '' ?>">
                   <label for="allergies">Allergies</label>
                 </div>

                 <div class="form-floating mb-3">   
                   <input type="text" class="form-control"  name="medications" value="<?= isset($staff_tbl[0]->medications)? $staff_tbl[0]->medications  : '' ?>">
                   <label for="pnumber">Medications</label>
                 </div>

                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" name='doctor_name' value ="<?= isset($staff_tbl[0]->doctor_name)? $staff_tbl[0]->doctor_name  : '' ?>">
                   <label for="pnumber">Doctor</label>
                 </div>

                 <div class="form-floating mb-3">
                   <input type="number" class="form-control"  name="doctor_phone" value ="<?= isset($staff_tbl[0]->doctor_mobile)? $staff_tbl[0]->doctor_mobile  : '' ?>" >
                   <label for="pnumber">Doctor Phone</label>
                 </div>

                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" name="ec_name" value ="<?= isset($staff_tbl[0]->emergency_contact_name)? $staff_tbl[0]->emergency_contact_name  : '' ?>"  >
                   <label for="emfirst">Emergency Contact Name</label>
                 </div>

                

                 <div class="form-floating mb-3">
                   <input type="number" class="form-control" id="emcontactp" placeholder="emcontact" name="ec_phone" value ="<?= isset($staff_tbl[0]->emergency_contact_phone)? $staff_tbl[0]->emergency_contact_phone  : '' ?>" >
                   <label for="emcontactp">Emergency Contact Phone</label>
                 </div>

                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" name="ec_type" value ="<?= isset($staff_tbl[0]->emergency_contact_type)? $staff_tbl[0]->emergency_contact_type  : '' ?>" >
                   <label for="emcontact">Emergency Contact Type</label>
                 </div>



                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" name="notes" value ="<?= isset($staff_tbl[0]->notes)? $staff_tbl[0]->notes  : '' ?>">
                   <label for="pnumber">Notes</label>
                 </div>


                 <div class="mt-4s">
                   <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
                   <button type="submit" class="btn btn-success shadow">Update Profile</button>
                 </div>
               </form>
             </div>
           </div>
           <div class="box box-slided-up bgsetiing">
             <div class="box-header with-border">
               <h4 class="box-title ">ADDRESS</h4>
               <ul class="box-controls pull-right">
                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
               </ul>
             </div>
                           
             <div class="box-body" style="display: block;">
               <form action="<?= base_url('Staff/staff_update_info_2/').$this->uri->segment(3) ?>"  method="post">                              
                                                                   
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control"  name="address"  value="<?= isset($user_tbl[0]->address)? $user_tbl[0]->address  : '' ?>"  >
                   <label for="Address">Address</label>
                 </div>

                 <div class="mt-4s">
                   <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
                   <button type="submit" class="btn btn-success shadow">Save</button>
                 </div>
               </form>
             </div>
           </div>

           <div class="box box-slided-up bgsetiing">
             <div class="box-header with-border">
               <h4 class="box-title ">EMPLOYEE PERSONAL INFORMATION</h4>
               <ul class="box-controls pull-right">
                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
               </ul>
             </div>

             <div class="box-body" style="display: block;">
               <form action="<?= base_url('Staff/staff_update_info_4/').$this->uri->segment(3) ?>"  method="post">                              
               
                 <div class="form-floating mb-3"> <!-- -->
                   <input type="date" class="form-control"  name="hire_date"
                    value ="<?= isset($staff_tbl[0]->hire_date)? $staff_tbl[0]->hire_date  : '' ?>"  >
                   <label for="hiredate">Hire date</label>
                 </div>

                 <div class="form-floating mb-3">
                   <input type="text" class="form-control"  name="hire_time_notes" 
                    value ="<?= isset($staff_tbl[0]->hire_time_notes)? $staff_tbl[0]->hire_time_notes  : '' ?>"  >
                   <label for="pnumber">Notes</label>
                 </div>

                 <div class="mt-4s">
                   <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
                   <button type="submit" class="btn btn-success shadow">Save</button>
                 </div>
               </form>
             </div>
           </div>

         </div>
         <div class="col-md-6">

           <div class="box box-slided-up bgsetiing">
             <div class="box-header with-border">
               <h4 class="box-title ">ROOMS</h4>
               <ul class="box-controls pull-right">
                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
               </ul>
             </div>

             <div class="box-body" style="display: block;">
               <div class="view_info">
                 <p>Admins must be in all rooms. To edit rooms, please first remove their admin privileges.</p>
                 <div class="dflex">
                   <label>School Rooms</label>
                   <h5><?php if(isset($all_rooms) && count($all_rooms)>0){ foreach($all_rooms as $val){ echo $val->name.',';}} ?> </h5>
                 </div>
                 <div class="dflex">
                   <label>Schedule</label>
                   <a href="<?= base_url('Staff/schedule') ?>">View all staff schedules</a>
                 </div>
               </div>
             </div>
           </div>

           <!--<div class="box box-slided-up bgsetiing">
             <div class="box-header with-border">
               <h4 class="box-title ">PERMISSIONS</h4>
               <ul class="box-controls pull-right">
                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
               </ul>
             </div>

             <div class="box-body" style="display: block;">
               <div class="view_info">
                 <div class="controls mb-3" style="">
                   <input type="checkbox" id="admin" class="filled-in">
                   <label for="admin" class="labels lin19">Admin</label>
                 </div>
                 <div class="controls hideedit mb-3" style="">
                   <input type="checkbox" id="studentinfo" class="filled-in">
                   <label for="studentinfo" class="labels lin19">Edit Student Information</label>
                 </div>
               </div>
             </div>
           </div>-->


           <div class="box box-slided-up bgsetiing">
             <div class="box-header with-border">
               <h4 class="box-title ">CERTIFICATIONS</h4>
               <ul class="box-controls pull-right">
                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
               </ul>
             </div>

             <div class="box-body" style="display: block;">
                <form action="<?= base_url('Staff/staff_update_info_3/').$this->uri->segment(3) ?>"  method="post">                              
              
                 <div class="formsetting mb-3">

                   <label for="status">Degree</label>
                   <select class="selectpicker form-control" name = 'degree_type' id="status" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
                    
                        <option <?= (isset($staff_crt_tbl[0]->degree_type) && $staff_crt_tbl[0]->degree_type == 'GED or high school diploma') ? 'selected' : '' ?>  >GED or high school diploma</option>
                        <option <?= (isset($staff_crt_tbl[0]->degree_type) && $staff_crt_tbl[0]->degree_type == 'Associate degree') ? 'selected' : '' ?>  >Associate degree</option>
                        <option <?= (isset($staff_crt_tbl[0]->degree_type) && $staff_crt_tbl[0]->degree_type == "Bachelor’s degree") ? 'selected' : '' ?>  >Bachelor’s degree</option>
                        <option <?= (isset($staff_crt_tbl[0]->degree_type) && $staff_crt_tbl[0]->degree_type == "Master’s degree") ? 'selected' : '' ?>  >Master’s degree</option>
                        <option <?= (isset($staff_crt_tbl[0]->degree_type) && $staff_crt_tbl[0]->degree_type == 'Other') ? 'selected' : '' ?>  >Other</option>
                   </select>
                 </div>
                 <div class="form-floating mb-3">  
                   <input type="text" class="form-control"  name="certification" value ="<?= isset($staff_crt_tbl[0]->certification_name)? $staff_crt_tbl[0]->certification_name  : '' ?>" >
                   <label for="certification">Certification</label>
                 </div>

                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" name="education" value ="<?= isset($staff_crt_tbl[0]->ECE)? $staff_crt_tbl[0]->ECE  : '' ?>"  >
                   <label for="education">Early childhood education credits</label>
                 </div>

                 <div class="form-floating mb-3">
                   <input type="text" class="form-control"  name="Infant" value ="<?= isset($staff_crt_tbl[0]->Infant_toddler_credits)? $staff_crt_tbl[0]->Infant_toddler_credits  : '' ?>"  >
                   <label for="infant">Infant toddler credits</label>
                 </div>

                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="notes" placeholder="Notes" name="notes" value ="<?= isset($staff_crt_tbl[0]->notes)? $staff_crt_tbl[0]->notes  : '' ?>"  >
                   <label for="pnumber">Notes</label>
                 </div>



                 <div class="mt-4s">
                   <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
                   <button type="submit" class="btn btn-success shadow">Save</button>
                 </div>
               </form>
             </div>
           </div>

           <div class="box box-slided-up bgsetiing">
             <div class="box-header with-border">
               <h4 class="box-title ">PROFESSIONAL DEVELOPMENT HOURS</h4>
               <ul class="box-controls pull-right">
                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
               </ul>
             </div>

             <div class="box-body" style="display: block;">
               <div class="hire_card">

                 <div class="list">
                   <h4><?= isset($staff_training[0]->t_name)? $staff_training[0]->t_name : '' ?> </h4>
                   <div class="dlex">
                     <label>Date completed</label>
                     <h5><?= isset($staff_training[0]->completed_date)? date('d/m/Y' ,strtotime($staff_training[0]->completed_date)) : '' ?>  </h5>
                   </div>

                   <div class="dlex">
                     <label>Number of hours</label>
                     <h5><?= isset($staff_training[0]->hours)? $staff_training[0]->hours : '' ?> </h5>
                   </div>

                   <div class="dlex">
                     <label>Notes</label>
                     <h5><?= isset($staff_training[0]->notes)? substr($staff_training[0]->notes,0,50) : '' ?></h5>
                   </div>
                 </div>


                 <a href="#" class="add_emp" data-bs-toggle="modal" data-bs-target="#add_training">+ Add a training</a>
               </div>
             </div>
           </div>


         </div>
     </section>
     <!-- /.content -->
     <section class="content">
       <div class="row">
         <div class="col-lg-12">
           <div class="attachments-text">
             <h3>Attachments</h3>
             <p>Upload attachments to student profiles. Use our standard categories or start typing to create your own custom attachment categories. Track expiration dates on attachments uploaded to student or staff profiles using the <a href="#">Expiring attachments report</a>.</p>
           </div>
           <hr>

         </div>
         <div class="col-lg-12 text-end mb-3">
           <a href="#" class="btn btn-primary mt-10 waves-effect shadow" data-bs-toggle="modal" data-bs-target="#attachments">+ Add Attachment</a>
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
                       <th>Type</th>
                       <th>Visible To</th>
                       <th>Uploaded </th>

                       <th>Expiration Date</th>
                     </tr>
                   </thead>
                    <tbody>
                      <?php   if(isset($list_doc) && count($list_doc)>0 ){ 
                                        foreach($list_doc as $val){ ?>
                                    <tr>
                                       <td class=""><span class="table-p"><?= ($val->attachment_type == 'Other')? $val->attachment_type .' '.$val->other_type : $val->attachment_type ?> </span></td>                    
                                     
                                       <td class="text-center"><?= $val->view_profiles ?></td>
                                       <td class="text-center"><img src = "<?= base_url('assets/Doc_img/').$val->document_file ?>" width ='60'></td>
                                       <td class="text-center"><?= date('d-m-y',strtotime($val->exp_date)) ?></td>
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

     <!-- Modal -->
     <div class="modal modal-left fade add_parent" id="attachments" tabindex="-1">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title premium-text"> Add Attachment</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
             
           
         <form action="<?= base_url('Staff/add_attachments')?>" method="post" enctype= 'multipart/form-data' >
        
         <div class="mb-3">
          <label for="proof1" class="drag_button W-100">  
                      <div class="drag_buttons">
                        <div class="text-center"><i class="fad fa-cloud-upload"></i><h5> Choose a new file</h5></div>
                       </div></label>
                       <input type="file" id="proof1" name="doc_img" style="display: none"/>
                        <h5 class="form-file-text mt-3">
                        <div></div>
                      </h5>
         </div>

                                     
           <div class="formsetting mb-4">
                   
                                              
                      <select  class=" form-control" onchange = "fun_time(this.value)" id="minage" name="type">
                        <option disabled="">What type of attachment is this? *</option>
                        <option>Enrollment Application</option>
                        <option>Enrollment Contract</option>
                        <option>Immunization Record</option>
                        <option>Photo Release Form</option>
                        <option>Other</option>
                      </select>
                    </div>
                    <div class="mycheckboxdiv mt-40">
                         <div class=" mb-3" id = "div_other"  style = 'display:none'>
                        <label class="sdatel" for="start"> Enter other type</label>
                         <input name="other_type" id = "div_other_2" class="form-control"></input>
               </div>
                    <div class="form-floating mt-30">
                              <input type="date" class="form-control" id="start" placeholder="name@example.com" name="exp_date" value="">
                              <i class="fad fa-calendar-alt"></i>
                              <label class="sdatel" for="start"> Expiration date</label>
                    </div>
                    <div class="textarea mt-30">
                        <label class="sdatel" for="start"> Notes</label>
                 <textarea name="note" class="form-control" rows="3"></textarea>
               </div>
                <input type = 'hidden' name = 's_id' value = "<?= $this->uri->segment(3) ?>" >
               <div class="visual_attech">
                 <p>Who should be able to view this file?</p>
                 <div class="controls mb-3" style="">
                    <input type="checkbox" id="admin1" name = 'show_types[]' value='Admin' class="filled-in" readonly  checked="">
                    <label for="admin1" class="labels lin19">Admin</label>
                </div>  
               
               </div>
               <div class="mt-4s">
             <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
             <button type="submit" class="btn btn-success shadow">Save Contact</button>
           </div>
                       </div>
         
         </form>
        
           </div>
         </div>
       </div>
     </div>
     <!-- /.modal -->

     <!-- /.modal -->

     <div class="modal modal-right fade add_parent" id="add_training" tabindex="-1">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Add A Training</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
             <div class="row">
               <div class="box-body">
                 <!-- Nav tabs -->

                 <!-- Tab panes -->
                 <div class="tab-content">
                   <div id="navpills-1" class="tab-pane active">
                     <form action="<?= base_url('Staff/add_training') ?>" method="post">

                       <div class="form-floating mb-3">
                         <input type="text" class="form-control" id="fistname" placeholder="" name="type"
                          value = "<?= isset($staff_training[0]->t_type)? $staff_training[0]->t_type : '' ?>"      required >
                         <label for="fistname">Type of training</label>
                       </div>

                       <div class="form-floating mb-3">
                         <input type="text" class="form-control" id="fistname" placeholder="name@example.com" name="name"
                            value = "<?= isset($staff_training[0]->t_name)? $staff_training[0]->t_name : '' ?>"  required >
                         <label for="fistname">Name</label>
                       </div>
                       <div class="form-floating mb-3">
                         <input type="date" class="form-control" id="11datecomplete" name="c_date" required
                            value = "<?= isset($staff_training[0]->completed_date)? $staff_training[0]->completed_date : '' ?>" >
                         <label for="datecomplete">Date completed</label>
                       </div>
                       <div class="form-floating mb-3">
                         <input type="number" class="form-control" id="number" placeholder='' name="hours"
                             value = "<?= isset($staff_training[0]->hours)? $staff_training[0]->hours : '' ?>"   required >
                         <label for="hours">Number of hours</label>
                       </div>
                                                                                        
                             <input type="hidden" value = "<?= $this->uri->segment(3) ?>" name = 'staff_id' >
                             <input type="hidden" value = "<?= isset($staff_training[0]->id)? $staff_training[0]->id : '' ?>"   name = 't_id' >
                                               
                       <div class="form-floating mb-3">
                         <input type="text" class="form-control" id="notes" placeholder="" name="notes" 
                             value = "<?= isset($staff_training[0]->notes)? $staff_training[0]->notes : '' ?>"  required >
                         <label for="notes">Notes</label>
                       </div>
                       <div class="mt-4s">
                         <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
                         <button type="submit" class="btn btn-success shadow">Save</button>
                       </div>
                     </form>
                   </div>
                 </div>

               </div>
             </div>
             <!-- /.box-body -->
           </div>
         </div>
       </div>
     </div>
     <!-- /.modal -->






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

     <script type="text/javascript">
       //Date picker
       $('#datepicker').datepicker({
         autoclose: true
       });
       $('#hiredate').datepicker({
         autoclose: true
       });
       $('#datecomplete').datepicker({
         autoclose: true
       });

     </script>
     <script>
       $('.myschool').addClass('active');
       $('.staff').addClass('active');

     </script>
     <script>
       $(document).ready(function() {
         $('#admin').change(function() {
           $('.hideedit').toggle();

         });
       });

     </script>

     <script type="text/javascript">
       $('input[type="file"]').change(function(e) {
         var fileName = e.target.files[0].name;
         $(e.target).parent('div').find('.form-file-text').html(fileName).addClass('blocks')
         // Inside find search element where the name should display (by Id Or Class)
       });

     </script>

     <script type="text/javascript">
       $("#proof1").change(function() {
         filename = this.files[0].name;
         console.log(filename);
       });

     </script>
     <script>
       function readURL(input) {
         if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function(e) {
             $('#profileImg')
               .attr('src', e.target.result)
               .width()
               .height();
           };
           reader.readAsDataURL(input.files[0]);
         }
       }

   function fun_time(test){
       // var test = $(this).val();                       
      // alert(test); 
        if(test == 'Other'){ $('#div_other').show(); $('#div_other_2').show(); }else{$('#div_other').hide(); $('#div_other_2').hide();   }
    }
    
    


     </script>
