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
	<li class="active">Waktu Pengisian Nilai</li>
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


			<h1>Waktu Pengisian Nilai mahasiswa</h1>

	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<form action="<?php echo base_url(); ?>c_index_aka/input_waktu_nilai" method="post">
		<div class="control-group">
			<label for="lbl1">Tanggal Waktu Pengisian</label>
			<div class="controls">
				
				<div class="row-fluid input-append">
					<input style="width:200px;" required class="span10 date-picker" name="tanggal_waktu" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="tanggal_buka">
					<span class="add-on">
						<i class="icon-calendar"></i>
					</span>
				</div>

			
		</div>
		<div class="controls">
			<input type="submit" name="save_waktu_nilai" value="Save" class="btn btn-primary">
		</div>
	</form>
</div>
<br>
<div class="row-fluid">
<div class="alert alert-info"><i class="icon-exclamation-sign"></i> Anda Dapat Mesetting Batas Waktu Pengisian Nilai Di Halaman Ini</div>
<?php echo $this->m_aka->msg('msg','success'); ?>
	<div class="table-header">
		Batas Waktu Pengisian Nilai
			<div class="Aktif" style="text-align:right;margin-top:-40px;margin-right:10px;">
				<?php 
				$query = $this->db->query("SELECT * FROM t_waktu_nilai");
				$ambil_status = $query->row(); 
				$status = $ambil_status->status;
				if($status == 1){ ?>	
								<a href="<?php echo base_url(); ?>c_index_aka/update_waktu_nilai/0">
									<input type="submit" name="1" class="btn btn-small btn-info" value="Aktif">
								</a>
				<?php	}else{ ?>
								<a href="<?php echo base_url(); ?>c_index_aka/update_waktu_nilai/1">
									<input type="submit" name="0" class="btn btn-small btn-danger" value="Tidak Aktif">
								</a>
				<?php } ?>
			</div>
	</div>			
	<table id="sample-table-2"class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th style="text-align:center;">No</th>
				<th style="text-align:center;">Batas Waktu Pengisian Nilai</th>
				<th style="text-align:center;">Nilai Sudah Diupdate</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$no = 1;
			foreach ($waktu as $waktu):

			$waktu_nilai = explode("-", $waktu['waktu_nilai']);
			$bulan = $waktu_nilai[1];
			if($bulan == "01"){
					$bulan_ex = "Januari";
				}else if($bulan == "02"){
					$bulan_ex = "Februari";
				}else if($bulan == "03"){
					$bulan_ex = "Maret";
				}else if($bulan == "04"){
					$bulan_ex = "April";
				}else if($bulan == "05"){
					$bulan_ex = "Mei";
				}else if($bulan == "06"){
					$bulan_ex = "Juni";
				}else if($bulan == "7"){
					$bulan_ex = "Juli"; 
				}else if($bulan == "8"){
					$bulan_ex = "Agustus";
				}else if($bulan == "9"){
					$bulan_ex = "September";
				}else if($bulan == "10"){
					$bulan_ex = "Oktober";
				}else if($bulan == "11"){
					$bulan_ex = "November";
				}else if($bulan == "12"){
					$bulan_ex = "Desember";
				}
				$tanggal_nilai = $waktu_nilai[2]." - ".$bulan_ex." - ".$waktu_nilai[0];
		?>
			<tr>
				<td style="text-align:center;"><?php echo $no; ?></td>
				<td style="text-align:center;"><?php echo $tanggal_nilai; ?></td>
				<td style="text-align:center;"><?php echo $waktu['update']; ?></td>
			</tr>

		<?php
			$no++;
			endforeach;
		?>
		</tbody>
	</table>
	</form>
</div><!--/.page-content-->

