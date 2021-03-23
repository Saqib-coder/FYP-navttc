<?php
include 'header.php';

?>
		

              <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manage Recipe</h6>
                        </div>
                        <div class="card-body" >
                            <div class="table-responsive">
                                	<div class="row">
                                		<table class="table" >
										  <thead class="text-nowrap">
										    <tr>
										      <th scope="col">#</th>
										      <th scope="col">Title</th>
											  <th scope="col" >description</th>
											  <th scope="col">image</th>
											  <th scope="col">prep time</th>
											  <th scope="col">total time</th>
											  <th scope="col">servings</th>
											  <th scope="col">yields</th>
											  <th scope="col">Sub category</th>
											  <th scope="col">Ingredients</th>
											  <th scope="col">Steps</th>
											  <th scope="col">status</th>
											  <th scope="col">Action</th>
										    </tr>
										  </thead>
										  <tbody>
										  	<?php
										  	$sql = "SELECT *
											  FROM recipe
											  INNER JOIN subcategories
											  ON recipe.sub_id = subcategories.sub_id;";
										  	$result = mysqli_query($conn,$sql);	
										  	$i = 1;
										  	while ($row = mysqli_fetch_assoc($result)){ ?>
										  		<tr>
										      <th scope="row"><?php echo $i;?></th>
										      <td><?php echo $row['title'];?></td>
											  <td class="text-nowrap" ><?php echo $row['description'];?></td>
											  <td><img src="../images/recipes/<?php echo $row['image'];?>" class="rounded" width="200" height="200"></td>
											  <td><?php echo $row['prep'];?></td>
											  <td><?php echo $row['total_time'];?></td>
											  <td><?php echo $row['servings'];?></td>
											  <td><?php echo $row['yields'];?></td>
											  <td><?php echo $row['sub_name'];?></td>
											  <td><a href="ingredients.php?id=<?php echo $row['id'];?>">Ingredients</a></td>
											  <td><a href="steps.php?id=<?php echo $row['id'];?>">Steps</a></td>	
											  <td><?php if($row['status']==1){
													echo "active";
											  
											}else
											{
												echo "pending";
											}
											?></td>
											  <td>
											  <a href="approverecipe.php?id=<?php echo $row['id'];?>">	<i class="fas fa-check text-dark"></i></a>
										    <a href="deletecat.php?id=<?php echo $row['id'];?>"><i class="fas fa-trash-alt text-danger"></i></a>
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