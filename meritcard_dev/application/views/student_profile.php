 <?php include ('include/header.php'); ?>
 <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header mt-3">
       <?php $this->load->view('include/Common_menus') ?>
       <div class="d-flex align-items-center">
       </div>
     </div>
    <style>
        .close{
                margin-left: 80%;
                color: red!important;
                opacity: 100000000000 !important;
        }
     
     .tooltip:hover{
              visibility: visible;
            }   
        
        
    </style> 
     
     
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
                    
      	<div class="profile_show">
      		<div class="avtar_img">
              <img src="<?= base_url() ?>assets_pages/images/avatar.png">
			</div>
			<div class="avtar_title">
				<h5>Sumit</h5>
			</div>
      	</div>
      </div>
       <div class="row">
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
               <form action="<?= base_url('Student/s_update_info_1/').$this->uri->segment(3) ?>"   method="post">  <!--$student_tbl   $user_tbl   -->
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="fistname" placeholder="name@example.com" name="name" value="<?= isset($user_tbl[0]->name)? $user_tbl[0]->name  : '' ?>">
                   <label for="fistname">Full Name</label>
                 </div>
                 

                 <label for="emailaddres">Birthday   <span class = 'text-danger' id ='date_fun'></span>  </label>
                 <div class="form-group">
                   <div class="input-group input--style">                               
                     <div class="input-group-addon">
                       <i class="fa-regular fa-calendars"></i>
                     </div>
                     <!--<input type="text" name = 'dob' class="form-control pull-right" id="todatepicker" placeholder="Select Date" autocomplete="off" value = "<?= isset($user_tbl[0]->DOB)? date('d/m/Y', strtotime($user_tbl[0]->DOB))  : '' ?>">
                  --> 
                  <input type="date" name = 'dob' onchange = "get_years(this.value)" class="form-control pull-right " id="todatepicker_2" placeholder="Select Date" autocomplete="off" value = "<?= isset($user_tbl[0]->DOB)? $user_tbl[0]->DOB  : '' ?>">
                           
                            
                   </div>
                 </div>
                <div class="form-floating mb-3">
                   <input type="text" readonly title = 'this filed is readonly ' class="form-control" id="birthday" placeholder="name@example.com" name="age" value="<?= isset($user_tbl[0]->age)? $user_tbl[0]->age  : '' ?>">
                   <label for="emailaddres">Age</label>
                   <span class = 'text-danger'></span>
                 </div>
                 <div class="formsetting mb-3">
                   <label for="pnumber">Gender</label>
                   <select name = 'gender'  class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
                     <option value ='1' <?= (isset($user_tbl[0]->gender) && $user_tbl[0]->gender == 1) ? 'selected' : '' ?> >Male</option>
                     <option value ='2' <?= (isset($user_tbl[0]->gender) && $user_tbl[0]->gender == 2) ? 'selected'  : '' ?> >Female</option>

                     <option value ='3' <?= (isset($user_tbl[0]->gender) && $user_tbl[0]->gender == 3) ? 'selected'  : '' ?> >Other</option>
                   </select>

                 </div>
                 <div class="formsetting mt-3">
                   <label for="pnumber">Race</label>
                   <select name = 'race'  class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
                     <option <?= (isset($student_tbl[0]->race) && $student_tbl[0]->race == 'Aboriginal Peoples') ? 'selected' : '' ?>  >Aboriginal Peoples</option>
                     <option  <?= (isset($student_tbl[0]->race) && $student_tbl[0]->race == 'Chamorro') ? 'selected' : '' ?>  >Chamorro</option>
                     <option  <?= (isset($student_tbl[0]->race) && $student_tbl[0]->race == 'American Indian or Alaska Native') ? 'selected' : '' ?> >American Indian or Alaska Native</option>
                     <option <?= (isset($student_tbl[0]->race) && $student_tbl[0]->race == 'Japanese') ? 'selected' : '' ?>  >Japanese</option>
                     <option <?= (isset($student_tbl[0]->race) && $student_tbl[0]->race == 'Black or African American') ? 'selected' : '' ?>  >Black or African American</option>
                     <option  <?= (isset($student_tbl[0]->race) && $student_tbl[0]->race == 'Filipino') ? 'selected' : '' ?> >Filipino</option>
                     <option  <?= (isset($student_tbl[0]->race) && $student_tbl[0]->race == 'Aboriginal Peoples') ? 'selected' : '' ?> >Aboriginal Peoples</option>
                   </select>

                 </div>

                 <div class="formsetting mt-3">
                   <label for="pnumber">Ethnicity</label>
                   <select name = 'ethnicity' class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
                     <option <?= (isset($student_tbl[0]->ethnicity) && $student_tbl[0]->ethnicity == 'Hispanic, Latino or Spanish Origin') ? 'selected' : '' ?> >Hispanic, Latino or Spanish Origin</option>
                     <option <?= (isset($student_tbl[0]->ethnicity) && $student_tbl[0]->ethnicity == 'Not of Hispanic, Latino or Spanish Origin') ? 'selected' : '' ?>>Not of Hispanic, Latino or Spanish Origin</option>
                     <option <?= (isset($student_tbl[0]->ethnicity) && $student_tbl[0]->ethnicity == 'Tuesday') ? 'selected' : '' ?>>Tuesday</option>
                     <option <?= (isset($student_tbl[0]->ethnicity) && $student_tbl[0]->ethnicity == 'Wednesday') ? 'selected' : '' ?>>Wednesday</option>
                     <option <?= (isset($student_tbl[0]->ethnicity) && $student_tbl[0]->ethnicity == 'Thursday') ? 'selected' : '' ?>>Thursday</option>
                     <option <?= (isset($student_tbl[0]->ethnicity) && $student_tbl[0]->ethnicity == 'Friday') ? 'selected' : '' ?>>Friday</option>
                     <option <?= (isset($student_tbl[0]->ethnicity) && $student_tbl[0]->ethnicity == 'Saturday') ? 'selected' : '' ?>>Saturday</option>
                   </select>

                 </div>
                    
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="allergies" placeholder="name@example.com" name="allergies" value = "<?= isset($student_tbl[0]->allergies)? $student_tbl[0]->allergies  : '' ?>" >
                   <label for="pnumber">Allergies</label>
                 </div>
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="notes" placeholder="Notes" name="notes" value = "<?= isset($student_tbl[0]->notes)? $student_tbl[0]->notes  : '' ?>"  >
                   <label for="pnumber">Notes</label>
                 </div>
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="medications" placeholder="Notes" name="medications" value = "<?= isset($student_tbl[0]->medications)? $student_tbl[0]->medications  : '' ?>" >
                   <label for="pnumber">Medications</label>
                 </div>
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="doctor" placeholder="doctor" name="doctor" value = "<?= isset($student_tbl[0]->doctor)? $student_tbl[0]->doctor  : '' ?>"  >
                   <label for="pnumber">Doctor</label>
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

             <div class="box-body"  style="display: block;">
               <form action="<?= base_url('Student/s_update_info_2/').$this->uri->segment(3) ?>" method="post">
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="Address" placeholder="name@example.com" name="address" value="<?= isset($user_tbl[0]->address)? $user_tbl[0]->address  : '' ?>" >
                   <label for="Address">Address</label>
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
               <h4 class="box-title ">FINANCIAL DETAILS</h4>
               <ul class="box-controls pull-right">
                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
               </ul>
             </div>

             <div class="box-body" style="display: block;">
                 <form action="<?= base_url('Student/s_update_info_3/').$this->uri->segment(3) ?>" method="post">
                 <!--<div class="form-floating mb-3">
                   <input type="text" class="form-control" id="Employer" placeholder="name@example.com" name="Employer" value="None">
                   <label for="FamilyIncome">sunil sunill's Employer</label>                                                                   
                 </div>-->

                 <div class="formsetting mt-3">                                
                   <label for="pnumber">Family Income</label>
                   <select name = 'F_income' class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
                     <option <?= (isset($student_tbl[0]->family_income) && $student_tbl[0]->family_income == 'Below 25,000 per year') ? 'selected' : '' ?> >Below 25,000 per year</option>
                     <option  <?= (isset($student_tbl[0]->family_income) && $student_tbl[0]->family_income == '25,000 to 50,000 per year') ? 'selected' : '' ?>  >25,000 to 50,000 per year</option>
                     <option <?= (isset($student_tbl[0]->family_income) && $student_tbl[0]->family_income == '50,000 to 75,000 per year') ? 'selected' : '' ?> >50,000 to 75,000 per year</option>
                     <option <?= (isset($student_tbl[0]->family_income) && $student_tbl[0]->family_income == '75,000 to 100,000 per year') ? 'selected' : '' ?> >75,000 to 100,000 per year</option>
                     <option <?= (isset($student_tbl[0]->family_income) && $student_tbl[0]->family_income == '100,000 to 125,000 per year') ? 'selected' : '' ?> >100,000 to 125,000 per year</option>

                   </select>
                                                             
                                                                    
                 </div>
                 <div class="formsetting mb-3">

                   <label for="Subsidy">Subsidy</label>
                   <select name= 'subsidy' class="selectpicker form-control" id="Subsidy" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
                     <option value = '1' <?= (isset($student_tbl[0]->subsidy) && $student_tbl[0]->subsidy == '1') ? 'selected' : '' ?> >Yes</option>
                     <option value = '0' <?= (isset($student_tbl[0]->subsidy) && $student_tbl[0]->subsidy == '0') ? 'selected' : '' ?> >No</option>

                   </select>
                 </div>
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="SubsidyDetails"  name="SubsidyDetails" value="<?= isset($student_tbl[0]->subsidy_details)? $student_tbl[0]->subsidy_details  : '' ?>">
                   <label for="SubsidyDetails">Subsidy Details</label>
                 </div>

                 <div class="mt-4s">
                   <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
                   <button type="submit" class="btn btn-success shadow">Update Profile</button>
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
               <form action="<?= base_url('Student/s_update_info_4/').$this->uri->segment(3) ?>"  method="post">
                 <div class="formsetting mb-3">

                    <label>Select class </label>
						<select  onchange = "srarch_sec(this.value)" name = 'class_id' class="form-control m_class"     >
					    <option value = '' >select class</option>
					  <?php if(isset($class_list) && count($class_list) >0  ){foreach($class_list as $val){ 
					           if(isset($student_tbl[0]->class_id) &&  $val->class_id == $student_tbl[0]->class_id){ ?>
					                <option selected value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					           <?php }else{ ?>
					                      <option value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					<?php }} } ?>  
					  	
					  	                    <!--fgg-->                  
					  </select>
                 </div>
                 <div class="formsetting mb-3">

                     <label>Select section </label>
						<select class=" form-control class_div " name = 'section_id' >
					  
					   </select>
                 </div>

                 <div class="mt-4s">
                   <button type="reset" class="btn btn-light mr-3 mr--1">Cancel</button>
                   <button type="submit" class="btn btn-success shadow">Save</button>
                 </div>
               </form>
             </div>
           </div>
           <div class="box box-slided-up bgsetiing">
             <div class="box-header with-border">
               <h4 class="box-title ">SCHOOL DETAILS</h4>
               <ul class="box-controls pull-right">
                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
               </ul>
             </div>

             <div class="box-body"  style="display: block;">
               <form action="#" method="post">
                 <div class="formsetting mb-3">

                   <label for="status">Status</label>
                   <select class="selectpicker form-control" id="status" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
                     <option>Active</option>
                     <option>Inactive</option>
                     <option>Graduated</option>
                     <option>Removed</option>
                     <option>Duplicate</option>

                   </select>
                 </div>
                 <div class="mb-3">

                   <label for="schedule" class="mb-3">Schedule</label>
                   <h5 class=""><a href="#">View all student schedules</a></h5>
                 </div>
                 <div class="formsetting mb-3 pt-3">

                   <label for="MealType">Meal Type</label>
                   <select class="selectpicker form-control" id="MealType" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
                     <option>Not Specified</option>
                     <option>Free</option>
                     <option>Reduced</option>
                     <option>Paid</option>
                   </select>
                 </div>
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="studentid" placeholder="name@example.com" name="studentid" >
                   <label for="studentid">Student ID</label>
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
               <h4 class="box-title ">ENROLLMENT DETAILS</h4>
               <ul class="box-controls pull-right">
                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
               </ul>
             </div>

             <div class="box-body"  style="display: block;">
               <form action="#" method="post">

                 <label for="status">First Contact Date</label>
                 <div class="form-group">
                   <div class="input-group input--style">
                     <div class="input-group-addon">
                       <i class="fa-regular fa-calendars"></i>
                     </div>
                     <input type="text" class="form-control pull-right" id="datepicker" placeholder="Select Date" autocomplete="off">
                   </div>
                 </div>


                 <label for="Toured">Toured Date</label>
                 <div class="form-group">
                   <div class="input-group input--style">
                     <div class="input-group-addon">
                       <i class="fa-regular fa-calendars"></i>
                     </div>
                     <input type="text" class="form-control pull-right" id="datepicker1" placeholder="Select Date" autocomplete="off">
                   </div>
                 </div>


                 <label for="Paperwork">Paperwork Date</label>
                 <div class="form-group">
                   <div class="input-group input--style">
                     <div class="input-group-addon">
                       <i class="fa-regular fa-calendars"></i>
                     </div>
                     <input type="text" class="form-control pull-right" id="todatepicker" placeholder="Select date" autocomplete="off">
                   </div>
                 </div>


                 <label for="Desiredst">Desired Start Date</label>
                 <div class="form-group">
                   <div class="input-group input--style">
                     <div class="input-group-addon">
                       <i class="fa-regular fa-calendars"></i>
                     </div>
                     <input type="text" class="form-control pull-right" id="datepicker2" placeholder="Select date" autocomplete="off">
                   </div>
                 </div>


                 <label for="EnrollmentDate">Enrollment Date</label>
                 <div class="form-group">
                   <div class="input-group input--style">
                     <div class="input-group-addon">
                       <i class="fa-regular fa-calendars"></i>
                     </div>
                     <input type="text" class="form-control pull-right" id="datepicker3" placeholder="Select date" autocomplete="off">
                   </div>
                 </div>

                 <div class="form-check">
                   <input type="checkbox" class="form-check-input" id="exampleCheck1">
                   <label class="form-check-label" for="exampleCheck1">Set Status to "Active" on Enrollment Date</label>
                 </div>

                 <label for="Graduation">Graduation Date</label>
                 <div class="form-group">
                   <div class="input-group input--style">
                     <div class="input-group-addon">
                       <i class="fa-regular fa-calendars"></i>
                     </div>
                     <input type="text" class="form-control pull-right" id="datepicker4" placeholder="Select date" autocomplete="off">
                   </div>
                 </div>



                 <label for="Expectedbd">Expected Birth Date</label>
                 <div class="form-group">
                   <div class="input-group input--style">
                     <div class="input-group-addon">
                       <i class="fa-regular fa-calendars"></i>
                     </div>
                     <input type="text" class="form-control pull-right" id="datepicker5" placeholder="Select date" autocomplete="off">
                   </div>
                 </div>

                 <div class="formsetting mb-3">
                   <!-- <input type="text" class="form-control" id="Sibling" placeholder="Sibling" name="Sibling" value="None"> -->
                   <label for="Sibling">Sibling Attending</label>
                   <select class="selectpicker form-control" id="Sibling" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
                     <option>Yes</option>
                     <option>No</option>

                   </select>
                 </div>
                 <div class="formsetting mb-3">
                   <!-- <input type="text" class="form-control" id="Programs" placeholder="Programs" name="Programs" value="annual function (Waitlist)test (Enrolled)"> -->
                   <label for="Programs">Programs</label>
                   <select class="selectpicker form-control" id="MealType" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
                     <option>annual function</option>
                     <option>test</option>

                   </select>
                 </div>
                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="additionaldet" placeholder="Programs" name="additionaldet" value="None">
                   <label for="additionaldet">Additional Details</label>
                 </div>


                 <div class="mt-4s">
                   <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
                   <button type="submit" class="btn btn-success shadow">Update Profile</button>
                 </div>
               </form>
             </div>
   <!--         </div>
           <div class="box box-slided-up bgsetiing">
             <div class="box-header with-border">
               <h4 class="box-title ">BILLING</h4>
               <ul class="box-controls pull-right">
                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
               </ul>
             </div>

             <div class="box-body" style="display: block;">

               <div class="mt-4s billingtext">
                 <h4>Save hours of time every week</h4>
                 <h4 class="opc">Get started with MeritCard billing today!</h4>

               </div>

               <div class="mt-4s pull-right">
              
                 <button type="submit" class="btn btn-success shadow">Get Set Up</button>
               </div>

             </div>
           </div> -->
         </div>
       </div>
     </section>
     <!-- /.content -->
     <section class="content">
       <div class="row">
         <div class="col-lg-12">
           <div class="contact-info">
             <h3>Contact</h3>
             <p>There are several ways to invite parents: <a href="#">Guide to Inviting Parents</a>.The easiest is to add parents and contacts below. Alternatively, sumit's unique parent invite code is: CQKQNA8CW8.</p>
             </div>
           <div class="">
             <div class="row">
               <div class="col-12">
                 <div class="box">
                   <div class="box-body">
                     <div class="table-responsive">
                       <table class="table table-hover mb-0 parent_list" id="complex_header">
                         <thead>
                           <tr>
                             <th>CONTACT</th>
                             <th>EMAIL</th>
                             <th>PHONE</th>
                             <th>CAN PICKUP</th>
                             <th>SIGNED UP</th>
                             <th>BILLING INFO</th>
                             <th>OPTION</th>
                           </tr>
                         </thead>
                         <tfoot class="d-group">
                          <?php if(isset($parents_tbl) && count($parents_tbl)>0){
                              foreach($parents_tbl as $val){ ?>
                          
                           <tr>
                             <td>
                                  <div class="student_list">
                                 <a href="#" class= 'up_parent'  data = "<?= base64_encode(json_encode($val)) ?>"  >                                                     
                                   <div class="avtar_img">
                                     <img src="<?= base_url() ?>assets_pages/images/avatar.png">
                                   </div>
                                   <div class="info_title">
                                     <h5><?= $val->name ?></h5>
                                     <h6><?= $val->student_relational ?></h6>
                                   </div>
                                 </a>
                               </div>
                             </td>
                             <td><?= $val->email ?></td>
                             <td><?= $val->mobile ?></td>
                             <td><?= ($val->student_relational == 'Emergency Contact' )? 'Yeas' : 'No' ?></td>
                     
                             <td></td>
                             <td> <?= ($val->student_relational == 'Parent' )? 'Invite' : '' ?></td>
                             <td class="text-center">
                               <div class="d-flex--style">

                                 <div class="btn-group">
                                   <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"><i class="icon ti-settings"></i>Options</button>
                                   <div class="dropdown-menu dropdown-menu-end">
                                     <a class="dropdown-item up_parent" href="#"   data = "<?= base64_encode(json_encode($val)) ?>" ><i class="fa fa-pencil"></i> View / Edit</a>
                                     <a class="dropdown-item" href="#"><i class="fa fa-trash-o"></i> Delete</a>
                                   </div>
                                 </div>
                               </div>
                             </td>
                           </tr>
                          <?php }} ?> 
                          
                         </tfoot>
                         <tbody>
                         <!--  <tr>
                             <td>
                               <div class="student_list">
                                 <a href="#">                                                     
                                   <div class="avtar_img">
                                     <img src="<?= base_url() ?>assets_pages/images/avatar.png">
                                   </div>
                                   <div class="info_title">
                                     <h5>Amit</h5>
                                     <h6>Demo Room</h6>
                                   </div>
                                 </a>
                               </div>
                             </td>                                    
                             <td>
                               <h5><?= $val->email ?> </h5>
                             </td>
                             <td class="text-center"><?= $val->mobile ?></td>
                             <td class="text-center"><?= $val->email ?></td>
                             <td class="">
                               <h5><a href="#" class="btn-light btn" data-bs-toggle="modal" data-bs-target="#add_contactlist">Add Info </a></h5>
                             </td>
                             <td class="">
                               <h5><a href="#" class="btn-light btn" data-bs-toggle="modal" data-bs-target="#add_contactlist">Add Info </a></h5>
                             </td>
                             <td class="text-center">
                               <div class="d-flex--style">

                                 <div class="btn-group">
                                   <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"><i class="icon ti-settings"></i>Options</button>
                                   <div class="dropdown-menu dropdown-menu-end">
                                     <a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> View/Edit</a>
                                     <a class="dropdown-item" href="#"><i class="fa fa-trash-o"></i> Delete</a>
                                   </div>
                                 </div>
                               </div>
                             </td>
                           </tr>-->

                           <tr>

                             <td>
                               <h5><span><a href="#" class="mt-10 mb-10 mx-5 text-success" data-bs-toggle="modal" data-bs-target="#add_contact">+ Add a contact</a></span></h5>
                             </td>
                             <td></td>
                             <td class="text-center"></td>
                             <td class="text-center"></td>
                             <td class="text-center"></td>
                             <td class="text-center"></td>
                             <td class="text-center"></td>
                           </tr>
                         </tbody>
                       </table>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>

         </div>
       </div>
     </section>
     <!-------------->
     <section class="content">
       <div class="row">
         <div class="col-lg-12">
           <div class="contact-infoo">
             <h3>Immunizations</h3>
             <p>Immunizations tracks past student immunization dates and calculates overdue and due vaccines based on <a href="#">CDC recommendations</a>.</p>
             <hr>
           </div>
         </div>
         <div class="row">
           <div class="col-lg-6">

            <!-- <div class="box box-slided-up bgsetiing">
               <div class="box-header with-border">
                 <h4 class="box-title ">cdc recommendations</h4>
                 <ul class="box-controls pull-right">
                   <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                   <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                   <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
                 </ul>
               </div>

               <div class="box-body" style="display: block;">
                 <form action="#" method="post">

                   <div class=" mb-3">
                     <h4><span class="title-hed">To view CDC recommendations:</span></h4>
                   </div>
                   <div class="mb-3">
                     <h5>Enter birthday of student.</h5>
                     <h5>Add immunization dates.</h5>
                   </div>

                   <div class="mt-4s">
	                   <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
	                   <button type="submit" class="btn btn-success shadow">Update Profile</button>
	                 </div> 
                 </form>
               </div>
             </div>-->

           </div>
           <div class="col-lg-6">

             <div class="box box-slided-up bgsetiing">
               <div class="box-header with-border">
                 <h4 class="box-title ">Notes</h4>
                 <ul class="box-controls pull-right">
                   <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                   <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                   <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
                 </ul>
               </div>

               <div class="box-body" style="display: block;">
                 <form action="<?= base_url('Student/up_student_notes') ?>" method="post">


                              
                   <div class="form-floating mb-3">
                     <input type="text" class="form-control"  name="catch" value="<?= isset($student_tbl[0]->catch_up_schedule)? $student_tbl[0]->catch_up_schedule : '' ?>">
                     <label for="Catch">Catch-up schedule</label>
                        <input type="hidden" class="form-control" name="s_id" value="<?= isset($student_tbl[0]->user_id)? $student_tbl[0]->user_id : '' ?>">
                                                              
                   </div>                                      
                   <div class="form-floating mb-3">
                     <input type="text" class="form-control"  name="exempt" value="<?= isset($student_tbl[0]->exempt)? $student_tbl[0]->exempt : '' ?>">
                     <label for="Student">Student exempt</label>
                   </div>                                                                    
                   <div class="form-floating mb-3">                                   
                     <input type="text" class="form-control" name="notes" value="<?= isset($student_tbl[0]->notes)? $student_tbl[0]->notes : '' ?>">
                     <label for="Notes">Notes</label>
                   </div>                                                                                            

                   <div class="mt-4s">
                     <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-success shadow">Update Profile</button>
                   </div>
                 </form>
               </div>
             </div>

           </div>
         </div>
       </div>

     </section>
     <!--<section class="content">
       <div class="row">
         <div class="col-lg-12">
           <div class="contact-infoo">
             <h3><a href="#" data-bs-toggle="modal" data-bs-target="#mmunization"><i class="fad fa-cog"></i> Immunization settings</a></h3>


           </div>
          <div class="box">
             <div class="box-body">
               <div class="table-responsive table_shadule">
                 <table class="table table-hover mb-0 student_list" id="complex_header">
                   <thead>
                     <tr>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>

                     </tr>
                   </thead>
                   <tfoot>
                     <tr class="text-center">
                       <td></td>
                       <td>
                         <h5>DOSE 1</h5>
                       </td>
                       <td>
                         <h5>DOSE 2</h5>
                       </td>
                       <td>
                         <h5>DOSE 3</h5>
                       </td>
                       <td>
                         <h5>DOSE 4</h5>
                       </td>
                       <td>
                         <h5>DOSE 5</h5>
                       </td>

                     </tr>
                   </tfoot>



                   <tbody>
                     <tr>

                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>

                     </tr>
                     <tr>

                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                     </tr>
                   </tbody>





                   <tbody>
                     <tr>


                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                     </tr>
                     <tr>

                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                     </tr>
                     <tr>

                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                     </tr>


                   </tbody>

                 </table>
               </div>
             </div>
           </div>
         </div>

       </div>

     </section>-->
   </div>
 </div>



 <div class="modal modal-right fade add_parent" id="add_contact" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Add Contact</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <div class="row">
         <div class="box-body">
          <!-- Nav tabs -->
          <ul class="nav nav-pills mb-20">
            <li class=" nav-item"> <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Add Parent</a> </li>
            <li class="nav-item"> <a href="#navpills-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Existing</a> </li>
          
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div id="navpills-1" class="tab-pane active">   
                      <form action="<?= base_url('Student/add_guardian') ?>" method="post">
           <div class="mb-3">
             <select class="selectpicker form-control" name = 'relational' id="number-multiple" data-container="body" data-live-search="true" title="Parent" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
               <option>Parent</option>
               <option>Family</option>
               <option>Approved pickup</option>
               <option>Emergency contact</option>
             </select>
           </div>
           <div class="form-floating mb-3">
             <input type="text" class="form-control" name="fname">
             <label for="fistname">First Name</label>
               <input type="hidden" class="form-control" value = "<?= isset($student_tbl[0]->user_id)? $student_tbl[0]->user_id : '' ?>" name="student_id">
           </div>
           <div class="form-floating mb-3">
             <input type="text" class="form-control" name="lname">
             <label for="lastname">Last Name</label>
           </div>
           <div class="form-floating mb-3">
             <input type="email" class="form-control"  placeholder="name@example.com" name="email">
             <label for="emailaddres">Email Address</label>
           </div>
           <div class="form-floating mb-3">
             <input type="number" class="form-control" name="mobile">
             <label for="pnumber">Mobile No.</label>
           </div>
           <div class="mt-4s">
             <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
             <button type="submit" class="btn btn-success shadow">Save Contact</button>
           </div>
         </form>
            </div>
            <div id="navpills-2" class="tab-pane">
              <form action="#" method="post">
           <div class="mb-3">
             <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Parent" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
               <option>Parent</option>
             </select>
           </div> 
           <div class="mb-3">
             <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Type a contact's name" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
              <option>Sumit Hariyani</option>
             </select>
           </div>
           <div class="mt-4s">
             <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
             <button type="submit" class="btn btn-success shadow">Save Contact</button>
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
 <!-- contactlist -->
 <!-- Modal -->
 <div class=" center add_parent modal" id="add_contactlist" style = 'dispaly:none'>
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Edit <?= (isset($user_tbl[0]->name))? $user_tbl[0]->name : '' ?> Parent</h5>
         <button type="button" class="btn-close parentM_close"  aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form action="<?= base_url('Student/ger_update') ?>" method="post">
           <div class="formsetting mb-3">

             <label for="Contact">Contact type</label>
             <select class=" form-control" name = 'up_real' id="up_real"  data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
              

             </select>
           </div>
           <div class="form-floating mb-3">
             <input type="text" class="form-control" id="name_up" placeholder="name@example.com" name="name">
             <label for="fistname">Full Name</label>
           </div>
         
           <div class="form-floating mb-3">
             <input type="text" class="form-control" id="email_up" placeholder="name@example.com" name="email">
             <label for="emailaddres">Email Address</label>
           </div>
           <div class="form-floating mb-3">
             <input type="text" class="form-control" id="mobile_up" placeholder="name@example.com" name="mobile">
             <label for="mobile">Mobile Phone</label>
           </div>
          
             <input type="hidden" id="g_id_up" name="g_id">
             <input type="hidden" id="p_id_up" name="p_id">
             
                
           <div class="mt-4s">
             <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Save Contact</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
 <!-- /.modal -->
 <!-- Modal -->
 <!-- <div class="modal center-modal fade add_parent" id="mmunization" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content" style="background: #163e5f;">
       <div class="modal-header">
         <h5 class="modal-title premium-text">Premium Feature</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form action="#" method="post">
         	
          
           
           <div class="center-content">
           	<h3 class="text-center">immunizations</h3>
           	<p class="text-center text-move">Record and track immunizations so you<br> can easily see who's up to date without all the paper.</p>
           </div>
           <div class="mt-4s text-center"> -->
 <!--  <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Close</button> -->
 <!-- <button type="submit" class="btn btn-primary btn-bd">Upgrade Now</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div> -->
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
   $('#datepicker1').datepicker({
     autoclose: true
   });
   $('#datepicker2').datepicker({
     autoclose: true
   });
   $('#datepicker3').datepicker({
     autoclose: true
   });
   $('#datepicker4').datepicker({
     autoclose: true
   });
   $('#datepicker5').datepicker({
     autoclose: true
   });
   //Date picker
   $('#todatepicker').datepicker({
     autoclose: true
   });

 </script>
 <script>
   $('.myschool').addClass('active');
   $('.student').addClass('active');

    function srarch_sec(class_id){
                                                                 
               $.ajax({
        type: "POST",                               
        url: "<?= base_url('Room/class_section_list') ?>" ,
        data: {class_id:class_id},                                                
        success: function(result) {
          var res = $.parseJSON(result);                       
          var htmls = '';  var s_id = "<?= isset($student_tbl[0]->section_id)? $student_tbl[0]->section_id : '' ?>";   
        if(res.status){
             htmls =  `<option value = '' >select section</option>`;
                    
            for(var i =0;i<res.body.length; i++){
                
                htmls += (s_id == res.body[i].section_id)? `<option selected value = "${res.body[i].section_id}">${res.body[i].name}</option>` : `<option value = "${res.body[i].section_id}">${res.body[i].name}</option>`;
            } 
            
            $(".class_div").html(htmls);
             
          }
        }
    });
        }    
        
        
  $(document).ready(function(){                                      
      var class_id = "<?= isset($student_tbl[0]->class_id)?  $student_tbl[0]->class_id :'' ?>";
   
   
      console.log("my class id is == "+ class_id);
      if(class_id != ''){
          srarch_sec(class_id);
      }                                   
      return false; 
});  

            $('body').on('click','.up_parent',function(){
                var id = $(this).attr('data'); 
               
                   var m_obj = atob(id);                                     
                   var p_data = $.parseJSON(m_obj) ;  
               
                var up_real_html = '';
                
              up_real_html += (p_data.student_relational == 'Parent')? `<option selected>Parent</option>` :  `<option >Parent</option>` ;
              up_real_html += (p_data.student_relational == 'Family')? `<option selected>Family</option>` :  `<option >Family</option>` ;
              up_real_html += (p_data.student_relational == 'Approved Pickup')? `<option selected >Approved Pickup</option>` :  `<option >Approved Pickup</option>` ;
              up_real_html += (p_data.student_relational == 'Emergency contact')? `<option selected >Emergency contact</option>` :  `<option >Emergency contact</option>` ;
                
                
                $('#up_real').html(up_real_html);     
                $('#name_up').val(p_data.name);     
                $('#email_up').val(p_data.email);     
                $('#mobile_up').val(p_data.mobile);     
                $('#g_id_up').val(p_data.guardian_id);     
                $('#p_id_up').val(p_data.parent_id);     
                  
                  
                         $('#add_contactlist').show();
            });
            
            
        $("body").on('click','.parentM_close',function(){
           
                $('#add_contactlist').hide();
            
        });    
            
            
   function get_years(date_2){
       
           var d2 = new Date(new Date().toISOString().slice(0, 10));

        d1 = new Date(date_2),
        yr =0 ;

    for (var i=d1.getFullYear(); i< d2.getFullYear(); i++) {
        yr++ ;
    }

   if(yr>0){$('#birthday').val(yr);  }else{
       $('#date_fun').html('****Invalid date.!');
       setTimeout(function(){ $('#date_fun').html(''); }, 5000);
   }
   
  }       
            
            
            

 </script>
