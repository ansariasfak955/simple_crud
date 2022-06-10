<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    <title>Crud Application - View Users</title>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">CRUD APPLICATION</a>
        </div>
    </div>
    <div class="container-fluid" style="padding: 10px;">
    <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-6"><h3>View Student</h3></div>
                    <div class="col-6 text-end">
                        <a href="<?php echo base_url().'User/create/';?>" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>DOB</th>
                    <th>City</th>
                    <th>Gender</th>
                    <th>Items</th>
                    <th>Image</th>
                    <th width="60">Edit</th>
                    <th width="100">Delete</th>
                </tr>

                <?php if(!empty($users)) { foreach($users as $row) {?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['contact']?></td>
                    <td><?php echo $row['dob']?></td>
                    <td><?php echo $row['city']?></td>
                    <td><?php echo $row['gender']?></td>
                    <td><?php echo $row['items']?></td>
                    <td>
                    <img src="<?php echo base_url().'uploads/'.$row['image'] ?>" height="100px;" class="img-responsive">
                    </td>
                    <td>
                        <a href="<?php echo base_url().'User/edit/'.$row['id']?>" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo base_url().'User/delete/'.$row['id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } } else {?>
                    <tr>
                        <td colspan="5">Records not found</td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
    </div>
</body>
</html>