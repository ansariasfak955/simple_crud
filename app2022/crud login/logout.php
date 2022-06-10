<?php

session_start();
if(isset($_SESSION['validUser'])){
    session_destroy();
    //header("location:login.php");
    echo "<script>location.href = 'login.php'</script>";
}

?>