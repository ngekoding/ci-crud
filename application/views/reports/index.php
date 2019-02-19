<!DOCTYPE html>
<html>
<head>
	<title>PDF Report Menu</title>
</head>
<body>
	
	<h3>PDF Report with DOMPDF</h3>
	<p>Please choose render method that you want:</p>
	<ul>
		<li><a href="<?= site_url('report/save_to_file') ?>" target="_blank">Save to File <small>(Saved to /assets/pdf-outputs/)</small></a></li>
		<li><a href="<?= site_url('report/view_in_browser') ?>"  target="_blank">View in Browser</a></li>
	</ul>
</body>
</html>
