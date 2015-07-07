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
	<li class="active">Data Pengajar</li>
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
		Dosen
		<small>
			<i class="icon-double-angle-right"></i>
			Data Pengajar
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Mengajar Mata Kuliah
					</h4>
				</div>

		<div class="widget-body">
					<div class="widget-main">
						
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>p_jurusan/prosesinput_detail_matkul_dosen' enctype='multipart/form-data' />
							<?php foreach($edit as $data){?>
							<input type="hidden" id="form-field-1" value="<?php echo $data['id_dosen']; ?>" required name="id_dosen" />
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Dosen</label>

								<div class="controls">
									<input type="text" id="form-field-1" value="<?php echo $data['nama']; ?>" required name="nama" readonly />
								</div>
							</div>
							<?php } ?>
							
							<?php 
									$k = $this->db->query("SELECT * FROM t_mk");									
									//$k = $this->db->query("SELECT * FROM t_harga_sks WHERE id = 1");
									$st = $k->result();
								 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Mengajar Matkul</label>
								<div class="controls">
									<select id="form-field-select-1" name="id_mk">
										<option>-- Pilih --</option>
										<?php

											//Loop praktikum

											foreach($st as $row){

										?>

										<option value="<?php echo $row->id_mk; ?>" /><?php echo $row->kode_mk; ?>-<?php echo $row->nama_mk; ?>

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
				</div>
		</div>
	</div>
	</div><!--/.row-fluid-->
	<br>

</div><!--/.page-content-->

