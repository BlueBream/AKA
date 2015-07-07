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
	<li class="active">Daftar Ujian</li>
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
		Daftar Ujian
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?>c_index_aka/absen_ujian'>
		<div class="control-group">	
		<div class="controls">
			<label class="control-label" for="form-field-1">Program Studi</label>				
			<select id="prodi" name="prodi" onchange="get_Mata_kuliah()">
			<option />- Pilih Program Studi -
				<?php foreach ($prodi as $prodi) { ?>
				<option value="<?php echo $prodi['id_prodi']; ?>" /><?php echo $prodi['prodi']; ?></option>
				<?php
					}
				?>
			</select>
			</div>
		<div class="controls">
		<label class="control-label" for="form-field-1">Mata Kuliah</label>				
		<select id="mata_kuliah" name="mata_kuliah">
			<option />- Pilih Mata Kuliah -
			
		</select>					
		</div>
		<div class="controls">
					<label class="control-label" for="form-field-1">Kelas</label>				
						<select id="kelas" name="kelas">
							<option />- Pilih Kelas -

						</select>				
				</div>
			<div class="controls">
				<label class="control-label" for="form-fiels-2">Tahun Akademik</label>
					<select id="form-field-select-1" name="tahun_akademik">
						<?php foreach($data_tahun as $data_tahun){ ?>
							<option value="<?php echo $data_tahun['tahun_akademik']; ?>"><?php echo $data_tahun['tahun_akademik']; ?></option>
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
	</div><!--/.row-fluid-->
	<br>
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
					 		if($semester_absen%2 == 1){
					 			$bilangan = "Gasal";
					 		}else{
					 			$bilangan = "Genap";
					 		}
							echo $bilangan;
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
						echo $this->input->post('tahun_akademik');
					?></td>
				</tr>
				</table>
			<div class="table-header">
				Daftar Hadir Ujian
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover" align="center">
				<thead >
					<tr>
						<th colspan="3"><center>Mahasiswa</center></th>
						<th><center>TTD</center></th>
						<th colspan="4"><center>Nilai</center></th>
						<th><center>Huruf Mutu</center></th>
						<th><center>Ket</center></th>
					</tr>
					<tr>
						<th style="text-align:center;" width="2%"><center><center>No</center></center></th>
						<th style="text-align:center;"><center>NIM</center></th>
						<th style="text-align:center;" width="25%"><center>Nama Mahasiswa</center></th>
						<th></th>
						<th width="8%;"><center>UTS</center></th>
						<th width="8%;"><center>UAS</center></th>
						<th width="8%;"><center>Tugas</center></th>
						<th width="8%;"><center>Rata-rata</center></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<?php 
					$no = 1;
				foreach ($data as $data) {
				
				?>
				<tr>
					<td><center><?php echo $no; ?></center></td>
					<td><?php echo $data['nim']; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>

				</tr>
				<?php
				$no++; 
					}
				?>
				<tr>
					<form action="<?php echo base_url(); ?>c_index_aka/report_absen_ujian" method="POST">
					<td colspan="19" style="vertical-align:middle;">
					<input type="hidden" name="mata_kuliah_sec" value="<?php echo $this->input->post('mata_kuliah');?>">
					<input type="hidden" name="tahun_akademik_sec" value="<?php echo $this->input->post('tahun_akademik');?>">
					<input type="hidden" name="kelas_sec" value="<?php echo $this->input->post('kelas');?>">
					<input type="hidden" name="prodi_sec" value="<?php echo $this->input->post('prodi');?>">
						<br>
						<input type="submit" style="margin-top:-8px;"name="cetak" value="Cetak PDF" class="btn btn-small btn-success">
					</td>
					</form>
				</tr>
				
			</table>
			<?php } ?>
			<div class="row-fluid">
			<div class="span6">
				
			</div>
			<div class="span6">
			<div class="dataTables_paginate paging_bootstrap pagination">
					<?php //echo $pagination; ?>
				</div>
			</div>
		
</div>
</div><!--/.page-content-->

