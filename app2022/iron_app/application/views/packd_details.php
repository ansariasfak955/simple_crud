<!DOCTYPE html>
<html dir="ltr" lang="en">
<body>
 
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
       <?php include('header.php');?>
         <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/extra-libs/css-chart/css-chart.css">
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

        
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Package</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Package</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Rating/viewpack"<button class="btn btn-info" style="float:right;">View Package</button></a>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">

                               
                                <h6 class="card-subtitle"></h6>
                                <h4 class="card-title">Package</h4>
                            </div>
                            <!-- <hr> -->
                            <form method="POST" action="<?php echo base_url();?>Initial/add_initial" enctype="multipart/form-data">
                            <div class="card-body">
                                
                                <div class="row">
                                          <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
											<div class="row sop_div_4717" style="margin: 0 0 15px 0; padding: 5px;border: 1px solid #999;border-radius: 5px;">
                    <div class="box-header with-border" style="padding: 15px 0 10px 0; ">
                        <h3 class="box-title" style="font-weight: bold;">Category & Sub Category </h3>
                    </div>
                  
                  <div class="row" style="margin-top: 10px;margin-left: 6px;">
                    <!--div class="col-md-6 col-xs-12">
                        <label>SOP Assignment Title : </label>
                        Bacaan Bulk Meter                     </div-->
                    
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                            <label>Category :</label>
                                   
                              <?php
                                                   $cat =  $records[0]->cat_id;
                                                   if($cat==1){
                                                   $sql = $this->db->query("select * from  dlc_category where cat_id = '$cat'");
                                                   foreach($sql->result_array() as $rr)
                                                     {
                                                       
                                                        echo $rr['cat_name'];

                                                     }
                                                   }

                                                    ?>
                             
                                                         
                            
                          </div>
                    </div> 
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                            <label>Sub Category : </label>
            
                             <?php
                                                   $cat =  $records[0]->cat_id;
                                                   if($cat==2){
                                                   $sql = $this->db->query("select * from  dlc_category where cat_id = '$cat'");
                                                   foreach($sql->result_array() as $rr)
                                                     {
                                                       
                                                        echo $rr['cat_name'];

                                                     }
                                                   }

                                                    ?>
                        </div>
                    </div> 
                 
                    <div class="col-md-6 col-xs-12" style="margin-bottom: 0px;">
                        <div class="form-group">
                            <label> Alpha Name  : </label>
                     
                   
                      <?php foreach($pack as $rowd){ ?>
                    <?php    $a = $rowd->alpha_id;
                             $b =  explode(',', $a);
                           // print_r($b);
                           for ($i=0; $i < count($b); $i++){ 
                               $sqlll = $this->db->query("select * from  dlc_subcategory where sbcat_id = '$b[$i]'");
                                                   foreach($sqlll->result_array() as $rr)
                                                     {
                                                     
                                                       echo  $rr['sbcat_name'];
                                                      }
                           }
                             //echo $rr['sbcat_name'];
                   ?>
                   <?php } ?>
                                                 </div><!-- /.form group -->
                        
                    </div>
                    
                   
                    
                   
                    
                   
                    
                    
                   
                    <div class="col-md-6 col-xs-6"></div>
                    
                    
                    
                      <!--  <div class="form-group">	city
                            <label>Repeat Timer : </label>            
                            30 Min(s)                          
                    </div>  --->
                    
                    
                    
                                     <!--   <div class="col-md-6 col-xs-12" style="">
                        <div class="form-group">
                          <label>Requirement Type : </label>            
                             Reading Required                           </div>
                    </div>-->
                                        </div> <!-- /.row -->
                    <!-- Sub SOP tasks if any -->
                                        
                   
                    
                                      
            </div>
                                              </div>
                                            </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <div class="row sop_div_4717" style="margin: 0 0 15px 0; padding: 5px;border: 1px solid #999;border-radius: 5px;">
                    <div class="box-header with-border" style="padding: 15px 0 10px 0; ">
                        <h3 class="box-title" style="font-weight: bold;">Pack Name & Total Test </h3>
                    </div>
                  
                  <div class="row" style="margin-top: 10px;margin-left: 6px;">
                    <!--div class="col-md-6 col-xs-12">
                        <label>SOP Assignment Title : </label>
                        Bacaan Bulk Meter                     </div-->
                    
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Pack Name :</label>
                                                          
                             
                             
                            <?php echo $records[0]->pack_name;?>                                 
                            
                          </div>
                    </div> 
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                            <label> Total Test : </label>
            
                       <?php 
                         $pac = $records[0]->pack_id;
                       $sqla = $this->db->query("SELECT * FROM dlc_quiz where pack_id='$pac'"); 
