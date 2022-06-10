 <?php include ('include/header.php'); ?>
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->             
     <div class="content-header">
       <div class="tabls-title">
         <a href="<?= base_url('Messages') ?>" class="active">Messages</a>
         <a href="<?= base_url('Messages/announcements') ?>" class="">Announcements</a>
         <a href="<?= base_url('Messages/newsletters') ?>" class="">Newsletters</a>

       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title">Messages</h4>

           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">

             <a href="#" class="btn btn-primary mt-10 waves-effect shadow">+ New Message</a>
           </div>
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content">
       <form>
         <div class="row parentlist">
           <div class="col-lg-12">
             <div class="card">
               <div class="card-body">
                 <div class="row">
                   <div class="col-lg-4 col-md-4 col-sm-6">
                     <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Students's Name" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                       <option>Aayush</option>
                       <option>Abhishek</option>
                       <option>Jiyansh</option>
                     </select>
                   </div>
                   <div class="col-lg-4 col-md-4 col-sm-6">
                     <select multiple class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Select Room" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                       <option>All</option>
                       <option>Demo Room</option>
                     </select>
                   </div>


                   <div class="col-lg-3 col-md-4 col-sm-6">
                     <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" title="Select Status" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                       <option>Needs Contact Info</option>
                       <option>Invite Ready</option>
                       <option>Invited</option>
                       <option>Activated</option>
                     </select>
                   </div>
                   <div class="col-lg-1 col-md-4 col-sm-6">
                     <button type="submit" class="btn btn-primary mt-5 waves-effect shadow">Apply</button>
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
                 <table class="table table-hover mb-0 parent_list chatcusur" id="complex_header">
                   <thead>
                     <tr>
                       <th >STUDENT</th>
                      <th>DATE</th>
                      <th>MESSAGE</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       
                       <td data-bs-toggle="modal" data-bs-target="#Chatstart">
                         <div class="student_list d-inline-block">
                           <a href="#">
                             <div class="avtar_img">
                               <img src="<?= base_url() ?>assets_pages/images/avatar.png">
                             </div>
                             <div class="info_title">
                               <h5>Ajay</h5>
                             </div>
                           </a>
                         </div>
                       </td>
                       <td   data-bs-toggle="modal" data-bs-target="#Chatstart">
                         <h5>01/11/2022</h5>
                         <h5>5:45 PM</h5>
                       </td>
                       <td class="w-40" data-bs-toggle="modal" data-bs-target="#Chatstart">
                         <h5>Loram ipsum simply dummy text</h5>
                       </td>
                     </tr>
                     <tr>
                       <td data-bs-toggle="modal" data-bs-target="#Chatstart">
                         <div class="student_list d-inline-block">
                           <a href="#">
                             <div class="avtar_img">
                               <img src="<?= base_url() ?>assets_pages/images/avatar.png">
                             </div>
                             <div class="info_title">
                               <h5>Sumit</h5>
                             </div>
                           </a>
                         </div>
                       </td>
                       <td  data-bs-toggle="modal" data-bs-target="#Chatstart">
                         <h5>01/11/2022</h5>
                         <h5>5:45 PM</h5>
                       </td>
                      
                       <td class=" w-40" data-bs-toggle="modal" data-bs-target="#Chatstart">
                         <h5>Loram ipsum simply dummy text</h5>
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
     <!-- /.content -->
   </div>
 </div>


 <!-- Modal Parent Edit -->
