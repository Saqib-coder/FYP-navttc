<?php
include 'header.php';

?>


<?php
	if (isset($_POST['submit'])) {
		$subcat = $_POST['subcat'];
		echo $id = $_GET['id'];
		$sql = "UPDATE `subcategories` SET `sub_name`='$subcat' WHERE sub_id=$id";
		$result = mysqli_query($conn,$sql);
		if ($result) {
			header('location:subcatlist.php');
		}
	}

?>
 <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit SubCategory</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                	<div class="container">
	                                	<div class="row">
	                                		<div class="col-12 col-md-6">
								<form action="" method="POST">
								  <div class="form-group">
								    <label>Edit Subcategory</label><?php
                                    if(isset($_GET['id'])){
                                        $id = $_GET['id'];
                                    }
                                    $sql = "select * from subcategories where sub_id = $id";
										  	$result = mysqli_query($conn,$sql);	
										  	$i = 1;
										  	while ($row = mysqli_fetch_assoc($result)){ ?>
								    <input type="text" class="form-control" value= "<?php echo $row['sub_name'];?>"   placeholder="Enter sub category" name="subcat">
								    <?php }
                                    ?>
								  </div>
								  
								  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
								</form>	

	                                	</div>
                                	</div>
                            </div>
                        </div>
                </div>    

               		</div>
            </div>







<?php
include 'footer.php';

?>