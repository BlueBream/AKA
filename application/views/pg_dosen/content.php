<?php 
	// Get The Content From Directory Views
	$this->load->view('parts/dosen/header');
	$this->load->view('parts/dosen/sidebar');
	$this->load->view($content);
	$this->load->view('parts/dosen/footer');

 ?>
 