<div class="modal modal-left chatDiv fade add_parent" id="Chatstart" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-0">
        <form action="#" method="post">
          <div class="box no-radius">
            <div class="box-header">
              <div class="media align-items-top p-0">
                <a class="avatar avatar-lg status-success mx-0" href="#">
                  <img src="<?= base_url() ?>assets_pages/images/avatar.png" class="rounded-circle" alt="...">
                </a>
                <div class="d-lg-flex d-block justify-content-between align-items-center w-p100">
                  <div class="media-body mb-lg-0 mb-20">
                    <p class="fs-16">
                      <a class="hover-primary" href="#"><strong>Ajay</strong></a>
                    </p>
                    <p class="fs-12">Last Seen 10:30pm ago</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div class="">
                <div class="chartDiv">
                <div class="clearfix"></div>
                  <div class="card d-inline-block mb-3 float-start me-2 no-shadow bg-lighter max-w-p80">
                    <div class="position-absolute pt-1 r-0">
                      <span class="text-extra-small text-muted">09:28</span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="<?= base_url() ?>assets_pages/images/avatar.png" class="avatar me-10">
                        </a>
                        <div class="d-flex flex-grow-1 min-width-zero">
                          <div class="m-2 ps-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                            <div class="min-width-zero">
                              <p class="mb-0 fs-16 text-dark">Ajay</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="chat-text-start ps-55">
                        <p class="mb-0 text-semi-muted">Hello</p>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="card d-inline-block mb-3 float-end me-2 bg-primary max-w-p80">
                    <div class="position-absolute pt-1 pe-2 r-0">
                      <span class="text-extra-small">09:41</span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="<?= base_url() ?>assets_pages/images/avatar.png" class="avatar me-10">
                        </a>
                        <div class="d-flex flex-grow-1 min-width-zero">
                          <div class="m-2 ps-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                            <div class="min-width-zero">
                              <p class="mb-0 fs-16">Admin</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="chat-text-start ps-55">
                        <p class="mb-0 text-semi-muted">How are you ?</p>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                   <div class="card d-inline-block mb-3 float-start me-2 no-shadow bg-lighter max-w-p80">
                    <div class="position-absolute pt-1 r-0">
                      <span class="text-extra-small text-muted">09:28</span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="<?= base_url() ?>assets_pages/images/avatar.png" class="avatar me-10">
                        </a>
                        <div class="d-flex flex-grow-1 min-width-zero">
                          <div class="m-2 ps-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                            <div class="min-width-zero">
                              <p class="mb-0 fs-16 text-dark">Ajay</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="chat-text-start ps-55">
                        <p class="mb-0 text-semi-muted">I'm Fine</p>
                      </div>
                    </div>
                  </div>
                  <div class="card d-inline-block mb-3 float-end me-2 bg-primary max-w-p80">
                    <div class="position-absolute pt-1 pe-2 r-0">
                      <span class="text-extra-small">09:41</span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="<?= base_url() ?>assets_pages/images/avatar.png" class="avatar me-10">
                        </a>
                        <div class="d-flex flex-grow-1 min-width-zero">
                          <div class="m-2 ps-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                            <div class="min-width-zero">
                              <p class="mb-0 fs-16">Admin</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="chat-text-start ps-55">
                        <p class="mb-0 text-semi-muted">How are you ?</p>
                      </div>
                    </div>
                  </div>
                   <div class="card d-inline-block mb-3 float-start me-2 no-shadow bg-lighter max-w-p80">
                    <div class="position-absolute pt-1 r-0">
                      <span class="text-extra-small text-muted">09:28</span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="<?= base_url() ?>assets_pages/images/avatar.png" class="avatar me-10">
                        </a>
                        <div class="d-flex flex-grow-1 min-width-zero">
                          <div class="m-2 ps-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                            <div class="min-width-zero">
                              <p class="mb-0 fs-16 text-dark">Ajay</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="chat-text-start ps-55">
                        <p class="mb-0 text-semi-muted">I'm Fine</p>
                      </div>
                    </div>
                  </div>
                </div>
             </div>
             </div>
             <div class="messagebox">
           <div class="d-md-flex d-block justify-content-between align-items-center bg-white  p-5            rounded10 b-1 overflow-hidden">
               <textarea cols="form-control" name="" placeholder="Type messages....."></textarea>
                <div class="d-flex justify-content-between align-items-center mt-md-0 mt-30">
                  <button type="Submit" class="waves-effect waves-circle btn btn-circle btn-primary">
                    <i class="fa fa-send"></i>
                  </button>
                </div>
            </div>
          </div>
      </div>
  </form>
          <!-- /.box-body -->
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

