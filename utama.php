<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("janti") or die(mysql_error());
 
if (isset($_POST['Input'])) {
	$nim  	= strip_tags($_POST['nim']);
	$nama  	= strip_tags($_POST['nama']);
	$alamat = strip_tags($_POST['alamat']);
 
	
	$query= sprintf("INSERT INTO maha VALUES('%s', '%s', '%s')", 
			mysql_escape_string($nim), 
			mysql_escape_string($nama), 
			mysql_escape_string($alamat)
		);
	$sql = mysql_query($query);

	
	$response = array('data'=>$_POST);
	echo json_encode($response);
	exit;
}
?>
<html>
	<head>
		<script type="text/javascript" src="ajax/jquery.min.js"></script>
		<script type="text/javascript" src="ajax/jquery.form.js"></script>
		<script type="text/javascript">
		$(document).ready(function() { 

			var options = {
				success   : showResponse,
				resetForm : true,
				clearForm : true,
				dataType  : 'json'
			};
			$('#form').ajaxForm(options); 
 
		}); 
		
		</script>
	</head>
	<body>
		<h2>INPUT DATA MAHASISWA</h2>
		<form action="" method="post" id="form">
			<label for="nim" class="labelfrm">NIM: </label>
			<input type="text" name="nim" id="nim"/><br>
 
			<label for="nama" class="labelfrm">NAMA: </label>
			<input type="text" name="nama" id="nama"/><br>
 
			<label for="alamat" class="labelfrm">ALAMAT: </label>
			<textarea name="alamat" id="alamat" cols="40" rows="4"></textarea>
 
			<label for="submit" class="labelfrm">&nbsp;</label>
			<input type="submit" name="Input" id="input"/>
		</form>
	</body>
</html>