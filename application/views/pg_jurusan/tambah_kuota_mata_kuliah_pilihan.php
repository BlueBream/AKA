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
	<li class="active">Data Mata Kuliah</li>
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
			Data Mata Kuliah
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">

		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Nama Mata Kuliah</label>
					<form method="post">
						<input type="text" id="form-field-1" name="src" placeholder="" />
						<input type="submit" name="submit" class="btn btn-small btn-primary" style="margin-top:-10px;">
					</form>
				</div>
		</div>
	</div><!--/.row-fluid-->
	<br>
<div class="row-fluid">
			<?php echo $this->m_aka->msg('msg_error','alert-eror'); ?>	
			<?php echo $this->m_aka->msg('msg','alert-succes'); ?>				

			<div class="table-header">
				Tambah kuota Mata kuliah
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Kode Mata Kuliah</th>
						<th>Mata Kuliah</th>
						<th>Jumlah SKS</th>
						<th>Semester</th>
						<th>Status kuota</th>											
						<th>Action <a href='<?php echo base_url();?>/p_jurusan/Kuota_mata_kuliah_pilihan'><button class="btn btn-danger btn-small" style='float:right;margin-right:20px; padding:4px;'>
											<i class="icon-reply icon-only">Undo</i>
										</button></a>						
					</tr>
				</thead>
				<tbody>
					
				<?php

					//Loop data
					$no = 1;
					foreach ($data as $data) {			 
				?>
			<?php
			$kode=$data['kode_mk'];
			$cek=$this->db->query("SELECT * FROM t_mk as a,t_kuota_matkul_pilihan as b WHERE a.kode_mk = b.kode_mk AND b.kode_mk='$kode' ");
			$num_cek = $cek->num_rows();
			?>
					<tr>
						<td><center><?php echo $no;?></center></td>
						<td><?php echo $data['kode_mk']; ?></td>
						<td><?php echo $data['nama_mk']; ?></td>
						<td><?php echo $data['jumlah_sks']; ?></td>
						<td><?php echo $data['semester']; ?></td>

				<?php
					if($num_cek < 1){
						echo "<td><span class='label label-info arrowed-in arrowed-in-right'>Tersedia</span></td>";						
						?>
						<td><a href='<?php echo base_url();?>p_jurusan/isi_t_kuota_matkul_pilihan/<?php echo $data['kode_mk']; ?>/'><button class='btn btn-small btn-primary'>Isi Kuota</button></a></td>
						<?php
					}else{
						echo "<td><span class='label label-important arrowed'>Penuh</span></td>";
						?>
						<td><a href='<?php echo base_url();?>p_jurusan/isi_t_kuota_matkul_pilihan/<?php echo $data['kode_mk']; ?>/'><button class='btn btn-small btn-danger' disabled>Isi Kuota</button></a></td>
						<?php
					}
				?>
					</tr>
					<?php
						$no++;
						}
					
					?>
				</tbody>				
			</table>
</div>			
				<div class="row-fluid">
			<div class="span6">				
			</div>
			<div class="span6">
			<div class="dataTables_paginate paging_bootstrap pagination">
					<?php
						echo $pagination;
					?>
				</div>
			</div>
</div>
</div><!--/.page-content-->

