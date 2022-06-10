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
                        <h4 class="page-title">Report</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Report</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                   <!--  <div class="col-7 align-self-center">
          <a href="<?php echo base_url();?>User/add_user"><button class="btn btn-info" style="float:right;">Add User</button></a>
                    </div> -->
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

                 <form method="GET" style="margin-bottom:10px;" action="<?php echo base_url()?>Report/search">
            <div class="col-md-12">
             <div class="row">
                   <div class="col-md-3">
                        <label>Users</label>
                         <input type="text" name="name" class="form-control" autocomplete="off" id="search-box" placeholder="Enter User Name">  
                       <div id="suggesstion-box"></div>
             
                     </div>
                                             
                        <div class="col-md-3">
                       <label>From</label>
                         <input type="date" name="sdate" class="form-control" id="cono" placeholder="Enter Date">  
                         </div> 
                        <div class="col-md-3">
                       <label>To</label>
                           <input type="date" name="edate" class="form-control" id="cono" placeholder="Enter Date">
                        </div>
                                                                                            
                        <div class="col-md-3">
                         
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
                                            <th>Name</th>                                          
                                            <th>Email</th>
                                            <th>Contact</th>
                                          
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Orders</th>
                                                    
                                            </tr>
                                        </thead>
                                        <tbody>
  <?php
 $usernames = $_GET['name'];
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
 
 if(!empty($sdate)){  $datt = "AND date between "."'".$sdate."'"." AND "."'".$edate."'"; 
 }
 
 if(!empty($userid)){ $userids = "AND user_id = '".$userid."'";
 } 

 if($usernames || $sdate || $edate || $userid){
                                                $iff=1; 
$perpage = 10   ;
if(isset($_GET['page']) & !empty($_GET['page'])){
 $curpage = $_GET['page'];
}else{
    $curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;

$PageSqls = $this->db->query("SELECT * FROM dlc_orders where order_id > 0 $datt $teid $userids");
  $totalres = $PageSqls->num_rows();

$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;
 $selcon = $this->db->query("select * from dlc_orders where order_id > 0 $datt $teid $userids LIMIT $start, $perpage");
foreach($selcon->result() as $row) {?>
    <tr>
        
        <td><?php echo $iff;?></td>
                                                 <?php 
                                                  $amt = $row->total;
                                                 $dt = $row->date;
                                                 $od = $row->order_id;

                                                 $ussrid = $row->user_id;
                                           $this->db->select('*')->from('dlc_user');
                                     $this->db->where("(user_id=$ussrid)");
                                  $query = $this->db->get();
                                   
                                  foreach ($query->result() as $roww) {
                                                 $usrf = $roww->user_fname;
                                                 $usrl = $roww->user_lname;
                                                 $usreml = $roww->user_email;
                                                 $usrcont = $roww->user_contact;
                                                
                                                 }

                                                 ?>
                                                <td><?php echo $usrf;?>   <?php echo $usrl;?></td>
                                               
                                                <td><?php echo $usreml;?></td>
                                               
                                                <td><?php echo $usrcont;?></td>
                                                
                                                 <td><?php echo $dt; ?></td>
                                                 <td><?php echo $amt; ?></td>
                                                 <td>

                                                    <a href="<?php echo base_url()?>Orders/select_order/<?php echo $row->order_id  ?>"><button type="button" class="btn btn-success">view</button></a>
                                                     
                                                 </td>                              
           

                        </tr>
                                   <?php $iff++;  } } else { ?>
                                      <?php $ifg=1;foreach($view as $row){?>
                                    <tr>


                                        <td><?php echo $ifg;?></td>
                                                 <?php 
                                                  $amt = $row->total;
                                                 $dt = $row->date;
                                                 $od = $row->order_id;

                                                 $ussrid = $row->user_id;
                                           $this->db->select('*')->from('dlc_user');
                                     $this->db->where("(user_id=$ussrid)");
                                  $query = $this->db->get();
                                   
                                  foreach ($query->result() as $roww) {
                                                 $usrf = $roww->user_fname;
                                                 $usrl = $roww->user_lname;
                                                 $usreml = $roww->user_email;
                                                 $usrcont = $roww->user_contact;
                                                
                                                 }

                                                 ?>
                                                <td><?php echo $usrf;?>   <?php echo $usrl;?></td>
                                               
                                                <td><?php echo $usreml;?></td>
                                               
                                                <td><?php echo $usrcont;?></td>
                                                
                                                 <td><?php echo $dt; ?></td>
                                                 <td><?php echo $amt; ?></td>
                                                 <td>

                                                    <a href="<?php echo base_url()?>Orders/select_order/<?php echo $row->order_id  ?>"><button type="button" class="btn btn-success">view</button></a>
                                                     
                                                 </td>                       
                            

                                    </tr>
                               
                                    <?php $ifg++; } } ?>
                                                                                      
                                        </tbody>
                                        <tfoot>
                                           <tr>
                                            <th>Sr.no.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Orders</th>
                                         
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
    
    
   


    
    <?php //include('footer.php');?>

     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function(){
$("#search-box").keyup(function(){  
$.ajax({
type: "POST",
url: "<?php echo base_url();?>Report/listing",
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
</body>

</html>

<!--
<script>
$(document).ready(function(){
$("#search-box").keyup(function(){ 
 //alert();
$.ajax({
type: "POST",
url: "<?php echo base_url();?>Report/friendsearch",
data:'keyword='+$(this).val(),
beforeSend: function(){

},
success: function(data){
$("#suggesstion-box").show();
$("#suggesstion-box").html(data);

}
});
});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script> -->

