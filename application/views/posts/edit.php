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
                <a class="dropdown-item" href="#">Something else here</a>
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
          <form action="<?php echo site_url('post/update') ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $post->id ?>">
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="title" class="form-control" value="<?php echo $post->title ?>">
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea name="descripion" rows="3" class="form-control"><?php echo $post->description ?></textarea>
            </div>
            <div class="form-group">
              <label>Category</label>
              <select name="category" class="form-control">
                <?php foreach ($categories as $category): ?>
                  <option value="<?php echo $category->id ?>" <?php if ($category->id == $post->category_id) echo 'selected'; ?>><?php echo $category->name ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
          </form>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url() ?>assets/libs/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>