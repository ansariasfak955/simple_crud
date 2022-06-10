<?php

include __DIR__.'/db.php';

$id = $_GET['id'];
$query = "SELECT * FROM crud WHERE id = '$id'";
//echo $query; die();
$run = mysqli_query($conn,$query);

if(mysqli_num_rows($run)>0){
    $row = mysqli_fetch_assoc($run);
    //print_r($row);
}else{
    echo "Record not found";
}


if(isset($_POST['done']))
{
$id = $_GET['id'];
$name = $_POST['name'];
$password = $_POST['password'];

$query = "update crud set id=$id, name='$name', password='$password' where id=$id ";
//echo $query; die();

$result = mysqli_query($conn, $query);
//echo $result; die();
header("location:dashboard.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="js/bootstrap.js">
    <title>register</title>
    <style>
        body{
            padding: 0px;
            margin: 0px;
        }
        .register{
            background: #f7f7f7;
        }
        .themetext{
            color: #fbaf0c;
        }
        .sectionTitle{
            margin: 0px auto;
            padding: 0px;
            text-align: center;
            font-weight: 500;
            padding-bottom: 10px;
            position: relative;
        }
        .sectionTitle::after{
            content: '';
            height: 2px;
            width: 100px;
            background: #fbaf0c;
            display: inline-block;
            position: absolute;
            top: 70px;
            left: calc(50% - 50px);
            box-sizing: border-box;
        }
        .sectionText{
            color: #555;
            font-size: 14px;
            display: block;
            width: 100%;
            max-width: 600px;
            margin: 0px auto;
            margin-bottom: 20px;
            text-align: center;
            font-family: 'Verela Round', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container-fluid register">
    <div class="row">
            <div class="form1 ">
                <h3 class="sectionTitle py-4">Update <span class="themetext"></span></h3>
                <p class="sectionText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, neque. Lorem ipsum dolor sit amet.</p>
            </div>
        </div>

        <form action="" method="POST">
        <div class="row justify-content-center" style="font-weight: 500;">
        <div class="col-sm-4">
                    Name :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="<?php echo $row['name'] ?>" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                </div> 
                <div class="col-sm-4">
                    Email :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                        <input type="email" class="form-control" placeholder="Enter Your Email" name="email" value="<?php echo $row['email'] ?>" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                </div> 
            </div>
            <div class="row justify-content-center" style="font-weight: 500;">
        <div class="col-sm-4">
                    Contact :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                        <input type="number" class="form-control" placeholder="Enter Your Number" name="contact" value="<?php echo $row['contact'] ?>" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                </div> 
                <div class="col-sm-4">
                    Password :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                        <input type="password" class="form-control" placeholder="Enter Your password" name="password" value="<?php echo $row['password'] ?>" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                </div> 
            </div>

            <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-4 py-4">
                    <input type="submit" value="Update" name="done" style="background: #fbaf0c; border: none; color: white; width: 30%; height: 40px; border-radius: 3%;"/>
                </div>   
                  </div>
                  <div class="col-sm-4"></div>
                  <div class="col-sm-2"></div>
            

        </form>
    </div>
</body>
</html>

