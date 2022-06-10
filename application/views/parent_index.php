 <?php include ('include/header.php'); ?>
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
         <a href="<?= base_url('Student/parents/') ?>" class="active">Parents</a>
         <a href="<?= base_url('Student/family/') ?>" class="">Family</a>
         <a href="<?= base_url('Student/approved_pickups/') ?>" class="">Approved Pickups</a>

       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title">Parent List</h4>

           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">

             <!--<a href="#" class="btn btn-primary mt-10 waves-effect shadow">Bulk Upload</a>-->
           </div>
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content">
       <form>
         <div class="row parentlist">
           <div class="col-lg-12">
             <div class="card">
               <div class="card-body">
                 <div class="row">
                   <div class="col-lg-3 col-md-4 col-sm-6">
                          <!--<div class="suggest mt-2">-->
						            <input type="hidden" id = 'h_user_id' name="user_id">	
        						 <label>Select Student  </label>
        						<input text="search" id="myHouse" autocomplete="off"   placeholder="type here..." class="form-control input-pad" />	    	    
        		                 <div id="result"></div>
        		             
                           	<!--</div>  -->
                    
                    
                   </div>
                   <div class="col-lg-3 col-md-4 col-sm-6">
                    <label>Select class </label>
						<select  onchange = "srarch_sec(this.value)" name = 'class_id' class="input-pad form-control m_class"     >
					    <option value = '' >select class</option>
					  <?php if(isset($class_list) && count($class_list) >0  ){foreach($class_list as $val){ 
					           if($val->class_id == $this->input->get('class_id')){ ?>
					                <option selected value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					           <?php }else{ ?>
					                      <option value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					<?php }} } ?>  
					</select>
                   </div>


                   <div class="col-lg-3 col-md-4 col-sm-6">
                      <label>Select section </label>
						<select class="form-control class_div input-pad" name = 'section_id' >
					    </select>
                   </div>
                   <div class="col-lg-1 col-md-4 col-sm-6">
                        <div class="suggest mt-3">
                    <button type="submit" class="btn btn-primary mt-5 waves-effect shadow">Submit</button>
                    </div>
                   </div>

                   <div class="col-lg-3 col-md-4 col-sm-6">
                    <!-- <select multiple class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Select Student's Status" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                       <option>Prospect</option>
                       <option>Applied</option>
                     </select>-->
                   </div>
                    
                 </div>
               </div>
             </div>
           </div>
         </div>
       </form>


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
           
         <div class="col-12">
           <div class="box">
             <div class="box-body">
               <div class="table-responsive">
                 <table class="table table-hover mb-0 parent_list" id="complex_header">
                   <thead>
                     <tr>
                       <th>STUDENT</th>
                       <th>PARENTS</th>
                       <th>SIGNED UP </th>
                       <th>BILL PAY </th>
                       <th>AUTOPAY</th>
                     
                     </tr>
                   </thead>
                   
                   <tbody>
                       	<?php if(isset($p_list) && count($p_list) >0){
									    foreach($p_list as $val){ ?>
                     <tr>
                       <td>
                         <div class="student_list">
                           <a href="#">
                             <div class="avtar_img">
                               <img src="<?= base_url() ?>assets_pages/images/avatar.png">
                             </div>
                             <div class="info_title">
                               <h5><?= $val->name ?></h5>
                             </div>
                           </a>
                         </div>
                       </td>
                       <td>  
                           <?php if($val->data){ ?>
                                <div class="parent-add-cell">
                           <div class="student_list">
                             <div class="avtar_img">
                               <img src="<?= base_url() ?>assets_pages/images/avatar.png">
                             </div>
                             <div class="info_title">
                            <?php  foreach($val->data as $value){  ?>
                               <h5><?= $value->parent_name ?></h5>
                               <div class="add-edit">
                                 <i class="fa fa-pencil-square-o p-2 edit_parent" aria-hidden="true" data = "<?= base64_encode(json_encode($value)) ?>" ></i>
                                 <a href="#" class=" warning_mess "  data = "<?= $value->parent_id ?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                
                              
                               </div>
                             <?php }
                             
                             ?>  
                                <!-- <a href="#" href="#" data-bs-toggle="modal" data-bs-target="#add_parent">+ Add another parent</a>-->
                                  <a href="#"  data = "<?= base64_encode(json_encode($val)) ?>" class="addSparent">+ Add another parent</a>
                            
                             </div>
                           </div>
                           </div>
                           
                        <?php  }else{ ?>
                               
                         
                           <a href="#" data = "<?= base64_encode(json_encode($val)) ?>" class="btn btn-primary waves-effect waves-light addSparent">Add parent</a>
                             <?php }?>
                        

                       </td>
                       <td class="text-center">
                            <?php  foreach($val->data as $value){  ?>
                           <a href="#" class="btn-light btn">Add Info</a>
                            <br>
                          <?php } ?> 
                           </td>
                           
                      <td class="text-center">
                            <?php  foreach($val->data as $value){  ?>
                           <a href="#" class="btn-light btn">Add Info</a>
                           <br>
                          <?php } ?> 
                           </td>      
                           
                       <td class="text-center">
                            <?php  foreach($val->data as $value){  ?>
                           <a href="#" class="btn-light btn">Add Info</a>
                            <br>
                          <?php } ?> 
                           </td>     
                     

                     </tr>
                      <?php  }  } ?>
									        
                    
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

 <!-- Modal Parent Edit -->
