<?php

class m_aka extends CI_Model{

	public function validationlogin(){

		//Get Value Post Username And Password

		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$username = mysql_real_escape_string($user);
		$password = mysql_real_escape_string(md5($pass));
		$query = $this->db->query("SELECT * FROM t_user WHERE username = '$username' AND password = '$password' AND tipe = 'akademik'");
		$data = $query->row_array();

		// If Checked Than Create Session From Value Database

			if($query->num_rows() == 1)
			{
				//Get Value In Database

				$config = array(
					'login' => true,
					'name_s' => $data['username'],
					'level_s' => $data['tipe']
				);

				//Create Session

				$this->session->set_userdata($config);
				redirect('c_index_aka/index2');
				
			}else{
				redirect('c_index_aka/login');
			}		

	}

	public function array_empty_remover($array, $remove_null_number = true) {
		$new_array = array();
		$null_exceptions = array();
		foreach ($array as $key => $value) {
			$value = trim($value);
			if($remove_null_number) {
				$null_exceptions[] = '0';
			}
			if(!in_array($value, $null_exceptions) && $value != "") {
				$new_array[] = $value;
			}
		}
		return $new_array;
	}

	public function login_mahasiswa(){

		//Get Value Post Username And Password

		$user = $this->input->post('nim');
		$pass = $this->input->post('password');
		$nim = mysql_real_escape_string($user);
		$password = mysql_real_escape_string(md5($pass));
		$query = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim = $user AND password = '$password'");
		$data = $query->row_array();

		// If Checked Than Create Session From Value Database

			if($query->num_rows() == 1)
			{
				//Get Value In Database

				$config = array(
					'login' => true,
					'akademik'=>true,
					'nim_s' => $data['nim'],
					'id_mhs' => $data['id_mahasiswa']
				);

				//Create Session

				$this->session->set_userdata($config);
				redirect('p_mahasiswa/index');
				
			}else{
				redirect('c_index_aka/login_mahasiswa');
			}		
	}


	public function login_jurusan(){

		//Get Value Post Username And Password

		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$username = mysql_real_escape_string($user);
		$password = mysql_real_escape_string(md5($pass));
		$query = $this->db->query("SELECT * FROM t_user WHERE username = '$username' AND password = '$password' AND tipe = 'jurusan'");
		$data = $query->row_array();

		// If Checked Than Create Session From Value Database

			if($query->num_rows() == 1)
			{
				//Get Value In Database

				$config = array(
					'login' => true,
					'name_s' => $data['username'],
					'level_s' => $data['tipe'],
				);

				//Create Session

				$this->session->set_userdata($config);
				redirect('p_jurusan/index');
				
			}else{
				redirect('c_index_aka/login_jurusan');
			}		

	}

	public function login_dosen(){

		//Get Value Post Username And Password

		$user = $this->input->post('username');
		$pass = $this->input->post('password_simak');
		$username = mysql_real_escape_string($user);
		$password = mysql_real_escape_string(md5($pass));
		$query = $this->db->query("SELECT * FROM t_dosen WHERE username = '$username' AND password_simak = '$password'");
		$data = $query->row_array();

		// If Checked Than Create Session From Value Database

			if($query->num_rows() == 1)
			{
				//Get Value In Database

				$config = array(
					'login' => true,
					'nip_s' => $data['nip'],
					'id_dosen' => $data['id_dosen'],
					'username' => $data['username']
				);

				//Create Session

				$this->session->set_userdata($config);
				redirect('p_dosen/index');
				
			}else{
				redirect('c_index_aka/login_dosen');
			}		

	}

	public function login_keuangan(){

		//Get Value Post Username And Password

		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$username = mysql_real_escape_string($user);
		$password = mysql_real_escape_string(md5($pass));
		$query = $this->db->query("SELECT * FROM t_user WHERE username = '$username' AND password = '$password' AND tipe = 'keuangan'");
		$data = $query->row_array();

		// If Checked Than Create Session From Value Database

			if($query->num_rows() == 1)
			{
				//Get Value In Database

				$config = array(
					'login' => true,
					'name_s' => $data['username'],
					'level_s' => $data['tipe']
				);

				//Create Session

				$this->session->set_userdata($config);
				redirect('p_keuangan/index');
				
			}else{
				redirect('c_index_aka/login_keuangan');
			}		

	}
	public function login_spm(){

		//Get Value Post Username And Password

		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$username = mysql_real_escape_string($user);
		$password = mysql_real_escape_string(md5($pass));
		$query = $this->db->query("SELECT * FROM t_user WHERE username = '$username' AND password = '$password' AND tipe = 'spm'");
		$data = $query->row_array();

		// If Checked Than Create Session From Value Database

			if($query->num_rows() == 1)
			{
				//Get Value In Database

				$config = array(
					'login' => true,
					'name_s' => $data['username'],
					'level_s' => $data['tipe']
				);

				//Create Session

				$this->session->set_userdata($config);
				redirect('p_spm/index');
				
			}else{
				redirect('c_index_aka/login_spm');
			}		

	}
	// Jika Batas Waktu Nilai Sudah Habis Maka Huruf Mutu Yang Kosong Akan Terisi Otomatis B
	public function update_nilai(){


	}

	//Get all value a table without query

	public function get_all($table)
	{
		
		$data = $this->db->get($table);
		return $data->result_array();
	}

	public function get_all_row($table)
	{
		
		$data = $this->db->get($table);
		return $data->row_array();
	}

	//Get value with query

	public function get_db_query($select, $table, $where){
		
		$data = $this->db->query("SELECT $select FROM $table WHERE $where");
		return $data->result_array();
	}

	//Get value with query

	public function get_db_query2($query){
		return $query->row_array();
	}

	public function query_aka($query){
		if($query){
			$query = $this->db->query($query);
			$result = $query->result_array();
			return $result;
		}
	}

	public function huruf_password($panjang) {
		$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; 
		$string = ''; for ($i = 0; $i < $panjang; $i++) { 
			$pos = rand(0, strlen($karakter)-1); 
			$string .= $karakter{$pos}; 
		} 
			return $string;
	}

	public function proses_generate_password(){
		
		$id = $this->input->post('id_mhs');
		$count = count($id);
		
		for ($i=0; $i < $count; $i++) { 
		 	$password = $this->input->post('password_mhs');
		 	
		 	$data = array(
		 		'password' => md5($password[$i])
		 	);

		 	$this->db->update('t_mahasiswa', $data, array('id_mahasiswa' => $id[$i]));
		}

	}

	//Insert

	public function add_value($data, $table, $location){

		$this->db->insert($table, $data);
		redirect($location);
		
	}

