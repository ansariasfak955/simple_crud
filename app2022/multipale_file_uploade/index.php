<?php

include_once "upload.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="upfrm">
            <?php if(!empty($statusMsg)) {?>
                <p class="status-msg"><?php echo $statusMsg; ?></p>
                <?php } ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="">Select Image File To Upload :</label>
                <input type="file" name="files[]" multiple>
                <input type="submit" name="submit" value="Upload">
            </form>
        </div>
        <!-- Display uploaded Image -->
        <div class="gallery">
            <div class="gcon">
                <?php
                        $query = $db->query("SELECT * FROM images ORDER BY id DESC");

                    if($query->num_rows > 0){
                        while($row = $query->fetch_assoc()){
                            $imageURL = 'uploads/'.$row["file_name"];
                    ?>
                        <img src="<?php echo $imageURL; ?>" alt="" />
                    <?php }
                    }else{ ?>
                        <p>No image(s) found...</p>
                    <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>