<!DOCTYPE html>
<html>
<head>
	<title>PRINT DAFTAR KEHADIRAN 16 MINGGU</title>

	<style type="text/css">
	body{
		font-family:"Opensans", sans-serif;
	}
	.title_header{
		font-size: 25px;
		font-style: bold;
	}

	.title_alamat{
		font-size: 12px;
	}
	.line{
		width: 100%;
		height: 2px;
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
	}
	.title_ket{
		font-size: 12px;
	}
	.title_name{
		font-size: 12px;
		background: #307ecc;
		color: #fff;
		border : 1px groove;
		padding-top: 7px;
		padding-bottom: 7px;
		font-style: bold;
	}
	.title_value{
		font-size: 11px;
		padding-top: 5px;
		padding-bottom: 5px;
		padding-left: 3px;
	}

	.gridtable{
		width: 100%;
	}
	table.gridtable{
		border-width: 1px;
		border-color: #307ecc;
		border-collapse: collapse;
		font-family:"Open sans",sans-serif;
		font-size: 12px;
	}
	table.gridtable tr{
		border-width: 1px;
		border-style: solid;
		border-color: #000;
		font-size: 12px;		
	}
	table.gridtable td{
		border-width: 1px;
		border-style: solid;
		border-color: #000;
		font-size: 12px;

	}
	</style>
</head>
<body>


<table border="0" width="100%">
	<tr>
		<td width="5%" ><img src="assets/images/Kemenperin.jpg" width="120px"000></td>
		<td align="center">
			KEMENTRIAN PERINDUSTRIAN REPUBLIK INDONESIA
			<br>
			<font class="title_header">AKADEMI KIMIA ANALISIS</font>
			<br>
			<font class="title_alamat">Jalan Panggeran Sogiri Nomor 283 Tanah Baru - Bogor 16158
			<br>
			Telp. (0251) 8650351 Fax. (0251) 8650352</font>
		</td>
		<td width="18%" style="text-align:center" class="title_alamat">FR/BAAK-1.6.0.1<br><img src="assets/images/LOGO.jpg" width="70px" height="70px"></td>
	</tr>
	<tr>
		<td colspan="3">
			<hr>
		</td>

	</tr>
</table>
<table width="100%">
	<tr>
		<td align="center">
			<?php 
				$label =  $this->input->post('label_angkatan');
			 ?>
			<b>Data Password Mahasiswa Angkatan <?php echo $label; ?>
			</b>
		</td>
	</tr>
</table>
<br>
<table class="gridtable" cellpadding="5">
	<tr>
		<td style="text-align:center;">Nim</td>
		<td style="text-align:center;">Nama</td>
		<td style="text-align:center;">Angkatan</td>
		<td style="text-align:center;">Password</td>

	</tr>
	<?php 
		$id = $this->input->post('id_mhs');
		$count = count($id);
		for ($i=0; $i < $count ; $i++) {
		$nim = $this->input->post('nim_loop');
		$nama = $this->input->post('nama_loop');
		$angkatan = $this->input->post('angkatan_loop');
		$password_mhs = $this->input->post('password_mhs');
	 ?>
	<tr>

		<td style="text-align:center;font-weight:bold;"><?php echo $nim[$i]; ?></td>
		<td style="text-align:left;font-weight:bold;"><?php echo $nama[$i]; ?></td>
		<td style="text-align:center;font-weight:bold;"><?php echo $angkatan[$i]; ?></td>
		<td style="text-align:center;font-weight:bold;"><?php echo $password_mhs[$i]; ?></td>
	</tr>
	<?php } ?>
</table>
