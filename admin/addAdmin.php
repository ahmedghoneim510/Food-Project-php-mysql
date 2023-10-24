

<?php  include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <form action="" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1"  placeholder="Enter your full-Name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input class="form-control" name="username" type="text" placeholder="Enter your username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <input type="submit" name="submit" value="Add Admin" class="btn btn-primary mb-2" id="">
        </form>
    </div>
</div>


<?php 
    include('partials/footer.php');

    if(isset($_POST['submit'])){
        // $fullname=$_POST['name'];
        // $username=$_POST['username'];
        // $password=md5($_POST['password']);
        // // echo $fullname ." ".$username." ".$password ;  // password is already md5 encoded
        $obj=new constant();
        $conect=$obj->connect();
        $sql="insert into tbl_admin set full_name= ?, username= ?, password= ?";
        $stat=$conect->prepare($sql);
        $res=$stat->execute([$_POST['name'],trim($_POST['username']),$_POST['password']]);
       // echo var_dump($res);
        //echo "Done Successfully";
        if($res) {
            $_SESSION['add']="Admin added successfully";
            header("Location:http://localhost/food/web-design-course-restaurant/admin/manage-admin.php");
        }
        else{
            
            $_SESSION['add']="Faild to added ";
            header("Location:http://localhost/food/web-design-course-restaurant/admin/addAdmin.php");
        }
    }
     
   

?>