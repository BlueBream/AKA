<div class="main-content">
<div class="breadcrumbs" id="breadcrumbs">
<ul class="breadcrumb">
	<li>
		<i class="icon- home-icon"></i>
		<a href="#">Home</a>

		<span class="divider">
			<i class="icon-angle-right arrow-icon"></i>
		</span>
	</li>
	<li class="active">Data Mata Kuliah</li>
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
<div class="page-header position-relative">
	<h1>
		Daftar Percakapan
		<small>
			<i class="icon-double-angle-right"></i>
			Daftar Percakapan
		</small>
	</h1>
</div><!--/.page-header-->

<div class="row-fluid">
			<?php
				$this->m_aka->msg('msg','alert-success');
			?>
			<div class="table-header">
				<center> Daftar Percakapan</center>
			</div>
											<div class="widget-header widget-header-small">
												<h4 class="blue smaller">
													<i class="icon-rss orange"></i>
													Percakapan
												</h4>

											</div>
									<?php

										//Loop data
										foreach ($data->result_array() as $data) {			 
									?>
										<div class="widget-box transparent">


									<div class="row-fluid">											
									<div class="widget-body">
												<div class="widget-main padding-8">

													<div id="profile-feed-1" class="profile-feed">
											 			
											 			<div class="profile-activity clearfix">
															<div>

																<?php 
																	$id_konsultasi_parent = $data['id_konsultasi_parent'];
																	$dari = $data['done_by'];
																	if($dari == "mahasiswa"){
																		$row =$this->db->query("SELECT * FROM t_mahasiswa WHERE id_mahasiswa='$id_konsultasi_parent'")->row();
																	?>
																	<i class="pull-left no-hover">
																		<img src="<?php echo base_url(); ?>assets/images/<?php echo $row->foto; ?>" alt="">
																	</i>																	
																	<a class="user" href="#"><?php echo $row->nama; ?></a>
																	<?php
																	}else if($dari == "dosen"){
																		$row =$this->db->query("SELECT * FROM t_dosen WHERE id_dosen='$id_konsultasi_parent'")->row();
																	?>
																	<i class="pull-left no-hover">
																		<img src="<?php echo base_url(); ?>assets/images/<?php echo $row->foto; ?>" alt="">
																	</i>																	
																	<a class="user" href="#"><?php echo $row->nama; ?></a>
																	<?php
																	}
																?>
																<?php echo $data['pesan']; ?>
																<div class="time">
																	<i class="icon-time bigger-110"></i>
																<?php echo $data['tanggal_konsul']; ?>
																</div>
															</div>

															<div class="tools action-buttons">
																<a href="<?php echo base_url();?>p_mahasiswa/pesan/<?php echo $data['id_konsultasi'];?>" class="blue">
																	<i class="icon-inbox bigger-250"></i>
																</a>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
										</div>
					<?php
					} ?>										
</div><!--/.page-content-->

