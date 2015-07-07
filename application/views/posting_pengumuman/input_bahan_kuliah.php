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
<li class="active">Input Bahan Kuliah</li>
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
	<h2>Form Input Bahan Kuliah</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Data Bahan Kuliah
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
					
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>c_index_aka/prosesinput_bahan_kuliah' enctype='multipart/form-data' />
					
							<?php

								$q = $this->db->get('t_mk');
								$data = $q->result();

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Mata Kuliah</label>
								<div class="controls">
									<select id="form-field-select-1" name="id_mk">
										<option>---pilih--- </option>
										<?php

											//Loop agama

											foreach($data as $row){ 

										?>
										
										<option value="<?php echo $row->id_mk;?>"><?php echo $row->kode_mk;?> - <?php echo $row->nama_mk;?></option>

										<?php

											}

										?>
									</select>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="nama" placeholder="Nama file" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Keterangan</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="keterangan" placeholder="Keterangan" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Path</label>

								<div class="controls">
									<input type="file" id="form-field-1" required name="userfile" placeholder="file yang diijinkan pdf, html, zip, rar" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Tampil</label>
								<div class="controls">
									<select id="form-field-select-1" name="is_tampil">
										<option>-- Pilih --</option>
										<option>Tampilkan</option>
										<option>Tidak Ditampilkan</option>
									</select>
								</div>

						<div class="form-actions">
							<input type="submit" value ="Save" class="btn btn-info">
						</div>
						
					</form>
					</div>
				</div>
			
			</div>
</div>