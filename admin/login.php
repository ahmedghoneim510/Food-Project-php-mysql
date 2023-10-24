<?php     require '../config/constante.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login Food Order System</title>

    
</head>
<body>

<div id="content" class="flex ">
   <div class="">

    

      <div class="page-content page-container" id="page-content">
         <div class="padding">
         <?php 
              if(isset( $_SESSION['login'])){
                ?>
                <div class="alert alert-danger" role="alert">
                     <?php echo $_SESSION['login']."<br/>"; ?>
                </div>
                <?php
                unset($_SESSION['login']);
              } 
              if(isset( $_SESSION['no-login'])){
                ?>
                <div class="alert alert-danger" role="alert">
                     <?php echo $_SESSION['no-login']."<br/>"; ?>
                </div>
                <?php
                unset($_SESSION['no-login']);
              }
            ?>
            <div class="row ">
               <div class="col-md-6 ">
                  <div class="card">
                     <div class="card-header"><strong>Login Admin</strong></div>
                     <div class="card-body">
                        <form action="" method="post">
                           <div class="form-group"><label class="text-muted" for="exampleInputEmail1">UserName</label><input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username"> </div>
                           <div class="form-group"><label class="text-muted" for="exampleInputPassword1">Password</label><input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"></div>
                           <div class="form-group">
                              <!-- <div class="form-check"><input type="checkbox" class="form-check-input"><label class="form-check-label">Check me out</label></div> -->
                           </div>
                           <!-- <button type="submit" >Log in </button> -->
                           <input type="submit" class="btn btn-primary" value="Log in">
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</body>
</html>
<?php 
        // $username=$_POST['username'];
        // $password=$_POST['password'];
        // echo $username .'<br />'. $password .'<br />';
    if((isset($_POST['username'])==true)){
        $username=trim($_POST['username']);
        $password=$_POST['password'];
        echo $username .'<br />'. $password .'<br />';

        // connect and selet
        $sql="select * from tbl_admin where username=? and password=?";
        $conn;
        try {
            $conn = new PDO("mysql:host=localhost;dbname=food-order", "root", "");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
            // $_SESSION['login']="Login has been failed";
            // header("Location:http://localhost/food/web-design-course-restaurant/admin/login.php");

          }
        $stat=$conn->prepare($sql);
        $res=$stat->execute([$username,$password]);
        $columnCount = $stat->columnCount();
        $row = $stat->fetch(PDO::FETCH_ASSOC);
        // echo '<pre>';
        // print_r($row);
        // echo '</pre>';
        
        if(!empty($row) ){
            // echo "Login Successfully";
            // echo $columnCount;
            $_SESSION['login']="Login Successfully";
            $_SESSION['user']=$username;
            header("Location:http://localhost/food/web-design-course-restaurant/admin/index.php");
        }
        else{
            $_SESSION['login']="username or password is incorrect";
            // echo $_SESSION['login'];
           header("Location:http://localhost/food/web-design-course-restaurant/admin/login.php");
        }

    }

?>


