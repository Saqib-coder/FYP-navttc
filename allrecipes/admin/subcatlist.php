<?php
include 'header.php';

?>
              <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                	<div class="col-sm-12 col-md-12">
                                		<div class="dataTables_filter"><label><a class="btn btn-primary" href="addsubcategory.php">Add Subcategory</a>
                                		</div>
                                	</div>
                                	<div class="row">
                                		<table class="table">
										  <thead>
										    <tr>
										      <th scope="col">#</th>
										      <th scope="col">SubCategory Name</th>
											  <th scope="col">category Name</th>
											  <th scope="col">Action</th>
										    </tr>
										  </thead>
										  <tbody>
										  	<?php
										  	$sql = "SELECT sub_id,sub_name,cat_name
											  FROM subcategories
											  INNER JOIN categories
											  ON subcategories.cat_id = categories.cat_id";
										  	$result = mysqli_query($conn,$sql);	
										  	$i = 1;
										  	while ($row = mysqli_fetch_assoc($result)){ ?>
										  		<tr>
										      <th scope="row"><?php echo $i;?></th>
											  <td><?php echo $row['sub_name'];?></td>
										      <td><?php echo $row['cat_name'];?></td>
											  <td>
											  <a href="editsubcat.php?id=<?php echo $row['sub_id'];?>">	<i class="fas fa-edit"></i></a>
										    <a href="deletesubcat.php?id=<?php echo $row['sub_id'];?>"><i class="fas fa-trash-alt"></i></a>
											  </td>
										    </tr>	
										  	<?php
										  $i++;
										  }
										  	?>
										  </tbody>
										</table>
                                	</div>
                            </div>
                        </div>
                    

               		</div>
            </div>

<?php
include 'footer.php';

?>