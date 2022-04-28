<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="site-url" content="<?= site_url() ?>">
    <link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

    <title>CI CRUD by Ngekoding</title>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Ngekoding</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                John Doe
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="<?= site_url('auth/logout') ?>">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-4">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              Action
            </div>
            <div class="list-group list-group-flush">
              <a href="<?= site_url('post') ?>" class="list-group-item list-group-item-action">Post</a>
              <a href="#" class="list-group-item list-group-item-action">Category</a>
              <a href="#" class="list-group-item list-group-item-action">Comment</a>
              <a href="<?= site_url('auth/logout') ?>" class="list-group-item list-group-item-action text-danger">Logout</a>
            </div>
          </div>
        </div>  
        <div class="col-md-9">
          <!-- Content -->
          <?= $content ?>
        </div>
      </div>
    </div>

    <script src="<?= base_url('assets/libs/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
	<!-- 
		I add 'ts' param to the custom.js below,
		so when in DEVELOPMENT we don't need to hard reload
		to get the updated code after make any changes

		By the way, 'ts' means for Timestamp
	-->
    <script src="<?= base_url('assets/js/custom.js?ts='.time()) ?>"></script>
  </body>
</html>
