<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index()
	{
		$this->load->view('reports/index');
	}

	public function save_to_file()
	{
		$this->load->library('pdfbuilder');

		$html = $this->load->view('reports/pdf-template', NULL, TRUE); // NULL -> without data
		$pdf  = $this->pdfbuilder->build($html, 'My report', FALSE);
		$save = file_put_contents(APPPATH.'../assets/pdf-outputs/My-report.pdf', $pdf);

		if ($save === FALSE) {
			echo 'Failed! Please make your <b>pdf-outputs</b> directory writable.';
		} else {
			echo 'File saved.';
		}
	}

	public function view_in_browser()
	{
		$this->load->library('pdfbuilder');

		$html = $this->load->view('reports/pdf-template', NULL, TRUE); // NULL -> without data
		
		// Show PDF in browser
		$this->pdfbuilder->build($html, 'My report', TRUE);
	}
}
