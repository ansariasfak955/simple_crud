 <?php include ('include/header.php'); ?>
 <link rel="stylesheet" type="text/css" href="assets/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->                                                  
      <div class="content-header mt-3">
       <?php $this->load->view('include/Common_menus') ?>
       <div class="d-flex align-items-center">
       </div>
     </div>
     <!-- Main content -->
     <section class="content room_feed">
      <div class="profile_show">
          <div class="avtar_img">
              <img src="<?= base_url() ?>assets_pages/images/avatar.png">
      </div>
      <div class="avtar_title">
        <h5>Sumit</h5>
      </div>
        </div>
       <form action = "<?= base_url('Student/student_feed/').$this->uri->segment(3) ?>">
         <div class="row ">
           <div class="col-lg-12">
             <div class="card">
               <div class="card-body">
                 <div class="row">
                   <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="form-group">
                       <div class="input-group input--style">
                         <div class="input-group-addon">
                           <i class="fa-regular fa-calendars"></i>
                         </div>
                         <input type="date" name = 'f_date' class="form-control pull-right" value = "<?= ($this->input->get('f_date'))? $this->input->get('f_date') : '' ?>" placeholder="From Date" autocomplete="off">
                       </div>
                     </div>                               
                   </div>
                   <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="form-group">
                       <div class="input-group input--style">
                         <div class="input-group-addon">
                           <i class="fa-regular fa-calendars"></i>
                         </div>
                         <input type="date"  name = 'l_date'  class="form-control pull-right" value = "<?= ($this->input->get('l_date'))? $this->input->get('l_date') : '' ?>"  placeholder="To Date" autocomplete="off">
                       </div>
                     </div>
                   </div>

                   <div class="col-lg-3 col-md-4 col-sm-6">
                     <select class="selectpicker form-control" id="number-multiple" data-container="body" data-live-search="true" data-hide-disabled="true" title="Activity type" data-actions-box="true" data-virtual-scroll="false">
                       <option>All</option>
                       <option>Absent</option>
                       <option>Activity</option>

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
         <div class="col-xl-12 col-12">
           <div class="box">
             <div class="box-header with-border">
             
               <ul class="box-controls pull-right">
                 <li><a class="box-btn-close" href="#"><i class="fa-light fa-xmark"></i></a></li>
                 <li><a class="box-btn-slide" href="#"><i class="fa-light fa-angle-up"></i></a></li>
                 <li><a class="box-btn-fullscreen" href="#"><i class="fa-light fa-compress"></i></a></li>
               </ul>
             </div>

             <div class="box-body">
               <div class="box">
                 <div class="box-header">
                   <h4 class="box-title">All Feed</h4>
                 </div>
                 <div class="box-body">
                   <div class="timeline timeline-single-column timeline-single-full-column">
                <?php if(isset($cat_list)  && count($cat_list)>0){
                    foreach($cat_list as $value){ ?>
                    
                    <span class="timeline-label">
                       <span class="badge badge-pill badge-info badge-lg"><?= $value['cat_name'] ?></span>
                     </span>
                                       
                    
                     <div class="timeline-item ">
                       <div class="timeline-point timeline-point-success">
                         <i class="fa-regular fa-money-check-pen"></i>
                       </div>
                       <div class="timeline-event timeline-event-success">
                         <div class="d-flex">
                           <div class="timeline-heading">
                            <h4 class="timeline-title mb-2"><?= $value['cat_name'] ?> &nbsp;</h4>
                             
                           </div>
                           
                           
                           <div class="profile-infor">
                             <img src="<?= base_url() ?>assets_pages/images/avatar-13.png" alt="">
                             <a href="#">Arpit</a>
                           </div>
                         </div>
                         <div class="timeline-body">
                               <?php foreach($value['data'] as $val){ ?>    
                             <h6><?= $val->feild_name .'  '.$val->activity_fild_values  ?></h6>
                             <p><?= $val->feild_name .'  '.$val->activity_fild_values  ?></p>
                           <?php } ?>
                         </div>
                         
                         
                         <div class="timeline-footer text-end">
                           <a href="#" class = "btn btn-primary edibtn" data-bs-toggle="modal" data = "<?= base64_encode(json_encode($value)) ?>" data-bs-target="#feedEdit">Edit</a>
                         </div>
                         
                         
                       </div>
                     </div>
            <?php }} ?>   
                     
                     
                    <!-- <div class="timeline-item ">
                       <div class="timeline-point timeline-point-success">
                         <i class="fa-regular fa-money-check-pen"></i>
                       </div>
                       <div class="timeline-event timeline-event-success">
                         <div class="d-flex">
                           <div class="timeline-heading">
                             <h4 class="timeline-title mb-2">Note </h4>
                             <h6>5:00 PM by Sumit Hariyani</h6>
                           </div>
                           <div class="profile-infor">
                             <img src="<?= base_url() ?>assets_pages/images/avatar-13.png" alt="">
                             <a href="#">Shubham</a>
                           </div>
                         </div>
                         <div class="timeline-body">
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                         </div>
                         <div class="timeline-footer text-end">
                           <a href="#" class="btn btn-primary edibtn" data-bs-toggle="modal" data-bs-target="#feedEdit">Edit</a>
                         </div>
                       </div>
                     </div>
                      <span class="timeline-label">
                       <span class="badge badge-pill badge-info badge-lg">Images</span>
                     </span>

                     <div class="timeline-item">
                       <div class="timeline-point timeline-point-success">
                         <i class="fa fa-image"></i>
                       </div>
                       <div class="timeline-event">
                         <div class="d-flex">
                           <div class="timeline-heading">
                             <h4 class="timeline-title mb-2">Photo</h4>
                             <h6>5:00 PM by Sumit Hariyani</h6>
                           </div>
                           <div class="profile-infor">
                             <img src="<?= base_url() ?>assets_pages/images/avatar-13.png" alt="">
                             <a href="#">Amit</a>
                           </div>
                         </div>
                         <div class="timeline-body">
                           <img src="https://st2.depositphotos.com/3508093/9245/i/950/depositphotos_92459776-stock-photo-group-of-pre-school-children.jpg" alt="..." class="m-10">
                         </div>
                         <div class="timeline-footer text-end">
                           <a href="#" class="btn btn-primary edibtn" data-bs-toggle="modal" data-bs-target="#feedEdit">Edit</a>
                         </div>
                       </div>
                     </div>

                     <span class="timeline-label">
                       <span class="badge badge-pill badge-info badge-lg">Notes</span>
                     </span>

                     <div class="timeline-item ">
                       <div class="timeline-point timeline-point-success">
                         <i class="fa-regular fa-money-check-pen"></i>
                       </div>
                       <div class="timeline-event timeline-event-success">
                         <div class="d-flex">
                           <div class="timeline-heading">
                             <h4 class="timeline-title mb-2">Note</h4>
                             <h6>5:00 PM by Sumit Hariyani</h6>
                           </div>
                           <div class="profile-infor">
                             <img src="<?= base_url() ?>assets_pages/images/avatar-13.png" alt="">
                             <a href="#">Shubham</a>
                           </div>
                         </div>
                         <div class="timeline-body">
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                         </div>
                         <div class="timeline-footer text-end">
                           <a href="#" class="btn btn-primary edibtn" data-bs-toggle="modal" data-bs-target="#feedEdit">Edit</a>
                         </div>
                       </div>
                     </div>-->

                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>

     <!------Modal --------->
     <div class="modal modal-right fade feededit add_parent" id="feedEdit" tabindex="-1">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Note</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body box-body">
             <form action="#" method="post">
               <div class="form-floating mb-3">
                 <input type="datetime-local" class="form-control" id="fistname" placeholder="name@example.com" name="fistname" value="2022-04-01T17:00">
                 <label for="datetime-local"></label>
               </div>
               <div class="mb-3 scheckbox">
                 <input type="checkbox" id="md_checkbox_1" class="chk-col-primary">
                 <label for="md_checkbox_1">Staff Only</label>
               </div>
               <div class="textarea">
                 <textarea name="" class="form-control" rows="7">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</textarea>
               </div>

               <div class="choosefile">
                 <label for="imgupload" class="inputhide">                                        
                   <input type='file' onchange="readURL(this);" id="imgupload" />
                   <img id="blah" src="https://st2.depositphotos.com/3508093/9245/i/950/depositphotos_92459776-stock-photo-group-of-pre-school-children.jpg" alt="your image" />
                 </label>
               </div>

               <div class="mt-4s">
                 <button type="reset" class="btn btn-danger mr-3 mr--1" data-bs-dismiss="modal"> Delete Activity</button>
                 <button type="submit" class="btn btn-success shadow">Save changes</button>
               </div>
             </form>
             <!-- /.box-body -->
           </div>
         </div>
       </div>
     </div>




     <?php include ('include/footer.php'); ?>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
     <script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
     <script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>
     <script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>

     <script src="<?= base_url() ?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
     <script src="<?= base_url() ?>assets_pages/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

     <script type="text/javascript">
       //Date picker
       $('#datepicker').datepicker({
         autoclose: true
       });
       //Date picker
       $('#todatepicker').datepicker({
         autoclose: true
       });

     </script>
     <script>
       $('.myschool').addClass('active');
       $('.rooms').addClass('active');

     </script>

     <script>
       function readURL(input) {
         if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function(e) {
             $('#blah')
               .attr('src', e.target.result)
               .width(150)
               .height(200);
           };

           reader.readAsDataURL(input.files[0]);
         }
       }

        $('body').on('click','.edibtn',function(){
            let url = $(this).attr('data'); 
            let data = atob(url); 
            let tab_data = $.parseJSON(data); 
            
            console.log(tab_data); 
            
            return false; 
        })

     </script>
