<?php

class M_dosen extends CI_Model{
	public function biodata($id){
		$this->db->where('id_dosen',$id);
		return $this->db->get('t_dosen');
	}
	function edit_data_dosen($id){
		
		$data = $this->db->query("SELECT * FROM t_dosen WHERE id_dosen ='$id'");
		return $data->result_array();
	}	
		public function get_all_mk($t_mk)
	{
		
		$data = $this->db->get($t_mk);
		return $data->result_array();
	}

	public function update_waktu_nilai_for_dosen(){
		
		$save = $this->input->post('save_waktu_nilai');
		if(!empty($save)){
			$tanggal_waktu = $this->input->post("tanggal_waktu");
			$data = array(
				'waktu_nilai' => $tanggal_waktu,
				'update' => 'Tidak'
			);
			$this->db->update("t_waktu_nilai", $data, array('id_waktu_nilai' => '1'));
			$this->session->set_userdata('msg', "<strong><i class='icon-ok'></i> Berhasil Update Waktu </strong> Waktu pengisian nilai sudah diupdate <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			$redirect = redirect("c_index_aka/waktu_nilai");
		}else{
			$redirect = "";
		}
		//if($edit){
		$tanggal = date('d');
		$bulan = date('m');
		$tahun = date('Y');

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
					'update' => "Ya"
				);
				$this->db->update("t_nilai", $data, array('huruf_mutu' => ""));
				$this->db->update("t_waktu_nilai", $data2, array('id_waktu_nilai' => '1'));
				
			}
		}
		
		echo $redirect;	
		
	}

	public function password_simak($id){
		$pass_baru = md5($this->input->post('password_baru'));
		return  $this->db->query("UPDATE t_dosen SET password_simak='$pass_baru' WHERE id_dosen='$id'");
	}
/* -------------------------------------------- START MAHASISWA PESERTA ------------------------------------------------- */
	public function mhs_peserta($id,$kode_mk,$tahun_akademik){
		$offset = $this->uri->segment(4);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."p_dosen/mhs_peserta/$kode_mk";
		$config['per_page'] = 20;
		$config['total_rows'] = $this->db->query("SELECT * FROM t_detail_frs as a,t_mahasiswa as b WHERE a.id_mk='$kode_mk' AND a.id_mhs = b.id_mahasiswa")->num_rows();
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
			$src = "a.tahun_akademik LIKE '%$tahun_akademik%' AND";

		}else{
			$src = "";
		}		
		$data = $this->db->query("SELECT * FROM t_detail_frs as a,t_mahasiswa as b WHERE $src a.id_mk='$kode_mk' AND a.id_mhs = b.id_mahasiswa ORDER BY b.nama ASC LIMIT $offset,$num");
		return $data->result_array();
	}
