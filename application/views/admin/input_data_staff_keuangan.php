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
<li class="active">Tambah Data Staff</li>
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
	Akademi Kimia Analisis
</h1>
</div><!--/.page-header-->

<div class="row-fluid">
	<h2>Form Input Data Staff</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Data Staff
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
					
						<div class="form-horizontal">
						<?php echo form_open_multipart('c_index_aka/prosesinput_data_staff_keuangan');?>
							<input type="hidden" id="form-field-1" name="tipe" value="keuangan" />
							<div class="control-group">
														<label class="control-label" for="form-field-2">Foto</label>

														<div class="controls">
															<input type="file" name="userfile" />
														</div>
													</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">NIP </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="nip" placeholder="NIP" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Staff </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="nama" placeholder="Nama Staff" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat
								</label>

								<div class="controls">
									<textarea rows = "4" id="form-field-1" name="alamat"></textarea>
									&nbsp &nbsp
									Format penulisan alamat :
									(Jalan, RT/RW, Kelurahan,  
									Kecamatan, Kota/Kabupaten, 
									Kode Pos, Propinsi)
								</div>	

							</div>

							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nomor Telp </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="no_telp" placeholder="No Telp" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" >Tempat Tanggal Lahir </label>

								<div class="controls">
									<input type="text" name="tempat_lahir" placeholder="Tempat Lahir" />
									<br><br>
									<select id="form-field-select-1" name="tanggal_lahir">
										<option value="" />--Tanggal Lahir--
										<?php

										 for ($i=1; $i <32 ; $i++) { 

										?>
										<option value="<?php echo $i; ?>" /><?php echo $i; ?>
										<?php 
											}
										 ?>
									</select>

									<br><br>
								<select id="form-field-select-1" name="bulan_lahir">
										<option value="" />--Bulan Lahir--
										<?php

											$mounth = array('Januari' => 'Januari', 'Februari' => 'Februari', 'Maret' => 'Maret', 'April' => 'April', 'Mei' => 'Mei', 'Juni' => 'Juni', 'Juli' => 'Juli', 'Agustus' => 'Agustus', 'September' => 'September', 'Oktober' => 'Oktober', 'November' => 'November', 'Desember' => 'Desember'); 
											foreach ($mounth as $mounth) {
																					
										 ?>
										<option value="<?php echo $mounth; ?>" /><?php echo $mounth; ?>

										<?php 
											}
										 ?>
									</select>

									<br><br>

									<select id="form-field-select-1" name="tahun_lahir">
										<option value="--Tahun--" />--Tahun--
										<?php

											//Loop Year

											

											for ($i = 1945; $i <= 2014; $i++) { 
										
										?>

										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>

										<?php
											
											}

										?>
									</select>

								</div>
							</div>

							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Gelar </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="gelar" placeholder="gelar" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Username </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="username" placeholder="username" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Password</label>

								<div class="controls">
									<input type="password" id="form-field-1" name="password" placeholder="password" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Level</label>
									<div class="controls">
									<input type="text" name="level" readonly value="administrator">
									<!--<select id="form-field-select-1" name="level">
										<option>SuperUser/ Root</option>
										<option>Administrator</option>
											
									</select>-->
									</div>
							</div>

							
						<div class="form-actions">
							<input type="submit" name="add_dosen" value ="Save" class="btn btn-info">
						</div>
						
					</form>
					</div>
					</div>
				</div>
			
			</div>
</div>