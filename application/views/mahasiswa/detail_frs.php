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
	<li class="active">Detail FRS</li>
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
				Detail Formulir Rencana Studi
			</div>
			<form method='POST' action='<?php echo base_url(); ?>c_index_aka/simpan_frs' name='frs'>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Kode MK</th>
						<th>Mata Kuliah</th>
						<th>SKS</th>
						<th>Kelas</th>
						<th>Semester</th>
						<th>Tahun Akademik</th>						
					</tr>
				</thead>
				<tbody>

				<?php
					//Loop data
					$no = 1;
					foreach ($data_frs->result() as $row) {			 
				?>
					<tr>
						<td><center><?php echo $no;?></center></td>
						<td><?php echo $row->kode_mk_d; ?></td>
						<td><?php echo $row->nama_mk_a; ?></td>
						<td><?php echo $row->jumlah_sks; ?></td>
						<td><?php echo $row->nama_kelas; ?></td>
						<td><?php echo $row->smt; ?></td>
					<td><?php echo $row->tahun_akademik; ?></td>						
					</tr>
					<?php
						$no++;

					} 
					?>
				</tbody>
			</table>

</div>
</div><!--/.page-content-->

