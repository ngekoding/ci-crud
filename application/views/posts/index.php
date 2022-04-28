<h3>Post</h3>
<hr>
<a href="<?= site_url('post/create') ?>" class="btn btn-success btn-sm">Add new</a>
<a href="<?= site_url('post/datatables') ?>" class="btn btn-primary btn-sm">Datatables</a>
<br><br>

<!-- Success & Error message -->
<?php if ($this->session->flashdata('msg_success')): ?>
	<div class="alert alert-success"><?= $this->session->flashdata('msg_success') ?></div>
<?php endif ?>
<?php if ($this->session->flashdata('msg_error')): ?>
	<div class="alert alert-danger"><?= $this->session->flashdata('msg_error') ?></div>
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
			<td><?= $no++ ?></td>
			<td><?= $p->title ?></td>
			<td><?= $p->category ?></td>
			<td>
			<a href="<?= site_url('post/edit/'.$p->id) ?>" class="btn btn-success btn-sm">Edit</a>
			<a href="<?= site_url('post/delete/'.$p->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are your sure?')">Delete</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
