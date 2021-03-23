<?php
include 'header.php';
?>
<?php
	if (isset($_POST['submit'])) {
		$subname = $_POST['subname'];
		$catid = $_POST['catid'];
		$sql = "insert into subcategories(sub_name,cat_id)values('$subname',$catid)";
		$result = mysqli_query($conn,$sql);
		if ($result) {
			header('location:subcatlist.php');
		}
	}

?>
 <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Sub-Category</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                	<div class="container">
	                                	<div class="row">
	                                		<div class="col-12 col-md-6">
								<form action="" method="POST">
								  <div class="form-group">
								    <label>Add sub-category</label>
								    <input type="text" class="form-control"   placeholder="Enter Sub-category" name="subname">
								    <select class="custom-select my-4" name="catid" id="inputGroupSelect01">
										<option selected disabled>Choose category</option>
										<?php 
											$sql = "select * from categories";
											$res = mysqli_query($conn,$sql);
											while($row = mysqli_fetch_assoc($res)){
										?>
										<option value="<?php echo $row['cat_id']?>"><?php echo $row['cat_name']?></option>
										<?php 
											}
										?>
  									</select>
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