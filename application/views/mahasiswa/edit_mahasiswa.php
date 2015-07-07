
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
<li class="active">Edit Data Mahasiswa</li>
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
	<h2>Form Edit Data Mahasiswa</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Edit Data Mahasiswa
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<?php foreach($edit as $data){?>
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>c_index_aka/prosesedit_mahasiswa' enctype='multipart/form-data' />
					
							<div class="control-group">
								<label class="control-label" for="form-field-2">Foto</label>
								<div class="controls">
									<input type="file" name="userfile" />
								</div>
							</div>
							
									<input type="hidden" id="form-field-1" display="hidden" name="id_mahasiswa" placeholder="NIM" value="<?php echo $data['id_mahasiswa'];?>" />
									<input type="hidden" id="form-field-1" display="hidden" name="foto" placeholder="NIM" value="<?php echo $data['foto'];?>" />
							
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">NIM </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="nim" readonly placeholder="NIM" value="<?php echo $data['nim'];?>" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Mahasiswa </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="nama" placeholder="Nama Mahasiswa" value="<?php echo $data['nama'];?>" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Angkatan</label>
								<div class="controls">
									<select id="form-field-select-1" name="angkatan">
									<?php

											foreach($tahun_aka as $tahun_aka){
												if($tahun_aka['tahun_akademik'] == $data['angkatan']){
													$s = "selected";
												}else{
													$s = "";
												}
											?>
											<option value="<?php echo $tahun_aka['tahun_akademik']; ?>" <?php echo $s; ?>><?php echo $tahun_aka['tahun_akademik']; ?></option>
										<?php
											
											}
											
										 ?>
										
									</select>
								</div>
							</div>
							
							
							<?php

								$gender = array(
									'gender_1' => 'Laki-laki',
									'gender_2' => 'Perempuan'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Jenis kelamin</label>
								<div class="controls">
									<select id="form-field-select-1" value="<?php echo $data['jenis_kelamin'];?>" name="jenis_kelamin">
										<?php

											//Loop Gender

											foreach($gender as $gender){
												if($data['jenis_kelamin'] == $gender){
													$s = "selected";
												}else{
													$s = "";
												}
										?>

										<option value="<?php echo $gender; ?>" <?php echo $s; ?>/><?php echo $gender; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat </label>

								<div class="controls">
									
									<textarea name="alamat" id="form-field-1" rows="5"><?php echo $data['alamat'];?></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Provinsi</label>
							<div class="controls">	
								<select name="provinsi">
									<?php 
										$provinsi = array(
											'1' => 'Nangroe Aceh Darussalam',
											'2' => 'Sumatera Utara',
											'3' => 'Sumatera Barat',
											'4' => 'Riau',
											'5' => 'Kepulauan Riau',
											'6' => 'Jambi',
											'7' => 'Sumatera Selatan',
											'8' => 'Bangka Belitung',
											'9' => 'Lampung',
											'10' => 'Bengkulu',
											'11' => 'Jakarta',
											'12' => 'Jawa Barat',
											'13' => 'Banten',
											'14' => 'Jawa Tengah',
											'15' => 'Yogyakarta',
											'16' => 'Jawa Timur',
											'17' => 'Bali',
											'18' => 'Nusa Tenggara Timur',
											'19' => 'Nusa Tenggara Barat',
											'20' => 'Kalimantan Barat',
											'21' => 'Kalimantan Tengah',
											'22' => 'Kalimantan Selatan',
											'23' => 'Kalimantan Timur',
											'24' => 'Kalimantan Utara',
											'25' => 'Sulawesi Utara',
											'26' => 'Sulawesi Tengah',
											'27' => 'Sulawesi Selatan',
											'28' => 'Sulawesi Tenggara',
											'29' => 'Sulawesi Barat',
											'30' => 'Gorontalo',
											'31' => 'Maluku',
											'32' => 'Maluku Utara',
											'33' => 'Papua',
											'34' => 'Papua Barat'
										);
										foreach($provinsi as $provinsi){
											if($provinsi == $data['provinsi']){
												$s = "selected";
											}else{
												$s = "";
											}
									?>
										<option value="<?php echo $provinsi; ?>" <?php echo $s; ?>><?php echo $provinsi; ?></option>
									<?php
										}
									 ?>
								</select>
							</div>	
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kabupaten/Kota</label>

								<div class="controls">
									<input type="text" id="form-field-1" name="kabupaten" placeholder="Kabupaten/Kota" value="<?php echo $data['kabupaten']; ?>" required/>
								</div>
							</div>
							<hr>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Tahun Lulus AKA </label>
								<div class="controls">
									<input type="text" name="tahun_lulus" id="form-field-1" rows="5" value="<?php echo $data['tahun_lulus'];?>" placeholder="Tahun Lulus"/>
								</div>
							</div>
							<hr>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kode pos </label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['kode_pos'];?>" name="kode_pos" placeholder="Alamat" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Tempat Tanggal Lahir </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $data['ttl']; ?>"/>


								</div>
							</div>

							<?php

								$sn = array(
									'sn_1' => 'Sudah menikah',
									'sn_2' => 'Belum menikah'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Status Nikah</label>
								<div class="controls">
									<select id="form-field-select-1" name="status_nikah">
										
										<?php

											//Loop sn

											foreach($sn as $sn){
												if($data['status_nikah'] == $sn){
													$s = "selected";
												}else{
													$s = "";
												}
										?>
										
										<option value="<?php echo $sn; ?>" <?php echo $s; ?>/><?php echo $sn; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<?php

								$gol = array(
									'gol_1' => 'A',
									'gol_2' => 'B',
									'gol_3' => 'O',
									'gol_4' => 'AB',
									'gold_5' => '-'
									);


							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Golongan Darah</label>
								<div class="controls">
									<select id="form-field-select-1" name="golongan_darah">
										
										<?php

											//Loop gol

											foreach($gol as $gol){
												if($data["golongan_darah"] == $gol){
													$s = "selected";
												}else{
													$s = "";
												}
										?>
										
										<option value="<?php echo $gol; ?>" <?php echo $s; ?>/><?php echo $gol; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<?php

								$agama = array(
									'agama_1' => 'Islam',
									'agama_2' => 'Kristen Protestan',
									'agama_3' => 'Kristen Katolik ',
									'agama_4' => 'Katolik',
									'agama_5' => 'Budha',
									'agama_6' => 'Hindu',
									'agama_7' => 'Lainnya'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Agama</label>
								<div class="controls">
									<select id="form-field-select-1" name="agama">
										
										<?php

											//Loop agama

											foreach($agama as $agama){
												if($data['agama'] == $agama){
													$s = "selected";
												}else{
													$s = "";
												}
										?>
										
										<option value="<?php echo $agama; ?>" <?php echo $s; ?>/><?php echo $agama; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">No ponsel </label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['no_ponsel'];?>" name="no_ponsel" placeholder="no ponsel" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Jalur masuk </label>

								<div class="controls">
									<select name="jalur_masuk" id="">
									<?php 

										$jalur_masuk = array(
											'1' => "Ujian Tulis",
											'2' => "Seleksi Raport",
											'3' => "Undangan"

										);
										foreach ($jalur_masuk as $key => $value) {
										
										if($data['jalur_masuk'] == $value){
											
											$s = "selected";
										
										}else{
											
											$s = "";
										
										}
									 ?>
										<option value="<?php echo $value; ?>" <?php echo $s; ?>><?php echo $value; ?></option>
									<?php 
										}
									 ?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Asal Sekolah </label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['asal_sekolah'];?>" name="asal_sekolah" placeholder="Asal Sekolah" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat Sekolah </label>

								<div class="controls">
									<textarea name="alamat_sekolah" id="form-field-1" rows="5"><?php echo $data['alamat_sekolah'];?></textarea>
								</div>
							</div>							
							<?php

								$jurusan = array(
									
									'jurusan_1' => 'IPS',
									'jurusan_2' => 'IPA',
									'jurusan_3' => 'Bahasa',
									'jurusan_4' => 'SMK'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Jurusan</label>
								<div class="controls">
									<select id="form-field-select-1" name="jurusan">
										
										<?php

											//Loop agama

											foreach($jurusan as $jurusan){
												if($data["jurusan"] == $jurusan){
													$s = "selected";
												}else{
													$s = "";
												}
										?>
										
										<option value="<?php echo $jurusan; ?>" <?php echo $s; ?>/><?php echo $jurusan; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Program Studi</label>
								<div class="controls">
									<select id="form-field-select-1" name="prodi">
										
										<?php

											//Loop agama

											foreach($prodi as $prodi){
												if($data['program_studi'] == $prodi['prodi']){
													
													$s = "selected";
												
												}else{

													$s = "";

												}
										?>
										
										<option value="<?php echo $prodi['prodi']; ?>" <?php echo $s; ?>/><?php echo $prodi['prodi'];; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Orang Tua </label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['nama_ortu'];?>" name="nama_ortu" placeholder="Nama Orang Tua" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat Orang Tua</label>
								<div class="controls">
									<textarea name="alamat_ortu" id="form-field-1" rows="5"><?php echo $data['alamat_ortu'];?></textarea>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">No Ponsel Orang Tua</label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['no_ponsel_ortu'];?>" name="no_ponsel_ortu" placeholder="No Ponsel Orang Tua" />
								</div>
							</div>

							

							<div class="control-group">
								<label class="control-label" for="form-field-1">Pekerjaan</label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['pekerjaan'];?>" name="pekerjaan" placeholder="Pekerjaan" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Pendidikan Orang Tua</label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['pend_ortu'];?>" name="pend_ortu" placeholder="Pendidikan Orang Tua" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">No Telepon</label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['no_telp'];?>" name="no_telp" placeholder="No Telpon" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Kelas</label>
									<div class="controls">
									<select id="form-field-select-1" name="id_kelas">
									
										<?php 
											foreach($kelas as $row){ 
												if($data['id_kelas'] == $row['id_kelas']){

													$s = "selected";
												}else{
													$s = "";
												}
												?>
											<option value="<?php echo $row['id_kelas'];?>" <?php echo $s;?> ><?php echo $row['nama_kelas'];?></option>
											
										<?php
											}
										?>
									</select>
									</div>
							</div>

							<?php

								$status = array(
									'status_1' => 'Aktif',
									'status_2' => 'Non aktif',
									'status_3' => 'Cuti',
									'status_4' => 'Drop out',
									'status_5' => 'Mengundurkan diri',
									'status_6' => 'Alumni/Lulus'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Status kuliah</label>
								<div class="controls">
									<select id="form-field-select-1" name="status_kuliah">
										
										<?php

											//Loop agama

											foreach($status as $status){
												if($data["status_kuliah"] == $status){
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
							<hr>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Instansi Alumni </label>
								<div class="controls">
									<input type="text" name="instansi_alumni" id="form-field-1" rows="5" value="<?php echo $data['instansi_alumni'];?>" placeholder="Instansi Alumni"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat Instansi </label>

								<div class="controls">
									<textarea name="alamat_instansi" id="form-field-1" rows="5"><?php echo $data['alamat_instansi'];?></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Telepon Instansi </label>
								<div class="controls">
									<input type="text" name="telepon_instansi" id="form-field-1" rows="5" value="<?php echo $data['telepon_instansi'];?>" placeholder="Telepon Instansi"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kode Pos Instansi </label>

								<div class="controls">
									<input type="text" name="kode_pos_instansi" id="form-field-1" rows="5" value="<?php echo $data['kode_pos_instansi'];?>" placeholder="Kode Pos Intansi"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Tahun Wisuda</label>
								<div class="controls">
									<input type="text" name="tahun_wisuda" placeholder = "Tahun Wisuda" value="<?php echo $data['tahun_wisuda']; ?>">		
										
									</select>
								</div>
							</div>
							<hr>
						
						
						<div class="form-actions">
							<input type="submit" name="add_mahasiswa" value ="Save" class="btn btn-info">
						</div>
						
					</form>
					<?php
					}
					?>
					</div>
				</div>
			
			</div>
</div>