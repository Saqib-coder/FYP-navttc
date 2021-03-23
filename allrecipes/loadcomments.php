<?php
	 require('admin/dbconnect.php');
	 $id = $_POST['recipeid'];   
	 $uid = $_POST['userid'];  
	 	 	$sql3 = "SELECT comments.comments,users.first_name,users.last_name from comments INNER JOIN users ON comments.user_id = users.id WHERE comments.rec_id = $id";
		$query = mysqli_query($conn,$sql3) or die("Query Unsuccessful.");

		$str = "";
		while($row2 = mysqli_fetch_assoc($query)){
			$str .= "<div>
				
					 <p class='text-info text-bold'>
					 {$row2['first_name']} {$row2['last_name']}</p>
					
				
			</div>
				<h5 class='text-secondary'>{$row2['comments']}</h5>
				<hr>

		
		</div>";
		}
	echo $str;
 ?>



