<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900,500italic,400italic' rel='stylesheet' type='text/css'>

</head>


<body>
<form action ="<?php echo base_url();?>c_index_aka/login_spm" method="post">
    <div class="form">
		<div class="header"><i class="icon-unlock"></i> LOGIN SPM<br></div>
		<div class="f_input">
			<center>
			<input type="text" name="username" class="in" placeholder="username" required>			
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