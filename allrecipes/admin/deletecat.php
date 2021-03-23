<?php
require('dbconnect.php');
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = "DELETE FROM `categories` WHERE cat_id = $id";
$result = mysqli_query($conn,$sql);
if($result){
header('location:catlist.php');
}

}


?>