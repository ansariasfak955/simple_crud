 <?php include ('include/header.php'); ?>
 <style>
   .table > tbody > tr > td, .table > tbody > tr > th {
    padding: 1rem !important;
    text-transform: capitalize;
}
 </style>
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="tabls-title mt-1">
        <a href="<?= base_url('Admissions') ?>" class="">Dashboard</a>
         <a href="<?= base_url('Admissions/admissions_from_requests') ?>" class="">Forms & Requests</a>
         <a href="<?= base_url('Admissions/addmission_waitlists') ?>" class="">Waitlists</a>
         <a href="<?= base_url('Admissions/programs') ?>" class="active">Programs</a>
            
       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title">Programs</h4>

           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">

             <a href="<?= base_url('Admissions/programs_add') ?>" class="btn btn-primary mt-10 waves-effect shadow">+ New Program</a>
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
                       <th>Program Name</th>
                       <th>Description</th>
                       <th>Max Capacity </th>
                       <th>Min/Max Age </th>
                       <th>Start Date </th>
                       <th>End Date</th>
	                     </tr>
                     </thead>
                 
                   <tbody>
                         <?php   if(isset($list) && count($list)>0 ){ 
                                        foreach($list as $val){ ?>
                   <tr>
                    <td><a href="<?= base_url('Admissions/programs_add/').$val->program_id ?>"><?= $val->name ?></a></td>
                    <td><?= $val->description ?></td>
                    <td><?= $val->max_occupancy ?></td>
                    <td><?= $val->min_age.' year - '.$val->max_age.' year' ?> </td>
                    <td><?= date('d-m-Y',strtotime($val->start_date)) ?></td>
                    <td><?= date('d-m-Y',strtotime($val->end_date))  ?></td>
                    </tr> 
                   <?php }} ?>
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
 <!-- /.modal -->
 <?php include ('include/footer.php'); ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
 <script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>
