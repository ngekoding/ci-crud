
<h3>Add Post</h3>
<hr>
<form action="<?= site_url('post/store') ?>" method="post">
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control">
	</div>
	<div class="form-group">
		<label>Description</label>
		<textarea name="description" rows="3" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>Category</label>
		<select name="category" class="form-control">
		<?php foreach ($categories as $category): ?>
			<option value="<?= $category->id ?>"><?= $category->name ?></option>
		<?php endforeach ?>
		</select>
	</div>
	<a href="<?= site_url('post') ?>" class="btn btn-secondary">Cancel</a>
	<button type="submit" class="btn btn-success">Save</button>
</form>
