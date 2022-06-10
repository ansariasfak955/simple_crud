<?php include ('include/header.php'); ?>
<style type="text/css">
  .table>tbody>tr>td,
  .table>tbody>tr>th {
    padding: 1rem !important;
  }

  .table>tbody>tr>td a {
    font-size: 15px;
    transition: 0.1s;
    color: black;
  }

  .table>tbody>tr>td:hover a {
    color: #3774a7;
    text-decoration: underline;
  }

</style>
<div class="content-wrapper">
  <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="tabls-title mt-1">
         <a href="<?= base_url('Learning') ?>" class="">Review</a>
         <a href="<?= base_url('Learning/lesson_plans') ?>" class="">Lesson Plans</a>
         <a href="<?= base_url('Learning/lessons') ?>" class="active">Lessons</a>
      </div>
     <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title newtittle">Lesson</h4>

           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">
           <a href="<?= base_url('Learning/new_lesson') ?> " class="btn btn-primary mt-10 waves-effect shadow">+ New Lesson</a>
           </div>
         </div>
       </div>
    </div>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-12">
          
            <div class="card">
              <div class="card-body">
                <form action="" method="">
                <div class="row">
                  <div class="col-lg-4">
                    <input type="search" name="" class="ht-40 form-control" placeholder="Search..">
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
                    <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Room">
                      <option disabled="">Room</option>
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
                  <div class="col-lg-3 mb-3">
                    <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Location">
                      <option disabled="">Location</option>
                      <option>Indoors</option>
                    </select>
                  </div>
                  <div class="col-lg-3 mb-3">
                    <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Group Size">
                      <option disabled="">Group Size</option>
                      <option>Individual</option>
                      <option>Small Group</option>
                      <option>Medium Group</option>
                      <option>Large Group</option>
                    </select>
                  </div>
                <div class="col-lg-1 col-md-4 col-sm-6 mt--1">
                 <button type="submit" class="btn btn-primary mt-5 waves-effect shadow mr-3 mt-20">Apply</button>
                        
                      </div>
                </div>
                  </form>
              </div>
            </div>
                 <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive padding">
                      <table class="table table-hover mb-0 parent_list" id="complex_header">
                        <thead>
                          <tr>
                            <th>Lesson</th>
                            <th>Description </th>
                            <th>AGE</th>
                            <th>LOCATION</th>
                            <th>GROUP SIZE</th>
                          </tr>
                        </thead>

                        <tbody>

                          <tr>
                            <td class="w40">
                              <a href="#">Dance Party</a>
                            </td>
                            <td class="">
                              <a href="#">Use your family's favorite music, or YouTube to create your own dance party.</a>
                            </td>
                            <td class="">
                              <a href="#">From 36 months</a>
                            </td>
                            <td class="">
                              <a href="#">Indoors</a>
                            </td>
                            <td class="">
                              <a href="#">No group size</a>
                            </td>
                          </tr>


                          <tr>
                            <td class="w40">
                              <a href="#">Red Light, Green Light</a>
                            </td>
                            <td class="">
                              <a href="#">Follow simple instructions, learn colors, and get moving!</a>
                            </td>
                            <td class="">
                              <a href="#">From 36 months</a>
                            </td>
                            <td class="">
                              <a href="#">Indoors</a>
                            </td>
                            <td class="">
                              <a href="#">No group size</a>
                            </td>
                          </tr>

                          <tr>
                            <td class="w40">
                              <a href="#">Balancing</a>
                            </td>
                            <td class="">
                              <a href="#">Help your child practice balancing with a safe and simple activity.</a>
                            </td>
                            <td class="">
                              <a href="#">From 36 months</a>
                            </td>
                            <td class="">
                              <a href="#">Indoors</a>
                            </td>
                            <td class="">
                              <a href="#">No group size</a>
                            </td>
                          </tr>

                          <tr>
                            <td class="w40">
                              <a href="#">Bowling</a>
                            </td>
                            <td class="">
                              <a href="#">Make a simple bowling alley to explore cause, effect, and coordination. </a>
                            </td>
                            <td class="">
                              <a href="#">From 36 months</a>
                            </td>
                            <td class="">
                              <a href="#">Indoors</a>
                            </td>
                            <td class="">
                              <a href="#">No group size</a>
                            </td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
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
<!-- Modal -->


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
  $('.learnings').addClass('active');
</script>