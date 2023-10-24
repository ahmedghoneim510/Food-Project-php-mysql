<?php

    if(!isset($_SESSION['user'])){
        $_SESSION['no-login']="Please Log in First";
        header("Location:http://localhost/food/web-design-course-restaurant/admin/login.php");
    }
?>