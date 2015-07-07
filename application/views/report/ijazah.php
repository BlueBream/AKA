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
	<li class="active">Ijazah Mahasiswa</li>
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
		Cetak Ijazah Mahasiswa
	</h1>
</div><!--/.page-header-->

<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?>c_index_aka/ijazah'>
		<div class="control-group">		
				<div class="controls">
					<label class="control-label" for="form-field-1">Cari Data Ijazah Mahasiswa</label>
					<input type="text" id="form-field-1" placeholder="" name="data_ijazah" required autocomplete="off"/>
				</div>
				<div class="controls">
					<label class="control-label" for="form-field-1">Parameter Pencarian</label>				
					<select id="form-field-select-1" name="parameter">
										<option />- Pilih Parameter Pencarian -
										<option value="nim" />NIM
										<option value="mahasiswa" />Nama Mahasiswa
										<option value="angkatan" />Angkatan
									</select>
					<label class="control-label" for="form-field-1">Program Studi</label>			
					<select id="form-field-select-1" name="program_studi">
						<option />- Pilih Program Studi -
						<?php	
						$k = $this->db->query("SELECT * FROM t_prodi");									
						$st = $k->result();
						foreach($st as $row){ 
						 ?>
						<option value="<?php echo $row->prodi; ?>" name="program_studi"><?php echo $row->prodi;  ?> </option>
									
							<?php
							}
						?>
						
					</select>

					<br><br>
				<input style="margin-top:-10px;"type="submit" name="cari_ijazah" class="btn btn-small btn-primary" value="Cari">
				</div>
		</div>
		</form>
	</div><!--/.row-fluid-->
	<br>

<div class="row-fluid">
			<?php
				$this->m_aka->msg('msg','error');
				$this->m_aka->msg('msg_success','success');
			?>
			<div class="table-header">
				Ijazah
			</div>			
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center;"><center>No</center></th>
						<th style="text-align:center;">NIM</th>
						<th style="text-align:center;">Nama Mahasiswa</th>
						<th style="text-align:center;">Tempat Tanggal Lahir</th>
						<th style="text-align:center;">Tanggal Lulus</th>
						<th style="text-align:center;">Status Kuliah</th>
						<th style="text-align:center;">Cetak depan</th>
						<th style="text-align:center;">Cetak belakang</th>

					</tr>
				</thead>

				<tbody>
					
				<?php

					//Loop data
					$no = $this->uri->segment(3);
					if( empty($no) ){
						$no = 1;
					}else{
						$no = $no + 1;
					}
					foreach ($data as $data) {
					$ex_tanggal = explode("-", $data['tanggal_lulus']);
					$bulan_ex = $ex_tanggal[1]; 
					if($bulan_ex == "1"){
					$bulan = "Januari";
					}else if($bulan_ex == "2"){
						$bulan = "Februari";
					}else if($bulan_ex == "3"){
						$bulan = "Maret";
					}else if($bulan_ex == "4"){
						$bulan = "April";
					}else if($bulan_ex == "5"){
						$bulan = "Mei";
					}else if($bulan_ex == "6"){
						$bulan = "Juni";
					}else if($bulan_ex == "7"){
						$bulan = "Juli"; 
					}else if($bulan_ex == "8"){
						$bulan = "Agustus";
					}else if($bulan_ex == "9"){
						$bulan = "September";
					}else if($bulan_ex == "10"){
						$bulan = "Oktober";
					}else if($bulan_ex == "11"){
						$bulan = "November";
					}else if($bulan_ex == "12"){
						$bulan = "Desember";
					}			 
				?>
					<tr>
						<td style="text-align:center;"><?php echo $no; ?></td>
						<td width="4%" style="text-align:center;"><?php echo $data['nim']; ?></td>
						<td width="20%" style="text-align:center;"><?php echo $data['nama']; ?></td>
						<td width="15%" style="text-align:center;"><?php echo $data['ttl']; ?></td>
						<td width="15%" style="text-align:center;"><?php echo $ex_tanggal[0]."-".$bulan."-".$ex_tanggal[2]; ?></td>
						<td width="1%" style="text-align:center;"><?php echo $data['status_kuliah']; ?></td>
						<td style="text-align:center;">	
							<a target="_blank" href="<?php echo base_url(); ?>c_index_aka/form_ijazah/ijazah_depan/<?php echo $data['id_mahasiswa']; ?>"><button class="btn btn-small btn-success">Cetak</button></a>
						</td>
						<td style="text-align:center;">
							<a style="margin-top:20px;float:none;"target="_blank" href="<?php echo base_url(); ?>c_index_aka/form_ijazah/ijazah_belakang/<?php echo $data['id_mahasiswa']; ?>"><button class="btn btn-small btn-success">Cetak</button></a>
						</td>
						
					</tr>
					<?php
						$no++;
					}
					 ?>
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

