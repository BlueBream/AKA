<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class P_jurusan extends CI_Controller {
		function __Construct()
		{
			parent::__construct();
			$this->cek_login = $this->session->userdata('login') == true;
			$this->load->model('m_jurusan');
			$this->m_aka->update_waktu_nilai();
		}
/*================================== START INDEX =======================================*/
		public function index(){
			if($this->cek_login){
				$data['content']="pg_jurusan/utama";
				$this->load->view('pg_jurusan/content',$data);
			}else{
				redirect("c_index_aka/pilih_menu");
			}
		}
/*================================== END INDEX =======================================*/

	/*============================================= DATA DOSEN ==================================================*/
	
	public function data_dosen()
	{
	if($this->cek_login){	
		$data['content'] = 'pg_jurusan/data_dosen';
		$data['data'] = $this->m_jurusan->data_dosen();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('pg_jurusan/content', $data);
	}else{
		redirect("c_index_aka/pilih_menu");
		}
	}

	// input data dosen
	public function input_data_dosen(){
	if($this->cek_login){
		$data['content'] = 'pg_jurusan/input_data_dosen';
		$this->load->view('pg_jurusan/content',$data);
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}

	//proses input data dosen
	public function prosesinput_data_dosen(){
	if($this->cek_login){	
		$this->m_aka->prosesinput_data_dosen();
		redirect('p_jurusan/data_dosen');
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}
	
	//Edit dosen
	
	public function edit_data_dosen()
	{
	if($this->cek_login){
		$t_mk = 't_mk';
		$data['t_mk'] = $this->m_aka->get_all_mk($t_mk);
		$data['edit'] = $this->m_aka->edit_data_dosen();
		$data['content'] = 'pg_jurusan/edit_data_dosen';
		$this->load->view('pg_jurusan/content', $data);
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}
	
	public function prosesedit_data_dosen(){
	if($this->cek_login){	
		$edit = $this->m_aka->prosesedit_data_dosen();
		if($edit){
			redirect('p_jurusan/data_dosen');
			
		}else if(!$edit){
			$data['content'] = 'pg_jurusan/edit_data_dosen';
			$this->load->view('pg_jurusan/content', $data);
			
		}
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}

	public function detail_dosen(){
	if($this->cek_login){	
		$data['content'] = "pg_jurusan/detail_mahasiswa";
		$uri = $this->uri->segment(3);
		$select = "*";
		$table = "t_mahasiswa,t_kelas,t_dump";
		$where = "t_mahasiswa.nim = t_dump.nim AND t_mahasiswa.id_kelas = t_kelas.id_kelas AND t_mahasiswa.nim = '$uri'";
		$data['data'] = $this->m_aka->get_db_query($select, $table, $where);
		$this->load->view("pg_jurusan/content", $data);
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}
	//mengajar mata kuliah
	public function detail_matkul_dosen()
	{
	if($this->cek_login){	
		$data['edit'] = $this->m_aka->edit_data_dosen();
		$data['content'] = 'pg_jurusan/detail_matkul_dosen';
		$this->load->view('pg_jurusan/content', $data);
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}

	//proses input data dosen
	public function prosesinput_detail_matkul_dosen(){
	if($this->cek_login){	
		$this->m_aka->prosesinput_detail_matkul_dosen();
		redirect('p_jurusan/data_dosen');
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}

	//mengajar mata kuliah
	public function data_matkul_dosen()
	{
	if($this->cek_login){	
		$data['id_dosen']=$this->uri->segment(3);
		$data['edit'] = $this->m_aka->data_matkul_dosen();
		$data['content'] = 'pg_jurusan/data_matkul_dosen';
		$this->load->view('pg_jurusan/content', $data);
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}
	public function hapus_data_matkul_dosen()
	{
	if($this->cek_login){	
		$this->m_aka->hapus_data_matkul_dosen();
		redirect('p_jurusan/data_dosen');
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}
	
	//Hapus dosen
	
	public function hapus_dosen()
	{
	if($this->cek_login){	
		$this->m_aka->hapus_dosen();
		redirect('p_jurusan/data_dosen');
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}

	/*============================================= END DATA DOSEN ==================================================*/

	/*============================================= DATA BIMBINGAN ==================================================*/
	public function bimbingan(){
	if($this->cek_login){	
		$data['data']=$this->m_aka->get_dosen();
		$data['content'] = "pg_jurusan/bimbingan";
		$this->load->view('pg_jurusan/content',$data);
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}
	public function bimbingan_dosen(){
	if($this->cek_login){	
		$data['data']=$this->m_aka->bimbingan_dosen();
		$data['content'] = "pg_jurusan/detail_bimbingan";
		$this->load->view('pg_jurusan/content',$data);	
	}else{
		redirect("c_index_aka/pilih_menu");
		}			
	}
	public function delete_mhs_bimbingan(){
	if($this->cek_login){	
		$this->m_jurusan->delete_mhs_bimbingan();
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}
	public function get_mhs_mahasiswa(){
	if($this->cek_login){	
		$data['data']=$this->m_aka->tmh_bimbingan_dosen();
		$data['content'] = "pg_jurusan/tambah_bimbingan";
		$this->load->view('pg_jurusan/content',$data);
	}else{
		redirect("c_index_aka/pilih_menu");
		}				
	}
	public function tambah_mhs_bimbingan(){
	if($this->cek_login){	
		if(!$this->input->post('nim') == ""){
		$this->m_jurusan->tambah_mhs_bimbingan();		
		}
	}else{
		redirect("c_index_aka/pilih_menu");
		}		
	}
	public function cek_tambah_bimbingan(){
	if($this->cek_login){	
		$nim = $this->input->post('nim');
		$this->m_jurusan->cek_tambah_bimbingan($nim);
	}else{
		redirect("c_index_aka/pilih_menu");
		}		

	}
	/*============================================= END DATA BIMBINGAN ==================================================*/



			/* ================================= KUOTA MATA KULIAH PILIHAN ================================= */
	public function Kuota_mata_kuliah_pilihan(){
		if($this->input->post('src')){
			$this->session->set_userdata('src',$this->input->post('src'));
			$this->session->set_userdata('status',"aktif");
		}else{
			$this->session->set_userdata('status',"tidak");
		}
		$data['data'] = $this->m_jurusan->kuota_mata_kuliah_pilihan(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'pg_jurusan/kuota_mata_kuliah_pilihan';
		$this->load->view('pg_jurusan/content', $data);
	}
	//TAMBAH KUOTA MATA KULIAH PILIHAN
	public function t_kuota_mata_kuliah_pilihan(){
		if($this->input->post('src')){
			$this->session->set_userdata('src',$this->input->post('src'));
			$this->session->set_userdata('status',"aktif");
		}else{
			$this->session->set_userdata('status',"tidak");
		}		
		$data['data'] = $this->m_jurusan->t_kuota_mata_kuliah_pilihan(); 
		$data['kelas'] = $this->m_aka->kelas();
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'pg_jurusan/tambah_kuota_mata_kuliah_pilihan';
		$this->load->view('pg_jurusan/content', $data);		
	}
	//PROSES TAMBAH KUOTA MATA KULIAH PILIHAN
	public function isi_t_kuota_matkul_pilihan(){
		$kode = $this->uri->segment(3);
		$data['data']= $this->m_jurusan->isi_t_edit_kuota_matkul_pilihan();		
		$data['kelas'] = $this->m_aka->kelas();		
		$data['content'] = 'pg_jurusan/isi_kuota_mata_kuliah_pilihan';
		$this->load->view('pg_jurusan/content',$data);		
	}
	public function p_t_kuota_matkul_pilihan(){
		$sql = $this->m_jurusan->p_t_kuota_mata_kuliah_pilihan(); 
		if($sql){
			redirect('p_jurusan/t_kuota_mata_kuliah_pilihan');
		}
	}
	//MENGHAPUS DATA KUOTA MATA KULIAH PILIHAN
	public function hapus_kuota_matkul_pilihan(){
		$sql = $this->m_aka->hapus_kuota_matkul_pilihan();
		if($sql){
			redirect('m_jurusan/Kuota_mata_kuliah_pilihan');
		}		
	}
	//MENGAMBIL KODE MK
	public function l_edit_kuota_matkul_pilihan(){
		$data_sql 			= $this->m_jurusan->l_edit_kuota_matkul_pilihan();
		$data['sql'] 		= $data_sql->result();
		$data['kelas'] 		= $this->m_aka->kelas();			
		$data['content'] 	= 'pg_jurusan/edit_kuota_matkul_pilihan';
		$this->load->view('pg_jurusan/content',$data);		
	}
	//PROSESS MENGEDIT DI MODEL
	public function edit_kuota_matkul_pilihan(){
		$sql = $this->m_jurusan->edit_kuota_matkul_pilihan();
		if($sql){
			redirect('m_jurusan/Kuota_mata_kuliah_pilihan');
		}		

	}	
	/* ================================= END KUOTA MATA KULIAH PILIHAN ================================= */	
	/* ================================= MATA KULIAH ================================= */
	// data matakuliah mahasiswa
	public function data_mata_kuliah()
	{

		$data['data'] = $this->m_aka->data_mata_kuliah_2(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'pg_jurusan/data_mata_kuliah';
		$this->load->view('pg_jurusan/content', $data);
	}

	// input data mata kuliah mahasiswa
	public function input_mata_kuliah(){
		$data['content'] = 'pg_jurusan/input_mata_kuliah';
		$this->load->view('pg_jurusan/content',$data);
	}

	//proses input data mahasiswa
	public function prosesinput_mata_kuliah(){

		$this->m_aka->prosesinput_mata_kuliah();
		redirect('p_jurusan/data_mata_kuliah');
	}

	//edit mata kuliah
	public function edit_mata_kuliah(){

		$data['edit'] = $this->m_aka->edit_mata_kuliah();
		$data['content'] = 'pg_jurusan/edit_mata_kuliah';
		$this->load->view('pg_jurusan/content',$data);
	}

	//proses edit mata kuliah
	public function prosesedit_mata_kuliah()
	{

		$this->m_aka->prosesedit_mata_kuliah();
		redirect('p_jurusan/data_mata_kuliah');
	}

	//hapus mata kuliah
	public function hapus_mata_kuliah()
	{
		$this->m_aka->hapus_mata_kuliah();
		redirect('p_jurusan/data_mata_kuliah');
	}

	/* ================================= END MATA KULIAH ================================= */


	/* ================================= JADWAL KULIAH ================================= */
	// data mahasiswa
	public function data_jadwal_kuliah()
	{
	if($this->cek_login){	
		$data['data'] = $this->m_jurusan->data_jadwal_kuliah(); 
		$data['pagination'] = $this->pagination->create_links();
		$data['content'] = 'pg_jurusan/data_jadwal_kuliah';
		$this->load->view('pg_jurusan/content', $data);
	}else{
		redirect("p_jurusan/pilih_menu");
		}		
	}

	// input data mahasiswa
	public function input_jadwal_kuliah(){
	if($this->cek_login){	
		$data['content'] = 'pg_jurusan/input_jadwal_kuliah';
		$this->load->view('pg_jurusan/content',$data);
	}else{
		redirect("p_jurusan/pilih_menu");
		}		
	}

	//proses input data mahasiswa
	public function prosesinput_jadwal_kuliah(){
	if($this->cek_login){	
		$this->m_aka->prosesinput_jadwal_kuliah();
		redirect('p_jurusan/data_jadwal_kuliah');
	}else{
		redirect("p_jurusan/pilih_menu");
		}		
	}
	//hapus mata kuliah
	public function hapus_jadwal_kuliah()
	{
	if($this->cek_login){	
		$this->m_aka->hapus_jadwal_kuliah();
		redirect('p_jurusan/data_jadwal_kuliah');
	}else{
		redirect("p_jurusan/pilih_menu");
		}		
	}

	/* ================================= END JADWAL KULIAH ================================= */
	/*============================================= DATA KALENDER AKADEMIK ==================================================*/
	
	public function data_kalender_akademik()
	{
	if($this->cek_login){	
		$data['content'] = 'pg_jurusan/data_kalender_akademik';
		$data['data'] = $this->m_jurusan->data_kalender_akademik();
		$data['pagination'] = $this->pagination->create_links();		
		$this->load->view('pg_jurusan/content', $data);
	}else{
		redirect("p_jurusan/pilih_menu");
		}		
	}

	// input data kalender akademik
	public function input_data_kalender_akademik(){
	if($this->cek_login){	
		$data['content'] = 'pg_jurusan/input_data_kalender_akademik';
		$this->load->view('pg_jurusan/content',$data);
	}else{
		redirect("p_jurusan/pilih_menu");
		}		
	}

	//proses input data kalender akademik
	public function prosesinput_data_kalender_akademik(){
	if($this->cek_login){	
		$this->m_aka->prosesinput_data_kalender_akademik();
		redirect('p_jurusan/data_kalender_akademik');
	}else{
		redirect("p_jurusan/pilih_menu");
		}		
	}
	
	//Edit data kalender akademik
	
	public function edit_data_kalender_akademik()
	{
	if($this->cek_login){	
		$t_tahun_akademik = 't_tahun_akademik';
		$data['t_tahun_akademik'] = $this->m_aka->get_all_ta($t_tahun_akademik);
		$data['edit'] = $this->m_aka->edit_data_kalender_akademik();
		$data['content'] = 'pg_jurusan/edit_data_kalender_akademik';
		$this->load->view('pg_jurusan/content', $data);
	}else{
		redirect("p_jurusan/pilih_menu");
		}		
		
	}
	
	public function prosesedit_data_kalender_akademik(){
	if($this->cek_login){	
		$edit = $this->m_aka->prosesedit_data_kalender_akademik();
		if($edit){
			redirect('p_jurusan/data_kalender_akademik');
			
		}else if(!$edit){
			$data['content'] = 'pg_jurusan/edit_data_kalender_akademik';
			$this->load->view('pg_jurusan/content', $data);	
		}
	}else{
		redirect("p_jurusan/pilih_menu");
		}		
	}
	
	//Hapus data kalender akademik
	
	public function hapus_data_kalender_akademik()
	{
	if($this->cek_login){	
		$this->m_aka->hapus_data_kalender_akademik();
		redirect('p_jurusan/data_kalender_akademik');
	}else{
		redirect("p_jurusan/pilih_menu");
		}		
	}

	/*============================================= END DATA KALENDER AKADEMIK ==================================================*/
	

/*================================== START LOGOUT =======================================*/

		public function logout(){
			$this->session->sess_destroy();
			redirect("c_index_aka/pilih_menu");
		}
/*================================== END LOGOUT =======================================*/

	}