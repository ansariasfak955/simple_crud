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
                        <h4 class="page-title">Edit Answer</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Answer</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Initial/select_initial"<button class="btn btn-info" style="float:right;">View Questions</button></a>
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
                
               <?php 
   $succ = $this->session->flashdata('success_msg'); ?>
  <?php $fail = $this->session->flashdata('error_msg'); ?>
   
  <?php if($succ || $fail){?>
<div class="alert alert-success" id ="alt">
  <span ><?php echo $succ; ?> <?php echo $fail; ?> <?php echo $updd ?></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
</div><?php }?>
                
                
                <div class="row">
                    <div class="col-sm-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">

                               
                                <h6 class="card-subtitle"></h6>
                                <h4 class="card-title">Edit Answer</h4>
                            </div>
                           
                            <!-- <hr> -->
                            <!--<form method="POST" action="<?php echo base_url();?>Quiz/update_answerss" enctype="multipart/form-data">-->
                            <div class="card-body">
                                <div class="row">
                                         
                                    <div class="col-sm-12 col-md-12" id="des">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Quiz Question</label> <br>
                                            <label for="email1" class="control-label col-form-label"><?php echo $qz[0]->quiz_qs;?></label>
                                            <input type="hidden" name="tyct" value="<?php echo $qz[0]->quizcat_id;  ?>">
                                            <input type="hidden" name="qzzid" value="<?php echo $qz[0]->quiz_id;  ?>">
                                        </div>
                                    </div>
                                   
                                                           
                                </div>
                                <div class="row">
                                         <?php 
                                         $qsty = $qz[0]->quizcat_id;
                                            if($qsty == 1){
                                         ?>
                                    
                                     <div class="col-sm-12 col-md-12" id="ifYes">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Single Answer</label>
                                            
                                             <div class="row">
                                           
                                                   
                                        <?php
                                           
                                            
                                            $qssdid = $qz[0]->quiz_id;
                                        $ssql = $this->db->query("select * from dlc_initial_answers where quiz_id = '$qssdid'");
                                            foreach($ssql->result_array() as $snw)
                                            {
                                                  $stsn = $snw['quiz_status'];
                                                  $snans = $snw['quiz_answer'];
                                                  $andid = $snw['quiz_answers_id'];
                                            ?> 
                                         
                                         <div class="col-md-6">  
                                       <?php  if(!empty($stsn)){?> <input type="radio" name="chk" value="<?php echo $stsn; ?>"  id="ck2" checked=""> <?php }else{?> <input type="radio" name="chk" value="1"  id="ck2"  onChange="pro(this.value,<?php echo $andid; ?>,<?php echo $qssdid; ?>)" > <?php }?>
                                       <label for="email1" class="control-label col-form-label">Currect Answer </label>
                                       <input type="text" class="form-control" name="sigle1" value="<?php echo  $snans; ?>">
                                         </div>
                                         <input type="hidden" class="form-control" name="ansid" value="<?php echo  $andid; ?>">
                                         
                                       <?php } ?>
                                        </div> 

                                      
                                          
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                           <?php 
                                         $mlt = $qz[0]->quizcat_id;
                                            if($mlt == 2){
                                          ?>
                                     <div class="col-sm-12 col-md-12" id="ifNo">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Multiple Answer</label> <br>
                                         <div class="row">
                                              <?php
                                           
                                            
                                             $qssdidm = $qz[0]->quiz_id;
                                        $ssqlml = $this->db->query("select * from dlc_initial_answers where quiz_id = '$qssdidm'");
                                            foreach($ssqlml->result_array() as $snwm)
                                            {
                                                  $stsnm = $snwm['quiz_status'];
                                                  $snansm = $snwm['quiz_answer'];
                                                 $multansid = $snwm['quiz_answers_id'];
                                            
                                            ?>

                                         <div class="col-md-6">  
                                         <?php  if(!empty($stsnm)){?>
                                       <input type="checkbox" name="mchk1" value="0" id="ck2" checked="" onChange="mltpro(this.value,<?php echo $multansid; ?>,<?php echo $qssdidm; ?>)">
                                        <?php } else { ?>
                                       <input type="checkbox" name="mchk1" value="1" id="ck2"  onChange="mltpro(this.value,<?php echo $multansid; ?>,<?php echo $qssdidm; ?>)">
                                       <?php } ?>
                                       <label for="email1" class="control-label col-form-label">Currect Answer </label>
                                       <input type="text" class="form-control" name="multii1" value="<?php echo  $snansm;?>">
                                         
                                         </div>
                                       
                                       <?php } ?>
                                        </div>
                                       
                                    
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    
                                    
                                           <?php 
                                         $flln = $qz[0]->quizcat_id;
                                             if($flln == 3){
                                          ?>
                                    <!--<form method="POST" action="<?php //echo base_url();?>Quiz/update_fill_data " enctype="multipart/form-data">
                                    <div class="col-sm-12 col-md-6" id="red">-->
                                        <?php
                                           
                                            
                                            /* $qssfl = $qz[0]->quiz_id;
                                        $ssqlfl = $this->db->query("select * from dlc_quiz_answers where quiz_id = '$qssfl'");
                                            foreach($ssqlfl->result_array() as $snfl)
                                            {
                                                  $stsnmf = $snfl['quiz_status'];
                                                  $snansmf = $snfl['quiz_answer']
                                            
                                            */
                                            ?>
                                        
                                       <!-- <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Fill In The Blank</label>
                                           
                                    <textarea class="form-control" name="fill" style="width:660px; height: 100px;"><?php /*echo $snansmf;*/?> </textarea>
                                           <input type="hidden" name="qzzid" value="<?php /*echo $qz[0]->quiz_id; */ ?>">
                                        </div>
                                        <?php /*}*/ ?>
                                    </div>-->
                                    
                                    <!--<div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                       <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                   </div>
                                </div>
                               </div>
                                    
                                    </form>-->
                                    
                                     <div class="col-sm-12 col-md-12" id="ifYes">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Fill In The Blank</label>
                                            
                                             <div class="row">
                                           
                                                   
                                        <?php
                                           
                                            
                                            $qssdidfl = $qz[0]->quiz_id;
                                        $ssql = $this->db->query("select * from dlc_initial_answers where quiz_id = '$qssdidfl'");
                                            foreach($ssql->result_array() as $snw)
                                            {
                                                  $stsnfl = $snw['quiz_status'];
                                                  $snansfl = $snw['quiz_answer'];
                                                  $andidfl = $snw['quiz_answers_id'];
                                            ?> 
                                         
                                         <div class="col-md-6">  
                                       <?php  if(!empty($stsnfl)){?> <input type="radio" name="chkfl" value="<?php echo $stsnfl; ?>"  id="ck2fl" checked=""> <?php }else{?> <input type="radio" name="chkfl" value="1"  id="ck2fl"  onChange="pro_fill(this.value,<?php echo $andidfl; ?>,<?php echo $qssdidfl; ?>)" > <?php }?>
                                       <label for="email1" class="control-label col-form-label">Currect Answer </label>
                                       <input type="text" class="form-control" name="sigle19" value="<?php echo  $snansfl; ?>">
                                         </div>
                                         <input type="hidden" class="form-control" name="ansidfl" value="<?php echo  $andidfl; ?>">
                                         
                                       <?php } ?>
                                        </div> 

                                      
                                          
                                        </div>
                                    </div>
                                    
                                    <?php  } ?>
                                    

                                </div>
                            </div>
                            <hr>
                                                

                            <!--<div class="card-body">-->
                            <!--    <div class="action-form">-->
                            <!--        <div class="form-group m-b-0 text-right">-->
                            <!--            <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save</button>-->
                            <!--            <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--</form>-->

                         


                           
                        </div>

                    </div>
                    <div class="col-sm-12 col-lg-4">
                       
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
<?php   $sqla = $this->db->query("SELECT * FROM dlc_user"); 
$coo = $sqla->num_rows();?>
                                                <h1 class="font-light"><?php echo $coo ; ?></h1>
                                                <h6 class="text-muted">Total Users</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $coo ; ?>%" class="css-bar m-b-0 css-bar-primary css-bar-<?php echo $coo ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
<?php   $sqlaa = $this->db->query("SELECT * FROM dlc_user where user_status = '1'"); 
$cooa = $sqlaa->num_rows();?>
                                                <h1 class="font-light"><?php echo $cooa ; ?></h1>
                                                <h6 class="text-muted">Active Users</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $cooa ; ?>%" class="css-bar m-b-0 css-bar-danger css-bar-<?php echo $cooa ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-t-10 p-b-10">
                                            <!-- Column -->
                                            <div class="col p-r-0">
<?php   $sqlaas = $this->db->query("SELECT * FROM dlc_user where user_status = '0' or user_status = ''"); 
$cooas = $sqlaas->num_rows();?>
                                                <h1 class="font-light"><?php echo $cooas; ?></h1>
                                                <h6 class="text-muted">Inactive Users</h6></div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div data-label="<?php echo $cooas ; ?>%" class="css-bar m-b-0 css-bar-warning css-bar-<?php echo $cooas ; ?>"><i class="mdi mdi-account-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            
                    </div>
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

 


<script type="text/javascript">


function pro(strs,id,nid)
{
      /*  alert(strs);*/
    /*alert(strs+id+nid);*/
  xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
   { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
         { document.getElementById("respss").innerHTML = xmlhttp.responseText;
   }
   };
     xmlhttp.open("GET","<?php echo base_url();?>Initial/update_answerss?status="+strs+ "&id="+id+"&nid="+nid,true);
       //alert("<?php echo base_url();?>Quiz/update_answerss?status="+strs+ "&id="+id);
       // alert("<?php echo base_url();?>Quiz/update_answerss?status="+strs+ "&id="+id+"&nid="+nid);
         alert("Single Answer Updated Successfully");
    xmlhttp.send();
   document.getElementById("hid").style.display = "none" ; 
}



function mltpro(strs,id,nid)
{
   // alert(strs+id+nid);
  xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
   { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
         { document.getElementById("respss").innerHTML = xmlhttp.responseText;
   }
   };
     xmlhttp.open("GET","<?php echo base_url();?>Initial/update_multiple_data?status="+strs+ "&id="+id+"&nid="+nid,true);
      // alert("<?php echo base_url();?>Quiz/update_multiple_data?status="+strs+ "&id="+id);
       // alert("<?php echo base_url();?>Quiz/update_multiple_data?status="+strs+ "&id="+id+"&nid="+nid);
       alert("Multiple Answer Updated Successfully");
    xmlhttp.send();
   document.getElementById("hid").style.display = "none" ; 
 
}




function pro_fill(strsfl,idfl,nidfl)
{
      /*  alert(strsfl);*/
    /*alert(strsfl+idfl+nidfl);*/
  xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
   { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
         { document.getElementById("respss").innerHTML = xmlhttp.responseText;
   }
   };
     xmlhttp.open("GET","<?php echo base_url();?>Initial/update_answerss_fill?status="+strsfl+ "&id="+idfl+"&nid="+nidfl,true);
       //alert("<?php echo base_url();?>Quiz/update_answerss?status="+strs+ "&id="+id);
       // alert("<?php echo base_url();?>Quiz/update_answerss?status="+strsfl+ "&id="+idfl+"&nid="+nidfl);
       alert("Fill Answer Updated Successfully");
    xmlhttp.send();
   document.getElementById("hid").style.display = "none" ; 
}








</script>

   
    
   <?php include('footer.php');?>
   
</body>


</html>