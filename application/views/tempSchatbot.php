 <?php include ('include/header.php'); ?>
<style>
    textarea {
    width: 100%;
    border: none;
    outline: none;
}
.bg-lighter {
    background-color: #ebedf3 !important;
    width: 50%;
}
.theme-primary .bg-primary {
    background-color: #69aed3 !important;
    color: #ffffff;
    width: 50%;
}
</style>

 <div class="content-wrapper">
   <div class="container-full">
 <section class="content">
      
       <div class="row">
         <div class="col-12">
              <div class="card">
                   <div class="card-body">
        <form action="#" method="post">
          <div class="box no-radius">
            <div class="box-header">
              <div class="media align-items-top p-0">
                <a class="avatar avatar-lg status-success mx-0" href="#">
                  <img src="https://ailive.in/meritcard_dev/assets_pages/images/avatar.png" class="rounded-circle" alt="...">
                </a>
                <div class="d-lg-flex d-block justify-content-between align-items-center w-p100">
                  <div class="media-body mb-lg-0 mb-20">
                    <p class="fs-16">
                      <a class="hover-primary" href="#"><strong><?= (isset($chat_data[0]->student_name)) ? $chat_data[0]->student_name  : '' ?></strong></a>
                    </p>
                   <!-- <p class="fs-12">Last Seen 10:30pm ago</p>-->
                  </div>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div class="">
                <div class="chartDiv">
                   <?php if(isset($chat_data) && $chat_data > 0){
                                  
                        foreach($chat_data as $val){ ?>     
                                     
                <div class="clearfix"></div>
                  <div class="card d-inline-block mb-3   <?= ($val->sender_type == 'school_staff')? ' float-end bg-primary ' : ' float-start bg-lighter ' ?>  me-2 no-shadow  max-w-p80">
                    <div class="position-absolute pt-1 r-0">
                      <span class="text-extra-small "><?=  date('h:i:s a',strtotime($val->date.' ' .$val->time)) ?></span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="https://ailive.in/meritcard_dev/assets_pages/images/avatar.png" class="avatar me-10">
                        </a>
                        <div class="d-flex flex-grow-1 min-width-zero">
                          <div class="m-2 ps-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                            <div class="min-width-zero">
                              <p class="mb-0 fs-16  <?= ($val->sender_type == 'school_staff')? 'text-white' : 'text-dark' ?> "><?= ($val->sender_type == 'school_staff')? 'Admin' : $val->student_name ?></p>
                            </div>
                          </div>
                        </div>                                                             
                      </div>
                      <div class="chat-text-start ps-55">
                        <p class="mb-0 text-semi-muted"><?= $val->massage ?> </p>
                      </div>
                    </div>                          
                  </div>
                   
            <?php } } ?>  
                  
                  <!-- <div class="clearfix"></div>
                  <div class="card d-inline-block mb-3 float-end me-2 bg-primary max-w-p80">
                    <div class="position-absolute pt-1 pe-2 r-0">
                      <span class="text-extra-small">09:41</span>
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <a class="d-flex" href="#">
                          <img alt="Profile" src="https://ailive.in/meritcard_dev/assets_pages/images/avatar.png" class="avatar me-10">
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
                          <img alt="Profile" src="https://ailive.in/meritcard_dev/assets_pages/images/avatar.png" class="avatar me-10">
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
                          <img alt="Profile" src="https://ailive.in/meritcard_dev/assets_pages/images/avatar.png" class="avatar me-10">
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
                          <img alt="Profile" src="https://ailive.in/meritcard_dev/assets_pages/images/avatar.png" class="avatar me-10">
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
                  </div>-->
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
            
            window.location.href = "<?= base_url('Admissions/addmission_waitlists/') ?>" +ids ; 
            return false;
        }); 
    
    $(document).ready(function(){
         let id = "<?= $this->uri->segment(3) ?>";
                console.log( 'jk new ids == '+ id);    
                if(id != ''){   $('#myHouse').val("<?= isset($s_name)? $s_name : ''  ?>");
                                  $('#h_user_id').val(id);   
                              }
         
        });
      $('.addmission').addClass('active');
      
  
</script>