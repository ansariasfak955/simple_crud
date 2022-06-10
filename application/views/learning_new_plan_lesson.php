 <link rel="stylesheet" type="text/css" href="assets_pages/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="assets_pages/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
 <?php include ('include/header.php'); ?>
 <style type="text/css">
   .table>tbody>tr>td,
   .table>tbody>tr>th {
    padding: 0.5rem 0.7rem !important;
    text-align:left;
   }
 </style>
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="tabls-title mt-1">
         <a href="<?= base_url('Learning') ?>" class="">Review</a>
         <a href="<?= base_url('Learning/lesson_plans') ?>" class="">Lesson Plans</a>
         <a href="<?= base_url('Learning/lessons') ?>" class="">Lessons</a>
       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title newtittle">New Lesson Plan</h4>

           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">

             <a href="<?= base_url('Learning/lesson_plans') ?>" class="btn btn-primary mt-10 waves-effect shadow"><i class="fa-regular fa-angles-left" ></i> Return to all lesson plans</a>
           </div>
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content newstudnet_lesstion">

       <div class="row">
         <div class="col-12">
           <form>
             <div class="row">
               <div class="col-lg-12">
                 <div class="card">
                   <div class="card-body">
                     <div class="row align-items-center">

                       <div class="col-lg-3 col-md-4 col-sm-6 mb-3">

                         <div class="form-floating">
                           <input type="text" class="form-control" id="lessonname" placeholder="name@example.com" name="lessonname">
                           <label for="lessonname">Lesson Plan Name</label>
                         </div>

                       </div>


                       <div class="col-lg-3 col-md-4 col-sm-6 mb-3">


                         <div class="formsetting mb-3">

                           <label for="homeroom" style="margin-bottom: -8px;">Select Room</label>
                           <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" title="Select...">
                             <option selected="">Demo-1</option>
                             <option>Demo-2</option>
                             <option>Demo-3</option>
                             <option>Demo-4</option>
                           </select>
                         </div>
                       </div>
                       <div class="col-lg-3 col-md-4 mycheckboxdiv  col-sm-6">
                         <div class="form-floating mb-3">
                           <input type="date" class="form-control" id="start" placeholder="name@example.com" name="start" value="">
                           <i class="fad fa-calendar-alt"></i>
                           <label class="sdatel" for="start">Week Of</label>
                         </div>
                       </div>

                       <div class="col-lg-4 toggleDiv">

                         <label for="weekdays" class="weekdays1 switch switch-border switch-danger mr--1">
                           <input type="checkbox" name="" id="weekdays">
                           <span class="switch-indicator"></span>
                           <span class="switch-description"></span>
                           <h5 class="mt-3">Weekdays only</h5>
                         </label>

                         <label class="switch switch-border switch-danger">

                           <input type="checkbox" name="" id="">
                           <span class="switch-indicator"></span>
                           <span class="switch-description"></span>
                           <h5 class="mt-3">Share with parents</h5>

                         </label>
                       </div>

                     </div>
                   </div>
                 </div>
               </div>
             </div>

             <div class="card">
               <div class="card-body">
                 <div class="newlesstion weekend">
                   <div class="row bg1">
                     <div class="col2 sunday">
                       <h5>Sunday</h5>
                     </div>
                     <div class="col2">
                       <h5>Monday</h5>
                     </div>
                     <div class="col2">
                       <h5>Tuesday</h5>
                     </div>

                     <div class="col2">
                       <h5>Wednesday</h5>
                     </div>
                     <div class="col2">
                       <h5>Thursday</h5>
                     </div>
                     <div class="col2">
                       <h5>Friday</h5>
                     </div>
                     <div class="col2 saturday">
                       <h5>Saturday</h5>
                     </div>
                   </div>
                   <div class="row bg2">
                     <div class="col2 sunday">
                       <textarea class="form-control" name="sunday" id="sunday" placeholder="Daily Theme or Note"></textarea>
                     </div>

                     <div class="col2">
                       <textarea class="form-control" name="monday" id="monday" placeholder="Daily Theme or Note"></textarea>
                     </div>

                     <div class="col2">
                       <textarea class="form-control" name="tuesday" id="tuesday" placeholder="Daily Theme or Note"></textarea>
                     </div>

                     <div class="col2">
                       <textarea class="form-control" name="wednesday" id="wednesday" placeholder="Daily Theme or Note"></textarea>
                     </div>

                     <div class="col2">
                       <textarea class="form-control" name="thursday" id="thursday" placeholder="Daily Theme or Note"></textarea>
                     </div>

                     <div class="col2">
                       <textarea class="form-control" name="friday" id="friday" placeholder="Daily Theme or Note"></textarea>
                     </div>

                     <div class="col2 saturday">
                       <textarea class="form-control" name="saturday" id="saturday" placeholder="Daily Theme or Note"></textarea>
                     </div>
                   </div>

                   <div id="student_Add" class="weekend">

                   </div>

                   <div class="row bg3">
                     <div class="col-lg-4 text-left p-0">
                       <button type="button" class="btn btn btn-link waves-effect" id="addBtn">+ Category Row</button>
                     </div>
                   </div>
                 </div>

                 <div class="row mt-4">
                   <div class="col-lg-8">
                     <div class="forms-floating mb-3">
                       <label for="newstitle">WEEKLY NOTE</label>
                       <textarea class="" id="" placeholder="" name="" rows="4"></textarea>
                     </div>
                   </div>
                   <div>
                     <a href="#" class="btn-line-remove">Delete Lesson Plan</a>
                   </div>
                 </div>
                     <div class="mt-4s text-right">
           <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-dark shadow">Save</button>
         </div>

               </div>
             </div>

           </form>
         </div>
       </div>


     </section>
     <!-- /.content -->
   </div>
 </div>
 <!-- Modal -->

 <!-- Modal -->
 <div class="modal  invite_modal fade modal_lessaon" id="add_lesstin" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title fs-24">Add Lesson</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fad fa-times-circle"></i></button>
       </div>
       <div class="modal-body">
         <form>
           <div class="row">
             <div class="col-lg-4">
               <input type="search" name="" class="ht-40 form-control" placeholder="search">
             </div>
             <div class="col-lg-4 mb-3">
               <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Category">
                 <option disabled="">Category</option>
                 <option>STEM</option>
                 <option>Social & Emotional</option>
                 <option>Literacy</option>
                 <option>Gross Motor</option>
                 <option> Fine Motor</option>
                 <option> Communication</option>
                 <option> Arts</option>
               </select>
             </div>
             <div class="col-lg-4 mb-3">
               <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Category">
                 <option disabled="">Category</option>
                 <option>Demo-2</option>
                 <option>Demo-3</option>
                 <option>Demo-4</option>
               </select>
             </div>
             <div class="col-lg-2 mb-3">
               <input type="number" name="" class="ht-40 form-control" placeholder="Age From">
             </div>
             <div class="col-lg-2 mb-3">
               <input type="number" name="" class="ht-40 form-control" placeholder="Age To">
             </div>
             <div class="col-lg-4 mb-3">
               <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Location">
                 <option disabled="">Location</option>
                 <option>Indoors</option>
               </select>
             </div>
             <div class="col-lg-4 mb-3">
               <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Group Size">
                 <option disabled="">Group Size</option>
                 <option>Individual</option>
                 <option>Small Group</option>
                 <option>Medium Group</option>
                 <option>Large Group</option>
               </select>
             </div>
           </div>
           <div class="row overflow_div">
             <div class="col-12">
               <div class="table-responsive padding">
                 <table class="table table-hover mb-0 parent_list" id="complex_header">
                   <thead>
                     <tr>
                       <th>Lesson</th>
                       <th>Description </th>
                       <th>AGE</th>
                       <th></th>
                     </tr>
                   </thead>

                   <tbody>

                     <tr>
                       <td class="w25">
                         <h5>Dance Party</h5>
                       </td>
                       <td class="w65">
                         <h5 >Use your family's favorite music, or YouTube to create your own dance party.</h5>
                       </td>
                       <td class="w15">
                         <h5 >From 36 months</h5>
                       </td>
                       <td class="addbutton">
                         <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                       </td>
                     </tr>

                     <tr>
                       <td class="w25">
                         <h5 >Red Light, Green Light</h5>
                       </td>
                       <td class="w65">
                         <h5 >Follow simple instructions, learn colors, and get moving!</h5>
                       </td>
                       <td class="w15">
                         <h5>From 36 months</h5>
                       </td>
                       <td class="addbutton">
                         <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                       </td>
                     </tr>

                     <tr>
                       <td class="w25">
                         <h5 >Balancing</h5>
                       </td>
                       <td class="w65">
                         <h5 >Help your child practice balancing with a safe and simple activity.</h5>
                       </td>
                       <td class="w15">
                         <h5>From 36 months</h5>
                       </td>
                       <td class="addbutton">
                         <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                       </td>
                     </tr>

                     <tr>
                       <td class="w25">
                         <h5 >Bowling</h5>
                       </td>
                       <td class="w65">
                         <h5 >Make a simple bowling alley to explore cause, effect, and coordination. </h5>
                       </td>
                       <td class="w15">
                         <h5>From 36 months</h5>
                       </td>
                       <td class="addbutton">
                         <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                       </td>
                     </tr>

                     <tr>
                       <td class="w25">
                         <h5 >Sink and Float</h5>
                       </td>
                       <td class="w65">
                         <h5 >Discover what sinks, what floats and practice making predictions.</h5>
                       </td>
                       <td class="w15">
                         <h5>From 36 months</h5>
                       </td>
                       <td class="addbutton">
                         <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                       </td>
                     </tr>

                     <tr>
                       <td class="w25">
                         <h5 >Water and Bubbles</h5>
                       </td>
                       <td class="w65">
                         <h5 >Explore water and bubbles with this simple water activity.</h5>
                       </td>
                       <td class="w15">
                         <h5>From 36 months</h5>
                       </td>
                       <td class="addbutton">
                         <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                       </td>
                     </tr>


                     <tr>
                       <td class="w25">
                         <h5 >Explore Textures</h5>
                       </td>
                       <td class="w65">
                         <h5>Use different sized cups and materials to explore how different household items feel and sound.</h5>
                       </td>
                       <td class="w15">
                         <h5 >From 36 months</h5>
                       </td>
                       <td class="addbutton">
                         <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                       </td>
                     </tr>


                   </tbody>
                 </table>
               </div>
             </div>
           </div>
      <!--    <div class="mt-4s text-right">
           <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-dark shadow">Submit</button>
         </div> -->
         </form>
       
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
 <script>
   $(document).ready(function() {
     $('#weekdays').click(function() {
       $('.weekend').toggleClass('weekend_hide');
     });
   });

 </script>
 <script type="text/javascript">
   //Date picker
   $('#datepicker').datepicker({
     autoclose: true
   });

 </script>

 <script>
   $(document).ready(function() {
     var rowIdx = 4;
     $('#addBtn').on('click', function() {
       $('#student_Add').append(`<div id="R${++rowIdx}">
         <div id="remove" class="mt-0">
         <div class="row bg4">
              <div class="col-lg-6 col-md-4 col-sm-6">
                          <select class="selectnew">
                            <option disabled="" selected>Select or Type to Add</option> 
                           <option>Music & Movement</option>
                           <option>Science & Sensory</option>
                           <option>Social Emotional</option>

                 </select>
               </div>
               <div class="col-lg-6 text-right">
                  <a href="#" class="remove btn-line-remove"><i class="fad fa-times"></i>&nbsp;Remove</a>
               </div>
              </div>
               <div class="row bg2">
             <div class="col2 sunday">
              <textarea class="form-control" name="sunday" id="sunday" placeholder="Add Description"></textarea>
              <div class="btn-add-line">
              <a href="#" class="btn-line" data-bs-toggle="modal" data-bs-target="#add_lesstin">Add Lesson</a>
              </div>
             </div> 

             <div class="col2">
              <textarea class="form-control" name="monday" id="monday" placeholder="Add Description"></textarea>
           <div class="btn-add-line">
              <a href="#" class="btn-line" data-bs-toggle="modal" data-bs-target="#add_lesstin">Add Lesson</a>
              </div>
             </div> 

              <div class="col2">
              <textarea class="form-control" name="tuesday" id="tuesday" placeholder="Add Description"></textarea>
             <div class="btn-add-line">
              <a href="#" class="btn-line" data-bs-toggle="modal" data-bs-target="#add_lesstin">Add Lesson</a>
              </div>
             </div> 

             <div class="col2">
              <textarea class="form-control" name="wednesday" id="wednesday" placeholder="Add Description"></textarea>
             <div class="btn-add-line">
              <a href="#" class="btn-line" data-bs-toggle="modal" data-bs-target="#add_lesstin">Add Lesson</a>
              </div>
             </div> 

              <div class="col2">
              <textarea class="form-control" name="thursday" id="thursday" placeholder="Add Description"></textarea>
             <div class="btn-add-line">
              <a href="#" class="btn-line" data-bs-toggle="modal" data-bs-target="#add_lesstin">Add Lesson</a>
              </div>
             </div>

              <div class="col2">
              <textarea class="form-control" name="friday" id="friday" placeholder="Add Description"></textarea>
             <div class="btn-add-line">
              <a href="#" class="btn-line" data-bs-toggle="modal" data-bs-target="#add_lesstin">Add Lesson</a>
              </div>
             </div> 

              <div class="col2 saturday">
              <textarea class="form-control" name="saturday" id="saturday" placeholder="Add Description"></textarea>
             <div class="btn-add-line">
              <a href="#" class="btn-line" data-bs-toggle="modal" data-bs-target="#add_lesstin">Add Lesson</a>
              </div>
             </div> 
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

 </script>

  <script>
  $('.learnings').addClass('active');
</script>
