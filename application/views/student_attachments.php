<?php include ('include/header.php'); ?>
 <style type="text/css">
   .table > tbody > tr > td, .table > tbody > tr > th {
    padding: 1rem !important;
}
 </style>
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header mt-3">
        <?php $this->load->view('include/Common_menus') ?>
       <div class="d-flex align-items-center">
       </div>
     </div>
     <!-- Main content -->
     <section class="content">
      <div class="profile_show">
          <div class="avtar_img">
              <img src="<?= base_url() ?>assets_pages/images/avatar.png">
      </div>
      <div class="avtar_title">
        <h5><?= (isset($std_list[0]->name))? $std_list[0]->name : '' ?> </h5>
      </div>  
        </div>
     	<div class="row">
     		<div class="col-lg-12">
     			<div class="attachments-text">
     				<h3>Attachments</h3>
     				<p>Upload attachments to student profiles. Use our standard categories or start typing to create your own custom attachment categories. Track expiration dates on attachments uploaded to student or staff profiles using the <a href="#">Expiring attachments report</a>.</p>
     			</div>
     			<hr>
     		  
     		</div>
        <div class="col-lg-12 text-end mb-3">
           <a href="#" class="btn btn-primary mt-10 waves-effect shadow" data-bs-toggle="modal" data-bs-target="#attachments">+ Add Attachment</a>
        </div>
     			</div>

          <div class="row">
         <div class="col-12">

           <div class="box">
             <div class="box-body">
               <div class="table-responsive">
                 <table class="table table-hover mb-0 parent_list" id="complex_header">
                   <thead>
                     <tr>
                       <th>Type</th>
                       <th>Visible To</th>
                       <th>Uploaded </th>
                       
                       <th>Expiration Date</th>
                       </tr>
                   </thead>
                     <tbody>  <?php   if(isset($list_doc) && count($list_doc)>0 ){ 
                                        foreach($list_doc as $val){ ?>
                                    <tr>
                                       <td class=""><span class="table-p"><?= ($val->attachment_type == 'Other')? $val->attachment_type .' '.$val->other_type : $val->attachment_type ?> </span></td>                    
                                     
                                       <td class="text-center"><?= $val->view_profiles ?></td>
                                       <td class="text-center"><img src = "<?= base_url('assets/Doc_img/').$val->document_file ?>" width ='60'></td>
                                       <td class="text-center"><?= date('d-m-y',strtotime($val->exp_date)) ?></td>
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
 <!-- Modal -->
 <div class="modal modal-left fade add_parent" id="attachments" tabindex="-1">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title premium-text"> Add Attachment</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form action="<?= base_url('Student/add_attachments')?>" method="post" enctype= 'multipart/form-data' >
        
         <div class="mb-3">
          <label for="proof1" class="drag_button W-100">  
                      <div class="drag_buttons">
                        <div class="text-center"><i class="fad fa-cloud-upload"></i><h5> Choose a new file</h5></div>
                       </div></label>
                       <input type="file" id="proof1" name="doc_img" style="display: none"/>
                        <h5 class="form-file-text mt-3">
                        <div></div>
                      </h5>
         </div>

                                     
           <div class="formsetting mb-4">
                    
                    <!-- <select  class="selectpicker form-control" onchange = "fun_time(this.value)" id="minage" data-container="body" data-live-search="true" title="What type of attachment is this?" data-hide-disabled="false" data-actions-box="true" data-virtual-scroll="false" name="type">
                        <option disabled="">What type of attachment is this? *</option>
                        <option>Enrollment Application</option>
                        <option>Enrollment Contract</option>
                        <option>Immunization Record</option>
                        <option>Photo Release Form</option>
                        <option>Other</option>
                      </select>-->
                                              
                      <select  class=" form-control" onchange = "fun_time(this.value)" id="minage" name="type">
                        <option disabled="">What type of attachment is this? *</option>
                        <option>Enrollment Application</option>
                        <option>Enrollment Contract</option>
                        <option>Immunization Record</option>
                        <option>Photo Release Form</option>
                        <option>Other</option>
                      </select>
                    </div>
                    <div class="mycheckboxdiv mt-40">
                         <div class=" mb-3" id = "div_other"  style = 'display:none'>
                        <label class="sdatel" for="start"> Enter other type</label>
                         <input name="other_type" id = "div_other_2" class="form-control"></input>
               </div>
                    <div class="form-floating mt-30">
                              <input type="date" class="form-control" id="start" placeholder="name@example.com" name="exp_date" value="">
                              <i class="fad fa-calendar-alt"></i>
                              <label class="sdatel" for="start"> Expiration date</label>
                    </div>
                    <div class="textarea mt-30">
                        <label class="sdatel" for="start"> Notes</label>
                 <textarea name="note" class="form-control" rows="3"></textarea>
               </div>
                <input type = 'hidden' name = 's_id' value = "<?= $this->uri->segment(3) ?>" >
               <div class="visual_attech">
                 <p>Who should be able to view this file?</p>
                 <div class="controls mb-3" style="">
                    <input type="checkbox" id="admin1" name = 'show_types[]' value='Admin' class="filled-in" readonly  checked="">
                    <label for="admin1" class="labels lin19">Admin</label>
                </div>  
                <div class="controls mb-3" style="">
                    <input type="checkbox" id="Teachers" name = 'show_types[]' value='Teachers' class="filled-in">
                    <label for="Teachers" class="labels lin19">Teachers</label>
                </div> 
                <div class="controls mb-3" style="">
                    <input type="checkbox" id="Family" name = 'show_types[]'  value='Family' class="filled-in">
                    <label for="Family" class="labels lin19">Family</label>
                </div>
                <div class="controls mb-3" style="">
                    <input type="checkbox" id="parents" name = 'show_types[]' value='Parents' class="filled-in" >
                    <label for="parents" class="labels lin19">Parents</label>
                </div>

               </div>
               <div class="mt-4s">
             <button type="reset" class="btn btn-light mr-3 mr--1" data-bs-dismiss="modal">Cancel</button>
             <button type="submit" class="btn btn-success shadow">Save Contact</button>
           </div>
                       </div>
         
         </form>
       </div>
     </div>
   </div>
 </div>
 <!-- /.modal -->
    
     
   </div>
 </div>

 <?php include ('include/footer.php'); ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/js/bootstrap-select.js"></script>
 <script src="<?= base_url() ?>assets_pages/vendor_components/datatable/datatables.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/src/js/pages/data-table.js"></script>
  <script src="<?= base_url() ?>assets_pages/vendor_components/select2/dist/js/select2.full.js"></script>

   <script>
   $('.myschool').addClass('active');
   $('.student').addClass('active');
 </script>

 
   <script type="text/javascript">
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $(e.target).parent('div').find('.form-file-text').html(fileName).addClass('blocks')
      // Inside find search element where the name should display (by Id Or Class)
    });

  </script>

   <script type="text/javascript">
    $("#proof1").change(function() {
      filename = this.files[0].name;
      console.log(filename);
    });
    
    $('body').on('change','#minage', function (){
        var test = $(this).val();
        if(test == 'Other'){  $('#div_other').show(); }else{    $('#div_other').hide();  }
    });
    
     function fun_time(test){
       // var test = $(this).val();                       
      // alert(test); 
        if(test == 'Other'){ $('#div_other').show();$('#div_other_2').show();   }else{$('#div_other').hide(); $('#div_other_2').hide();   }
    }
    
    
    
    
    
 </script>
 
 
 
 
 
 
 
 