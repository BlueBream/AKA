<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class P_dosen extends CI_Controller {
		
		function __Construct()
		{
			parent::__construct();
			$this->cek_login = $this->session->userdata('login') == true;
			$this->id = $this->session->userdata('id_dosen');
			$this->load->model('m_aka');
			$this->load->model('m_dosen');
			$this->m_dosen->update_waktu_nilai_for_dosen();
			if(!$this->nim = $this->session->userdata('id_dosen')){
				redirect('c_index_aka/pilih_menu');
			}			
		}
		public function index(){
			if($this->cek_login){
				$data['content']="pg_dosen/utama";
				$this->load->view('pg_dosen/content',$data);
			}else{
				redirect("c_index_aka/pilih_menu");
			}
		}
		public function logout(){
			$this->session->sess_destroy();
			redirect("c_index_aka/pilih_menu");
		}
/* --------------------------------------------START BIODATA ------------------------------------------------- */		
		public function biodata(){
			if($this->cek_login){			
				$id= $this->id;
				$data['data']=$this->m_dosen->biodata($id);
				$data['content']="pg_dosen/biodata";
				$this->load->view('pg_dosen/content',$data);
			}else{
				redirect("c_index_aka/pilih_menu");
			}
		}
		public function change_biodata()
		{
			if($this->cek_login){			
				$t_mk = 't_mk';
				$id= $this->id;
				$data['t_mk'] = $this->m_dosen->get_all_mk($t_mk);			
				$data['edit'] = $this->m_dosen->edit_data_dosen($id);
				$data['content'] = 'pg_dosen/edit_biodata';
				$this->load->view('pg_dosen/content', $data);
			}else{
				redirect("c_index_aka/pilih_menu");
			}
		}
		public function prosesedit_data_dosen(){
			if($this->cek_login){
				$edit = $this->m_aka->prosesedit_data_dosen();
				if($edit){
					redirect('p_dosen/biodata');
					
				}else if(!$edit){
					redirect('p_dosen/change_biodata');
					
				}
			}else{
				redirect("c_index_aka/pilih_menu");
			}
		}
/* -------------------------------------------- END BIODATA ------------------------------------------------- */
/* -------------------------------------------- START PASSWORD SIMAK ------------------------------------------------- */
		public function password_simak(){
			if($this->cek_login){			
				$data['content']="pg_dosen/password_simak";
				$this->load->view('pg_dosen/content',$data);
			}else{
				redirect("c_index_aka/pilih_menu");
			}			
		}
		public function proses_password_simak(){
		if($this->cek_login){
			$id= $this->id;
				$get_pass = $this->db->query("SELECT * FROM t_dosen WHERE id_dosen='$id'")->row();
				$pass_dosen = $get_pass->password_simak;
				$pass_baru = $this->input->post('password_baru');
				$konf_pass_baru = $this->input->post('konf_password_baru');
				$pass_lama = md5($this->input->post('password_lama'));
					if($pass_dosen == $pass_lama){
						if($pass_baru == $konf_pass_baru){
							$sql = $this->m_dosen->password_simak($id);
							if($sql){
								$this->session->set_userdata('msg',"Success");
								redirect('p_dosen/password_simak');
							}else{
								$this->session->set_userdata('msg_error',"Password tidak sama");
								redirect('p_dosen/password_simak');							
							}
						}else{
							$this->session->set_userdata('msg_error',"Password tidak sama");
							redirect('p_dosen/password_simak');
						}
					}else{
						$this->session->set_userdata('msg_error',"Password lama tidak sama, dan confirm password tidak sama");
							redirect('p_dosen/password_simak');
					}

			}else{
				redirect("c_index_aka/pilih_menu");
			}
		}
								
/* -------------------------------------------- END PASSWORD SIMAK ------------------------------------------------- */
/* -------------------------------------------- START MAHASISWA PESERTA ------------------------------------------------- */
		public function mhs_peserta(){
			if($this->cek_login){
				$kode_mk = $this->uri->segment(3);
				$this->session->set_userdata('kode_mk_mhs_peserta',$kode_mk);
				$id= $this->id;
				$data['kode_mk'] = $kode_mk;
				$data['data'] = $this->m_dosen->tahun_ajaran();
				$data['content'] = "pg_dosen/list_tahun_ajaran";
				$this->load->view('pg_dosen/content',$data);
			}else{
				redirect("c_index_aka/pilih_menu");
			}
		}
		public function mhs_peserta_list(){
			if($this->cek_login){
				$kode_mk = $this->uri->segment(3);
				$id= $this->id;
				$tahun_akademik = $this->input->post('tahun_ajaran');
				$data['data'] = $this->m_dosen->mhs_peserta($id,$kode_mk,$tahun_akademik);
				$data['pagination'] = $this->pagination->create_links();
				$data['content'] = 'pg_dosen/mhs_peserta';
				$this->load->view('pg_dosen/content',$data);
			}else{
				redirect("c_index_aka/pilih_menu");
			}
		}		
/* -------------------------------------------- END MAHASISWA PESERTA ------------------------------------------------- */
/* -------------------------------------------- START BAHAN KULIAH ------------------------------------------------- */
		public function bahan_kuliah(){
			if($this->cek_login){
					$id_mk = $this->uri->segment(3);
				$id= $this->id;
				$data['content'] = 'pg_dosen/bahan_kuliah';
				$this->load->view('pg_dosen/content',$data);
			}else{
				redirect("c_index_aka/pilih_menu");
			}
		}
		public function prosesinput_bahan_kuliah(){
			if($this->cek_login){
				$this->m_aka->prosesinput_bahan_kuliah();
				redirect('p_dosen');
			}else{
				redirect("c_index_aka/pilih_menu");
			}
		}		

	/*===================================== START BIMBINGAN ==================== */
		public function buat_pesan(){
			if($this->cek_login){
				$data['uri3']=$this->uri->segment(3);
				$data['content'] = 'pg_dosen/buat_pesan';
				$this->load->view('pg_dosen/content', $data);
			}else{
				redirect("c_index_aka/pilih_menu");
			}
		}
		public function kirim_pesan(){
			if($this->cek_login){
				$id=$this->id;
				$id_mhs = $this->input->post('id_mhs');			
				$sql = $this->m_dosen->kirim_pesan($id,$id_mhs);
				if($sql){
					$this->session->set_userdata('msg','Success');
					redirect('p_dosen/daftar_percakapan');
				}else{
					$this->session->set_userdata('msg_error','Failed..');
					redirect('p_dosen/buat_pesan');
				}
			}else{
				redirect("c_index_aka/pilih_menu");
			}
		}
		public function daftar_percakapan(){
			if($this->cek_login){
				$id=$this->id;
				$data['data']=$this->m_dosen->daftar_percakapan($id);
				$data['content'] = 'pg_dosen/daftar_percakapan';
				$this->load->view('pg_dosen/content', $data);
			}else{
				redirect("c_index_aka/pilih_menu");
			}	
		}
		public function pesan(){
			if($this->cek_login){
				$id=$this->id;
				$id_konsultasi = $this->uri->segment(3);
				$data['data']=$this->m_dosen->pesan($id,$id_konsultasi);
				$data['from']=$this->m_dosen->done_by($id,$id_konsultasi);
				$data['content'] = 'pg_dosen/pesan';
				$this->load->view('pg_dosen/content', $data);
			}else{
				redirect("c_index_aka/pilih_menu");
			}			
		}		

	/*===================================== END BIMBINGAN ==================== */
	
/*===================================== START NILAI ==================== */
		public function nilai(){
			if($this->cek_login){
				$id_mhs = $this->uri->segment(3);
				$data['data']=$this->m_dosen->nilai($id_mhs);
				$data['content'] = 'pg_dosen/nilai';
				$this->load->view('pg_dosen/content', $data);
			}else{
				redirect("c_index_aka/pilih_menu");
			}			
		}

		public function nilai_permahasiswa(){
				$uri3 =  $this->uri->segment(3);
				$this->session->set_userdata('id_uri',$uri3);
				$cari = $this->input->post("cari");
				$cari_perkelas = $this->input->post("cari_perkelas");
				$cari_pertahun = $this->input->post("cari_keseluruhan");
					if($cari OR $cari_perkelas OR $cari_pertahun){
						$this->session->set_userdata('cari_session', "true");
						$this->session->set_userdata('id_mata_k',$uri3);
						$this->session->set_userdata('page',$this->uri->segment(2));
					}
					$cari_session = $this->session->userdata('cari_session');
					$id_mk = $this->session->userdata("id_mata_k");
					$tahun = "t_tahun_akademik";
					$mk = "t_mk";
					$kelas = "t_kelas";
					$data['mk'] = $this->m_dosen->get_all($mk);
					$data['data_tahun'] = $this->m_dosen->get_all($tahun);
					if($cari_session == "true"){
						$query = $this->db->query("SELECT * FROM t_mk WHERE id_mk = '$id_mk'");
						$query_mk = $this->db->query("SELECT * FROM t_mk WHERE id_mk = '$id_mk'");
						$data['data'] = $this->m_dosen->tampil_nilai_permahasiswa();
						$data['ambil_mk_smt'] = $this->m_dosen->get_db_query2($query);
						$data['loop_mk'] = $this->m_dosen->get_db_query2($query_mk);
					}else{
						$data['data'] = "";
					}
					$data['content'] = "pg_dosen/permahasiswa";
					$this->load->view('pg_dosen/content', $data);
			
		
		}
		//nilai permata kuliah
		public function input_nilai(){
			$submit = $this->input->post("submit_nilai");
			$data['location'] = "input_nilai";
			$data['content'] = "pg_dosen/input_nilai_permahasiswa";
			$uri2 = $this->session->userdata('page');

			if($submit){
				$id_mk = $this->session->userdata('id_mata_k');
				$this->m_aka->proses_nilai("p_dosen/$uri2/$id_mk");
			}
			$this->load->view("pg_dosen/content", $data);
		}
		public function edit_nilai(){
			$uri2 = $this->session->userdata('page');
			$submit = $this->input->post("submit_nilai");
			$data['location'] = "edit_nilai";
			$data['content'] = "pg_dosen/edit_nilai";
			$id_mk = $this->uri->segment(4);
			$id_mhs =  $this->uri->segment(3);
			$query_mk = $this->db->query("SELECT * FROM t_mk WHERE id_mk = '$id_mk' AND 1");
			
			// Mata Kuliah
			$select = "*";
			$table = "t_mk";
			$where = "id_mk = '$id_mk'";
			 
			// Mahasiswa
			$select2 = "*";
			$table2 = "t_mahasiswa";
			$where2 = "id_mahasiswa = '$id_mhs'";
			
			// Data Nilai
			$select3 = "*";
			$table3 = "t_nilai";
			$where3 = "id_mahasiswa = '$id_mhs' AND id_mk = '$id_mk'";
			//Proses Edit

			if($submit){
				$id_mk = $this->session->userdata('id_mata_k');
				$this->m_aka->proses_edit_nilai("p_dosen/$uri2/$id_mk");
			}

			$data['mk'] = $this->m_aka->get_db_query($select, $table, $where);
			$data['mahasiswa'] = $this->m_aka->get_db_query($select2, $table2, $where2);
			$data['nilai'] = $this->m_aka->get_db_query($select3, $table3, $where3);
			$this->load->view('pg_dosen/content', $data);

		}				
			
	/*===================================== END NILAI ==================== */	
/*
	public function nama_fungsi(){
		if($this->cek_login){
			
		}
	}
*/
	}