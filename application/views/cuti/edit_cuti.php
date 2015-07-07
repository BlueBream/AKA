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
<li class="active">Permohonan Cuti</li>
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
	<h3>Form Input Permohonan Cuti</h3>
	<?php $this->m_aka->msg('msg_input','success'); ?>
	<?php $this->m_aka->msg('msg_input_error','error'); ?>
	<?php foreach($cuti as $cuti){ ?>
		<form action="<?php echo base_url(); ?>c_index_aka/edit_cuti/<?php echo $cuti['id']; ?>" method="post">
				<div class="control-group">
					<label class="control-label" for="form-field-1">NIM</label>
					<div class="controls">
						<input type="text" id="form-field-1" name="nim" placeholder="NIM" value="<?php echo $cuti["nim"]; ?>" readonly required/>
					</div>
				</div>
				<label class="control-label" for="form-field-1">Nama Mahasiswa</label>
					<div class="controls">
						<input type="text" id="form-field-1" name="nama" placeholder="NIM" value="<?php echo $cuti["nama"]; ?>" readonly required/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-field-1">Semester Ajuan Cuti</label>
					<div class="controls">
						<select name="semester_ajuan">
						<?php 
							$data_semester = array(
								'1' => "I",
								'2' => "II",
								'3' => "III",
								'4' => "IV",
								'5' => "V",
								'6' => "VI",
								'7' => "VII",
								'8' => "VIII",
								'9' => "IX",
								'10' => "X"
								);
							foreach($data_semester as $angka => $romawi){
								if($cuti['semester_ajuan_cuti'] == $angka){
									$s = "selected";
								}else{
									$s = "";
								}
							?>
							<option value="<?php echo $angka; ?>" <?php echo $s; ?>><?php echo $romawi; ?></option>
						<?php	
							}
						 ?>
					</select>
				</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="form-field-1">Semester Cuti</label>
					<div class="controls">
						<select name="semester_cuti">
						<?php 
							$data_semester = array(
								'1' => "I",
								'2' => "II",
								'3' => "III",
								'4' => "IV",
								'5' => "V",
								'6' => "VI",
								'7' => "VII",
								'8' => "VIII",
								'9' => "IX",
								'10' => "X"
								);
							foreach($data_semester as $angka => $romawi){
								if($cuti['semester_cuti'] == $angka){
									$s = "selected";
								}else{
									$s = "";
								}
							?>
							<option value="<?php echo $angka; ?>" <?php echo $s; ?>><?php echo $romawi; ?></option>
						<?php	
							}
						 ?>
					</select>
				</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-field-1">Semester Masuk</label>
					<div class="controls">
						<select name="semester_masuk">
						<?php 
							$data_semester = array(
								'1' => "I",
								'2' => "II",
								'3' => "III",
								'4' => "IV",
								'5' => "V",
								'6' => "VI",
								'7' => "VII",
								'8' => "VIII",
								'9' => "IX",
								'10' => "X"
								);
							foreach($data_semester as $angka => $romawi){
								if($cuti['semester_cuti_masuk'] == $angka){
									$s = "selected";
								}else{
									$s = "";
								}
							?>
							<option value="<?php echo $angka; ?>" <?php echo $s; ?>><?php echo $romawi; ?></option>
						<?php	
							}
						 ?>
					</select>
				</div>
				</div>				
				<div class="control-group">
					<label class="control-label" for="form-field-1">Alasan
					</label>

					<div class="controls">
						<textarea rows = "7" id="form-field-1" name="alasan"><?php echo $cuti['alasan']; ?></textarea>
					</div>	

				</div>

				<input type="submit" name="edit_cuti" value ="Save" class="btn btn-info btn-small">
			
	</form>
	<?php } ?>
</div>