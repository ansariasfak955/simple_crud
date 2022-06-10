 <?php include ('include/header.php'); ?> 
 <style>
     .listitem{
         list-style:none ;
     }
    .button_csv
    {
    width: 200px;
    margin-top: -11px !important;
    display: block;
    margin-left: 5px;
     }
 </style>
 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="w-100s">
					<h4 class="page-title">Student List</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Students</li>
							</ol>
						</nav>
					</div>
					<div class="haff-widgets">
						<button class="btn btn-success mt-10 waves-effect" data-toggle="modal" data-target="#myModal" >Submit Roster</button>
						<a href="<?= base_url('Student/add_student') ?>" class="btn btn-primary mt-10 waves-effect">+ New Students</a>
					    </div>
					  
				</div>
			
				<a class="btn btn-success mt-10 waves-effect button_csv" href="<?= base_url('assets/csv/meritcard_students.csv') ?>" download > <i class="fad fa-file-download"></i> &nbsp;Download CSV</a>
			</div>                                            
		</div>
  	<!-- Main content -->
		<section class="content">
	
		    
		    
			<form>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
						<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-6">
						   
						 <!--<div class="suggest mt-2">-->
						     
						<input type="hidden" id = 'h_user_id' name="user_id">	
						 <label>Select Student  </label>
						<input text="search" id="myHouse" placeholder="type here..." autocomplete="off"  class="form-control input-pad" />	    	    
		                 <div id="result"></div>
		             
                   	<!--</div>-->
                   	</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
						    <label>Select class <span class = 'text-danger'></span> </label>
						<select  onchange = "srarch_sec(this.value)" name = 'class_id' class="form-control m_class input-pad"     >
					    <option value = '' >select class</option>
					  <?php if(isset($class_list) && count($class_list) >0  ){foreach($class_list as $val){ 
					           if($val->class_id == $this->input->get('class_id')){ ?>
					                <option selected value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					           <?php }else{ ?>
					                      <option value= "<?= $val->class_id ?>"><?= $val->name ?> </option>
					<?php }} } ?>  
					  	
					  	                    <!--fgg-->                  
					  </select>
						</div>
               
						<div class="col-lg-3 col-md-4 col-sm-6">
						     <label>Select section <span class = 'text-danger'></span> </label>
						<select class=" form-control class_div input-pad" name = 'section_id' >
					  
					   </select>
						</div>
					
						<div class="col-lg-3 col-md-4 col-sm-6">
						    <div class="suggest mt-3">
						<button type="Submit" class="btn btn-primary waves-effect mt-5">Apply</button>
						<button type="button" class="btn btn-success waves-effect mt-5" id = 'download_students'>Export Roster</button>
						</div>
						</div>
						</div>
						</div>
						</div>
										</div>
			</div>
			</form>
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-hover mb-0 student_list" id="complex_header">
									<thead>
										<tr>                                       
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php if(isset($s_list) && count($s_list) >0){
									    foreach($s_list as $val){ ?>
									        	<tr>
											<td colspan="3">
												<div class="row align-items-center w-100s">
											<div class="col-lg-6">
												<div class="student_list">
													<a href="<?= base_url('Student/student_profile/').$val->user_id ?>">
														<div class="avtar_img">
                                                          <img src="assets_pages/images/avatar.png">
														</div>
														<div class="info_title">
															<h5><?= $val->name ?></h5>
														</div>
													</a>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="avtar-address">
												<a href="<?= base_url('Student/student_profile/').$val->user_id ?>">
													<h5><i class="fa fa-volume-control-phone" aria-hidden="true"></i><?= $val->mobile ?></h5>
													    </a>
												<a href="<?= base_url('Student/student_profile/').$val->user_id ?>">
														    
												     <h5><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $val->email ?></h5>
											 	      </a>  
													    
												</div>
											</div>
										   </div>

											</td>
										</tr>
									  <?php  }  } ?>
									
									
										
										
										
										<!--<tr>
											<td colspan="3">
												<div class="row align-items-center w-100s">
											<div class="col-lg-6">
												<div class="student_list">
													<a href="#">
														<div class="avtar_img">
                                                          <img src="assets/images/avatar.png">
														</div>
														<div class="info_title">
															<h5>Sumit</h5>
														</div>
													</a>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="avtar-address">
													<h5><i class="fa fa-volume-control-phone" aria-hidden="true"></i>+91 1233456789</h5>
													<h5><i class="fa fa-map-marker" aria-hidden="true"></i> Indore, Mp India</h5>
												</div>
											</div>
										   </div>

											</td>
										</tr>-->
										
										
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
                                                          
    <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">bulk upload Student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
          <form  id = 'blk_form' class="md-form" action = "<?= base_url('Student/bulk_upload_students') ?>"  method ="post"  >
        <!-- Modal body -->
        <div class="modal-body">
          
            <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                      </div>
                      <div class="custom-file">
                        <input  type = 'file' name="image" >
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                    </div>
                                             
           
        </div>
                                                                
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" id = "file_sub_btn" >Upload</button>
        </div>
         </form>
      </div>
    </div>
  </div>
    
   <!-- ===================== msg model start ====================-->
            <div class="modal fade" id="msg_Modal" role="dialog" style ="margin-top: 10%;" >
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header" style ="text-align: center;" >
            <h5 class="modal-title text-white msg text-center"></h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            
            </div>
            </div>
            </div>
            </div>
            <!-- ===================== msg model end ====================-->
            
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
     <script  src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>                                     
     <script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>       
    <script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>
    <script>
         console.log('demos== test'); 
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
             
          }else{
              $(".class_div").html('');
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
            for(var i =0;i<res.body.length; i++){  // style= 'list-style:none' 
                htmls += `<li class ='listitem btn '  data = "${res.body[i].user_id}">${res.body[i].name}</li>`;
            } 
            htmls += `</ul>`;
            $("#result").html(htmls);
             
          }else{
              ("#result").html('');
          }
        }                                   
    });  
          
          
          
      }) ; 
                                                    
        
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
        
      $('body').on('click','#download_students',function(){
         var class_id   = $('.m_class').val();        
         var section_id = $('.class_div').val();
        
         console.log(class_id+'==jk=='+section_id);
         
         if((class_id == '') || (class_id == null)){ 
             $('.m_class').parent().find('span').html('this field is required');
              setTimeout(function(){  $('.m_class').parent().find('span').html(''); }, 5000);
              return false;
             
         }
          
           if((section_id == '') || (section_id == null)){ 
             $('.class_div').parent().find('span').html('this field is required');
              setTimeout(function(){  $('.class_div').parent().find('span').html(''); }, 5000); 
               return false;
           }
                           
         
          window.location.href = "<?= base_url('Student/download_students/') ?>"+class_id+'/'+section_id; 
        
        return false; 
    });    
     
        $('body').on('submit','#blk_form',function(e){
             
                e.preventDefault();       
               
                 $('#file_sub_btn').prop('disabled', true);
                    
                      $.ajax({
          
            type: 'POST',
            url: '<?= base_url('Student/bulk_upload_students') ?>',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
           
            success: function(response){
                  console.log(response);
                  var res =  JSON.parse(response);          
              if(res.status)
                {
                   
                    // $('#loader_Modal').modal('hide');  
                    $('.msg').parent().css('background-color', 'green');
                    $('.msg').html(res.msg);
                    $('#msg_Modal').modal('show');     
                    
                    setTimeout(function(){$('#msg_Modal').modal('hide'); window.location.reload();   return false;},2000); 

                }else{
                    $('#loader-icon').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
                }
            }
        });
                             
                           
             setTimeout(function(){  $('#file_sub_btn').prop('disabled', false); }, 8000);
                             return false;
           
        });
        
           
        
        
        
    </script>
    
    
       <?php  include ('include/footer.php'); ?>