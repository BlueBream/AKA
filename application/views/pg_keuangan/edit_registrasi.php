<script type="text/javascript">
	function jumlah_uang(){
		// total biaya
		var tb1 = parseFloat(document.forms.reg.sc.value);
		// uang input user
		var tb2 = parseFloat(document.forms.reg.jumlah_uang1.value);
		if(tb1 > tb2){
			document.getElementById("lebih").style.display = ret ? "none" : "inline";
			document.forms.reg.hasil_jumlah_harga_sks.value=(sks1*sks_t)+(sks2*sks_p);
		}
		
	}
	function tot_sks(){
		// total biaya
		var sks1 = parseFloat(document.forms.reg.cicilan.value);
		// uang input user
		var sks2 = parseFloat(document.forms.reg.jumlah_uang1.value);
		document.forms.reg.sisa_cicilan.value=sks1-sks2;
	}

	function tot_jum(){
		// total biaya
		var sks1 = parseFloat(document.forms.reg.jumlah_uang2.value);
		// uang input user
		var sks2 = parseFloat(document.forms.reg.jumlah_uang1.value);
		document.forms.reg.jumlah_uang.value=sks1+sks2;
	}

	function sisa_cicilan(){
		// total biaya
		var sks1 = parseFloat(document.forms.reg.jumlah_uang.value);
		// uang input user
		var sks2 = parseFloat(document.forms.reg.jumlah_uang1.value);
		document.forms.reg.sisa_cicilan.value=sks1-sks2;
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
						Input Registrasi pembayaran
					</h4>
				</div>

			<div class="widget-body">
						<div class="widget-main">
						<?php 
							function formatRupiah($nilaiUang)
							{
							  $nilaiRupiah 	   = "";
							  $jumlahAngka  = strlen($nilaiUang);
							  while($jumlahAngka > 3)
							  {
							    $nilaiRupiah    = "." . substr($nilaiUang,-3) . $nilaiRupiah;
							    $sisaNilai         = strlen($nilaiUang) - 3;
							    $nilaiUang       = substr($nilaiUang,0,$sisaNilai);
							    $jumlahAngka = strlen($nilaiUang);
							  }
							 
							  $nilaiRupiah       = "Rp " . $nilaiUang . $nilaiRupiah . ",-";
							  return $nilaiRupiah;
							}

						foreach($edit as $data)
							$sisa_cicil = $data['sisa_cicilan'];
							{

							?>
							<form class="form-horizontal" method='POST' action='<?php echo base_url(); ?>p_keuangan/prosesedit_registrasi' name="reg" enctype='multipart/form-data' />
								
								<div class="control-group">
									<label class="control-label" for="form-field-1">Cicilan</label>
									<div class="controls">
										Rp. <input type="text" readonly id="form-field-1" value="<?php echo formatRupiah($sisa_cicil); ?>" required name=""/> 
										<input type="hidden" readonly id="form-field-1" value="<?php echo $data['sisa_cicilan']; ?>" required name="cicilan"/>
									</div>
								</div>
								
								
								
							
								<div class="control-group">
									<label class="control-label" for="form-field-1">Jumlah Uang</label>
									<div class="controls">
										Rp. <input type="text" required name="jumlah_uang1" placeholder="" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"/>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="form-field-1">Sisa Cicilan</label>
									<div class="controls">
										Rp. <input type="text" readonly required name="sisa_cicilan" onblur="return tot_sks();"/>
									</div>
								</div>
								
								<input type="hidden" name="jumlah_uang2" value="<?php echo $data['jumlah_uang'] ?>"/>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Jumlah Yang Sudah di Bayar</label>
									<div class="controls">
										Rp. <input type="text" readonly required name="jumlah_uang" onblur="return tot_jum();" placeholder="" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"/>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-1">Memo</label>
									<div class="controls">
										<textarea rows = "4" id="form-field-1" name="memo"><?php echo $data['memo']; ?></textarea>
									</div>
								</div>

								<!--		 
								<input type="text" name="jumlah_uang" placeholder="" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"/>
									-->

								<!-- tanggal -->
								<input type="hidden" name="tanggal" value="<?php echo date("Y/m/d"); ?>"/>
								<!-- tahun -->
								<input type="hidden" name="tahun" value="<?php echo date("Y"); ?>"/>
								<!-- id mahasiswa -->
								<input type="hidden" name="id_mahasiswa" value="<?php echo $data['id_mahasiswa'];?>"/>
								<!-- nim mahasiswa -->
								<input type="hidden" name="nim" value="<?php echo $data['nim'];?>"/>
								<input type="hidden" name="id_registrasi" value="<?php echo $data['id_registrasi'];?>"/>
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

	