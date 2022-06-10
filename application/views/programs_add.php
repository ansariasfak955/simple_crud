<?php include ('include/header.php'); ?>
<div class="content-wrapper">
  <div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <form  action = "<?= base_url('Admissions/class_add') ?>" method="post" >
        <div class="row parentlist justify-content-center">
            
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
          <div class="col-lg-10">
            <div class="card">
              <div class="card-body">
                <h4 class="page-title page-modals"><i class="fad fa-chart-network"></i> <?= isset($pro_data[0]->name)? 'Update' :'New' ?> Program</h4>
                <h5 class="pstyle"><a href="<?= base_url('Admissions/programs') ?>" class="btn btn-primary mt-10 waves-effect shadow mb-4"><i class="fa-regular fa-angles-left" style="margin-right: 8px;"></i>Back</a> </h5>
                
                <div class="row">
                  <div class="col-lg-12 col-md-4 col-sm-6">
                    <div class="row p-4 pb-0">
                  <div class="col-lg-6">
                      <div class="form-floating mb-3">
                     <input type="text" class="form-control"  name="program_name" value="<?= isset($pro_data[0]->name)? $pro_data[0]->name :'' ?>">
                        <label for="program">Program Name</label>
                       </div>
                  </div>
                    <input type="hidden" name = 'program_id' value = "<?= isset($pro_data[0]->program_id)? $pro_data[0]->program_id :'' ?>" ?>
                  <div class="col-lg-6">
                      <div class="form-floating mb-3">
                     <input type="number" class="form-control" name="capacity" value="<?= isset($pro_data[0]->max_occupancy)? $pro_data[0]->max_occupancy :'' ?>" >
                        <label for="capacity">Max capacity</label>
                       </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="form-floating mb-4">
                     <input type="text" class="form-control" id="description" name="description" autocomplete="off" value="<?= isset($pro_data[0]->description)? $pro_data[0]->description :'' ?>" >
                        <label for="description">Description</label>
                       </div>
                  </div>

                  

                   <div class="col-lg-6 mb-3">
                    <div class="formsetting mb-3">
                      <label class="">Min age</label>
                     <select  class=" form-control" id="minage" data-container="body" data-live-search="true" title="Select.." data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" name="minage">
                        <option disabled="">Min age</option>
                        <option <?= (isset($pro_data[0]->min_age) && ($pro_data[0]->min_age == 1)) ? 'selected' :'' ?>   value = '1' >1year</option>
                        <option <?= (isset($pro_data[0]->min_age) && ($pro_data[0]->min_age == 2)) ? 'selected' :'' ?>  value = '2' >2year</option>
                        <option <?= (isset($pro_data[0]->min_age) && ($pro_data[0]->min_age == 3)) ? 'selected' :'' ?>  value = '3' >3year</option>
                        <option <?= (isset($pro_data[0]->min_age) && ($pro_data[0]->min_age == 4)) ? 'selected' :'' ?>  value = '4' >4year</option>
                        <option <?= (isset($pro_data[0]->min_age) && ($pro_data[0]->min_age == 5)) ? 'selected' :'' ?>  value = '5' >5year</option>
                         <option <?= (isset($pro_data[0]->min_age) && ($pro_data[0]->min_age ==6)) ? 'selected' :'' ?>  value ='6' >6year</option>
                        <option <?= (isset($pro_data[0]->min_age) && ($pro_data[0]->min_age == 7)) ? 'selected' :'' ?>  value  ='7' >7year</option>
                        <option <?= (isset($pro_data[0]->min_age) && ($pro_data[0]->min_age == 8)) ? 'selected' :'' ?>  value  ='8' >8year</option>
                      </select>
                    </div>
                   </div>

                   <div class="col-lg-6 mb-3">
                    <div class="formsetting mb-3">
                      <label class="">Max age </label>
                     <select  class=" form-control" id="maxage" data-container="body" data-live-search="true" title="Select.." data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" name="maxage">
                        <option disabled="">Max age</option>
                         <option<?= (isset($pro_data[0]->max_age) && ($pro_data[0]->max_age == 3)) ? 'selected' :'' ?> value = '3' >3year</option>
                        <option <?= (isset($pro_data[0]->max_age) && ($pro_data[0]->max_age == 4)) ? 'selected' :'' ?>value = '4' >4year</option>
                        <option<?= (isset($pro_data[0]->max_age)  && ($pro_data[0]->max_age == 5)) ? 'selected' :'' ?> value = '5' >5year</option>
                        <option <?= (isset($pro_data[0]->max_age) && ($pro_data[0]->max_age == 6)) ? 'selected' :'' ?> value = '6' >6year</option>
                        <option <?= (isset($pro_data[0]->max_age) && ($pro_data[0]->max_age == 8)) ? 'selected' :'' ?> value = '8' >8year</option>
                        <option <?= (isset($pro_data[0]->max_age) && ($pro_data[0]->max_age == 9)) ? 'selected' :'' ?> value = '9' >9year</option>
                        <option <?= (isset($pro_data[0]->max_age) && ($pro_data[0]->max_age == 10)) ? 'selected' :'' ?> value = '10' >10year</option>
                        <option <?= (isset($pro_data[0]->max_age) && ($pro_data[0]->max_age == 11)) ? 'selected' :'' ?> value = '11' >11year</option>
                        <option <?= (isset($pro_data[0]->max_age) && ($pro_data[0]->max_age == 12)) ? 'selected' :'' ?>  value = '12' >12year</option>
                      </select>
                    </div>
                   </div>
                 
                <div class="col-lg-6 mb-4 mycheckboxdiv mt-4">
                        <div class="form-floating mb-3">
                              <input type="date" class="form-control" id="start" placeholder="name@example.com" name="start"value="<?= isset($pro_data[0]->description)? $pro_data[0]->start_date :'' ?>">
                              <i class="fad fa-calendar-alt"></i>
                              <label class="sdatel"  for="start"> Start date </label>
                       </div>
                     </div> 
                    <div class="col-lg-6 mb-3 mycheckboxdiv mt-4">
                        <div class="form-floating mb-3">
                              <input type="date" class="form-control" id="end" placeholder="name@example.com" name="end" value="<?= isset($pro_data[0]->description)? $pro_data[0]->end_date :'' ?>" >
                              <i class="fad fa-calendar-alt"></i>
                              <label class="sdatel"  for="end"> End date </label>
                       </div>
                     </div>

                </div>
            
                   <div>
                      <button type="reset" class="btn btn-lights mt-5 mr--3">
                        Cancel</button>
                      <button type="submit" class="btn btn-primary mt-5 waves-effect shadow">
                        Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script src="assets/vendor_components/select2/dist/js/select2.full.js"></script>


<!-- /.modal -->
<?php include ('include/footer.php'); ?>
<script>
       $('.addmission').addClass('active');
</script>
<script>
    var start = document.getElementById('start');
    var end = document.getElementById('end');

    start.addEventListener('change', function() {
      if (start.value)
        end.min = start.value;
    }, false);
    end.addEventLiseter('change', function() {
      if (end.value)
        start.max = end.value;
    }, false);

  </script>