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
	<li class="active">Report Indeks Prestasi Mahasiswa</li>
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
		Form Report Indeks Prestasi Mahasiswa
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<?php $this->m_aka->msg('msg', 'error'); ?>
		<form method="post" action= "<?php echo base_url();?>c_index_aka/report_indeks_prestasi">
		<div class="control-group">
		<div class="controls">
		<label class="control-label" for="form-field-1">Semester</label>
			<div class="controls">
				<!-- <select name="semester">
					<?php 
						//for ($i=1; $i <= 10 ; $i++) { 
					?>
						<option value="<?php //echo $i; ?>"><?php //echo $i; ?></option>
					<?php
						//}
					 ?>

				</select>-->
				<label class="semesterlist">
					<input name="1" value="1-" type="checkbox">
					<span class="lbl"> 1 </span> &nbsp;
				</label>
				<label class="semesterlist">
					<input name="2" value="2-" type="checkbox">
					<span class="lbl"> 2 </span> &nbsp;
				</label>
				<label class="semesterlist">
					<input name="3" value="3-" type="checkbox">
					<span class="lbl"> 3 </span> &nbsp;
				</label>
				<label class="semesterlist">
					<input name="4" value="4-" type="checkbox">
					<span class="lbl"> 4 </span> &nbsp;
				</label>
				<label class="semesterlist">
					<input name="5" value="5-" type="checkbox">
					<span class="lbl"> 5 </span> &nbsp;
				</label>
				<label class="semesterlist">
					<input name="6" value="6-" type="checkbox">
					<span class="lbl"> 6 </span> &nbsp;
				</label>
				<label class="semesterlist">
					<input name="7" value="7-" type="checkbox">
					<span class="lbl"> 7 </span> &nbsp;
				</label>
				<label class="semesterlist">
					<input name="8" value="8-" type="checkbox">
					<span class="lbl"> 8 </span> &nbsp;
				</label>
				<label class="semesterlist">
					<input name="9" value="9-" type="checkbox">
					<span class="lbl"> 9 </span> &nbsp;
				</label>
				<label class="semesterlistlast">
					<input name="10" value="10-" type="checkbox">
					<span class="lbl"> 10 </span>
				</label>
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
				<span class="lbl"> 0.00 s/d 1.99</span>
			</label>
			<label>
				<input name="range_ip" value="range_2" type="radio">
				<span class="lbl"> 2.00 s/d 2.75</span>
			</label>
			<label>
				<input name="range_ip" value="range_3" type="radio">
				<span class="lbl"> 2.76 s/d 3.50</span>
				
			</label>
			<label>
				<input name="range_ip" value="range_4" type="radio">
				<span class="lbl"> 3.51 s/d 4.00</span>
			</label>	
		</div>
		<br>
			<div class="controls">
				<input type="submit" name="cari_indek" class="btn btn-info btn-small" value="Buat Laporan">
			</div>	
			
		</div>
		</form>
		<?php 
			
		 ?>
	</div><!--/.row-fluid-->
	<br>
</div><!--/.page-content-->

