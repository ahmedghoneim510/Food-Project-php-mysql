<?php  include('partials/menu.php'); ?>
<?php 

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $ob=new constant();
    $con=$ob->connect();
    $sql = "UPDATE tbl_admin set full_name= ?, username= ?, password= ? WHERE id = ?";
    // $sql="insert into tbl_admin set full_name= ?, username= ?, password= ? where id";
    $stmt=$con->prepare($sql);
    $res=$stmt->execute([$_POST['name'],$_POST['username'],$_POST['password'],$id]);
    if($res){
        $_SESSION['update']="Admin updated successfully";
        header("Location:http://localhost/food/web-design-course-restaurant/admin/manage-admin.php");
    }
}
?>