<?php
include 'header.php';

?>


              <div class="container-fluid">

                  
                   
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registered Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                	<div class="row">
                                		<table class="table">
										  <thead class="text-nowrap">
										    <tr>
										      <th scope="col">#</th>
										      <th scope="col">First Name</th>
										      <th scope="col">Last Name</th>
										      <th scope="col">Email</th>
										      <th scope="col">DOB</th>
										      <th scope="col">Gender</th>
										      <th scope="col">Phone number</th>
										      <th scope="col">Address</th>
										      <th scope="col">Added on</th>
										      
										      
										    </tr>
										  </thead>
										  <tbody class="text-nowrap">
										  	<?php
										  	$sql = "SELECT * FROM `users`";
										  	$result = mysqli_query($conn,$sql);	
										  	$i = 1;
										  	while ($row = mysqli_fetch_assoc($result)){ ?>
										  		<tr>
										      <th scope="row"><?php echo $i;?></th>
										      <td><?php echo $row['first_name'];?></td>
										      <td><?php echo $row['last_name'];?></td>
										     <td><?php echo $row['email'];?></td>
										      <td><?php echo $row['DOB'];?></td>
										      <td><?php echo $row['Gender'];?></td>
										      <td><?php echo $row['Phone_number'];?></td>
										      <td><?php echo $row['Address'];?></td>
										      <td><?php echo $row['added_on'];?></td>

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