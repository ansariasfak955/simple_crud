<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<!--     <link rel="icon" href="https://crm-admin-dashboard-template.multipurposethemes.com/images/favicon.ico">
 -->    <title>Meritcard</title>
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?= base_url() ?>assets_pages/css/vendors.css">
     <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/css/bootstrap-select.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets_pages/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets_pages/css/style_rtl.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets_pages/css/skin_color.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_pages/vendor_components/sweetalert/sweetalert.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets_pages/css/color_theme.css">
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css">
	  
	<!-- Style-->       
   </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	
  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start d-md-none d-block">	
		<!-- Logo -->
		<a href="<?= base_url('Dashboard') ?>" class="logo">                          
		  <!-- logo-->
		  <div class="logo-mini w-30">
			  <span class="light-logo"><img src="#" alt="logo"></span>
			  <span class="dark-logo"><img src="#" alt="logo"></span>
		  </div>
		  <div class="logo-lg">
			  <span class="light-logo"><img src="#" alt="logo"></span>
			  <span class="dark-logo"><img src="#" alt="logo"></span>
		  </div>
		</a>	
	</div>   
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light" data-toggle="push-menu" role="button">
					<i class="icon-Menu"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			<li class="btn-group d-lg-inline-flex d-none">
				<div class="app-menu">
					<div class="search-bx mx-5">
						<form>
							<div class="input-group">
							  <input type="search" class="form-control" placeholder="Search">
							  <div class="input-group-append">
								<button class="btn" type="submit" id="button-addon3"><i class="icon-Search"><span class="path1"></span><span class="path2"></span></i></button>
							  </div>
							</div>
						</form>
					</div>
				</div>
			</li>
		</ul> 
	  </div>
		
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="dropdown notifications-menu btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" data-bs-toggle="dropdown" title="Notifications">
					<i class="icon-Notifications"><span class="path1"></span><span class="path2"></span></i>
					<div class="pulse-wave"></div>
			    </a>
				<ul class="dropdown-menu animated bounceIn">
				  <li class="header">
					<div class="p-20">
						<div class="flexbox">
							<div>
								<h4 class="mb-0 mt-0">Notifications</h4>
							</div>
							<div>
								<a href="#" class="text-danger">Clear All</a>
							</div>
						</div>
					</div>
				  </li>
				  <li>
					<!-- inner menu: contains the actual data -->
					<ul class="menu sm-scrol">
					  <li>
						<a href="#">
						  <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-user text-primary"></i> Nunc fringilla lorem 
						</a>
					  </li>
					  <li>
						<a href="#">
						  <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
						</a>
					  </li>
					</ul>
				  </li>
				  <li class="footer">
					  <a href="#">View all</a>
				  </li>
				</ul>
			</li>
			
			<li class="btn-group nav-item d-xl-inline-flex d-none">
				<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="" id="live-chat">
					<i class="icon-Chat"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			<li class="btn-group nav-item d-xl-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="Full Screen">
					<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link bg-primary btn-primary w-auto fs-14" title="Full Screen">
					Reports
			    </a>
			</li> 
			                                        
			
		
			
        </ul>
      </div>
    </nav>
  </header>
  
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
		<div class="d-flex align-items-center logo-box justify-content-start d-md-block d-none">	
			<!-- Logo -->
			<a href="<?= base_url('Dashboard') ?>" class="logo">
			 
			  <div class="logo-lg">
				  <span class="light-logo fs-36 fw-700">Merit<span class="text-primary">Card</span></span>
			  </div>
			</a>	
		</div> 
		<div class="user-profile my-15 px-20 py-10 b-1 rounded10 mx-15">
			<div class="d-flex align-items-center justify-content-between">			
				<div class="image d-flex align-items-center">
				    <img src="<?= base_url() ?>assets_pages/images/avatar-13.png" class="rounded-0 me-10" alt="User Image">
					<div>
						<h4 class="mb-0 fw-600"><?= $this->session->userdata('name') ?></h4>
						<p class="mb-0"><?= $this->session->userdata('org_name') ?></p>
					</div>
				</div>
				<div class="info">
					<a class="dropdown-toggle p-15 d-grid" data-bs-toggle="dropdown" href="#"></a>
					<div class="dropdown-menu dropdown-menu-end">
					  <a class="dropdown-item" href="<?= base_url('Dashboard/profile') ?>"><i class="ti-user"></i> Profile</a>
					 
					  <a class="dropdown-item" href="<?= base_url('Dashboard/school_profile') ?>"><i class="ti-link"></i> School settings</a>
					   <a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
					 <!--  <div class="dropdown-divider"></div> -->
					  <a class="dropdown-item" href="<?= base_url('Login/logout') ?>"><i class="ti-lock"></i> Logout</a>
					</div>
				</div>
			</div>
	    </div>
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 97%;">	
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">	                                 
				<li class="header">Main Menu</li>
				<li>
				  <a href="<?= base_url('Dashboard') ?>">
					<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
					<span>Home</span>
				  </a>
				</li>
				<li class="treeview myschool menu-open active">
				  <a href="#">
					<i class="fa-solid fa-school"></i>
					<span>My School</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>                                                  
				  </a>
				  <ul class="treeview-menu" style="display:block;">
					<li class="student"><a href="<?= base_url('Student') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Students</a></li>
					<li class="parent"><a href="<?= base_url('Student/parents') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Parents</a></li>
					<li class="staff"><a href="<?= base_url('Staff') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Staff</a></li>
					<li  class="add_class"><a href="<?= base_url('Room/add_class') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Class</a></li>
					<li  class="rooms"><a href="<?= base_url('Room') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Rooms</a></li>
					<li  class=""><a href="<?= base_url('Staff/schedule') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Schedules</a></li>
					<li><a href="<?= base_url('Dashboard/school_profile') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Settings</a></li>
				  </ul>
				</li>
				<!-- <li class="treeview">
				  <a href="#">
					<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
					<span>Students</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="students_list.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Students List</a></li>
					<li><a href="students.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Students Details</a></li>
				  </ul>
				</li>
				<li>
				  <a href="departments.html">
					<i class="icon-Ticket"></i>
					<span>Departments</span>
				  </a>
				</li>
				<li>
				  <a href="contact_app_chat.html">
					<i class="icon-Chat2"></i>
					<span>Chat</span>
				  </a>
				</li>				  
				<li class="header">Components</li>
				<li class="treeview">
				  <a href="#">
					<i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>
					<span>Features</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">											
					<li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Card
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="box_cards.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>User Card</a></li>
							<li><a href="box_advanced.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Advanced Card</a></li>
							<li><a href="box_basic.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Basic Card</a></li>
							<li><a href="box_color.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Card Color</a></li>
							<li><a href="box_group.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Card Group</a></li>
						</ul>
					</li>												
					<li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>BS UI
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="ui_grid.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Grid System</a></li>
							<li><a href="ui_badges.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Badges</a></li>
							<li><a href="ui_border_utilities.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Border</a></li>
							<li><a href="ui_buttons.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Buttons</a></li>	
							<li><a href="ui_color_utilities.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Color</a></li>
							<li><a href="ui_dropdown.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dropdown</a></li>
							<li><a href="ui_dropdown_grid.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dropdown Grid</a></li>
							<li><a href="ui_progress_bars.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Progress Bars</a></li>
						</ul>
					</li>										
					<li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Icons
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="icons_fontawesome.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Font Awesome</a></li>
							<li><a href="icons_glyphicons.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Glyphicons</a></li>
							<li><a href="icons_material.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Material Icons</a></li>	
							<li><a href="icons_themify.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Themify Icons</a></li>
							<li><a href="icons_simpleline.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Simple Line Icons</a></li>
							<li><a href="icons_cryptocoins.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Cryptocoins Icons</a></li>
							<li><a href="icons_flag.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Flag Icons</a></li>
							<li><a href="icons_weather.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Weather Icons</a></li>
						</ul>
					</li>									
					<li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Custom UI
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="ui_ribbons.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Ribbons</a></li>
							<li><a href="ui_sliders.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Sliders</a></li>
							<li><a href="ui_typography.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Typography</a></li>
							<li><a href="ui_tab.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Tabs</a></li>
							<li><a href="ui_timeline.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Timeline</a></li>
							<li><a href="ui_timeline_horizontal.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Horizontal Timeline</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Components
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="component_bootstrap_switch.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bootstrap Switch</a></li>
							<li><a href="component_date_paginator.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Date Paginator</a></li>
							<li><a href="component_media_advanced.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Advanced Medias</a></li>
							<li><a href="component_rangeslider.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Range Slider</a></li>
							<li><a href="component_rating.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Ratings</a></li>
							<li><a href="component_animations.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Animations</a></li>
							<li><a href="extension_fullscreen.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Fullscreen</a></li>
							<li><a href="extension_pace.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pace</a></li>
							<li><a href="component_nestable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Nestable</a></li>
							<li><a href="component_portlet_draggable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Draggable Portlets</a></li>	
						</ul>
					</li>  
				  </ul>
				</li>	 -->		
				
				<li class="messag">
				  <a href="<?= base_url('Messages') ?>">
					<i class="icon-Chat2"></i>
					<span class="top-0">Messaging</span>
				  </a>
				</li>
    				<li class="addmission ">
    				  <a href="<?= base_url('Admissions') ?>"  >
    					<i class="fad fa-user-graduate"></i>
    					<span class="top-0">Admissions</span>
    				  </a>
    				</li>
				 <li class="blogss">
				  <a href="<?= base_url('Blog') ?>">
					<i class="fad fa-th-large"></i>
					<span class="top-0">Blogs</span>
				  </a>
				</li>
		       <li class="learnings ">
				  <a href="<?= base_url('Learning') ?>">
					<i class="fad fa-chalkboard-teacher"></i>
					<span class="top-0">Learning</span>
				  </a>
				</li>
				<li class="learnings ">
				  <a href="<?= base_url('Event') ?>">
					<i class="fad fa-chalkboard-teacher"></i>
					<span class="top-0">Event Managment</span>
				  </a>
				</li>                                     		 	     
			  </ul>                                                        
			  
			<!--   <div class="sidebar-widgets">
				<div class="copyright text-center m-25">
					<p><strong class="d-block">MeritCard Dashboard</strong> © <script>document.write(new Date().getFullYear())</script> All Rights Reserved</p>
				</div>
			  </div> -->
		  </div>
		</div>
    </section>
  </aside>
