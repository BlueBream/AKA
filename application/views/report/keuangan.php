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
	<li class="active">Data Dosen</li>
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
		Registrasi Pembayaran
		<small>
			<i class="icon-double-angle-right"></i>
			Data Mahasiswa
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<?php $this->m_aka->msg('msg', 'error'); ?>
		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data Pembayaran</label>
					<br>	
					<form method="post" action="<?php echo base_url(); ?>c_index_aka/report_keuangan">
						<!--<input type="text" id="form-field-1" name="src" placeholder="cari berdasarkan nim" />-->
						<div class="controls">
						<label for="id-date1">Tanggal awal</label>
						<div style="width:300px;"class="row-fluid input-append">
						&nbsp;
															<input class="span10 date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="date1">
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
														</div>
						<div class="controls">							
						<label for="id-date2">Tanggal Akhir</label> 
						<div style="width:300px;"class="row-fluid input-append">
						&nbsp;
															<input class="span10 date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="date2">
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
													</div>
													<br>	
						<input type="submit" name="submit" class="btn btn-small btn-primary" style="margin-top:-10px;">
					</form>
				</div>				
		</div>
	</div><!--/.row-fluid-->


