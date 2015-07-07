
			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon- home-icon"></i>
							<a href="#">Home</a>
						</li>
					</ul><!--.breadcrumb-->
<?php 
echo $this->m_aka->msg('msg_error','alert-error');	
echo $this->m_aka->msg('msg','alert-success');	
?>
					<div class="nav-search" id="nav-search">
						<form class="form-search" />
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="icon-search nav-search-icon"></i>
							</span>
						</form>
					</div><!--#nav-search-->
				</div>

				<div class="page-content">

					<div class="row-fluid">
					<?php 
						$nim = $this->session->userdata('nim_s');
						$query = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim = '$nim'");
						$querymhs = $query->row_array();
						if($querymhs['pendaftaran'] == 'tutup'){
					?>
						<div class="alert alert-info">Anda Belum Daftar Ulang Silahkan Daftar Ulang Terlebih Dahulu Sebelum Mengisi FRS</div>
					<?php
						}else{
					?>
						<div class="alert alert-info">Anda Sudah Daftar Ulang Silahkan Isi FRS</div>
					<?php
						}

					 ?>
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->
