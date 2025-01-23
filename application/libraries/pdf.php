<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf
{
    public function createPDF($html, $filename, $download = true, $paper = 'A4', $orientation = 'portrait')
    {
        $pdf = new TCPDF($orientation, PDF_UNIT, $paper, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle($filename);
        $pdf->SetSubject('PDF Subject');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        if ($download) {
            $pdf->Output($filename . '.pdf', 'D');
        } else {
            $pdf->Output($filename . '.pdf', 'I');
        }
    }

	public function load_view($view, $data = array())
    {
        $CI = &get_instance();
        $html = $CI->load->view($view, $data, TRUE);
        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $pdf->Output($this->filename, 'I');
    }

}
