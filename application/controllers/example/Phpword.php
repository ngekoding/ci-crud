<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phpword extends CI_Controller {

	public function index()
	{
		$this->template->show('examples/phpword/index');
	}

	public function generate_by_template()
	{
		// We don't use any validations here.
		// But, in the real project you must do it!

		// Data source from the form
		// You are freely to use any data source (e.g. Database/Model)
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$bio = $this->input->post('bio');

		// Here we go!

		$template_path = FCPATH.'/assets/docs/phpword-template.docx';
		$template = new \PhpOffice\PhpWord\TemplateProcessor($template_path);

		$template->setValue('name', $name);
		$template->setValue('email', $email);
		$template->setValue('bio', $bio);

		// You can also use an image
		$template->setImageValue('image_profile', [
			'path' => FCPATH.'/assets/images/profile.png',
			'width' => 100,
			'height' => 100
		]);

		$filename = 'phpword-example.docx';

		// Download the result
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		$template->saveAs("php://output");
	}
}
