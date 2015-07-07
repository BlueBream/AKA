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
		padding-top: 7px;
		padding-bottom: 7px;

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

	</tr>
</table>
<table width="100%">
	<tr>
		<td align="center">
			<b>Data Dosen Akademi Kimia Analisis
			</b>
		</td>
	</tr>
</table>
<br>
<table class="gridtable" cellpadding="5">
	<tr class="abu-abu">
		<td width="2%" style="text-align:center;font-weight:bold;">No</td>
		<td style="text-align:center;font-weight:bold;">Nip</td>
		<td style="text-align:center;font-weight:bold;">Nama Dosen</td>
		<td style="text-align:center;font-weight:bold;">TTL</td>
		<td style="text-align:center;font-weight:bold;">Alamat</td>
		<td style="text-align:center;font-weight:bold;">Gelar</td>
		<td style="text-align:center;font-weight:bold;">Foto</td>
	</tr>
	<?php 
		$no = 1;
		
		foreach($data as $data){ ?>
	<tr>
		<td style="text-align:center;"><?php echo $no; ?></td>
		<td style="text-align:center;"><?php echo $data['nip']; ?></td>
		<td style="text-align:center;"><?php echo $data['nama']; ?></td>
		<td style="text-align:center;"><?php echo $data['ttl']; ?></td>
		<td style="text-align:center;"><?php echo $data['alamat']; ?></td>
		<td style="text-align:center;"><?php echo $data['gelar']; ?></td>
		<td style="text-align:center;">
		<?php if(!empty($data['foto'])){ ?>
			<img width="100px" height = "100px" src="assets/images/<?php echo $data['foto']; ?>" alt="">
		<?php }else{ ?>
			<img width="100px" height = "100px" src="assets/images/dummyperson.jpg" alt="">
		<?php } ?>
		</td>
	</tr>
	<?php 
		$no++;
	} ?>
</table>
