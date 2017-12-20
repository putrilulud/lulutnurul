<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1 align="center"> <br></br>Profil Mahasiswa</h1>
<?php
	include "koneksi/koneksi.php";
	$mhs = $_SESSION['id']; $i=1;
	$hasil=mysql_query("SELECT * FROM mhs JOIN user on mhs.id_mhs = user.id_user WHERE mhs.id_mhs = '$mhs'");?>
	<?php $aray = mysql_fetch_array($hasil)?>
<div id="profil-left">
	<img src="konten/images/<?php echo $aray['id_mhs'];?>.png" width="150px" height="100px"/><br></br>
	<a href="?module=camera3#pos"><input type="submit" value="Take a Photo"/></a>
</div>
	
<div id="profil-right">
<table>
	
	<tr align="left">
		<td width="100">Nama</td>
		<td width="10">:</td>
		<td width="400"><?php echo $aray['nama'];?></td>
	</tr>
	<tr align="left">
		<td width="100">NIM</td>
		<td width="10">:</td>
		<td width="400"><?php echo $aray['id_mhs'];?></td>
	</tr>
	<tr align="left">
		<td width="100">Username</td>
		<td width="10">:</td>
		<td width="400"><?php echo $aray['username'];?></td>
	</tr>
	<tr align="left">
		<td width="100">Fakultas</td>
		<td width="10">:</td>
		<td width="400"><?php echo $aray['fakultas'];?></td>
	</tr>
	<tr align="left">
		<td width="100">Jurusan</td>
		<td width="10">:</td>
		<td width="400"><?php echo $aray['jurusan'];?></td>
	</tr>
	
	<?php  
		mysql_close();
	?></table>
	<br></br><br></br><br></br>
</div>
</body>
</html>