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
<li class="active">Ulang Mata Kuliah</li>
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
	Akademik Kimia Analisis
</h1>
</div><!--/.page-header-->

<div class="row-fluid">
	<h3>Form Input Ulang Mata Kuliah</h3>
	<?php $this->m_aka->msg('msg','success'); ?>
	<?php $this->m_aka->msg('msg_error','error'); ?>
		<form action="<?php echo base_url(); ?>p_mahasiswa/input_ulang_mk" method="post">
				<div class="control-group">
					<div class="controls">
						<input type="hidden" value="<?php echo $this->session->userdata('nim_s'); ?>" id="form-field-1" name="nim" placeholder="NIM" required/>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="form-field-1">Mata Kuliah Yang Diulang</label>
					<div class="controls">
						<select name="mk_ulang">
						<?php 
							foreach ($mk as $mk) {
						?>
							<option value="<?php echo $mk['kode_mk']; ?>"><?php echo $mk['kode_mk']." / ".$mk['nama_mk']; ?></option>
						<?php
							}
						 ?>
					</select>
				</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-field-1">Nilai mata kuliah sebelumnya</label>
					<div class="controls">
						<input type="text" id="form-field-1" name="nilai_sebelum" placeholder="Nilai Sebelumnya" required/>
					</div>
				</div>				
				<div class="control-group">
					<label class="control-label" for="form-field-1">Keterangan
					</label>

					<div class="controls">
						<textarea rows = "7" id="form-field-1" name="keterangan"></textarea>
					</div>	

				</div>

				<input type="submit" name="add_ulang_mk" value ="Save" class="btn btn-info btn-small">
			
	</form>
</div>