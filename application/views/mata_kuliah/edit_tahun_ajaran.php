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
	<li class="active">Data Tahun Ajaran</li>
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
		Mata Kuliah
		<small>
			<i class="icon-double-angle-right"></i>
			Data Tahun Ajaran
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Data Mata Kuliah
					</h4>
				</div>

		<div class="widget-body">
					<div class="widget-main">
					<?php foreach($edit as $data){?>
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>c_index_aka/prosesedit_tahun_ajaran' enctype='multipart/form-data' />
							<div class="control-group">
								<label class="control-label" for="form-field-1">Tahun Ajaran</label>
									<input type="hidden" id="form-field-1" required name="id" value="<?php echo $data['id'];?>"  placeholder="" />
								<div class="controls">
									<input type="text" id="form-field-1" required name="tahun_akademik" value="<?php echo $data['tahun_akademik'];?>"  placeholder="0000/0000" />
								</div>
							</div>
							
							<?php

								$status = array(
									'status_1' => 'Ya',
									'status_2' => 'Tidak'
									);

							 ?>
							<div class="control-group">
								<label class="control-label" for="form-fiels-2">Status</label>
								<div class="controls">
									<select id="form-field-select-1" name="current">
										<option>-- Pilih --</option>
										<?php

											//Loop praktikum

											foreach($status as $status){
												if($data['current'] == $status){
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

							<div class="form-actions">
								<input type="submit" value ="Save" class="btn btn-info">
							</div>
						</form>
					<?php
						}
					?>
				</div>
		</div>
	</div>
	</div><!--/.row-fluid-->
	
</div>
</div><!--/.page-content-->

