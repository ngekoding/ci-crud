<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/bootstrap/css/bootstrap.min.css">

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
                <a class="dropdown-item" href="<?= site_url('auth/logout') ?>">Logout</a>
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
              <a href="" class="list-group-item text-dark">Post</a>
              <a href="" class="list-group-item text-dark">Category</a>
              <a href="" class="list-group-item text-dark">Comment</a>
            </div>
          </div>
        </div>  
        <div class="col-md-9">
          <h3>Post</h3>
          <hr>
          <a href="<?php echo site_url('post/create') ?>" class="btn btn-success btn-sm">Add new</a>
          <br><br>
          
          <!-- Success & Error message -->
          <?php if ($this->session->flashdata('msg_success')): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('msg_success') ?></div>
          <?php endif ?>
          <?php if ($this->session->flashdata('msg_error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('msg_error') ?></div>
          <?php endif ?>

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Title</th>
                <th>Category</th>
                <th width="150">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($posts as $key => $p): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $p->title ?></td>
                  <td><?php echo $p->category ?></td>
                  <td>
                    <a href="<?php echo site_url('post/edit/'.$p->id) ?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="<?php echo site_url('post/delete/'.$p->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are your sure?')">Delete</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url() ?>assets/libs/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
