<?php 
$login = $this->session->userdata('login');
$tipe =  $this->session->userdata('level_s');
if($login == true && $tipe == "keuangan"){
	// Get The Content From Directory Views
	$this->load->view('parts/keuangan/header');
	$this->load->view('parts/keuangan/sidebar');
	$this->load->view($content);
	$this->load->view('parts/keuangan/footer');
}else{
	redirect('c_index_aka/pilih_menu');
}
 ?>