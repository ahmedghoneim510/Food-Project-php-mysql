<?php 
    require '../config/constante.php';
    session_destroy();
    header("Location:http://localhost/food/web-design-course-restaurant/admin/login.php");

?>