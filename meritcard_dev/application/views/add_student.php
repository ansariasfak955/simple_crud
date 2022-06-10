<?php include ('include/header.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="d-flex align-items-center">
         <div class="w-100s">
             <h4 class="page-title">ADD STUDENT</h4>
           <div class="d-inline-block align-items-center">
             <!-- <nav>
						<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Students</li>
		 					</ol>
						</nav> -->
           </div>
           <div class="haff-widgets">
             <a href="#" class="btn btn-success mt-10 waves-effect">Submit Roster</a>
             <a href="<?= base_url('Student') ?>" class="btn btn-primary mt-10 waves-effect">view Students</a>
           </div>
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content add_students">
       <form id = "std_Form" >
         <div class="row">
           <div class="col-12">
        <div class="card">
           <div class="card-body">
              <div class="row">
                 <div class="col-6">
                     <label for="addroom">Select Class</label>
			  	    <select name ='class_id' onchange = "get_class_data(this.value)" class ='form-control selectpicker ' data-container="body" data-live-search="true" title="" required >
                      <option value = '' >select class name</option>
                       <?php if(isset($class_list) && count($class_list)>0 ){ 
                        foreach($class_list as $val){ ?>
                        <option value ="<?= $val->class_id ?>"><?= $val->name ?></option>
                  <?php }} ?> 
                   </select>     
                  </div>
                  <div class="col-6">
                      <label for="addroom">Select Room</label>
			  	      <select name ='room_id'  class ='form-control c_rows mt-2 input-pad' required >
			  	          <option value '' >select room</option>
			  	       </select>                     
                  </div>
                  
                </div>
                  </div>
                  
               <div class="card-body">
                   <div class="row  student-cards align-items-center mb-5" id="remove">
                     <div class="col-lg-1">
                       <button type="button" class="btn btn-light">1</button>
                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="text" class="form-control" multiple name="fname[]" placeholder='student'>
                         <label for="fname">First Name </label>
                       </div>

                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="text" class="form-control" multiple name="lname[]" placeholder='student'>
                         <label for="lname">Last Name </label>
                       </div>
                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="text" class="form-control" multiple name="email[]" placeholder='student'>
                         <label for="lname">Email</label>
                       </div>
                     </div>
                     
                     <!--<div class="col-lg-1 col-md-4 col-sm-6">-->
                     <!--  <button type="button" class="btn-secondary btn remove pointer"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">-->
                     <!--      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />-->
                     <!--      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />-->
                     <!--    </svg></button>-->
                     <!--</div>-->
                  </div>
                   <div class="row  student-cards align-items-center mb-5" id="remove">
                     <div class="col-lg-1">
                       <button type="button" class="btn btn-light">2</button>
                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="text" class="form-control" multiple name="fname[]" placeholder="student">
                         <label for="fname">First Name </label>
                       </div>

                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="text" class="form-control" multiple name="lname[]" placeholder="students">
                         <label for="lname">Last Name </label>
                       </div>
                       
                     </div>
                     
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="text" class="form-control"  multiple name="email[]" placeholder="student">
                         <label for="lname">Email</label>
                       </div>
                     </div>
                     <!--<div class="col-lg-1 col-md-4 col-sm-6">-->
                     <!--  <button type="button" class="btn-secondary btn remove pointer"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">-->
                     <!--      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />-->
                     <!--      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />-->
                     <!--    </svg></button>-->
                     <!--</div>-->
                   </div>
                    <div class="row  student-cards align-items-center mb-5" id="remove">
                     <div class="col-lg-1">
                       <button type="button" class="btn btn-light">3</button>
                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="text" class="form-control" multiple name="fname[]" placeholder='student'>
                          <label for="fname">First Name </label>
                       </div>

                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="text" class="form-control" multiple name="lname[]" placeholder='student'>
                          <label for="lname">Last Name </label>
                       </div>
                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="text" class="form-control"  multiple name="email[]" placeholder='student'>
                         <label for="lname">Email</label>
                       </div>
                     </div>
                     <!--<div class="col-lg-1 col-md-4 col-sm-6">-->
                     <!--  <button type="button" class="btn-secondary btn remove pointer"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">-->
                     <!--      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />-->
                     <!--      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />-->
                     <!--    </svg></button>-->
                     <!--</div>-->
                   </div>
                    <div class="row  student-cards align-items-center mb-5" id="student_Add">
                     <div class="col-lg-1">
                       <button type="button" class="btn btn-light">4</button>
                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="text" class="form-control" multiple name="fname[]" placeholder='student'>
                         <label for="fname">First Name </label>
                       </div>

                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="form-floating mb-3">
                         <input type="text" class="form-control" multiple name="lname[]" placeholder='student'>
                         <label for="lname">Last Name </label>
                       </div>
                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                      <div class="form-floating mb-3">
                         <input type="text" class="form-control"  multiple name="email[]" placeholder='student'>
                         <label for="lname">Email</label>
                       </div>
                     </div>
                     <!--<div class="col-lg-1 col-md-4 col-sm-6">-->
                     <!--  <button type="button" class="btn-secondary btn remove pointer"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">-->
                     <!--      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />-->
                     <!--      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />-->
                     <!--    </svg></button>-->
                     <!--</div>-->
                   </div>
                   <div class="row">
                    <div class="col-lg-12">
                 <button type="Submit" class="btn btn btn-primary mt-10 waves-effect">Save Students</button> 
                 <button type="button" class="btn btn btn-link mt-10 waves-effect" id="addBtn"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add Another Student</button>
                 </div>
               </div>
               </div>

             </div>
           </div>
         </div>
       </form>
     </section>
   </div>
 </div>

 <?php include ('include/footer.php'); ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
 <script>
   $(document).ready(function() {
     var rowIdx = 4;
     $('#addBtn').on('click', function() {
       $('#student_Add').append(`<div id="R${++rowIdx}">
       <div class="row student-cards align-items-center" id="remove">
       <div class="col-lg-1">
         <button type="button" class="btn btn-light">${rowIdx}</button></div>
            
             <div class="col-lg-3 col-md-4 col-sm-6">
                      <div class="form-floating mb-3">
                         <input type="text" class="form-control" multiple name="fname[]" placeholder='student'>
                         <label for="fname">First Name </label>
                       </div>
                   </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" multiple  name="lname[]" placeholder='student'>
                         <label for="lname">Last Name </label>
                       </div>
                   </div>
                   <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="form-floating mb-3">
                          <input type="text" class="form-control" multiple name="email[]" placeholder='student'>
                         <label for="lname">Email</label>
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
   
   $('body').on('submit','#std_Form',function(e){
            e.preventDefault(); 
            $.ajax({
		    		type:'post',
		    		url:"<?= base_url("Student/bulk_add_student") ?>",
		    		data:$(this).serialize(),
		    		async : false,
		    		success : function(data){
		                   var res = $.parseJSON(data);
		                   if(res.status){
		                       alert(res.msg+'  student add count is   '+res.body);
		                       window.location.reload();
		                   }else{
		                       alert(res.msg);
		                   }
		                     
		                 }
		    	});
       
    })
   
   //////////////// get section //////////////
   
   function get_class_data(id){
       if(id == ''){ return false;  }                            
          $.ajax({
        type: 'post',
        url: "<?= base_url('Room/class_section_list') ?>",
        data: {class_id:id},
        async: false,
                                                                                              
        success: function(data){
          var res = $.parseJSON(data);
          if (res.status){
               let html = '';
               for(let i =0; i<res.body.length;i++)
                {
                    html += ` <option value ='${res.body[i].section_id}' >${res.body[i].name}</option>`; 
				$('.c_rows').html(html); 
                } }  }
       }); 
        
        return false; 
        
        
    }
   
 </script>
<script>
   $('.myschool').addClass('active');
   $('.student').addClass('active');
 </script>
 
 <script>
      $(document).ready(function () {
      $('.c_rows').selectize({
          sortField: 'text'
      });
  });
 </script>