<!DOCTYPE html>
<html>
<head>
	<title>PRINT DAFTAR KEHADIRAN 16 MINGGU</title>

	<style type="text/css">
	body{
		font-family:"Opensans",sans-serif;
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
	.logo2{
		margin-right:15px;
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
		<td width="5%" ><img src="assets/images/Kemenperin.jpg" width="150px"000></td>
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

<table border="0" width="100%">
	<tr>
		<td colspan="5" align="center">
			<font class="title_ket"><b>NILAI MATA KULIAH</b><br></font>
		</td>
	</tr>
	<tr>
		<td class="title_ket" style="padding-right:10px"></td>
		<td class="title_ket"></td>
		<td width="9
		color:#fff;%"></td>
		<td class="title_ket" style="padding-right:10px">Tahun akademik</td>
		<td class="title_ket">:  <?php echo $this->input->post('tahun_akademik');?></td>
	</tr>

	<tr>
		<td class="title_ket" style="padding-right:10px">Kode Mata Kuliah</td>
		<td class="title_ket" width="290px">: <?php echo $loop_mk['kode_mk'];?></td>
		<td width="9
		color:#fff;%"></td>
		<td class="title_ket" style="padding-right:10px">Semester</td>
		<td class="title_ket">: <?php 
						 $semester_absen = $ambil_mk_smt['semester'];
						 	if($semester_absen == "1" or $semester_absen == "2"){
						 		if($semester_absen%2 == 1){
						 			$bilangan = "Gasal";
						 			echo $bilangan;
						 		}else{
						 			$bilangan = "Genap";
						 			echo $bilangan;
						 		}
					 		}else{
					 			echo $semester_absen;
					 		}
					 ?></td>
	</tr>

	<tr>
		<td class="title_ket" style="padding-right:10px">Nama Mata Kuliah</td>
		<td class="title_ket" width="290px">: <?php echo $loop_mk['nama_mk']; ?></td>
		<td></td>
		<td class="title_ket" style="padding-right:10px">SKS</td>
		<td class="title_ket">: <?php echo $loop_mk['jumlah_sks']; ?></td>
	</tr>

	
	<tr>
		<td colspan="5"><br></td>
	</tr>
	
</table>

<table class="gridtable" cellpadding="5">
	<tr class="abu-abu">
		<td width="2%" style="text-align:center;font-weight:bold;">NO</td>
		<td width="7%" style="text-align:center;font-weight:bold;">NIM</td>
		<td width="30%"  style="text-align:center;font-weight:bold;">NAMA MAHASISWA</td>
		<td style="text-align:center;font-weight:bold;">HURUF MUTU</td>
		<td style="text-align:center;font-weight:bold;">ANGKA MUTU</td>
		<td style="text-align:center;font-weight:bold;">KET</td>
		
	</tr>
	<?php 
		$no = 1;
		foreach($data as $data){ ?>
	<tr>
		<td style="text-align:center"><?php echo $no; ?></td>
		<td style="text-align:center"><?php echo $data['nim']; ?></td>
		<td style="text-align:center"><?php echo $data['nama']; ?></td>
		<td style="text-align:center"><?php echo $data['huruf_mutu']; ?></td>
		<td style="text-align:center"><?php echo $data['angka_huruf_mutu']; ?></td>
		<td style="text-align:center"></td>
		
		
	</tr>
	<?php 
		$no++;
	} ?>
</table>
