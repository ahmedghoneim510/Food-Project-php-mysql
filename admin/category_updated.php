<?php    include '../config/constante.php';  ?>

<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title=$_POST['title'];
    if(isset($_POST['feature'])){
        $feature=$_POST['feature'];
    }
    else
    {
        $feature="no";
    }
    if(isset($_POST['active'])){
        $active=$_POST['active'];
    }
    else
    {
        $active="no";
    }
    // $nameOfImage=$_POST['ImageName'];
    // echo $nameOfImage.'<br/>';
    // print_r($_FILES['image']);
    $nameOfImage=$_POST['ImageName'];
    echo $nameOfImage."<br/>";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    if($_FILES['imagee']['name']!=""){
        $image_name="";
        $image_name=$_FILES['imagee']['name'];
        $ext=$extension = pathinfo($image_name, PATHINFO_EXTENSION);

        $nameOfImage="FoodCategory".rand(0,10000).".".$ext;
        // echo $nameOfImage;
        $sourse=$_FILES['imagee']['tmp_name'];
        $dest="../images/categories/".$nameOfImage;
        $upload=move_uploaded_file($sourse,$dest);
        $_SESSION['upload']="UPloaded Done Successfully";

        
    }
    echo $nameOfImage."<br/>";
    // echo $nameOfImage.'<br/>';
    $obj=new constant();
    $con=$obj->connect();
    $sql = "update tbl_category set title=? , feature=? , active=? ,image_name=? where id=? ";
    $stat=$con->prepare($sql);
    $res=$stat->execute([$title,$feature,$active,$nameOfImage,$_POST['id']]);
    if ($res ){
        $_SESSION['update']="  Category Updated successfully";
        header("Location:http://localhost/food/web-design-course-restaurant/admin/manage-category.php");
        echo '<script>window.location.href = "http://localhost/food/web-design-course-restaurant/admin/manage-category.php";</script>';
        echo $nameOfImage;

 
    }
    else
    {
        $_SESSION['addcategorry']="Added  Category successfully";
        header("Location:http://localhost/food/web-design-course-restaurant/admin/addcate.php");
    }

}
?>