<?php

class M_mahasiswa extends CI_Model{
	public function download(){
		//Pagination

			$offset = $this->uri->segment(3);
			if(empty($offset)){
				$offset = 0;
			}
			$config['base_url'] = base_url()."p_mahasiswa/download/";
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

	public function pengumuman_akademik(){
		$config['base_url'] = '<?php echo base_url();?>p_mahasiswa/pengumuman_akademik';
		$offset = $this->uri->segment(3);
		$cari = $this->input->post('cari');
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

	if($cari){
	$nama = $this->input->post('nama');
	$src = "WHERE nama LIKE '%$nama%'";

	}else{
		$src = "";
	}
	$data = $this->db->query("SELECT * FROM t_pengumuman_akademik $src order by id DESC limit $offset,$num"); //memanggil tabel di database
	return $data->result_array(); //		
	}	
	/* -------------------------------------------- START KIRIM PESAN ------------------------------------------------- */
	public function kirim_pesan($id){
		$tanggal = date("Y-m-d");		
		$get_id_bimbingan = $this->db->query("SELECT * FROM t_bimbingan WHERE id_mahasiswa='$id'")->row();
		$id_bimbingan = $get_id_bimbingan->id_bimbingan;
		$data=array(
			'id_bimbingan'=>$id_bimbingan,
			'pesan'=>$this->input->post('pesan'),
			'subject'=>$this->input->post('subject'),
			'tanggal'=>$tanggal,
			'id_konsultasi_parent'=>$id,
			'done_by'=>'mahasiswa',						
			'dibaca'=>'belum',
			'dibacah_mhs'=>'belum',			
			);
		return $this->db->insert('t_konsultasi',$data);
	}

	public function input_mk_ulang_m(){
		$nim = $this->input->post("nim");
		$mk_ulang = $this->input->post("mk_ulang");
		$nilai_sebelum = $this->input->post("nilai_sebelum");
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
						'id_mk' => $mk_ulang,
						'ulang_mk' => 'ya'
					);

				$this->db->insert("t_nilai", $data_nilai);
				$query_nilai = $this->db->query("SELECT id_nilai FROM t_nilai WHERE id_mk = '$mk_ulang' AND id_mahasiswa = '$data_m[id_mahasiswa]' AND ulang_mk = 'ya' AND nilai_tugas = '0' AND nilai_uts = '0' AND nilai_uas = '0' AND huruf_mutu = ''");
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
		redirect("p_mahasiswa/input_ulang_mk");

	}

