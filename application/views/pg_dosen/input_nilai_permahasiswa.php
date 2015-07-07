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
	<li class="active">Input Nilai</li>
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
		Input Nilai Mahasiswa
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?><?php echo $this->uri->segment(1); ?>/<?php echo $location; ?>/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4); ?>'>
		<div class="control-group">	
			<div class="controls">
			<input type="hidden" name="id_mhs" value="<?php echo $this->uri->segment(3);?>">
			<input type="hidden" name="id_mk" value="<?php echo $this->uri->segment(4);?>">	
				<label class="control-label" for="form-field-1">Nilai UTS</label>
				<input type="text" name="nilai_uts" autocomplete = "off" required>				
			</div>
			<div class="controls">
				<label class="control-label" for="form-field-1">Nilai UAS</label>
				<input type="text" name="nilai_uas" autocomplete = "off" required>				
			</div>
			<div class="controls">
				<label class="control-label" for="form-field-1">Nilai Tugas</label>
				<input type="text" name="nilai_tugas" autocomplete = "off" required>				
			</div>
			<br>
			<div class="controls">
				<input type="submit" name="submit_nilai" value="Isi nilai" class="btn btn-success btn-small">				
			</div>
		</div>
		</form>
	</div><!--/.row-fluid-->
	<br>

