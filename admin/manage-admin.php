<?php  include('partials/menu.php');
  include('partials/loginCheck.php');
?>

    <!-- Main content  Section start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Magange-Admin</h1>
            <br>
            <?php 
              if(isset($_SESSION['add'])){
                ?>
                <div class="alert alert-success" role="alert">
                     <?php echo $_SESSION['add']."<br/>"; ?>
                </div>
                <?php
                
                unset($_SESSION['add']);
              }
              if(isset( $_SESSION['login'])){
                ?>
                <div class="alert alert-success" role="alert">
                     <?php echo $_SESSION['login']."<br/>"; ?>
                </div>
                <?php
                unset($_SESSION['login']);
              }
              if(isset($_SESSION['delete'])){
                
                ?>
                <div class="alert alert-success" role="alert">
                     <?php echo $_SESSION['delete']."<br/>"; ?>
                </div>
                <?php
                unset($_SESSION['delete']);
              }
              if(isset($_SESSION['update'])){
                
                ?>
                <div class="alert alert-success" role="alert">
                     <?php echo $_SESSION['update']."<br/>"; ?>
                </div>
                <?php
                unset($_SESSION['update']);
              }
              // echo '<pre>';
              // print_r($_SESSION);
              // echo '</pre>';
            ?>

            <a href="addAdmin.php" class="btn btn-primary" >Add Admin</a>
            <br>
            <br>
            <table class="table">
            <tr>
              <th>ID</td>
              <th>FullName</td>
              <th>UserName</td>
              <th>Password</td>
              <th>Action</th>
            </tr>
            <?php 
              $obj=new constant();
              $con=$obj->connect();
              $sql="select * from tbl_admin ";
              $stat=$con->prepare($sql);
              $res=$stat->execute();
              if($res){
              while ($row = $stat->fetch(PDO::FETCH_ASSOC)){
                $id=$row['id'];
                $full_name=$row['full_name'];
                $username=$row['username'];
                $password=$row['password'];
                ?>
                    <tr>
                      <td><?php echo $id?></th>
                      <td><?php echo $full_name?></th>
                      <td><?php echo $username?></th>
                      <td><?php echo $password?></th>
                      <td>
                        <!-- <a href="#" class="btn small btn-success">Update</a> -->
                      <form action="updateAdmin.php" style="display: inline-block;" method="post">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" class="btn small btn-success" value="Update" >
                       </form>
                       <form action="deleteAdmin.php" style="display: inline-block;" method="post">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" class="btn small btn-danger" value="Delete" >
                       </form>
                      </td>
                    </tr>
                <?php
              }
            }
            ?>
            </table>
        </div>
    </div>
    <!-- Main content  Section end -->

    <?php  include('partials/footer.php') ?>
