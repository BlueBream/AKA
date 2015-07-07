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
		<td><img src="assets/images/1.jpg" width="120px" height="70px"></td>
		<td align="center">
			KEMENTRIAN PERINDUSTRIAN REPUBLIK INDONESIA
			<br>
			<font class="title_header">AKADEMI KIMIA ANALISIS</font>
			<br>
			<font class="title_alamat">Jalan Panggeran Sogiri Nomor 283 Tanah Baru - Bogor 16158
			<br>
			Telp. (0251) 8650351 Fax. (0251) 8650352</font>
		</td>
		<td class="title_alamat">FR/BAAK-1.6.0.1<br><img src="assets/images/2.png" width="90px" height="90px"></td>
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
			<font class="title_ket">DAFTAR KEHADIRAN SISWA KELAS A<br></font>
		</td>
	</tr>
	<tr>
		<td class="title_ket" style="padding-right:10px">Tahun Akademik</td>
		<td class="title_ket">: 2014/2015</td>
		<td></td>
		<td class="title_ket" style="padding-right:10px">SEMESTER</td>
		<td class="title_ket">: I,II</td>
	</tr>

	<tr>
		<td class="title_ket" style="padding-right:10px">Mahasiswa Angkatan</td>
		<td class="title_ket" width="290px">: 2013</td>
		<td></td>
		<td class="title_ket" style="padding-right:10px">Range IP</td>
		<td class="title_ket">: 0.00 s/d 4.00</td>
	</tr>

	
	<tr>
		<td colspan="5"><br></td>
	</tr>
	
</table>



<table class="gridtable">
	<tr>
		<td width="10px" align="center" class="title_name">NO</td>
		<td align="center" class="title_name">NIM</td>
		<td align="center" class="title_name">NAMA MAHASISWA</td>
		<td align="center" class="title_name">N X K</td>
		<td align="center" class="title_name">JUMLAH SKS</td>
		<td align="center" class="title_name">INDEKS PRESTASI</td>
	</tr>
	<?php 
		$no = 1;
		foreach($data as $data){ 
	?>
	<tr>
		<td align="center" class="title_value"><?php echo $no; ?></td>
		<td align="center" class="title_value"><?php 
			$query_nama = $this->db->query("SELECT * FROM t_mahasiswa WHERE nama = '$data['nama']'");
			$data_nama= $query_nama->row_array();
			echo $data_nama['nama'];
		?></td>
		<td class="title_value"><?php echo $data['id_mahasiswa']; ?></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php 
		$no ++;
	} ?>
</table>

</body>
</html>