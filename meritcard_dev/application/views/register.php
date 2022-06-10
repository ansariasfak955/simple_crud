<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<!--     <link rel="icon" href="https://crm-admin-dashboard-template.multipurposethemes.com/images/favicon.ico">
 -->    <title>CRMi - Registration </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Vendors Style-->
    <link rel="stylesheet" href="<?= base_url('assets_pages/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets_pages/vendor_components/bootstrap/dist/css/bootstrap.css') ?>">
  <style>
     /* .option_category
      {
          display:none;
      }*/
  </style>
  </head>

  <body class="hold-transition theme-primary bg-color">

    <div class="container h-p100">
      <div class="row justify-content-md-center h-p100">
        <div class="card_div">

          <!-- Which best describes you? -->
          <div class="option_category bg-white rounded10 shadow-lg">
            <i class="fa fa-graduation-cap brand-logo"></i>
            <h4 class="text-navy">Which best describes you?</h4>
            <a href="#" class="btn btn-outline account_open" data = 'staff' >Staff or Teacher</a>
            <a href="#" class="btn btn-outline account_open" data = 'parent' >Parent</a>
          </div>


          <!-- Which would you like to do? -->
          <div class="option_category_old bg-white rounded10 shadow-lg">
            <i class="fa fa-graduation-cap brand-logo"></i>
            <h4 class="text-navy">Which would you like to do?</h4>
            <a href="#" class="btn btn-outline join_newscholl"  data = ''   >Create New School or Classroom</a>
            <a href="#" class="btn btn-outline join_account"  data = '' >Join a School</a>
            <div class="text-center">
              <a href="#" class="mt-15 mb-2 text-title btn-back d-block">Back</a>
              <a href="<?= base_url('Login/login') ?>" class="text-title">Already have an account?</a>
            </div>
          </div>

        </div>

        <!-- Sign Up -->
        <div class="col-12 div_sigup" >
          <div class="row justify-content-center g-0">
            <div class="col-lg-5 col-md-5 col-12">
              <div class="bg-white rounded10 shadow-lg">
                <div class="content-top-agile p-20 pb-0">
                  <i class="fa fa-graduation-cap brand-logo" style="font-size: 40px;color: #000056;"></i>
                  <h2 class="text-navy">Get started with Us</h2>
                  <p class="mb-0 fnt-17">Register a new membership</p>
                </div>
                <div class="p-40">
                  <form action="" id = 'reg_Form' method="post">
                    <div class="form">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="fistname" name = 'f_name' required placeholder="name@example.com">
                            <label for="fistname">First Name</label>
                           
                          </div>
                           <input type = 'hidden' name = 'u_type' id = 'u_type'  value = '' >
                        </div>
                        <div class="col-md-6">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="lastname" name= 'l_name' required  placeholder="name@example.com">
                            <label for="lastname">Last Name</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="emailaddres" name = 'email' required placeholder="name@example.com">
                      <label for="emailaddres">Email Address</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="password" name = 'pass' required  placeholder="name@example.com">
                      <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="confripass" required  placeholder="name@example.com">
                      <label for="confripass">Confirm Password</label>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="checkbox">
                          <input type="checkbox" id="basic_checkbox_1" name ='check_terms'  >
                          <label for="basic_checkbox_1">I agree to the <a href="#" class="text-warning"><b>Terms</b></a></label>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-12 text-center">
                          <p class = 'text-danger' id ='error'></p>
                        <button type="submit" class = "btn btn-navy btn_account_2 mt-10" >Get started</button>
                      </div>
                      <!-- /.col -->
                    </div>
                  </form>
                  <div class="text-center">
                    <a href="<?= base_url('Login/login') ?>" class="text-title mt-3 d-block">Already have an account?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 

        <!-- Email verification -->
        <div class="col-12 email_account">
          <div class="row justify-content-center g-0">
            <div class="col-lg-5 col-md-5 col-12">
              <div class="bg-white rounded10 shadow-lg">
                <div class="content-top-agile p-20 pb-0">
                  <i class="fa fa-envelope-o brand-logo" style="font-size: 40px;color: #000056;"></i>
                  <h2 class="text-navy">Verify Email Address</h2>
                  <p class="mb-0 email_text">Code sent to <span id = 'view_email'><?= $this->session->userdata('email') ?></span></p>
                </div>
                <div class="p-40">
                  <form action="" id = 'email_Form' method="post">
                   <div class="form-floating mb-3">
                      <input type="text" class="form-control" name = 'e_code' >
                      <label for="code">Verification Code</label>
                    </div>
                    <div class="row">
                      <!-- /.col -->
                      <div class="col-12 text-center">
                          <p class = 'email_error text-danger'></p>
                        <button type="submit" class="btn btn-navy mt-10">Confirm</button>
                      </div>
                      <!-- /.col -->
                    </div>
                  </form>
                  <div class="text-center">                          
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- create a new scholl -->
        <div class="col-12 create_school">
          <div class="row justify-content-center g-0">
            <div class="col-lg-5 col-md-5 col-12">
              <div class="bg-white rounded10 shadow-lg">
                <div class="content-top-agile p-20 pb-0">
                  <i class="fa fa-graduation-cap brand-logo" style="font-size: 40px;color: #000056;"></i>
                  <h2 class="text-navy">Tell us a bit about your <br>school or program.</h2>
                </div>
                <div class="p-30">
                  <form action="" id = "make_school" method="post">
                   <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="school_name" placeholder="name@example.com" name="school_name">
                      <label for="school_name">School or program name*</label>
                    </div>
                    <input name = 'admin_id' id = 'addmin_ids' type = 'hidden' value ='' >
                   <div class="form-group">
						<label class="form-label">Program type*</label>
						<select class="form-controls" name = 'school_type' >
						  <option value="">Preschool or child care</option>
						  <option value="">After school</option>
						  <option value="">Camp</option>
						  <option value="">Other</option>
						</select>
					  </div>
                    <div class="form-floating mb-4">
                      <input type="number" class="form-control" id="capacity" placeholder="name@example.com" name="capacity">
                      <label for="confripass">Enrollment capacity*</label>
                    </div> 
                     <div class="form">
                      <div class="row">
                        <div class="col-md-6">
                            <select class="form-controls">
						  <option value="" disabled="" selected="">State/province*</option>
						  <option value="">India</option>
						</select>
                        </div>
                        <div class="col-md-6">
                        <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="capacity" placeholder="name@example.com" name="mobile">
                      <label for="confripass">Phone number*</label>
                    </div> 
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <!-- /.col -->
                      <div class="col-12 text-center">
                        <button type="submit" class="btn btn-navy btn_account_3 mt-10">Create Account
                        </button>
                      </div>
                      <!-- /.col -->
                    </div>
                  </form>
                  <div class="text-center">
                 <a href="<?= base_url('Login/register') ?>" class="mt-3 mb-2 text-title d-block">Back</a>
                 <a href="<?= base_url('Login/login') ?>" class="text-title mt-3 d-block">Already have an account?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 

      </div>
    </div>
    <script src="<?= base_url('assets_pages/src/js/vendors.min.js') ?>"></script>
    <script>
    
    
    
      $(document).ready(function() {
          
             $(".option_category_old").css("display", "none");
             
         	$(".account_open").click(function() {
            $(".option_category").css("display", "none");
       
         var m_type =  $(this).attr('data'); 
          $('#u_type').val( m_type); 
            /// alert('jk =='+m_type); 
          $(".div_sigup").css("display", "block");
        });
        $(".btn_account").click(function() {
          $(".option_category_old").css("display", "block");
          $(".div_sigup").css("display", "none");
        });
         $(".btn-back").click(function() {
          $(".option_category_old").css("display", "none");
          $(".div_sigup").css("display", "block");
        });
        $(".join_account").click(function() {
          $(".email_account").css("display", "block");
          $(".div_sigup").css("display", "none");
          $(".option_category_old").css("display", "none");
        });
         $(".join_newscholl").click(function() {
          $(".create_school").css("display", "block");
          $(".card_div").css("display", "none");
          //$(".div_sigup").css("display", "none");
          $(".option_category_old").css("display", "none");
        });
      });
      
        $(document).ready(function(){
              let admin_id = "<?= $this->session->userdata('admin_id') ?>";
          let org_id   = "<?= $this->session->userdata('org_id')  ?>";
              //alert(admin_id + "  == jk == "+ org_id  );
                                        
        if(admin_id >0 && org_id >0 )                  
          {
             $(".email_account").css("display", "block");  
              $(".option_category").css("display", "none");
             
          }else if(admin_id >0)
                {                                                                            
                       $(".option_category_old").css("display", "block");
                       $(".div_sigup").css("display", "none");
                       $(".option_category").css("display", "none");
                      
                }
            
        });
      
      ///////////////////////////////////////////
      
      $('body').on('submit','#reg_Form',function(e){
          e.preventDefault();
        let pass = $('#password').val();  
        let repass = $('#confripass').val();  
        
        if(pass.length >1 && (pass == repass)){
            
        }else{
          
          $('#error').html('**Invalid password');
          
           setTimeout(function(){  $('#error').html('');}, 5000);
          return false;  
        }
         
         
           $.ajax({
        type: 'post',
        url: "<?= base_url('Login/add_user');?>",
        data: $(this).serialize(),
        async: false,

        success: function(data) {
          var res = $.parseJSON(data);
          if (res.status) {
                 $(".option_category_old").css("display", "block");
                   $(".div_sigup").css("display", "none");
                   $(".card_div").css("display", "flex");
                   
                   $('#addmin_ids').val(res.body);
           }else{
                       $('#error').html(res.msg);
                        setTimeout(function(){  $('#error').html('');}, 5000);
                      return false;  
                }
        }
        
        
        
           });
////////////////////////          
      });
      $('body').on('submit','#make_school',function(e){
          e.preventDefault();
      
           $.ajax({
        type: 'post',
        url: "<?= base_url('Login/make_school') ?>",
        data: $(this).serialize(),
        async: false,

        success: function(data) {
          var res = $.parseJSON(data);
          if (res.status){
                 $(".email_account").css("display", "block"); 
                 $(".create_school").css("display", "none");  
                 $('#view_email').html(res.body);
          }}
        
        
        
           });
////////////////////////          
      });
      
   /////////  email Form  function ////////////////////////////////////
    $('body').on('submit','#email_Form',function(e){
          e.preventDefault();
      
        $.ajax({
        type: 'post',
        url: "<?= base_url('Login/email_varification');?>",
        data: $(this).serialize(),
        async: false,

        success: function(data) {
          var res = $.parseJSON(data);
          if (res.status) {
                window.location.href = "<?= base_url('Dashboard') ?>"; 
          }else{
                        $('.email_error').html(res.msg);
                        setTimeout(function(){  $('.email_error').html('');}, 5000);
                      return false;
          }
        }
        
        
        
           });
////////////////////////          
      });
    </script>
  </body>
  
</html>
