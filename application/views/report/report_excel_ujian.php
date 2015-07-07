<!DOCTYPE html>
<html>
<head>
	<title>PRINT DAFTAR KEHADIRAN UJIAN</title>

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
	/* style grid table */
	.gridtable{
		width: 100%;
	}
	table.gridtable{
		border-width: 1px;
		border-color: #307ecc;
		border-collapse: collapse;
		font-size: 12px;
	}
	table.gridtable tr{
		border-width: 1px;
		border-style: solid;
		border-color: #000;	

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

<table border="0" width="100%">
	<tr>
		<td colspan="5" align="center">
			<font class="title_ket"><b>DAFTAR HADIR UJIAN DAN NILAI</b><br></font>
		</td>
	</tr>
	<tr>
		<td class="title_ket" style="padding-right:10px">Nama Dosen</td>
		<td class="title_ket">: 
			<!--
				$id_mk2 = $this->input->post("mata_kuliah_sec");
				$querydata = $this->db->query("SELECT * FROM t_mk WHERE kode_mk = '$id_mk2'");
				$ambildata = $querydata->row_array();
				$id_asli =  $ambildata['id_mk'];
				$querydosen2 = $this->db->query("SELECT * FROM t_pengajar,t_dosen WHERE t_pengajar.id_mk = '$id_asli' AND t_dosen.id_dosen = t_pengajar.id_dosen");
				$ambildosen2 = $querydosen2->row_array();
				echo $ambildosen2['nama'].".".$ambildosen2['gelar'];
			 -->
		</td>
		<td width="9
		color:#fff;%"></td>
		<td class="title_ket" style="padding-right:10px">Tahun akademik</td>
		<td class="title_ket">:  <?php echo $this->input->post('tahun_akademik_sec');?></td>
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
		<td colspan="3"  style="text-align:center;font-weight:bold;" width = "60%" align="center">MAHASISWA</td>
		<td width="10%" style="text-align:center;font-weight:bold;"  width="1%" align="center">TTD</td>
		<td colspan="4"  style="text-align:center;font-weight:bold;" width="20%" align="center">Nilai</td>
		<td align="center"  style="text-align:center;font-weight:bold;" width="8%">Huruf Mutu</td>
		<td width="5%"  style="text-align:center;font-weight:bold;" align="center">Keterangan</td>
	</tr>
	<tr>
		<td width="1%" style="text-align:center;font-weight:bold;"  align="center">No</td>
		<td width="8%"  style="text-align:center;font-weight:bold;" align="center">NIM</td>
		<td width="30%"  style="text-align:center;font-weight:bold;" align="center" >Nama</td>
		<td></td>
		<td  style="text-align:center;font-weight:bold;" align="center">UTS</td>
		<td  style="text-align:center;font-weight:bold;" align="center">UAS</td>
		<td  style="text-align:center;font-weight:bold;" align="center">Tugas</td>
		<td  style="text-align:center;font-weight:bold;" align="center">Rata-rata</td>
		<td></td>
		<td></td>
	</tr>
<?php 
	$no = 1;
	foreach ($data as $data) {
 ?>
	<tr>
		<td style="text-align:center;"><?php echo $no; ?></td>
		<td style="text-align:center;"><?php echo $data['nim']; ?></td>
		<td style="text-align:left;"><?php echo $data['nama']; ?></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
<?php 
$no++;
}
?>
</table>

</body>
</html>
