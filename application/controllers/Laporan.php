<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Surat', 'surat');
        $this->load->model('M_Pengaduan', 'pengaduan');
        $this->load->library('pdf');
    }

    public function index()
    {
        // kosong atau redirect ke fungsi lain
    }

    public function _jumlah_surat()
	{
		$this->db->where('status', 0);
		return $this->db->count_all_results('tb_surat');
	}
	
	public function _jumlah_pengaduan()
	{
		$this->db->where('status', 0);
		return $this->db->count_all_results('tb_pengaduan');
	}

    public function permohonan()
    {
        if ($this->session->userdata('akses') == 1) {
            $session = $this->session->userdata('id');
            $start_date = $this->input->get('start_date');
            $end_date = $this->input->get('end_date');

            $surat = $this->surat->filterSurat($start_date, $end_date);

            $data = array(
                'title' => 'Laporan Permohonan',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'surat' => $surat,
                'jumlah_surat' => $this->_jumlah_surat(),
                'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
                'start_date' => $start_date,
                'end_date' => $end_date
            );
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('laporan/lap_permohonan', $data);
            $this->load->view('templates/dashboard/v_footer');
        } else {
            // Handle unauthorized access
            redirect('auth');
        }
    }

    public function pengaduan()
{
    if ($this->session->userdata('akses') == 1) {
        $session = $this->session->userdata('id');
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Panggil model untuk mengambil data pengaduan
        $this->load->model('M_Pengaduan');
        $pengaduan = $this->M_Pengaduan->filterPengaduan($start_date, $end_date);

        $data = array(
            'title' => 'Laporan Pengaduan',
            'subtitle' => 'Menu Utama',
            'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
            'pengaduan' => $pengaduan, // Ubah variabel $aduan menjadi $pengaduan
            'jumlah_pengaduan' => $this->_jumlah_pengaduan(),
            'jumlah_surat' => $this->_jumlah_surat(),
            'start_date' => $start_date,
            'end_date' => $end_date
        );
        $this->load->view('templates/dashboard/v_header', $data);
        $this->load->view('templates/dashboard/v_navbar', $data);
        $this->load->view('templates/dashboard/v_sidebar', $data);
        $this->load->view('templates/dashboard/v_crumb', $data);
        $this->load->view('laporan/lap_pengaduan', $data); // Load view untuk laporan pengaduan
        $this->load->view('templates/dashboard/v_footer');
    } else {
        // Handle unauthorized access
        redirect('auth');
    }
}


    public function print_permohonan()
    {
        $this->load->library('pdf');

        // Ambil data filter dari query string
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Ambil data sesuai filter dari model
        $data['permohonan'] = $this->surat->filterSurat($start_date, $end_date);

        // Konfigurasi TCPDF
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Set dokument informasi
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Laporan Permohonan');
        $pdf->SetSubject('Laporan Permohonan');

        // Set header dan footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

        // Set header dan footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // Set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // Set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // Set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // Set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Add a page
        $pdf->AddPage();

        // Load view untuk PDF
        $html = $this->load->view('laporan/pdf_permohonan', $data, true);

        // Print text menggunakan writeHTMLCell()
        $pdf->writeHTML($html, true, false, true, false, '');

        // Tutup dan output PDF
        $pdf->Output('laporan_permohonan.pdf', 'I');
    }

    public function print_pengaduan()
    {
        if ($this->session->userdata('akses') == 1) {
            $data = array(
                'title' => 'Laporan Pengaduan',
                'aduan' => $this->pengaduan->getAllPengaduan()
            );
            $html = $this->load->view('laporan/print_pengaduan', $data, true);
            $this->pdf->createPDF($html, 'Laporan Pengaduan', true, 'A4', 'portrait');
        } else {
            redirect('auth');
        }
    }
}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
?>
