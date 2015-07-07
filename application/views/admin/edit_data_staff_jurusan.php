
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
<li class="active">Edit Data Staff</li>
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
	<h2>Form Edit Data Staff</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Edit Data Staff
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<?php foreach($edit as $data){?>
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>c_index_aka/prosesedit_data_staff_jurusan' enctype='multipart/form-data' />
					
							<div class="control-group">
								<label class="control-label" for="form-field-2">Foto</label>
								<div class="controls">
									<input type="file" name="userfile" />
								</div>
							</div>
							
									<input type="hidden" id="form-field-1" display="hidden" name="id_user" placeholder="id dosen" value="<?php echo $data['id_user'];?>" />
									<input type="hidden" id="form-field-1" display="hidden" name="foto" placeholder="foto" value="<?php echo $data['foto'];?>" />
							
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">NIP </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="nip" placeholder="NIM" value="<?php echo $data['nip'];?>" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Staff</label>

								<div class="controls">
									<input type="text" id="form-field-1" name="nama" placeholder="Nama Staff" value="<?php echo $data['nama'];?>" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Alamat </label>

								<div class="controls">
									
									<textarea name="alamat" id="form-field-1" rows="5"><?php echo $data['alamat'];?></textarea>
								</div>
							</div>
							<hr>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nomor Telp</label>
								<div class="controls">
									<input type="text" name="no_telp" id="form-field-1" rows="5" value="<?php echo $data['no_telp'];?>" placeholder="Nomor telp"/>
								</div>
							</div>
							<hr>
							
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Tempat Tanggal Lahir </label>

								<div class="controls">
									<input type="text" id="form-field-1" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $data['tempat_lahir']; ?>"/>
									<input type="text" id="form-field-1" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $data['tgl_lahir']; ?>"/>
								</div>
							</div>

							

							<div class="control-group">
								<label class="control-label" for="form-field-1">Gelar </label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['gelar'];?>" name="gelar" placeholder="gelar" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">username </label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['username'];?>" name="username" placeholder="username" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Level</label>
									<div class="controls">
									<select id="form-field-select-1" name="level">
										<option>SuperUser/ Root</option>
										<option>User</option>
											
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