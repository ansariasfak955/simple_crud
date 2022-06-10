<?php include ('include/header.php'); ?> 
 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="w-100s">
					<h4 class="page-title">Participate Student</h4>
					<div class="haff-widgets">
						<a href="<?= base_url('Event/index/') ?>" class="btn btn-primary mt-10 waves-effect">Back</a>
						</div>
				</div>				
			</div>
		</div>
  	<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-body">
                       <table class="table table-hover mb-0 parent_list chatcusur" id="complex_header">
                   <thead>
                     <tr>
                       <th class="text-center">S.No.</th>
                       <th class="text-center">Student Name </th>
                       <th class="text-center">Event Id</th>
                       <th class="text-center"> </th>
                       
                     </tr>
                   </thead>
                   <tbody>
				   <?php $i = 0; if(!empty($event_join_student)) { foreach($event_join_student as $row) {?>
                     <tr>
                     	<td class="text-center"><?php echo $i + 1;?></td>
                       <td class="text-center">
                           <?php echo $row['name']?>
                       </td>
                       <td class="text-center">
					   <?php echo $row['event_id']?>
                        </td> 


                       
                       <td>
                         <div class="btn-group mt-2 mb-2">
								<button class="btn btn-dark rounded" type="button" href="#" aria-expanded="false"><?php echo date('Y:m:d', strtotime('created_at'))?></button>   
						</div>
                       </td>
                     </tr>  
					 <?php $i++; } } else {?>
                    <tr>
                        <td colspan="5">Records not found</td>
                    </tr>
                    <?php } ?>
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