	/* ======================================== DATA KELAS =================================== */
	// data mata kuliah
	public function data_kelas(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/data_kelas/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_kelas JOIN t_prodi');
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
		$prodi = $this->input->post('prodi');
	/*if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_mk.nama_mk LIKE '%$cari%' AND";

	}else{
		$src = "";
	}*/
	$data = $this->db->query("SELECT t_kelas.id_kelas,t_kelas.nama_kelas,t_prodi.prodi FROM t_kelas JOIN t_prodi ORDER BY id_kelas DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input mata kuliah
	public function prosesinput_data_kelas(){
	$peringatan = "Input Data Kelas Berhasil !";
	$data = array(
	   'id_kelas' => '',
	   'kode_kelas' => $this->input->post('kode_kelas'),
	   'nama_kelas' => $this->input->post('nama_kelas'),
	   'id_prodi' => $this->input->post('id_prodi')
	   );

	$this->db->insert('t_kelas', $data); 
	$this->session->set_userdata("msg", $peringatan);
	}

	//edit kelas
	function edit_data_kelas(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_kelas WHERE id_kelas =".$id);
		return $data->result_array();
	}

	//proses edit kelas
	public function prosesedit_data_kelas(){
		$peringatan = "edit data kelas berhasil..";
		$data = array(
		'nama_kelas' => $this->input->post('nama_kelas'),
		'id_prodi' => $this->input->post('id_prodi')


	);
		$this->session->set_userdata("msg_success","<strong><i class='icon-ok'></i> Berhasil Edit </strong>Data Kbaak <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		$this->db->where('id_kelas',$this->input->post('id_kelas'));
		$edit = $this->db->update('t_kelas',$data);
		return $edit;
		
	}

	//hapus mata kuliah
	function hapus_data_kelas(){
		$id = $this->uri->segment(3);
		$this->db->delete('t_kelas',array('id_kelas' => $id));
	}
	
	
	public function get_data_mahasiswa($link){
		
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/$link/";
		$config['per_page'] = 5;
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
		$pencarian = $this->input->post("parameter_pencarian");
		if($pencarian){

			$d_mahasiswa = $this->input->post("data_mahasiswa_a");
			$parameter = $this->input->post("parameter");
			if($parameter == "nim"){
				$w_parameter = "AND t_mahasiswa.nim = '$d_mahasiswa'";
				$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Data dengan NIM '$d_mahasiswa' tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";
			}
			if($parameter == "mahasiswa"){
				$w_parameter = "AND t_mahasiswa.nama LIKE '%$d_mahasiswa%'";
								$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Data dengan nama mahasiswa '$d_mahasiswa' tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";				
			}
			if($parameter == "angkatan"){
				$w_parameter = "AND t_mahasiswa.angkatan LIKE '$d_mahasiswa%'";
								$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Data angkatan '$d_mahasiswa' tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";								
			}

			$query = $this->db->query("SELECT * FROM t_mahasiswa,t_kelas WHERE t_mahasiswa.id_kelas = t_kelas.id_kelas $w_parameter");
			
			if($query->num_rows < 1){
				$this->session->set_userdata("msg", $peringatan);
			}
		}else{
			$query = $this->db->query("SELECT * FROM t_mahasiswa,t_kelas WHERE t_mahasiswa.id_kelas = t_kelas.id_kelas ORDER BY t_mahasiswa.nim ASC limit $offset,$num");
			
		}
		return $query->result_array();
	}
	/* insert mahasiswa */
	
	public function input_data_mahasiswa(){
		$check_nim = $this->input->post('nim');
		$get_data = $this->db->query("SELECT nim FROM t_mahasiswa WHERE nim = $check_nim");
		$d_mahasiswa = $this->input->post("nim");
		if($get_data->num_rows < 1 ){ //Start If Else

		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$bulan_lahir = $this->input->post('bulan_lahir');
		$tahun_lahir = $this->input->post('tahun_lahir');
		$data_tahun = $tempat_lahir.",".$tanggal_lahir."-".$bulan_lahir."-".$tahun_lahir;

		$config['upload_path'] = "./assets/images/"; //lokasi folder yang akan digunakan untuk menyimpan file
		$config['allowed_types'] = 'gif|jpg|png|JPEG'; //extension yang diperbolehkan untuk diupload
		$config['file_name'] = url_title($this->input->post('userfile'));	
		$this->load->library('upload', $config);
		$this->upload->do_upload();


	$data = array(
	   'id_mahasiswa' => '',
	   'pendaftaran' => 'tutup',
	   'foto' => $this->upload->file_name,
	   'nim' => $this->input->post('nim'),
	   'nama' => $this->input->post('nama'),
	   'angkatan' => $this->input->post('angkatan'),
	   'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	   'alamat' => $this->input->post('alamat'),
	   'provinsi' => $this->input->post('provinsi'),
	   'kabupaten' => $this->input->post('kabupaten'),
	   'kode_pos' => $this->input->post('kode_pos'),
	   'ttl' => $data_tahun,
	   'status_nikah' => $this->input->post('status_nikah'),
	   'golongan_darah' => $this->input->post('golongan_darah'),
	   'agama' => $this->input->post('agama'),
	   'no_ponsel' => $this->input->post('no_ponsel'),
	   'jalur_masuk' => $this->input->post('jalur_masuk'),
	   'asal_sekolah' => $this->input->post('asal_sekolah'),
	   'alamat_sekolah' => $this->input->post('alamat_sekolah'),
	   'kode_pos' => $this->input->post('kode_pos'),
	   'jurusan' => $this->input->post('jurusan'),
	   'program_studi' => $this->input->post('prodi'),
	   'nama_ortu' => $this->input->post('nama_ortu'),
	   'alamat_ortu' => $this->input->post('alamat_ortu'),
	   'no_ponsel_ortu' => $this->input->post('no_ponsel_ortu'),
	   'pekerjaan' => $this->input->post('pekerjaan'),
	   'pend_ortu' => $this->input->post('pend_ortu'),
	   'no_telp' => $this->input->post('no_telp'),
	   'id_kelas' => $this->input->post('id_kelas'),
	   'status_kuliah' => $this->input->post('status_kuliah')
	   );

	$this->db->insert('t_mahasiswa', $data); 

		$data_dump = array(
			'id' => '',
			'nim' => $this->input->post('nim'),
			'smt' => '1',
			'sks' => '0'
		);
	$this->session->set_userdata("msg_success","<strong><i class='icon-ok'></i> Berhasil Input </strong>Data dengan nim '$d_mahasiswa' sudah berhasil diinput<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
	$this->db->insert('t_dump', $data_dump);
	redirect('c_index_aka/data_mahasiswa');
			}else{
				
				$this->session->set_userdata("msg","<strong><i class='icon-remove'></i> Maaf Data Sudah Ada ! </strong>Maaf data nim '$d_mahasiswa' sudah diinput silahkan masukan kembali dengan nim yang belum terdaftar<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
				redirect('c_index_aka/data_mahasiswa');
			} //End If Else
	}
	
	//edit mahasiswa
	
	function edit_mahasiswa(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa =".$id);
		return $data->result_array();
	}
	
	//proses edit mahasiswa
	
	public function prosesedit_mahasiswa(){
		$d_mahasiswa = $this->input->post("nim");
		$tempat_lahir = $this->input->post('tempat_lahir');
		$data = array();
		$foto_upload = $this->input->post('userfile');
		$foto_db = $this->input->post("foto");

		if($_FILES['userfile']['name']){
			$config['upload_path'] = "./assets/images/"; //lokasi folder yang akan digunakan untuk menyimpan file
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; //extension yang diperbolehkan untuk diupload
			$config['file_name'] = url_title($this->input->post('userfile'));	
			$this->load->library('upload', $config);
			$this->upload->do_upload();

			if($foto_db != 0 or $foto_db != ""){
				unlink("assets/images/".$foto_db);
			}
			
			$data += array(
				'foto' => $this->upload->file_name
				);
		}
		$data += array(
		'id_mahasiswa' => $this->input->post('id_mahasiswa'),
		'foto' => $foto_db,
	   'nim' => $this->input->post('nim'),
	   'nama' => $this->input->post('nama'),
	   'angkatan' => $this->input->post('angkatan'),
	   'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	   'alamat' => $this->input->post('alamat'),
	   'provinsi' => $this->input->post('provinsi'),
	   'kabupaten' => $this->input->post('kabupaten'),
	   'kode_pos' => $this->input->post('kode_pos'),
	   'ttl' => $tempat_lahir,
	   'status_nikah' => $this->input->post('status_nikah'),
	   'golongan_darah' => $this->input->post('golongan_darah'),
	   'agama' => $this->input->post('agama'),
	   'no_ponsel' => $this->input->post('no_ponsel'),
	   'tanggal_lulus' => $this->input->post('tahun_lulus'),
	   'instansi_alumni' => $this->input->post('instansi_alumni'),
	   'alamat_instansi' => $this->input->post('alamat_instansi'),
	   'telepon_instansi' => $this->input->post('telepon_instansi'),
	   'kode_pos_instansi' => $this->input->post('kode_pos_instansi'),
	   'tahun_wisuda' => $this->input->post('tahun_wisuda'),
	   'jalur_masuk' => $this->input->post('jalur_masuk'),
	   'asal_sekolah' => $this->input->post('asal_sekolah'),
	   'alamat_sekolah' => $this->input->post('alamat_sekolah'),
	   'jurusan' => $this->input->post('jurusan'),
	   'program_studi' => $this->input->post('prodi'),	   
	   'nama_ortu' => $this->input->post('nama_ortu'),
	   'alamat_ortu' => $this->input->post('alamat_ortu'),
	   'no_ponsel_ortu' => $this->input->post('no_ponsel_ortu'),
	   'pekerjaan' => $this->input->post('pekerjaan'),
	   'pend_ortu' => $this->input->post('pend_ortu'),
	   'no_telp' => $this->input->post('no_telp'),
	   'password' => md5($this->input->post('password')),
	   'id_kelas' => $this->input->post('id_kelas'),
	   'status_kuliah' => $this->input->post('status_kuliah')

	);
		$this->session->set_userdata("msg_success","<strong><i class='icon-ok'></i> Berhasil Edit </strong>Data dengan nim '$d_mahasiswa' sudah berhasil diedit<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		$this->db->where('id_mahasiswa',$this->input->post('id_mahasiswa'));
		$edit = $this->db->update('t_mahasiswa',$data);
		return $edit; 

	}
	
	//hapus mahasiswa
	
	function hapus_mahasiswa(){

		$uri4 = $this->uri->segment(4);
		if($uri4 != "" ){
			$urlgambar = $uri4;
			unlink("assets/images/".$urlgambar);			
		}

		$nim = $this->uri->segment(3);
		$this->db->delete('t_mahasiswa',array('nim' => $nim));
		$this->db->delete('t_dump',array('nim' => $nim));
		$this->session->set_userdata("msg_success","<strong><i class='icon-ok'></i> Berhasil Hapus </strong>Data berhasil dihapus<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");

	}

	public function hapus_multiple_mhs(){
		$hapus = $this->input->post("hapus_multiple");

		$jumlah = count($hapus);

		for ($i=0; $i < $jumlah ; $i++) {
			if(!empty($hapus[$i])){

			$foto = $this->input->post("foto");
			
			if(!empty($foto[$i])){
				$urlgambar = $foto[$i];
				unlink("assets/images/".$urlgambar);			
			}

			$this->db->delete('t_mahasiswa',array('nim' => $hapus[$i]));
			$this->db->delete('t_dump',array('nim' => $hapus[$i]));
			$this->session->set_userdata("msg_success","<strong><i class='icon-ok'></i> Berhasil Hapus </strong>Data berhasil dihapus<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			}else{
				$this->session->set_userdata("msg","<strong><i class='icon-remove'></i> Gagal Hapus Data </strong>Tidak ada data yang ditandai<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			}
		}		
	}

	function input_nilai(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa =".$id);
		return $data->result_array();
	}

	/* ======================================== DATA BIAYA KULIAH =================================== */
	// data mata kuliah
	public function data_biaya_kuliah(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/data_biaya_kuliah/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_biaya_akademik');
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

	/*if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_mk.nama_mk LIKE '%$cari%' AND";

	}else{
		$src = "";
	}*/
	$data = $this->db->query("SELECT * FROM t_biaya_akademik WHERE id = id order by id DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}

	//proses input mata kuliah
	public function prosesinput_data_biaya_kuliah(){
	$peringatan = "Input Data Biaya Kuliah Berhasil !";
	$data = array(
	   'id' => '',
	   'nama' => $this->input->post('nama'),
	   'harga' => $this->input->post('harga')
	   );

	$this->db->insert('t_biaya_akademik', $data); 
	$this->session->set_userdata("msg", $peringatan);
	}

	//edit mata kuliah
	function edit_data_biaya_kuliah(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_biaya_akademik WHERE id =".$id);
		return $data->result_array();
	}

	//proses edit mata kuliah
	public function prosesedit_data_biaya_kuliah(){
		$peringatan = "edit biaya kuliah berhasil..";
		$data = array(
	   'nama' => $this->input->post('nama'),
	   'harga' => $this->input->post('harga')

	);
		$this->session->set_userdata("msg_success","<strong><i class='icon-ok'></i> Berhasil Edit </strong>Data Biaya Kuliah <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		$this->db->where('id',$this->input->post('id'));
		$edit = $this->db->update('t_biaya_akademik',$data);
		return $edit; 
		$this->session->set_userdata("msg", $peringatan);
	}

	//hapus mata kuliah
	function hapus_data_biaya_kuliah(){
		$peringatan = "data biaya kuliah berhasil dihapus..";
		$id = $this->uri->segment(3);
		$this->db->delete('t_biaya_akademik',array('id' => $id));
		$this->session->set_userdata("msg", $peringatan);
	}

	/*===================================== END DATA BIAYA KULIAH ==================== */


	/*===================================== REGISTRASI PEMBAYARAN ==================== */
	function input_registrasi(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa = ".$id);
		return $data->result_array();
	}
	public function reg($nim=0){
		$query_frs = $this->db->query("SELECT a.id_mk as id_mk,f.nama_kelas as nama_kelas,b.smt as smt, a.jumlah_sks as jumlah_sks,e.isi as isi,b.nim as nim_b,e.id as id_e,a.nama_mk as nama_mk_a,d.kode_mk as kode_mk_d,a.kode_mk as kode_mk_a,e.id_kuota FROM t_mk as a,t_dump as b,t_mahasiswa as c,t_kuota_matkul_pilihan as d, t_detail_kuota_matkul as e, t_kelas as f WHERE a.semester=b.smt AND b.nim=c.nim AND c.nim='$nim' AND a.kode_mk=d.kode_mk AND e.id_kuota=d.id AND e.nama_kelas = f.id_kelas");
		if($query_frs->num_rows() <= 1){
			$this->session->set_userdata('reg','Maaf data anda tidak ada');
		}
		return $query_frs;
	}
	public function keuangan_sks($id){
		$query = $this->db->query("SELECT SUM(t_mk.jumlah_sks) AS total_sks FROM t_detail_frs, t_mahasiswa, t_mk, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mahasiswa.id_mahasiswa = '$id' AND t_mk.kode_mk = t_detail_frs.id_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.ulang_mk = 'tidak'");
		return $query->row_array();
	}
	function cari_nim_mhs(){
		$nim=$this->input->post('nim');
		$query = $this->db->query("SELECT * FROM t_mahasiswa, t_dump WHERE t_dump.nim=t_mahasiswa.nim AND t_dump.nim LIKE '%$nim%'");
		if(!$query->num_rows() >= 1){
			$this->session->set_userdata('msg_cari_nim','Maaf NIM yang anda cari tidak ada');			

		}return $query->result();
	}

	//proses input registrasi
	public function prosesinput_registrasi(){
	$peringatan = "DATA REGISTRASI PEMBAYARAN SUKSES DI INPUT !";
	//$nim = $this->input->post('nim');
	

	$nim = $this->input->post('nim');
	$sem = $this->input->post('semester');
	$cekdata="select t_registrasi.semester, t_mahasiswa.nim from t_registrasi, t_mahasiswa where t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa AND t_mahasiswa.nim='$nim' AND t_registrasi.semester='$sem'"; 
	$ada=mysql_query($cekdata) or die(mysql_error()); if(mysql_num_rows($ada)>0) 
	{ 	
		$peringatan2 ="Data pembayaran dengan nim .$nim dan semester .$sem sudah ada";
		$this->session->set_userdata("msg2", $peringatan2);
		//$this->session->set_userdata("msg_error","<strong><i class='icon-ok'></i>  </strong><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
	}else{ 
		$data = array(
	   'id_registrasi' => '',
	   'id_mahasiswa' => $this->input->post('id_mahasiswa'),
	   'semester' => $this->input->post('semester'),
	   'tanggal' => $this->input->post('tanggal'),
	   'tahun' => $this->input->post('tahun'),
	   'jumlah_uang' => $this->input->post('jumlah_uang'),
	   'biaya_daftar_ulang' => $this->input->post('biaya_daftar_ulang'),
	   'biaya_spp' => $this->input->post('biaya_spp'),
	   'biaya_internet' => $this->input->post('biaya_internet'),
	   'total_bayar' => $this->input->post('total_bayar'),
	   'sks_praktek' => $this->input->post('sks_praktek'),
	   'sks_teori' => $this->input->post('sks_teori'),
	   'sisa_cicilan' => $this->input->post('sisa_cicilan'),
	   'memo' => $this->input->post('memo')
	   );

	$this->db->insert('t_registrasi', $data);

	

	/*$data = array(
	   'id_registrasi' => '',
	   'id_mahasiswa' => $this->input->post('id_mahasiswa'),
	   'semester' => $this->input->post('semester'),
	   'tanggal' => $this->input->post('tanggal'),
	   'tahun' => $this->input->post('tahun'),
	   'jumlah_uang' => $this->input->post('jumlah_uang'),
	   'biaya_daftar_ulang' => $this->input->post('biaya_daftar_ulang'),
	   'biaya_spp' => $this->input->post('biaya_spp'),
	   'biaya_internet' => $this->input->post('biaya_internet'),
	   'total_bayar' => $this->input->post('total_bayar'),
	   'sks_praktek' => $this->input->post('sks_praktek'),
	   'sks_teori' => $this->input->post('sks_teori'),
	   'sisa_cicilan' => $this->input->post('sisa_cicilan'),
	   'memo' => $this->input->post('memo')
	   );

	$this->db->insert('t_registrasi', $data);*/

	$data = array(
	   'smt' => $this->input->post('semester'),
	   'sks' => $this->input->post('sks_jumlah')
	   
	   );

	$this->db->where('nim',$this->input->post('nim'));
	$this->db->update('t_dump',$data);


	$data = array(
	   'pendaftaran' => $this->input->post('pendaftaran')
	   
	   );

	$this->db->where('id_mahasiswa',$this->input->post('id_mahasiswa'));
	$this->db->update('t_mahasiswa',$data);

	//$this->db->insert('t_dump', $data);
	$this->session->set_userdata("msg", $peringatan);
	}
	}

	//edit registrasi
	function edit_registrasi(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_registrasi WHERE id_registrasi =".$id);
		return $data->result_array();
	}

	//proses edit registrasi
	public function prosesedit_registrasi(){
		$peringatan = "Cicil registrasi berhasil..";
		$data = array(
	   'sisa_cicilan' => $this->input->post('sisa_cicilan'),
	   'jumlah_uang' => $this->input->post('jumlah_uang'),
	   'memo' => $this->input->post('memo')

	);
		$this->session->set_userdata("msg_success","<strong><i class='icon-ok'></i> Berhasil Edit </strong>Data Kbaak <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		$this->db->where('id_registrasi',$this->input->post('id_registrasi'));
		$edit = $this->db->update('t_registrasi',$data);
		return $edit;
		
	}

	// data registrasi berdasarkan perorangan
	public function registrasi_berdasarkan_perorangan(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/registrasi_berdasarkan_perorangan/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_registrasi');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_mahasiswa.nim LIKE '%$cari%' AND";

	}else{
		$src = "";
	}
	//$data = $this->db->query("SELECT t_registrasi.*, t_mahasiswa.* FROM t_registrasi, t_mahasiswa WHERE $src t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa order by t_registrasi.id_registrasi DESC limit $offset,$num"); //memanggil tabel di database
	$data = $this->db->query("SELECT t_registrasi.*, t_mahasiswa.* FROM t_registrasi, t_mahasiswa WHERE $src t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa order by t_registrasi.id_registrasi DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}




	// data registrasi berdasarkan semester
	public function registrasi_berdasarkan_semester(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/registrasi_berdasarkan_semester/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_registrasi');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$cari2 = $this->input->post('src-t');
	$src = "t_registrasi.semester LIKE '%$cari%' AND t_registrasi.tahun LIKE '%$cari2%' AND";

	}else{
		$src = "";
	}
	//$data = $this->db->query("SELECT t_registrasi.*, t_mahasiswa.* FROM t_registrasi, t_mahasiswa WHERE $src t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa order by t_registrasi.id_registrasi DESC limit $offset,$num"); //memanggil tabel di database
	$data = $this->db->query("SELECT t_registrasi.*, t_mahasiswa.* FROM t_registrasi, t_mahasiswa WHERE $src t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa order by t_registrasi.id_mahasiswa DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}



	// data registrasi berdasarkan Tanggal
	public function registrasi_berdasarkan_tanggal(){
		//Pagination
		$cari = $this->input->post('date1');
		$cari2 = $this->input->post('date2');
		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/registrasi_berdasarkan_tanggal/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_registrasi');
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

	if($this->input->post('submit')){
	
	//$src = "t_registrasi.tanggal LIKE '%$cari%' AND t_registrasi.tanggal LIKE '%$cari2%' AND";
	//SELECT * FROM `t_cuti_akademik` WHERE tgl_cuti BETWEEN '2014-11-10' and '2014-11-12'
	}else{
		$src = "";
	}
	//$data = $this->db->query("SELECT t_registrasi.*, t_mahasiswa.* FROM t_registrasi, t_mahasiswa WHERE $src t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa order by t_registrasi.id_registrasi DESC limit $offset,$num"); //memanggil tabel di database
	$data = $this->db->query("SELECT t_registrasi.*, t_mahasiswa.* FROM t_registrasi, t_mahasiswa WHERE t_registrasi.tanggal BETWEEN '$cari' AND '$cari2' AND t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa order by t_registrasi.id_mahasiswa DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}



	/* PG KEUANGAN */

	// data registrasi berdasarkan perorangan
	public function registrasi_berdasarkan_perorangan_2(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."p_keuangan/registrasi_berdasarkan_perorangan/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_registrasi');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_mahasiswa.nim LIKE '%$cari%' AND";

	}else{
		$src = "";
	}
	//$data = $this->db->query("SELECT t_registrasi.*, t_mahasiswa.* FROM t_registrasi, t_mahasiswa WHERE $src t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa order by t_registrasi.id_registrasi DESC limit $offset,$num"); //memanggil tabel di database
	$data = $this->db->query("SELECT t_registrasi.*, t_mahasiswa.* FROM t_registrasi, t_mahasiswa WHERE $src t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa order by t_registrasi.id_registrasi DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}




	// data registrasi berdasarkan semester
	public function registrasi_berdasarkan_semester_2(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."p_keuangan/registrasi_berdasarkan_semester/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_registrasi');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$cari2 = $this->input->post('src-t');
	$src = "t_registrasi.semester LIKE '%$cari%' AND t_registrasi.tahun LIKE '%$cari2%' AND";

	}else{
		$src = "";
	}
	//$data = $this->db->query("SELECT t_registrasi.*, t_mahasiswa.* FROM t_registrasi, t_mahasiswa WHERE $src t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa order by t_registrasi.id_registrasi DESC limit $offset,$num"); //memanggil tabel di database
	$data = $this->db->query("SELECT t_registrasi.*, t_mahasiswa.* FROM t_registrasi, t_mahasiswa WHERE $src t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa order by t_registrasi.id_mahasiswa DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}



	// data registrasi berdasarkan Tanggal
	public function registrasi_berdasarkan_tanggal_2(){
		//Pagination
		$cari = $this->input->post('date1');
		$cari2 = $this->input->post('date2');
		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."p_keuangan/registrasi_berdasarkan_tanggal/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_registrasi');
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

	if($this->input->post('submit')){
	
	//$src = "t_registrasi.tanggal LIKE '%$cari%' AND t_registrasi.tanggal LIKE '%$cari2%' AND";
	//SELECT * FROM `t_cuti_akademik` WHERE tgl_cuti BETWEEN '2014-11-10' and '2014-11-12'
	}else{
		$src = "";
	}
	//$data = $this->db->query("SELECT t_registrasi.*, t_mahasiswa.* FROM t_registrasi, t_mahasiswa WHERE $src t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa order by t_registrasi.id_registrasi DESC limit $offset,$num"); //memanggil tabel di database
	$data = $this->db->query("SELECT t_registrasi.*, t_mahasiswa.* FROM t_registrasi, t_mahasiswa WHERE t_registrasi.tanggal BETWEEN '$cari' AND '$cari2' AND t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa order by t_registrasi.id_mahasiswa DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}

	/* END PG KEUANGAN */

	//hapus registrasi perorangan
	function hapus_registrasi_berdasarkan_perorangan(){
		$peringatan = "data registrasi berhasil dihapus..";
		$id = $this->uri->segment(3);
		$this->db->delete('t_registrasi',array('id_registrasi' => $id));
		$this->session->set_userdata("msg", $peringatan);
	}

	//hapus registrasi semester
	function hapus_registrasi_berdasarkan_semester(){
		$peringatan = "data registrasi berhasil dihapus..";
		$id = $this->uri->segment(3);
		$this->db->delete('t_registrasi',array('id_registrasi' => $id));
		$this->session->set_userdata("msg", $peringatan);
	}

	//hapus registrasi tanggal
	function hapus_registrasi_berdasarkan_tanggal(){
		$peringatan = "data registrasi berhasil dihapus..";
		$id = $this->uri->segment(3);
		$this->db->delete('t_registrasi',array('id_registrasi' => $id));
		$this->session->set_userdata("msg", $peringatan);
	}
	/*===================================== END REGISTRASI PEMBAYARAN ==================== */

	
	/* ================================= DATA KBAAK ================================= */
	// data kbaak
	public function data_kbaak(){
		
	$data = $this->db->query("SELECT * FROM t_kbaak WHERE id = id order by id DESC"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//edit kbaak
	function edit_data_kbaak(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_kbaak WHERE id =".$id);
		return $data->result_array();
	}

	//proses edit kbaak
	public function prosesedit_data_kbaak(){
		$peringatan = "edit data kbaak berhasil..";
		$data = array(
	   'nama' => $this->input->post('nama'),
	   'nip' => $this->input->post('nip'),
	   'jabatan' => $this->input->post('jabatan')

	);
		$this->session->set_userdata("msg_success","<strong><i class='icon-ok'></i> Berhasil Edit </strong>Data Kbaak <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		$this->db->where('id',$this->input->post('id'));
		$edit = $this->db->update('t_kbaak',$data);
		return $edit;
		
	}
	/* ================================= END DATA KBAAK ================================= */

	/* -------------------------------------------- DATA DOSEN ------------------------------------------------- */

	// data bahan kuliah
	public function data_dosen(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/data_dosen/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_dosen');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_dosen.nama LIKE '%$cari%' AND";

	}else{
		$src = "";
	}
	$data = $this->db->query("SELECT * FROM t_dosen WHERE $src id_dosen = id_dosen order by t_dosen.id_dosen DESC limit $offset,$num"); //memanggil tabel di database

	return $data->result_array(); //
	}


	//proses input bahan kuliah
	public function prosesinput_data_dosen(){
	$tempat_lahir = $this->input->post('tempat_lahir');
	$tanggal_lahir = $this->input->post('tanggal_lahir');
	$bulan_lahir = $this->input->post('bulan_lahir');
	$tahun_lahir = $this->input->post('tahun_lahir');
	$data_tahun = $tempat_lahir.",".$tanggal_lahir."-".$bulan_lahir."-".$tahun_lahir;

	$config['upload_path'] = "./assets/images/"; //lokasi folder yang akan digunakan untuk menyimpan file
	$config['allowed_types'] = 'gif|jpg|png|JPEG'; //extension yang diperbolehkan untuk diupload
	$config['file_name'] = url_title($this->input->post('userfile'));	
	$this->load->library('upload', $config);
	$this->upload->do_upload();
	$peringatan = "DATA DOSEN SUKSES DI INPUT !";



	$data = array(
	   'id_dosen' => '',
	   'nip' => $this->input->post('nip'),
	   'nama' => $this->input->post('nama'),
	   'alamat' => $this->input->post('alamat'),
	   'foto' => $this->upload->file_name,
	   'no_telp' => $this->input->post('no_telp'),
	   'gelar' => $this->input->post('gelar'),	   
	   'ttl' => $data_tahun,
	   'username' => $this->input->post('username'),
	   'password_simak' => md5($this->input->post('password_simak')),
	   'password_sms' =>md5($this->input->post('password_sms'))
	   );

	$this->db->insert('t_dosen', $data); 
	$this->session->set_userdata("msg", $peringatan);

	}

	function edit_data_dosen(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_dosen WHERE id_dosen =".$id);
		return $data->result_array();
	}

	function data_matkul_dosen(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT t_dosen.*, t_pengajar.*, t_mk.* FROM t_dosen, t_pengajar, t_mk WHERE t_dosen.id_dosen = t_pengajar.id_dosen AND t_pengajar.id_mk = t_mk.id_mk AND t_dosen.id_dosen =".$id);
		return $data->result_array();
	}
	
	public function get_all_mk($t_mk)
	{
		
		$data = $this->db->get($t_mk);
		return $data->result_array();
	}
	//proses edit dosen
	
	public function prosesedit_data_dosen(){
		$tempat_lahir = $this->input->post('tempat_lahir');
		$data = array();
		$foto_upload = $this->input->post('userfile');
		$foto_db = $this->input->post("foto");

		if($_FILES['userfile']['name']){
			$config['upload_path'] = "./assets/images/"; //lokasi folder yang akan digunakan untuk menyimpan file
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; //extension yang diperbolehkan untuk diupload
			$config['file_name'] = url_title($this->input->post('userfile'));	
			$this->load->library('upload', $config);
			$this->upload->do_upload();

			if($foto_db != 0 or $foto_db != ""){
				unlink("assets/images/".$foto_db);
			}
			
			$data += array(
				'foto' => $this->upload->file_name
				);
		}
		$data += array(
			'foto' => $foto_db,
			'ttl' => $tempat_lahir,
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'gelar' => $this->input->post('gelar'),
			'username' => $this->input->post('username')

	);
		$this->session->set_userdata("msg_success","<strong><i class='icon-ok'></i> Berhasil Edit </strong>Data Dosen <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		$this->db->where('id_dosen',$this->input->post('id_dosen'));
		$edit = $this->db->update('t_dosen',$data);
		return $edit; 

	}


	//proses input data matkul dosen
	public function prosesinput_detail_matkul_dosen(){
	
	$peringatan = "DATA DOSEN SUKSES DI INPUT !";



	$data = array(
	   'id_pengajar' => '',
	   'id_dosen' => $this->input->post('id_dosen'),
	   'id_mk' => $this->input->post('id_mk')
	   );

	$this->db->insert('t_pengajar', $data); 
	$this->session->set_userdata("msg", $peringatan);

	}

	//hapus mata kuliah dosen
	function hapus_data_matkul_dosen(){
		$id = $this->uri->segment(3);
		$this->db->delete('t_pengajar',array('id_pengajar' => $id));
	}

	//hapus dosen
	function hapus_dosen(){
		$uri4 = $this->uri->segment(4);
		if($uri4 != "" ){
			$urlgambar = $uri4;
			unlink("assets/images/".$urlgambar);			
		}

		$id = $this->uri->segment(3);
		$this->db->delete('t_dosen',array('id_dosen' => $id));
	}


	/* -------------------------------------------- END DATA DOSEN ------------------------------------------------- */

	/* -------------------------------------------- DATA BIMBINGAN ------------------------------------------------- */

	//DATA BIMBINGAN
	public function get_dosen(){
		$sql = $this->db->get('t_dosen');
		return $sql;
	}
	public function bimbingan(){
		$sql = $this->db->query("SELECT * FROM t_bimbingan as a, t_dosen as b WHERE a.id_dosen = b.id_dosen");
		return $sql;
	}
	public function bimbingan_dosen(){
		$id_dosen = $this->uri->segment(3);
		$sql = $this->db->query("SELECT * FROM t_bimbingan as a,t_mahasiswa as b WHERE a.id_dosen='$id_dosen' AND a.id_mahasiswa = b.id_mahasiswa");
		return $sql;
	}
	public function tmh_bimbingan_dosen(){
		$id_dosen = $this->uri->segment(3);
		$sql = $this->db->query("SELECT * FROM t_dosen as a WHERE a.id_dosen='$id_dosen'");
		return $sql;
	}	
	public function delete_mhs_bimbingan(){
		$id_bimbingan = $this->uri->segment(3);
		$id_dosen = $this->uri->segment(4);
		$this->db->where('id_bimbingan',$id_bimbingan);
		$this->db->where('id_dosen',$id_dosen);
		$sql = $this->db->delete('t_bimbingan');
		if($sql){
			$this->session->set_userdata("msg","Data mahasiswa yang mengikuti bimbingan, berhasil di batalkan.");
			redirect("c_index_aka/bimbingan_dosen/$id_dosen");
		}else{
			$this->session->set_userdata("msg_error","Maaf ada kesalahan saat membatalkan bimbingan.");
			redirect("c_index_aka/bimbingan_dosen/$id_dosen");
		}
	}
	public function get_mhs_bimbingan(){
		return $this->db->get('t_mahasiswa');
	}
	public function tambah_mhs_bimbingan(){
		$time = date("Y-m-d");
		$nim = $this->input->post('nim');
		$get_id_mhs = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim='$nim'")->row();
		$is = $get_id_mhs->status_kuliah;
		if($is == ''){
			$is_lulus = "";
		}else{
			$is_lulus= $is;
		}
		$id_mhs = $get_id_mhs->id_mahasiswa;
		$id_dosen = $this->input->post('id_dosen');
		$cek_bimbingan = $this->db->query("SELECT * FROM t_bimbingan WHERE id_mahasiswa='$id_mhs' AND id_dosen='$id_dosen'")->num_rows();
		$get_akademik =$this->db->query("SELECT * FROM t_tahun_akademik WHERE current='Ya'")->row();
		$id_akademik = $get_akademik->id;
		if(!$id_mhs == ''){
		if($cek_bimbingan < 1){
		$data=array('id_dosen'=>$id_dosen,
			'tanggal'=>$time,
			'id_mahasiswa'=>$id_mhs,
			'keterangan'=>$this->input->post('keterangan'),
			'id_tahun_akademik'=>$id_akademik,
			'is_lulus'=>$is_lulus
			);
		$sql = $this->db->insert('t_bimbingan',$data);			
			if($sql){
				$this->session->set_userdata("msg","Berhasil menambah mahasiswa.");
				redirect("c_index_aka/bimbingan_dosen/$id_dosen");			
			}else{
				$this->session->set_userdata("msg_error","Maaf ada kesalahan.");
				redirect("c_index_aka/get_mhs_mahasiswa/$id_dosen");			
			}
		}else{
				$this->session->set_userdata("msg_error","Maaf mahasiswa dengan nim $nim sudah ada pembimbing");
				redirect("c_index_aka/get_mhs_mahasiswa/$id_dosen/$cek_bimbingan");			
		}
		}else{
				$this->session->set_userdata("msg_error","Maaf Nim tidak ada");
				redirect("c_index_aka/get_mhs_mahasiswa/$id_dosen/$cek_bimbingan");			
		}
	}
	public function cek_tambah_bimbingan($nim){
		
		$get_id_mhs = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim='$nim'");
		$jml_mhs = $get_id_mhs->num_rows();
		$get_mhs = $get_id_mhs->row();
		$id_mhs = $get_mhs->id_mahasiswa;
		$cek_bimbingan = $this->db->query("SELECT * FROM t_bimbingan WHERE id_mahasiswa='$id_mhs'")->num_rows();
		if($jml_mhs > 0){
			if($cek_bimbingan < 1){	
				echo "Succed";
			}else{
				echo "NIM ini sudah ada pembimbing";
			}
		}else{
			echo "NIM $nim tidak tersedia";
		}	
	}

	/* -------------------------------------------- END DATA BIMBINGAN ------------------------------------------------- */



	/* -------------------------------------------- DATA KALENDER AKADEMIK ------------------------------------------------- */

	// data bahan kuliah
	public function data_kalender_akademik(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/data_kalender_akademik/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_kalender_akademik');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_kalender_akademik.id_ta LIKE '%$cari%' AND";

	}else{
		$src = "";
	}
	$data = $this->db->query("SELECT t_kalender_akademik.*, t_tahun_akademik.tahun_akademik FROM t_kalender_akademik, t_tahun_akademik WHERE $src t_kalender_akademik.id_ta = t_tahun_akademik.id order by t_kalender_akademik.id DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input kalender akademik
	public function prosesinput_data_kalender_akademik(){

	$peringatan = "INPUT KALENDER AKADEMIK SUKSES !";

	$data = array(
	   'id' => '',
	   'id_ta' => $this->input->post('id_ta'),
	   'kegiatan' => $this->input->post('kegiatan'),
	   'tanggal' => $this->input->post('tanggal')
	   );

	$this->db->insert('t_kalender_akademik', $data); 
	$this->session->set_userdata("msg", $peringatan);

	}
	
	public function get_all_ta($t_tahun_akademik)
	{
		
		$data = $this->db->get($t_tahun_akademik);
		return $data->result_array();
	}

	function edit_data_kalender_akademik(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_kalender_akademik WHERE id =".$id);
		return $data->result_array();
	}
	//proses edit kalender akademik
	
	public function prosesedit_data_kalender_akademik(){
		$peringatan = "DATA KALENDER AKADEMIK SUKSES DIEDIT";
		$data = array(
	   'id_ta' => $this->input->post('id_ta'),
	   'kegiatan' => $this->input->post('kegiatan'),
	   'tanggal' => $this->input->post('tanggal')
	   );

		$this->db->where('id',$this->input->post('id'));
		$edit = $this->db->update('t_kalender_akademik',$data);
		return $edit; 
		$this->session->set_userdata("msg", $peringatan);
	}

	//hapus kalender akademik
	function hapus_data_kalender_akademik(){
		$peringatan = "DATA KALENDER AKADEMIK SUKSES DI HAPUS";
		$id = $this->uri->segment(3);
		$this->db->delete('t_kalender_akademik',array('id' => $id));
		$this->session->set_userdata("msg", $peringatan);
	}


	/* -------------------------------------------- END DATA KALENDER AKADEMIK ------------------------------------------------- */




	/* -------------------------------------------- DATA STAFF AKADEMIK ------------------------------------------------- */

	// data bahan kuliah
	public function data_staff_akademik(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/data_staff_akademik/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_user');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_user.nama LIKE '%$cari%' AND";

	}else{
		$src = "";
	}
	$data = $this->db->query("SELECT * FROM t_user WHERE $src id_user = id_user AND tipe = 'akademik' order by id_user DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input bahan kuliah
	public function prosesinput_data_staff_akademik(){
	$tanggal_lahir = $this->input->post('tanggal_lahir');
	$bulan_lahir = $this->input->post('bulan_lahir');
	$tahun_lahir = $this->input->post('tahun_lahir');
	$data_tahun = $tempat_lahir.",".$tanggal_lahir."-".$bulan_lahir."-".$tahun_lahir;

	$config['upload_path'] = "./assets/images/"; //lokasi folder yang akan digunakan untuk menyimpan file
	$config['allowed_types'] = 'gif|jpg|png|JPEG'; //extension yang diperbolehkan untuk diupload
	$config['file_name'] = url_title($this->input->post('userfile'));	
	$this->load->library('upload', $config);
	$this->upload->do_upload();
	$peringatan = "DATA STAFF SUKSES DI INPUT !";



	$data = array(
	   'id_user' => '',
	   'nip' => $this->input->post('nip'),
	   'nama' => $this->input->post('nama'),
	   'alamat' => $this->input->post('alamat'),
	   'foto' => $this->upload->file_name,
	   'no_telp' => $this->input->post('no_telp'),
	   'gelar' => $this->input->post('gelar'),	   
	   'tempat_lahir' => $this->input->post('tempat_lahir'),	   
	   'tgl_lahir' => $data_tahun,
	   'username' => $this->input->post('username'),
	   'password' => md5($this->input->post('password')),
	   'tipe' =>$this->input->post('tipe'),
	   'level' =>$this->input->post('level')
	   );

	$this->db->insert('t_user', $data); 
	$this->session->set_userdata("msg", $peringatan);

	}

	function edit_data_staff_akademik(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_user WHERE id_user =".$id);
		return $data->result_array();
	}
	//proses edit dosen
	
	public function prosesedit_data_staff_akademik(){
		$data = array();
		$foto_upload = $this->input->post('userfile');
		$foto_db = $this->input->post("foto");

		if($_FILES['userfile']['name']){
			$config['upload_path'] = "./assets/images/"; //lokasi folder yang akan digunakan untuk menyimpan file
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; //extension yang diperbolehkan untuk diupload
			$config['file_name'] = url_title($this->input->post('userfile'));	
			$this->load->library('upload', $config);
			$this->upload->do_upload();

			if($foto_db != 0 or $foto_db != ""){
				unlink("assets/images/".$foto_db);
			}
			
			$data += array(
				'foto' => $this->upload->file_name
				);
		}
		$data += array(
			'foto' => $foto_db,
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'gelar' => $this->input->post('gelar'),	   
			'tempat_lahir' => $this->input->post('tempat_lahir'),	   
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'username' => $this->input->post('username'),
			'level' =>$this->input->post('level')

	);
		$this->db->where('id_user',$this->input->post('id_user'));
		$edit = $this->db->update('t_user',$data);
		return $edit; 

	}

	//hapus mata kuliah
	function hapus_data_staff_akademik(){
		$peringatan ="DATA STAFF SUKSES DI HAPUS..";
		$uri4 = $this->uri->segment(4);
		if($uri4 != "" ){
			$urlgambar = $uri4;
			unlink("assets/images/".$urlgambar);			
		}

		$id = $this->uri->segment(3);
		$this->db->delete('t_user',array('id_user' => $id));
		$this->session->set_userdata("msg", $peringatan);
	}


	/* -------------------------------------------- END DATA STAFF AKADEMIK ------------------------------------------------- */

	/* -------------------------------------------- DATA STAFF KEUANGAN ------------------------------------------------- */

	// data bahan kuliah
	public function data_staff_keuangan(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/data_staff_keuangan/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_user');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_user.nama LIKE '%$cari%' AND";

	}else{
		$src = "";
	}
	$data = $this->db->query("SELECT * FROM t_user WHERE $src id_user = id_user AND tipe = 'keuangan' order by id_user DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input bahan kuliah
	public function prosesinput_data_staff_keuangan(){
	$tanggal_lahir = $this->input->post('tanggal_lahir');
	$bulan_lahir = $this->input->post('bulan_lahir');
	$tahun_lahir = $this->input->post('tahun_lahir');
	$data_tahun = $tempat_lahir.",".$tanggal_lahir."-".$bulan_lahir."-".$tahun_lahir;

	$config['upload_path'] = "./assets/images/"; //lokasi folder yang akan digunakan untuk menyimpan file
	$config['allowed_types'] = 'gif|jpg|png|JPEG'; //extension yang diperbolehkan untuk diupload
	$config['file_name'] = url_title($this->input->post('userfile'));	
	$this->load->library('upload', $config);
	$this->upload->do_upload();
	$peringatan = "DATA STAFF SUKSES DI INPUT !";



	$data = array(
	   'id_user' => '',
	   'nip' => $this->input->post('nip'),
	   'nama' => $this->input->post('nama'),
	   'alamat' => $this->input->post('alamat'),
	   'foto' => $this->upload->file_name,
	   'no_telp' => $this->input->post('no_telp'),
	   'gelar' => $this->input->post('gelar'),	   
	   'tempat_lahir' => $this->input->post('tempat_lahir'),	   
	   'tgl_lahir' => $data_tahun,
	   'username' => $this->input->post('username'),
	   'password' => md5($this->input->post('password')),
	   'tipe' =>$this->input->post('tipe'),
	   'level' =>$this->input->post('level')
	   );

	$this->db->insert('t_user', $data); 
	$this->session->set_userdata("msg", $peringatan);

	}

	function edit_data_staff_keuangan(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_user WHERE id_user =".$id);
		return $data->result_array();
	}
	//proses edit dosen
	
	public function prosesedit_data_staff_keuangan(){
		$data = array();
		$foto_upload = $this->input->post('userfile');
		$foto_db = $this->input->post("foto");

		if($_FILES['userfile']['name']){
			$config['upload_path'] = "./assets/images/"; //lokasi folder yang akan digunakan untuk menyimpan file
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; //extension yang diperbolehkan untuk diupload
			$config['file_name'] = url_title($this->input->post('userfile'));	
			$this->load->library('upload', $config);
			$this->upload->do_upload();

			if($foto_db != 0 or $foto_db != ""){
				unlink("assets/images/".$foto_db);
			}
			
			$data += array(
				'foto' => $this->upload->file_name
				);
		}
		$data += array(
			'foto' => $foto_db,
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'gelar' => $this->input->post('gelar'),	   
			'tempat_lahir' => $this->input->post('tempat_lahir'),	   
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'username' => $this->input->post('username'),
			'level' =>$this->input->post('level')

	);
		$this->db->where('id_user',$this->input->post('id_user'));
		$edit = $this->db->update('t_user',$data);
		return $edit; 

	}

	//hapus mata kuliah
	function hapus_data_staff_keuangan(){
		$peringatan ="DATA STAFF SUKSES DI HAPUS..";
		$uri4 = $this->uri->segment(4);
		if($uri4 != "" ){
			$urlgambar = $uri4;
			unlink("assets/images/".$urlgambar);			
		}

		$id = $this->uri->segment(3);
		$this->db->delete('t_user',array('id_user' => $id));
		$this->session->set_userdata("msg", $peringatan);
	}


	/* -------------------------------------------- END DATA STAFF KEUANGAN ------------------------------------------------- */


	/* -------------------------------------------- DATA STAFF JURUSAN ------------------------------------------------- */

	// data bahan kuliah
	public function data_staff_jurusan(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/data_staff_jurusan/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_user');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_user.nama LIKE '%$cari%' AND";

	}else{
		$src = "";
	}
	$data = $this->db->query("SELECT * FROM t_user WHERE $src id_user = id_user AND tipe = 'jurusan' order by id_user DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input bahan kuliah
	public function prosesinput_data_staff_jurusan(){
	$tanggal_lahir = $this->input->post('tanggal_lahir');
	$bulan_lahir = $this->input->post('bulan_lahir');
	$tahun_lahir = $this->input->post('tahun_lahir');
	$data_tahun = $tempat_lahir.",".$tanggal_lahir."-".$bulan_lahir."-".$tahun_lahir;

	$config['upload_path'] = "./assets/images/"; //lokasi folder yang akan digunakan untuk menyimpan file
	$config['allowed_types'] = 'gif|jpg|png|JPEG'; //extension yang diperbolehkan untuk diupload
	$config['file_name'] = url_title($this->input->post('userfile'));	
	$this->load->library('upload', $config);
	$this->upload->do_upload();
	$peringatan = "DATA STAFF SUKSES DI INPUT !";



	$data = array(
	   'id_user' => '',
	   'nip' => $this->input->post('nip'),
	   'nama' => $this->input->post('nama'),
	   'alamat' => $this->input->post('alamat'),
	   'foto' => $this->upload->file_name,
	   'no_telp' => $this->input->post('no_telp'),
	   'gelar' => $this->input->post('gelar'),	   
	   'tempat_lahir' => $this->input->post('tempat_lahir'),	   
	   'tgl_lahir' => $data_tahun,
	   'username' => $this->input->post('username'),
	   'password' => md5($this->input->post('password')),
	   'tipe' =>$this->input->post('tipe'),
	   'level' =>$this->input->post('level')
	   );

	$this->db->insert('t_user', $data); 
	$this->session->set_userdata("msg", $peringatan);

	}

	function edit_data_staff_jurusan(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_user WHERE id_user =".$id);
		return $data->result_array();
	}
	//proses edit dosen
	
	public function prosesedit_data_staff_jurusan(){
		$data = array();
		$foto_upload = $this->input->post('userfile');
		$foto_db = $this->input->post("foto");

		if($_FILES['userfile']['name']){
			$config['upload_path'] = "./assets/images/"; //lokasi folder yang akan digunakan untuk menyimpan file
			$config['allowed_types'] = 'gif|jpg|png|JPEG'; //extension yang diperbolehkan untuk diupload
			$config['file_name'] = url_title($this->input->post('userfile'));	
			$this->load->library('upload', $config);
			$this->upload->do_upload();

			if($foto_db != 0 or $foto_db != ""){
				unlink("assets/images/".$foto_db);
			}
			
			$data += array(
				'foto' => $this->upload->file_name
				);
		}
		$data += array(
			'foto' => $foto_db,
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'gelar' => $this->input->post('gelar'),	   
			'tempat_lahir' => $this->input->post('tempat_lahir'),	   
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'username' => $this->input->post('username'),
			'level' =>$this->input->post('level')

	);
		$this->db->where('id_user',$this->input->post('id_user'));
		$edit = $this->db->update('t_user',$data);
		return $edit; 

	}

	//hapus mata kuliah
	function hapus_data_staff_jurusan(){
		$peringatan ="DATA STAFF SUKSES DI HAPUS..";
		$uri4 = $this->uri->segment(4);
		if($uri4 != "" ){
			$urlgambar = $uri4;
			unlink("assets/images/".$urlgambar);			
		}

		$id = $this->uri->segment(3);
		$this->db->delete('t_user',array('id_user' => $id));
		$this->session->set_userdata("msg", $peringatan);
	}


	/* -------------------------------------------- END DATA STAFF JURUSAN ------------------------------------------------- */

	/* PASSWORD AKADEMIK */
	public function prosesedit_password_akademik(){
		$data = array(
			'password' => md5($this->input->post('password'))
	);
		$this->db->where('id_user',$this->input->post('id_user'));
		$edit = $this->db->update('t_user',$data);
		return $edit;
	}

	/* PASSWORD MAHASISWA */
	public function prosesedit_password_mahasiswa(){
		$data = array(
			'password' => md5($this->input->post('password'))
	);
		$this->db->where('id_mahasiswa',$this->input->post('id_mahasiswa'));
		$edit = $this->db->update('t_mahasiswa',$data);
		return $edit;
	}

	/* PASSWORD KEUANGAN */
	public function prosesedit_password_keuangan(){
		$data = array(
			'password' => md5($this->input->post('password'))
	);
		$this->db->where('id_user',$this->input->post('id_user'));
		$edit = $this->db->update('t_user',$data);
		return $edit;
	}

	/* PASSWORD JURUSAN */
	public function prosesedit_password_jurusan(){
		$data = array(
			'password' => md5($this->input->post('password'))
	);
		$this->db->where('id_user',$this->input->post('id_user'));
		$edit = $this->db->update('t_user',$data);
		return $edit;
	}

	/* PASSWORD DOSEN */
	public function prosesedit_password_dosen(){
		$data = array(
			'password_simak' => md5($this->input->post('password_simak'))
	);
		$this->db->where('id_dosen',$this->input->post('id_dosen'));
		$edit = $this->db->update('t_dosen',$data);
		return $edit;
	}
	
	
	/* ======================================== MATA KULIAH =================================== */
	// data mata kuliah
	public function data_mata_kuliah(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}

		$result = $this->db->query("SELECT t_mk.id_mk,t_mk.kode_mk,t_mk.nama_mk,t_mk.jumlah_sks,t_mk.sks_teori,t_mk.sks_praktek,t_mk.semester,t_mk.pengisian_nilai,t_mk.status,t_mk.flag,t_mk.id_mk_prasarat,t_mk.id_mk_prak,t_mk.is_pratikum,t_mk.id_mk,t_prodi.id_prodi,t_prodi.prodi FROM t_mk INNER JOIN t_prodi ON t_mk.id_prodi=t_prodi.id_prodi WHERE semester != '1' AND semester != '2'");
        $num_resluts = $result->num_rows();
		$config['base_url'] = base_url()."c_index_aka/data_mata_kuliah/";
		$config['per_page'] = 10;
		$config['total_rows'] = $num_resluts;
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "nama_mk LIKE '%$cari%'";

	}else{
		$src = "semester != '1' AND semester != '2'";
	}
	$data = $this->db->query("SELECT t_mk.id_mk,t_mk.kode_mk,t_mk.nama_mk,t_mk.jumlah_sks,t_mk.sks_teori,t_mk.sks_praktek,t_mk.semester,t_mk.pengisian_nilai,t_mk.status,t_mk.flag,t_mk.id_mk_prasarat,t_mk.id_mk_prak,t_mk.is_pratikum,t_mk.id_mk,t_prodi.id_prodi,t_prodi.prodi FROM t_mk INNER JOIN t_prodi ON t_mk.id_prodi=t_prodi.id_prodi WHERE $src order by id_mk DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	// data mata kuliah
	public function data_mata_kuliah_2(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."p_jurusan/data_mata_kuliah/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_mk');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_mk.nama_mk LIKE '%$cari%' AND";

	}else{
		$src = "";
	}
	$data = $this->db->query("SELECT * FROM t_mk WHERE $src id_mk = id_mk order by id_mk DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input mata kuliah
	public function prosesinput_mata_kuliah(){
		$peringatan = "Input Mata Kuliah Berhasil !";
		$kode_mk = $this->input->post('kode_mk');
		$esc_kode = str_replace(" ", ".", $kode_mk);
	$data = array(
	   'id_mk' => $this->input->post('id_mk'),
	   'kode_mk' => $esc_kode,
	   'nama_mk' => $this->input->post('nama_mk'),
	   'jumlah_sks' => $this->input->post('jumlah_sks'),
	   'sks_teori' => $this->input->post('sks_teori'),
	   'sks_praktek' => $this->input->post('sks_praktek'),
	   'semester' => $this->input->post('semester'),
	   'pengisian_nilai' => 'ditutup',
	   'is_pratikum' => $this->input->post('is_pratikum'),
	   'status' => $this->input->post('status'),
	   'id_prodi' => $this->input->post('id_prodi'),
	   'id_mk_prasarat' => $this->input->post('id_mk_prasarat')
	   );

	$this->db->insert('t_mk', $data); 
	$this->session->set_userdata("msg", $peringatan);

	}

	//edit mata kuliah
	function edit_mata_kuliah(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_mk WHERE id_mk =".$id);
		return $data->result_array();
	}

	//proses edit mata kuliah
	public function prosesedit_mata_kuliah(){

		$data = array(
		'id_mk' => $this->input->post('id_mk'),	   
	   'kode_mk' => $this->input->post('kode_mk'),
	   'nama_mk' => $this->input->post('nama_mk'),
	   'jumlah_sks' => $this->input->post('jumlah_sks'),
	   'sks_teori' => $this->input->post('sks_teori'),
	   'sks_praktek' => $this->input->post('sks_praktek'),
	   'semester' => $this->input->post('semester'),
	   'pengisian_nilai' => 'ditutup',
	   'is_pratikum' => $this->input->post('is_pratikum'),
	   'status' => $this->input->post('status'),
	   'id_prodi' => $this->input->post('id_prodi'),
	   'id_mk_prasarat' => $this->input->post('id_mk_prasarat')

	);
		$this->session->set_userdata("msg_success","<strong><i class='icon-ok'></i> Berhasil Edit </strong>Data Mata Kuliah <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		$this->db->where('id_mk',$this->input->post('id_mk'));
		$edit = $this->db->update('t_mk',$data);
		return $edit; 

	}

	//hapus mata kuliah
	function hapus_mata_kuliah(){
		$id = $this->uri->segment(3);
		$this->db->delete('t_mk',array('id_mk' => $id));
	}

	/*===================================== end mata kuliah ==================== */


	/* ======================================== TAHUN AJARAN =================================== */
	// data mata kuliah
	public function data_tahun_ajaran(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/data_tahun_ajaran/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_tahun_akademik');
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

	/*if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_mk.nama_mk LIKE '%$cari%' AND";

	}else{
		$src = "";
	}*/
	$data = $this->db->query("SELECT * FROM t_tahun_akademik WHERE id = id order by id DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input mata kuliah
	public function prosesinput_tahun_ajaran(){
	$peringatan = "Input Tahun Ajaran Berhasil !";
	$data = array(
	   'id' => '',
	   'tahun_akademik' => $this->input->post('tahun_akademik'),
	   'current' => $this->input->post('current')
	   );

	$this->db->update('t_tahun_akademik', array('current' => 'Tidak'), array('current' => 'Ya'));
	$this->db->insert('t_tahun_akademik', $data); 
	$this->session->set_userdata("msg", $peringatan);
	}

	//edit mata kuliah
	function edit_tahun_ajaran(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_tahun_akademik WHERE id =".$id);
		return $data->result_array();
	}

	//proses edit mata kuliah
	public function prosesedit_tahun_ajaran(){

		$data = array(
	   'tahun_akademik' => $this->input->post('tahun_akademik'),
	   'current' => $this->input->post('current')

	);
		$this->db->update('t_tahun_akademik', array('current' => 'Tidak'), array('current' => 'Ya'));
		$this->db->where('id',$this->input->post('id'));
		$edit = $this->db->update('t_tahun_akademik',$data);
		return $edit; 

	}

	//hapus mata kuliah
	function hapus_tahun_ajaran(){
		$id = $this->uri->segment(3);
		$this->db->delete('t_tahun_akademik',array('id' => $id));
	}

	/*===================================== END TAHUN AJARAN ==================== */



	/* ========================================  BAHAN KULIAH =================================== */
	// data bahan kuliah
	public function data_bahan_kuliah(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/data_bahan_kuliah/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_download_mk');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_download_mk.nama LIKE '%$cari%' AND";

	}else{
		$src = "";
	}
	$data = $this->db->query("SELECT * FROM t_download_mk, t_mk WHERE $src t_download_mk.id_mk = t_mk.id_mk order by t_download_mk.id_mk DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input bahan kuliah
	public function prosesinput_bahan_kuliah(){
	$config['upload_path'] = "./assets/file/"; //lokasi folder yang akan digunakan untuk menyimpan file
	$config['allowed_types'] = 'zip|rar|html|pdf|docx|doc|text|html|txt|xls|ppt'; //extension yang diperbolehkan untuk diupload
	$config['file_name'] = url_title($this->input->post('userfile'));	
	$this->load->library('upload', $config);
	$this->upload->do_upload();
	$peringatan = "Bahan Kuliah Sukses Diinput !";



	$data = array(
	   'id' => '',
	   'id_mk' => $this->input->post('id_mk'),
	   'nama' => $this->input->post('nama'),
	   'keterangan' => $this->input->post('keterangan'),
	   'path' => $this->upload->file_name,
	   'is_tampil' => $this->input->post('is_tampil')
	   );

	$this->db->insert('t_download_mk', $data); 
	$this->session->set_userdata("msg", $peringatan);

	}

	/*//edit bahan kuliah
	function edit_bahan_kuliah(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_tahun_akademik WHERE id =".$id);
		return $data->result_array();
	}

	//proses edit mata kuliah
	public function prosesedit_bahan_kuliah(){

		$data = array(
	   'tahun_akademik' => $this->input->post('tahun_akademik'),
	   'current' => $this->input->post('current')

	);
		$this->db->where('id',$this->input->post('id'));
		$edit = $this->db->update('t_tahun_akademik',$data);
		return $edit; 

	}
	*/
	//hapus bahan kuliah
	function hapus_bahan_kuliah(){
		$id = $this->uri->segment(3);
		$path = $this->uri->segment(4);
		unlink("assets/file/".$path);
		$this->db->delete('t_download_mk',array('id' => $id));
		redirect('c_index_aka/data_bahan_kuliah');
	}

	/*===================================== END BAHAN KULIAH ==================== */



	/* ========================================  JADWAL KULIAH =================================== */
	// data mata kuliah
	public function data_jadwal_kuliah(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/data_jadwal_kuliah/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_download_jadwal');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_download_jadwal.path LIKE '%$cari%' AND";

	}else{
		$data =$this->db->query("SELECT * FROM t_download_jadwal WHERE id = id order by id DESC limit $offset,$num");
		return $data->result_array();
	}
	$data = $this->db->query("SELECT * FROM t_download_jadwal WHERE $src id = id order by id DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	// data mata kuliah
	public function data_jadwal_kuliah_2(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."p_jurusan/data_jadwal_kuliah/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_download_jadwal');
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

	if($this->input->post('submit')){
	$cari = $this->input->post('src');
	$src = "t_download_jadwal.path LIKE '%$cari%' AND";

	}else{
		$data =$this->db->query("SELECT * FROM t_download_jadwal WHERE id = id order by id DESC limit $offset,$num");
		return $data->result_array();
	}
	$data = $this->db->query("SELECT * FROM t_download_jadwal WHERE $src id = id order by id DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input jadwal kuliah
	public function prosesinput_jadwal_kuliah(){
		$config['upload_path'] = "./assets/file/"; //lokasi folder yang akan digunakan untuk menyimpan file
		$config['allowed_types'] = 'zip|rar|html|pdf|docx|doc|text|html|txt|xls|ppt'; //extension yang diperbolehkan untuk diupload
		$config['file_name'] = url_title($this->input->post('userfile'));	
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$peringatan = "Jadwal Sukses Diinput";

	$data = array(
	   'id' => '',
	   'tingkat' => $this->input->post('tingkat'),
	   'keterangan' => $this->input->post('keterangan'),
	   'path' => $this->upload->file_name,
	   'tahun_ajaran' => $this->input->post('tahun_ajaran')
	   );

	$this->db->insert('t_download_jadwal', $data); 
	$this->session->set_userdata("msg", $peringatan);
	}

	/*//edit mata kuliah
	function edit_bahan_kuliah(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_tahun_akademik WHERE id =".$id);
		return $data->result_array();
	}

	//proses edit mata kuliah
	public function prosesedit_bahan_kuliah(){

		$data = array(
	   'tahun_akademik' => $this->input->post('tahun_akademik'),
	   'current' => $this->input->post('current')

	);
		$this->db->where('id',$this->input->post('id'));
		$edit = $this->db->update('t_tahun_akademik',$data);
		return $edit; 

	}
	*/
	//hapus mata kuliah
	function hapus_jadwal_kuliah(){
		$path = $this->uri->segment(4);
		unlink("assets/file/".$path);
		$id = $this->uri->segment(3);
		$this->db->delete('t_download_jadwal', array('id' => $id));
	}

	/*===================================== END JADWAL KULIAH ==================== */


	/* ========================================  pengumuman akademik KULIAH =================================== */
	// data mata kuliah
	public function data_pengumuman_akademik(){
		$config['base_url'] = '<?php echo base_url();?>c_index_aka/data_pengumuman_akademik';
		$offset = $this->uri->segment(3);
		if(empty($offset))
		{
			$offset = 0;
		}
		$config['total_rows'] = $this->db->count_all('t_pengumuman_akademik');
		$config['per_page'] = 10;
		$config['prev_link'] = "<div id='pref'><<</div>";
		$config['next_link'] = "<div id='next'>>></div>";
		$this->pagination->initialize($config);
		$num = $config['per_page'];

	if($this->input->post('src')){
	$cari = $this->input->post('nama');
	$src = "WHERE nama LIKE '%$cari%'";

	}else{
		$src = "";
	}
	$data = $this->db->query("SELECT * FROM t_pengumuman_akademik $src order by id DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //
	}


	//proses input mata kuliah
	public function prosesinput_pengumuman_akademik(){
	$config['upload_path'] = "./assets/file/"; //lokasi folder yang akan digunakan untuk menyimpan file
	$config['allowed_types'] = 'zip|rar|html|pdf|docx|doc|text|html|txt|xls|ppt'; //extension yang diperbolehkan untuk diupload
	$config['file_name'] = url_title($this->input->post('userfile'));
	$this->load->library('upload', $config);
	$this->upload->do_upload();


	$data = array(
	   'id' => '',
	   'nama' => $this->input->post('nama'),
	   'keterangan' => $this->input->post('keterangan'),
	   'path' => $this->upload->file_name,
	   'tgl_buat' => $this->input->post('tgl_buat')
	   );

	$this->db->insert('t_pengumuman_akademik', $data); 
	
	}

	/*//edit mata kuliah
	function edit_bahan_kuliah(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_tahun_akademik WHERE id =".$id);
		return $data->result_array();
	}

	//proses edit mata kuliah
	public function prosesedit_bahan_kuliah(){

		$data = array(
	   'tahun_akademik' => $this->input->post('tahun_akademik'),
	   'current' => $this->input->post('current')

	);
		$this->db->where('id',$this->input->post('id'));
		$edit = $this->db->update('t_tahun_akademik',$data);
		return $edit; 

	}
	*/
	//hapus mata kuliah
	function hapus_pengumuman_akademik(){
		$id = $this->uri->segment(3);
		$path = $this->uri->segment(4);
		unlink("assets/file/".$path);
		$this->db->delete('t_pengumuman_akademik',array('id' => $id));
		redirect('c_index_aka/data_pengumuman_akademik');
	}

	/*===================================== END PENGUMUMAN AKADEMIK ==================== */
	
	
/*===================================== PENGISIAN FRS ==================== */
	function cari_nim(){
		//Pagination		
			$status= $this->session->userdata('status');
			$src=$this->session->userdata('src');
			$submit = $this->input->post('submit');
		if($status == "aktif"){//jika tombol search dicari
			$config['total_rows']=$this->db->query("SELECT * FROM t_dump,t_mahasiswa WHERE t_dump.nim=t_mahasiswa.nim AND t_dump.nim LIKE '%$nim%'")->num_rows();					
			$config['base_url']=base_url().'c_index_aka/cari_nim/'.$src.'/';			
			$config['uri_segment']=4;
			$uri3=$this->uri->segment(4);
			$config['per_page']=$config['total_rows']+10;			
		}else{
			$config['total_rows'] =$this->db->query("SELECT * FROM t_dump,t_mahasiswa WHERE t_dump.nim=t_mahasiswa.nim")->num_rows();			
			$config['base_url'] = base_url()."c_index_aka/cari_nim/";
			$uri3=$this->uri->segment(3);
			$config['uri_segment']=3;
			$config['per_page']='10';
		}	
			if(empty($uri3)){
					$uri3=0;
			}
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
			$page=$config['per_page'];
			$this->pagination->initialize($config);		
			$pencarian = $this->input->post("parameter_pencarian");
			$prodi = $this->input->post('program_studi');
			if($status == "aktif"){
			if($pencarian){
				$d_mahasiswa = $src;
				$parameter = $this->input->post("parameter");
				if($parameter == "nim"){
					$w_parameter = "b.nim LIKE '%$d_mahasiswa%' AND";
					$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Data dengan NIM '$d_mahasiswa' tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";
				}
				if($parameter == "mahasiswa"){
					$w_parameter = "b.nama LIKE '%$d_mahasiswa%' AND ";
									$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Data dengan nama mahasiswa '$d_mahasiswa' tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";				
				}
				if($parameter == "angkatan"){
					$w_parameter = "b.angkatan LIKE '$d_mahasiswa%' AND program_studi = '$prodi' AND ";
									$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Data angkatan '$d_mahasiswa' tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";								
				}
			}
		}else{
				$w_parameter = "";				
			}			
			$query = $this->db->query("SELECT * FROM t_dump as a,t_mahasiswa as b WHERE $w_parameter a.nim = b.nim AND b.nim = b.nim order by b.nama ASC limit $uri3,$page");
			$print =$query->result()
			;
			if($query->num_rows() < 1){
				$this->session->set_userdata('msg_error',$peringatan);
			}
			return $print;	
	}
	public function frs($nim=0){
			$query_frs = $this->db->query("SELECT a.id_mk as id_mk,f.nama_kelas as nama_kelas,a.semester as smt, a.jumlah_sks as jumlah_sks,d.kuota as isi,b.nim as nim_b,d.id as id_e,a.nama_mk as nama_mk_a,d.kode_mk as kode_mk_d,a.kode_mk as kode_mk_a,d.id as id_kuota FROM t_mk as a,t_dump as b,t_mahasiswa as c,t_kuota_matkul_pilihan as d, t_kelas as f WHERE b.nim=c.nim AND c.nim='$nim' AND a.kode_mk=d.kode_mk AND d.id_kelas = f.id_kelas");
			if($query_frs->num_rows() <= 1){	
				$this->session->set_userdata('frs','Maaf data anda tidak ada');
			}
			return $query_frs;
	}
	public function frs_id($id_frs){
		$query = $this->db->query("SELECT *,b.nim as nim_b,b.id as id_b,e.id as id_e,b.nim as nim_b,e.id as id_e,a.nama_mk as nama_mk_a,d.kode_mk as kode_mk_d,a.kode_mk as kode_mk_a,e.id_kuota FROM t_mk as a,t_dump as b,t_mahasiswa as c,t_kuota_matkul_pilihan as d, t_detail_kuota_matkul as e WHERE a.semester=b.smt AND b.nim=c.nim AND a.kode_mk=d.kode_mk AND e.id_kuota=d.id AND e.id='$id_frs'");
		return $query->row();
	}
	public function frs_data_id($nim){
		return $query = $this->db->query("SELECT a.nim as nim_a,b.nama as nama_mhs,a.smt,a.sks,b.id_mahasiswa as id_mhs FROM t_dump as a,t_mahasiswa as b WHERE a.nim=b.nim AND a.nim='$nim'");
	}
/*===Menyimpan FRS===*/
	public function simpan_frs($dataSession){			
		$nim = $this->input->post('nim');
		$data_detail_2 = array();
		$data_detail_5= array();
		if($this->input->post('id_detail_kuota') == ''){
				$this->session->set_userdata('msgError',"Maaf anda harus pilih Mata kuliah terlebih dahulu");
				$this->session->unset_userdata($dataSession);
				redirect("c_index_aka/frs/$nim");	
		}else{
		$id_detail_kuota = $this->input->post('id_detail_kuota');
		$jml_id = count($id_detail_kuota);
		$id_de = $this->session->userdata('id_detail_kuota');
		$nim_ambil = $this->session->userdata('nim');				
		$id_mhs = $this->session->userdata('id_mhs');	
		$semester = $this->session->userdata('semester');				
		$jumlah_sks = $this->session->userdata('jumlah_sks');
		$sks_mhs = $this->input->post('sks_mhs');			
		$jumlah_pilih = array();
		$id_mk = $this->session->userdata('id_mk');	
		$jumlah_pilih_frs = array();
		$jumlah_sks_array = array();
		$jumlah_kuota_array = array();			
					for($i=0;$i< $jml_id;$i++){	
					$id_det = $id_detail_kuota[$i];		
					$id_det = $id_de[$i];
					
					$id_mk2 = $id_mk[$i];
					$ml = $this->db->query("SELECT * FROM t_detail_frs WHERE id_mhs = '$id_mhs' AND id_detail_kuota = '$id_det' AND semester = '$semester'")->num_rows();									
					$jumlah_pilih += array($l=$ml);
					$jumlah_pilih_hasil = array_sum($jumlah_pilih);
					$cek_sql_frs = $jumlah_pilih_hasil;
						$id_detail_kuota_c = $this->input->post('id_detail_kuota');
							$jml_id_w = count($id_detail_kuota_c);						
					for($w=0;$w< $jml_id_w;$w++){
						$id_kuota = $id_de[$w];
						$get_kode_5 = $this->db->query("SELECT * FROM t_kuota_matkul_pilihan WHERE id ='$id_kuota'")->row();
						$kode_get_5 = $get_kode_5->kode_mk;
						$get_sks_5 = $this->db->query("SELECT * FROM t_mk WHERE kode_mk='$kode_get_5'")->row();
						$get_row_5 = $get_sks_5->jumlah_sks;						
						$data_detail_5 += array($w=>$get_row_5);			
						$sks_full_2 = array_sum($data_detail_5);
					}
						$hasil_cek_sks = $sks_mhs - $sks_full_2;
					if($cek_sql_frs == 1){
						$this->session->unset_userdata($dataSession);
						$this->session->set_userdata('msgError',"Maaf, Ada mata kuliah yang sudah diambil");
						redirect("c_index_aka/frs/$nim");
						}
					if($cek_sql_frs == 0){
						if($hasil_cek_sks >=0){
							//kalaw pas jumlah sks baru bisa diinput
							$kode_mk = $this->session->userdata('kode_mk');
							$id_detail_kuota_b = $this->input->post('id_detail_kuota');
							$jml_id_b = count($id_detail_kuota_b);
							$input_nilai = array();													
						for($m=0;$m< $jml_id_b;$m++){
							$id_de_array = $id_de[$m];
							$sql_ambil_kode = $this->db->query("SELECT * FROM t_kuota_matkul_pilihan WHERE id = '$id_de_array'")->row();
							$get_kode = $sql_ambil_kode->kode_mk;							
						$data_nilai = array(
							'id_mahasiswa' => $id_mhs,
							'id_mk'=> $get_kode,
							'ulang_mk'=>"tidak"
							);
						$this->db->insert("t_nilai", $data_nilai);
						$query_nilai = $this->db->query("SELECT id_nilai FROM t_nilai WHERE id_mk = '$get_kode' AND id_mahasiswa = '$id_mhs'");
						$d_nilai = $query_nilai->result_array();
						foreach($d_nilai as $d_nilai){
							$id_nilai_table = $d_nilai['id_nilai'];
							$input_nilai[] = $id_nilai_table;
						}

						//Ambil tahun akademik
						$tahun_aka = $this->db->query("SELECT * FROM t_tahun_akademik WHERE current = 'Ya'");
						$data_tahun_aka = $tahun_aka->row_array();
							$data_frs = array();
							$input_nilai2 =$input_nilai[$m];
							$data_frs += array(
								'id_detail_kuota'=>$id_de_array,
								'id_mhs'=>$id_mhs,
								'id_nilai'=>$input_nilai2,
								'id_mk'=>$get_kode,
								'tahun_akademik' => $data_tahun_aka['tahun_akademik'],								
								'semester'=>$semester,
								'status_ambil'=>'aktif'
							);

							$id_det = $id_detail_kuota[$m];		
							$query_isi_sks =$this->db->insert('t_detail_frs',$data_frs);						
				$get_kode_2 = $this->db->query("SELECT * FROM t_kuota_matkul_pilihan WHERE id ='$id_de_array'")->row();
				$kode_get_2 = $get_kode_2->kode_mk;
				$get_sks_2 = $this->db->query("SELECT * FROM t_mk WHERE kode_mk='$kode_get_2'")->row();
				$get_row_2 = $get_sks_2->jumlah_sks;						
				$data_detail_2 += array($m=>$get_row_2);			
				$sks_full = array_sum($data_detail_2);
							$id_data_minus = $this->db->query("SELECT * FROM t_kuota_matkul_pilihan WHERE id = '$id_det'")->row();
							$isi_data = $id_data_minus->kuota;
							$hasil_minus = $isi_data - 1;
							$data_minus = $this->db->query("UPDATE t_kuota_matkul_pilihan SET kuota='$hasil_minus' WHERE id = '$id_det'");						
						}					
					$id_dump = $this->db->query("SELECT * FROM t_dump WHERE nim = '$nim'");
					$dump = $id_dump->row();
					$sks_dump = $dump->sks;
					$frs_query = $this->input->post('nim');
						//$sks_jumlah = array_sum($mm);							
						$sks =$sks_dump - $sks_full;
						$query_dump =$this->db->query("UPDATE t_dump SET sks='$sks' WHERE nim='$nim_ambil'");
						if($sks == 0){
							$this->db->query("UPDATE t_mahasiswa SET pendaftaran='tutup',status_kuliah='Aktif' WHERE nim='$nim_ambil'");
						}
						$this->db->where('id',$nim);
							if($query_dump AND $query_isi_sks AND $data_minus){
								$this->session->set_userdata('msg_simpan','Pengambilan FRS telah berhasil.');							
								redirect("c_index_aka/cari_nim");
								$this->session->unset_userdata($dataSession);
							}								
						}else{
							//kalaw kurang alias lebbih, engga bisa terinput
							$this->session->unset_userdata($dataSession);
							$this->session->set_userdata('msgError',"Maaf SKS kurang");
							redirect("c_index_aka/frs/$nim");							
						}
					
			}
		}
		}
	}
	//DETAIL FRS
	public function detail_frs($nim=0,$smt=0){
		$get_id_mhs = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim='$nim'")->row();
		$id = $get_id_mhs->id_mahasiswa;
		$query_frs = $this->db->query("SELECT h.ulang_mk as ulang_mk,g.semester as semester_now, g.id_detail_frs as id_detail, g.tahun_akademik,a.id_mk as id_mk,f.nama_kelas as nama_kelas,b.smt as smt, a.jumlah_sks as jumlah_sks,d.kuota as kuota,b.nim as nim_b,d.id as id_e,a.nama_mk as nama_mk_a,d.kode_mk as kode_mk_d,a.kode_mk as kode_mk_a FROM t_mk as a,t_dump as b,t_mahasiswa as c,t_kuota_matkul_pilihan as d, t_kelas as f,t_detail_frs as g, t_nilai as h WHERE g.id_nilai=h.id_nilai AND b.smt='$smt' AND b.nim=c.nim AND c.nim='$nim' AND a.kode_mk=d.kode_mk AND d.id_kelas = f.id_kelas AND g.id_detail_kuota = d.id AND g.id_mhs = '$id'");		
		return $query_frs;
	}
	/* ==========================================END FRS============================= */
	/* ==========================================MANIPULASI FRS============================= */
function manipulasi_frs(){
		//Pagination		
			$status= $this->session->userdata('status');
			$src=$this->session->userdata('src');
			$submit = $this->input->post('submit');
		if($status == "aktif"){//jika tombol search dicari
			$config['total_rows']=$this->db->query("SELECT * FROM t_dump,t_mahasiswa WHERE t_dump.nim=t_mahasiswa.nim AND t_dump.nim LIKE '%$nim%'")->num_rows();					
			$config['base_url']=base_url().'c_index_aka/manipulasi_frs/'.$src.'/';			
			$config['uri_segment']=4;
			$uri3=$this->uri->segment(4);
			$config['per_page']=$config['total_rows']+10;			
		}else{
			$config['total_rows'] =$this->db->query("SELECT * FROM t_dump,t_mahasiswa WHERE t_dump.nim=t_mahasiswa.nim")->num_rows();			
			$config['base_url'] = base_url()."c_index_aka/manipulasi_frs/";
			$uri3=$this->uri->segment(3);
			$config['uri_segment']=3;
			$config['per_page']='10';
		}	
			if(empty($uri3)){
					$uri3=0;
			}
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
			$page=$config['per_page'];
			$this->pagination->initialize($config);		
			$pencarian = $this->input->post("parameter_pencarian");
			if($status == "aktif"){
			if($pencarian){
				$d_mahasiswa = $src;
				$parameter = $this->input->post("parameter");
				if($parameter == "nim"){
					$w_parameter = "b.nim LIKE '%$d_mahasiswa%' AND";
					$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Data dengan NIM '$d_mahasiswa' tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";
				}
				if($parameter == "mahasiswa"){
					$w_parameter = "b.nama LIKE '%$d_mahasiswa%' AND ";
									$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Data dengan nama mahasiswa '$d_mahasiswa' tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";				
				}
				if($parameter == "angkatan"){
					$w_parameter = "b.angkatan LIKE '$d_mahasiswa%' AND ";
									$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Data angkatan '$d_mahasiswa' tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";								
				}
			}
		}else{
				$w_parameter = "";				
			}			
			$query = $this->db->query("SELECT * FROM t_dump as a,t_mahasiswa as b WHERE $w_parameter a.nim = b.nim AND b.nim = b.nim order by b.nama ASC limit $uri3,$page");
			$print =$query->result()
			;
			if($query->num_rows() < 1){
				$this->session->set_userdata('msg_error',$peringatan);
			}
			return $print;	
	}	
public function hapus_manipulasi(){
		$uri =$this->uri->segment(3);
		$get_kode = $this->db->query("SELECT * FROM t_detail_frs WHERE id_detail_frs='$uri'")->row();
		$kode = $get_kode->id_mk;
		$id_mhs = $get_kode->id_mhs;
		$smt = $get_kode->semester;
		$get_nim = $this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa='$id_mhs'")->row();		
		$get_sks = $this->db->query("SELECT * FROM t_mk WHERE kode_mk='$kode'")->row();
		$nim = $get_nim->nim;
		$get_sks_n = $get_sks->jumlah_sks;

		//SKS MAHASISWA KEMBALI LAGI KE TABLE DUMP
		$get_sks_dump = $this->db->query("SELECT * FROM t_dump WHERE nim='$nim' AND smt='$smt'")->row();
		$get_kuota_kode = $this->db->query("SELECT * FROM t_kuota_matkul_pilihan WHERE kode_mk='$kode'")->row();
		$sks_dump = $get_sks_dump->sks;
		$kuota_kode = $get_kuota_kode->kuota;
		$tambah_kuota = $kuota_kode + 1;
		$sks = $sks_dump + $get_sks_n;
		$ins_kuota = $this->db->query("UPDATE t_kuota_matkul_pilihan SET kuota='$tambah_kuota' WHERE kode_mk='$kode'");
		$ins_dump = $this->db->query("UPDATE t_dump SET sks='$sks' WHERE nim='$nim' AND smt='$smt'");
		$print = $this->db->delete('t_detail_frs',array('id_detail_frs' => $uri));
		//delete nilai
		$print2 = $this->db->delete('t_nilai',array('id_mk' => $kode));
		if($ins_dump AND $ins_kuota){
			if($print AND $print2){
				$this->session->set_userdata('msg','Kuota mata Kuliah berhasil dihapus.');
				redirect("c_index_aka/detail_manipulasi/$nim/$smt");
			}else{
				$this->session->set_userdata('msg_error','Coba kembali');
				redirect("c_index_aka/detail_manipulasi/$nim/$smt");
			}
		}
		return $print;
	}	public function l_edit_manipulasi($nim){
			$query_frs = $this->db->query("SELECT a.id_mk as id_mk,f.nama_kelas as nama_kelas,a.semester as smt, a.jumlah_sks as jumlah_sks,d.kuota as isi,b.nim as nim_b,d.id as id_e,a.nama_mk as nama_mk_a,d.kode_mk as kode_mk_d,a.kode_mk as kode_mk_a,d.id as id_kuota FROM t_mk as a,t_dump as b,t_mahasiswa as c,t_kuota_matkul_pilihan as d, t_kelas as f WHERE b.nim=c.nim AND c.nim='$nim' AND a.kode_mk=d.kode_mk AND d.id_kelas = f.id_kelas");
			if($query_frs->num_rows() <= 1){	
				$this->session->set_userdata('frs','Maaf data anda tidak ada');
			}
			return $query_frs;	}
	public function p_edit_manipulasi(){
		$id_detail = $this->uri->segment(3);
		$id_kuota = $this->uri->segment(4);
		$nim = $this->uri->segment(5);
		$smt = $this->uri->segment(6);
		$get_kode_mk_last = $this->db->query("SELECT * FROM t_detail_frs WHERE id_detail_frs='$id_detail'")->row();
		$kode_mk_last = $get_kode_mk_last->id_mk;
		$mhs = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim='$nim'")->row();					
		$id_mhs = $mhs->id_mahasiswa;
    	$get_kode = $this->db->query("SELECT * FROM t_kuota_matkul_pilihan WHERE id='$id_kuota'")->row();
    	$kode_mk = $get_kode->kode_mk;
    	$id_detail_kuota = $get_kode->id;
    	$get_id_nilai = $this->db->query("SELECT * FROM t_nilai WHERE id_mahasiswa='$id_mhs' AND id_mk='$kode_mk_last'")->row();
		$id_nilai = $get_id_nilai->id_nilai;
    	$data_nilai=$this->db->query("UPDATE t_nilai SET id_mk='$kode_mk' WHERE id_nilai='$id_nilai'");
			$sql =$this->db->query("UPDATE t_detail_frs SET id_mk='$kode_mk', id_detail_kuota='$id_detail_kuota' WHERE id_detail_frs='$id_detail'");
			if($data_nilai){
				if($sql){
					$this->session->set_userdata('msg','berhasil.');			
				 redirect("c_index_aka/detail_manipulasi/$nim/$smt");
				}else{
						$this->session->set_userdata('msg_error','Coba kembali');			
				 redirect("c_index_aka/l_edit_manipulasi/$nim");
				}
			}else{
						$this->session->set_userdata('msg_error','Coba kembali');			
				 redirect("c_index_aka/l_edit_manipulasi/$nim");

			}
	}		
	/* ==========================================END MANIPULASI FRS============================= */	
	/* ==========================================KUOTA MATA KULIAH PILIHAN============================= */	
	public function kuota_mata_kuliah_pilihan(){
		//Pagination		
			$status= $this->session->userdata('status');
			$src=$this->session->userdata('src');
			$submit = $this->input->post('submit');
		if($status == "aktif"){//jika tombol search dicari
			$config['total_rows']=$this->db->query("SELECT *,b.nama_mk FROM t_mk as b,t_kuota_matkul_pilihan as a where b.kode_mk =a.kode_mk AND  b.nama_mk LIKE '%$src%'")->num_rows();					
			$config['base_url']=base_url().'c_index_aka/Kuota_mata_kuliah_pilihan/'.$src.'/';			
			$config['uri_segment']=4;
			$uri3=$this->uri->segment(4);
			$config['per_page']=$config['total_rows']+10;			
		}else{
			$config['total_rows'] =$this->db->query("SELECT *,b.nama_mk FROM t_mk as b,t_kuota_matkul_pilihan as a where b.kode_mk =a.kode_mk")->num_rows();			
			$config['base_url'] = base_url()."c_index_aka/Kuota_mata_kuliah_pilihan/";
			$uri3=$this->uri->segment(3);
			$config['uri_segment']=3;
			$config['per_page']='10';
		}	
			if(empty($uri3)){
					$uri3=0;
			}
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
			$page=$config['per_page'];
			$this->pagination->initialize($config);		
				if($status == "aktif"){
				$d_src = "b.nama_mk LIKE '%$src%' AND";
				}else{
					$d_src = "";
				}				
			$query = $this->db->query("SELECT *,b.nama_mk FROM t_mk as b,t_kuota_matkul_pilihan as a WHERE $d_src b.kode_mk =a.kode_mk AND id_mk = id_mk order by id_mk ASC limit $uri3,$page");
			$print =$query->result_array();
			if($query->num_rows() < 1){
				$this->session->set_userdata('msg_error','No result.');
			}
			return $print;	
		}

		public function kuota_mata_kuliah_pilihan_2(){
		//Pagination		
			$status= $this->session->userdata('status');
			$src=$this->session->userdata('src');
			$submit = $this->input->post('submit');
		if($status == "aktif"){//jika tombol search dicari
			$config['total_rows']=$this->db->query("SELECT *,b.nama_mk FROM t_mk as b,t_kuota_matkul_pilihan as a where b.kode_mk =a.kode_mk AND  b.nama_mk LIKE '%$src%'")->num_rows();					
			$config['base_url']=base_url().'p_jurusan/Kuota_mata_kuliah_pilihan/'.$src.'/';			
			$config['uri_segment']=4;
			$uri3=$this->uri->segment(4);
			$config['per_page']=$config['total_rows']+10;			
		}else{
			$config['total_rows'] =$this->db->query("SELECT *,b.nama_mk FROM t_mk as b,t_kuota_matkul_pilihan as a where b.kode_mk =a.kode_mk")->num_rows();			
			$config['base_url'] = base_url()."p_jurusan/Kuota_mata_kuliah_pilihan/";
			$uri3=$this->uri->segment(3);
			$config['uri_segment']=3;
			$config['per_page']='10';
		}	
			if(empty($uri3)){
					$uri3=0;
			}
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
			$page=$config['per_page'];
			$this->pagination->initialize($config);		
				if($status == "aktif"){
				$d_src = "b.nama_mk LIKE '%$src%' AND";
				}else{
					$d_src = "";
				}				
			$query = $this->db->query("SELECT *,b.nama_mk FROM t_mk as b,t_kuota_matkul_pilihan as a WHERE $d_src b.kode_mk =a.kode_mk AND id_mk = id_mk order by id_mk ASC limit $uri3,$page");
			$print =$query->result_array();
			if($query->num_rows() < 1){
				$this->session->set_userdata('msg_error','No result.');
			}
			return $print;	
		}


		public function t_kuota_mata_kuliah_pilihan(){
		//Pagination		
			$status= $this->session->userdata('status');
			$src=$this->session->userdata('src');
			$submit = $this->input->post('submit');
			if($status == "aktif" AND $src){
				$sql_src = "WHERE kode_mk LIKE '%$src%'";
			}else{
				$sql_src = "";
			}
			$config['total_rows']=$this->db->query("SELECT * FROM t_mk $sql_src")->num_rows();					
			$config['base_url']=base_url().'c_index_aka/t_kuota_mata_kuliah_pilihan/';			
			$config['uri_segment']=3;
			$uri3=$this->uri->segment(3);
			if(empty($uri3)){
					$uri3=0;
			}
			$config['per_page']='100';
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
			$page=$config['per_page'];
			$this->pagination->initialize($config);
				if($status == "aktif"){
				$d_src = "nama_mk LIKE '%$src%' AND";
				}else{
					$d_src = "";
				}				
			$query = $this->db->query("SELECT * FROM t_mk  WHERE $d_src id_mk = id_mk order by id_mk DESC limit $uri3,$page");
			$print =$query->result_array();
			if($query->num_rows() < 1){
				$this->session->set_userdata('msg','No result.');
			}
			return $print;	
		}	
	public function isi_t_edit_kuota_matkul_pilihan(){
		$kode = $this->uri->segment(3);
		$sql = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$kode'");
		return $sql->result();
	}
	public function p_t_kuota_mata_kuliah_pilihan(){
		$data = array(
			'id_kelas'=>$this->input->post('kelas'),
			'jumlah_mk'=>$this->input->post('jumlah_mk'),
			'kuota'=>$this->input->post('kuota'),
			'status'=>'aktif',
			'kode_mk'=>$this->input->post('kode_mk'),
			);
		$print = $this->db->insert('t_kuota_matkul_pilihan',$data);
		if($print){
			$this->session->set_userdata('msg','Kuota berhasil dimasukkan.');
		}else{
			$this->session->set_userdata('msg_error','Coba kembali');
		}
		return $print;
	}
	public function hapus_kuota_matkul_pilihan(){
		$print = $this->db->delete('t_kuota_matkul_pilihan',array('kode_mk' => $this->uri->segment(3)));
		if($print){
			$this->session->set_userdata('msg','Kuota mata Kuliah berhasil dihapus.');
		}else{
			$this->session->set_userdata('msg_error','Coba kembali');
		}
		return $print;
	}		
	//MENGAMBIL KODE MK
	public function l_edit_kuota_matkul_pilihan(){
		$kode =$this->uri->segment(3);
		$sql = "SELECT * FROM (t_kuota_matkul_pilihan AS a LEFT JOIN t_mk AS b ON '$kode' = b.kode_mk) LEFT JOIN t_kelas AS c ON a.id_kelas = c.id_kelas";
		return $this->db->query($sql);
		//return $this->db->query("SELECT * FROM t_kuota_matkul_pilihan as a,t_mk as b,t_kelas as c WHERE a.kode_mk = b.kode_mk AND a.id_kelas = c.id_kelas AND b.kode_mk='$kode'")->result();
	}
	//PROSESS MENGEDIT DI MODEL
	public function edit_kuota_matkul_pilihan(){
		$kode = $this->input->post('kode_mk');
		$data = array(
			'id_kelas'=>$this->input->post('kelas'),
			'jumlah_mk'=>$this->input->post('jumlah_mk'),
			'kuota'=>$this->input->post('kuota'),
			'status'=>$this->input->post('status'),						
			);
		$this->db->where('kode_mk',$kode);
		$print = $this->db->update('t_kuota_matkul_pilihan',$data);
		if($print){
			$this->session->set_userdata('msg','Kuota mata Kuliah berhasil dirubah.');			
			redirect('c_index_aka/Kuota_mata_kuliah_pilihan');
		}else{
			$this->session->set_userdata('msg_error','Coba kembali');			
			redirect("c_index_aka/l_edit_kuota_matkul_pilihan/$kode");			
		}		
		return $print;
	}
	/* ==========================================END KUOTA MATA KULIAH PILIHAN============================= */
	/* ==========================================DAFTAR ULANG============================= */
	public function p_daftar_ulang(){
		$nama_daftar = $this->input->post('daftar_nama');
		$cek_nama = $this->db->query("SELECT * FROM t_waktu_frs WHERE nama = '$nama_daftar'")->num_rows();
		$data = array();
		$data += array('tanggal_buka' => $this->input->post('tanggal_buka'),
			'tanggal_tutup' => $this->input->post('tanggal_tutup'),
			'status'=> $this->input->post('status')
		);		
		if($cek_nama == 1){
			$this->db->where('nama',$nama_daftar);
			$sql = $this->db->update('t_waktu_frs',$data);
			if($sql){
				$this->session->set_userdata('daftar_ulang','Berhasil merubah waktu');
			}else{
				$this->session->set_userdata('daftar_ulang','Berhasil merubah waktu');			
			}
		}else{
			$data += array('nama'=>$nama_daftar);
			$sql = $this->db->insert('t_waktu_frs',$data);
		}		
		return $sql;
	}
	/* ==========================================END DAFTAR ULANG============================= */
	/* ==========================================KELAS============================= */
	public function kelas(){
		return $this->db->get("t_kelas")->result();
	}
	/* ==========================================END KELAS============================= */

	/* ==========================================Absen============================= */
	public function absen_16_m(){
		
		$mata_kuliah = $this->input->post('mata_kuliah');
		$tahun_akademik = $this->input->post('tahun_akademik');
		$kelas = $this->input->post('kelas');
		$prodi = $this->input->post('prodi');
		if( $kelas == "semua_kelas" ){
			$filter_absen = "";
		}else{
			$filter_absen = "AND t_mahasiswa.id_kelas = '$kelas'";
		}
		$query_absen = $this->db->query("SELECT * FROM t_detail_frs, t_mk, t_mahasiswa, t_kelas WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mk.kode_mk = t_detail_frs.id_mk AND t_mahasiswa.id_kelas = t_kelas.id_kelas AND t_mk.kode_mk = '$mata_kuliah' AND t_detail_frs.tahun_akademik = '$tahun_akademik' $filter_absen AND t_mahasiswa.program_studi = '$prodi' ORDER BY t_mahasiswa.nama ASC");
		if($query_absen->num_rows < 1){
			$this->session->set_userdata('msg', "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Data absen tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}else{
			return $query_absen->result_array();
		}

	}

	public function absen_16_m_excel(){
		
		$mata_kuliah = $this->input->post('mata_kuliah_sec');
		$tahun_akademik = $this->input->post('tahun_akademik_sec');
		$kelas = $this->input->post('kelas_sec');
		$prodi = $this->input->post('prodi_sec');
		if( $kelas == "semua_kelas" ){
			$filter_absen = "";
		}else{
			$filter_absen = "AND t_mahasiswa.id_kelas = '$kelas'";
		}
		$query_absen = $this->db->query("SELECT * FROM t_detail_frs, t_mk, t_mahasiswa, t_kelas WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_mk.kode_mk = t_detail_frs.id_mk AND t_mahasiswa.id_kelas = t_kelas.id_kelas AND t_mk.kode_mk = '$mata_kuliah' AND t_detail_frs.tahun_akademik = '$tahun_akademik' $filter_absen AND t_mahasiswa.program_studi = '$prodi' ORDER BY t_mahasiswa.nama ASC");
		return $query_absen->result_array();

	}

	//=============================================== Ambil Daerah Asal ======================

	public function ambil_data_asal(){
		$provinsi = $this->input->post("provinsi");
		$angkatan = $this->input->post("angkatan");
		$kabupaten = $this->input->post("kabupaten");

		$ambil_data = $this->db->query("SELECT * FROM t_mahasiswa WHERE provinsi = '$provinsi' AND angkatan = '$angkatan' AND kabupaten LIKE '%$kabupaten%'");
		if($ambil_data->num_rows() >0){
			return $ambil_data->result_array();
		}else{
			$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Silahkan pilih semester terlebih dahulu <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";
			$this->session->set_userdata('msg', $peringatan);
			redirect('c_index_aka/daerah_asal');
		}
	}


	//=============================================== Ambil Data Cuti ======================

	public function ambil_data_cuti(){
		$tahun_akademik = $this->input->post("tahun_akademik");
		$ambil_data = $this->db->query("SELECT * FROM t_cuti_akademik, t_mahasiswa WHERE t_cuti_akademik.nim = t_mahasiswa.nim AND t_cuti_akademik.tahun_akademik = '$tahun_akademik'");
		return $ambil_data->result_array();
	}


	//=============================================== Ambil Data Kohort ======================

	public function ambil_data_kohort(){
		$tahun_akademik = $this->input->post("tahun_akademik");
		$kelas = $this->input->post("kelas");
		$prodi = $this->input->post("prodi");
		if($kelas == "semua_kelas"){
			$get_kelas = "";
		}else{
			$get_kelas = "AND t_mahasiswa.id_kelas = '$kelas'";
		}
		$ambil_data = $this->db->query("SELECT * FROM t_mahasiswa, t_kelas WHERE t_mahasiswa.id_kelas = t_kelas.id_kelas AND t_mahasiswa.angkatan = '$tahun_akademik' AND t_mahasiswa.program_studi = '$prodi' $get_kelas ORDER BY t_mahasiswa.nim ASC");
		if($ambil_data->num_rows() > 0){
			return $ambil_data->result_array();
		}else{
			$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Silahkan mengisi data dengan benar <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";
			$this->session->set_userdata('msg', $peringatan);
			redirect('c_index_aka/data_kohort');
		}
	}


	//===============================================Ambil Data Matkul =============================

	public function ambil_data_matkul(){
		$tahun_akademik = $this->input->post("tahun_akademik");
		$matkul = $this->input->post("matkul");
		$ambil_data = $this->db->query("SELECT * FROM t_detail_frs, t_mk, t_nilai, t_mahasiswa WHERE t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.id_mk = t_mk.kode_mk AND t_nilai.id_mahasiswa = t_mahasiswa.id_mahasiswa AND t_detail_frs.tahun_akademik ='$tahun_akademik' AND t_nilai.id_mk = '$matkul'");
		return $ambil_data->result_array();
	}


	//===============================================Ambil Data KHS =============================

	public function ambil_data_khs(){
		$nim = $this->input->post('nim');
		$tahun_akademik = $this->input->post('tahun_akademik');
		$semester = $this->input->post('semester');
		$ambil_data = $this->db->query("SELECT * FROM t_mahasiswa, t_mk, t_detail_frs, t_nilai WHERE t_mahasiswa.id_mahasiswa = t_detail_frs.id_mhs AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mahasiswa.nim = '$nim' AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_detail_frs.semester = '$semester' AND t_nilai.ulang_mk = 'tidak' ORDER BY t_mk.kode_mk ASC");
		if($ambil_data->num_rows() < 1){
			$this->session->set_userdata('msg', "<strong><i class='icon-remove'></i> Maaf Data KHS Tidak Ditemukan </strong>silahkan masukan kembali data khs <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			redirect("c_index_aka/khs");
		}else{
			return $ambil_data->result_array();
		}
	}
	public function ambil_data_khs_excel(){
		$nim = $this->input->post('nim');
		$tahun_akademik = $this->input->post('tahun_akademik');
		$semester = $this->input->post('semester');
		$ambil_data = $this->db->query("SELECT * FROM t_mahasiswa, t_mk, t_detail_frs, t_nilai WHERE t_mahasiswa.id_mahasiswa = t_detail_frs.id_mhs AND t_mk.kode_mk = t_detail_frs.id_mk AND t_nilai.id_nilai = t_detail_frs.id_nilai AND t_mahasiswa.nim = '$nim' AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_detail_frs.semester = '$semester' AND t_nilai.ulang_mk = 'tidak' ORDER BY t_mk.kode_mk ASC");
		if($ambil_data->num_rows() < 1){
			$this->session->set_userdata('msg', "<strong><i class='icon-remove'></i> Maaf Data KHS Tidak Ditemukan </strong>silahkan masukan kembali data khs <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			redirect("c_index_aka/khs_excel");
		}else{
			return $ambil_data->result_array();
		}
	}

	//===============================================Ambil Data KHS =============================

	public function ambil_data_transkrip(){
		$nim = $this->input->post('nim');
		$notranskrip = $this->input->post('transkrip');
		$tanggallulus = $this->input->post('tanggallulus');
		$bulanlulus = $this->input->post('bulanlulus');
		$tahunlulus = $this->input->post('tahunlulus');
		$datatahun = $tanggallulus."-".$bulanlulus."-".$tahunlulus;



		$ambil_data_transkrip = $this->db->query("SELECT * FROM t_mahasiswa, t_detail_frs, t_nilai, t_mk WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_detail_frs.id_mk = t_mk.kode_mk AND t_mahasiswa.nim = '$nim' AND t_nilai.ulang_mk = 'tidak' ORDER BY t_mk.kode_mk ASC");
		if($ambil_data_transkrip->num_rows() == 0){
			$this->session->set_userdata('msg', "<strong><i class='icon-remove'></i> Maaf Data Transkrip Tidak Ditemukan </strong>silahkan masukan kembali data transkrip <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			redirect("c_index_aka/transkrip");
		}else{
			$data_mhs = array(
			'tanggal_lulus' => $datatahun,
			'no_transkrip' => $notranskrip
			);
			$this->db->update('t_mahasiswa', $data_mhs, array('nim' => $nim));
			return $ambil_data_transkrip->result_array();
		}
	}
	
	// ========================================== Ambil Data Indeks Prestasi =================

	public function ambil_indeks_prestasi(){
		$tahun_akademik = $this->input->post('tahun_akademik');
		$angkatan = $this->input->post('angkatan');
		$semester1 = $this->input->post('1');
		$semester2 = $this->input->post('2');
		$semester3 = $this->input->post('3');
		$semester4 = $this->input->post('4');
		$semester5 = $this->input->post('5');
		$semester6 = $this->input->post('6');
		$semester7 = $this->input->post('7');
		$semester8 = $this->input->post('8');
		$semester9 = $this->input->post('9');
		$semester10 = $this->input->post('10');

		if($semester1 == "" && $semester2 == "" && $semester3 == "" && $semester4 == "" && $semester5 == "" && $semester6 == "" && $semester7 == "" && $semester8 == "" && $semester9 == "" && $semester10 == ""){

			$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Silahkan pilih semester terlebih dahulu <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";
			$this->session->set_userdata('msg', $peringatan);
			redirect('c_index_aka/index_prestasi');
		
		}else{
	
		$semesterall = $semester1.$semester2.$semester3.$semester4.$semester5.$semester6.$semester7.$semester8.$semester9.$semester10;
		$a = explode("-", $semesterall);
		array_pop($a);
		$b = "WHERE t_mahasiswa.id_mahasiswa = t_detail_frs.id_mhs AND t_mahasiswa.angkatan = '$angkatan' AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_detail_frs.semester = ".implode(" OR t_mahasiswa.id_mahasiswa = t_detail_frs.id_mhs AND t_mahasiswa.angkatan = '$angkatan' AND t_detail_frs.tahun_akademik = '$tahun_akademik' AND t_detail_frs.semester = ", $a);
		$query = $this->db->query("SELECT DISTINCT t_mahasiswa.nim, t_mahasiswa.nama, t_mahasiswa.id_mahasiswa, t_detail_frs.id_mhs, t_mahasiswa.angkatan, t_detail_frs.tahun_akademik FROM t_mahasiswa, t_detail_frs $b ORDER BY t_mahasiswa.nama ASC");
			if($query->num_rows() > 0){
				return $query->result_array();			
			}else{
				$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Silahkan masukan data dengan benar <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";
				$this->session->set_userdata('msg', $peringatan);
				redirect('c_index_aka/index_prestasi');
			}
		}
	}

	public function ambil_data_dosen(){
		$query = $this->db->query("SELECT * FROM t_dosen");
		$data = $query->result_array();
		return $data;
	}

	public function ambil_data_mata_kuliah(){
		$query = $this->db->query("SELECT * FROM t_mk");
		$data = $query->result_array();
		return $data;
	}
	public function ambil_data_keuangan(){
		$date1 = $this->input->post('date1');
		$date2 = $this->input->post('date2');
		$query = $this->db->query("SELECT * FROM t_registrasi, t_mahasiswa WHERE t_registrasi.id_mahasiswa = t_mahasiswa.id_mahasiswa AND t_registrasi.tanggal BETWEEN '$date1' AND '$date2' ORDER BY t_registrasi.id_registrasi DESC");
		
		if($query->num_rows() > 0){

		$data = $query->result_array();
		return $data;

		}else{
		
			$peringatan = "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong>Silahkan masukan data dengan benar <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>";
			$this->session->set_userdata('msg', $peringatan);
			redirect('c_index_aka/keuangan');
		}
		
	}

	//=============================================== Ijazah =================================

	public function input_ijazah(){
		$uri_mhs = $this->input->post('id_mhs');
		$uri_page = $this->input->post('page');
		
		$tanggal_lulus = $this->input->post('tanggal_lulus');
		$bulan_lulus = $this->input->post('bulan_lulus');
		$tahun_lulus = $this->input->post('tahun_lulus');

		$tanggal_yudisium = $this->input->post('tanggal_yudisium');
		$bulan_yudisium = $this->input->post('bulan_yudisium');
		$tahun_yudisium = $this->input->post('tahun_yudisium');

		$lulus_mhs = $tanggal_lulus."-".$bulan_lulus."-".$tahun_lulus;
		$yudisium_mhs = $tanggal_yudisium."-".$bulan_yudisium."-".$tahun_yudisium;
		$data = array(
			'no_ijazah' => $this->input->post('no_ijazah'),
			'tanggal_lulus' => $lulus_mhs,
			'tahun_yudisium' => $yudisium_mhs,
			'status_kuliah' => 'Alumni/Lulus'
			);
		$this->db->update("t_mahasiswa", $data, array('id_mahasiswa' => $uri_mhs));
		redirect("c_index_aka/".$uri_page."/".$uri_mhs);
	}
	/* ==========================================Nilai============================= */

	public function tampil_nilai(){
		$cari_s = $this->input->post("cari");
		if($cari_s){
			$session_nilai = array(
				'mata_mk' => $this->input->post("mata_kuliah"),
				'tahun_akademik' => $this->input->post("tahun_akademik"),
				'kelas' => $this->input->post("kelas"),
				'prodi' => $this->input->post('prodi')
				);
			$this->session->set_userdata($session_nilai);
		}
		$mata_mk_s = $this->session->userdata("mata_mk");
		$tahun_akademik_s = $this->session->userdata("tahun_akademik");
		$kelas_s = $this->session->userdata("kelas");
		$prodi_s = $this->session->userdata("prodi");
		
		if( $kelas_s == 'semua_kelas' ){
			$filter_kelas = "";
		}else{
			$filter_kelas = "AND t_mahasiswa.id_kelas = '$kelas_s'";
		}
		$query = $this->db->query("SELECT * FROM t_mahasiswa, t_mk, t_detail_frs, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.id_mk = t_mk.kode_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.id_mahasiswa = t_mahasiswa.id_mahasiswa AND t_detail_frs.id_mk = '$mata_mk_s' AND t_detail_frs.tahun_akademik = '$tahun_akademik_s' AND t_mahasiswa.program_studi = '$prodi_s' $filter_kelas");
		if($cari_s){
			if($query->num_rows() < 1){
				$this->session->set_userdata('msg', "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong> Data nilai tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			}
		}
			return $query->result_array();
	}	

	public function tampil_nilai_mahasiswa(){
		$cari_s_m = $this->input->post("cari_m");
		if($cari_s_m){
			$session_m = array(
				'tahun_akademik_aka' => $this->input->post('tahun_akademik_m'),
				'nim_aka' => $this->input->post('nim_m'),
				'semester_aka' => $this->input->post("semester_m") 
			);
			$this->session->set_userdata($session_m); 
		}
		$ambil_tahun = $this->session->userdata("tahun_akademik_aka");
		$ambil_nim_m = $this->session->userdata("nim_aka");
		$ambil_semester = $this->session->userdata("semester_aka");
		$query = $this->db->query("SELECT * FROM t_mahasiswa, t_mk, t_nilai, t_detail_frs WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.id_mk = t_mk.kode_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_mahasiswa.nim = '$ambil_nim_m' AND t_detail_frs.semester = '$ambil_semester' AND t_detail_frs.tahun_akademik = '$ambil_tahun'");
		if($cari_s_m){
			if($query->num_rows() < 1){
				$this->session->set_userdata('msg', "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong> Data nilai tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			}
		}
		return $query->result_array();
	}
	public function input_waktu_nilai(){
		$save = $this->input->post('save_waktu_nilai');
		if(!empty($save)){
			$tanggal_waktu = $this->input->post("tanggal_waktu");
			$data = array(
				'waktu_nilai' => $tanggal_waktu,
				'update' => 'Tidak',
				'status' => '0'
			);
			$this->db->update("t_waktu_nilai", $data, array('id_waktu_nilai' => '1'));
			$this->session->set_userdata('msg', "<strong><i class='icon-ok'></i> Berhasil Update Waktu </strong> Waktu pengisian nilai sudah diupdate <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			$redirect = redirect("c_index_aka/waktu_nilai");
		}else{
			$redirect = "";
		}
		echo $redirect;

	}

	public function update_waktu_nilai(){
		//if($edit){
		$tanggal = date('d');
		$bulan = date('m');
		$tahun = date('Y');

		$query = $this->db->query("SELECT * FROM t_waktu_nilai");
		$ambil_status = $query->row(); 
		$status = $ambil_status->status;
		if($status == 1){

		$query = $this->db->query("SELECT * FROM t_waktu_nilai");
		$ambil = $query->row_array();
		$tanggal_db = explode("-", $ambil['waktu_nilai']);
		$now = date("Y-m-d");
		$tutup = $tanggal_db[0]."-".$tanggal_db[1]."-".$tanggal_db[2];
		$selisih = (strtotime($now) - strtotime($tutup)) / (60*60*24);
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
				$redirect = redirect("c_index_aka/waktu_nilai");
			}
		}
	}else{
			$redirect = "";
		}
		//echo $redirect;	
		
	}
	public function save_nilai($redirect){
		
		$no = $this->input->post("no_nilai");		
		$jumlah = count($no);
		for ($i= 0; $i < $jumlah; $i++) {			
			$huruf_mutu = $this->input->post("huruf_mutu");
			$id_mk = $this->input->post("id_mk");
			$id_mhs = $this->input->post('id_mhs');
			$nilai_uts = $this->input->post("nilai_uts");
			$nilai_uas = $this->input->post("nilai_uas");
			$nilai_tugas = $this->input->post("nilai_tugas");

			$persen_uts = $nilai_uts[$i] / 100 * 40;
			$persen_uas = $nilai_uas[$i] / 100 * 40;
			$persen_tugas = $nilai_tugas[$i] / 100 * 20;
			$bobot_nilai[] = $persen_uts + $persen_uas + $persen_tugas;


			if($huruf_mutu[$i] == "A"){
				$angka_mutu = "4";
			}else if($huruf_mutu[$i] == "B"){
				$angka_mutu = "3";
			}else if($huruf_mutu[$i] == "C"){
				$angka_mutu = "2";
			}else if($huruf_mutu[$i] == "D"){
				$angka_mutu = "1";
			}else if($huruf_mutu[$i] == "E"){
				$angka_mutu = "0";
			}else{
				$angka_mutu = "0";
			}


			$data = array(
				'huruf_mutu' => $huruf_mutu[$i],
				'nilai_tugas' => $nilai_tugas[$i],
				'nilai_uas' => $nilai_uas[$i],
				'nilai_uts' => $nilai_uts[$i],
				'bobot_nilai' => $bobot_nilai[$i],
				'angka_huruf_mutu' => $angka_mutu
			);
			$this->db->update('t_nilai', $data, array('id_mahasiswa' => $id_mhs[$i], 'id_mk' => $id_mk[$i]));

		}
		$this->session->set_userdata('msg_success',"<strong><i class='icon-ok'></i> Berhasil input nilai</strong> Data sudah diinput <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");

		/*

		

		NOTE : Script Peringatan Nilai E dan D ga di pake lagi soalnya bingung ngakalinnya 


		Check mahasiswa yang punya nilai E dan D, dan mengambil data mata kuliah
		$query_check_e = $this->db->query("SELECT * FROM t_nilai WHERE huruf_mutu = 'E' AND id_mahasiswa = '$id_mhs[$i]'");
		$query_check_d = $this->db->query("SELECT * FROM t_nilai WHERE huruf_mutu = 'D' AND id_mahasiswa = '$id_mhs[$i]'");
		$query_check_m = $this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa = '$id_mhs[$i]'");
		
		//Ambil data
		$check_mahasiswa = $query_check_m->row_array();

		//Check nilai E
		if($query_check_e->num_rows() >= 1){
			$this->session->set_userdata('msg_info_e',"<strong><i class='icon-exclamation-sign'></i> Peringatan</strong> Mahasiswa dengan nim '$check_mahasiswa[nim]' dengan nama '$check_mahasiswa[nama]' mendapatkan nilai E, mahasiswa disarankan mengikuti perbaikan nilai <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}

		//Check nilai D
		if($query_check_d->num_rows() >= 3 ){
			$this->session->set_userdata('msg_info',"<strong><i class='icon-exclamation-sign'></i> Peringatan</strong> Mahasiswa dengan nim '$check_mahasiswa[nim]' dengan nama '$check_mahasiswa[nama]' mendapatkan nilai D sebanyak lebih dari 2, mahasiswa disarankan mengikuti perbaikan nilai <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}
		*/
		redirect($redirect);
	}
	public function proses_nilai($redirect){
		$id_mhs = $this->input->post('id_mhs');
		$id_mk = $this->input->post('id_mk');
		$nilai_uts = $this->input->post('nilai_uts');
		$nilai_uas = $this->input->post('nilai_uas');
		$nilai_tugas = $this->input->post('nilai_tugas');
		$semester = $this->input->post('semester');

		$persen_uts = $nilai_uts / 100 * 40;
		$persen_uas = $nilai_uas / 100 * 40;
		$persen_tugas = $nilai_tugas / 100 * 20;
		$bobot_nilai = $persen_uts + $persen_uas + $persen_tugas;
		if($bobot_nilai >= 80 && $bobot_nilai <= 100 ){
			$huruf_mutu = "A";
		}else if($bobot_nilai >= 68 && $bobot_nilai <= 79.9){
			$huruf_mutu = "B";
		}else if($bobot_nilai >= 55 && $bobot_nilai <= 67.9){
			$huruf_mutu = "C";
		}else if($bobot_nilai >= 46 && $bobot_nilai <= 54.9){
			$huruf_mutu = "D";
		}
		else if($bobot_nilai <= 45.9){
			$huruf_mutu = "E";
		}

		//Angka Mutu
		if($huruf_mutu == "A"){
			$angka_mutu = "4";
		}else if($huruf_mutu == "B"){
			$angka_mutu = "3";
		}else if($huruf_mutu == "C"){
			$angka_mutu = "2";
		}else if($huruf_mutu == "D"){
			$angka_mutu = "1";
		}else if($huruf_mutu == "E"){
			$angka_mutu = "0";
		}

		$data = array(
			'nilai_uts' => $nilai_uts,
			'nilai_uas' => $nilai_uas,
			'nilai_tugas' => $nilai_tugas,
			'huruf_mutu' => $huruf_mutu,
			'angka_huruf_mutu' => $angka_mutu,
			'bobot_nilai' => $bobot_nilai
			);

		$this->session->set_userdata('msg_success',"<strong><i class='icon-ok'></i> Berhasil input nilai</strong> Data sudah diinput <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		$this->db->update('t_nilai', $data, array('id_mahasiswa' => $id_mhs, 'id_mk' => $id_mk));

		//Check mahasiswa yang punya nilai E dan D, dan mengambil data mata kuliah
		$query_check_e = $this->db->query("SELECT * FROM t_nilai WHERE huruf_mutu = 'E' AND id_mahasiswa = '$id_mhs'");
		$query_check_d = $this->db->query("SELECT * FROM t_nilai WHERE huruf_mutu = 'D' AND id_mahasiswa = '$id_mhs'");
		$query_check_mk = $this->db->query("SELECT * FROM t_mk WHERE id_mk = '$id_mk'");
		$query_check_m = $this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa = '$id_mhs'");
		
		//Ambil data
		$check_mahasiswa = $query_check_m->row_array();
		$check_mk = $query_check_mk->row_array();

		//Check nilai E
		if($query_check_e->num_rows() >= 1){
			$this->session->set_userdata('msg_info_e',"<strong><i class='icon-exclamation-sign'></i> Peringatan</strong> Mahasiswa dengan nim '$check_mahasiswa[nim]' dengan nama '$check_mahasiswa[nama]' mendapatkan nilai E, mahasiswa disarankan mengikuti perbaikan nilai <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}

		//Check nilai D
		if($query_check_d->num_rows() >= 3 ){
			$this->session->set_userdata('msg_info',"<strong><i class='icon-exclamation-sign'></i> Peringatan</strong> Mahasiswa dengan nim '$check_mahasiswa[nim]' dengan nama '$check_mahasiswa[nama]' mendapatkan nilai D sebanyak lebih dari 2, mahasiswa disarankan mengikuti perbaikan nilai <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}

		redirect($redirect);
	}
	public function proses_edit_nilai($redirect){

		$id_mhs = $this->input->post('id_mhs');
		$id_mk = $this->input->post('id_mk');
		$nilai_uts = $this->input->post('nilai_uts');
		$nilai_uas = $this->input->post('nilai_uas');
		$nilai_tugas = $this->input->post('nilai_tugas');
		$persen_uts = $nilai_uts / 100 * 40;
		$persen_uas = $nilai_uas / 100 * 40;
		$persen_tugas = $nilai_tugas / 100 * 20;
		$bobot_nilai = $persen_uts + $persen_uas + $persen_tugas;
		$huruf_mutu = $this->input->post("huruf_mutu");

		//Angka Mutu
		if($huruf_mutu == "A"){
			$angka_mutu = "4";
		}else if($huruf_mutu == "B"){
			$angka_mutu = "3";
		}else if($huruf_mutu == "C"){
			$angka_mutu = "2";
		}else if($huruf_mutu == "D"){
			$angka_mutu = "1";
		}else if($huruf_mutu == "E"){
			$angka_mutu = "0";
		}



		$data = array(
			'nilai_uts' => $nilai_uts,
			'nilai_uas' => $nilai_uas,
			'nilai_tugas' => $nilai_tugas,
			'huruf_mutu' => $huruf_mutu,
			'angka_huruf_mutu' => $angka_mutu,
			'bobot_nilai' => $bobot_nilai
			);
		$this->session->set_userdata('msg_success',"<strong><i class='icon-ok'></i> Berhasil edit nilai</strong> Data sudah edit <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		$this->db->update('t_nilai', $data, array('id_mahasiswa' => $id_mhs, 'id_mk' => $id_mk));


		

		//Check mahasiswa yang punya nilai E dan D, dan mengambil data mata kuliah
		$query_check_e = $this->db->query("SELECT * FROM t_nilai WHERE huruf_mutu = 'E' AND id_mahasiswa = '$id_mhs'");
		$query_check_d = $this->db->query("SELECT * FROM t_nilai WHERE huruf_mutu = 'D' AND id_mahasiswa = '$id_mhs'");
		$query_check_mk = $this->db->query("SELECT * FROM t_mk WHERE id_mk = '$id_mk'");
		$query_check_m = $this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa = '$id_mhs'");
		
		//Ambil data
		$check_mahasiswa = $query_check_m->row_array();
		$check_mk = $query_check_mk->row_array();

		//Check nilai E
		if($query_check_e->num_rows() >= 1){
			$this->session->set_userdata('msg_info_e',"<strong><i class='icon-exclamation-sign'></i> Peringatan</strong> Mahasiswa dengan nim '$check_mahasiswa[nim]' dengan nama '$check_mahasiswa[nama]' mendapatkan nilai E, mahasiswa disarankan mengikuti perbaikan nilai <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}

		//Check nilai D
		if($query_check_d->num_rows() >= 3 ){
			$this->session->set_userdata('msg_info',"<strong><i class='icon-exclamation-sign'></i> Peringatan</strong> Mahasiswa dengan nim '$check_mahasiswa[nim]' dengan nama '$check_mahasiswa[nama]' mendapatkan nilai D sebanyak lebih dari 2, mahasiswa disarankan mengikuti perbaikan nilai <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}

		redirect($redirect);

	}
	public function data_cuti(){
		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/cuti_akademik/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_cuti_akademik');
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
		$cari_cuti = $this->input->post("cari_cuti");
		if($cari_cuti){
				$cuti = $this->input->post("cari_cuti_tahun");
				$data_query = "AND t_cuti_akademik.tahun_akademik = '$cuti'";
				$data_cuti = $this->db->query("SELECT * FROM t_cuti_akademik, t_mahasiswa WHERE t_cuti_akademik.nim = t_mahasiswa.nim $data_query ORDER BY t_cuti_akademik.tahun_akademik DESC");
			}else{
				$cuti = "";
				$data_query = "";
				$data_cuti = $this->db->query("SELECT * FROM t_cuti_akademik, t_mahasiswa WHERE t_cuti_akademik.nim = t_mahasiswa.nim $data_query ORDER BY t_cuti_akademik.tahun_akademik DESC limit $offset, $num");
			}
		
		$check_cuti = $data_cuti->num_rows();
		
		if($cari_cuti){
			//Check Data
			if($check_cuti < 1){
				$this->session->set_userdata('msg',"<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan</strong> Data cuti tidak tahun '$cuti' ditemukan<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			}else{
				$this->session->set_userdata('msg_success',"<strong><i class='icon-ok'></i> Sukses Cari</strong> Data cuti tahun '$cuti' ditemukan<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");			
			}
		}
		return $data_cuti->result_array();
	}

	public function input_cuti(){
		$nim = $this->input->post("nim");
		$semester_ajuan = $this->input->post("semester_ajuan");
		$semester_cuti = $this->input->post("semester_cuti");
		$semester_masuk = $this->input->post("semester_masuk");
		$alasan = $this->input->post("alasan");
		$query_tahun = $this->db->query("SELECT * FROM t_tahun_akademik WHERE current = 'Ya'");
		$tahun = $query_tahun->row_array();
		$date = date("Y-m-d");
		$query_m = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim = '$nim'");

		if($query_m->num_rows() == 1){ //start if else
		$data = array(
			'nim' => $nim,
			'tgl_cuti' => $date,
			'semester_ajuan_cuti' => $semester_ajuan,
			'semester_cuti' => $semester_cuti,
			'semester_cuti_masuk' => $semester_masuk,
			'tahun_akademik' => $tahun['tahun_akademik'],
			'alasan' => $alasan
			);
		$data_mahasiswa = array(
			'status_kuliah' => 'Cuti'
			);
		$this->db->insert('t_cuti_akademik', $data);
		$this->db->update('t_mahasiswa', $data_mahasiswa, array('nim' => $nim));
		$this->session->set_userdata('msg_input',"<strong><i class='icon-ok'></i> Sukses Tambah Cuti</strong> Data dengan nim '$nim' telah terinput<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}else{
			$this->session->set_userdata('msg_input_error',"<strong><i class='icon-remove'></i> Maaf Nim Tidak Terdaftar</strong> Data dengan nim '$nim' tidak terdaftar sebagai mahasiswa<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}
		redirect("c_index_aka/cuti_akademik");
	}
	public function edit_cuti(){
		$id = $this->uri->segment(3);
		$nim = $this->input->post("nim");
		$semester_ajuan = $this->input->post("semester_ajuan");
		$semester_cuti = $this->input->post("semester_cuti");
		$semester_masuk = $this->input->post("semester_masuk");
		$alasan = $this->input->post("alasan");
		$query_tahun = $this->db->query("SELECT * FROM t_tahun_akademik WHERE current = 'Ya'");
		$tahun = $query_tahun->row_array();
		$date = date("Y-m-d");
		$query_m = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim = '$nim'");

		if($query_m->num_rows() == 1){ //start if else
		$data = array(
			'nim' => $nim,
			'tgl_cuti' => $date,
			'semester_ajuan_cuti' => $semester_ajuan,
			'semester_cuti' => $semester_cuti,
			'semester_cuti_masuk' => $semester_masuk,
			'tahun_akademik' => $tahun['tahun_akademik'],
			'alasan' => $alasan
			);
		$data_mahasiswa = array(
			'status_kuliah' => 'Cuti'
			);
		$this->db->update('t_cuti_akademik', $data, array('id' => $id));
		$this->db->update('t_mahasiswa', $data_mahasiswa, array('nim' => $nim));
		$this->session->set_userdata('msg_input',"<strong><i class='icon-ok'></i> Sukses Edit Cuti</strong> Data dengan nim '$nim' telah di edit<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}else{
			$this->session->set_userdata('msg_input_error',"<strong><i class='icon-remove'></i> Maaf Nim Tidak Terdaftar</strong> Data dengan nim '$nim' tidak terdaftar sebagai mahasiswa<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}
		redirect("c_index_aka/cuti_akademik");	
	}
	public function hapus_cuti(){
		$id = $this->uri->segment(3);
		$nim = $this->uri->segment(4);
		$this->db->delete('t_cuti_akademik',array('id' => $id));
		$this->session->set_userdata('msg_input',"<strong><i class='icon-ok'></i> Sukses Hapus Cuti</strong> Data dengan nim '$nim' telah dihapus dari daftar cuti<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		redirect("c_index_aka/cuti_akademik");
	}

	//============================================ Mata Kuliah Jurusan ==============================

	public function buka_mk(){
		$id = $this->uri->segment(3);
		$query = $this->db->query("SELECT * FROM t_mk WHERE id_mk = '$id'");
		$data = $query->row_array();

		if($data['pengisian_nilai'] == "dibuka"){
			$data_mk = array(
				'pengisian_nilai' => "ditutup"
				);
		}else{
			$data_mk = array(
				'pengisian_nilai' => "dibuka"
				);
		}
		$this->db->update("t_mk", $data_mk, array("id_mk" => $id));
		redirect("c_index_aka/mata_kuliah_jurusan");
	}

	//============================================= Program Studi ==================================
	
	public function save_prodi(){
		$nama_prodi = $this->input->post("nama_prodi");
		$data = array(
			'prodi' => $nama_prodi
		);
		$this->db->insert("t_prodi", $data);
		$this->session->set_userdata("msg", "<strong><i class='icon-ok'></i> Sukses Tambah Data</strong> data prodi sudah diinput<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		redirect("c_index_aka/program_studi");
	}

	public function edit_prodi(){
		$id_prodi = $this->input->post("id_prodi");
		$nama_prodi = $this->input->post("nama_prodi");
		$data = array(
			'prodi' => $nama_prodi
		);
		$this->db->update("t_prodi", $data, array('id_prodi' => $id_prodi));
		$this->session->set_userdata("msg", "<strong><i class='icon-ok'></i> Sukses Edit Data</strong> data prodi sudah diedit<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		redirect("c_index_aka/program_studi");
	}
	public function hapus_prodi(){
		$uri = $this->uri->segment(3);
		$this->db->delete("t_prodi", array('id_prodi' => $uri));
		$this->session->set_userdata("msg", "<strong><i class='icon-ok'></i> Sukses Hapus Data</strong> data prodi sudah dihapus<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		redirect("c_index_aka/program_studi");
	}

	//============================================= Ulang Mata Kuliah ==================================

	public function data_ulang_mk(){

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."c_index_aka/input_ulang_mk/";
		$config['per_page'] = 10;
		$config['total_rows'] = $this->db->count_all_results('t_ulang_mk');
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

		$cari_ulang = $this->input->post('cari_ulang');
		if($cari_ulang){
			$parameter = $this->input->post('parameter');
			$data_masuk = $this->input->post('data_cari');
			if($parameter == 'nim'){
				$cari_data = "AND t_mahasiswa.nim = '$data_masuk'";
			}else{
				$cari_data = "AND t_mahasiswa.nama LIKE '%$data_masuk%'";
			}

			$query = $this->db->query("SELECT * FROM t_ulang_mk, t_mk, t_mahasiswa WHERE t_ulang_mk.id_mhs = t_mahasiswa.id_mahasiswa AND t_ulang_mk.id_mk = t_mk.kode_mk $cari_data");
			if($query->num_rows == 0){
				$this->session->set_userdata('msg_error_src',"<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan</strong> data pencarian tidak ditemukan<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			}
		}else{
			$query = $this->db->query("SELECT * FROM t_ulang_mk, t_mk, t_mahasiswa WHERE t_ulang_mk.id_mhs = t_mahasiswa.id_mahasiswa AND t_ulang_mk.id_mk = t_mk.kode_mk LIMIT $offset, $num");
		}
		return $query->result_array();
	}

	public function input_mk_ulang(){
		$nim = $this->input->post("nim");
		$mk_ulang = $this->input->post("mk_ulang");
		$nilai_sebelum = $this->input->post("nilai_sebelum");
		$nilai_sesudah = $this->input->post("nilai_sesudah");
		$keterangan = $this->input->post("keterangan");

		//Ambil Data Mahasiswa
		$query_mahasiswa = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim = '$nim'");
		$data_m = $query_mahasiswa->row_array();
		$check_m = $query_mahasiswa->num_rows();

		//Ambil Data t_dump
		$query_dump = $this->db->query("SELECT * FROM t_dump WHERE nim = '$nim'");
		$data_dump = $query_dump->row_array();
		
		//Ambil Data Tahun Akademik
		$query_tahun = $this->db->query("SELECT * FROM t_tahun_akademik WHERE current = 'Ya'");
		$data_tahun = $query_tahun->row_array();

		//Ambil Data Mata Kuliah
		$query_mk = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$mk_ulang'");
		$data_mk = $query_mk->row_array();

		//Ambil data yang sudah dinput sebelumnya
		$query_before = $this->db->query("SELECT t_mahasiswa.nim, t_mahasiswa.nama FROM t_mahasiswa, t_detail_frs, t_nilai WHERE t_mahasiswa.id_mahasiswa = t_detail_frs.id_mhs AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_mahasiswa.nim = '$nim' AND t_detail_frs.id_mk = '$mk_ulang' AND t_detail_frs.tahun_akademik = '$data_tahun[tahun_akademik]' AND t_nilai.huruf_mutu = ' '");

		if($query_before->num_rows() == 0){
		if($check_m == 1){ //Start If else check nim
			//Check Data SKS Mahasiswa
			if($data_dump['sks'] < $data_mk['jumlah_sks']){ // Start If else check sisa sks
				$this->session->set_userdata('msg_error',"<strong><i class='icon-remove'></i> Gagal Input </strong> Maaf data sks dengan nim '$nim' tidak cukup<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			}else{
			$data_kuota = $this->db->query("SELECT * FROM t_kuota_matkul_pilihan WHERE kode_mk = '$mk_ulang'");
			$check_kuota = $data_kuota->row_array();

				if($check_kuota['kuota'] != 0){ //Start If Else Check Kuota

				//Input Data Ulang Mata Kuliah
				
				$data_ulang = array(
						'id_mhs' => $data_m['id_mahasiswa'],
						'id_mk' => $mk_ulang,
						'nilai_sebelum' => $nilai_sebelum,
						'nilai_sesudah' => $nilai_sesudah,
						'keterangan' => $keterangan,
						'semester_mk_run' => $data_dump['smt'],
						'tahun_akademik' => $data_tahun['tahun_akademik']
					);
				$this->db->insert("t_ulang_mk", $data_ulang);

				//Update SKS
				$update_sks = $data_dump['sks'] - $data_mk['jumlah_sks'];
				$update_dump = array(
					'sks' => $update_sks
					);

				$this->db->update("t_dump", $update_dump, array('nim' => $nim));

				//Update Kuota 
				$kuota_update = $check_kuota['kuota'] - 1; 
				$kuota_data = array(
					'kuota' => $kuota_update
					);
				$this->db->update('t_kuota_matkul_pilihan', $kuota_data, array('kode_mk' => $mk_ulang));

				//Input Data Nilai
				$data_nilai = array(
						'id_mahasiswa' => $data_m['id_mahasiswa'],
						'huruf_mutu' => $nilai_sesudah['huruf_mutu'],
						'id_mk' => $mk_ulang,
						'ulang_mk' => 'ya'
					);

				$this->db->insert("t_nilai", $data_nilai);
				$query_nilai = $this->db->query("SELECT id_nilai FROM t_nilai WHERE id_mk = '$mk_ulang' AND id_mahasiswa = '$data_m[id_mahasiswa]' AND ulang_mk = 'ya' AND nilai_tugas = '0' AND nilai_uts = '0' AND nilai_uas = '0' AND huruf_mutu = '$nilai_sesudah[huruf_mutu]'");
				$d_nilai = $query_nilai->row_array();
				
				//Input Data FRS

				$data_frs = array(
						'id_detail_kuota'=>'0',
						'id_mhs'=> $data_m['id_mahasiswa'],
						'id_nilai'=> $d_nilai['id_nilai'],
						'id_detail_kuota' => $check_kuota['id'],
						'id_mk'=>$mk_ulang,
						'semester'=>$data_dump['smt'],
						'tahun_akademik' => $data_tahun['tahun_akademik'],
						'status_ambil'=>'aktif'
						);
				$this->db->insert("t_detail_frs", $data_frs);
				$this->session->set_userdata('msg',"<strong><i class='icon-ok'></i> Berhasil Input </strong> Data dengan nim '$nim' sudah diinput di daftar ulang mata kuliah<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
				}else{
					$this->session->set_userdata('msg_error',"<strong><i class='icon-remove'></i> Maaf Kuota Mata Kuliah Habis </strong> Data kuota mata kuliah '$data_mk[nama_mk]' telah habis<button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
				}// End if check kuota
			} // End if check sisa sks
		}else{
			$this->session->set_userdata('msg_error',"<strong><i class='icon-remove'></i> Maaf NIM Tidak Terdaftar </strong> Data dengan nim '$nim' tidak terdaftar sebagai mahasiswa <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}// End if check nim
		}else{
			$this->session->set_userdata('msg_error',"<strong><i class='icon-remove'></i> Maaf Gagal Input </strong> Data sudah diinput sebelumnya atau nilai masih kosong <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		}
		// End if check sebelumnya sudah dinput apa belum	
		redirect("c_index_aka/input_ulang_mk");

	}

	//Get Notification
	public function msg($msg,$style)
	{

		if($this->session->userdata($msg))
		{
			$message = $this->session->userdata($msg);
			echo "<div class='alert alert-$style'>$message</div>";
			$this->session->unset_userdata($msg);
		}

	}
    function getDataprodi(){
        $query="select * from t_prodi";
        $q=$this->db->query($query);    
        if ($q->num_rows() > 0){
           foreach($q->result() as $row){
               $data[]=$row;
           }
           return $data;
       }
    }
    function getDataMatakuliah($id_prodi){
        $query="select * from t_mk where id_prodi = '$id_prodi'";
        $q=$this->db->query($query);    
        if ($q->num_rows() > 0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
    }
    function getDatakelas($id_prodi){
        $query="select * from t_kelas where id_prodi = '$id_prodi'";
        $q=$this->db->query($query);    
        if ($q->num_rows() > 0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
    }

}

 ?>
