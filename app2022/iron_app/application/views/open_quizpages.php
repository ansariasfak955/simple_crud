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
                                    <li class="breadcrumb-item active" aria-current="page">Add Questions</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <button class="btn btn-info" style="float:right;"  id = "blk_q" >Add bulk Questions</button>
                      
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
                           
                          <?php if($succ){?>
                        <div class="alert bg-success text-white ">
                          <span ><?php echo $succ; ?> </span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div><?php }else if($fail){?>   
                        
                        <div class="alert bg-danger text-white">
                          <span > <?php echo $fail; ?></span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        
                      <?php  }?>    
                
            <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">

                               
                                <h6 class="card-subtitle"></h6>
                              
                                
                             
                            </div>
                            <!-- <hr> -->
                            <form method="POST" action="<?php echo base_url();?>Openquiz/add_quiz" enctype="multipart/form-data">
                            <div class="card-body">
                                    <h3 class=" text-whith" style ="text-align:center" >Quiz name is   <?= $my_title ?> </h3>
                                <div class="row">    
                                          
                                            <input type="hidden" name="idi" id="" value="<?php echo $this->uri->segment('3');  ?>">
                                     
                                     
                                  
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                
                                                <label for="inputfname" class="control-label col-form-label">Questions Types</label>
                                             
                                      <select class="form-control" id="sel" name="cat" onchange="yesnoCheck(this.value)">

                                                    <option>Selected</option>
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
                                            <input type="text" name="qsnss" autocomplete="off" class="form-control" id="email1" placeholder="Quiz Question">
                                           
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
                                       <input type="radio" name="chk" value="1"  id="ck2">
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
                                       <input type="checkbox" name="mchk1" value="1" id="ck2">
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
                                    <div class="col-sm-12 col-md-6" id="red">
                                        <div class="form-group">
                                            <label for="email1" class="control-label col-form-label">Fill In The Blank</label>
                                            <!-- <input type="text" name="fill" autocomplete="off" class="form-control" id="email1" placeholder="Quiz Question" > -->
                                    <textarea class="form-control" name="fill" style="width:660px; height: 100px;"> </textarea>
                                           
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
                    
					
					
				
					
					
					
					
					
                </div>
				
				<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">File export</h4>
                                <h6 class="card-subtitle">Exporting data from a table.</h6>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                            <th>Sr.no.</th>
                                            <th>Questions</th>
                                            <th>Questions Date</th>
                                             <th>Answer</th>
                                            <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $i=1; foreach($view as $row){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row->quiz_qs;?></td>
                                                <td><?php echo $row->quiz_date;?></td>
                                                <td><a href="<?php echo base_url();?>Openquiz/quiz_answers/<?php echo $row->quiz_id; ?>"><button class="btn btn-success">View Answers</button></a></td>
            <td>    
        <a href="<?= base_url('Openquiz/edit_question_option/').$row->quiz_id.'/'.$this->uri->segment('3') ?>" ><i class="ti-pencil"></i>&nbsp;&nbsp; </a>    
 <a href="#" data-toggle="modal" data-target="#deletems<?php echo $row->quiz_id; ?>"><i class="ti-trash"></i></a>
              
          </td>
                                            </tr><?php $i++;?>
                                            
                                            <div id="deletems<?php echo $row->quiz_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Delete Question</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Sure you want to delete this Question.</h4>
                                                <p></p>
                                               
                                            </div>
                                            <div class="modal-footer">
             <a href="<?php echo base_url()?>Openquiz/delete_quiz/<?php echo $row->quiz_id; ?>/<?php echo $this->uri->segment('3');  ?>">
           <button type="button" class="btn btn-default" id="modbutt">Yes</button></a>
           
           
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                
                                
                      <?php }?>
                                            
                                          
                                           
                                        </tbody>
                                        <tfoot>
                                           <tr>
                                          <th>Sr.no.</th>
                                            <th>Questions</th>
                                            <th>Questions Date</th>
                                            <th>Answer</th>
                                            <th>Action</th>
                                                
                                            </tr> 
                                        </tfoot>
                                    </table>
                                    
                                    
 <div id="pagination">
