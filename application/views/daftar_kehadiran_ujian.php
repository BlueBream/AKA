<!DOCTYPE html>
<html>
<head>
	<title>PRINT DAFTAR KEHADIRAN 16 MINGGU</title>

	<style type="text/css">
	.title_header{
		font-size: 30px;
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
	/* style grid table */
	.gridtable{
		width: 100%;
	}
	table.gridtable{
		border-width: 1px;
		border-color: #307ecc;
		border-collapse: collapse;
	}
	table.gridtable tr{
		border-width: 1px;
		border-style: solid;
		border-color: #B8B6B6;		
	}
	table.gridtable td{
		border-width: 1px;
		border-style: solid;
		border-color: #B8B6B6;

	}
	</style>
</head>
<body>


<table border="0" width="100%">
	<tr>
		<td><img src="<?php echo base_url(); ?>assets/images/1.jpg" width="120px" height="70px"></td>
		<td align="center">
			KEMENTRIAN PERINDUSTRIAN REPUBLIK INDONESIA
			<br>
			<font class="title_header">AKADEMI KIMIA ANALISIS</font>
			<br>
			<font class="title_alamat">Jalan Panggeran Sogiri Nomor 283 Tanah Baru - Bogor 16158
			<br>
			Telp. (0251) 8650351 Fax. (0251) 8650352</font>
		</td>
		<td class="title_alamat">FR/BAAK-1.6.0.1<br><img src="<?php echo base_url(); ?>assets/images/2.png" width="90px" height="90px"></td>
	</tr>
	<tr>
		<td colspan="3">
			<hr>
		</td>

	</tr>
</table>

<table border="0" width="100%">
	<tr>
		<td colspan="5" align="center">
			<font class="title_ket">DAFTAR HADIR UJIAN DAN NILAI<br></font>
		</td>
	</tr>
	<tr>
		<td class="title_ket" style="padding-right:10px">Nama Dosen</td>
		<td class="title_ket">: Okky setiawan</td>
		<td></td>
		<td class="title_ket" style="padding-right:10px">Tahun akademik</td>
		<td class="title_ket">: 2014/2015</td>
	</tr>

	<tr>
		<td class="title_ket" style="padding-right:10px">Kode Mata Kuliah</td>
		<td class="title_ket" width="290px">: KA 11.05</td>
		<td></td>
		<td class="title_ket" style="padding-right:10px">Semester</td>
		<td class="title_ket">: Gasal</td>
	</tr>

	<tr>
		<td class="title_ket" style="padding-right:10px">Nama Mata Kuliah</td>
		<td class="title_ket" width="290px">: Fisika I</td>
		<td></td>
		<td class="title_ket" style="padding-right:10px">SKS</td>
		<td class="title_ket">: 2</td>
	</tr>

	
	<tr>
		<td colspan="5"><br></td>
	</tr>
	
</table>


<table class="gridtable">
	<tr>
		<td colspan="3" width="10px" align="center" class="title_name">MAHASISWA</td>
		<td align="center" class="title_name">TTD</td>
		<td colspan="4" align="center" class="title_name">NILAI</td>
		<td align="center" class="title_name">Huruf Mutu</td>
		<td align="center" class="title_name">Ket</td>
	</tr>

	<tr>
		<td width="10px" align="center" class="title_name">NO</td>
		<td align="center" class="title_name">NIM</td>
		<td align="center" class="title_name">NAMA</td>
		<td align="center" class="title_name"></td>
		<td align="center" class="title_name">UTS</td>
		<td align="center" class="title_name">UAS</td>
		<td align="center" class="title_name">Tugas</td>
		<td align="center" class="title_name">Rata-Rata</td>
		<td align="center" class="title_name"></td>
		<td align="center" class="title_name"></td>
	</tr>


	<tr>
		<td align="center" class="title_value">1</td>
		<td align="center" class="title_value">1092</td>
		<td class="title_value">OKKY SETIAWAN</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>

</body>
</html>