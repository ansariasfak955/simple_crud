<?php include ('include/header.php'); ?> 
 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="w-100s">
					<h4 class="page-title">Events</h4>
					<div class="haff-widgets">
						<a href="<?= base_url('Event/event_add') ?>" class="btn btn-primary mt-10 waves-effect">+ Add Event</a>
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
                       <th class="text-center">Date</th>
                       <th class="text-center">Duration</th>
                       <th class="text-center">Event Title</th>      
                       <th class="text-center">Description</th>
                       <th class="text-center">Event Fees</th>
                       <th class="text-center"> </th>
                     </tr>
                   </thead>
                   <tbody>
                   <?php $i = 0; if(!empty($event)) { foreach($event as $row) {?>
                     <tr>
                     	<td class="text-center"><?php echo $i + 1; ?></td>
                       <td class="text-center">
                       <?php echo $row['date']?>     
                       </td>
                       <td class="text-center">
                       <?php echo $row['ftime']."-".$row['totime']?> 
                       </td>

                       <td class="text-center ">
                       <?php echo $row['title']?>
                       </td>  

                       <td class="text-center ">
                       <?php echo $row['description']?>
                       </td>

                       <td class="text-center "><?php echo $row['fees']?></td>

                       
                       <td>
                         <div class="btn-group mt-2 mb-2">
									  <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon ti-settings"></i>Options</button>
									  <div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="<?php echo base_url().'Event/edit/'.$row['id']?>"><i class="fa fa-pencil"></i> View / Edit</a>
										<a class="dropdown-item sa-warning" href="<?php echo base_url().'Event/deleteEvent/'.$row['id']?>"><i class="fa fa-trash-o"></i> Delete</a>
									 </div>
                   <a class="btn btn-dark rounded" type="button" href="<?php echo base_url().'Event/get/'.$row['id']?>" aria-expanded="false">participate</a>
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