<ul class="tsc_pagination">


<!-- <li> <p><?php echo $links; ?></p></li> -->

</ul>
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
    <!-- =========================bulk modal start===================================== --> 
       <div id="blk_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Add Bulk Question Form</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                           <form id = "blk_form" method ="POST" action = "<?= base_url('Openquiz/bulk_questions_add')?>" enctype ="multipart/form-data"  >
                                             
                                                <div class="row">    
                                          
                                            <input type="hidden" name="id" id="" value="<?php echo $this->uri->segment('3');  ?>">
                                     
                                     
                                  
                                        <div class="col-sm-12 col-md-10">
                                            <!--<div class="form-group">
                                                
                                                <label for="inputfname" class="control-label col-form-label">Questions Types</label>
                                             
                                      <select class="form-control" name="cat" required ="" >

                                                    <option valu = "" >Selected</option>
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
                                        </div>-->
                                        </div>
                                      <div class="col-12  col-md-10"> <!--<label class="control-label col-form-label">Choose file</label>-->
                                     <div class="input-group mt-3 mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Select file</span>
                                        </div>
                                        
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"  accept=".csv,.CSV"   id="inputGroupFile01" required="">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                     
                                    
                                        
                                    </div>
                                    </div>
                                    <div class="col-12  col-md-12 mt-3  action-form">
                                      <a href="<?= base_url('assets/CSV/volume_damo.csv')?>" download >Download bulk Questions Formate  CSV</a>    
                                        
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" name="submit" class="btn btn-info waves-effect waves-light" id = "file_sub_btn">Save</button>
                                        <button type="submit" class="btn btn-dark waves-effect waves-light"data-dismiss="modal" >Cancel</button>
                                    </div>
                                </div>
                                </div> 
                                        </form>       
                                            </div>
                                           
                                        <!--==========END=======-->
                                       
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
    <!-- =========================bulk modal start===================================== -->  
    <!-- ===================== msg model  start  ====================-->
       <div class="modal fade" id="msg_Modal" role="dialog" style ="margin-top: 10%;" >
          <div class="modal-dialog">
    
     
           <div class="modal-content">
                     <div class="modal-header" style ="text-align: center;">
                        <h5 class="modal-title text-white msg"></h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
            </div>
          </div>
        </div>
 <!-- ===================== msg model  end  ====================-->



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
</script>
<script>
        $('body').on('click','#blk_q',function(){
              
            var id = "<?= $this->uri->segment(3)?>" ;       
             $("#blk_modal").modal('show');
               return false;
        });
        
       /*  $('body').on('submit','#blk_form',function(e){
                e.preventDefault();  
               
                 $('#file_sub_btn').prop('disabled', true);
                    
                      $.ajax({
                                    url: "<?= base_url('Openquiz/bulk_questions_add')?>",
                                    type: 'POST',
                                    data: new FormData(this),
                                    contentType: false,
                                    processData: false,
                                    cache: false
                                    success: function (response) {
                                        console.log(response);
                                          var res =  $.parseJSON(response);
                                      if(res.status)
                                        {
                                            
                                             $("#blk_modal").modal('hide');
                                             
                                                 $('.msg').parent().css('background-color', 'green');
                                                 $('.msg').html(res.msg);
                                                 $('#msg_Modal').modal('show');
                                        }else{
                                                 $('.msg').parent().css('background-color', 'red');   
                                                 $('.msg').html(res.msg);
                                                $('#msg_Modal').modal('show');
                                                }
                                          setTimeout(function(){$('#msg_Modal').modal('hide');   return false;},5000); 
               
                                    },
                                   
                                });
                             
                           
             setTimeout(function(){  $('#file_sub_btn').prop('disabled', false); }, 8000);
                             return false;
           
        });*/

</script>

   
    
  
   
</body>


</html>