<?php
include('includes/header.php');
if(isset($_SESSION['auth'])) {
	if(!isset($_SESSION['message'])) {
		$_SESSION['message'] = "You are already logged in";
	} 
	$_SESSION['message']= "You are Already logged In";
	header("Location: index.php");
	exit(0);
}
include('includes/navbar.php');
?>

<div class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<?php include('message.php');?>
				<div class="card">
					<div class="card-header">
						<h4>Login</h4>
					</div>
					<div class="card-body">
						<form action="logincode.php" method="POST">
							<div class="from-group mb-3">
								<label for="">Email id</label>
								<input type="email" name="email" placeholder="Enter email Address" class="form-control" name="" >
							</div>
							<div class="from-group mb-3">
								<label for="">Password</label>
								<input type="password" autocomplete="on" name="password" placeholder="Enter Password" class="form-control" name="" >
							</div>
							<div class="form-group mb3">
								<button type="submit" name="login_btn" class="btn btn-primary">Login Now</button>
							</div>
						</form>					

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
include('includes/footer.php');
?>