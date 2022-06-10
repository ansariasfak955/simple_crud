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
        .close{
                margin-left: 70%;
                color: white;
                padding: 10px;
                background-color: red;
                opacity: 1;
     }
    </style>
</head>
<body>
    <div class="container-fluid register">
        <div class="row">
            <div class="form1 ">
                <h3 class="sectionTitle py-4">Register <span class="themetext">With Us</span></h3>
                <p class="sectionText">You are just one step behind to join the Techpile. I promise you to give my best if you will ll be a part of Techpile.</p>
            </div>
        </div>
        <div class="col-sm-12">
        <div class="row justify-content-center">
    <div class="col-6">
      <?php if($this->session->flashdata('success')) { ?>
          <div class="alert alert-success">
            <strong>
              <?php echo $this->session->flashdata('success'); ?>
            </strong>
            <a href="" class="close" data-dismiss="alert" aria-label="close"></a>
          </div>
        <?php } ?>

        <?php if ($this->session->flashdata('error')) { ?>
                
                <div class="alert alert-danger">
                   
                    <strong><?php echo $this->session->flashdata('error'); ?></strong>
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </div>
        
        <?php } ?>
    </div>
  </div>
  </div>
        <!--start form-->
        <form action="<?php echo base_url('Form/update_record/'); ?>" method="POST">
            <div class="row justify-content-center" style="font-weight: 500;">
                <div class="col-sm-4">
                    Name :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" name="name" value="<?= isset($res[0]->name)? $res[0]->name :'' ?>" class="form-control" placeholder="Enter Your Name" aria-label="Username" aria-describedby="basic-addon1" required>
                        <input type="hidden"  name="id" value="<?= isset($res[0]->id)? $res[0]->id :'' ?>" class="form-control" placeholder="Enter Your Name" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                    
                </div> 
                <div class="col-sm-4">
                Email :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" name="email" value="<?= isset($res[0]->email)? $res[0]->email :''?>" class="form-control" placeholder="Enter Your Email" aria-label="Username" required aria-describedby="basic-addon1">
                      </div>
                </div>  
            </div>

            <div class="row justify-content-center" style="font-weight: 500;">
                <div class="col-sm-4">
                    Contact :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="number" name="contact" value="<?= isset($res[0]->contact)? $res[0]->contact :'' ?>" class="form-control" required placeholder="Enter Your Number" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                    
                </div> 
                <div class="col-sm-4">
                Password :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="password" required name="password" value="<?= isset($res[0]->password)? $res[0]->password :'' ?>" class="form-control" placeholder="Enter Your Password" aria-label="Username" aria-describedby="basic-addon1">
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