<?php  include('partials/menu.php'); ?>
<div class="row ">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-header"><strong>Add Category</strong></div>
                <div class="card-body">
                <form action="" method="post">
                    <div class="form-group"><label class="text-muted" for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title"> 
                    </div>
                    <hr>
                    <div class="form-group">
                        <table>
                            <tr>
                                <th>Feature</th>
                            </tr>

                            <tr>
                                <td>YES</td>
                                <td><input type="radio" name="feature" class="form-control" value="yes" placeholder="Enter title"> </td>
                            </tr>
                            <tr>
                                <td>NO</td>
                                <td><input type="radio" name="feature" class="form-control" value="no" placeholder="Enter title"> </td>
                            </tr>   
                                                            
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <th>Active</th>
                            </tr>

                            <tr>
                                <td>YES</td>
                                <td><input type="radio" name="active" class="form-control" value="yes" placeholder="Enter title"> </td>
                            </tr>
                            <tr>
                                <td>NO</td>
                                <td><input type="radio" name="active" class="form-control" value="no" placeholder="Enter title"> </td>
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
<?php 
if(isset($_POST['title'])==true){
    

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
    // echo $title ." ".$feature . " ". $action;
    $obj=new constant();
    $con=$obj->connect();
    $sql = "insert into tbl_category set title=? , feature=? , active=?";
    $stat=$con->prepare($sql);
    $res=$stat->execute([$title,$feature,$active]);
    if ($res){
        echo "done";
        // $_SESSION['addcategorry']="Added  Category successfully";
        // unset($_SESSION['addCategory']);
        // header("Location:http://localhost/food/web-design-course-restaurant/admin/manage-category.php");
 
    }
    else
    {
        // $_SESSION['addcategorry']="Added  Category successfully";
        // header("Location:http://localhost/food/web-design-course-restaurant/admin/addcate.php");

    }

}


?>
<?php  include('partials/footer.php'); ?>