<?php
    session_start();

    class constant
    {
      public $servername = "localhost";
      function connect(){
          try {
              $conn = new PDO("mysql:host=$this->servername;dbname=food-order", "root", "");
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              // echo "Connected successfully";
              return $conn;
            } catch(PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }
      }
      function GetnumberOfRow(){
        $con=$this->connect();
        $sql="select * from tbl_admin ";
        $stat=$con->prepare($sql);
        $stat->execute();
        $rowCount = $stat->rowCount();
        return $rowCount;
      }
    }
    
?>