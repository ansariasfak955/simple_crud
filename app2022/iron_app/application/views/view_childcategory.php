<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>material/assets/images/favicon.png">
    <title>DLC admin | Home</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>material/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>material/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>material/dist/css/style.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>material/assets/libs/select2/dist/css/select2.min.css">
      
     
   
</head>
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
      <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">View Childcategory</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Childcategory</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10">
                                <div class="lastmonth"></div>
                            </div>
                            <div class=""><small>LAST MONTH</small>
                                <h4 class="text-info m-b-0 font-medium">$58,256</h4></div>
                        </div>
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
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Childcategory</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>Id</th>
                                                <th>Childcategory Name</th>
                                                <th>Subcategory Name</th>
                                                <th>Category Name</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; foreach($views as $row){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row->childcat_name;?></td>
                                                <td><?php $sbcat = $row->sbcat_id;
                                                    $sqlsb = $this->db->query("SELECT * FROM dlc_subcategory where sbcat_id='$sbcat'"); foreach($sqlsb->result_array() as $rowsb){ echo $rowsb['sbcat_name']; }

                                                 ?></td>
                                                <td><?php $cid = $row->cat_id;
                                                 $sqlact = $this->db->query("SELECT * FROM dlc_category where cat_id='$cid'"); foreach($sqlact->result_array() as $rocast){ echo $rocast['cat_name']; }
                                                     ?></td>
                                                <td><img src="<?php echo base_url();?>upload/childcategory/<?php echo $row->childcat_image;?>" style="height:60px; width:80px;"></td>
       <td>
       <a href="#" data-toggle="modal" data-target="#edit<?php echo $row->childcategory_id; ?>"><i class="ti-pencil"></i>&nbsp;&nbsp; </a>
       <a href="#" data-toggle="modal" data-target="#deletems<?php echo $row->childcategory_id; ?>"><i class="ti-trash"></i></a>
       </td>
                                            </tr><?php $i++ ; ?>
                                            
                                            <div id="deletems<?php echo $row->childcategory_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Delete Subcategory</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Sure you want to delete this childcategory</h4>
                                                <p></p>
                                               
                                            </div>
                                            <div class="modal-footer">
             <a href="<?php echo base_url()?>Childcategory/deletechild/<?php echo $row->childcategory_id; ?>">
           <button type="button" class="btn btn-default" id="modbutt">Yes</button></a>
           
           
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                
                                <!--edit-->
                                
                                <div id="edit<?php echo $row->childcategory_id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                         <h4 class="modal-title">Edit - <?php echo $row->childcat_name;?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?php echo base_url();?>Childcategory/update_rowchild" enctype="multipart/form-data">
                                                  <div class="form-group">
                                    <select name="category_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onChange="getsubed(this.value);">
                                                   <?php  $cid = $row->cat_id;
                                                    $sqla = $this->db->query("SELECT * FROM dlc_category where cat_id = '$cid'"); 
                                                    foreach($sqla->result_array() as $rocs){?>
                                    <option value="<?php echo $rocs['cat_id'];?>"><?php echo $rocs['cat_name'];?></option><?php }?>
 <?php   $sqls = $this->db->query("SELECT * FROM dlc_category where cat_id!='$cid'");
  foreach($sqls->result_array() as $rocss){ ?>
                   <option value="<?php echo $rocss['cat_id'];?>"><?php echo $rocss['cat_name'];?></option><?php }?>

                                      </select>
                                                </div>

                                                 <div id="showuptnew"></div>
                                                 <div id="hddnew">
                                                <div class="form-group">
                                 <select name="sub_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                             <?php 
                                              // $cidd = $row->sbcat_id;
                                     $sqlaa = $this->db->query("SELECT * FROM dlc_subcategory where cat_id = '$cid'"); 
                                            foreach($sqlaa->result_array() as $rocsch){?>
                                    <option value="<?php echo $rocsch['sbcat_id'];?>"><?php echo $rocsch['sbcat_name'];?></option><?php }?>
 <?php   $sqlsh = $this->db->query("SELECT * FROM dlc_subcategory where cat_id!='$cid'");
  foreach($sqlsh->result_array() as $rocssh){ ?>
                   <option value="<?php echo $rocssh['sbcat_id'];?>"><?php echo $rocssh['sbcat_name'];?></option><?php }?>

                                  </select>
                                                </div>
                                            </div>
                                                 
                                  
                                  
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Childcategory:</label>
                                                        <input type="text" name="name" value="<?php echo $row->childcat_name;?>" class="form-control" id="recipient-name">
                                                    </div>
                                                    
                                                    
                                                    
                                                    <img src="<?php echo base_url();?>upload/childcategory/<?php echo $row->childcat_image;?>" style="height:60px; width:80px;">
                       <input type="hidden" name="oldimage" value="<?php echo $row->childcat_image;?>">
                        <input type="hidden" name="idch" value="<?php echo $row->childcategory_id;?>">
                                                    <div class="input-group mb-3">
                                                    
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <input type="submit" name="submit" class="btn btn-success" value="Update changes"> </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--edit-->
                                            
                                            <?php }?>
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
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Childcategory</h4>
                                <form method="POST" action="<?php echo base_url();?>Childcategory/addchild" enctype="multipart/form-data" class="m-t-20">
                                <div class="form-group">
                       <select name="category_id" class="select2 form-control custom-select" style="width: 100%; height:36px;" onChange="getsub(this.value);">
                                    <option>Select</option>
 <?php   $sql = $this->db->query("SELECT * FROM dlc_category"); foreach($sql->result_array() as $roc){ ?>
                   <option value="<?php echo $roc['cat_id'];?>"><?php echo $roc['cat_name'];?></option><?php }?>

                                  </select>
                                  </div>
                                   <div id="hid">
                                   <div class="form-group">
                      <select name="subcategory_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                    <option>Select</option>
 <?php   $sqll = $this->db->query("SELECT * FROM dlc_subcategory"); foreach($sqll->result_array() as $rocc){ ?>
                   <option value="<?php echo $rocc['sbcat_id'];?>"><?php echo $rocc['sbcat_name'];?></option><?php }?>

                                  </select>
                                  </div>
                                </div> 
                                 <div id="Showscat"></div>

                                
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="nametext" aria-describedby="name" placeholder="Name">
                                        <small id="name" class="form-text text-muted">Enter childcategory name</small>
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                   
                                     <input type="submit" name="submit" value="Submit" class="btn btn-info"></button>
                                     <button type="reset" class="btn btn-dark">Reset</button>
                                </form>
                            </div>
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
 
    <!-- customizer Panel -->
    <!-- ============================================================== -->

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
              
    <script> 

     function getsub(str) {
     
   //alert(str);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
     } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
     }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
       document.getElementById("Showscat").innerHTML = xmlhttp.responseText;
      }
     };
    xmlhttp.open("GET","<?php echo base_url();?>Childcategory/select_child?q="+str,true);  
  // alert("<?php echo base_url();?>Childcategory/select_child?q="+str); 
    xmlhttp.send();
    document.getElementById("hid").style.display = "none";
   }

    </script>

    <script> 

     function getsubed(strr) {
     
   //alert(strr);
     if (window.XMLHttpRequest) {
   
     xmlhttp = new XMLHttpRequest();
     } else {
    
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
     }
    xmlhttp.onreadystatechange = function() {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
       document.getElementById("showuptnew").innerHTML = xmlhttp.responseText;
      }
     };
    xmlhttp.open("GET","<?php echo base_url();?>Childcategory/select_data_edit?qd="+strr,true);  
 alert("<?php echo base_url();?>Childcategory/select_data_edit?qd="+strr); 
    xmlhttp.send();
    document.getElementById("hddnew").style.display = "none";
   }

    </script>






    <?php include('footer.php');?>
</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/xtreme-admin/html/dark/table-layout-coloured.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Oct 2018 10:52:43 GMT -->
</html>