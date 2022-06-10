 <?php include ('include/header.php'); ?> 
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="w-100s">
					<h4 class="page-title dropChnage">
						<select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
					  	<option>Sun Room (A)</option>
					  	<option>Sun Room (B)</option>
					  	<option>Ck Room (A)</option>
					  	<option>Ck Room (B)</option>
					  	<option>Dk Room (A)</option>
					  	<option>DK Room (B)</option>
					   </select>
					</h4>
					<div class="haff-widgets">
						<a href="#" class="btn btn-success mt-10 waves-effect"><i class="fa fa-cog" aria-hidden="true"></i> Room Settings</a>
						<a href="<?= base_url('Student') ?>" class="btn btn-primary mt-10 waves-effect">+ New Students</a>
						</div>
				</div>				
			</div>
		</div>
  	<!-- Main content -->
	<section class="content">
		<div class="row mt-4">
			<div class="col-lg-12">
				<div class="tabls-title">
         <a href="room_detail.php" class="active">Students</a>
         <a href="rooms_parent.php" class="">Parents</a>
         <a href="room_feed.php" class="">Feed</a>

       </div>
			</div>
		</div>
			<form>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
						<div class="row">
						<div class="col-lg-5 col-md-4 col-sm-6">
						<select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Student's Name" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
					  	<option>Aayush</option>
					  	<option>Abhishek</option>
					  	<option>Jiyansh</option>
					  	<option>Arpit</option>
					  	<option>Punit Joshi</option>
					  	<option>Pusphak</option>
					  	<option>Virendra</option>
					  </select>
						</div>
						<div class="col-lg-5 col-md-4 col-sm-6">
						<select multiple class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Select Student's Status" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
					  	<option>Prospect</option>
					  	<option>Applied</option>
					  	<option>Waitlist</option>
					  	<option>Toured</option>
					  	<option>Enrolled</option>
					  	<option>Active</option>
					  	<option>Inactive</option>
					  </select>
						</div>
                      <div class="col-lg-2 col-md-4 col-sm-6">
						<button type="Submit" class="btn btn-primary waves-effect mt-5">Apply</button>
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
										<tr>
											<td colspan="3">
												<div class="row align-items-center w-100s">
											<div class="col-lg-6">
												<div class="student_list">
													<a href="#">
														<div class="avtar_img">
														    
                                                          <img src="assets_pages/images/avatar.png">
														</div>
														<div class="info_title">
															<h5>Amit</h5>
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
										</tr><tr>
											<td colspan="3">
												<div class="row align-items-center w-100s">
											<div class="col-lg-6">
												<div class="student_list">
													<a href="#">
														<div class="avtar_img">
                                                          <img src="assets_pages/images/avatar.png">
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
										</tr><tr>
											<td colspan="3">
												<div class="row align-items-center w-100s">
											<div class="col-lg-6">
												<div class="student_list">
													<a href="#">
														<div class="avtar_img">
                                                          <img src="assets_pages/images/avatar.png">
														</div>
														<div class="info_title">
															<h5>Ajay</h5>
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
										</tr>
										<tr>
											<td colspan="3">
												<div class="row align-items-center w-100s">
											<div class="col-lg-6">
												<div class="student_list">
													<a href="#">
														<div class="avtar_img">
                                                          <img src="assets_pages/images/avatar.png">
														</div>
														<div class="info_title">
															<h5>Shubham</h5>
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
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php include ('include/footer.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
     <script  src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
     <script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>       
    <script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>
    <script>
   $('.myschool').addClass('active');
   $('.rooms').addClass('active');
 </script>