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
	<li class="active">Input Nilai</li>
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

		<div class="control-group">		
				<div class="controls">
				<form method="post">
					<label class="control-label" for="form-field-1">Cari Data Mahasiswa</label>
					<input type="text" id="form-field-1" placeholder="berdasarkan NIM" name="src"/>
					<input type ="submit" name="cari" value="Cari" class="btn btn-info"/>
				</form>
				</div>
		</div>
	</div><!--/.row-fluid-->
	<br>
<div class="row-fluid">
	<?php if($datacari != "") { ?>
			<div class="table-header">
				Results for "hasil pencarian Mahasiswa"
			</div>
		
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>


						</th>
					</tr>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no = 1;
					foreach ($datacari as $datacari) {			 
				?>
					<tr>
						<td><center><?php echo $no;?></center></td>
						<td><?php echo $datacari['nim']; ?></td>
						<td><?php echo $datacari['nama']; ?></td>


						<td class="td-actions">
							<div class="hidden-phone visible-desktop action-buttons">
								<a class="green" href="<?php echo base_url(); ?>c_index_aka/input_nilai/<?php echo $datacari['id_mahasiswa']; ?>">
									<i class="icon-pencil bigger-130"></i> Input nilai
								</a>

							</div>

							
						</td>
					</tr>
					<?php
						$no++;
					} ?>
				</tbody>
			</table>
			<?php } ?>
</div>
</div><!--/.page-content-->

