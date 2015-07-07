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
<li class="active">Tambah Data Program Studi</li>
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
		<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Tambah Data Program Studi
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
					<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>c_index_aka/tambah_program_studi'/>
					<div class="control-group">
					<label class="control-label" for="form-field-1">Nama Program Studi</label>
						<div class="controls">
							<input type="text" id="form-field-1" required name="nama_prodi" placeholder="Nama Program Studi" />
						</div>
						<br>
						<div class="controls">
							<input type="submit" name="save_prodi" class="btn btn-success btn-small" value="Save">
						</div>
					</div>
					</form>
					</div>
				</div>
		</div>
</div>