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
<li class="active">Tambah Data Mata Kuliah</li>
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
	<h2>Form Input Data Mata Kuliah</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Data Mata Kuliah
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
					
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>p_jurusan/prosesinput_mata_kuliah' enctype='multipart/form-data' />
					
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kode Mata Kuliah</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="kode_mk" placeholder="kode mata kuliah" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Mata Kuliah</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="nama_mk" placeholder="Nama mata kuliah" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Jumlah SKS</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="jumlah_sks" placeholder="jumlah sks" /> SKS
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">SKS Teori</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="sks_teori" placeholder="sks teori" /> SKS
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">SKS Praktik</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="sks_praktek" placeholder="sks praktik" /> SKS
								</div>
							</div>


							<?php

								$semester = array(
									'semester_1' => '1',
									'semester_2' => '2',
									'semester_3' => 'Gasal',
									'semester_4' => 'Genap'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Semester</label>
								<div class="controls">
									<select id="form-field-select-1" name="semester">
										<option>-- Pilih --</option>
										<?php

											//Loop semester

											foreach($semester as $semester){

										?>

										<option value="<?php echo $semester; ?>" /><?php echo $semester; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>
							
							
							<?php

								$praktikum = array(
									'praktikum_1' => 'Ya',
									'praktikum_2' => 'Tidak'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Praktikum</label>
								<div class="controls">
									<select id="form-field-select-1" name="is_pratikum">
										<option>-- Pilih --</option>
										<?php

											//Loop praktikum

											foreach($praktikum as $praktikum){

										?>

										<option value="<?php echo $praktikum; ?>" /><?php echo $praktikum; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<?php

								$status = array(
									'status_1' => 'Wajib',
									'status_2' => 'Pilihan',
									'status_2' => 'Akhir'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Status Ambil Mata Kuliah</label>
								<div class="controls">
									<select id="form-field-select-1" name="status">
										<option>-- Pilih --</option>
										<?php

											//Loop status

											foreach($status as $status){

										?>

										<option value="<?php echo $status; ?>" /><?php echo $status; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Mata kuliah prasarat</label>

								<div class="controls">
									<input type="text" id="form-field-1" name="id_mk_prasarat" placeholder="mata kuliah prasarat" />
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