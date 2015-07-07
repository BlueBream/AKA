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
	<li class="active">Mengatur waktu</li>
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
<div class="span4">
									<form action='<?php echo base_url(); ?>c_index_aka/p_daftar_ulang' method='POST'>
										<div class="widget-box">
											<div class="widget-header">
												<h4>Daftar Ulang</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="row-fluid">
														<label for="id-date-picker-1">Waktu FRS</label>
													</div>

													<div class="control-group">
														<div class="row-fluid input-append">													
													<select name="daftar_nama" id="form-field-select-1" >
															<option value="Pengisian FRS">Pengisian FRS
																</option>
													</select>
														</div>
													</div>
													<div class="row-fluid">
														<label for="id-date-picker-1">Tanggal Buka</label>
													</div>

													<div class="control-group">
														<div class="row-fluid input-append">
															<input class="span10 date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="tanggal_buka">
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
													</div>

											<br>


													<div class="row-fluid">
														<label for="id-date-picker-1">Tanggal Tutup</label>
													</div>

													<div class="control-group">
														<div class="row-fluid input-append">
															<input class="span10 date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="tanggal_tutup">
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
													</div>
													<div class="row-fluid">
														<label for="id-date-picker-1">Status</label>
													</div>

													<div class="control-group">
														<div class="row-fluid input-append">													
													<select name='status'>
															<option value="aktif">Aktif
																</option>
															<option value="tidak">Tidak
																</option>
													</select>
														</div>
													</div>													
							<div class="form-actions">
								<input type="submit" value ="Save" class="btn btn-info">
							</div>

												</div>	
											</div>
											</form>											
										</div>
									</div>
	</div><!--/.row-fluid-->
	<br>
</div><!--/.page-content-->

