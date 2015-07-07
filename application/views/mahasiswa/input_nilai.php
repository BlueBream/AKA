
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
<li class="active">Tambah Data Mahasiswa</li>
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
	<h2>Form Input Nilai Mahasiswa</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Nilai Mahasiswa
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<?php foreach($edit as $data){?>
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>c_index_aka/prosesedit_mahasiswa' enctype='multipart/form-data' />
							<input type="hidden" id="form-field-1" display="hidden" name="id_mahasiswa" placeholder="NIM" value="<?php echo $data['id_mahasiswa'];?>" />
							
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">NIM </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="nim" placeholder="NIM" value="<?php echo $data['nim'];?>" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Mahasiswa </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="nama" placeholder="Nama Mahasiswa" value="<?php echo $data['nama'];?>" />
								</div>
							</div>
							<?php

								$angkatan = array(
									'angkatan_1' => '2001/2002',
									'angkatan_2' => '2002/2003',
									'angkatan_3' => '2003/2004',
									'angkatan_4' => '2004/2005',
									'angkatan_5' => '2005/2006',
									'angkatan_6' => '2006/2007',
									'angkatan_7' => '2007/2008',
									'angkatan_8' => '2008/2009',
									'angkatan_9' => '2009/2010',
									'angkatan_10' => '2010/2011',
									'angkatan_11' => '2011/2012',
									'angkatan_12' => '2012/2013',
									'angkatan_13' => '2013/2014',
									'angkatan_14' => '2014/2015',
									'angkatan_15' => '2015/2016'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Angkatan</label>
								<div class="controls">
									<select id="form-field-select-1" name="angkatan">
										<?php

											//Loop angkatan

											foreach($angkatan as $angkatan){

										?>

										<option value="<?php echo $angkatan; ?>" /><?php echo $angkatan; ?>

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

										?>

										<option value="<?php echo $gender; ?>" /><?php echo $gender; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat </label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['alamat'];?>" name="alamat" placeholder="Alamat" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Provinsi </label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['alamat'];?>" name="alamat" placeholder="Alamat" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat </label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['alamat'];?>" name="alamat" placeholder="Alamat" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kode pos </label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['kode_pos'];?>" name="kode_pos" placeholder="Alamat" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Tempat Tanggal Lahir </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="tempat_lahir" placeholder="Tempat Lahir" />
									<br><br>
									<select id="form-field-select-1" name="tanggal_lahir">
										<option value="" />--Tanggal Lahir--
										<?php

										 for ($i=1; $i <32 ; $i++) { 

										?>
										<option value="AL" /><?php echo $i; ?>
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
										<option value="" />--Tahun--
										<?php

											//Loop Year

											for ($i = 1945; $i <= 2014; $i++) {  
										
										?>

										<option value="<?php echo $i; ?>" /><?php echo $i; ?>

										<?php
											
											}

										?>
									</select>

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
										<option>---pilih--- </option>
										<?php

											//Loop sn

											foreach($sn as $sn){

										?>
										
										<option value="<?php echo $sn; ?>" /><?php echo $sn; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<?php

								$gol = array(
									'gol_1' => 'a',
									'gol_2' => 'b',
									'gol_3' => 'o',
									'gol_4' => 'ab'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Golongan Darah</label>
								<div class="controls">
									<select id="form-field-select-1" name="golongan_darah">
										<option>---pilih--- </option>
										<?php

											//Loop gol

											foreach($gol as $gol){

										?>
										
										<option value="<?php echo $gol; ?>" /><?php echo $gol; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							<?php

								$agama = array(
									'agama_1' => 'Islam',
									'agama_2' => 'Kristen',
									'agama_3' => 'Katolik',
									'agama_4' => 'Budha',
									'agama_5' => 'Hindu'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Agama</label>
								<div class="controls">
									<select id="form-field-select-1" name="agama">
										<option>---pilih--- </option>
										<?php

											//Loop agama

											foreach($agama as $agama){

										?>
										
										<option value="<?php echo $agama; ?>" /><?php echo $agama; ?>

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
									<input type="text" id="form-field-1" value="<?php echo $data['jalur_masuk'];?>" name="jalur_masuk" placeholder="Jalur masuk" />
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
									<input type="text" id="form-field-1" value="<?php echo $data['alamat_sekolah'];?>" name="alamat_sekolah" placeholder="Alamat Sekolah" />
								</div>
							</div>
							
							<?php

								$q = $this->db->get('t_daerah');
								$dataa = $q->result();

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Daerah asal</label>
								<div class="controls">
									<select id="form-field-select-1" name="id_daerah">
										<option>---pilih--- </option>
										<?php

											//Loop agama

											foreach($dataa as $row){ 

										?>
										
										<option value="<?php echo $row->id;?>"><?php echo $row->nama;?></option>

										<?php

											}

										?>
									</select>
								</div>
							</div>

							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kode pos asal </label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['kode_pos_ortu'];?>" name="kode_pos_ortu" placeholder="Kode pos" />
								</div>
							</div>

							<?php

								$jurusan = array(
									'jurusan_1' => 'IPA',
									'jurusan_2' => 'IPS',
									'jurusan_3' => 'Bahasa'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Jurusan</label>
								<div class="controls">
									<select id="form-field-select-1" name="jurusan">
										<option>---pilih--- </option>
										<?php

											//Loop agama

											foreach($jurusan as $jurusan){

										?>
										
										<option value="<?php echo $jurusan; ?>" /><?php echo $jurusan; ?>

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
									<input type="text" id="form-field-1" value="<?php echo $data['alamat_ortu'];?>" name="alamat_ortu" placeholder="Alamat Orang Tua" />
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
							
							
							<?php

								$kl = $this->db->get('t_kelas');
								$kelas = $kl->result();

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kelas</label>
									<div class="controls">
									<select id="form-field-select-1" name="id_kelas">
										<option value="" />--Kelas--
										<?php 
											foreach($kelas as $row){ ?>
											<option value="<?php echo $row->id_kelas;?>"><?php echo $row->nama_kelas;?></option>
											
										<?php
											}
										?>
									</select>
									</div>
							</div>

							<?php

								$status = array(
									'status_1' => 'aktif',
									'status_2' => 'non aktif'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Status kuliah</label>
								<div class="controls">
									<select id="form-field-select-1" name="status_kuliah">
										<option>---pilih--- </option>
										<?php

											//Loop agama

											foreach($status as $status){

										?>
										
										<option value="<?php echo $status; ?>" /><?php echo $status; ?>

										<?php

											}

										?>
									</select>
								</div>
							</div>
						
						
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