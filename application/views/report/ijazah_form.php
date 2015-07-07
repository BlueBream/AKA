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
	<li class="active">Cetak Ijazah Mahasiswa</li>
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
	<?php $this->m_aka->msg('msg', 'error'); ?>
	<div class="row-fluid">
		<form method="post" action='<?php echo base_url();?>c_index_aka/form_ijazah'>
		<div class="control-group">
			<input type="hidden" name="id_mhs" value="<?php echo $uri_id; ?>">
			<input type="hidden" name="page" value="<?php echo $uri_page; ?>">
		<div class="controls">
			<label class="control-label" for="form-field-1">Nomor Ijazah</label>
				<?php 
					$query_nomor = $this->db->query("SELECT * FROM t_mahasiswa WHERE t_mahasiswa.id_mahasiswa = '$uri_id'");
				 	$data_nomor = $query_nomor->row_array();
				 ?>
				<div class="controls">	
					<input type="text" name="no_ijazah" value="<?php echo $data_nomor['no_ijazah']; ?>">
				</div>	
		</div>

		<div class="controls">
			<?php 
				$db_lulus = $data_nomor['tanggal_lulus'];
				$ex_db = explode("-", $db_lulus);
			 ?>
			<label class="control-label" for="form-field-1">Tahun Lulus</label>
			<div class="controls">
				<select name="tanggal_lulus">
					<?php 
						for ($i=1; $i <= 31 ; $i++) {
							if($ex_db[0] == $i){
								$selected = "selected";
							}else{
								$selected = "";
							}
					?>
						<option value="<?php echo $i; ?>" <?php echo $selected; ?> > <?php echo $i; ?></option>
					<?php
						}
					 ?>
				</select>
				
				<select name="bulan_lulus">
					<?php 
						for ($a=1; $a <= 12 ; $a++) {

							if($ex_db[1] == $a){
								$selected = "selected";
							}else{
								$selected = "";
							}
					?>
						<option value="<?php echo $a; ?>" <?php echo $selected; ?>> <?php echo $a; ?></option>
					<?php
						}
					 ?>
				</select>
				<select name="tahun_lulus">
					<?php 
						$now = date('Y');
						for ($b=2000; $b <= $now ; $b++) {
							if($ex_db[2] == $b){
								$selected = "selected";
							}else{
								$selected = "";
							}
					?>
						<option value="<?php echo $b; ?>" <?php echo $selected; ?> > <?php echo $b; ?></option>
					<?php
						}
					 ?>
				</select>
			</div>	
		</div>

		<label class="control-label" for="form-field-1">Tahun Yudisium</label>
			<div class="controls">
				<?php 
					$db_lulus2 = $data_nomor['tahun_yudisium'];
					$ex_db2 = explode("-", $db_lulus2);
				 ?>
				<select name="tanggal_yudisium">
					<?php 
						for ($i=1; $i <= 31 ; $i++) {
							if($ex_db2[0] == $i){
								$selected = "selected";
							}else{
								$selected = "";
							}
					?>
						<option value="<?php echo $i; ?>" <?php echo $selected; ?> > <?php echo $i; ?></option>
					<?php
						}
					 ?>
				</select>
				
				<select name="bulan_yudisium">
					<?php 
						for ($a=1; $a <= 12 ; $a++) {

							if($ex_db2[1] == $a){
								$selected = "selected";
							}else{
								$selected = "";
							}
					?>
						<option value="<?php echo $a; ?>" <?php echo $selected; ?>> <?php echo $a; ?></option>
					<?php
						}
					 ?>
				</select>
				<select name="tahun_yudisium">
					<?php 
						$now = date('Y');
						for ($b=2000; $b <= $now ; $b++) {
							if($ex_db2[2] == $b){
								$selected = "selected";
							}else{
								$selected = "";
							}
					?>
						<option value="<?php echo $b; ?>" <?php echo $selected; ?> > <?php echo $b; ?></option>
					<?php
						}
					 ?>
				</select>
			</div>	
		</div>

			<div class="controls">
				<input type="submit" name="cari_ijazah" class="btn btn-info btn-small" value="Cetak Ijazah">
			</div>					
		</div>
		</form>
	</div><!--/.row-fluid-->
	<br>
</div><!--/.page-content-->

