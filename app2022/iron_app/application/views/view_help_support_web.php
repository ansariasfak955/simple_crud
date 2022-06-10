<!DOCTYPE html>
<html dir="ltr" lang="en">
 <style>
.newtextarea textarea
{
    height: 80px;
    width: 100%;
}
</style>
<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
       
     <?php include('header.php');?> 
     
           <link href="<?php echo base_url();?>material/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

           <!--<link href="<?php echo base_url();?>material/dist/css/page.css" rel="stylesheet">-->
        <!-- Custom CSS -->
        <!--<link href="<?php echo base_url();?>material/dist/css/style.min.css" rel="stylesheet">-->
        
        
         <link href="<?php echo base_url();?>material/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Help Support</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Help Support</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--<div class="col-7 align-self-center">
          <a href="<?php echo base_url();?>Blog/add_blog"><button class="btn btn-info" style="float:right;">Add Blog</button></a>
                    </div>-->
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





               <!--   <form method="POST" style="margin-bottom:10px;" action="<?php echo base_url()?>Orders/select_all_order">
            <div class="col-md-12">
             <div class="row">
                       <div class="col-md-3">
                       <label>From</label>
                         <input type="date" name="sdate" class="form-control" id="cono" placeholder="Enter Date">  
                         </div>
                       <div class="col-md-3">
                       <label>To</label>
                           <input type="date" name="edate" class="form-control" id="cono" placeholder="Enter Date">
                        </div>
                       
                      
                        
                        <div class="col-md-3">
                        <label>Users</label>
        <select name="usr"  class="select2 form-control custom-select" style="width: 100%; height:36px;" >
               <option value="">Select</option>
            <?php 
             $sql = $this->db->query("select * from dlc_user");
                foreach($sql->result_array() as $rowu)
                {
             ?>
                   <option value="<?php echo $rowu['user_id'];?>"><?php echo $rowu['user_fname'];?> <?php echo $rowu['user_lname'];?></option><?php }?>

                                  </select>
                         </div>                        
                        
                        <div class="col-md-3">
                         
<button type="submit" name="search" class="btn btn-success" style="margin-top:29px;"><i class="fa fa-search"></i> Search</button>
                        </div>
                     
                    </div> 
                   
               </div>
               </form>
 -->


                <!-- Start Page Content -->
                <!-- ============================================================== -->
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
                                                <th> Sr.No.</th>
                                                <th> Name</th>
                                                <!--<th> Email</th>-->
                                                <th> Contact</th>
                                                <th> Message</th>
                                                <th> feedback </th>
                                                <th> Date</th>
                                                <!--<th> Action </th>-->
                                            
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        
                                        $i=1; foreach($view as $row){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td>
                                                  <?php echo  $row->fname; ?> </td>

                                          

                                            <td><?php echo $row->mobile;?></td>  
                                                
                                              <td>
                                                    <p onclick = 'privew("<?=  base64_encode($row->messges) ?>")'  class = "btn"  > <?=  substr_replace($row->messges,0,50) ?></p>
                                                </td>  
											 
											  <td> 
											  <?php if(is_null($row->feedback)){ ?>
											    <button calss ='btn btn-info btn_reply' data = "<?= $row->con_id ?>" onclick = "view_fun(this)"  >Reply</button>
										 <?php }else{ ?>
											    
											        <p  onclick = 'privew("<?=  base64_encode($row->feedback) ?>")' class = "btn"  > <?=  substr_replace($row->feedback,0,50) ?></p>
											      
										<?php } ?></td>
											
											 <td><?php echo $row->date;  ?></td>
                                             
                                            </tr>
                                            <?php $i++;
                                            
                                             }?>
                                            
                                          
                                           
                                        </tbody>
                                       
                                    </table>
                                    
                                    
 <div id="pagination">
<ul class="tsc_pagination">


<li> <p><?php echo $links; ?></p></li>

</ul>
</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
         
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
 
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    
    <div id="dist_modal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none; padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Feedback Send To Users</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                   <form  id = "mForm" >
                     
                        <div class="row">    
      
               
           
         <div class="col-sm-12 col-md-12">
                    <div class="form-group newtextarea">
                        
                        <label for="textarea" class="control-label ">Enter the massage</label>
                        <textarea name = "disc" > </textarea>
                        
                </div>
                </div>         
            <div class="col-12  col-md-12 mt-3  action-form">
                
                
            <div class="form-group m-b-0 text-right">
                <input type = "hidden" value = '' name = "id" id = "modal_id" >
                <button type="submit" name="submit" class="btn btn-info waves-effect waves-light" id="file_sub_btn">Send</button>
                <button type="submit" class="btn btn-dark waves-effect waves-light" data-dismiss="modal">Cancel</button>
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
 <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////-->
 
 <div id="privew_modal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none; padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">View message</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                   
                     
                        <div class="row">    
      
               
           
         <div class="col-sm-12 col-md-12">
                    <div class="form-group newtextarea">
                        
                        <label for="textarea" class="control-label ">Enter the massage</label>
                        <textarea id = "privew_msg" > </textarea>
                        
                </div>
                </div>         
           
        </div> 
                
                    </div>
                   
                <!--==========END=======-->
               
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
 
 
   
    <script>

function statwd(strs,id)
{ xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
   { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
         { 
             document.getElementById("respss").innerHTML = xmlhttp.responseText;
   }
   };
      xmlhttp.open("GET","<?php echo base_url(); ?>Videos/status?status="+strs+ "&id="+id,true);
     //alert("<?php echo base_url(); ?>User/status?status="+strs+ "&id="+id);
    xmlhttp.send();
   document.getElementById("hid").style.display = "none" ; 
}
</script>

    `   



    
    <?php //include('footer.php');?>
    
    
    
    
    
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
   <!-- <script src="<?php echo base_url();?>material/assets/extra-libs/sparkline/sparkline.js"></script>-->
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
  
   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
   <script>
       $(document).ready(function(){
    
           // console.log("jk jquery run ");

        });
   
       
    function view_fun(m_this)
    {
        var id = $(m_this).attr('data');
        $("#modal_id").val(id);
         $("#dist_modal").modal('show'); 
        return false; 
    }
    
    $('body').on('submit','#mForm',function(e){
         e.preventDefault();
        
         $.ajax({
            type: 'post',
            url: "<?= base_url('Blog/contact_feedback_add');?>",
            data:$(this).serialize(), 
            async:false,
            success: function (data) {
            // var res =  $.parseJSON(data);
                window.location.reload();   
            }        
          });  
          
          
          return false;
        
    });
    
    
     function privew(msg)
    {
       var msg_com = atob(msg);
        $("#privew_msg").val(msg_com);
         $("#privew_modal").modal('show'); 
        return false; 
    }
    
   </script> 
   
</body>



</html>