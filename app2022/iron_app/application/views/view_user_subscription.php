<!DOCTYPE html>
<html dir="ltr" lang="en">
 <style>

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
        
        <style>
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:260px;position: absolute;overflow-y: scroll;max-height: 650px;z-index: 999;max-height: 300px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:rgba(51, 122, 183, 0.77);cursor: pointer; color: #fff;}
#search-box{padding: 10px;border: #2962FF 1px solid;border-radius:4px;}
#country-list li:hover {
background: #2962FF !important;
cursor: pointer;
color: #fff !important;
}
.new-widths
{
     
    min-height: 1px;
    float: left;
    padding-right: 10px;
    padding-left: 10px;   
    
    
}

</style>
        
        
       
     <?php include('header.php');?> 
     
           <link href="<?php echo base_url();?>material/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

           <!--<link href="<?php echo base_url();?>material/dist/css/page.css" rel="stylesheet">-->
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>material/dist/css/style.min.css" rel="stylesheet">
        
        
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
                        <h4 class="page-title">User Subscription</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View User Subscription</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
          <a href="<?php echo base_url();?>User_subscription/add_subcription"><button class="btn btn-info" style="float:right;">Add Subscription</button></a>
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

                <form method="GET" style="margin-bottom:10px;" action="<?php echo base_url()?>User_subscription/search">
            <div class="col-md-12">
             <div class="row">
                                     
                        <div class="col-md-2">
                        <label>Users</label>
                        <input type="text" id="search-box" name="usr" autocomplete="off" class="form-control" placeholder="Enter user name" style="height:36px;">

                           <div id="suggesstion-box"></div>
           
                     </div>
                     <div class="col-md-2">
                        <label>Packages</label>
            <select name="packk"  class="select2 form-control custom-select" style="width: 100%; height:36px;" >
               <option value="">Select</option>
            <?php 
             $sqls = $this->db->query("select * from dlc_course_package");
                foreach($sqls->result_array() as $rowp)
                {
             ?>
                   <option value="<?php echo $rowp['pack_id'];?>"><?php echo $rowp['pack_name'];?></option><?php }?>

             </select>
                     </div>
                      <div class="col-md-3">
                       <label>From</label>
                         <input type="date" name="sdate" class="form-control" id="cono" placeholder="Enter Date">  
                         </div> 
                        <div class="col-md-3">
                        <label>To</label>
                           <input type="date" name="edate" class="form-control" id="cono" placeholder="Enter Date">
                      </div>       
                         
                        
                        
                        <div class="col-md-2">
                         
<button type="submit" name="search" class="btn btn-success" style="margin-top:29px;"><i class="fa fa-search"></i> Search</button>
                        </div>
                     
                    </div> 
                   
               </div>
               </form>



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
                                                <th>Sr.no.</th>
                                                <th>User Name</th>                                              
                                                <th>Package</th>                                    
                                                <th>Active Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
 <?php
 $usernames = $_GET['usr'];                                               
 $packk = $_GET['packk'];
  $sdate = $_GET['sdate'];
  $edate = $_GET['edate'];
  $userid = $_GET['userid'];

if(!empty($usernames)){ 
      $selconten = $this->db->query("select * from dlc_user where user_fname = '$usernames'");
foreach($selconten->result() as $rowte) {
   $tenent_idd = $rowte->user_id;
    }
     $teid = "AND user_id = '".$tenent_idd."'";
    
 }

if(!empty($packk)){ $pkd = "AND pack_id = '".$packk."'";}
 
