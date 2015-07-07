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
	<li class="active">Kohort data mahasiswa</li>
</ul><!--.breadcrumb-->

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
		Data Kohort Mahasiswa
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<?php $this->m_aka->msg('msg', 'error'); ?>
		<form method="post" action='<?php echo base_url();?>c_index_aka/report_data_kohort'>
		<div class="control-group">
		<div class="controls">
			<label class="control-label" for="form-field-1">Tahun Ajaran / Angkatan</label>
				<div class="controls">	
					<select name="tahun_akademik">
						<?php 
							foreach($data_tahun as $data_tahun){
						 ?>
						 	<option value="<?php echo $data_tahun['tahun_akademik']; ?>"><?php echo $data_tahun['tahun_akademik']; ?></option>
						<?php
							}
						 ?>
					</select>
				</div>	
			</div>
			<div class="controls">
			<label class="control-label" for="form-field-1">Program Studi</label>
				<div class="controls">	
					<select name="prodi">
						<?php

							foreach($prodi as $prodi){
						 ?>
						 	<option value="<?php echo $prodi['prodi']; ?>"><?php echo $prodi['prodi']; ?></option>
						<?php
							}
						 ?>
					</select>
				</div>	
			</div>
			<div class="controls">
			<label class="control-label" for="form-field-1">Kelas</label>
				<div class="controls">	
					<select name="kelas">
						<?php

							foreach($kelas as $kelas){
						 ?>
						 	<option value="<?php echo $kelas['id_kelas']; ?>"><?php echo $kelas['nama_kelas']; ?></option>
						<?php
							}
						 ?>
						 <option value="semua_kelas">Semua kelas</option>
					</select>
				</div>	
			</div>
			<div class="controls">
				<input type="submit" name="cari_kohort" class="btn btn-info btn-small" value="Buat Laporan">
			</div>					
		</div>
		</form>
	</div><!--/.row-fluid-->
	<br>
</div><!--/.page-content-->

