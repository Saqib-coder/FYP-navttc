<?php
include 'header.php';

?>


<?php
	if (isset($_POST['submit'])) {
		$catname = $_POST['cat'];
		$sql = "insert into categories(cat_name)values('$catname')";
		$result = mysqli_query($conn,$sql);
		if ($result) {
			header('location:catlist.php');
		}
	}

?>
 <div class="container-fluid">

                  
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                	<div class="container">
	                                	<div class="row">
	                                		<div class="col-12 col-md-6">
								<form action="" method="POST">
								  <div class="form-group">
								    <label>Edit category</label>
								    <input type="text" class="form-control"   placeholder="Enter category" name="cat">
								    
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