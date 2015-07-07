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
	<li class="active">Data Mahasiswa</li>
</ul><!--.breadcrumb-->
</div>


<div class="page-content">
<div class="page-header position-relative">
	<h1>
		Mahasiswa
		<small>
			<i class="icon-double-angle-right"></i>
			Data mahasiswa 
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="control-group">		
				<div class="controls">
				<form method="post" action='<?php echo base_url(); ?>c_index_aka/cari_nim'>
					<label class="control-label" for="form-field-1">Cari NIM Mahasiswa</label>
					<input type="text" id="form-field-1" placeholder="berdasarkan NIM" name="nim"/>
					<input type ="submit" name="cari" value="Cari" class="btn btn-info"/>
				</form>
				</div>
		</div>	
	</div><!--/.row-fluid-->
	<br>
	<div class='row-fluid'>
		<div class='control-group'>
			<div class='controls'>
				<div class="table-header">
					Data Mahasiswa
				</div>
<?php
				$row_mahasiswa = $data_mhs->row();
?>				
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">				
					<tbody>
						<tr>
							<td>
					<h3>								
								<div class='span4'>	
								NIM  
								</div>
								<div class='span5'>
								<?php echo $row_mahasiswa->nim_a; ?>
								</div> 
							</td>
					</h3>
							<td>
					<h3>								
								<div class='span4'>
								Semester  
								</div>
								<div class='span5'>
								<?php echo $row_mahasiswa->smt; ?>
								</div>
							</td>
					</h3>
						</tr>
						<tr>
							<td>
					<h3>								
								<div class='span4'>	
								Nama  
								</div>
								<div class='span5'>
								<?php echo $row_mahasiswa->nama_mhs; ?>									
								</div> 
							</td>
					</h3>
					
							<td>
					<h3>								
								<div class='span4'>
								SKS  
								</div>
								<div class='span5'>
								<div id='sks_mahasiswa'><?php echo $row_mahasiswa->sks; ?></div>
								</div>
							</td>
					</h3>
						
						</tr>						
					</tbody>
			</table>

			</div>
		</div>
	</div>
<div class="row-fluid">

			<div class="table-header">
				Formulir Rencana Studi
			</div>
			<form method='POST' action='<?php echo base_url(); ?>c_index_aka/simpan_frs' name='frs'>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Kode MK</th>
						<th>Mata Kuliah</th>
						<th>SKS</th>
						<th>Sisa Kuota Kelas</th>
						<th>Kelas</th>
						<th>Semester</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>

				<?php 
				echo $this->m_aka->msg('msg_error','alert-error');

					//Loop data
					$no = 1;
					foreach ($data_frs->result() as $row) {			 
				?>
<?php
						$det = $row->id_e;
						$sem = $row_mahasiswa->smt;	
						$nim_mhs = $row_mahasiswa->nim_a;
						$mhs = $this->db->query("SELECT * FROM t_mahasiswa WHERE nim='$nim_mhs'")->row();					
						$id_mhs = $mhs->id_mahasiswa;
						$id_detail_frs = $uri_det;
						$cek_kuota = $this->db->query("SELECT * FROM t_detail_frs WHERE id_detail_frs='$id_detail_frs'")->row();
						$id_kuota =$cek_kuota->id_detail_kuota;
						$kode_mk = $cek_kuota->id_mk;
						$get_sks = $this->db->query("SELECT * FROM t_mk WHERE kode_mk='$kode_mk'")->row();	
						$sks_get = $get_sks->jumlah_sks;					
						$cek = $this->db->query("SELECT * FROM t_detail_frs WHERE id_detail_kuota ='$det' AND semester='$sem' AND id_mhs='$id_mhs'")->num_rows();
						if($cek < 1 AND $row->isi > 0){
	
?>		
					<tr >	

						<td><center><?php echo $no;?></td><input name='id_mk[]' value='<?php echo $row->kode_mk_d; ?>' type='hidden'>
						<td><?php echo $row->kode_mk_d; ?></td><input name='nim' value='<?php echo $row_mahasiswa->nim_a; ?>' type='hidden'>
						<td><?php echo $row->nama_mk_a; ?></td><input name='id_mhs' value='<?php echo $row_mahasiswa->id_mhs; ?>' type='hidden'><input name='sks_mhs' value='<?php echo $row_mahasiswa->sks; ?>' type='hidden'>
						<td><?php echo $row->jumlah_sks; ?></td><input name='jumlah_sks' value='<?php echo $row->jumlah_sks; ?>' type='hidden'>
						<td><?php echo $row->isi; ?></td>
						<td><?php echo $row->nama_kelas; ?></td>
						<td><?php echo $row->smt; ?></td><input name='semester' value='<?php echo $row_mahasiswa->smt; ?>' type='hidden'>
						<td><a href="<?php echo base_url(); ?>c_index_aka/p_edit_manipulasi/<?php echo $id_detail_frs ?>/<?php echo $row->id_e; ?>/<?php echo $row_mahasiswa->nim_a; ?>/<?php echo $row_mahasiswa->smt; ?>"><span class="label label-info arrowed-in-right arrowed">Ambil</span></a></td>	
					</tr>
					<?php
						$no++;
					}
					} 
					?>
				</tbody>
			</table>

</div>
</div><!--/.page-content-->
