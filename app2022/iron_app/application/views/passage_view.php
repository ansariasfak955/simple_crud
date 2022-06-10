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
                        <h4 class="page-title">Quetions</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Questions</li>
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
                    <div class="col-sm-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">

                               
                                <h6 class="card-subtitle"></h6>
                                <h4 class="card-title">Questions</h4>
                            </div>
                            
                            <form method="POST" action="<?php echo base_url();?>Quiz/add_pass_ans_qs" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                     <div class="col-sm-12 col-md-12">
                                         
                                        <div class="form-group">
                                        <label for="email1" class="control-label col-form-label"> Passage </label>
                                           
                                           <?php foreach($spass as $roww)
                                           {
                                              $pasd = $roww->passage;
                                              $pasid = $roww->passage_id;
                                              $qzid = $roww->quiz_id; 
                                              $ppkk = $roww->pack_id;
                                           }
                                           ?>
 <!-- textarea autocomplete="off" class="form-control" name="passage" style="width:660px;height:150px;" readonly=""><?php echo $pasd;?>
                                            </textarea> -->
                                            <input type="text" name="passage" class="form-control" value="<?php echo $pasd;?>" readonly>
                                     
                                            <input type="hidden" name="pss" value="<?php echo $pasid; ?>">
                                            <input type="hidden" name="qzc" value="<?php echo $qzid; ?>">
                                            <input type="hidden" name="pckidd" value="<?php echo $ppkk; ?>">
                                           
                                        </div>
                                    </div>
                                       <!-- <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputlname2" class="control-label col-form-label"> Alphabets</label>
                                           <select class="form-control" name="alp">
                                             <option>Selected</option>
                                           <?php $pssql = $this->db->query("select * from dlc_subcategory");
                                            foreach($pssql->result_array() as $rwws)    
                                             {
                                            ?>
                                            <option value="<?php echo $rwws['sbcat_id']; ?>">
                                              <?php echo $rwws['sbcat_name']; ?></option>
                                             <?php } ?>
                                           </select>
                                        </div>
                                    </div> -->
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="inputfname" class="control-label col-form-label">Questions Types</label>
                                             
                            <select class="form-control" id="sel" name="catt" onchange="yesnoCheck(this.value)">

                                                    <option value="">Selected</option>
                                     <?php 
                                       $sql = $this->db->query("select * from dlc_quiz_categories limit 3");
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
                                 
                                    
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Quiz Question</label>
                                          <!--   <input type="text" name="qsnnp" autocomplete="off" class="form-control" id="email1" placeholder="Quiz Question" required> -->
                                          <textarea class="form-control" name="qsnnp"  style="width:660px; height: 100px;"></textarea>
                                           
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
                                       <input type="radio" name="chkp" value="1"  id="ck2">
                                       <label for="email1" class="control-label col-form-label">Currect Answer A</label>
                                       <input type="text" class="form-control" name="siglees1">
                                         </div>
                                         <div class="col-md-6">
                                       <input type="radio" class="form" name="chkp" value="2" id="ck3">
                                        <label for="email1" class="control-label col-form-label">Currect Answer B</label>
                                       <input type="text" class="form-control" name="siglees2">
                                        </div>
                                        </div>

                                          <div class="row">
                                       <div class="col-md-6">
                                       <input type="radio" name="chkp" value="3" id="ck4">
                                        <label for="email1" class="control-label col-form-label">Currect Answer C</label>
                                       <input type="text" class="form-control" name="siglees3">
                                        </div><br>
                                        <div class="col-md-6">
                                       <input type="radio" name="chkp" value="4" id="ck5">
                                        <label for="email1" class="control-label col-form-label">Currect Answer D</label>
                                       <input type="text" class="form-control" name="siglees4">
                                        </div>
                                        </div><br>
                                          
                                        </div>
                                    </div>
                                     <div class="col-sm-12 col-md-12" id="ifNo">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Multiple Answer</label> <br>
                                         <div class="row">

                                         <div class="col-md-6">  
                                       <input type="checkbox" name="mchkpp1" value="1" id="ck2">
                                       <label for="email1" class="control-label col-form-label">Currect Answer A</label>
                                       <input type="text" class="form-control" name="multipp1">
                                         </div>
                                         <div class="col-md-6">
                                       <input type="checkbox" class="form" name="mchkpp2" value="2" id="ck3">
                                        <label for="email1" class="control-label col-form-label">Currect Answer B</label>
                                       <input type="text" class="form-control" name="multipp2">
                                        </div>
                                        </div>
                                       <br>
                                       <div class="row">
                                       <div class="col-md-6">
                                       <input type="checkbox" name="mchkpp3" value="3" id="ck4">
                                        <label for="email1" class="control-label col-form-label">Currect Answer C</label>
                                       <input type="text" class="form-control" name="multipp3">
                                        </div><br>
                                        <div class="col-md-6">
                                       <input type="checkbox" name="mchkpp4" value="4" id="ck5">
                                        <label for="email1" class="control-label col-form-label"> Currect Answer D</label>
                                       <input type="text" class="form-control" name="multipp4">
                                        </div>
                                        </div><br>
                                          
                                        </div>
                                    </div>
                                     <div class="col-sm-12 col-md-6" id="red">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Fill In The Blank</label>
                                          <!--   <input type="text" name="fillp" autocomplete="off" class="form-control" id="email1" placeholder="Quiz Question" > -->
                                          <textarea class="form-control" name="fillp"  style="width:660px; height: 100px;"></textarea>
                                           
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
<?php   $sqlaas = $this->db->query("SELECT * FROM dlc_user where user_status = '0'"); 
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
    //document.getElementById('pass').style.display = 'none';
    document.getElementById('des').style.display = 'none';
  

}
function yesnoCheck(){
    if (document.getElementById('sel').value == '1') {
        document.getElementById('ifYes').style.display = 'block';
        document.getElementById('ifNo').style.display = 'none';
         document.getElementById('red').style.display = 'none';
         //document.getElementById('pass').style.display = 'none';
         // document.getElementById('des').style.display = 'none';
          
        
    } 
    else if(document.getElementById('sel').value == '2') { 
        document.getElementById('ifNo').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
         document.getElementById('red').style.display = 'none';
        // document.getElementById('pass').style.display = 'none';
         // document.getElementById('des').style.display = 'none';
          
       
   }
   else if(document.getElementById('sel').value == '3') {
        document.getElementById('red').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
         document.getElementById('ifNo').style.display = 'none';
         //document.getElementById('pass').style.display = 'none';
         // document.getElementById('des').style.display = 'none';
         
       
        
   }
   //  else if(document.getElementById('sel').value == '4') { 
   //      document.getElementById('pass').style.display = 'block';
   //      document.getElementById('ifYes').style.display = 'none';
   //       document.getElementById('ifNo').style.display = 'none';
   //        document.getElementById('red').style.display = 'none';
   //        document.getElementById('des').style.display = 'block';

       
       
       
        
   // }
   
   //   else if(document.getElementById('condos').checked) { 
   //      document.getElementById('coontra').style.display = 'block';
   //      document.getElementById('ifYes').style.display = 'none';
   //       document.getElementById('ifNo').style.display = 'none';
   //        document.getElementById('red').style.display = 'none';
       
        
   // }
}

</script>

   
    
   <?php include('footer.php');?>
   
</body>


</html>