/* -------------------------------------------- END MAHASISWA PESERTA ------------------------------------------------- */
/* -------------------------------------------- START BAHAN KULIAH ------------------------------------------------- */
	public function bahan_kuliah($id,$id_mk){
		$offset = $this->uri->segment(4);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."p_dosen/bahan_kuliah/$id_mk";
		$config['per_page'] = 20;
		$config['total_rows'] = $this->db->query("SELECT * FROM t_download_mk as a,t_mk as b WHERE a.id_mk='$id_mk' AND a.id_mk = b.id_mk")->num_rows();
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

		return $this->db->query("SELECT * FROM t_download_mk as a,t_mk as b WHERE a.id_mk='$id_mk' AND a.id_mk = b.id_mk ORDER BY b.id_mk DESC LIMIT $offset,$num");
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
/* -------------------------------------------- END BAHAN KULIAH ------------------------------------------------- */
/* -------------------------------------------- START KIRIM PESAN ------------------------------------------------- */
	public function kirim_pesan($id,$id_mhs){
		$tanggal = date("Y-m-d");
		$get_id_bimbingan = $this->db->query("SELECT * FROM t_bimbingan WHERE id_dosen='$id' AND id_mahasiswa='$id_mhs'")->row();
		$id_bimbingan = $get_id_bimbingan->id_bimbingan;
		$data=array(
			'id_bimbingan'=>$id_bimbingan,
			'pesan'=>$this->input->post('pesan'),
			'subject'=>$this->input->post('subject'),
			'tanggal'=>$tanggal,
			'id_konsultasi_parent'=>$id,
			'done_by'=>'dosen',						
			'dibaca'=>'belum',
			'dibacah_mhs'=>'belum',			
			);
		return $this->db->insert('t_konsultasi',$data);
	}

	/* -------------------------------------------- END KIRIM PESAN------------------------------------------------- */
	/* -------------------------------------------- START DAFTAR PERCAKAPAN ------------------------------------------------- */
	public function daftar_percakapan($id){
		$get_id_bimbingan = $this->db->query("SELECT * FROM t_bimbingan WHERE id_dosen='$id'")->row();
		$id_bimbingan = $get_id_bimbingan->id_bimbingan;
		return $this->db->query("SELECT *,a.tanggal as tanggal_konsul FROM t_konsultasi as a,t_bimbingan as b,t_dosen as c WHERE b.id_dosen = c.id_dosen AND a.id_bimbingan = b.id_bimbingan AND a.id_bimbingan='$id_bimbingan'  ORDER BY id_konsultasi DESC");
	}
	public function pesan($id,$id_konsultasi){
		$this->db->query("UPDATE t_konsultasi SET dibacah_mhs='sudah',dibaca='sudah' WHERE id_konsultasi='$id_konsultasi'");
		return $this->db->query("SELECT * FROM t_konsultasi WHERE id_konsultasi='$id_konsultasi'");
	}
	public function done_by($id,$id_konsultasi){
		$get_konsul = $this->db->query("SELECT * FROM t_konsultasi WHERE id_konsultasi='$id_konsultasi'")->row();
		$id_konsultasi_parent = $get_konsul->id_konsultasi_parent;
		$done_by = $get_konsul->done_by;
		if($done_by == 'mahasiswa'){
			$row =$this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa='$id_konsultasi_parent'");
		}else if($done_by == 'dosen'){
			$row =$this->db->query("SELECT * FROM t_dosen WHERE id_dosen='$id_konsultasi_parent'");
		}
		return $row;
	}	
	/* -------------------------------------------- END DAFTAR PERCAKAPAN ------------------------------------------------- */
	public function tahun_ajaran(){
		return $this->db->get('t_tahun_akademik');
	}


	/* -------------------------------------------- ISI NILAI ------------------------------------------------- */	

	public function tampil_nilai_mahasiswa(){

	
		$nim = $this->input->post('nim');
		$kode_mk = $this->uri->segment(3);
		$tahun_akademik = $this->input->post('tahun_akademik');
		
		$data_ses_mahasiswa = array(
			'nim_mahasiswa' => $nim,
			'kode_mk_mahasiswa' => $kode_mk,
			'tahun_akademik_mahasiswa' => $tahun_akademik
			);
		$this->session->set_userdata($data_ses_mahasiswa);

		$nim_mahasiswa = $this->session->userdata('nim_mahasiswa');
		$kode_mk_mahasiswa = $this->session->userdata('kode_mk_mahasiswa');
		$tahun_akademik_mahasiswa = $this->session->userdata('tahun_akademik_mahasiswa');
		$query = $this->db->query("SELECT * FROM t_mahasiswa, t_mk, t_detail_frs, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.id_mk = t_mk.kode_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_detail_frs.id_mk = '$kode_mk_mahasiswa' AND t_detail_frs.tahun_akademik = '$tahun_akademik_mahasiswa' AND t_mahasiswa.nim = '$nim_mahasiswa'");
		return $query->result_array();
		
	}
	/* -------------------------------------------- START NILAI------------------------------------------------- */
	public function nilai($id_mhs){
		$get_id = $this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa='$id_mhs'")->row();
		$nim = $get_id->nim;
		$query = $this->db->query("SELECT *,t_detail_frs.semester as smt_frs FROM t_mahasiswa, t_mk, t_nilai, t_detail_frs WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.id_mk = t_mk.kode_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_mahasiswa.nim = '$nim' ");
		return $query->result_array();
	}
	public function tampil_nilai_permahasiswa(){
		$cari_s = $this->input->post("cari");
		$cari_ber = $this->input->post('cari_berdasarkan');				
		$mata_mk_s = $this->session->userdata("id_mata_k");

		$get_kode = $this->db->query("SELECT * FROM t_mk WHERE id_mk='$mata_mk_s'")->row();
		$kode_mk_s = $get_kode->kode_mk;
		$nim_nam = $this->input->post('nim/nama');
		if($cari_ber == 'nim'){
			$get_mhs = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim LIKE '%$nim_nam%'");
			$get_row = $get_mhs->row();
			if($get_mhs->num_rows() > 0){
				$mhs = $get_row->id_mahasiswa;
			}else{
				$mhs = "";
			}
		}else if($cari_ber == 'nama'){
			$get_mhs = $this->db->query("SELECT * FROM t_mahasiswa WHERE nama LIKE '%$nim_nam%'");
			$get_row = $get_mhs->row();
			if($get_mhs->num_rows() > 0){
				$mhs = $get_row->id_mahasiswa;
			}else{
				$mhs = "";
			}
		}else{
			$mhs = '';
		}
		$this->session->set_userdata('kode_mk',$kode_mk_s);

		$kode_mk = $this->session->userdata('kode_mk');
		$cari_perkelas = $this->input->post("cari_perkelas");
		$cari_pertahun = $this->input->post("cari_keseluruhan");
		if($cari_s){
			$session_nilai = array(
				'id_mhs'=>$mhs,
				);
			$this->session->set_userdata($session_nilai);
			$id_mhs = $this->session->userdata('id_mhs');
			$query_car = " AND t_detail_frs.id_mk = '$kode_mk' AND t_detail_frs.id_mhs='$id_mhs'";	
$this->session->set_userdata('berdas',$query_car);			
		}else if($cari_perkelas){
			$idkelas = $this->input->post("perkelas");
			$kode_mk_ke = $this->session->userdata('kode_mk');
			$get_koed_kelas = $this->db->query("SELECT * FROM t_kuota_matkul_pilihan WHERE id_kelas='$idkelas' AND kode_mk='$kode_mk_ke'");
			$kode =$get_koed_kelas->row();
			if($get_koed_kelas->num_rows() > 0){
				$id_detail_kt = $kode->id;
			}else{
				$id_detail_kt ="";
			}

			$this->session->set_userdata('id_detail_kuota',$id_detail_kt);
			$id_dea = $this->session->userdata('id_detail_kuota');
			$query_car = "AND t_detail_frs.id_mk = '$kode_mk' AND t_detail_frs.id_detail_kuota='$id_dea'";
$this->session->set_userdata('berdas',$query_car);			
		}else if($cari_pertahun){
			$pertahun = $this->input->post('per_tahun_ajaran');
			$this->session->set_userdata('pertahun_ajran',$pertahun);
			$tahun_aakademik = $this->session->userdata('pertahun_ajran');
			$query_car = "AND t_detail_frs.id_mk = '$kode_mk' AND t_detail_frs.tahun_akademik='$tahun_aakademik'";
		$this->session->set_userdata('berdas',$query_car);
		}

		$data_query = $this->session->userdata('berdas');
		$query = $this->db->query("SELECT * FROM t_mahasiswa, t_mk, t_detail_frs, t_nilai WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.id_mk = t_mk.kode_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_nilai.id_mahasiswa = t_mahasiswa.id_mahasiswa $data_query");			
		if($cari_s OR $cari_perkelas OR $cari_pertahun){
			if(!$query->num_rows() > 0){
				$this->session->set_userdata('msg', "<strong><i class='icon-remove'></i> Maaf Data Tidak Ditemukan </strong> Data nilai tidak ditemukan <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
			}
		}
			return $query->result_array();
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
	/* -------------------------------------------- END NILAI ------------------------------------------------- */	
	public function get_all($table)
	{
		
		$data = $this->db->get($table);
		return $data->result_array();
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
}

 ?>