	/* -------------------------------------------- END KIRIM PESAN------------------------------------------------- */
	/* -------------------------------------------- START DAFTAR PERCAKAPAN ------------------------------------------------- */
	public function daftar_percakapan($id=0){
		$get_id_bimbingan = $this->db->query("SELECT * FROM t_bimbingan WHERE id_mahasiswa='$id'");
		$get_id = $get_id_bimbingan->num_rows();
		$bimbim = $get_id_bimbingan->row();
		if($get_id > 0){
			$id_bimbingan = $bimbim->id_bimbingan;
			return $this->db->query("SELECT *,a.tanggal as tanggal_konsul FROM t_konsultasi as a,t_bimbingan as b,t_dosen as c WHERE b.id_dosen = c.id_dosen AND a.id_bimbingan = b.id_bimbingan AND a.id_bimbingan='$id_bimbingan' ORDER BY id_konsultasi DESC");
		}else{
			$this->session->Set_userdata('msg_error',"Belum mempunyai bimbingan, Silahkan konfirmasi");
			redirect('p_mahasiswa');
		}
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
/* -------------------------------------------- START JADWAL KULIAH KULIAH ------------------------------------------------- */

	public function data_jadwal_kuliah($id){
		$src = $this->input->post('src');
		if($src){
			$nama = $this->input->post('nama');
			$src1 = "AND t_download_mk.nama LIKE '%$nama%'";
		}else{
			$src1 = "";
		}
		$data = $this->db->query("SELECT * FROM t_download_mk, t_mk, t_detail_frs WHERE t_mk.id_mk=t_download_mk.id_mk AND t_detail_frs.id_mk=t_mk.kode_mk AND t_detail_frs.id_mhs='$id' $src1"); //memanggil tabel di database
		$jumlah = $data->num_rows();
		if($jumlah <= 0){
			 $this->session->set_userdata('msg_error','Bahan tidak ada');
		}
		return $data->result_array();

	}
/* -------------------------------------------- END JADWAL KULIAH ------------------------------------------------- */
	public function simpan_frs($dataSession,$nim){			
		$data_detail_2 = array();
		$data_detail_5= array();
		if($this->input->post('id_detail_kuota') == ''){
				$this->session->set_userdata('msgError',"Maaf anda harus pilih Mata kuliah terlebih dahulu");
				$this->session->unset_userdata($dataSession);
				redirect("p_mahasiswa/frs/$nim");	
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
						redirect("p_mahasiswa/frs/$nim");
						}
					if($cek_sql_frs == 0){
						if($hasil_cek_sks >=0){
							//kalaw pas jumlah sks baru bisa diinput
							$kode_mk = $this->session->userdata('kode_mk');
							$id_detail_kuota_b = $this->input->post('id_detail_kuota');
							$jml_id_b = count($id_detail_kuota_b);													
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
							$data_ses = array(
								'id_nilai' => $d_nilai['id_nilai']
								);
							$this->session->set_userdata($data_ses);
							$input_nilai[] = $this->session->userdata('id_nilai');
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
								redirect("p_mahasiswa/frs_list");
								$this->session->unset_userdata($dataSession);
							}								
						}else{
							//kalaw kurang alias lebbih, engga bisa terinput
							$this->session->unset_userdata($dataSession);
							$this->session->set_userdata('msgError',"Maaf SKS kurang");
							redirect("p_mahasiswa/frs/$nim");							
						}
					
			}
		}
		}
	}

		function frs_list($nim){
		//Pagination		
		
			return $query = $this->db->query("SELECT * FROM t_dump as a,t_mahasiswa as b WHERE a.nim = b.nim AND a.nim='$nim'");

	}
/* -------------------------------------------- START NILAI ------------------------------------------------- */
	public function tampil_semester($nim,$smt){
		$query = $this->db->query("SELECT *,t_detail_frs.semester as smt_frs FROM t_mahasiswa, t_mk, t_nilai, t_detail_frs WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.id_mk = t_mk.kode_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_mahasiswa.nim = '$nim' AND t_detail_frs.semester = '$smt' AND t_nilai.ulang_mk = 'tidak'");
		return $query->result_array();
	}

	public function nilai_IPK_semester($nim,$smt){
		$query = $this->db->query("SELECT *,t_detail_frs.semester as smt_frs FROM t_mahasiswa, t_mk, t_nilai, t_detail_frs WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.id_mk = t_mk.kode_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_mahasiswa.nim = '$nim' AND t_detail_frs.semester = '$smt' AND t_nilai.ulang_mk = 'tidak'");
		return $query->result_array();
	}
	public function nilai_IPK_akhir($nim){
		$query = $this->db->query("SELECT *,t_detail_frs.semester as smt_frs FROM t_mahasiswa, t_mk, t_nilai, t_detail_frs WHERE t_detail_frs.id_mhs = t_mahasiswa.id_mahasiswa AND t_detail_frs.id_mk = t_mk.kode_mk AND t_detail_frs.id_nilai = t_nilai.id_nilai AND t_mahasiswa.nim = '$nim' AND t_nilai.ulang_mk = 'tidak'");
		return $query->result_array();
	}			
/* -------------------------------------------- END JADWAL KULIAH ------------------------------------------------- */

}

 ?>
