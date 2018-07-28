<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fpdf_test extends CI_Controller {

	/**
	 * Example: FPDF 
	 *
	 * Documentation: 
	 * http://www.fpdf.org/ > Manual
	 *
	 */
	public function index() {	
		$this->load->library('fpdf_gen');
		
		//$this->fpdf->Image('https://idroot.net/wp-content/uploads/2015/09/codeigniter-logo.jpg',10,8,10);
		
		$this->fpdf->SetFont('Arial','B',16);
		$this->fpdf->Cell(40,30,'Documentação FPDF:');
		
		$this->fpdf->SetXY( 10, 30 );
		$this->fpdf->MultiCell( 200, 8,
		"http://www.botecodigital.info/php/criando-arquivos-pdf-com-php-e-classe-fpdf/");
	
		echo $this->fpdf->Output('PDF.pdf','I');
	}
}
