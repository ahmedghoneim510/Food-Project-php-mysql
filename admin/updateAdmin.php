<?php  include('partials/menu.php');

$obj=new constant();
$conect=$obj->connect();
$id=$_POST['id'];
$sql = "select * FROM tbl_admin WHERE id = $id";
$stat=$conect->prepare($sql);
$stat->execute();
while ($row = $stat->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value=<?php echo $id ;?>"">
        <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $row['full_name']; ?>" id="exampleInputEmail1"  placeholder="Enter your full-Name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input class="form-control" name="username" type="text" value="<?php echo $row['username']; ?>" placeholder="Enter your username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>" id="exampleInputPassword1" placeholder="Password">
        </div>
        <input type="submit" name="submit" value="Update-Admin" class="btn btn-primary mb-2" id="">
        </form>
    </div>
</div>
<?php
}
?>
<?php  include('partials/footer.php') ?>
