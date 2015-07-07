<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class P_keuangan extends CI_Controller {
		function __Construct()
		{
			parent::__construct();
			$this->cek_login = $this->session->userdata('login') == true;
			$this->load->model('m_aka');
			$this->m_aka->update_waktu_nilai();
			//Load library dari MPDF56
			$this->load->library('MPDF56/mpdf');
		}
		//Genarated HMTL to PDF

		public function _gen_pdf($html, $paper, $layoutpage)
		{
			 ob_end_clean();
			 $mpdf=new mPDF('utf-8', $paper);
			 ini_set('memory_limit','100M');
			 $mpdf->debug = true;
			 $mpdf->SetDisplayMode('fullpage');
			 $mpdf->AddPage($layoutpage);
			 $mpdf->WriteHTML($html);
			 $mpdf->Output();
	 	}
		public function index(){
			if($this->cek_login){
				$data['content']="pg_keuangan/utama";
				$this->load->view('pg_keuangan/content',$data);
			}
		}

		/* ================================= REGISTRASI PEMBAYARAN ================================= */
	
	/* tampilan cari nim mahasiswa */
	public function pengisian_registrasi(){
		$data['content']='pg_keuangan/pengisian_registrasi';
		$this->load->view('pg_keuangan/content',$data);
	}

	/* list data setelah di cari berdasarkan nim */
	public function cari_nim_mhs(){// Mencari berdasarkan NIM di form pengisian FRS
		$cari = $this->input->post('cari');
		$data['query'] = $this->m_aka->cari_nim_mhs($cari);		
		$data['content']='pg_keuangan/list_mahasiswa';
		if($cari){
				$this->load->view('pg_keuangan/content',$data);		
		}else{
				$data['data_frs'] = $this->m_aka->reg();
				$this->load->view('pg_keuangan/content',$data);
		}		
	}

	//input registrasi
	public function input_registrasi(){
		$data['edit'] = $this->m_aka->input_registrasi();
		$data['content'] = 'pg_keuangan/input_registrasi';
		$this->load->view('pg_keuangan/content',$data);
	}

	//proses input registrasi
	public function prosesinput_registrasi(){
		$this->m_aka->prosesinput_registrasi();
		redirect('p_keuangan/registrasi_berdasarkan_perorangan');
	}

	//edit data registrasi
	public function edit_registrasi(){
		$data['edit'] = $this->m_aka->edit_registrasi();
		$data['content'] = 'pg_keuangan/edit_registrasi';
		$this->load->view('pg_keuangan/content',$data);
	}

	//proses edit data registrasi
	public function prosesedit_registrasi()
	{

		$this->m_aka->prosesedit_registrasi();
		redirect('p_keuangan/registrasi_berdasarkan_perorangan');
	}

	//data registrasi berdasarkan perorangan
	public function registrasi_berdasarkan_perorangan()
	{
		$data['content'] = 'pg_keuangan/registrasi_berdasarkan_perorangan';
		$data['data'] = $this->m_aka->registrasi_berdasarkan_perorangan_2();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('pg_keuangan/content', $data);
	}

	//data registrasi berdasarkan semester
	public function registrasi_berdasarkan_semester()
	{
		$data['content'] = 'pg_keuangan/registrasi_berdasarkan_semester';
		$data['data'] = $this->m_aka->registrasi_berdasarkan_semester_2();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('pg_keuangan/content', $data);
	}

	//data registrasi berdasarkan semester
	public function registrasi_berdasarkan_tanggal()
	{
		$data['content'] = 'pg_keuangan/registrasi_berdasarkan_tanggal';
		$data['data'] = $this->m_aka->registrasi_berdasarkan_tanggal_2();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('pg_keuangan/content', $data);
	}

	//hapus data biaya kuliah perorangan
	public function hapus_registrasi_berdasarkan_perorangan()
	{
		$this->m_aka->hapus_registrasi_berdasarkan_perorangan();
		redirect('p_keuangan/registrasi_berdasarkan_perorangan');
	}

	//hapus data biaya kuliah semester
	public function hapus_registrasi_berdasarkan_semester()
	{
		$this->m_aka->hapus_registrasi_berdasarkan_semester();
		redirect('p_keuangan/registrasi_berdasarkan_semester');
	}

	//hapus data biaya kuliah tanggal
	public function hapus_registrasi_berdasarkan_tanggal()
	{
		$this->m_aka->hapus_registrasi_berdasarkan_tanggal();
		redirect('p_keuangan/registrasi_berdasarkan_tanggal');
	}

	/* ================================= END REGISTRASI PEMBAYARAN ================================= */


	/* ================================= BIAYA KULIAH ================================= */
	
	// data biaya kuliah
	public function data_biaya_kuliah()
	{
		$data['data'] = $this->m_aka->data_biaya_kuliah(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'pg_keuangan/data_biaya_kuliah';
		$this->load->view('pg_keuangan/content', $data);
	}

	//proses input data biaya kuliah
	public function prosesinput_data_biaya_kuliah(){
		$this->m_aka->prosesinput_data_biaya_kuliah();
		redirect('p_keuangan/data_biaya_kuliah');
	}

	//edit data biaya kuliah
	public function edit_data_biaya_kuliah(){
		$data['edit'] = $this->m_aka->edit_data_biaya_kuliah();
		$data['content'] = 'pg_keuangan/edit_data_biaya_kuliah';
		$this->load->view('pg_keuangan/content',$data);
	}

	//proses edit data biaya kuliah
	public function prosesedit_data_biaya_kuliah()
	{

		$this->m_aka->prosesedit_data_biaya_kuliah();
		redirect('p_keuangan/data_biaya_kuliah');
	}

	//hapus data biaya kuliah
	public function hapus_data_biaya_kuliah()
	{
		$this->m_aka->hapus_data_biaya_kuliah();
		redirect('p_keuangan/data_biaya_kuliah');
	}

	/* ================================= END BIAYA KULIAH ================================= */

	public function keuangan(){
		$data['content'] = 'pg_keuangan/keuangan';
		$this->load->view('pg_keuangan/content', $data);
	}
	public function report_keuangan(){
		$data['data'] = $this->m_aka->ambil_data_keuangan();
		$output = $this->load->view("pg_keuangan/report_keuangan", $data, true);
		//$this->load->view("report/report_transkrip",$data);
		return $this->_gen_pdf($output,"A4","P");
	}

		public function logout(){
			$this->session->sess_destroy();
			redirect('c_index_aka/pilih_menu');
		}
	}