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
                <h3 class="sectionTitle py-4">Register <span class="themetext">With Us</span></h3>
                <p class="sectionText">You are just one step behind to join the Techpile. I promise you to give my best if you will ll be a part of Techpile.</p>
            </div>
        </div>

        <!--start form-->
        <form action="<?php echo base_url('Employee/savedata')?>" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center" style="font-weight: 500;">
                <div class="col-sm-4">
                    Name :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                    
                </div>  
            </div>

            <div class="row justify-content-center" style="font-weight: 500;">
                <div class="col-sm-4">
                <select name="city" class="form-select" aria-label="Default select example">
                    <option selected>--select city--</option>
                    <option value="Indore">Indore</option>
                    <option value="Lucknow">Lucknow</option>
                    <option value="Azamgarh">Azamgarh</option>
                </select>
                </div>  
            </div>

            <div class="row justify-content-center" style="font-weight: 500;">
                <div class="col-sm-4">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                </div>  
            </div>
            
            <div class="row justify-content-center" style="font-weight: 500;">
                <div class="col-sm-4">
                <div class="input-group mb-3">
                    <input type="file" name="image" id="image" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                </div>  
            </div>

            <div class="row justify-content-center" style="font-weight: 500;">
                <div class="col-sm-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="option" value="male" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div> 
            </div>

            <div class="col-sm-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="female" name="option" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Female
                    </label>
                </div> 
            </div>
            </div>

            <div class="row justify-content-center" style="font-weight: 500;">
                <div class="col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" name="chk[]" type="checkbox" value="ktm" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        KTM
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" name="chk[]" type="checkbox" value="swift" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Swift
                    </label>
                    </div>  
                    <div class="form-check">
                    <input class="form-check-input" name="chk[]" type="checkbox" value="samsung" id="flexCheckChecked" >
                    <label class="form-check-label" for="flexCheckChecked">
                        samsung
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" name="chk[]" type="checkbox" value="apple" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Apple
                    </label>
                    </div>
            </div>
            

        
            <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4 py-4">
                    <input type="submit" name="save" value="Register" style="background: #fbaf0c; border: none; color: white; width: 30%; height: 40px; border-radius: 3%;"/>
                </div>   
                  </div>
                  <div class="col-sm-2"></div>
                  <div class="col-sm-2"></div>
                  </form>
            </div>

        <!--end form-->
    </div>
    <script src="js/bootstrap.js"></script>
</body>
</html>