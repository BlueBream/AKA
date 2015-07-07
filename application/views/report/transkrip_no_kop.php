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
	<li class="active">Transkrip</li>
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
		Form Report Transkrip
	</h1>
</div><!--/.page-header-->
	<?php $this->m_aka->msg('msg', 'error'); ?>
	<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?>c_index_aka/report_transkrip_no_kop'>
		<div class="control-group">
		<div class="controls">
			<label class="control-label" for="form-field-1">NIM</label>
			<input type="text" name="nim" id="form-field-1" placeholder = "NIM">
		</div>
		<div class="controls">
			<label class="control-label" for="form-field-1">Nomor Transkrip</label>
			<input type="text" name="transkrip" id="form-field-1" placeholder = "Nomor Transkrip">
		</div>
		<div class="controls">
			<label class="control-label" for="form-field-1">Tanggal Lulus</label>
				<div class="controls">	
					<select name="tanggallulus">
						<?php 
							for ($i=1; $i <= 31 ; $i++) {
						?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php	
							}
						 ?>
					</select>
					<select name="bulanlulus">
						<?php 
							for ($i=1; $i <= 12 ; $i++) {
						?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php	
							}
						 ?>
					</select>
					<select name="tahunlulus">
						<?php
							$date = date('Y');
							for ($i=2000; $i <= $date ; $i++) {
						?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php	
							}
						 ?>
					</select>
				</div>	
			</div>
			<div class="controls">
				<input type="submit" name="cari_khs" class="btn btn-info btn-small" value="Buat Laporan">
			</div>					
		</div>
		</form>
	</div><!--/.row-fluid-->
	<br>
</div><!--/.page-content-->

