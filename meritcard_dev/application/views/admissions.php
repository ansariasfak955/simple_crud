 <?php include ('include/header.php'); ?>
 <style type="text/css">
   .student_list .dataTables_info,
   .dataTables_length,
   .dt-buttons {
     display: block !important;
   }
  .table
  {
    text-align: center;
  }
  .parent_list>thead>tr>th {
     font-weight: 500;
     background-color: #f3f6f9 !important;
     color: #605c6c;
     font-size: 13px;
     padding: 10px !important;
   }

 .parent_list label
 {
    margin-bottom: -10px;
 }
 </style>
 <link rel="stylesheet" type="text/css" href="assets/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="tabls-title mt-1">
          <a href="<?= base_url('Admissions') ?>" class="active">Dashboard</a>
         <a href="<?= base_url('Admissions/admissions_from_requests') ?>" class="">Forms & Requests</a>
         <a href="<?= base_url('Admissions/addmission_waitlists') ?>" class="">Waitlists</a>
         <a href="<?= base_url('Admissions/programs') ?>" class="">Programs</a>
        
       </div>
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title newtittle">Admissions Dashboard</h4>

           <div class="d-inline-block align-items-center">
           </div>
           <div class="haff-widgets">

             <a href="<?= base_url('Admissions/addmission_add_student') ?>" class="btn btn-primary mt-10 waves-effect shadow">+ New Student</a>
           </div>
         </div>
       </div>
     </div>
     <!-- Main content -->
     <section class="content">

   <div class="dashboard_box">

    <div class="box">
      <div class="row g-0 py-2">
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

          <div class="col-12 col-xl-3">
            <div class="box-body be-1 border-light">
            <div class="flexbox mb-1">
              <span>
                <span class="icon-User fs-40"><span class="path1"></span><span class="path2"></span></span><br>
                Total Students
 
              </span>  
              <span class="text-primary fs-40"><?= (isset($total_students)) ? $total_students : '0' ?></span>
            </div>
            <div class="progress progress-xxs mt-10 mb-0">
              <div class="progress-bar" role="progressbar" style="width: 35%; height: 4px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            </div>
          </div>


          <div class="col-12 col-xl-3 hidden-down">
            <div class="box-body be-1 border-light">
            <div class="flexbox mb-1">
              <span>
                <span class="icon-Selected-file fs-40"><span class="path1"></span><span class="path2"></span></span><br>
              Prospects
              </span>
              <span class="text-info fs-40"><?= (isset($temp_count['Prospects'])) ? $temp_count['Prospects'] : '0' ?> </span>
            </div>
            <div class="progress progress-xxs mt-10 mb-0">
              <div class="progress-bar bg-info" role="progressbar" style="width: 55%; height: 4px;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            </div>
          </div>


          <div class="col-12 col-xl-3 d-none d-lg-block">
            <div class="box-body be-1 border-light">
            <div class="flexbox mb-1">
              <span>
                <span class="icon-Info-circle fs-40"><span class=""><i class="fad fa-plane-departure"></i></span><span class="path2"></span><span class="path3"></span></span><br>
                 Toured
              </span>
              <span class="text-warning fs-40"><?= (isset($temp_count['Toured']))? $temp_count['Toured'] : '0' ?> </span>
            </div>
            <div class="progress progress-xxs mt-10 mb-0">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 65%; height: 4px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            </div>
          </div>


          <div class="col-12 col-xl-3 d-none d-lg-block">
            <div class="box-body be-1 border-light">
            <div class="flexbox mb-1">
              <span>
                <span class="icon-Group-folders fs-40"><span class="path1"></span><span class="path2"></span></span><br>
             Applied
              </span>
              <span class="text-success fs-40"><?= (isset($temp_count['Applied'])) ? $temp_count['Applied'] : '0' ?></span>
            </div>
            <div class="progress progress-xxs mt-10 mb-0">
              <div class="progress-bar bg-success" role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            </div>
          </div>  

          <div class="col-12 col-xl-3 d-none d-lg-block">
            <div class="box-body">    
            <div class="flexbox mb-1">
              <span>
                <span class="icon-Group-folders fs-40"><span class="path1"></span><span class="path2"></span></span><br>
             Waitlist
              </span>
              <span class="text-danger fs-40"><?= (isset($temp_count['Waitlist'])) ? $temp_count['Waitlist'] : '0' ?></span>
            </div>
            <div class="progress progress-xxs mt-10 mb-0">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            </div>
          </div>
        </div>
   </div>


       </div>
       <div class="row">
         <div class="col-12">
           <form>
             <div class="row">
               <div class="col-lg-12">
                 <div class="card">
                   <div class="card-body">
                     <div class="row">
                       <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                          <div class="suggest mt-2">
						     <input type="hidden" id = 'h_user_id' name="user_id">	
        						 <!--<label>Search Student  </label>-->
        					    	<input text="search" id="myHouse" placeholder="Search Student" class="form-control input-pad" autocomplete="off"  />	    	    
        		                    <div id="result"></div>
        		          </div>
                         
                         
                       </div>
                       <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                         <select class="selectpicker form-control" name = 'program_id' id="number-multiple" data-container="body" data-live-search="true" title="Program" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                            <?php if(isset($programs_list) && $programs_list > 0){
                                    $p_id = $this->input->get('program_id') ; 
                        foreach($programs_list as $val){
                                
                                    if($val->program_id == $p_id){ ?> 
                                        <option selected value = "<?= $val->program_id ?>"> <?= $val->name ?> </option>  
                                 <?php     }else{ ?>
                                         <option value = "<?= $val->program_id ?>"> <?= $val->name ?> </option> 
                                
                        
                            
                           <?php } }} ?>
                         </select>
                       </div>


                       <div class="col-lg-6 col-md-4 col-sm-6 mb-3">
                         <select class="selectpicker form-control" name = "status" id="number-multiple" data-container="body" data-live-search="true" title="Student Status " data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                           <option <?= ($this->input->get('status') == 'Prospects') ? 'selected' :'' ?> >Prospects</option>
                           <option <?= ($this->input->get('status') == 'Toured') ? 'selected' :'' ?> >Toured</option>
                           <option <?= ($this->input->get('status') == 'Applied') ? 'selected' :'' ?> >Applied</option>
                           <option <?= ($this->input->get('status') == 'Waitlist') ? 'selected' :'' ?> >Waitlist</option>
                         </select>
                       </div>

                       <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                         <div class="form-group">
                           <div class="input-group input--style">
                             <div class="input-group-addon">                          
                               <i class="fad fa-calendar-alt"></i>
                             </div>
                             <input type="date" class="form-control pull-right" name = 'Fdate' id="datepicker2" 
                             placeholder="From Desired Start Date" autocomplete="off" value = "<?= $this->input->get('Fdate') ?>">
                           </div>
                         </div>
                       </div>

                       <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                         <div class="form-group">
                           <div class="input-group input--style">
                             <div class="input-group-addon">
                               <i class="fad fa-calendar-alt"></i>
                             </div>
                             <input type="date" class="form-control pull-right" name = 'Tdate' id= "todatepicker2"
                                    placeholder="To Desired Start Date" autocomplete="off" value = "<?= $this->input->get('Tdate') ?>" >
                           </div>
                         </div>
                       </div>

                       <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                          
                         <select class="selectpicker form-control" name = 'min_age'  id="number-multiple" data-container="body" data-live-search="true" title="Min Age" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                                           
                        <option<?= ($this->input->get('min_age')  == 3) ? 'selected' :'' ?> value = '3' >3year</option>
                        <option <?= ($this->input->get('min_age') == 4) ? 'selected' :'' ?>value = '4' >4year</option>
                        <option<?=  ($this->input->get('min_age') == 5) ? 'selected' :'' ?> value = '5' >5year</option>
                        <option <?= ($this->input->get('min_age') == 6) ? 'selected' :'' ?> value = '6' >6year</option>
                        <option <?= ($this->input->get('min_age') == 8) ? 'selected' :'' ?> value = '8' >8year</option>
                        <option <?= ($this->input->get('min_age') == 9) ? 'selected' :'' ?> value = '9' >9year</option>
                        <option <?= ($this->input->get('min_age') == 10) ? 'selected' :'' ?> value = '10' >10year</option>
                        <option <?= ($this->input->get('min_age') == 11) ? 'selected' :'' ?> value = '11' >11year</option>
                        <option <?= ($this->input->get('min_age') == 12) ? 'selected' :'' ?>  value = '12' >12year</option>
                                                        

                         </select>
                       </div>

                       <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                         <select class="selectpicker form-control" name = 'max_age' id="number-multiple" data-container="body" data-live-search="true" title="Max Age " data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                         <option <?= ($this->input->get('max_age') == 4) ? 'selected' :'' ?>value = '4' >4year</option>
                        <option<?=  ($this->input->get('max_age') == 5) ? 'selected' :'' ?> value = '5' >5year</option>
                        <option <?= ($this->input->get('max_age') == 6) ? 'selected' :'' ?> value = '6' >6year</option>
                        <option <?= ($this->input->get('max_age') == 7) ? 'selected' :'' ?> value = '7' >7year</option>
                       
                        <option <?= ($this->input->get('max_age') == 8) ? 'selected' :'' ?> value = '8' >8year</option>
                        <option <?= ($this->input->get('max_age') == 9) ? 'selected' :'' ?> value = '9' >9year</option>
                        <option <?= ($this->input->get('max_age') == 10) ? 'selected' :'' ?> value = '10' >10year</option>
                        <option <?= ($this->input->get('max_age') == 11) ? 'selected' :'' ?> value = '11' >11year</option>
                        <option <?= ($this->input->get('max_age') == 12) ? 'selected' :'' ?>  value = '12' >12year</option>
                    
                         </select>
                       </div>


                       <div class="col-lg-12 col-md-4 col-sm-6 text-end">
                         <a href="<?= base_url('Admissions') ?>" class="btn btn-lights mt-5 waves-effect  mr--1">Reset</a>
                         <button type="submit" class="btn btn-primary mt-5 waves-effect shadow mr-3">Search</button>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </form>
         </div>
       </div>



      <div class="myadmin-alert alertchat myadmin-alert-img alert-info myadmin-alert-bottom alertbottom2"> 
             <!-- <a href="#" class="closed">&times;</a> -->
             <div class="d-flex">
             <h1><i class="fad fa-users-medical"></i> &nbsp;Selected all students</h1>
             <h5><button  class="btn btn btn-primary mt-10 waves-effect shadow my_funs">Message Selected Families</button></h5>
             </div>
          </div>

      <div class="row addmisstyion_list">
         <div class="col-12">
           <div class="box">
             <div class="box-body">
               <div class="table-responsive">
                 <table class="table table-hover mb-0 parent_list" id="complex_header">
                   <thead>
                     <tr>
                      <th class="w20a">
                        <input type="checkbox" id="md_checkbox_24" class="filled-in chk-col-info showbottom2" onClick="toggle(this)" >
                        <label for="md_checkbox_24" class=""></label>
                      </th>
                       <th>Student Name</th>
                       <th>Age</th>
                       <th>Program(s) </th>
                       <th>Min/Max Age </th>
                       <th>Paperwork Date</th>
                       <th>Desired Start</th>
                       <th>Sibling Attending</th>
                       <th>Pending Forms</th>
                       <th>School Status </th>
                     </tr>
                   </thead>

                   <tbody>
                     <?php if(isset($list) && $list > 0){
                        foreach($list as $val){?>       
                                 <tr>
                      <td class="w20a">
                        <input type="checkbox" id="md_checkbox_<?= $val->temp_s_id ?>" value = "<?= $val->temp_s_id ?>" class="filled-in chk-col-info" name="checkboxx">
                        <label for="md_checkbox_<?= $val->temp_s_id ?>"></label>
                      </td>
                       <td>
                         <div class="student_list">
                           <a href="#">
                             <div class="avtar_img">
                               <img src="assets_pages/images/avatar.png">
                             </div>
                             <div class="info_title">
                               <h5><?= $val->student_name ?></h5>
                             </div>
                           </a>
                         </div>
                       </td>
                       <td><?= $val->age ?> year</td>                     
                       <td><?= $val->class_name ?></td>
                       <td><?= ($val->max_age == 0)? $val->min_age.' Year/': $val->min_age.' Year/ '. $val->max_age.' Year' ?> </td>
                       <td><?= date('d-m-Y',strtotime($val->date) ) ?></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td>
                        <div class="d-flex align-items-center justify-content-end">
                         <div class="select_drop">
                           <select class="selectpicker form-control" onchange="school_status_fun(this.value , <?= $val->temp_s_id ?>)"> >
                             <option <?= ($val->school_status == 'Prospects')?  'selected': '' ?> >Prospects</option>
                             <option <?= ($val->school_status == 'Toured')?  'selected': '' ?>>Toured</option>
                             <option <?= ($val->school_status == 'Applied')?  'selected': '' ?> >Applied</option>
                             <option <?= ($val->school_status == 'Waitlist')?  'selected': '' ?> >Waitlist</option>
                           </select>
                         </div>
                         
                           <a href="<?= ($val->btn_show > 0)? base_url('Admissions/chatbot/').$val->temp_s_id : base_url('Admissions/message_new?student_id=').$val->temp_s_id ?>" class="chatuser btn btn-light" data-bs-toggle="tooltip" data-bs-original-title="Send Message"><i class="icon-Chat2"></i></a>
                           </div>
                       </td>
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
 <script src="<?= base_url() ?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script src="<?= base_url() ?>assets_pages/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <script src="<?= base_url() ?>assets_pages/src/js/pages/notification.js"></script>
 <script type="text/javascript">
   //Date picker
   $('#datepicker').datepicker({
     autoclose: true
   });
   //Date picker
   $('#todatepicker').datepicker({
     autoclose: true
   });

    function toggle(source) {
      checkboxes = document.getElementsByName('checkboxx');
      for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
      }
    }
 </script>
 <script>
 
        function school_status_fun(s_status,id){
              $.ajax({
        type: 'post',
        url: "<?= base_url('Admissions/update_school_status') ?>",
        data: {id:id,s_status:s_status},
        async: false,
                                                                                                                      
        success: function(data){
          var res = $.parseJSON(data);
          if (res.status){
              window.location.reload(); 
            }
            
        }
        });
        
        }
 
  $('.addmission').addClass('active');
</script>
<script>
   $("body").on('keyup','#myHouse',function(){
          
          var name = $(this).val();
          
        
          
          $.ajax({
        type: "POST",                               
        url: "<?= base_url('Admissions/search_student') ?>" ,
        data: {name:name},
        success: function(result) {
          var res = $.parseJSON(result);
          var htmls = '';
          if(res.status){
             htmls =  `<ul >`;
            for(var i =0;i<res.body.length; i++){  // style= 'list-style:none' 
                htmls += `<li class ='listitem btn '  data = "${res.body[i].user_id}">${res.body[i].name}</li>`;
            } 
            htmls += `</ul>`;
            $("#result").html(htmls);
             
          }else{ $("#result").html('');  }
        }                                   
    });  
          
          
                                              
      }) ; 
                                     
     
    $('body').on('click', ".listitem", function(){                                   
            var values = $(this).html();
            var ids = $(this).attr('data');
               $('#myHouse').val(values);
               $('#h_user_id').val(ids);
               $('#result').html('');
            
            window.location.href = "<?= base_url('Admissions/index/') ?>" +ids ; 
            return false;
        }); 
    
    $(document).ready(function(){
         let id = "<?= $this->uri->segment(3) ?>";
                console.log( 'jk new ids == '+ id);    
                if(id != ''){   $('#myHouse').val("<?= isset($s_name)? $s_name : ''  ?>");
                                  $('#h_user_id').val(id);   
                              }
         
        });

                          
    $('body').on('click', ".my_funs", function(){ 
        var selected = new Array();
             $("input:checkbox[name=checkboxx]:checked").each(function() {
                   selected.push($(this).val());
            });
        // var m_str = selected.toString();
        window.location.href = "<?= base_url('Admissions/message_new?student_ids=')?>"+selected;
        
        
         }); 
    
    
    
    
    
</script>
