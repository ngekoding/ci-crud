<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="<?php echo base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">

		<title>Auth - Ngekoding</title>
	</head>
	<body>
		
		<div class="container mt-4">
			<div class="row">
				<div class="col-md-4 offset-md-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Please login</h5>
							
							<!-- Error message go here -->
							<?php if ($this->session->flashdata('login-error')): ?>
								<div class="alert alert-danger"><?= $this->session->flashdata('login-error') ?></div>
							<?php endif ?>

							<form action="<?= site_url('auth/do_login') ?>" method="post">
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" class="form-control" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary">Login</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="<?php echo base_url() ?>assets/libs/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url() ?>assets/libs/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
