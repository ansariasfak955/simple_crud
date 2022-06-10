<?php include ('include/header.php'); ?>
<style>
.bootstrap-select.bs-container .dropdown-menu {
  margin-top: -4rem;
}
</style>
<div class="content-wrapper">
  <div class="container-full">
    <section class="content">
      <div class="row mt-4">
        <div class="col-lg-12">
          <div class="tabls-title">
            <a href="#" class="active"><i class="fa-regular fa-circle-info"></i> School Info</a>
            <a href="<?= base_url('Dashboard/school_profile') ?>" class=""><i class="fa-solid fa-school"></i> School Profile</a>
            <!-- <a href="#" class="">Feed</a> -->
          </div>
        </div>
      </div>

  <form action="#" method="post">
    <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-slided-up bgsetiing">
                <div class="box-header with-border">
                  <h4 class="box-title">Learning Settings</h4>
                  <ul class="box-controls pull-right">
                    <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                    <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                    <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
                  </ul>
                </div>

                <div class="box-body" style="display: block;">
                <div class="item_setting">
                      <div class="infotext">
                    <h5>Learning Settings</h5>
                    <p>Select your learning frameworks, state standards, or assessment tools to be used for logging observations in the app.</p>
                  </div> 
                  <div class="formsetting mt-3">
                  	<select multiple class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Search for Frameworks...">
        					  	<option>Alabama - Preschool (2012)</option>
        					  	<option>Early Learning</option>
        					  	<option>Arizona - Preschool</option>
					        </select>
                  </div>
                    </div>
                 </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="box box-slided-up bgsetiing">
                <div class="box-header with-border">
                  <h4 class="box-title">Payroll Settings</h4>
                  <ul class="box-controls pull-right">
                    <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                    <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                    <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
                  </ul>
                </div>

                <div class="box-body" style="display: block;">
                  <div class="item_setting">
                     <div class="infotext">
                        <h5>Week Start Day</h5>
                        <p>Select the day that your week starts on. This will be used to calculate weekly overtime hours on the payroll report.</p>
                      </div>
                      <div class="formsetting mt-3">
                  	<select  class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
					  	<option>Sunday</option>
					  	<option>Monday</option>
					  	<option>Tuesday</option>
					  	<option>Wednesday</option>
					  	<option>Thursday</option>
					  	<option>Friday</option>
					  	<option>Saturday</option>
					   </select>
                  </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
        <div class="row">
        	<div class="col-lg-12">
        	
          <div class="box box-slided-up bgsetiing">
            <div class="box-header with-border">
              <h4 class="box-title">Access Settings</h4>
              <ul class="box-controls pull-right">
                <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
              </ul>
            </div>

            <div class="box-body" style="display: block;">
             <div class="item_setting">
                  <div class="toggle-swicher pull-right">
                    <label class="switch switch-border switch-danger">
                      <input type="checkbox" name="" id="">
                      <span class="switch-indicator"></span>
                      <span class="switch-description"></span>
                    </label>
                  </div>
                  <div class="infotext">
                    <h5>Default Activities to Staff-Only</h5>
                    <p>Displays all student activities to staff only by default. Admin can approve all "Staff Only" activities from the Room feed.</p>
                  </div>
                </div>

                <div class="item_setting">
                  <div class="toggle-swicher pull-right">
                    <label class="switch switch-border switch-danger">
                      <input type="checkbox" name="" id="" checked="">
                      <span class="switch-indicator"></span>
                      <span class="switch-description"></span>
                    </label>
                  </div>
                  <div class="infotext">
                    <h5>Parents Can Edit Student Info</h5>
                    <p>Allows parents to edit student information on the student profiles.</p>
                  </div>
                </div>
                <div class="item_setting">
                  <div class="toggle-swicher pull-right">
                    <label class="switch switch-border switch-danger">
                      <input type="checkbox" name="" id="">
                      <span class="switch-indicator"></span>
                      <span class="switch-description"></span>
                    </label>
                  </div>
                  <div class="infotext">
                    <h5>Parents Can Add Activities</h5>
                    <p>Allows parents to add activities to the student feed. At this time, parents can only add photos.</p>
                  </div>
                </div>
              </div>
          </div>
          </div>
         <div class="col-lg-12">
         <div class="text-end">
             <!--<button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>-->
             <button type="submit" class="btn btn-success shadow">Save Changes</button>
           </div>	
         </div>
        </div>
        </div>
    </div>
 </form>
 </section>



    <?php include ('include/footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>assets_pages/js/bootstrap-select.js"></script>
    <script src="<?= base_url()?>assets_pages/vendor_components/datatable/datatables.min.js"></script>
    <script src="<?= base_url()?>assets_pages/src/js/pages/data-table.js"></script>
