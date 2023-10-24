<?php  include('partials/menu.php') ?>
<div class="main-content">
        <div class="wrapper">
          <h1>Mangae Categories</h1>
          <br>
          <?php 
              if(isset($_SESSION['addcategorry'])){
                ?>
                <div class="alert alert-success" role="alert">
                     <?php echo $_SESSION['addcategorry']."<br/>"; ?>
                </div>
                <?php
                
                unset($_SESSION['addcategorry']);
              }
              if(isset($_SESSION['remove'])){
                ?>
                <div class="alert alert-success" role="alert">
                     <?php echo $_SESSION['remove']."<br/>"; ?>
                </div>
                <?php
                
                unset($_SESSION['remove']);
              }
              if(isset($_SESSION['update'])){
                ?>
                <div class="alert alert-success" role="alert">
                     <?php echo $_SESSION['update']."<br/>"; ?>
                </div>
                <?php
                
                unset($_SESSION['update']);
              }
            ?>

            <a href="addcate.php" class="btn btn-primary" >Add Category</a>
            <br>
            <br>
            <table class="table">
              <tr>
              <th>S.N</th>
              <th>Title</th>
              <th>Image</th>
              <th>Feature</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
            <?php 
              $obj=new constant();
              $con=$obj->connect();
              $sql="select * from tbl_category";
              $stat=$con->prepare($sql);
              $res=$stat->execute();
              if($res){
                $cnt=1;
              while ($row = $stat->fetch(PDO::FETCH_ASSOC))
              {
                ?>
                <tr>
                      <td><?php echo  $cnt++?></th>
                      <td><?php echo $row['title']?></th>

                      <td><?php 
                        $image_name=$row['image_name'];
                        if ($image_name!=""){
                            ?>
                            <img width="100px;" src="<?php echo "http://localhost/food/web-design-course-restaurant/images/categories/"."$image_name"?>" alt="">
                            <?php
                        }
                        else{
                          echo "<div class='btn small btn-danger'>NOT FOUND</div>";
                        }
                      
                      ?></th>
                      <td><?php echo $row['feature']?></th>
                      <td><?php echo $row['active']?></th>
                      <td>
                        <!-- <a href="#" class="btn small btn-success">Update</a> -->
                      <form action="update_category.php" style="display: inline-block;" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <input type="hidden" name="image_name" value="<?php echo $image_name?>">
                        <input type="submit" class="btn small btn-success" value="Update" >
                       </form>
                       <form action="delete_category.php" style="display: inline-block;" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <input type="hidden" name="image_name" value="<?php echo $image_name?>">
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

<?php  include('partials/footer.php') ?>
