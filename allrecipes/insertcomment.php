<?php
require "admin/dbconnect.php";

 $name=$_POST['name'];
 $id = $_POST['recipeid'];   
 $uid = $_POST['userid'];  

$sql = "INSERT INTO `comments`(`comments`, `rec_id`, `user_id`) VALUES ('$name',$id,$uid)";
$result = mysqli_query($conn,$sql);
if($result){
    echo "data inserted";
}

?>