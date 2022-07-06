<h3>PHPWord Example</h3>
<hr>
<h5>Create .docx document from template (Template Processor)</h5>
<p>Please fill the form to generate the document.</p>

<form action="<?= site_url('example/phpword/generate_by_template') ?>" method="post">
	<div class="form-group">
		<label for="name">Name</label>
		<input class="form-control" type="text" name="name" placeholder="Enter your name" value="Nur Muhammad">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input class="form-control" type="text" name="email" placeholder="Enter your email" value="blog.nurmuhammad@gmail.com">
	</div>
	<div class="form-group">
		<label for="bio">Biography</label>
		<textarea class="form-control" rows="3" name="bio" placeholder="Tell about your life!">Hi, I am a web developer.</textarea>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