<div class="modal modal-left " id="edit_parent" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">                              
         <h5 class="modal-title s_title">Edit Amit's Parent</h5>
         <button type="button" class="btn-close"  aria-label="Close"></button>
       </div>
       <div class="modal-body box-body">
        <form action="<?= base_url('Student/edit_Parents') ?>" method="post">
           <div class="form-floating mb-3">
             <input type="text" class="form-control"  name="name" id = 'edit_name'>
             <label for="fistname">Full Name</label>
           </div>
            <input type = 'hidden' name = 'p_id' id = 'edit_pid' >
           <div class="form-floating mb-3">
             <input type="email" class="form-control" id = 'edit_email' name="email" >
             <label for="emailaddres">Email Address</label>
           </div>
           <div class="form-floating mb-3">
             <input type="tel" class="form-control" id="edit_mobile"  name="mobile" title="Please use a 10 digit telephone number" 
                    pattern="[0-9]{10}" required  >
             <label for="pnumber">Mobile Phone</label>
           </div>
           <div class="mt-4s">
            
             <button type="submit" class="btn btn-success shadow">Update Contact</button>
           </div>
         </form>
        <!-- /.box-body -->
       </div>
     </div>
   </div>
 </div>

 <div class="modal modal-right fade add_parent" id="add_parent" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title p_title">Add Parent for Amit</h5>
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
                      <form action="<?= base_url('Student/add_guardian')?>" method="post">
           
           <div class="form-floating mb-3">
             <input type="text" class="form-control"  name="fname">
             <label for="fistname">First Name</label>
           </div>
           <div class="form-floating mb-3">
             <input type="text" class="form-control"  name="lname">
             <label for="lastname">Last Name</label>
           </div>
           <input type = 'hidden' id = 's-ids' name = 'student_id'>
           <input type = 'hidden'  name = 'relational' value = 'Parent'>
           <div class="form-floating mb-3">
             <input type="email" class="form-control" name="email">
             <label for="emailaddres">Email Address</label>
           </div>
           <div class="form-floating mb-3">
             <input type="tel" class="form-control" name="mobile" title="Please use a 10 digit telephone number" 
                    pattern="[0-9]{10}" required >
             <label for="pnumber">Mobile No.</label>
           </div>
           <div class="mt-4s">
           
             <button type="submit" class="btn btn-success shadow">Save Contact</button>
           </div>
         </form>            
            </div>
            <div id="navpills-2" class="tab-pane">
               <form action="<?= base_url('Student/addGuardianExisting')?>" method="post">
           
           <div class="mb-3">
             <div class="suggest mt-2">
                    <input type="hidden" id = 'h_parent_id' name="p_id">	
            		 <label>Select Parent  </label>
            		<input text="search" id="sch_perent" placeholder="type here..." class="form-control" />	    	    
              <div id="result_2"></div>
                 
       	</div>  
              <input type = 'hidden' id = 's-ids_2' name = 'student_id'>  
                <input type = 'hidden'  name = 'relational' value = 'Parent' >   
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
 <?php include ('include/footer.php'); ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
 <script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>

