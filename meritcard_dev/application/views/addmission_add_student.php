<?php include ('include/header.php'); ?>
<div class="content-wrapper">
  <div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <form  action="<?= base_url('Admissions/temp_student_add') ?>" method="post" >
        <div class="row parentlist justify-content-center">
          <div class="col-lg-10">
            <div class="card">
              <div class="card-body">
                <h4 class="page-title page-modals"><i class="fad fa-user-graduate"></i>New Student</h4>
                <h5 class="pstyle"><a href="<?= base_url('Admissions') ?>" class="btn btn-primary mt-10 waves-effect shadow mb-4"><i class="fa-regular fa-angles-left" style="margin-right: 8px;"></i>Back</a> </h5>
                   <div class="row">
                  <div class="col-lg-12 col-md-4 col-sm-6">
                    <div class="row p-4 pb-0">
                      <div class="col-sm-12 mb-3">
                          <div class="schedule_select">
                   <label class="labels mt-0">STATUS<span class="reduired">*</span></label>
                    <label class="select_schedule" for="prospect">
                        <input type="radio" name="s_status" value = 'Prospects' id="prospect" checked="">
                        <span><i class="fal fa-user-shield"></i> Prospect</span>
                      </label>

                      <label class="select_schedule" for="waitlist">
                        <input type="radio" name="s_status" id="waitlist" value = 'Waitlist' >
                        <span><i class="fad fa-id-card-alt"></i> Waitlist</span>
                      </label>

                  </div>
                      </div>
                      <div class="col-sm-12 mt-2 mb-2">
                        <label class="labels"> STUDENT INFO:</label>
                      </div>
                  <div class="col-lg-6">

                      <div class="form-floating mb-3">
                     <input type="text" class="form-control"  name="s_fname" required  >
                        <label for="fname">First Name</label>
                       </div>
                  </div>
                   
                  <div class="col-lg-6">
                      <div class="form-floating mb-3">
                     <input type="text" class="form-control" id="s_lname" name="s_lname" required >
                        <label for="lname">Last Name</label>
                       </div>
                  </div>
                 

                   <div class="col-lg-6 mb-3">                         
                    <div class="formsetting mb-3">
                      <label class="">Select a Program</label>
                     <select  class="selectpicker form-control" id="minage" data-container="body" data-live-search="true" 
                        title="Select.." data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false"
                            name="class_id" required >
                     <?php if(isset($list) && $list > 0){
                        foreach($list as $val){?>   
                        <option value = "<?= $val->program_id ?>" ><?= $val->name ?></option>
                       
                       <?php }} ?>
                      </select>
                    </div>
                   </div>

                  
                <div class="col-lg-6 mb-2 mycheckboxdiv mt-4">
                        <div class="form-floating mb-3">
                              <input type="date" class="form-control " id = 'dob'  name="DOB" required  >
                              <i class="fad fa-calendar-alt"></i>
                              <label class="sdatel newlabel"  for="start"> DOB date <span class = 'text-danger' id = 'date_fun'></span> </label>
                       </div>
                     </div> 
             <div class="col-lg-6 mb-2 mycheckboxdiv mt-4">
                        <div class="form-floating mb-3">
                              <input type="number" class="form-control" minlength= '1' id = 'birthday' readonly 
                                title = "please select DOB date"name="age" required >
                            
                              <label class=""  for="start"> Student age</label>
                       </div>                    
                </div>                                                      
             <div class="col-lg-12 mb-3 mycheckboxdiv">
               <div class="controls week_show">
                   <!-- <input type="checkbox" id="repeatsweek" class="filled-in">-->
                    <label for="repeatsweek" class="labels lin19">Parent info</label>
                </div>  
              </div>

                <!--<div class="parentcheck">-->
                <div>
               <div class="row">
                  <div class="col-lg-6">
                      <div class="form-floating mb-3">
                     <input type="text" class="form-control"  name="p_fname" required >
                        <label for="fname">First Name</label>
                       </div>
                  </div>
                   
                  <div class="col-lg-6">
                      <div class="form-floating mb-3">
                     <input type="text" class="form-control"  name="p_lname" required >
                        <label for="lname">Last Name</label>
                       </div>
                  </div> 

                  <div class="col-lg-6">
                      <div class="form-floating mb-3">
                     <input type="email" class="form-control"  name="email" required >
                        <label for="email">Email Address</label>
                       </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-floating mb-3">
                      <input type="tel" class="form-control" maxlength="10" name="mobile" 
                            title="Please use a 10 digit telephone number" pattern="[0-9]{10}" required >      
                       <label for="mno">Mobile No.</label>
                       </div>
                  </div>
                  </div>   
                </div>
                </div>
            
                   <div>
                      <button type="reset" class="btn btn-lights mt-5 mr--3 btnc">
                        Cancel</button>
                      <button type="submit" class="btn btn-primary mt-5 waves-effect shadow">
                        Add Student</button>
                    </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
<script src="<?= base_url() ?>assets_pages/vendor_components/select2/dist/js/select2.full.js"></script>


<!-- /.modal -->
<?php include ('include/footer.php'); ?>
<script>
       $('.addmission').addClass('active');
</script>
<script>
 $(document).ready(function() {
    $('#repeatsweek').change(function() {
      $('.parentcheck').toggle();

    });
    $('.btnc').click(function() {
      $('.parentcheck').hide();
      
    });
});

    $('body').on('change','#dob',function(){
        var dob = $(this).val();
         var age = get_years(dob);
        
         
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
       $('#birthday').val('');
       setTimeout(function(){ $('#date_fun').html(''); }, 5000);
   }
   
  }      
</script>