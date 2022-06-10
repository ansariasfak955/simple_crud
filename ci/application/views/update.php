<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
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
        .btn{
            color: white;
            height: 40px;
            width: 150px;
            background: #fbaf0c;
            left: calc(50% - 50px);
        }
    </style>
</head>
<body>
    <div class="container-fluid register">
        <div class="row">
            <div class="form1 ">
                <h3 class="sectionTitle py-4">Update <span class="themetext">Here</span></h3>
            </div>
        </div>

        <!--start form-->
        <form action="<?php echo base_url().'Student/registerData/'.$student['id'];?>" method="POST">
            <div class="row justify-content-center" style="font-weight: 500;">
                <div class="col-sm-4">
                    Name :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" name="name" value="<?php echo $student['name'];?>" class="form-control" placeholder="Enter Your Name" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                    
                </div> 
                <div class="col-sm-4">
                Email :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" name="email" value="<?php echo set_value('email',$student['email']);?>" class="form-control" placeholder="Enter Your Email" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                </div>  
            </div>

            <div class="row justify-content-center" style="font-weight: 500;">
                <div class="col-sm-4">
                    Contact :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="number" name="number" value="<?php echo set_value('contact',$student['contact']);?>" class="form-control" placeholder="Enter Your Number" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                    
                </div> 
                <div class="col-sm-4">
                Password :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="password" name="password" value="<?php echo set_value('password',$student['password']);?>" class="form-control" placeholder="Enter Your Password" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                </div>  
            </div>
            
        
            <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-4 py-4">
                    <input type="submit" name="save" value="Update" style="background: #fbaf0c; border: none; color: white; width: 30%; height: 40px; border-radius: 3%;"/>
                </div>   
                  </div>
                  <div class="col-sm-4"></div>
                  <div class="col-sm-2"></div>
                  </form>
            </div>

        <!--end form-->
    </div>
    <script src="js/bootstrap.js"></script>
</body>
</html>