<script>
      
       $("body").on('click','.edit_parent',function(){                                                    
           var encodedString = $(this).attr('data');
           var p_data = atob(encodedString);
               p_data = $.parseJSON(p_data); 
            console.log(p_data);
          $('.s_title').html('Edit Parent for ' + p_data.name);
           $('#edit_name').val(p_data.parent_name);
           $('#edit_email').val(p_data.p_email);
           $('#edit_mobile').val(p_data.p_mobile);
           $('#edit_pid').val(p_data.parent_id);
           $('#edit_parent').modal('show'); 
       });
     
     $("body").on('click','.addSparent',function(){                                                    
           var encodedString = $(this).attr('data');
           var p_data = atob(encodedString);
               p_data = $.parseJSON(p_data); 
            console.log(p_data);
           $('.p_title').html('Add Parent for ' + p_data.name);
           $('#s-ids').val(p_data.user_id);
           $('#s-ids_2').val(p_data.user_id);
          
           $('#add_parent').modal('show'); 
       });
       $("body").on('click','.btn-close',function(){
          
           $('#edit_parent').modal('hide'); 
       });
       
      function srarch_sec(class_id){
                                                                 
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
            
            $(".class_div").html(htmls);
             
          }
        }
    });
        }   
     $("body").on('keyup','#myHouse',function(){
          
          var name = $(this).val();
          
        
          
          $.ajax({
        type: "POST",                               
        url: "<?= base_url('Student/search_student') ?>" ,
        data: {name:name},
        success: function(result) {
          var res = $.parseJSON(result);
          var htmls = '';
         
          if(res.status){
             htmls =  `<ul >`;
            for(var i =0;i<res.body.length; i++){
                htmls += `<li class ='listitem btn'  data = "${res.body[i].user_id}">${res.body[i].name}</li>`;
            } 
            htmls += `</ul>`;
            $("#result").html(htmls);
             
          }
        }                                   
    });  
          
          
          
      }) ; 
   
     $("body").on('keyup','#sch_perent',function(){
          
          var name = $(this).val();
         $.ajax({
        type: "POST",                               
        url: "<?= base_url('Student/search_parent') ?>" ,
        data: {name:name},
        success: function(result) {
          var res = $.parseJSON(result);
          var htmls = '';
         
          if(res.status){
             htmls =  `<ul >`;
            for(var i =0;i<res.body.length; i++){
                htmls += `<li class ='listitem_2 btn'  data = "${res.body[i].user_id}">${res.body[i].name}</li>`;
            } 
            htmls += `</ul>`;
            $("#result_2").html(htmls);
             
          }
        }                                   
    });  
          
          
          
      }) ; 
     
     
     $('body').on('click', ".listitem_2", function(){
            var values = $(this).html();
            var ids = $(this).attr('data');
            $('#sch_perent').val(values);
            $('#h_parent_id').val(ids);
            $('#result_2').html('');
            
            return false;
        });
      $('body').on('click', ".listitem", function(){
            var values = $(this).html();
            var ids = $(this).attr('data');
            $('#myHouse').val(values);
            $('#h_user_id').val(ids);
            $('#result').html('');
            
            return false;
        });
     
     
     
       $(document).ready(function(){                                      
      var class_id = "<?= $this->input->get('class_id') ?>";
      console.log("my class id is == "+ class_id);
      if(class_id != ''){
          srarch_sec(class_id);
      }                                   
      return false; 
});   
 
 
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
            window.location.href = "<?= base_url('Student/delete_parent/') ?>"+id;
            
        });
    });
</script>