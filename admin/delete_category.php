<?php    include '../config/constante.php';  ?>
<?php
    
    if(isset($_POST['id']) && $_POST['image_name']){
        $id= $_POST['id'];
        $image_name=$_POST['image_name'];

        if($image_name==""){
            $path='../images/'.$image_name;
            $remove=unlink($path);
            if($remove==false){
                $_SESSION['remove']="Faild to remove";
                header("Location:http://localhost/food/web-design-course-restaurant/admin/manage-category.php");
            }
        }
        $obj=new constant();
        $con=$obj->connect();
        $sql="delete from tbl_category where id=?";
        $stat=$con->prepare($sql);
        $res=$stat->execute([$id]);
        if($res){
            $_SESSION['remove']="Category successfully removed";
            header("Location:http://localhost/food/web-design-course-restaurant/admin/manage-category.php");
        }
        else{
            $_SESSION['remove']="Faild to remove";
            header("Location:http://localhost/food/web-design-course-restaurant/admin/manage-category.php");
        }
    }
    else{
        header("Location:http://localhost/food/web-design-course-restaurant/admin/manage-category.php");
    }
?>