<?php
	 require('admin/dbconnect.php');
		if($_POST['type']==""){
		$sql = "SELECT * FROM `categories`";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
		}
	}elseif($_POST['type']=="loadmsg"){
		$sql = "SELECT * FROM `subcategories` where sub_id = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['sub_id']}'>{$row['sub_name']}</option>";
		}			
	}
	echo $str;
 ?>
