<?php 
	//Akademik
	// Get The Content From Directory Views
	$level = $this->session->userdata('level_s');
	$login = $this->session->userdata('login_s');
	if($level == 'akademik' AND $login != true ){


	$this->load->view('parts/header');
	$this->load->view('parts/sidebar');
	$this->load->view($content);
	$this->load->view('parts/footer');
	}else{
		redirect('c_index_aka/pilih_menu');
	}


 ?>
 