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
<li class="active">Input Pengumuman Akademik</li>
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
	<h2>Form Input Pengumuman Akademik</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Data Pengumuman Akademik
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
					
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>c_index_aka/prosesinput_pengumuman_akademik' enctype='multipart/form-data' />
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Bahan</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="nama" placeholder="nama bahan" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Keterangan</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="keterangan" placeholder="Keterangan" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">File</label>

								<div class="controls">
									<input type="file" id="form-field-1" required name="userfile" placeholder="Nama file" />
								</div>
							</div>


							<input type="hidden" id="form-field-1" required name="tgl_buat" value="<?php echo date("Y/m/d"); ?>" placeholder="Nama file" />
						<div class="form-actions">
							<input type="submit" value ="Save" class="btn btn-info">
						</div>
						
					</form>
					</div>
				</div>
			
			</div>
</div>