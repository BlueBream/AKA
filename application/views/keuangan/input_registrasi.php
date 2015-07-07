<script type="text/javascript">
	function tot_bayar(){
		// total biaya
		var tb1 = parseFloat(document.forms.reg.total_bayar.value);
		// uang input user
		var tb2 = parseFloat(document.forms.reg.jumlah_uang.value);
		if(tb1 > tb2){
			document.forms.reg.sisa_cicilan.value=tb1-tb2;
			document.forms.reg.kembalian.value="-";
		}
		if(tb1 < tb2){
			document.forms.reg.kembalian.value=tb2-tb1;
			document.forms.reg.sisa_cicilan.value="-";
		}
	}
	function tot_sks(){
		// total biaya
		var sks1 = parseFloat(document.forms.reg.sks_teori.value);
		// uang input user
		var sks2 = parseFloat(document.forms.reg.sks_praktek.value);
		document.forms.reg.sks_jumlah.value=sks1+sks2;
	}
	function jumlah_harga_sks(){
		// total biaya
		var sks1 = parseFloat(document.forms.reg.sks_teori.value);
		// uang input user
		var sks2 = parseFloat(document.forms.reg.sks_praktek.value);
		//data
		var sks_t = parseFloat(document.forms.reg.h_sks_t.value);
		var sks_p = parseFloat(document.forms.reg.h_sks_p.value);

		document.forms.reg.hasil_jumlah_harga_sks.value=(sks1*sks_t)+(sks2*sks_p);
	}
	function tot_biaya(){
		var b_daftar = parseFloat(document.forms.reg.biaya_daftar_ulang.value);
		var b_spp = parseFloat(document.forms.reg.biaya_spp.value);
		var b_internet = parseFloat(document.forms.reg.biaya_internet.value);
		var h_jumlah_h = parseFloat(document.forms.reg.hasil_jumlah_harga_sks.value);

		document.forms.reg.total_bayar.value=b_daftar+b_spp+b_internet+h_jumlah_h;
	}

	var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
    }



</script>
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
	<li class="active">Data Biaya Kuliah</li>
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
		Keuangan
		<small>
			<i class="icon-double-angle-right"></i>
			Data Biaya Kuliah
		</small>
	</h1>
