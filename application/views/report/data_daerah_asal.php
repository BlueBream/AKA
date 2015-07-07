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
	<li class="active">Daerah Asal Mahasiswa</li>
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
		Daftar Daerah Asal Mahasiswa
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<?php $this->m_aka->msg('msg', 'error'); ?>
		<form method="post" action='<?php echo base_url();?>c_index_aka/report_daerah_asal'>
		<div class="control-group">
		<div class="controls">
			<label class="control-label" for="form-field-1">Provinsi</label>
				<div class="controls">	
					<select name="provinsi">
						<?php 
							$provinsi = array(
								'1' => 'Nangroe Aceh Darussalam',
								'2' => 'Sumatera Utara',
								'3' => 'Sumatera Barat',
								'4' => 'Riau',
								'5' => 'Kepulauan Riau',
								'6' => 'Jambi',
								'7' => 'Sumatera Selatan',
								'8' => 'Bangka Belitung',
								'9' => 'Lampung',
								'10' => 'Bengkulu',
								'11' => 'Jakarta',
								'12' => 'Jawa Barat',
								'13' => 'Banten',
								'14' => 'Jawa Tengah',
								'15' => 'Yogyakarta',
								'16' => 'Jawa Timur',
								'17' => 'Bali',
								'18' => 'Nusa Tenggara Timur',
								'19' => 'Nusa Tenggara Barat',
								'20' => 'Kalimantan Barat',
								'21' => 'Kalimantan Tengah',
								'22' => 'Kalimantan Selatan',
								'23' => 'Kalimantan Timur',
								'24' => 'Kalimantan Utara',
								'25' => 'Sulawesi Utara',
								'26' => 'Sulawesi Tengah',
								'27' => 'Sulawesi Selatan',
								'28' => 'Sulawesi Tenggara',
								'29' => 'Sulawesi Barat',
								'30' => 'Gorontalo',
								'31' => 'Maluku',
								'32' => 'Maluku Utara',
								'33' => 'Papua',
								'34' => 'Papua Barat'
							);
							foreach($provinsi as $provinsi){
						?>
							<option value="<?php echo $provinsi; ?>"><?php echo $provinsi; ?></option>
						<?php
							}
						 ?>
					</select>
				</div>	
				</div>
				<div class="controls">
					<label for="form-fields-2" class="control-labrl">Angkatan</label>
						<select name="angkatan">
							<?php foreach ($tahun as $tahun): ?>
								<option value="<?php echo $tahun['tahun_akademik']; ?>"><?php echo $tahun['tahun_akademik']; ?></option>	
							<?php endforeach ?>
						</select>
				</div>
			<div class="controls">
				<label class="control-label" for="form-fiels-2">Kabupaten/Kota</label>
				<input type="text" name="kabupaten" placeholder = "Kabupaten">
			</div>
			<div class="controls">
				<input type="submit" name="cari_asal" class="btn btn-info btn-small" value="Buat Laporan">
			</div>					
		</div>
		</form>
	</div><!--/.row-fluid-->
	<br>
</div><!--/.page-content-->

