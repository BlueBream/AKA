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
<li class="active">Detail Data Mahasiswa</li>
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
						Detail Data Mahasiswa
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<?php foreach($data as $data){?>
						<form class="form-horizontal" action="<?php echo base_url(); ?>p_jurusan/data_mahasiswa"/>
					
							<div class="control-group">
								<label class="control-label" for="form-field-2">Foto : </label> &nbsp; &nbsp; &nbsp;
								<img style="width:250px;height:250px;margin-top:11px;"src="<?php echo base_url(); ?>/assets/images/<?php echo $data['foto']; ?>">
							</div>
							
									<input type="hidden" id="form-field-1" display="hidden" name="id_mahasiswa" placeholder="NIM" value="<?php echo $data['id_mahasiswa'];?>" />
									<input type="hidden" id="form-field-1" display="hidden" name="foto" placeholder="NIM" value="<?php echo $data['foto'];?>" />
							
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">NIM : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['nim']; ?></span>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['nama']; ?></span>
							</div>
							<div class="control-group">
																<label class="control-label" for="form-field-1">Angkatan : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['angkatan']; ?></span>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Jenis Kelamin : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['jenis_kelamin']; ?></span>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['alamat']; ?></span>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Provinsi : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['provinsi']; ?></span>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kabupaten/Kota : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['kabupaten']; ?></span>
							</div>
							
							<div class="control-group">
																<label class="control-label" for="form-field-1">Kode Pos : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['kode_pos']; ?></span>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Tempat Tanggal Lahir : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['ttl']; ?></span>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Status Nikah : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['status_nikah']; ?></span>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Golongan Darah : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['golongan_darah']; ?></span>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Agama : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['agama']; ?></span>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Nomor Ponsel : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['no_ponsel']; ?></span>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Jalur Masuk : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['jalur_masuk']; ?></span>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Asal Sekolah : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['asal_sekolah']; ?></span>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat Sekolah : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['alamat_sekolah']; ?></span>
							</div>							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Jurusan : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['jurusan']; ?></span>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Orang Tua : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['nama_ortu']; ?></span>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat Orang Tua : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['alamat_ortu']; ?></span>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nomor Ponsel Orang Tua : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['no_ponsel_ortu']; ?></span>
							</div>

							

							<div class="control-group">
								<label class="control-label" for="form-field-1">Pekerjaan Orang Tua : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['pekerjaan']; ?></span>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Pendidikan Orang Tua : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['pend_ortu']; ?></span>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Nomor Telepon Mahasiswa : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['no_telp']; ?></span>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Kelas : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['nama_kelas']; ?></span>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Status Kuliah : </label>
								<span style="font-size:15px; padding-top:5px; margin-left:20px;float:left; font-weight:bold;"> <?php echo $data['status_kuliah']; ?></span>
							</div>
						
						
						<div class="form-actions">
							<button class="btn btn-info">Kembali</button>
						</div>
					<?php
					}
					?>
					</div>
				</div>
				</form>
			</div>
</div>