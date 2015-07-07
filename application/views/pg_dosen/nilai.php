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
	<li class="active">Nilai per mahasiswa	</li>
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
		Nilai Mahasiswa Per semester
	</h1>
</div><!--/.page-header-->

	<br>
<div class="row-fluid">
				
			<div class="row-fluid">
				
			<div class="table-header">
				Nilai mahasiswa Bimbingan
			
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;" width="2%"><center>No</center></th>
						<th style="text-align:center;">Kode MK</th>
						<th style="text-align:center;" width="25%">Nama Mata Kuliah</th>
						<th style="text-align:center;" width="5%">Jumlah SKS</th>
						<th style="text-align:center;">Nilai Uts</th>
						<th style="text-align:center;">Nilai Uas</th>
						<th style="text-align:center;">Nilai Tugas</th>
						<th style="text-align:center;">Nilai Rata-rata</th>
						<th style="text-align:center;">Huruf Mutu</th>

					</tr>
				</thead>
					<?php
						$no =1 ; 
						foreach($data as $data){
					?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['kode_mk']; ?></td>
					<td><?php echo $data['nama_mk']; ?></td>
					<td><center><?php echo $data['jumlah_sks']; ?><center></td>
					<td><?php echo $data['nilai_uts']; ?></td>
					<td><?php echo $data['nilai_uas']; ?></td>
					<td><?php echo $data['nilai_tugas']; ?></td>
					<td><?php echo $data['bobot_nilai']; ?></td>
					<td><?php echo $data['huruf_mutu']; ?></td>
				</tr>
					<?php

						$no++;
					 	}
					 ?>					 
			</table>

			</div>
		
</div>
</div><!--/.page-content-->

