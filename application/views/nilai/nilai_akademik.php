<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script>
function get_Mata_kuliah(){
                var id_prodi = $("#prodi").val();
                $.ajax({ 
                    type: 'POST', 
                    url: "<?php echo site_url('c_index_aka/get_mata_kuliah'); ?>", 
                    data:"id_prodi="+id_prodi, 
                    success: function(msg) {
                            $("#mata_kuliah").html(msg);
                    }
                });
            var id_prodi = $("#prodi").val();
                $.ajax({ 
                    type: 'POST', 
                    url: "<?php echo site_url('c_index_aka/get_kelas'); ?>", 
                    data:"id_prodi="+id_prodi, 
                    success: function(msg) {
                            $("#kelas").html(msg);
                    }
                });
            }
</script>
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
	<li class="active">Nilai per mata kuliah</li>
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
		<form method="post" action='<?php echo base_url();?>c_index_aka/nilai_akademik'>
		<div id="matakuliah" class="control-group">
		<div class="controls">
				<label class="control-label" for="form-field-1">Program Studi</label>				
				<select id="form-field-select-1" name="prodi">
							<?php foreach ($prodi as $prodi) {
							$prodi_s = $this->session->userdata('prodi');
							if($prodi_s == $prodi['prodi']){
								$s = "selected";
							}else{
								$s = "";
							}
							?>							
							<option value="<?php echo $prodi['prodi']; ?>" <?php echo $s; ?>/><?php echo $prodi['prodi']; ?>
							
							<?php
								}
							?>
						</select>
				</div>		
		<div class="controls">
		<label class="control-label" for="form-field-1">Mata Kuliah</label>				
		<select id="form-field-select-1" name="mata_kuliah">
							<?php foreach ($mk as $mk) {
								$select_mk = $this->session->userdata('mata_mk');
								if($select_mk == $mk['id_mk']){
									$s = "selected";
								}else{
									$s = "";
								}
							?>
		
							<option value="<?php echo $mk['kode_mk']; ?>" <?php echo $s; ?>/><?php echo $mk['kode_mk']." / ".$mk['nama_mk']; ?>
							
							<?php
								}
							?>
						</select>	
			</div>
			<div class="controls">
				<label class="control-label" for="form-field-1">Kelas</label>				
				<select id="form-field-select-1" name="kelas">
							<?php foreach ($kelas as $kelas) {
							$kelas_s = $this->session->userdata('kelas');
							if($kelas_s == $kelas['id_kelas']){
								$s = "selected";
							}else{
								$s = "";
							}
							?>

							
							<option value="<?php echo $kelas['id_kelas']; ?>" <?php echo $s; ?>/><?php echo "Kelas ".$kelas['nama_kelas']; ?>
							
							<?php
								}
							?>
							<option value="semua_kelas">Semua Kelas</option>
						</select>
				</div>
			<div class="controls">
								<label class="control-label" for="form-fiels-2">Tahun Akademik</label>
								
									<select id="form-field-select-1" name="tahun_akademik">
										<?php
											$tahun_s = $this->session->userdata('tahun_akademik');
											foreach($data_tahun as $data_tahun){
												if($data_tahun['tahun_akademik'] == $tahun_s){
													$s = "selected";
												}else{
													$s = "";
												}
											?>
											<option value="<?php echo $data_tahun['tahun_akademik']; ?>" <?php echo $s; ?>><?php echo $data_tahun['tahun_akademik']; ?></option>
										<?php
											
											}
											
										 ?>
										
									</select>
								</div>		
						<br>
				<input style="margin-top:-10px;"type="submit" name="cari" class="btn btn-small btn-primary" value="Cari">
				
				
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
						Kode Mata Kuliah
					</th>
					<th width="50%"> Semester </th>
				</tr>
				<tr>
					<td>
						<?php 
							echo $loop_mk['kode_mk'];
						?>
					</td>
					<td>
					<?php
						$semester_absen = $ambil_mk_smt['semester'];
						if($semester_absen){
					 		if($semester_absen%2 == 1){
					 			$bilangan = "Gasal";
					 		}else{
					 			$bilangan = "Genap";
					 		}
							echo $bilangan;
						}
					 ?>
					 </td>
				</tr>
				<tr>
					<th width="50%">
						Nama Mata Kuliah
					</th>
					<th width="50%"> Tahun Akademik </th>
				</tr>
				<tr>
					<td><?php 
					 		
					 		echo $loop_mk['nama_mk'];
					 	
					 ?></td>
					<td>
					<?php
						echo $this->session->userdata('tahun_akademik');
					?></td>
				</tr>
				</table>
			<form method="post" action='<?php echo base_url(); ?>c_index_aka/save_nilai_mk'>
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
						<th style="text-align:center;">Nim</th>
						<th style="text-align:center;" width="25%">Nama Mahasiswa</th>
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
					<td style="text-align:center;"><?php echo $data['nim']; ?>
						<input type="hidden" name="id_mk[]" value="<?php echo $data['kode_mk']; ?>">
						<input type="hidden" name="id_mhs[]" value="<?php echo $data['id_mhs']; ?>">
					</td>
					<td><?php echo $data['nama']; ?></td>
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
							<option value="" <?php echo $s; ?> >Nilai Kosong</option>
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

