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
	<li class="active">Report Indeks Prestasi Mahasiswa Berdasarkan Tingkatan</li>
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
		Form Report Indeks Prestasi Mahasiswa Berdasarkan Tingkatan
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<form method="post" action= "<?php echo base_url();?>c_index_aka/report_indeks_prestasi">
		<div class="control-group">
		<div class="controls">
		<label class="control-label" for="form-field-1">Tingkatan</label>
			<div class="controls">
				<select name="semester">
					<?php 
						for ($i=1; $i <= 5 ; $i++) { 
					?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php
						}
					 ?>

				</select>
			</div>
		</div>
		<div class="controls">
		<label class="control-label" for="form-field-1">Tahun Akademik</label>
			<select name="tahun_akademik">
				<?php foreach ($tahun_akademik as $tahun_akademik){ ?>
						<option value="<?php echo $tahun_akademik['tahun_akademik']; ?>"><?php echo $tahun_akademik['tahun_akademik']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="controls">
		<label class="control-label" for="form-field-1">Angkatan</label>
			<select name="angkatan">
				<?php foreach ($angkatan as $angkatan){ 
							$tahun_ex = explode("/", $angkatan['tahun_akademik']);
					?>
						<option value="<?php echo $angkatan['tahun_akademik']; ?>"><?php echo $tahun_ex[0]; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="controls">
		<label class="control-label" for="form-field-1">Range Ip</label>
			<label>
				<input name="range_ip" value="range_1" type="radio">
				<span class="lbl"> 0.0 s/d 1.99</span>
				
			</label>
			<label>
				<input name="range_ip" value="range_2" type="radio"> &nbsp;
				<span class="lbl"> 2.00 s/d 2.74</span>
			</label>
			<label>
				<input name="range_ip" value="range_3" type="radio">
				<span class="lbl"> 2.75 s/d 3.50</span>
			</label>
			<label>
				<input name="range_ip" value="range_4" type="radio"> &nbsp;
				<span class="lbl"> 3.51 s/d 4.00</span>
			</label>
		</div>
		<br>
			<div class="controls">
				<input type="submit" name="cari_indek" class="btn btn-info btn-small" value="Buat Laporan">
			</div>	
			
		</div>
		</form>
	</div><!--/.row-fluid-->
	<br>
</div><!--/.page-content-->