</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Data Mahasiswa
					</h4>
				</div>

			<div class="widget-body">
						<div class="widget-main">
						<?php foreach($edit as $data){?>

							<form class="form-horizontal" enctype='multipart/form-data' />
								
								<div class="control-group">
									<label class="control-label" for="form-field-1">FOTO</label>
									<div class="controls">
										<img src="<?php echo base_url(); ?>assets/images/<?php echo $data['foto']; ?>" width="200px" height="200px" alt="">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Nim :</label>
										
									<div class="controls">
									<label class="control-label" for="form-field-1" style="color: #438eb9;text-align: left !important;"><?php echo $data['nim'];?></label>
									
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-1">Nama Mahasiswa :</label>
										
									<div class="controls">
									<label class="control-label" for="form-field-1" style="color: #438eb9;text-align: left !important;"><?php echo $data['nama'];?></label>
									
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Jenis Kelamin :</label>
										
									<div class="controls">
									<label class="control-label" for="form-field-1" style="color: #438eb9;text-align: left !important;"><?php echo $data['jenis_kelamin'];?></label>
									
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Alamat :</label>
										
									<div class="controls">
									<label class="control-label" for="form-field-1" style="color: #438eb9;text-align: left !important;"><?php echo $data['alamat'];?></label>
									
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Tempat Tanggal Lahir :</label>
										
									<div class="controls">
									<label class="control-label" for="form-field-1" style="color: #438eb9;text-align: left !important;"><?php echo $data['ttl'];?></label>
									
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Jumlah SKS Yang Sudah Diambil</label>
										
									<div class="controls">
									<label class="control-label" for="form-field-1" style="color: #438eb9;text-align: left !important;"><?php 
										if($jumlah_sks['total_sks'] > 0 or $jumlah_sks['total_sks'] != ""){
											echo $jumlah_sks['total_sks'];
										}else{
											echo "0";
										}
									?></label>
									
									</div>
								</div>
							</form>
					</div>
			</div>
		</div>
	</div><!--/.row-fluid-->


	<div class="row-fluid">
		<div class="widget-box">
				<div class="widget-header">
					<h4 class="smaller">
						Input Registrasi pembayaran
					</h4>
				</div>

			<div class="widget-body">
						<div class="widget-main">
							<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>c_index_aka/prosesinput_registrasi' name="reg" enctype='multipart/form-data' />
								<div class="control-group">
									<label class="control-label" for="form-field-1">Pembayaran Semester</label>
									<div class="controls">
										<select name="semester">
											<option name="semester">1</option>
											<option name="semester">2</option>
											<option name="semester">3</option>
											<option name="semester">4</option>
											<option name="semester">5</option>
											<option name="semester">6</option>
											<option name="semester">7</option>
											<option name="semester">8</option>
											<option name="semester">9</option>
											<option name="semester">10</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Pembelian SKS :</label>
									<div class="controls">
										
									</div>
								</div>
								<?php 
									$nama = "sks_teori";
									$k = $this->db->query("SELECT * FROM t_biaya_akademik WHERE nama = '$nama'");									
									//$k = $this->db->query("SELECT * FROM t_harga_sks WHERE id = 1");
									$st = $k->result();
									foreach($st as $row){ 
								 ?>
								<div class="control-group">
									<label class="control-label" for="form-field-1">SKS Teori</label>
									<div class="controls">
										<input type="text" required name="sks_teori"  placeholder="" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"/><span id="error" style="color: Red; display: none">* Inputan harus berupa angka(0-9) </span>	 SKS / <?php echo $row->harga;?>
										<input type="hidden" name="h_sks_t" value="<?php echo $row->harga?>">
										
									</div>
								</div>
								
								<?php
									}
								?>
								<?php 
									$nama = "sks_praktek";
									$k = $this->db->query("SELECT * FROM t_biaya_akademik WHERE nama = '$nama'");

									//$k = $this->db->query("SELECT * FROM t_harga_sks WHERE id = 2");
									$sp = $k->result();
									foreach($sp as $row){ 
								 ?>
								 <?php
									$st = $data['sks_praktek'];
									$h2 = $row->harga;
									$jum_st2 = $st * $h2;
								?>
								<div class="control-group">
									<label class="control-label" for="form-field-1">SKS Praktek</label>
									<div class="controls">
										<input type="text" required name="sks_praktek" placeholder="" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"/> SKS / <?php echo $row->harga;?>
										<input type="hidden" name="h_sks_p" value="<?php echo $row->harga?>">
									</div>
								</div>
								
								<?php
									}
								?>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Total SKS</label>
									<div class="controls">
										<input type="text" readonly required name="sks_jumlah" onblur="return tot_sks();"/>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-1">Total Harga Pembelian SKS</label>
									<div class="controls">
										Rp. <input type="text" id="form-field-1" readonly required onblur="return jumlah_harga_sks();" name="hasil_jumlah_harga_sks"  placeholder="" />
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-1">Biaya Utama :</label>
									<div class="controls">
										
									</div>
								</div>
								<?php 
									$nama = "daftar_ulang";
									$tba = $this->db->query("SELECT * FROM t_biaya_akademik WHERE nama = '$nama'");
									$ba = $tba->result();
									foreach($ba as $row){ 
										$daftar_ulang = $row->harga;
								 ?>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Biaya Daftar Ulang</label>
									<div class="controls">
										Rp. <input type="text" id="form-field-1" readonly required name="biaya_daftar_ulang" value="<?php echo $row->harga;?>"  placeholder="" />
										
									</div>
								</div>
								<?php 
									}
								 ?>
								 <?php 
									$nama = "spp";
									$tba = $this->db->query("SELECT * FROM t_biaya_akademik WHERE nama = '$nama'");
									$ba = $tba->result();
									foreach($ba as $row){ 
										$biaya_akademik = $row->harga;
								 ?>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Biaya SPP</label>
									<div class="controls">
										Rp. <input type="text" id="form-field-1" readonly required name="biaya_spp" value="<?php echo $row->harga;?>"  placeholder="" />
									</div>
								</div>
								<?php 
									}
								 ?>
								<?php 
									$nama = "internet";
									$tba = $this->db->query("SELECT * FROM t_biaya_akademik WHERE nama = '$nama'");
									$ba = $tba->result();
									foreach($ba as $row){ 
										$internet = $row->harga;
								 ?>								 
								<div class="control-group">
									<label class="control-label" for="form-field-1">Biaya Internet</label>
									<div class="controls">
										Rp. <input type="text" id="form-field-1" readonly required name="biaya_internet" value="<?php echo $row->harga;?>"  placeholder="" />
									</div>
								</div>
								<?php 
									}
								 ?>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Total Biaya</label>
									<div class="controls">
										Rp. <input type="text" id="form-field-1" readonly required name="total_bayar" onblur="return tot_biaya();"  placeholder="" />
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-1">Total Pembayaran</label>
									<div class="controls">
										Rp. <input type="text" id="form-field-1" required name="jumlah_uang" onblur="return tot_bayar();"  placeholder="" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"/> <span id="error" style="color: Red; display: none">* Inputan harus berupa angka(0-9)</span>	
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-1">Sisa Cicilan</label>
									<div class="controls">
										Rp. <input type="text" readonly id="form-field-1" required name="sisa_cicilan" onblur="return tot_bayar();"/>
										Kembalian	Rp. <input type="text" readonly id="form-field-1" required name="kembalian" onblur="return tot_bayar();" value="<?php echo $hasil; ?>"/>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-1">Memo Pembayaran</label>
									<div class="controls">
										<textarea rows = "4" id="form-field-1" name="memo"></textarea>
									</div>
								</div>

								<!-- tanggal -->
								<input type="hidden" name="tanggal" value="<?php echo date("Y/m/d"); ?>"/>
								<!-- tahun -->
								<input type="hidden" name="tahun" value="<?php echo date("Y"); ?>"/>
								<!-- id mahasiswa -->
								<input type="hidden" name="id_mahasiswa" value="<?php echo $data['id_mahasiswa'];?>"/>
								<!-- nim mahasiswa -->
								<input type="hidden" name="nim" value="<?php echo $data['nim'];?>"/>
								<!-- pendaftaran -->
								<input type="hidden" name="pendaftaran" value="buka"/>

								<div class="form-actions">
									<input type="submit" value ="Save" class="btn btn-info">
								</div>
							</form>
						<?php
							}
						?>
					</div>
			</div>
		</div>
	</div><!--/.row-fluid-->
	
</div>
</div><!--/.page-content-->

