<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">   
    <title>Meritcard</title>
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	  
	<!-- Style-->  
<link rel="stylesheet" href="<?= base_url('assets_pages/css/style.css') ?>">	
<link rel="stylesheet" href="<?= base_url('assets_pages/vendor_components/bootstrap/dist/css/bootstrap.css') ?>">
</head>
	
<body class="hold-transition theme-primary bg-color">
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<i class="fa fa-graduation-cap brand-logo" 
								style="font-size: 40px;color: #000056;"></i>
								<h2 class="text-navy">Let's Get Started</h2>
								<p class="mb-0">Sign in to continue to Meritcard.</p>							
							</div>
							<div class="p-40">
								<form  id = 'log_Form' method="post">
									<div class="form-floating mb-4">
									  <input type="email" class="form-control" name = 'email' placeholder="name@example.com">
									  <label for="floatingInput">Email address</label>
									</div>
									<div class="form-floating mb-4">
									  <input type="password" class="form-control" name="pass" placeholder="name@example.com">
									  <label for="floatingInput">Password</label>
									</div>
									 <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-end">
											<a href="" class="hover-warning text-navy"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										    <p class = 'f_error text-danger'></p>
										  <button type="submit" class="btn btn-navy mt-10">SIGN IN</button>
										</div>
										<!-- /.col -->
									  </div>
								  </form>	
								<div class="text-center">
									<p class="mt-15 mb-2 title-alert">Don't have an account? </p>
									<a href="<?= base_url('Login/register') ?>" class="text-title">Sign Up</a>
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
	    
	     $('body').on('submit','#log_Form',function(e){
          e.preventDefault();
      
           $.ajax({
        type: 'post',
        url: "<?= base_url('Login/login_new') ?>",
        data: $(this).serialize(),
        async: false,

        success: function(data) {
          var res = $.parseJSON(data);
          if (res.status){
              window.location.href = "<?= base_url('Dashboard') ?>";  
                
              }else{ $('.f_error').html(res.msg);
                        setTimeout(function(){  $('.f_error').html('');}, 4000);
              }}
        });
        
                return false; 
        
           });
	</script>
	
	
</body>
</html>
