<?php 
include("authentication.php");
include('includes/header.php');
?>


<div class="container-fluid px-4">
    <h3 class="mt-4">Users</h3>
    
	<div class="row mt-4">
		<div class="col-md-12">

			<?php include('message.php'); ?>

			<div class="card">
				<div class="card-header">
					<h4>View Category
						<a href="category-add.php" class="btn btn-primary float-end">Add Category</a>
					</h4>
				</div>
				<div class="card-body">

							
					<div class="table-responisve">
						<table class="table table-bordered table-stripe">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Status</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$category = "SELECT * FROM categories WHERE status!='2'";
									$category_run = mysqli_query($con, $category);

									if(mysqli_num_rows($category_run) > 0) {
										foreach($category_run as $item) {
											?>
											<tr>
												<td><?=$item['id'];?></td>
												<td><?=$item['name'];?></td>
												<td>
													<?= $item['status'] == '1' ? 'hidden':'visible' ?>
												</td>
												<td>
													<a href="category-edit.php?id=<?=$item['id'];?>" class="btn btn-info">Edit</a>
												</td>
												<td>
													<form action="code.php" method="POST">
													<button type="submit" name="category_delete" value="<?=$item['id'];?>" class="btn btn-danger">Delete</button>
												</form>
												</td>
											</tr>
											<?php
										}
									} else {
										?>
											<tr>
												<td colspan="5">No Record Found</td>
											</tr>
										<?php
									}
								?>
							</tbody>
						</table>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>