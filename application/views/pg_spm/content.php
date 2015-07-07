<?php 
$login = $this->session->userdata('login');
$tipe =  $this->session->userdata('level_s');
if($login == true && $tipe == "spm"){
	// Get The Content From Directory Views
	$this->load->view('parts/spm/header');
	$this->load->view('parts/spm/sidebar');
	$this->load->view($content);
	$this->load->view('parts/spm/footer');
}else{
	redirect('c_index_aka/pilih_menu');
}
 ?>