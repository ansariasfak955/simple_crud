<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>material/assets/images/favicon.png">
    <title>DLC admin login</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>material/dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?php echo base_url();?>material/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="<?php echo base_url();?>material/assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Reset Password</h5>
                        
                     
                        
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
             <form class="form-horizontal m-t-20"  method="POST" action="<?php echo base_url();?>Login/change">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" name="newpassword" class="form-control form-control-lg"aria-describedby="basic-addon1">
                                    <input type="hidden" name="keys" value="<?php echo $services_id = $this->uri->segment('3');?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" name="rnewpassword" class="form-control form-control-lg" aria-describedby="basic-addon1">
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                         
                                            
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                  <button type="submit" class="btn btn-block btn-lg btn-info">Confirm</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                        
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <div id="recoverform">
                    <div class="logo">
                        <span class="db"><img src="<?php echo base_url();?>material/assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Recover Password</h5>
                        <span>Enter your Email and instructions will be sent to you!</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form method="POST" class="col-12" action="<?php echo base_url();?>Login/forget">
                            <!-- email -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="Email">
                                </div>
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-danger" type="submit" name="submit">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url();?>material/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>material/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>material/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
</body>
</html>