$coo = $sqla->num_rows();?>
                      <?php echo $coo; ?>
                        </div>
                    </div> 
                 
                    <div class="col-md-6 col-xs-12" style="margin-bottom: 0px;">
                        <div class="form-group">
                            <label> Grammar Name : </label>
                          <?php foreach($pack as $rowd){ ?>
                    <?php    $ac = $rowd->grammar_id;
                             $bc =  explode(',', $ac);
                           // print_r($b);
                             for ($i=0; $i < count($bc); $i++){ 
                               $sqlllc = $this->db->query("select * from  dlc_subcategory where sbcat_id = '$bc[$i]'");
                                                   foreach($sqlllc->result_array() as $rrr)
                                                     {
                                                     
                                                       echo  $rrr['sbcat_name'];
                                                      }
                             }
                             //echo $rr['sbcat_name'];
                   ?>
                   <?php } ?>
                                                 </div><!-- /.form group -->
                        
                    </div>
                    
                   
                    
                   
                    
                   
                    
                    
                   
                    <div class="col-md-6 col-xs-6"></div>
                    
                    
                    
                      <!--  <div class="form-group">	city
                            <label>Repeat Timer : </label>            
                            30 Min(s)                          
                    </div>  --->
                    
                    
                    
                                     <!--   <div class="col-md-6 col-xs-12" style="">
                        <div class="form-group">
                          <label>Requirement Type : </label>            
                             Reading Required                           </div>
                    </div>-->
                                        </div> <!-- /.row -->
                    <!-- Sub SOP tasks if any -->
                                        
                   
                    
                                      
            </div>
                                        </div>
                                        </div>
                                
                                    
                                   
                                   
                                                           
                                </div>
                               
                            </div>
                            <hr>
                                                

                           <!-- <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                        <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                    </div>
                                </div>
                            </div>-->
                            </form>

                         


                           
                        </div>

                    </div>
                    <!--<div class="col-sm-12 col-lg-4">
                       
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                         <!--   <div class="col p-r-0">
<?php   $sqla = $this->db->query("SELECT * FROM dlc_user"); 
$coo = $sqla->num_rows();?>
                                                <h1 class="font-light"><?php echo $coo ; ?></h1>
                                                <h6 class="text-muted">Total Users</h6></div>
                                            <!-- Column -->
                                          <!--  <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $coo ; ?>%" class="css-bar m-b-0 css-bar-primary css-bar-<?php echo $coo ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                          <!--  <div class="col p-r-0">
<?php   $sqlaa = $this->db->query("SELECT * FROM dlc_user where user_status = '1'"); 
$cooa = $sqlaa->num_rows();?>
                                                <h1 class="font-light"><?php echo $cooa ; ?></h1>
                                                <h6 class="text-muted">Active Users</h6></div>
                                            <!-- Column -->
                                          <!--  <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $cooa ; ?>%" class="css-bar m-b-0 css-bar-danger css-bar-<?php echo $cooa ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                          <!--  <div class="col p-r-0">
<?php   $sqlaas = $this->db->query("SELECT * FROM dlc_user where user_status = '0'"); 
$cooas = $sqlaas->num_rows();?>
                                                <h1 class="font-light"><?php echo $cooas ; ?></h1>
                                                <h6 class="text-muted">Inactive Users</h6></div>
                                            <!-- Column -->
                                           <!-- <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $cooas ; ?>%" class="css-bar m-b-0 css-bar-warning css-bar-<?php echo $cooas ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            
                    </div>-->
					
					
                </div>
				
				
                <!-- End row -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->  

 




   
    
   <?php include('footer.php');?>
   
</body>


</html>