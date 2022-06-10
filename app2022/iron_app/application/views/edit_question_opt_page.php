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
                        <h4 class="page-title">Questions</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Questions</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Quiz/select_quiz"<button class="btn btn-info" style="float:right;">View Questions</button></a>
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
                                <h4 class="card-title">Questions</h4>
                                
                             
                            </div>
                            <!-- <hr> -->
                            <form method="POST" action="<?php echo base_url();?>Openquiz/q_opt_update" enctype="multipart/form-data">
                            <div class="card-body">
                                    <h3 class=" text-whith" style ="text-align:center" >Quiz name is   <?= $my_title ?> </h3>
                                <div class="row">    
                                          
                                            <input type="hidden" name="q_id" id="" value="<?php echo $this->uri->segment('3');  ?>">
                                            <input type="hidden" name="Q_id" id="" value="<?php echo $this->uri->segment('4');  ?>">
                                     
                                     
                                  
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                
                                                <label for="inputfname" class="control-label col-form-label">Questions Types</label>
                                             
                                      <select class="form-control" id="sel" name="cat" onchange="yesnoCheck(this.value)">

                                                   <!-- <option>Selected</option>-->
                                                   <option value="<?php echo$q_type ;?>">Selected</option>
                                                    
                                     <?php 
                                       $sql = $this->db->query("select * from dlc_quiz_categories");
                                              foreach($sql->result_array() as $rr)
                                              {
                                                ?>
                                                <option value="<?php echo $rr['quizcat_id'];?>">
                                                    <?php echo $rr['quizcat_name'];?>
                                                    
                                                </option>
                                                
                                            <?php
                                              }
                                              ?>     

                                            </select>
                                        </div>
                                        </div>
                                  <!--   <div class="col-sm-12 col-md-12" id="des">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label"> Quiz Question</label>
                                            <input type="date" name="dtname" class="form-control" id="inputlname2">
                                        <textarea class="form-control" autocomplete="off" name="qsnss" style="width:660px; height: 100px;"></textarea>
                                        </div>
                                    </div> -->
                                         
                                    <div class="col-sm-12 col-md-12" id="des">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Quiz Question</label>
                                            <input type="text" name="qsnss" autocomplete="off" value = "<?php echo $quiz_qs;?> " class="form-control" id="email1" placeholder="Quiz Question">
                                           
                                        </div>
                                    </div>
                                   
                                                           
                                </div>
                                <div class="row">
                                     <div class="col-sm-12 col-md-12" id="ifYes">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Single Answer</label>
                                            <!-- <input type="text" name="sigle" autocomplete="off" class="form-control" id="email1" placeholder="Quiz Question">
                                            -->
                                             <div class="row">

                                         <div class="col-md-6">  
                                       <input type="radio" name="chk" value="1"  id="ck2" <?php if($q_data[0]->quiz_status){echo 'checked'; } ?>>
                                       <label for="email1" class="control-label col-form-label">Currect Answer A</label>
                                       <input type="text" class="form-control" name="sigle1"  value= "<?= $q_data[0]->quiz_answer ?>"  >
                                         </div>
                                         <div class="col-md-6">
                                       <input type="radio" class="form" name="chk" value="2" id="ck3" <?php if($q_data[1]->quiz_status){echo 'checked'; } ?>>
                                        <label for="email1" class="control-label col-form-label">Currect Answer B</label>
                                       <input type="text" class="form-control" name="sigle2"  value= "<?= $q_data[1]->quiz_answer ?>" >
                                        </div>
                                        </div>

                                          <div class="row">
                                       <div class="col-md-6">
                                       <input type="radio" name="chk" value="3" id="ck4"  <?php if($q_data[2]->quiz_status){echo 'checked'; } ?> >
                                        <label for="email1" class="control-label col-form-label" >Currect Answer C</label>
                                       <input type="text" class="form-control" name="sigle3"  value= "<?= $q_data[2]->quiz_answer ?>" >
                                        </div><br>
                                        <div class="col-md-6">
                                       <input type="radio" name="chk" value="4" id="ck5"  <?php if($q_data[3]->quiz_status){echo 'checked'; } ?> >
                                        <label for="email1" class="control-label col-form-label" >Currect Answer D</label>
                                       <input type="text" class="form-control" name="sigle4"  value= "<?= $q_data[3]->quiz_answer ?>" >
                                        </div>
                                        </div><br>
                                          
                                        </div>
                                    </div>
                                    
                                     <div class="col-sm-12 col-md-12" id="ifNo">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Multiple Answer</label> <br>
                                         <div class="row">

                                         <div class="col-md-6">  
                                       <input type="checkbox" name="mchk1" value="1" id="ck2"  <?php if($q_data[0]->quiz_status){echo 'checked'; } ?>  >
                                       <label for="email1" class="control-label col-form-label">Currect Answer A</label>
                                       <input type="text" class="form-control" name="multii1"  value= "<?= $q_data[0]->quiz_answer ?>" >
                                         </div>
                                         <div class="col-md-6">
                                       <input type="checkbox" class="form" name="mchk2" value="2" id="ck3" <?php if($q_data[1]->quiz_status){echo 'checked'; } ?>  >
                                        <label for="email1" class="control-label col-form-label">Currect Answer B</label>
                                       <input type="text" class="form-control" name="multii2"  value= "<?= $q_data[1]->quiz_answer ?>" >
                                        </div>
                                        </div>
                                       <br>
                                       <div class="row">
                                       <div class="col-md-6">
                                       <input type="checkbox" name="mchk3" value="3" id="ck4" <?php if($q_data[2]->quiz_status){echo 'checked'; } ?> >
                                        <label for="email1" class="control-label col-form-label">Currect Answer C</label>
                                       <input type="text" class="form-control" name="multii3"  value= "<?= $q_data[2]->quiz_answer ?>" >
                                        </div><br>
                                        <div class="col-md-6">
                                       <input type="checkbox" name="mchk4" value="4" id="ck5" <?php if($q_data[3]->quiz_status){echo 'checked'; } ?>  >
                                        <label for="email1" class="control-label col-form-label"> Currect Answer D</label>
                                       <input type="text" class="form-control" name="multii4"  value= "<?= $q_data[3]->quiz_answer ?>" >
                                        </div>
                                        </div><br>
                                          
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12 col-md-6" id="red">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Fill In The Blank</label>
                                            <!-- <input type="text" name="fill" autocomplete="off" class="form-control" id="email1" placeholder="Quiz Question" > -->
                                    <textarea class="form-control" name="fill" style="width:660px; height: 100px;"> </textarea>
                                           
                                        </div>
                                    </div>
                                    <!--<div class="col-sm-12 col-md-6" id="pass">
                                         
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Passage</label>
                                           
                                            <textarea autocomplete="off" class="form-control" name="passage" style="width:660px; height:150px">
                                                
                                            </textarea>
                                           
                                        </div>
                                    </div>-->

                                </div>
                            </div>
                            <hr>
                                                

                            <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                      <a href = "<?php echo base_url('Openquiz/add_qu/').$this->uri->segment('4'); ?>" class = 'btn btn-dark waves-effect waves-light'>Cancel</a>
                                     
                                    </div>
                                </div>
                            </div>
                            </form>

                         


                           
                        </div>

                    </div>
                    
					
					
				
					
					
					
					
					
                </div>
			
				
              
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

  <script src="<?php echo base_url();?>material/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>material/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>material/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?php echo base_url();?>material/dist/js/app.min.js"></script>
    <script src="<?php echo base_url();?>material/dist/js/app.init.dark.js"></script>
    <script src="<?php echo base_url();?>material/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>material/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url();?>material/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>material/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>material/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>material/dist/js/custom.min.js"></script>
    
    
     <script src="<?php echo base_url();?>material/assets/extra-libs/DataTables/datatables.min.js"></script>
      <script src="<?php echo base_url();?>material/cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>material/cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>material/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="<?php echo base_url();?>material/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>material/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>material/cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>material/cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
   <script src="<?php echo base_url();?>material/dist/js/pages/datatable/datatable-advanced.init.js"></script>

