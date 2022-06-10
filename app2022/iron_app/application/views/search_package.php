<?php
error_reporting(0);
include("config.php");

$name = $_REQUEST['name'];

    if(empty($name)){
 $sql = "select * from dlc_subcategory";
  $opp = mysqli_query($conn,$sql);
      } else { 

     $sqlsecf = "select * from dlc_subcategory where sbcat_name = '$name'";
     	 $rs = mysqli_query($conn,$sqlsecf); 
     	while($rowg=mysqli_fetch_array($rs))
     	{ 

            $sctidd = $rowg['sbcat_id'];

     	}

 $sqlsecm = "select * from dlc_mamage_package where alpha_id like '%$sctidd %' or grammar_id like '%$sctidd%'";     	
 $oppsecsd = mysqli_query($conn,$sqlsecm); 
  while($rowsd=mysqli_fetch_array($oppsecsd))
  {

  	   $ppkid  = $rowsd['pack_id'];

  }

    $oppsecs = "select * from dlc_course_package where pack_id = '$ppkid'";
      $oppsecmlp = mysqli_query($conn,$oppsecs); 


      }



 $response = array();
while($row = mysqli_fetch_array($opp))
{
array_push($response, array("id"=>$row[0],"name"=>$row['sbcat_name'],"type"=>'1'));


}

 $data= array();
while($rows=mysqli_fetch_array($oppsecmlp))
{
array_push($data, array("id"=>$rows[0], "name"=>$rows['pack_name']),"type"=>'2'));
}


echo json_encode (array("second"=>$data, $response));


mysqli_close($conn);
?>
