<?php 
$login2 = $this->session->userdata('login');
$tipe2 =  $this->session->userdata('level_s');
if($login2 == true && $tipe2 == "jurusan"){
	// Get The Content From Directory Views
	$this->load->view('parts/jurusan/header');
	$this->load->view('parts/jurusan/sidebar');
	$this->load->view($content);
	$this->load->view('parts/jurusan/footer');
}else{
	redirect('c_index_aka/pilih_menu');
}
 ?>
 