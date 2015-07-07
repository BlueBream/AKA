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
	<li class="active">Nilai per mahasiswa	</li>
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
		Nilai Akademik
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?>c_index_aka/nilai_akademik_mahasiswa'>
		<div id="matakuliah" class="control-group">
		<div class="controls">
			<label class="control-label" for="form-field-1">NIM</label>				
			<input type="text" name="nim_m" autocomplete="off" required>
		</div>
			<div class="controls">
				<label class="control-label" for="form-fiels-2">Semester</label>
				<select name="semester_m">
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
						?>
						<option value="<?php echo $angka; ?>"><?php echo $romawi; ?></option>
					<?php	
						}
					 ?>
				</select>
				</div>
				<div class="controls">
				<label class="control-label" for="form-field-1">Tahun Akademik</label>				
				<select id="form-field-select-1" name="tahun_akademik_m">
					<?php foreach($data_tahun as $data_tahun){ ?>
						<option value="<?php echo $data_tahun['tahun_akademik'] ?>"><?php echo $data_tahun['tahun_akademik'] ?></option>
					<?php } ?>
				</select>
				<br><br>
				<input style="margin-top:-10px;"type="submit" name="cari_m" class="btn btn-small btn-primary" value="Cari">
				</div>
				
				
		</div>
		</form>
		<?php $this->m_aka->msg('msg','error'); ?>
		<?php $this->m_aka->msg('msg_success','success'); ?>
		<?php //$this->m_aka->msg('msg_info','info'); ?>
		<?php //$this->m_aka->msg('msg_info_e','info'); ?>
		
	</div><!--/.row-fluid-->
	<br>
