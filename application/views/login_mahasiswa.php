<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>SIMAK MAHASISWA POLITEKNIK AKA BOGOR</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900,500italic,400italic' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
        }
    </script>

</head>

<body>
<form action ="<?php echo base_url();?>c_index_aka/login_mahasiswa" method="post">
    <div class="form">
		<div class="header">
			 LOGIN MAHASISWA
			<br>
			POLITEKNIK AKA BOGOR
		</div>
		<div class="f_input">
			<center>
			<input type="numeric" name="nim" class="in" placeholder="nim" required onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"><br><span id="error" style="color: Red; display: none">* Inputan harus berupa angka(0-9)</span>		
			<input type="password" name="password" class="in" placeholder="password" required>
			</center>
		</div>
		<div class="f_button">
			<center>				
				<input type="submit" name="login" class="button" value="Log In">
			</center>
		</div>
		<div class="back">Kembali ke pilih menu <a href="<?php echo base_url();?>c_index_aka/pilih_menu">Click Disini</a></div>
	</div>
</form>
</body>

</html>