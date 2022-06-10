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
                        <h4 class="page-title">Initial Test Question</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Initial Test Question</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <a href="<?php echo base_url();?>Initial/select_initial"<button class="btn btn-info" style="float:right;">View Initial Question</button></a>
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
                    <div class="col-sm-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">

                               
                                <h6 class="card-subtitle"></h6>
                                <h4 class="card-title">Initial Question</h4>
                            </div>
                            <!-- <hr> -->
                            <form method="POST" action="<?php echo base_url();?>Initial/add_initial" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                         

                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Questions Types</label>
                                             
                                      <select class="form-control" id="sel" name="cat" onchange="yesnoCheck(this.value)">

                                                    <option>Question Type</option>
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
                                            <label for="email1" class="control-label col-form-label">Initial Question</label>
                                            <input type="text" name="qsnss" autocomplete="off" class="form-control" id="email1" placeholder="Quiz Question" required>
                                           
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
                                       <input type="radio" name="chk" value="1"  id="ck2" checked>
                                       <label for="email1" class="control-label col-form-label">Currect Answer A</label>
                                       <input type="text" class="form-control" name="sigle1">
                                         </div>
                                         <div class="col-md-6">
                                       <input type="radio" class="form" name="chk" value="2" id="ck3">
                                        <label for="email1" class="control-label col-form-label">Currect Answer B</label>
                                       <input type="text" class="form-control" name="sigle2">
                                        </div>
                                        </div>

                                          <div class="row">
                                       <div class="col-md-6">
                                       <input type="radio" name="chk" value="3" id="ck4">
                                        <label for="email1" class="control-label col-form-label">Currect Answer C</label>
                                       <input type="text" class="form-control" name="sigle3">
                                        </div><br>
                                        <div class="col-md-6">
                                       <input type="radio" name="chk" value="4" id="ck5">
                                        <label for="email1" class="control-label col-form-label">Currect Answer D</label>
                                       <input type="text" class="form-control" name="sigle4">
                                        </div>
                                        </div><br>
                                          
                                        </div>
                                    </div>
                                     <div class="col-sm-12 col-md-12" id="ifNo">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Multiple Answer</label> <br>
                                         <div class="row">

                                         <div class="col-md-6">  
                                       <input type="checkbox" name="mchk1" value="1" id="ck2" checked>
                                       <label for="email1" class="control-label col-form-label">Currect Answer A</label>
                                       <input type="text" class="form-control" name="multii1">
                                         </div>
                                         <div class="col-md-6">
                                       <input type="checkbox" class="form" name="mchk2" value="2" id="ck3">
                                        <label for="email1" class="control-label col-form-label">Currect Answer B</label>
                                       <input type="text" class="form-control" name="multii2">
                                        </div>
                                        </div>
                                       <br>
                                       <div class="row">
                                       <div class="col-md-6">
                                       <input type="checkbox" name="mchk3" value="3" id="ck4">
                                        <label for="email1" class="control-label col-form-label">Currect Answer C</label>
                                       <input type="text" class="form-control" name="multii3">
                                        </div><br>
                                        <div class="col-md-6">
                                       <input type="checkbox" name="mchk4" value="4" id="ck5">
                                        <label for="email1" class="control-label col-form-label"> Currect Answer D</label>
                                       <input type="text" class="form-control" name="multii4">
                                        </div>
                                        </div><br>
                                          
                                        </div>
                                    </div>
                                     <!-- <div class="col-sm-12 col-md-6" id="red">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Fill In The Blank</label>
                                            <input type="text" name="fill" autocomplete="off" class="form-control" id="email1" placeholder="Quiz Question" >
                                           
                                        </div>
                                    </div> -->
                                    <div class="col-sm-12 col-md-12" id="red">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Fill In The Blank</label>
                                            <!-- <input type="text" name="fill" autocomplete="off" class="form-control" id="email1" placeholder="Quiz Question" > -->
                                   <!-- <textarea class="form-control" name="fill" style="width:660px; height: 100px;"> </textarea>-->
                                        <div class="row">

                                        <div class="col-md-6">  
                                       <input type="radio" name="chkn" value="1"  id="ck22" checked>
                                       <label for="email1" class="control-label col-form-label">Currect Answer A</label>
                                       <input type="text" class="form-control" name="sigle11">
                                         </div>
                                         <div class="col-md-6">
                                       <input type="radio" class="form" name="chkn" value="2" id="ck33">
                                        <label for="email1" class="control-label col-form-label">Currect Answer B</label>
                                       <input type="text" class="form-control" name="sigle22">
                                        </div>
                                        </div>

                                          <div class="row">
                                       <div class="col-md-6">
                                       <input type="radio" name="chkn" value="3" id="ck44">
                                        <label for="email1" class="control-label col-form-label">Currect Answer C</label>
                                       <input type="text" class="form-control" name="sigle33">
                                        </div><br>
                                        <div class="col-md-6">
                                       <input type="radio" name="chkn" value="4" id="ck55">
                                        <label for="email1" class="control-label col-form-label">Currect Answer D</label>
                                       <input type="text" class="form-control" name="sigle44">
                                        </div>
                                        </div><br>
                                   
                                   
                                           
                                        </div>
                                    </div>
                                     <div class="col-sm-12 col-md-6" id="pass">
                                         
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Passage</label>
                                           
                                            <textarea autocomplete="off" class="form-control" name="passage" style="width:660px; height:150px">
                                                
                                            </textarea>
                                           
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                                                

                            <div class="card-body">
                                <div class="action-form">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                        <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            </form>

                         


                           
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
                                                <h1 class="font-light"><?php echo $cooas ; ?></h1>
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
 window.onload = function() {
    document.getElementById('ifYes').style.display = 'none';
    document.getElementById('ifNo').style.display = 'none';
    document.getElementById('red').style.display = 'none';
    document.getElementById('pass').style.display = 'none';
    document.getElementById('des').style.display = 'none';
    document.getElementById('ddt').style.display = 'none';
  

}
function yesnoCheck(){
    if (document.getElementById('sel').value == '1') {
        document.getElementById('ifYes').style.display = 'block';
        document.getElementById('ifNo').style.display = 'none';
         document.getElementById('red').style.display = 'none';
         document.getElementById('pass').style.display = 'none';
          document.getElementById('des').style.display = 'block';
          document.getElementById('ddt').style.display = 'block';
          
        
    } 
    else if(document.getElementById('sel').value == '2') { 
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
$(document).ready(function() {
    $("#chkdwn2").click(function() {
       if ($(this).is(":checked")) { 
          $("#dropdown").prop("disabled", true);
       } else {
          $("#dropdown").prop("disabled", false);  
       }
    });
});
</script>

   
    
   <?php include('footer.php');?>
   
</body>


</html>