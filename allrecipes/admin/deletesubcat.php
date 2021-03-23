<?php
require('dbconnect.php');
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = "DELETE FROM `subcategories` WHERE sub_id = $id";
$result = mysqli_query($conn,$sql);
if($result){
header('location:subcatlist.php');
}

}


?>