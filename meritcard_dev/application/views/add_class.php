 <?php include ('include/header.php'); ?> 
 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="w-100s">
					<h4 class="page-title">Class List</h4>
					<div class="haff-widgets">
						<a href="#" class="btn btn-primary mt-10 waves-effect" data-bs-toggle="modal" data-bs-target="#add_room">+ New Class</a>
						</div>
				</div>				
			</div>
		</div>
  	<!-- Main content -->
		<section class="content">
			<div class="row">
			  	
				<div class="col-12 mt-3">
					<div class="box">
						<div class="box-body roomList">
						    
						    <div classs="room_list">
						     <div class="row m-0 c_rows">
						        </div>
						    </div>
						    </div>
						   
						    
						    
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
   <div class="modal center-modal fade add_parent" id="add_room" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">New Room</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form action="#" id = 'room_form' method="post">
             <p class = 'text-danger room_error' ></p>
           <div class="form-floating mb-3">
            <input type="text" class="form-control"name="c_name" required >
             <label for="addroom">Enter Class Name</label>
           </div> 
          
           <div class="form-floating mb-3">
             <input type="number" min='1' class="form-control"name="max_occupancy" required >
             <label for="addroom">max occupancy </label>
           </div>
           
            <div class="form-floating mb-3">
             <input type="number" min='2' class="form-control"name="age_group" required >
             <label for="addroom">max age group </label>
           </div>
           
           
           
           <div class="mt-4s">
             <button type="reset" class="btn btn-light addF_close " data-bs-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Create class</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
    <?php include ('include/footer.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
     <script  src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
     <script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>       
    <script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>
<script>
    //addrooms
                                       
    function get_class_data(){
                          
          $.ajax({
        type: 'post',
        url: "<?= base_url('Room/get_class_data') ?>",
        data: {},
        async: false,
                                                                                              
        success: function(data){
          var res = $.parseJSON(data);
          if (res.status){
               let html = '';
               for(let i =0; i<res.body.length;i++)
                {
                    html += `<div class="col-md-6 col-12">
													<div class="box box-solid bg-secondary">
													  <a href="#" class="box-header">
														<h4 class="box-title">${res.body[i].name} </h4>
													  </a>

													  <div class="box-body">
														<a href="#" class="avatr_list">
															<img src="<?= base_url() ?>assets_pages/images/avatar-13.png" alt="">
														     ${'max occupancy :-  '+res.body[i].max_occupancy} 
														    
														     ${' , age group :-  '+res.body[i].age_group} 
														</a>
													  </div>
													</div>
												  </div>`;
				$('.c_rows').html(html); 								  
                } }  }
       }); 
        
        return false; 
        
        
    }
    
    $(document).ready(function(){
         get_class_data();
        });
    
    
     $('body').on('submit','#room_form',function(e){
          e.preventDefault();
      
           $.ajax({
        type: 'post',
        url: "<?= base_url('Room/add_class_data') ?>",
        data: $(this).serialize(),
        async: false,

        success: function(data){
          var res = $.parseJSON(data);
          if (res.status){
              
                     get_class_data(); 
                  
                  $('.addF_close').trigger('click') ;  
                  $('#room_form').trigger("reset");
               
          }else{
                      $('.room_error').html(res.msg);
                
            setTimeout(function(){$('.room_error').html('');  return false;},3000); 
          }   
        }
       });    
 });    
    
</script>