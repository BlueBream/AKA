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

	<br>

<div class="row-fluid">
			<div class="table-header">
				Results for "hasil pencarian Mahasiswa"
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
					foreach ($query->result() as $row) {			 
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
						if($jml_sks <= 0 ){
						?>						
						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<a class="green" href="<?php echo base_url(); ?>p_mahasiswa/detail_frs/<?php echo $row->smt; ?>">
									<i class="icon-zoom-in bigger-130"></i>
								</a>
							</div>
						</td>
						<?php 
					}else{
						?>
						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<a class="green" href="<?php echo base_url(); ?>p_mahasiswa/frs/<?php echo $row->smt; ?>">
									<i class="icon-pencil bigger-130"></i>
								</a>
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
<?php echo $this->m_aka->msg('msg_cari_nim','alert-error'); ?>	
<?php echo $this->m_aka->msg('msg_simpan','alert-succes'); ?>
<?php echo $this->m_aka->msg('msg_error','alert-error'); ?>					 
				</tbody>
			</table>
</div>
				<div class="row-fluid">
			<div class="span6">
				
			</div>

</div>
</div><!--/.page-content-->

