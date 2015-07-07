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
	<li class="active">Pengisian FRS</li>
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
		Mahasiswa
		<small>
			<i class="icon-double-angle-right"></i>
			Pengisian FRS
		</small>
	</h1>
</div><!--/.page-header-->


	<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?>c_index_aka/cari_nim'>
		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data Mahasiswa</label>
					<input type="text" id="form-field-1" placeholder="" name="data_mahasiswa_a" required autocomplete="off"/>
				</div>
				<div class="controls">
					<label class="control-label" for="form-field-1">Parameter Pencarian</label>				
					<select id="form-field-select-1" name="parameter">
										<option value="nim" />NIM
										<option value="mahasiswa" />Nama Mahasiswa
										<option value="angkatan" />Angkatan
									</select><br><br>
				<input style="margin-top:-10px;"type="submit" name="parameter_pencarian" class="btn btn-small btn-primary" value="Cari">
				</div>
		</div>
		</form>
	</div><!--/.row-fluid-->
	<br>
</div><!--/.page-content-->

