 <?php include ('include/header.php'); ?>
 <style type="text/css">

 </style>
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="tabls-title mt-1">
         <a href="<?= base_url('Learning') ?>" class="active">Review</a>
         <a href="<?= base_url('Learning/lesson_plans') ?>" class="">Lesson Plans</a>
         <a href="<?= base_url('Learning/lessons') ?>" class="">Lessons</a>
       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title newtittle"> Learning Review</h4>
           <p class="mb-0 mt-1">A summary of student learning progress by learning framework</p>
           
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content studnet_learning">
      
       <div class="row">
         <div class="col-12">
           <form>
             <div class="row">
               <div class="col-lg-12">
                 <div class="card">
                   <div class="card-body">
                     <div class="row align-items-center">
                       
                     <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                         <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Search students..." data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false">
                           <option disabled="">Search students...</option>
                           <option>Aayush</option>
                           <option>Abhishek</option>
                           <option>Jiyansh</option>
                         </select>
                       </div> 

                       <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                          <select multiple="" class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Select Student's Status" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false">
                           <option disabled="">Select Student's Status</option>
                           <option>Prospects</option>
                           <option>Toured</option>
                           <option>Applied</option>
                           <option>Waitlist</option>
                           <option>Enrolled</option>
                           <option>Graduated</option>
                           <option>Duplicate</option>
                         </select>
                       </div> 

                         <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                          <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Select Room" data-hide-disabled="true" data-actions-box="false" data-virtual-scroll="false">
                            <option disabled="">Select Room</option> 
                           <option>All</option>
                           <option>Demo Room </option>
                           <option>Demo Room 1</option>
                           <option>Demo Room 2</option>
                         </select>
                       </div>

                         <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                          <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Framework" data-hide-disabled="false" data-actions-box="false" data-virtual-scroll="false">
                            <option disabled="">Framework</option> 
                           <option>Alabama - Preschool (2012)</option>
                           <option>Arizona - Preschool</option>
                           <option>Early Learning</option>
                         </select>
                       </div>  

                       <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                          <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Domain" data-hide-disabled="false" data-actions-box="false" data-virtual-scroll="false">
                            <option disabled="">Domain</option> 
                            <option>All</option> 
                           
                         </select>
                       </div>

                      <div class="col-lg-1 col-md-4 col-sm-6 mt--1">
                         <button type="submit" class="btn btn-primary mt-5 waves-effect shadow mr-3 mr--1">Apply</button>
                        
                      </div> 
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </form>
         </div>
       </div>

       <div class="row">
         <div class="col-12">
           <div class="box">
             <div class="box-body">
              <div class="text-end  mb-3">
                 <button type="button" class="btn btn-light mr-3 shadow" data-bs-toggle="modal" data-bs-target="#export_cart"><i class="fad fa-download"></i> Export</button>
              </div>
               <div class="table-responsive">
                 <table class="table table-hover mb-0 parent_list" id="">
                   <thead>
                     <tr>
                       <th></th>
                       <th class="text-center" data-bs-toggle="tooltip" data-bs-original-title="Arts">ART</th>
                       <th class="text-center" data-bs-toggle="tooltip" data-bs-original-title="Cognitive">COG</th>
                       <th class="text-center" data-bs-toggle="tooltip" data-bs-original-title="Communication">COM</th>
                       <th class="text-center" data-bs-toggle="tooltip" data-bs-original-title="Fine Motor">FM</th>
                       <th class="text-center" data-bs-toggle="tooltip" data-bs-original-title="Gross Motor">GM</th>
                       <th class="text-center" data-bs-toggle="tooltip" data-bs-original-title="Literacy">LIT</th>
                       <th class="text-center" data-bs-toggle="tooltip" data-bs-original-title="Social & Emotional">SE</th>
                       <th class="text-center" data-bs-toggle="tooltip" data-bs-original-title="STEM">STEM</th>
                     </tr>
                   </thead>

                   <tbody>
                    <tr>
                    <td class="br-style"><div class="student_list">
                          <a href="student_learning.php">
                            <div class="avtar_img">
                            <img src="assets/images/avatar.png">
                            </div>
                            <div class="info_title">
                              <h5>Sumit</h5>
                            </div>
                          </a>
                        </div>
                      </td>
                      <td class="text-center br-style"><h6>20</h6></td>
                      <td class="text-center br-style"><h6>60</h6></td>
                      <td class="text-center br-style"><h6>40</h6></td>
                      <td class="text-center br-style"><h6>50</h6></td>
                      <td class="text-center br-style"><h6>80</h6></td>
                      <td class="text-center br-style"><h6>76</h6></td>
                      <td class="text-center br-style"><h6>56</h6></td>
                      <td class="text-center"><h6>14</h6></td>
                      </tr>
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
<!-- Modal -->
 <div class="modal  invite_modal fade add_parent" id="export_cart" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Please provide an email address</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fad fa-times-circle"></i></button>
       </div>
       <div class="modal-body">
        <form>
          <div class="form-floating mb-3">
             <input type="email" class="form-control" id="start" placeholder="name@example.com" name="email" value="">
            <label class="email" for="start">Email Address</label>
          </div>
        </form>
              <div class="mt-4s text-right">
             <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
             <button type="submit" class="btn btn-dark shadow">Send</button>
           </div>
       </div>
     </div>
   </div>
 </div>
 <!-- /.modal -->

 <!-- /.modal -->
 <?php include ('include/footer.php'); ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="assets_pages/js/bootstrap-select.js"></script>
 <script src="assets_pages/vendor_components/datatable/datatables.min.js"></script>
 <script src="assets_pages/src/js/pages/data-table.js"></script>
 <script src="assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script src="assets_pages/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

 <script type="text/javascript">
   function toggle(source) {
      checkboxes = document.getElementsByName('checkboxx');
      for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
      }
    }
 </script>

