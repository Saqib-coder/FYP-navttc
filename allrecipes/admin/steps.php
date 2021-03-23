<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

?>
<?php
include 'header.php';

?>
		

              <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">STEPS</h6>
                        </div>
                        <div class="card-body" >
                            <div class="table-responsive">
                                	<div class="row">
                                		<table class="table" >
										  <thead class="text-nowrap">
										    <tr>
										      <th scope="col">#</th>
										      <th scope="col">STEPS</th>
										    </tr>
										  </thead>
										  <tbody>
										  	<?php
										  	$sql = "SELECT *
											  FROM directions
											  where rec_id = $id ";
										  	$result = mysqli_query($conn,$sql);	
										  	$i = 1;
										  	while ($row = mysqli_fetch_assoc($result)){ ?>
										  		<tr>
										      <th scope="row"><?php echo $i;?></th>
											  <td class="text-nowrap" ><?php echo $row['steps'];?></td>
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