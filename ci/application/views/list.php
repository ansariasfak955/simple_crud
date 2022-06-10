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
    <div class="container" style="padding: 10px;">
    <div class="row">
        <div class="col-md-12">
            <?php
            $success = $this->session->userdata('success');
            if($success != ""){
                ?>
                <div class="alert alert-success"><?php echo $success;?></div>
                <?php
            }
            ?>
            <?php
            $success = $this->session->userdata('failure');
            if($success != ""){
                ?>
                <div class="alert alert-success"><?php echo $failure;?></div>
                <?php
            }
            ?>
        </div>
    </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-6"><h3>View Users</h3></div>
                    <div class="col-6 text-right">
                        <a href="<?php echo base_url(),'index.php/user/create';?>" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        
    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="60">Edit</th>
                    <th width="100">Delete</th>
                </tr>

                <?php if(!empty($users)) { foreach($users as $user) {?>
                <tr>
                    <td><?php echo $user['user_id']?></td>
                    <td><?php echo $user['name']?></td>
                    <td><?php echo $user['email']?></td>
                    <td>
                        <a href="<?php echo base_url().'index.php/user/edit/'.$user['user_id']?>" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo base_url().'index.php/user/delete/'.$user['user_id']?>" class="btn btn-danger">Delete</a>
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