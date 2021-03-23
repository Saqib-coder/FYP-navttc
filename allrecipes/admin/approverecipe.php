<?php
require("dbconnect.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "UPDATE `recipe` SET `status`= 1 WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:recipelist.php");
    }
}


?>