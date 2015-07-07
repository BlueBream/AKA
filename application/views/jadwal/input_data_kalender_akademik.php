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
<li class="active">Tambah Data Kalender Akademik</li>
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
	<h2>Form Input Data Kalender Akademik</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Data Kalender Akademik
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
					
						<div class="form-horizontal">
						<?php echo form_open_multipart('c_index_aka/prosesinput_data_Kalender_Akademik');?>
							<?php

								$k = $this->db->get('t_tahun_akademik');
								$ta = $k->result();

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Tahun Ajaran</label>
									<div class="controls">
									<select id="form-field-select-1" name="id_ta">
										<?php 
											foreach($ta as $row){ ?>
											<option value="<?php echo $row->id;?>"><?php echo $row->tahun_akademik;?></option>
											
											<?php
											}
											?>
									</select>
									</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Kegiatan
								</label>

								<div class="controls">
									<textarea rows = "4" name="kegiatan">
										
									</textarea>
									keterangan kegiatan
								</div>	
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Tanggal </label>

								<div class="controls">
									<input type="date" id="form-field-1" name="tanggal" placeholder="gelar" />
								</div>
							</div>

						<div class="form-actions">
							<input type="submit" name="add_Kalender Akademik" value ="Save" class="btn btn-info">
						</div>
						
					</form>
					</div>
					</div>
				</div>
			
			</div>
</div>