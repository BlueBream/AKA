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
<li class="active">Edit Data Mata Kuliah</li>
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
	<h2>Form Edit Data Mata Kuliah</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Edit Data Mata Kuliah
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
					<div class="alert alert-info"><i class='icon-exclamation-sign'></i> Maaf untuk mengisi kode mata kuliah tidak diperbolehkan menggunakan spasi<br> <br>contoh input kode mata kuliah yang benar : KAL.11.02 &nbsp; <i class='icon-ok'></i> <br><br> contoh input kode mata kuliah yang salah : KAL 11.02 &nbsp; <i class='icon-remove'></i> <br> </a></div>
						<?php foreach($edit as $data){?>
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>c_index_aka/prosesedit_mata_kuliah' enctype='multipart/form-data' />
						<input type="hidden" id="form-field-1" value="<?php echo $data['id_mk'];?>" name="id_mk" placeholder="" />
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kode Mata Kuliah</label>

								<div class="controls">
									<input type="text" id="form-field-1" required value="<?php echo $data['kode_mk'];?>" name="kode_mk" placeholder="kode mata kuliah" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Mata Kuliah</label>

								<div class="controls">
									<input type="text" id="form-field-1" required value="<?php echo $data['nama_mk'];?>" name="nama_mk" placeholder="Nama mata kuliah" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Jumlah SKS</label>

								<div class="controls">
									<input type="text" id="form-field-1" required value="<?php echo $data['jumlah_sks'];?>" name="jumlah_sks" placeholder="jumlah sks" /> SKS
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">SKS Teori</label>

								<div class="controls">
									<input type="text" id="form-field-1" required value="<?php echo $data['sks_teori'];?>" name="sks_teori" placeholder="sks teori" /> SKS
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">SKS Praktik</label>

								<div class="controls">
									<input type="text" id="form-field-1" required value="<?php echo $data['sks_praktek'];?>" name="sks_praktek" placeholder="sks praktik" /> SKS
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
													if($data['semester'] == $semester){
														$s = "selected";
													}else{
														$s = "";
													}
										?>

										<option value="<?php echo $semester; ?>" <?php echo $s; ?> /><?php echo $semester; ?>

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
												if($data['is_pratikum'] == $praktikum){
													$s = "selected";
												}else{
													$s = "";
												}
										?>	

										<option value="<?php echo $praktikum; ?>" <?php echo $s; ?>/><?php echo $praktikum; ?>

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
									'status_3' => 'Akhir'
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
												if($data['status'] == $status){
													$s = "selected";
												}else{
													$s = "";
												}
										?>

										<option value="<?php echo $status; ?>" <?php echo $s; ?>/><?php echo $status; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Program Studi</label>
								<div class="controls">
									<select name="id_prodi" id="form-field-1">
									<option />- Pilih Program Studi -
										<?php	
										$k = $this->db->query("SELECT * FROM t_prodi");									
										$st = $k->result();
										foreach($st as $row){ 
										 ?>
										<option value="<?php echo $row->id_prodi; ?>" name="program_studi"><?php echo $row->prodi;  ?> </option>
													
											<?php
											}
										?>
						
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Mata kuliah prasarat</label>

								<div class="controls">
									<select name="id_mk_prasarat" id="form-field-1">
									<?php
										if($data['id_mk_prasarat'] == 'tidakada'){
											$s = "selected";
										}else{
											$s = "";
										}
									?>
									<option value="tidakada" <?php echo $s; ?>>Tidak Ada</option>
										<?php 
											foreach($mata_kuliah as $mata_kuliah){
												if($data['id_mk_prasarat'] == $mata_kuliah['kode_mk']){
													$s = "selected";
												}else{
													$s = "";
												}
										?>
											<option value="<?php echo $mata_kuliah['kode_mk']; ?>" <?php echo $s; ?>><?php echo $mata_kuliah['nama_mk']; ?></option>
										<?php		
											}
										 ?>
									</select>
								</div>
							</div>
							
						
						<div class="form-actions">
							<input type="submit" value ="Save" class="btn btn-info">
						</div>
						
					</form>
					<?php 
					}
					?>
					</div>
				</div>
			
			</div>
</div>