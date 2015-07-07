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
	<li class="active">Data Bimbingan</li>
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
		Bimbingan
		<small>
			<i class="icon-double-angle-right"></i>
			Data Bimbingan
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="control-group">		
				<!--<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data Dosen</label>
					<form method="post">
						<input type="text" id="form-field-1" name="src" placeholder="cari berdasarkan nama" />
						<input type="submit" name="submit" class="btn btn-small btn-primary" style="margin-top:-10px;">
					</form>
				</div>-->		
		</div>
	</div><!--/.row-fluid-->
	<br>
			<?php echo $this->m_aka->msg('msg_error','alert-eror'); ?>	
			<?php echo $this->m_aka->msg('msg','alert-succes'); ?>	
<div class="row-fluid">
			<div class="table-header">
				Results for Data Bimbingan
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;"><center>No</center></th>
						<th style="text-align:center;">NIM</th>
						<th style="text-align:center;">Nama Mahasiswa</th>
						<th style="text-align:center;">Opsi 
					<?php foreach($data->result() as $row){
						$id_dosen = $row->id_dosen;
					}
					?>
						<a href="<?php echo base_url();?>c_index_aka/get_mhs_mahasiswa/<?php echo $id_dosen;?>">
						<button class="btn btn-small btn-primary">Isi mahasiswa bimbingan</button>
						</a>
					</th>
					</tr>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no = 1;
					foreach ($data->result_array() as $data) {			 
				?>
					<tr>
						<td style="text-align:center;" ><?php echo $no;?></td>
						<td style="text-align:center;" ><?php echo $data['nim']; ?></td>
						<td style="text-align:center;" ><?php echo $data['nama']; ?></td>
						<td  style="text-align:center;" class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
										<a href="<?php echo base_url();?>c_index_aka/delete_mhs_bimbingan/<?php echo $data['id_bimbingan'];?>/<?php echo $data['id_dosen'];?>">
										<button class="btn btn-small btn-primary">Batalkan bimbingan</button>
									</a>
							</div>
						</td>
					</tr>
					<?php
						$no++;
					}
					 ?>
				</tbody>
			</table>
</div><!--/.page-content-->


