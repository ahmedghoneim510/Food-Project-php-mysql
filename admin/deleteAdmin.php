<?php 
    include("../config/constante.php");
    $obj=new constant();
    $conect=$obj->connect();
    $id=$_POST['id'];
    $num=$obj->GetnumberOfRow();
    if($num<=1){
        $_SESSION['delete']="There must be at least one Admin in the database";
        header("Location:http://localhost/food/web-design-course-restaurant/admin/manage-admin.php");
    }
    else{
        $sql = "DELETE FROM tbl_admin WHERE id = $id";
        $stat=$conect->prepare($sql);
        $res=$stat->execute();
        if($res){
            
            $_SESSION['delete']="Admin deleted successfully";
            header("Location:http://localhost/food/web-design-course-restaurant/admin/manage-admin.php");
        }
        else{
            echo "Error deleting record ";
            header("Location:http://localhost/food/web-design-course-restaurant/admin/manage-admin.php");
        }
    }
   
?>