<script type="text/javascript">
 window.onload = function() {
    /*document.getElementById('ifYes').style.display = 'none';
    document.getElementById('ifNo').style.display = 'none';
    document.getElementById('red').style.display = 'none';
    //document.getElementById('pass').style.display = 'none';
    document.getElementById('des').style.display = 'none';
    document.getElementById('ddt').style.display = 'none';*/
  
   
}

$(document).ready(function(){
   var ttt = "<?= $q_type?>";
    
  
    if(ttt != '' )
    {
        yesnoCheck(ttt);
    }
});

function yesnoCheck(type){
    
   
    
    if (document.getElementById('sel').value == '1') {
        document.getElementById('ifYes').style.display = 'block';
        document.getElementById('ifNo').style.display = 'none';
         document.getElementById('red').style.display = 'none';
         document.getElementById('pass').style.display = 'none';
          document.getElementById('des').style.display = 'block';
          document.getElementById('ddt').style.display = 'block';
          
        
    } 
    else 
    if(type == '2') { 
        
    
        document.getElementById('ifNo').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
         document.getElementById('red').style.display = 'none';
         document.getElementById('pass').style.display = 'none';
          document.getElementById('des').style.display = 'block';
          document.getElementById('ddt').style.display = 'block';
          
       
   }
   else if(document.getElementById('sel').value == '3') {
        document.getElementById('red').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
         document.getElementById('ifNo').style.display = 'none';
         document.getElementById('pass').style.display = 'none';
          document.getElementById('des').style.display = 'block';
          document.getElementById('ddt').style.display = 'block';
                
        
   }
    else if(document.getElementById('sel').value == '4') { 
        document.getElementById('pass').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
         document.getElementById('ifNo').style.display = 'none';
          document.getElementById('red').style.display = 'none';
          document.getElementById('des').style.display = 'none';
          document.getElementById('ddt').style.display = 'none';

       
       
       
        
   }
   
   //   else if(document.getElementById('condos').checked) { 
   //      document.getElementById('coontra').style.display = 'block';
   //      document.getElementById('ifYes').style.display = 'none';
   //       document.getElementById('ifNo').style.display = 'none';
   //        document.getElementById('red').style.display = 'none';
       
        
   // }
}

</script>

   
    
   <?php // include('footer.php');?>
   
</body>


</html>