if(!empty($sdate)){  $datt = "AND subscrip_date between "."'".$sdate."'"." AND "."'".$edate."'"; 
 }
 
 if(!empty($userid)){ $userids = "AND user_id = '".$userid."'";
 } 

   if($usernames || $sdate || $edate || $userid || $packk){
                                                $iff=1; 
$perpage = 10   ;
if(isset($_GET['page']) & !empty($_GET['page'])){
 $curpage = $_GET['page'];
}else{
    $curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;

$PageSqls = $this->db->query("SELECT * FROM dlc_user_subscription where user_sub_id > 0 $datt $teid $userids $pkd");
  $totalres = $PageSqls->num_rows();

$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;
 $selcon = $this->db->query("select * from dlc_user_subscription where user_sub_id > 0 $datt $teid $userids $pkd LIMIT $start, $perpage");
foreach($selcon->result() as $row) {?>


                    <tr>

                      <td><?php echo $iff;?></td>
                                                <td><?php 
                                               $userid = $row->user_id;
                                               $sqll = $this->db->query("select * from dlc_user where user_id = '$userid'");
                                                  foreach($sqll->result_array() as $rwu)
                                                     {
                                                        echo $rwu['user_fname']; echo '&nbsp';

                                                        echo $rwu['user_lname'];
                                                     }

                                                ?></td>
                                                <td><?php
                                                  $pk = $row->pack_id;
                                            $sq = $this->db->query("select * from dlc_course_package where  pack_id = '$pk'");
                                                    foreach($sq->result_array() as $ww)
                                                    {
                                                        echo $ww['pack_name'];
                                                    }
                                                ?></td>
                                                                                              
                                                <td><?php echo $row->subscrip_date;?></td>
                                                <td>
                                    <select id="statuss" name="status" size="1" onChange="stat(this.value,<?php echo $row->user_sub_id;?>)">
                                 <?php $status = $row->status; ?>
                                    <option value="1" <?php if($status == '1') echo "selected"; ?>>Active</option>
                                    <option value="0" <?php if($status == '0') echo "selected"; ?>>Inactive</option>
                                                                       
                                        </select>


                                        </td>
                                               
                                                
                                              
            <td>

 <a href="#" data-toggle="modal" data-target="#deletems<?php echo $row->user_sub_id; ?>"><i class="ti-trash"></i></a>
       
       
       </td>

            </tr>    


            <div id="deletems<?php echo $row->user_sub_id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Delete Subscription</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Sure you want to delete this Subscription.</h4>
                                                <p></p>
                                               
                                            </div>
                                            <div class="modal-footer">
             <a href="<?php echo base_url()?>User_subscription/delete/<?php echo $row->user_sub_id; ?>">
           <button type="button" class="btn btn-default" id="modbutt">Yes</button></a>
           
           
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>


           <?php $iff++; } } else { ?> 
              <?php $i=1;foreach($view as $row){?>


             <tr>

                      <td><?php echo $i;?></td>
                                                <td><?php 
                                               $userid = $row->user_id;
                                               $sqll = $this->db->query("select * from dlc_user where user_id = '$userid'");
                                                  foreach($sqll->result_array() as $rwu)
                                                     {
                                                        echo $rwu['user_fname']; echo '&nbsp';

                                                        echo $rwu['user_lname'];
                                                     }

                                                ?></td>
                                                <td><?php
                                                  $pk = $row->pack_id;
                                            $sq = $this->db->query("select * from dlc_course_package where  pack_id = '$pk'");
                                                    foreach($sq->result_array() as $ww)
                                                    {
                                                        echo $ww['pack_name'];
                                                    }
                                                ?></td>
                                                                                              
                                                <td><?php echo $row->subscrip_date;?></td>
                                                <td>
                                    <select id="statuss" name="status" size="1" onChange="stat(this.value,<?php echo $row->user_sub_id;?>)">
                                 <?php $status = $row->status; ?>
                                    <option value="1" <?php if($status == '1') echo "selected"; ?>>Active</option>
                                    <option value="0" <?php if($status == '0') echo "selected"; ?>>Inactive</option>
                                                                       
                                        </select>


                                        </td>
                                               
                                                
                                              
            <td>

 <a href="#" data-toggle="modal" data-target="#deletems<?php echo $row->user_sub_id; ?>"><i class="ti-trash"></i></a>
       
       
       </td>

            </tr>    

            <div id="deletems<?php echo $row->user_sub_id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Delete Subscription</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Sure you want to delete this Subscription.</h4>
                                                <p></p>
                                               
                                            </div>
                                            <div class="modal-footer">
             <a href="<?php echo base_url()?>User_subscription/delete/<?php echo $row->user_sub_id; ?>">
           <button type="button" class="btn btn-default" id="modbutt">Yes</button></a>
           
           
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>



                        <?php $i++; } 
                      } ?>


                                                                                 
                                        </tbody>
                                        <tfoot>
                                           <tr>
                                                <th>Sr.no.</th>
                                                <th>User Name</th>                                              
                                                <th>Package</th>                                    
                                                <th>Active Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr> 
                                        </tfoot>
                                    </table>
                                    
                                    



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

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function(){
$("#search-box").keyup(function(){  
$.ajax({
type: "POST",
url: "<?php echo base_url();?>User_subscription/listing",
data:'keyword='+$(this).val(),
beforeSend: function(){
$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
},
success: function(data){
$("#suggesstion-box").show();
$("#suggesstion-box").html(data);
$("#search-box").css("background","#FFF");
}
});
});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>





    <script>

function stat(strs,id)
{
 
//alert(id);
 xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
   { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
         { 
             document.getElementById("respss").innerHTML = xmlhttp.responseText;
   }
   };
      xmlhttp.open("GET","<?php echo base_url();?>User_subscription/status?status="+strs+ "&id="+id,true);
    // alert("<?php echo base_url(); ?>User_subscription/status?status="+strs+ "&id="+id);
    xmlhttp.send();
   document.getElementById("hid").style.display = "none" ; 
}
</script>

  

   
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
    <!--<script src="<?php echo base_url();?>material/assets/extra-libs/sparkline/sparkline.js"></script>-->
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
</body>


</html>
<!--
<script>
$(document).ready(function(){
$("#search-boxs").keyup(function(){ 

$.ajax({
type: "POST",
url: "<?php echo base_url();?>User_subscription/friendsearchs",
data:'keyword='+$(this).val(),
beforeSend: function(){
},
success: function(data){
$("#suggesstion-boxs").show();
$("#suggesstion-boxs").html(data);
}
});
});
});

function selectCountrys(val){
$("#search-boxs").val(val);
$("#suggesstion-boxs").hide();
}
</script> -->