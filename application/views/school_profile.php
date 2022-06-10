<?php include ('include/header.php'); ?>
<div class="content-wrapper">
  <div class="container-full">
    <section class="content">
      <div class="row mt-4">
        <div class="col-lg-12">
          <div class="tabls-title">
            <a href="<?= base_url('Dashboard/school_setting') ?>" class=""><i class="fa-regular fa-circle-info"></i> School Info</a>
            <a href="<?= base_url('Dashboard/school_profile') ?>" class="active"><i class="fa-solid fa-school"></i> School Profile</a>
            <!-- <a href="#" class="">Feed</a> -->
          </div>
        </div>
      </div>

      <form action="<?= base_url('Dashboard/update_school_profile') ?>" method="post">
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
            <div class="box box-slided-up bgprofile">
              <div class="box-header with-border">
                <h4 class="box-title"><i class="fa-solid fa-school"></i><?= isset($school_pro[0]->org_name)? $school_pro[0]->org_name :'' ?></h4>
                <ul class="box-controls pull-right">
                  <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                  <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                  <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
                </ul>
              </div>

              <div class="box-body school_Style" style="display: block;">
                <div class="row">
                  <!--<div class="col-lg-12">-->
                   
                      <div class="col-6">
                           <label for="fistname">School Name</label>
                        <input type="text" class="form-control" id="name" placeholder="name@example.com" name="name"
                            value="<?= isset($school_pro[0]->org_name)? $school_pro[0]->org_name :'' ?>">
                       
                      </div>
                      <div class="col-6">
                          <label for="address1">School Address</label>
                        <input type="text" class="form-control" id="address1" placeholder="name@example.com" name="address"
                            value="<?= isset($school_pro[0]->address)? $school_pro[0]->address :'' ?>">
                        
                      </div>
                      <div class="col-6">
                          <label for="snumber">School Phone Number</label>
                        <input type="number" class="form-control" id="snumber" placeholder="name@example.com" name="mobile"
                                value="<?= isset($school_pro[0]->mobile)? $school_pro[0]->mobile :'' ?>">
                        
                      </div>
                      <!--<div class="col-6">
                        <input type="text" class="form-control" id="address2" placeholder="name@example.com" name="address2" value="Indore">
                        <label for="address2">School Address Line 2</label>
                      </div>-->
                      <div class="col-6">
                           <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" placeholder="https://cws.in.net/meritcard_dev/" 
                            name="website"
                            value="<?= isset($school_pro[0]->school_website)? $school_pro[0]->school_website :'' ?>">
                           
                      </div>
                       <div class="col-6 ">
                          <select class="selectpicker form-control" onchange = "get_citys(this.value)"  id="number-multiple"
                          data-container="body"   name = 'state_id'
                            data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="State">
                          
                          <?php if(isset($state_list) && count($state_list)>0 ){
                             $u_state_id =  isset($school_pro[0]->state)? $school_pro[0]->state : 0 ;
                              foreach($state_list as $val){
                                  if($val->state_id == $u_state_id){
                                echo "<option value='".$val->state_id."' selected=''>".$val->name."</option>";
                                  }else{
                                         echo "<option value='".$val->state_id."'>".$val->name."</option>";
                                        }
                               }  } ?>
                          
                            
                          </select>
                        </div>
                        <div class="col-6">
                             <label for="city">City</label>
                             
                            <select class=" form-control" name = 'city_id'   id="citys" data-container="body" 
                            data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="City">
                             
                             </select>
                             
                        </div>
                       
                    
                      <div class="col-6">
                           <label for="enrollment">Enrollment Capacity</label>
                        <input type="text" class="form-control" id="enrollment" placeholder="name@example.com"
                           name="enrollment" value="<?= isset($school_pro[0]->school_capacity)? $school_pro[0]->school_capacity :'' ?>">
                       
                      </div>
                      <div class="col-6">
                          <label for="zipcode">Zip Code</label>
                        <input type="text" class="form-control" id="zipcode" placeholder="name@example.com"
                                name="zipcode" value="<?= isset($school_pro[0]->zip_code)? $school_pro[0]->zip_code :'' ?>">
                         <input type="hidden" name = 'org_id' value = "<?= isset($school_pro[0]->org_id)? $school_pro[0]->org_id :'' ?>"; 
                      </div>
                     
                      <div class="">
                        <button type="reset" class="mt-4s btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="mt-4s btn btn-success shadow">Update Profile</button>
                      </div>
                   
                 
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
<script>
     function get_citys(id){
       if(id == ''){ return false;  }       
       
       old_id = "<?= isset($school_pro[0]->city)? $school_pro[0]->city :'' ?>";
       
          $.ajax({
        type: 'post',
        url: "<?= base_url('Dashboard/get_citys') ?>",
        data: {state_id:id},
        async: false,
                                                                                              
        success: function(data){
          var res = $.parseJSON(data);
          if (res.status){
               let html = '';
               for(let i =0; i<res.body.length;i++)
                {
                    html += `<option value='${res.body[i].city_id}' ${(res.body[i].city_id == old_id)? 'selected':''} >${res.body[i].name}</option>`;
				} 
              	$('#citys').html(html); 	
              
          }  }
       }); 
        
        return false; 
        
        
    }
    
    
    $(document).ready(function(){
        var u_state_id =  "<?= isset($school_pro[0]->state)? $school_pro[0]->state : 0 ?>" ;     
        
        if(u_state_id > 0 ){
            get_citys(u_state_id)
        }
        
    });
    
    
</script>





