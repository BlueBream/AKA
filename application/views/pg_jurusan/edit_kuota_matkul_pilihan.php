
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
<li class="active">Edit Kuota Mata Kuliah Pilihan</li>
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
	<h2>Form Edit Kuota Mata Kuliah Pilihan</h2>
	
	<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Edit Kuota Mata Kuliah Pilihan
					</h4>					
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>p_jurusan/edit_kuota_matkul_pilihan'/>
							<?php 
								$i=0;
								foreach($sql as $data_row){
								if($i++ == 0) :
							?>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Mata Kuliah</label>
								<div class="controls">
									<input type="text" id="form-field-1" name="nama_mk"value="<?php echo $data_row->nama_mk;?>" disabled />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kode Mata Kuliah</label>
								<div class="controls">
									<input type="text" id="form-field-1" name="kode_mk" placeholder="Kode Mata kuliah" value="<?php echo $data_row->kode_mk;?>" disabled />
									<input type='hidden' value='<?php echo $data_row->kode_mk;?>' name='kode_mk'>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Jumlah Mata Kuliah</label>
								<div class="controls">
									<input type="text" id="form-field-1" name="jumlah_mk" value="<?php echo $data_row->jumlah_mk;?>" />
								</div>
							</div>							
							<div class="control-group">
								<label class="control-label" for="form-field-1">Kuota</label>
								<div class="controls">
									<input type="text" id="form-field-1" name="kuota" value="<?php echo $data_row->kuota;?>" />
								</div>
							</div>	
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Status</label>
								<div class="controls">
									<select id="form-field-select-1" name="status">
									<?php
												if($data_row->status == 'aktif'){
													$s = 'selected';
												}else if($data_row->status == 'tidak'){
													$s = 'selected';
												}else{
													$s = "";
												}
									?>
											<option value='aktif' <?php echo $s; ?>><?php echo $data_row->status; ?></option>
									</select>
								</div>
							</div>
						<div class="form-actions">
							<input type="submit" name="submit" value ="Save" class="btn btn-info">
							<a href='<?php echo base_url();?>/p_jurusan/t_kuota_mata_kuliah_pilihan'><button class="btn btn-info">
							<i class="icon-reply icon-only">Undo</i>
							</button></a>	
						</div>
						
					</form>
					<?php
					endif;
					}
					?>
					</div>
				</div>
			
			</div>
</div>