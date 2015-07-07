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
		Mahasiswa
		<small>
			<i class="icon-double-angle-right"></i>
			Data mahasiswa
		</small>
	</h1>
</div><!--/.page-header-->


	<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?>c_index_aka/manipulasi_frs'>
		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data Mahasiswa</label>
					<input type="text" id="form-field-1" placeholder="" name="src" required autocomplete="off"/>
				</div>
				<div class="controls">
					<label class="control-label" for="form-field-1">Parameter Pencarian</label>				
					<select id="form-field-select-1" name="parameter">
										<option value="nim" />NIM
										<option value="mahasiswa" />Nama Mahasiswa
										<option value="angkatan" />Angkatan
									</select><br><br>
				<input style="margin-top:-10px;"type="submit" name="parameter_pencarian" class="btn btn-small btn-primary" value="Cari">
				</div>
		</div>
		</form>
	</div><!--/.row-fluid-->
	<br>

<div class="row-fluid">
			<div class="table-header">
				Results for "hasil pencarian Mahasiswa"<a href='<?php echo base_url();?>c_index_aka/manipulasi_frs'>
				 &nbsp; <button class="btn btn-small btn-success">
															Lihat Semua
															<i class="icon-arrow-right icon-on-right bigger-110"></i>
														</button></a> 
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>Angkatan</th>
						<th>Semester</th>
						<th>Jumlah SKS</th>
						<th>Action
						</th>
					</tr>
				</thead>

				<tbody>				
				<?php
					//Loop data
					$no = 1;
					foreach ($query as $row) {			 
				?>
					<tr>
						<td><center><?php echo $no;?></center></td>
						<td><?php echo $row->nim; ?></td>
						<td><?php echo $row->nama; ?></td>
						<td><?php echo $row->angkatan; ?></td>
						<td><?php echo $row->smt; ?></td>
						<?php 
						$jml_sks = $row->sks;
						if($jml_sks <= 0 ){
						?>
							<td><span class="label label-info arrowed arrowed-righ">Habis</span>
								</td>							
						<?php	
						}else{
						?>
							<td><?php echo $row->sks; ?></td>						
						<?php

						}
						?>
						<?php 
						$cek_id_mhs =$this->db->query("SELECT * FROM t_mahasiswa WHERE nim='$row->nim'")->row(); 
						$cek_frs = $this->db->query("SELECT * FROM t_detail_frs as a WHERE a.id_mhs='$cek_id_mhs->id_mahasiswa' AND a.semester='$row->smt'")->num_rows();
						if($cek_frs >= 0 ){
						?>						
						<td class="td-actions">
								<a class="green" href="<?php echo base_url(); ?>c_index_aka/detail_manipulasi/<?php echo $row->nim; ?>/<?php echo $row->smt; ?>">
									<i class="icon-zoom-in bigger-130"></i>
								</a>
						</td>						
						<?php 
					}else{
						?>
						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<span class=''>Belum diisi</span>
							</div>
						</td>						
						<?php 
						}
						?>
					
					</tr>
					<?php
						$no++;
					}
					 ?>
<?php echo $this->m_aka->msg('msg_cari_nim','alert-eror'); ?>	
<?php echo $this->m_aka->msg('msg_simpan','alert-succes'); ?>					 
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

