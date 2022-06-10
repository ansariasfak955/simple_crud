<?php

include __DIR__.'/db.php';

$showquery = "SELECT * FROM `crud`";
    $result = mysqli_query($conn,$showquery);
    //print_r($result); die();
    // $row = mysqli_fetch_field($result);
    //   echo "<pre>";
    //   print_r($row);
    //   echo "</pre>";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $row)
                        {
                     ?>
                    <tr>
                
                        <th scope="row"><?php echo $row['id'];?></th>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['password'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>