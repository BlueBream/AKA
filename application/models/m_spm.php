<?php

class m_spm extends CI_Model{
/* -------------------------------------------- START Kuesioner Mahasiswa ------------------------------------------------- */
	public function Kuesioner_Mahasiswa(){
		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."p_spm/kuesioner";
		$config['per_page'] = 10;
		$config['total_rows'] = 't_judul';
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

		$data = $this->db->query("SELECT * FROM t_judul WHERE id_judul = id_judul ");
		return $data->result_array();
	}

	//proses input mata kuliah
	public function prosesinput_Kuesioner(){
	$peringatan = "Input Data Kuesioner Berhasil !";
	$data = array(
	   'id_judul' => '',
	   'judul' => $this->input->post('judul')
	   );

	$this->db->insert('t_judul', $data); 
	$this->session->set_userdata("msg", $peringatan);
	}

	//edit kuesioner
	function edit_data_kuesioner(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("SELECT * FROM t_judul WHERE id_judul =".$id);
		return $data->result_array();
	}

	//proses edit kuesioner
	public function prosesedit_data_kuesioner(){
		$peringatan = "edit data kuesioner berhasil..";
		$data = array(
		'judul' => $this->input->post('judul')


	);
		$this->session->set_userdata("msg_success","<strong><i class='icon-ok'></i> Berhasil Edit </strong>Data Kuesioner <button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button>");
		$this->db->where('id_judul',$this->input->post('id_judul'));
		$edit = $this->db->update('t_judul',$data);
		return $edit;
		
	}

	//hapus Judul Kuesioner
	function hapus_judul_kuesioner(){
		$id = $this->uri->segment(3);
		$this->db->delete('t_judul',array('id_judul' => $id));
	}
	
/* -------------------------------------------- END Kuesioner Mahasiswa ------------------------------------------------- */

/* -------------------------------------------- START Kuesioner MK ------------------------------------------------- */
public function Kuesioner_MK(){
		$offset = $this->uri->segment(3);
		if(empty($offset)){
			$offset = 0;
		}
		$config['base_url'] = base_url()."p_spm/kuesioner";
		$config['per_page'] = 10;
		$config['total_rows'] = 't_judul';
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

		$data = $this->db->query("SELECT * FROM t_judul WHERE kode = 2");
		return $data->result_array();
	}

//proses input kuesioner
	public function prosesinput_Kuesioner_MK(){
	$peringatan = "Input Data Kuesioner Berhasil !";
	$data = array(
	   'id_judul' => '',
	   'judul' => $this->input->post('judul'),
	   'kode' => '2'
	   );

	$this->db->insert('t_judul', $data); 
	$this->session->set_userdata("msg", $peringatan);
	}

	//hapus Judul Kuesioner
	function hapus_judul_Kuesioner_MK(){
		$id = $this->uri->segment(3);
		$this->db->delete('t_judul',array('id_judul' => $id));
	}
/* -------------------------------------------- END Kuesioner MK ------------------------------------------------- */
}

 ?>
