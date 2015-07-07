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
	<li class="active">Report Nilai Per Mata Kuliah Mahasiswa</li>
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
		Form Report Nilai Per Mata Kuliah Mahasiswa
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?>c_index_aka/report_data_matkul'>
		<div class="control-group">
		<div class="controls">
			<label class="control-label" for="form-field-1">Tahun Akademik</label>
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
			<label class="control-label" for="form-field-1">Mata Kuliah</label>
				<div class="controls">	
					<select name="matkul">
						<?php

							foreach($mk as $mk){
						 ?>
						 	<option value="<?php echo $mk['kode_mk']; ?>"><?php echo $mk['kode_mk']; ?> / <?php echo $mk['nama_mk']; ?></option>
						<?php
							}
						 ?>
					</select>
				</div>	
			</div>
			<div class="controls">
				<input type="submit" name="cari_matkul" class="btn btn-info btn-small" value="Buat Laporan">
			</div>					
		</div>
		</form>
	</div><!--/.row-fluid-->
	<br>
</div><!--/.page-content-->

