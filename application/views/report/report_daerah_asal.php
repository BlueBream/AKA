<!DOCTYPE html>
<html>
<head>
	<title>PRINT DAERAH ASAL MAHASISWA</title>

	<style type="text/css">
	body{
		font-family: "Opensans",sans-serif;
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
	.geser{
		margin-right:7px;
	}
	.abu-abu td{
		background:#B8B6B0;
	}
	</style>
</head>
<body>


<table border="0" width="100%">
	<tr>
		<td width="5%" ><img src="assets/images/Kemenperin.jpg" width="150px"></td>
		<td align="center">
			KEMENTERIAN PERINDUSTRIAN REPUBLIK INDONESIA
			<br>
			<font class="title_header">POLITEKNIK AKA BOGOR</font>
			<br>
			<font class="title_alamat">Jalan Panggeran Sogiri Nomor 283 Tanah Baru - Bogor 16158
			<br>
			Telp. (0251) 8650351 Fax. (0251) 8650352</font>
		</td>
		<td width="18%" style="text-align:right" class="title_alamat">FR/BAAK-1.6.0.1<br><img class="geser" src="assets/images/LOGO.jpg" width="70px" height="70px"></td>
	</tr>
	<tr>
		<td colspan="3">
			<hr>
		</td>
	<tr>
		<td colspan="3" align="center">
			<font class="title_ket"><b>DATA DAERAH ASAL MAHASISWA</b><br></font>
		</td>
	</tr>
	</tr>
</table>

<table class="gridtable" cellpadding="5">

	<tr class="abu-abu">
		<td width="2%" style="text-align:center;font-weight:bold;">NO</td>
		<td width="7%" style="text-align:center;font-weight:bold;">NIM</td>
		<td width="30%"  style="text-align:center;font-weight:bold;">NAMA MAHASISWA</td>
		<td style="text-align:center;font-weight:bold;">PROVINSI</td>
		<td style="text-align:center;font-weight:bold;">KABUPATEN/KOTA</td>
	</tr>
	<?php 
		$no = 1;
		foreach($data as $data){ ?>
	<tr>
		<td style="text-align:center"><?php echo $no; ?></td>
		<td style="text-align:center"><?php echo $data['nim']; ?></td>
		<td style="text-align:left"><?php echo $data['nama']; ?></td>
		<td style="text-align:center"><?php echo $data['provinsi']; ?></td>
		<td style="text-align:center"><?php echo $data['kabupaten']; ?></td>
		
	</tr>
	<?php 
		$no++;
	} ?>
</table>
