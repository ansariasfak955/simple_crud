  <?php 
       error_reporting(0);
       $admin_id = $this->session->userdata['id']['id'];
      $admin_name = $this->session->userdata['name']['name']; 
      $admin_email= $this->session->userdata['email']['email']; 
    
      if($admin_id==""){?><script>alert('Please Login to your account'); window.location.assign('<?php echo base_url();?>Login/logout'); </script><?php }

     $sqll = $this->db->query("select * from subadmin_contant where sbad_id = '$admin_id'");
            
             foreach($sqll->result_array() as $sbrw)
             {
                $subid = $sbrw['sbad_id'];
                $hm = $sbrw['home'];
                $cat = $sbrw['category'];
                $user = $sbrw['user'];
                $orderr = $sbrw['orderr'];
                $referral = $sbrw['referral'];
                $quiz = $sbrw['quiz'];
                $advrs = $sbrw['advertisement'];
                $wrd = $sbrw['words'];
                $pg = $sbrw['pages'];
                $rpt = $sbrw['reports'];
                $pkg = $sbrw['packages'];
                $sbsb = $sbrw['subscription'];
             }
     ?>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <title>IRON GATE admin | Home</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>material/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>material/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>material/dist/css/style.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/libs/select2/dist/css/select2.min.css">
      
     
 <style>
  .sidebar-nav ul .sidebar-item .sidebar-link i
     {
             width: 38px !important;
             font-size: 20px !important;
     }
 </style>  
</head>


<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>


<script>
    
