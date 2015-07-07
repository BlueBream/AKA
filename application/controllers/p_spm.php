<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class P_spm extends CI_Controller {
		function __Construct()
		{
			parent::__construct();
			$this->cek_login = $this->session->userdata('login') == true;
			$this->load->model('m_aka');
			$this->load->model('m_spm');
			$this->m_aka->update_waktu_nilai();
			//Load library dari MPDF56
			//$this->load->library('MPDF56/mpdf');
		}
		//Genarated HMTL to PDF

	/*	public function _gen_pdf($html, $paper, $layoutpage)
		{
			 ob_end_clean();
			 $mpdf=new mPDF('utf-8', $paper);
			 ini_set('memory_limit','100M');
			 $mpdf->debug = true;
			 $mpdf->SetDisplayMode('fullpage');
			 $mpdf->AddPage($layoutpage);
			 $mpdf->WriteHTML($html);
			 $mpdf->Output();
	 	} */
		public function index(){
			if($this->cek_login){
				$data['content']="pg_spm/utama";
				$this->load->view('pg_spm/content',$data);
			}
		}
/*================================== START LOGOUT =======================================*/

		public function logout(){
			$this->session->sess_destroy();
			redirect("c_index_aka/pilih_menu");
		}
/*================================== END LOGOUT =======================================*/

//================================== START Kuesioner ===================================
		public function kuesioner(){
			$data['content']='pg_spm/Kuesioner';
			$data['data'] = $this->m_spm->Kuesioner_Mahasiswa();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('pg_spm/content',$data);
		}

//proses input data kuesioner
	public function prosesinput_Kuesioner(){
		$this->m_spm->prosesinput_Kuesioner();
		redirect('p_spm/kuesioner');
	}

//data kuesioner
	public function edit_data_kuesioner(){
		$data['edit'] = $this->m_spm->edit_data_kuesioner();
		$data['content'] = 'pg_spm/Edit_Judul_Kuesioner';
		$this->load->view('content',$data);
	}

	//proses edit data kuesioner
	public function prosesedit_data_kuesioner()
	{

		$this->m_aka->prosesedit_data_kuesioner();
		redirect('p_spm/kuesioner');
	}

	//hapus kelas
	public function Hapus_Judul_Kuesioner()
	{
		$this->m_spm->hapus_judul_Kuesioner();
		redirect('p_spm/kuesioner');
	}
//================================== END Kuesioner ===================================

//================================== START Kuesioner Mata Kuliah ===================================
		public function Mata_Kuliah(){
			$data['content']='pg_spm/Mata_Kuliah';
			$data['data'] = $this->m_spm->Kuesioner_MK();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('pg_spm/content',$data);
		}

		//proses input data kuesioner
		public function prosesinput_Kuesioner_MK(){
			$this->m_spm->prosesinput_Kuesioner_MK();
			redirect('p_spm/Mata_Kuliah');
		}

		public function Hapus_Judul_Kuesioner_MK(){
		$this->m_spm->hapus_judul_Kuesioner_MK();
		redirect('p_spm/Mata_Kuliah');
		}

//================================== END Kuesioner ===================================

//================================== START Kuesioner Pegawai ===================================
		public function Pegawai(){
			$data['content']='pg_spm/Pegawai';
			$this->load->view('pg_spm/content',$data);
		}
//================================== END Kuesioner Pegawai ===================================
}
