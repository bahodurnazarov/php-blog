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
					<h4>View Post
						<a href="post-add.php" class="btn btn-primary float-end">Add Post</a>
					</h4>
				</div>
				<div class="card-body">

				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Category</th>
								<th>Image</th>
								<th>Status</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
								//$posts = "SELECT * FROM posts WHERE status!='2' ";
								$posts = "SELECT p.*, c.name AS cname FROM posts p,categories c WHERE c.id = p.category_id ";
								$posts_run = mysqli_query($con, $posts);
								
								if(mysqli_num_rows($posts_run) > 0) {
									foreach($posts_run as $post) {
										?>
										<tr>
											<td><?= $post['id']?></td>
											<td><?= $post['name']?></td>
											<td><?= $post['cname']?></td>
											<td><img src="..//uploads/posts/<?= $post['image']?>" width="60px" height="60px" ></td>
											<td><?= $post['status'] == '1' ? 'Hidden':'Visible'?></td>
											<td>
												<a href="post-edit.php?id=<?= $post['id']?>" class="btn btn-success">Edit</a>
											</td>
											<td>
												<form action="code.php" method="POST">
													<button type="submit" name="post_delete_btn" value="<?= $post['id']?>" class="btn btn-danger ">Delete</button>
												</form>
											</td>
										</tr>
										<?php
									}
								} else {
									?>
									<tr>
										<td colspan="6">No Record Found</td>
									</tr>

									<?php
								}
							?>

							<tr>
								<td></td>
							</tr>
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