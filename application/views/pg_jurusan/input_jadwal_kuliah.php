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
<li class="active">Input Bahan Kuliah</li>
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
	<h2>Form Input Jadwal Kuliah</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Data Jadwal Kuliah
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
					
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>p_jurusan/prosesinput_jadwal_kuliah' enctype='multipart/form-data' />
					
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Tingkat</label>
								<div class="controls">
									<select id="form-field-select-1" name="tingkat">
										<option>---pilih--- </option>
										<option>I</option>
										<option>II</option>
										<option>III</option>
										<option>IV</option>
									</select>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Path</label>

								<div class="controls">
									<input type="file" id="form-field-1" required name="userfile" placeholder="Nama file" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Keterangan</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="keterangan" placeholder="Keterangan" />
								</div>
							</div>

						<div class="form-actions">
							<input type="submit" value ="Save" class="btn btn-info">
						</div>
						
					</form>
					</div>
				</div>
			
			</div>
</div>