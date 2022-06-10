 <?php include ('include/header.php'); ?> 
 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="w-100s">
					<h4 class="page-title">Blog List</h4>
					<div class="haff-widgets">
						<a href="<?= base_url('Blog/blog_add') ?>" class="btn btn-primary mt-10 waves-effect">+ Add Blog</a>
						</div>
				</div>				
			</div>
		</div>
  	<!-- Main content -->
		<section class="content">
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
                       <table class="table table-hover mb-0 parent_list chatcusur" id="complex_header">
                   <thead>
                     <tr>
                       <th class="text-center">S.No.</th>
                       <th class="text-center">Blog Title</th>
                       <th class="text-center">Description</th>
                       <th class="text-center">Featured Image </th>
                       <th class="text-center">Tags </th>
                       <th class="text-center"> </th>
                     </tr>
                   </thead>
                   <tbody>
                   	<?php if(isset($b_list) && (count($b_list)> 0 )){ 
												    $i =1;
			       foreach($b_list as $val){ ?>    
                       
                       
                     <tr>
                     	<td class="text-center"> <?= $i ?></td>
                       <td class="text-center">
                        <?= $val->title ?>
                         
                       </td>
                       <td class="text-center ">
                          <?= $val->description ?>
                       </td>

                       <td class="text-center">
                         <img src="<?= ($val->featured_Image)? base_url('assets/blog/').$val->featured_Image : 'https://st2.depositphotos.com/3508093/9245/i/950/depositphotos_92459776-stock-photo-group-of-pre-school-children.jpg'?>" class="imgblog">
                       </td>
                       <td class="text-center"> <?= $val->tags ?></td>
                       <td>
                         <div class="btn-group">
									  <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon ti-settings"></i>Options</button>
									  <div class="dropdown-menu dropdown-menu-end" style="">
										<a class="dropdown-item" href="<?= base_url('Blog/blog_add/').$val->blog_id ?>" data = " <?= $val->blog_id ?>" ><i class="fa fa-pencil"></i> View / Edit</a>
										<a class="dropdown-item warning_mess" href="#"  data = "<?= $val->blog_id ?>" ><i class="fa fa-trash-o"></i> Delete</a>
									 </div>
									</div>
                       </td>
                     </tr> 
                  <?php $i++; }} ?>  
                   
                    
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
 <?php include ('include/footer.php'); ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script  src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
        <script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>       
        <script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>
 <script>
      //Warning Message                               
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
            window.location.href = "<?= base_url('Blog/delete_blog/') ?>"+id;
            
        });
    });
 </script>




