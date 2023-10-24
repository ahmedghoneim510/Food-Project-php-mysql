<?php  include('partials/menu.php'); ?>
<php 
<?php 
              $obj=new constant();
              $con=$obj->connect();
              $sql="select * from tbl_category where id = ? ";
              $stat=$con->prepare($sql);
              $res=$stat->execute([$_POST['id']]);
              if($res){
                $row = $stat->fetch(PDO::FETCH_ASSOC);
                $title=$row['title'];
                $image_name=$row['image_name'];
                $active=$row['active'];
                $feature=$row['feature'];
                $id=$row['id'];
              }
               

?>
<?php echo  $image_name;?>
<div class="row ">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-header"><strong>Add Category</strong></div>
                <div class="card-body">
                <form action="category_updated.php" method="post" enctype="multipart/form-data">
                    <div class="form-group"><label class="text-muted" for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $title; ?>"> 
                    </div>
                    <div class="form-group"><label class="text-muted" for="exampleInputEmail1">Image:</label>
                        <!-- <?php echo "../images/categories/".$image_name;?> -->
                        <img src="<?php echo "../images/categories/".$image_name;?>" alt="" width="100px">
                        
                    </div>
                    <hr>
                    <div>
                        <div class="form-group"><label class="text-muted" for="exampleInputEmail1">Change Image</label>
                        <input type="file" name="imagee" class="form-control" > 
                    </div>
                    <div>
                        <input type="hidden" name="ImageName" value="<?php echo $image_name; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </div>
                    <hr>
                    <div class="form-group">
                        <table>
                            <tr>
                                <th>Feature</th>
                            </tr>

                            <tr>
                                <?php 
                                    if($feature=="yes"){
                                        ?>
                                        <td>YES</td>
                                        <td><input type="radio" name="feature" class="form-control" value="yes" placeholder="Enter title" checked> </td>
                                        <?php 
                                    }
                                    else
                                    {
                                        ?>
                                        <td>YES</td>
                                        <td><input type="radio" name="feature" class="form-control" value="yes" placeholder="Enter title" > </td>
                                        <?php 
                                    }
                                ?>
                                
                            </tr>
                            <tr>
                                <?php 
                                    if($feature=="no"){
                                        ?>
                                         <td>NO</td>
                                         <td><input type="radio" name="feature" class="form-control" value="no"  checked placeholder="Enter title"> </td>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                         <td>NO</td>
                                         <td><input type="radio" name="feature" class="form-control" value="no"   placeholder="Enter title"> </td>
                                        <?php
                                    }
                                ?>
                               
                            </tr>   
                                                            
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <th>Active</th>
                            </tr>

                            <tr>
                                <?php 
                                    if($active=="yes"){
                                        ?>
                                        <td>YES</td>
                                         <td><input type="radio" checked name="active" class="form-control" value="yes" placeholder="Enter title"> </td>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <td>YES</td>
                                        <td><input type="radio" name="active" class="form-control" value="yes" placeholder="Enter title"> </td>
                                        <?php
                                    }
                                ?>
                            </tr>
                            <tr>
                                <?php 
                                if($active=="no"){
                                    ?>
                                    <td>NO</td>
                                    <td><input type="radio" checked name="active" class="form-control" value="no" placeholder="Enter title"> </td>
                                    <?php
                                }
                                else{
                                    ?>
                                        <td>NO</td>
                                        <td><input type="radio" name="active" class="form-control" value="no" placeholder="Enter title"> </td>
                                    <?php
                                }
                                ?>
                            </tr>   
                                                            
                        </table>
                        
                    </div>
                    
                    <!-- <button type="submit" >Log in </button> -->
                    <input type="submit" class="btn btn-primary" value="Add Category">
                </form>
                </div>
            </div>
        </div>
    </div>

