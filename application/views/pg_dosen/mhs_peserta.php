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
		Peserta Mahasiswa
		<small>
			<i class="icon-double-angle-right"></i>
			Peserta Mahasiswa
		</small>
	</h1>
</div><!--/.page-header-->

<div class="row-fluid">
			<?php
				$this->m_aka->msg('msg','success');
			?>
			<div class="table-header">
				Results for "hasil pencarian Peserta Mahasiswa"
			</div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no = 1;
					foreach ($data as $data) {			 
				?>
					<tr>
						<td><center><?php echo $no;?></center></td>
						<td><?php echo $data['nim']; ?></td>
						<td><?php echo $data['nama']; ?></td>
					</tr>
					<?php
						$no++;
					} ?>

				</tbody>
				
			</table>
				<div class="row-fluid">
			<div class="span6">
				
			</div>
			<div class="span6">
			<div class="dataTables_paginate paging_bootstrap pagination">
					<?php echo $pagination; ?>
				</div>
			</div>
</div>
</div><!--/.page-content-->

