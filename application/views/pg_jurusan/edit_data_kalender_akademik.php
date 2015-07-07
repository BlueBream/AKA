
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
<li class="active">Edit Data Kalender Akademik</li>
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
	<h2>Form Edit Data Kalender Akademik</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Edit Data Kalender Akademik
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<?php foreach($edit as $data){?>
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>p_jurusan/prosesedit_data_kalender_akademik' enctype='multipart/form-data' />
							<input type="hidden" id="form-field-1" name="id" value="<?php echo $data['id'];?>" placeholder="" />
							<div class="control-group">
								<label class="control-label" for="form-field-1">Tahun Ajaran</label>
								<div class="controls">
								<select id="form-field-select-1" name="id_ta">
								
									<?php 
										foreach($t_tahun_akademik as $row){ 
											if($data['id_ta'] == $row['id_ta']){

												$s = "selected";
											}else{
												$s = "";
											}
											?>
										<option value="<?php echo $row['id'];?>" <?php echo $s;?> ><?php echo $row['tahun_akademik'];?></option>
										
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
									<textarea rows = "4" id="form-field-1" name="kegiatan">
										<?php echo $data['kegiatan'];?>
									</textarea>
									Keterangan kegiatan
								</div>	
							</div>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Tanggal </label>

								<div class="controls">
									<input type="date" id="form-field-1" name="tanggal" value="<?php echo $data['tanggal'];?>" placeholder="gelar" />
								</div>
							</div>

						<div class="form-actions">
							<input type="submit" name="add_Kalender Akademik" value ="Save" class="btn btn-info">
						</div>
						
					</form>
					<?php
					}
					?>
					</div>
				</div>
			
			</div>
</div>