</script>


  
  <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                
    
    
  
  <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="<?php echo base_url()?>Home">
                        <!-- Logo icon -->
                        <b class="logo-icon"> IRON GATE </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                           <!--  <img src="<?php echo base_url();?>material/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                              
                             <img src="<?php echo base_url();?>material/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />-->
                            
                        </span>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                       
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown"> 
             <style>
             .badge-notify{
   background:orange;
   position:absolute;
   top:6px !important;;
   margin-left:15px !important;
   border-radius:50px !important;;
   font-size:12px !important;;
  }
  
             .badges-notifys{
   background:orange;
   position: relative;
   top:0px !important;;
   margin-left:15px !important;
   border-radius:50px !important;;
   font-size:12px !important;;
  }
             </style>           
   


                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="<?php echo base_url()?>Notification"  aria-haspopup="true" aria-expanded="false" ><i class="mdi mdi-bell font-24">
                             <span class="badge badge-notify noticediv"></span>
                             </i>
                            </a>
                           
                        </li>
                        <li class="nav-item dropdown">
   
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <span class="with-arrow"><span class="bg-danger"></span></span>
                                
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url();?>material/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class=""><img src="<?php echo base_url();?>material/assets/images/users/1.jpg" alt="user" class="img-circle" width="60"></div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?php 
                            $sqllad = $this->db->query("select * from admin where id = '$admin_id'");
                                   foreach($sqllad->result_array() as $rrd)
                                          {
                                            echo  $adname = $rrd['admin_name'];
                                          }
                                       
                                        ?></h4>
                                        <p class=" m-b-0"><?php
                                         echo $admin_email;
                                         ?></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="<?php echo base_url();?>Profile/myprofile"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url();?>Profile/myprofile"><i class="ti-settings m-r-5 m-l-5"></i> Password Change</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url();?>Login/logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="<?php echo base_url();?>Profile/myprofile" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
  <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic">

                                    <img src="<?php echo base_url();?>material/assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium"><?php $sqllad = $this->db->query("select * from admin where id = '$admin_id'");
                                   foreach($sqllad->result_array() as $rrd)
                                          {
                                            echo  $adname = $rrd['admin_name'];
                                          }
                                       ?> <i class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><?php echo $admin_email;?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="<?php echo base_url();?>Profile/myprofile"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                        
                                        
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Profile/myprofile"><i class="ti-settings m-r-5 m-l-5"></i> Password Change</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url();?>Login/logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="p-15 m-t-10"><a href="javascript:void(0)" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">
                            <?php 
                            if($admin_id=='1'){ echo "Admin"; }
                            else { echo "Subadmin"; } 
                            ?>
                        </span> </a></li>
                        <!-- User Profile-->

                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Personal</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-home" aria-hidden="true"></i><span class="hide-menu">Home </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Home" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard </span></a></li>
                                                               
                            </ul>
                        </li>
                        <?php if($admin_id=='1'){?>
                          <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-sliders-h"></i><span class="hide-menu"> Sliders</span></a>

                            <ul aria-expanded="false" class="collapse  first-level">
                              <li class="sidebar-item"><a href="<?php echo base_url();?>Home_slider" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View  Slider </span></a></li>
                              <li class="sidebar-item"><a href="<?php echo base_url();?>Home_slider/add_home_slider" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add Slider </span></a></li>                         
                            </ul>
                         </li>
                       
                          <li class="sidebar-item">  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Users </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>User" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View Users </span></a></li>

                            
                            </ul>
                            
                        </li>
                        
                        
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-th-large" aria-hidden="true"></i><span class="hide-menu">Categories</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Category" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Category</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('CatFaq');?>" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Category's FAQ </span></a></li>          
                                 
                            </ul>
                        </li>  
                        
                          <li class="sidebar-item"> 
                           <a href = "<?= base_url('User/emp_type') ?>" class="sidebar-link" ><i class="fa fa-list" aria-hidden="true"></i> <span style="color:white; ">Type</span></a>
                          </li>
                        
                      
                         <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fab fa-product-hunt"></i><span class="hide-menu">Packages</span></a>

                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Product" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View Packeges </span></a></li> 
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Product/add_product" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add Packeges </span></a></li>                             
                            </ul>
                         </li>
                       
                       
                       
                       <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-gift"></i><span class="hide-menu">Offers</span></a>

                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Promocodes" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View Offers </span></a></li> 
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Promocodes/add_promocodes" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add Offers</span></a></li>                             
                            </ul>
                         </li>
                       <!--leauge-->
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-shopping-cart "></i><span class="hide-menu">Orders </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Orders/select_all_order" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View Orders </span></a></li>
                              <!--  <li class="sidebar-item"><a href="<?php echo base_url();?>Orders/select_unsuccess_order" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Unsuccessful Orders </span></a></li>
                                   -->
                            </ul>
                        </li>
                       
                         
                      
                        <li class="sidebar-item"> 
                           <a href = "<?= base_url('Orders/view_payments') ?>" class="sidebar-link" ><i class="fa fa-credit-card" style="font-size:20px;color:white"> </i> <span style="color:white; ">View Payments</span></a>
                                
                         </li>
                         
                        <li class="sidebar-item"> 
                           <a href = "<?= base_url('Subadmin/select_subadmin_data') ?>" class="sidebar-link" ><i class="fa fa-users" style="font-size:20px;color:white"> </i> <span style="color:white; ">Employees</span></a>
                                
                         </li>
                         
						<li class="sidebar-item">  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-list-alt" aria-hidden="true"></i><span class="hide-menu">Blog </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Blog" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View Blog </span></a></li>

                                <li class="sidebar-item"><a href="<?php echo base_url();?>Blog/add_blog" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add Blog </span></a></li>     
                            </ul>
                        </li>
				   <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-star"></i></i><span class="hide-menu"> Reviews</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                              
                              <li class="sidebar-item"><a href="<?php echo base_url("Home/view_reviews");?>" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">View Reviews</span></a></li>
                                               
                            </ul>
                        </li>
					
                         
                         <li class="sidebar-item"> 
                           <a href = "<?= base_url('Content_page/update_rows/5') ?>" class="sidebar-link" ><i class="fa fa-info-circle" aria-hidden="true"></i> <span style="color:white; "> About Us</span>
                            </a>
                        </li>
                        
                         <li class="sidebar-item"> 
                           <a href = "<?= base_url('Orders/subscription_users') ?>" class="sidebar-link" ><i class="fa fa-hand-pointer" aria-hidden="true"></i> 
                           <span style="color:white; ">Subscribers</span>
                            </a>
                        </li>
                         <li class="sidebar-item">  <a class="sidebar-link waves-dark" href="<?php echo base_url();?>Home/calendar" aria-expanded="false">
                           <i class="fa fa-calendar" aria-hidden="true"></i><span class="hide-menu">Calendar </span></a>
                         
                        </li>
                      
                        <li class="sidebar-item"> 
                           <a href = "<?= base_url('Home/social_media') ?>" class="sidebar-link" ><i class="fa fa-eye" style="font-size:20px;color:white"> </i> <span style="color:white; ">Social Media</span></a>
                        </li>  
                        
                          <li class="sidebar-item"> 
                           <a href = "<?= base_url('LocationMaster') ?>" class="sidebar-link" ><i class="fa fa-eye" style="font-size:20px;color:white"> </i> <span style="color:white; ">Location Master </span></a>
                        </li>  
                        
                        
                        
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-phone-square" aria-hidden="true"></i><span class="hide-menu">Contact Us</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Blog/help_support" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View Contact Us </span></a></li>
                            </ul>
                        </li>
						
						
						

                       <?php } else { ?>

                                 <?php if($cat == 'Category'){  ?>


                     <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Apps</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-format-list-bulleted"></i><span class="hide-menu">Category & Subcategory </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Category" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Category </span></a></li>
                                
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Subcategory/subcategory" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Subcategory </span></a></li>
                              <!--  <li class="sidebar-item"><a href="<?php echo base_url();?>Childcategory/childcategory" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Childcategory </span></a></li>
                                -->
                                
                                
                            </ul>
                        </li>


                              <?php } ?>



                               <?php if($user == 'User'){  ?>


                     <li class="sidebar-item">  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Users </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>User" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View User </span></a></li>

                                <li class="sidebar-item"><a href="<?php echo base_url();?>User/add_user" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add User </span></a></li>
                                
                             
                                
                                
                            </ul>
                        </li>


                              <?php } ?>

                                <?php if($orderr == 'Order'){  ?>


                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-trophy-award"></i><span class="hide-menu">Orders </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Orders/select_all_order" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View Orders </span></a></li>
                                
                               
                                
                            </ul>
                        </li>

                              <?php } ?>

                           
                             <?php if($advrs == 'Advertisement'){ ?>
                                 <li class="sidebar-item"> 
                           
                         <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-gamepad"></i><span class="hide-menu">Advertisment </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                        
                                 <li class="sidebar-item"><a href="<?php echo base_url();?>Advertise" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View Advertise </span></a></li>
                                  <li class="sidebar-item"><a href="<?php echo base_url();?>Advertise/add_advertise" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add Advertise </span></a></li>
                                
                                                                                                
                            </ul>
                         </li>
                           
                              <?php  }?>
                              
                               <?php if($pg == 'Page'){ ?>
                                 <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">Pages </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url();?>Content_page" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View Page </span></a></li>                                
                                                                                                
                            </ul>
                         </li>in

                               <?php } ?>
                               
                         <?php if($pkg == 'Package') { ?>
                          <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-qrcode"></i><span class="hide-menu">Packages</span></a>

                            <ul aria-expanded="false" class="collapse  first-level">
                              <li class="sidebar-item"><a href="<?php echo base_url();?>Package" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> View Package </span></a></li>
                              <li class="sidebar-item"><a href="<?php echo base_url();?>Package/add_package_data" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Add Package </span></a></li>                                                                                                

                            </ul>
                         </li>

                               <?php } ?>
                           
                               
                        
                           <?php } ?>
                        <!--end promation-->


                      
                        
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        
       