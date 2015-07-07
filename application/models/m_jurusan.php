<?php
class M_jurusan extends CI_Model{

	/* -------------------------------------------- DATA DOSEN ------------------------------------------------- */

	// data bahan kuliah
	public function data_dosen(){
		//Pagination

		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."p_jurusan/data_dosen/";
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

	/* -------------------------------------------- END DATA DOSEN ------------------------------------------------- */

	/* -------------------------------------------- DATA BIMBINGAN ------------------------------------------------- */

	//DATA BIMBINGAN
	public function bimbingan(){
		$sql = $this->db->query("SELECT * FROM t_bimbingan as a, t_dosen as b WHERE a.id_dosen = b.id_dosen");
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
			redirect("p_jurusan/bimbingan_dosen/$id_dosen");
		}else{
			$this->session->set_userdata("msg_error","Maaf ada kesalahan saat membatalkan bimbingan.");
			redirect("p_jurusan/bimbingan_dosen/$id_dosen");
		}
	}
	public function get_mhs_bimbingan(){
		return $this->db->get('t_mahasiswa');
	}
	public function tambah_mhs_bimbingan(){
		$time = date("Y-m-d");
		$nim = $this->input->post('nim');
		$get_id_mhs = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim='$nim'");
		$jumlah_mhs = $get_id_mhs->num_rows();
		$id_dosen = $this->input->post('id_dosen');
		if($jumlah_mhs > 0){
		$get_di = $get_id_mhs->row();
		$is = $get_di->status_kuliah;
		
			if($is == ''){
				$is_lulus = "";
			}else{
				$is_lulus= $is;
			}
			$id_mhs = $get_di->id_mahasiswa;
			
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
					redirect("p_jurusan/bimbingan_dosen/$id_dosen");			
				}else{
					$this->session->set_userdata("msg_error","Maaf ada kesalahan.");
					redirect("p_jurusan/get_mhs_mahasiswa/$id_dosen");			
				}
			}else{
					$this->session->set_userdata("msg_error","Maaf mahasiswa dengan nim $nim sudah ada pembimbing");
					redirect("p_jurusan/get_mhs_mahasiswa/$id_dosen/$cek_bimbingan");			
			}
			}else{
					$this->session->set_userdata("msg_error","Maaf Nim tidak ada");
					redirect("p_jurusan/get_mhs_mahasiswa/$id_dosen/$cek_bimbingan");			
			}
		}else{
					$this->session->set_userdata("msg_error","Maaf Nim tidak ada");
					redirect("p_jurusan/get_mhs_mahasiswa/$id_dosen");				
		}
	}
	public function cek_tambah_bimbingan($nim){
		
		$get_id_mhs = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim='$nim'");
		$jml_mhs = $get_id_mhs->num_rows();
		$get_mhs = $get_id_mhs->row();
		if($jml_mhs > 0){
		$id_mhs = $get_mhs->id_mahasiswa;
		$cek_bimbingan = $this->db->query("SELECT * FROM t_bimbingan WHERE id_mahasiswa='$id_mhs'")->num_rows();

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
		$config['base_url'] = base_url()."p_jurusan/data_kalender_akademik/";
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
	/* -------------------------------------------- END DATA KALENDER AKADEMIK ------------------------------------------------- */

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

	/*===================================== END JADWAL KULIAH ==================== */
	
/* ==========================================KUOTA MATA KULIAH PILIHAN============================= */	
	public function kuota_mata_kuliah_pilihan(){
		//Pagination		
			$status= $this->session->userdata('status');
			$src=$this->session->userdata('src');
			$submit = $this->input->post('submit');
		if($status == "aktif"){//jika tombol search dicari
			$config['total_rows']=$this->db->query("SELECT * FROM t_mk as b,t_kuota_matkul_pilihan as a where b.kode_mk =a.kode_mk AND  b.nama_mk LIKE '%$src%'")->num_rows();					
			$config['base_url']=base_url().'p_jurusan/Kuota_mata_kuliah_pilihan/'.$src.'/';			
			$config['uri_segment']=4;
			$uri3=$this->uri->segment(4);
			$config['per_page']=$config['total_rows']+10;			
		}else{
			$config['total_rows'] =$this->db->query("SELECT * FROM t_mk as b,t_kuota_matkul_pilihan as a where b.kode_mk =a.kode_mk")->num_rows();			
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
			$config['base_url']=base_url().'p_jurusan/t_kuota_mata_kuliah_pilihan/';			
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
		//return $this->db->query("SELECT * FROM t_kuota_matkul_pilihan as a,t_mk as b,t_kelas as c WHERE a.kode_mk=b.kode_mk  AND a.id_kelas = c.id_kelas AND b.kode_mk='$kode'")->result();
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
			redirect('p_jurusan/Kuota_mata_kuliah_pilihan');
		}else{
			$this->session->set_userdata('msg_error','Coba kembali');			
			redirect("p_jurusan/l_edit_kuota_matkul_pilihan/$kode");			
		}		
		return $print;
	}
	
	/* ==========================================END KUOTA MATA KULIAH PILIHAN============================= */
	public function get_all($table)
	{
		$data = $this->db->get($table);
		return $data->result_array();
	}
	public function get_db_query($select, $table, $where){
		
		$data = $this->db->query("SELECT $select FROM $table WHERE $where");
		return $data->result_array();
	}	
}
