<?php include ('include/header.php'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
<style type="text/css">
  label {
    display: inline-block;
    font-weight: 400;
    color: #5a4b4b;
    font-size: 16px;
  }

</style>
<div class="content-wrapper">
  <div class="container-full">

    <!-- Main content -->
    <section class="content">
      <form>
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <div class="box">
              <div class="box-body">
                <div class="row justify-content-center">
                  <div class="d-flex align-items-center divalgn">
                    <div class="">
                      <h4 class="page-title">Add Lessons</h4>
                    </div>
                    <div class="haff-widgets">
                      <a href="<?= base_url('Learning/lessons') ?>" class="btn btn-primary mt-10 waves-effect shadow"><i class="fa-regular fa-angles-left" style="margin-right: 8px;"></i>Back</a>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" id="lnumber" placeholder="name@example.com" name="lnumber">
                          <label for="lnumber">Lesson Number</label>
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="letitle" placeholder="name@example.com" name="letitle">
                          <label for="letitle">Lesson Title</label>
                        </div>
                      </div>


                      <div class="col-lg-4">
                        <div class="formsetting mb-3">
                          <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Lesson Category">
                            <option disabled="">Lesson Category</option>
                            <option>STEM</option>
                            <option>Social & Emotional</option>
                            <option>Literacy</option>
                            <option>Gross Motor</option>
                            <option> Fine Motor</option>
                            <option> Communication</option>
                            <option> Arts</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-lg-8">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="bdescritpion" placeholder="name@example.com" name="bdescritpion">
                          <label for="bdescritpion">Brief Description</label>
                        </div>
                      </div>

                      <div class="col-lg-4">

                        <div class="d-flex align-items-center">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="ageform" placeholder="name@example.com" name="ageform">
                            <label for="ageform">Age From</label>
                          </div>
                          <span class="mr--1 ml--1">-</span>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="ageto" placeholder="name@example.com" name="ageto">
                            <label for="ageto">Age To</label>
                          </div>
                          <span class="ml--1">months</span>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="forms-floating mb-3">
                          <label for="newstitle">Full Description</label>
                          <textarea class="" id="" placeholder="" name="" rows="6"></textarea>
                        </div>
                      </div>

                      <div class="col-lg-12 mb-3">
                        <h5>MILESTONES</h5>
                        <a href="#" class="waves-effect addsection" data-bs-toggle="modal" data-bs-target="#add_milestone"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add Milestone</a>
                      </div>

                      <div class="col-lg-6">
                        <div class="formsetting mb-4">
                          <label>Materials Needed</label>
                          <select multiple="" class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Select..">
                            <option>Household Cooking & Cleaning Items</option>
                            <option>Pillows</option>
                            <option>Favorite Toys & Books</option>
                            <option>Scarf</option>
                            <option>Feather</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="formsetting mb-4">
                          <label>Room</label>
                          <select multiple="" class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Select..">
                            <option>Demo Room</option>
                            <option>Demo Room 1</option>
                            <option>Demo Room 2</option>
                            <option>Demo Room 3</option>
                            <option>Demo Room 4</option>

                          </select>
                        </div>
                      </div>

                      <div class="col-lg-3">
                        <label class="d-block">DURATION</label>
                        <div class="d-flex align-items-center">

                          <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="dhrs" placeholder="name@example.com" name="dhrs">
                            <label for="dhrs">hrs</label>
                          </div>
                          <span class="mr--1 ml--1">:</span>
                          <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="dmin" placeholder="name@example.com" name="dmin">
                            <label for="dmin">min</label>
                          </div>

                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="formsetting mb-3">
                          <label>Location</label>
                          <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Select..">
                            <option>Outdoors</option>
                            <option>Indoor</option>

                          </select>
                        </div>
                      </div>

                      <div class="col-lg-5">
                        <div class="formsetting mb-3">
                          <label>Group Size</label>
                          <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Select..">
                            <option>Individual</option>
                            <option>Small Group</option>
                            <option>Medium Group</option>
                            <option>Large Group</option>
                          </select>
                        </div>
                      </div>




                    </div>
                    <div class="col-lg-12 mt-3 mb-3 text-end">
                      <button type="reset" class="btn mt-10">Cancel</button>
                      <button type="Submit" class="btn btn btn-primary mt-10 waves-effect">Save</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </form>
    </section>
  </div>
</div>

<!-- Modal -->
<div class="modal  invite_modal fade new_lessaon" id="add_milestone" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-24">Add Milestone</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fad fa-times-circle"></i></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-lg-12 mb-3">
              <input type="search" name="" class="ht-40 form-control" placeholder="Search Milestones">
            </div>
            <div class="col-lg-4 mb-3">
              <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Select..">
                <option>Alabama - Preschool (2012)</option>
                <option>Arizona - Preschool</option>
                <option selected="">Early Learning</option>
              </select>
            </div>
            <div class="col-lg-4 mb-3">
              <select class="selectpicker form-control" id="homeroom" data-container="body" data-live-search="true" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" title="Domain">
                <option disabled="">Domain</option>
                <option>All</option>
              </select>
            </div>

            <div class="col-lg-4 mb-3">
              <input type="search" name="" class="ht-40 form-control" placeholder="Search Categories">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="learning_box">
                    <h5 class="title">Milestone </h5>

                    <div class="progrescart">
                      <div class="title_names">
                        <h5>ART</h5>
                        <h6>Arts</h6>
                      </div>
                      <div class="hvr_btn addbutton">
                        <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                      </div>
                    </div>

                    <div class="progrescart">
                      <div class="title_names">
                        <h5>COG</h5>
                        <h6>Cognitive</h6>
                      </div>
                      <div class="hvr_btn addbutton">
                        <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                      </div>
                    </div>

                    <div class="progrescart">
                      <div class="title_names">
                        <h5>COM</h5>
                        <h6>Communication</h6>
                      </div>
                      <div class="hvr_btn addbutton">
                        <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                      </div>
                    </div>

                    <div class="progrescart">
                      <div class="title_names">
                        <h5>FM</h5>
                        <h6>Fine Motor</h6>
                      </div>
                      <div class="hvr_btn addbutton">
                        <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                      </div>
                    </div>

                    <div class="progrescart">
                      <div class="title_names">
                        <h5>GM</h5>
                        <h6>Gross Motor</h6>
                      </div>
                      <div class="hvr_btn addbutton">
                        <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                      </div>
                    </div>

                    <div class="progrescart">
                      <div class="title_names">
                        <h5>LIT</h5>
                        <h6>Literacy</h6>
                      </div>
                      <div class="hvr_btn addbutton">
                        <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                      </div>
                    </div>

                    <div class="progrescart">
                      <div class="title_names">
                        <h5>SE</h5>
                        <h6>Social &amp; Emotional</h6>
                      </div>
                      <div class="hvr_btn addbutton">
                        <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                      </div>

                    </div>

                    <div class="progrescart">
                      <div class="title_names">
                        <h5>STEM</h5>
                        <h6>STEM</h6>
                      </div>
                      <div class="hvr_btn addbutton">
                        <a href="#" class="btnadd btn shadow waves-effect waves-light">Add</a>
                      </div>

                    </div>

              </div>
            </div>
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
<script src="<?= base_url()?>assets_pages/js/bootstrap-select.js"></script>
<script>
  $('.learnings').addClass('active');

</script>
