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
	<li class="active">Nilai</li>
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
			Pengisian Nilai
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">

		<div class="control-group">		
				<div class="controls">
				<form method="post" action='<?php echo base_url(); ?>c_index_aka/cari_nim'>
							<select id="form-field-select-1" name='jenis_cari'>
										<option value="">--Pilih--</option>
										<option value="nim">NIM</option>
										<option value="mk">Mata Kuliah</option></select>						
			
				<div id='mk'>
							<label class="control-label" for="form-field-1">Cari Mata Kuliah</label>
							<input type="text" id="form-field-1" placeholder="Kode Mata Kuliah NIM" name="kode_mk"/>
							<input type ="submit" name="cari" value="Cari" class="btn btn-info"/>
				</div>			 					
				</form>
				</div>
		</div>
	</div><!--/.row-fluid-->
	<br>
</div><!--/.page-content-->

