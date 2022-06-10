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
          <a href="<?= base_url('Staff') ?>" class="active">Staff</a>                                
         <a href="<?= base_url('Staff/staff_timecards') ?>" class="">Timecards</a>
         <a href="<?= base_url('Staff/staff_payroll') ?>" class="">Payroll</a>
                                                       
       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title">Staff List</h4>

           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">

             <a href="#" class="btn btn-primary mt-10 waves-effect shadow" data-bs-toggle="modal" data-bs-target="#add_staff">+ Add Staff</a>
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
               <div class="table-responsive">
                 <table class="table table-hover mb-0 parent_list" id="complex_header">
                   <thead>
                     <tr>
                       <th>STAFF</th>
                       <th>EMAIL</th>
                       <th>ADMIN PRIVILEGES	</th>
                       <th  class="text-center">STATUS</th>
                     
	                     </tr>
                   </thead>
                  
                   <tbody>
                        	<?php if(isset($staff_list) && count($staff_list) >0){
									    foreach($staff_list as $val){ ?>
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
                       <td><h5><?= $val->email ?></h5></td>
                       <td class="text-center">--</td>
                       <td class="text-center"><h5>Signed up</h5></td>
                       <td class="text-center">
                       	
                    
                       <div class="btn-group">
									  <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"><i class="icon ti-settings"></i>Options</button>
									  <div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="<?= base_url('Staff/staff_profile/').$val->user_id ?>"><i class="fa fa-pencil"></i> View / Edit</a>
										<a class="dropdown-item" href="<?= base_url('Staff/delete_staff/').$val->user_id ?>"><i class="fa fa-trash-o"></i> Delete</a>
									 </div>
									</div>
									</div>
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
 <!-- Modal -->
 <div class="modal center-modal fade add_parent" id="add_staff" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content">                                  
       <div class="modal-header">
         <h5 class="modal-title">Add Staff</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>                                  
       <div class="modal-body">                                                     
         <form action="<?= base_url('Staff/add_staff') ?>" method="post">
          <div class="form-floating mb-3">                                    
             <input type="text" class="form-control" name="fname" required>
             <label for="fistname">First Name</label>
           </div>
           <div class="form-floating mb-3">
             <input type="text" class="form-control" name="lname" required>
             <label for="lastname">Last Name</label>
           </div>
           <div class="form-floating mb-3">
             <input type="text" class="form-control" name="email" required>
             <label for="emailaddres">Email Address</label>
           </div>
            <div class="form-floating mb-3">
             <input type="tel" class="form-control" id="edit_mobile"  maxlength="10"  name="mobile" title="Please use a 10 digit telephone number" 
                    pattern="[0-9]{10}" required  >
             <label for="pnumber">Mobile Phone</label>
           </div>
           <div class="mt-4s">
             <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Add New Staff</button>
           </div>
         </form>
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
