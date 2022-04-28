<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-post">Add New</button>
<br><br>
<table id="table-post" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th width="15">#</th>
			<th width="200">Title</th>
			<th width="120">Category</th>
			<th>Description</th>
			<th width="110">Actions</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Category</th>
			<th>Description</th>
			<th>Actions</th>
		</tr>
	</tfoot>
</table>

<!-- Modal edit -->
<div class="modal fade" id="modal-post" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal Post</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" method="post">
					<input type="hidden" name="id" class="id">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control title">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description" rows="3" class="form-control description"></textarea>
					</div>
					<div class="form-group">
						<label>Category</label>
						<select name="category" class="form-control category">
							<?php foreach ($categories as $category): ?>
								<option value="<?= $category->id ?>"><?= $category->name ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary btn-save">Save</button>
			</div>
		</div>
	</div>
</div>

