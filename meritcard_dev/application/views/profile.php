<?php  $this->load->view('include/header'); ?> 
	 <div class="content-wrapper">
	   <div class="container-full">
	     <section class="content">
	       <div class="row">
	         <div class="col-lg-4 col-xlg-3 col-md-5">
	           <div class="box">
	             <div class="user-bg text-center"> <img alt="user" src="<?= base_url() ?>assets_pages/images/avatar-13.png"> </div>
	             <div class="box-body">
	               <div class="row mt-10">
	                 <div class="col-md-12">
	                   <strong>Name</strong>
	                   <p class=""><?= (isset($user_info) && count($user_info)>0)? $user_info[0]->name : '' ?></p>
	                 </div>
	                 <hr>
	                 <div class="col-md-12"><strong>Designation</strong>
	                   <p class="mb-0">Admin</p>
	                 </div>
	               </div>
	               <hr>
	               <div class="row mt-10">
	                 <div class="col-md-12"><strong>Email ID</strong>
	                   <p class=""><?= (isset($user_info) && count($user_info)>0)? $user_info[0]->email : '' ?></p>
	                 </div>
	                 <hr>
	                 <div class="col-md-12"><strong>Mobile No.</strong>
	                   <p class="mb-0"><?= (isset($user_info) && count($user_info)>0)? $user_info[0]->mobile : '' ?></p>
	                 </div>
	               </div> 
	               <hr>
	               <div class="row mt-10">
	                 <div class="col-md-12"><strong>Address</strong>
	                   <p class="mb-0"><?= (isset($user_info) && count($user_info)>0)? $user_info[0]->address : '' ?>
	                    </p>
	                 </div>
	               </div>
	               <hr>
	             </div>
	           </div>
	         </div>
	         <div class="col-lg-8 col-xlg-9 col-md-7">

	           <div class="box box-slided-up">
	             <div class="box-header with-border">
	               <h4 class="box-title "><strong>Update Profile</strong></h4>
	               <ul class="box-controls pull-right">
	                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
	                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
	                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
	               </ul>
	             </div>

	             <div class="box-body">
	               <form action="#" id='pro_Form' method="post">
	                 <div class="form-floating mb-3">
	                   <input type="text" class="form-control" id="fistname"  name="name" 
	                   value="<?= (isset($user_info) && count($user_info)>0)? $user_info[0]->name : '' ?>" required >
	                   <label for="fistname">Full Name</label>
	                 </div>
	                
	               <div class="form-floating mb-3">
	                   <input type="email" class="form-control" placeholder="name@example.com" name="email" 
	                   value="<?= (isset($user_info) && count($user_info)>0)? $user_info[0]->email : '' ?>" required >
	                   <label for="emailaddres">Email Address</label>
	                 </div>
	                 <div class="form-floating mb-3">
	                   <input type="number" class="form-control" id="pnumber"  name="mobile" value="<?= (isset($user_info) && count($user_info)>0)? $user_info[0]->mobile : '' ?>" required >
	                   <label for="pnumber">Mobile No.</label>
	                 </div>
	                 <div class="form-floating mb-3">
	                   <input type="text" class="form-control" id="address" placeholder="name@example.com"
	                    name="address" value="<?= (isset($user_info) && count($user_info)>0)? $user_info[0]->address : '' ?>" required >
	                   <label for="pnumber">Address</label>
	                 </div>
	                 <div class="mt-4s">
	                     <p class = 'view_arror_1 text-danger'></p>
	                   <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
	                   <button type="submit" class="btn btn-success shadow">Update Profile</button>
	                 </div>
	               </form>
	             </div>
	           </div> 

	           <div class="box box-slided-up">
	             <div class="box-header with-border">
	               <h4 class="box-title"><strong>Change Password</strong></h4>
	               <ul class="box-controls pull-right">
	                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
	                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
	                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
	               </ul>
	             </div>

	             <div class="box-body" style="display: block;"> 
	               <form action="#" id = 'up_pass_form' method="post">
	                 <div class="form-floating mb-3">
	                   <input type="password" class="form-control"  name="currentpass">
	                   <label for="currentpass">Current Password</label>
	                 </div>
	                 <div class="form-floating mb-3">
	                   <input type="password" class="form-control" id ='new_pass1' name="newpassword">
	                   <label for="newpassword">New Password</label>
	                 </div>
	                 <div class="form-floating mb-3">
	                   <input type="password" class="form-control"  id ='new_pass2' name="confirmnew">
	                   <label for="confirmnew">Confirm New Password</label>
	                 </div>
	                 <div class="mt-4s">
	                     <p class = 'error_2_form text-danger'></p>
	                   <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
	                   <button type="submit" class="btn btn-success shadow">Change Password</button>
	                 </div>
	               </form>
	             </div>
	           </div>



	         </div>

	       </div>
	     </section>
            <!-- ===================== msg model  start  ====================-->
        <div class="modal fade" id="msg_Modal" role="dialog" style ="margin-top: 10%;" >
          <div class="modal-dialog">
    
      <!-- Modal content-->
           <div class="modal-content">
                     <div class="modal-header" style ="text-align: center;">
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title text-white msg" style="text-align: start;color: white;"></h5>
                      </div>
            </div>
          </div>
        </div>
 <!-- ===================== msg model  end  ====================-->
	     <?php $this->load->view('include/footer'); ?>

	     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	     <script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
	     <script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>
	     <script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>
	     
	 <script>
	    
	  $('body').on('submit','#pro_Form',function(e){
          e.preventDefault();
      
           $.ajax({
        type: 'post',
        url: "<?= base_url('Dashboard/update_profile') ?>",
        data: $(this).serialize(),
        async: false,

        success: function(data){
          var res = $.parseJSON(data);
          if (res.status){
                $('.msg').parent().css('background-color', 'green');
                             $('.msg').html(res.msg);
                        $('#msg_Modal').modal('show'); 
          }else{
                     $('.msg').parent().css('background-color', 'red');
                             $('.msg').html(res.msg);
                        $('#msg_Modal').modal('show'); 
                }
            setTimeout(function(){$('#msg_Modal').modal('hide'); window.location.reload();  return false;},3000); 
            
        }
       });    
 });    
 

          $('body').on('submit','#up_pass_form',function(e){
          e.preventDefault();
            var new_pass1 = $('#new_pass1').val();
            var new_pass2 = $('#new_pass2').val();
            
            if(new_pass1 != new_pass2){
                $('.error_2_form').html('Invalid Password');
                setTimeout(function(){$('.error_2_form').html('');},3000); 
                return false;
            }
            
            
           $.ajax({
        type: 'post',
        url: "<?= base_url('Dashboard/up_pass') ?>",
        data: $(this).serialize(),
        async: false,

        success: function(data){
          var res = $.parseJSON(data);
          if (res.status){
                $('.msg').parent().css('background-color', 'green');
                             $('.msg').html(res.msg);
                        $('#msg_Modal').modal('show'); 
          }else{
                     $('.msg').parent().css('background-color', 'red');
                             $('.msg').html(res.msg);
                        $('#msg_Modal').modal('show'); 
                }
            setTimeout(function(){$('#msg_Modal').modal('hide'); return false;},3000); 
            
        }
       });    
 });    
 
	 </script>    
	     
	     
	     
	     