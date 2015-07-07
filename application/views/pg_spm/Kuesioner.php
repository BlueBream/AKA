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
	<li class="active">Data Kuesioner </li>
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
		Data Kuesioner
	</h1>
</div><!--/.page-header-->
	<div class="row-fluid">
		<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Judul Kuesioner
					</h4>
				</div>

		<div class="widget-body">
					<div class="widget-main">
						<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>p_spm/prosesinput_Kuesioner' enctype='multipart/form-data' />
							<!--<div class="control-group">
								<label class="control-label" for="form-field-1">Kode Kelas</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="kode_kelas" placeholder="" />
								</div>
							</div>-->

							<div class="control-group">
								<label class="control-label" for="form-field-1">Nama Judul</label>

								<div class="controls">
									<input type="text" id="form-field-1" required name="judul" placeholder="" />
								</div>
								<br>
							</div>
							

							<div class="form-actions">
								<input type="submit" value ="Save" class="btn btn-info">
							</div>
						</form>
				</div>
		</div>
	</div>
	</div><!--/.row-fluid-->
<div class="row-fluid">
				
			<div class="row-fluid">
			<div class="table-header">
				Kuesioner Mahasiswa
			</div>	
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;" width="2%" ><center>No</center></th>
						<th style="text-align:center;" width="88%" >Judul</th>
						<th style="text-align:center;" width="10%" >Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach ($data as $data) {
					?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $data['judul'];?></td>

							<td class="td-actions">
								<div class="hidden-phone visible-desktop action-buttons">
									<a class="green" href="<?php echo base_url(); ?>p_spm/edit_data_kuesioner/<?php echo $data['id_judul']; ?>">
										<i class="icon-pencil bigger-130"></i>
									</a>

									<a onClick="return confirm('Anda yakin ingin menghapus data ini ?')" class="red" href="<?php echo base_url(); ?>p_spm/Hapus_Judul_Kuesioner/<?php echo $data['id_judul']; ?>">
										<i class="icon-trash bigger-130"></i>
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
</div>
		
</div>
</div><!--/.page-content-->

