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
	<li class="active">Edit Nilai</li>
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
		Edit Nilai Akademik
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?>p_dosen/<?php echo $location; ?>'>
		<div class="control-group">
		<div class="controls">
			<?php foreach($mahasiswa as $data_m){ ?>
				<label class="control-label" for="form-field-1">Nama Mahasiswa</label>
				<input type="text" name="id_mhs" autocomplete = "off" readonly value="<?php echo $data_m['nama']; ?>">
			<?php } ?>
		</div>
		<div class="controls">
			<?php foreach($mk as $get_id){ ?>
				<label class="control-label" for="form-field-1">Kode Mata Kuliah</label>
				<input type="text" name="id_mk" autocomplete = "off" readonly value="<?php echo $get_id['id_mk']; ?>">
			<?php } ?>
		</div>
		<div class="controls">
			<?php foreach($mk as $get_name){ ?>
				<label class="control-label" for="form-field-1">Nama Mata Kuliah</label>
				<input type="text" name="nama_mk" autocomplete = "off" readonly value="<?php echo $get_name['nama_mk']; ?>">
			<?php } ?>
		</div>

		<?php foreach($nilai as $nilai){ ?>

			<div class="controls">
			<input type="hidden" name="id_mhs" value="<?php echo $this->uri->segment(3);?>">
			<input type="hidden" name="id_mk" value="<?php echo $this->uri->segment(4);?>">	
				<label class="control-label" for="form-field-1">Nilai UTS</label>
				<input type="text" name="nilai_uts" autocomplete = "off" required value="<?php echo $nilai['nilai_uts']; ?>">				
			</div>
			<div class="controls">
				<label class="control-label" for="form-field-1">Nilai UAS</label>
				<input type="text" name="nilai_uas" autocomplete = "off" required value="<?php echo $nilai['nilai_uas']; ?>">				
			</div>
			<div class="controls">
				<label class="control-label" for="form-field-1">Nilai Tugas</label>
				<input type="text" name="nilai_tugas" autocomplete = "off" required value="<?php echo $nilai['nilai_tugas']; ?>">				
			</div>
			<div class="controls">
				<select name="huruf_mutu">
					<?php 
						$hurufmutu = array(
							'A' => 'A',
							'B' => 'B',
							'C' => 'C',
							'D' => 'D',
							'E' => 'E'
							);
						foreach($hurufmutu as $hurufmutu){ 
							if($hurufmutu == $nilai['huruf_mutu']){
								$s = "selected";
							}else{
								$s = "";
							}
							?>
							<option value="<?php echo $hurufmutu; ?>" <?php echo $s; ?>><?php echo $hurufmutu; ?></option>
					<?php } ?>
				</select>
			</div>
			<?php } ?>
			<br>
			<div class="controls">
				<input type="submit" name="submit_nilai" value="Edit nilai" class="btn btn-primary btn-small">				
			</div>
		</div>
		</form>
	</div><!--/.row-fluid-->
	<br>

