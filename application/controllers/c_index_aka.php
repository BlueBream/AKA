<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_index_aka extends CI_Controller {
	
	//Construct 

	function __Construct()
	{
		parent::__construct();
		$this->load->model('m_aka');

	//Menghilangkan session pencarian jika halaman bukan halaman nilai dsb

		//Load library dari MPDF56

		//$this->m_aka->update_waktu_nilai();
	}


	//Genarated HMTL to PDF

	public function _gen_pdf($html, $paper, $layoutpage)
	{
		 ob_end_clean();
		 ini_set('memory_limit','500000M');
		 $mpdf=new mPDF('utf-8', $paper);
		 $mpdf->debug = false;
		 $mpdf->SetDisplayMode('fullpage');
		 $mpdf->AddPage($layoutpage);
		 $mpdf->WriteHTML($html);
		 $mpdf->Output();
 	}


 	public function _gen_pdf_transkrip($html, $paper, $layoutpage)
	{
		 ob_end_clean();
		 ini_set('memory_limit','500000M');
		 $mpdf=new mPDF('utf-8', $paper,'','' , 15 , 15 , 15 , 15 , 0 , 5);
		 $mpdf->debug = false;
		 $mpdf->SetDisplayMode('fullpage');
		 /*$footer = array (
		  'odd' => array (
		    'C' => array (
		      'content' => 'Transkrip Akademik ini SAH bila tercetak pada kertas dengan latar belakang LOGO POLTEK AKA dan bukan Photo Copy',
		      'font-size' => 8,
		      'font-style' => '',
		      'font-family' => 'Opensas',
		      'color'=>'#000000'
		    ),
		    )
		  );

		 $mpdf->SetFooter($footer); */
		 $mpdf->AddPage($layoutpage);
		 $mpdf->WriteHTML($html);
		 $mpdf->SetHTMLFooter('<div style="text-align:center;font-size:10px;font-family:opensans;">Transkrip Akademik ini SAH bila tercetak pada kertas dengan latar belakang LOGO POLTEK AKA dan bukan Photo Copy</div>');
		 $mpdf->Output();
 	}

 	public function _gen_pdf_ijazah_depan($html, $paper, $layoutpage)
	{
		 ob_end_clean();
	//	 $mpdf=new mPDF('utf-8', $paper, '', 0, '', 15, 15, 0, 0, 9, 9);
		 ini_set('memory_limit','500000M');
		 $mpdf=new mPDF('c',$paper,'','' , 15 , 15 , 5 , 5 , 0 , 0); 	 
		 $mpdf->SetDisplayMode('fullpage');
		 $mpdf->debug = true;
		 $mpdf->AddPage($layoutpage);
		 $mpdf->WriteHTML($html);
		 $mpdf->Output();
 	}


	public function pilih_menu()
 	{
 		$this->load->view('pilih_menu');
 	}


 	// Page Login

	public function login()
	{
		$clicked = $this->input->post('login');
		if($clicked)
		{
			$this->m_aka->validationlogin();
		}
		
		$this->load->view('login');
	}

 	public function login_mahasiswa()
	{
		$clicked = $this->input->post('login');
		if($clicked)
		{
			$this->m_aka->login_mahasiswa();
		}
		
		$this->load->view('login_mahasiswa');
	}

	public function login_jurusan()
	{
		$clicked = $this->input->post('login');
		if($clicked)
		{
			$this->m_aka->login_jurusan();
		}
		
		$this->load->view('login_jurusan');
	}
	public function login_dosen()
	{
		$clicked = $this->input->post('login');
		if($clicked)
		{
			$this->m_aka->login_dosen();
		}
		
		$this->load->view('login_dosen');
	}

	public function login_keuangan()
	{
		$clicked = $this->input->post('login');
		if($clicked)
		{
			$this->m_aka->login_keuangan();
		}
		
		$this->load->view('login_keuangan');
	}
	public function login_spm()
	{
		$clicked = $this->input->post('login');
		if($clicked)
		{
			$this->m_aka->login_spm();
		}
		
		$this->load->view('login_spm');
	}
	// Page Home 

	public function index()
	{

		//Check Logged User

		$this->load->view('pilih_menu');
	}


	public function index2()
	{

		//Check Logged User
			$t_waktu = "t_waktu_nilai";
			$data['waktu'] = $this->m_aka->get_all_row($t_waktu);
			$data['content'] = 'home';
			$this->load->view('content', $data);
	}

	/*========================= Password Generate =======================*/

	public function password_generate(){
		$save_password = $this->input->post('save_password');
		
		if($save_password){
			$angkatan = $this->input->post('angkatan');
			$prodi = $this->input->post('program_studi');
			$this->session->set_userdata('angkatan_mhs', $angkatan);
			$this->session->set_userdata('program_studi', $prodi);
					
		}

		$angkatan_ses = $this->session->userdata('angkatan_mhs');
		$prodi_ses = $this->session->userdata('program_studi');
		
		if(!empty($angkatan_ses)){
			$query = "SELECT id_mahasiswa,nim,nama,angkatan,program_studi FROM t_mahasiswa WHERE angkatan = '$angkatan_ses' AND program_studi = '$prodi_ses' ORDER BY nim ASC";
			$data['data'] = $this->m_aka->query_aka($query);
		}else{
			$data['data']= "";
		}
		$tahun1 = 't_tahun_akademik';
		$data['tahun'] = $this->m_aka->get_all($tahun1);
		$data['huruf_password'] = $this->m_aka->huruf_password(3);
		$data['content'] = 'mahasiswa/password_generate';
		$this->load->view('content', $data);
	}

	public function proses_generate_password($pdf=false){
		$angkatan_ses = $this->session->userdata('angkatan_mhs');
		
		if(!empty($angkatan_ses)){
			$query = "SELECT id_mahasiswa,nim,nama,angkatan FROM t_mahasiswa WHERE angkatan = '$angkatan_ses'";
			$data['data'] = $this->m_aka->query_aka($query);
		}else{
			$data['data']= "";
		}

		$this->m_aka->proses_generate_password();
		$output = $this->load->view("report/report_password", $data, true);
		return $this->_gen_pdf($output,"A4","P");


	}
		/* ================================= DATA KELAS ================================= */
	
	// data kelas
	public function data_kelas()
	{
		$query1 = "SELECT t_kelas.id_kelas,t_kelas.nama_kelas,t_kelas.id_prodi,t_prodi.id_prodi,t_prodi.prodi FROM t_kelas INNER JOIN t_prodi ON t_kelas.id_prodi=t_prodi.id_prodi WHERE prodi = 'Analisis Kimia'";
		$query2 = "SELECT t_kelas.id_kelas,t_kelas.nama_kelas,t_kelas.id_prodi,t_prodi.id_prodi,t_prodi.prodi FROm t_kelas INNER JOIN t_prodi ON t_kelas.id_prodi=t_prodi.id_prodi WHERE prodi = 'Penjaminan Mutu Industri Pangan'";
		$query3 = "SELECT t_kelas.id_kelas,t_kelas.nama_kelas,t_kelas.id_prodi,t_prodi.id_prodi,t_prodi.prodi FROm t_kelas INNER JOIN t_prodi ON t_kelas.id_prodi=t_prodi.id_prodi WHERE prodi = 'Pengolahan Limbah Industri'";
		$data['prodi1'] = $this->m_aka->query_aka($query1);
		$data['prodi2'] = $this->m_aka->query_aka($query2);
		$data['prodi3'] = $this->m_aka->query_aka($query3);
		$data['data'] = $this->m_aka->data_kelas(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'data_kelas';
		$this->load->view('content', $data);
	}

	//proses input data kelas
	public function prosesinput_data_kelas(){
		$this->m_aka->prosesinput_data_kelas();
		redirect('c_index_aka/data_kelas');
	}
	//
	//data kelas
	public function edit_data_kelas(){
		$data['edit'] = $this->m_aka->edit_data_kelas();
		$data['content'] = 'edit_data_kelas';
		$this->load->view('content',$data);
	}

	//proses edit data kelas
	public function prosesedit_data_kelas()
	{

		$this->m_aka->prosesedit_data_kelas();
		redirect('c_index_aka/data_kelas');
	}
	//hapus kelas
	public function hapus_data_kelas()
	{
		$this->m_aka->hapus_data_kelas();
		redirect('c_index_aka/data_kelas');
	}

	
	/*========================= mahasiswa =======================*/
	
	public function data_mahasiswa()
	{
		$link = 'data_mahasiswa';
		$data['content'] = 'mahasiswa/data_mahasiswa';
		$data['data'] = $this->m_aka->get_data_mahasiswa($link);
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	//Add value table mahasiswa

	public function add_data_mahasiswa()
	{
		$save = $this->input->post('add_mahasiswa');
		$kelas = 't_kelas';
		$tahun = 't_tahun_akademik';
		$prodi = "t_prodi";
		$data['kelas'] = $this->m_aka->get_all($kelas);
		$data['tahun_aka'] = $this->m_aka->get_all($tahun);
		$data['prodi'] = $this->m_aka->get_all($prodi);
		$data['content'] = 'mahasiswa/tambah_mahasiswa';
		$this->load->view('content', $data);
	}
	
	public function proses_data_mahasiswa()
	{
		$this->m_aka->input_data_mahasiswa();
	}
	
	//Edit mahasiswa
	
	public function edit_mahasiswa()
	{
		$kelas = 't_kelas';
		$tahun = 't_tahun_akademik';
		$prodi = "t_prodi";
		$data['kelas'] = $this->m_aka->get_all($kelas);
		$data['tahun_aka'] = $this->m_aka->get_all($tahun);
		$data['prodi'] = $this->m_aka->get_all($prodi);
		$data['edit'] = $this->m_aka->edit_mahasiswa();
		$data['content'] = 'mahasiswa/edit_mahasiswa';
		$this->load->view('content', $data);
		
	}
	
	public function prosesedit_mahasiswa(){

		$edit = $this->m_aka->prosesedit_mahasiswa();
		if($edit){
			redirect('c_index_aka/data_mahasiswa');
			
		}else if(!$edit){
			$data['content'] = 'mahasiswa/edit_mahasiswa';
			$this->load->view('content', $data);
			
		}
	}

	public function detail_mahasiswa(){
		$data['content'] = "mahasiswa/detail_mahasiswa";
		$uri = $this->uri->segment(3);
		$select = "*";
		$table = "t_mahasiswa,t_kelas,t_dump";
		$where = "t_mahasiswa.nim = t_dump.nim AND t_mahasiswa.id_kelas = t_kelas.id_kelas AND t_mahasiswa.nim = '$uri'";
		$data['data'] = $this->m_aka->get_db_query($select, $table, $where);
		$this->load->view("content", $data);
	}
	
	//Hapus mahasiswa
	
	public function hapus_mahasiswa()
	{
		$this->m_aka->hapus_mahasiswa();
		redirect('c_index_aka/data_mahasiswa');
	}
	
	public function hapus_multiple(){
		$this->m_aka->hapus_multiple_mhs();
		redirect('c_index_aka/data_mahasiswa');
	}	
	/* ================================= MATA KULIAH ================================= */
	// data matakuliah mahasiswa
	public function data_mata_kuliah()
	{
		$query1 = "SELECT t_mk.kode_mk,t_mk.nama_mk,t_mk.jumlah_sks	,t_mk.sks_teori,t_mk.sks_praktek,t_mk.semester,t_mk.pengisian_nilai,t_mk.status,t_mk.flag,t_mk.id_mk_prasarat,t_mk.id_mk_prak,t_mk.is_pratikum,t_mk.id_mk,t_prodi.id_prodi,t_prodi.prodi FROM t_mk INNER JOIN t_prodi ON t_mk.id_prodi=t_prodi.id_prodi WHERE semester = '1' AND prodi = 'Analisis Kimia'";
		$query2 = "SELECT t_mk.kode_mk,t_mk.nama_mk,t_mk.jumlah_sks	,t_mk.sks_teori,t_mk.sks_praktek,t_mk.semester,t_mk.pengisian_nilai,t_mk.status,t_mk.flag,t_mk.id_mk_prasarat,t_mk.id_mk_prak,t_mk.is_pratikum,t_mk.id_mk,t_prodi.id_prodi,t_prodi.prodi FROM t_mk INNER JOIN t_prodi ON t_mk.id_prodi=t_prodi.id_prodi WHERE semester = '1' AND prodi = 'Penjaminan Mutu Industri Pangan'";
		$query3 = "SELECT t_mk.kode_mk,t_mk.nama_mk,t_mk.jumlah_sks	,t_mk.sks_teori,t_mk.sks_praktek,t_mk.semester,t_mk.pengisian_nilai,t_mk.status,t_mk.flag,t_mk.id_mk_prasarat,t_mk.id_mk_prak,t_mk.is_pratikum,t_mk.id_mk,t_prodi.id_prodi,t_prodi.prodi FROM t_mk INNER JOIN t_prodi ON t_mk.id_prodi=t_prodi.id_prodi WHERE semester = '1' AND prodi = 'Pengolahan Limbah Industri'";
		$query4 = "SELECT t_mk.kode_mk,t_mk.nama_mk,t_mk.jumlah_sks	,t_mk.sks_teori,t_mk.sks_praktek,t_mk.semester,t_mk.pengisian_nilai,t_mk.status,t_mk.flag,t_mk.id_mk_prasarat,t_mk.id_mk_prak,t_mk.is_pratikum,t_mk.id_mk,t_prodi.id_prodi,t_prodi.prodi FROM t_mk INNER JOIN t_prodi ON t_mk.id_prodi=t_prodi.id_prodi WHERE semester = '2' AND prodi = 'Analisis Kimia'";
		$query5 = "SELECT t_mk.kode_mk,t_mk.nama_mk,t_mk.jumlah_sks	,t_mk.sks_teori,t_mk.sks_praktek,t_mk.semester,t_mk.pengisian_nilai,t_mk.status,t_mk.flag,t_mk.id_mk_prasarat,t_mk.id_mk_prak,t_mk.is_pratikum,t_mk.id_mk,t_prodi.id_prodi,t_prodi.prodi FROM t_mk INNER JOIN t_prodi ON t_mk.id_prodi=t_prodi.id_prodi WHERE semester = '2' AND prodi = 'Penjaminan Mutu Industri Pangan'";
		$query6 = "SELECT t_mk.kode_mk,t_mk.nama_mk,t_mk.jumlah_sks	,t_mk.sks_teori,t_mk.sks_praktek,t_mk.semester,t_mk.pengisian_nilai,t_mk.status,t_mk.flag,t_mk.id_mk_prasarat,t_mk.id_mk_prak,t_mk.is_pratikum,t_mk.id_mk,t_prodi.id_prodi,t_prodi.prodi FROM t_mk INNER JOIN t_prodi ON t_mk.id_prodi=t_prodi.id_prodi WHERE semester = '2' AND prodi = 'Pengolahan Limbah Industri'";
		$data['semester1A'] = $this->m_aka->query_aka($query1);
		$data['semester2A'] = $this->m_aka->query_aka($query4);
		$data['semester1B'] = $this->m_aka->query_aka($query2);
		$data['semester2B'] = $this->m_aka->query_aka($query5);
		$data['semester1C'] = $this->m_aka->query_aka($query3);
		$data['semester2C'] = $this->m_aka->query_aka($query6);
		$data['data'] = $this->m_aka->data_mata_kuliah(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'mata_kuliah/data_mata_kuliah';
		$this->load->view('content', $data);
	}

	// input data mata kuliah mahasiswa
	public function input_mata_kuliah(){
		$mk = "t_mk";
		$data['content'] = 'mata_kuliah/input_mata_kuliah';
		$data['mata_kuliah'] = $this->m_aka->get_all($mk);
		$this->load->view('content',$data);
	}

	//proses input data mahasiswa
	public function prosesinput_mata_kuliah(){

		$this->m_aka->prosesinput_mata_kuliah();
		redirect('c_index_aka/data_mata_kuliah');
	}

	//edit mata kuliah
	public function edit_mata_kuliah(){
		$mk = "t_mk";
		$data['edit'] = $this->m_aka->edit_mata_kuliah();
		$data['content'] = 'mata_kuliah/edit_mata_kuliah';
		$data['mata_kuliah'] = $this->m_aka->get_all($mk);
		$this->load->view('content',$data);
	}

	//proses edit mata kuliah
	public function prosesedit_mata_kuliah()
	{

		$this->m_aka->prosesedit_mata_kuliah();
		redirect('c_index_aka/data_mata_kuliah');
	}

	//hapus mata kuliah
	public function hapus_mata_kuliah()
	{
		$this->m_aka->hapus_mata_kuliah();
		redirect('c_index_aka/data_mata_kuliah');
	}

	/* ================================= END MATA KULIAH ================================= */



	/* ================================= BAHAN KULIAH ================================= */
	// data mahasiswa
	public function data_bahan_kuliah()
	{
		$this->load->model("m_aka");
		$data['data'] = $this->m_aka->data_bahan_kuliah(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'posting_pengumuman/data_bahan_kuliah';
		$this->load->view('content', $data);
	}

	// input data mahasiswa
	public function input_bahan_kuliah(){
		$data['content'] = 'posting_pengumuman/input_bahan_kuliah';
		$this->load->view('content',$data);
	}

	//proses input data mahasiswa
	public function prosesinput_bahan_kuliah(){

		$this->m_aka->prosesinput_bahan_kuliah();
		redirect('c_index_aka/data_bahan_kuliah');
	}

	/*//edit mata kuliah
	public function edit_cuti_akademik(){
		$this->load->model('m_aka');
		$data['edit'] = $this->m_aka->edit_tahun_ajaran();
		$data['content'] = 'mata_kuliah/edit_tahun_ajaran';
		$this->load->view('content',$data);
	}

	//proses edit mata kuliah
	public function prosesedit_cuti_akademik()
	{
		$this->load->model('m_aka');
		$this->m_aka->prosesedit_tahun_ajaran();
		redirect('c_index_aka/data_tahun_ajaran');
	}*/

	//hapus mata kuliah
	public function hapus_bahan_kuliah()
	{
		$this->m_aka->hapus_bahan_kuliah();
		
	}

	/* ================================= END BAHAN KULIAH ================================= */
	

	/* ================================= JADWAL KULIAH ================================= */
	// data mahasiswa
	public function data_jadwal_kuliah()
	{
		$data['data'] = $this->m_aka->data_jadwal_kuliah(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'mata_kuliah/data_jadwal_kuliah';
		$this->load->view('content', $data);
	}

	// input data mahasiswa
	public function input_jadwal_kuliah(){
		$data['content'] = 'mata_kuliah/input_jadwal_kuliah';
		$this->load->view('content',$data);
	}

	//proses input data mahasiswa
	public function prosesinput_jadwal_kuliah(){
		$this->m_aka->prosesinput_jadwal_kuliah();
		redirect('c_index_aka/data_jadwal_kuliah');
	}

	/*//edit mata kuliah
	public function edit_cuti_akademik(){
		$this->load->model('m_aka');
		$data['edit'] = $this->m_aka->edit_tahun_ajaran();
		$data['content'] = 'mata_kuliah/edit_tahun_ajaran';
		$this->load->view('content',$data);
	}

	//proses edit mata kuliah
	public function prosesedit_cuti_akademik()
	{
		$this->load->model('m_aka');
		$this->m_aka->prosesedit_tahun_ajaran();
		redirect('c_index_aka/data_tahun_ajaran');
	}*/

	//hapus mata kuliah
	public function hapus_jadwal_kuliah()
	{
		$this->m_aka->hapus_jadwal_kuliah();
		redirect('c_index_aka/data_jadwal_kuliah');
	}

/* ================================= BIAYA KULIAH ================================= */
	
	// data biaya kuliah
	public function data_biaya_kuliah()
	{
		$data['data'] = $this->m_aka->data_biaya_kuliah(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'keuangan/data_biaya_kuliah';
		$this->load->view('content', $data);
	}

	//proses input data biaya kuliah
	public function prosesinput_data_biaya_kuliah(){
		$this->m_aka->prosesinput_data_biaya_kuliah();
		redirect('c_index_aka/data_biaya_kuliah');
	}

	//edit data biaya kuliah
	public function edit_data_biaya_kuliah(){
		$data['edit'] = $this->m_aka->edit_data_biaya_kuliah();
		$data['content'] = 'keuangan/edit_data_biaya_kuliah';
		$this->load->view('content',$data);
	}

	//proses edit data biaya kuliah
	public function prosesedit_data_biaya_kuliah()
	{

		$this->m_aka->prosesedit_data_biaya_kuliah();
		redirect('c_index_aka/data_biaya_kuliah');
	}

	//hapus data biaya kuliah
	public function hapus_data_biaya_kuliah()
	{
		$this->m_aka->hapus_data_biaya_kuliah();
		redirect('c_index_aka/data_biaya_kuliah');
	}

	/* ================================= END BIAYA KULIAH ================================= */

/* ================================= REGISTRASI PEMBAYARAN ================================= */
	
	/* tampilan cari nim mahasiswa */
	public function pengisian_registrasi(){
		$data['content']='keuangan/pengisian_registrasi';
		$this->load->view('content',$data);
	}

	/* list data setelah di cari berdasarkan nim */
	public function cari_nim_mhs(){// Mencari berdasarkan NIM di form pengisian FRS
		$cari = $this->input->post('cari');
		$data['query'] = $this->m_aka->cari_nim_mhs($cari);		
		$data['content']='keuangan/list_mahasiswa';
		if($cari){
				$this->load->view('content',$data);		
		}else{
				$data['data_frs'] = $this->m_aka->reg();
				$this->load->view('content',$data);
		}		
	}

	//edit data biaya kuliah
	public function input_registrasi(){
		$id = $this->uri->segment(3);
		$data['edit'] = $this->m_aka->input_registrasi();
		$data['jumlah_sks'] = $this->m_aka->keuangan_sks($id);
		$data['content'] = 'keuangan/input_registrasi';
		$this->load->view('content',$data);
	}

	//proses input registrasi
	public function prosesinput_registrasi(){
		$this->m_aka->prosesinput_registrasi();
		redirect('c_index_aka/registrasi_berdasarkan_perorangan');
	}

	//data registrasi berdasarkan perorangan
	public function registrasi_berdasarkan_perorangan()
	{
		$data['content'] = 'keuangan/registrasi_berdasarkan_perorangan';
		$data['data'] = $this->m_aka->registrasi_berdasarkan_perorangan();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	//data registrasi berdasarkan semester
	public function registrasi_berdasarkan_semester()
	{
		$data['content'] = 'keuangan/registrasi_berdasarkan_semester';
		$data['data'] = $this->m_aka->registrasi_berdasarkan_semester();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	//data registrasi berdasarkan semester
	public function registrasi_berdasarkan_tanggal()
	{
		$data['content'] = 'keuangan/registrasi_berdasarkan_tanggal';
		$data['data'] = $this->m_aka->registrasi_berdasarkan_tanggal();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	//hapus data biaya kuliah perorangan
	public function hapus_registrasi_berdasarkan_perorangan()
	{
		$this->m_aka->hapus_registrasi_berdasarkan_perorangan();
		redirect('c_index_aka/registrasi_berdasarkan_perorangan');
	}

	//hapus data biaya kuliah semester
	public function hapus_registrasi_berdasarkan_semester()
	{
		$this->m_aka->hapus_registrasi_berdasarkan_semester();
		redirect('c_index_aka/registrasi_berdasarkan_semester');
	}

	//hapus data biaya kuliah tanggal
	public function hapus_registrasi_berdasarkan_tanggal()
	{
		$this->m_aka->hapus_registrasi_berdasarkan_tanggal();
		redirect('c_index_aka/registrasi_berdasarkan_tanggal');
	}

	/* ================================= END REGISTRASI PEMBAYARAN ================================= */


	/*============================================= DATA BIMBINGAN ==================================================*/
	public function bimbingan(){
		$data['data']=$this->m_aka->get_dosen();
		$data['content'] = "mk_jurusan/bimbingan";
		$this->load->view('content',$data);
	}
	public function bimbingan_dosen(){
		$data['data']=$this->m_aka->bimbingan_dosen();
		$data['content'] = "mk_jurusan/detail_bimbingan";
		$this->load->view('content',$data);		
	}
	public function delete_mhs_bimbingan(){
		$this->m_aka->delete_mhs_bimbingan();
	}
	public function get_mhs_mahasiswa(){
		$data['data']=$this->m_aka->tmh_bimbingan_dosen();
		$data['content'] = "mk_jurusan/tambah_bimbingan";
		$this->load->view('content',$data);		
	}
	public function tambah_mhs_bimbingan(){
		if(!$this->input->post('nim') == ""){
		$this->m_aka->tambah_mhs_bimbingan();		
		}
	}
	public function cek_tambah_bimbingan(){
		$nim = $this->input->post('nim');
		$this->m_aka->cek_tambah_bimbingan($nim);

	}
	/*============================================= END DATA BIMBINGAN ==================================================*/


	/*============================================= DATA DOSEN ==================================================*/
	
	public function data_dosen()
	{
		$data['content'] = 'dosen/data_dosen';
		$data['data'] = $this->m_aka->data_dosen();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	// input data dosen
	public function input_data_dosen(){
		$data['content'] = 'dosen/input_data_dosen';
		$this->load->view('content',$data);
	}

	//proses input data dosen
	public function prosesinput_data_dosen(){
		$this->m_aka->prosesinput_data_dosen();
		redirect('c_index_aka/data_dosen');
	}
	
	//Edit dosen
	
	public function edit_data_dosen()
	{
		$t_mk = 't_mk';
		$data['t_mk'] = $this->m_aka->get_all_mk($t_mk);
		$data['edit'] = $this->m_aka->edit_data_dosen();
		$data['content'] = 'dosen/edit_data_dosen';
		$this->load->view('content', $data);
	}
	
	public function prosesedit_data_dosen(){

		$edit = $this->m_aka->prosesedit_data_dosen();
		if($edit){
			redirect('c_index_aka/data_dosen');
			
		}else if(!$edit){
			$data['content'] = 'dosen/edit_data_dosen';
			$this->load->view('content', $data);
			
		}
	}

	public function detail_dosen(){
		$data['content'] = "mahasiswa/detail_mahasiswa";
		$uri = $this->uri->segment(3);
		$select = "*";
		$table = "t_mahasiswa,t_kelas,t_dump";
		$where = "t_mahasiswa.nim = t_dump.nim AND t_mahasiswa.id_kelas = t_kelas.id_kelas AND t_mahasiswa.nim = '$uri'";
		$data['data'] = $this->m_aka->get_db_query($select, $table, $where);
		$this->load->view("content", $data);
	}
	//mengajar mata kuliah
	public function detail_matkul_dosen()
	{
		$data['edit'] = $this->m_aka->edit_data_dosen();
		$data['content'] = 'dosen/detail_matkul_dosen';
		$this->load->view('content', $data);
	}

	//proses input data dosen
	public function prosesinput_detail_matkul_dosen(){
		$this->m_aka->prosesinput_detail_matkul_dosen();
		redirect('c_index_aka/data_dosen');
	}

	//mengajar mata kuliah
	public function data_matkul_dosen()
	{
		$data['edit'] = $this->m_aka->data_matkul_dosen();
		$data['content'] = 'dosen/data_matkul_dosen';
		$this->load->view('content', $data);
	}
	public function hapus_data_matkul_dosen()
	{
		$this->m_aka->hapus_data_matkul_dosen();
		redirect('c_index_aka/data_dosen');
	}
	
	//Hapus dosen
	
	public function hapus_dosen()
	{
		$this->m_aka->hapus_dosen();
		redirect('c_index_aka/data_dosen');
	}

	/*============================================= END DATA DOSEN ==================================================*/


	/*============================================= DATA KALENDER AKADEMIK ==================================================*/
	
	public function data_kalender_akademik()
	{
		$data['content'] = 'jadwal/data_kalender_akademik';
		$data['data'] = $this->m_aka->data_kalender_akademik();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	// input data kalender akademik
	public function input_data_kalender_akademik(){
		$data['content'] = 'jadwal/input_data_kalender_akademik';
		$this->load->view('content',$data);
	}

	//proses input data kalender akademik
	public function prosesinput_data_kalender_akademik(){
		$this->m_aka->prosesinput_data_kalender_akademik();
		redirect('c_index_aka/data_kalender_akademik');
	}
	
	//Edit data kalender akademik
	
	public function edit_data_kalender_akademik()
	{
		$t_tahun_akademik = 't_tahun_akademik';
		$data['t_tahun_akademik'] = $this->m_aka->get_all_ta($t_tahun_akademik);
		$data['edit'] = $this->m_aka->edit_data_kalender_akademik();
		$data['content'] = 'jadwal/edit_data_kalender_akademik';
		$this->load->view('content', $data);
		
	}
	
	public function prosesedit_data_kalender_akademik(){

		$edit = $this->m_aka->prosesedit_data_kalender_akademik();
		if($edit){
			redirect('c_index_aka/data_kalender_akademik');
			
		}else if(!$edit){
			$data['content'] = 'jadwal/edit_data_kalender_akademik';
			$this->load->view('content', $data);
			
		}
	}
	
	//Hapus data kalender akademik
	
	public function hapus_data_kalender_akademik()
	{
		$this->m_aka->hapus_data_kalender_akademik();
		redirect('c_index_aka/data_kalender_akademik');
	}

	/*============================================= END DATA KALENDER AKADEMIK ==================================================*/
	


	/*============================================= DATA STAFF AKADEMIK ==================================================*/
	
	public function data_staff_akademik()
	{
		$data['content'] = 'admin/data_staff_akademik';
		$data['data'] = $this->m_aka->data_staff_akademik();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	// input data staff akademik
	public function input_data_staff_akademik(){
		$data['content'] = 'admin/input_data_staff_akademik';
		$this->load->view('content',$data);
	}

	//proses input data staff akademik
	public function prosesinput_data_staff_akademik(){
		$this->m_aka->prosesinput_data_staff_akademik();
		redirect('c_index_aka/data_staff_akademik');
	}
	
	//Edit data staff akademik
	
	public function edit_data_staff_akademik()
	{
		$data['edit'] = $this->m_aka->edit_data_staff_akademik();
		$data['content'] = 'admin/edit_data_staff_akademik';
		$this->load->view('content', $data);
		
	}
	
	public function prosesedit_data_staff_akademik(){

		$edit = $this->m_aka->prosesedit_data_staff_akademik();
		if($edit){
			redirect('c_index_aka/data_staff_akademik');
			
		}else if(!$edit){
			$data['content'] = 'admin/edit_data_staff_akademik';
			$this->load->view('content', $data);
			
		}
	}

	public function detail_data_staff_akademik(){
		$data['content'] = "mahasiswa/detail_mahasiswa";
		$uri = $this->uri->segment(3);
		$select = "*";
		$table = "t_mahasiswa,t_kelas,t_dump";
		$where = "t_mahasiswa.nim = t_dump.nim AND t_mahasiswa.id_kelas = t_kelas.id_kelas AND t_mahasiswa.nim = '$uri'";
		$data['data'] = $this->m_aka->get_db_query($select, $table, $where);
		$this->load->view("content", $data);
	}
	
	//Hapus data staff akademik
	
	public function hapus_data_staff_akademik()
	{
		$this->m_aka->hapus_data_staff_akademik();
		redirect('c_index_aka/data_staff_akademik');
	}

	/*============================================= END DATA STAFF AKADEMIK ==================================================*/


	/*============================================= DATA STAFF KEUANGAN ==================================================*/
	
	public function data_staff_keuangan()
	{
		$data['content'] = 'admin/data_staff_keuangan';
		$data['data'] = $this->m_aka->data_staff_keuangan();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	// input data staff akademik
	public function input_data_staff_keuangan(){
		$data['content'] = 'admin/input_data_staff_keuangan';
		$this->load->view('content',$data);
	}

	//proses input data staff akademik
	public function prosesinput_data_staff_keuangan(){
		$this->m_aka->prosesinput_data_staff_keuangan();
		redirect('c_index_aka/data_staff_keuangan');
	}
	
	//Edit data staff akademik
	
	public function edit_data_staff_keuangan()
	{
		$data['edit'] = $this->m_aka->edit_data_staff_keuangan();
		$data['content'] = 'admin/edit_data_staff_keuangan';
		$this->load->view('content', $data);
		
	}
	
	public function prosesedit_data_staff_keuangan(){

		$edit = $this->m_aka->prosesedit_data_staff_keuangan();
		if($edit){
			redirect('c_index_aka/data_staff_keuangan');
			
		}else if(!$edit){
			$data['content'] = 'admin/edit_data_staff_keuangan';
			$this->load->view('content', $data);
			
		}
	}

	public function detail_data_staff_keuangan(){
		$data['content'] = "mahasiswa/detail_mahasiswa";
		$uri = $this->uri->segment(3);
		$select = "*";
		$table = "t_mahasiswa,t_kelas,t_dump";
		$where = "t_mahasiswa.nim = t_dump.nim AND t_mahasiswa.id_kelas = t_kelas.id_kelas AND t_mahasiswa.nim = '$uri'";
		$data['data'] = $this->m_aka->get_db_query($select, $table, $where);
		$this->load->view("content", $data);
	}
	
	//Hapus data staff akademik
	
	public function hapus_data_staff_keuangan()
	{
		$this->m_aka->hapus_data_staff_keuangan();
		redirect('c_index_aka/data_staff_keuangan');
	}

	/*============================================= END DATA STAFF KEUANGAN ==================================================*/

	/*============================================= DATA STAFF JURUSAN ==================================================*/
	
	public function data_staff_jurusan()
	{
		$data['content'] = 'admin/data_staff_jurusan';
		$data['data'] = $this->m_aka->data_staff_jurusan();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	// input data staff akademik
	public function input_data_staff_jurusan(){
		$data['content'] = 'admin/input_data_staff_jurusan';
		$this->load->view('content',$data);
	}

	//proses input data staff akademik
	public function prosesinput_data_staff_jurusan(){
		$this->m_aka->prosesinput_data_staff_jurusan();
		redirect('c_index_aka/data_staff_jurusan');
	}
	
	//Edit data staff akademik
	
	public function edit_data_staff_jurusan()
	{
		$data['edit'] = $this->m_aka->edit_data_staff_jurusan();
		$data['content'] = 'admin/edit_data_staff_jurusan';
		$this->load->view('content', $data);
		
	}
	
	public function prosesedit_data_staff_jurusan(){

		$edit = $this->m_aka->prosesedit_data_staff_jurusan();
		if($edit){
			redirect('c_index_aka/data_staff_jurusan');
			
		}else if(!$edit){
			$data['content'] = 'admin/edit_data_staff_jurusan';
			$this->load->view('content', $data);
			
		}
	}

	public function detail_data_staff_jurusan(){
		$data['content'] = "mahasiswa/detail_mahasiswa";
		$uri = $this->uri->segment(3);
		$select = "*";
		$table = "t_mahasiswa,t_kelas,t_dump";
		$where = "t_mahasiswa.nim = t_dump.nim AND t_mahasiswa.id_kelas = t_kelas.id_kelas AND t_mahasiswa.nim = '$uri'";
		$data['data'] = $this->m_aka->get_db_query($select, $table, $where);
		$this->load->view("content", $data);
	}
	
	//Hapus data staff akademik
	
	public function hapus_data_staff_jurusan()
	{
		$this->m_aka->hapus_data_staff_jurusan();
		redirect('c_index_aka/data_staff_jurusan');
	}

	/*============================================= END DATA STAFF JURUSAN ==================================================*/


	/*============================================= PASSWORD AKADEMIK ==================================================*/
	public function password_akademik()
	{
		$data['content'] = 'password/password_akademik';
		$data['data'] = $this->m_aka->data_staff_akademik();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	//Edit data staff akademik
	
	public function edit_password_akademik()
	{
		$data['edit'] = $this->m_aka->edit_data_staff_akademik();
		$data['content'] = 'password/edit_password_akademik';
		$this->load->view('content', $data);
		
	}
	
	public function prosesedit_password_akademik(){

		$edit = $this->m_aka->prosesedit_password_akademik();
		if($edit){
			redirect('c_index_aka/password_akademik');
			
		}else if(!$edit){
			$data['content'] = 'password/edit_staff_akademik';
			$this->load->view('content', $data);
			
		}
	}

	/*============================================= END PASSWORD AKADEMIK ==================================================*/

	/*============================================= PASSWORD MAHASISWA ==================================================*/
	public function password_mahasiswa()
	{
		$link = 'password_mahasiswa';
		$data['content'] = 'password/password_mahasiswa';
		$data['data'] = $this->m_aka->get_data_mahasiswa($link);
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	//Edit data staff akademik
	
	public function edit_password_mahasiswa()
	{
		$data['edit'] = $this->m_aka->edit_mahasiswa();
		$data['content'] = 'password/edit_password_mahasiswa';
		$this->load->view('content', $data);
		
	}
	
	public function prosesedit_password_mahasiswa(){

		$edit = $this->m_aka->prosesedit_password_mahasiswa();
		if($edit){
			redirect('c_index_aka/password_mahasiswa');
			
		}else if(!$edit){
			$data['content'] = 'password/edit_password_mahasiswa';
			$this->load->view('content', $data);
			
		}
	}

	/*============================================= END PASSWORD MAHASISWA ==================================================*/

	/*============================================= PASSWORD KEUANGAN ==================================================*/
	public function password_keuangan()
	{
		$data['content'] = 'password/password_keuangan';
		$data['data'] = $this->m_aka->data_staff_keuangan();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	//Edit data staff akademik
	
	public function edit_password_keuangan()
	{
		$data['edit'] = $this->m_aka->edit_data_staff_keuangan();
		$data['content'] = 'password/edit_password_keuangan';
		$this->load->view('content', $data);
		
	}
	
	public function prosesedit_password_keuangan(){

		$edit = $this->m_aka->prosesedit_password_keuangan();
		if($edit){
			redirect('c_index_aka/password_keuangan');
			
		}else if(!$edit){
			$data['content'] = 'password/edit_staff_keuangan';
			$this->load->view('content', $data);
			
		}
	}

	/*============================================= END PASSWORD KEUANGAN ==================================================*/

	/*============================================= PASSWORD JURUSAN ==================================================*/
	public function password_jurusan()
	{
		$data['content'] = 'password/password_jurusan';
		$data['data'] = $this->m_aka->data_staff_jurusan();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	//Edit data staff akademik
	
	public function edit_password_jurusan()
	{
		$data['edit'] = $this->m_aka->edit_data_staff_jurusan();
		$data['content'] = 'password/edit_password_jurusan';
		$this->load->view('content', $data);
		
	}
	
	public function prosesedit_password_jurusan(){

		$edit = $this->m_aka->prosesedit_password_jurusan();
		if($edit){
			redirect('c_index_aka/password_jurusan');
			
		}else if(!$edit){
			$data['content'] = 'password/edit_staff_jurusan';
			$this->load->view('content', $data);
			
		}
	}

	/*============================================= END PASSWORD JURUSAN ==================================================*/
	
	/*============================================= PASSWORD DOSEN ==================================================*/

	public function password_dosen()
	{
		$data['content'] = 'password/password_dosen';
		$data['data'] = $this->m_aka->data_dosen();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('content', $data);
	}

	//Edit dosen
	
	public function edit_password_dosen()
	{
		$t_mk = 't_mk';
		$data['t_mk'] = $this->m_aka->get_all_mk($t_mk);
		$data['edit'] = $this->m_aka->edit_data_dosen();
		$data['content'] = 'password/edit_password_dosen';
		$this->load->view('content', $data);
		
	}
	
	public function prosesedit_password_dosen(){

		$edit = $this->m_aka->prosesedit_password_dosen();
		if($edit){
			redirect('c_index_aka/password_dosen');
			
		}else if(!$edit){
			$data['content'] = 'password/edit_password_dosen';
			$this->load->view('content', $data);
			
		}
	}

	/*============================================= END PASSWORD DOSEN ==================================================*/


	/* ================================= PENGUMUMAN AKADEMIK ================================= */
	// data mahasiswa
	public function data_pengumuman_akademik()
	{
		$data['data'] = $this->m_aka->data_pengumuman_akademik(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'posting_pengumuman/data_pengumuman_akademik';
		$this->load->view('content', $data);
	}

	// input data mahasiswa
	public function input_pengumuman_akademik(){
		$data['content'] = 'posting_pengumuman/input_pengumuman_akademik';
		$this->load->view('content',$data);
	}

	//proses input data mahasiswa
	public function prosesinput_pengumuman_akademik(){
		$this->m_aka->prosesinput_pengumuman_akademik();
		redirect('c_index_aka/data_pengumuman_akademik');
	}

	/*//edit mata kuliah
	public function edit_cuti_akademik(){
		$this->load->model('m_aka');
		$data['edit'] = $this->m_aka->edit_tahun_ajaran();
		$data['content'] = 'mata_kuliah/edit_tahun_ajaran';
		$this->load->view('content',$data);
	}

	//proses edit mata kuliah
	public function prosesedit_cuti_akademik()
	{
		$this->load->model('m_aka');
		$this->m_aka->prosesedit_tahun_ajaran();
		redirect('c_index_aka/data_tahun_ajaran');
	}*/

	//hapus mata kuliah
	public function hapus_pengumuman_akademik()
	{
		$this->m_aka->hapus_pengumuman_akademik();
		
	}

	/* ================================= END PENGUMUMAN AKADEMIK ================================= */



	/* ================================= TAHUN AJARAN ================================= */
	
	// data mahasiswa
	public function data_tahun_ajaran()
	{
		$data['data'] = $this->m_aka->data_tahun_ajaran(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'mata_kuliah/data_tahun_ajaran';
		$this->load->view('content', $data);
	}

	/*// input data mahasiswa
	public function input_tahun_ajaran(){
		$data['content'] = 'mata_kuliah/input_mata_kuliah';
		$this->load->view('content',$data);
	}*/

	//proses input data mahasiswa
	public function prosesinput_Tahun_ajaran(){
		$this->m_aka->prosesinput_Tahun_ajaran();
		redirect('c_index_aka/data_tahun_ajaran');
	}

	//edit mata kuliah
	public function edit_tahun_ajaran(){
		$data['edit'] = $this->m_aka->edit_tahun_ajaran();
		$data['content'] = 'mata_kuliah/edit_tahun_ajaran';
		$this->load->view('content',$data);
	}

	//proses edit mata kuliah
	public function prosesedit_tahun_ajaran()
	{

		$this->m_aka->prosesedit_tahun_ajaran();
		redirect('c_index_aka/data_tahun_ajaran');
	}

	//hapus mata kuliah
	public function hapus_tahun_ajaran()
	{
		$this->m_aka->hapus_tahun_ajaran();
		redirect('c_index_aka/data_tahun_ajaran');
	}

	/* ================================= END TAHUN AJARAN ================================= */
	
	
		/* ================================= PENGISIAN FRS ================================= */


	public function pengisian_frs(){
		$data['content']='mahasiswa/pengisian_frs';
		$this->load->view('content',$data);
	}
	public function cari_nim(){// Mencari berdasarkan NIM di form pengisian FRS
		if($this->input->post('src')){
			$this->session->set_userdata('src',$this->input->post('src'));
			$this->session->set_userdata('status',"aktif");
		}else{
			$this->session->set_userdata('status',"tidak");
		}
		$data['query'] = $this->m_aka->cari_nim(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'mahasiswa/list_frs';
		$this->load->view('content', $data);				
	}
	public function frs(){
//		$cek_frs = $this->db->query('SELECT * FROM t_detail_frs WHERE ');
		$nim = $this->uri->segment(3);
		$data['data_frs'] = $this->m_aka->frs($nim);
		$data['data_mhs'] = $this->m_aka->frs_data_id($nim);
		$data['content']='mahasiswa/ch_frs';
		$this->load->view('content',$data);
	}
	public function simpan_frs(){
		$nim = $this->input->post('nim');
		$jumlah_sks = $this->input->post('jumlah_sks');
		$id_mhs = $this->input->post('id_mhs');
		$smt = $this->input->post('semester');
		$dataSession = array(
			'id_detail_kuota'=> $this->input->post('id_detail_kuota'),
			'jumlah_sks' => $jumlah_sks,
			'nim'=>$nim,
			'kode_mk'=>$this->input->post('kode_mk'),			
			'id_mhs'=>$id_mhs,
			'id_mk'=>$this->input->post('id_mk'),
			'semester'=>$smt
			);
			$this->session->set_userdata($dataSession);
			$this->m_aka->simpan_frs($dataSession);
	}
	public function cek_frs(){
		$id_kuota = $this->uri->segment(3);
		$mhs = $this->uri->segment(4);
		$smt = $this->uri->segment(5);
		$this->m_aka->cek_frs($id_kuota,$mhs,$smt);
	}
	public function detail_frs(){
		$nim = $this->uri->segment(3);
		$smt = $this->uri->segment(4);		
		$data['data_frs'] = $this->m_aka->detail_frs($nim,$smt);
		$data['data_mhs'] = $this->m_aka->frs_data_id($nim);		
		$data['content'] = "mahasiswa/detail_frs";
		$this->load->view('content',$data);

	}
	/* ================================= END PENGISIAN FRS ================================= */
	/* ================================= MANIPULASI FRS ================================= */
	public function manipulasi_frs(){
		if($this->input->post('src')){
			$this->session->set_userdata('src',$this->input->post('src'));
			$this->session->set_userdata('status',"aktif");
		}else{
			$this->session->set_userdata('status',"tidak");
		}
		$data['query'] = $this->m_aka->manipulasi_frs(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'mahasiswa/manipulasi_frs';
		$this->load->view('content', $data);
	}
	public function detail_manipulasi(){
		$nim = $this->uri->segment(3);
		$smt = $this->uri->segment(4);
		$query_sks = "SELECT SUM(t_mk.jumlah_sks) AS total_sks FROM t_detail_frs, t_mahasiswa, t_mk, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mahasiswa.nim = '$nim' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.ulang_mk = 'tidak'";
		$data['data_frs'] = $this->m_aka->detail_frs($nim,$smt);
		$data['data_mhs'] = $this->m_aka->frs_data_id($nim);
		$data['data_sks'] = $this->m_aka->query_aka($query_sks);	
		$data['content'] = "mahasiswa/detail_manipulasi";
		$this->load->view('content',$data);		
	}public function hapus_manipulasi(){
		$sql = $this->m_aka->hapus_manipulasi();
		if($sql){
			redirect('c_index_aka/manipulasi_frs');
		}
	}
	public function l_edit_manipulasi(){
		$uri = $this->uri->segment(3);
		$nim = $this->uri->segment(4);
		$smt = $this->uri->segment(5);		
		$data['data_frs'] = $this->m_aka->l_edit_manipulasi($nim);
		$data['data_mhs'] = $this->m_aka->frs_data_id($nim);
		$data['mhs_nim'] = $nim;
		$data['mhs_smt'] = $smt;
		$data['uri_det'] = $uri;		
		$data['content'] = "mahasiswa/edit_manipulasi";
			$this->load->view('content',$data);		
		}
	public function p_edit_manipulasi(){
		$this->m_aka->p_edit_manipulasi();
	}
	/* ================================= END MANIPULASI FRS ================================= */	
	/* ================================= DAFTAR ULANG ================================= */
	public function daftar_ulang(){
		$data['content']='mahasiswa/daftarulang';
		$this->load->view('content',$data);	
	}
	public function p_daftar_ulang(){
		$data = $this->m_aka->p_daftar_ulang();
		if($data){
			redirect('c_index_aka/daftar_ulang');
		}
	}
	/* ================================= END DAFTAR ULANG ================================= */
	
	/* ================================= KUOTA MATA KULIAH PILIHAN ================================= */
	public function Kuota_mata_kuliah_pilihan(){
		if($this->input->post('src')){
			$this->session->set_userdata('src',$this->input->post('src'));
			$this->session->set_userdata('status',"aktif");
		}else{
			$this->session->set_userdata('status',"tidak");
		}
		$data['data'] = $this->m_aka->kuota_mata_kuliah_pilihan(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'mata_kuliah/kuota_mata_kuliah_pilihan';
		$this->load->view('content', $data);
	}
	//TAMBAH KUOTA MATA KULIAH PILIHAN
	public function t_kuota_mata_kuliah_pilihan(){
		if($this->input->post('src')){
			$this->session->set_userdata('src',$this->input->post('src'));
			$this->session->set_userdata('status',"aktif");
		}else{
			$this->session->set_userdata('status',"tidak");
		}		
		$data['data'] = $this->m_aka->t_kuota_mata_kuliah_pilihan(); 
		$data['kelas'] = $this->m_aka->kelas();
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'mata_kuliah/tambah_kuota_mata_kuliah_pilihan';
		$this->load->view('content', $data);		
	}
	//PROSES TAMBAH KUOTA MATA KULIAH PILIHAN
	public function isi_t_kuota_matkul_pilihan(){
		$kode = $this->uri->segment(3);
		$data['data']= $this->m_aka->isi_t_edit_kuota_matkul_pilihan();		
		$data['kelas'] = $this->m_aka->kelas();		
		$data['content'] = 'mata_kuliah/isi_kuota_mata_kuliah_pilihan';
		$this->load->view('content',$data);		
	}
	public function p_t_kuota_matkul_pilihan(){
		$sql = $this->m_aka->p_t_kuota_mata_kuliah_pilihan(); 
		if($sql){
			redirect('c_index_aka/t_kuota_mata_kuliah_pilihan');
		}
	}
	//MENGHAPUS DATA KUOTA MATA KULIAH PILIHAN
	public function hapus_kuota_matkul_pilihan(){
		$sql = $this->m_aka->hapus_kuota_matkul_pilihan();
		if($sql){
			redirect('c_index_aka/Kuota_mata_kuliah_pilihan');
		}		
	}
	//MENGAMBIL KODE MK
	public function l_edit_kuota_matkul_pilihan(){
		$data_sql		= $this->m_aka->l_edit_kuota_matkul_pilihan();
		$data['sql'] 	= $data_sql->row();
		$data['kelas'] 	= $this->m_aka->kelas();			
		$data['content']= 'mata_kuliah/edit_kuota_matkul_pilihan';
		$this->load->view('content',$data);		
	}
	//PROSESS MENGEDIT DI MODEL
	public function edit_kuota_matkul_pilihan(){
		$sql = $this->m_aka->edit_kuota_matkul_pilihan();

	}	
	/* ================================= END KUOTA MATA KULIAH PILIHAN ================================= */
	/* ================================= DATA KBAAK ================================= */
	// data kbaak
	public function data_kbaak()
	{
		$data['data'] = $this->m_aka->data_kbaak(); 
		//$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'kbaak/data_kbaak';
		$this->load->view('content', $data);
	}


	//edit data kbaak
	public function edit_data_kbaak(){
		$data['edit'] = $this->m_aka->edit_data_kbaak();
		$data['content'] = 'kbaak/edit_data_kbaak';
		$this->load->view('content',$data);
	}

	//proses edit data kbaak
	public function prosesedit_data_kbaak()
	{

		$this->m_aka->prosesedit_data_kbaak();
		redirect('c_index_aka/data_kbaak');
	}
	/* ================================= END DATA KBAAK ================================= */

	/* ================================= ABSEN 16 MINGGU ================================= */

	public function absen_16_minggu(){
		$cari = $this->input->post('cari');
		$data['content'] = "absen/absen_16_minggu";
		$id_mk = $this->input->post('mata_kuliah');
		$tahun_akademik = $this->input->post('tahun_akademik');
		$mk = "t_mk";
		$kelas = "t_kelas";
		$tahun = "t_tahun_akademik";
		$prodi = "t_prodi";
		$query = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$id_mk'");
		$data['mk'] = $this->m_aka->get_all($mk);
		$data['ambil_mk_smt'] = $this->m_aka->get_db_query2($query);
		$data['kelas'] = $this->m_aka->get_all($kelas);
		$data['prodi'] = $this->m_aka->get_all($prodi);
		$data['data_tahun'] = $this->m_aka->get_all($tahun);
		if($cari){
			$query_mk = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$id_mk' AND 1");
			$query_frs = $this->db->query("SELECT * FROM t_detail_frs WHERE id_mk = '$id_mk' AND tahun_akademik = '$tahun_akademik'");
			$data['data'] = $this->m_aka->absen_16_m();
			$data['loop_mk'] = $this->m_aka->get_db_query2($query_mk);
			$data['data_frs']	= $this->m_aka->get_db_query2($query_frs);
		}else{
			$data['data'] = "";
			$data['loop_mk'] = "";
			$data['detail_frs'] = "";
		}
		
		$this->load->view('content', $data);
	}
	public function report_absen($pdf=false)
	{
		$id_mk = $this->input->post('mata_kuliah_sec');
		$tahun_akademik = $this->input->post('tahun_akademik_sec');
		$query = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$id_mk'");
			$query_mk = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$id_mk' AND 1");
			$query_frs = $this->db->query("SELECT * FROM t_detail_frs WHERE id_mk = '$id_mk' AND tahun_akademik = '$tahun_akademik'");
			$data['data'] = $this->m_aka->absen_16_m_excel();
			$data['ambil_mk_smt'] = $this->m_aka->get_db_query2($query);
			$data['loop_mk'] = $this->m_aka->get_db_query2($query_mk);
			$data['data_frs']	= $this->m_aka->get_db_query2($query_frs);
			$output = $this->load->view('report/report_excel_16',$data, true);	
			return $this->_gen_pdf($output,"A4","L");

	}

	/* ================================= END ABSEN 16 MINGGU ================================= */
	public function get_mata_kuliah(){
		$this->load->model('m_aka');
        $id_prodi = $this->input->post('id_prodi');
        $dataMataKuliah = $this->m_aka->getDataMatakuliah($id_prodi);
        
        echo '<select name="mata_kuliah" id="mata_kuliah">';
        foreach($dataMataKuliah as $a){
            echo '<option value="'.$a->id_mk.'">'.$a->kode_mk.'/ '.$a->nama_mk;'</option>';
        }
        echo '</select>';
	}
	public function get_kelas(){
		$this->load->model('m_aka');
        $id_prodi = $this->input->post('id_prodi');
        $dataKelas = $this->m_aka->getDatakelas($id_prodi);
        
        echo '<select name="kelas" id="kelas">';
        foreach($dataKelas as $a){
            echo '<option value="'.$a->id_kelas.'">Kelas '.$a->nama_kelas;'</option>';
        }
        echo '</select>';
	}
	/*public function get_mata_kuliah_loop(){
		$this->load->model('m_aka');
        $id_prodi = $this->input->post('id_prodi');
        $dataMataKuliah = $this->m_aka->getDataMatakuliah($id_prodi);
        
        echo '<select id="mata_kuliah" name="mata_kuliah">';
							foreach ($mk as $mk) {
								$select_mk = $this->session->userdata('mata_mk');
								if($select_mk == $mk['id_mk']){
									$s = "selected";
								}else{
									$s = "";
								}		
								echo'<option value="'.$mk->kode_mk.' '.$s.'"> '.$mk->kode_mk.' / '.$mk->nama_mk;'</option>';
			echo '</select>';
	}
}
*/
	/* ================================= ABSEN DAFTAR UJIAN ================================= */
	public function absen_ujian(){
		$cari = $this->input->post('cari');
		$data['content'] = "absen/absen_ujian";
		$id_mk = $this->input->post('mata_kuliah');
		$tahun_akademik = $this->input->post('tahun_akademik');
		$mk = "t_mk";
		$kelas = "t_kelas";
		$tahun = "t_tahun_akademik";
		$prodi = "t_prodi";
		$query = $this->db->query("SELECT t_mk.id_mk,t_mk.kode_mk,t_mk.nama_mk,t_prodi.id_prodi,t_prodi.prodi FROM t_mk INNER JOIN t_prodi ON t_mk.id_prodi=t_prodi.id_prodi WHERE kode_mk = '$id_mk'");
		$data['mk'] = $this->m_aka->get_all($mk);
		$data['ambil_mk_smt'] = $this->m_aka->get_db_query2($query);
		$data['kelas'] = $this->m_aka->get_all($kelas);
		$data['prodi'] = $this->m_aka->get_all($prodi);
		$data['data_tahun'] = $this->m_aka->get_all($tahun);
		if($cari){
			$query_mk = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$id_mk' AND 1");
			$query_frs = $this->db->query("SELECT * FROM t_detail_frs WHERE id_mk = '$id_mk' AND tahun_akademik = '$tahun_akademik'");
			$data['data'] = $this->m_aka->absen_16_m();
			$data['loop_mk'] = $this->m_aka->get_db_query2($query_mk);
			$data['data_frs']	= $this->m_aka->get_db_query2($query_frs);
		}else{
			$data['data'] = "";
			$data['loop_mk'] = "";
			$data['detail_frs'] = "";
		}
		
		$this->load->view('content', $data);
	}
	public function report_absen_ujian(){
		$id_mk = $this->input->post('mata_kuliah_sec');
		$tahun_akademik = $this->input->post('tahun_akademik_sec');
		$query = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$id_mk'");
			$query_mk = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$id_mk' AND 1");
			$query_frs = $this->db->query("SELECT * FROM t_detail_frs WHERE id_mk = '$id_mk' AND tahun_akademik = '$tahun_akademik'");
			$data['data'] = $this->m_aka->absen_16_m_excel();
			$data['ambil_mk_smt'] = $this->m_aka->get_db_query2($query);
			$data['loop_mk'] = $this->m_aka->get_db_query2($query_mk);
			$data['data_frs']	= $this->m_aka->get_db_query2($query_frs);
			$output = $this->load->view('report/report_excel_ujian',$data, true);
			return $this->_gen_pdf($output,"A4","P");
	}
	/* ================================= END ABSEN DAFTAR UJIAN ================================= */

	/* ================================= DAERAH ASAL ================================= */
	
	public function daerah_asal(){
		$data['content'] = "report/data_daerah_asal";
		$tahun = "t_tahun_akademik";
		$data['tahun'] = $this->m_aka->get_all($tahun);
		$this->load->view("content", $data);
	}

	public function report_daerah_asal(){
		$data['data'] = $this->m_aka->ambil_data_asal();
		$output = $this->load->view("report/report_daerah_asal", $data, true);
		return $this->_gen_pdf($output,"A4","P");
	}

	/* ================================= END DAERAH ASAL ================================= */

	/* ================================= DATA CUTI AKADEMIK ================================= */
	
	public function data_cuti_report(){
		$tahun = "t_tahun_akademik";
		$data['content'] = "report/data_cuti_report";
		$data['data_tahun'] = $this->m_aka->get_all($tahun);
		$this->load->view("content", $data);
	}

	public function report_data_cuti(){
		$data['data'] = $this->m_aka->ambil_data_cuti();
		$output = $this->load->view("report/report_data_cuti", $data, true);
		//$this->load->view("report/report_data_cuti", $data);
		return $this->_gen_pdf($output,"A4","P");
	}

	/* ================================= END DATA CUTI AKADEMIK ================================= */

	/* ================================= DATA CUTI AKADEMIK ================================= */


	/* ================================= DATA DATA KOHORT ================================= */

	public function data_kohort(){
		$tahun = "t_tahun_akademik";
		$kelas = "t_kelas";
		$prodi = "t_prodi";
		$data['content'] = "report/kohort";
		$data['data_tahun'] = $this->m_aka->get_all($tahun);
		$data['kelas'] = $this->m_aka->get_all($kelas);
		$data['prodi'] = $this->m_aka->get_all($prodi);
		$this->load->view("content", $data);
	}

	public function report_data_kohort(){
		$data['data'] = $this->m_aka->ambil_data_kohort();
		$output = $this->load->view("report/report_data_kohort", $data, true);
		//$this->load->view("report/report_data_kohort",data);
		return $this->_gen_pdf($output,"Legal","L");
	}

	public function kohort_excel(){
		$tahun = "t_tahun_akademik";
		$kelas = "t_kelas";
		$prodi = "t_prodi";
		$data['content'] = "report/kohort_excel";
		$data['data_tahun'] = $this->m_aka->get_all($tahun);
		$data['kelas'] = $this->m_aka->get_all($kelas);
		$data['prodi'] = $this->m_aka->get_all($prodi);
		$this->load->view("content", $data);
	}


	public function report_kohort_excel(){
		$data['data'] = $this->m_aka->ambil_data_kohort();
		$this->load->view("report/report_kohort_excel", $data);
	}

	/* ================================= END DATA KOHORT ================================= */

	/* ================================= DATA KHS ================================= */

	public function khs(){
		$tahun = "t_tahun_akademik";
		$data['content'] = "report/khs";
		$data['data_tahun'] = $this->m_aka->get_all($tahun);
		$this->load->view("content", $data);
	}
	public function report_khs($pdf=false){
		$data['data'] = $this->m_aka->ambil_data_khs();
		$output = $this->load->view("report/report_khs", $data, true);
		//$this->load->view("report/report_khs",$data);
		return $this->_gen_pdf($output,"A4","P");
	}
	public function khs_excel(){
		$tahun = "t_tahun_akademik";
		$data['content'] = "report/khs_excel";
		$data['data_tahun'] = $this->m_aka->get_all($tahun);
		$this->load->view("content", $data);
	}
	public function report_khs_excel(){
		$data['data'] = $this->m_aka->ambil_data_khs_excel();
		$this->load->view("report/report-excel-khs",$data);
	}
	

	/* ================================= END DATA KHS ================================= */

	/* ================================= DATA KHS ================================= */

	public function transkrip(){
		$data['content'] = "report/transkrip";
		$this->load->view("content", $data);
	}
	public function transkrip_no_kop(){
		$data['content'] = "report/transkrip_no_kop";
		$this->load->view("content", $data);
	}
	public function report_transkrip(){
		$data['data'] = $this->m_aka->ambil_data_transkrip();
		$output = $this->load->view("report/report_transkrip", $data, true);
		//$this->load->view("report/report_transkrip",$data);
		return $this->_gen_pdf_transkrip($output,"A4","P");
	}
	public function report_transkrip_no_kop(){
		$data['data'] = $this->m_aka->ambil_data_transkrip();
		$output = $this->load->view("report/report_transkrip_no_kop", $data, true);
		//$this->load->view("report/report_transkrip",$data);
		return $this->_gen_pdf_transkrip($output,"A4","P");
	}
	//================================================ Report Dosen ========================

	public function report_dosen(){
		$data['data'] = $this->m_aka->ambil_data_dosen();
		$output = $this->load->view("report/report_dosen", $data, true);
		//$this->load->view("report/report_transkrip",$data);
		return $this->_gen_pdf($output,"A4","P");
	}

	public function report_data_mata_kuliah(){
		$data['data'] = $this->m_aka->ambil_data_mata_kuliah();
		$output = $this->load->view("report/report_mata_kuliah", $data, true);
		//$this->load->view("report/report_transkrip",$data);
		return $this->_gen_pdf($output,"A4","P");
	}

	public function keuangan(){
		$data['content'] = 'report/keuangan';
		$this->load->view('content', $data);
	}
	public function report_keuangan(){
		$data['data'] = $this->m_aka->ambil_data_keuangan();
		$output = $this->load->view("report/report_keuangan", $data, true);
		//$this->load->view("report/report_transkrip",$data);
		return $this->_gen_pdf($output,"A4","P");
	}
	/* ================================= END DATA KHS ================================= */

public function ijazah(){

		$cari_ijazah = $this->input->post('cari_ijazah');
		$parameter = $this->input->post('parameter');
		$data_ijazah = $this->input->post('data_ijazah');
		$prodi = $this->input->post('program_studi');
		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/ijazah/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_mahasiswa');
		$config['prev_link'] = "<<";
		$config['next_link'] = ">>";
		$config['full_tag_open'] = "<ul>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='active'><a>";
		$config['cur_tag_close'] = "</a></li>";
		$config['next_tag_open'] = "<li class='next'>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='prev'>";
		$config['prev_tag_close'] = "</li>";
		$this->pagination->initialize($config);
		$num = $config['per_page'];
		$select = "*";
		$table= "t_mahasiswa";

		/*if($cari_ijazah){
			if($parameter == 'nim'){
				$where = "WHERE nim = '$data_ijazah'";		
			}else if($parameter == 'mahasiswa'){
				$where = "WHERE nama LIKE '%$data_ijazah%'";	
			}else if($parameter == 'angkatan'){
				$where = "WHERE angkatan = '$data_ijazah'";	
			}else{
				$where = "WHERE prodi = '%$prodi%'";
			}
		}*/
		if($cari_ijazah){
			if($parameter == 'nim'){
				$where = "WHERE nim = '$data_ijazah'";		
			}else if($parameter == 'mahasiswa'){
				$where = "WHERE nama LIKE '%$data_ijazah%'";	
			}else{
				$where = "WHERE angkatan = '$data_ijazah' AND program_studi = '$prodi'";	
			}
		}else{
			$where = "";
			$limit = "LIMIT $offset, $num";	
		}
		$query = ("SELECT id_mahasiswa,nim,nama,ttl,tanggal_lulus,status_kuliah,angkatan,program_studi FROM t_mahasiswa $where ORDER BY t_mahasiswa.nim ASC $limit");
		$data['content'] = "report/ijazah";
		$data['data'] = $this->m_aka->query_aka($query);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view("content", $data);
	}
	public function form_ijazah(){
		$cari_ijazah = $this->input->post('cari_ijazah');
		if($cari_ijazah){
			$this->m_aka->input_ijazah();
		}
		$data['uri_page'] = $this->uri->segment(3);
		$data['uri_id'] = $this->uri->segment(4);
		$data['content'] = "report/ijazah_form";
		$this->load->view("content", $data);
	}
	public function ijazah_depan(){
		$data['id_mhs'] = $this->uri->segment(4);
		$output = $this->load->view("report/report_ijazah_f", $data, true);
		//$this->load->view("report/report_ijazah_f",$data);
		return $this->_gen_pdf_ijazah_depan($output,"A4","L");
	}
	public function ijazah_belakang(){
		$data['id_mhs'] = $this->uri->segment(4);
		$output = $this->load->view("report/report_ijazah_b", $data, true);
		//$this->load->view("report/report_ijazah_b",$data);
		return $this->_gen_pdf($output,"A4","L");
	}

	/* ================================= REPORT DATA MATA KULIAH ================================= */

	public function data_matkul(){
		$tahun = "t_tahun_akademik";
		$mk = "t_mk";
		$data['content'] = "report/matkul";
		$data['data_tahun'] = $this->m_aka->get_all($tahun);
		$data['mk'] = $this->m_aka->get_all($mk);
		$this->load->view("content", $data);
	}

	public function report_data_matkul(){
		$id_mk = $this->input->post('matkul');
		$tahun_akademik = $this->input->post('tahun_akademik');
		$query = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$id_mk'");
		$query_mk = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$id_mk' AND 1");
		$query_frs = $this->db->query("SELECT * FROM t_detail_frs WHERE id_mk = '$id_mk' AND tahun_akademik = '$tahun_akademik'");
		$data['ambil_mk_smt'] = $this->m_aka->get_db_query2($query);
		$data['loop_mk'] = $this->m_aka->get_db_query2($query_mk);
		$data['data_frs']	= $this->m_aka->get_db_query2($query_frs);
		$data['data'] = $this->m_aka->ambil_data_matkul();
		$output = $this->load->view("report/report_data_matkul", $data, true);
		//$this->load->view("report/report_data_matkul", $data);
		return $this->_gen_pdf($output,"A4","P");
	}


	/* ================================= END REPORT DATA MATA KULIAH ================================= */

	/* ================================= REPORT DATA INDEKS PRESTASI ================================= */

	public function index_prestasi(){
		$tahun = "t_tahun_akademik";
		$data['tahun_akademik'] = $this->m_aka->get_all($tahun);
		$data['angkatan'] = $this->m_aka->get_all($tahun);
		$data['content'] = "report/data_index_prestasi";
		$this->load->view("content", $data);
	}

	public function report_indeks_prestasi(){
		$data['data'] = $this->m_aka->ambil_indeks_prestasi();
		$output = $this->load->view("report/report_indeks_prestasi", $data, true);
		//$this->load->view("report/report_indeks_prestasi",$data);
		return $this->_gen_pdf($output,"A4","P");
	}

	/* ================================= END REPORT DATA INDEKS PRESTASI ================================= */
	
	/* ================================= REPORT DATA INDEKS PRESTASI ================================= */

	public function index_prestasi_tingkatan(){
		$tahun = "t_tahun_akademik";
		$data['tahun_akademik'] = $this->m_aka->get_all($tahun);
		$data['angkatan'] = $this->m_aka->get_all($tahun);
		$data['content'] = "report/data_index_prestasi_tingkatan";
		$this->load->view("content", $data);
	}

	public function report_indeks_prestasi_tingkatan(){
		$data['data'] = $this->m_aka->ambil_indeks_prestasi_tingkatan();
		$output = $this->load->view("report/report_indeks_prestasi_tingkatan", $data, true);
		//$this->load->view("report/report_indeks_prestasi",$data);
		return $this->_gen_pdf($output,"A4","P");
	}

	/* ================================= END REPORT DATA INDEKS PRESTASI ================================= */

	/* ================================= Batas Waktu Nilai ================================= */
	
	public function waktu_nilai(){
		$t_waktu = "t_waktu_nilai";
		$data['waktu'] = $this->m_aka->get_all($t_waktu);
		$data['content'] = "mahasiswa/waktu_nilai";
		$this->load->view("content", $data);
	}

	public function input_waktu_nilai(){
		$this->m_aka->input_waktu_nilai();
	}

	public function update_waktu_nilai(){
		//if($edit){
		$tanggal = date('d');
		$bulan = date('m');
		$tahun = date('Y');

		//$query = $this->db->query("SELECT * FROM t_waktu_nilai");
		//$ambil_status = $query->row(); 
		//$status = $ambil_status->status;
		$status = $this->uri->segment(3);
		if($status == '1'){

		$query = $this->db->query("SELECT * FROM t_waktu_nilai");
		$ambil = $query->row_array();
		$tanggal_db = explode("-", $ambil['waktu_nilai']);
		$now = date("Y-m-d");
		$tutup = $tanggal_db[0]."-".$tanggal_db[1]."-".$tanggal_db[2];
		$selisih = (strtotime($tutup) - strtotime($now) ) / (60*60*24);
		//echo $selisih;
		//if($tanggal_db[2] == $tanggal && $tanggal_db[1] == $bulan && $tanggal_db[0] == $tahun){
		if($selisih >= 0 ){
			if($ambil['update'] == "Tidak"){
				$data = array(
					'huruf_mutu' => 'B',
					'angka_huruf_mutu' => '3'
				);
				$data2 = array(
					'update' => 'Ya',
					'status' => '1'
				);
				$this->db->update("t_nilai", $data, array('huruf_mutu' => ""));
				$this->db->update("t_waktu_nilai", $data2, array('id_waktu_nilai' => '1'));
				//$redirect = redirect("c_index_aka/waktu_nilai");
			}
		}
	} else {
			$data2 = array(
					'update' => 'Tidak',
					'status' => '0'
				);
			$this->db->update("t_waktu_nilai", $data2, array('id_waktu_nilai' => '1'));
		}
		redirect("c_index_aka/waktu_nilai");
	}

	/*===================================NILAI======================================================*/
		public function save_nilai(){
			$redirect = "c_index_aka/nilai_akademik_mahasiswa";
			$save_nilai = $this->input->post("save_nilai");
			if($save_nilai){
				$this->m_aka->save_nilai($redirect);
			}
		}
		public function save_nilai_mk(){
			$redirect = "c_index_aka/nilai_akademik";
			$save_nilai = $this->input->post("save_nilai");
			if($save_nilai){
				$this->m_aka->save_nilai($redirect);
			}
		}
		
		public function nilai_akademik(){
			$cari = $this->input->post("cari");
			if($cari){
				$this->session->set_userdata('cari_session', true);
				$this->session->set_userdata('id_mk_s', $this->input->post('mata_kuliah'));
			}
			$cari_session = $this->session->userdata('cari_session');
			$id_mk = $this->session->userdata("id_mk_s");
			$tahun = "t_tahun_akademik";
			$mk = "t_mk";
			$kelas = "t_kelas";
			$prodi = "t_prodi";
			$data['mk'] = $this->m_aka->get_all($mk);
			$data['kelas'] = $this->m_aka->get_all($kelas);
			$data['data_tahun'] = $this->m_aka->get_all($tahun);
			$data['prodi'] = $this->m_aka->get_all($prodi);
			if($cari_session){
				$query = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$id_mk'");
				$query_mk = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$id_mk' AND 1");
				$data['data'] = $this->m_aka->tampil_nilai();
				$data['ambil_mk_smt'] = $this->m_aka->get_db_query2($query);
				$data['loop_mk'] = $this->m_aka->get_db_query2($query_mk);
			}else{
				$data['data'] = "";
			}
			$data['content'] = "nilai/nilai_akademik";
			$this->load->view('content', $data);
		}

		public function nilai_akademik_mahasiswa(){
			$cari = $this->input->post("cari_m");
			$nim_m = $this->input->post('nim_m');
			$semester = $this->input->post("semester_m");
			$tahun_akademik = $this->input->post("tahun_akademik_m");
			if($cari){
				$this->session->set_userdata("cari_mhs_aka", true);
				$this->session->set_userdata('data_nilai_m', $nim_m);
				$this->session->set_userdata('semester_m', $semester);
				$this->session->set_userdata('tahun_akademik_m', $tahun_akademik);
			}
			$cari_session_m = $this->session->userdata("cari_mhs_aka");
			$nim_mhs = $this->session->userdata("data_nilai_m");
			$tahun = "t_tahun_akademik";
			$data['data_tahun'] = $this->m_aka->get_all($tahun);
			if($cari_session_m){
				$query_m = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim = '$nim_mhs'");
				$data['data_mahasiswa'] = $this->m_aka->get_db_query2($query_m);
				$data['data'] = $this->m_aka->tampil_nilai_mahasiswa();
			}else{
				$data['data'] = "";
			}
			$data['content'] = 'nilai/nilai_akademik_mahasiswa';
			$this->load->view("content", $data);
		}

		//nilai permata kuliah
		/*public function input_nilai(){
			$submit = $this->input->post("submit_nilai");
			$data['location'] = "input_nilai";
			$data['content'] = "nilai/input_nilai_akademik";
			$data['location'] = "input_nilai";
			$id_mk = $this->uri->segment(4);
			$id_mhs =  $this->uri->segment(3);

			//Data Frs
			$select4 = "t_detail_frs.semester";
			$table4 = "t_detail_frs, t_nilai";
			$where4 = "t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.id_mahasiswa = '$id_mhs' AND t_nilai.id_mk = '$id_mk'"; 
			
			if($submit){
				$this->m_aka->proses_nilai("c_index_aka/nilai_akademik");
			}
			$this->load->view("content", $data);
		}

		public function edit_nilai(){
			$submit = $this->input->post("submit_nilai");
			$data['location'] = "edit_nilai";
			$data['content'] = "nilai/edit_nilai_akademik";
			$id_mk = $this->uri->segment(4);
			$id_mhs =  $this->uri->segment(3);
			$query_mk = $this->db->query("SELECT * FROM t_mk WHERE id_mk = '$id_mk' AND 1");
			
			// Mata Kuliah
			$select = "nama_mk, kode_mk";
			$table = "t_mk";
			$where = "kode_mk = '$id_mk'";
			 
			// Mahasiswa
			$select2 = "*";
			$table2 = "t_mahasiswa";
			$where2 = "id_mahasiswa = '$id_mhs'";
			
			// Data Nilai
			$select3 = "*";
			$table3 = "t_nilai";
			$where3 = "id_mahasiswa = '$id_mhs' AND id_mk = '$id_mk'";

			//Data Frs
			$select4 = "t_detail_frs.semester";
			$table4 = "t_detail_frs, t_nilai";
			$where4 = "t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.id_mahasiswa = '$id_mhs' AND t_nilai.id_mk = '$id_mk'"; 
			
			//Proses Edit

			if($submit){
				$this->m_aka->proses_edit_nilai("c_index_aka/nilai_akademik");
			}

			$data['mk'] = $this->m_aka->get_db_query($select, $table, $where);
			$data['mahasiswa'] = $this->m_aka->get_db_query($select2, $table2, $where2);
			$data['nilai'] = $this->m_aka->get_db_query($select3, $table3, $where3);
			$data['frs'] = $this->m_aka->get_db_query($select4, $table4, $where4);
			$this->load->view('content', $data);

		}

		//nilai per mahasiswa
		public function input_nilai_mahasiswa(){
			$submit = $this->input->post("submit_nilai");
			$data['location'] = "input_nilai_mahasiswa";
			$data['content'] = "nilai/input_nilai_akademik";
			if($submit){
				$this->m_aka->proses_nilai("c_index_aka/nilai_akademik_mahasiswa");
			}
			$this->load->view("content", $data);
		}

		public function edit_nilai_mahasiswa(){
			$submit = $this->input->post("submit_nilai");
			$data['location'] = "edit_nilai_mahasiswa";
			$data['content'] = "nilai/edit_nilai_akademik";
			$id_mk = $this->uri->segment(4);
			$id_mhs =  $this->uri->segment(3);
			$query_mk = $this->db->query("SELECT * FROM t_mk WHERE id_mk = '$id_mk' AND 1");
			
			// Mata Kuliah
			$select = "*";
			$table = "t_mk";
			$where = "kode_mk = '$id_mk'";
			 
			// Mahasiswa
			$select2 = "*";
			$table2 = "t_mahasiswa";
			$where2 = "id_mahasiswa = '$id_mhs'";
			
			// Data Nilai
			$select3 = "*";
			$table3 = "t_nilai";
			$where3 = "id_mahasiswa = '$id_mhs' AND id_mk = '$id_mk'";

			//Data Frs
			$select4 = "t_detail_frs.semester";
			$table4 = "t_detail_frs, t_nilai";
			$where4 = "t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.id_mahasiswa = '$id_mhs' AND t_nilai.id_mk = '$id_mk'";

			//Proses Edit

			if($submit){
				$this->m_aka->proses_edit_nilai("c_index_aka/nilai_akademik_mahasiswa");
			}

			$data['mk'] = $this->m_aka->get_db_query($select, $table, $where);
			$data['mahasiswa'] = $this->m_aka->get_db_query($select2, $table2, $where2);
			$data['nilai'] = $this->m_aka->get_db_query($select3, $table3, $where3);
			$data['frs'] = $this->m_aka->get_db_query($select4, $table4, $where4);
			$this->load->view('content', $data);

		}
		*/
		//==========================================Program Studi====================================
		public function program_studi(){
			$data['content'] = "mata_kuliah/program_studi";
			$prodi = "t_prodi";
			$data['data'] = $this->m_aka->get_all($prodi);
			$this->load->view("content", $data);
		}

		public function tambah_program_studi(){
			$save = $this->input->post("save_prodi");
			$data['content'] = "mata_kuliah/tambah_prodi";
			if($save){
				$this->m_aka->save_prodi();
			}
			$this->load->view("content", $data);
		}

		public function edit_program_studi(){
			$id_prodi = $this->uri->segment(3);
			$save = $this->input->post("save_prodi");
			$data['content'] = "mata_kuliah/edit_prodi";
			$select = "*";
			$table = "t_prodi";
			$where = "id_prodi = '$id_prodi'";
			$data['data'] = $this->m_aka->get_db_query($select, $table, $where);
			if($save){
				$this->m_aka->edit_prodi();
			}
			$this->load->view("content", $data);
		}
		public function hapus_prodi(){
			$this->m_aka->hapus_prodi();
		}
		//==========================================Permohonan Cuti====================================

		public function cuti_akademik(){
			$add_cuti = $this->input->post("add_cuti");
			if($add_cuti){
				$this->m_aka->input_cuti();
			}
			$tahun = "t_tahun_akademik";
			$data['content'] = "cuti/cuti_akademik";
			$data['tahun_akademik'] = $this->m_aka->get_all($tahun);
			$data['data'] = $this->m_aka->data_cuti();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view("content", $data);
		}
		public function edit_cuti(){
			$edit_cuti = $this->input->post("edit_cuti");
			$id = $this->uri->segment(3);
			$data['content'] = "cuti/edit_cuti";
			$select = "*";
			$table = "t_cuti_akademik, t_mahasiswa";
			$where = "t_cuti_akademik.nim = t_mahasiswa.nim AND t_cuti_akademik.id = '$id'";
			if($edit_cuti){
				$this->m_aka->edit_cuti();
			}
			$data['cuti'] = $this->m_aka->get_db_query($select, $table, $where);
			$this->load->view("content", $data);
		}
		public function hapus_cuti(){
			$this->m_aka->hapus_cuti();
		}

		//============================================= Mata Kuliah Jurusan =============================

		public function mata_kuliah_jurusan(){
			$data['content'] = "mk_jurusan/mata_kuliah_jurusan";
			$mk = "t_mk";
			$data['mk'] = $this->m_aka->get_all($mk);
			$this->load->view("content", $data);
		}

		public function proses_buka_mk(){
			$this->m_aka->buka_mk();
		}

		/*===============================INPUT ULANG MATA KULIAH========================================*/

		public function input_ulang_mk(){
			$add_ulang = $this->input->post("add_ulang_mk");
			$mata_kuliah = "t_mk";
			if($add_ulang){
				$this->m_aka->input_mk_ulang();
			}
			$data['content'] = "ulang_mk/input_ulang_mk";
			$data['mk'] = $this->m_aka->get_all($mata_kuliah);
			$data['data'] = $this->m_aka->data_ulang_mk();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view("content", $data);
		}


		/* print pdf daftar kehadiran 16 minggu */

		public function coba_report(){
			$data['content'] = "";
			$this->load->view("daftar_kehadiran_16_minggu");
		}


	/* print pdf Nilai mata kuliah */

	public function report_nilai_mk($pdf=false)
	{
		$data['tes'] = 'ini print dari HTML ke PDF';
		$output = $this->load->view('report_nilai_mk',$data, true);
		return $this->_gen_pdf($output,'A4','P');
	}

	/* print pdf daftar indeks prestasi mahasiswa */

	public function daftar_indeks_prestasi_mahasiswa($pdf=false)
	{
		$data['tes'] = 'ini print dari HTML ke PDF';
		$output = $this->load->view('daftar_indeks_prestasi_mahasiswa',$data, true);
		return $this->_gen_pdf($output,'A4','P');
	}

	/* print pdf report transkrip akademik */

	public function report_transkrip_akademik($pdf=false)
	{
		$data['tes'] = 'ini print dari HTML ke PDF';
		$output = $this->load->view('report_transkrip_akademik',$data, true);
		//return $this->_gen_pdf($output, 'A4', 'P');
	}
	/*===============================END NILAI======================================================*/


	//Logout 

	public function logout()
	{

		$this->session->sess_destroy();
		redirect('c_index_aka/pilih_menu');

	}
}

