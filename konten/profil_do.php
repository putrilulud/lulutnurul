<h1 align="center"> <br></br>Profil Dosen</h1>
<?php
	include "koneksi/koneksi.php";
	$dosen = $_SESSION['id']; $i=1;
	$hasil=mysql_query("SELECT * FROM user JOIN matkul on user.id_matkul = matkul.id_matkul WHERE status = 'Dosen' and user.id_user = '$dosen'");
	$aray = mysql_fetch_array($hasil)?>
	
	<h3>Nama: <?php echo $aray['nama'];?> </h3>
	<h3>ID : <?php echo $aray['id_user'];?> </h3>
	<h3>Username : <?php echo $aray['username'];?> </h3>
	<h3>Mata Kuliah : <?php echo $aray['matkul'];?> </h3>
		<?php 
		mysql_close();
	?>