<div class="row-fluid">
				
			<div class="row-fluid">
				<?php if($data != ""){ ?>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<tr>
					<th width="50%">
						NIM
					</th>
					<th width="50%"> Semester </th>
				</tr>
				<tr>
					<td>
						<?php 
							echo $data_mahasiswa['nim'];
						?>
					</td>
					<td>
					<?php
						$semester_s = $this->session->userdata("semester_m");
					 	echo $semester_s;
					 ?>
					 </td>
				</tr>
				<tr>
					<th width="50%">
						Nama Mahasiswa
					</th>
					<th width="50%"> Tahun Akademik </th>
				</tr>
				<tr>
					<td><?php 
					 		
					 		echo $data_mahasiswa['nama'];
					 	
					 ?></td>
					<td>
					<?php
						echo $this->session->userdata('tahun_akademik_m');
					?></td>
				</tr>

				</table>
				<br>
			<form method="post" action='<?php echo base_url(); ?>c_index_aka/save_nilai'>
			<div class="row">
				<div class="span9"></div>
				<div class="span3" style="text-align:right;">
					<button class="btn btn-success btn-small isi_nilai startnilai">Isi Nilai</button>
					<button class="btn btn-danger btn-small cancel_nilai cancelnilai">Cancel Isi Nilai</button>
					<input type="submit" name="save_nilai" class="btn btn-small btn-primary savenilai" value="Save Nilai">
				</div>
			</div>
			
			<br>
			<div class="table-header">
				Nilai per mahasiswa
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;" width="2%"><center>No</center></th>
						<th style="text-align:center;">Kode MK</th>
						<th style="text-align:center;" width="25%">Nama Mata Kuliah</th>
						<th style="text-align:center;">Nilai UTS</th>
						<th style="text-align:center;">Nilai UAS</th>
						<th style="text-align:center;">Nilai Tugas</th>
						<th style="text-align:center;">Nilai Rata-rata</th>
						<th style="text-align:center;">Huruf Mutu</th>
						<th style="text-align:center;">Status</th>
					</tr>
				</thead>
				
					<?php
						$no =1 ; 
						foreach($data as $data){
					?>
				<tr>
					<td style="text-align:center;">
						<?php echo $no; ?>
							<input name="no_nilai[]" class="ace-checkbox-2" checked type="checkbox" value="<?php echo $no; ?>">					</td>
					<td style="text-align:center;"><?php echo $data['kode_mk']; ?>
						<input type="hidden" name="id_mk[]" value="<?php echo $data['kode_mk']; ?>">
						<input type="hidden" name="id_mhs[]" value="<?php echo $data['id_mhs']; ?>">
					</td>
					<td ><?php echo $data['nama_mk']; ?></td>
					<td style="text-align:center;">
						<?php 
							echo "<p class='huruftampil'>".$data['nilai_uts']."</p>";
							if($data['pengisian_nilai'] == "dibuka"){
						?>
						<p class="hurufform" ><input type="text" style="width:50px" name="nilai_uts[]" value="<?php echo $data['nilai_uts']; ?>"></p>
						<?php }else{ ?>
							<input type="hidden" style="width:50px" name="nilai_uts[]" value="<?php echo $data['nilai_uts']; ?>">
							<span class="label label-important arrowed hurufform">Ditutup</span>
						<?php } ?>
					</td>
					<td style="text-align:center;">
						<?php 
							echo "<p class='huruftampil'>".$data['nilai_uas']."</p>";
							if($data['pengisian_nilai'] == "dibuka"){
						?>
						<p class="hurufform" ><input type="text" style="width:50px" name="nilai_uas[]" value="<?php echo $data['nilai_uas']; ?>"></p>
						<?php 
							}else{
						 ?>
						 <input type="hidden" style="width:50px" name="nilai_uas[]" value="<?php echo $data['nilai_uas']; ?>">
						 <span class="label label-important arrowed hurufform">Ditutup</span>
						 <?php } ?>
					</td>
					<td style="text-align:center;">
						<?php 
							echo "<p class='huruftampil'>".$data['nilai_tugas']."</p>";
							if($data['pengisian_nilai'] == "dibuka"){ 
						?>
						<p class="hurufform" ><input type="text" style="width:50px" name="nilai_tugas[]" value="<?php echo $data['nilai_tugas']; ?>"></p>
						<?php }else{ ?>
							<input type="hidden" style="width:50px" name="nilai_tugas[]" value="<?php echo $data['nilai_tugas']; ?>">
							<span class="label label-important arrowed hurufform">Ditutup</span>
						<?php } ?>
					</td>
					<td style="text-align:center;">
						<?php echo $data["bobot_nilai"]; ?>
					</td>
					<td style="width:150px;height:40px;text-align:center;">
						<?php

						 echo "<p class='huruftampil'>".$data['huruf_mutu']."</p>";
						 $huruf = array(
						 	'A' => 'A',
						 	'B' => 'B',
						 	'C' => 'C',
						 	'D' => 'D',
						 	'E' => 'E'
						 );
						if($data['pengisian_nilai'] == "dibuka"){
						?>				
						<select class="hurufform" style="width:150px;" name="huruf_mutu[]">
							<?php 
								if($data == ""){
										$s1 = "selected";
								}else{
										$s1 ="";
								}
							 ?>
							<option value="" <?php echo $s1; ?> >Nilai Kosong</option>
							<?php foreach ($huruf as $huruf): ?>
								<?php

									if ($huruf == $data['huruf_mutu']){
										$s = "selected";
									}else{
										$s ="";
									}
									
								 ?>									
								<option value="<?php echo $huruf; ?>" <?php echo $s; ?>><?php echo $huruf; ?></option>
								

							<?php endforeach ?>
						</select>
						<?php 
							}else{
						 ?>
						 	<input type="hidden" style="width:50px" name="huruf_mutu[]" value="<?php echo $data['huruf_mutu']; ?>">
							<span class="label label-important arrowed hurufform">Ditutup</span>
						 <?php } ?>
					</td>
					<td style="text-align:center;">
						<?php  
							if($data['pengisian_nilai'] == "dibuka"){
						?>
							<span class="label label-success arrowed">Dibuka</span>
						<?php
							}else{
						?>
							<span class="label label-important arrowed">Ditutup</span>
						<?php
							}
						?>
					</td
				</tr>
					<?php
						$no++;
					 	}
					 ?>
			</table>
			<div class="row">
			<div class="span9"></div>
			<div class="span3" style="text-align:right;">
				<button class="btn btn-success btn-small isi_nilai startnilai">Isi Nilai</button>
				<button class="btn btn-danger btn-small cancel_nilai cancelnilai">Cancel Isi Nilai</button>
				<input type="submit" name="save_nilai" class="btn btn-small btn-primary savenilai" value="Save Nilai">
			</div>
			</div>
			</form>
				<?php } ?>
			</div>
		
</div>
</div><!--/.page-content-->

